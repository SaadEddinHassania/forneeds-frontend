<?php
/**
 * Created by PhpStorm.
 * User: akram
 * Date: 11/6/2016
 * Time: 12:40 AM
 */

namespace Social\Facebook\Contracts;


use App\Models\Account;
use App\User;

interface SocialDriver
{
    public function connect();

    public function callback(User $user);

    public function link($token);

    public function unLink();

    public function sync(User $account);

}