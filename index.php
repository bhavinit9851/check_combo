<?php include('config.php');

if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
        
        $images = implode(',',$_FILES['files']['name']);
        $query_list = "insert into info (images) values ('$images')";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"user_data/".$file_name);
            }else{									//rename the file if another one exist
                $new_dir="user_data/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
            mysql_query($query);			
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Success";
	}
}

if(isset($_POST['check_submit']))
{
		echo $Checkbox_1 =  implode(',', $_POST['hobi']);
		echo $dropdown_1 = $_POST['person'];
		$query_list = "insert into info (check_new1,dropdown,images) values ('$Checkbox_1','$dropdown_1','$images')";
        $conn -> query($query_list);
}

$select_all_data = $conn -> query("select * from info");
$row_all_data = $select_all_data -> fetch_All(MYSQLI_ASSOC);
foreach ($row_all_data as $row) {
		echo "<b> Hobby </b> : " . $row['check_new1'] .  "<b> Hobby </b> : " . $row['check_new1'] . "<b> Person </b> : " . $row['dropdown']. " <a href = 'edit.php?id=$row[id]'> Edit </a><br>";
}

?>
<html>
<head>
<title> Insert </title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<h1> Hobby </h1>
	<input type="checkbox" name="hobi[]" value="cricket"> Cricket </input><br/>
	<input type="checkbox" name="hobi[]" value="hockey"> Hockey </input><br/>
	<input type="checkbox" name="hobi[]" value="reading"> Reading </input><br/>
	<input type="checkbox" name="hobi[]" value="writting"> Writting </input><br/>
<h1> Person </h1>
	<select name="person" id="">
		<option value="bhavin"> Bhavin 	</option>
		<option value="juhi"> Juhi </option>
		<option value="hiral"> Hiral </option>
	</select>
<h1> Multiple Image </h1>
	<input type="file" name="files[]" multiple="" />
<br>
<br>
		<input type="submit" name="check_submit" value="Submit">
		<input type="reset" value="Reset">
</form>
</body>
</html>