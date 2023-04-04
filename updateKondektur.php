<?php
    include('conn.php');

    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idKondektur_update = $_GET['id'];
            $query = "SELECT * FROM kondektur WHERE id_kondektur = $idKondektur_update";

            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idKondektur = $_POST['id_kondektur'];
        $nama = $_POST['nama'];

        $sql = "UPDATE kondektur SET id_kondektur='$idKondektur', nama='$nama' WHERE id_kondektur=$idKondektur";

        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }

        header('Location: kondektur.php?status='.$status);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percontohan</title>
</head>
<body>
    <nav>
        <a href="#">Update Kondektur</a>
    </nav>
    <div>
      <div>
        <nav>
          <div>
            <ul style="margin-top:100px;">
              <li>
                <a href="tambahTrans.php">Data Trans Bus UPN</a>
              </li>
              <li>
                <a href="tambahDriver.php">Data Driver</a>
              </li>
              <li>
                  <a href="tambahBus.php">Data Bus</a>
              </li>
              <li>
                  <a href="tambahKondektur.php">Data Kondektur</a>
              </li>
            </ul>
          </div>
        </nav>
            <main role="main">
                <?php
                    if ($status == 'okay') {
                        echo '<br><br><div role="alert">ID Kondektur berhasil disimpan</div>';
                    } elseif ($status == 'error') {
                        echo '<br><br><div role="alert">ID Kondektur gagal disimpan</div>';
                    }
                ?>
                <h2 style="margin: 30px 0 30px;">Update Data Trans Bus</h2>
                <form action="updateKondektur.php" method="POST">
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <div>
                        <label>ID Kondektur</label>    
                        <input type="text" placeholder="Angka Acak" value="<?= $data['id_kondektur'] ?>" name="id_kondektur" required="required">
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" placeholder="Kondektur...." value="<?= $data['nama'] ?>" name="nama" required="required">
                    </div>
                    <?php endwhile ?>
                    <button type="submit">Save</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>