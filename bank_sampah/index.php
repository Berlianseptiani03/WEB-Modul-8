<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #102461;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: white;
        }

        form {
            background-color: #06213c;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            width: 20%;
        }

        /* label {
            display: block;
            margin-bottom: 8px;
        } */

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border-radius: 20px;
            background-color: rgb(89, 128, 115);
        }

        input::placeholder {
            color: white;
        }

        button {
            padding: 8px;
            cursor: pointer;
            background-color: white;
            color: black;
            border: none;
            border-radius: 20px;
            width: 100%;
        }

        button:hover {
            color: white;
            background-color: rgb(89, 128, 115);
        }
    </style>
</head>
<body>

<form action="" method="post">
    <h2>USER LOGIN</h2>
    <!-- <label for="username"></label> -->
    <input type="text" id="username" placeholder="Username" name="username" required>

    <!-- <label for="password">:</label> -->
    <input type="password" id="password" placeholder="Password" name="password" required>

    <button type="submit">LOGIN</button>
</form>

</body>
</html>

<?php

$valid_username = "admin"; 
$valid_password = "123"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Username atau password salah.";
    }
}
?>



