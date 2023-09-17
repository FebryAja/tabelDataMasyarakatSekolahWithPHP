<?php 
session_start();

require "../koneksi/koneksi.php";


if (isset($_COOKIE["id"]) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE 'id' = $id");

  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
      $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  $id = $_COOKIE['ui'];
  $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id='$id'");
  $row = mysqli_fetch_assoc($query);

  if ($row["peran"] == 'siswa') {
      header("Location: ../tb_siswa/index.php");
      exit;
  } else if ($row["peran"] == 'guru') {
      header("Location: ../tb_guru/index.php");
      exit;
  }
}

if ( !isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
} 

?>

<!doctype html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Bagian Edit Data</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">





  <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
  <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#712cf9">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


</head>

<body>
  <div class="container py-3">
    <header>
      <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
          <img src="static/4-removebg-preview.png" width="50" height="50" class="me-2" viewBox="0 0 118 94" role="img">
          <title>Ibuki</title>
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
            fill="currentColor"></path>
          </svg>
          <span class="fs-4">Febry Anto</span>
        </a>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../tb_siswa/index.php">Siswa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../tb_guru/index.php">Guru</a>
                  </li>
                </ul>

              </div>
            </div>
          </nav>
        </nav>
      </div>



      <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Edit Data Karyawan</h1>
        <p class="fs-5 text-muted">Mengedit data yang dipilih!</p>
      </div>
    </header>

    <!-- Bagian Edit Data -->
    <?php
    include "../koneksi/koneksi.php";
    $id_karyawan = $_GET['id_karyawan'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'") or die(mysqli_error());
    while ($data = mysqli_fetch_array($query)) {
      ?>
      <form action="proses_edit_karyawan.php" method="post">
        <div class="row">
          <div class="col-md-6">
              <div class="mb-3">
                <label for="disabledTextInput" class="col-form-label fw-bold" >ID Karyawan</label>
                <input type="text" id="disabledTextInput" class="form-control" name="id_karyawan"
                  value="<?php echo $data['id_karyawan'] ?>" readonly/>
              </div>
          </div>

          <div class="col-md-6 ms-auto">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label fw-bold">NIK</label>
              <input type="text" class="form-control" id="recipient-name" name="nik_karyawan"
                value="<?php echo $data['nik'] ?>" />
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="recipient-name" class="col-form-label fw-bold">Nama Lengkap</label>
          <input type="text" class="form-control" id="recipient-name" name="nama_karyawan"
            value="<?php echo $data['nama'] ?>" />
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="recipient-name" class="fw-bold col-form-label">Tempat Lahir</label>
              <input type="text" class="form-control" id="recipient-name" name="tempat_lahir_karyawan"
                value="<?php echo $data['tempat_lahir'] ?>" />
            </div>
          </div>

          <div class="col-md-6 ms-auto">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label fw-bold">Tanggal Lahir</label>
              <input type="date" class="form-control" id="recipient-name" name="tanggal_lahir_karyawan"
                value="<?php echo $data['tanggal_lahir'] ?>" />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <div class="row">
                <label for="recipient-name" class="fw-bold col-form-label">Jenis Kelamin</label>

                <div class="col">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio1"
                        name="jenis_kelamin_karyawan" value="L" <?php if ($data['jenis_kelamin'] == 'L')
                        echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2"
                        name="jenis_kelamin_karyawan" value="P" <?php if ($data['jenis_kelamin'] == 'P')
                        echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 ms-auto">
              <div class="mb-3">

                <div class="row">
                  <label for="recipient-name" class="fw-bold col-form-label">Golongan Darah</label>

                  <div class="col">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio1"
                       type="radio" name="golongan_darah_karyawan" value="A" <?php
                      if ($data['golongan_darah'] == 'A')
                        echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio1">A</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2"
                       type="radio" name="golongan_darah_karyawan" value="B" <?php
                      if ($data['golongan_darah'] == 'B')
                        echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio2">B</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2"
                       type="radio" name="golongan_darah_karyawan" value="AB" <?php
                      if ($data['golongan_darah'] == 'AB')
                        echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio2">AB</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2"
                       type="radio" name="golongan_darah_karyawan" value="O" <?php
                      if ($data['golongan_darah'] == 'O')
                        echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio2">O</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label fw-bold">Alamat</label>
            <textarea class="form-control" id="message-text" name="alamat_karyawan"><?php echo $data['alamat'] ?></textarea>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="selected" class="col-form-label fw-bold">Agama</label>
              <select name="agama_karyawan" class="form-select">
                <option value="islam" <?php if ($data['agama'] == 'islam')
                  echo 'selected' ?>>Islam</option>
                  <option value="kristen" <?php if ($data['agama'] == 'kristen')
                  echo 'selected' ?>>Kristen</option>
                  <option value="buddha" <?php if ($data['agama'] == 'buddha')
                  echo 'selected' ?>>Buddha</option>
                  <option value="hindu" <?php if ($data['agama'] == 'hindu')
                  echo 'selected' ?>>Hindu</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <div class="row">
                  <label for="recipient-name" class="fw-bold col-form-label">Status Perkawinan</label>

                  <div class="col">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio1"
                        name="status_perkawinan" value="menikah" <?php
                if ($data['status_perkawinan'] == 'menikah')
                  echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio1">Menikah</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2"
                        name="status_perkawinan" value="belum menikah" <?php
                if ($data['status_perkawinan'] == 'belum menikah')
                  echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio2">Belum Menikah</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <div class="row">
                  <label for="recipient-name" class="fw-bold col-form-label">Pekerjaan</label>

                  <div class="col">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio1"
                       name="pekerjaan" value="bekerja" <?php if ($data['pekerjaan'] == 'bekerja')
                  echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio1">Bekerja</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2"
                       name="pekerjaan" value="belum bekerja" <?php if ($data['pekerjaan'] == 'belum bekerja')
                  echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio2">Belum Bekerja</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <div class="row">
                  <label for="recipient-name" class="fw-bold col-form-label">Kewarganegaraan</label>

                  <div class="col">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio1"
                       name="kewarganegaraan_karyawan" value="WNI" <?php if ($data['kewarganegaraan'] == 'WNI')
                  echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio1">WNI</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2"
                       name="kewarganegaraan_karyawan" value="WNA" <?php if ($data['kewarganegaraan'] == 'WNA')
                  echo 'checked' ?> />
                      <label class="form-check-label" for="inlineRadio2">WNA</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Simpan Perubahan" style="width: 100%;" class="btn btn-primary">
            </div>
            <div class="col">
              <a href="index.php" class="btn btn-outline-danger" style="width: 100%;">Kembali</a>

            </div>
          </div>
        </form>
    <?php } ?>



    <!--- Footer -->
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="row">
        <div class="col-12 col-md">
          <img class="mb-2" src="static/4-removebg-preview.png" alt="" width="40px" height="40px">
          <small class="d-block mb-3 text-muted">© 2023</small>
        </div>
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Tabel Penampil Data</a></li>
            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Edit & Hapus Data</a></li>
            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Popup Tambah / Edit Data</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources Code</h5>
          <ul class="list-unstyled text-small">
            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Bootstraps</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Media Sosial</h5>
          <ul class="list-unstyled text-small">
            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Instagram</a></li>
            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Twitter</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>