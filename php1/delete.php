<?php
include('db.php');

$emp_id = $_GET['employee_id'];

$sql = "DELETE FROM employees WHERE employee_id = $emp_id";

if ($con->query($sql) === TRUE) {
    echo "Employee deleted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: index.php");
exit();

$con->close();
?>
