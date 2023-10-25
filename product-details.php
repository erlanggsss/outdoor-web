<?php 
session_start();
include('includes/config.php');
include('includes/format_rupiah.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Rental Outdoor | Produk</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT produk.*, jenis_barang.* from produk, jenis_barang WHERE jenis_barang.id_barang=produk.id_barang AND produk.id_produk='$vhid'";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>0)
{
while($result = mysqli_fetch_array($query))
{ 
  $_SESSION['brndid']=$result['id_barang'];  
?>  
<section id="listing_img_slider">
  <div><img src="admin/img/productimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/productimages/<?php echo htmlentities($result['image2']);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/productimages/<?php echo htmlentities($result['image3']);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/productimages/<?php echo htmlentities($result['image4']);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php if($result['image5']=="")
  {

  } else {
  ?>
  <div><img src="admin/img/productimages/<?php echo htmlentities($result['image5']);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</section>
<!--/Listing-Image-Slider--> 

<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2><?php echo htmlentities($result['nama_barang']); ?>, <?php echo htmlentities($result['nama_produk']); ?></h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p><?php echo htmlentities(format_rupiah($result['harga'])); ?></p>
          <p>/ Hari</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
            <li>
              <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result['tahun']); ?></h5>
              <p>Tahun Model</p>
            </li>
            <li>
              <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result['tb']); ?></h5>
              <p>Jenis Barang</p>
            </li>
            <li>
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result['kapasitas']); ?></h5>
              <p>Kapasitas</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#deskripsi" aria-controls="deskripsi" role="tab" data-toggle="tab">Deskripisi</a></li>
              <li role="presentation"><a href="#bonus" aria-controls="bonus" role="tab" data-toggle="tab">Bonus</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- deskripsi -->
              <div role="tabpanel" class="tab-pane active" id="deskripsi">
                <p><?php echo htmlentities($result['deskripsi']); ?></p>
              </div>
              <!-- bonus -->
              <div role="tabpanel" class="tab-pane" id="bonus">
                <!--bonus-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Bonus Dipinjamkan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Peralatan Masak</td>
                      <?php if ($result['PeralatanMasak'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Senter</td>
                      <?php if ($result['Senter'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Bantal</td>
                      <?php if ($result['Bantal'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Pisau Lipat</td>
                      <?php if ($result['PisauLipat'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Emergency Lamp</td>
                      <?php if ($result['EmergencyLamp'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Meja Lipat</td>
                      <?php if ($result['MejaLipat'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Kursi Lipat</td>
                      <?php if ($result['KursiLipat'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Matras</td>
                      <?php if ($result['Matras'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Ponco</td>
                      <?php if ($result['Ponco'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Pluit</td>
                      <?php if ($result['Pluit'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Peralatan Sanitasi</td>
                      <?php if ($result['PeralatanSanitasi'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Binocular</td>
                      <?php if ($result['Binocular'] == 1) { ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else { ?>
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php }} ?>
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="share_vehicle">
          <p>Share: 
          <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> 
          <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> 
          <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> 
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a> </p>
        </div>
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Sewa Sekarang</h5>
          </div>
          <form method="get" action="booking.php">
            <input type="hidden" class="form-control" name="vid" value=<?php echo $vhid;?> required>
            <!--
            <div class="form-group">
              <input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>-->
            <?php if ($_SESSION['ulogin']) { ?>
              <div class="form-group" align="center">
                <button class="btn" align="center">Sewa Sekarang</button>
              </div>
            <?php } else { ?>
              <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login Untuk Menyewa</a>
            <?php } ?>
          </form>
        </div>
      </aside>
      <!--/Side-Bar-->
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3>Produk Lainnya</h3>
      <div class="row">
        <?php 
          $bid = intval($result['id_barang']);
          $sql1 = "SELECT produk.*, jenis_barang.* from produk, jenis_barang WHERE jenis_barang.id_barang=produk.id_barang and produk.id_barang='$bid'";
          $query1 = mysqli_query($koneksidb, $sql1);
          while ($row1 = mysqli_fetch_array($query1)) {
        ?>
        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img"> 
              <a href="product-details.php?vhid=<?php echo htmlentities($result['id']);?>">
                <img src="admin/img/productimages/<?php echo htmlentities($result['Vimage1']);?>" class="img-responsive" alt="image" />
              </a>
            </div>
            <div class="product-listing-content">
              <h5>
                <a href="product-details.php?vhid=<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['nama_produk']); ?></a>
              </h5>
              <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?>/ Hari</p>
              <ul>
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result['tahun']);?> Tahun Model</li>
                <li><i class="fa fa-cogs" aria-hidden="true"></i><?php echo htmlentities($result['bb']);?> Jenis Barang</li>
                <li><i class="fa fa-user-plus" aria-hidden="true"></i><?php echo htmlentities($result['kapasitas']);?> Kapasitas</li>
              </ul>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <!--/Similar-Cars-->
    
  </div>
</section>
<!--/Listing-detail-->

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"><a href="#top"> <i class="fa fa-angle-up" aria-hidden="true"></i> </a></div>

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->
</html>