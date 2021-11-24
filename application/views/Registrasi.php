<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tb Sumber Rejeki - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">

  
</head>

<body style="background-image: url('<?php echo base_url('gambar/2479987.jpg') ?>'); background-repeat: no-repeat; background-position: left; background-attachment: fixed; background-size: cover;">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 offset-md-3" 
    style="background-color:#121824;">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="color: white !important;">Create New Cashier Account!</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('index.php/controlerRegister')?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="name" id="CasirName" placeholder="Casir Name" value="<?= set_value('name');?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>')?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="Email" placeholder="Email Address" value="<?= set_value('email');?>">
                  <?= form_error('email','<small class="text-danger pl-3">','</small>')?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user pl-3" name="NoHP" id="NoHp" placeholder="Nomor Telepon" value="<?= set_value('NoHP');?>">
                  <?= form_error('NoHP','<small class="text-danger pl-3">','</small>')?>
                </div>
                <div class="form-group">
                  <input type="Text" class="form-control form-control-user" name="Alamat" id="Alamat" placeholder="Alamat" value="<?= set_value('Alamat');?>">
                  <?= form_error('Alamat','<small class="text-danger pl-3">','</small>')?>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="Password" id="Password" placeholder="Password">
                    <?= form_error('Password','<small class="text-danger pl-3">','</small>')?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="RepeatPassword" id="RepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                 
                <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #1844c3; border-color: #1844c3;">
                  Register Account</button> 

                <hr>
                  <div class="text-center">
                    <a class="small text-white" href="<?= base_url('index.php/Admin')?>">Kembali Ke halaman awal</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/')?>js/sb-admin-2.min.js"></script>
  <script>
    
  </script>

</body>

</html>
