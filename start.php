<?php
session_start();
$captchaResult = $_POST["captchaResult"];

$cap= $_POST["cap"];		

$checkTotal = $firstNumber + $secondNumber;
$random = rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9);
 

		if ($captchaResult == $cap) {
			if(isset($_POST['username'])){
				$rand="User-".rand(1, 10000)."-";
				$mango=$rand.$_POST['username'];
				$_SESSION['username']=$mango;
				
			}
			
			//Unset session and logging out user from the chat room
			if(isset($_GET['logout'])){
				unset($_SESSION['username']);
				header('Location:index.php');
			}
			
		} else {
			echo '<div id="dialog"  title="Wrong Captcha">
  <p><b>Please resolve the Captcha !</b></p>
</div>';
			
		}
//Create a session of username and logging in the user to the chat room


?>
<?php
function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
// create random numbers
$captcha=generateRandomString();

 
$_SESSION['captcha'] = $captcha;

?>