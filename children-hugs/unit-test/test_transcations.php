<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'mc_db_user';

/*** mysql password ***/
$password = '"mc_db_user_admin@123#"';

/*** database name ***/
$dbname = 'mc_db';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database<br />';

    /*** set the PDO error mode to exception ***/
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*** begin the transaction ***/
    $dbh->beginTransaction();

    /*** CREATE table statements ***/
    $table = "CREATE TABLE animals ( animal_id MEDIUMINT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    animal_type VARCHAR(25) NOT NULL,
    animal_name VARCHAR(25) NOT NULL 
    )";
    $dbh->exec($table);
    /***  INSERT statements ***/
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('emu', 'bruce')");
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('funnel web', 'bruce')");
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('lizard', 'bruce')");
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('dingo', 'bruce')");
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('kangaroo', 'bruce')");
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('wallaby', 'bruce')");
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('wombat', 'bruce')");
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('koala', 'bruce')");
    $dbh->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('kiwi', 'bruce')");

    /*** commit the transaction ***/
    $dbh->commit();

    /*** echo a message to say the database was created ***/
    echo 'Data entered successfully<br />';
}
catch(PDOException $e)
    {
    /*** roll back the transaction if we fail ***/
    $dbh->rollback();

    /*** echo the sql statement and error message ***/
    echo $sql . '<br />' . $e->getMessage();
    }
?>