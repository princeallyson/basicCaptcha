<?php

$firstnumber=rand(1,100);
$secondnumber=rand(1,100);
$subtrahen=rand(1,$firstnumber);

$multiplicand=rand(1,20);
$multiplier=rand(1,10);
 
$operators=array("+","-","*");
$operator=rand(0, count($operators)-1);
$operator=$operators[$operator];
$answer=0; 



?>


<html>
<head>
</head>

<body>
<form method="post">
<table>


<h4>USER ACCOUNT REGISTRATION</h4>

<tr >
<td>Username:</td>
<td><input type="text" name="username"></td>
</tr>

<tr>
<td>Enter Password:</td>
<td><input type="password" name="password"></td>

</tr>

<tr>
<td>Confirm Password:</td>
<td><input type="password" name="confirmpassword"></td>

</tr>

<td colspan=2 align="center"><br><p >Are you human? Please answer this.</p></td>


</table>


<tr>
<td>
<br>
		<?php
		
		if($operator=="+"){

			echo "$firstnumber+$secondnumber = ";
			$answer=$firstnumber+$secondnumber;
		}

		elseif($operator=="-"){

			echo "$firstnumber-$subtrahen = ";
			$answer=$firstnumber-$subtrahen;
		}

		elseif($operator=="*"){
	
			echo "$multiplicand*$multiplier= ";
			$answer=$multiplicand*$multiplier;
		}

		else{
		}

		?>
		
		
		<input type="number" name="userans">
		
</td>
</tr>

<tr>
		<br>
		<td colspan=2 align="center"><br><input type="submit" name="register" value="REGISTER">
		<input type="reset" name="clear" value="RESET">
		
		</td>
</tr>

<input type="hidden" name="captchaanswer" value="<?php echo $answer?>">

</form>

<?php

if(isset($_REQUEST['register'])){

$username=$_POST['username'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];
$useranswer=$_POST['userans'];
$captchaanswer=$_POST['captchaanswer'];





if($confirmpassword==$password && $useranswer == $captchaanswer ){

$Color = "blue";
    $Text = "<br>Account for $username has been successfully created";

    echo '<div style="Color:'.$Color.'">'.$Text.'</div>';
	
	echo "<b><br><br><br>Your Password Hashes</b>";
	echo "<b><br>MD5</b>:". md5($password);
	echo "<b><br>CRC32</b>:". crc32($password);
	echo "<b><br>GOST-CRYPTO</b>:". hash("gost-crypto",$password);
	echo "<b><br>SNEFRU</b>:". hash("snefru",$password);
	echo "<b><br>JOAAT</b>:". hash("joaat",$password);
}


if( $confirmpassword==$password && $useranswer != $captchaanswer ){
$Text ="<br>Retry registration. FAILED CAPTCHA!";
		$Color = "red";
		echo '<div style="Color:'.$Color.'">'.$Text.'</div>';
}


if($confirmpassword!=$password && $captchaanswer == $useranswer){
	$Text ="<br>Password does not match. Please try again!";
 $Color = "red";
 echo '<div style="Color:'.$Color.'">'.$Text.'</div>';
	
}




}


?>




</body>
</html>