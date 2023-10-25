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
	
	<title>Rental Outdoor | Admin Tambah Barang</title>
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
						<h2 class="page-title">Tambah Barang</h2>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
									<div class="panel-heading">Form Tambah Barang</div>
								<div class="panel-body">
									<form method="post" name="theform" action="tambahprodukact.php" class="form-horizontal" onsubmit="return valid(this);" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Barang<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="text" name="nama_produk" class="form-control" required>
										</div>
										<label class="col-sm-2 control-label">Pilih Jenis Barang<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<select class="form-control" name="id_barang" required="" data-parsley-error-message="Field ini harus diisi" >
												<option value=""> Pilih Jenis Barang</option>
													<?php
														$mySql = "SELECT * FROM jenis_barang ORDER BY id_barang";
														$myQry = mysqli_query($koneksidb, $mySql);
														while ($myData = mysqli_fetch_array($myQry)) {
															if ($myData['id_barang']== $datajenis_barang) {
															$cek = " selected";
															} else { $cek=""; }
															echo "<option value='$myData[id_barang]' $cek>$myData[nama_barang] </option>";
														}
													?>
											</select>
										</div>
									</div>
																				
									<div class="hr-dashed"></div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Deskripsi Barang<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<textarea class="form-control" name="deskripsi" rows="3" required></textarea>
										</div>
										<label class="col-sm-2 control-label">No. Barang<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="text" name="no" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Harga / Hari<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="number" min="0" name="harga" class="form-control" required>
										</div>
										<label class="col-sm-2 control-label">Tipe Barang<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<select class="form-control" name="tb" required>
											<option value=""> Tipe Barang </option>
											<option value="XXXL">XXXL</option>
											<option value="XXL">XXL</option>
											<option value="XL">XL</option>
											<option value="L">L</option>
											<option value="S">S</option>
											<option value="M">M</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Tahun Registrasi<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="number" min="0" name="tahun" class="form-control" required>
										</div>
										<label class="col-sm-2 control-label">Kapasitas Barang<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="number" min="1" name="kapasitas" class="form-control" required>
										</div>
									</div>
									<div class="hr-dashed"></div>

									<div class="form-group">
										<div class="col-sm-12">
											<h4><b>Upload Gambar</b></h4>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-4">
											Gambar 1<span style="color:red">*</span><input type="file" name="img1" accept="image/*" required>
										</div>
										<div class="col-sm-4">
											Gambar 2<span style="color:red">*</span><input type="file" name="img2" accept="image/*" required>
										</div>
										<div class="col-sm-4">
											Gambar 3<span style="color:red">*</span><input type="file" name="img3" accept="image/*" required>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-4">
											Gambar 4<span style="color:red">*</span><input type="file" name="img4" accept="image/*" required>
										</div>
										<div class="col-sm-4">
											Gambar 5<input type="file" name="img5" accept="image/*">
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
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="Peralatan_Makan" name="Peralatan_Makan" value="1">
												<label for="Peralatan_Makan"> Peralatan Makan </label>
											</div>
										</div>
									
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
												<label for="powerdoorlocks"> Senter </label>
											</div>
										</div>
									
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
												<label for="antilockbrakingsys"> Bantal </label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="brakeassist" name="brakeassist" value="1">
												<label for="brakeassist"> Pisau Lipat </label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="powersteering" name="powersteering" value="1">
												<label for="inlineCheckbox5"> Emergency Lamp </label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="tourguideairbag" name="tourguideairbag" value="1">
												<label for="tourguideairbag">Meja Lipat</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
												<label for="passengerairbag"> Kursi Lipat </label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="powerwindow" name="powerwindow" value="1">
												<label for="powerwindow"> Matras </label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="cdplayer" name="cdplayer" value="1">
												<label for="cdplayer"> Ponco </label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="checkbox h checkbox-inline">
												<input type="checkbox" id="centrallocking" name="centrallocking" value="1">
												<label for="centrallocking">Pluit</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="crashcensor" name="crashcensor" value="1">
												<label for="crashcensor"> Peralatan Sanitasi </label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="leatherseats" name="leatherseats" value="1">
												<label for="leatherseats"> Binocular </label>
											</div>
										</div>
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
												<button class="btn btn-primary" type="submit">Save changes</button>
												<button class="btn btn-default" type="reset">Cancel</button>
											</div>
										</div>
									</div>
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