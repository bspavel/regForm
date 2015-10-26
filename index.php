<?php define( "ACCESS", "YES" );
require_once('./config.php');
function __autoload($class_name)
{
	include("./inc/php/class/class.{$class_name}.php");
}
session_start();
header('Content-Type: text/html; charset=utf-8');
//get data
$getPostDt=new getpostdt();
$pgType=$getPostDt->getPgtype
	(@$_POST["viewPage"],@$_GET["viewPage"]);
$lg=$getPostDt->getLg
	(@$_POST["lg"],@$_GET["lg"]);
$valid=new validation();
$fDt=$valid->fillarrData(@$_POST["Dt"]);
//********************************************************************
$db=new db();
$lgArr=$valid->logPassDt
	(@$_POST["enter"]["login"],@$_POST["enter"]["password"]);
if( $lgArr['check'] )
{
	$profiledt=$db->getData($lgArr['login'],$lgArr['password']);
	$fphoto=$profiledt["fphoto"];
}
if("profile"!=$pgType)
{
	if( $fDt['check'] ):
		if($valid->photo($_FILES["fphoto"])):
			$img=new photo($_FILES["fphoto"]);
			$db->insertDt($fDt, $img->imgBase64);
			$profiledt=$db->getData();
			$fphoto=$img->imgBase64;
		endif;
	endif;
}
if( $db->getUid()>0 )
{
	$pgType="profile";
	$_SESSION['loginArr']=$profiledt;
	$_SESSION['photo']=$fphoto;
}
if( !empty($_SESSION['photo']) )
{
	$profiledt=$_SESSION['loginArr'];
	$fphoto=$_SESSION['photo'];
	$pgType="profile";
}
//********************************************************************
require_once('./inc/php/view/html.main.php');
?>