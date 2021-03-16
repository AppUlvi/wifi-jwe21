# Chat API

Eine API fuer eine einfache Chat-Applikation ist erreichbar unter der Base-URL

```
https://test.sunbeng.eu/
```

## Endpunkte

Die API bietet folgende Endpunkte:

### GET `/`
Antwortet mit einem einfachen Hallo (zum Testen, ob der fetch überhaupt funktioniert)

### GET `/api/messages`
Liefert eine Liste mit den letzten 100 Nachrichten. Die Nachrichten Objekte sind wie unten beschrieben.

### POST `/api/messages`
Schickt eine Nachricht an den Server

## Daten

Nachrichten müssen als JSON verschickt werden (auch den Content-Type setzen!).

Beispiel:
```
{
    "timestamp": "Zeitpunkt der Nachricht. Wird beim POST ignoriert und durch den Server gesetzt",
    "name": "Name des Absenders",
    "text": "Die Nachricht"
}
```
