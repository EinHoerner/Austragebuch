# Digitales Austragebuch

Datenbankenprojekt Info-LK Q2 von Jule und Linda.

## Build

### Dateistruktur

Um das digitale Austragebuch zum Laufen zu bringen, alle Dateien in einem Ordner auf einen Server laden bzw. in den htdocs-Ordner bei XAMPP kopieren.

### Datenbankstruktur

Eine neue Datenbank mit Namen "Austragebuch" erstellen:

```sql
CREATE DATABASE Austragebuch;
```

Diese Datenbank umfasst die Tabellen eintrag, schueler, sozpaed, gast, wg und paket.

Für die Eintrag-Tabelle:

```sql
CREATE TABLE eintrag(
  id INT AUTO_INCREMENT PRIMARY KEY,
  uid VARCHAR(100) NOT NULL,
  away DATETIME DEFAULT CURRENT_TIMESTAMP,
  back DATETIME NOT NULL,
  absprache VARCHAR(50) DEFAULT NULL,
  wohin VARCHAR(100) NOT NULL,
  isback BOOLEAN DEFAULT 0);
```

Für die Schüler-Tabelle:

```sql
CREATE TABLE schueler(
  uid VARCHAR(100) NOT NULL PRIMARY KEY,
  pwd VARCHAR(60) NOT NULL,
  first VARCHAR(50) NOT NULL,
  last VARCHAR(50) NOT NULL,
  wg VARCHAR(4) NOT NULL,
  ausgetragen BOOLEAN DEFAULT 0,
  postdienst BOOLEAN DEFAULT 0,
    telegram_id INT DEFAULT NULL
);
```

Für die SozPäd-Tabelle:

```sql
CREATE TABLE sozpaed(
  uid VARCHAR(100) NOT NULL PRIMARY KEY,
  pwd VARCHAR(100) NOT NULL,
  first VARCHAR(50) NOT NULL,
  last VARCHAR(50) NOT NULL);
```

Für die Gäste-Tabelle:

```sql
CREATE TABLE gast(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  zeitraum VARCHAR(200) NOT NULL,
  schueler_uid VARCHAR(100) NOT NULL,
  bestaetigt BOOLEAN DEFAULT 0,
  antrag DATETIME DEFAULT CURRENT_TIMESTAMP,
  aktuell BOOLEAN DEFAULT 1);
```

Für die WG-Tabelle:

```sql
CREATE TABLE wg(
    id VARCHAR(4) PRIMARY KEY NOT NULL,
    sozpaed VARCHAR(100) NOT NULL,
    mentor VARCHAR(5) NOT NULL
);
```

Für die Paket-Tabelle:

```sql
CREATE TABLE paket(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    ort VARCHAR(100),
    schueler_uid VARCHAR(50) NOT NULL,
    aktuell BOOLEAN DEFAULT 1,
    zeitpunkt DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

Die Befehle zur Erstellung der gesamten Tabellen finden sich auch gesammelt in der Datei Sonstiges/dbsetup.txt zum Kopieren und Ausführen.

## Nutzerregistrierung

### Über Benutzeroberfläche

Der Ordner "Verworfen" enthält Dateien, die nicht in die eigentliche Seite integriert wurden, die aber trotzdem nützlich sein könnten, wie zum Beispiel die Registrierung von Schülern und SozPäds über eine benutzerfreundliche Oberfläche. Diese Funktion ist vollständig funktionsfähig und kann genutzt werden, indem ihr die Seite localhost/Austragebuch/Verworfen/schuelerregister.php bzw. sozpaedregister.php aufruft.

Wenn ihr die automatische Registrierfunktion benutzt, werden neue Schüler automatisch als vorname.nachname und SozPäds als ersterBuchstabeVorname.nachname registriert, das Passwort ist identisch mit dem Nutzernamen.

### Mit MySQL

Im Ordner "Sonstiges" befinden sich Listen mit korrekten SQL-Befehlen, um alle aktuellen Schüler der Q2 und Q4, sowie alle SozPäds zu registrieren. Dabei werden die Schüler als vorname.nachname eingespeichert, die SozPäds als ersterBuchstabeVorname.nachname; das Passwort ist jeweils identisch.

Anderweitig ist es ebenfalls möglich, Schüler und SozPäds manuell und nach anderen Schemata zu registrieren.

## Anmerkungen

#### Passwörter

Die Passwörter werden unverschlüsselt als reiner Text gespeichert. Wer dies ändern möchte, kann die Länge des Passwortes (pwd) anpassen und muss auf der loginp.php-Seite eine Verschlüsselung einbauen.

#### Servereigenschaften

Sollte euer Server nicht localhost heißen, oder habt ihr an den Zugangsdaten etwas verändert (also Benutzername nicht "root" und/oder Passwort nicht leer), könnt ihr dies in der Datei dbh.php ändern.
