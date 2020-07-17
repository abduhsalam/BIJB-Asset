<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			View Distribusi
		</small> 
	</h1>
</div><!--/.page-header-->

<style>
input[readonly]{
    background-color: transparent !important;
}
.barcode { 
	width:100px !important; 
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

<div class="row-fluid">
	<div class="span12">
		<div class="span5">
			<div class="row-fluid">
				<div class="span12">
					<form id="form-tbh" class="form-horizontal" /> 
						<div class="control-group">
							<label class="control-label span3" for="noPengajuan">No Pengajuan</label>
							<div class="controls span6">
								<input id="noPengajuan" class="span12" type="text" name="noPengajuan" value="<?= $dtBhp->kode_pengajuan; ?>" readonly="readonly" style="background-color: #f5f5f5 !important;">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label span3" for="tglPengajuan">Tgl Pengajuan</label>
							<div class="controls span9">
								<input id="tglPengajuan" class="span6" type="text" name="tglPengajuan" value="<?= date("d-m-Y", strtotime($dtBhp->tgl_pengajuan)); ?>" readonly="readonly" style="background-color: #f5f5f5 !important;">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label span3" for="pengaju">Pengaju</label>
							<div class="controls span6">
								<input id="pengaju" class="span12" type="text" name="pengaju" value="<?= $dtBhp->user_name; ?>" readonly="readonly" style="background-color: #f5f5f5 !important;">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label span3" for="unitKerja">Unit Kerja</label>
							<div class="controls span9">
								<input id="unitKerja" class="span12" type="text" name="unitKerja" value="<?= $dtBhp->unit_kerja; ?>" readonly="readonly" style="background-color: #f5f5f5 !important;">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label span3" for="keterangan">Ket Pengajuan</label>

							<div class="controls span9">						
								<textarea name="ketPengajuan" class="span10" style="resize:none;" rows="3" readonly="readonly"><?= $dtBhp->keterangan; ?></textarea> 
							</div>
						</div>
						
						<!--<div class="control-group">
							<label class="control-label span3" for="keterangan">Keterangan</label>

							<div class="controls span9">						
								<textarea name="keterangan" class="span10" style="resize:none;" rows="3" readonly="readonly"></textarea> 
							</div>
						</div>-->
					</form>	
				</div>
			</div>
		</div> 
		<div class="span7">
			<div class="row-fluid" style="background-color:#e4e6e9">
				<div class="span12"> 
					<div class="span7">
						
					</div>
					<div class="span5">
						<div class="span8" style="padding-top:15px; padding-left:10px; text-align:right;">
							<b>Total : </b>
						</div>
						<div class="span4" style="padding-top:15px; padding-left:10px; text-align:left;">
							<b id="totalPermintaan"><?= $dtBhp->total_pengajuan; ?></b>
						</div>
					</div>
				</div>
			</div>
			<form id="form-distribusi" class="form-horizontal" /> 
				<table class="table table-striped table-bordered" id="dt-list-pengajuan">
					<thead>
						<tr>  
							<th class="center">Barcode</th>  
							<th class="center">Nama Barang</th>  
							<th class="center">Permintaan</th>  
							<th class="center">Stok</th>  
							<th class="center">Status</th>   
						</tr>
					</thead>
					
					<tbody id="add-list-pengajuan">												
						<?php  
						foreach($dtDetailBhp as $val): 
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
						?>
							<tr id="<?= $val->id_pengajuandet; ?>"> 
								<td>
									<input type="text" class="barcode" value="<?= $val->barcode; ?>" name="rbarcode[]" disabled="disabled">
								</td>	
								<td><?= $val->nama_barang; ?></td>	
								<td class="center td3"><?= $val->jmlpengajuan; ?></td>	
								<td class="center td4"><?= $val->stok; ?></td>	
								<td class="td5"><?= $status; ?></td> 
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table> 
			</form> 
			<div class="hr hr-double hr-dotted hr18"></div>
			<div class="control-group">
				<button id="simpan-distribusi" class="btn btn-danger btn-small pull-right" type="button" onclick="window.close()">
					<i class="icon-remove bigger-110"></i>
					Close
				</button> 
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
	
		var listPengajuan =  $('#dt-list-pengajuan').dataTable( {
			bAutoWidth: false, 
			"aoColumns": [ 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }
			],
			// "order": [[0,'asc']],
			"aaSorting": [],
			"info":false, 
			"sScrollY": "270px",
			"bPaginate": false, 
			"sDom": 'rt'
		} );  
		
	});   
	   
</script>
