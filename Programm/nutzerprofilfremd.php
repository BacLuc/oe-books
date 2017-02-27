<?
$besucher=$_GET['user'];
include ("function_cookieabgleich.php.inc");
include ("function_bereinigen.php");
if(cookieabgleich())
{
$user=explode(",",$_COOKIE['user']);
echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>".$user[1]."</a><br><a href='logout.php'>Logout</a></p>";
$dblk=db();
$sql="SELECT * FROM user WHERE name='".$besucher."'";
$result=mysql_query($sql);
$array=mysql_fetch_assoc($result);?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Profil von <?echo $besucher;?></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
</head>
<body>
<center>
<div>
<h1>Pers&ouml;nliches Profil von <?echo "$besucher";?></h1>
<br>
<br>
<img src="<? echo "".$array['Bild']."";?>" hight="180" width="150"> 

<form action='mailer.php' method='POST'>
<input type='text' value='Betreff' name='betreff'><br>
<textarea name='content' cols='50' rows='10'>
Emailtext hier schreiben</textarea><input type="hidden" value="<?echo "$besucher";?>" name="besucher">
<br><input type='submit' value="Email absenden" name="submit"></form>
<br>

<?php
echo "$besucher hat folgende Anzeigen aufgeschaltet
<br>
<br>";
$dblk=db();

       if(($_POST['order']=="Nummer")||($_POST['order']==""))
       {
       $_POST['order']="id";
       }
       if(!empty($_POST['textfeld']))
       {
        $sqlbefehl1="SELECT * FROM angebote WHERE Anbieter='$besucher' AND ".$_POST['option']." LIKE'%". $_POST['textfeld']."%' ORDER BY ".$_POST['order']."";
       }
       else
       {
       $sqlbefehl1="SELECT * FROM angebote WHERE Anbieter='$besucher' ORDER BY ".$_POST['order']."";
       }
       $angebote=mysql_query("$sqlbefehl1");
       //f&uuml;r die anzahl zeilen
       $anzahl=mysql_num_rows($angebote);
       echo "<p>$anzahl Eintr&auml;ge:</p>";
       //Tabelle definieren
       echo "<table id='festgelegt' border='1' cellspacing='0' text-align='center'>";
       //Kopfzeile
       echo "<tr><th>Titel</th><th>Autor</th><th>Art</th><th>Sprache</th><th>Beschreibung</th><th>Preis</th><th>Anbieter</th><th>Suchanzeige/Angebot</th></tr>";

//while Schleife
while ($row=mysql_fetch_row($angebote))
{
echo "<tr>";
//foreach schleife
foreach($row as $key => $value)
{
if($key=='0')
       {
        $id=$value;
       }
       elseif($key=='1')
       {
        echo "<td><a href='detail.php?id=$id'>$value</a></td>";
       }
elseif($key==8)
{
if($value=='on')
{
echo "<td>Suchanzeige</td>";
}
else
{
echo "<td>Angebot</td>";
}
}
else
{
echo "<td>$value&nbsp;</td>";
}
}
echo "</tr>";
}
echo "<br></table>";
mysql_close();
$dblk=db();

       if(($_POST['order']=="Nummer")||($_POST['order']==""))
       {
       $_POST['order']="id";
       }
       if(!empty($_POST['textfeld']))
       {
        $sqlbefehl1="SELECT * FROM nachhilfestunden WHERE Anbieter='$besucher' AND ".$_POST['option']." LIKE'%". $_POST['textfeld']."%' ORDER BY ".$_POST['order']."";
       }
       else
       {
       $sqlbefehl1="SELECT * FROM nachhilfestunden WHERE Anbieter='$besucher' ORDER BY ".$_POST['order']."";
       }

  
       //Tabelle definieren
       echo "<br><br><h3>Seine Anfragen f&uuml;r Nachhilfestunden:</h3><br><table id='festgelegt' border='1' cellspacing='0'>";
     $angebote=mysql_query("$sqlbefehl1");
       //f&uuml;r die anzahl zeilen
       $anzahl=mysql_num_rows($angebote);
       echo "<p>$anzahl Eintr&auml;ge:</p><br>";
       //Kopfzeile
       echo "<tr><th>Anbieter</th><th>Klasse</th><th>Fach</th><th>Beschreibung</th><th>Wochenstunden</th><th>Lohn pro Stunde</th></tr>";

//while Schleife
while ($row=mysql_fetch_row($angebote))
{
echo "<tr>";
//foreach schleife
foreach($row as $key => $value)
{
if($key=='0')
       {
        $id=$value;
       }
       elseif($key=='1')
       {
        echo "<td><a href='detailnachhilfestunden.php?id=$id'>$value</a></td>";
       }
else
{
echo "<td>$value&nbsp;</td>";
}
}
echo "</tr>";
}
echo "<br></table>";
mysql_close();
}


else
{
echo "Sie haben momentan keine Berechtigung, diese Seite zu sehen.<a href='login.html'>Zum Login</a>";
}
?>
</div>
</div>
</div>
</body>
</html>
