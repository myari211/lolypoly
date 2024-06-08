			<div class="modal-body" style="max-height: 650px;">
				<input type="hidden" name="id" id="id" value="">
				<div class="row">
					<div class="col-md-4">

						<div class="form-group">
							<label for="category_bussines_id">Kategori*</label>
							<select class="form-control select2" name="category_bussines_id" id="category_bussines_id" data-validation="required">
								<option value="">-- Pilih Kategori --</option>
								<?php foreach($data_category_bussines as $category_bussines): ?>
									<option value="<?php echo $category_bussines->id ?>"><?php echo $category_bussines->title?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="nama_usaha">Nama Usaha*</label>
							<input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Enter nama_usaha" data-validation="required">
						</div>

						<div class="form-group">
							<label for="nama_pj">Nama PJ*</label>
							<input type="text" class="form-control" id="nama_pj" name="nama_pj" placeholder="Enter nama_pj" data-validation="required">
						</div>

						<div class="form-group">
							<label for="jabatan_pj">Jabatan*</label>
							<input type="text" class="form-control" id="jabatan_pj" name="jabatan_pj" placeholder="Enter jabatan_pj" data-validation="required">
						</div>

						<div class="form-group">
							<label for="phone_number">No Tlp*</label>
							<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone_number" data-validation="required">
						</div>

						<div class="form-group">
							<label for="alamat">Alamat*</label>
							<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter alamat" data-validation="required">
						</div>

					</div>
					<div class="col-md-4">

						<div class="form-group">
							<label for="gudang">Gudang*</label>
							<select class="form-control select2" name="gudang" id="gudang" data-validation="required">
								<option value="">-- Pilih Kategori --</option>
								<?php foreach($data_lokasi_gudang as $lokasi_gudang): ?>
									<option value="<?php echo $lokasi_gudang->kabupaten_kota_id ?>"><?php echo $lokasi_gudang->kabupaten_kota_name?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="quantity_l">Quantity L*</label>
							<input type="number" class="form-control" id="quantity_l" name="quantity_l" placeholder="Enter quantity_l" data-validation="required" >
						</div>
			
						<div class="form-group">
							<label for="quantity_kg">Quantity Kg*</label>
							<input type="number" step="0.01" class="form-control" id="quantity_kg" name="quantity_kg" placeholder="Enter quantity_kg" data-validation="required" >
						</div>

						<div class="form-group">
							<label for="harga_satuan">Harga Satuan*</label>
							<input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Enter harga_satuan" data-validation="required" >
						</div>

						<div class="form-group">
							<label for="jenis_kemasan">Jenis Kemasan*</label>
							<select class="form-control select2" name="jenis_kemasan" id="jenis_kemasan" data-validation="required">
								<option value="">-- Pilih Jenis Kemasan --</option>
								<?php foreach($data_jenis_kemasan as $jenis_kemasan): ?>
									<option value="<?php echo $jenis_kemasan->id ?>"><?php echo $jenis_kemasan->title?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="total_kemasan">Total Kemasan*</label>
							<input type="number" class="form-control" id="total_kemasan" name="total_kemasan" placeholder="Enter total_kemasan" data-validation="required" >
						</div>

					</div>
					<div class="col-md-4">

						<div class="form-group">
							<label for="status_category_id">Kategori Status*</label>
							<select class="form-control select2" name="status_category_id" id="status_category_id" data-validation="required">
								<option value="">-- Pilih Kategori Status --</option>
								<?php foreach($data_status_category as $status_category): ?>
									<option value="<?php echo $status_category->id ?>"><?php echo $status_category->status_category_code?> (<?php echo $status_category->keterangan?>)</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="keterangan">Keterangan Detail*</label>
							<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Enter keterangan" data-validation="required" cols="30" rows="10"></textarea>
						</div>

					</div>
				</div>
			</div>