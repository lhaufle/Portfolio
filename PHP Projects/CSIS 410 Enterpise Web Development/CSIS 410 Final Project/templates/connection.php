<?PHP
$server = 
$userName = 
$password = 
$database = 

//connect to the database
$dbs = mysqli_connect($server, $userName, $password, $database);

//set character set to utf
mysqli_set_charset($dbs, 'utf8');

?>
