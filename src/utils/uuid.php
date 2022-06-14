<?php 

namespace Dyalogo\Scriptdelete\utils;

class UUID {
   public static function generate() {
        return uniqid();
    }
}