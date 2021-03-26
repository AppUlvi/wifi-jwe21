<?php

class Kreis {

    const pi = 3.1415926535898;

    private $_radius;

    public function __construct($radius) {
        $this->_radius = $radius;
    }

    public function __destruct() {
        echo "<p>Kreis mit Radius " . $this->_radius . " wurde zerstört</p>";
    }

    public function durchmesser() {
        return $this->_radius * 2;
    }

    public function flaeche() {
        return pow($this->_radius, 2) * self::pi;
    }

    public function umfang() {
        return $this->durchmesser() * self::pi;
    }

    public function set_radius($neuerRadius) {
        if ($neuerRadius <= 0) {
            throw new Exception("Der Radius vom Kreis muss größer 0 sein.");
        } else {
            $this->_radius = $neuerRadius;
        }
    }
}
