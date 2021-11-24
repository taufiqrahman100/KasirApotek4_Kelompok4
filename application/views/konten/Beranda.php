<div class="container-fluid">
		<!-- Laporan Penjualan -->
		<div id="tabs-1">
          <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Laporan Penjualan</h1>
          </div>
          <?php $this->load->view('konten/isi_konten_admin/laporanAdmin')?>
    </div>
        <!-- DATA KARIYAWAN -->
    <div id="tabs-2">
        <?php $this->load->view('konten/isi_konten_admin/kelolaKariyawanAdmin')?>    
    </div>
        <!-- Tambah Barang -->
    <div id="tabs-3">
         <?php $this->load->view('konten/isi_konten_admin/kelolaBarangAdmin')?>     
    </div>
        <!-- register -->
    <div id="tabs-5">
          <?php $this->load->view('konten/isi_konten_admin/TambahKariyawanAdmin')?>	
    </div>
</div>

<?php $this->load->view('layout/scrip') ?>
<!-- <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script> -->
<script>




$("#NamaBrg" ).on('change',function() {
  tmplStok($(this).val());
})

function tmplStok(idstok){
  $.ajax({
      url: "<?php echo base_url('index.php/AmbilStok/') ?>"+idstok,
      type: "GET",
      dataType: "json",
      success: function(response){
      if (idstok == 0) {
        $('#stk').text('Stok : ');  
      } else {
        $('#stk').text('Stok : '+response.Stock);  
      }
      
    }
    });
}

$("#TmStok").on('click', function(){
  TmbhStok($('#NamaBrg').val());
})
// tambah stok
function TmbhStok(idbrg){
  $.ajax({
    url : "<?php echo base_url('index.php/UbahStok/') ?>"+idbrg,
    type : "POST",
    data: $('#TmbhStok').serialize(),
    dataType: "JSON",
     success:function(response){
      alert(response.info);
      $('#Barang').html('');
      tampil();
      $('#TambahStok').fadeOut("slow");
        setTimeout(function(){
        $("[data-dismiss=modal]").trigger({ type: "click" });
      },2)
      $('#NamaBrg').val(0);
      $('#stk').text('Stok : ');
      $('#StokBru').val('');

     }
    });
}

function aktifasi(){
   $.ajax({
            url: " <?php echo base_url('index.php/AmbilDtUser') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(response){
              $('#StatusKariyawan').html();
              for (var i = 1; i <response.length; i++) {
                var Status;
                var color;
                if (response[i].Status == '1') {
                  Status = 'Active';
                  color = 'blue';
                } else {
                  Status = 'NonActive';
                  color = 'red';

                }
                $('#StatusKariyawan').append(
                  '<tr>'+   
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+response[i].Username+'</td>'+
                    '<td>'+'<button id="aktivasi" style= "background-color:'+color+'; color: white;" type="button" class="btn aktivasi"  onclick="UbhSttusUser('+response[i].IdPengguna+')">'+Status+'</button>'+'</td>'+
                  '</tr>'
                  );
              }        
            }
          });
}

function tampil(){
        $.ajax({
            url: " <?php echo base_url('index.php/AmbilDtBarang') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(response){
              $('#Barang').html();
              for (var i = 0; i <response.length; i++) {
                $('#Barang').append(
                  '<tr>'+   
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+response[i].NamaBarang+'</td>'+
                    '<td>'+response[i].farian+'</td>'+
                    '<td>'+response[i].Merek+'</td>'+
                    '<td>'+response[i].Stock+ ' '+response[i].Satuan+'</td>'+
                    '<td>'+response[i].Harga+'</td>'+
                    '<td><button type="button" data-toggle="modal" data-target="#EditDtBarang" id="BtnEdit" class="btn btn-light btn-outline-primary mr-1" onclick="EditBrg('+response[i].idBarang+')"><i class="fas fa-edit"></i></button>'+ 
                    '<button type="button" class="btn btn-light btn-outline-danger" onclick="HapusDtBarang('+response[i].idBarang+')"><i class="fas fa-trash-alt"></i></button></td>'+
                  '</tr>'
                  );
              }        
            }
          });
          }

$('#tampilMrk').on('click', function(){
  if ($(this).text() == 'Merek Lain') {
      $('#merkBaru').show();
      $('#spn').removeClass('badge-primary').addClass('badge-danger');  
      $(this).removeClass('bg-primary').addClass('bg-danger');
      $(this).text('Close'); 
} else {
  $('#merkBaru').hide();
  $('#spn').removeClass('badge-danger').addClass('badge-primary');  
  $(this).removeClass('bg-danger').addClass('bg-primary');
  $(this).text('Merek Lain');
  $('#MerkNew').val('');
}
  
});

$('#tampilFrn').on('click', function(){
  if ($(this).text() == 'Farian Lain') {
      $('#FrnBaru').show();
      $('#spnF').removeClass('badge-primary').addClass('badge-danger');  
      $(this).removeClass('bg-primary').addClass('bg-danger');
      $(this).text('Close'); 
} else {
  $('#FrnBaru').hide();
  $('#spnF').removeClass('badge-danger').addClass('badge-primary');  
  $(this).removeClass('bg-danger').addClass('bg-primary');
  $(this).text('Farian Lain');
  $('#FarnNew').val('');
}
  
});

$('#tampilSat').on('click', function(){
  if ($(this).text() == 'Satuan Lain') {
      $('#StnBaru').show();
      $('#spnS').removeClass('badge-primary').addClass('badge-danger');  
      $(this).removeClass('bg-primary').addClass('bg-danger');
      $(this).text('Close'); 
} else {
  $('#StnBaru').hide();
  $('#spnS').removeClass('badge-danger').addClass('badge-primary');  
  $(this).removeClass('bg-danger').addClass('bg-primary');
  $(this).text('Satuan Lain');
  $('#StnNew').val('');
}
  
});

$('#Satuan').on('change',function(){
    $('#infoStatus').hide();
});

$('#Farian').on('change',function(){
     $('#infoFrin').hide();
});

$('#Merek').on('change',function(){
    $('#infoMrk').hide();
});

function TmbhMerek(){
  // var nilai = $('#MerkNew').val();
  $.ajax({
          url : "<?php echo base_url('index.php/MerekBaru') ?>",
          type : "POST",
          data: $('#TmbBarang').serialize(),
          dataType: "JSON",
          success:function(response){
            $('#infoMrk').show().text(response.info);
            $('#merkBaru').hide();
            $('#spn').removeClass('badge-danger').addClass('badge-primary');  
            $('#tampilMrk').removeClass('bg-danger').addClass('bg-primary');
            $('#tampilMrk').text('Merek Lain');
            $('#MerkNew').val('');
            ambilmerek();

            if ($('#infoMrk').text() !== 'Merek Berhasil Ditambahkan') {
              $('#infoMrk').removeClass('badge-primary').addClass('badge-danger');
            } else{
              $('#infoMrk').removeClass('badge-danger').addClass('badge-primary');
            }
          }
          });
}

function TmbhFarian(){
  $.ajax({
          url : "<?php echo base_url('index.php/FarianBaru') ?>",
          type : "POST",
          data: $('#TmbBarang').serialize(),
          dataType: "JSON",
          success:function(response){
            $('#infoFrin').show().text(response.info);
             $('#FrnBaru').hide();
              $('#spnF').removeClass('badge-danger').addClass('badge-primary');  
              $('#tampilFrn').removeClass('bg-danger').addClass('bg-primary');
              $('#tampilFrn').text('Farian Lain');
              $('#FarnNew').val('');
            ambilFarian();

            if ($('#infoFrin').text() !== 'Farian Berhasil Ditambahkan') {
              $('#infoFrin').removeClass('badge-primary').addClass('badge-danger');
            } else{
              $('#infoFrin').removeClass('badge-danger').addClass('badge-primary');
            }
          }
          });
}

function TmbhSatuan(){
  $.ajax({
          url : "<?php echo base_url('index.php/SatuanBaru') ?>",
          type : "POST",
          data: $('#TmbBarang').serialize(),
          dataType: "JSON",
          success:function(response){
            $('#infoStatus').show().text(response.info);
            $('#StnBaru').hide();
            $('#spnS').removeClass('badge-danger').addClass('badge-primary');  
            $('#tampilSat').removeClass('bg-danger').addClass('bg-primary');
            $('#tampilSat').text('Satuan Lain');
            $('#StnNew').val('');
             ambilSatuan();

             if ($('#infoStatus').text() !== 'Satuan Berhasil Ditambahkan') {
              $('#infoStatus').removeClass('badge-primary').addClass('badge-danger');
            } else{
              $('#infoStatus').removeClass('badge-danger').addClass('badge-primary');
            }

            }
          });
}

$(document).ready(function(){
    $('#merkBaru').hide();
    $('#FrnBaru').hide();
    $('#StnBaru').hide();
    $('#infoStatus').hide();
    $('#infoFrin').hide();
    $('#infoMrk').hide();

    // var msec = new Date();
    // var month = ["januari", "februari", "maret", "april", "mei", "juni", "juli", "agustus", "september", "oktober", "november", "Desember"];
    // // var awal = new Date(2019, 5);
    // // $('.LpranBg').text(month[msec.getMonth()] + ' '+msec.getFullYear());
    // var now = new Date();
    // var daysOfYear = [];
    // for (var d = 5; d <= now.getMonth(); d++) {
    //     // console.log(new Date(d));
      
    //   $('#Laporan').append(

    //   '<div class="LpranBg mt-2" style="height: 41px; border-radius: 6px;"><h3 style="margin-left: 20px; padding-top: 6px;">'+ month[d] +' '+ '</h3></div>'+  
    //     '<div class="container">'+
    //       '<table class="table">'+
    //       '<thead>'+
    //         '<tr>'+
    //           '<th scope="col">No</th>'+
    //           '<th scope="col">Tgl Transaksi</th>'+
    //           '<th scope="col">Nama Barang</th>'+
    //           '<th scope="col">Jml Beli</th>'+
    //           '<th scope="col">Harga</th>'+
    //           '<th scope="col">Sub Total</th>'+
    //         '</tr>'+
    //       '</thead>'+
    //       '<tbody id="lpprn_1">'+
    //       '</tbody>'+
    //     '</table>'+
    //     '</div>'
          
    //   );
    // }


    // $.ajax({
    //         url: " <?php echo base_url('index.php/AmbilLaporann') ?>",
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(response){
    //         $('#lpprn_1').html();
    //           for (var i = 0; i <response.length; i++) {
    //             $('#lpprn_1').append(
    //               '<tr>'+   
    //                 '<td>'+(i+1)+'</td>'+
    //                 '<td>'+response[i].IdBarang+'</td>'+
    //                 '<td>'+response[i].TglTransaksi+'</td>'+
    //                 '<td>'+response[i].JumlahBeli+'</td>'+
    //                 '<td>'+response[i].Stock+'</td>'+
    //                 '<td>'+response[i].Harga+'</td>'+
    //               '</tr>'
    //               );
    //           }
    //         }
    //         });
  // $awal = '2015';
  // $akhir = '2019'; 
  // for (var i = $awal; i < $akhir; i++) {
    
  // }

    //Sidebar 
    $( function() {
    $( "#page-top" ).tabs({
  active: 0
});
  } );

  //Data Kariyawan
    $( function() {
    $( "#Table" ).tabs();
  } );
  
  //Laporan
  $( function() {
    $( "#Laporan" ).accordion();
  } );

  // Ambil Merek
   ambilmerek();

    // Ambil Farian
    ambilFarian();


    // Ambil Satuan

    ambilSatuan();
    

    // Ambil Nama Barang
    $.ajax({
      url: "<?php echo base_url('index.php/AmbilDtBarang') ?>",
      type: "GET",
      dataType: "json",
      success: function(response){
       $('#NamaBrg').html('');
       $('#NamaBrg').append(
        '<option value="0">Pilih Nama Barang</option>'
        );  
       for (var i=0; i<response.length; i++){
        $('#NamaBrg').append(
          '<option value='+response[i].idBarang+'>'+response[i].NamaBarang+' '+response[i].Merek+' '+response[i].farian+'</option>'
        );
      }
    }
    });

    // Menampilkan data barang
    tampil();
    // ambil status
    aktifasi();

        $.ajax({
            url: " <?php echo base_url('index.php/AmbilDtUser') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(response){
              $('#KontakKariyawan').html();
              $('#PosisiKariyawan').html();
              $('#AlamatKariyawan').html();
              for (var i = 0; i <response.length; i++) {
                $('#KontakKariyawan').append(
                  '<tr>'+   
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+response[i].Username+'</td>'+
                    '<td>'+response[i].Email+'</td>'+
                    '<td>'+response[i].NoHp+'</td>'+
                  '</tr>'
                  );

                 $('#PosisiKariyawan').append(
                  '<tr>'+   
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+response[i].Username+'</td>'+
                    '<td>'+response[i].Posisi+'</td>'+
                  '</tr>'
                  );

                  $('#AlamatKariyawan').append(
                  '<tr>'+   
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+response[i].Username+'</td>'+
                    '<td>'+response[i].Alamat+'</td>'+
                  '</tr>'
                  );
              }        
            }
          });

        // $.ajax({
        //     url: " <?php echo base_url('index.php/AmbilDtUser') ?>",
        //     type: "GET",
        //     dataType: "JSON",
        //     success: function(response){
        //       $('#PosisiKariyawan').html();
        //       for (var i = 0; i <response.length; i++) {
               
        //       }        
        //     }
        //   });

       

        // $.ajax({
        //     url: " <?php echo base_url('index.php/AmbilDtUser') ?>",
        //     type: "GET",
        //     dataType: "JSON",
        //     success: function(response){
        //       $('#AlamatKariyawan').html();
        //       for (var i = 0; i <response.length; i++) {
               
        //       }        
        //     }
        //   });

    });

    function ambilSatuan(){
      $.ajax({
          url: "<?php echo base_url('index.php/AmbilSatuan') ?>",
          type: "GET",
          dataType: "json",
          success: function(response){
           $('[id*=Satuan]').html('');
           $('[id*=Satuan]').append(
            '<option value="0">Pilih Satuan Barang</option>'); 
           for (var i=0; i<response.length; i++){
            $('[id*=Satuan]').append(
              '<option value='+response[i].IdSatuan+'>'+response[i].Satuan+'</option>'
            );
          }
        }
        });
    }
    
    function ambilFarian(){ 
      $.ajax({
          url: "<?php echo base_url('index.php/AmbilFarian') ?>",
          type: "GET",
          dataType: "json",
          success: function(response){
           $('[id*=Farian]').html('');
           $('[id*=Farian]').append(
            '<option value="0">Pilih Farian Barang</option>'); 
           for (var i=0; i<response.length; i++){
            $('[id*=Farian]').append(
              '<option value='+response[i].IdFarian+'>'+response[i].Farian+'</option>'
            );
          }
        }
        });
    }

    function ambilmerek(){
       $.ajax({
      url: "<?php echo base_url('index.php/AmbilMerek') ?>",
      type: "GET",
      dataType: "json",
      success: function(response){
       $('[id*=Merek]').html('');
       $('[id*=Merek]').append(
        '<option value="0">Pilih Merek Barang</option>'); 
       for (var i=0; i<response.length; i++){
        $('[id*=Merek]').append(
          '<option value='+response[i].idMerek+'>'+response[i].Merek+'</option>'
        );
      }
    }
    });

    }

    // upload dengan cropi dibawah ini
    // $(document).ready(function(){
    //     $image_crop = $('#gambar_upload').croppie({
    //       enableExif: true,
    //       viewport: {
    //         width: 249,
    //         height: 185,
    //         type: 'square'
    //       },
    //       boundary:{
    //         width: 250,
    //         height: 250
    //       }
    //     });

    //     $('#Gambar').on('change', function(){
    //         var reader = new FileReader();
    //         reader.onload = function (event) {
    //           $image_crop.croppie('bind', {
    //             url: event.target.result
    //           }).then(function(){});
    //         }

    //         reader.readAsDataURL(this.files[0]);
    //         $('#TambahDtBarang').modal('hide');
    //         $('#uploadModal').modal('show');
    //     });
    //     $('#ClosUpld').on('click', function(){
    //         $('#uploadModal').modal('hide');
    //         $('#TambahDtBarang').modal('show');
            
    //     });
    //     $('.crop_image').click(function(event){
    //       $('#uploadModal').modal('hide');
    //       $('#TambahDtBarang').modal('show');
    //       $image_crop.croppie('result', {
    //         type: 'canvas',
    //         size: 'viewport'
    //       }).then(function(response){ 
 
    //         $.ajax({
    //           url: "<?php echo base_url('index.php/uploadGambar') ?>",
    //           type: "POST",
    //           data: {"image": response},
    //           success: function(data){
    //             // $('#TambahDtBarang').modal('show');
    //             $('#gambar_buku').prop("src", "<?php echo base_url('assets/img/fotoBarang/') ?>"+data);
    //             $('#sec-gambar').show();
    //             $('#nama_gambar').val(data);
    //           }
    //         })
    //       })
    //     });


    // });

    
    // upload tanpa crop di bawah ini

    $('#Gambar').on('change', function(){

       var file_data = $('#Gambar').prop('files')[0];
        var form_data = new FormData();
 
        form_data.append('file', file_data);
      $.ajax({
          url : "<?php echo base_url('index.php/uploadGambar') ?>",
          dataType: 'json',  // what to expect back from the PHP script, if anything
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success:function(data,status){
            
            if (data.status!='error') {
                        $('#gambar').val('');
                        alert(data.msg);
                    }else{
                        alert(data.msg);
                    }
            $('#sec-gambar').show();
            $('#nama_gambar').val(data.nama);
            $('#gambar_buku').prop("src", "<?php echo base_url('assets/img/fotoBarang/') ?>"+data.nama);

          }
      }); 
    })
  

    // Menyimpan data Barang
    function SimpanDtBarang(){  
     $.ajax({
          url : "<?php echo base_url('index.php/SimpanBarang') ?>",
          type : "POST",
          data: $('#TmbBarang').serialize(),
          dataType: "JSON",
          success:function(Data){
           
            alert(Data.info);
            $('#Barang').html('');
              tampil();
            $('#TambahDtBarang').fadeOut("slow");
                setTimeout(function(){
                   $("[data-dismiss=modal]").trigger({ type: "click" });
                },2);   
          }
          });
    }

    // Menghapus data barang
    function HapusDtBarang(HpsBrng){
      var yes = confirm('Hapus Data Ini');
      if (yes == false){
        Close;
      }
      $.ajax({
        url: "<?php echo base_url('index.php/HapusDtBarang/')?>"+HpsBrng,
        type: "POST",
        dataType: "json",
          success: function(response){
            alert(response.info);
            $('#Barang').html('');
            tampil();
          }
      });
    }

    // menampilkan data ke modal edit
    function EditBrg(EdtBarang){
      $.ajax({
        url: "<?php echo base_url('index.php/AmbilDtEdit/')?>"+EdtBarang,
        type: "GET",
        dataType: "json",
          success: function(response){
            console.log(response);
            $('#Sembunyi').val(response.idBarang);
            $('#EdNamaBarang').val(response.NamaBarang);
            $('#EdMerek').val(response.idMerek);
            $('#EdFarian').val(response.IdFarian);
            $('#EdJumlah').val(response.Stock);
            $('#EdSatuan').val(response.IdSatuan);
            $('#EdHarga').val(response.Harga);
            // $('#EdGambar').val(response.Gambar);
            
      }
      });
    }
    
    // proses edit barang
   function EdietBarang(){
    $.ajax({
      url : "<?php echo base_url('index.php/EditBarang') ?>",
      type : "POST",
      data: $('#EdtBarang').serialize(),
      dataType: "JSON",
       success:function(response){
        alert(response.info);
        $('#Barang').html('');
        tampil();
        $('#EditDtBarang').fadeOut("slow");
        setTimeout(function(){
           $("[data-dismiss=modal]").trigger({ type: "click" });
        },2)
   }
         });
  }
    // ubah status user
    function UbhSttusUser(userid){
      // if ($('.aktivasi').text() == 'Active'){
      //     $('.aktivasi').css('background-color','red');
      //     $('.aktivasi').text('NonActive');
      // } else{
      //     $('.aktivasi').text('Active');
      //     $('.aktivasi').css('background-color','blue');
      // }
     $.ajax({
              url: "<?php echo base_url('index.php/UbahDStatus/')?>"+userid,
              type: "POST",
              dataType: "json",
                success: function(response){
                  alert(response.info);
                  $('#StatusKariyawan').html('');
                  aktifasi();
            }
            }); 
      
    }

    $('#regis').on('click', function(){
      counter = 0;
      validasiInput();
    })

    // function cek(){
    //     if (event.which == 13) {
    //     $.ajax({
    //       url : "<?php echo base_url('index.php/CekEmail') ?>",
    //       type : "POST",
    //       data: $('#UsrBru').serialize(),
    //       dataType: "JSON",
    //       success:function(response){
    //        }
    //      });
    //     }
         
    // }

    // validasi
     var counter;
      function validasiInput(response){
        $('#Email').on('keyup', function(){

        });
        col_wajib = document.getElementsByClassName('Diisi');
        var elm = "";
      for (var i = 0; i < col_wajib.length; i++){
          elm = col_wajib[i].id;
        $('#warning_'+elm).remove();
        if ($('#'+elm).val() == '') {
          $('#col_'+elm).append(
            '<span id="warning_'+elm+'" class="badge badge-danger" style="margin-left: 15px;">Kolom '+
            elm.replace('_',' ')+' Tidak boleh Kososng'+'</span>'
            );
          counter++;
        }
       
      }; 

         $.ajax({
            url : "<?php echo base_url('index.php/CekEmail') ?>",
            type : "POST",
            data: $('#UsrBru').serialize(),
            dataType: "JSON",
            success:function(response){
              if ($('.Diisi').val() !== '') {
                if ($('#RepeatPassword').val() == $('#Password').val()) {
                  if (!response) {
                    TmbhKariyawan();
                  } else {
                    $('#col_Email').append(
                      '<span id="warning_Email" class="badge badge-danger" style="margin-left: 15px;">Email Sudah Ada</span>'
                      );  
                  }
                } else {
                  $('#col_RepeatPassword').append(
                      '<span id="warning_RepeatPassword" class="badge badge-danger" style="margin-left: 15px;">Password Tidak Sama</span>'
                      );
                }              
              }

             }
         });



      // if ($('#RepeatPassword').val() !== $('#Password').val()) {
      //     $('#col_RepeatPassword').append(
      //       '<span id="warning_RepeatPassword" class="badge badge-danger" style="margin-left: 15px;">Password Tidak Sama</span>'
      //       );
      // } else if(response !== 0){
      //     alert('sudah ada');
      // } else if ($('.Diisi').val() !== ''){
      //    TmbhKariyawan();   
      //   } else {
      //     alert('Silahkan Isi Form Terlebih Dahulu');
      //   }

       
       
  }

  function TmbhKariyawan(){
            $.ajax({
              url : "<?php echo base_url('index.php/TambahUser') ?>",
              type : "POST",
              data: $('#UsrBru').serialize(),
              dataType: "JSON",
               success:function(response){
                alert(response.info);
                $('.Diisi').val('');
                $('#StatusKariyawan').html('');
                aktifasi();
               }
              }); 
  }


      $('.Diisi').on('keydown', function(){
        var elm = $(this).prop('id'); 
        $('#warning_'+elm).remove();
      });

  function buatLaporan(bulan, tahun){
    if ($('#tahun').val() == '') {
      alert('masukan tahun');
    }
    $.ajax({
            url: " <?php echo base_url('index.php/buatLaporan/') ?>"+bulan +'/'+tahun,
            type: "GET",
            dataType: "JSON",
            success: function(response, total){
              if (response.laporan == 0) {
                $('#Laporan').html('');
                $('#Laporan').append(
                    '<tr>'+
                      '<td></td>'+
                      '<td></td>'+
                      '<td></td>'+
                      '<td colspan="4"> Tidak Ada Transaksi Untuk Bulan dan Tahun Ini</td>'+
                    '</tr>'
                  );
              } else {
                $('#Laporan').html('');
              for (var i = 0; i <response.laporan.length; i++) {
                var blng = response.laporan[i].Subtotal; 
                var reverse = blng.toString().split('').reverse().join(''),
                  rbn  = reverse.match(/\d{1,3}/g);
                  rbn  = rbn.join('.').split('').reverse().join('');
                $('#Laporan').append(
                  '<tr>'+   
                    '<td>'+(i+1)+'</td>'+
                    '<td>'+response.laporan[i].Username+'</td>'+
                    '<td>'+response.laporan[i].TglTransaksi+'</td>'+
                    '<td>'+response.laporan[i].NamaBarang+' '+response.laporan[i].Merek+' '+response.laporan[i].Farian+'</td>'+
                    '<td>'+response.laporan[i].JumlahBeli+' '+response.laporan[i].Satuan+'</td>'+
                    '<td>'+response.laporan[i].Harga+'</td>'+
                    '<td>'+rbn+'</td>'+

                  '</tr>'
                  );
              }
              var bilangan = response.total.Subtotal; 
              var reverse = bilangan.toString().split('').reverse().join(''),
                  ribuan  = reverse.match(/\d{1,3}/g);
                  ribuan  = ribuan.join('.').split('').reverse().join('');
              $('#Laporan').append(
                '<tr>'+
                  '<td colspan="5"></td>'+
                  '<th>Total</th>'+
                  '<th>'+ribuan+'</th>'+
                '</tr>'
                )  
              }
                            
            }
          });
  }
  </script>