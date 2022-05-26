<?php

session_start();
error_reporting(0);


if (!isset($_SESSION["user_id"])) {
header("Location: index.php");
}
if(isset($_POST['show'])){
	header("Location: show.php");
}


include 'config.php';

if (isset($_POST["submit"])) {
$full_name = mysqli_real_escape_string($con, $_POST["full_name"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$phone = mysqli_real_escape_string($con, $_POST["phone"]);
$gender = mysqli_real_escape_string($con, $_POST["gender"]);
$birthdate = mysqli_real_escape_string($con, $_POST["birthdate"]);


$photo_name =  $_FILES["photo"]["name"];
$photo_tmp_name = $_FILES["photo"]["tmp_name"];
$photo_new_name = uniqid() . $photo_name;
move_uploaded_file($photo_tmp_name, "uploads/" . $photo_new_name);
header("location: welcome.php");


$cv =  $_FILES["cv"]["name"];
$cv_tmp_name = $_FILES["cv"]["tmp_name"];
$cv_new_name = uniqid()  . $cv;
move_uploaded_file($cv_tmp_name, "uploads/" . $cv_new_name);

$sql = "INSERT INTO apply_jobs (full_name, email, phone, gender, birthdate, photo, cv  )
VALUES ('$full_name', '$email', '$phone',  '$gender', '$birthdate', '$photo_new_name', '$cv_new_name' )";

mysqli_query($con,$sql);



// $result = mysqli_query($con, $sql);




// if ($result) {
// 	echo "<script>alert('Profile Updated successfully.');</script>";
// 	move_uploaded_file($photo_tmp_name, "uploads/" . $photo_new_name);
// } else {
// 	echo "<script>alert('Profile can not Updated.');</script>";
// 	echo  $conn->error;
// }

// if ($con->query($sql)){
// 	echo 'inserted';
// }


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css">
<title>Apply</title>
</head>

<body class="profile-page">
<div class="wrapper">
	<a class="logout"  href="logout.php" >Logout</a>
	<form action="" method="post" enctype="multipart/form-data">
			<div class="inputBox">
				<input type="text" id="full_name" name="full_name" placeholder="Full Name" required >
			</div>
			<div class="inputBox">
				<input type="email" id="email" name="email" placeholder="Email Address" required >
			</div>
			<div class="inputBox">
				<input type="text" id="phone" name="phone" placeholder="phone"required>
			</div>
			<div class="inputBox">
				<input type="text" id="gender" name="gender" placeholder="gender" required >
			</div>
			<div class="inputBox">
				<input type="text" id="birthdate" name="birthdate" placeholder="birthdate" required>
			</div>
			<div class="inputBox">
				<label for="photo">Photo</label>
				<input type="file" accept="image/*" id="photo" name="photo" required>
			</div>
			<div class="inputBox">
				<label for="cv">CV</label>
				<input type="file"  id="cv" name="cv" >
			</div>
			<!-- <img src="uploads/<?php echo $row["photo"]; ?>" width="150px" height="auto" alt="">	 -->
	<div>
		<button type="submit" name="submit" class="btn">Apply</button>
	</div>
	<div>
		<button  type="show" name="show" class="btn" >show</button>
	</div>
	</form>
</div>

</body>


</html