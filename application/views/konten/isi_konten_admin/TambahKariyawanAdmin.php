          <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create New Cashier Account!</h1>
           	</div>
           	<form class="user" id="UsrBru">
                <div class="form-group" id="col_CasirName">
                    <input type="text" class="form-control form-control-user Diisi" name="name" id="CasirName" placeholder="Cashier Name" value="">
                    
                </div>
                <div class="form-group" id="col_Email">
                  <input type="email" class="form-control form-control-user Diisi" name="email" id="Email" placeholder="Email Address" value="">
                  
                </div>
                <div class="form-group" id="col_NoHp">
                  <input type="text" class="form-control form-control-user Diisi pl-3" name="NoHP" id="NoHp" placeholder="Nomor Telepon" value="">
                  
                </div>
                <div class="form-group" id="col_alamat">
                  <input type="Text" class="form-control form-control-user Diisi" name="Alamat" id="alamat" placeholder="Alamat" value="">
                  
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0" id="col_Password">
                    <input type="password" class="form-control form-control-user Diisi" name="Password" id="Password" placeholder="Password">
                    
                  </div>
                  <div class="col-sm-6" id="col_RepeatPassword">
                    <input type="password" class="form-control form-control-user Diisi" name="RepeatPassword" id="RepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                 
                <button id="regis" type="button" class="btn btn-primary btn-user btn-block" style="background-color: #1844c3; border-color: #1844c3;">
                  Register Account</button> 

                <hr>
                  <div class="text-center">
                    <a class="small text-white" href="<?= base_url('index.php/Admin')?>">Kembali Ke halaman awal</a>
                  </div>
              </form>