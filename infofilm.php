<?php
include "db_connection.php";

$conn = dbconnection();
$id = $_GET['id'];
if (isset($_GET['id']))
{
    $select_id = $conn->prepare("SELECT titre, resum, duree_min, annee_prod FROM film 
        WHERE id_film = ".$id);
    $select_id->execute();
    $values = $select_id->fetchAll(PDO::FETCH_ASSOC);
    foreach ($values as $array){
        echo "<tr>";
        echo "<p>Title</p><tr>".$array['titre']."<br></tr>";
        echo "<p>Synopsis</p><tr>".$array['resum']."<br></tr>";
        echo "<p>Film Length (mins)</p><tr>".$array['duree_min']."<br></tr>";
        echo "<p>Production Year</p><tr>".$array['annee_prod']."<br></tr>";
        echo "</tr>";
    }
    echo "<button onclick=\"history.go(-1);\">Back </button>";
}
