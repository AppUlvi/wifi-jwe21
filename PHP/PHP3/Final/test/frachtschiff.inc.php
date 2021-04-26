<?php
class test_frachtschiff {

    public $_geschwindigkeit;
    public $_containers = array();

    public function __construct($geschwindigkeit) {

        $this->_geschwindigkeit = $geschwindigkeit;
    }

    public function reisezeit($km) {
        // strecke in km / geschwindigkeit in km/h = zeit in h 
        return  $km / $this->_geschwindigkeit;
    }

    public function lade_container($container) {
        $this->_containers[] = $container;
    }

    public function gesamtgewicht() {
        $output = 0;

        foreach ($this->_containers as $container) {
            $output += $container->ist_gewicht();
        }

        return $output;
    }

    public function anzahl_container() {
        $count = count($this->_containers);
        // Zusatz Anzahl
        foreach ($this->_containers as $container) {
            if ($container->max_gewicht() == 30.48) {
                $count++;
            }
        }
        return $count;
    }
}
