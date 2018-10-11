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
                <center><h4 class="red-text text-darken-3">News</h4></center>
            <?php 

                require_once('koneksi.php');

                $query = oci_parse($conn, "select * from dorras_article order by id_article desc");

                oci_execute($query);

                while (($data = oci_fetch_array($query, OCI_ASSOC)) != false) {
                ?>
                <div class="col s12 m6">
                    <div class="card medium z-depth-3">
                        <div class="card-image">
                            <img src="img/news/<?php echo $data['IMG_ARTICLE']; ?>">
                        </div>
                        <div class="card-content">
                            <h5><?php echo $data['JUDUL_ARTICLE']; ?></h5>
                        </div>
                        <div class="card-action">
                            <a href="<?php echo $data['LINK_ARTICLE']; ?>" target="_blank">More</a>
                        </div>
                    </div>
                </div>

                <?php } ?>
            
            <!-- <center>
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active red darken-1"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul> 
            </center> -->
            </div>
        </div>
        
        <?php include 'footer.php' ?>
    </body>
</html>