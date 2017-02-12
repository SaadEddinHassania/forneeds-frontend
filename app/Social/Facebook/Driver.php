<?php
/**
 * Created by PhpStorm.
 * User: akram
 * Date: 11/5/2016
 * Time: 11:13 PM
 */

namespace Social\Facebook;


use App\Models\Users\ServiceProvider;
use App\User;
use Social\Facebook\Contracts\SocialDriver;
use Auth;
use Illuminate\Container\Container as Application;

class Driver implements SocialDriver
{
    protected $mapper;
    protected $provider;


    public function __construct(Application $app, Mapper $mapper, Provider $provider)
    {
        $this->mapper = $mapper;
        $this->provider = $provider;
    }

    public function connect()
    {
        return $this->provider->login();
    }

    public function callback(User $user)
    {
        $fbUser = $this->provider->getUser();


        // dd($this->mapper->serialize(Account::class, $this->mapper->deserialize(Account::class, $fbUser)));
//     $account = $user->findOrCreateUser($this->mapper->deserialize(User::class, $fbUser));
        $this->initSessionAccounts($this->provider->getRelatedAccounts($fbUser['id']));

    }

    private function initSessionAccounts($accounts)
    {
        session()->set('accounts', $accounts);
    }

    public function link($token)
    {
        $user = Auth::user();
        $page = $this->haveAccess($token);
        $user->facebook_id = $page['id'];
        $user->facebook_token = $page['access_token'];
        $user->save();
        // $user->$this->mapper->deserialize(Account::class, array_merge($this->haveAccess($token), ['network' => 'facebook'])));
        $this->provider->subscribeApp($user);
        return $user;
    }

    public function unLink()
    {
        $user = Auth::user();
        $this->provider->unsubscribeApp($user);
        return $user->unlink();

    }

    public function sync(User $account)
    {
        set_time_limit(env('SYNC_TIME_LIMIT', 300));
        $is_finished = false;
        $latest_from = null;
        do {
            // generate from and to conditions which need to read posts from socialite depend on type of sync
            $to = $this->interactionRepo->getFeedSyncOffset($account);
            $from = $this->interactionRepo->getFeedSyncBase($account);
            // read posts using provider
            $results = $this->mapper->deserializeEdge(Post::class, $this->provider->readPosts($account, $from, $to));
            /**todo fix this code comments should not be iterated here , this is the mapper job**/
            foreach ($results as $result) {

                if ($result->commentsCount) {
                    $result->commentsCount = $this->mapper->deserializeEdge(Comment::class, $result->commentsCount);
                    foreach ($result->commentsCount as $comment) {
                        $comment->from = $this->accountRepo->findOrCreateUser($this->mapper->deserialize(Account::class, array_merge($comment->from, ['network' => 'facebook'])))['user']->id;
                        if (($comment->commentsCount)) {
                            $comment->commentsCount = $this->mapper->deserializeEdge(Comment::class, $comment->commentsCount);
                            foreach ($comment->commentsCount as $reply) {
                                $reply->from = $this->accountRepo->findOrCreateUser($this->mapper->deserialize(Account::class, array_merge($reply->from, ['network' => 'facebook'])))['user']->id;
                            }
                        }
                    }
                }
                $result->from = $this->accountRepo->findOrCreateUser($this->mapper->deserialize(Account::class, array_merge($result->from, ['network' => 'facebook'])))['user']->id;
            }
            /**todo fix this code**/

            //caching posts and mentions read from socialite in database
            $this->interactionRepo->savePosts($results, $account, function ($finished) use (&$is_finished) {
                $is_finished = $finished;
            });
        } while (!$is_finished and (count($results) > 1 && !$from));

        try {
            $messages = $this->mapper->deserializeEdge(Message::class, $this->provider->readMessages($account));
            $this->interactionRepo->saveMessages($messages, $account);
        } catch (\Exception $exp) {
            if ($exp->getCode() == "298") {
                // when get facebook messages for presonal account do nothing
            }
        }
        if ($account->isFirstSync()) {
            $account->firstSynced();
        }
    }

    protected function haveAccess($relatedToken)
    {
        $session_accounts = session('accounts');
        $search_result = array_search($relatedToken, array_column($session_accounts, 'access_token'));
        return $session_accounts[$search_result];
    }
}