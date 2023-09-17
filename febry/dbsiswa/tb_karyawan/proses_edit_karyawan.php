<?php

include "../koneksi/koneksi.php";

$id_karyawan=$_POST['id_karyawan'];
$nik_karyawan=$_POST['nik_karyawan'];
$nama_karyawan=$_POST['nama_karyawan'];
$tempat_lahir_karyawan=$_POST['tempat_lahir_karyawan'];
$tanggal_lahir_karyawan=$_POST['tanggal_lahir_karyawan'];
$jenis_kelamin_karyawan=$_POST['jenis_kelamin_karyawan'];
$golongan_darah_karyawan=$_POST['golongan_darah_karyawan'];
$alamat_karyawan=$_POST['alamat_karyawan'];
$agama_karyawan=$_POST['agama_karyawan'];
$status_perkawinan=$_POST['status_perkawinan'];
$pekerjaan=$_POST['pekerjaan'];
$kewarganegaraan_karyawan=$_POST['kewarganegaraan_karyawan'];

$query = mysqli_query($koneksi, "UPDATE tb_karyawan SET nik='$nik_karyawan', nama='$nama_karyawan', tempat_lahir='$tempat_lahir_karyawan', tanggal_lahir='$tanggal_lahir_karyawan', jenis_kelamin='$jenis_kelamin_karyawan', golongan_darah='$golongan_darah_karyawan', alamat='$alamat_karyawan', agama='$agama_karyawan', status_perkawinan='$status_perkawinan', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan_karyawan' WHERE id_karyawan='$id_karyawan'");

?>
<script language="JavaScript">
    alert('EDIT DATA KARYAWAN BERHASIL');
    document.location='index.php';
</script>