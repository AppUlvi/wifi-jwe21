<?php
class fdb_validieren {

    private $_errors = array();

    public function istAusgefuellt($wert, $feldname) {
        if (empty($wert)) {
            $this->_errors[] = "Bitte füllen Sie das {$feldname} Feld aus.";
            return false;
        }
        return true;
    }

    public function fehlerHTML() {

        if ($this->keineFehler()) {
            return "";
        }

        $ret = '<ul class="fdb-validieren-error">';
        foreach ($this->_errors as $error) {
            $ret .= "<li>{$error}</li>";
        }
        $ret .= '</ul>';
        return $ret;
    }

    public function keineFehler() {
        return empty($this->_errors);
    }
}
