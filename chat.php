<?php
session_start();


if(isset($_POST['ajaxsend']) && $_POST['ajaxsend']==true){
	// Code to save and send chat
	$DateAndTime = date('m-d-Y h:i:s a', time()); 
	$chat = fopen("chatdata.txt", "a");
	$data="<b>".$_SESSION['username'].'</b>[<span style="color:#b3b3cc">'.$DateAndTime.'</span>] <b>: </b>'.$_POST['chat']."<br>";
	fwrite($chat,$data);
	fclose($chat);

	$chat = fopen("chatdata.txt", "r");
	echo fread($chat,filesize("chatdata.txt"));
	fclose($chat);
}else if (isset($_POST['ajaximg']) && $_POST['ajaximg']==true){
	$datey = date('m-d-Y h:i:s a', time());
	$chat = fopen("chatdata.txt", "a");
	$img12='<img src="https://';
	$img34='" width="140" height="100">';
	
	$data="<b>".$_SESSION['username'].'</b>[<span style="color:#b3b3cc">'.$datey.'</span>] <b>: </b>'.$img12.$_POST['imgy'].$img34."<br>";
	
	fwrite($chat,$data);
	fclose($chat);
	$chat = fopen("chatdata.txt", "r");
	echo fread($chat,filesize("chatdata.txt"));
	fclose($chat);
	


} else if(isset($_POST['ajaxget']) && $_POST['ajaxget']==true){
	// Code to send chat history to the user
	$chat = fopen("chatdata.txt", "r");
	echo fread($chat,filesize("chatdata.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxclear']) && $_POST['ajaxclear']==true){
	// Code to clear chat history
	$chat = fopen("chatdata.txt", "w");
	$data='<span style="font-size:14px !important;">chat cleard! this chat will be cleared every 30 min !</span><br>';
	fwrite($chat,$data);
	fclose($chat);
}