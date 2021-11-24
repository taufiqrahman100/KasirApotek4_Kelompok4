<!-- Modal -->
<div class="modal fade" id="uploadModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document" style="width: 445px;">
    <div class="modal-content" style="padding: 10px 20px;">
      <div class="modal-header">
        <center><strong><h5 class="modal-title">CROP & UPLOAD GAMBAR</h5></strong></center>
      </div>
      <div class="modal-body">
        <div id="gambar_upload"></div>
      </div>
      <div class="modal-footer">
        <center>
          <button type="button" id="Upload" class="btn btn-success m-right crop_image"><strong><i class="fa fa-upload"></i></strong>UPLOAD</button>
          <button type="button" id="ClosUpld" class="btn btn-danger">Close</button>
        </center>
      </div>
  
    </div>
  </div>
</div>
<!-- End of Modal -->


<!-- Modal tambah Barang -->
			<div class="modal" id="TambahDtBarang" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content" style="width: 470px; margin-top: -25px;">
			      <div class="modal-header">
			        <h5 class="modal-title">Tambah Barang</h5>
			      </div>
			      <div class="modal-body">
			        <form id="TmbBarang">
					  <div class="form-group">
					    <label for="NamaBarang">Nama Barang</label>
					    <input type="text" class="form-control" name="NamaBarang" id="NamaBarang">
					  </div>
					  <div class="form-group">
					    <label for="Merek">Merek</label>
					    <select class="form-control" id="Merek" name="Merek">
					    	<option></option>
					    </select>
					    <span id="spn" class="badge badge-primary"><button type="button" id="tampilMrk" class="bg-primary" style="color: white; text-decoration: none; border: 0;">Merek Lain</button></span>
					    <span id="infoMrk" class="badge badge-primary"></span>

					  </div>

					  	<div id="merkBaru" class="form-inline">
						
						    <input type="text" class=" col-md-11 form-control" id="MerkNew" name="MerkNew" style="border-color: blue;" placeholder="Masukan Merek Baru">
						    <button type="button" class="col-md-1 btn btn-primary" onclick="TmbhMerek()"><i class="fas fa-plus"></i></button>
					 	 </div> 
					  
					  <div class="form-group">
					    <label for="Farian">Farian</label>
					    <select class="form-control" id="Farian" name="Farian">
					    	<option></option>
					    </select>
					    <span id="spnF" class="badge badge-primary"><button type="button" id="tampilFrn" class="bg-primary" style="color: white; text-decoration: none; border: 0;">Farian Lain</button></span>
					    <span id="infoFrin" class="badge badge-primary"></span>
					  </div>

					  	<div id="FrnBaru" class="form-inline">
						
						    <input type="text" class=" col-md-11 form-control" id="FarnNew" name="FarnNew" style="border-color: blue;" placeholder="Masukan Farian Baru">
						    <button type="button" class="col-md-1 btn btn-primary" onclick="TmbhFarian()"><i class="fas fa-plus"></i></button>
					 	 </div>

					  <div class="form-group">
					    <label for="Jumlah">Jumlah Barang</label>
					    <input type="text" class="form-control" id="Jumlah" name="Jumlah" >
					  </div>
					  <div class="form-group">
					    <label for="Satuan">Satuan</label>
					    <select class="form-control" id="Satuan" name="Satuan">
					    	<option></option>
					    
					    </select>
					    
					    <span id="spnS" class="badge badge-primary"><button type="button" id="tampilSat" class="bg-primary" style="color: white; text-decoration: none; border: 0;">Satuan Lain</button></span>
					    <span id="infoStatus" class="badge badge-primary"></span>
					  </div>

					  	<div id="StnBaru" class="form-inline">
						
						    <input type="text" class=" col-md-11 form-control" id="StnNew" name="StnNew" style="border-color: blue;" placeholder="Masukan Satuan Baru">
						    <button type="button" class="col-md-1 btn btn-primary" onclick="TmbhSatuan()"><i class="fas fa-plus"></i></button>
					 	 </div>

					  <div class="form-group">
					    <label for="Harga">Harga Barang</label>
					    <input type="text" class="form-control" id="Harga" placeholder="exp: 10000" name="Harga">
					  </div>
					  <div class="form-group">
					    <label for="Gambar">Gambar Barang</label>
					    <input type="file" class="form-control-file" id="Gambar" name="Gambar">
					  </div>
					  <div class="panel-footer" id="sec-gambar" style="display: none;">
		                <center>
		                  <img id="gambar_buku" src="" class="img-thumbnail" style="background-color: transparent; width: 38%;">
		                </center>
		                <center>
		                	<input type="text" id="nama_gambar" name="nama_gambar" style="border: none;">	
		                </center>
		                
		              </div>
					</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" onclick="SimpanDtBarang()">Tambah</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			</div>

			<!-- Tambah Merek -->
			<div class="modal" tabindex="-1" role="dialog" id="tmrk">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Modal title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p>Modal body text goes here.</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>


<!-- Modal edit Barang -->
			<div class="modal" id="EditDtBarang" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Edit Barang</h5>
			      </div>
			      <div class="modal-body">
			        <form id="EdtBarang" style="margin-top: -25px;">
			        <div class="form-group">
				      <input type="text" id="Sembunyi" class="form-control" placeholder="Disabled input" name="Sembunyi" style="display: none;">
				    </div>
					  <div class="form-group">
					    <label for="EdNamaBarang">Nama Barang</label>
					    <input type="text" class="form-control" name="EdNamaBarang" id="EdNamaBarang">
					  </div>
					  <div class="form-group">
					    <label for="EdMerek">Merek</label>
					    <select class="form-control" id="EdMerek" name="EdMerek">
					    	<option></option>
					    </select>
					    
					  </div>
					  <div class="form-group">
					    <label for="EdFarian">Farian</label>
					    <select class="form-control" id="EdFarian" name="EdFarian">
					    	<option></option>
					    </select>
					    
					  </div>
					  <div class="form-group">
					    <label for="EdJumlah">Jumlah Barang</label>
					    <input type="text" class="form-control" id="EdJumlah" name="EdJumlah" >
					  </div>
					  <div class="form-group">
					    <label for="EdSatuan">Satuan</label>
					    <select class="form-control" id="EdSatuan" name="EdSatuan">
					    	<option></option>
					    </select>
					    
					  </div>
					  <div class="form-group">
					    <label for="EdHarga">Harga Barang</label>
					    <input type="text" class="form-control" id="EdHarga" placeholder="exp: 10000" name="EdHarga">
					  </div>
					  
					</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" onclick="EdietBarang()">Edit</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

	<!-- Tmbah Stok -->
			<div class="modal" id="TambahStok" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Tambah Stok</h5>
			      </div>
			      <div class="modal-body">
			        <form id="TmbhStok">
					  <div class="form-group">
					    <label for="NamaBrg">Nama Barang</label>
					    <select class="form-control" id="NamaBrg" name="NamaBrg">
					    </select>
					  </div>
					  <div class="form-group">
					    <label id="stk">Stok :</label>
					  </div>
					  <div class="form-group">
					    <label for="StokBru">Tambah Stok</label>
					    <input type="text" class="form-control" id="StokBru" placeholder="Masukan Tambahan Stok" name="StokBru">
					  </div>
					</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" id="TmStok">Tambah</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>