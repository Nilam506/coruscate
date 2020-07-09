<?php
$email = $_POST["email"];
$pass = $_POST["cell"];

	@mysql_connect('localhost','root','') or die("can not connect db");
	@mysql_select_db("stud_info") or die("no db found");

$result = mysql_query("SELECT * FROM user WHERE cell = $pass");

$row = mysql_fetch_array($result);

if($row["email"]==$email && $row["cell"]==$pass)
{
    echo"You are a validated user.";
?>
<table border="1">
  <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Cell</th>
      <th>DOB</th>
  </tr>

  <?php
     $query1="select * from user";
	 $res=mysql_query($query1);
	 while($row=mysql_fetch_array($res))
	 {
  ?>
  <tr>
        <td><?php echo  $row["id"];?></td>
        <td><?php echo  $row["name"];?></td>
        <td><?php echo  $row["email"];?></td>
        <td><?php echo  $row["cell"];?></td>
	<td><?php echo  $row["dob"];?></td>
  </tr>
  <?php
	 }
	 ?>
</table>
<?php
}
else
{
    echo"Sorry, your credentials are not valid, Please try again.";
}


?>