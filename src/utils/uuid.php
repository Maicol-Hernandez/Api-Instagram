<?php 

namespace Api\Instagram\utils;

class UUID {
   public static function generate() {
        return uniqid();
    }
}