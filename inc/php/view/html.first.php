<?php defined("ACCESS") or die("RESTRICTED ACCESS"); ?>
<form id="buttonform">
    <table id="buttonTbl" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td>
                <a id="ref_button"
                           href="javascript:void(0)"
                           onclick="dtShow('reg');">
                    <?php echo $lang["REGISTRATION"]; ?>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a id="but_pass"
                           href="javascript:void(0)"
                           onclick="dtShow('login');">
                    <?php echo $lang["SIGNIN"]; ?>
                </a>
            </td>
        </tr>
    </table>
</form>