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
                <center>
                    <h4 class="red-text text-darken-3">Hi Dorras</h4>
                    <p>Jika anda punya pertanyaan, silahkan tanya pada dorras.</p>
                </center>
                <!--Edit-->
                <form class="col s12" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="input_text" type="text" data-length="50" name="nama" required>
                            <label for="input_text">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" data-length="30" name="email" required>
                            <label for="email" data-error="wrong" data-success="right">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="faq" data-length= "100">
                            <label>Frequently Asked Question</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light red darken-3" type="submit" name="tambah">Send<i class="material-icons right">send</i></button>
                </form>
            </div>
            <br><br>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>

<?php 
    require_once('koneksi.php');

    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $faq = $_POST['faq'];
        $kelas = $_POST['kelas'];
        
        $query = oci_parse($conn,"INSERT INTO dorras_faq (nama, email, pertanyaan, id_user) VALUES (:nama, :email, :pertanyaan, :iduser)");

        oci_bind_by_name($query,":nama", $nama);
        oci_bind_by_name($query,":email", $email);
        oci_bind_by_name($query,":pertanyaan", $faq);
        oci_bind_by_name($query,":iduser", $iduser);
        
        oci_execute($query) or die(oci_error());

        oci_close($conn);

        if ($query) {
            echo "<script>
                alert('Terimakasih, pertanyaan telah diterima')
                window.location = 'faq.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal')
                window.location = 'faq.php';
            </script>";
        }

    }
?>