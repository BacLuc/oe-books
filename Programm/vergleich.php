<?
function vergleich($string, $tabellenname, $tabellenspalte,$suche);
{

$isinabfrage="SELECT * FROM $tabellenname WHERE $tabellenspalte LIKE";
$woerter=explode(" ", $string);//einzelne Woerter als eigene Strings speichern
$anzahl=count($woerter);//zählen
$x=0;

for($anzahl>-1;$anzahl--)
{
if($woerter['$anzahl']!=strtolower($woerter['anzahl']);//auf grossbuchstaben überprüfen
{
$grossewoerter['$x']=$woerter['anzahl'];//nur grosse woerter speichern
$x++;
}
}
$anzahlgross=count($grossewoerter);//wieder für das for zählen


$anzahlvergleich=$anzahlgross;//damit das erste kein OR bekommt

for($anzahlgross>-1;$anzahlgross--)
{

   if($anzahlvergleich==$anzahlgross)
   {
    $isinabfrage.=" '%$grossewoerter[$anzahlgross]%'";//erstes bekommt kein OR vorne dran
   }
   else
   {
   $isinabfrage.=" OR $tabellenspalte LIKE '%$grossewoerter[$anzahlgross]%'";//das zweite sehr wohl
   }
}
$isinabfrage.=" AND WHERE suche='$suche'";

echo "mysqlquery= $isinabfrage";
$result=mysql_query($isinabgfrage);


}

?>
