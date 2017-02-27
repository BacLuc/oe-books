<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Angebot l&ouml;schen</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="erster_style.css">
</head>
<body>
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
<?
include("db.php.inc");
$dblk=db();
mysql_select_db("test");
$sql="DELETE FROM angebote WHERE id='".$_GET['artnr']."'";
if(mysql_query("$sql"))
{
echo"<p align=center><br><br><br><br><br>Das Angebot wurde gel&ouml;scht<br><a href='angebot.php'>Zu den Angeboten</a></p>";
}
?>
</div>
</div>
</body
</html>
