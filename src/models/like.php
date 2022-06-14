<?php 

namespace Dyalogo\Scriptdelete\models;

class Like {
    
    public function __construct(private User $user){}

    public function getUser(): User{
        return $this->user;
    }
}
