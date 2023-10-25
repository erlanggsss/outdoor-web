<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');
}else{ 
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Rental Outdoor | Admin Edit Info Outdoor</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
<script type="text/javascript">
function valid(theform){
		pola_nama=/^[a-zA-Z -]*$/;
		if (!pola_nama.test(theform.nama_produk.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Nama produk!');
		theform.nama_produk.focus();
		return false;
		}
		return (true);
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit produk</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Form Edit Produk</div>
									<div class="panel-body">
										<?php 
										$id=intval($_GET['id']);
										$sql ="SELECT produk.*,jenis_barang.* FROM produk, jenis_barang WHERE produk.id_barang=jenis_barang.id_barang AND produk.id_produk='$id'";
										$query = mysqli_query($koneksidb,$sql);
										$result = mysqli_fetch_array($query);
										?>

										<form method="post" class="form-horizontal" name="theform" action ="produkeditact.php" onsubmit="return valid(this);" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label">Nama Produk<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" required>
												<input type="text" name="nama_produk" class="form-control" value="<?php echo htmlentities($result['nama_produk']);?>" required>
											</div>
											<label class="col-sm-2 control-label">Jenis Barang<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<select class="form-control" name="id_barang" required="" data-parsley-error-message="Field ini harus diisi">
													<option value=""></option>
													<?php
															$mySql = "SELECT * FROM jenis_barang ORDER BY nama_barang";
															$myQry = mysqli_query($koneksidb, $mySql);
															$dataMerek = $result['id_barang'];
															while ($merekData = mysqli_fetch_array($myQry)) {
																$selected = ($merekData['id_barang'] == $dataMerek) ? "selected" : "";
																echo "<option value='".$merekData['id_barang']."' ".$selected.">".strtoupper($merekData['nama_barang'])."</option>";
															}
															?>
												</select>
											</div>

										</div>
																					
										<div class="hr-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Deskripsi produk<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<textarea class="form-control" name="deskripsi" rows="3" required><?php echo htmlentities($result['deskripsi']);?></textarea>
											</div>
											<label class="col-sm-2 control-label">No. Barang<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="no" class="form-control" value="<?php echo htmlentities($result['no']);?>" required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">Harga / Hari<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="harga" class="form-control" value="<?php echo htmlentities($result['harga']);?>" required>
											</div>
											<label class="col-sm-2 control-label">Tipe Barang<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<select class="form-control" name="tb" required>
														<?php
															$jk = $result['tb'];
															echo "<option value='$jk' selected>".$jk."</option>";
															echo "<option value='XXXL'>XXXL</option>";
															echo "<option value='XXL'>XXL</option>";
															echo "<option value='XL'>XL</option>";
															echo "<option value='L'>L</option>";
															echo "<option value='M'>M</option>";
															echo "<option value='S'>S</option>";
														?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">Tahun<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="tahun" class="form-control" value="<?php echo htmlentities($result['tahun']);?>" required>
											</div>
											<label class="col-sm-2 control-label">Kapasitas Produk<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="kapasitas" class="form-control" value="<?php echo htmlentities($result['kapasitas']);?>" required>
											</div>
										</div>
										
										<div class="hr-dashed"></div>								
										
										<div class="form-group">
											<div class="col-sm-12">
												<h4><b>Gambar Produk</b></h4>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-4">
												Gambar 1 <img src="img/productimages/<?php echo htmlentities($result['image1']);?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage1.php?imgid=<?php echo htmlentities($result['id_produk'])?>">Ganti Gambar 1</a>
											</div>
											<div class="col-sm-4">
												Gambar 2<img src="img/productimages/<?php echo htmlentities($result['image2']);?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage2.php?imgid=<?php echo htmlentities($result['id_produk'])?>">Ganti Gambar 2</a>
											</div>
											<div class="col-sm-4">
												Gambar 3<img src="img/productimages/<?php echo htmlentities($result['image3']);?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage3.php?imgid=<?php echo htmlentities($result['id_produk'])?>">Ganti Gambar 3</a>
											</div>
										</div>


										<div class="form-group">
											<div class="col-sm-4">
												Gambar 4<img src="img/productimages/<?php echo htmlentities($result['image4']);?>" width="300" height="200" style="border:solid 1px #000">
												<a href="changeimage4.php?imgid=<?php echo htmlentities($result['id_produk'])?>">Ganti Gambar 4</a>
											</div>
											<div class="col-sm-4">
												Gambar 5
												<?php if($result['image5']=="")
												{
													echo htmlentities("File not available");
												}else{?>
													<img src="img/productimages/<?php echo htmlentities($result['image5']);?>" width="300" height="200" style="border:solid 1px #000">
													<a href="changeimage5.php?imgid=<?php echo htmlentities($result['id_produk'])?>">Ganti Gambar 5</a>
												<?php } ?>
											</div>
										</div>
										
										<div class="hr-dashed"></div>									
										
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Bonus Tambahan Dipinjamkan</div>
									<div class="panel-body">

										<div class="form-group">
											<div class="col-sm-3">
												<?php if($result['PeralatanMasak']==1)
												{?>
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="inlineCheckbox1" name="PeralatanMasak" checked value="1">
														<label for="inlineCheckbox1"> Peralatan Masak </label>
													</div>
												<?php } else { ?>
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="inlineCheckbox1" name="PeralatanMasak" value="1">
														<label for="inlineCheckbox1"> Peralatan Masak </label>
													</div>
												<?php } ?>
											</div>
											<div class="col-sm-3">
												<?php if($result['Senter']==1)
												{?>
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="inlineCheckbox1" name="Senter" checked value="1">
														<label for="inlineCheckbox2"> Senter </label>
													</div>
												<?php } else {?>
													<div class="checkbox checkbox-success checkbox-inline">
														<input type="checkbox" id="inlineCheckbox1" name="Senter" value="1">
														<label for="inlineCheckbox2"> Senter </label>
													</div>
												<?php }?>
											</div>
											<div class="col-sm-3">
											<?php if($result['Bantal']==1)
											{?>
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" name="Bantal" checked value="1">
													<label for="inlineCheckbox3"> Bantal </label>
												</div>
											<?php } else {?>
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" name="Bantal" value="1">
													<label for="inlineCheckbox3"> Bantal </label>
												</div>
											<?php } ?>
											</div>
											<div class="col-sm-3">
											<?php if($result['PisauLipat']==1)
											{?>
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" name="PisauLipat" checked value="1">
													<label for="inlineCheckbox3"> Pisau Lipat </label>
												</div>
											<?php } else {?>
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" name="PisauLipat" value="1">
													<label  for="inlineCheckbox3"> Pisau Lipat </label>
												</div>
											<?php } ?>
											</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3">
										<?php if($result['EmergencyLamp']==1)
										{?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="EmergencyLamp" checked value="1">
												<label for="inlineCheckbox1"> Emergency Lamp </label>
											</div>
										<?php } else {?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="EmergencyLamp" value="1">
												<label for="inlineCheckbox1"> Emergency Lamp </label>
											</div>
										<?php } ?>
										</div>
										<div class="col-sm-3">
										<?php if($result['MejaLipat']==1)
										{?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="MejaLipat" checked value="1">
												<label for="inlineCheckbox2">Meja Lipat</label>
											</div>
										<?php } else { ?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="MejaLipat" value="1">
												<label for="inlineCheckbox2">Meja Lipat</label>
											</div>
										<?php } ?>
										</div>
										<div class="col-sm-3">
										<?php if($result['MejaLipat']==1)
										{?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="KursiLipat" checked value="1">
												<label for="inlineCheckbox3"> Kursi Lipat </label>
											</div>
										<?php } else { ?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="KursiLipat" value="1">
												<label for="inlineCheckbox3"> Kursi Lipat </label>
											</div>
										<?php } ?>
										</div>
										<div class="col-sm-3">
										<?php if($result['Matras']==1)
										{?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="powerwindow" checked value="1">
												<label for="inlineCheckbox3"> Matras </label>
											</div>
										<?php } else { ?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="powerwindow" value="1">
												<label for="inlineCheckbox3"> Matras </label>
											</div>
										<?php } ?>
										</div>

									<div class="form-group">
										<div class="col-sm-3">
										<?php if($result['Ponco']==1)
										{?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="Ponco" checked value="1">
												<label for="inlineCheckbox1"> Ponco </label>
											</div>
										<?php } else {?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="Ponco" value="1">
												<label for="inlineCheckbox1"> Ponco </label>
											</div>
										<?php } ?>
										</div>
										<div class="col-sm-3">
										<?php if($result['Pluit']==1)
										{?>
											<div class="checkbox  checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="Pluit" checked value="1">
												<label for="inlineCheckbox2">Pluit</label>
											</div>
										<?php } else { ?>
											<div class="checkbox checkbox-success checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="Pluit" value="1">
												<label for="inlineCheckbox2">Pluit</label>
											</div>
										<?php } ?>
										</div>
										<div class="col-sm-3">
										<?php if($result['PeralatanSanitasi']==1)
										{?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="PeralatanSanitasi" checked value="1">
												<label for="inlineCheckbox3"> Peralatan Sanitasi </label>
											</div>
										<?php } else {?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="PeralatanSanitasi" value="1">
												<label for="inlineCheckbox3"> Peralatan Sanitasi </label>
											</div>
										<?php } ?>
										</div>
										<div class="col-sm-3">
										<?php if($result['Binocular']==1)
										{?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="Binocular" checked value="1">
												<label for="inlineCheckbox3"> Binocular </label>
											</div>
										<?php } else { ?>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" name="Binocular" value="1">
												<label for="inlineCheckbox3"> Binocular </label>
											</div>
										<?php } ?>
										</div>
									</div>
									<?php  ?>
									</div>
								</div>
							</div>
						</div>
						
					</div>

									
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<button class="btn btn-primary" type="submit" style="margin-top:4%">Save changes</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					</div>
				</div>
				</form>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>