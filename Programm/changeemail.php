<?
include("function_cookieabgleich.php.inc");
if (cookieabgleich())
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Emailadresse &auml;</title>
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

include ("function_bereinigen.php");
if(bereinigen($_POST['email'],"EMAIL",6,3))
{
$sqlbefehl="UPDATE user SET email='".$_POST['email']."' WHERE name='".$user['1']."'";
if(mysql_query($sqlbefehl))
{
echo "<br>Email wurde erfolgreich ge&auml;ndert";


}
else
{echo "Email konnte leider nicht ge&auml;ndert werden";}

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
