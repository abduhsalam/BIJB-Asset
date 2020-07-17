<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Form Detail Tanah Bangunan
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
		<form id="form-detail-asset" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_detail_tanah" method="post" enctype="multipart/form-data">
		<div class="row-fluid">
			<div class="span6"> 
				<div class="control-group">
					<label class="control-label" for="kodeAsset">Kode Aset</label>

					<div class="controls"> 
						<input id="kodeAsset" class="span6" type="text" name="kodeAsset" value="<?= $dtAsset->kode_asset; ?>" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="luasTnhBgn">Luas Tanah (PxL)</label>

					<div class="controls"> 
						<input id="luasTnhBgn" class="span8 uppercase" type="text" name="luasTnhBgn" />  
					</div>				
				</div> 
				
				<div class="control-group">
					<label class="control-label" for="jnsSrtTnh">Jenis Surat Tanah</label>
						
					<div class="controls"> 
						<select name="jnsSrtTnh"> 
							<option value="SHM">SHM</option>
							<option value="SHB">SHB</option>
							<option value="AJB">AJB</option>
							<option value="GIRIK">GIRIK</option>
						</select>
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="namaTnhBgn">Nama Pemilik Surat</label>

					<div class="controls"> 
						<input id="namaTnhBgn" class="span8 uppercase" type="text" name="namaTnhBgn" />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="lokasiTnhBgn">Lokasi Tanah</label>

					<div class="controls">  
						<textarea id="lokasiTnhBgn" name="lokasiTnhBgn" class="span10" style="resize:none;" rows="3"></textarea>  
					</div>				
				</div>
				 	 
			</div>
			<div class="span6">  
				<div class="control-group">								
					<label class="control-label" for="tglPajak">Tgl Pajak</label> 
					<div class="controls"> 
						<div class="row-fluid input-append span4" style="margin-right:20px">
							<input class="span12 date-picker" id="tglPajak" type="text" data-date-format="dd-mm-yyyy" name="tglPajak" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div>  
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label" for="imgTnhBgn">Foto Lokasi</label>
					<div class="controls">
						<div class="span10"> 
							<input type="file" id="imgTnhBgn" class="input-file file-image" name="imgTnhBgn" accept="image/*" capture="camera" />
						</div>
					</div>
				</div>  
				
				<div class="control-group">
					<label class="control-label" for="latitude">Latitude</label>

					<div class="controls"> 
						<input id="latitude" class="span6 uppercase" type="text" name="latitude" />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="longitude">Longitude</label>

					<div class="controls"> 
						<input id="longitude" class="span6 uppercase" type="text" name="longitude" />  
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
					
					<button id="btn-save-pengajuan" class="btn btn-info btn-small pull-right" name="btnSave" type="submit">
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
		 
		
		$('.file-image').on('change', function(){
			$(this).closest('form').validate().element($(this));
		});   
		
		$('#btn-search-pengajuan').click(function(){			
			$('#search-pengajuan').modal('show');   
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
		 
		
		$('#form-detail-asset').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {
				imgTnhBgn: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif",
					fileSize:true
				},  			
				luasTnhBgn: { required: true,  },   
				namaTnhBgn: { required: true, },  
				lokasiTnhBgn: { required: true, },  
				keterangan: { required: true, },  
				
			},
			messages: {
				imgStnk:  { required:"Lokasi tanah harus diisi.", extension: "File mesti image"},    
				luasTnhBgn:  "Luas tanah harus diisi.",  				
				namaTnhBgn:  "Nama pemilik surat harus diisi.",  	 		
				lokasiTnhBgn:  "Lokasi tanah harus diisi.",  	 		
				keterangan:  "Keterangan tanah harus diisi.",  	 		
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
	});
	
</script>