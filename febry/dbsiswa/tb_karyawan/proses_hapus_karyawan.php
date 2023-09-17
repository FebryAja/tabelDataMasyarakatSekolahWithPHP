<?php
include '../koneksi/koneksi.php';
$id_karyawan = $_GET['id_karyawan'];
$query = mysqli_query($koneksi,"DELETE FROM tb_karyawan WHERE id_karyawan='$id_karyawan'")or die(mysqli_error());

?>
<script language="JavaScript">
	alert('HAPUS DATA KARYAWAN BERHASIL!!!');
	document.location='index.php';
</script>