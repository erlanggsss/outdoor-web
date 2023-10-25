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
<title>Rental Outdoor | Pencarian</title>
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
        
<!-- Fav and touch icons -->
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

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Daftar Produk</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Daftar Produk</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
			<?php 
			//Query for Listing count
			$brand=$_POST['brand'];
			$fueltype=$_POST['fueltype'];
			$sql = "SELECT * from produk WHERE id_barang='$brand' AND tb='$fueltype'";
			$query = mysqli_query($koneksidb,$sql);
			$cnt = mysqli_num_rows($query);
			?>
			<p><span><?php echo htmlentities($cnt);?> Produk Ditemukan</span></p>
			</div>
		</div>

<?php 
$sql1 = "SELECT produk.*,jenis_barang.* FROM produk,jenis_barang WHERE jenis_barang.id_barang=produk.id_barang and produk.id_barang='$brand' and produk.tb='$fueltype'";
$query1 = mysqli_query($koneksidb,$sql1);
if(mysqli_num_rows($query1)>0)
{
while($result = mysqli_fetch_array($query1))
{ 
?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/img/productimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5><a href="product-details.php?vhid=<?php echo htmlentities($result['id_produk']);?>"><?php echo htmlentities($result['nama_barang']);?> , <?php echo htmlentities($result['nama_produk']);?></a></h5>
            <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?> / Hari</p>
            <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result['kapasitas']);?> Orang</li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result['tahun']);?> Model</li>
              <li><i class="fa fa-cart-plus" aria-hidden="true"></i><?php echo htmlentities($result['tb']);?></li>
            </ul>
            <a href="product-details.php?vhid=<?php echo htmlentities($result['id_produk']);?>" class="btn">Lihat Detail <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      <?php }} ?>
         </div>
      
      <!--Side-Bar-->
     <aside class="col-md-3 col-md-pull-9">
		<div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i>Cari Produk</h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-result.php" method="post">
              <div class="form-group select">
                <select class="form-control" name="brand" required>
                  <option value="" selected>Pilih Jenis Barang</option>
                  <?php 
					$sql3 = "SELECT * from  jenis_barang";
					$query3 = mysqli_query($koneksidb,$sql3);
					if(mysqli_num_rows($query3)>0)
					{
						while($result = mysqli_fetch_array($query3))
						{ ?>
						<option value="<?php echo htmlentities($result['id_barang']);?>"><?php echo htmlentities($result['nama_barang']);?></option>
				  <?php }} ?>
                </select>
              </div>
              <div class="form-group select">
                <select class="form-control" name="fueltype" required>
                      <option value=""> Tipe Barang </option>
											<option value="XXXL">XXXL</option>
											<option value="XXL">XXL</option>
											<option value="XL">XL</option>
											<option value="L">L</option>
											<option value="M">M</option>
											<option value="S">S</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i>Cari</button>
              </div>
            </form>
          </div>
        </div>
	 
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-cart-plus" aria-hidden="true"></i>Produk Terbaru</h5>
          </div>
          <div class="recent_addedcars">
            <ul>
			<?php
				$sql2 = "SELECT produk.*,jenis_barang.* FROM produk,jenis_barang 
						WHERE jenis_barang.id_barang=produk.id_barang order by jenis_barang.id_barang desc limit 4";
				$query2 = mysqli_query($koneksidb,$sql2);
				if(mysqli_num_rows($query2)>0)
				{
					while($result = mysqli_fetch_array($query2))
					{ ?>
					<li class="gray-bg">
						<div class="recent_post_img"> <a href="product-details.php?vhid=<?php echo htmlentities($result['id_produk']);?>"><img src="admin/img/productimages/<?php echo htmlentities($result['image1']);?>" alt="image"></a> </div>
						<div class="recent_post_title"> <a href="product-details.php?vhid=<?php echo htmlentities($result['id_produk']);?>"><?php echo htmlentities($result['nama_barang']);?> , <?php echo htmlentities($result['nama_produk']);?></a>
						<p class="widget_price"><?php echo htmlentities(format_rupiah($result['harga']));?> / Hari</p>
						</div>
					</li>
              <?php }} ?>
            </ul>
          </div>
        </div>
      </aside>
      <!--/Side-Bar-->
  </div>
  </div>
</section>
<!-- /Listing--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

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
</html>
