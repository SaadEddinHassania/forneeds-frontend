<?php
/**
 * Created by PhpStorm.
 * User: akram
 * Date: 11/5/2016
 * Time: 11:14 PM
 */

namespace Social\Facebook;


use Facebook\Facebook;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Exceptions\FacebookResponseException;
use phpDocumentor\Reflection\Types\String_;

class Provider
{
    protected $fb;
    protected $loginHelper;
    protected $scopes;
    protected $fields;
    protected $commentFields;
    protected $postFields;
    protected $messageFileds;

    /**
     * Factors of limitations.
     *
     */
    protected $limit = 100;
    protected $postsLimit = null;
    protected $commentsLimit = 500;

    public function __construct()
    {
        $this->checkSessions();
        $this->fb = $this->fb ? $this->fb : new Facebook([
            'persistent_data_handler' => 'session',
            'FACEBOOK_APP_ID' => env('FACEBOOK_APP_ID', '342725306085201')
        ]);
        $this->loginHelper = $this->fb->getRedirectLoginHelper();
        $this->scopes = [
            'email',
            'manage_pages',
            'publish_actions',
            'publish_pages',
            'user_posts',
            'user_about_me',
            'read_page_mailboxes',
            'pages_messaging',
            'user_location'
        ];
        $this->fields = [
            'name',
            'first_name',
            'last_name',
            'email',
            'gender',
            'location',
            'website',
            'birthday',
            'verified',
            'about',
        ];
        $this->commentFields = [
            'created_time',
            'comment_count',
            'attachment',
            'like_count',
            'message',
            'from',
            'user_likes',
            'comments.fields(attachment,from,message,created_time,like_count,user_likes).limit(100)',
        ];
        $this->postFields = [
            'id',
            'message',
            'attachments',
            'from',
            'created_time',
            'type',
            'link',
            'message_tags',
            'shares',
            'likes.limit(10).summary(true)',
            'comments.limit(100).fields(' . implode(',', $this->commentFields) . ')'
        ];
        $this->messagesFileds = [
            'message',
            'from',
            'to',
            'created_time',
            'subject',
            'tags',
            'attachments',
            'shares'
        ];
    }

    /**
     * @function login
     * builds the url to invoke facebook api
     *
     * @param  void
     * @return String_
     */
    public function login()
    {
        return $this->loginHelper->getLoginUrl(config('services.facebook.redirect'), $this->scopes);
    }

    /**
     * @function callback
     * facebook  invoke this callback returning user access token and id
     *
     * @param  void
     * @return array
     */
    public function getUser()
    {
        try {
            $accessToken = $this->loginHelper->getAccessToken();
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($this->loginHelper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $this->loginHelper->getError() . "\n";
                echo "Error Code: " . $this->loginHelper->getErrorCode() . "\n";
                echo "Error Reason: " . $this->loginHelper->getErrorReason() . "\n";
                echo "Error Description: " . $this->loginHelper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $this->fb->getOAuth2Client()->getLongLivedAccessToken($accessToken);
            } catch (FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $this->loginHelper->getMessage() . "</p>\n\n";
                exit;
            }
        }
        $this->fb->setDefaultAccessToken($accessToken);

        return $this->getUserData();
    }

    private function getUserData()
    {
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $this->fb->get('/me?fields=id,' . implode(',', $this->fields));
        } catch (FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        return array_merge($response->getGraphUser()->asArray(), ['access_token' => $this->fb->getDefaultAccessToken()->getValue(), 'network' => 'facebook']);

    }

    private function checkSessions()
    {
        if (!session_id()) {
            session_start();
        }
    }

    public function getRelatedAccounts($network)
    {
        try {
            $response = $this->fb->get("/" . strtolower($network) . "/accounts");
        } catch (FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        return $response->getGraphEdge()->asArray();
    }

    // subscript app
    public function subscribeApp($account)
    {
        $fb = new Facebook();
        $fb->setDefaultAccessToken($account->facebook_token);
        $response = $fb->post('/' . $account->facebook_id . '/subscribed_apps');
        return $response;
    }

    // subscript app unsubscribe
    public function unsubscribeApp($account)
    {
        $fb = new Facebook();
        $fb->setDefaultAccessToken($account->facebook_token);
        $response = $fb->delete('/' . $account->facebook_id . '/subscribed_apps');
//        \Log::info('UnSubscribe App: '.$account->getName() . $account->getNetworkId(), ['responce' => json_encode($response)]);

        return $response;
    }

    public function readPosts($account, $from, $to)
    {
        $url_params = [
            '{network_id}' => $account->networkId,
            '{limit}' => $this->getPostsLimit() ? $this->getPostsLimit() : $this->getLimit(),
            '{since}' => (!empty($from)) ? ($from['createdTime']->timestamp) : '',
            '{&since=}' => (!empty($from)) ? '&since=' : '',
            '{until}' => (!empty($to)) ? ($to['createdTime']->timestamp) : '',
            '{&until=}' => (!empty($to)) ? '&until=' : '',
            '{fields}' => implode(',', $this->postFields)
        ];
        $this->fb->setDefaultAccessToken($account->token ? $account->token : env('FACEBOOK_APP_ID') . '|' . env('FACEBOOK_APP_SECRET'));
        $response = $this->fb->get(str_replace(array_keys(($url_params)), array_values(($url_params)), '/{network_id}/feed?limit={limit}{&since=}{since}{&until=}{until}&fields={fields}'));
        return $response->getGraphEdge()->asArray();

        /**todo set likes_count for each post**/
    }

    /**
     * Get all Messages sent to or from account
     *
     * @param $account
     * @return array of messages objects
     */
    public function readMessages(Account $account)
    {
        $conversationMessages = array();
        $this->fb->setDefaultAccessToken($account->token);
        $response = $this->fb->get("/{$account->networkId}/conversations?limit=50");
        $results = $response->getGraphEdge();
        foreach ($results->asArray() as $result) {
            $msgs_response = $this->fb->get("/{$result['id']}/messages?fields=" . implode(',', $this->messagesFileds));
            $msgs = $msgs_response->getGraphEdge();
            $conversationMessages[$result['id']] = $msgs->asArray();
        }
        unset($result);
        return $conversationMessages;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function setLimit($limit)
    {
        return $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getPostsLimit()
    {
        return $this->postsLimit;
    }

    /**
     * @return int
     */
    public function setPostsLimit($limit)
    {
        return $this->postsLimit = $limit;
    }

    /**
     * @return int
     */
    public function getCommentsLimit()
    {
        return $this->commentsLimit;
    }

    /**
     * @return int
     */
    public function setCommentsLimit($limit)
    {
        return $this->commentsLimit = $limit;
    }

    /**
     * @param array $postData
     * @return bool
     */
    public function PostHasComments(array $postData)
    {
        return !empty($postData['comments']);
    }
}