<?PHP
$server = 'localhost';
$userName = 'lhaufle_lhaufle';
$password = 'batman123';
$database = 'lhaufle_Little_Hauflings';

//connect to the database
$dbs = mysqli_connect($server, $userName, $password, $database);

//set character set to utf
mysqli_set_charset($dbs, 'utf8');

?>