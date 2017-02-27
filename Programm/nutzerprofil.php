<?
include("function_cookieabgleich.php.inc");
if(cookieabgleich())
{
$user=explode(",",$_COOKIE['user']);
echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>".$user[1]."</a><br><a href='logout.php'>Logout</a></p>";
$dblk=db();
$sql="SELECT Bild FROM user WHERE name='".$user[1]."'";
$result=mysql_query($sql);
$array=mysql_fetch_assoc($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Profil von <?echo $user[1];?></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
</head>
<body>
<center>
<div>
<h1>Pers&ouml;nliches Profil von <?echo "$user[1]";?></h1>
<br>
<br>
<img src="<? echo "".$array['Bild']."";?>" hight="180" width="150"> 
<table>
<tr>
<td>Bild</td><td><form action="changeimage.php" method="POST" enctype="multipart/form-data"><input type="file" name='bild' ></td>
<td><input type="submit" value=" &auml;ndern"></form></td></tr>
<tr>
<td>altes Passwort hier eingeben<br></td>
<td><form action="changepw.php" method="POST"><input type="password" name='pw'></td>
</tr>
<tr>
<td>Hier neues Passwort eingeben</td>
<td><input type="password" name='pwneu'></td>
</tr>
<tr>
<td>Neues Passwort wiederholen</td>
<td><input type="password" name='pwneurepeat'></td>
<td><input type="submit" value="Passwort aendern"></td>
</form>
</tr>
<tr>
<td>
E-mail
</td>
<td>
<?
$sqlbefehlmail="SELECT email FROM user WHERE name='".$user['1']."'";
$x=mysql_query($sqlbefehlmail);
$resultatmail=mysql_fetch_assoc($x);
echo $resultatmail['email']; 
?>
</td>
</tr>
<tr>
<td>
</td>
<td>
<form action="changeemail.php" method="POST">
<input type="text" name="email">
</td>
<td>
<input type="submit" value="Emailadresse &auml;ndern">
</td>
</tr>
</form>
</table>




<br>
<br>
<br>
<br>
<h3>Eigene Angebote</h3>
<br>
<?
$dblk=db();

       if(($_POST['order']=="Nummer")||($_POST['order']==""))
       {
       $_POST['order']="id";
       }
       if(!empty($_POST['textfeld']))
       {
        $sqlbefehl1="SELECT * FROM angebote WHERE Anbieter='".$user[1]."' AND ".$_POST['option']." LIKE'%". $_POST['textfeld']."%' ORDER BY ".$_POST['order']."";
       }
       else
       {
       $sqlbefehl1="SELECT * FROM angebote WHERE Anbieter='".$user[1]."' ORDER BY ".$_POST['order']."";
       }
       $angebote=mysql_query("$sqlbefehl1");
       //f&uuml;r die anzahl zeilen
       $anzahl=mysql_num_rows($angebote);
       echo "<p>$anzahl Eintr&auml;ge:</p>";
       //Tabelle definieren
       echo "<table id='festgelegt' border='1' cellspacing='0'>";
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
        $sqlbefehl1="SELECT * FROM nachhilfestunden WHERE Anbieter='".$user[1]."' AND ".$_POST['option']." LIKE'%". $_POST['textfeld']."%' ORDER BY ".$_POST['order']."";
       }
       else
       {
       $sqlbefehl1="SELECT * FROM nachhilfestunden WHERE Anbieter='".$user[1]."' ORDER BY ".$_POST['order']."";
       }

  
       //Tabelle definieren
       echo "<br><br><h3>Deine Anfragen f&uuml;r Nachhilfestunden:</h3><br><table id='festgelegt' border='1' cellspacing='0'>";
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
echo "Die Benutzererkennung hat sie nicht erkannt, wiederholen sie bitte den login<a href='login.html'><br>ZUM LOGIN</a>";
}

?>

</div>
</div>
</div>
</center>
</body>
</html>
