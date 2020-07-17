<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Data Pengajuan User
		</small> 
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-pengajuan">							
			<thead>
				<tr> 
					<th class="center">No Pengajuan</th> 
					<th class="center">Tgl Pengajuan</th>  
					<th class="center">Jml Pengajuan</th> 
					<th class="center">Status</th> 
					<th class="center">Keterangan</th>    
					<th class="center">Action</th>    
				</tr>
			</thead>
				<?php 
				$i=0;
				foreach($dtPengajuan as $val): 
				if ($val->status=="PENGAJUAN")
				{
					$status = '<span class="label label-info arrowed-right arrowed-in">PENGAJUAN</span>'; 
				} 
				else if ($val->status=="DITUNDA") 
				{ 
					$status = '<span class="label label-warning arrowed-in arrowed-in-right">DITUNDA</span>';	
				} 
				else if ($val->status=="DITOLAK") 
				{ 
					$status = '<span class="label label-important arrowed arrowed-right">DITOLAK</span>';	
				} 
				else if ($val->status=="PROSES") 
				{
					$status = '<span class="label label-primary arrowed-right">PROSES</span>';	
				} 
				else if ($val->status=="TERSEDIA") 
				{
					$status = '<span class="label label-purple">TERSEDIA</span>';	
				} 
				else if ($val->status=="DISTRIBUSI") 
				{
					$status = '<span class="label label-pink arrowed">DISTRIBUSI</span>';	
				} 
				else {
					$status = '<span class="label label-success arrowed-in-right arrowed">TERIMA</span>';	
				}
				$i = $i+1;
				?>
				<tr id="<?= $i ?>">
					<td class="td1"><?= $val->kode_pengajuan; ?></td>
					<td><?= date("d-m-Y", strtotime($val->tgl_pengajuan)); ?></td>
					<td class="center"><?= $val->total_pengajuan; ?></td>
					<td class="td4 center"><?= $status ?></td>
					<td><?= $val->keterangan; ?></td>
					<td class="center">
						<button class="btn btn-info btn-minier btn-detail tooltip-info" data-rel="tooltip" data-placement="bottom" title="Detail">
							<i class="icon-search"></i>
						</button> 
						<!--<button class="btn btn-danger btn-minier btn-delete">
							<i class="icon-remove"></i>
						</button> -->
						<?php if($val->status=="DISTRIBUSI") : ?>
							<button class="btn btn-success btn-minier btn-terima tooltip-success" data-rel="tooltip" data-placement="bottom" title="Terima">
								<i class="icon-check bigger-120"></i>
							</button>  
						<?php endif; ?>
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

<div id="modal-terima" class="modal hide fade modal-xs" data-backdrop="static" >
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
					<p><i class="icon-ok green"></i> Apakah benar no pengajuan <b id="noPengajuan"></b> sudah anda terima ? </p>
				</div>
			</div> 
			<input type="hidden" id="kodePeng" readonly="readonly">
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-terima" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-check bigger-110"></i>
			Ya
		</button> 
	</div>
</div> 

<div id="detail-bhp" class="modal hide fade" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Detail BHP
		</div>
	</div> 
	 
	<div class="modal-body padding4">
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-striped table-bordered" id="dt-data-detail">							
					<thead>
						<tr> 
							<th class="center">Barcode</th>  
							<th class="center">Nama Barang</th>  
							<th class="center">Permintaan</th>  
							<th class="center">Stok</th>  
							<th class="center">Status</th>   
							<th class="center">Ket</th>   
						</tr>
					</thead> 
					<tbody id="list-detail"> 
						
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
		
		$('#dt-data-pengajuan').on('click','.btn-terima',function(){ 
			$('#modal-terima').modal('show');  
			var id	= ($(this).closest('tr').attr('id')).trim();   
			var noPengajuan	= ($(this).closest('tr').find('.td1').text()).trim();   
			$('#noPengajuan').empty();
			$('#noPengajuan').append(noPengajuan);
			$('#save-terima').val(id);
		}); 
		
		$('#save-terima').click(function(){
		var id 	= $(this).val();   
		var kodePeng = ($('#'+id).find('.td1').text()).trim();
		$.ajax({
		url: '<?php echo base_url(); ?>Bhp/simpan_status_terima',
		data: {'kodePeng':kodePeng}, 
		type: 'post',
		dataType:'json',
		success: function(data){
				$('#modal-terima').modal('hide'); 
				if(data.msg){
					$('#'+id).find('.btn-terima').remove(); 
					$('#'+id).find('.td4').empty(); 
					$('#'+id).find('.td4').append('<span class="label label-success arrowed-in-right arrowed">TERIMA</span>'); 
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
		
		$('#dt-data-pengajuan').on('click','.btn-detail',function(){
			var noPengajuan = $(this).closest('tr').find('.td1').text();
			var tr="";
			var status = "";
			$('#modalLoading').modal('show'); 
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/get_detail_bhp',
				data: {"noPengajuan":noPengajuan} , 
				type: "post",
				dataType:'json', 
				success: function(data){  
					$.each(data, function(key,val) {  
						if(parseInt(val.stok) < parseInt(val.jmlpengajuan)){
							status = '<span class="label label-important arrowed arrowed-right status">STOK TDK CUKUP</span>';
						} else {
							if (val.status=="PENGAJUAN")
							{
								status = '<span class="label label-info arrowed-right arrowed-in status">PENGAJUAN</span>'; 
							} 
							else if (val.status=="DITUNDA") 
							{ 
								status = '<span class="label label-warning arrowed-in arrowed-in-right status">DITUNDA</span>';
							} 
							else if (val.status=="DITOLAK") 
							{ 
								status = '<span class="label label-important arrowed arrowed-right status">DITOLAK</span>';	 
							}
							else if (val.status=="DISTRIBUSI") 
							{
								status = '<span class="label label-pink arrowed status">DISTRIBUSI</span>';	
							} 
							else {
								status = '<span class="label label-success arrowed-in-right arrowed status">TERIMA</span>';	
							}
						}
						tr+='<tr>';
						tr+='<td>'+val.barcode+'</td>';
						tr+='<td>'+val.nama_barang+'</td>';
						tr+='<td class="center">'+val.jmlpengajuan+'</td>';
						tr+='<td class="center">'+val.stok+'</td>';
						tr+='<td class="center">'+status+'</td>';
						tr+='<td class="center">'+val.keterangan+'</td>';
						tr+='</tr>';
					});   
					$('#list-detail').empty();
					$('#list-detail').append(tr);
					$('#modalLoading').modal('hide'); 
					$('#detail-bhp').modal('show');
				}
				
			});
			
		});
	});
</script>