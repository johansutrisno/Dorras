<?php
    session_start();
    if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['idrole'])){
        header("location: home.php");
    }
?>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        body{
            background: #00695c;
        }

        h5{    
            font-weight: 400;
        }

        .container{
            margin-top: 80px;
            width: 400px;
            height: 750px;
        }

        .tabs .indicator{
            background-color: #e0f2f1;
            height: 60px;
            opacity: 0.3;
        }

        .form-container{
            padding: 40px;
            padding-top: 10px;
        }

        .confirmation-tabs-btn{
            position: absolute;
        }
    </style>
    <script type="text/javascript">
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    </script>
</head>
<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/date_picker/picker.date.js"></script>
    <script type="text/javascript" src="js/date_picker/picker.js"></script>
    <div class="container white z-depth-2">
        <ul class="tabs red darken-3">
            <li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
            <li class="tab col s3"><a class="white-text" href="#register">register</a></li>
        </ul>
        <div id="login" class="col s12">
            <form class="col s12" method="post" action="cek.php">
                <div class="form-container ">
                    <h3 class="red-text text-darken-3">Hello</h3>
                    <div class="row">
                        <div class="input-field col s12 ">
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" >
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <br>
                    <center>
                        <button class="btn waves-effect waves-light red darken-3" type="submit" name="login">Login</button>
                        <br>
                        <br>
                        <a href="" class="red-text text-darken-3">Forgotten password?</a>
                    </center>
                </div>
            </form>
        </div>
        <div id="register" class="col s12">
            <form class="col s12" method="post" action="">
                <div class="form-container">
                    <h3 class="red-text text-darken-3">Welcome</h3>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" name="first_name">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="last_name">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="last_name" type="text" class="validate" name="umur">
                            <label for="last_name">Umur</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label>Tanggal Lahir</label><br><br>
                            <input type="date" class="datepicker" name="tgl">
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
                            <input id="email-confirm" type="email" class="validate" name="email">
                            <label for="email-confirm">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="pass1">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password-confirm" type="password" class="validate" name="pass2">
                            <label for="password-confirm">Password Confirmation</label>
                        </div>
                    </div>
                    <center>
                        <button class="btn waves-effect waves-light red darken-3" type="submit" name="register">Submit</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php 
    require_once('koneksi.php');
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
        $umur = $_POST['umur'];

        if ($_POST['pass1'] != $_POST['pass2']) {
            echo "<script>
                alert('password tidak sama')
            </script>";
        }else{
            $password = md5($pass1);
            $query = oci_parse($conn, "INSERT INTO dorras_user(email, password, id_role, nama_user, tanggal_lahir, umur) VALUES (:email, :password, :role, :nama, :tgl, :umur)");

            oci_bind_by_name($query, ":nama", $nama);
            oci_bind_by_name($query, ":tgl", $tgl);
            oci_bind_by_name($query, ":role", $id_role);
            oci_bind_by_name($query, ":email", $email);
            oci_bind_by_name($query, ":password", $password);
            oci_bind_by_name($query, ":umur", $umur);

            oci_execute($query);

            oci_close($conn);

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
