<?php

namespace App\Exceptions\Board;

use Exception;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class InvalidDataException extends Exception
{
    public $message;

    public function __construct(Mixed $message)
    {
        $this->message = ["errors"=>$message];
        //parent::__construct($this->message, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function report()
    {
        Log::debug(json_encode($this->message));
    }

    public function render() 
    {
        return response([
            $this->message
        ], Response::HTTP_BAD_REQUEST);    
    }
}