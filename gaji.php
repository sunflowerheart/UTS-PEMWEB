<?php
    include('conn.php');
    $query = "SELECT * FROM driver";
    $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAJI TRANS BUS UPN</title>
</head>
<body>
    <div>
        <main role="main">
            <table border="1">
                <thead>
                    <tr>
                        <th>ID Driver</th>
                        <th>NAMA</th>
                        <th>Harga per KM</th>
                        <th>TOTAL KM</th>
                        <th>Total Gaji Driver</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <tr>
                        <?php
                        $queryforKM = "SELECT SUM(jumlah_km) AS tot_km FROM trans_upn WHERE id_driver = $data[id_driver] GROUP BY id_driver";
                        $hasil_jarak = mysqli_query(connection(), $queryforKM);
                        $dataDriver = mysqli_fetch_assoc($hasil_jarak);
                        if($dataDriver === NULL) {
                            $tot_km = 0;
                        } else {
                            $tot_km = $dataDriver['tot_km'];
                        }
                        $driver_gaji_perKM = 3000;
                        $driver_gaji = $tot_km * $driver_gaji_perKM;
                        ?>
                        <td><?php echo $data['id_driver'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $driver_gaji_perKM; ?></td>
                        <td><?php echo $tot_km; ?></td>
                        <td><?php echo "Rp. ", $driver_gaji; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>