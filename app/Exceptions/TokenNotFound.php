<?php

namespace App\Exceptions;

use Exception;

class TokenNotFound extends Exception
{
    //
    public function render($request)
    {
        $message="Registration Token Not found";
        return redirect()->route('home_page', ['message' => $message]);
    }
}
