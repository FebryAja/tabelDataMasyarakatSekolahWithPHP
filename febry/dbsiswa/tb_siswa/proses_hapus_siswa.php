<?php
include '../koneksi/koneksi.php';
$id_siswa = $_GET['id_siswa'];
$query = mysqli_query($koneksi,"DELETE FROM tb_siswa WHERE id_siswa='$id_siswa'")or die(mysqli_error());

?>
<script language="JavaScript">
	alert('HAPUS DATA SISWA BERHASIL!!!');
	document.location='index.php';
</script>