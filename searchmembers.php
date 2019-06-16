<?php
include "db_connection.php";

function searchMember(){
    $conn = dbconnection();
    $firstName = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    if (isset($_GET['firstname']) && isset($_GET['lastname']))
    {
        $select_member = $conn->prepare("SELECT membre.id_abo, 
            fiche_personne.nom AS nom, fiche_personne.prenom, 
            fiche_personne.email, abonnement.nom AS abo, 
            fiche_personne.id_perso FROM membre INNER JOIN fiche_personne ON 
            id_fiche_perso = id_perso INNER JOIN abonnement ON membre.id_abo =
            abonnement.id_abo WHERE fiche_personne.nom LIKE '%".$lastname."%'
            AND fiche_personne.prenom LIKE '%".$firstName."%'");
        $select_member->execute(array(':firstname' => $firstName,
            ':lastname'=>$lastname));
        $values = $select_member->fetchAll(PDO::FETCH_ASSOC);
        echoes($values);
        echo "<button type=\"button\" onclick=\"history.back();\">Back</button>";
    }
}

function echoes($values){
    foreach ($values as $array){
        echo "<tr>";
        echo "<td>".$array['nom']."</td>";
        echo "<td>".$array['prenom']."</td>";
        echo "<td>".$array['email']."</td>";
        echo "<td>".$array['abo']."</td>";
        echo "<td><a href=\"subsciptions.php?id=".$array["id_perso"]."\">Profile</a>";
        echo "<td><a href=\"history.php?id=".$array["id_perso"]."\">History</a>";
        echo "</tr>";
    }
}