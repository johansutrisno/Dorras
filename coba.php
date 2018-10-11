<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
<input type="date" name="tgl">
<input type="submit" name="submit">
</form>
</body>
</html>
<?php 
	require_once('koneksi.php');
	if (isset($_POST['submit'])) {
		$tanggal = $_POST['tgl'];
		$date=date_create($tanggal);
		$tgl = date_format($date,'d-M-Y');
		echo $tgl;

		$query2 = oci_parse($conn, "INSERT INTO data_user (tanggal_lahir) VALUES (:tgl)");
		
		oci_bind_by_name($query2, ":tgl", $tgl);

		oci_execute($query2);

		if ($query2) {
			echo "Berhasil";
		} else {
			echo "Gagal";
		}
	}
 ?> -->
 <?php 
 	if(isset($_POST['register'])){            
        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $nama = $fn. " ". $ln;
        $tanggal = $_POST['tgl'];
        $date=date_create($tanggal);
        $tgl = date_format($date,'d-M-Y');
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $id_role = "2";

        echo $tgl;

        if ($_POST['pass1'] != $_POST['pass2']) {
            echo "<script>
                alert('password tidak sama')
            </script>";
        }else{
            $query = oci_parse($conn, "INSERT INTO dorras_user(email, password, id_role, nama_user, tanggal_lahir) VALUES (:email, :password, :role, :nama, :tgl)");

            oci_bind_by_name($query, ":nama", $nama);
            oci_bind_by_name($query, ":tgl", $tgl);
            oci_bind_by_name($query, ":role", $id_role);
            oci_bind_by_name($query, ":email", $email);
            oci_bind_by_name($query, ":password", $password);

            oci_execute($query);

            //oci_close($conn);

            if($query){
                echo " 
                    <script>
                        alert('Anda sudah terdaftar');
                        window.location = 'home.php';
                    </script>
                ";
            }else{
                echo " 
                    <script>
                        alert('Gagal Dech..');
                    </script>
                ";
            }
        }
    }
 ?>