<style>
	#filter{
		position : absolute;
		left : -300px;
		top : 172px;
	}
</style>
<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Data Asset Tanah Bangunan
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
	<div class="row-fluid input-append align-right "  id="filter"  style="padding-left:3%">	
		<input type="text" id="min" value="" data-date-format="yyyy-mm-dd" class="date-picker"><span class="add-on" style="margin-right : 3%;"><i class="icon-calendar"></i></span>	
	</div>
		<table class="table table-striped table-bordered" id="dt-data-asset">							
			<thead>
				<tr> 
					<th class="center">Kode Asset</th>  
					<th class="center">Tgl Beli/ Sewa</th>  
					<th class="center">Nama Asset</th>  
					<th class="center">Luas Tanah</th>   
					<th class="center">Lokasi Tanah</th>  
					<th class="center">Kepemilikan</th>  
					<th class="center" width="100px">Action</th>  
				</tr>
			</thead> 
				<?php foreach($dtAsset as $val): ?>
					<tr id="<?= $val->id_assettnhbgn; ?>">
						<td class="td1"><?= $val->kode_asset; ?></td> 
						<td class="center"><?= date("d-m-Y", strtotime($val->tgl_pembelian)); ?></td>  
						<td class="td4"><?= $val->nama_barang; ?></td> 
						<td class="center"><?= $val->luas_tnhbgn; ?></td>   
						<td class="center"><?= $val->lokasi_tnhbgn; ?></td>   
						<td class="center"><?= $val->kepemilikan_asset; ?></td>   
						<td class="center">
							<button class="btn btn-info btn-minier btn-detail tooltip-info" data-rel="tooltip" data-placement="bottom" title="Detail">
								<i class="icon-search"></i>
							</button> 
							<button class="btn btn-danger btn-minier btn-pajak tooltip-error" data-rel="tooltip" data-placement="bottom" title="Pajak">
								<i class="icon-legal bigger-120"></i>
							</button>
						</td>
					</tr>
				<?php endforeach; ?>
			<tbody> 
			</tbody>
		</table>
	</div>
</div>
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

<div id="detail-asset" class="modal hide fade" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Detail Asset <span id="nmBrgDet"></span>
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<div class="tabbable">
				<ul class="nav nav-tabs" id="myTab">
					<li class="tab-parent" id="tab1">
						<a data-toggle="tab" href="#gambar-asset">
							<i class="green icon-home bigger-110"></i>
							Gambar Asset
						</a>
					</li>

					<li class="tab-parent">
						<a data-toggle="tab" href="#lokasi-asset">
							<i class="blue icon-check  bigger-110"></i>  
							Lokasi Asset 
						</a>
					</li>
					
					<li class="tab-parent">
						<a data-toggle="tab" id="tab-pajak" href="#pajak-asset">
							<i class="blue icon-check  bigger-110"></i>  
							Pajak Asset 
						</a>
					</li>
					
				</ul>

				<div class="tab-content">
					<div id="gambar-asset" class="tab-pane"> 
						<center><img src="" id="imgasset" width="400px" height="300px"></center>
					</div>
					<div id="lokasi-asset" class="tab-pane"> 
						<div style="height:300px;">
							<iframe src="" id="maps" width="100%" height="100%" frameborder="0" scrolling="no">    </iframe>		
						</div> 
					</div> 
					<div id="pajak-asset" class="tab-pane"> 
						<div id="loading-pajak" class="row-fluid">
							<div class="span12">
								<div class="progress progress-info progress-striped active">
									<div class="bar" style="width: 100%">Loading</div>
								</div>
							</div>
						</div>
						<div id="table-pajak" class="row-fluid" style="display:none">
							<div class="span12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">Tanggal</th>
										<th class="center">Jenis Pjk</th>
										<th class="center">Biaya</th>
										<th class="center">Keterangan</th>
										<th class="center">#</th>
									</tr>
								</thead>
								<tbody id="list-pajak">
								</tbody>
							</table> 
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div> 
</div>

<div id="pajak-kendaraan" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Pajak Kendaraan
		</div>
	</div>
	<form id="form-pajak-kendaraan" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_pajak_kendaraan" method="post" enctype="multipart/form-data"> 
	<div class="modal-body padding4">
		<div class="row-fluid"> 
			
				<div class="control-group">
					<label class="control-label span3" for="tglPajak">Tgl Pajak</label>
					<div class="controls span9">  
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglPajak" type="text" data-date-format="dd-mm-yyyy" name="tglPajak" value="<?= date('d-m-Y'); ?>" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>
				 
				<div class="control-group">
					<label class="control-label span3" for="jnsPajak">Jenis Pajak</label>
					<div class="controls span6">
						<select id="jnsPajak" name="jnsPajak">
							<?php foreach($jnsPajak as $val) : ?>
							<option value="<?= $val->kode_jnspajak; ?>"><?= $val->nama_jnspajak; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>   
				<div class="control-group">
					<label class="control-label span3" for="biayaPajak">Biaya</label>
					<div class="controls span6">
						<input type="text" name="biayaPajak" class="form-control span6 price" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="buktiPajak">Bukti Pajak</label>
					<div class="controls span6"> 
						<div class="span12"> 
							<input type="file" id="buktiPajak" class="input-file file-image" name="buktiPajak" />
						</div> 
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="ketPajak">Keterangan</label>
					<div class="controls span9">
						<textarea id="ketPajak" name="ketPajak" class="span10" style="resize:none" rows="3"></textarea>
					</div>
				</div>
				<input type="hidden" id="idAsset" name="idAsset" readonly="readonly">
			
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-pajak" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
	
</div> 

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
		var dataTable = $('#dt-data-asset').dataTable( {
			// bAutoWidth: false,
			// "aoColumns": [    
			  // { "bSortable": false }, 
			  // { "bSortable": false }, 
			  // { "bSortable": false }, 
			  // { "bSortable": false },   
			  // { "bSortable": false }, 
			  // { "bSortable": false },   
			  // { "bSortable": false },   
			  // { "bSortable": false },    
			// ],
			// "aaSorting": [],
			// "bFilter":true, 
			// "info":true, 
			// "sScrollY": "300px",
			// "bPaginate": false,  
		}); 
		
		$('#min').change( function() {
			$("#dt-data-asset_filter input[type=search]").val($(this).val());
			$("#dt-data-asset_filter input[type=search]").keyup();
					
		} );   

		$('.input-file').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false 
		});  
		
		$('#dt-data-asset').on('click','.btn-detail',function(){
			$('#modalLoading').modal('show');
			$('.tab-parent').each(function(){
				$(this).removeClass('active');
			});
			$('.tab-pane').each(function(){
				$(this).removeClass('active');
			})
			var idAsset	= ($(this).closest('tr').attr('id')).trim(); 
			$('#tab1').addClass('active');
			$('#gambar-asset').addClass('active');
			var idAsset	= ($(this).closest('tr').attr('id')).trim();   
			$('#myTab').attr('idAsset',idAsset);
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_tnhbgn_byid',
			data: {'idAsset':idAsset}, 
			type: 'post',
			dataType:'json',
			success: function(data){	   					  	 
					var img = '<?php echo base_url(); ?>assets/images/imgasset/assettnhbgn/lokasi/'+data.img_tnhbgn;
					$('#imgasset').attr('src',img); 
					var map		= "<?php echo base_url()."Asset/frame_maps/"; ?>"+idAsset;
					$('#maps').attr('src',map); 
					$('#modalLoading').modal('hide');
					$('#detail-asset').modal('show');
				}		
			}); 
			
		});
		 
		$('#dt-data-asset').on('click','.btn-pajak',function(){
			$('#pajak-kendaraan').modal('show');			
			var idAsset	= ($(this).closest('tr').attr('id')).trim();  
			$('#form-pajak-kendaraan')[0].reset();
			$('#form-pajak-kendaraan .control-group').each(function(){
				$(this).removeClass('info');
				$(this).removeClass('error');
				$(this).find('.help-inline').remove();
			}); 
			$('.ace-file-input .selected span').attr('data-title','');
			$('.ace-file-input .selected').removeClass('selected');
			$('#idAsset').val(idAsset);
		}); 
		
		$('#form-pajak-kendaraan').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {
				buktiPajak: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif", 
					fileSize:true
				}, 		
				biayaPajak: { required: true, },   
				ketPajak: { required: true, }
				
			},
			messages: {
				buktiPajak:  { required:"Bukti pajak harus diisi.", extension: "File mesti image"},   			
				biayaPajak:  "Biaya harus diisi.",  				
				ketPajak:  "Keterangan harus diisi.",  			
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
				$('#pajak-kendaraan').modal('hide'); 
				$('#modalLoading').modal('show');
				var url = $('#form-pajak-kendaraan').attr('action');
				var formData = new FormData($('#form-pajak-kendaraan')[0]); 
				$.ajax({
					url: url,
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false, 
					success: function (res) { 	 
						$('#modalLoading').modal('hide');  
						
						$.gritter.add({
							title: 'Informasi',
							text: 'Data berhasil disimpan',
							class_name: 'gritter-info gritter-center'
						}); 
					},
					error: function (error) {  
						$('#modalLoading').modal('hide'); 
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal disimpan',
							class_name: 'gritter-error gritter-center'
						}); 
					}
				}); // End: $.ajax()
				// form.submit();   
			} 
		});  
		
		$('#tab-pajak').click(function(){ 
			var idAsset = ($('#myTab').attr('idAsset')).trim(); 
			var tr="";
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_pajak_byassetkend',
			data: {'idAssetKend':idAsset},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-pajak').hide(); 
					$('#table-pajak').show();
					$.each(data, function(key,val) {  
					  tr+='<tr id="'+val.id_pjkkendaraan+'">';
					  tr+='<td>'+convertDate(val.tgl_pajak)+'</td>'; 
					  tr+='<td>'+val.kode_jnspajak+'</td>'; 
					  tr+='<td>'+currency(val.biaya_pajak)+'</td>';
					  tr+='<td>'+val.keterangan+'</td>';
					  tr+='<td class="center"><button class="btn btn-info btn-mini btn-show-img"><i class="icon-search"></i></button></td>';
					  tr+='</tr>';
					});   
					$('#list-pajak').empty();
					$('#list-pajak').append(tr); 
				}		
			}); 
		});
	});   
</script>