<?php 
	require_once('koneksi.php');
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $password = md5($pass);

        $query = oci_parse($conn, "SELECT * FROM dorras_user WHERE EMAIL = '" . $email . "' and PASSWORD = '" . $password . "'");

        oci_execute($query);

        while (($data = oci_fetch_array($query, OCI_ASSOC)) != false) {
            if($data['ID_ROLE'] == 1){
                session_start();
                $_SESSION['email']=$email;
                $_SESSION['password'] = $pass;
                $_SESSION['idrole'] = $data['ID_ROLE'];
                $_SESSION['iduser'] = $data['ID_USER'];
                header("Location: admin/index.php");
            } elseif ($data['ID_ROLE'] == 2) {
                session_start();
                $_SESSION['email']=$email;
                $_SESSION['password'] = $pass;
                $_SESSION['idrole'] = $data['ID_ROLE'];
                $_SESSION['iduser'] = $data['ID_USER'];
                header("Location: home.php");
            } else {
                // header('Location: index.php');
            }
            // header('Location: index.php');
        }
        header('Location: index.php');
    }
?>