<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$salutation = $_POST['salutation'];
	$suffix = $_POST['suffix'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	// $addressline1 = $_POST['addressline1'];
	// $addressline2 = $_POST['addressline2'];
	// $barangay= $_POST['barangay'];
	// $region = $_POST['region'];
	// $zip = $_POST['zip'];
	$gender = $_POST['gender'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (firstname, lastname, salutation, suffix,  username,  email, gender, password) 
			-- addressline1, addressline2, barangay, region, zip,
					VALUES ('$firstname', '$lastname', '$salutation', '$suffix', '$username', '$email', '$gender','$password')";
					// '$addressline1', '$addressline2', '$barangay', '$region', '$zip',
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$firstname = "";
				$lastname = "";
				$salutation = "";
				$suffix = "";
				$username = "";
				$email = "";
				// $addressline1 = "";
				// $addressline2 = "";
				// $barangay = "";
				// $region = "";
				// $zip = "";
				$gender = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>


<style>
	.container .login-email .input-group-3 {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    padding: 2px 10px;
	color: #463022;

}

/* .input-group-3 input[type=radio]:after { 
  color: #463022; 
}  */




</style>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/registration.css">
	<title>Register</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Personal Information</p>
			<div class="input-group-1">
				<input type="text" placeholder="Firstname" name="firstname" value="<?php echo $firstname; ?>" required>
                <input type="text" placeholder="Lastname" name="lastname" value="<?php echo $lastname; ?>" required>
			</div>
			<div class="input-group-3">
				<legend>Salutation:</legend>
				<input type="radio" name="salutation" id="Mr" value="<?php echo $salutation; ?>">
				<label for="Mr">Mr</label>
				<input type="radio" name="salutation" id="Ms" value="<?php echo $salutation; ?>">
				<label for="Ms">Ms</label>
				<input type="radio" name="salutation" id="Ms" value="<?php echo $salutation; ?>">
				<label for="Ms">Mrs</label>
				<input type="radio" name="salutation" id="Ms" value="<?php echo $salutation; ?>">
				<label for="Ms">Dr</label>
			</div>
			<div class="input-group-3">
				<legend>Suffix:</legend>
				<input type="radio" name="suffix" id="Jr" value="<?php echo $suffix; ?>" >
				<label for="Jr">Jr</label>
				<input type="radio" name="suffix" id="Sr" value="<?php echo $suffix; ?>">
				<label for="Sr">Sr</label>
				<input type="radio" name="suffix" id="II" value="<?php echo $suffix; ?>">
				<label for="II">II</label>
				<input type="radio" name="suffix" id="III" value="<?php echo $suffix; ?>">
				<label for="III">III</label>
				<input type="radio" name="suffix" id="MD" value="<?php echo $suffix; ?>">
				<label for="MD">MD</label>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<!-- <div class="input-group">
				<input type="text" placeholder="Street and number, P.O. box, c/o " name="addressline1" value="<?php echo $addressline1; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Apartment, suite, unit, building, floor, etc." name="addressline2" value="<?php echo $addressline2; ?>" required>
			</div>
			<div class="input-group-1">
			<input type="text" placeholder="Barangay" name="barangay" value="<?php echo $barangay; ?>" required>
			<input type="text" placeholder="Region" name="region" value="<?php echo $region; ?>" required>
			</div>
			<div class="input-group-1">
			<input type="text" placeholder="Zip code" name="zip" value="<?php echo $zip; ?>" required>
			<input type="date" placeholder="Entry date" name="entrydate" value="<?php echo $entrydate; ?>" required>
			</div> -->
			<div class="input-group-3">
				<legend>Gender:</legend>
				<input type="radio" name="gender" id="male" value="<?php echo $gender; ?>" >
				<label for="male">Male</label>
				<input type="radio" name="gender" id="female" value="<?php echo $gender; ?>">
				<label for="female">Female</label>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Submit</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>