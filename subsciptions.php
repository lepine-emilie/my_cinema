<?php
include "db_connection.php";

ini_set('display_errors', 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$conn = dbconnection();
if (isset($_GET['subs']))
{
    update_sub();
}

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $select_member = $conn->prepare("SELECT fiche_personne.nom AS nom, 
        fiche_personne.prenom, fiche_personne.ville, membre.id_abo, abonnement.nom AS abo
        FROM fiche_personne INNER JOIN membre ON fiche_personne.id_perso = 
        membre.id_fiche_perso INNER JOIN abonnement ON membre.id_abo =
        abonnement.id_abo WHERE id_perso = ".$id);
    $select_member->execute();
    $values = $select_member->fetchAll(PDO::FETCH_ASSOC);
    info_member($values);
    drop_sub($id);
    echo "<button onclick=\"history.go(-1);\">Back </button>";
}
function info_member($values){
    foreach ($values as $array){
        echo "<tr>";
        echo "<p>Last Name</p><tr>".$array['nom']."<br></tr>";
        echo "<p>First Name</p><tr>".$array['prenom']."<br></tr>";
        echo "<p>City</p><tr>".$array['ville']."<br></tr>";
        echo "<p>Subscription</p><tr>".$array['abo']."<br></tr>";
        echo "</tr>";
    }
}

function drop_sub($id){
    echo "<form method='get'>";
    echo "<select name=\"subs\">";
    echo "<option value=\"0\">VIP</option>";
    echo "<option value=\"1\">GOLD</option>";
    echo "<option value=\"2\">Classic</option>";
    echo "<option value=\"3\">Pass Day</option>";
    echo "<option value=\"4\">Malsch</option>";
    echo "<option value=\"5\">Non Sub</option>";
    echo "</select>";
    echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
    echo "<input type='submit'><br>";
    echo "</form>";
}

function update_sub(){
    $conn = dbconnection();
    $abo = $_GET['subs'];
    $id = $_GET['id'];
    $select_abo = $conn -> prepare("UPDATE membre SET id_abo =".$abo." WHERE membre.id_fiche_perso =".$id);
    $select_abo ->execute();
}