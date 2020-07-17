<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Stok Belum Melakukan Stok Opname
		</small> 
	</h1>
</div><!--/.page-header--> 
<div class="row-fluid">
	<div class="span12">
		
		<form id="form-stokopname-brg" class="form-horizontal" /> 
			<table class="table table-striped table-bordered" id="list-tbh-barang">							
				<thead>
					<tr> 
						<th class="center">No</th> 
						<th class="center">Barcode</th> 
						<th class="center">Nama Barang</th>  
						<th class="center">Isi Barang</th> 
						<th class="center">Stok</th>  
						<th class="center">#</th>    
					</tr>
				</thead>
					
				<tbody> 
					<?php 
					$no = 1;
					foreach($dtStok as $val):?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $val->barcode; ?></td>
						<td><?= $val->nama_barang; ?></td>
						<td><?= $val->isi_barang; ?></td>
						<td><?= $val->stok; ?></td>
						<td>-</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</table>
		</form>
		<div class="hr hr-double hr-dotted hr18"></div>
		 
	</div>
</div>
<style>
input[readonly]{
    background-color: transparent !important;
}
.barcode { 
	width:150px !important; 
	border: none !important; 
	background-color: transparent !important;
	outline: none !important;
	color:#393939 !important;  
	font-family: "Open Sans"; 
	height:15px !important; 
	font-size:13px !important
}

.jumlah {
	width:30px !important; 
	height:15px !important; 
	font-size:12px !important; 
	text-align:center;
} 

.jml2 { 
	width:30px !important; 
	border: none !important; 
	background-color: transparent !important;
	outline: none !important;
	color:#393939 !important;  
	font-family: "Open Sans"; 
	height:15px !important; 
	font-size:13px !important
}

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
		$('#scanBarcode').focus();
		var dataTable = $('#list-tbh-barang').dataTable( {
			bAutoWidth: false,
			"columnDefs": [  
				{ className:"center", "targets": [ 5 ] },
				{ className:"center", "targets": [ 4 ] },
				{ className:"center", "targets": [ 3 ] },
				{ className:"td3", "targets": [ 2 ] },
				{ className:"td2", "targets": [ 1 ] },
				{ className:"center no", "targets": [ 0 ], "visible": false, }
			], 
			"aoColumns": [
			  null,  
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },
			  { "bSortable": false },
			  { "bSortable": false }, 
			],
			"order": [[0,'desc']],
			"info":false, 
			"sScrollY": "300px",
			"bPaginate": false, 
			"sDom": 'rt'
		});  
		
		$('#simpan-stokopname').click(function(){ 
			$('#modalLoading').modal('show'); 
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/simpan_stok_opname',
				data: $('#form-stokopname-brg').serialize(), 
				type: "post",
				dataType:'json', 
				success: function(data){  
					if(data.msg=='success'){
						$('#modalLoading').modal('hide');  
						$.gritter.add({
							title: 'Informasi',
							text: 'Penambahan Barang Berhasil Disimpan',
							class_name: 'gritter-info gritter-center'
						});	
						reload_page();
					} else {
						$('#modalLoading').modal('hide'); 
						$.gritter.add({
							title: 'Informasi',
							text: 'Penambahan Barang Gagal Disimpan',
							class_name: 'gritter-error gritter-center'
						});	
					}
				}
			});
		});
		$('#list-tbh-barang').on('change','.jumlah',function(){ 
			var jml = $(this).val(); 			
			var stokData = $(this).closest('tr').find('.stokData').val();
			var selisih2 = parseInt(jml)-parseInt(stokData);
			$(this).closest('tr').find('.selisih').val(selisih2);
			hitungTotal();
		});
		
		 
		
	});	  
	
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Bhp/stok_opname';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		input.value = '';
		input.name = "tambah";
		input.type = "hidden";
		form.appendChild(input);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	}
</script>