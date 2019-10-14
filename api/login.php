<?php

require "conn.php";

$user_email = $_POST["email"];
$user_pass = '$2y$10$gMUg0Z3a4/sNf2Xm0GdUGOGcpB9s9hDY3i1MXbAwniGF/Aw2/BlRi';

$mysql_qry = "select * from users where email like '$user_email' and password like '$user_pass'";

$result = mysqli_query($conn, $mysql_qry);

if (mysqli_num_rows($result) > 0) {
    echo "login success";
} else {
    echo "login failed";
}
