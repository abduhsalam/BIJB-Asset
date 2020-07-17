<div class="page-header position-relative">
	<h1>
		Master
		<small>
			<i class="icon-double-angle-right"></i>
			Jenis Penyedia Vendor
		</small> 
	</h1>
</div><!--/.page-header-->

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

<div class="row-fluid">
	<div class="span12">
		<div class="span5">
			<div class="row-fluid">
				<div class="span12">
					<form id="form-sbr-anggaran" class="form-horizontal" /> 
		
						<div class="control-group">
							<label class="control-label span4" for="namaPenyedia">Nama Jns Penyedia</label>
							<div class="controls span8">
								<input id="namaPenyedia" type="text" name="namaPenyedia" class="uppercase"> 
							</div> 
						</div> 
						<div class="hr hr-double hr-dotted hr18"></div>
						<div class="control-group">
							<button id="simpan" class="btn btn-info btn-small pull-right" type="button">
								<i class="icon-save bigger-110"></i>
								Simpan
							</button> 
							<button id="update" class="btn btn-info btn-small pull-right" type="button" style="display:none">
								<i class="icon-save bigger-110"></i>
								Update
							</button> 
						</div>
					</form>	
				</div>
			</div>
		</div> 
		<div class="span7">	 			
			<table class="table table-striped table-bordered" id="dt-list-jnspenyedia">
				<thead>
					<tr>
						<th class="center">No</th>  
						<th class="center">Kode</th>  
						<th class="center">Nama Jns Penyedia</th>   
						<th class="center">#</th>   
					</tr>
				</thead>
				
				<tbody id="">						
					
					<?php 
					$no = 1;
					foreach($dtJnsPenyedia as $val): ?>
					<tr id="">
						<td class="center"><?= $no++; ?></td>
						<td class="center td2"><?= $val->kode_jnspenyedia; ?></td>
						<td class="center td3"><?= $val->nama_jnspenyedia; ?></td> 
						<td class="center">
							<button type="button" class="btn-edit btn btn-info btn-minier">
								<i class="icon-pencil"></i>
							</button>
							<button type="button" class="btn-delete btn btn-danger btn-minier">
								<i class="icon-remove"></i>
							</button>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>  
			
		</div>
	</div>
</div>  

<!--- MODAL START --> 
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
					<p><i class="icon-trash red"></i> Apakah benar akan menghapus <b id="namaDel"></b></p>
				</div>
			</div>  
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="delete-action" class="btn btn-info btn-small pull-right" type="button">
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
		 
		var dataTable = $('#dt-list-jnspenyedia').dataTable( {
			// bAutoWidth: false,
			"aoColumns": [    
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },   
			],
			"aaSorting": [],
			"bFilter":true, 
			"info":true, 
			"sScrollY": "280px",
			"bPaginate": false,  
		});  
		
		$('#simpan').click(function(){  
			var jnsPenyedia = $('#namaPenyedia').val();  
			if(jnsPenyedia!=""){
				var cek = cekJnsPenyedia();
				if(cek<1){
					$('#modalLoading').modal('show');
					$.ajax({
					url: '<?php echo base_url(); ?>Assetmaster/tambah_jenis_penyedia',
					data: {"jnsPenyedia":jnsPenyedia}, 
					type: 'post',
					dataType:'json',
					success: function(data){	
							$('#modalLoading').modal('hide');
							if(data.msg){ 
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
				} else {
					$.gritter.add({
						title: 'Informasi',
						text: 'Nama jenis barang sudah ada sebelumnya',
						class_name: 'gritter-error gritter-center'
					});
					$('#namaPenyedia').focus();
				}
			} else {
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu sumber anggaran',
					class_name: 'gritter-error gritter-center'
				});  
				$('#namaPenyedia').focus();
			}
		}); 
		
		$('#dt-list-jnspenyedia').on('click','.btn-edit',function(){
			var kode 	 	= $(this).closest('tr').find('.td2').text(); 
			var namaPenyedia	= $(this).closest('tr').find('.td3').text(); 
			$('#namaPenyedia').val(namaPenyedia);  
			$('#update').val(kode);
			$('#update').show();
			$('#simpan').hide();
		});
		
		$('#update').click(function(){  
			var namaPenyedia = $('#namaPenyedia').val();
			var kode = $(this).val(); 
			$('#modalLoading').modal('show');
			$.ajax({
			url: '<?php echo base_url(); ?>Assetmaster/update_jnspenyedia',
			data: {'kode':kode, 'namaPenyedia':namaPenyedia}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
					$('#modalLoading').modal('hide');
					if(data){ 
						$.gritter.add({
							title: 'Informasi',
							text: 'Data berhasil di update',
							class_name: 'gritter-info gritter-center'
						});  
						setTimeout(function(){
						  reload_page();
						}, 2000);
					} 
					else {
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal diupdate',
							class_name: 'gritter-error gritter-center'
						});  
					}
				}		
			}); 
		});
		
		$('#delete-action').click(function(){ 
			var kode = $(this).val(); 
			$('#modal-delete').modal('hide');
			$('#modalLoading').modal('show');
			$.ajax({
			url: '<?php echo base_url(); ?>Assetmaster/delete_jnspenyedia',
			data: {'kode':kode}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
					$('#modalLoading').modal('hide');
					if(data.delete=='YES'){ 
						if(data.msg){
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di update',
								class_name: 'gritter-info gritter-center'
							});  
							setTimeout(function(){
							  reload_page();
							}, 2000);
						} else  {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data tidak bisa di hapus',
								class_name: 'gritter-error gritter-center'
							}); 
						}
					} 
					else {
						$.gritter.add({
							title: 'Informasi',
							text: 'Data masi digunakan sehingga tidak bisa di hapus',
							class_name: 'gritter-error gritter-center'
						});  
					}
				}		
			}); 
		})
		
		$('#dt-list-jnspenyedia').on('click','.btn-delete',function(){ 
			var kode 	 	= $(this).closest('tr').find('.td2').text(); 
			var jnsAsset 	= $(this).closest('tr').find('.td3').text(); 
			$('#delete-action').val(kode);
			$('#namaDel').empty();
			$('#namaDel').append(jnsAsset);
			$('#modal-delete').modal('show');
		});
	}); 
	
	function cekJnsPenyedia(){
		var jnsPenyedia = $('#namaPenyedia').val();
		var cek =0;
		$.ajax({
		url: '<?php echo base_url(); ?>Assetmaster/cek_jnspenyedia',
		data: {'jnsPenyedia':jnsPenyedia}, 
		type: 'post',
		dataType:'json',
		async:false,
		success: function(data){	 
				//if jika status = aktif dan tanggal sama
				if(data>0){ 
					cek = 1;
				} else {
					cek = 0;
				}
			}		
		});
		
		return cek;
	}
	
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Assetmaster/jenis_penyedia';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		input.value = '';
		input.name = "jnspenyedia";
		input.type = "hidden";
		form.appendChild(input);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	}
</script>
