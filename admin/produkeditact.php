<?php
include('includes/config.php');
error_reporting(0);
$nama_produk = $_POST['nama_produk'];
$id_barang = $_POST['id_barang'];
$no = $_POST['no'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$tb = $_POST['tb'];
$tahun = $_POST['tahun'];
$kapasitas = $_POST['kapasitas'];
$PeralatanMasak = isset($_POST['PeralatanMasak']) ? '1' : '0';
$Senter = isset($_POST['Senter']) ? '1' : '0';
$Bantal = isset($_POST['Bantal']) ? '1' : '0';
$PisauLipat = isset($_POST['PisauLipat']) ? '1' : '0';
$EmergencyLamp = isset($_POST['EmergencyLamp']) ? '1' : '0';
$MejaLipat = isset($_POST['MejaLipat']) ? '1' : '0';
$KursiLipat = isset($_POST['KursiLipat']) ? '1' : '0';
$Matras = isset($_POST['Matras']) ? '1' : '0';
$Ponco = isset($_POST['Ponco']) ? '1' : '0';
$Pluit = isset($_POST['Pluit']) ? '1' : '0';
$PeralatanSanitasi = $_POST['PeralatanSanitasi'];
$Binocular = isset($_POST['Binocular']) ? '1' : '0';
$id = $_POST['id'];

$sql = "UPDATE produk SET nama_produk='$nama_produk', no='$no', id_barang='$id_barang', deskripsi='$deskripsi', harga='$harga', tb='$tb', tahun='$tahun',
        kapasitas='$kapasitas', PeralatanMasak='$PeralatanMasak', Senter='$Senter', Bantal='$Bantal',
        PisauLipat='$PisauLipat', EmergencyLamp='$EmergencyLamp', MejaLipat='$MejaLipat', KursiLipat='$KursiLipat', Matras='$Matras',
        Ponco='$Ponco', Pluit='$Pluit', PeralatanSanitasi='$PeralatanSanitasi', Binocular='$Binocular' WHERE id_produk='$id'";
$query = mysqli_query($koneksidb, $sql);

if ($query) {
    echo "<script type='text/javascript'>
            alert('Berhasil edit data.'); 
            window.location.href = 'produk.php'; 
        </script>";
} else {
    echo "No Error : " . mysqli_errno($koneksidb);
    echo "<br/>";
    echo "Pesan Error : " . mysqli_error($koneksidb);

    echo "<script type='text/javascript'>
            alert('Terjadi kesalahan, silahkan coba lagi!.'); 
            window.location.href = 'produkedit.php?id=$id'; 
        </script>";
}
?>
