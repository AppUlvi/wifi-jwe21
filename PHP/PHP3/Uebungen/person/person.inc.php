<?php

class Person {

    private $vorname;

    public function __construct($name) {
        $this->vorname = $name;
    }

    public function vorstellen() {
        return "Hallo, ich bin" . $this->vorname;
    }

    public function getVorname() {
        return $this->vorname;
    }

    public function setVorname($name) {
        if ($name == $this->vorname) {
            echo "So heiße ich bereits.";
        } else {
            $this->vorname = $name;
        }
    }
}
