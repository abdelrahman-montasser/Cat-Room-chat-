<?php include 'start.php';?>


<!DOCTYPE html>
<head>
	
	<title>Cat Room</title>
	<meta charset="UTF-8">
	<meta name="description" content="Cat Room a free chat rooms without registration where you can chatting and meet new people, 100% Online chat rooms for free, No download required.">
 	<meta name="keywords" content="chat, chat room, chat rooms,free chat,egypt chat,egyprian,egyptian chat room,egypt room">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta property="og:image" content="https://codebyus.org/cat.png" />
	<link rel="icon" type="image/png" href="https://codebyus.org/cat.png">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script>
	  $( function() {
	    $( "#dialog" ).dialog();
	  } );
  </script>
  <style>
	
	#page-footer {
	  
	  position: fixed;
	  bottom: 0;
	  left: 0;
	  
	  width: 100%;
	  height: 40px;
	  padding: 0 5px;
	
	  display: flex;
	  align-items: center;
	  justify-content: center;
	 
	}
			*{
				  margin: 0;
				  padding: 0;
				  outline: 0;
				}

				body {
				  font-family: 'Poppins', sans-serif;
				}

				body{
				 
				  background: linear-gradient(-45deg, #3f51b1 0%, #5a55ae 13%, #7b5fac 25%, #8f6aae 38%, #a86aa4 50%, #cc6b8e 62%, #f18271 75%, #f3a469 87%, #f7c978 100%);;
				  background-size: 400% 400%;
				  
				  animation: animate 7.5s ease-in-out infinite;
				  
				  justify-content: center;
				  align-items: center;
				}

				h1{
				  color: #fff;
				  background: rgba(255,255,255,.2);
				  padding: 20px;

				  border-radius: 10px;
				}

				@keyframes animate{
				  0%{
					background-position: 0 50%;
				  }
				  50%{
					background-position: 100% 50%;
				  }
				  100%{
					background-position: 0 50%;
				  }
				}
  </style>
	
         
</head>
<body onLoad="pageScroll()">
<section>
<div class='header'>
	<h1>
		 CHAT ROOM
		<?php // Adding the logout link only for logged in users  ?>
		<?php if(isset($_SESSION['username'])) { ?>
			<a class='logout'   href="?logout">Logout</a>
		<?php } ?>
	</h1>

</div>
<div class="demo-1">
<h3 id="my-Title" style="font-size: 30px !important">Welcome to Cat Room</h3>
</div>

<div class='main'>
<?php //Check if the user is logged in or not ?>
<?php if(isset($_SESSION['username'])) { ?>
<div id='result'></div>
<div class='chatcontrols'>
	<form method="post" onsubmit="return submitchat()">
	<input type='text' name='chat' id='chatbox' autocomplete="off" placeholder="ENTER CHAT HERE" />
	<input type='submit' name='send' id='send' class='btn btn-send' value='Send' />
	<input type='button' name='clear' class='btn btn-clear'style="" id='clear' value='Image'onclick="toggle_visibility('imgpic'),toggle_visibility('sedy')"  title="Clear Chat" />
	<input type='text' name='imgy' id="imgpic" style="display:none" placeholder="IMAGE URL !" />
	<input type='button'  name='sedy' id='sedy'style="display:none;background-color:#000099;color:white;position: relative;" value='Send-image'onclick="submitimg();" autocomplete="off" />
	
</form>

<input type="button" onClick="pageScroll()" value="Scroll Page">
<input type="button" onClick="stopScroll()" value="Stop Scroll">


<script>

function submitimg(){
	var xey=$('#imgpic').val();
	
	xey = xey.replace(/https:\/\/|http:\/\/r/gi,'');
	xey=xey.replace("http://","");
	if($('#imgy').val()=='' || xey==''|| xey==' ' || xey=='  ' ) return false;
	else{
		$.ajax({
			url:'chat.php',
			data:{imgy:xey,ajaximg:true},
			method:'post',
			success:function(data){
				$('#result').html(data);
				$('#imgpic').val('') // Get the chat records and add it to result div
				//xey; //Clear chat box after successful submition
					
			}
		})
	}
	return false;
};

// Javascript function to submit new chat entered by user
function submitchat(){
	if($('#chat').val()=='' || $('#chatbox').val()=='' || $('#chatbox').val()==' '  || $('#chatbox').val()=='  ') return false;
	$.ajax({
		url:'chat.php',
		data:{chat:$('#chatbox').val(),ajaxsend:true},
		method:'post',
		success:function(data){
			$('#result').html(data); // Get the chat records and add it to result div
			$('#chatbox').val(''); //Clear chat box after successful submition
			document.getElementById('result').scrollTop=document.getElementById('result').scrollHeight; // Bring the scrollbar to bottom of the chat resultbox in case of long chatbox
		}
	})
	return false;
};

// Function to continously check the some has submitted any new chat
setInterval(function(){
	$.ajax({
			url:'chat.php',
			data:{ajaxget:true},
			method:'post',
			success:function(data){
				$('#result').html(data);
			}
	})
},1000);
// Function to chat history
$(document).ready(setInterval(function(){
	
	$.ajax({
		url:'chat.php',
		data:{username:"",ajaxclear:true},
		method:'post',
		success:function(data){
			$('#result').html(data);
		}
	})
	
},900000))
function pageScroll() {
    	window.scrollBy(0,50); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScroll()',100); // scrolls every 100 milliseconds
}
function stopScroll() {
    	clearTimeout(scrolldelay);
}



</script>

<script type="text/javascript">

    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }

</script>
                                        
<?php } else { ?>
<div class='userscreen'>
	<form method="post" >
		<input type='text' class='input-user' placeholder="ENTER YOUR NAME HERE" name='username' required />
		<input type='submit' class='btn btn-user' name="submit" value='START CHAT'  />
		<p>
			Resolve the simple captcha below: <br />
			<p><img src="https://codebyus.org/image.php?captcha_text=<?php echo $_SESSION['captcha']; ?>"></p>
			<input name="captchaResult" type="text" size="5" required />

			<input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
			<input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />
			<input name="cap" type="hidden" value="<?php echo $captcha; ?>"/>
		</p>
		
		
		
		

   		
		
	</form>
	 
	
</div>
<?php } ?>


</div>
<?php include_once 'online.php';?>
</body>
</section>

</html>
<footer id="page-footer">
  <p style="color:#cc66ff">CODE WITH ❤ BY JABOSKI</p>
</footer>