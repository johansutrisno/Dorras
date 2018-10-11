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
                <center><h4 class="red-text text-darken-3">Event</h4></center>
                
                <?php 

                require_once('koneksi.php');

                $query = oci_parse($conn, "select * from dorras_event order by start_event asc");

                oci_execute($query);

                while (($data = oci_fetch_array($query, OCI_ASSOC)) != false) {
                ?>
                <div class="col s12 m6">
                    <div class="card medium z-depth-3">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/event/<?php echo "$data[IMG_EVENT]";?>">
                        </div>
                        <div class="card-content">

                            <span class="card-title activator grey-text text-darken-4"><?php echo "$data[NAMA_EVENT]";?><i class="material-icons right">keyboard_arrow_up</i></span>
                            <br><a href="detail.php?id=<?php echo "$data[ID_EVENT]";?>" class="waves-effect waves-light btn red darken-3">Detail</a>
                            
                            <?php
                                $today=date ("Y-m-d");
                                $tanggal = $data['START_EVENT'];
                                $tgl_agenda = date ($tanggal);

                                $start_date = new DateTime($tanggal);
                                $now = date("Y-m-d");
                                $now_date = new DateTime($now);
                                $interval = $start_date->diff($now_date);

                                if ($interval->days < 1) { ?>
                                <div class="right teal-text"><font size="3px"><b>Sudah dilaksanakan</b></font></div>  
                                <?php } else { 


                                ?>
                                <div class="right teal-text""><font size="3px"><b><?php echo "$interval->days hari lagi "; ?></b> </font></div>  <br>
                            <?php } ?>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?php echo "$data[NAMA_EVENT]";?><i class="material-icons right">keyboard_arrow_down</i></span>
                            <p><?php echo nl2br($data['DESC_EVENT']);?></p>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
                
            </div>
<!--
            <center>
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active red darken-1"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul> 
            </center>

            <br><br><div class="divider"></div><br><br>
-->
            <div class="row">
                <div class="col s12">
                <center><h4 class="header red-text text-darken-3">Do you have an event?</h4></center><br>
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="img/logo/logo.jpg" class="responsive-img" >
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h5 class="header red-text text-darken-3">Ajukan Event Anda</h5>
                                <p>Dorras juga memberikan kesempatan kepada para komunitas untuk mengajukan eventnya kepada kami. Kami akan membantu memrpomosikan event anda dengan sistem yang kami buat.</p>
                                <p>Syarat dan ketentuan berlaku</p>
                            </div>
                            <div class="card-action">
                                <a href="propose.php" class="right waves-effect waves-light btn red darken-3">Propose Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>