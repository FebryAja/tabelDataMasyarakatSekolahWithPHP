<?php
include '../koneksi/koneksi.php';
$id_guru = $_GET['id_guru'];
$query = mysqli_query($koneksi,"DELETE FROM tb_guru WHERE id_guru='$id_guru'")or die(mysqli_error());

?>
<script language="JavaScript">
	alert('HAPUS DATA GURU BERHASIL!!!');
	document.location='index.php';
</script>