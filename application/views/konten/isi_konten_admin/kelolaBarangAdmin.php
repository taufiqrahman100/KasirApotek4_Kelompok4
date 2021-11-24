		<div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Kelola Barang</h1>
          </div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahDtBarang"><i class="fas fa-plus"></i> Tambah Barang</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#TambahStok"><i class="fas fa-plus"></i> Tambah Stok</button>

          <?php $this->load->view('konten/Modal')?>
          <div>
          	<table class="table table-striped mt-4">
					  <thead>
					    <tr>
					      <td scope="col">No</td>
					      <td scope="col">Nama Barang</td>
					      <td scope="col">Farian</td>
					      <td scope="col">Merek</td>
					      <td scope="col">Stock</td>
					      <td scope="col">Harga</td>
					      <td scope="col">Aksi</td> 
					    </tr>
					  </thead>
					  <tbody id="Barang">
					  </tbody>
				</table>
          </div>