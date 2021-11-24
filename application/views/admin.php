<?php $this->load->view('layout/head') ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php $this->load->view($sidebar) ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view('layout/topbar')?>

    
          <!-- Page Heading -->
          <?php $this->load->view($Beranda) ?>

        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white" style="margin-top: 20px;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kelompok 4 <?= date('Y-m')?> | Distributed by <a href="http://localhost/KasirTbSumberRejeki/" target="_blank" rel="noopener noreferrer">APOTEK 4</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view('layout/modalLogout')?>


</body>

</html>
