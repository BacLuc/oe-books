<?
include ("function_cookieabgleich.php.inc");
$user=explode(",",$_COOKIE['user']);
echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>".$user[1]."</a><br><a href='logout.php'>Logout</a></p>";
if(cookieabgleich())
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Detailansicht</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="erster_style.css">
</head>
<body>
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
<?



$dblk=db();
$dborder="SELECT * FROM angebote WHERE id='".$_GET['id']."'";
$result=mysql_query($dborder);
$array=mysql_fetch_assoc($result);
echo "<br><br><br><div style='width: 600px'><center>";
//Tabelle Definieren
echo "<table border='0' cellspacing='6'>";
foreach ($array as $key=>$value)
{
 if($key=='id')
 {}
elseif($key=='suche')
 {}
 else
 {
 echo "<tr><td>$key</td><td>$value</td></tr>";
 }

 if($key=="Anbieter")
 {
 $anbieter=$value;
 $dbefehl2="SELECT * FROM offerten WHERE angebote_id='".$_GET['id']."'";
$z=mysql_query($dbefehl2);
$result5=mysql_num_rows($z);
 echo "<tr><td>Interessenten</td><td>$result5</td></tr>";

 if($anbieter==$user[1])
{
$id=$_GET['id'];
echo "<td></td><td><a href='delete.php?artnr=".$_GET['id']."'>l&ouml;schen</a></td>";
}
if($anbieter!=$user[1])
{
$dbefehl2="SELECT * FROM offerten WHERE angebote_id='".$_GET['id']."'";
$z=mysql_query($dbefehl2);
$result5=mysql_num_rows($z);

echo "<td></td><td><a href='interesse.php?id=".$array['id']."'>interesse anmelden</a></td>";
}
 }

}

echo "</table></center></div>";



?>
</div>
</div>
</body
</html>
<?
}
else
{
echo "Die Benutzererkennung hat sie nicht erkannt, wiederholen sie bitte den login<a href='login.html'><br>ZUM LOGIN</a>";
}
?>

