<?php

class fdb_mysql {

    // Singleton Implementierung
    // Vermeidet mehrfache Erstellung des selben Objektes.
    // Hier gewünscht, um nicht mehrere Datenbank-Verbindungen gleichzeitig zu öffnen.

    private static $_instanz;

    public static function get_instanz() {
        // if(empty($_instanz))
        if (!self::$_instanz) {
            self::$_instanz = new self();
        }
        return self::$_instanz;
    }

    // Singleton Implementierung ENDE

    private $_db;

    private function __construct() {
        $this->verbinden();
    }

    public function verbinden() {

        // Keine neue Verbindung machen, wenn schon eine existiert.
        if ($this->_db) {
            return;
        } else {
            $this->_db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
            $this->_db->set_charset("utf8");
        }
    }

    public function escape($wert) {
        return $this->_db->real_escape_string($wert);
    }

    public function query($sql_befehl) {
        $result = $this->_db->query($sql_befehl) or die($this->_db->error  . '<br>' . $sql_befehl);
        return $result;
    }
}
