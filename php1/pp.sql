create database ezee;

use ezee;

create table employees (
    employee_id INT(11) auto_increment primary key,
    employee_name VARCHAR(100) not null,
    address VARCHAR(255) not null,
    gender ENUM('Male','Female','Other') not null,
    email VARCHAR(100) not null unique,
    contact VARCHAR(15) not null,
    team_name ENUM('Absolute','Centrix','Reservation','Integration','Operation') not null,
    joining_date DATE not null,
    birthdate DATE not null
);