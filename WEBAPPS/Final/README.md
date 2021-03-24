# 1. Projektbeschreibung
Erstellen Sie eine Web App für die Administration von Sendemasten in Österreich. Mitarbeiter einer Telekommunikationsfirma sollen damit einerseits eine Übersicht über die Sendemasten und die Netzabdeckung bekommen und andererseits sollen die Mitarbeiter die Daten von Sendemasten bearbeiten können. 

Erstellen Sie für diese beiden Teile jeweils eine eigene HTML-Datei. Die Funktionalität der beiden Teile ist in Unterabschnitt 2.1 und Unterabschnitt 2.2 beschrieben. Auf die Daten der Sendemasten greifen Sie über eine Web API zu, die in Abschnitt 3 dokumentiert ist. Auch die Properties eines Sendemasten-Objects, wie es von der API geliefert wird, ist dort beschrieben. Die API wird Ihnen zur Verfügung gestellt und muss nicht von Ihnen entwickelt werden.

Achten Sie auf Lesbarkeit in Ihren HTML-, JavaScript- und CSS-Dateien indem Sie u.a. folgende Dinge beherzigen:
- Sprechende Namen für Elemente, Klassen, Funktionen, Variablen
- So wenige globale Variablen wie möglich
- Saubere Einrückungen (Automatische Formatierung durch Ihre IDE!) 
- Semantisch sinnvolle HTML-Elemente

Behandeln Sie auch den Fehlerfall beim Holen von Daten aus dem Internet oder von Gerätesensoren. Geben Sie den Anwendern auch bei einem Fehler ein visuelles Feedback. Erwarten Sie nicht, dass die Anwender die Developer Tools öffnen und die Console nach Fehlern durchsuchen.

## 1.1 Übersicht über Sendemasten
Auf dieser Seite wird die Übersicht über die Sendemasten dargestellt.

Diese Übersichtsseite soll folgende Funktionalität bieten:

- Die Sendemasten werden als Liste dargestellt. Beachten Sie, dass manche Properties eines Sendemasten auch HTML-Code enthalten können. Stellen Sie diese ausschließlich als Text dar.
- Jeder Eintrag in der Liste soll einen Link enthalten, um den jeweiligen Sendemasten auf der Bearbeitungs - Seite(siehe Unterabschnitt 2.2) zu bearbeiten.
- Darstellung der Sendemasten auf einer Karte.Verwenden Sie dazu Leaflet (https://leafletjs.com/). Stellen Sie die Position der Sendemasten als Marker und ihre Reichweite als halbtransparent gefüllte Kreise auf der Karte dar. Als Kartenebene können Sie die OpenStreetMap verwenden.
- Die Anwender sollen auch ihre eigene Position auf der Karte sehen, falls ihr Browser dies unterstützt und sie den Zugriff auf den Standort erlauben.
- Anzeige der Gesamtkosten aller Sendemasten(Properties cost). Wenn diese Summe das Budget von EUR 1.000.000 übersteigt, soll dieser Betrag in rot und fett dargestellt werden.

## 1.2 Bearbeiten der Daten eines Sendemasten

Diese Seite zur Bearbeitung der Daten eines Sendemasten soll folgende Funktionalität bieten:

- Die Anwender erreichen diese Seite über den Link auf der Übersichtsseite (siehe Unterabschnitt 2.1). Die ID des Sendemasten wird dieser Seite als Search Parameter in der URL übergeben.
- Die Daten des Sendemasten sollen dargestellt werden. Verwenden Sie input- und label-Elemente.
- Bei kleinen Bildschirmbreiten sollen label und input jeweils in einer eigenen Zeile angezeigt werden. Bei größeren Breiten sollen sie nebeneinander angezeigt werden.
- Die Anwender sollen die Inputfelder für den Namen(Property name), die Reichweite (Property range) und die 5G-Unterstützung (Property is5GEnabled) bearbeiten können.
  Die input-Elemente der anderen Properties sollen nicht durch die Anwender verändert werden können.
- Nach dem Klick auf den Speichern-Button sollen die geänderten Daten für diesen Sendemasten zum Server geschickt werden. Die Anwender sollen das visuelle Feedback bekommen, ob das Speichern erfolgreich oder nicht war.

# 2. Sendemasten API
Die hier beschriebene Web API stellt Ihnen den Zugriff auf die Sendemasten der Telekomfirma zur Verfügung. Die API speichert die Daten nicht dauerhaft. Sollte ein Neustart des Servers notwendig sein, werden die Daten der Sendemasten wieder auf die Defaultwerte zurückgesetzt. Weiters arbeiten alle Prüflinge auf den selben Daten. Es kann also sein, dass Ihre Änderungen überschrieben werden, wenn jemand anders den gleichen Sendemasten bearbeitet.

## 2.1 Sendemasten-Object
Ein Sendemasten wird in der API als Object mit Properties für Identifikation, Name, Position, Reichweite und Kosten gespeichert. Im Folgenden werden die Properties beschrieben. Beachten Sie, dass nur name, range und is5GEnabled von den Anwendern Ihrer App verändert werden können sollen. Ein Beispiel für ein Sendemasten-Objekt ist in Listing 1 gegeben.

### Listing 1: Beispiel eines Sendemasten-Objects
```json
{
    "id": "styria1",
    "lat": 47.394167,
    "lon ": 13.689167,
    "cost ": 18378.32
    "name": "Schladming",
    "range": 50,
    "is5GEnabled ": false,
}
```

**id** Ein String, der den Sendemasten eindeutig identifizert.  Er kann aus Buchstaben und Zahlen bestehen. Diese Property kann von den Anwendern nicht bearbeitet werden.
**lat** Der Breitengrad der Position des Sendemasten als Dezimalzahl. Diese Property kann von den Anwendern nicht bearbeitet werden.
**lon** Der Längengrad der Position des Sendemasten als Dezimalzahl. Diese Property kann von den Anwendern nicht bearbeitet werden.
**cost** Die jährlichen Kosten für den Betrieb des Sendemasten in Euro als eine Dezimalzahl mit maximal zwei Nachkommastellen. Diese Property kann von den Anwendern nicht bearbeitet werden.
**name** Der Name des Sendemasten als String. Diese Property kann von den Anwendern bearbeiten werden.
**range** Eine positive Zahl die die Reichweite des Sendemasten in Metern angibt. Diese Property kann von den Anwendern bearbeiten werden.
**is5GEnabled** Eine boolesche Property die angibt, ob ein Sendemasten 5G unterstützt (true) oder nicht (false). Diese Property kann von den Anwendern bearbeiten werden.

## 2.2 API Methoden
Die Web API ist erreichbar unter der Basis-URL https://test.sunbeng.eu/api/ und bietet drei Endpunkte. Daten müssen als JSON zum Server geschickt werden. Der Server antwor- tet ebenfalls mit JSON. Für diese API ist Cross-Origin Resource Sharing (CORS) aktiviert.

**GET** https://test.sunbeng.eu/api/towers
Gibt eine Liste von Sendemasten zurück. Der Server antwortet mit HTTP Status 200 und einer Liste von Sendemasten-Objects als JSON-String im Response-Body.

**GET** https://test.sunbeng.eu/api/towers/${id}
Gibt die Daten des Sendemasten mit der ID id zurück. Der Server antwortet mit dem HTTP Status 404, wenn kein Sendemasten mit der entsprechenden ID existiert. Ansonsten antwortet der Server mit dem HTTP Status 200 und dem Sendemasten-Object als JSON-String im Response-Body.

**POST** https://test.sunbeng.eu/api/towers/${id}
Speichert die Daten des Sendemasten mit der ID id. Der Body des HTTP-Request muss ein JSON-String mit den Properties für name, range und/oder is5GEnabled sein. Der Request muss nicht alle Properties beinhalten. Alle weiteren mitgeschickten Properties werden ignoriert. 
Wenn das Speichern erfolgreich war, antwortet der Server mit dem HTTP Status 200. 
Der Server antwortet mit dem HTTP Status 404, wenn kein Sendemasten mit der entsprechenden ID existiert. Der Server antwortet mit dem HTTP Status 400, wenn die Properties den falschen Datentypen haben oder range eine negative Zahl ist.