<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['employee_id'];
    $emp_name = $_POST['employee_name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $team_name = $_POST['team_name'];
    $joining_date = $_POST['joining_date'];
    $birthdate = $_POST['birthdate'];

    $sql = "UPDATE employees SET 
            employee_name='$emp_name',
            address='$address',
            gender='$gender',
            email='$email',
            contact='$contact',
            team_name='$team_name',
            joining_date='$joining_date',
            birthdate='$birthdate'
            WHERE employee_id=$emp_id";

    if ($con->query($sql) === TRUE) {
        echo "Employee updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    header("Location: index.php");
    exit();
}
$con->close();
?>
