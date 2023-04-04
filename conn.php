<?php
function connection() {
    //membuat koneksi ke database local
    $dbhost = 'localhost';
    $dbUser = 'root';
    $dbPass = "";
    $dbName = "transupn";

    $conn = mysqli_connect($dbhost, $dbUser, $dbPass);

    if($conn) {
        $open = mysqli_select_db($conn, $dbName);
        return $conn;
    } else {
        echo "MySQL Tidak Terhubung";
    }
}
?>