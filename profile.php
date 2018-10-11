<html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <?php include 'nav.php'; ?>
        <div class="container">
            <div class="row">
                <center><h4 class="red-text text-darken-3">Profile</h4></center>
                <?php 
                require_once('koneksi.php');
                
                $query = oci_parse($conn, "select * from dorras_user where id_user = '$iduser'");

                oci_execute($query);

                while (($data = oci_fetch_array($query, OCI_ASSOC)) != false) {
                ?>
                <div class="col s12 m8">
                    <form class="col s12" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="input_text" type="text" data-length="50" name="nama" value="<?php echo $data['NAMA_USER'] ?>" readonly>
                            <label for="input_text">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" data-length="100" name="email" value="<?php echo $data['EMAIL'] ?>" readonly>
                            <label for="email" data-error="right" data-success="right">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="text" class="validate" data-length="30" name="notel" value="<?php 
                            if (!empty($data['NO_TELP'])) {
                               echo $data['NO_TELP']; 
                             } ?>" required>
                            <label for="email" data-error="wrong" data-success="right">Nomor Telepon</label>
                        </div>
                    </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select name="goldar">
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                                <label>Golongan Darah</label>
                                <script>
                                      $(document).ready(function() {
                                        $('select').material_select();
                                      });
                                </script>
                            </div>
                        </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="email" type="text" class="validate" data-length="100" name="alamat" value="<?php if (!empty($data['ALAMAT'])) {
                                echo $data['ALAMAT'];
                            }  ?>" required>
                            <label for="email" data-error="wrong" data-success="right">Alamat</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="email" type="text" class="validate" data-length="5" name="kodepos" value="<?php if (!empty($data['KODE_POS'])) {
                              echo $data['KODE_POS'];
                            }  ?>" required>
                            <label for="email" data-error="wrong" data-success="right">Kode Pos</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light red darken-3" type="submit" name="update">Send<i class="material-icons right">send</i></button>
                </form>
                </div>
                <div class="right col s12 m3">
                    <div class="row">
                      <div class="card-panel white darken-3">
                        <center>
                          <h5 class="red-text">SCORE</h5>
                          <div class="divider"></div>
                            <span class="red-text"><h1><?php if (empty($data['SCORE'])) echo "0"; else echo $data['SCORE']?></h1></span>
                        </center>
                      </div>
                    </div> 
                    <?php } ?>
                    <div class="row">
                    <center><h5 class="red-text">History Event</h5></center>
                    <div class="divider"></div>
                      <table>
                      <?php 
                        $query2 = oci_parse($conn, "SELECT * FROM  dorras_event, participant where participant.id_event = dorras_event.id_event and participant.id_user = '$iduser'");
                        oci_execute($query2);
                        while (($data = oci_fetch_array($query2, OCI_ASSOC)) != false) { ?>
                            <tr>
                              <td><h6><?php echo $data['NAMA_EVENT'] ?></h6></td>
                              <td> <?php if ($data['STATUS'] == 0) {
                                  echo "<i class='material-icons'>access_time</i>";
                              } elseif ($data['STATUS'] == 1) {
                                echo "<i class='material-icons'>done</i>";
                              } else echo"<i class='material-icons'>clear</i>"; ?></td>
                            </tr>
                        <?php } ?>
                      </table>
                    </div>
                </div>
                
                </div>
            </div>
        <?php include 'footer.php' ?>
    </body>
</html>
<?php 
    if (isset($_POST['update'])) {
      $jawaban = $_POST['update'];

      echo $notel    = $_POST['notel'];
      echo $alamat   = $_POST['alamat'];
      echo $kodepos  = $_POST['kodepos'];

      $query = oci_parse($conn, "UPDATE dorras_user SET NO_TELP = '". $notel ."', ALAMAT ='". $alamat ."', KODE_POS = '". $kodepos ."' WHERE ID_USER = '" . $id . "'");

      oci_execute($query);

      if ($query) {
        echo "<script>
          alert('Data berhasil diupdate')
          window.location = 'profile.php';
        </script>";
      }
      else
      {
        echo "<script>
          alert('Data gagal diupdate')
        </script>"; 
      }
  }

?>