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

  if ($row["peran"] == 'guru') {
      header("Location: ../tb_guru/index.php");
      exit;
  } else if ($row["peran"] == 'karyawan') {
      header("Location: ../tb_karyawan/index.php");
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tampil Data Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Febry Anto, Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">

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
              <a class="navbar-brand" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">Tambah Data</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link text-danger" aria-current="page" href="../logout.php">Log Out</a>
                  </li>
                </ul>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="d-flex" role="search">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php
                    $id_siswa = "";
                    $nik = "";
                    $nama = "";
                    if (isset($_POST['kolom'])) {

                      if ($_POST['kolom'] == "id_siswa") {
                        $id = "selected";
                      } else if ($_POST['kolom'] == "nik") {
                        $nik = "selected";
                      } else {
                        $nama = "selected";
                      }
                    }
                    ?>

                    <li class="nav-item dropdown ms-2 me-2">
                      <select class="form-select" name="kolom" style="max-width: 190px;"
                        aria-label="Default select example" required>
                        <option selected value="">Pilih Kategori</option>
                        <option value="id_siswa" <?php echo $id_siswa; ?>>ID Siswa</option>
                        <option value="nik" <?php echo $nik; ?>>NIK Siswa</option>
                        <option value="nama" <?php echo $nama; ?>>Nama Siswa</option>
                      </select>
                    </li>
                  </ul>
                  <input class="form-control me-2" style="max-width: 190px;" type="search" placeholder="Search"
                    aria-label="Search" name="kata_kunci" required>
                  <button class="btn btn-outline-dark" value="Cari" type="submit">Search</button>
                  <a href="" class="btn btn-outline-danger ms-2">Reset</a>
                </form>
              </div>
            </div>
          </nav>
        </nav>
      </div>

      <!-- Modal Simpan -->
      <form action="proses_simpan_siswa.php" method="POST">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <fieldset>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="disabledTextInput" class="col-form-label fw-bold">ID Siswa</label>
                          <input type="text" id="disabledTextInput" name="id_siswa" class="form-control" required />
                        </div>
                      </div>

                      <div class="col-md-6 ms-auto">
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label fw-bold">NIK</label>
                          <input type="text" class="form-control" name="nik_siswa" id="recipient-name" required />
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label fw-bold">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_siswa" id="recipient-name" required />
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="recipient-name" class="fw-bold col-form-label">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir_siswa" id="recipient-name"
                            required />
                        </div>
                      </div>

                      <div class="col-md-6 ms-auto">
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label fw-bold">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tanggal_lahir_siswa" id="recipient-name"
                            required />
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
                                <input class="form-check-input" type="radio" name="jenis_kelamin_siswa"
                                  id="inlineRadio1" value="L" required />
                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                              </div>

                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin_siswa"
                                  id="inlineRadio2" value="P" required />
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
                                <input class="form-check-input" type="radio" name="golongan_darah_siswa"
                                  id="inlineRadio1" value="A" required />
                                <label class="form-check-label" for="inlineRadio1">A</label>
                              </div>

                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="golongan_darah_siswa"
                                  id="inlineRadio2" value="B" required />
                                <label class="form-check-label" for="inlineRadio2">B</label>
                              </div>

                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="golongan_darah_siswa"
                                  id="inlineRadio2" value="AB" required />
                                <label class="form-check-label" for="inlineRadio2">AB</label>
                              </div>

                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="golongan_darah_siswa"
                                  id="inlineRadio2" value="O" required />
                                <label class="form-check-label" for="inlineRadio2">O</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="message-text" class="col-form-label fw-bold">Alamat</label>
                      <textarea class="form-control" name="alamat_siswa" id="message-text" required></textarea>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label fw-bold">Agama</label>
                          <select name="agama_siswa" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="buddha">Buddha</option>
                            <option value="hindu">Hindu</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="mb-3">
                          <div class="row">
                            <label for="recipient-name" class="fw-bold col-form-label">Status Perkawinan</label>

                            <div class="col">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_perkawinan" id="inlineRadio1"
                                  value="menikah" required />
                                <label class="form-check-label" for="inlineRadio1">Menikah</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_perkawinan" id="inlineRadio2"
                                  value="belum menikah" required />
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
                                <input class="form-check-input" type="radio" name="pekerjaan" id="inlineRadio1"
                                  value="bekerja" required />
                                <label class="form-check-label" for="inlineRadio1">Bekerja</label>
                              </div>

                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pekerjaan" id="inlineRadio2"
                                  value="belum bekerja" required />
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
                                <input class="form-check-input" type="radio" name="kewarganegaraan_siswa"
                                  id="inlineRadio1" value="WNI" required />
                                <label class="form-check-label" for="inlineRadio1">WNI</label>
                              </div>

                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kewarganegaraan_siswa"
                                  id="inlineRadio2" value="WNA" required />
                                <label class="form-check-label" for="inlineRadio2">WNA</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Tabel Data Siswa</h1>
        <p class="fs-5 text-muted">Tabel yang menampilkan data siswa (Project Pelajaran PWP).</p>
      </div>
    </header>

    <main>
      <div class="table-responsive">
        <table class="table text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Lengkap</th>
              <th>TTL</th>
              <th>JK</th>
              <th>GD</th>
              <th>Alamat</th>
              <th>AGAMA</th>
              <th>AKSI</th>
            </tr>
          </thead>

          <?php
          include "../koneksi/koneksi.php";

          if (isset($_POST['kata_kunci'])) {
            $kata_kunci = trim($_POST['kata_kunci']);

            $kolom = "";
            if ($_POST['kolom'] == "id_siswa") {
              $kolom = "id_siswa";
            } else if ($_POST['kolom'] == "nik") {
              $kolom = "nik";
            } else {
              $kolom = "nama";
            }

            $sql = "select * from tb_siswa where $kolom like '%" . $kata_kunci . "%' order by id_siswa asc";

          } else {
            $sql = "select * from tb_siswa order by id_siswa asc";
          }

          $query = mysqli_query($koneksi, $sql);
          $no = 1;
          while ($data = mysqli_fetch_array($query)) {
            ?>
            <tbody>
              <th>
                <?php echo $data['id_siswa']; ?>
              </th>
              <td>
                <?php echo ucfirst($data['nama']); ?>
              </td>
              <td>
                <?php echo ucfirst($data['tempat_lahir']); ?>,
                <?php echo $data['tanggal_lahir']; ?>
              </td>
              <td>
                <?php echo $data['jenis_kelamin']; ?>
              </td>
              <td>
                <?php echo $data['golongan_darah']; ?>
              </td>
              <td>
                <?php echo ucfirst($data['alamat']); ?>
              </td>
              <td>
                <?php echo ucfirst($data['agama']); ?>
              </td>
              <td>
                <div class="btn-group">

                  <a href="form_edit_siswa.php?id_siswa=<?php echo $data['id_siswa']; ?>" type="button"
                    class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-pencil-fill" viewBox="0 0 16 16">
                      <path
                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z">
                      </path>
                    </svg>
                    <span class="visually-hidden">Edit</span>
                  </a>

                  <a href="proses_hapus_siswa.php?id_siswa=<?php echo $data['id_siswa']; ?>"
                    onclick="return confirm('Anda yakin ingin menghapus data <?php echo $data['id_siswa']; ?> ini ?')"
                    class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                      viewBox="0 0 16 16">
                      <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                      </path>
                      <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                      </path>
                    </svg>
                    <span class="visually-hidden">Hapus</span>
                  </a>
                </div>
              </td>

            </tbody>
          <?php } ?>

        </table>
      </div>
    </main>


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
            <li class="mb-1"><a class="link-secondary text-decoration-none" href="https://www.instagram.com/24peb_/">Instagram</a></li>
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