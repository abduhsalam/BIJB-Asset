<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Form Penyewaan Barang
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<!--PAGE CONTENT BEGINS--> 
		<?php 
		$status = $this->session->flashdata('status');
		if($status=="success"){ ?>
			<div class="alert alert-success alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> Data berhasil di simpan.
			</div>
		<?php } if($status=="error"){ ?>
			<div class="alert alert-danger alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error!</strong> Data gagal di simpan.
			</div>
		<?php } ?>
		<form id="form-penyewaan-asset" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_penyewaan_asset" method="post" enctype="multipart/form-data">
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">								
					<label class="control-label span3" for="noPengajuan">No Pengajuan</label>
					<div class="controls span6">  
						<input id="noPengajuan" class="input-small span12 noPengajuan" type="text" name="noPengajuan" value="<?= $dtPengajuan->kode_pengajuan; ?>" readonly />  
					</div>
				</div>		 

				<div class="control-group">
					<label class="control-label span3" for="jnsAset">Jenis Aset</label>

					<div class="controls span6"> 
						<input id="jnsAsset" class="form-control span12" type="text" name="jnsAsset" value="<?= $dtPengajuan->nama_jenisasset; ?>" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="kategoriAset">Kategori Aset</label>

					<div class="controls span6"> 
						<input id="kategoriAset" class="form-control span12" type="text" name="kategoriAset" value="<?= $dtPengajuan->nama_kategori; ?>" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="namaBrg">Nama Barang</label>

					<div class="controls span6"> 
						<input id="namaBrg" class="form-control" type="text" name="namaBrg" value="<?= $dtPengajuan->nama_barang; ?>" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="spesifikasi">Spesifikasi</label>

					<div class="controls span9">
						<div class="span12">
							<textarea id="spesifikasi" name="spesifikasi" class="span12" style="resize:none;" rows="3"><?= $dtPengajuan->spesifikasi_barang; ?></textarea> 
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="jumlah">Jumlah</label>

					<div class="controls span2">
						<input id="jumlah" class="span12 number" type="text" name="jumlah" value="<?= $dtPengajuan->jumlah; ?>" /> 
					</div> 
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="lamaSewa">Lama Sewa</label>

					<div class="controls span2">
						<input id="lamaSewa" class="span12 number" type="text" name="lamaSewa" value="<?= $dtPengajuan->jumlah; ?>" /> 
					</div>
					<div class="controls span4">
						<select id="jnsSewa" class="span12" name="jnsSewa">
							<option value="BULANAN">BULAN</option>
							<option value="TAHUNAN">TAHUN</option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="hargaBulanan">Harga Bulanan</label>

					<div class="controls span3">
						<input id="hargaBulanan" class="span12 price" type="text" name="hargaBulanan" /> 
					</div>
					
					<label class="control-label span3" for="hargaTahunan">Harga Tahunan</label>

					<div class="controls span3">
						<input id="hargaTahunan" class="span12 price" type="text" name="hargaTahunan" /> 
					</div>
				</div> 
				 
				<div class="control-group">								
					<label class="control-label span3" for="tglGaransi">Mulai Sewa</label> 
					<div class="controls span3"> 
						<div class="row-fluid input-append span12">
							<input class="span10 date-picker" id="mulaiSewa" type="text" data-date-format="dd-mm-yyyy" name="mulaiSewa" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div>
					</div>
					
					<label class="control-label span3">Akhir Sewa</label>
					<div class="controls span3"> 
						<div class="row-fluid input-append span12">
							<input class="span10 date-picker" id="akhirSewa" type="text" data-date-format="dd-mm-yyyy" name="akhirSewa" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>
			</div>
			<div class="span6"> 
				<div class="control-group">
					<label class="control-label span3" for="vendor">Vendor</label>

					<div class="controls span7">
						<label>
							<input type="radio" name="jnsVendor" class="jnsVendor" value="perusahaan" checked	>
							<span class="lbl"> Perusahaan</span> 
							<input type="radio" name="jnsVendor" class="jnsVendor" value="perorangan">
							<span class="lbl"> Perorangan</span>
						</label> 
						 
					</div>
				</div> 
				<div class="control-group">
					<label class="control-label span3" for="kodeVendor"></label> 
					<div class="controls span7">
						<select id="kodeVendor" name="kodeVendor" class="chzn-select"> 
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
						<textarea id="kelengkapan" name="kelengkapan" class="span12" style="resize:none;" rows="3"></textarea> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="keterangan">Keterangan</label>

					<div class="controls span8">
						<textarea id="keterangan" name="keterangan" class="span12" style="resize:none;" rows="3"></textarea> 
					</div>
				</div>
				
				<div class="hr"></div>
				<div class="form-actions">
					
					<button class="btn btn-danger btn-small pull-right" type="reset" style="margin-left:10px;">
						<i class="icon-undo bigger-110"></i>
						Batal
					</button>
					<?php 
						$redirect = "";
						if($dtPengajuan->nama_jenisasset=="KENDARAAN" || $dtPengajuan->nama_jenisasset=="TANAH DAN BANGUANAN")
						{
							$redirect = "redirect";
						}
					?>
					<button id="btn-save-pengajuan" class="btn btn-info btn-small pull-right" value="<?= $redirect; ?>" type="submit" name="btnSave">
						<i class="icon-save bigger-110"></i>
						Simpan
					</button>  
				</div>
			</div>
		</div>
		</form>
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
		$('.chzn-select-modal').chosen({width:"250px"});
		
		$('.file-image').on('change', function(){
			$(this).closest('form').validate().element($(this));
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
		 
		$('#form-penyewaan-asset').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {
				objekAsset: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif",
					fileSize:true
				},  
				kelengAsset: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif",
					fileSize:true
				},
				buktiAsset: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif",
					fileSize:true
				},
				noPengajuan: { required: true, }, 
				namaBrg: { required: true, }, 
				jnsAsset: { required: true, },   
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
				namaBrg:  "Nama barang harus diisi.",  		  				
				jnsAsset:  "Jenis asset harus diisi.",  	  				
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
	});
	
	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
</script>