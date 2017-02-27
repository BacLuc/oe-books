<?php
function bereinigen($feld,$typ,$zeichenanzahl,$was)
{
$muster="/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-_.]+\.[a-zA-Z]{2,4}$/";
$muster2="[0-9]+.[0-9]{2,2}";
$meldung="";
$resultat="funktioniert nicht";
   if(empty($feld))
   {
   $resultat=0;
   $meldung="feld ist leer";

   }
   elseif(strlen($feld)<$zeichenanzahl)
    {
     $resultat=0;
     $meldung="sie m&uuml;ssen mindestens ".$zeichenanzahl." Zeichen eingeben";

    }
   elseif($typ=="EMAIL")
    {
    if(preg_match($muster, $feld)==0)
    {
    $resultat=0;
    $meldung="Email ung&uuml;ltig";
    }
    else
    {
    $resultat=1;
    $feld=htmlspecialchars($feld);
    }
  
    }
    else
    {
    $resultat=true;
    $meldung="feld in ordnung";
    }

   if($typ="NOHTML")
   {
   $feld=htmlspecialchars($feld);
   
   }
   if($typ=="PRICE")
   {
      if(preg_match($muster2, $feld))
      {
      $resultat=1;
      }
      else
      {
      $resultat=0;
      }
   }


$muster5="script";
$treffer=strpos($feld, "$muster5");
$feldlower=strtolower($feld);

if(!strpos($feldlower, $muster5)==0)
    {
    $resultat=0;
    $meldung="keine scripts einbinden";
    }



$feld=stripslashes($feld);
if($was==1)
{
return $feld;
}
if($was==2)
{
return $meldung;
}
if($was==3)
{


if($resultat==0)
{
return false;		
}
else 
{
	return true;
}
}

}
?>

