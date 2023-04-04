<?php
    include('conn.php');

    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idKondektur = $_GET['id'];
            $query = "DELETE FROM kondektur WHERE id_kondektur = $idKondektur";

            $result = mysqli_query(connection(),$query);

            if ($result) {
                $status = 'okay';
            } else {
                $status = 'error';
            }

            header('Location: UTS.php?status='.$status);
        }
    }
?>