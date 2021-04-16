<?PHP

class fdb_marken {

    public static function get_by_id($marke_id) {

        $db = fdb_mysql::get_instanz();
        $sql_marke_id = $db->escape($marke_id);
        $result = $db->query("SELECT * FROM marken WHERE id = '{$sql_marke_id}'");
        $row = $result->fetch_assoc();
        return new fdb_marke($row);
    }

    /**
     * Gibt alle Marken alphabetisch sortiert zurück
     * @return array Alle Marken als array mit fdb_marke objekten darin.
     */
    public static function get_all() {
        $output = array();
        $db = fdb_mysql::get_instanz();
        $result = $db->query("SELECT * FROM marken ORDER BY titel ASC");

        while ($row = $result->fetch_assoc()) {
            $output[] = new fdb_marke($row);
        };

        return $output;
    }
}
