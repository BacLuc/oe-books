<?
include ("function_cookieabgleich.php.inc");
if(cookieabgleich())
{
$user=explode(",",$_COOKIE['user']);
echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>".$user[1]."</a><br><a href='logout.php'>Logout</a></p>";
$dblk=db();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Angebote</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="erster_style.css">
</head>
<body>
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
<?

$besucher="".$_POST['besucher']."";
$sqlbefehlmail="SELECT email FROM user WHERE name='$besucher'";
$x=mysql_query($sqlbefehlmail);
$resultatmail=mysql_fetch_assoc($x);
include ("function_bereinigen.php");
       $empfaenger="".$resultatmail['email']."";
       $betreff=bereinigen($_POST['betreff'],"NOHTML",3,1);
       $botschaft=bereinigen($_POST['content'],"NOHTML",8,1);
       $absender="".$user[1]."@ksoe.ch";
       if(@mail($empfaenger, $betreff, $botschaft, "FROM: ".$absender.""))
       {
       echo "Die Email wurde zugestellt<br><a href='angebot.php'>zu den Angeboten</a>";
       }
       else 
       {
       echo "Leider konnte kein E-Mail abgeschickt werden.<br><a href='angebot.php'>zu den Angeboten</a>";
       }
}
else
{
echo "Sie haben momentan keine Berechtigung, diese Seite zu sehen.<a href='login.html'>Zum Login</a>";
}
?>
</div>
</div>
</body>
</html>
