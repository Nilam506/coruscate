<?php
	@mysql_connect('localhost','root','') or die("can not connect db");
	@mysql_select_db("stud_info") or die("no db found");

$submit	= $_POST['submit'];
$name 	= $_POST['name'];
$email 	= $_POST['email'];
$cell 	= $_POST['cell'];
$dob 	= $_POST['dob'];

if(isset($submit))
{
	//echo $name;
	//echo $email;
	//echo $cell;
	//echo $dob;
  	if (!empty($name)) 
	{
    		$name = test_input($name);
		if (preg_match("/^[a-zA-Z ]*$/",$name)) {
    		  $valid_name = $name;
		  echo $valid_name;
  		}
  	}
  	if (!empty($email)) 
	{
    		$email = test_input($email);
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		  $valid_email = $email;
		  echo $valid_email;
  		}
  	}
  	if (!empty($cell)) 
	{
		if(is_numeric($cell))
		{
			$valid_cell = $cell;
			echo $valid_cell;
		}
	}
  	if (!empty($dob)) 
	{
		$valid_dob = $dob;	
	}
	$today = date("Y-m-d");
	$diff  = date_diff(date_create($valid_dob),date_create($today));
	$age   = $diff->format('%y');

	$result = mysql_query("SELECT * FROM user where email='".$valid_email."'");
    	$num_rows = mysql_num_rows($result);
    	if($num_rows >= 1){
        	echo "Email already exist.";
    	}
	elseif($age > 18)
	{
		$insert = "INSERT INTO `user`(`id`, `name`, `email`, `cell`, `dob`) VALUES ('','$valid_name','$valid_email','$valid_cell','$valid_dob')";	
		$ans=mysql_query($insert);
		if($ans==1)
		{
			echo "Record inserted successfully.";
?>
	<a href="login.html">Click here to Login</a>
<?php	
		}
		else
		{
			echo "Data are not inserted.";
		}
	}
	else
	{
		echo "Age must be greater than 18";
	}
}
	function test_input($data) {
 		 $data = trim($data);
 		 $data = stripslashes($data);
 		 $data = htmlspecialchars($data);
 		 return $data;
	}
?>