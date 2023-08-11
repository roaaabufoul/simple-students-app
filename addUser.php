<?php
include_once('db_conn.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name =$_POST['name'];
    $email =$_POST['email'];
    $age =$_POST['age'];
    $website =$_POST['website'];
    $gender =$_POST['gender'];
    $terms = $_POST['terms'];

  if (!empty($terms)) {
    // $conn = new mysqli($servername, $username, $password, $dbname);
     $query = "INSERT INTO users (name, email, age, website, gender) VALUES ('$name', '$email', '$age', '$website', '$gender')";
     $result = mysqli_query($connection , $query);
     if($result) {echo 'New student added' ."<br>";
     }
    else  echo'faild';
 }

   mysqli_cLose($connection);
 } 
  
  ?>

    <style>

#submit {
			background-color: rgb(8, 102, 164);
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			font-size: 16px;
			cursor: pointer;
		}
        form {
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			background-color: rgb(192, 232, 248);
			border-radius: 2em;
			box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.5);
      margin-top:10px ;
         
		}

		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
      font-family:Arial, Helvetica, sans-serif;
		}

		input[type="text"],
		input[type="email"],
		input[type="number"] {
			display: block;
			width: 80%;
			padding: 10px;
			border: 1px solid #ccc;
			margin-bottom: 20px;
			font-size: 16px;
    
  height: 20px;
  background-color: white;
 
  border-radius: 6px;
  margin-top: 5px;
		}

		input[type="radio"] {
			display: inline-block;
			margin-right: 10px;
		}

		input[type="checkbox"] {
			display: inline-block;
			margin-right: 10px;
		}
        
		.error {
			color: red;
			margin-top: 5px;
			font-size: 14px;
		}
    </style>

<body>
<center><h1> Add a user</h1></center>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php $_SERVER["PHP_SELF"];?>">  
 <label for="name">Full Name:</label> 
 <input type="text" name="name">
  <br>
  <label for="email"> E-mail: </label> 
 <input type="text" name="email">
 <br>
 <label for="age"> Age : </label> 
 <input type="number"  name="age" >
  <br>
  <label for="website">  Website:  </label> 
 <input type="text" name="website">
  <br>

  <label for="gender"> Gender:  </label> 
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br>
  <label>
  <input type="checkbox" name="terms" >
  I have read and agree to the Terms of Service.
</label>

  <br>
  <input id="submit" type="submit" name="submit" value="Submit">  
  <br>
  <a href="dashboard.php"> dashboard </a>
</form>


</body>
</html>