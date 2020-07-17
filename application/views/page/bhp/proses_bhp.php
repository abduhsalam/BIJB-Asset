<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Pengajuan Barang
		</small> 
	</h1>
</div><!--/.page-header-->

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
								<textarea name="ketPengajuan" class="span12" style="resize:none;" rows="3" readonly="readonly"><?= $dtBhp->keterangan; ?></textarea> 
							</div>
						</div>
						
						<!--<div class="control-group">
							<label class="control-label span3" for="keterangan">Keterangan</label>

							<div class="controls span9">						
								<textarea name="keterangan" class="span10" style="resize:none;" rows="3"></textarea> 
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
						<div class="span2" style="padding-top:15px; padding-left:10px;">
							Search
						</div>
						<div class="span10">
							<input type="text" id="searchPengajuan" class="span12" placeholder="Cari nama barang" style="margin-top:10px;">
						</div>
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
							<th class="center" style="width:100px !important;">#</th>  
						</tr>
					</thead>
					
					<tbody id="add-list-pengajuan">												
						<?php  
						foreach($dtDetailBhp as $val):  
							$disabled 	= "disabled='disabled'";
							$button	 	= "";
							if($val->stok < $val->jmlpengajuan){
								$status = '<span class="label label-important arrowed arrowed-right status">STOK TDK CUKUP</span>';
							} else {
								if ($val->status=="PENGAJUAN")
								{
									$disabled = "";
									$status = '<span class="label label-info arrowed-right arrowed-in status">PENGAJUAN</span>'; 
									$button = '<button type="button" class="btn btn-info btn-minier btn-action">
										<i class="icon-edit bigger-120"></i>
									</button>';
								} 
								else if ($val->status=="DITUNDA") 
								{ 
									$status = '<span class="label label-warning arrowed-in arrowed-in-right status">DITUNDA</span>';
									$button = '<button type="button" class="btn btn-info btn-minier btn-action">
										<i class="icon-edit bigger-120"></i>
									</button>';
								} 
								else if ($val->status=="DITOLAK") 
								{ 
									$status = '<span class="label label-important arrowed arrowed-right status">DITOLAK</span>';	
									$button = '<button type="button" class="btn btn-info btn-minier btn-action">
										<i class="icon-edit bigger-120"></i>
									</button>'; 
								}
								else if ($val->status=="DISTRIBUSI") 
								{
									$status = '<span class="label label-pink arrowed status">DISTRIBUSI</span>';	
								} 
								else {
									$status = '<span class="label label-success arrowed-in-right arrowed status">TERIMA</span>';	
								}
							}
						?>
							<tr id="<?= $val->id_pengajuandet; ?>"> 
								<td>
									<input type="text" class="barcode" value="<?= $val->barcode; ?>" name="rbarcode[]" readonly="readonly" <?php echo $disabled; ?>>
								</td>	
								<td><?= $val->nama_barang; ?></td>	
								<td class="center td3"><?= $val->jmlpengajuan; ?></td>	
								<td class="center td4"><?= $val->stok; ?></td>	
								<td class="center td5"><?= $status; ?></td>	
								<td>
									<?= $button; ?> 
								</td>	
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table> 
			</form>
			<div class="hr hr-double hr-dotted hr18"></div>
			<div class="control-group">
				<button id="simpan-distribusi" class="btn btn-info btn-small pull-right" type="button">
					<i class="icon-save bigger-110"></i>
					Simpan
				</button> 
			</div>
		</div>
	</div>
</div>  

<!--- MODAL START -->
<div id="modal-action" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Silahkan isi form yang ada
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid padding-4">
			<form id="form-action" class="" />
				<div class="widget-main"> 
					<div class="row-fluid">
						<label for="statusDet">Status</label>
						<select id="statusDet" name="statusDet">  
							<option value="DITUNDA">DITUNDA</option>
							<option value="DITOLAK">DITOLAK</option>
						</select>
					</div>
					<div class="row-fluid">
						<label for="form-field-8">Keterangan</label>
						<textarea id="keteranganDet" class="span12" placeholder="Silahkan input keterangan" rows="4"  style="resize:none"></textarea> 
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-action" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
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
	
		var listPengajuan =  $('#dt-list-pengajuan').dataTable( {
			bAutoWidth: false, 
			"aoColumns": [ 
			  { "bSortable": false }, 
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
		
		$("#searchPengajuan").on('keyup', function (){
			listPengajuan.fnFilter(this.value);
		});  
		
		$('#simpan-distribusi').click(function(){  
			var keterangan 		= $('#keterangan').val();
			var noPengajuan 	= $('#noPengajuan').val();
			var tglPengajuan 	= $('#tglPengajuan').val();
			var cek 			= cekStatus(); 
			$('#modalLoading').modal('show'); 
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/simpan_distribusi',
				data: $('#form-distribusi').serialize()+ "&noPengajuan="+noPengajuan+ "&tglPengajuan="+tglPengajuan+ "&cekStatus="+cek , 
				type: "post",
				dataType:'json', 
				success: function(data){  
					if(data.msg=='success'){
						$('#modalLoading').modal('hide');  
						$.gritter.add({
							title: 'Informasi',
							text: 'Pengajuan Berhasil Disimpan',
							class_name: 'gritter-info gritter-center'
						});	
						reload_page();
					} else {
						$('#modalLoading').modal('hide'); 
						$.gritter.add({
							title: 'Informasi',
							text: 'Pengajuan Gagal Disimpan',
							class_name: 'gritter-error gritter-center'
						});	
					}
				}
			});
			 
		});  
		
	});   
	
	$('.btn-action').click(function(){ 
		$('#modal-action').modal('show');
		$('#form-action')[0].reset();
		var idDetail	= ($(this).closest('tr').attr('id')).trim();   
		var permintaan	= parseInt(($(this).closest('tr').find('.td3')).text()); 
		var cekStok		= parseInt(($(this).closest('tr').find('.td4')).text()); 
		if(permintaan>cekStok){
			$('#statusDet option[value="PENGAJUAN"]').remove();
		} else {
			$('#statusDet option[value="PENGAJUAN"]').remove();
			$('#statusDet').append('<option value="PENGAJUAN">PENGAJUAN</option>');
		}
		$('#save-action').val(idDetail);
	});
	
	$('#save-action').click(function(){ 
		var idDetail 	= $(this).val();
		var status 		= $('#statusDet').val();
		var keterangan 	= $('#keteranganDet').val(); 
		if(keterangan!=""){
			$('#modal-action').modal('hide');
			$('#modalLoading').modal('show');
			$.ajax({
			url: '<?php echo base_url(); ?>Bhp/simpan_status',
			data: {'idDetail':idDetail,'status':status,'keterangan':keterangan}, 
			type: 'post',
			dataType:'json',
			success: function(data){
					$('#modalLoading').modal('hide');
					if(data.msg){
						$('#'+idDetail).find('.td5').empty();
						$('#'+idDetail).find('.td5').append('<span class="'+data.span+' status">'+data.status+'</span>'); 
						if(status=="PENGAJUAN"){
							$('#'+idDetail).find('.barcode').attr('disabled',false);
						} else {
							$('#'+idDetail).find('.barcode').attr('disabled',true);
						}
					} else {
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal disimpan',
							class_name: 'gritter-error gritter-center'
						}); 
					} 
				}		
			}); 
			
		} else {
			$.gritter.add({
				title: 'Informasi',
				text: 'Silahkan isi dulu keterangan',
				class_name: 'gritter-error gritter-center'
			});  
		}
	}); 
	 		
	function cekStatus(){
		var cek = 0;
		$('#add-list-pengajuan').find('.status').each(function(){
			var status = ($(this).text()).trim();
			if(status=="STOK TDK CUKUP" || status=="DITUNDA"){
				cek = cek+1;
			}
		});
		return cek
	}
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Bhp/data_pengajuan_bhp';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		input.value = '';
		input.name = "reload";
		input.type = "hidden";
		form.appendChild(input);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	}
</script>
