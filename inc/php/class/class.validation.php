<?php
defined("ACCESS") or die("RESTRICTED ACCESS");

class validation
{
	function photo($fphoto)
	{
		switch ($fphoto["type"]) {
			case "image/gif":
			case "image/jpeg":
			case "image/jpg":
			case "image/png":
				break;
			default:
				return false;
		}
		if ($fphoto["size"] > 1024*1024*1) {
			return false;
		}
		if (!is_uploaded_file($fphoto["tmp_name"])) {
			return false;
		}
		return true;
	}

	private function clrData($str, $type = 'data', $simb = "/^[а-щА-ЩїЇєЄґҐіІьяЯюЮыЫёЁиИЭэa-zA-Z '\-]+$/ui")
	{
		switch ($type) {
			case "r":
				if (preg_match($simb, $str)) {
					return true;
				} else {
					return false;
				}
				break;
			case "i":
				return (int)$str;
				break;
			default:
				return trim(strip_tags($str));
				break;
		}
	}
	function logPassDt($login,$pass)
	{
		$result['check'] = false;
		if ($this->clrData($login, 'r', "/^[a-zA-Z0-9_\-]+$/"))
		{
			$result["login"] = strtolower($login);
		}else{return $result;}
		if ($this->clrData($pass, 'r', "/^[a-zA-Z0-9_\-]+$/"))
		{
			$result["password"] = $pass;
		}else{return $result;}
		$result['check'] = true;
		return $result;
	}
	function fillarrData($arr)
	{
		$result['check'] = false;
		if (is_array($arr)) {
			if ($arr["password1"] != $arr["password2"]) {
				return $result;
			}
			if ($arr["email1"] != $arr["email2"]) {
				return $result;
			}
			unset($arr["password2"]);
			unset($arr["email2"]);
			foreach ($arr as $key => $val) {
				if ($key == 'login') {
					if ($this->clrData($val, 'r', "/^[a-zA-Z0-9_\-]+$/")) {

						$result[$key] = strtolower($val);
					} else {
						return $result;
					}
				} elseif ($key == 'password1') {
					if ($this->clrData($val, 'r', "/^[a-zA-Z0-9_\-]+$/")) {

						$result["password"] = $val;
					} else {
						return $result;
					}
				} elseif ($key == 'email1') {
					if ($this->clrData($val, 'r', "/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/"))
					{

						$result["email"] = strtolower($val);
					} else {
						return $result;
					}
				}else {
					$result[$key] = $this->clrData($val);
				}
			}
			$result['check'] = true;
			return $result;
		}
		return $result;
	}
}
?>