<?
function vergleich($string, $tabellenname, $tabellenspalte, $suche)
{

$isinabfrage="SELECT * FROM $tabellenname WHERE $tabellenspalte LIKE";

$woerter=explode(" ", $string);//einzelne Woerter als eigene Strings speichern

$anzahl=count($woerter);//zählen
$x=0;

for($anzahl>=0;$anzahl--;)
{


$test224=$woerter[$anzahl];


$testklein224=strtolower($woerter[$anzahl]);


if($test224!=$testklein224)   //auf grossbuchstaben überprüfen
{
$grossewoerter[$x]=$woerter[$anzahl];//nur grosse woerter speichern

$x++;
}
}

$anzahlgross=count($grossewoerter);//wieder für das for zählen



$anzahlvergleich=$anzahlgross;//damit das erste kein OR bekommt

$erster=1;

for($anzahlgross>-1;$anzahlgross--;)
{

   if($erster==1)
   {
    $isinabfrage.=" '%$grossewoerter[$anzahlgross]%'";
    $erster--;
           //erstes bekommt kein OR vorne dran
   }
   else
   {
   $isinabfrage.=" OR $tabellenspalte LIKE '%$grossewoerter[$anzahlgross]%'";//das zweite sehr wohl
   }
}
$isinabfrage.=" AND suche='$suche'";
return $isinabfrage;



}

?>
