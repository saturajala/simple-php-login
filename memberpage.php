<?php
include 'base.php';

/* if(isset($_SESSION['Username'])) {
echo "Your session is running " . $_SESSION['Username'];
}
else { echo "Session not running";} */

if (isset($_SESSION['Username']) && isset($_SESSION['Password'])) {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
            <title>User Management System</title>
            <link rel="stylesheet" href="style.css" type="text/css" />
    </head>  
    <style>#main2{overflow-y: scroll; height: 350px;}</style>
<body>  
<div id="main">
    <div id="main2"
    
    
    <?php
date_default_timezone_set('europe/helsinki');
/*Tutkitaan tuleeko lomakkeelta skriptille sen tarvitsemat arvot.*/
if (isset($_POST['viesti'])) {

/*sijoitetaan lomakkeelta saadut muuttujat yksinkertaisemman
näköisiin muuttujiin.*/
$viesti=$_POST['viesti'];


/*Luodaan muuttujaan $uusirivi uusi vieraskirjamerkintä. 
 date() -funktiolla lisätään päivämäärä. strip_tags() 
 poistaa lomakkeeseen syötetyistä tiedoista HTML- 
 ja PHP-tagit jos käyttäjä on niitä syöttänyt
 (voivat häiritä vieraskirjan toimintaa).*/
  $uusirivi = '<p><b>' . date('d.m.Y H:i') . ', ' .
  strip_tags($_SESSION['Username']) . '</b>: ' . strip_tags($viesti) .
  '</p>';

  
  $filename = "vkirja.txt";
  $handle = fopen($filename, "rb");
  $contents = fread($handle, filesize($filename));
  fclose($handle);
  
  $old_content = file_get_contents("vkirja.txt");
  file_put_contents("vkirja.txt", $uusirivi.$old_content);
  
  // captcha
  
 /* session_start();
if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
echo "Correct Code Entered";
}
else
{
die("Wrong Code Entered");
} */
  
  
  }

        
  
?>

<html>
    <meta charset ="utf-8">
<body>
<h3>Messages:</h3>

<!--vkirja.txt -tiedoston sisältö tulostetaan tähän-->

<?php include ('vkirja.txt'); ?>


<hr>

<!--Tässä on lomake johon viestit kirjoitetaan. Tässä tapauksessa 
  se on samassa tiedostossa kuin lomakkeen käsittelevä koodi. Jos annat 
  action-attribuutille arvon action="<?php echo $_SERVER['PHP_SELF'];?>"
  niin lomakkeen tiedot lähetään aina tiedostolle itselleen vaikka 
  tiedoston nimi ei olisikaan vkirja.php -->

</div>
<form action="memberpage.php" method="post">
  Nimesi: <?php echo $_SESSION['Username']; ?>
                 <br></br>
  Viestisi: <input name="viesti" size="50"><br>
          <br>
  
  <!-- <img src="asdf" /><br/>
  Kuvan teksti: <input name="captcha"><br/>
  
<input type="submit" value=" Jätä viesti "> -->

  <!-- <p>Todista olevasi ihminen:</p>
<input name="captcha" type="text">
<img src="captcha.php" /><br> -->
<input name="submit" type="submit" value="Jätä viesti">
</form>


<a href='logout.php'>Log out</a>
    
</div>
</body>
</html>


<?php
}

else {
    
    ?> <meta http-equiv="refresh" content="0;index.php"> <?php
    
}


?>