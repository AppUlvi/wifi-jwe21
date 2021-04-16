<?php
class fdb_validieren {

    private $_errors = array();

    /**
     * Prüfen, ob ein Wert (aus Formular) ausgefüllt ist.
     * @param string $wert Der Wert, der auf "ausgefüllt" geprüft werden soll.
     * @param string $feldname Name des Formularfeldes für die Fehlermeldung.
     * @return bool False wenn $wert leer ist, ansonsten true.
     */
    public function istAusgefuellt($wert, $feldname) {
        if (empty($wert)) {
            $this->_errors[] = "Bitte füllen Sie das {$feldname} Feld aus.";
            return false;
        }
        return true;
    }

    /**
     * Prüfen, ob ein Wert (aus Formular) dem Schema eine FIN entspricht.
     * @param string $wert Der Wert, der auf "FIN" geprüft werden soll.
     * @param string $feldname Name des Formularfeldes für die Fehlermeldung.
     * @return bool False wenn $wert keine FIN ist, ansonsten true.
     */
    public function fin($wert, $feldname) {
        if (strlen($wert) != 17) {
            $this->_errors[] = "Das Feld {$feldname} muss genau 17 Zeichen lang sein.";
            return false;
            // ^ : nicht 
            // i : großklein ist egal
        } else if (preg_match("/[^0-9a-hj-npr-z]/i", $wert)) {
            $this->_errors[] = "Das Feld {$feldname} darf nur folgende Zeichen enthalten: 0-9 und A-Z außer IOQ.";
            return false;
        }
        return true;
    }

    public function eindeutig($tabelle, $spalte, $formularwert, $id, $feldname) {
        $db = fdb_mysql::get_instanz();

        $sql_formularwert = $db->escape($formularwert);
        $sql_id = $db->escape($id);

        $result = $db->query("SELECT * FROM {$tabelle} WHERE {$spalte} = '{$sql_formularwert}' AND id != '{$sql_id}'");

        // num_rows ist eine php eigenschaft gibt zurück wieviele rows gefunden wurden
        if ($result->num_rows >= 1) {
            $this->_errors[] = "Der Wert im Feld {$feldname} wurde bereits verwendet, muss jedoch eindeutig sein.";
            return false;
        }
        return true;
    }

    public function addError($fehlermeldung) {
        $this->_errors[] = $fehlermeldung;
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
