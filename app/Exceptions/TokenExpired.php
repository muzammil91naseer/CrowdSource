<?php

namespace App\Exceptions;

use Exception;

class TokenExpired extends Exception
{
    //
    public function render($request)
    {
        $message="Registration Link Expired";
        return redirect()->route('home_page', ['message' => $message]);
    }
}
