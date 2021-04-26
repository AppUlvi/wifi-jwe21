<?php
abstract class test_container_abstract {
    protected $_leergewicht;
    protected $_nutzlast;

    public $_gewicht;

    public function __construct($gewicht) {
        $this->_gewicht = $gewicht;
    }

    public function ist_gewicht() {
        return $this->_leergewicht + $this->_gewicht;
    }

    public function max_gewicht() {
        return $this->_leergewicht + $this->_nutzlast;
    }
}
