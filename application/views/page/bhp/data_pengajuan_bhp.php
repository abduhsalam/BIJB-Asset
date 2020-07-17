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
			<tbody> 
				<?php 
				foreach($dtPengajuan as $val):
				if ($val->status=="PENGAJUAN")
				{ 
					$status = '<span class="label label-info arrowed-right arrowed-in status">PENGAJUAN</span>'; 
				} 
				else if ($val->status=="DITUNDA") 
				{ 
					$status = '<span class="label label-warning arrowed-in arrowed-in-right status">DITUNDA</span>';	
				} 
				else if ($val->status=="DISTRIBUSI") 
				{
					$status = '<span class="label label-pink arrowed status">DISTRIBUSI</span>';	
				} 
				else 
				{
					$status = '<span class="label label-success arrowed-in-right arrowed status">TERIMA</span>';	
				}
				?>
				<tr>
					<td class="td1"><?= $val->kode_pengajuan; ?></td>
					<td><?= date("d-m-Y", strtotime($val->tgl_pengajuan)); ?></td>
					<td class="center"><?= $val->total_pengajuan; ?></td>
					<td class="center"><?= $status; ?></td>
					<td><?= $val->keterangan; ?></td>
					<td class="center">
						<button class="btn btn-info btn-minier btn-detail">
							<i class="icon-search"></i>
						</button> 
					<?php if($val->status=="PENGAJUAN" || $val->status=="DITUNDA"){ ?>
						<button class="btn btn-success btn-minier btn-proses">
							<i class="icon-signin bigger-120"></i>
						</button>  
					<?php } ?>
					</td>
				</tr>
				<?php endforeach; ?> 
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
		  
		$('#dt-data-pengajuan').on('click','.btn-proses',function(){
			var noBhp	= ($(this).closest('tr').find('.td1').text()).trim(); 
			var form 	= document.createElement("form"); 
			var inputNoBhp = document.createElement("input"); 
			 
			var action=''; 
			form.method = "POST"; 
			action = 'Bhp/proses_bhp';
			 
			form.action = "<?php echo base_url(); ?>" + action,
			 
			
			inputNoBhp.value = noBhp;
			inputNoBhp.name = "noBhp";
			inputNoBhp.type = "hidden";
			form.appendChild(inputNoBhp);
			// form.target = "_blank";
			
			document.body.appendChild(form);

			form.submit();		
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