<?php 
session_start();

$md5_hash = md5(rand(0,999));
create_image(); 
exit(); 

function create_image() 
{ 
    global $md5_hash;
    $security_code = substr($md5_hash, 15, 5); 

    $_SESSION["security_code"] = $security_code;

    $width = 100; 
    $height = 20;  

    $image = ImageCreate($width, $height);  

    $white = ImageColorAllocate($image, 249, 249,249); 
    $black = ImageColorAllocate($image, 51, 102, 153); 
    $grey = ImageColorAllocate($image, 249, 249,249); 

    ImageFill($image, 0, 0, $black); 

    ImageString($image, 5, 30, 3, $security_code, $white); 

    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
    imageline($image, 0, $height/2, $width, $height/2, $grey); 
    imageline($image, $width/2, 0, $width/2, $height, $grey); 
 
    header("Content-Type: image/jpeg"); 

    ImageJpeg($image); 
    
    ImageDestroy($image); 
} 

function check_captcha()
{
	global $md5_hash;
	if(isset ($_POST['captcha']) && ($_POST['captcha']==$md5_hash) )
	{
		return true;
	}
	return false;
}
?>
