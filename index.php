<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>
<body>

    <a href="logout.php">Logout</a>
    <h1>index page</h1>

    <br>
    Hello, <?php echo $user_data['user_name']; ?>

</body>
</html>
