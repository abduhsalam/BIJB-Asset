<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Master Barang
		</small> 
		<div class="btn-group  pull-right">
			<button class="btn btn-info dropdown-toggle btn-small" data-toggle="dropdown">
				<i class="icon-plus">&nbsp;Tambah Barang</i>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu dropdown-warning">
				<li>
					<a href="#tbh-master" data-toggle="modal">Tambah Barang Barcode</a>
				</li>
				<li>
				<a href="#tbh-manual" data-toggle="modal">Tambah Barang Manual</a>
				</li> 
			</ul>
		</div>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-master">							
			<thead>
				<tr> 
					<th class="center">Barcode</th> 
					<th class="center">Nama Barang</th>  
					<th class="center">Isi Barang</th> 
					<th class="center">Satuan Barang</th> 
					<th class="center">Keterangan</th>    
					<th class="center">Action</th>    
				</tr>
			</thead>
				<?php 
				$no = 0;
				foreach($dtMaster as $val): 
				$no = $no+1;
				?>
				<tr id="<?= $no; ?>">
					<td class="td1"><?= $val->barcode; ?></td>
					<td class="td2"><?= $val->nama_barang; ?></td>
					<td class="td3 center"><?= $val->isi_barang; ?></td>
					<td class="td4 center"><?= $val->nama_satuan; ?></td>
					<td class="td5"><?= $val->keterangan; ?></td>
					<td class="center"> 
						<button class="btn btn-info btn-minier btn-edit">
							<i class="icon-pencil bigger-120"></i>
						</button> 
						<button class="btn btn-danger btn-minier btn-remove">
							<i class="icon-remove"></i>
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

<div id="tbh-master" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Tambah Master Barcode
		</div>
	</div> 
	
	<form id="form-tbh-master1" class="form-horizontal" />
	<div class="modal-body padding4" style="overflow-y:visible;">
		<div class="row-fluid">
			   
				<div class="control-group">
					<label class="control-label span3" for="kodeBarcode">Kode Barcode</label>
					<div class="controls span9">
						<input id="kodeBarcode" class="span11 uppercase" type="text" name="kodeBarcode" onChange="cekBarcode(1)">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="namaBarang">Nama Barang</label>
					<div class="controls span9">
						<input id="namaBarang" class="span11 uppercase" type="text" name="namaBarang">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="isiBarang">Isi Barang</label>
					<div class="controls span2">
						<input id="isiBarang" class="span11 number" type="text" name="isiBarang">
					</div>
					<label class="control-label span2" for="satuanBarang">Satuan</label>
					
					<div class="controls span5">
						<select id="satuanBarang" name="satuanBarang" class="form-control span8">  
							<?php foreach($satuanBrg as $val): ?>
								<option value="<?= $val->kode_satuan; ?>"><?= $val->nama_satuan; ?></option>
							<?php endforeach; ?> 
						</select> 
						<button id="btn-satuan-brng" class="btn btn-info btn-mini btn-satuan-brng" value="1"  type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>
					</div>
				</div> 
				<div class="control-group">
					<label class="control-label span3" for="ketMaster">Keterangan</label>
					<div class="controls span8">
						<input id="ketMaster" class="span12 uppercase" type="text" name="ketMaster"> 
					</div>
				</div>  
				
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-tbh-master" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
</div>

<div id="tbh-manual" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Tambah Master Manual
		</div>
	</div> 
	
	<form id="form-tbh-master2" class="form-horizontal" />
	<div class="modal-body padding4" style="overflow-y:visible;">
		<div class="row-fluid"> 
				<div class="control-group">
					<label class="control-label span3" for="groupBrg">Group Barang</label>
					<div class="controls span6">
						<select id="groupBrg" name="groupBrg" class="form-control">
							<option value="">-- Pilih Group --</option>
							<?php foreach($kodeManual as $val): ?>
								<option value="<?= $val->kode_group; ?>"><?= $val->nama_group; ?></option>
							<?php endforeach; ?>  
						</select>  
						<button id="btn-tbh-group" class="btn btn-info btn-mini" type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>
					</div>
					
				</div>
				<div class="control-group">
					<label class="control-label span3" for="jnsBrg">Jenis Barang</label>
					<div class="controls span9">
						<select id="jnsBrg" name="jnsBrg" class="form-control" disabled="disabled">  
						</select>
						<button id="btn-tbh-jnsbrg" class="btn btn-info btn-mini" type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="merkBrg">Merk</label>
					<div class="controls span9">
						<select id="merkBrg" name="merkBrg" class="form-control" disabled="disabled">   
						</select>
						<button id="btn-tbh-merk" class="btn btn-info btn-mini" type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="kodeBarcode">Kode Barcode</label>
					<div class="controls span6">
						<input id="kodeBarcode" class="span11 uppercase" type="text" name="kodeBarcode" readonly="readonly" onChange="cekBarcode(2)">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="namaBarang">Nama Barang</label>
					<div class="controls span9">
						<input id="namaBarang" class="span11 uppercase" type="text" name="namaBarang">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="isiBarang">Isi Barang</label>
					<div class="controls span2">
						<input id="isiBarang" class="span11 number" type="text" name="isiBarang">
					</div>
					<label class="control-label span2" for="satuanBarang">Satuan</label>
					
					<div class="controls span5">
						<select id="satuanBarang" name="satuanBarang" class="form-control span8">  
							<?php foreach($satuanBrg as $val): ?>
								<option value="<?= $val->kode_satuan; ?>"><?= $val->nama_satuan; ?></option>
							<?php endforeach; ?> 
						</select> 
						<button id="btn-satuan-brng2" class="btn btn-info btn-mini btn-satuan-brng" value="2"  type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>
					</div>
				</div> 
				<div class="control-group">
					<label class="control-label span3" for="ketMaster">Keterangan</label>
					<div class="controls span8">
						<input id="ketMaster" class="span12 uppercase" type="text" name="ketMaster"> 
					</div>
				</div>  
				
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-tbh-master" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
</div> 
  
<div id="tbh-satuan-barang" class="modal hide modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
			Tambah Satuan Barang
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" />
				<div class="control-group">
				</div>
				<div class="control-group">
					<label class="control-label span4" for="tbhSatuanBrg">Nama Satuan Barang</label>
					<div class="controls span8">
						<input id="tbhSatuanBrg" class="span11 uppercase" type="text" name="tbhSatuanBrg">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button id="batal-satuan-barang" class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-satuan-barang" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
</div>

<div id="tbh-group" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Tambah Group
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" />
				<div class="control-group">
				</div>
				<div class="control-group">
					<label class="control-label span4" for="namaGroup">Nama Group</label>
					<div class="controls span8">
						<input id="namaGroup" class="span11 uppercase" type="text" name="namaGroup">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button id="btn-btl-group" class="btn btn-danger btn-small pull-right" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-nama-group" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
</div>

<div id="tbh-jnsBrg" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Tambah Jenis Barang
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" />
				<div class="control-group">
				</div>
				<div class="control-group">
					<label class="control-label span4" for="namaJnsBrg">Nama Jenis Barang</label>
					<div class="controls span8">
						<input id="namaJnsBrg" class="span11 uppercase" type="text" name="namaJnsBrg">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button id="btn-btl-jnsBrg" class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-tbh-jnsbrg" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
</div>

<div id="tbh-merk" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Tambah Merk
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" />
				<div class="control-group">
				</div>
				<div class="control-group">
					<label class="control-label span4" for="namaMerk">Nama Merk</label>
					<div class="controls span8">
						<input id="namaMerk" class="span11 uppercase" type="text" name="namaMerk">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button id="btn-btl-merk" class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-tbh-merk" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
</div>

<div id="edit-master" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Edit Master Barcode
		</div>
	</div> 
	
	<form id="form-edit-master" class="form-horizontal" />
	<div class="modal-body padding4" style="overflow-y:visible;">
		<div class="row-fluid">
			   
			<div class="control-group">
				<label class="control-label span3" for="ekodeBarcode">Kode Barcode</label>
				<div class="controls span9">
					<input id="ekodeBarcode" class="span11 uppercase" type="text" name="ekodeBarcode" readonly="readonly">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label span3" for="enamaBarang">Nama Barang</label>
				<div class="controls span9">
					<input id="enamaBarang" class="span11 uppercase" type="text" name="enamaBarang">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label span3" for="eisiBarang">Isi Barang</label>
				<div class="controls span2">
					<input id="eisiBarang" class="span11 number" type="text" name="eisiBarang">
				</div>
				<label class="control-label span2" for="esatuanBarang">Satuan</label>
				
				<div class="controls span5">
					<select id="esatuanBarang" name="esatuanBarang" class="form-control span8">  
						<?php foreach($satuanBrg as $val): ?>
							<option value="<?= $val->kode_satuan; ?>"><?= $val->nama_satuan; ?></option>
						<?php endforeach; ?> 
					</select>  
				</div>
			</div> 
			<div class="control-group">
				<label class="control-label span3" for="eketMaster">Keterangan</label>
				<div class="controls span8">
					<input id="eketMaster" class="span12 uppercase" type="text" name="eketMaster"> 
				</div>
			</div>  
				
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-edit-master" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
</div>

<div id="modal-delete" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Pemberitahuan
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid padding-4"> 
			<div class="widget-main">  
				<div class="row-fluid">
					<p><i class="icon-ok green"></i> Apakah yakin akan menghapus data master <b id="masterDel"></b> ? </p>
				</div>
			</div>  
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="delete-master" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-check bigger-110"></i>
			Ya
		</button> 
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
		var dataTable = $('#dt-data-master').dataTable( {
			// bAutoWidth: false,
			"aoColumns": [    
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },   
			  { "bSortable": false }, 
			  { "bSortable": false },     
			],
			// "aaSorting": [],
			// "bFilter":true, 
			// "info":true, 
			// "sScrollY": "300px",
			// "bPaginate": false,  
		}); 
		 		
		$('.btn-satuan-brng').click(function(){
			var val = $(this).val(); 
			if(val==1){	$('#tbh-master').modal('hide'); }
			else { $('#tbh-manual').modal('hide'); }
			
			$('#tbh-satuan-barang').modal('show');   
			$('#batal-satuan-barang').val(val);
			$('#save-satuan-barang').val(val);
			$('#tbhSatuanBrg').val('');
		}); 
		
		$('#batal-satuan-barang').click(function(){
			var val = $(this).val(); 
			if(val==1){	$('#tbh-master').modal('show'); }
			else { $('#tbh-manual').modal('show'); }
			$('#tbh-satuan-barang').modal('hide');  
		});
		
		$('#save-satuan-barang').click(function(){
			var val = $(this).val();
			var tbhSatuanBrg = $('#tbhSatuanBrg').val(); 
			var option = ''; 
			if(tbhSatuanBrg!=""){
				$('#tbh-satuan-barang').modal('hide');
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Bhp/tambah_satuan_barang',
				data: {'namaSatuan':tbhSatuanBrg}, 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							var option = '<option value="'+data.kode+'" selected>'+tbhSatuanBrg+'</option>';
							if(val==1){ 
								$('#form-tbh-master1 #satuanBarang').append(option); 
								$('#tbh-master').modal('show');
							} else {
								$('#form-tbh-master2 #satuanBarang').append(option); 
								$('#tbh-manual').modal('show');
							}
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});  
			} else {
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu satuan barang',
					class_name: 'gritter-error gritter-center'
				});  
			}
		});
		
		$('#groupBrg').change(function(){
			var kodeGroup = $(this).val();
			var option ="<option value=''>-- Pilih --</option>";
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/get_jenis_barang',
				data: {'kodeGroup':kodeGroup}, 
				type: 'post',
				dataType:'json',
				success: function(data){	 
					$.each(data, function(key,value) {  
						if(value.kode_jenis!=null){
							option += '<option value="'+value.kode_jenis+'">'+value.nama_jenis+'</option>';
						}
					});   							
					$('#jnsBrg').prop('disabled', false); 
					$('#jnsBrg').empty(); 
					$('#jnsBrg').append(option); 	 
					
				}		
			});
			$('#form-tbh-master2 #kodeBarcode').val('');
			$('#merkBrg').empty('');
			$('#merkBrg').attr('disabled','disabled');
		});
		
		$('#jnsBrg').change(function(){
			var kodeGroup = $('#groupBrg').val();
			var kodeJns = $(this).val(); 
			var option ="<option value=''>-- Pilih --</option>";
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/get_merk_barang',
				data: {'kodeGroup':kodeGroup, 'kodeJns':kodeJns}, 
				type: 'post',
				dataType:'json',
				success: function(data){	 
					$.each(data, function(key,value) {    
						if(value.kode_merk!=null){
							option += '<option value="'+value.kode_merk+'">'+value.nama_merk+'</option>';
						}
					});   							
					$('#merkBrg').prop('disabled', false); 
					$('#merkBrg').empty(); 
					$('#merkBrg').append(option); 	
					// $('#merkBrg option:first').attr('selected','selected').change();
				}		
			});
			
		});
		
		$('#merkBrg').change(function(){
			generate_barcode();
		});
		
		$('#form-tbh-master1').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: { 			
				kodeBarcode: { required: true, },   
				namaBarang: { required: true, }, 
				isiBarang: { required: true, }, 
				kelengkapan: { required: true, }, 
				ketMaster: { required: true, }, 
				
			},
			messages: {  
				kodeBarcode:  "Barcode harus diisi.",  					
				namaBarang:  "Nama barang harus diisi.",  				
				isiBarang:  "Isi barang harus diisi.",  				
				kelengkapan:  "kelengkapan harus diisi.",  				
				ketMaster:  "Keterangan harus diisi.",  				
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
				$('#tbh-master').modal('hide');
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Bhp/simpan_master',
				data: $('#form-tbh-master1').serialize(), 
				type: 'post',
				dataType:'json',
				success: function(data){	 
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di simpan',
								class_name: 'gritter-info gritter-center'
							});  
							setTimeout(function(){
							  reload_page();
							}, 2000);
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});
				// form.submit();   
			}  
		});   
		
		$('#form-tbh-master2').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: { 			
				kodeBarcode: { required: true, minlength:16 },   
				namaBarang: { required: true, }, 
				isiBarang: { required: true, }, 
				kelengkapan: { required: true, }, 
				ketMaster: { required: true, }, 
				
			},
			messages: {  
				kodeBarcode:  { required: "Barcode harus diisi.", minlength:"Barcode tidak sesuai" },  					
				namaBarang:  "Nama barang harus diisi.",  				
				isiBarang:  "Isi barang harus diisi.",  				
				kelengkapan:  "kelengkapan harus diisi.",  				
				ketMaster:  "Keterangan harus diisi.",  				
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
				$('#tbh-manual').modal('hide');
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Bhp/simpan_master',
				data: $('#form-tbh-master2').serialize(), 
				type: 'post',
				dataType:'json',
				success: function(data){	 
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di simpan',
								class_name: 'gritter-info gritter-center'
							});  
							setTimeout(function(){
							  reload_page();
							}, 2000);
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});
				// form.submit();   
			} 
		}); 
		
		$('#form-edit-master').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: { 			
				ekodeBarcode: { required: true, },   
				enamaBarang: { required: true, }, 
				eisiBarang: { required: true, }, 
				ekelengkapan: { required: true, }, 
				eketMaster: { required: true, }, 
				
			},
			messages: {  
				ekodeBarcode:  "Barcode harus diisi.",  					
				enamaBarang:  "Nama barang harus diisi.",  				
				eisiBarang:  "Isi barang harus diisi.",  				
				ekelengkapan:  "kelengkapan harus diisi.",  				
				eketMaster:  "Keterangan harus diisi.",  				
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
				$('#edit-master').modal('hide');
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Bhp/update_master',
				data: $('#form-edit-master').serialize(), 
				type: 'post',
				dataType:'json',
				success: function(data){	 
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di simpan',
								class_name: 'gritter-info gritter-center'
							});  
							setTimeout(function(){
							  reload_page();
							}, 2000);
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});
				// form.submit();   
			}  
		});   
		
		$('#btn-btl-group').click(function(){
			$('#tbh-group').modal('hide');
			$('#tbh-manual').modal('show'); 
		});
		
		$('#btn-tbh-group').click(function(){
			$('#tbh-manual').modal('hide');
			$('#tbh-group').modal('show'); 
			$('#namaGroup').val('');
		});
		
		$('#save-nama-group').click(function(){ 
			var namaGroup 	= $('#namaGroup').val(); 			
			var option = ''; 
			if(namaGroup!=""){
				$('#tbh-group').modal('hide'); 
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Bhp/tambah_group',
				data: {'namaGroup':namaGroup}, 
				type: 'post',
				dataType:'json',
				success: function(data){ 
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							var option = '<option value="'+data.kode+'" selected>'+namaGroup+'</option>'; 
							$('#groupBrg').append(option); 
							$('#tbh-manual').modal('show');
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});
			} else {
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu nama group',
					class_name: 'gritter-error gritter-center'
				}); 
			} 
			
		});  
		
		$('#btn-btl-jnsBrg').click(function(){
			$('#tbh-jnsBrg').modal('hide');
			$('#tbh-manual').modal('show'); 
		});
		
		$('#btn-tbh-jnsbrg').click(function(){
			$('#tbh-manual').modal('hide');
			$('#tbh-jnsBrg').modal('show'); 
			$('#namaJnsBrg').val('');
		});
		
		$('#save-tbh-jnsbrg').click(function(){ 
			var groupBrg 	= $('#groupBrg').val(); 
			var namaJnsBrg 	= $('#namaJnsBrg').val(); 
			
			var option = ''; 
			if(namaJnsBrg!="" && groupBrg!=""){
				$('#tbh-jnsBrg').modal('hide'); 
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Bhp/tambah_jenisbrg',
				data: {'groupBrg':groupBrg,'namaJnsBrg':namaJnsBrg}, 
				type: 'post',
				dataType:'json',
				success: function(data){ 
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							var option = '<option value="'+data.kode+'" selected>'+namaJnsBrg+'</option>'; 
							$('#jnsBrg').append(option); 
							$('#jnsBrg').attr('disabled',false); 
							$('#tbh-manual').modal('show');
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});
			} else {
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu jenis barang atau group barang',
					class_name: 'gritter-error gritter-center'
				}); 
			} 
			
		});   
		
		$('#btn-btl-merk').click(function(){
			$('#tbh-merk').modal('hide');
			$('#tbh-manual').modal('show'); 
		});
		
		$('#btn-tbh-merk').click(function(){
			$('#tbh-manual').modal('hide');
			$('#tbh-merk').modal('show'); 
			$('#namaMerk').val('');
		});
		
		$('#save-tbh-merk').click(function(){ 
			var groupBrg 	= $('#groupBrg').val(); 
			var jnsBrg 		= $('#jnsBrg').val(); 
			var namaMerk 	= $('#namaMerk').val(); 
			
			var option = ''; 
			if(namaMerk!="" && jnsBrg!="" && groupBrg!=""){
				$('#tbh-merk').modal('hide'); 
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Bhp/tambah_merk',
				data: {'groupBrg':groupBrg,'jnsBrg':jnsBrg,'namaMerk':namaMerk}, 
				type: 'post',
				dataType:'json',
				success: function(data){ 
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							var option = '<option value="'+data.kode+'" selected>'+namaMerk+'</option>'; 
							$('#merkBrg').append(option); 
							$('#tbh-manual').modal('show');
							generate_barcode();
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});
			} else {
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu jenis barang atau group barang',
					class_name: 'gritter-error gritter-center'
				}); 
			} 
			
		});   
		 
		$('#dt-data-master').on('click','.btn-edit',function(){
			var barcode = $(this).closest('tr').find('.td1').text();
			var nmBarang= $(this).closest('tr').find('.td2').text();
			var isiBrg 	= $(this).closest('tr').find('.td3').text();
			var satuanBrg = $(this).closest('tr').find('.td4').text();
			var keterangan= $(this).closest('tr').find('.td5').text();
			$('#ekodeBarcode').val(barcode);
			$('#enamaBarang').val(nmBarang);
			$('#eisiBarang').val(isiBrg);			
			$('#esatuanBarang option').filter(function() {
				return this.text == satuanBrg; 
			}).prop('selected', true);
			$('#eketMaster').val(keterangan);
			$('#edit-master').modal('show');
		});
		
		$('#dt-data-master').on('click','.btn-remove',function(){
			var barcode = $(this).closest('tr').find('.td1').text();
			var cek = cek_delete(barcode);
			if(cek>0){
				$.gritter.add({
					title: 'Informasi',
					text: 'Data tidak dapat dihapus, karena sudah ada pada transaksi',
					class_name: 'gritter-error gritter-center'
				});  
			} else { 
				var nmBarang= $(this).closest('tr').find('.td2').text();
				$('#masterDel').empty();
				$('#masterDel').append(nmBarang); 
				$('#delete-master').val(barcode); 
				$('#modal-delete').modal('show'); 
			}
		}); 
		
		$('#delete-master').click(function(){
			var barcode = $(this).val();
			$('#modal-delete').modal('hide'); 
			$('#modalLoading').modal('show'); 
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/delete_master',
				data: {"barcode":barcode}, 
				type: 'post',
				dataType:'json',
				success: function(data){	  
					$('#modalLoading').modal('hide'); 
					if(data.msg){
						$.gritter.add({
							title: 'Informasi',
							text: 'Data berhasil di hapus',
							class_name: 'gritter-info gritter-center'
						});  
						setTimeout(function(){
						  reload_page();
						}, 2000);
					} else {
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal di hapus',
							class_name: 'gritter-error gritter-center'
						}); 
					}
				}		
			});
		});
		
	});
	
	function generate_barcode(){
		var kodeGroup 	= $('#groupBrg').val(); 
		var kodeJenis 	= $('#jnsBrg').val(); 
		var kodeMerk 	= $('#merkBrg').val();
		var kode = kodeGroup+kodeJenis+kodeMerk; 
		$.ajax({
		url: '<?php echo base_url(); ?>Bhp/get_maxbarcode_manual',
		data: {"kode":kode}, 
		type: 'post',
		dataType:'json',
		success: function(data){	  
				$('#form-tbh-master2 #kodeBarcode').val(data.barcode);
			}		
		});
	}
	
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Bhp/master';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		input.value = '';
		input.name = "masterbarang";
		input.type = "hidden";
		form.appendChild(input);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	}
	
	function cekBarcode(e){ 
		if(e==1){
			var barcode = $('#form-tbh-master1 #kodeBarcode').val(); 
			var btn = $('#form-tbh-master1 #save-tbh-master');
		} else {
			var barcode = $('#form-tbh-master2 #kodeBarcode').val(); 
			var btn = $('#form-tbh-master2 #save-tbh-master');
		}
		
		$.ajax({
			url: '<?php echo base_url(); ?>Bhp/cek_barcode',
			data: {'barcode':barcode}, 
			type: 'post',
			dataType:'json',
			async:false,
			success: function(data){	 
				if(data>0){
					$.gritter.add({
						title: 'Informasi',
						text: 'Kode barcode sudah di input sebelumnya',
						class_name: 'gritter-error gritter-center'
					});   
					btn.attr('disabled',true);
				} else {
					btn.attr('disabled',false);
				}		
			}		
		});
	} 
	
	function cek_delete(barcode){ 
		var cek = 0;
		$.ajax({
		url: '<?php echo base_url(); ?>Bhp/cek_delete_master',
		data: {"barcode":barcode}, 
		type: 'post',
		dataType:'json',
		async:false,
		success: function(data){	  
				cek=data;
			}		
		});
		return cek;
	}
</script>