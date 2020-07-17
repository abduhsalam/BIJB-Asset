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
							<input id="noPengajuan" class="input-small span12 noPengajuan" type="text" name="noPengajuan" readonly />
							<span id="btn-search-pengajuan" class="btn btn-small">
								<i class="icon-search bigger-110"></i>							
							</span>
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
						<input id="jnsAsset" class="form-control" type="text" name="jnsAsset" readonly />  
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="namaBrg">Nama Barang</label>

					<div class="controls"> 
						<input id="namaBrg" class="form-control" type="text" name="namaBrg" readonly />  
					</div>				
				</div> 
				
				<div class="control-group">
					<label class="control-label" for="spesifikasi">Spesifikasi</label>

					<div class="controls">
						<div class="span12">
							<textarea id="spesifikasi" name="spesifikasi" class="span10" style="resize:none;" rows="3"readonly="readonly"></textarea> 
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="jumlah">Jumlah</label>

					<div class="controls">
						<input id="jumlah" class="span3 number" type="text" name="jumlah" /> 
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
						<input id="merk" class="form-control span10" type="text" name="merk" />  
					</div>				
				</div>
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
			</div>
			<div class="span6"> 
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
					<label class="control-label" for="kelengAsset">kelengkapan Asset</label>
					<div class="controls">
						<div class="span10"> 
							<input type="file" id="kelengAsset" class="input-file file-image" name="kelengAsset" accept="image/*" capture="camera" />
						</div>
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label" for="keterangan">kelengkapan</label>

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

<div id="search-pengajuan" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Data Pengajuan Pembelian Asset
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<div class="span12">
			<table class="table table-striped table-bordered" id="dt-data-pengajuan">
				<thead>
					<tr>
						<th class="center">No Pengajuan</th>
						<th class="center">Jenis</th>
						<th class="center">Nama Barang</th>
						<th class="center">Pilih</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($dtPengajuan as $val): ?>
					<tr>
						<td class="td1"><?= $val->kode_pengajuan; ?></td>
						<td class="td2"><?= $val->nama_jenisasset; ?></td>
						<td class="td3"><?= $val->nama_barang; ?></td>
						<td class="td4 center">
							<button class="btn btn-mini btn-success btn-plh-pengajuan">
								<i class="icon-ok bigger-110"></i>
							</button>
						</td>
					</tr>
					<?php endforeach; ?> 
				</tbody>
			</table>
			</div>
		</div>
	</div> 
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
		var dataTable = $('#dt-data-pengajuan').dataTable( {
			bAutoWidth: false,
			"aoColumns": [    
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },   
			],
			"aaSorting": [], 
			"pageLength":5,
			"iDisplayLength":5
		});  
		
		$('.file-image').on('change', function(){
			$(this).closest('form').validate().element($(this));
		});  
		
		$('#save-tbh-vendor').click(function(){
			var namaVendor	= $('#tbhNamaVendor').val();
			var jnsPenyedia	= $('#jnsPenyedia').val();
			var alamat		= $('#alamat').val();
			var pemilik		= $('#pemilik').val();
			var noTlp		= $('#noTlp').val();
			var noHp		= $('#noHp').val();
			var jnsVendor	= $('input[name=jnsVendor]:checked').val(); 
			if(namaVendor=='' || jnsPenyedia=='' || alamat=='' || pemilik=='' || noTlp=='' || noHp==''){
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan lengkapi form yang tersedia',
					class_name: 'gritter-error gritter-center'
				}); 
			} else {
				$('#tbh-vendor').modal('hide');
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Asset/tambah_vendor_asset',
				data: $('#form-tbh-vendor').serialize()+'&jnsVendor='+jnsVendor, 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							var option = '<option value="'+data.kode+'" selected>'+namaVendor+'</option>';
							$('#kodeVendor').append(option);
							$('#kodeVendor').trigger('liszt:updated'); 
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});
			}
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
		
		$('.chzn-select-modal').chosen({width:"250px"});
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
		
		$('#dt-data-pengajuan').on('click', '.btn-plh-pengajuan', function(){ 
			var noPeng 	= $(this).closest('tr').find('.td1').text();
			$('#search-pengajuan').modal('hide');  
			$('#modalLoading').modal('show');
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_pengajuan_byno',
			data: {'noPeng':noPeng}, 
			type: 'post',
			dataType:'json',
			success: function(data){	  
					$('#noPengajuan').val(data.kode_pengajuan);
					$('#jnsAsset').val(data.nama_jenisasset);
					$('#namaBrg').val(data.nama_barang);
					$('#spesifikasi').val(data.spesifikasi_barang);
					$('#jumlah').val(data.jumlah);
					$('#noPengajuan').closest('.control-group').removeClass('error')
					$('#noPengajuan').closest('.control-group').addClass('info')
					$('#noPengajuan').closest('.controls').find('.help-inline').empty(); 
					$('#modalLoading').modal('hide');
					if(data.REDIRECT){
						$('#btn-save-pengajuan').val('redirect');
					} else {
						$('#btn-save-pengajuan').val('');
					}
				}		
			}); 
			
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
				hargaPembelian: { required: true, }, 
				merk: { required: true, }, 
				kelengkapan: { required: true, }, 
				keterangan: { required: true, }, 
				
			},
			messages: {
				objekAsset:  { required:"Objek asset harus diisi.", extension: "File mesti image"},   
				kelengAsset:  { required:"kelengkapan asset harus diisi.", extension: "File mesti image"},   
				noPengajuan:  "&nbsp;&nbsp;&nbsp;No pengajuan harus diisi.",  					
				hargaPembelian:  "harga Pembelian harus diisi.",  				
				merk:  "Merk harus diisi.",  				
				kelengkapan:  "kelengkapan harus diisi.",  				
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