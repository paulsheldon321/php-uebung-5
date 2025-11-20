📘 Notiz-Manager Light

Ein einfaches PHP-Projekt zum Verwalten von Notizen (Hinzufügen & Löschen).

📌 Projektbeschreibung

Dieses Projekt ist eine Übung zur Arbeit mit PHP, Dateisystem, Formularen sowie Git/GitHub.
Ziel ist es, einen kleinen Notiz-Manager zu erstellen, der Daten aus einer JSON-Datei lädt und Änderungen wieder speichert.

🧩 Aufgabenstellung
0) Git-Repository erstellen

Ein Mitglied erstellt ein öffentliches Repository, von dem alle Teammitglieder pushen und pullen können.

1) Projektstruktur aufbauen

Erstelle folgende Ordnerstruktur:

data/
inc/
class/
public/

2) Notizen laden

Lade die Notizen aus data/notes.json

Zeige sie anschließend in public/index.php an

3) add.php & delete.php implementieren

Beide Dateien empfangen POST-Daten

Löschen erfolgt über ein verstecktes Formularfeld (<input type="hidden">)

4) index.php (Hauptansicht)
Muss enthalten:

Ausgabe der Notizen

Wenn keine Notizen existieren → Info ausgeben

Formular zum Hinzufügen einer neuen Notiz

Formular zum Löschen einzelner Notizen (mit hidden-Field)

5) inc/tools.php

Implementiere Funktionen für:

Laden der Notizen

Speichern der Notizen

(optional) Hilfsfunktionen

6) add.php

Funktionalität:

Neue Notiz aus POST-Daten erstellen

Abspeichern in notes.json

Redirect zurück zur index.php

7) delete.php

Funktionalität:

Notiz anhand eines Index löschen

Änderungen speichern

Redirect zurück zur index.php

8) class/Note.php

Eine Klasse zur Darstellung einer Notiz:

Eigenschaften: title, content

Getter- und Setter-Methoden

✅ Beispielstruktur des Projekts
/data
    notes.json

/inc
    add.php
    delete.php
    tools.php

/class
    Note.php

/public
    index.php
    style.css
