<?php 

include_once('db.php');

if(isset($_POST['addArtikel'])) {
    $conn->query('INSERT INTO Warenkorb VALUES (NULL, '.$_POST['artikel_id'].')');
    $anz_artikel = $conn->query('SELECT count(id) as anz_artikel FROM warenkorb');
    foreach($anz_artikel as $a) { $anz_artikel = $a['anz_artikel']; }
    return $anz_artikel;
}

if(isset($_POST['clearWarenkorb'])) {
    $conn->query('DELETE FROM Warenkorb');
}
