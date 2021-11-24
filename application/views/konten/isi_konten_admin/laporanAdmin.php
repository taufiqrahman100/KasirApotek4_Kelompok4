			<form class="form-inline">
			  <div class="form-group mx-sm-3 mb-2">
			    <select class="form-control" id="bulan">
			      <option value ="1">Januari</option>
			      <option value ="2">Februari</option>
			      <option value ="3">Maret</option>
			      <option value ="4">April</option>
			      <option value ="5">Mei</option>
			      <option value ="6">Juni</option>
			      <option value ="7">Juli</option>
			      <option value ="8">Agustus</option>
			      <option value ="9">September</option>
			      <option value ="10">Oktober</option>
			      <option value ="11">November</option>
			      <option value ="12">Desember</option>
			    </select>
			  </div>
			  <div class="form-group mx-sm-3 mb-2">
			    <input type="text" class="form-control" id="tahun" placeholder="Masukan Tahun">
			  </div>
			  <button type="button" class="btn btn-primary mb-2" onclick="buatLaporan($('#bulan').val(), $('#tahun').val())">Tampilkan Laporan</button>
			</form>

			<table class="table table-striped mt-4">
					  <thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Kasir</th>
					      <th scope="col">Tgl Transaksi</th>
					      <th scope="col">Nama Barang</th>
					      <th scope="col">Jml Beli</th>
					      <th scope="col">Harga</th>
					      <th scope="col">Sub Total</th>
					    </tr>
					  </thead>
					  <tbody id="Laporan">
					  </tbody>
				</table>

			<!-- <div id="Laporan">

          	<div class="LpranBg" style="height: 41px; border-radius: 6px;"><h3 style="margin-left: 20px; padding-top: 6px;">Juni 2019</h3></div>  
			  <div class="container">
			    <table class="table">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Tgl Transaksi</th>
				      <th scope="col">Nama Barang</th>
				      <th scope="col">Jml Beli</th>
				      <th scope="col">Harga</th>
				      <th scope="col">Sub Total</th>
				    </tr>
				  </thead>
				  <tbody>
            <tr>
              <td>1</td>
              <td>2019-06-29</td>
              <td>Semen</td>
              <td>1 Sak</td>
              <td>55000</td>
              <td>55000</td>
            </tr>
            <tr>
              <td colspan="5">Total</td>
              <td>55000</td>
            </tr>
				  </tbody>
				</table>
			  </div>
			
			</div> -->