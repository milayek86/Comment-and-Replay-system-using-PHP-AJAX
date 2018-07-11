<?php
//fill all the details. localhost , DB user name , DB password , DB name...
$con= mysqli_connect("localhost", "my_user", "my_password", "my_db");

function filter_all($event){
    $con= mysqli_connect("localhost", "my_user", "my_password", "my_db");
    $eventSecure =strip_tags(htmlentities(htmlspecialchars($event)));
    $eventSecure=mysqli_real_escape_string($con, $eventSecure);
    return $eventSecure;
}

?>
