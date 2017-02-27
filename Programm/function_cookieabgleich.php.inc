<? //////////////////////////////////////////////////////////////////////////////////////////////////////////////////7//////function_cookieabgleich.php.inc/////////////////////////////////////by Lucius Bachmann//////////
////////////////////////////////////////////////////////////////////////////////////////////77/

function cookieabgleich()
{
include ("db.php.inc");
$dblk=db();
if(isset($_COOKIE['user']))
{
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
}
else
{
$functionresult=false;
}
mysql_close();
return $functionresult;



}
