<?
	session_start();
	header("Content-Type:image/png");
	$arr = array("1","2","3","4","5","6","7","8","9","0","q","w","e","r","t","y","u","i","o","p","a","s","f","g","h","j","k","l","z","x","c","v","b","n","m");
	$rand = array_rand($arr, sizeof($arr));
	$scode = '';
	for($i=0; $i<5; $i++){
		$scode .= $arr[$rand[$i]];
	}
	
	$img = imagecreate(60, 20);
	
	$white = imagecolorallocate($img, 255,255,255);
	$black = imagecolorallocate($img, 0,0,0);
	$red = imagecolorallocate($img, 255,0,0);
	
	imagefilledrectangle($img, 0,0,60,20,$black);
	imagestring($img, 4, 10, 2, $scode, $white);
	imagefilledrectangle($img, 0,10,60,10,$red);
	imagepng($img);
	imagedestroy($img);
	
	$_SESSION['scode'] = $scode;
?>