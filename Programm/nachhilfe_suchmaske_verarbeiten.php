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
<title>Erstes Angebot-Nachfrage teil</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
</head>
<body>


<?////////////////////////777nachhilfe_suchmaske_verarbeiten.php//////////////////////////////////
///////////////////////////////////////////////////////////////by lucius bachmann//////////////
///////////////////////////////////////////////////////////////////////////////////////////////


include ("function_bereinigen.php");
$klasse=$_POST['Klasse'];
$fach=$_POST['fach'];

if(!empty($_POST['othersubject']))
{
$fach=$_POST['othersubject'];

}
$beschreibung=$_POST['beschreibung'];


$wochenstunden=$_POST['wochenstunden'];
$preis=$_POST["preis"];

if(!empty($_POST))
{
if(bereinigen($preis,"PRICE",3,3)==true)
{
if(bereinigen($klasse,"NOHTML",1,3)==true)
{

  if(bereinigen($fach,"NOHTML",0,3)==true)
  {
    
       if(bereinigen($beschreibung,"NOHTML",8,3)==true)
       {
         

$dblk=db();
$klasse=bereinigen($klasse,"NOHTML",3,1);
$fach=bereinigen($fach,"NOHTML",3,1);
$wochenstunden=bereinigen($wochenstunden,"NOHTML",3,1);
$beschreibung=bereinigen($beschreibung,"NOHTML",3,1);
$preis=bereinigen($preis,"NOHTML",3,1);


       $sqlbefehl="INSERT INTO nachhilfestunden".
       "(id, Anbieter, Klasse, Fach, Beschreibung, Wochenstunden, Preis, suche)VALUES('', '".$user[1]."', '$klasse', '$fach', '$beschreibung', '$wochenstunden', '$preis', 'off')";
$suchevonvergleich="on";

if($_POST["typ"]=="Suche")
{
$sqlbefehl="INSERT INTO nachhilfestunden".
       "(id, Anbieter, Klasse, Fach, Beschreibung, Wochenstunden, Preis, suche)VALUES('', '".$user[1]."', '$klasse', '$fach', '$beschreibung', '$wochenstunden', '$preis', 'on')";
$suchevonvergleich="off";

}
if(mysql_query("$sqlbefehl"))
{
       
         $zeile1=array("A"=>$_POST['A1'],"B"=>$_POST['B1'],"C"=>$_POST['C1'],"D"=>$_POST['D1'],"E"=>$_POST['E1'],"F"=>$_POST['F1'],"G"=>$_POST['G1']);
$zeile2=array("A"=>$_POST['A2'],"B"=>$_POST['B2'],"C"=>$_POST['C2'],"D"=>$_POST['D2'],"E"=>$_POST['E2'],"F"=>$_POST['F2'],"G"=>$_POST['G2']);
$zeile3=array("A"=>$_POST['A3'],"B"=>$_POST['B3'],"C"=>$_POST['C3'],"D"=>$_POST['D3'],"E"=>$_POST['E3'],"F"=>$_POST['F3'],"G"=>$_POST['G3']);
$zeile4=array("A"=>$_POST['A4'],"B"=>$_POST['B4'],"C"=>$_POST['C4'],"D"=>$_POST['D4'],"E"=>$_POST['E4'],"F"=>$_POST['F4'],"G"=>$_POST['G4']);
$zeile5=array("A"=>$_POST['A5'],"B"=>$_POST['B5'],"C"=>$_POST['C5'],"D"=>$_POST['D5'],"E"=>$_POST['E5'],"F"=>$_POST['F5'],"G"=>$_POST['G5']);
$zeile6=array("A"=>$_POST['A6'],"B"=>$_POST['B6'],"C"=>$_POST['C6'],"D"=>$_POST['D6'],"E"=>$_POST['E6'],"F"=>$_POST['F6'],"G"=>$_POST['G6']);
$zeile7=array("A"=>$_POST['A7'],"B"=>$_POST['B7'],"C"=>$_POST['C7'],"D"=>$_POST['D7'],"E"=>$_POST['E7'],"F"=>$_POST['F7'],"G"=>$_POST['G7']);
$zeile8=array("A"=>$_POST['A8'],"B"=>$_POST['B8'],"C"=>$_POST['C8'],"D"=>$_POST['D8'],"E"=>$_POST['E8'],"F"=>$_POST['F8'],"G"=>$_POST['G8']);
$zeile9=array("A"=>$_POST['A9'],"B"=>$_POST['B9'],"C"=>$_POST['C9'],"D"=>$_POST['D9'],"E"=>$_POST['E9'],"F"=>$_POST['F9'],"G"=>$_POST['G9']);
$zeile10=array("A"=>$_POST['A10'],"B"=>$_POST['B10'],"C"=>$_POST['C10'],"D"=>$_POST['D10'],"E"=>$_POST['E10'],"F"=>$_POST['F11'],"G"=>$_POST['G10']);
$zeile11=array("A"=>$_POST['A11'],"B"=>$_POST['B11'],"C"=>$_POST['C11'],"D"=>$_POST['D11'],"E"=>$_POST['E11'],"F"=>$_POST['F11'],"G"=>$_POST['G11']);

$sqlbefehl3333="SELECT id FROM nachhilfestunden ORDER BY id DESC LIMIT 0,1";
$letzenr=mysql_query($sqlbefehl3333);
$letzenr=mysql_fetch_assoc($letzenr);
$cookienr=$letzenr['id'];


$sqlbefehlzeile1="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '7:45-8:30', '".$zeile1['A']."', '".$zeile1['B']."', '".$zeile1['C']."', '".$zeile1['D']."', '".$zeile1['E']."', '".$zeile1['F']."', '".$zeile1['G']."', '1')";

$sqlbefehlzeile2="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '8:40-9:25', '".$zeile2['A']."', '".$zeile2['B']."', '".$zeile2['C']."', '".$zeile2['D']."', '".$zeile2['E']."', '".$zeile2['F']."', '".$zeile2['G']."', '2')";

$sqlbefehlzeile3="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '9:45-10:30', '".$zeile3['A']."', '".$zeile3['B']."', '".$zeile3['C']."', '".$zeile3['D']."', '".$zeile3['E']."', '".$zeile3['F']."', '".$zeile3['G']."', '3')";

$sqlbefehlzeile4="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '10:40-11:25', '".$zeile4['A']."', '".$zeile4['B']."', '".$zeile4['C']."', '".$zeile4['D']."', '".$zeile4['E']."', '".$zeile4['F']."', '".$zeile4['G']."', '4')";

$sqlbefehlzeile5="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '11:35-12:20', '".$zeile5['A']."', '".$zeile5['B']."', '".$zeile5['C']."', '".$zeile5['D']."', '".$zeile5['E']."', '".$zeile5['F']."', '".$zeile5['G']."', '5')";

$sqlbefehlzeile6="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '12:30-13:15', '".$zeile6['A']."', '".$zeile6['B']."', '".$zeile6['C']."', '".$zeile6['D']."', '".$zeile6['E']."', '".$zeile6['F']."', '".$zeile6['G']."', '6')";

$sqlbefehlzeile7="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '13:25-14:10', '".$zeile7['A']."', '".$zeile7['B']."', '".$zeile7['C']."', '".$zeile7['D']."', '".$zeile7['E']."', '".$zeile7['F']."', '".$zeile7['G']."', '7')";

$sqlbefehlzeile8="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '14:20-15:05', '".$zeile8['A']."', '".$zeile8['B']."', '".$zeile8['C']."', '".$zeile8['D']."', '".$zeile8['E']."', '".$zeile8['F']."', '".$zeile8['G']."', '8')";

$sqlbefehlzeile9="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '15:15-16:00', '".$zeile9['A']."', '".$zeile9['B']."', '".$zeile9['C']."', '".$zeile9['D']."', '".$zeile9['E']."', '".$zeile9['F']."', '".$zeile9['G']."', '9')";

$sqlbefehlzeile10="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '16:10-16:55', '".$zeile10['A']."', '".$zeile10['B']."', '".$zeile10['C']."', '".$zeile10['D']."', '".$zeile10['E']."', '".$zeile10['F']."', '".$zeile10['G']."', '10')";

$sqlbefehlzeile11="INSERT INTO zeit(nachhilfestunden_id, zeit, Montag, Dienstag, Mittwoch, Donnerstag, Freitag, Samstag, Sonntag, reihe)VALUES('$cookienr', '17:05-18:50', '".$zeile11['A']."', '".$zeile11['B']."', '".$zeile11['C']."', '".$zeile11['D']."', '".$zeile11['E']."', '".$zeile11['F']."', '".$zeile11['G']."', '11')";
       


 
         if((mysql_query("$sqlbefehlzeile1"))&&(mysql_query("$sqlbefehlzeile2"))&&(mysql_query("$sqlbefehlzeile3"))&&(mysql_query("$sqlbefehlzeile4"))&&(mysql_query("$sqlbefehlzeile5"))&&(mysql_query("$sqlbefehlzeile6"))&&(mysql_query("$sqlbefehlzeile7"))&&(mysql_query("$sqlbefehlzeile8"))&&(mysql_query("$sqlbefehlzeile9"))&&(mysql_query("$sqlbefehlzeile10"))&&(mysql_query("$sqlbefehlzeile11")))
         {
         echo "<p>Dein Nachhilfeangebot ist online</p>";
         }
         else
         {
         echo "<p> Angebot konnte nicht erstellt werden</p>";
         }
         }
          else
         {
         echo "<p> Angebot konnte nicht erstellt werden</p>";
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
       echo "Es wurde kein Angebot erstellt, da das Fach fehlt.";
       }     
}
else
       {
      
       echo "Es wurde kein Angebot erstellt, da die Klasse fehlt.";
       }
}
else
{
echo "Den Preis bitte folgendermassen notieren: Franken.Rappen(2stellig)";

}     
}
}
else
{
echo "Die Benutzererkennung hat sie nicht erkannt, wiederholen sie bitte den login<a href='login.html'><br>ZUM LOGIN</a>";
}
?>       
</div>
</div>
</body>
</html>
