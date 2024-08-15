<?php

include('db.php');

// $employees = isset($_POST['employees']) ? $_POST['employees'] : [];

if($_SERVER['REQUEST_METHOD'] =='POST'){

        
        $emp_name = $_POST['employee_name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $team_name = $_POST['team_name'];
        $joining_date = $_POST['joining_date'];
        $birthdate = $_POST['birthdate'];

$sql = "INSERT INTO employees (employee_name, address, gender, email, contact, team_name, joining_date, birthdate) 
            VALUES ( '$emp_name', '$address', '$gender', '$email', '$contact', '$team_name', '$joining_date', '$birthdate')";
   if ($con->query($sql) === TRUE){
    echo "New Employee added successfully!";
    header("Location: index.php");
    exit();

   }else{
    echo "error :". $sql . "<br>" . $con->error;
   }
    
}
$con->close();