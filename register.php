<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGISTRATION PAGE</title>
<style>
    body {
    background-color: black;
    color: #BBC5AA;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    box-sizing: border-box;
    }

    .container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 100%;
    max-width: 500px;
    }

    header {
    position: absolute;
    top: 20px;
    width: 100%;
    text-align: center;
    color: #BBC5AA;
    font-size: 2em;
    }

    form {
    width: 100%;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    margin-bottom: 20px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
    width: calc(100% - 24px); 
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #BBC5AA;
    border-radius: 3px;
    box-sizing: border-box;
    color: #BBC5AA;
    background-color: rgba(255, 255, 255, 0.1);
    font-size: 0.9em;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
    border-color: rgb(66, 31, 100);
    outline: none;
    box-shadow: 0 0 5px rgba(66, 31, 100, 0.5);
    }

    label {
    display: block;
    margin-bottom: 5px;
    font-size: 0.9em; 
    text-align: left;
    }
    
    button[type="submit"] {
    background-color: rgb(66, 31, 100);
    color: #BBC5AA;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9em; 
    width: 100%;
    transition: background-color 0.3s, transform 0.3s;
    }

    button[type="submit"]:hover {
    background-color: rgba(66, 31, 100, 0.8);
    transform: scale(1.05);
    }

    button[type="submit"]:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(66, 31, 100, 0.5);
    }

    @media (max-width: 600px) {
    form {
        padding: 15px;
        max-width: 100%;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"],
    button[type="submit"] {
        font-size: 0.8em; 
    }
    }
</style>
</head>

<body>
    <h2>Registration Form</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
    
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
    
        <button type="submit" name="register">Register</button>
    </form>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $servername = "localhost";
            $db_username = "root";
            $db_password = "";
            $database = "Harmonique";
    
            // Create connection
            $conn = new mysqli($servername, $db_username, $db_password, $database);
    
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            // Prepare SQL query
            $sql = "INSERT INTO registrationForm (username, email, password) VALUES ('$username', '$email', '$password')";
    
            // Execute query
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                // Redirect to songs_main.html
                header("Location:HARMONIQUE/songs_main.html");
                exit; // Ensure that no further code is executed after redirection
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
            $conn->close();
        }
    ?>

</body>
</html>
