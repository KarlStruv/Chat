<?php

namespace App;

use App\interfaces\data;

class ChatData implements data
{
    private string $nickname;
    private string $message;

    public function __construct(string $nickname,string $message)
    {
        $this->nickname = $nickname;
        $this->message = $message;
    }

    public function nickname(): string
    {
        return $this->nickname;
    }

    public function message(): string
    {
        return $this->message;

    }

    public function displayNickname() : string
    {

    }
    public function displayMessage() : string
    {

    }
}

