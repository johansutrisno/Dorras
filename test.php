<?php 
    require_once('koneksi.php');
    function getCoordinates($address){
 
        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
         
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
         
        $response = file_get_contents($url);
         
        $json = json_decode($response,TRUE); //generate array object from the response from the web

        return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
     
    }
    
    if (isset($_POST['send'])) {
        $narahubung     = $_POST['narahubung'];
        $cp             = $_POST['cp'];
        $nama           = $_POST['nama'];
        $lokasi         = $_POST['lokasi'];
        $tglmulai       = $_POST['mulai'];
        $tglselesai     = $_POST['selesai'];
        $deskripsi      = $_POST['deskripsi'];
        $status         = 0;
        $id_user        = $_POST['iduser'];

        $coor = explode(',', getCoordinates($lokasi));
        $lat = $coor[0];
        $lon = $coor[1];
        
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

                $query = oci_parse($conn,"INSERT INTO proposal (nama_event, id_user, narahubung, contact_person, lokasi, tglmulai, tglselesai, deskripsi, foto, lat, lon, status_proposal) VALUES (:nama, :id_user, :narahubung, :contact_person, :lokasi, :tglmulai, :tglselesai, :deskripsi, :foto, :lat, :lon, :status_proposal)");

                oci_bind_by_name($query,":nama_event", $nama);
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
                        alert('Terimakasih, pertanyaan telah diterima')
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