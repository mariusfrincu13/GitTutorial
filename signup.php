<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $email = $_POST ['email'];

        $street = $_POST ['street'];
        $city = $_POST ['city'];
        $region = $_POST ['region'];
        $country = $_POST ['country'];
        $zipcode = $_POST ['zipcode'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
            $cont = 0;
            $query = "select * from users";
            $result = mysqli_query($con,$query);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if($row['user_name'] == $user_name){
                    $cont++;
                }
            }

            if($cont>0){
                echo "Username already used!";
            }else{
                $user_id = random_number(20);
                $query = "insert into users (user_id,user_name,password,email) values ('$user_id','$user_name','$password','$email')";
                mysqli_query($con, $query);

                $query_id = "select * from users WHERE id = (select Max(id) FROM users)";
                $result = mysqli_query($con,$query_id);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $id = $row['id'];

                $query2 = "insert into users_address (user_id,street,city,region,country,zip_code) values ('$id','$street','$city','$region','$country','$zipcode')";
                mysqli_query($con, $query2);

                header("Location: login.php");
                die;
            }
        }else{
            echo "Please enter some valid information!";
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
</head>
<body>

<style>

    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 90%;
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
        width: 400px;
        padding: 20px;
    }

</style>

<div id="box">

    <form action="" method="post">
        <div style="font-size: 20px; margin: 10px;">Signup</div>
        <table>
            <tr>
                <td>
                    <label for="user_name">Username: </label>
                    <input id="text" type="text" name="user_name"><br><br>
                    <label for="password">Pw: </label>
                    <input id="text" type="password" name="password"><br><br>
                    <label for="email">Email: </label>
                    <input id="text" type="email" name="email" required><br><br>
                    <label for="street">Street: </label>
                    <input id="text" type="text" name="street"><br><br>
                </td>
                <td>
                    <label for="city">City: </label>
                    <input id="text" type="text" name="city"><br><br>
                    <label for="region">Region: </label>
                    <input id="text" type="text" name="region"><br><br>
                    <label for="country">Country: </label>
                    <input id="text" type="text" name="country"><br><br>
                    <label for="zipcode">Zip code: </label>
                    <input id="text" type="text" name="zipcode"><br><br>
                </td>
            </tr>

        </table>

        <input id="button" type="submit" value="Signup"><br><br>

        <a href="login.php">Click to Login</a><br><br>
    </form>
</div>
</body>
</html>
