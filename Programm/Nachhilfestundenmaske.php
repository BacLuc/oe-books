<?
include ("function_cookieabgleich.php.inc");
if(cookieabgleich())
{
$user=explode(",",$_COOKIE['user']);
echo "<p align='right'> Willkommen <a href='http://localhost/nutzerprofil.php'>".$user[1]."</a><br><a href='logout.php'>Logout</a></p>";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Nachhilfe anbieten</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
</head>
<body>
<center>
<h1>Nachhilfestelle erstellen</h1>
<br />
<br />
<br />
<form action="nachhilfe_suchmaske_verarbeiten.php" method="Post">
<table>
<tr>
<tr><td>Typ</td>                       <td><select name="typ">
                            <option>Angebot</option>
                            <option>Suche</option>
                              </select>
                            </td></tr>
<td>
Klasse
</td>
<td>                      
<input type="text" name="Klasse">
</td>
</tr>
<tr>

<td>                            
Fach
</td>                        
<td>
<select name="fach">
                            <option>Deutsch</option>
                            <option>Englisch</option>
                            <option>Franz&ouml;sisch</option>
                            <option>Italienisch</option>
                            <option>Spanisch</option>
                            <option>Latein</option>
                            <option>Griechisch</option>
                            <option>Mathematik</option>
                            <option>Physik</option>
                            <option>Chemie</option>
                            <option>Geschichte</option>
                            <option>Wirtschaft und Recht</option>
                            <option>Biologie</option>
                            <option>Musik</option>
                            <option>Bildnerisches Gestalten</option>
                            </select>
</td>
</tr>
<tr>
<td>                                                      
oder ein anderes Gebiet
</td>
<td>
    <input type="text" name="othersubject">
</td>
</tr>
<tr>
<td>
Kurze Beschreibung
</td>
<td>
          <textarea name="beschreibung" cols="50" rows="5"></textarea>
</td>
</tr>
<tr>
<td>
Dann kann ich
</td>
<td>
<table border="1" empty-cells="show">
<tr>
 <th>Zeit</th><th>Montag</th><th>Dienstag</th><th>Mittwoch</th><th>Donnerstag</th><th>Freitag</th><th>Samstag</th><th>Sonntag</th>
</tr>

<tr>
 <td>7:45-8:30</td><td><input type="checkbox" name="A1"></td><td><input type="checkbox" name="B1"></td><td><input type="checkbox" name="C1"></td><td><input type="checkbox" name="D1"></td><td><input type="checkbox" name="E1"></td><td><input type="checkbox" name="F1"></td><td><input type="checkbox" name="G1"></td>
</tr>

<tr>
 <td>8:40-9:25</td><td><input type="checkbox" name="A2"></td><td><input type="checkbox" name="B2"></td><td><input type="checkbox" name="C2"></td><td><input type="checkbox" name="D2"></td><td><input type="checkbox" name="E2"></td><td><input type="checkbox" name="F2"></td><td><input type="checkbox" name="G2"></td>
</tr>

<tr>
 <td>9:45-10:30</td><td><input type="checkbox" name="A3"></td><td><input type="checkbox" name="B3"></td><td><input type="checkbox" name="C3"></td><td><input type="checkbox" name="D3"></td><td><input type="checkbox" name="E3"></td><td><input type="checkbox" name="F3"></td><td><input type="checkbox" name="G3"></td>
</tr>

<tr>
 <td>10:40-11:25</td><td><input type="checkbox" name="A4"></td><td><input type="checkbox" name="B4"></td><td><input type="checkbox" name="C4"></td><td><input type="checkbox" name="D4"></td><td><input type="checkbox" name="E4"></td><td><input type="checkbox" name="F4"></td><td><input type="checkbox" name="G4"></td>
</tr>

<tr>
 <td>11:35-12:20</td><td><input type="checkbox" name="A5"></td><td><input type="checkbox" name="B5"></td><td><input type="checkbox" name="C5"></td><td><input type="checkbox" name="D5"></td><td><input type="checkbox" name="E5"></td><td><input type="checkbox" name="F5"></td><td><input type="checkbox" name="G5"></td>
</tr>

<tr>
 <td>12:30-13:15</td><td><input type="checkbox" name="A6"></td><td><input type="checkbox" name="B6"></td><td><input type="checkbox" name="C6"></td><td><input type="checkbox" name="D6"></td><td><input type="checkbox" name="E6"></td><td><input type="checkbox" name="F6"></td><td><input type="checkbox" name="G6"></td>
</tr>

<tr>
 <td>13:25-14:10</td><td><input type="checkbox" name="A7"></td><td><input type="checkbox" name="B7"></td><td><input type="checkbox" name="C7"></td><td><input type="checkbox" name="D7"></td><td><input type="checkbox" name="E7"></td><td><input type="checkbox" name="F7"></td><td><input type="checkbox" name="G7"></td>
</tr>

<tr>
 <td>14:20-15:05</td><td><input type="checkbox" name="A8"></td><td><input type="checkbox" name="B8"></td><td><input type="checkbox" name="C8"></td><td><input type="checkbox" name="D8"></td><td><input type="checkbox" name="E8"></td><td><input type="checkbox" name="F8"></td><td><input type="checkbox" name="G8"></td>
</tr>

<tr>
 <td>15:15-16:00</td><td><input type="checkbox" name="A9"></td><td><input type="checkbox" name="B9"></td><td><input type="checkbox" name="C9"></td><td><input type="checkbox" name="D9"></td><td><input type="checkbox" name="E9"></td><td><input type="checkbox" name="F9"></td><td><input type="checkbox" name="G9"></td>
</tr>

<tr>
 <td>16:10-16:55</td><td><input type="checkbox" name="A10"></td><td><input type="checkbox" name="B10"></td><td><input type="checkbox" name="C10"></td><td><input type="checkbox" name="D10"></td><td><input type="checkbox" name="E10"></td><td><input type="checkbox" name="F10"></td><td><input type="checkbox" name="G10"></td>
</tr>

<tr>
 <td>17:05-18:50</td><td><input type="checkbox" name="A11"></td><td><input type="checkbox" name="B11"></td><td><input type="checkbox" name="C11"></td><td><input type="checkbox" name="D11"></td><td><input type="checkbox" name="E11"></td><td><input type="checkbox" name="F11"></td><td><input type="checkbox" name="G11"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
Anzahl Wochenstunden
</td>
<td>
 <input type="Text" name="wochenstunden">
</td>
</tr>
<tr>
<td>
Lohn pro Stunde
</td>
<td>
<input type="text" name="preis">CHF
</td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" value="Nachhilfe anbieten" name="submit">
</td>
</tr>
</table>
</form>
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
