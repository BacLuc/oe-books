<?
include("db.php.inc");
$counter=0;
$dblk=db();
$sqlbefehl="SELECT * FROM cookieabgleich WHERE cookieinhalt='lucius.bachmann'";
$resultat=mysql_query("$sqlbefehl");
While($row=mysql_fetch_row($resultat))
{
$counter=$counter+1;}
echo"lucius hat sich $counter mal eingeloggt.
?>";
