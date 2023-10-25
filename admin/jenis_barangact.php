<?php
include('includes/config.php');
$brand	= $_POST['brand'];
$sql 	= "INSERT INTO jenis_barang (nama_barang) VALUES ('$brand')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'jenis_barang.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahjenis_barang.php'; 
		</script>";

}
?>