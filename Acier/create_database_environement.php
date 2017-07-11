<?php
/***********************************Connect to datase environement*****************************************/
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'acier_fastech';
$conn = new mysqli($dbhost, $dbuser, $dbpass);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

else{
	echo 'Connected successfully';
}
echo "<br>";
/******************************************Delete old environement***************************************/
$sql = 'DROP DATABASE ' . $dbname ;
if (!$result = $conn->query($sql)) {
	echo "<span style='color:red;'>Could not drop database " . $dbname . "</span>";
	
}
else{
	echo "<span style='color:green;'>Database " . $dbname . " deleted successfully</span>\n";
}
echo "<br>";
/****************************************Create new environement*************************************/

$sql = 'CREATE DATABASE ' . $dbname;
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create database " . $dbname . "</span>";
	exit;
}
else{
	echo "<span style='color:green;'>Database " . $dbname . " created successfully</span>\n";
}
echo "<br>";
/*******************************************CONNECT TO DATABASE*************************************/
$conn->close();
$conn = null;
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
	echo "<span style='color:red;'>Connection failed" . $dbname . "</span>";
}

else{
	echo '<span color="green"> Connected successfully to ' .  $dbname . "</span>";
}
echo "<br>";

/***************************Database structuring (tables, primary keys, etc.)***********************/

$sql = 'CREATE TABLE `acier_fastech`.`users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `id_state` int(11) NOT NULL,
PRIMARY KEY ( `id_user`)
) ENGINE=InnoDB ';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table users</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table users created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`employees` (
  `id_employe` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `family_name` varchar(25) NOT NULL,
  `hour_rate` double NOT NULL,
  `departement` varchar(50) NOT NULL,
  `id_state` int(11) NOT NULL,
PRIMARY KEY ( `id_employe`)
) ENGINE=InnoDB  ';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table employees</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table employees created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`projects` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `production_total` int NOT NULL,
  `budget` double NOT NULL,
`id_state` int NOT NULL,
PRIMARY KEY ( `id_project`)
) ENGINE=InnoDB';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table projects</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table projects created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`states`
( `id_state` INT NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR(25) NOT NULL ,
PRIMARY KEY (`id_state`)) ENGINE = InnoDB;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table states</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table states created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`departement` (
  `name` varchar(50) NOT NULL,
  `amount` double NOT NULL,
`id_state` int NOT NULL,
PRIMARY KEY (`name`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table departement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table departement created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`prime` (
  `name` varchar(25) NOT NULL,
  `amount` double NOT NULL,
`id_state` int NOT NULL,
PRIMARY KEY (`name`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table prime</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table prime created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`CCQ` (
  `name` varchar(25) NOT NULL,
  `amount` double NOT NULL,
`id_state` int NOT NULL,
PRIMARY KEY (`name`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table CCQ</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table CCQ created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`work_weeks` (
  `id_work_week` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `begin_date` date NOT NULL,
  `begin_day` int(11) NOT NULL,
  `id_state` int(11) NOT NULL,
PRIMARY KEY ( `id_work_week`)
) ENGINE=InnoDB';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table work_weeks</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table work_weeks created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`detail_week`
 ( `id_detail_week` INT NOT NULL AUTO_INCREMENT ,
 `id_employe` INT NOT NULL , `mechanic` DOUBLE NOT NULL ,
 `other` DOUBLE NOT NULL , `total` DOUBLE NOT NULL ,
 `paied` DOUBLE NOT NULL , `regular` DOUBLE NOT NULL ,
  `id_state` int(11) NOT NULL,
 PRIMARY KEY (`id_detail_week`)) ENGINE = InnoDB;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table detail_week</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table detail_week created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`employe_week_hours`
 ( `id_employe_hour` INT NOT NULL AUTO_INCREMENT ,
`id_work_week` INT NOT NULL ,
 `id_employe` INT NOT NULL , 
`id_project` INT NOT NULL , 
`departement` varchar(50) NOT NULL ,
 `hours` DOUBLE NOT NULL ,
  `id_state` int(11) NOT NULL,
 PRIMARY KEY (`id_employe_hour`)) ENGINE = InnoDB;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table employe_week_hours</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table employe_week_hours created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`payements` 
( `id_payement` INT NOT NULL AUTO_INCREMENT ,
 `payed` DOUBLE NOT NULL ,
 `regular` DOUBLE NOT NULL ,
  `id_state` int(11) NOT NULL,
PRIMARY KEY (`id_payement`)) ENGINE = InnoDB;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table payements</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table payements created successfully</span>\n";
}
echo "<br>";


$sql = 'CREATE TABLE `acier_fastech`.`prime_payement`
 ( `id_prime_payement` INT NOT NULL AUTO_INCREMENT , 
`id_payement` INT NOT NULL , `prime` varchar(25) NOT NULL,
`amount` DOUBLE NOT NULL , `id_state` INT NOT NULL ,
 PRIMARY KEY (`id_prime_payement`)) ENGINE = InnoDB;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table prime_payement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table prime_payement created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`bankholiday_payement`
 ( `id_bankholiday_payement` INT NOT NULL AUTO_INCREMENT ,
`id_payement` INT NOT NULL , `holiday` DOUBLE NOT NULL,
`bank` DOUBLE NOT NULL , `id_state` INT NOT NULL ,
 PRIMARY KEY (`id_bankholiday_payement`)) ENGINE = InnoDB;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table bankholiday_payement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table bankholiday_payement created successfully</span>\n";
}
echo "<br>";


/**********************************************INDEXES *******************************************/

$sql = 'ALTER TABLE `acier_fastech`.`employees` ADD INDEX `id_dep_emp` (`departement`);';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to employees</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>index created successfully in  employees</span>\n";
}
echo "<br>";

$sql = 'ALTER TABLE `employees` ADD CONSTRAINT `cascade_emp_dep` FOREIGN KEY (`departement`) REFERENCES `departement`(`name`) ON DELETE CASCADE ON UPDATE CASCADE;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to employees</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in  employees</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `acier_fastech`.`detail_week` ADD UNIQUE (`id_employe`);';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>index created successfully in detail_week</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>index created successfully in  detail_week</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `detail_week`
ADD CONSTRAINT `cascade_dt_emp` FOREIGN KEY (`id_employe`)
REFERENCES `employees`(`id_employe`)
ON DELETE CASCADE ON UPDATE CASCADE;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to detail_week</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in detail_week</span>\n";
}
echo "<br>";

$sql = 'ALTER TABLE `acier_fastech`.`employe_week_hours` ADD INDEX `ewh_ww` (`id_work_week`);';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to employe_week_hours</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>index created successfully in employe_week_hours</span>\n";
}
echo "<br>";

$sql = 'ALTER TABLE `acier_fastech`.`employe_week_hours` ADD INDEX `ewh_e` (`id_employe`);';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to employe_week_hours</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>index created successfully in employe_week_hours</span>\n";
}
echo "<br>";

$sql = 'ALTER TABLE `acier_fastech`.`employe_week_hours` ADD INDEX `ewh_p` (`id_project`);';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to employe_week_hours</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>index created successfully in employe_week_hours</span>\n";
}
echo "<br>";

$sql = 'ALTER TABLE `acier_fastech`.`employe_week_hours` ADD INDEX `ewh_d` (`departement`);';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to employe_week_hours</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>index created successfully in employe_week_hours</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `employe_week_hours` ADD CONSTRAINT `ewh_ww_fk` FOREIGN KEY (`id_work_week`) REFERENCES `work_weeks`(`id_work_week`) ON DELETE CASCADE ON UPDATE CASCADE';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to detail_week</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in detail_week</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `employe_week_hours` ADD CONSTRAINT `ewh_p_fk` FOREIGN KEY (`id_project`) REFERENCES `projects`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to detail_week</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in detail_week</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `employe_week_hours` ADD CONSTRAINT `ewh_d_fk` FOREIGN KEY (`departement`) REFERENCES `departement`(`name`) ON DELETE CASCADE ON UPDATE CASCADE;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to detail_week</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in detail_week</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `payements` ADD `id_work_week` INT NOT NULL AFTER `regular`, 
ADD `id_employe` INT NOT NULL AFTER `id_work_week`, 
ADD INDEX `payement_ww` (`id_work_week`), ADD INDEX `payement_e` (`id_employe`);';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to payements</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Index created successfully in payements</span>\n";
}
echo "<br>";



$sql = 'ALTER TABLE `payements` ADD CONSTRAINT `payement_e_fk` FOREIGN KEY (`id_employe`) 
REFERENCES `employees`(`id_employe`) ON DELETE CASCADE ON UPDATE CASCADE; ';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to payements</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in payements</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `payements`
ADD CONSTRAINT `payement_ww_fk` FOREIGN KEY (`id_work_week`)
REFERENCES `work_weeks`(`id_work_week`) ON DELETE CASCADE ON UPDATE CASCADE;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to payements</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in payements</span>\n";
}
echo "<br>";



$sql = 'ALTER TABLE `acier_fastech`.`prime_payement` ADD INDEX `prime_payement_p` (`id_payement`) USING BTREE;;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to prime_payement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Index created successfully in prime_payement</span>\n";
}
echo "<br>";

$sql = 'ALTER TABLE `acier_fastech`.`bankholiday_payement` ADD INDEX `bankholiday_payement_p` (`id_payement`) USING BTREE;;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to prime_payement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Index created successfully in bankholiday_payement</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `acier_fastech`.`prime_payement` ADD INDEX `prime_payement_pr` (`prime`);';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add index to prime_payement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Index created successfully in prime_payement</span>\n";
}
echo "<br>";


$sql = 'ALTER TABLE `prime_payement` ADD CONSTRAINT `prime_payement_p_fk` FOREIGN KEY (`id_payement`) 
REFERENCES `payements`(`id_payement`) ON DELETE CASCADE ON UPDATE CASCADE; ';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to prime_payement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in prime_payement</span>\n";
}
echo "<br>";

$sql = 'ALTER TABLE `bankholiday_payement` ADD CONSTRAINT `bankholiday_payement_p_fk` FOREIGN KEY (`id_payement`)
REFERENCES `payements`(`id_payement`) ON DELETE CASCADE ON UPDATE CASCADE; ';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to bankholiday_payement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in bankholiday_payement</span>\n";
}
echo "<br>";

$sql = 'ALTER TABLE `prime_payement` ADD CONSTRAINT `prime_payement_pr_fk` FOREIGN KEY (`prime`) REFERENCES `prime`(`name`) ON DELETE CASCADE ON UPDATE CASCADE;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not add delete/upload cascade to prime_payement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Delete/upload cascade created successfully in prime_payement</span>\n";
}
echo "<br>";

/*********************************************CREATE VIEW**********************************************/


$sql = 'CREATE VIEW banqueHeures as
SELECT CONCAT(  e.first_name," ",e.family_name ) AS `nom`,   SUM(bank) as heures
FROM `bankholiday_payement` as b_p
JOIN payements p on p.id_payement = b_p.id_payement
JOIN employees e on p.id_employe = e.id_employe
GROUP BY p.id_employe
ORDER BY  p.id_employe';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create view banqueHeures</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>View banqueHeures created successfully </span>\n";
}
echo "<br>";

/********************************************Add data**********************************************/



$sql = "INSERT INTO `users` (`id_user`, `username`, `password`, `id_state`) VALUES (null, 'admin', 'password', '1'), (null, 'Nancy', 'password', '1'), (null, 'Lyne', 'password', '1')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into users</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into users</span>\n";
}
echo "<br>";


$sql = "INSERT INTO `states` (`id_state`, `name`) VALUES (null, 'active'), (null, 'disabled')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into states</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into states</span>\n";
}
echo "<br>";


$sql = "INSERT INTO `departement` (`name`, `amount`, `id_state`)
 VALUES ('Usine', '26.35', '1'), ('Temps 1/2 usine', '37.34', '1'), ('Peinture', '29.09', '1'), ('Temps 1/2 peinture', '42.98', '1'),
 ('Usine chiffre nuit', '22.84', '1'), ('Peinture chiffre nuit', '22.84', '1'), ('Peinture chiffre nuit T1/2', '33.85', '1'),
 ('Emballage', '27.02', '1'), ('Emballage Temps 1/2', '40.06', '1'), ('Chargé projet dessin', '29.53', '1')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into departement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into departement</span>\n";
}
echo "<br>";

$sql = "INSERT INTO `employees` (`id_employe`, `first_name`, `family_name`, `hour_rate`, `departement`, `id_state`)
VALUES (231, 'Lyne', 'Audet', '10', 'Peinture', '1'), (357, 'Marie-Eve', 'B.Drouin', '25', 'Usine', '1'),
(12, 'Michel', 'Boulet', '15', 'Peinture', '1'), (31, 'Frédéric', 'Isabel', '23', 'Usine', '1'),
(88, 'Steeve', 'Bussières', '16', 'Peinture', '1'), (91, 'Sylvaine', 'Therrien', '28', 'Usine', '1'),
(92, 'Berthier', 'Poulin', '19', 'Peinture', '1'), (94, 'Vincent', 'Maheux', '22', 'Usine', '1'),
(108, 'André', 'Veilleux', '15', 'Peinture', '1'), (159, 'François', 'Therrien', '23', 'Usine', '1'),
(180, 'Vincent', 'Fortin', '17', 'Peinture', '1'), (198, 'Alex', 'Fillion Audet', '23', 'Usine', '1'),
(202, 'Jean-François', 'Poulin', '11', 'Peinture', '1'), (221, 'Jimmy', 'G.L Fortier', '29', 'Usine', '1'),
(235, 'Lucas', 'Therrien', '26', 'Peinture', '1'), (265, 'François', 'Gilbert', '23.7', 'Usine', '1'),
(286, 'Cédric', 'Huot', '36', 'Peinture', '1'), (295, 'Paulin', 'Hallé', '23', 'Usine', '1'),
(310, 'Jacob', 'Therrien', '26', 'Peinture', '1'), (342, 'Alain', 'Richard', '20', 'Usine', '1'),
(345, 'Yannick', 'Rosa', '3', 'Peinture', '1'), (347, 'Joey', 'G.Veilleux', '23', 'Usine', '1'),
(353, 'Serge', 'Veilleux', '15.75', 'Peinture', '1'), (354, 'Jean-Pascal', 'Grenier', '23.2', 'Usine', '1'),
(355, 'Pier-Luc', 'Bouchard', '15', 'Peinture', '1'), (359, 'Cédrick', 'Breton', '22.6', 'Usine', '1'),
(360, 'Maxime', 'Grégoire', '15.3', 'Peinture', '1'), (362, 'Jason', 'Couture', '21.9', 'Usine', '1'),
(363, 'Jason', 'Parent', '14.6', 'Peinture', '1'), (364, 'Nancy', 'Bernier', '22.85', 'Usine', '1'),
(90, 'Branislava', 'Bojanic', '26.3', 'Peinture', '1'), (291, 'Étienne', 'Landry', '20.2', 'Usine', '1'),
(293, 'David', 'Roy', '22.6', 'Peinture', '1'), (331, 'Kathleen', 'Duquette', '21.56', 'Usine', '1'),
(348, 'Keven', 'Landry', '15', 'Peinture', '1'), (365, 'M-Antoine', 'Roussin', '23', 'Usine', '1'),
(133, 'Jacques', 'Dupuis', '15', 'Peinture', '1'), (25, 'Éric', 'Therrien', '23', 'Usine', '1'),
(33, 'Sylvio', 'Therrien', '15', 'Peinture', '1'), (135, 'Steve', 'Begin', '23', 'Usine', '1'),
(188, 'Yannick', 'Therrien', '15', 'Peinture', '1'), (241, 'Gaétan', 'Marcotte', '23', 'Usine', '1')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into employees</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into employees</span>\n";
}
echo "<br>";


$sql = "INSERT INTO `prime` (`name`, `amount`, `id_state`) VALUES ('Nuit', '1', '1'), ('Soir', '2', '1')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into prime</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into prime</span>\n";
}
echo "<br>";

$sql = "INSERT INTO `CCQ` (`name`, `amount`, `id_state`) VALUES ('CCQx', '20', '1'), ('CCQy', '10', '1')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into CCQ</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into CCQ</span>\n";
}
echo "<br>";

$sql = "INSERT INTO `projects` (`id_project`, `name`, `start_date`, `production_total`, `budget`, `id_state`) 
VALUES (NULL, 'Comi 4 loko', '2017-06-01', '0', '4', '1'),
(NULL, 'The revolution', '1925-01-17', '0', '134265', '1')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into projects</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into projects</span>\n";
}
echo "<br>";

$sql = "INSERT INTO `work_weeks` (`id_work_week`, `name`, `begin_date`, `begin_day`, `id_state`)
 VALUES (NULL, '8-juin-2017', '2017-06-08', '6', '1'), (NULL, '15-juin-2017', '2017-06-15', '6', '1'),
(NULL, '22-juin-2017', '2017-06-22', '6', '1'), (NULL, '29-juin-2017', '2017-06-29', '6', '1')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into work_weeks</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into work_weeks</span>\n";
}
echo "<br>";

$sql = "INSERT INTO 
`detail_week` (`id_detail_week`, `id_employe`, `mechanic`, `other`, `total`, `paied`, `regular`, `id_state`) 
VALUES (NULL, '90', '2', '3', '2', '3', '4', '1'), (NULL, '133', '0', '0', '0', '0', '0', '1')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into detail_week</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into detail_week</span>\n";
}
echo "<br>";




/**********************************************Close db connection**********************************/
$conn->close();
?>