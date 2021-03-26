<?php

class Magic {

    private $_daten = array();

    public function __set($variable, $wert) {
        $this->_daten[$variable] = $wert;
    }

    public function __get($variable) {
        return $this->_daten[$variable];
    }

    public function __call($name, $arguments) {
        echo "<br> Es wurde die Methode {$name} aufgerufen.";
        echo "<pre>";
        print_r($arguments);
        echo "</pre>";
    }

    public function __toString() {
        return print_r($this->_daten, true);
    }
}
