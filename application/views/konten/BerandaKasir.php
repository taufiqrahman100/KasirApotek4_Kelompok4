<div class="container-fluid">

	<!-- 	Kasir -->
        <div id="tabk-1">
        	<div style="float: left; margin-right: 350px; ">
			  <!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ListBlnj" style="position: fixed; z-index: 1000;">
				<i class="fas fa-clipboard-list"></i>
				  List Belanja<span class="badge badge-light ml-2" id="ang"></span>
				</button>
        <!-- <a id="jlm" class="btn" style="border: 0; margin-left: 100px; position: fixed; z-index: 1000; color: #ff0000; border-radius: 70px; background-color: #ff00001f; display: none;"><h5 id="ang"></h5></a> -->

				<!-- Modal -->
				<div class="modal fade" id="ListBlnj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document" style="margin: 1.75rem auto !important; max-width: 900px !important;">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">List Belanja</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <table class="table">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Nama Barang</th>
						      <th scope="col">Jml Beli</th>
						      <th scope="col">Harga</th>
						      <th scope="col">SubTotal</th>
                  <th scope="col"></th>
						    </tr>
						  </thead>
						  <tbody id="ListBelanja">
						  </tbody>
						</table>
				      </div>
				      <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="hapusall_chart()">Clear</button>
				        <button type="button" class="btn btn-primary" onclick="bayar()">Bayar</button>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
        	 <!-- Topbar Search -->
        	<div class="text-center">
                <form>
		            <div class="input-group col-md-7 offset-md-3">
		              <input type="text" class="form-control border-1" placeholder="Search Barang..." aria-label="Search" aria-describedby="basic-addon2" onkeyup="cari($(this).val())">
		            </div>
		          </form>
          	</div>
        	<div id="KasirDtBarang" class="row cr1">
			</div>
        </div>
        <!-- Data Barang -->
        <div id="tabk-2">
          <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Data Barang</h1>
          </div>
          <div>
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#TambahDtBarang" onclick="cetakBrg()"><i class="fas fa-print"></i> Cetak Data Barang</button>
          	<table class="table table-striped mt-4">
					  <thead>
					    <tr>
					      <td scope="col">No</td>
					      <td scope="col">Nama Barang</td>
                <td scope="col">Merek</td>
					      <td scope="col">Farian</td>
					      <td scope="col">Stock</td>
					      <td scope="col">Harga</td> 
					    </tr>
					  </thead>
					  <tbody id="KasirBarang">
					  </tbody>
				</table>
          </div>
        </div>

        <div id="tabs-3"></div>


   <div class="modal fade" id="DaftarPesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">Tekan Logout Jika Kamu Yakin Mau Keluar Dan Tekan Cancel Untuk Batal.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('index.php/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>

 <?php $this->load->view('layout/scrip') ?>

  <!-- kasir -->
  <script>
    
    $(document).ready(function(){

        $( function() {
		    $( "#page-top" ).tabs();
		  } );


        ambilMenu();


      // $.ajax({
      //   url: " <?php echo base_url('index.php/AmbilPesanan') ?>",
      //   type: "GET",
      //   dataType: "JSON",
      //   success: function(response){
      //     $('#ListBelanja').html();
      //     for (var i = 0; i <response.length; i++) {
      //       $('#ListBelanja').append(
      //         '<tr>'+   
      //           '<td>'+(i+1)+'</td>'+
      //           '<td>'+response[i].idBarang+'</td>'+
      //           '<td>'+response[i].TglTransaksi+'</td>'+
      //           '<td>'+response[i].JumlahBeli+'</td>'+
      //           '<td>'+response[i].IdKasir+'</td>'+
      //         '</tr>'
      //         );
      //     }        
      //   }
      // });
      
      $.ajax({
        url: " <?php echo base_url('index.php/AmbilDtBarang') ?>",
        type: "GET",
        dataType: "JSON",
        success: function(response){
          $('#KasirBarang').html();
          for (var i = 0; i <response.length; i++) {
            $('#KasirBarang').append(
              '<tr>'+   
                '<td>'+(i+1)+'</td>'+
                '<td>'+response[i].NamaBarang+'</td>'+
                '<td>'+response[i].Merek+'</td>'+
                '<td>'+response[i].farian+'</td>'+
                '<td>'+response[i].Stock+'</td>'+
                '<td>'+response[i].Harga+'</td>'+
              '</tr>'
              );
          }        
        }
      });
    })
    

    function ambilMenu(){

      $.ajax({
        url: " <?php echo base_url('index.php/AmbilDtBarang') ?>",
        type: "GET",
        dataType: "JSON",
        success: function(response){
          $('#KasirDtBarang').html('');
          for (var i = 0; i <response.length; i++) {
            var disb;
            if (response[i].Stock <= '0') {
              disb = 'disabled';
            } else {
              disb = 'enabled';
            }
            $('#KasirDtBarang').append(
              '<div class="col-md-3 mt-4">'+ 
                    '<div class="card">'+
                      '<img src="<?= base_url('assets/img/fotoBarang/')?>'+response[i].Gambar+'" class="card-img-top" alt="'+response[i].NamaBarang+'" style="width:100%; height: 184px;">'+
                      '<div class="card-body">'+
                        '<h5 class="card-title">'+response[i].NamaBarang+'</h5>'+
                        '<hr>'+
                        '<p>Merek :'+' '+response[i].Merek+'</p>'+
                        '<p>Farian :'+' '+response[i].farian+'</p>'+
                        '<p>Stock :'+' '+response[i].Stock+'</p>'+
                        '<div><button style="float: right;" class="btn btn-primary" type="button" data-dismiss="modal" onclick="TamhPembelian('+response[i].idBarang+')" '+disb+'><i class="fas fa-plus"></i> Tambah</button></div>'+  
                      '</div>'+
                      '</div>'+
              '</div>'
              );
          }        
        }
      });
    }

    function TamhPembelian(brg){
      // data: $('.TbhBrg :input').serialize(),
      $.ajax({
          url : "<?php echo base_url('index.php/TamhPembelian/') ?>"+brg,
          type : "GET",
          dataType: "JSON",
          success:function(response){
            $('#ListBelanja').html('');            
            $('#ListBelanja').append(response.tampilan);          
            $('#ang').text(response.Nomor);  
          }
          });
    }

    $(document).ready(function(){
      $.ajax({
        url: "<?php echo base_url('index.php/ambilChart')?>",
        type: "GET",
        dataType: "json",
        success: function(response){
          $('#ListBelanja').html('');            
          $('#ListBelanja').append(response.tampilan);
          $('#ang').text(response.Nomor);
        }
      });
    });

    $(document).on('click','.hps', function(){
      var yes = confirm('Hapus Transaksi ini');
      if (yes == false){
        Close;
      }
      var id = $(this).attr("id");
      $.ajax({
        url: "<?php echo base_url('index.php/hapusChart/')?>"+id,
        type: "GET",
        dataType: "json",
        success: function(response){
          $('#ListBelanja').html('');            
          $('#ListBelanja').append(response.tampilan);
          $('#ang').text(response.Nomor);
        }
      });
    });

    $(document).on('change','.jumlahhh', function(){
      var id = $(this).attr("id");
      var nilai = $(this).val();
      $.ajax({
        url: "<?php echo base_url('index.php/jumlah/')?>"+id+'/'+nilai,
        type: "POST",
        dataType: "json",
        success: function(response){
          $('#ListBelanja').html('');            
          $('#ListBelanja').append(response.tampilan);
        }
      });
    });

    function bayar(){
       $.ajax({
       url: "<?php echo base_url('index.php/bayar')?>",
       type: "POST",
       dataType: "json",
       success:function(response){
        alert(response.info);
        console.log(response);
        $('#ListBelanja').html('');            
         $('#ListBelanja').append(response.tampil.tampilan);
         $('#ang').text(response.tampil.Nomor);
         ambilMenu();
        }
       });
    }

    

    function hapusall_chart(){
      var yes = confirm('Anda yakin mau menghapus semua transaksi');
      if (yes == false){
        Close;
      }
      $.ajax({
        url: "<?php echo base_url('index.php/hapusChartAll')?>",
        type: "GET",
        dataType: "json",
        success: function(response){
          $('#ListBelanja').html('');            
          $('#ListBelanja').append(response);
          $('#ang').text(response.Nomor);
        }
      });
    }


    function cari(valCari) {
      if(valCari == '') valCari = '0';
      $.ajax({
        url: "<?php echo base_url('index.php/Cari/')?>"+valCari,
        type: "GET",
        dataType: "json",
        success: function(response){
          $('#KasirDtBarang').html('');
          for (var i = 0; i <response.length; i++) {
          var disb;
            if (response[i].Stock <= '0') {
              disb = 'disabled';
            } else {
              disb = 'enabled';
            }
            $('#KasirDtBarang').append(
              '<div class="col-md-3 mt-4">'+ 
                    '<div class="card">'+
                      '<img src="<?= base_url('assets/img/fotoBarang/')?>'+response[i].Gambar+'" class="card-img-top" alt="'+response[i].NamaBarang+'" style="width:100%; height: 184px;">'+
                      '<div class="card-body">'+
                        '<h5 class="card-title">'+response[i].NamaBarang+'</h5>'+
                        '<hr>'+
                        '<p>Merek :'+' '+response[i].Merek+'</p>'+
                        '<p>Farian :'+' '+response[i].farian+'</p>'+
                        '<p>Stock :'+' '+response[i].Stock+'</p>'+
                        '<div><button style="float: right;" class="btn btn-primary" type="button" data-dismiss="modal" onclick="TamhPembelian('+response[i].idBarang+')" '+disb+'><i class="fas fa-plus"></i> Tambah</button></div>'+  
                      '</div>'+
                      '</div>'+
              '</div>'
              );
          }        
        }
      });
    }

    // function cetakBrg(){
    //   $.ajax({
    //     url: "<?php echo base_url('index.php/cetakBrg')?>",
    //     type: "POST",
    //     dataType: "json",
    //     success: function(response){
          
    //     }
    //   })
    // }

  </script>