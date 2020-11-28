<?php

namespace App\Exceptions;


use Exception;

class InvalidRegistrationToken extends Exception
{
    public function render($request)
    {
        $message="Invalid Registration Token";
        return redirect()->route('home_page', ['message' => $message]);
    }
}
