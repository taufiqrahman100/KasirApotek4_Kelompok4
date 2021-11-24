<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>APOTEK SEHAT - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url("<?php echo base_url('gambar/bg3.jpg') ?>");
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      background-size: cover;
    }

    form input[type="Password"]:focus {
      outline: none !important;
    }

    form input[type="text"]:focus {
      outline: none !important;
    }

    .vertical-center {
      margin: 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }
  </style>
</head>

<body>

  <div class="container" style="margin-top: 70px;">

    <div class="card o-hidden border-0  my-5 col-lg-5 offset-lg-3" style="background-color:#fffefe08; box-shadow: 0 1rem 3rem black!important">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="color: #f5f5f5 !important;">Login</h1>
                <?= $this->session->flashdata('message') ?>
              </div>
              <form class="user" method="post" action="<?= base_url('index.php/controlerLogin') ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="Email" id="Email" placeholder="Email" value="<?= set_value('Email'); ?>">
                  <?= form_error('Email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div style="width: 335px; height: 50px; background-color: white; border-radius: 10rem;">
                  <div class="form-group form-inline">
                    <input type="Password" class="form-control-user" id="Password" placeholder="Password" name="Password" style="width: 265px; border: 0; height: calc(1.5em + .75rem + 2px);">
                    <button id="shoW" type="button" class="btn btn-link">Show</button>
                  </div>
                </div>
                <?= form_error('Password', '<small class="text-danger pl-3">', '</small>') ?>
                <div style="margin-top: 15px;">
                  <button type="submit" class="btn btn-primary btn-user" style="background-color: #1844c3; border-color: #1844c3; width: 100px;">
                    Login
                  </button>
                </div>

                <hr style="background-color: red;">
                <div class="text-center">
                  <a class="small text-white" href="https://blogbugabagi.blogspot.com">Create by Kelompok 4</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
  <script>
    $('#shoW').hide();
    $('#Password').on('keydown', function() {
      $('#shoW').show();
    })

    $('#shoW').on('click', function() {
      if ($(this).text() == 'Show') {
        $('#Password').attr('type', 'text');
        $(this).text('Hide');
      } else {
        $('#Password').attr('type', 'Password');
        $(this).text('Show');
      }
    })
  </script>

</body>

</html>