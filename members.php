<?php include "searchmembers.php" ?>
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
    <p>Look for a member</p>
</div>
<form method="get">
    <section>
        <label for="firstname">First Name</label>
        <input name="firstname" type="text">
        <label for="lastname">Last Name</label>
        <input name="lastname" type="text">
    </section>
    <input type="submit">
</form>

<div>
    <table>
        <?php searchMember()?>
    </table>
</div>