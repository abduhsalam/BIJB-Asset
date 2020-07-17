<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Form Detail Kendaraan
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
		<form id="form-detail-asset" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_detail_kedaraan" method="post" enctype="multipart/form-data">
		<div class="row-fluid">
			<div class="span6"> 
				<div class="control-group">
					<label class="control-label" for="kodeAsset">Kode Aset</label>

					<div class="controls"> 
						<input id="kodeAsset" class="span6" type="text" name="kodeAsset" value="<?= $dtAsset->kode_asset; ?>" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="noKendaraan">Nomor Kendaraan</label>

					<div class="controls"> 
						<input id="noKendaraan" class="span6 uppercase" type="text" name="noKendaraan" maxlength="10" />  
					</div>				
				</div> 
				
				<div class="control-group">
					<label class="control-label" for="warnaKedaraan">Warna Kendaraan</label>

					<div class="controls"> 
						<input id="warnaKedaraan" class="span8 uppercase" type="text" name="warnaKedaraan" />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="noBpkb">No BPKB</label>

					<div class="controls"> 
						<input id="noBpkb" class="span8 uppercase" type="text" name="noBpkb" />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="noStnk">No STNK</label>

					<div class="controls"> 
						<input id="noStnk" class="span8 uppercase" type="text" name="noStnk" />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="namaStnk">Nama Pada STNK</label>

					<div class="controls"> 
						<input id="namaStnk" class="span8 uppercase" type="text" name="namaStnk" />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="alamatStnk">Alamat Pada STNK</label>

					<div class="controls">  
						<textarea id="alamatStnk" name="alamatStnk" class="span10" style="resize:none;" rows="3"></textarea>   
					</div>				
				</div> 
			</div>
			<div class="span6"> 
				<div class="control-group">
					<label class="control-label" for="thnPembuatan">Tahun Pembuatan</label>

					<div class="controls"> 
						<input id="thnPembuatan" class="span4 number" type="text" name="thnPembuatan" />  
					</div>				
				</div> 
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
					<label class="control-label" for="imgStnk">Upload STNK</label>
					<div class="controls">
						<div class="span10"> 
							<input type="file" id="imgStnk" class="input-file file-image" name="imgStnk" accept="image/*" capture="camera" />
						</div>
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label" for="imgBpkb">Upload BPKB</label>
					<div class="controls">
						<div class="span10"> 
							<input type="file" id="imgBpkb" class="input-file file-image" name="imgBpkb" accept="image/*" capture="camera" />
						</div>
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
				imgStnk: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif",
					fileSize:true
				}, 
				imgBpkb: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif", 
					fileSize:true
				},  				
				noKendaraan: { required: true,maxlength: 10 },   
				warnaKedaraan: { required: true, }, 
				noBpkb: { required: true, }, 
				noStnk: { required: true, }, 
				namaStnk: { required: true, }, 
				alamatStnk: { required: true, }, 
				thnPembuatan: { required: true, }, 
				keterangan: { required: true, }, 
				
			},
			messages: {
				imgStnk:  { required:"Stnk harus diisi.", extension: "File mesti image"},   			
				imgBpkb:  { required:"Bpkb harus diisi.", extension: "File mesti image"},   
				noKendaraan:  "Nomor kendaraan harus diisi.",  				
				warnaKedaraan:  "Warna kendaraan harus diisi.",  				
				noBpkb:  "Nomor BPKB harus diisi.",  				
				noStnk:  "Nomor STNK harus diisi.",  				
				namaStnk:  "Nama pada STNK harus diisi.",  				
				alamatStnk:  "Alamat pada STNK harus diisi.",  				
				thnPembuatan:  "Tahun pembuatan harus diisi.",  				
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