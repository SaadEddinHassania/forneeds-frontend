<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Social\Facebook\Driver as Social;
use Auth;
class SocialContoller extends Controller
{
    protected $social;

    public function __construct(Social $social)
    {
        $this->middleware('auth');
        $this->middleware('checkUserType:serviceProvider')->only('connect','callback');
        $this->social = $social;
    }
    public function connect()
    {
        return redirect($this->social->connect());
    }

    public function callback()
    {

        $this->social->callback(Auth::user());
        return session('accounts');
    }

    public function link($token)
    {
        return $this->social->link($token);
    }

    public function unlink()
    {
        if ($this->social->unLink()) {
            return "account unlinked successfully";
        }
        return redirect()->back();
    }

}
