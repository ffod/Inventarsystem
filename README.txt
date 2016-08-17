Einfaches Inventarsystem


Installation:

Basedir anpassen.
Datenbank und einen Nutzer anlegen die Daten in settings.php eintragen.

In der Datenbank muss eine Tabelle mit dem Namen list angelegt werden außerdem folgende Felder:
id, text als primary Key, 61 stellen.
items als text mit utf8mb4_bin Codierung.
Das Gleiche gilt für contact.
date typ datetime