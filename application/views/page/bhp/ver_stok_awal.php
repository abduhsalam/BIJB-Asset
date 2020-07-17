<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Verifikasi Input Stok Awal
		</small> 
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<div class="span6"> 
			<div class="control-group">
				<label class="control-label span3" for="searchBarang" style="padding-top:5px;">Cari </label>
				<div class="controls span8">
					<input id="searchBarang" class="span12 uppercase" type="text" name="searchBarang">
				</div> 
			</div> 
		</div>
		<div class="span6" style="background-color:#e4e6e9"> 
			<div class="span4" style="padding-top:5px; padding-left:10px; text-align:right;">
				<b>Total : </b>
			</div>
			<div class="span4" style="padding-top:5px; padding-left:10px; text-align:left;">
				<b id="totalPenambahan"><?= $totStokAwal; ?></b>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		
		<form id="form-stokawal-brg" class="form-horizontal" /> 
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
					$no=1;
					foreach($dtVerifikasi as $res){ ?>
					<tr id="<?= $res->id_stokopname; ?>">
						<td class="center"><?= $no++; ?></td>
						<td><?= $res->barcode; ?></td>
						<td class="td3"><?= $res->nama_barang; ?></td>
						<td class="center"><?= $res->isi_barang; ?></td>
						<td class="center">
						<input type="text" onKeyup="numberformat(this)" value="<?= $res->stok_nyata; ?>" class="jml2">
						</td>
						<td class="center">
							<button class="btn btn-info btn-minier edit-stokawal" type="button"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-minier del-stokawal" type="button"><i class="icon-remove"></i></button>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</table>
		</form>
		<div class="hr hr-double hr-dotted hr18"></div>
		<div class="control-group">
			<button id="simpan-ver-stokawal" class="btn btn-info btn-small pull-right" type="button">
				<i class="icon-save bigger-110"></i>
				Simpan Verifikasi
			</button> 
		</div>
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

<div id="modal-del" class="modal hide fade modal-xs" data-backdrop="static" >
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
					<p><i class="icon-ok green"></i> Apakah anda yakin akan menghapus stok awal barang <b id="namaBarang"></b> ? </p>
				</div>
			</div>  
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="delete-stokawal" class="btn btn-info btn-small pull-right" type="button">
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
		$('#scanBarcode').focus();
		var dataTable = $('#list-tbh-barang').dataTable( {
			bAutoWidth: false, 
			"aoColumns": [
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },  
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },  
			], 
			"aaSorting": [], 
			"info":false, 
			"sScrollY": "300px",
			"bPaginate": false, 
			"sDom": 'rt', 
		});  
		
		$("#searchBarang").on('keyup', function (){
			dataTable.fnFilter(this.value);
		});
		$('#simpan-ver-stokawal').click(function(){ 
			$('#modalLoading').modal('show'); 
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/simpan_ver_stokawal',
				data:{"id":"jw"}, 
				type: "post",
				dataType:'json', 
				success: function(data){  
					if(data.msg=='success'){
						$('#modalLoading').modal('hide');  
						$.gritter.add({
							title: 'Informasi',
							text: 'Stok Opname Berhasil Disimpan',
							class_name: 'gritter-info gritter-center'
						});	
						reload_page();
					} else {
						$('#modalLoading').modal('hide'); 
						$.gritter.add({
							title: 'Informasi',
							text: 'Stok opname Gagal Disimpan',
							class_name: 'gritter-error gritter-center'
						});	
					}
				}
			});
		});
		 		
		$('#list-tbh-barang').on('click','.edit-stokawal',function(){  
			var id = $(this).closest('tr').attr('id');  
			$('#'+id).find('.jml2').addClass('jumlah').removeClass('jml2');
			$('#'+id).find('.edit-stokawal').empty();
			$('#'+id).find('.edit-stokawal').append('<i class="icon-save"></i>');
			$('#'+id).find('.edit-stokawal').addClass('save-stokawal').removeClass('edit-stokawal'); 
		});
		
		$('#list-tbh-barang').on('click','.save-stokawal',function(){  
			$('#modalLoading').modal('show');
			var id 		= $(this).closest('tr').attr('id');  
			var stok 	= $('#'+id).find('.jumlah').val();
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/update_stok_awal',
				type: 'post',
				dataType: 'json', 
				data: {"id":id, "stok":stok},
				success: function (data) {  
					if(data.msg){
						$('#modalLoading').modal('hide');  
						$.gritter.add({
							title: 'Informasi',
							text: 'Data berhasil di update',
							class_name: 'gritter-info gritter-center'
						});	
						$('#'+id).find('.jumlah').addClass('jml2').removeClass('jumlah');
						$('#'+id).find('.save-stokawal').empty();
						$('#'+id).find('.save-stokawal').append('<i class="icon-pencil"></i>');
						$('#'+id).find('.save-stokawal').addClass('edit-stokawal').removeClass('save-stokawal');
						hitungTotal();
					} else {
						$('#modalLoading').modal('hide'); 
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal di update',
							class_name: 'gritter-error gritter-center'
						});	
					}
					
				}
			});  
		});
		
		$('#list-tbh-barang').on('click','.del-stokawal',function(){  
			var id = $(this).closest('tr').attr('id');
			var namaBarang = $(this).closest('tr').find('.td3').text();
			$('#namaBarang').empty(); 
			$('#namaBarang').append(namaBarang); 
			$('#delete-stokawal').val(id);
			$('#modal-del').modal('show'); 
		});
		
		$('#delete-stokawal').click(function(){
			$('#modal-del').modal('hide'); 
			var id = $(this).val();
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/delete_stok_awal',
				type: 'post',
				dataType: 'json', 
				data: {"id":id},
				success: function (data) {  
					if(data.msg){
						$('#modalLoading').modal('hide');  
						$.gritter.add({
							title: 'Informasi',
							text: 'Data berhasil di hapus',
							class_name: 'gritter-info gritter-center'
						});	 
						dataTable.fnDeleteRow(document.getElementById(id));
						hitungTotal();
					} else {
						$('#modalLoading').modal('hide'); 
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal di hapus',
							class_name: 'gritter-error gritter-center'
						});	
					}
					
				}
			});  
		})		
	});
	  
	
	function hitungTotal(){
		var total = 0;
		$('#list-tbh-barang').find('.jml2').each(function(){
			var tot = $(this).val();
			total = parseInt(total) + parseInt(tot);
		});
		$('#totalPenambahan').empty();
		$('#totalPenambahan').append(total);
	}
	
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Bhp/ver_stok_awal';
		 
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