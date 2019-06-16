<?php
include "db_connection.php";

if (isset($_GET['id']))
{
    $conn = dbconnection();
    $id = $_GET['id'];
    $select_history = $conn->prepare("SELECT film.titre AS titre, film.resum AS
        synopsis from fiche_personne INNER JOIN membre ON fiche_personne.id_perso =
        membre.id_fiche_perso INNER JOIN historique_membre ON membre.id_membre
        = historique_membre.id_membre INNER JOIN film ON 
        historique_membre.id_film = film.id_film WHERE historique_membre.id_membre =".$id);
    $select_history->execute();
    $values = $select_history->fetchAll(PDO::FETCH_ASSOC);
    echoes($values);
    echo "<button onclick=\"history.go(-1);\">Back </button>";
}

function echoes($values){
    foreach ($values as $array){
        echo "<tr>";
        echo "<td>".$array['titre']."<br></td>";
        echo "<td>".$array['synopsis']."<br></td>";
        echo "</tr>";
    }
}