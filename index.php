<?php

if(!isset($_GET['page']) || empty($_GET['page'])){
    header('Location: /main');
    exit();
}

require('db_connection.php');

switch ($_GET['page']) {
    case 'main':
        $page = getTemplate('main');
        echo $page;
        break;

    case 'profil':
        $page = getTemplate('profil');
        echo $page;
        break;

    case 'deposit':
        $page = getTemplate('deposit');
        echo $page;
        break;

    case 'shop':
        $page = getTemplate('shop');
        echo $page;
        break;

    case 'freecoins':
        $page = getTemplate('freecoins');
        echo $page;
        break;
    case 'login':
        include_once('php/login.php');
        break;
    case 'disconnet':
        setcookie('hash');
        unset($_COOKIE['hash']);
        header('Location: /main');
        break;

    default:
        header('Location: /main');
}



function getTemplate($name, $in = null) {
    extract($in);
    ob_start();
    include "template/" . $name . ".php";
    $text = ob_get_clean();
    return $text;
}

function getConcept($name, $in = null) {
    extract($in);
    ob_start();
    include "php/" . $name . ".php";
    $text = ob_get_clean();
    return $text;
}
?>