<?php
defined("ACCESS") or die("RESTRICTED ACCESS");

class photo
{
    public $imgBase64;
    function __construct($fphoto)
    {
        $path=$fphoto["tmp_name"];
        $data=file_get_contents($path);
        $this->imgBase64=$base64='data:image/jpeg;base64,'.base64_encode($data);
    }
}
?>