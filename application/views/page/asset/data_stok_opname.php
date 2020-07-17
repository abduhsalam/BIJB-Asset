<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Data Stok Opname
		</small> 
	</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<div class="span12"> 
	<form id="form-tbh-asset" class="form-horizontal" action="<?php echo base_url(); ?>Asset/data_stok_opname" method="post">
		<div class="row-fluid">
			<div class="span6">					
				<div class="control-group">								
					<label class="control-label span3" for="tglOpname">Tgl Opname</label>
					<div class="controls span4"> 
						<select id="tglOpname" name="tglOpname" class="form-control span12">
							<?php foreach($dtTglOpn as $val): ?>
								<option value="<?= $val->tgl_stok_opname; ?>"><?= date("d-m-Y", strtotime($val->tgl_stok_opname)); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="controls span3"> 
						<button id="btn-search" class="btn btn-info btn-small pull-right" name="search" value="search" type="submit">
							<i class="icon-search bigger-110"></i>
							Search
						</button>  
					</div>
				</div>
			</div>
		</div>
	</form>
			
	</div>
</div>
<div class="row-fluid">
	<div class="span12">  
		<table class="table table-striped table-bordered" id="list-data-opname">							
			<thead>
				<tr> 
					<th class="center">No</th> 
					<th class="center">Tgl Opname</th> 
					<th class="center">Kode Asset</th> 
					<th class="center">Nama Jns Asset</th>     
					<th class="center">Nama Barang</th>    
					<th class="center">Kondisi</th>     
				</tr>
			</thead>
				<?php 
				$no=0;
				foreach($dtStokOpn as $val): 
					$no = $no+1; 
				?>
					<tr>
						<td><?= $no; ?></td>
						<td><?= date("d-m-Y", strtotime($val->tgl_stokopname)); ?></td>
						<td><?= $val->kode_asset; ?></td>
						<td><?= $val->nama_jenisasset; ?></td>
						<td><?= $val->nama_barang; ?></td>
						<td><?= $val->kondisi_asset; ?></td> 
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
	 
		var dataTable = $('#list-data-opname').dataTable( {
			
		});    
	});
	 
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Asset/stok_opname';
		 
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