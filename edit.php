<?php
include('config.php');
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$select_all_data = $conn -> query("select * from info where id='$id'");
	$row_all_data = mysqli_fetch_array($select_all_data);
	$row_all_data['check_new1'];
	$checked = explode(',', $row_all_data['check_new1']);


	if(isset($_POST['update_submit']))
	{	
		print_r($_POST);
		$dropdown = $_POST['person'];
		echo $checkbox = implode(',', $_POST['hobi']);
		echo $gender = $_POST['gender'];
		$update_details = $conn -> query("update info set check_new1='$checkbox',gender='$gender',dropdown='$dropdown' where id='$id'");
	}
}
?>
<html>
<head>
<title> Check Box Insert</title>
</head>
<body>
<form action="" method="post">
<h1> Hobby </h1>
	<input type="checkbox" name="hobi[]" value="cricket" <?php  in_array('cricket', $checked) ? print "checked" : ""; ?> > Cricket </input><br/>
	<input type="checkbox" name="hobi[]" value="hockey" <?php  in_array('hockey', $checked) ? print "checked" : ""; ?> > Hockey </input><br/>
	<input type="checkbox" name="hobi[]" value="reading" <?php  in_array('reading', $checked) ? print "checked" : ""; ?> > Reading </input><br/>
	<input type="checkbox" name="hobi[]" value="writting" <?php  in_array('writting', $checked) ? print "checked" : ""; ?> > Writting </input><br/>
<h1> Person </h1>
	<select name="person" id="">
		<option value="bhavin" <?php  $row_all_data['dropdown'] == 'bhavin' ? print "selected": "";  ?>> Bhavin </option>
		<option value="juhi" <?php $row_all_data['dropdown'] == 'juhi' ? print "selected" : "";  ?>> Juhi </option>
		<option value="hiral" <?php $row_all_data['dropdown'] == 'hiral' ? print "selected" : "";  ?>> Hiral </option>
	</select>
<h1> Gender </h1>
	<input type="radio" value="Male" <?php  $row_all_data['gender'] == 'Male' ? print "checked": "";  ?>  name="gender"> Male </input> 
	<input type="radio" value="Female" <?php  $row_all_data['gender'] == 'Female' ? print "checked": "";  ?> name="gender"> Female </input> 
<br>
<br>
		<input type="submit" name="update_submit" value="Update">
		<input type="reset" value="Reset">
</form>
</body>
</html>