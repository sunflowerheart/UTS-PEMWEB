<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>UTS PEMWEB</title>
    <style>
            .status_beroperasi {
                background-color: green;
                color: white;
            }
            .status_cadangan {
                background-color: yellow;
            }
            .status_rusak {
                background-color: red;
            }
        </style>
  </head>

  <body>
    <nav>
      <a href="#">Bus Trans UPN</a>
    </nav>
    <div>
      <div>
        <nav>
          <div>
            <ul style="margin-top:100px;">
              <li>
                <a href="UTS.php">Data Trans Bus UPN</a>
              </li>
              <li>
                <a href="driver.php">Data Driver</a>
              </li>
              <li>
                  <a href="bus.php">Data Bus</a>
              </li>
              <li>
                  <a href="kondektur.php">Data Kondektur</a>
              </li>
              <li>
                  <a href="tambahTrans.php">Tambah Data Trans UPN</a>
              </li>
              <li>
                  <a href="tambahKondektur.php">Tambah Data Kondektur</a>
              </li>
              <li>
                  <a href="tambahDriver.php">Tambah Data Driver</a>
              </li>
              <li>
                  <a href="tambahBus.php">Tambah Data BUS</a>
              </li>
              <li>
                  <a href="gaji.php">Menghitung Gaji</a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main">
          <!-- filter -->
          <form action="" method="GET">
                <label for="">Status</label>
                <select name="statusbus" id="statusbus" required>
                    <option value="">Pilih</option>
                    <option value="1">Beroperasi</option>
                    <option value="2">Cadangan</option>
                    <option value="0">Rusak</option>
                </select>
                <button type="submit">Pilih</button>
            </form>
            <?php 
            if(isset($_GET['status_bus'])){
                $status_bus = $_GET['status_bus'];
                $query = "SELECT * FROM bus WHERE status = '$status_bus'";
            }else{
                $query = "SELECT * FROM bus";
            }
              $result = mysqli_query(connection(),$query);
             ?>
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>ID BUS berhasil di-perbarui</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID BUS gagal di-perbarui</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel BUS Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID BUS</th>
                  <th>PLAT</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM bus";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="status_<?php if ($data['status'] == 1){ echo 'beroperasi';} elseif ($data['status'] == 2) { echo 'cadangan';} elseif ($data['status'] == 0){ echo 'rusak';} ?>">
                    <?php echo $data['status'];  ?></td>
                    <td>
                      <a href="<?php echo "deleteBus.php?id=".$data['id_bus']; ?>"> Delete</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "updateBus.php?id=".$data['id_bus']; ?>"> Update</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

  </body>
</html>