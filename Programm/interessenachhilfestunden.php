<?
include ("function_cookieabgleich.php.inc");
if(cookieabgleich())
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Interesse anmelden</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="erster_style.css">
</head>
<body>
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
<?
$user=explode(",",$_COOKIE['user']);
echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>".$user[1]."</a><br><a href='logout.php'>Logout</a></p>";
$dblk=db();

$x=mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE name='".$user['1']."'"));
$dborderx="SELECT * FROM offertennachhilfestunden WHERE nachhilfestunden_id='".$_GET['id']."' AND user_id='".$x['id']."'";
$res=mysql_query($dborderx);
$anzahl=@mysql_num_rows($res);
if($anzahl==0)
{
$sqlbefehlmail="SELECT email FROM user WHERE name='".$user['1']."'";
$x2=mysql_query($sqlbefehlmail);
$resultatmail=mysql_fetch_assoc($x2);

if($resultatmail['email']=="")
{
$resultatmail['email']="".$user['1']."@ksoe.ch";
}

$dborder="SELECT * FROM nachhilfestunden WHERE id='$_GET[id]'";
$result=mysql_query($dborder);
$array=mysql_fetch_assoc($result);

$sqlbefehlmail2="SELECT * FROM user WHERE id='".$array['Anbieter']."'";
$x3=mysql_query($sqlbefehlmail);
$resultatmail2=mysql_fetch_assoc($x3);

if($resultatmail2['email']=="")
{
$resultatmail2['email']="".$resultatmail2['name']."@ksoe.ch";
}


$sqlbefehl="Insert into offertennachhilfestunden(id, nachhilfestunden_id, user_id)VALUES('', '".$_GET['id']."', '".$x['id']."')";



 $empfaenger=$resultatmail2['email'];
       $betreff="".$user[1]." interessiert sich für ihre Nachhilfeangebot Nummer ".$_GET['id']."";
       $botschaft="Liebe/r ".$array['Anbieter']."                                              
Ich, ".$user[1]." interessiere mich für ihr Nachhilfeangebot Nummer ".$array['id']." mit dem Titel:      
".$array['Titel']."                                                                                
meine Email lautet: ".$resultatmail['email']."                                                       
Grüsse
".$user[1]."

PS: Bitte nicht einfach auf antworten klicken, sondern meine Emailadi in einer neuen Email als Empfänger hineinkopieren
(ctrl+c, ctrl+v)";



 
       $absender="".$resultatmail['email']."";


       if((mysql_query($sqlbefehl))&&(mail($empfaenger, $betreff, $botschaft, $absender)))
       {
       echo "Der Anbieter hat nun ein E-Mail bekommen, das ihr interesse kundtut. Er wird sich so bald wie moeglich mit ihnen in Verbindung setzten<br><a href='angebot.php'>Zu den Angeboten</a>";
       }
       else 
       {
       echo "Leider konnte kein E-Mail abgeschickt werden.<br><a href='angebot.php'>Zu den Angeboten</a>";
       }
?>
</div>
</div>
</body>
</html>
<?
}
else
{
echo "Sie haben ihr Interesse schon angemeldet";
}
}
else
{
echo "Die Benutzererkennung hat sie nicht erkannt, wiederholen sie bitte den login<a href='login.html'><br>ZUM LOGIN</a>";
}
?>
