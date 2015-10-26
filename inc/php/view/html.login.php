<?php defined("ACCESS") or die("RESTRICTED ACCESS"); ?>
<form
    id="loginform"
    autocomplete="off"
    method="post">
    <table id="loginTbl" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr class="light">
            <td><label for="for_lg" ><?php echo $lang["LOGIN"]; ?>*:</label></td>
            <td>
                <input id="for_lg"
                       required="required" pattern="[a-zA-Z0-9-]+"
                       type="text"
                       name="enter[login]" />
            </td>
        </tr>

        <tr class="dark">
            <td>
                <label for="for_pass" ><?php echo $lang["PASSWORD"]; ?>*:</label>
            </td>
            <td>
                <input id="for_pass"
                       required="required" pattern="[a-zA-Z0-9-]+"
                       type="password"
                       name="enter[password]"
                />
            </td>
        </tr>

        <tr class="light">
            <td colspan="2" align="center">
                <input style="margin-left:5px; width:174px;" type="submit"
                       value="<?php echo $lang["SUBMIT"]; ?>" />
            </td>
        </tr>
    </table>
    <input type="hidden" id="viewPage" name="viewPage" value="<?php echo $pgType; ?>" />
    <input type="hidden" id="lg" name="lg" />
</form>