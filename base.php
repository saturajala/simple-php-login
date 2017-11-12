<?php

/*
 * base.php on perustiedosto, jota voidaan käyttää jokaisella
 * sivulla.
 */


/* 
 * If a session has already been created, this function will recognize that 
 * and carry that session over to the next page.
 */
session_start();
 
$dbhost = "localhost"; //
$dbname = "Database_php"; // tietokannan nimi
$dbuser = "root"; // käyttäjätunnus phpmyadminiin/tietokantaan
$dbpass = ""; // salasana tietokantaan
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());


?>
