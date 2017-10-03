<?php
function make_img($name, $res){
	$image = imagecreatetruecolor(1299, 917);
	$backColor = imagecolorallocate($image, 90, 90, 90);
	$textColor = imagecolorallocate($image, 120, 120, 120);
	$fontFile = 'FONT.ttf';
	$imBox = imagecreatefrompng('Certif.png');
	imagefill($image, 0, 0, $backColor);
	imagecopy($image, $imBox, 0, 0, 0, 0, 1299, 917);
	imagettftext($image, 45, 0, 620, 500, $textColor, $fontFile, $name);
	imagettftext($image, 45, 0, 640, 640, $textColor, $fontFile, $res);
	header('Content-Type: image/png');
	imagepng($image);
	imagedestroy($image);
	imagedestroy($imBox);
}
