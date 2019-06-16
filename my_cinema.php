<?php include "searchfilm.php" ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <title>My Cinema</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header> My Cinema</header>
    <div>
        <p>Chercher un film</p>
    </div>
    <form method="get">
        <label for="genre">Genre</label>
        <select id="genre" name="genre">
            <option value="null"></option>
            <option value="detective">Detective</option>
            <option value="dramatic comedy">Dramatic Comedy</option>
            <option value="science fiction">Science Fiction</option>
            <option value="drama">Drama</option>
            <option value="documentary">Documentary</option>
            <option value="animation">Animation</option>
            <option value="comedy">Comedy</option>
            <option value="fantasy">Fantasy</option>
            <option value="action">Action</option>
            <option value="thriller">Thriller</option>
            <option value="various">Various</option>
            <option value="historical">Historical</option>
            <option value="western">Western</option>
            <option value="music">Music</option>
            <option value="musical">Musical</option>
            <option value="horror">Horror</option>
            <option value="war">War</option>
            <option value="unknown">Unkwown</option>
            <option value="spying">Spy</option>
            <option value="biography">Biography</option>
            <option value="experimental">Experimental</option>
            <option value="short film">Short Film</option>
        </select>
        <label for="title">Title</label>
        <input id="title" name="title" type="text">
        <label for="distributor">Distributor</label>
        <select id="distributor" name="distributor">
            <option value= "null"></option>
            <option value="gimages">Gimages</option>
            <option value="les films du losange">Les films du losange</option>
            <option value="mk2 diffusion">Mk2 diffusion</option>
            <option value="rezo films">Rezo films</option>
            <option value="studio images 5">Studio images 5</option>
            <option value="eiffel productions">Eiffel productions</option>
            <option value="cerito films">Cerito films</option>
            <option value="france 3 cinéma">France 3 Cinéma</option>
            <option value="tartan films">Tartan films</option>
            <option value="monarchy enterprises b.v.">Monarchy enterprises b.v.</option>
            <option value="advanced">Advanced</option>
            <option value="the vista organisation group">The vista organisation group</option>
            <option value="les films balenciaga">Les films balenciaga</option>
            <option value="art-light productions">Art-light productions</option>
            <option value="telinor">Telinor</option>
            <option value="bandidos films">Bandidos films</option>
            <option value="parco co, ltd">Parco co, ltd</option>
            <option value="transfilm">Transfilm</option>
            <option value="dmvb films">Dmvb films</option>
            <option value="davis-panzer productions">Davis-panzer productions</option>
            <option value="idea productions">Idea productions</option>
            <option value="vision international">Vision international</option>
            <option value="films a2">Films a2</option>
            <option value="dog eat dog productions">Dog eat dog productions</option>
            <option value="the carousel pictures company">The carousel pictures company</option>
        </select>
        <label for="limit">Max Results per page</label>
        <select id="limit" name="limit">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="hidden" name="page" value="0">
        <input type="submit">
    </form>
    <div>
        <a id="previous" href="<?php
        $page = $_GET['page'];
        $before = $page - 1;
        $url = $_SERVER['REQUEST_URI'];
        $length = strlen($page);
        $url = substr($url, 0, -$length);
        $urlbefore = $url.$before;
        echo $urlbefore;?>" class="previous">Previous</a>
        <a id="next" href="<?php
        $page = $_GET['page'];
        $after = $page + 1;
        $length = strlen($page);
        $url = $_SERVER['REQUEST_URI'];
        $url = substr($url, 0, -$length);
        $urlafter = $url.$after;
        echo $urlafter;?>" class="next">Next</a>

        <table>
            <?php main();?>
        </table>
    </div>
</body>
