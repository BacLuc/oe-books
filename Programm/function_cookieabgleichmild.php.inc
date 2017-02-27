<? //////////////////////////////////////////////////////////////////////////////////////////////////////////////////7//////function_cookieabgleichmild.php.inc/////////////////////////////////////by Lucius Bachmann//////////
////////////////////////////////////////////////////////////////////////////////////////////77/

function cookieabgleichmild()
{
include ("db.php.inc");
$dblk=db();

$user=explode(",",$_COOKIE['user']);
$sql="SELECT * FROM cookieabgleich WHERE cookienr='$user[0]'";
$result=mysql_query($sql);
$array=mysql_fetch_assoc($result);
  if($user[1]==$array['cookieinhalt'])
    {
    if($user[2]==$array['zeitstempel'])
       {
        $functionresult=true;



       }
       else
       {
        $functionresult=false;



       }


    }
    else
    {
        $functionresult=false;



    }

mysql_close();
return $functionresult;



}
