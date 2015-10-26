<?php
defined("ACCESS") or die("RESTRICTED ACCESS");

define("DB_HOST", "localhost");
define("DB_DATABASE", "regCard");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("LANG", "RU");

$LG=( !empty(@$_GET["lg"]) )?@$_GET["lg"]:LANG;
$lang = parse_ini_file(__DIR__."/inc/language/".$LG.".ini", true);
?>