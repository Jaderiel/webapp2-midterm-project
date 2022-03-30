<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>
<body>
    <div class="container-nav">
        <li class="menu"><a href="home.php" class="nav-option">Home</a></li>
        <li class="menu"><a href="logout.php" class="nav-option">Logout</a></li>
    </div>

    <div class="welcome-text">
    <?php echo "<h2>Welcome " . $_SESSION['username'] . "!</h2>"; ?>
    </div>

    <div class="information">
        <table class="table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td>bxcg</td>
                    <td>bxfgh</td>
                    <td>bhdfg</td>
                    <td>th</td>
                </tr>
            </thead>
           
         
        </table>
    </div>
    
</body>
</html>

