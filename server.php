<?php
session_start();

// initializing variables
$nombre = "";
$apellido = "";
$email    = "";
$telefono = "";
$errors = array();

// connect to the database
include_once("conn.php");

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $telefono = mysqli_real_escape_string($db, $_POST['telefono']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($nombre)) {
        array_push($errors, "nombre is required");
    }
    if (empty($apellido)) {
        array_push($errors, "apellido is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($telefono)) {
        array_push($errors, "telefono is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM usuarios WHERE correo='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        array_push($errors, "email already exists");
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO usuarios (nombre, apellido, correo, telefono, password) 
  			  VALUES('$nombre', '$apellido', '$email', '$telefono','$password')";
        mysqli_query($db, $query);
        $_SESSION['nombre'] = $nombre;
        $_SESSION['correo'] = $correo;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $correo = mysqli_real_escape_string($db, $_POST['correo']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($correo)) {
        array_push($errors, "correo is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['nombre'] = $row["nombre"];
            $_SESSION['correo'] = $row["correo"];
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong correo/password combination");
        }
    }
  }
