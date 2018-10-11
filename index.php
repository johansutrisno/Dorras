<?php
    session_start();
    if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['idrole'])){
        header("location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Dorras</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#myPage"><img src="img/logo/logonav.png" width="150" style="position:absolute; top: -2%;"> </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#myPage">HOME</a></li>
                <li><a href="#about">TENTANG</a></li>
                <li><a href="#services">PELAYANAN</a></li>
                <li><a href="#portfolio">KEGIATAN</a></li>
                <!-- <li><a href="#pricing">BERITA</a></li> -->
                <li><a href="#contact">KONTAK</a></li>
            </ul>
        </div>
  </div>
</nav>

<div class="jumbotron text-center">
    <h1 style="color: #991313">DORRAS</h1> 
    <p style="color: #991313"><b>Setetes darah Anda, nyawa bagi sesama</b></p> 
    <form>
        <div class="input-group">
            <div class="input-group-btn">
                <a href="login.php"><button type="button" class="button">Join | login</button></a>
            </div>
        </div>
    </form>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>Apa itu Dorras?</h2><br>
            <h4>Dorras merupakan sebuah aplikasi yang membantu user untuk rutin dalam melakukkan donor darah. Dorras memberikan ruang kepada user sebagai komunitas, terkait event Donor darah yang diadakan oleh Dorras, PMI, maupun komunitas yang bergabung bersama Dorras untuk ikut serta dalam event ataupun berpartisipasi mengadakan event.</h4>    
            <h4><p>Dorras sistem informasi online kami sediakan guna mendukung perkembangan teknologi, menyelaraskan gaya hidup modern sasaran Dorras generasi muda indonesia. Dorras adalah langkah yang cukup efektif untuk menjadikan aksi kemanusiaan sebagai gaya hidup modern.Dorras merupakan kampanye besar bertema kesehatan dan aksi sosial, bertujuan menggerakan aksi nyata membantu sesama.</p><br></h4>
        </div>
        <div class="col-sm-4">
            <img src="img/logo/logo.png" width="100%" style="margin-top: 20%;">
        </div>
    </div>
</div>

<div class="container-fluid bg-grey">
    <div class="row">
        <div class="col-sm-4">
            <img src="img/logo/logo2.png">
        </div>
        <div class="col-sm-8">
            <h2>Kenapa Anda Harus Percaya Kepada Dorras ?</h2><br>
                <h4><strong>Dorras</strong> menyediakan fitur Tentang, Pelayanan, kegiatan, Berita serta Kontak yang dapat meningkatkan Awareness user terhadap donor darah. Dengan fitur Tentang, user dapat mengetahui lebih detile mengenai Dorras, sehingga user akan merasa lebih dekat dengan Dorras. Fitur Pelayanan memberikan informasi layanan yang disediakan oleh Dorras. Menu Kegiatan disediakan agar user dapat melihat berbagi kegiatan donor darah yang diselenggarakan di Bandung dan sekitarnya,beserta hari, tempat dan tanggal dengan mengikuti kegiatan yang di tampilkan pada sistem informasi dorras user dapat melakukan verifikasi sehingga mendapatkan keuntungan berupa Poin. kemudian menu Berita digunakan untuk memberikan informasi terbaru mengenai kesehatan, Butuh bantuan terkait dengan darah, info lowongan pekerjaan di PMI atau dinas kesehatan terkait dan artikel terksit kesehatan dan donor darah.Kontak, kami sediakan guna menjalin komunikasi dengan sesama sukarelawan. <br></h4>
<!--
                <p>Dorras menyediakan ruang bagi user untuk saling berinteraksi dalam rangka mengembangkan gerakan aksi kemanusiaan melalui kegiatan Donor darah. Dorras mengajak seluruh elemen masyarakat dalam aksi ini, menjaring generasi muda untuk ikut serta berperan aktif mengkampanyekan kegiatan donor darah dengan cara membagikan informasi kegiatan yang disediakan oleh dorras kepada khalayak umum menggunakan media sosial yang berkembang saat ini seperti facebook, twitter, instagram dan lain sebagainya dengan tetap mencantumkan identitas Dorras sebagai wadah yang menyediakan informasi utama.</p><br>
-->
                <h4><p><strong>Keuntungan</strong> Dalam hal ini kita bertanya-tanya mengenai keuntungan, dalam aksi kemanusiaan ini apa yang kita dapatkan? Tentunya dalam hal ini kami tidak menjamin berapa banyak keuntungan berupa materiil yang didapatkan, namun kami berupaya semaksimal mungkin untuk memberikan penghargaan kepada user yang berpartisipasi aktif dalam segala rangkaian kegiatan yang Dorras adakan. Salah satu Penghargaan yang Dorras berikan yaitu berupa Poin dan badge. Bagaimana cara mendapatkannya ? pahami lebih lanjut dalam FAQ yang disediakan oleh Doras. </p></h4>
        </div>
    </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
    <h2>PELAYANAN</h2>
    <h4>Apa yang kami tawarkan</h4>
    <br>
    <div class="row slideanim">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-thumbs-up logo-small"></span>
            <h4>POWER</h4>
            <p>Dorras memberikan pelayanan berupa suport berupa dukungan dan bantuan</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-heart logo-small"></span>
            <h4>LOVE</h4>
            <p>Dorras memberikan pelayanan berdasarkan cinta dan kasih sayang</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-lock logo-small"></span>
            <h4>JOB DESK</h4>
            <p>Dorras menampilkan beragam kegiatan mengenai donor darah</p>
        </div>
    </div>
  <br><br>
        <div class="row slideanim">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-tint logo-small"></span>
                <h4>RED</h4>
                <p>Dengan red kedekatan antar relawan akan semakin erat</p>
            </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-certificate logo-small"></span>
            <h4>SCORE</h4>
            <p>Dorras memberikan score kepada pengguna yang berpartisipasi aktif dalam kegiatan</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-user logo-small"></span>
            <h4 style="color:#303030;">HARD WORK</h4>
            <p>Dorras selalu berusaha memberikan pelayanan yang prima kepada para pengguna</p>
        </div>
        </div>
    </div>

<!-- Container (Event Section) -->
    <div id="portfolio" class="container-fluid text-center bg-grey">
        <h2>KEGIATAN</h2>
        <h4>Kegiatan yang akan diadakan</h4>
        <div class="row text-center slideanim">
        <?php 

                require_once('koneksi.php');

                $query = oci_parse($conn, "select * from dorras_event order by start_event asc");

                oci_execute($query);

                while (($data = oci_fetch_array($query, OCI_ASSOC)) != false) {
                ?>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="img/event/<?php echo "$data[IMG_EVENT]";?>" width="400" height="300">
                    <p><strong><?php echo "$data[NAMA_EVENT]";?></strong></p>
                    <p><?php echo "$data[DESC_EVENT]";?></p>
                    <a href="detail.php?id=<?php echo "$data[ID_EVENT]";?>" style="text-decoration: none;"><div class="tombol">Detail</div></a>
                </div>
            </div>
        <?php } ?>
        </div>
        <br>
  
        <h2>Apa kata mereka?</h2>
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
        <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <h4>"Dorras sangat membantu para penderita thalasemia di Kota Bandung"<br><span style="font-style:normal;">Johan Sutrisno, Pengejar Proyek Tingkat, Mahasiswa</span></h4>
                </div>
                <div class="item">
                    <h4>"Alhamdulillah, banyak manfaat yang bisa didapat dari website ini"<br><span style="font-style:normal;">Johan Sutrisno, Pejuang PT, Telkom University</span></h4>
                </div>
                <div class="item">
                    <h4>"Saya tidak bisa memperkirakan Indonesia tanpa adanya dorras"<br><span style="font-style:normal;">Fariz, Actor, Titanic</span></h4>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Container (Pricing Section) -->
    <!-- <div id="pricing" class="container-fluid">
        <div class="text-center">
            <h2>BERITA</h2>
            <h4>-- COMING SOON --</h4>
        </div>

        <div class="row slideanim">
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1>Lorem</h1>
                    </div>
                    <div class="panel-body">
                            <p><strong>20</strong> Lorem</p>
                        <p><strong>15</strong> Ipsum</p>
                        <p><strong>5</strong> Dolor</p>
                        <p><strong>2</strong> Sit</p>
                        <p><strong>Endless</strong> Amet</p>
                    </div>
                    <div class="panel-footer">
                        <h3>$19</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">BACA</button>
                    </div>
                </div>      
            </div>     
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1>Lorem</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>50</strong> Lorem</p>
                        <p><strong>25</strong> Ipsum</p>
                        <p><strong>10</strong> Dolor</p>
                        <p><strong>5</strong> Sit</p>
                        <p><strong>Endless</strong> Amet</p>
                    </div>
                    <div class="panel-footer">
                        <h3>$29</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">BACA</button>
                    </div>
                </div>      
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                      <h1>Lorem</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>100</strong> Lorem</p>
                        <p><strong>50</strong> Ipsum</p>
                        <p><strong>25</strong> Dolor</p>
                        <p><strong>10</strong> Sit</p>
                        <p><strong>Endless</strong> Amet</p>
                    </div>
                    <div class="panel-footer">
                        <h3>$49</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">BACA</button>
                    </div>
                </div>      
            </div>    
        </div>

    </div> -->

    <!-- Container (news Section) -->
    <div id="contact" class="container-fluid bg-grey">
        <h2 class="text-center">KONTAK KAMI</h2>
        <div class="row">
            <div class="col-sm-5">
                <p>Hubungi kami jika ada pertanyaan, kritik, atau saran</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> Bandung, Jawa Barat, Indonesia</p>
                <p><span class="glyphicon glyphicon-phone"></span> +62 822-1944-1899</p>
                <p><span class="glyphicon glyphicon-envelope"></span> Hiadmin@dorras.com</p>
            </div>
            <div class="col-sm-7 slideanim">
                <form method="post">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                          <input class="form-control" id="name" name="nama" placeholder="Nama" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="faq" placeholder="Pertanyaan, kritik, atau saran" rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit" name="tambah">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--maps-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.305984187433!2d107.6304324143677!3d-6.973180894962379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9afad6fa06f%3A0xd4fc2f579a78668a!2sFakultas+Ilmu+Terapan%2C+Telkom+University!5e0!3m2!1sid!2sid!4v1487211360294" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen>
    </iframe>
    
    <footer class="container-fluid text-center">
        <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Copyright &copy; 2017 <b>FLYHIGH TEAM</b>. All right reserved</p>
    </footer>

    
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links in navbar + footer link
            $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function(){
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
  
            $(window).scroll(function() {
                $(".slideanim").each(function(){
                    var pos = $(this).offset().top;

                    var winTop = $(window).scrollTop();
                    
                    if (pos < winTop + 600) {
                        $(this).addClass("slide");
                    }
                });
            });
        })
    </script>

    </body>
</html>
<?php 
    require_once('koneksi.php');

    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $faq = $_POST['faq'];
        $kelas = $_POST['kelas'];
        
        $query = oci_parse($conn,"INSERT INTO dorras_faq (nama, email, pertanyaan) VALUES (:nama, :email, :pertanyaan)");

        oci_bind_by_name($query,":nama", $nama);
        oci_bind_by_name($query,":email", $email);
        oci_bind_by_name($query,":pertanyaan", $faq);
        
        oci_execute($query) or die(oci_error());

        oci_close($conn);

        if ($query) {
            echo "<script>
                alert('Terimakasih, pertanyaan telah diterima')
                window.location = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal')
                window.location = 'index.php';
            </script>";
        }

    }
?>