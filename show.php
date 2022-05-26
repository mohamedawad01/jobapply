<?php 

session_start();

include 'config.php';

echo "<a  style='padding:10px ;'  href='logout.php' >Logout</a>";

echo "<a   href='welcome.php' >Home</a>";
echo "<br>";
echo "<br>";

//get results from database
// $result = mysqli_query($con, "SELECT full_name, email, phone, gender, birthdate, photo, cv  
// FROM apply_jobs");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="margin: 50px;">
    <h1>List of Data</h1>
    <br>
    <table class="table">
        <thead>
			<tr>
				<th>ID</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>Birth Date</th>
				<th>Photo</th>
				<th>CV</th>
			</tr>
		</thead>

        <tbody>
            <?php


			$result = mysqli_query($con, "SELECT id, full_name, email, phone, gender, birthdate, photo, cv  
			FROM apply_jobs");

        

            // read data of each row
			while($row = $result->fetch_assoc()) {
				$image = $row['photo'];
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["full_name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["birthdate"] . "</td>
                    <td>" . $row["photo"] . "</td>
                    <td>" . $row["cv"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href=''>Update</a>
                        <a class='btn btn-danger btn-sm' href=''>Delete</a>
                        <a class='btn btn-secondary btn-sm mt-1' name='download' href=''>Download</a>
                    </td>
                </tr>";
            }

            $con->close();
            ?>
        </tbody>
    </table>
</body>
</html> 




