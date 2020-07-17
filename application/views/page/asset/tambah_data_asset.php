<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Form Penambah Data Asset
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<?php 
		$status = $this->session->flashdata('status');
		if($status=="success"){ ?>
			<div class="alert alert-success alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> Data berhasil di simpan.
			</div>
		<?php } if($status=="successupdate"){ ?>
			<div class="alert alert-success alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> Data berhasil di update.
			</div>
		<?php } if($status=="error"){ ?>
			<div class="alert alert-danger alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error!</strong> Data gagal di simpan.
			</div>
		<?php } ?>
		
		<div class="tabbable">
			<ul class="nav nav-tabs" id="myTab">
				<li class="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo 'active'; else if (!isset($dtAsset)) {echo "active";} ?>">
					<a data-toggle="tab" href="#home">
						<i class="green icon-home bigger-110"></i>
						<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo 'Edit Asset Perusahaan'; else {echo "Tambah Asset Perusahaan";} ?>
					</a>
				</li>

				<li class="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo 'active' ?>">
					<a data-toggle="tab" href="#profile">
						<i class="orange icon-calendar bigger-110"></i>
						<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo 'Edit Sewa Asset '; else {echo "Tambah Sewa Asset";} ?>
					</a>
				</li> 
			</ul>

			<div class="tab-content">
				<div id="home" class="tab-pane <?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo 'in active'; else if (!isset($dtAsset)) {echo "in active";} ?> ?>">
					<form id="form-tbh-asset" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_tambah_asset" method="post" enctype="multipart/form-data">
					<div class="row-fluid">
						<div class="span6">
							
							<div class="control-group">								
								<label class="control-label span3" for="tglPembelian">Tgl Pembelian</label>
								<div class="controls span8"> 
									<div class="row-fluid input-append">
										<input class="span4 <?php if(isset($dtAsset)) echo "date-picker2"; else echo "date-picker"  ?>" value="<?php if (isset($dtAsset)) echo $dtAsset->tgl_pembelian; ?>" id="tglPembelian" type="text" data-date-format="dd-mm-yyyy" name="tglPembelian" />
										<input type="hidden" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->id_asset; ?>"  name="st" id="st">
										<input type="hidden" value="<?php if (isset($dtAsset)) echo $dtAsset->kepemilikan_asset; ?>"  name="kepemilikan" id="kepemilikan">
										<span class="add-on">
											<i class="icon-calendar"></i>
										</span>
									</div> 
								</div>
							</div>

							<div class="control-group">
								<label class="control-label span3" for="jnsAset">Jenis Aset</label>

								<div class="controls span5">
									<span class="span12">
									<select id="jnsAsset" name="jnsAsset" class="chzn-select" data-placeholder="Pilih jenis asset">
										<option value=""></option>
										<?php foreach($jnsAsset as $val): ?>
											<option value="<?= $val->kode_jenisasset; ?>"><?= $val->nama_jenisasset; ?></option>											
										<?php endforeach; ?>
									</select>  
									</span>
								</div>					
							</div>
							
							<div class="control-group">
								<label class="control-label span3" for="kategoriAsset">Kategori Asset</label>

								<div class="controls span5">
									<span class="span12">
									<select id="kategoriAsset" name="kategoriAsset" class="chzn-select" data-placeholder="Pilih kategori asset" disabled="disabled">  
									</select>  
									</span>
								</div>				
							</div>

							<div class="control-group">
								<label class="control-label span3" for="merk">Merk</label>
								<div class="controls span9"> 
									<input id="merk" class="form-control span10" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->merk_asset; ?>" type="text" name="merk" />  
								</div>				
							</div> 
														
							<div class="control-group">
								<label class="control-label span3" for="spesifikasi">Spesifikasi</label>

								<div class="controls span9">
									<div class="span12">
										<textarea id="spesifikasi" name="spesifikasi" class="span10" style="resize:none;" rows="3"><?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->spesifikasi; ?></textarea> 
									</div>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label span3" for="jumlah">Jumlah</label>

								<div class="controls span2">
									<input id="jumlah" class="span12 number" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->jumlah; ?>" type="text" name="jumlah" /> 
								</div>
							</div>
							
							<div class="control-group">
								<div class="col-md-6">
									<label class="control-label span3" for="hargaPembelian">Harga Pembelian</label>

									<div class="controls span3">
										<input class="span12 price" type="text" id="hargaPembelian" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->harga; ?>" name="hargaPembelian" /> 
									</div>
								</div>
								<div class="col-md-6 align-left">
									<label class="control-label span2" for="inventaris">Tipe Asset</label>
									<div class="controls span1">
										<select name="inventaris" id="inventaris">
											<option value="">-</option>
											<option value="Inventaris" <?php if (isset($dtAsset) && $dtAsset->harga<=10000000 && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo "selected" ?>>Inventaris</option>
											<option value="Asset" <?php if (isset($dtAsset) && $dtAsset->harga>10000000 && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo "selected" ?>>Asset</option>
										</select>									
									</div>
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label span3" for="namaBrg">Nama Barang</label>

								<div class="controls span5">
									<select id="namaBrg" name="namaBrg" class="chzn-select" disabled="disabled"> 
									</select>  
								</div>			
							</div> 
							<div class="control-group">																
								<label class="control-label span3" for="divisi">Divisi</label>
								<div class="controls span2">
									<select id="divisi" name="divisi" class="chzn-select" data-placeholder="Pilih Divisi">
										<option value=""></option>
										<?php foreach($divisi as $val): ?>
											<option value="<?= $val->kode_struktur; ?>"><?= $val->unit_kerja; ?></option>											
										<?php endforeach; ?>
									</select>  
								</div>														
							</div> 
							<div class="control-group">															
								<label class="control-label span3" for="hargaPembelian">Nama Karyawan</label>
								<div class="controls span2">
									<select id="namakaryawan" name="nama_karyawan" class="chzn-select" data-placeholder="pilih karyawan" disabled>
										<option value=""></option>										
									</select>
								</div>							
							</div>
						</div>
						<div class="span6"> 
							
							<div class="control-group">								
								<label class="control-label span3" for="tglGaransi">Tgl Garansi</label> 
								<div class="controls span3"> 
									<div class="row-fluid input-append span12">
										<input class="span12 <?php if(isset($dtAsset)) echo "date-picker2"; else echo "date-picker"  ?>" id="awalGaransi" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->awal_garansi; ?>" type="text" data-date-format="dd-mm-yyyy" name="awalGaransi" />
										<span class="add-on">
											<i class="icon-calendar"></i>
										</span>
									</div>
								</div>
								
								<label class="control-label span2">Sampai</label>
								<div class="controls span3"> 
									<div class="row-fluid input-append span12">
										<input class="span12 <?php if(isset($dtAsset)) echo "date-picker2"; else echo "date-picker"  ?>" id="akhirGaransi" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->akhir_garansi; ?>" type="text" data-date-format="dd-mm-yyyy" name="akhirGaransi" />
										<span class="add-on">
											<i class="icon-calendar"></i>
										</span>
									</div> 
								</div> 
							</div>
							<div class="control-group">
								<label class="control-label span3 for="vendor">Vendor</label>

								<div class="controls span7">
									<label>
										<input type="radio" name="jnsVendor" class="jnsVendor" value="perusahaan" checked>
										<span class="lbl"> Perusahaan</span> 
										<input type="radio" name="jnsVendor" class="jnsVendor" value="perorangan" <?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="perorangan" && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo "checked"; ?>>
										<span class="lbl"> Perorangan</span>
									</label> 
									 
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label span3" for="kodeVendor"></label> 
								<div class="controls span7">
									<select id="kodeVendor" name="kodeVendor" class="chzn-select" > 
									<?php foreach($dtVendor as $val):?>
										<option value="<?= $val->kode_vendor; ?>"><?= $val->nama_vendor; ?></option>
									<?php endforeach; ?>
									</select>  
								</div>				
							</div>
							<div class="control-group">
								<label class="control-label span3" for="objekAsset">Objek Asset</label>
								<div class="controls span8">
									<div class="span12"> 
										<input type="file" id="objekAsset" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->img_objek; ?>" class="input-file file-image" name="objekAsset" accept="image/*" capture="camera"/>
									</div>
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label span4" for="kelengAsset">Kelengkapan Asset</label>
								<div class="controls span7">
									<div class="span12"> 
										<input type="file" id="kelengAsset" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->img_kelengkapan; ?>" class="input-file file-image" name="kelengAsset" accept="image/*" capture="camera" />
									</div>
								</div>
							</div> 
							
							<div class="control-group">
								<label class="control-label span3" for="keterangan">Kelengkapan</label>

								<div class="controls span8" >
									<textarea id="kelengkapan" name="kelengkapan" class="span12" style="resize:none;" rows="3"><?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->kelengkapan; ?></textarea> 
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label span3" for="keterangan">Keterangan</label>

								<div class="controls span8">
									<textarea id="keterangan" name="keterangan" class="span12" style="resize:none;" rows="3"><?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN") echo $dtAsset->keterangan; ?></textarea> 
								</div>
							</div> 
						</div>
					</div>
					<div class="hr"></div>
					<div class="form-actions">
						
						<button class="btn btn-danger btn-small pull-right" type="reset" style="margin-left:10px;">
							<i class="icon-undo bigger-110"></i>
							Batal
						</button>
						
						<button id="btn-save-asset" class="btn btn-info btn-small pull-right" name="btnSave" type="submit">
							<i class="icon-save bigger-110"></i>
							Simpan
						</button>  
						<button id="btn-update-asset" class="btn btn-info hide btn-small pull-right" name="btnupdate" type="submit">
							<i class="icon-save bigger-110"></i>
							Update
						</button>  
					</div>
					</form>
				</div>

				<div id="profile" class="tab-pane <?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo 'in active'; ?>">
					<form id="form-penyewaan-asset" class="form-horizontal" action="<?php echo base_url(); ?>Asset/penyewaan_asset_langsung" method="post" enctype="multipart/form-data">
					<div class="row-fluid">
						<div class="span6"> 
							<div class="control-group">
								<label class="control-label span3" for="jnsAssetSw">Jenis Asset</label>

								<div class="controls span5"> 
									<select id="jnsAssetSw" name="jnsAsset" class="chzn-select chzn-tab2" data-placeholder="Pilih jenis asset">
										<option value=""></option>
										<?php foreach($jnsAsset as $val): ?>
											<option value="<?= $val->kode_jenisasset; ?>"><?= $val->nama_jenisasset; ?></option>
										<?php endforeach; ?>
									</select>   
									<input type="hidden" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->id_asset; ?>"  name="st" id="st">
								</div>				
							</div>
							
							<div class="control-group">
								<label class="control-label span3" for="kategoriAssetSw">Kategori Asset</label>

								<div class="controls span5">
									<span class="span12">
									<select id="kategoriAssetSw" name="kodeKategori" class="chzn-select chzn-tab2" data-placeholder="Pilih kategori asset" disabled="disabled">  
									</select>  
									</span>
								</div>				
							</div>
							
							<div class="control-group">
								<label class="control-label span3" for="namaBrgSw">Nama Barang</label>

								<div class="controls span5">
									<select id="namaBrgSw" name="namaBrg" class="chzn-select chzn-tab2" disabled> 
									</select>  
								</div>				
							</div>
							
							<div class="control-group">
								<label class="control-label span3" for="spesifikasi">Spesifikasi</label>

								<div class="controls span9">
									<div class="span12">
										<textarea id="spesifikasi" name="spesifikasi" class="span10" style="resize:none;" rows="3"><?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->spesifikasi; ?></textarea> 
									</div>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label span3" for="jumlah">Jumlah</label>

								<div class="controls span2">
									<input class="span12 number" type="text" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->jumlah; ?>" name="jumlah" /> 
								</div>
							</div>
							<div class="control-group">
								<label class="control-label span3" for="lamaSewa">Lama Sewa</label>

								<div class="controls span2">
									<input id="lamaSewa" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->lama_sewa; ?>" class="span12 number" type="text" name="lamaSewa" /> 
								</div>
								<div class="controls span4">
									<select id="jnsSewa" class="span12" name="jnsSewa">
										<option value="BULANAN" <?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN" && $dtAsset->jenis_sewa =="BULANAN") echo "selected"; ?>>BULAN</option>
										<option value="TAHUNAN" <?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN" && $dtAsset->jenis_sewa =="TAHUNAN") echo "selected"; ?>>TAHUN</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label span3" for="hargaBulanan">Harga Bulanan</label>

								<div class="controls span3">
									<input id="hargaBulanan" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->harga_bulanan; ?>" class="span12 price" type="text" name="hargaBulanan" /> 
								</div>
								
								<label class="control-label span3" for="hargaTahunan">Harga Tahunan</label>

								<div class="controls span3">
									<input id="hargaTahunan" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->harga_tahunan; ?>" class="span12 price" type="text" name="hargaTahunan" /> 
								</div>
							</div> 
							 
							<div class="control-group">								
								<label class="control-label span3" for="tglGaransi">Mulai Sewa</label> 
								<div class="controls span3"> 
									<div class="row-fluid input-append span12">
										<input class="span10 <?php if(isset($dtAsset)) echo "date-picker2"; else echo "date-picker"  ?>" id="mulaiSewa" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->mulai_sewa; ?>" type="text" data-date-format="dd-mm-yyyy" name="mulaiSewa" />
										<span class="add-on">
											<i class="icon-calendar"></i>
										</span>
									</div>
								</div>
								
								<label class="control-label span3">Akhir Sewa</label>
								<div class="controls span3"> 
									<div class="row-fluid input-append span12">
										<input class="span10 <?php if(isset($dtAsset)) echo "date-picker2"; else echo "date-picker"  ?>" id="akhirSewa" value="<?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->akhir_sewa; ?>" type="text" data-date-format="dd-mm-yyyy" name="akhirSewa" />
										<span class="add-on">
											<i class="icon-calendar"></i>
										</span>
									</div> 
								</div>
							</div>
							<div class="control-group">
								<label class="control-label span3" for="divisisw">divisi</label>

								<div class="controls span5">
									<select id="divisisw" name="divisisw" class="chzn-select chzn-tab2" data-placeholder="Pilih Divisi"> 
										<option value=""></option>
										<?php foreach($divisi as $val): ?>
											<option value="<?= $val->kode_struktur; ?>"><?= $val->unit_kerja; ?></option>											
										<?php endforeach; ?>
									</select>  
								</div>				
							</div>
							<div class="control-group">
								<label class="control-label span3" for="nama_karyawansw">Nama Karyawan</label>

								<div class="controls span5">
									<select id="nama_karyawansw" name="nama_karyawansw" class="chzn-select chzn-tab2" data-placeholder="Pilih Karyawan" disabled> 
										<option value="-"></option>
									</select>  
								</div>				
							</div>
							
						</div>
						<div class="span6"> 
							
							<div class="control-group">
								<label class="control-label span3" for="vendor">Vendor</label>

								<div class="controls span7">
									<label>
										<input type="radio" name="jnsVendorSw" class="jnsVendorSw" value="perusahaan" <?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset!="PENYEWAAN" && $dtAsset->kepemilikan_asset=="") echo $dtAsset->id_asset; ?>	>
										<span class="lbl"> Perusahaan</span> 
										<input type="radio" name="jnsVendorSw" class="jnsVendorSw" value="perorangan">
										<span class="lbl"> Perorangan</span>
									</label> 
									 
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label span3" for="kodeVendorSw"></label> 
								<div class="controls span7">
									<select id="kodeVendorSw" name="kodeVendor" class="chzn-select chzn-tab2"> 
									<?php foreach($dtVendor as $val):?>
										<option value="<?= $val->kode_vendor; ?>"><?= $val->nama_vendor; ?></option>
									<?php endforeach; ?>
									</select>  
								</div>				
							</div>
							<div class="control-group">
								<label class="control-label span3" for="objekAsset">Objek Asset</label>
								<div class="controls span8">
									<div class="span12"> 
										<input type="file" id="objekAsset" class="input-file file-image" name="objekAsset" accept="image/*" capture="camera" />
									</div>
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label span4" for="kelengAsset">Kelengkapan Asset</label>
								<div class="controls span7">
									<div class="span12"> 
										<input type="file" id="kelengAsset" class="input-file file-image" name="kelengAsset" accept="image/*" capture="camera" />
									</div>
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label span3" for="buktiAsset">Upload Bukti</label>
								<div class="controls span8">
									<div class="span12"> 
										<input type="file" id="buktiAsset" class="input-file file-image" name="buktiAsset" accept="image/*" capture="camera" />
									</div>
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label span3" for="keterangan">Kelengkapan</label>

								<div class="controls span8">
									<textarea id="kelengkapan" name="kelengkapan" class="span12" style="resize:none;" rows="3"><?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->kelengkapan; ?></textarea> 
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label span3" for="keterangan">Keterangan</label>

								<div class="controls span8">
									<textarea name="keterangan" class="span12" style="resize:none;" rows="3"><?php if (isset($dtAsset) && $dtAsset->kepemilikan_asset=="PENYEWAAN") echo $dtAsset->keterangan; ?></textarea> 
								</div>
							</div> 
						</div>
					</div>
					<div class="hr"></div>
					<div class="form-actions">
						
						<button class="btn btn-danger btn-small pull-right" type="reset" style="margin-left:10px;">
							<i class="icon-undo bigger-110"></i>
							Batal
						</button>
						
						<button id="btn-save-penyewaan" class="btn btn-info btn-small pull-right" name="btnSave" type="submit">
							<i class="icon-save bigger-110"></i>
							Simpan
						</button>  
						<button id="btn-update-sewa" class="btn btn-info btn-small pull-right hide" name="btnSave" type="submit">
							<i class="icon-save bigger-110"></i>
							update
						</button>  
					</div>
					</form>
				</div>

				
			</div>
		</div>
		<!--PAGE CONTENT BEGINS-->  
	</div>
</div>

<!--<div class="modal fade" id="edit_jam_masuk" role="dialog"  >
	<div class="modal-dialog" style="width:300px;"> -->

	<!--start modal view-->

<style>

@media (min-width: 1200px) {
	.modal-xs{ 	 
		width: 560px; margin-left: -280px;		
	} 
}
     
/* Portrait tablet to landscape and desktop */
@media (min-width: 768px) and (max-width: 979px) {
	.modal-xs{ 	 
		width: 560px; margin-left: -280px;		
	} 
}

/* Landscape phone to portrait tablet */
@media (max-width: 767px) { 
	 
}
     
/* Landscape phones and down */
@media (max-width: 480px) { 
	 
}
.chosen-container { width: 100% !important; } 
</style>  

<div class="modal hide fade modal-xs" id="modalLoading" data-backdrop="static">
	<div class="row-fluid">
		<div class="span12">
			<div class="progress progress-info progress-striped active">
				<div class="bar" style="width: 100%">Loading</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () { 	
		if ($('#kepemilikan').val()=="PENYEWAAN"){				
			$('#kodeVendorSw option').filter(function() {							
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->kode_vendor; ?>'; 
			}).prop('selected', true);

			$('#divisisw option').filter(function() {
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->divisi; ?>'; 
			}).prop('selected', true);
			$('#divisisw').change();			

			$('#jnsAssetSw').change();
			$('#jnsAssetSw').trigger('liszt:updated');
			$('#jnsAssetSw option').filter(function() {																		
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->kode_jenisasset; ?>'; 
			}).prop('selected', true);
			$('#jnsAssetSw').change();
			// $('#kategoriAssetSw').trigger('liszt:updated');			
					
			$('#btn-save-penyewaan').hide()
			$('#btn-update-sewa').show()
		}
		else if ($('#st').val()!=""){					
			$('#kodeVendor option').filter(function() {
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->kode_vendor; ?>'; 
			}).prop('selected', true);			

			$('#jnsAsset option').filter(function() {				
				return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->kode_jenisasset; ?>'; 
			}).prop('selected', true);
			$('#jnsAsset').change();

			$('#divisi option').filter(function() {				
				return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->divisi; ?>'; 
			}).prop('selected', true);
			$('#divisi').change();
			$('#kategoriAsset').trigger('liszt:updated');								
			$('#btn-save-asset').hide()
			$('#btn-update-asset').show()
		}
		
		$('.chzn-tab2').chosen({ width: "100%" }); 
		$('.file-image').on('change', function(){
			$(this).closest('form').validate().element($(this));
		});  

		// $('#btn-update-asset').click(function(){
		// 	var tglPembelian = $('#tglPembelian').val();
		// 	var  st= $('#st').val();
		// 	var jnsAsset = $('#jnsAsset').val();
		// 	var kategoriAsset = $('#kategoriAssemt').val();
		// 	var  merk= $('#merk').val();
		// 	var  spesifikasi= $('#spesifikasi').val();
		// 	var  jumlah= $('#jumlah').val();
		// 	var  hargaPembelian= $('#hargaPembelian').val();
		// 	var  inventaris= $('#inventaris').val();
		// 	var  namaBrg= $('#namaBrg').val();
		// 	var  divisi= $('#divisi').val();
		// 	var  namakaryawan= $('#namakaryawan').val();
		// 	var  awalGaransi= $('#awalGaransi').val();
		// 	var  akhirGaransi= $('#akhirGaransi').val();
		// 	var  jnsVendor= $('#jnsVendor').val();
		// 	var  kodeVendor= $('#kodeVendor').val();			
		// 	var  kelengkapan= $('#kelengkapan').val();
		// 	var  keterangan= $('#keterangan').val();			
			
		// 	$.ajax({
		// 	url: '<?php echo base_url(); ?>Asset/update_asset',
		// 	data: {'tglPembelian':tglPembelian,'st':st, 'jnsAsset':jnsAsset, 'kategoriAsset':kategoriAsset, 'merk':merk, 'spesifikasi':spesifikasi, 'jumlah':jumlah
		// 	,'hargaPembelian':hargaPembelian, 'inventaris':inventaris, 'namaBrg':namaBrg, 'divisi':divisi,'namakaryawan':namakaryawan,
		// 	'awalGaransi':awalGaransi, 'akhirGaransi':akhirGaransi, 'jnsVendor':jnsVendor, 'kodeVendor':kodeVendor, 'kelengkapan':kelengkapan, 'keterangan':keterangan}, 
		// 	type: 'post',
		// 	dataType:'json',
		// 	success: function(data){	
		// 			$('#modalLoading').modal('hide');
		// 			if(data['msg']>0){ 																
		// 			} 
		// 			else {						
		// 			}
		// 		}		
		// 	})
		// });

		$('#hargaPembelian').keyup(function(){			
			var harga = $(this).val().replace(",","");				
			if(harga<=10000000){
				$('#inventaris option').filter(function() {
					return this.text == "Inventaris"; 
				}).prop('selected', true);	
			} else {
				$('#inventaris option').filter(function() {
					return this.text == "Asset"; 
				}).prop('selected', true);	
			}
		}); 	
		
		$('#jnsAsset').change(function(){
			var jnsAsset = $(this).val();  
			var option = '<option value=""></option>'; 			
			$('#namaBrg').empty();
			$('#namaBrg').attr('disabled',true); 
			$('#namaBrg').trigger('liszt:updated');
			var select = $("#jnsAsset option:selected").text();
			$('#kategoriAsset').empty();
			$('#kategoriAsset').prop('disabled',false); 		
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/kategori_byjnsasset',
			data: {'jnsAsset':jnsAsset}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
				$.each(data, function(key,value) {  
					if (value.kode_kategori != '<?php if(isset($dtAsset)) {echo $dtAsset->kode_kategori;} else {echo "x";} ?>'){
				  		option+='<option value="'+value.kode_kategori+'">'+value.nama_kategori+'</option>';						
					} else {
						option+='<option value="'+value.kode_kategori+'" selected>'+value.nama_kategori+'</option>';
					}
				});   						
				$('#kategoriAsset').append(option); 
				$('#kategoriAsset').change();
				$('#kategoriAsset').trigger('liszt:updated');
				if(select=="KENDARAAN" || select=="TANAH DAN BANGUNAN"){
					$('#btn-save-asset').val('redirect');
				} else {
					$('#btn-save-asset').val('');
				}	
			}							
			});
		}); 	
		
		$('#divisisw').change(function(){
			var divisi = $(this).val(); 
			var option = ''; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_namakaryawan_byid',
			data: {'divisi':divisi}, 
			type: 'post',
			dataType:'json',
			
			success: function(data){	
				$.each(data, function(key,value) {  
					if (value.user_name != '<?php if(isset($dtAsset)) {echo $dtAsset->nama_karyawan;} ?>'){
						option+='<option value="'+value.user_name+'">'+value.user_name+'</option>';
					} else {
						option+='<option value="'+value.user_name+'" selected>'+value.user_name+'</option>';
					}	
				});   
				$('#nama_karyawansw').prop('disabled',false); 
				$('#nama_karyawansw').empty();
				$('#nama_karyawansw').append(option); 
				$('#nama_karyawansw').trigger('liszt:updated');
				}		
			});
		});

		$('#divisi').change(function(){
			var divisi = $(this).val(); 
			var option = ''; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_namakaryawan_byid',
			data: {'divisi':divisi}, 
			type: 'post',
			dataType:'json',
			
			success: function(data){	
				$.each(data, function(key,value) {  
					if (value.user_name != '<?php if(isset($dtAsset)) {echo $dtAsset->nama_karyawan;}?>'){
				  		option+='<option value="'+value.user_name+'">'+value.user_name+'</option>';
					} else {
						option+='<option value="'+value.user_name+'" selected>'+value.user_name+'</option>';
					}					
				});   
				$('#namakaryawan').prop('disabled',false); 
				$('#namakaryawan').empty();
				$('#namakaryawan').append(option); 
				$('#namakaryawan').trigger('liszt:updated');
				}		
			});
		});

		$('#kategoriAsset').change(function(){
			var kategori = $(this).val(); 
			var option = ''; 
			$('#namaBrg').prop('disabled',false); 
			$('#namaBrg').empty();
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/barang_bykategori',
			data: {'kategori':kategori}, 
			type: 'post',
			dataType:'json',
			
			success: function(data){	
				$.each(data, function(key,value) {  
					if (value.kode_barang != '<?php if(isset($dtAsset)) {echo $dtAsset->kode_namabarang;} else {echo "x";} ?>'){
				  		option+='<option value="'+value.kode_barang+'">'+value.nama_barang+'</option>';
					} else {
						option+='<option value="'+value.kode_barang+'">'+value.nama_barang+'</option>';
					}				  		
				});   				
				$('#namaBrg').append(option); 
				$('#namaBrg').trigger('liszt:updated');
				}		
			});
		});
		
		$('#jnsAssetSw').change(function(){
			var jnsAssetSw = $(this).val(); 
			var option = '<option value=""></option>'; 
			$('#namaBrgSw').empty();
			$('#namaBrgSw').prop('disabled',true); 
			$('#namaBrgSw').trigger('liszt:updated');
			var select = $("#jnsAssetSw option:selected").text(); 
			
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/kategori_byjnsasset',
			data: {'jnsAsset':jnsAssetSw}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
				$.each(data, function(key,value) {  
				  if (value.kode_kategori != '<?php if(isset($dtAsset)) {echo $dtAsset->kode_kategori;} else {echo "x";} ?>'){
				  		option+='<option value="'+value.kode_kategori+'">'+value.nama_kategori+'</option>';						
					} else {
						option+='<option value="'+value.kode_kategori+'" selected>'+value.nama_kategori+'</option>';
					}
				});   
				$('#kategoriAssetSw').prop('disabled',false); 		
				$('#kategoriAssetSw').empty();
				$('#kategoriAssetSw').append(option); 		
				$('#kategoriAssetSw').change();
				$('#kategoriAssetSw').trigger('liszt:updated');
				if(select=="KENDARAAN" || select == "TANAH DAN BANGUNAN"){
					$('#btn-save-penyewaan').val('redirect');
				} else {
					$('#btn-save-penyewaan').val('');
				}	
			}				
			});
		}); 
		
		$('#kategoriAssetSw').change(function(){
			var kategori = $(this).val(); 
			var option = ''; 

			$('#namaBrgSw').prop('disabled',false); 
			$('#namaBrgSw').empty();
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/barang_bykategori',
			data: {'kategori':kategori}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
				$.each(data, function(key,value) {  
					if (value.kode_barang != '<?php if(isset($dtAsset)) {echo $dtAsset->kode_namabarang;} else {echo "x";} ?>'){
				  		option+='<option value="'+value.kode_barang+'">'+value.nama_barang+'</option>';
					} else {
						option+='<option value="'+value.kode_barang+'">'+value.nama_barang+'</option>';
					}	
				});   				
				$('#namaBrgSw').append(option); 
				$('#namaBrgSw').trigger('liszt:updated');
				}		
			});
		});
		
		$('.jnsVendor').change(function(){
			var jnsVendor = $(this).val();
			var option=''; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_vendor_byjnsvendor',
			data: {'jnsVendor':jnsVendor}, 
			type: 'post',
			dataType:'json',
			success: function(data){	  
					$.each(data, function(key,value) {  
					  option+='<option value="'+value.kode_vendor+'">'+value.nama_vendor+'</option>';
					});
					$('#kodeVendor').empty();
					$('#kodeVendor').append(option);
					$('#kodeVendor').trigger('liszt:updated'); 
				}		
			}); 
		}); 
		
		$('.jnsVendorSw').change(function(){
			var jnsVendor = $(this).val();
			var option=''; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_vendor_byjnsvendor',
			data: {'jnsVendor':jnsVendor}, 
			type: 'post',
			dataType:'json',
			success: function(data){	  
					$.each(data, function(key,value) {  
					  option+='<option value="'+value.kode_vendor+'">'+value.nama_vendor+'</option>';
					});
					$('#kodeVendorSw').empty();
					$('#kodeVendorSw').append(option);
					$('#kodeVendorSw').trigger('liszt:updated'); 
				}		
			}); 
		}); 
		
		
		$('.input-file').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
		 
		$('#form-tbh-asset').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {								 				 				 
				spesifikasi: { required: true, }, 
				jumlah: { required: true, }, 
				hargaPembelian: { required: true, }, 
				merk: { required: true, }, 				
				
			},
			messages: {
				objekAsset:  { required:"Objek asset harus diisi.", extension: "File mesti image"},   				
				spesifikasi:  "Spesifikasi harus diisi.",  				
				jumlah:  "Jumlah harus diisi.",  				
				hargaPembelian:  "Harga Pembelian harus diisi.",  				
				merk:  "Merk harus diisi.",  											
			},
	
			
			highlight: function (e) {
				$(e).closest('.control-group').removeClass('info').addClass('error');
			},
	
			success: function (e) {
				$(e).closest('.control-group').removeClass('error').addClass('info');
				$(e).remove();
			}, 
			errorPlacement: function (error, element) {
				
				if (element.is('.file-image') || element.is('.noPengajuan')) {
					var controls = element.closest('.controls');
					controls.append(error);
				}
				else if (element.is('.chzn-select') ) {
					var controls = element.closest('.controls');
					controls.append(error); 
					
				} else
				error.insertAfter(element);
			},
			
			submitHandler: function(form) { 	 
				$('#modalLoading').modal('show');
				form.submit();   
			} 
		});  

		$('#form-penyewaan-asset').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {				
				noPengajuan: { required: true, }, 				
				spesifikasi: { required: true, }, 
				jumlah: { required: true, }, 
				lamaSewa: { required: true, }, 
				hargaBulanan: { required: true, },  
				hargaTahunan: { required: true, },  
				kelengkapan: { required: true, }, 
				keterangan: { required: true, }, 
				
			},
			messages: {
				objekAsset:  { required:"Objek asset harus diisi.", extension: "File mesti image"},   
				kelengAsset:  { required:"Kelengkapan asset harus diisi.", extension: "File mesti image"},  
				buktiAsset:  { required:"Bukti asset harus diisi.", extension: "File mesti image"},  
				noPengajuan:  "&nbsp;&nbsp;&nbsp;No pengajuan harus diisi.",  					  		  				
				jnsAsset:  "Jenis asset harus diisi.", 
				kategoriAssetSw:  "kategori asset harus diisi.", 
				namaBrg:  "Nama barang harus diisi.",
				kelengkapan:  "Kelengkapan harus diisi.",  				
				spesifikasi:  "Spesifikasi harus diisi.",  				
				jumlah:  "Jumlah harus diisi.",  				
				lamaSewa:  "Lama sewa harus diisi.",  				
				hargaBulanan:  "Harga harus diisi.",  	 		
				hargaTahunan:  "Harga harus diisi.",  	 		
				kelengkapan:  "Kelengkapan harus diisi.",  	 		
				keterangan:  "Keterangan harus diisi.",  				
			},
	
			
			highlight: function (e) {
				$(e).closest('.control-group').removeClass('info').addClass('error');
			},
	
			success: function (e) {
				$(e).closest('.control-group').removeClass('error').addClass('info');
				$(e).remove();
			}, 
			errorPlacement: function (error, element) {
				
				if (element.is('.file-image') || element.is('.noPengajuan')) {
					var controls = element.closest('.controls');
					controls.append(error);
				}
				else if (element.is('.chzn-select')) {
					var controls = element.closest('.controls');
					controls.append(error); 
					
				} else
				error.insertAfter(element);
			},
			
			submitHandler: function(form) { 	 
				$('#modalLoading').modal('show');
				form.submit(); 
			} 
		});  
		 
		$('#hargaBulanan').change(function(){
			var hargaBulan = $(this).val();
			hargaBulan = hargaBulan.replace(/,/g,'');
			var hargaTahunan = hargaBulan*12;
			$('#hargaTahunan').val(numberWithCommas(hargaTahunan));
		}) 
		
		$('#hargaTahunan').change(function(){
			var hargaTahunan = $(this).val();
			hargaTahunan = hargaTahunan.replace(/,/g,'');
			var hargaBulanan = hargaTahunan/12;
			$('#hargaBulanan').val(numberWithCommas(Math.round(hargaBulanan)));
		})

		if ($('#kepemilikan').val()=="PENYEWAAN"){							
			var date1 = '<?php if(isset($dtAsset->mulai_sewa)) echo date("d-m-Y", strtotime($dtAsset->mulai_sewa)); ?>';				
			var date2 = '<?php if(isset($dtAsset->akhir_sewa)) echo date("d-m-Y", strtotime($dtAsset->akhir_sewa)); ?>';				
			$('.date-picker2').datepicker();			
			$('#mulaiSewa').val(date1).datepicker("update");
			$('#akhirSewa').val(date2).datepicker("update");				
			$('#kodeVendorSw option').filter(function() {							
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->kode_vendor; ?>'; 
			}).prop('selected', true);

			$('#divisisw option').filter(function() {
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->divisi; ?>'; 
			}).prop('selected', true);
			$('#divisisw').change();			

			$('#jnsAssetSw').change();
			$('#jnsAssetSw').trigger('liszt:updated');
			$('#jnsAssetSw option').filter(function() {																		
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->kode_jenisasset; ?>'; 
			}).prop('selected', true);
			$('#jnsAssetSw').change();
			// $('#kategoriAssetSw').trigger('liszt:updated');			
					
			$('#btn-save-penyewaan').hide()
			$('#btn-update-sewa').show()
		}
		else if ($('#st').val()!=""){		
			var date1 = '<?php if(isset($dtAsset)) echo date("d-m-Y", strtotime($dtAsset->tgl_pembelian)); ?>';				
			var date2 = '<?php if(isset($dtAsset)) echo date("d-m-Y", strtotime($dtAsset->awal_garansi)); ?>';				
			var date3 = '<?php if(isset($dtAsset)) echo date("d-m-Y", strtotime($dtAsset->akhir_garansi)); ?>';	
			$('.date-picker2').datepicker();			
			$('#tglPembelian').val(date1).datepicker("update");
			$('#awalGaransi').val(date2).datepicker("update");
			$('#akhirGaransi').val(date3).datepicker("update");
			// $('#tglPembelian').datepicker().datepicker('setDate', '<?php if(isset($dtAsset)) echo $dtAsset->tgl_pembelian; ?>');				
			$('#kodeVendor option').filter(function() {
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->kode_vendor; ?>'; 
			}).prop('selected', true);

			$('#divisi option').filter(function() {					
					return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->divisi; ?>'; 
			}).prop('selected', true);
			$('#divisi').change();			

			$('#jnsAsset option').filter(function() {				
				return $(this).val() == '<?php if(isset($dtAsset)) echo $dtAsset->kode_jenisasset; ?>'; 
			}).prop('selected', true);
			$('#jnsAsset').change();
			// $('#kategoriAsset').trigger('liszt:updated');						
					
			$('#btn-save-asset').hide()
			$('#btn-update-asset').show()
		} 				
	});
	
	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
</script>