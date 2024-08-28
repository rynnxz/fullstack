<?php
    include "kunci.php";
    include "koneksi.php";

    $data = "SELECT * FROM datasiswa";
    $tampil = mysqli_query($konn, $data);
    $i = 1;
  
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if ($id) {
        $query = "SELECT * FROM datasiswa WHERE id = $id";
        $result = mysqli_query($konn, $query);
        $editData = mysqli_fetch_array($result);
    }

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- link remix icon -->
  <link href="icons/remixicon.css" rel="stylesheet"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIFO SPP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $username; ?></a>
        </div>
      </div>

      <?php
        include "menu.php";
      ?>
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable Siswa SMKN 1 Percut Sei Tuan</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                  Tambah Data Siswa
                </button>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>No.Hp</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($tampil)) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $row[1]?></td>
                    <td><?= $row[2]?></td>
                    <td><?= $row[3]?></td>
                    <td><?= $row[4]?></td>
                    <td><?= $row[5]?></td>
                    <td><?= $row[6]?></td>
                    <td>
                      <a href="hapusData.php?id=<?=$row[0];?>">Hapus</a>
                      |
                      <a href="?id=<?= $row[0] ?>" class="edit-link" data-id="<?= $row[0] ?>">Edit</a>
                    </td>
                  </tr>
                  <?php
                    $i++;
                endwhile;
                  
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>No.Hp</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <form action="simpanData.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIS</label>
                    <input type="text" class="form-control" name="nis" id="exampleInputEmail1" placeholder="Nomor Induk Siswa">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama Siswa">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" placeholder="Alamat">
                  </div>

                  <div class="form-group">
                    <label for="exampleSelectBorder">Kelas</label>
                    <select class="custom-select form-control-border" name="kelas" id="exampleSelectBorder">
                      <option>X</option>
                      <option>XI</option>
                      <option>XII</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleSelectBorder">Jurusan</label>
                    <select class="custom-select form-control-border" name="jurusan" id="exampleSelectBorder">
                      <option>Rekayasa Perangkat Lunak</option>
                      <option>Teknik Komputer Jaringan</option>
                      <option>Otomotif</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Handphone</label>
                    <input type="text" class="form-control" name="hp" id="exampleInputEmail1" placeholder="Nomor Handphone">
                  </div>

                </div>
                <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Save</button>
            </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-secondary1">

        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
    <form action="simpanData.php" method="post">
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">NIS</label>
        <input type="text" class="form-control" name="nis" id="exampleInputEmail1" placeholder="Nomor Induk Siswa" value="<?= isset($editData['nis']) ? $editData['nis'] : '' ?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama Siswa" value="<?= isset($editData['nama']) ? $editData['nama'] : '' ?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" placeholder="Alamat" value="<?= isset($editData['alamat']) ? $editData['alamat'] : '' ?>">
      </div>

      <div class="form-group">
        <label for="exampleSelectBorder">Kelas</label>
        <select class="custom-select form-control-border" name="kelas" id="exampleSelectBorder">
          <option <?= isset($editData['kelas']) && $editData['kelas'] == 'X' ? 'selected' : '' ?>>X</option>
          <option <?= isset($editData['kelas']) && $editData['kelas'] == 'XI' ? 'selected' : '' ?>>XI</option>
          <option <?= isset($editData['kelas']) && $editData['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleSelectBorder">Jurusan</label>
        <select class="custom-select form-control-border" name="jurusan" id="exampleSelectBorder">
          <option <?= isset($editData['jurusan']) && $editData['jurusan'] == 'Rekayasa Perangkat Lunak' ? 'selected' : '' ?>>Rekayasa Perangkat Lunak</option>
          <option <?= isset($editData['jurusan']) && $editData['jurusan'] == 'Teknik Komputer Jaringan' ? 'selected' : '' ?>>Teknik Komputer Jaringan</option>
          <option <?= isset($editData['jurusan']) && $editData['jurusan'] == 'Otomotif' ? 'selected' : '' ?>>Otomotif</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nomor Handphone</label>
        <input type="text" class="form-control" name="hp" id="exampleInputEmail1" placeholder="Nomor Handphone" value="<?= isset($editData['hp']) ? $editData['hp'] : '' ?>">
      </div>

      <!-- Hidden field to store the ID -->
      <input type="hidden" name="id" value="<?= isset($editData['id']) ? $editData['id'] : '' ?>">
    </div>
    <!-- /.card-body -->

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-outline-light">Save</button>
    </div>
  </form>
</div>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

    </section>
    <!-- /.content -->

    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php
  include "footer.php";
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


  <script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    
    if (id) {
        // Trigger the edit modal
        const editModal = new bootstrap.Modal(document.getElementById('modal-secondary1'));
        editModal.show();
    }

    const closeButtons = document.querySelectorAll('.modal .close');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            window.history.replaceState({}, document.title, window.location.pathname);
            document.querySelectorAll('.modal').forEach(modal => modal.style.display = 'none');
        });
    });
});

</script>



<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
