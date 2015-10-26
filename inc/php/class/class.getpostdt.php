<?php
defined("ACCESS") or die("RESTRICTED ACCESS");

class getpostdt
{
       function getLg($postLg,$getLg)
       {
           $lg=( empty($postLg) )?$getLg:$postLg;
           switch( $lg )
           {
               case "EN":
                   return "EN";
               break;
               default:
                   return "RU";
               break;
           }
       }
       function getPgtype($postVp,$getVp)
       {
           $viewPage=( empty($postVp) )?$getVp:$postVp;
           switch( $viewPage )
           {
               case "reg":
                   return "reg";
               break;
               case "login":
                   return "login";
               break;
               case "profile":
                   return "profile";
               break;
               default:
                   return "button";
               break;
           }
       }
}
?>