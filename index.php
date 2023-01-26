<?php
/** 
 * This is a showcase of how to use SQLite. You'll notice that to run a db command
 * we use $db->exec($statement) with $staement being a string version of the 
 * sql statement.
 */

#If db doesn't exist it creates one
$db = new SQLite3('school.db');

#See's what version of SQLite we have
// $version = $db->querySingle('SELECT SQLITE_VERSION()');
// echo "<br />version: " . $version . "<br />";

#Creates table using normal SQL syntax
$SQL_create_table = "CREATE TABLE IF NOT EXISTS Students
(
    StudentId VARCHAR(10) NOT NULL,
    FirstName VARCHAR(80),
    LastName VARCHAR(80),
    School VARCHAR(50),
    PRIMARY KEY (StudentId)
);";
$db->exec($SQL_create_table);

#Populate the DB with dummy student Data
// $SQL_insert_data = "INSERT INTO Students (StudentId, FirstName, LastName, School)
// VALUES
// ('A00111111', 'Tom', 'Max', 'Science'),
// ('A00222222', 'Ann', 'Fay', 'Mining'),
// ('A00333333', 'Joe', 'Sun', 'Nursing'),
// ('A00444444', 'Sue', 'Fox', 'Computing'),
// ('A00555555', 'Ben', 'Ray', 'Mining')
// ";
// $db->exec($SQL_insert_data);

#Query the DB for records in the student table
$res = $db->query('SELECT * FROM Students');
while ($row = $res->fetchArray()) {
    echo "{$row['StudentId']} {$row['FirstName']} {$row['LastName']} {$row['School']}<br />";
}


# Close database, make sure to do this everytime you open a DB 
$db->close();

?>