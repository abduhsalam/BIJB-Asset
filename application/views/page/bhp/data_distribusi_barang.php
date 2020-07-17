<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Data Distribusi Barang
		</small> 
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-dis">							
			<thead>
				<tr> 
					<th class="center">Kode Pengajuan</th> 
					<th class="center">Tgl Pengajuan</th>  
					<th class="center">Jml Pengajuan</th>  
					<th class="center">Tgl Distribusi</th>  
					<th class="center">Jml Distribusi</th>     
					<th class="center">#</th>     
				</tr>
			</thead>
				<?php 
				foreach($dtTbhBrg as $val): ?>
				<tr id="">
					<td class="td1"><?= $val->kode_pengajuan; ?></td>
					<td class="center"><?= date("d-m-Y", strtotime($val->tgl_pengajuan)); ?></td> 
					<td class="center"><?= $val->total_pengajuan; ?></td>
					<td class="center"><?= date("d-m-Y", strtotime($val->tgl_transaksi)); ?></td> 
					<td class="center"><?= $val->total_distribusi; ?></td>
					<td class="center">
						<button type="button" class="btn btn-info btn-minier btn-view">
							<i class="icon-search bigger-120"></i>
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
		var dataTable = $('#dt-data-dis').dataTable( {
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
		
		$('#dt-data-dis').on('click','.btn-view',function(){
			var kodePeng= ($(this).closest('tr').find('.td1').text()).trim(); 
			var form 	= document.createElement("form"); 
			var inputKdPeng = document.createElement("input"); 
			 
			var action=''; 
			form.method = "POST"; 
			action = 'Bhp/view_distribusi';
			 
			form.action = "<?php echo base_url(); ?>" + action,
			 
			
			inputKdPeng.value = kodePeng;
			inputKdPeng.name = "kodePeng";
			inputKdPeng.type = "hidden";
			form.appendChild(inputKdPeng);
			form.target = "_blank";
			
			document.body.appendChild(form);

			form.submit();		
		});
		
		 
	});
</script>