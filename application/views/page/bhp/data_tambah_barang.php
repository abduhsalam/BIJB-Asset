<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Data Tambah Barang
		</small> 
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-tbhbrg">							
			<thead>
				<tr> 
					<th class="center">Kode Penambahan</th> 
					<th class="center">Tgl Input</th> 
					<th class="center">Barcode</th> 
					<th class="center">Nama Barang</th>  
					<th class="center">Jumlah</th>     
					<th class="center">#</th>     
				</tr>
			</thead>
				<?php 
				foreach($dtTbhBrg as $val): ?>
				<tr id="<?= $val->id_transaksiphb; ?>">
					<td><?= $val->kode_pengajuan; ?></td>
					<td><?= date("d-m-Y", strtotime($val->tgl_transaksi)); ?></td>
					<td class="td3"><?= $val->barcode; ?></td>
					<td class="center"><?= $val->nama_barang; ?></td>
					<td class="center"><input type="text" onKeyup="numberformat(this)" name="jumlah" value="<?= $val->jumlah; ?>" class="jumlah" readonly="readonly"> </td> 
					<td class="center">
						<button type="button" class="btn btn-info btn-minier btn-edit">
							<i class="icon-pencil bigger-120"></i>
						</button>
						<button type="button" class="btn btn-success btn-minier btn-save" style="display:none">
							<i class="icon-save bigger-120"></i>
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
.jumlah {
	width:30px !important; 
	height:15px !important; 
	font-size:12px !important; 
	text-align:center;
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
		var dataTable = $('#dt-data-tbhbrg').dataTable( {
			// bAutoWidth: false,
			"aoColumns": [    
			  { "bSortable": false },  
			  { "bSortable": false }, 
			  { "bSortable": false },   
			  { "bSortable": false },   
			  { "bSortable": false }, 
			  { "bSortable": false },     
			],
			"aaSorting": [],
			// "bFilter":true, 
			// "info":true, 
			// "sScrollY": "300px",
			// "bPaginate": false,  
		}); 	
		
		$('#dt-data-tbhbrg').on('click','.btn-edit',function(){
			$(this).closest('tr').find('.jumlah').attr('readonly',false);
			$(this).closest('tr').find('.btn-save').show();
			$(this).closest('tr').find('.btn-edit').hide();
		});
		
		$('#dt-data-tbhbrg').on('click','.btn-save',function(){
			var id 	= $(this).closest('tr').attr('id');
			var jml = $(this).closest('tr').find('.jumlah').val();
			$('#modalLoading').modal('show');  
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/update_tambah_barang',
				data: {"id":id,"jml":jml} , 
				type: "post",
				dataType:'json', 
				success: function(data){  
					if(data.msg){
						$('#modalLoading').modal('hide');  
						$.gritter.add({
							title: 'Informasi',
							text: 'Jumlah berhasil diupdate',
							class_name: 'gritter-info gritter-center'
						});	 
						$('#'+id).closest('tr').find('.jumlah').attr('readonly',true);
						$('#'+id).closest('tr').find('.btn-save').hide();
						$('#'+id).closest('tr').find('.btn-edit').show();
					} else {
						$('#modalLoading').modal('hide'); 
						$.gritter.add({
							title: 'Informasi',
							text: 'Jumlah gagal diupdate',
							class_name: 'gritter-error gritter-center'
						});	
					}
				}
			});
		});
	});
</script>