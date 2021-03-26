<?php

class Statisch {

    public static $aufrufe = 0;

    public static function setzte_0() {
        self::$aufrufe = 0;
    }

    public function __construct() {
        self::$aufrufe++;
    }
}
