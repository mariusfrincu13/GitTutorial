<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    $id_user = $user_data['id'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <style>
        table, td, th {
            border: 1px solid black;
            text-align: center;
        }

        table {
            width: 60%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <a href="logout.php">Logout</a>
    <h1>User information</h1>
    <br>
    <h2>Hello, <?php echo $user_data['user_name']; ?></h2>

    <h3>User information</h3>

    <p><strong>Email:</strong> <?php echo $user_data['email']; ?></p>

    <table>
        <tr>
            <th>Street</th>
            <th>City</th>
            <th>Region</th>
            <th>Country</th>
            <th>Zip code</th>
        </tr>
    <?php
    $query = "select * from users_address WHERE user_id = '$id_user'";

    $result = mysqli_query($con,$query);

    if($result==false){
        echo "<br>Error in query";
    }else {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            echo "<tr><td>" . $row['street'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['region'] . "</td>";
            echo "<td>" . $row['country'] . "</td>";
            echo "<td>" . $row['zip_code'] . "</td>";
            echo "</tr>";

        }
    }
    ?>
    </table>

    <br>
    <a href="add_address.php">Adauga adresa</a>
</body>
</html>
