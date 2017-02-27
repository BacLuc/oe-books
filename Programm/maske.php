<?
include ("function_cookieabgleich.php.inc");
if(cookieabgleich())
{
$user=explode(",",$_COOKIE['user']);
echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>".$user[1]."</a><br><a href='logout.php'>Logout</a></p>";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Angebot/Suche erstellen</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
</head>
<body>
<center>
<h1>Angebot/Suche erstellen</h1>
<br />
<br />
<br />
<table border='0'>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post">

<tr><td>Typ</td>                       <td><select name="typ">
                            <option>Angebot</option>
                            <option>Suche</option>
                              </select>
                            </td></tr>
<tr><td>Titel</td>                       <td><input type="text" name="titel"></td></tr>
<tr><td>Autor (Nachname, Vorname(n))</td><td><input type="text" name="autor"></td></tr>
<tr><td>Art    </td>                     <td><select name="art">
                            <option>Schulbuch</option>
                            <option>Sachbuch</option>
                            <option>Literatur</option>
                            <option>Bilderbuch</option>
                            <option>Comic</option>
                            <option>Film</option>
                            <option>Computerspiel</option>
                            <option>Audio-CD</option>
                            <option>Nachschlagewerk</option>
                          
                            </select>
                            </td></tr>
                            
<tr><td>Sprache </td>                    <td><select name="sprache">
                            <option>Deutsch</option>
                            <option>Englisch</option>
                            <option>Franz&ouml;sisch</option>
                            <option>Italienisch</option>
                            <option>Spanisch</option>
                            <option>Latein</option>
                            <option>Griechisch</option>
                            </select></td></tr>
                            
                            
<tr><td>oder eine andere Sprache</td>    <td><input type="text" name="otherlanguage"></td></tr>
<tr><td>Kurze Beschreibung </td>         <td><textarea name="beschreibung" cols="50" rows="5"></textarea></td></tr>
<tr><td>Preis</td><td><input type="text" name="preis">CHF</td></tr><br>
<tr><td></td><td>
<input type="submit" value="Angebot erstellen" name="submit"></td></tr>
</form>
</table>
<?php
include("function_bereinigen.php");
include("vergleich.php.inc");

if(!empty($_POST))
{
if(bereinigen($_POST['preis'],"PRICE",3,3)==true)
{
if(bereinigen($_POST['titel'],"NOHTML",3,3)==true)
{
  if(bereinigen($_POST['autor'],"NOHTML",3,3)==true)
  {
    
       if(bereinigen($_POST['beschreibung'],"NOHTML",8,3)==true)
       {
         if(bereinigen($_POST['otherlanguage'],"NOHTML",2,3))
         {
         $_POST['sprache']=$_POST['otherlanguage'];
         }

$dblk=db();

$_POST[titel]=bereinigen($_POST[titel],"NOHTML",3,1);
$_POST[autor]=bereinigen($_POST[autor],"NOHTML",3,1);
$_POST[sprache]=bereinigen($_POST[sprache],"NOHTML",3,1);
$_POST[beschreibung]=bereinigen($_POST[beschreibung],"NOHTML",3,1);
$_POST[preis]=bereinigen($_POST[preis],"NOHTML",3,1);

       $sqlbefehl="INSERT INTO angebote".
       "(id, Titel, Autor, Art, Sprache, Beschreibung, Preis, Anbieter, suche)VALUES('', '$_POST[titel]', '$_POST[autor]', '$_POST[art]', '$_POST[sprache]', '$_POST[beschreibung]', '$_POST[preis]', '$user[1]', 'off')";
$suchevonvergleich="on";

if($_POST["typ"]=="Suche")
{
$sqlbefehl="INSERT INTO angebote".
       "(id, Titel, Autor, Art, Sprache, Beschreibung, Preis, Anbieter, suche)VALUES('', '$_POST[titel]', '$_POST[autor]', '$_POST[art]', '$_POST[sprache]', '$_POST[beschreibung]', '$_POST[preis]', '$user[1]', 'on')";
$suchevonvergleich="off";

}      
         if(mysql_query($sqlbefehl))
         {
         echo "<p>Angebot wurde erstellt</p>";
         $x=vergleich("".$_POST['titel']."", "angebote", "Titel", "$suchevonvergleich");
         $resultatvergleich=mysql_query($x);

if(mysql_fetch_row($resultatvergleich))
{
if($suche=='off')
{$wassuchstdu="Suchanzeigen";}
else
{$wassuchstdu="Angebote";}
echo "Suchst du vielleicht eines dieser $wassuchstdu:<br><table id='festgelegt' border='1' cellspacing='0' max-height: 5px;>";
       //Kopfzeile
       echo "<tr><th>Titel</th><th>Autor</th><th>Art</th><th>Sprache</th><th>Beschreibung</th><th>Preis</th><th>Anbieter</th></tr>";

//while Schleife
while ($row=mysql_fetch_row($resultatvergleich))
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
       if($key=='1')
       {
        echo "<td><a href='detail.php?id=$id'>$value</a></td>";
       }
       elseif($key=='0')
       {
       $id=$value;
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
}

         
         }
         else
         {
         echo "<p>Angebot konnte nicht erstellt werden</p>";
         }
         mysql_close();
       }
       else
       {
       echo "Es wurde kein Angebot erstellt, da die Beschreibung fehlt.";
       }
       
  }
     else
       {
       echo "Es wurde kein Angebot erstellt, da der Autor fehlt.";
       }     
}
else
       {
       echo "Es wurde kein Angebot erstellt, da der Titel fehlt.";
       }
}
else
{
echo "Bitte den Preis folgendermassen notieren: 5.50";
}     
}
}
else
{
echo "Die Benutzererkennung hat sie nicht erkannt, wiederholen sie bitte den login<a href='login.html'><br>ZUM LOGIN</a>";
}
?>
<br />
<br />
</div>
</div>
</center>
</body>
</html>
