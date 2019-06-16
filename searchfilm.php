<?php
include "db_connection.php";

function main(){
    $genre = $_GET['genre'];
    $distrib = $_GET['distributor'];

    if ($genre != "null" && $distrib == "null"){
        searchGenre();
    }
    elseif($genre == "null" && $distrib != "null"){
        searchdistributor();
    }
    else{
        searchTitle();
    }
}
function searchGenre(){
    $conn = dbconnection();
    $genre = $_GET['genre'];
    $titre = $_GET['title'];
    if (isset($_GET['genre']))
    {
        $offset = $_GET['page'] * $_GET['limit'];
        $select_genre = $conn->prepare("SELECT titre, id_film FROM film INNER JOIN genre 
            ON film.id_genre=genre.id_genre WHERE genre.nom ='".$genre."' AND titre 
            LIKE '%".$titre."%'LIMIT ".$_GET['limit']." OFFSET ".$offset);
        $select_genre->execute(array("%".$genre."%", "%".$genre."%"));
        $values = $select_genre->fetchAll(PDO::FETCH_ASSOC);
        foreach ($values as $array){
            echo "<tr>";
            echo "<td>".$array['titre']."</td>";
            echo "<td><a href=\"infofilm.php?id=".$array["id_film"]."\">Lien</a>";
            echo "</tr>";
        }
    }
}
function searchdistributor(){
    $conn = dbconnection();
    $distrib = $_GET['distributor'];
    $titre = $_GET['title'];
    if (isset($_GET['distributor']))
    {
        $offset = $_GET['page'] * $_GET['limit'];
        $select_distrib = $conn->prepare("SELECT titre, id_film FROM film INNER JOIN distrib 
            ON film.id_distrib=distrib.id_distrib WHERE distrib.nom ='".$distrib."'AND titre 
            LIKE '%".$titre."%' LIMIT ".$_GET['limit']." OFFSET ".$offset);
        $select_distrib->execute(array("%".$distrib."%", "%".$distrib."%"));
        $values = $select_distrib->fetchAll(PDO::FETCH_ASSOC);
        foreach ($values as $array){
            echo "<tr>";
            echo "<td>".$array['titre']."</td>";
            echo "<td><a href=\"infofilm.php?id=".$array["id_film"]."\">Lien</a>";
            echo "</tr>";
        }
    }
}
function searchTitle(){
    $conn = dbconnection();
    $title = $_GET['title'];
    if (isset($_GET['title']))
    {
        $offset = $_GET['page'] * $_GET['limit'];
        $select_title = $conn->prepare("SELECT titre, id_film FROM film 
            WHERE titre LIKE '%".$title."%' LIMIT ".$_GET['limit']." OFFSET ".$offset);
        $select_title->execute(array("%".$title."%", "%".$title."%"));
        $values = $select_title->fetchAll(PDO::FETCH_ASSOC);
        foreach ($values as $array){
            echo "<tr>";
            echo "<td>".$array['titre']."</td>";
            echo "<td><a href=\"infofilm.php?id=".$array["id_film"]."\">Lien</a>";
            echo "</tr>";
        }
    }
}
?>