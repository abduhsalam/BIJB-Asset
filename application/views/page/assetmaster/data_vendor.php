<div class="page-header position-relative">
	<h1>
		Master
		<small>
			<i class="icon-double-angle-right"></i>
			Data Vendor
		</small>
		<button class="btn btn-info btn-small btn-tbh-vendor pull-right">
			<i class="icon-plus">&nbsp;Tambah Vendor</i>
		</button>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-vendor">							
			<thead>
				<tr> 
					<th class="center">Jenis Vendor</th> 
					<th class="center">Nama Vendor</th>  
					<th class="center">Alamat</th> 
					<th class="center">Pajak</th> 
					<th class="center">Pemilik</th>   
					<th class="center">Action</th>  
				</tr>
			</thead>
				<?php foreach($dtVendor as $val): ?>
					<tr id="<?= $val->kode_vendor; ?>">
						<td class="td1"><?= $val->jenis_vendor; ?></td> 
						<td><?= $val->nama_vendor; ?></td>
						<td class=""><?= $val->alamat_vendor; ?></td> 
						<td class="center"><?= $val->pajak; ?></td>  
						<td class=""><?= $val->pemilik; ?></td>  
						<td class="center">
							<button class="btn btn-info btn-minier btn-edit">
								<i class="icon-pencil bigger-120"></i>
							</button> 
							<button class="btn btn-success btn-minier btn-detail">
								<i class="icon-search"></i>
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

<div id="tbh-vendor" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Tambah Vendor
		</div>
	</div>

	<div class="modal-body padding4">
		<div class="row-fluid">
			<form id="form-tbh-vendor" class="form-horizontal" />  
				<div class="control-group">
					<label class="control-label span3" for="jnsVendor">Jenis Vendor</label>
					<div class="controls"> 
						<label>
							<input type="radio" value="perorangan" name="jnsVendor" checked>
							<span class="lbl"> PERORANGAN</span> 
							<input type="radio" value="perusahaan" name="jnsVendor">
							<span class="lbl"> PERUSAHAAN</span>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="tbhNamaVendor">Nama Vendor</label>
					<div class="controls span9">
						<input id="tbhNamaVendor" class="span11 uppercase" type="text" name="tbhNamaVendor">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="jnsPenyedia">Jenis Penyedia</label>
					
					<div class="controls span8">
						<select id="jnsPenyedia" name="jnsPenyedia" class="chzn-select chzn-select-modal"> 
						<option value=""></option>
							<?php foreach($jnsPenyedia as $val): ?>
								<option value="<?= $val->kode_jnspenyedia; ?>"><?= $val->nama_jnspenyedia; ?></option>
							<?php endforeach; ?>
						</select>  
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="alamat">Alamat</label>
					<div class="controls span9">
						<input id="alamat" class="span11 uppercase" type="text" name="alamat">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="PKP">PKP</label>
					<div class="controls"> 
						<label>
							<input type="radio" value="PKP" name="pajak" checked>
							<span class="lbl"> PKP</span> 
							<input type="radio" value="NONPKP" name="pajak">
							<span class="lbl"> NON PKP</span>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="pemilik">Pemilik</label>
					<div class="controls span6">
						<input id="pemilik" class="span12 uppercase" type="text" name="pemilik">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="noTlp">No. Tlp/ HP</label>
					<div class="controls span8">
						<input id="noTlp" class="span6 uppercase" type="text" name="noTlp" placeholder="No Tlp">
						<input id="noHp" class="span6 uppercase" type="text" name="noHp" placeholder="No HP">
					</div>
				</div> 
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-tbh-vendor" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
</div>

<div id="edit-vendor" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Edit Vendor
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form id="form-upd-vendor" class="form-horizontal" />  
				<div class="control-group">
					<label class="control-label span3" for="edtNamaVendor">Nama Vendor</label>
					<div class="controls span9">
						<input id="edtNamaVendor" class="span11 uppercase" type="text" name="edtNamaVendor">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="edtJnsPenyedia">Jenis Penyedia</label>
					
					<div class="controls span8">
						<select id="edtJnsPenyedia" name="edtJnsPenyedia" class="chzn-select chzn-select-modal"> 
						<option value=""></option>
							<?php foreach($jnsPenyedia as $val): ?>
								<option value="<?= $val->kode_jnspenyedia; ?>"><?= $val->nama_jnspenyedia; ?></option>
							<?php endforeach; ?>
						</select>  
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="edtAlamat">Alamat</label>
					<div class="controls span9">
						<input id="edtAlamat" class="span11 uppercase" type="text" name="edtAlamat">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="edtPajak">PKP</label>
					<div class="controls"> 
						<label>
							<input type="radio" class="edtPajak" value="PKP" name="edtPajak">
							<span class="lbl"> PKP</span> 
							<input type="radio" class="edtPajak" value="NONPKP" name="edtPajak">
							<span class="lbl"> NON PKP</span>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="edtPemilik">Pemilik</label>
					<div class="controls span6">
						<input id="edtPemilik" class="span12 uppercase" type="text" name="edtPemilik">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="edtNoTlp">No. Tlp/ HP</label>
					<div class="controls span8">
						<input id="edtNoTlp" class="span6 uppercase" type="text" name="edtNoTlp" placeholder="No Tlp">
						<input id="edtNoHp" class="span6 uppercase" type="text" name="edtNoHp" placeholder="No HP">
						<input id="edtKdVendor" type="hidden" name="edtKdVendor" readonly="readonly">
					</div>
				</div> 
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-upd-vendor" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
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
		var dataTable = $('#dt-data-vendor').dataTable( {
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
		
		$('.chzn-select-modal').chosen({width:"250px"});
		$('.btn-tbh-vendor').click(function(){
			$('#tbh-vendor').modal('show');   
			$('#form-tbh-vendor')[0].reset();
		});
		
		$('#save-tbh-vendor').click(function(){
			var namaVendor	= $('#tbhNamaVendor').val();
			var jnsPenyedia	= $('#jnsPenyedia').val();
			var alamat		= $('#alamat').val();
			var pemilik		= $('#pemilik').val();
			var noTlp		= $('#noTlp').val();
			var noHp		= $('#noHp').val(); 
			if(namaVendor=='' || jnsPenyedia=='' || alamat=='' || pemilik=='' || noTlp=='' || noHp==''){
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan lengkapi form yang tersedia',
					class_name: 'gritter-error gritter-center'
				}); 
			} else {
				$.ajax({
				url: '<?php echo base_url(); ?>Assetmaster/tambah_vendor_asset',
				data: $('#form-tbh-vendor').serialize(), 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#tbh-vendor').modal('hide');
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
			}
		});
		
		$('#dt-data-vendor').on('click','.btn-edit',function(){  
			var idVendor	= ($(this).closest('tr').attr('id')).trim();
			$('#edtKdVendor').val(idVendor);
			$('.edtPajak').each(function(){ $(this).prop('checked',false); })
			$.ajax({
			url: '<?php echo base_url(); ?>Assetmaster/get_vendor_byid',
			data: {'idVendor':idVendor}, 
			type: 'post',
			dataType:'json',
			success: function(data){	  
					$('#edtNamaVendor').val(data.nama_vendor);  
					$('#edtJnsPenyedia').val(data.kode_jnspenyedia); 
					$('#edtJnsPenyedia').trigger('liszt:updated'); 
					$('#edtAlamat').val(data.alamat_vendor); 
					$('#edtPemilik').val(data.pemilik); 
					$('#edtNoTlp').val(data.no_telepon); 
					$('#edtNoHp').val(data.no_hp); 		  
					$('input:radio[name=edtPajak][value='+data.pajak+']').prop('checked', true);
				}		
			}); 
			$('#edit-vendor').modal('show');  
		});
		
		$('#save-upd-vendor').click(function(){
			var namaVendor	= $('#edtNamaVendor').val();
			var jnsPenyedia	= $('#edtJnsPenyedia').val();
			var alamat		= $('#edtAlamat').val();
			var pemilik		= $('#edtPemilik').val();
			var noTlp		= $('#edtNoTlp').val();
			var noHp		= $('#edtNoHp').val(); 
			if(namaVendor=='' || jnsPenyedia=='' || alamat=='' || pemilik=='' || noTlp=='' || noHp==''){
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan lengkapi form yang tersedia',
					class_name: 'gritter-error gritter-center'
				}); 
			} else {
				$.ajax({
				url: '<?php echo base_url(); ?>Assetmaster/update_vendor',
				data: $('#form-upd-vendor').serialize(), 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#edit-vendor').modal('hide');
						if(data.msg){ 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di update',
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
			}
		});
		
		function reload_page(){
			 
			var form = document.createElement("form"); 
			var input = document.createElement("input"); 
			 
			var action=''; 
			form.method = "POST"; 
			action = 'Assetmaster/data_vendor';
			 
			form.action = "<?php echo base_url(); ?>" + action,
			 
			
			input.value = '';
			input.name = "vendor";
			input.type = "hidden";
			form.appendChild(input);
			// form.target = "_blank";
			
			document.body.appendChild(form);

			form.submit();		
		}
	});
</script>