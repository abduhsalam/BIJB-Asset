<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Form Pengajuan Barang
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<!--PAGE CONTENT BEGINS-->

		<form id="form-pengajuan-asset" class="form-horizontal" />
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">								
					<label class="control-label" for="tglPengajuan">Tgl Pengajuan</label>
					<div class="controls"> 
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglPengajuan" type="text" data-date-format="dd-mm-yyyy" name="tglPengajuan" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>			
				
				<div class="control-group">								
					<label class="control-label" for="tglPemakaian">Tgl Pemakaian</label>
					<div class="controls"> 
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglPemakaian" type="text" data-date-format="dd-mm-yyyy" name="tglPemakaian" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="jnsAset">Jenis Aset</label>

					<div class="controls">
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
					<label class="control-label" for="kategoriAsset">Kategori Asset</label>

					<div class="controls">
						<select id="kategoriAsset" name="kategoriAsset" class="chzn-select" data-placeholder="Pilih kategori asset" disabled="disabled">  
						</select>  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="namaBrg">Nama Barang</label>

					<div class="controls">
						<select id="namaBrg" name="namaBrg" class="chzn-select" disabled="disabled"> 
						</select>  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="spesifikasi">Spesifikasi</label>

					<div class="controls">
						<div class="span12">
							<textarea id="spesifikasi" name="spesifikasi" class="span10" style="resize:none;" rows="3"></textarea> 
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="kebutuhan">Kebutuhan</label>

					<div class="controls">						
						<textarea name="kebutuhan" class="span10" style="resize:none;" rows="3"></textarea> 
					</div>
				</div> 
				
			</div>
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="jumlah">Jumlah</label>

					<div class="controls">
						<input class="span3 number" type="text" name="jumlah" /> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="perkiraanHarga">Perkiraan Harga</label>

					<div class="controls">
						<input class="span5 price" type="text" name="perkiraanHarga" /> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="sbrAnggaran">Sumber Anggaran</label>

					<div class="controls">
						<select id="sbrAnggaran" name="sbrAnggaran" class="chzn-select">
							<option value=""></option>
							<?php foreach($sbrAnggaran as $val): ?>
								<option value="<?= $val->kode_sumberanggaran; ?>"><?= $val->nama_sumberanggaran; ?></option>
							<?php endforeach; ?>
						</select> 
						<!--<button id="btn-sbr-anggaran" class="btn btn-info btn-mini"  type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>-->
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="keterangan">Keterangan</label>

					<div class="controls">
						<textarea name="keterangan" class="span10" style="resize:none;" rows="3"></textarea> 
					</div>
				</div>
				
				<div class="hr"></div>
				<div class="form-actions">
					
					<button class="btn btn-danger btn-small pull-right" type="reset" style="margin-left:10px;">
						<i class="icon-undo bigger-110"></i>
						Batal
					</button>
					
					<button id="btn-save-pengajuan" class="btn btn-info btn-small pull-right" type="submit">
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
		$(".chzn-select").css('width','200px').chosen({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
		$('#form-pengajuan-asset').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {
				jnsAsset: { required: true, }, 
				kategoriAsset: { required: true, }, 
				namaBrg: { required: true, }, 
				spesifikasi: { required: true, }, 
				kebutuhan: { required: true, }, 
				jumlah: { required: true, }, 
				perkiraanHarga: { required: true, }, 
				sbrAnggaran: { required: true, }, 
				keterangan: { required: true, }, 
				
			},
			messages: {
				jnsAsset:  "Jenis asset harus diisi.",  
				kategoriAsset:  "Kategori asset harus diisi.",  
				namaBrg:  "Nama barang harus diisi.",  
				spesifikasi:  "Spesifikasi harus diisi.",  
				kebutuhan:  "Kebutuhan harus diisi.",  
				jumlah:  "Jumlah harus diisi.",  
				perkiraanHarga:  "Perkiraan Harga harus diisi.",  
				sbrAnggaran:  "Sumber anggaran harus diisi.",  
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
				if (element.is('.chzn-select')) {
					var controls = element.closest('.controls');
					controls.append(error);
					// error.insertAfter(element.siblings('[class*="chzn-select"]:eq(0)'));
				} else
				error.insertAfter(element);
			},
			
			submitHandler: function(form) { 	 
				 
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Asset/simpan_pengajuan_asset',
				data: $("#form-pengajuan-asset").serialize(), 
				type: "post",
				dataType:'json',
				success: function(data){	
						$('#modalLoading').modal('hide');
						if(data.msg){  
							$.gritter.add({
								title: 'Informasi',
								text: 'Data Berhasil Disimpan',
								class_name: 'gritter-info gritter-center'
							});	  							
							setTimeout(function(){
							   window.location.reload(1);
							}, 2000);
						} else { 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data Gagal Disimpan',
								class_name: 'gritter-error gritter-center'
							});
						}
					}		
				}); 
			} 
		});    
		
		$('#jnsAsset').change(function(){
			var jnsAsset = $(this).val(); 
			var option = '<option value=""></option>'; 
			$('#namaBrg').empty();
			$('#namaBrg').prop('disabled',true); 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/kategori_byjnsasset',
			data: {'jnsAsset':jnsAsset}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
				$.each(data, function(key,value) {  
				  option+='<option value="'+value.kode_kategori+'">'+value.nama_kategori+'</option>';
				});   
				$('#kategoriAsset').prop('disabled',false); 
				$('#kategoriAsset').empty();
				$('#kategoriAsset').append(option); 
				$('#kategoriAsset').trigger('liszt:updated');
				}		
			});
		});
		
		$('#kategoriAsset').change(function(){
			var kategori = $(this).val(); 
			var option = ''; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/barang_bykategori',
			data: {'kategori':kategori}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
				$.each(data, function(key,value) {  
				  option+='<option value="'+value.kode_barang+'">'+value.nama_barang+'</option>';
				});   
				$('#namaBrg').prop('disabled',false); 
				$('#namaBrg').empty();
				$('#namaBrg').append(option); 
				$('#namaBrg').trigger('liszt:updated');
				}		
			});
		});
		 
	});
</script>