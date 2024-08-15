<?php
include('db.php');
$emp_id = $_GET['employee_id'];

$sql = "SELECT * FROM employees WHERE employee_id = $emp_id";
$result = $con->query($sql);
$employee = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="process_edit.php" id="employeeForm" method="post" onsubmit="return validateForm()">
    <input type="hidden" name="employee_id" value="<?php echo $employee['employee_id'];?>">

    <label for="emp_name">Employee Name:</label>
    <input type="text" id="employee_name" name="employee_name" value="<?php echo $employee['employee_name'];?>">

    <label for="addess">Address:</label>
    <input type="text" id="address" name="address" value="<?php echo $employee['address'];?>">

    <label for="gender">Employee Name:</label>
    <select name="gender" id="gender" required>
        <option value="Male"<?php echo $employee['gender'] == 'Male' ? 'selected' : ''?>>Male</option>
        <option value="Female"<?php echo $employee['gender'] == 'Female' ? 'selected' : ''?>>Female</option>
        <option value="Other"<?php echo $employee['gender'] == 'Other' ? 'selected' : ''?>>Other</option>
    </select><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $employee['email'];?>"required> <br>

    <label for="contact">Contact:</label>
    <input type="number" name="contact" id="contact" value="<?php echo $employee['contact'];?>"required> <br>

    <label for="team_name">Team Name:</label>
        <select name="team_name" id="team_name" required>
            <option value="">Select Team</option>
            <option value="Absolute">Absolute</option>
            <option value="Centrix">Centrix</option>
            <option value="Reservation">Reservation</option>
            <option value="Integration">Integration</option>
            <option value="Operation">Operation</option>
        </select><br>

    <label for="joining_date">Joining Date:</label>
    <input type="date" id="joining_date" name="joining_date" value="<?php echo $employee['joining_date'];?>"required> <br>
    
    <label for="birthdate">Birthdate:</label>
    <input type="date" id="birthdate" name="birthdate" value="<?php echo $employee['birthdate'];?>"required> <br>

    <input type="hidden" name="employees" value=<?php echo htmlspecialchars(json_encode($employee), ENT_QUOTES); ?>>
    <input type="submit" value="Update Employee">
    </form>
    <script>
                function validateForm(){
            let email = document.getElementById("email").value;
            let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if(!emailPattern.test(email)){
                alert("Please Enter a valid email address.");
                return false;
            }
            
            let joiningDate = new Date(document.getElementById("joining_date").value);
            let currentDate = new Date();
            currentDate.setHours(0,0,0,0);
             if (joiningDate < currentDate){
                    alert ("Joining Date cannot be in the past.");
                    return false;
        }
        return true;
    }
    </script>

</body>
</html>