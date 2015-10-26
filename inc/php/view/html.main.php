<?php defined("ACCESS") or die("RESTRICTED ACCESS"); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $lang["REGFORMNAME"]; ?></title>
    <meta charset="utf-8" />
    <link href="./inc/css/style.css" type="text/css" rel="stylesheet">
    <script src="./inc/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function()
        {
            var langId=document.getElementById("langId");
            langId.value="<?php echo (String)$lg;?>";

            //console.log("<?php echo (String)$lg;?>");
            <?php echo"dtShow('{$pgType}');"; ?>
        });
    </script>
</head>
<body>
<div id="page">
    <div id="header">
        <br /><select id="langId"
            onchange="location = 'index.php?viewPage='
            +document.getElementById('viewPage').value
            +'&lg='+this.options[this.selectedIndex].value;">
            <option value="EN">eng</option>
            <option value="RU">rus</option>
            <option value="UA">ukr</option>
        </select>
    </div>
    <div id="wrapper_content">
        <div id="left">
            <div id="profileHelp" class="hide">
                <?php require_once('./inc/php/view/html.profilephoto.php'); ?>
            </div>
            <div id="buttonHelp" class="show"><?php echo $lang["BUTTONHELP"]; ?></div>
            <div id="regHelp" class="hide"><?php echo $lang["REGHELP"]; ?></div>
            <div id="loginHelp" class="hide"><?php echo $lang["LOGINHELP"]; ?></div>
        </div>
        <div id="right">
            <div id="buttonDiv" class="show"><?php require_once('./inc/php/view/html.first.php'); ?></div>
            <div id="regDiv" class="hide"><?php require_once('./inc/php/view/html.reg.php'); ?></div>
            <div id="loginDiv" class="hide"><?php require_once('./inc/php/view/html.login.php'); ?></div>
            <div id="profileDiv" class="hide"><?php require_once('./inc/php/view/html.profile.php'); ?></div>
        </div>
    </div>
    <div id="footer">(c)pavel</div>
</div>
</body>
</html>