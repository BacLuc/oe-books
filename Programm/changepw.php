<?
include("function_cookieabgleich.php.inc");
if (cookieabgleich())
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Passwort &auml;ndern</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="erster_style.css">
</head>
<body>
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
<?
$user=explode(",",$_COOKIE['user']);
echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>".$user[1]."</a><br><a href='logout.php'>Logout</a></p>";

$dblk=db();

  $sqlbefehl="SELECT * FROM `user` WHERE name='".$user['1']."'";
  $resultat=mysql_query($sqlbefehl);
  $array=mysql_fetch_assoc($resultat);
if($_POST['pwneu']==$_POST['pwneurepeat'])
{
if($array['pw']==md5($_POST['pw']))
{
$_POST['pwneu']=md5($_POST['pwneu']);
$sql2="UPDATE user SET pw='".$_POST['pwneu']."' WHERE name='".$user['1']."'";

   if(mysql_query($sql2))
   {
    echo "Das Passwort wurde ge&auml;ndert";
    echo "<br><a href='angebot.php'>Zu den Angeboten</a>"; 
    
   
   
   }
   else
   {
    echo "Leider konnte das Passwort nicht ge&auml;ndert werden";

   }

}
else
{
echo "Das alte Passwort wurde nicht korrekt eingegeben";
}
}
else
{
echo "Das neue PW stimmt nicht mit der &Uuml;berprüfungswiederholung überein";
}
?>
</div>
</div>
</body>
</html>
<?
}
else
{
echo "Die Benutzererkennung hat sie nicht erkannt, wiederholen sie bitte den login<a href='login.html'><br>ZUM LOGIN</a>";
}
?>
