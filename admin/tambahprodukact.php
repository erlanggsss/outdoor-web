<?php
include('includes/config.php');
error_reporting(0);
$nama_produk=$_POST['nama_produk'];
$id_barang=$_POST['id_barang'];
$no=$_POST['no'];
$deskripsi=$_POST['deskripsi'];
$harga=$_POST['harga'];
$tb=$_POST['tb'];
$tahun=$_POST['tahun'];
$kapasitas=$_POST['kapasitas'];
$PeralatanMasak=$_POST['PeralatanMasak'];
$Senter=$_POST['Senter'];
$Bantal=$_POST['Bantal'];
$PisauLipat=$_POST['PisauLipat'];
$EmergencyLamp=$_POST['EmergencyLamp'];
$MejaLipat=$_POST['MejaLipat'];
$KursiLipat=$_POST['KursiLipat'];
$Matras=$_POST['Matras'];
$Ponco=$_POST['Ponco'];
$Pluit=$_POST['Pluit'];
$PeralatanSanitasi=$_POST['PeralatanSanitasi'];
$Binocular=$_POST['Binocular'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/productimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/productimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/productimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/productimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"img/productimages/".$_FILES["img5"]["name"]);
$sql 	= "INSERT INTO produk (nama_produk,id_barang,no,deskripsi,harga,tb,tahun,kapasitas,image1,image2,image3,image4,image5,
			PeralatanMasak,Senter,Bantal,PisauLipat,EmergencyLamp,MejaLipat,KursiLipat,
			Matrass,Ponco,Pluit,CrashSensor,Binocular)
			VALUES ('$nama_produk','$id_barang','$no','$deskripsi','$harga','$tb','$tahun','$kapasitas',
			'$vimage1','$vimage2','$vimage3','$vimage4','$vimage5','$PeralatanMasak','$Senter','$Bantal',
			'$PisauLipat','$EmergencyLamp','$MejaLipat','$KursiLipat','$Matras','$Ponco','$Pluit',
			'$PeralatanSanitasi','$Binocular')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'produk.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahproduk.php'; 
		</script>";
}

?>