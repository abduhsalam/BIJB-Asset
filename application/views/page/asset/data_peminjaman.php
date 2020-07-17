<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Data Peminjaman Asset
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-peminjaman">							
			<thead>
				<tr> 
					<!--<th class="center">Kode Asset</th> -->
					<th class="center">Nama Asset</th> 
					<th class="center">Tgl Pinjam</th>
					<th class="center">Tgl Kembail</th> 
					<th class="center">Unit Peminjam</th> 
					<th class="center">Nama Pemiinjam</th> 
					<th class="center">Unit Asal</th>  
					<th class="center">Pengguna Asal</th> 
					<th class="center">Status</th> 
				</tr>
			</thead>
				<?php foreach($dtPeminjaman as $val): ?> 
					<tr id="<?= $val->id_peminjaman; ?>">
						<!--<td class="td1"><?= $val->kode_asset; ?></td>-->
						<td class="td1"><?= $val->nama_barang; ?></td>
						<td class="center"><?= date("d-m-Y", strtotime($val->tgl_peminjaman)); ?></td>
						<td><?= date("d-m-Y", strtotime($val->tgl_pengembalian)); ?></td>
						<td><?= $val->unit_kerja; ?></td>
						<td class="center"><?= $val->user_name; ?></td>
						<td class="center"><?= $val->unit_asal; ?></td> 
						<td class="center"><?= $val->pengguna_asal; ?></td>  
						<td class="td8 center">
							<?php if($val->status > 0){ ?>
							<button class="btn btn-primary btn-minier btn-action">
								<i class="icon-check bigger-120"></i>
							</button>
							<?php } else { ?>
							<span class="label label-success arrowed-in-right arrowed">DIKEMBALIKAN</span>
							<?php } ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<tbody> 
			</tbody>
		</table>
	</div>
</div>

<div id="modal-action" class="modal hide fade modal-xs" data-backdrop="static" >
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
					<p><i class="icon-ok green"></i> Apakah benar asset <b id="namaBrg"></b> sudah dikembalikan ? </p>
				</div>
			</div>  
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-action" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-check bigger-110"></i>
			Ya
		</button> 
	</div>
</div> 

<style>

@media (min-width: 1200px) {
	.modal-xs{ 	 
		width: 370px; margin-left: -185px;
	} 
}
     
/* Portrait tablet to landscape and desktop */
@media (min-width: 768px) and (max-width: 979px) {
	.modal-xs{ 	 
		width: 370px; margin-left: -185px;
	} 
}

/* Landscape phone to portrait tablet */
@media (max-width: 767px) { 
	 
}
     
/* Landscape phones and down */
@media (max-width: 480px) { 
	 
}
</style>   

<script type="text/javascript">
	$(document).ready(function () { 
		var dataTable = $('#dt-data-peminjaman').dataTable( {
			bAutoWidth: false,
			"aoColumns": [    
			  null, 
			  null, 
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
	});
	
	$('#dt-data-peminjaman').on('click','.btn-action',function(){    
		var idPeminjaman	= ($(this).closest('tr').attr('id')).trim();   
		var namaBrg	= ($(this).closest('tr').find('.td1').text()).trim();   
		$('#namaBrg').empty();
		$('#namaBrg').append(namaBrg);
		$('#save-action').val(idPeminjaman);
		$('#modal-action').modal('show');
	});
	
	$('#save-action').click(function(){
		var idPeminjaman 	= $(this).val();   
		$.ajax({
		url: '<?php echo base_url(); ?>Asset/update_status_peminjaman',
		data: {'idPeminjaman':idPeminjaman}, 
		type: 'post',
		dataType:'json',
		success: function(data){
				$('#modal-action').modal('hide'); 
				if(data.msg){
					$('#'+idPeminjaman).find('.btn-action').remove(); 
					$('#'+idPeminjaman).find('.td8').empty(); 
					$('#'+idPeminjaman).find('.td8').append('<span class="label label-success arrowed-in-right arrowed">DIKEMBALIKAN</span>'); 
				} else {
					$.gritter.add({
						title: 'Informasi',
						text: 'Data gagal disimpan',
						class_name: 'gritter-error gritter-center'
					}); 
				} 
			},
		// error: function (error) { 
			// // console.log(error); 	
			// $('#modalLoading').modal('hide'); 
			// $.gritter.add({
				// title: 'Informasi',
				// text: 'Data gagal disimpan',
				// class_name: 'gritter-error gritter-center'
			// }); 
		// }
		});  
	}); 
</script>