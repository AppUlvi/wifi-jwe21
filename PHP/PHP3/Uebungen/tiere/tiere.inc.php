<?php

class Tiere implements Interface_Tiere, Iterator {

    private $_herde = array();

    public function add(tier $tier) {
        $this->_herde[] = $tier;
    }

    public function ausgabe() {
        $ret = "";
        foreach ($this->_herde as $tier) {
            $ret .= $tier->getName();
            $ret .= " macht ";
            $ret .= $tier->makeSound();
            $ret .= "<br>";
        }

        return $ret;
    }

    private $_position = 0;

    public function current() {
        return $this->_herde[$this->_position];
    }

    public function key() {
        return $this->_position;
    }

    public function next() {
        ++$this->_position;
    }

    public function rewind() {
        $this->_position = 0;
    }

    public function valid() {
        return isset($this->_herde[$this->_position]);
    }
}
