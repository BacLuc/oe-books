<html>
<head>
<title>Detailansicht</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="erster_style.css">

</head>
<body>
<?include ("style.html.inc");?>
<div id="Scrollbereich">
<div id="Inhalt">
<?


include ("function_cookieabgleich.php.inc");
if(cookieabgleich())
{

  $user=explode(",",$_COOKIE['user']);
  echo "<p align='right'> Willkommen <a href='nutzerprofil.php'>".$user[1]."</a><br><a     href='logout.php'>Logout</a></p>";
  echo "";


  $dblk=db();
  $dborder="SELECT * FROM nachhilfestunden WHERE id='$_GET[id]'";
  $result=mysql_query($dborder);
  $array=mysql_fetch_assoc($result);

  echo "<br><br><br><div style='width: 600px'><center>";
  //Tabelle Definieren
  echo "<table border='0' cellspacing='6' empty-cells:'show' overflow:show>";
  foreach ($array as $key=>$value)
  {

    if($key=='id')
    {}

    elseif($key=="Anbieter")
    {

      $anbieter=$value;
      echo "<tr><td>$key</td><td>$value</td></tr>";
    }

    elseif($key=="Preis")
    {
   
      echo "<tr><td>$key</td><td>$value</td></tr>";
      $dbefehl2="SELECT * FROM offertennachhilfestunden WHERE nachhilfestunden_id='".$_GET ['id']."'";
      $z=mysql_query($dbefehl2);
      $result5=mysql_num_rows($z);

      echo "<tr><td>Interessenten</td><td>$result5</td></tr>";

       if($anbieter==$user[1])
       {
        $id=$_GET['id'];
        echo "<td></td><td><a href='deletenachhilfestunden.php?artnr=".$_GET['id']."'>l&ouml;schen</a></td>";
       }

       else
       {
        $dbefehl2="SELECT * FROM offertennachhilfestunden WHERE nachhilfestunden_id='".$_GET['id']."'";
        $z=mysql_query($dbefehl2);
        $result5=mysql_num_rows($z);

        echo "<td></td><td><a href='interessenachhilfestunden.php?id=".$array['id']."'>interesse anmelden</a></td>";
       }

    }
    elseif($key=='suche')
    {}
    else
    {
     echo "<tr><td>$key</td><td>$value</td></tr>";
    }
  }//foreach geschlossen







echo "</table></center></div>";
echo"<div align='right' margin right='40em' margin top='50em'>
<table border='1' empty-cells='show'>
<tr>
 <th>Zeit</th><th>Montag</th><th>Dienstag</th><th>Mittwoch</th><th>Donnerstag</th><th>Freitag</th><th>Samstag</th><th>Sonntag</th>
</tr>";
$sqlbefehl="SELECT * FROM zeit WHERE nachhilfestunden_id='".$_GET['id']."' ORDER BY 'reihe' DESC";
$ergebniss=mysql_query("$sqlbefehl");

 while($row=mysql_fetch_row($ergebniss))
 {
  echo "<tr>";

  foreach($row as $key=>$value)
   {
    if($key=='0')
    {}
    elseif($key=='1')
    {
      echo "<td>$value&nbsp</td>";
    }
    elseif($key=='9')
    {}
    else
    {
       if($value=='on')
       { echo"<td bgcolor='green'></td>";
       }
       else
       { echo"<td bgcolor='black'></td>";
       }

    }



   }

echo "</tr>";


}
echo "</table><br> Gr&uuml;n= Ich kann dann<br>Schwarz=Ich kann dann nicht</div>";





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
