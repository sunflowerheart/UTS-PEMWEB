<?php
    include('conn.php');

    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idTransUPN = $_GET['id'];
            $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$idTransUPN'";

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