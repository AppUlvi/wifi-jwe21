<?php
require "admin/funktionen.php";
header("Content-Type: application/json");

function fehler($message) {
  header("HTTP/1.1 404 Not Found");
  echo json_encode(array(
    "status" => 0,
    "error" => $message
  ));
  exit;
}

// GET-Parameter aus request_uri entfernen
$request_uri_ohne_get = explode("?", $_SERVER["REQUEST_URI"])[0];
// Aus Anfrage-URI die gewünschte Methode ermitteln
$teile = explode("/api/", $request_uri_ohne_get, 2);
$parameter = explode("/", $teile[1]);

// array_shift entfernt den ersten Wert aus einem Array und gibt ihn zurück
// aus diesem lesen wir hier gleich unsere Version raus.
$api_version = ltrim(array_shift($parameter), "vV");
if (empty($api_version)) {
  fehler("Bitte geben Sie eine API-Version an.");
}

// Leere Einträge aus Parameter-Array entfernen
foreach ($parameter as $k => $v) {
  if (empty($v)) {
    unset($parameter[$k]);
  } else {
    // Alle Parameter in Kleinbuchstaben umwandeln, falls diese falsch daherkommen
    $parameter[$k] = mb_strtolower($v);
  }
}
// Indizes neu zuordnen falls mit doppelten Schrägstrichen aufgerufen wird
$parameter = array_values($parameter);

if (empty($parameter)) {
  fehler("Nach der Version wurde keine Methode übergeben. Prüfen Sie Ihren Aufruf!");
}

// Ab hier ist in $parameter[0] immer die Hauptmethode drin,
// in $parameter[1], etc. die genauere Spezifizierung was angefragt wurde

if ($parameter[0] == "zutaten") {
  // Liste aller Zutaten
  $ausgabe = array(
    "status" => 1,
    "result" => array()
  );
  $result = query("SELECT * FROM zutaten ORDER BY id ASC");
  while ($row = mysqli_fetch_assoc($result)) {
    $ausgabe["result"][] = $row;
  }
  echo json_encode($ausgabe);
  exit;
} else if ($parameter[0] == "rezepte") {
  if (!empty($parameter[1])) {
    // ID wurde übergeben - Detail eines Rezepts ausgeben
    $ausgabe = array(
      "status" => 1
    );
    // Rezeptdaten ermitteln
    $sql_rezept_id = escape($parameter[1]);
    $result = query("SELECT * FROM rezepte WHERE id = '{$sql_rezept_id}' ");
    $rezept = mysqli_fetch_assoc($result);
    if (!$rezept) {
      fehler("Mit der id '{$parameter[1]}' wurde kein Rezept gefunden.");
    }
    $ausgabe["rezept"] = $rezept;
    // Benutzerdaten ermitteln und an Ausgabe anhängen
    $result = query("SELECT id, benutzername, email FROM benutzer WHERE id = '{$rezept["benutzer_id"]}' ");
    $ausgabe["benutzer"] = mysqli_fetch_assoc($result);
    // Zutaten ermitteln und an Ausgabe anhängen
    $result = query("SELECT zutaten.*, rezepte_zu_zutaten.menge, rezepte_zu_zutaten.einheit
        FROM rezepte_zu_zutaten JOIN zutaten ON rezepte_zu_zutaten.zutaten_id = zutaten.id
        WHERE rezepte_zu_zutaten.rezepte_id = '{$sql_rezept_id}'
        ORDER BY rezepte_zu_zutaten.id
    ");
    $ausgabe["zutaten"] = array();
    while ($zutat = mysqli_fetch_assoc($result)) {
      $ausgabe["zutaten"][] = $zutat;
    }

    echo json_encode($ausgabe);
    exit;
  } else {
    // Liste aller Rezepte
    $ausgabe = array(
      "status" => 1,
      "result" => array()
    );
    $where = "";
    if (!empty($_GET["suche"])) {
      $sql_suche = escape($_GET["suche"]);
      $where = "WHERE rezepte.titel LIKE '%{$sql_suche}%'";
    }
    $result = query("SELECT rezepte.id, rezepte.titel, benutzer.benutzername
      FROM rezepte LEFT JOIN benutzer ON rezepte.benutzer_id = benutzer.id
      {$where}
      ORDER BY rezepte.id ASC");
    while ($row = mysqli_fetch_assoc($result)) {
      $ausgabe["result"][] = $row;
    }
    echo json_encode($ausgabe);
    exit;
  }
} else {
  // Es wurde eine methode aufgerufen die nicht existiert
  fehler("Die Methode '{$parameter[0]}' exstiert nicht.");
}







//
