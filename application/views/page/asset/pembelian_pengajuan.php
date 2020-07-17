<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Form Pembelian Barang
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
		<form id="form-pembelian-asset" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_pembelian_asset" method="post" enctype="multipart/form-data">
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">								
					<label class="control-label" for="noPengajuan">No Pengajuan</label>
					<div class="controls"> 
						<div class="input-append">
							<input id="noPengajuan" class="input-small span12 noPengajuan" type="text" name="noPengajuan" value="<?= $dtPengajuan->kode_pengajuan; ?>" readonly /> 
						</div>
					</div>
				</div>			
				
				<div class="control-group">								
					<label class="control-label" for="tglPembelian">Tgl Pembelian</label>
					<div class="controls"> 
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglPembelian" type="text" data-date-format="dd-mm-yyyy" name="tglPembelian" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="jnsAset">Jenis Aset</label>

					<div class="controls"> 
						<input id="jnsAsset" class="form-control" type="text" name="jnsAsset" value="<?= $dtPengajuan->nama_jenisasset; ?>" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="jnsAset">Kategori Aset</label>

					<div class="controls"> 
						<input id="jnsAsset" class="form-control" type="text" name="jnsAsset" value="<?= $dtPengajuan->nama_kategori; ?>" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="namaBrg">Nama Barang</label>

					<div class="controls"> 
						<input id="namaBrg" class="form-control" type="text" name="namaBrg" value="<?= $dtPengajuan->nama_barang; ?>" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="spesifikasi">Spesifikasi</label>

					<div class="controls">
						<div class="span12">
							<textarea id="spesifikasi" name="spesifikasi" class="span10" style="resize:none;" rows="3"><?= $dtPengajuan->spesifikasi_barang; ?></textarea> 
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="jumlah">Jumlah</label>

					<div class="controls">
						<input id="jumlah" class="span3 number" type="text" name="jumlah" value="<?= $dtPengajuan->jumlah; ?>" /> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="hargaPembelian">Harga Pembelian</label>

					<div class="controls">
						<input class="span5 price" type="text" name="hargaPembelian" /> 
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label" for="merk">Merk</label>
					<div class="controls"> 
						<input id="merk" class="form-control span10 uppercase" type="text" name="merk" />  
					</div>				
				</div> 
			</div>
			<div class="span6"> 
				<div class="control-group">								
					<label class="control-label" for="tglGaransi">Tgl Garansi</label> 
					<div class="controls"> 
						<div class="row-fluid input-append span4" style="margin-right:20px">
							<input class="span12 date-picker" id="awalGaransi" type="text" data-date-format="dd-mm-yyyy" name="awalGaransi" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> &nbsp;
						<label class="span1" style="padding-left:5px; padding-top:5px;">S.d</label>
						<div class="row-fluid input-append span4">
							<input class="span12 date-picker" id="akhirGaransi" type="text" data-date-format="dd-mm-yyyy" name="akhirGaransi" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="vendor">Vendor</label>

					<div class="controls">
						<label>
							<input type="radio" name="jnsVendor" class="jnsVendor" value="perusahaan" checked	>
							<span class="lbl"> Perusahaan</span> 
							<input type="radio" name="jnsVendor" class="jnsVendor" value="perorangan">
							<span class="lbl"> Perorangan</span>
						</label> 
						 
					</div>
				</div> 
				<div class="control-group">
					<label class="control-label" for="kodeVendor"></label> 
					<div class="controls">
						<select id="kodeVendor" name="kodeVendor" class="chzn-select"> 
						<?php foreach($dtVendor as $val):?>
							<option value="<?= $val->kode_vendor; ?>"><?= $val->nama_vendor; ?></option>
						<?php endforeach; ?>
						</select>  
					</div>				
				</div>
				<div class="control-group">
					<label class="control-label" for="objekAsset">Objek Asset</label>
					<div class="controls">
						<div class="span10"> 
							<input type="file" id="objekAsset" class="input-file file-image" name="objekAsset" accept="image/*" capture="camera" />
						</div>
					</div>
				</div> 
				<div class="control-group">
					<label class="control-label" for="kelengAsset">Kelengkapan Asset</label>
					<div class="controls">
						<div class="span10"> 
							<input type="file" id="kelengAsset" class="input-file file-image" name="kelengAsset" accept="image/*" capture="camera" />
						</div>
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label" for="keterangan">Kelengkapan</label>

					<div class="controls">
						<textarea id="kelengkapan" name="kelengkapan" class="span10" style="resize:none;" rows="3"></textarea> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="keterangan">Keterangan</label>

					<div class="controls">
						<textarea id="keterangan" name="keterangan" class="span10" style="resize:none;" rows="3"></textarea> 
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
						if($dtPengajuan->kode_jenisasset=="JA-001" || $dtPengajuan->kode_jenisasset=="JA-002")
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
		 
		$('#form-pembelian-asset').validate({
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
				noPengajuan: { required: true, }, 
				namaBrg: { required: true, }, 
				jnsAsset: { required: true, },   
				spesifikasi: { required: true, }, 
				jumlah: { required: true, }, 
				hargaPembelian: { required: true, }, 
				merk: { required: true, }, 
				kelengkapan: { required: true, }, 
				keterangan: { required: true, }, 
				
			},
			messages: {
				objekAsset:  { required:"Objek asset harus diisi.", extension: "File mesti image"},   
				kelengAsset:  { required:"Kelengkapan asset harus diisi.", extension: "File mesti image"},  
				noPengajuan:  "&nbsp;&nbsp;&nbsp;No pengajuan harus diisi.",  				
				namaBrg:  "Nama barang harus diisi.",  		  				
				jnsAsset:  "Jenis asset harus diisi.",  	  				
				kelengkapan:  "Kelengkapan harus diisi.",  				
				spesifikasi:  "Spesifikasi harus diisi.",  				
				jumlah:  "Jumlah harus diisi.",  				
				hargaPembelian:  "Harga Pembelian harus diisi.",  				
				merk:  "Merk Pembelian harus diisi.",  				
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
		 
		 
	});
</script>