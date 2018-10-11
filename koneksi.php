 <?php
	$username="dorras";
	$password="dorras";
	$dbname="localhost/XE";
	$conn=oci_connect($username, $password, $dbname);
	if (!$conn) {
		echo "Koneksi ke server database gagal dilakukan";
		exit();
	}
?>