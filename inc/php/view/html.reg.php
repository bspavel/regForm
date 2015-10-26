<?php defined("ACCESS") or die("RESTRICTED ACCESS"); ?>
<form
	id="regform"
	autocomplete="off"
	enctype="multipart/form-data"
	method="post">
				<table id="regTbl" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr class="light">
						<td colspan="2" style="text-align:center;"><?php echo $lang["REGFORMNAME"]; ?></td>
					</tr>
					<tr class="dark">
						<td><label for="for_surname"><?php echo $lang["SURNAME"]; ?>*:</label></td><td>
							<input id="for_surname" required="required"
								   pattern="[а-щА-ЩїЇєЄґҐіІьяЯюЮыЫёЁиИЭэa-zA-Z '-]+$"
							 type="text" name="Dt[surname]" value="<?echo @$_POST["Dt"]['surname'];?>" /></td>
					</tr>
					<tr class="light">
						<td><label for="for_name"><?php echo $lang["NAME"]; ?>*:</label></td><td>
							<input id="for_name" required="required"
								   pattern="[а-щА-ЩїЇєЄґҐіІьяЯюЮыЫёЁиИЭэa-zA-Z '-]+$"
							 type="text" name="Dt[name]" value="<?echo @$_POST["Dt"]['name'];?>" /></td>
					</tr>
					<tr class="dark">
						<td><label for="for_patronymic" ><?php echo $lang["PATRONYMIC"]; ?>:</label></td>
						<td>
							<input id="for_patronymic" pattern="[а-щА-ЩїЇєЄґҐіІьяЯюЮыЫёЁиИЭэa-zA-Z '-]+$"
							 type="text" name="Dt[patronymic]" value="<?echo @$_POST["Dt"]['patronymic'];?>" />
						</td>
					</tr>
					<tr class="light">
						<td><label for="calendar" ><?php echo $lang["BIRTHDAY"]; ?>:</label></td>
						<td>
							<input
								type="date"
								pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}"
								placeholder="dd.mm.yyyy"
								value="<?echo @$_POST["Dt"]['birthdate'];?>"
								name="Dt[birthdate]" />
						</td>
					</tr>
					<tr class="dark">
						<td><label for="for_city" ><?php echo $lang["CITY"]; ?>:</label></td>
						<td><input id="for_city" type="text"
								   name="Dt[city]" value="<?echo @$_POST["Dt"]['city'];?>" /></td>
					</tr>
					<tr class="light">
						<td><label for="for_education" ><?php echo $lang["EDUCATION"]; ?>:</label></td>
						<td><input id="for_education" type="text"
								   name="Dt[education]" value="<?echo @$_POST["Dt"]['education'];?>" /></td>
					</tr>
					<tr class="dark">
						<td><label for="for_post" ><?php echo $lang["JOB"]; ?>:</label></td>
						<td>
							<input id="for_post" type="text" name="Dt[post]"
								   value="<?echo @$_POST["Dt"]['job'];?>" />
						</td>
					</tr>
					<tr class="light">
						<td><label for="for_login" ><?php echo $lang["LOGIN"]; ?>*:</label></td>
						<td><input id="for_login" required="required" pattern="[a-zA-Z0-9-]+"
							value="<?echo @$_POST["Dt"]['login'];?>"
							type="text" name="Dt[login]" /></td>
					</tr>
					<tr class="dark">
						<td>
							<label for="first_pass" ><?php echo $lang["PASSWORD"]; ?>*:</label>
						 	<img id='eye' src='./inc/images/eye-close.png' />
						 	<img id='eye_show' src='./inc/images/eye-open.png' />
						</td>
						<td>
							<input id="first_pass" onPaste="return false;"
								   required="required" pattern="[a-zA-Z0-9-]+"
								   type="password"
								   name="Dt[password1]"
								   value="<?echo @$_POST["Dt"]['password1'];?>" />
						</td>
					</tr>
					<tr class="light">
						<td>
							<label for="second_pass" ><?php echo $lang["PASSWORD2"]; ?>*:</label>
						</td>
						<td>
							<input id="second_pass" pattern="[a-zA-Z0-9-]+"
									onPaste="return false;"
									oninput="checkSecPass(this)" required="required"
									type="password" name="Dt[password2]"
									value="<?echo @$_POST["Dt"]['password2'];?>" />
						</td>
					</tr>
					<tr class="dark">
						<td><label for="first_post" ><?php echo $lang["EMAIL"]; ?>*:</label></td>
						<td>
							<input id="first_post"
								   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
								   type="email"
								   onPaste="return false;" required="required"
								   name="Dt[email1]"
								   value="<?echo @$_POST["Dt"]['email1'];?>" />
						</td>
					</tr>
					<tr class="light">
						<td><label for="second_post" ><?php echo $lang["EMAIL2"]; ?>*:</label></td>
						<td>
							<input id="second_post" oninput="checkSecEmail(this)"
								   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
								   type="email"
								   onPaste="return false;" required="required"
								   name="Dt[email2]"
								   value="<?echo @$_POST["Dt"]['email2'];?>" />
						</td>
					</tr>
					<tr class="dark">
						<td><label for="for_mobile_phone" ><?php echo $lang["PHONE"]; ?>:</label></td>
						<td><input id="for_mobile_phone" type="text"
								   pattern="[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}"
								   placeholder="+99(99)9999-9999"
								   name="Dt[phone]"
								   value="<?echo @$_POST["Dt"]['phone'];?>" /></td>
					</tr>
					<tr class="light">
						<td><label for="for_relationship" ><?php echo $lang["RELATIONSHIP"]; ?>:</label></td>
						<td>
							<select name="Dt[relationship]" id="for_relationship">
								<?php foreach($lang["RELATIONSHIPTYPE"] AS $k => $v): ?>
									<option value="<?php echo $k; ?>"
									<?php echo ($k == @$_POST["Dt"]['relationship'])?"selected=\"selected\"":null;?>>
									<?php echo $v;?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr class="dark">
						<td><?php echo $lang["SEX"]; ?>:</td><td>
							<label for="sex_man_input" style="cursor:pointer;">
								<div id="sex_man" class="sex">
								<img src="./inc/images/male.png" />
									<input id="sex_man_input"
										<?php if(@$_POST["Dt"]['sex'] == 'M'){echo "checked='checked'";} ?>
									style="width:50px;cursor:pointer;"
								    type="radio"
									name="Dt[sex]"
								    value="M"/>
								</div>
							</label>
							<label for="sex_woman_input" style="cursor:pointer;">
								<div id="sex_woman" class="sex">
								<img src="./inc/images/female.png" />
								<input id="sex_woman_input"
									<?php if(@$_POST["Dt"]['sex'] == 'F'){echo "checked='checked'";} ?>
								style="width:50px;cursor:pointer;"
								type="radio"
								name="Dt[sex]"
								value="F" />
								</div>
							</label>
						</td>
					</tr>
					<tr class="light">
						<td colspan="2"><?php echo $lang["PHOTO"]; ?><br />
							<input style="width:70%;" name="fphoto" type="file" accept=".gif,.jpg,.png"/>
						</td>
					</tr>
					<tr class="dark">
						<td colspan="2"><label for="for_aboutyou"><?php echo $lang["ABOUTYOU"]; ?>:</label><br />
							<input style="width:380px;" id="for_aboutyou"
								   type="text" name="Dt[question]"
								   value="<?echo @$_POST["Dt"]['question'];?>" /></td>
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