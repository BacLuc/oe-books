<?php
include("function_bereinigen.php");
include("db.php.inc");
if (!empty($_POST['name']))
{

$muster="/^[a-zA-Z].[a-zA-Z]/";
$dblk=db();
$sql="SELECT * FROM user WHERE name='".$_POST['name']."'";
$result=mysql_query($sql);
$array=@mysql_fetch_assoc($result);
if($array['name']=="")
{

 if(preg_match($muster, $_POST['name'])==true)
 {
                  
include ("function_password.php.inc");
$dblk=db();

       $_POST['passwort']=password(5);
$keypw=md5($_POST['passwort']);
       $sqlbefehl="INSERT INTO user (name, pw, bild, email)VALUES('".$_POST['name']."', ";
$sqlbefehl.="'$keypw', '', '".$_POST['name']."@ksoe.ch')";
       $empfaenger="".$_POST['name']."@ksoe.ch";
       $betreff="Registrierung beim Trade Center KSOe";
       $botschaft="Liebe/r ".$_POST['name']."
Danke dass sie sich bei mir registriert haben.
Ihr Username lautet:  ".$_POST['name']."
Ihr Passwort lautet:  ".$_POST['passwort']."
Gruesse
Lucius Bachmann";    
       $absender="lucius.bachmann@ksoe.ch";
       if((mysql_query($sqlbefehl))&&(@mail($empfaenger, $betreff, $botschaft, $absender)))
       {
       echo "Du wurdest registriert<br><a href='login.html'>Zum Login</a>";
       }
       else 
       {
       echo "Leider konntest du nicht registriert werden";
       }

 }
 else
 {
 echo "der Name muss mit einem Punkt dazwischen und ohne Lehrzeichen geschrieben werden. Die anfangsbuchstaben müssen klein sein.";
 }

}
else
{echo "diesen Benutzer gibt es schon. Wenn sie sich noch nicht registriert haben, wenden sie sich an lucius.bachmann@gmx.ch";}

}
else
{echo "name  leer";}

?>
