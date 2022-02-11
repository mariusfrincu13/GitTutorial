<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
$id_user = $user_data['id'];

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $street = $_POST ['street'];
    $city = $_POST ['city'];
    $region = $_POST ['region'];
    $country = $_POST ['country'];
    $zipcode = $_POST ['zipcode'];

    $query = "insert into users_address (user_id,street,city,region,country,zip_code) values ('$id_user','$street','$city','$region','$country','$zipcode')";
    mysqli_query($con, $query);

    header("Location: index.php");
    die;

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add address</title>
</head>
<body>

<style>

    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button{

        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box{

        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

</style>

<div id="box">

    <form action="" method="post">
        <div style="font-size: 20px; margin: 10px;">New address</div>
        <table>
            <tr>
                <td>
                    <label for="street">Street: </label>
                    <input id="text" type="text" name="street" required><br><br>
                    <label for="city">City: </label>
                    <input id="text" type="text" name="city" required><br><br>
                    <label for="region">Region: </label>
                    <input id="text" type="text" name="region" required><br><br>
                    <label for="country">Country: </label>
                    <input id="text" type="text" name="country" required><br><br>
                    <label for="zipcode">Zip code: </label>
                    <input id="text" type="text" name="zipcode" minlength="6" maxlength="6"><br><br>
                </td>
            </tr>

        </table>

        <input id="button" type="submit" value="Add address"><br><br>

    </form>
</div>
</body>
</html>
