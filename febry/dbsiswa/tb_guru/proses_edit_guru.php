<?php

include "../koneksi/koneksi.php";

$id_guru=$_POST['id_guru'];
$nik_guru=$_POST['nik_guru'];
$nama_guru=$_POST['nama_guru'];
$tempat_lahir_guru=$_POST['tempat_lahir_guru'];
$tanggal_lahir_guru=$_POST['tanggal_lahir_guru'];
$jenis_kelamin_guru=$_POST['jenis_kelamin_guru'];
$golongan_darah_guru=$_POST['golongan_darah_guru'];
$alamat_guru=$_POST['alamat_guru'];
$agama_guru=$_POST['agama_guru'];
$status_perkawinan=$_POST['status_perkawinan'];
$pekerjaan=$_POST['pekerjaan'];
$kewarganegaraan_guru=$_POST['kewarganegaraan_guru'];

$query = mysqli_query($koneksi, "UPDATE tb_guru SET nik='$nik_guru', nama='$nama_guru', tempat_lahir='$tempat_lahir_guru', tanggal_lahir='$tanggal_lahir_guru', jenis_kelamin='$jenis_kelamin_guru', golongan_darah='$golongan_darah_guru', alamat='$alamat_guru', agama='$agama_guru', status_perkawinan='$status_perkawinan', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan_guru' WHERE id_guru='$id_guru'");

?>
<script language="JavaScript">
    alert('EDIT DATA GURU BERHASIL');
    document.location='index.php';
</script>