<?php
// Pobierz dane przeslane przez ESP8266MOD
$value1 = $_GET['value1'];
$value2 = $_GET['value2'];
$value3 = $_GET['value3'];

// Polacz sie z baza danych MySQL na AwardSpace

$servername = "fdb1034.awardspace.net";
$username = "3890035_arduinodata";
$password = "Smackdown1!";
$dbname = "3890035_arduinodata";


$conn = mysqli_connect($servername, $username, $password, $dbname);

// Sprawdz czy polaczenie sie powiodlo
if ($conn->connect_error) {
  die("Nie udalo sie polaczyc z baza danych: " . $conn->connect_error);
}

// Wykonaj zapytanie do bazy danych, aby zapisac dane z ESP8266MOD
$sql = "INSERT INTO rawData (temperature_value, humidity_value, lumosity_value) VALUES ('".$value1."', '".$value2."', '".$value3."')";

if ($conn->query($sql) === TRUE) {
  echo "Dane zostaly pomyslnie zapisane.";
} else {
  echo "Blad: " . $sql . "<br>" . $conn->error;
}

// Zamknij polaczenie z baza danych
$conn->close();
?>
