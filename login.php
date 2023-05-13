<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server



	//crear el objeto de conexion
	$miconex=new mysqli("localhost","root","","pos");
	//comprobar conexion
	if ($miconex->connect_errno) 
	{
		die("Fallo la conexion [".$miconex->connect_error."]");
	}
	echo "Conexion conseguida con la Base de Datos<br/>";






	//Function to sanitize values received from the form. Prevents SQL injection

	
	//Sanitize the POST values


		
      $login = mysqli_real_escape_string($miconex,$_POST['username']);
      $password = mysqli_real_escape_string($miconex,$_POST['password']); 
      
   $login='admin';
$password='admin';

	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	//Create query
		$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";

	if(!$result=$miconex->query($qry))
	{
		die("Ocurrió un error en la consulta [".$miconex->error."]");
	}


	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_LAST_NAME'] = $member['position'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location: main/index.php");
			exit();
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>