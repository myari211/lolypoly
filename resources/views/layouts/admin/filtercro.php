
		<div class="card card-info card-outline">
			<div class="card-header">
				<h5>Filter</h5>
				<form id="formSearch">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_date">Date Place</label>
                                <input type="input" name="date" class="form-control" id="filter_date" placeholder="Tanggal" onkeydown="return false" oncut="return false" autocomplete="off">
                                <input type="hidden" name="filter_start_date" id="filter_start_date">
                                <input type="hidden" name="filter_end_date" id="filter_end_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_nama_usaha">Nama Usaha*</label>
                                <input type="text" class="form-control" id="filter_nama_usaha" name="filter_nama_usaha" placeholder="Enter nama_usaha" data-validation="required">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_status_category_id">Kategori Status</label>
                                <select class="form-control select2-default" name="filter_status_category_id" id="filter_status_category_id">
                                    <option value="">-- Pilih Kategori Status --</option>
                                    <?php foreach($data_status_category as $status_category): ?>
                                        <option value="<?php echo $status_category->id ?>"><?php echo $status_category->status_category_code?> (<?php echo $status_category->keterangan?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_gudang">Lokasi Gudang</label>
                                <select class="form-control select2-default" name="filter_gudang" id="filter_gudang">
                                    <option value="">-- Pilih Lokasi Gudang --</option>
                                    <?php foreach($data_lokasi_gudang as $lokasi_gudang): ?>
                                        <option value="<?php echo $lokasi_gudang->kabupaten_kota_id ?>"><?php echo $lokasi_gudang->kabupaten_kota_name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_category_bussines_id">Kategori</label>
                                <select class="form-control select2-default" name="filter_category_bussines_id" id="filter_category_bussines_id" data-validation="required">
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach($data_category_bussines as $category_bussines): ?>
                                        <option value="<?php echo $category_bussines->id ?>"><?php echo $category_bussines->title?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_jenis_kemasan">Jenis Kemasan</label>
                                <select class="form-control select2-default" name="filter_jenis_kemasan" id="filter_jenis_kemasan" data-validation="required">
                                    <option value="">-- Pilih Jenis Kemasan --</option>
                                    <?php foreach($data_jenis_kemasan as $jenis_kemasan): ?>
                                        <option value="<?php echo $jenis_kemasan->id ?>"><?php echo $jenis_kemasan->title?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right" >Filter</button>
                    <button type="button" class="btn btn-danger float-right" id="reset-filter" data-form="formSearch" style="margin-right:15px">Reset</button>
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                        </div>
                    </div>
				</form>
			</div>
		</div>