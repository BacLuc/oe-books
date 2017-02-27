<?
include ("function_cookieabgleich.php.inc");
if(cookieabgleich())
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Anzeigebild &auml;ndern</title>
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



if(isset($_FILES['bild']))
{



$urdateiname=$_FILES['bild']['name'];
if(empty($endung))
{
$pos=1+strrpos($urdateiname,".");
$typ=substr($urdateiname,$pos,strlen($urdateiname)-$pos);
}
if($typ!="php")
{









$sql="UPDATE user SET Bild='/bilder_user/".$user[1].".".$typ."' WHERE name='".$user[1]."'";
if((mysql_query($sql))&&(move_uploaded_file($_FILES['bild']['tmp_name'], "./bilder_user/".$user[1].".".$typ."")))
{
echo "Bild ist Online<br><a href='angebot.php'>zu den Angeboten</a>";


}
else
{echo "Bild konnte nicht gespeichert werden";}




}
else
{
echo"php dateien sind nicht erlaubt";
}
}
else
{
echo "Fehler beim &uuml;bertragen des Bildes";
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

