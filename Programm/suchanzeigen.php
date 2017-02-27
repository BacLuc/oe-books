<?
include("function_cookieabgleich.php.inc");
include("function_bereinigen.php");
if (cookieabgleich())
{

   $user=explode(",",$_COOKIE['user']);
   echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>
   ".$user[1]."</ a><br><a href='logout.php'>Logout</a></p>";
 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Suchanzeigen</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
</head>
<body>
<center>
<div>
<h1>Diese B&uuml;cher werden gesucht</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<table border='0'>
<tr>
<td>Alle B&uuml;cher anzeigen, die als </td>
<td><select name="option"><option>Titel</option><option>Autor</option><option>Art</option><option>Sprache</option><option>Beschreibung</option></select>
</td>
<td> <input type="text" name="textfeld"> haben
</td>
</tr>
<tr>
<td>
Ordnen nach
</td>
 <td><select name="order"><option>Nummer</option><option>Titel</option><option>Autor</option><option>Art</option><option>Sprache</option><option>Beschreibung</option><option>Preis</option></select>
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
        {$sqlbefehl1="SELECT * FROM angebote WHERE suche='on' AND  ".$_POST['option']." LIKE'%". $_POST['textfeld']."%' ORDER BY ".$_POST['order']." DESC";}
        else
        {$sqlbefehl1="SELECT * FROM angebote WHERE suche='on' AND  ".$_POST['option']." LIKE'%". $_POST['textfeld']."%' ORDER BY ".$_POST['order']."";}
       }
       else
       {
        if($_POST['order2']=="abfallend")
       {$sqlbefehl1="SELECT * FROM angebote WHERE suche='on' ORDER BY ".$_POST['order']." DESC";}
       else
       {$sqlbefehl1="SELECT * FROM angebote WHERE suche='on' ORDER BY ".$_POST['order']."";}
       }
       $angebote=mysql_query("$sqlbefehl1");
       //f&uuml;r die anzahl zeilen
       $anzahl=mysql_num_rows($angebote);
       echo "<p>$anzahl Eintr&auml;ge:</p>";
       //Tabelle definieren
       echo "<table id='festgelegt' border='1' cellspacing='0' max-height: 5px;>";
       //Kopfzeile
       echo "<tr><th>Titel</th><th>Autor</th><th>Art</th><th>Sprache</th><th>Beschreibung</th><th>Preis</th><th>Anbieter</th></tr>";

//while Schleife
while ($row=mysql_fetch_row($angebote))
  {
   echo "<tr>";
   //foreach schleife
     foreach($row as $key => $value)
     {
       $felder=count($row);
       for($c=0;$felder>$c;$c++)
       {
       $row['$c']=bereinigen($row['$c'],"NOHTML",1,1);
       }
       if($key=='0')
       {
        $id=$value;
       }
       elseif($key=='1')
       {
        echo "<td><a href='detail.php?id=$id'>$value</a></td>";
       }
       elseif($key=='8')
       {
        
       }
       elseif($key==7)
       {
        echo "<td><a href='nutzerprofilfremd.php?user=$value'>$value</a></td>";
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
