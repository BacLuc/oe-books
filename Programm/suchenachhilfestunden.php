<?
include("function_cookieabgleich.php.inc");
if (cookieabgleich())
{

   $user=explode(",",$_COOKIE['user']);
   echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>
   ".$user[1]."</ a><br><a href='logout.php'>Logout</a></p>";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Übersicht Nachhilfelehrer</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
<center>
<div>
<h1>Folgende Suchanzeigen für Nachhilfestunden sind Online</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<table>
<tr>
<td>
Alle Nachhilfeangebote anzeigen, die als
</td>
<td>
 <select name="option"><option>Anbieter</option><option>Klasse</option><option>Fach</option><option>Preis</option><option>Beschreibung</option></select>
</td>
<td>
 <input type="text" name="textfeld"> haben
</td>
</tr>
<tr>
<td>
Ordnen nach
</td>
<td>
 <select name="order"><option>Nummer</option><option>Anbieter</option><option>Klasse</option><option>Fach</option><option>Beschreibung</option><option>Wochenstunden</option><option>Preis</option></select>
</td>
<td>
<select name="order2"><option>aufsteigend</option><option>abfallend</option></select>
</td>
</tr>
<tr>
<td></td>

<td>
<input type="submit" value="anwenden">
</td>                                           
</tr>
</table>                                      

</form>
<br />
<br />

<?php  
$dblk=db();
       if(($_POST['order']=="Nummer")||($_POST['order']==""))
       {
       $_POST['order']="id";
       }
       if(!empty($_POST['textfeld']))
       {if($_POST['order2']=="abfallend")
        {$sqlbefehl1="SELECT * FROM nachhilfestunden WHERE ".$_POST['option']." LIKE'%". $_POST['textfeld']."%' AND suche='on' ORDER BY ".$_POST['order']." DESC";}
        else
        {$sqlbefehl1="SELECT * FROM nachhilfestunden WHERE ".$_POST['option']." LIKE'%". $_POST['textfeld']."%' AND suche='on' ORDER BY ".$_POST['order']."";}
       }
       else
       {
        if($_POST['order2']=="abfallend")
       {$sqlbefehl1="SELECT * FROM nachhilfestunden WHERE suche='on' ORDER BY ".$_POST['order']." DESC";}
       else
       {$sqlbefehl1="SELECT * FROM nachhilfestunden WHERE suche='on' ORDER BY ".$_POST['order']."";}
       }
       $angebote=mysql_query("$sqlbefehl1");
       //f&uuml;r die anzahl zeilen
       $anzahl=mysql_num_rows($angebote);
       echo "<p>$anzahl Eintr&auml;ge:</p>";
       //Tabelle definieren
       echo "<table id='festgelegt' border='1' cellspacing='0' empty-cells:'show' max-width:'80em'>";
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
       elseif($key=='7')
       {
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
?>
</div>
</div>
</div>
</center>
</body>
</html>
<?
}
else
{
echo "Die Benutzererkennung hat sie nicht erkannt, wiederholen sie bitte den login<a href='login.html'><br>ZUM LOGIN</a>";
}
       
       ?>

