<?php
 
    
 
    session_start(); // important
 
    if( isset($_GET['captcha_text']) and isset($_SESSION['captcha']) ){ // if get captcha text and captcha session
 
        // Create Image
 
        $captcha_text = $_GET['captcha_text']; // get text from "captcha_text" parameter
 
        $image = imagecreate( 100, 32 ); // create new image, width is 100, and height is 32
 
        $background_color = imagecolorallocate( $image,255, 255, 255 ); // background color RGB, black: 0, 0, 0
        $line_color = imagecolorallocate($image, 230, 230, 230);
	for ($i = 0; $i < 4; $i++) {
	    imageline($image, 0, rand() % 50, 150, rand() % 50, $line_color);
	}
	$dot_color = imagecolorallocate($image, 0, 0, 255);
	for ($i = 0; $i < 500; $i++) {
	    imagesetpixel($image, rand() % 150, rand() % 50, $dot_color);
	}
 
        
        $text_color = imagecolorallocate( $image, 0, 0, 0); // text color RGB, white: 255, 255, 255
 
        imagestring( $image, 4, 25, 8, $captcha_text, $text_color ); // font size is 4, and position from left is 25, and position from top is 8
 
        // Display Image
 
        header( "Content-type: image/png" );
 
        imagepng( $image );
 
        imagecolordeallocate( $text_color );
 
        imagecolordeallocate( $background_color );
 
        imagedestroy( $image );
 
    }
 
?>