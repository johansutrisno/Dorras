<html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Pengajuan Event</title>
    </head>
    <body>
        <?php include 'nav.php';?>
        <div class="container">
            <div class="row">
                <br><center><h4 class="red-text text-darken-3">Form Pengajuan Event</h4></center>
                <form class="col s12" method="post" action="" enctype="multipart/form-data">
                  <div class="row">
                      <div class="input-field col s6">
                          <input type="text" class="validate" data-length="20" name="narahubung" required>
                          <label for="last_name">Narahubung / HUMAS</label>
                      </div>
                    <div class="input-field col s6">
                            <input type="text" class="validate" data-length="20" name="cp" required>
                            <label for="last_name">Contact Person</label>
                        </div>
                  </div>
                  <div class="row">
                      <div class="input-field col s12">
                          <input type="text" class="validate" data-length="100" name="namaevent" required">
                          <input type="hidden" class="validate" name="iduser" value="<?php echo $iduser;?>">
                          <label for="last_name">Nama Event</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="date" class="datepicker" placeholder="Tanggal Mulai Event" name="mulai" required>
                            <script type="text/javascript">
                                $('.datepicker').pickadate({
                                    selectMonths: true, // Creates a dropdown to control month
                                    selectYears: 15 // Creates a dropdown of 15 years to control year  
                                });
                            </script>
                        </div>
                        <div class="input-field col s6">
                            <input type="date" class="datepicker" placeholder="Tanggal Berakhir Event" name="selesai" required>
                            <script type="text/javascript">
                                $('.datepicker').pickadate({
                                    selectMonths: true, // Creates a dropdown to control month
                                    selectYears: 15 // Creates a dropdown of 15 years to control year  
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="textarea1">Deskripsi Event</label>
                            <textarea id="textarea1" class="materialize-textarea" name="deskripsi" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m8">
                            <?php include 'maps.php' ?>
                        </div>
                        <div class="col s12 m4">
                            <div class="file-field input-field">    
                                <div class="btn waves-effect waves-light grey">    
                                    <span>Pilih File</span>    
                                    <input type="file" placeholder="Poster Event" name="foto" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text"  placeholder="Poster Event" required>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col s12 m3"></div>
                        <div class="col s12 m4">
                            <center><button class="right btn btn-large waves-effect waves-light red darken-3" type="submit" name="send">Send<i class="material-icons right">send</i></button></center>
                        </div>
                        
                    </div>
                </form>
<?php 
    require_once('koneksi.php');
    
    function getCoordinates($address){
 
        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
         
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
         
        $response = file_get_contents($url);
         
        $json = json_decode($response,TRUE); //generate array object from the response from the web

        return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
     
    }
    
    if (isset($_POST['send']) && isset($_FILES['foto'])) {
        $narahubung     = $_POST['narahubung'];
        $cp             = $_POST['cp'];
        $namaevent      = $_POST['namaevent'];
        $lokasi         = $_POST['lokasi'];
        $tglmulai       = $_POST['mulai'];
        $tglselesai     = $_POST['selesai'];
        $deskripsi      = $_POST['deskripsi'];
        $status         = 0;
        $id_user        = $_POST['iduser'];

        $coor = explode(',', getCoordinates($lokasi));
        $lat = $coor[0];
        $lon = $coor[1];
        
        $errors= array();
        $nama_file = $_FILES['foto']['name'];
        $ukuran_file = $_FILES['foto']['size'];
        $tipe_file = $_FILES['foto']['type'];
        $tmp_file = $_FILES['foto']['tmp_name'];

        $waktu = date('His');
        $nama_file_baru = $waktu.$nama_file;
        $path = "img/event/".$nama_file_baru;

        if($tipe_file == "image/jpeg" || $tipe_file == "image/png")
        {
            if($ukuran_file <= 2000000)
            {
                move_uploaded_file($tmp_file, $path);

                $query = oci_parse($conn,"INSERT INTO proposal (nama_event, id_user, narahubung, contact_person, lokasi, tglmulai, tglselesai, deskripsi, foto, lat, lon, status_proposal) VALUES (:namaevent, :id_user, :narahubung, :contact_person, :lokasi, :tglmulai, :tglselesai, :deskripsi, :foto, :lat, :lon, :status_proposal)");

                oci_bind_by_name($query,":namaevent", $namaevent);
                oci_bind_by_name($query,":id_user", $id_user);
                oci_bind_by_name($query,":narahubung", $narahubung);
                oci_bind_by_name($query,":contact_person", $cp);
                oci_bind_by_name($query,":lokasi", $lokasi);
                oci_bind_by_name($query,":tglmulai", $tglmulai);
                oci_bind_by_name($query,":tglselesai", $tglselesai);
                oci_bind_by_name($query,":deskripsi", $deskripsi);
                oci_bind_by_name($query,":foto", $nama_file_baru);
                oci_bind_by_name($query,":lat", $lat);
                oci_bind_by_name($query,":lon", $lon);
                oci_bind_by_name($query,":status_proposal", $status);
                
                oci_execute($query) or die(oci_error());

                oci_close($conn);

                 if ($query) {
                    echo "<script>
                        alert('Terimakasih, pengajuan event telah diterima')
                        window.location = 'propose.php';
                    </script>";
                } else {
                    echo "<script>
                        alert('Gagal')
                        window.location = 'propose.php';
                    </script>";
                }
            }
            else
            {

                echo "<font color='red'>Maaf, ukuran filenya terlalu besar.</font>";
            }
        }
        else
        {
            echo "<font color='red'>Maaf, tipe filenya harus jpg/png.</font>";
        }
    }
?>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>