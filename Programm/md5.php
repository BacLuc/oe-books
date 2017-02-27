<?
include ("db.php.inc");
db();
$dborder1="Select * FROM user";
$resultat=mysql_query($dborder1);
while($row=mysql_fetch_row($resultat))
{
$id=$row[0];
$newpw=md5($row[2]);
echo "$newpw<br>";
$dborder2="UPDATE user SET pw='$newpw' WHERE id='$id'";

if(mysql_query($dborder2))
{
echo "ja";
}

}
echo "done";
?>
