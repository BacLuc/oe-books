<? setcookie("user","");?>
<?php
include ("db.php.inc");
$dblk=db();
  
if((!empty($_POST['name']))&&(!empty($_POST['passwort'])))
{

       
  $sqlbefehl="SELECT * FROM `user` WHERE name='".$_POST['name']."'";
  $resultat=mysql_query($sqlbefehl);
  $array=mysql_fetch_assoc($resultat);
  
  if($array['pw']==md5($_POST['passwort']))
  {

//letzten Eintrag auslesen und cookienr generieren
$sqlbefehl3="SELECT cookienr FROM cookieabgleich ORDER BY id DESC LIMIT 0,1";
$letzenr=mysql_query($sqlbefehl3);
$letzenr=mysql_fetch_assoc($letzenr);
$cookienr=349+$letzenr['cookienr'];
//Zeitstempel
$zeitstempel=date("Y:m:d:H:i:s");


 

$sqlbefehl2="INSERT INTO cookieabgleich(id, cookienr, cookieinhalt, zeitstempel)VALUES('', '$cookienr', '".$_POST['name']."', '$zeitstempel')";

if(mysql_query($sqlbefehl2))
{
echo "<p align='right'> Willkommen ".$_POST['name']."<br><a href='logout.html'>Logout</a></p>";
echo "<p align='center'><table><tr><td><br><br><br>Das Passwort ist Korrekt.<br></td></tr>";
$name=$_POST['name'];
echo"<tr><td><form action='weiterleiten.php' method='POST'>
<input type='hidden' name='cookienr' value='$cookienr'>
<input type='hidden' name='name' value='$name'>
<input type='hidden' name='zeit' value='$zeitstempel'>
<input type='submit' value='zu den Angeboten'>
</form></td></tr></table></p>";
  
}
  }
  else
  {
  echo "Name oder Passwort falsch";
  }
}
else
{
echo "Bitte Name UND Passwort eingeben";
}
mysql_close();
?>
