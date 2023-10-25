<?php
include('includes/config.php');
$id		= $_POST['id'];
$brand	= $_POST['brand'];
$sql 	= "UPDATE jenis_barang SET nama_barang='$brand' WHERE id_barang='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'jenis_barang.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'jenis_barangedit.php?id=$id'; 
		</script>";

}
?>