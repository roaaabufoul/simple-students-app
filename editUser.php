<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit User</h1>
    <?php
include_once('db_conn.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id limit 1 ";
    $result = mysqli_query($connection, $query); 
    if(mysqli_num_rows($result)>0){
       $row = mysqli_fetch_assoc($result);
    }
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the user's information from the form
    $userId = $_GET["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $website = $_POST["website"];
    $gender = $_POST["gender"];
    // Perform the necessary database update operation based on the user's information and user ID
    $sql = "UPDATE users SET name='$name', email='$email', age='$age', website='$website', gender='$gender' WHERE id='$userId'";

    if ($connection->query($sql) === true) {
        echo "<p class='success'>User updated successfully.</p>";
    } else {
        echo "<p class='error'>Error updating user: " . $connection->error . "</p>";
    }

}  }
?>


    <form method="post" action="<?php $_SERVER ['PHP_SELF'] . '?id=' . $_GET['id'] ?>" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" value="<?= ((isset($row)) ? $row['name']:'') ?>">
        <br>

        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" value="<?= ((isset($row)) ? $row['email']:'') ?>">
        <br>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" value="<?= ((isset($row)) ? $row['age']:'') ?>">
        <br>

        <label for="website">Website:</label>
        <input type="text" name="website" id="website" value="<?= ((isset($row)) ? $row['website']:'') ?>">
        <br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="female">female
        <input type="radio" name="gender" value="male">male
        <input type="radio" name="gender" value="other" >other
        <br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        input[type="radio"] {
            display: inline-block;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #0088cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .success {
            color: green;
            margin-top: 10px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>