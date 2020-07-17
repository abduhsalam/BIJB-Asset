<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Master Barang
		</small> 
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-vendor">							
			<thead>
				<tr> 
					<th class="center">Barcode</th> 
					<th class="center">Nama Barang</th>  
					<th class="center">Stok Awal</th> 
					<th class="center">Penerimaan</th> 
					<th class="center">Distribusi</th>    
					<th class="center">Stok Akhir</th>     
				</tr>
			</thead>
				<?php 
				foreach($dtStok as $val): ?>
				<tr>
					<td><?= $val->barcode; ?></td>
					<td><?= $val->nama_barang; ?></td>
					<td class="center"><?= $val->stokawal; ?></td>
					<td class="center"><?= $val->jmlpenambahan; ?></td>
					<td class="center"><?= $val->jmldistribusi; ?></td> 
					<td class="center"><?= $val->stokakhir; ?></td> 
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
		var dataTable = $('#dt-data-vendor').dataTable( {
			// bAutoWidth: false,
			"aoColumns": [    
			  { "bSortable": false }, 
			  null,
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
		 
	});
</script>