<?
//////////////////////////////////////////////////////////////////
//  db.php.inc
//////////////////////////////////////////////////////////////////
function db()
{
    $MySQL_Host="localhost";
    $MySQL_User="fattinge_newluci";
    $MySQL_Passw="sagichdirnit";
    $db="fattinge_lucius";


$dblk=mysql_connect("$MySQL_Host","$MySQL_User","$MySQL_Passw");
echo mysql_error($dblk);
mysql_select_db($db);
echo mysql_error($dblk);
return($dblk);
}
?>