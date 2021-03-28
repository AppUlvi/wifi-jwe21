<?php

class fdb_mysql {

    private $_db;

    public function verbinden() {

        if ($this->_db) {
            return;
        }
        $this->_db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

        $this->_db->set_charset("utf8");
    }
}
