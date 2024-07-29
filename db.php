<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blogs';

$conn = new mysqli( 'localhost', 'root', '', 'blogs' );

if ( $conn-> connect_error ) {
    die( 'connection fail'.$conn->connect_error );

} else {
    echo 'connected';
}

//$id = '1';
//$title = 'post 1';
//$content = 'this is first post';

?>
