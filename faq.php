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
                <center><h4 class="red-text text-darken-3">FaQ</h4></center>
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">help_outline</i>Apa itu Dorras.com?</div>
                        <div class="collapsible-body"><span>Dorras adalah website</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">help_outline</i>Fitur apa saja yang disediakan oleh Dorras?</div>
                        <div class="collapsible-body"><span>Dorras adalah website</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">help_outline</i>Bagaimana cara mengikuti Event di Dorras?</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">help_outline</i>Siapa saja yang bisa mengikuti Event di Dorras?</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                </ul>
            </div>
            <div class="row">
                <h5 class="red-text text-darken-3"><br>&nbsp;&nbsp;&nbsp;&nbsp;Your FaQ</h5><br>
                <ul class="collapsible popout" data-collapsible="accordion">
            <?php
                require_once('koneksi.php');

                $query = oci_parse($conn, "select * from dorras_faq where id_user = '$iduser'");

                oci_execute($query);

                while (($data = oci_fetch_array($query, OCI_ASSOC)) != false) {?>
                
                    <li>
                        <div class="collapsible-header"><i class="material-icons">help_outline</i><?php echo $data['PERTANYAAN']; ?> </div>
                        <div class="collapsible-body"><span> <?php if (empty($data['JAWABAN'])) echo "Maaf, pertanyaan anda belum dijawab";
                        else $data['JAWABAN'] ?> </span></div>
                    </li>
                

                <?php } ?>
                </ul>
                </div>
            <br><br><br>
            <div class="card horizontal">
                <div class="card-image">
                    <img src="img/logo/logo.jpg" class="responsive-img" >
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h5 class="header red-text text-darken-3">Ajukan pertanyaan kepada kami</h5>
                        <p>Dorras memberikan kesempatan kepada para pengguna untuk memberikan FaQ kepada Dorras. Sebagai bentuk pelayanan kami kepada para pengguna. Silahkan ajukan pertanyakan kepada kami.</p>
                    </div>
                    <div class="card-action">
                        <a href="givefaq.php" class="right waves-effect waves-light btn red darken-3">Give FaQ</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>
