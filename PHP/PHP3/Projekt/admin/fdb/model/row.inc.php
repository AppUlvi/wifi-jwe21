<?PHP

abstract class fdb_model_row {

    protected $_tabelle; // Muss in Kind-Klassen überschrieben werden: fahrzeug.inc und marke.inc
    private $_daten = array();

    public function __construct($daten) {

        if (is_numeric($daten)) {
            $db = fdb_mysql::get_instanz();
            $sql_id = $db->escape($daten);
            $result = $db->query("SELECT * FROM {$this->_tabelle} WHERE id = '{$sql_id}'");
            $daten = $result->fetch_assoc();
        }
        $this->_daten = $daten;
    }

    public function __get($eigenschaft) {
        return $this->_daten[$eigenschaft];
    }

    public function speichern() {

        // Felder für SQL-Abfrage zusammen bauen
        $db = fdb_mysql::get_instanz();
        $sql_felder = "";
        foreach ($this->_daten as $spaltenname => $formularwert) {
            // spalte id überspringen
            if ($spaltenname == "id") {
                continue;
            }
            $formularwert = $db->escape($formularwert);
            $sql_felder .= "{$spaltenname} = '$formularwert', ";
        }

        // Letztes Komma entfernen
        $sql_felder = rtrim($sql_felder, ", ");


        // Wenn id existiert bearbeiten sonst neu erstellen
        if (!empty($this->_daten["id"])) {
            //in DB bearbeiten
            $sql_id = $db->escape($this->_daten["id"]);
            $db->query("UPDATE {$this->_tabelle} SET {$sql_felder} WHERE id = '{$sql_id}'");
        } else {
            // in DB einfügen
            $db->query("INSERT INTO {$this->_tabelle} SET {$sql_felder}");
        }




        // echo "<pre>";
        // print_r($this);
        // die;
    }

    public function entfernen() {
        $db = fdb_mysql::get_instanz();
        $sql_id = $db->escape($this->id);
        $db->query("DELETE FROM {$this->_tabelle} WHERE id = '{$sql_id}'");
    }
}
