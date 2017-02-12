<?php
/**
 * Created by PhpStorm.
 * User: akram
 * Date: 11/5/2016
 * Time: 11:15 PM
 */

namespace Social\Facebook;


class Indexer
{
    public static function Account($attr, $flip = false)
    {
        $index = [
            'networkId' => 'id',
            'name' => 'name',
            'network' => 'network',
            'description' => 'about',
            'username' => 'first_name',
            'location' => 'location',
            'website' => 'website',
            'verified' => 'verified',
            'token' => 'access_token'
        ];
        $index = $flip ? array_flip($index) : $index;
        return isset($index[$attr]) ? $index[$attr] : null;
    }

    public static function Post($attr, $flip = false)
    {
        //required by mapper 'account_id'=>'',  'sharesCount', 'rawData'
        $index = [
            'networkId' => 'id',
            'network' => 'facebook',
            'message' => 'message',
            'from' => 'from',
            'createdTime' => 'created_time',
            'type' => 'type',
            'likesCount' => 'likes',
            'sharesCount' => 'shares',
            'commentsCount' => 'comments',
        ];
        $index = $flip ? array_flip($index) : $index;
        return isset($index[$attr]) ? $index[$attr] : null;
    }

    public static function Message($attr, $flip = false)
    {
        //required by mapper    'account_id', 'rawData'  'conversationId',
        $index = [
            'networkId' => 'id',
            'network' => 'facebook',
            'message' => 'message',
            'from' => 'from',
            'createdTime' => 'created_time',
            'conversationId',
            'to' => 'to',
        ];
        $index = $flip ? array_flip($index) : $index;
        return isset($index[$attr]) ? $index[$attr] : null;
    }

    public static function Comment($attr, $flip = false)
    {
        //required by mapper              'account_id','parent'=>parent comment id ,  'post_id','rawData'  'conversationId',
        $index = [
            'networkId' => 'id',
            'network' => 'facebook',
            'message' => 'message',
            'from' => 'from',
            'createdTime' => 'created_time',
            'likesCount' => 'like_count',
            'commentsCount' => 'comments',
        ];
        $index = $flip ? array_flip($index) : $index;
        return isset($index[$attr]) ? $index[$attr] : null;
    }
}