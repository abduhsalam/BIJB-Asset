<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Form Peminjaman Asset
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<!--PAGE CONTENT BEGINS-->

		<form id="form-peminjaman-asset" class="form-horizontal" />
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">								
					<label class="control-label span4" for="tglPinjam">Tgl Peminjaman</label>
					<div class="controls span8"> 
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglPinjam" type="text" data-date-format="dd-mm-yyyy" name="tglPinjam" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>			
				
				<div class="control-group">								
					<label class="control-label span4" for="tglKembali">Tgl Pengembalian</label>
					<div class="controls span8"> 
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglKembali" type="text" data-date-format="dd-mm-yyyy" name="tglKembali" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span4" for="unitKerja">Unit Kerja</label>

					<div class="controls span8"> 
						<select id="unitKerja" name="unitKerja" class="chzn-select" style="width:350px !important;">
							<option value=""></option>
							<?php foreach($unitKerja as $val): ?>
								<option value="<?= $val->id; ?>"><?= $val->unit_kerja; ?></option>
							<?php endforeach; ?>
						</select>   
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label span4" for="penanggungJwb">Penanggung Jawab</label>

					<div class="controls span8"> 
						<select id="penanggungJwb" name="penanggungJwb" class="chzn-select" style="width:250px !important;" disabled="disabled">
							 
						</select>   
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="keperluan">Keperluan</label>

					<div class="controls">
						<textarea name="keperluan" class="span10" style="resize:none;" rows="3"></textarea> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="keterangan">Keterangan</label>

					<div class="controls">
						<textarea name="keterangan" class="span10" style="resize:none;" rows="3"></textarea> 
					</div>
				</div>
				
			</div>
			<div class="span6">
				<div class="row-fluid">
					<div class="widget-box">
						<div class="widget-header widget-header-flat">
						<h4 class="smaller"> Asal Asset </h4>
						</div>
						<div class="widget-body">
							<div class="widget-main"> 
								<div class="control-group">
									<label class="control-label span3" for="unitKerjaAsal">Unit Kerja</label>

									<div class="controls span9"> 
										<select id="unitKerjaAsal" name="unitKerjaAsal" class="chzn-select" style="width:320px !important;">
											<option value=""></option>
											<?php foreach($unitKerja as $val): ?>
												<option value="<?= $val->id; ?>"><?= $val->unit_kerja; ?></option>
											<?php endforeach; ?>
										</select>   
									</div>				
								</div>
								<div class="control-group">
									<label class="control-label span3" for="penggunaAsset">Pengguna Asset</label>

									<div class="controls span9">
										<select id="penggunaAsset" name="penggunaAsset" class="chzn-select" disabled> 
										</select>  
									</div>				
								</div> 
								 
								<div class="control-group">
									<label class="control-label span3" for="namaBrg">Nama Barang</label>

									<div class="controls span9">
										<select id="namaBrg" name="namaBrg" class="chzn-select" disabled> 
										</select>  
									</div>				
								</div> 
								
								<div class="control-group">
									<label class="control-label span3" for="spesifikasiBrg">Spesifikasi</label>

									<div class="controls span9">
										<textarea id="spesifikasiBrg" name="spesifikasiBrg" class="span10" style="resize:none;" rows="3" readonly="readonly"></textarea> 
									</div>
								</div>
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
		width: 370px; margin-left: -185px;		
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
		// $(".chzn-select").css('width','200px').chosen({allowClear:true})
		// .on('change', function(){
			// $(this).closest('form').validate().element($(this));
		// }); 
		
		$('#form-peminjaman-asset').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {
				unitKerja: { required: true, }, 
				penanggungJwb: { required: true, }, 
				keperluan: { required: true, },  
				keterangan: { required: true, }, 
				unitKerjaAsal: { required: true, }, 
				penggunaAsset: { required: true, }, 
				namaBrg: { required: true, }, 
				
			},
			messages: {
				unitKerja:  "Unit kerja harus diisi.",  
				penanggungJwb:  "Penanggung jawab harus diisi.",  
				keperluan:  "Keperluan harus diisi.",  
				keterangan:  "Keterangan harus diisi.",  
				unitKerjaAsal:  "Asal unit kerja harus diisi.",  
				penggunaAsset:  "Asal pengguna harus diisi.",  
				namaBrg:  "Nama barang harus diisi.",  
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
				url: '<?php echo base_url(); ?>Asset/simpan_peminjaman_asset',
				data: $("#form-peminjaman-asset").serialize(), 
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
		
		$('#unitKerja').change(function(){
			var unitKerjaAsal = $(this).val(); 
			var option = '<option value="">-- Penanggung Jawab --</option>'; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_pengguna_byunitkerja',
			data: {'unitKerja':unitKerjaAsal}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
				$.each(data, function(key,value) {  
				  option+='<option value="'+value.user_id+'">'+value.user_name+'</option>';
				});   
				$('#penanggungJwb').prop('disabled',false); 
				$('#penanggungJwb').empty();
				$('#penanggungJwb').append(option); 
				$('#penanggungJwb').trigger('liszt:updated'); 
				}		
			});
		});
		
		$('#unitKerjaAsal').change(function(){
			var unitKerjaAsal = $(this).val(); 
			var option = '<option value="">-- Pilih Pengguna--</option>'; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_pengguna_byunitkerja',
			data: {'unitKerja':unitKerjaAsal}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
				$.each(data, function(key,value) {  
				  option+='<option value="'+value.user_id+'">'+value.user_name+'</option>';
				});   
				$('#penggunaAsset').prop('disabled',false); 
				$('#penggunaAsset').empty();
				$('#penggunaAsset').append(option); 
				$('#penggunaAsset').trigger('liszt:updated');
				$('#namaBrg').attr('disabled',true);
				$('#namaBrg').empty();
				$('#namaBrg').trigger('liszt:updated');				
				$('#spesifikasiBrg').val('');
				}		
			});
		});
		
		$('#penggunaAsset').change(function(){
			var pengguna = $(this).val(); 
			var option = '<option value="">-- Pilih Barang --</option>'; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_namabrg_bypengguna',
			data: {'pengguna':pengguna}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
				$.each(data, function(key,value) {  
				  option+='<option value="'+value.kode_asset+'">'+value.nama_barang+'</option>';
				});   
				$('#namaBrg').prop('disabled',false); 
				$('#namaBrg').empty();
				$('#namaBrg').append(option); 
				$('#namaBrg').trigger('liszt:updated');
				}		
			});
		});
		
		$('#namaBrg').change(function(){
			var kodeAsset = $(this).val();  
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_asset_bykdasset',
			data: {'kodeAsset':kodeAsset}, 
			type: 'post',
			dataType:'json',
			success: function(data){	 
					if(data.spesifikasi === null){
						$('#spesifikasiBrg').val('');
					} else {
						$('#spesifikasiBrg').val(data.spesifikasi);
					}
				}		
			});
		});
		
		$('#jnsAsset').change(function(){
			var jnsAsset = $(this).val(); 
			var option = ''; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/nama_barang_byjnsasset',
			data: {'jnsAsset':jnsAsset}, 
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