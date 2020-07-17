<div class="page-header position-relative">
	<h1>
		Master
		<small>
			<i class="icon-double-angle-right"></i>
			Set Tanggal Stok Opname
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

<div class="row-fluid">
	<div class="span12">
		<div class="span5">
			<div class="row-fluid">
				<div class="span12">
					<form id="form-tbh-tglclosing" class="form-horizontal" /> 
 
						<div class="control-group">
							<label class="control-label span3" for="tglPengajuan">Set Tanggal</label>
							<div class="controls span9">
								<div class="row-fluid input-append">
									<input class="span4 date-picker" id="tglStokOpname" type="text" data-date-format="dd-mm-yyyy" name="tglStokOpname" />
									<span class="add-on">
										<i class="icon-calendar"></i>
									</span>
								</div> 
							</div> 
						</div>
						<div class="control-group">
							<label class="control-label span3" for="jnsStok">Jenis</label>
							<div class="controls span6">
								<select id="jnsStok" name="jnsStok" class="span8">
									<option value="STOKBHP">STOKBHP</option>
									<option value="STOKASSET">STOKASSET</option>
								</select>
							</div>	
						</div>
						<div class="control-group">
							<label class="control-label span3" for="status">Status</label>

							<div class="controls span9">
								<label>
									<input type="radio" name="status" class="status" value="aktif" checked	>
									<span class="lbl"> Aktif </span> 
									<input type="radio" name="status" class="status" value="nonaktif">
									<span class="lbl"> Non Aktif</span>
								</label> 								 
							</div>
						</div> 
						<div class="hr hr-double hr-dotted hr18"></div>
						<div class="control-group">
							<button id="simpan-tgl-closing" class="btn btn-info btn-small pull-right" type="button">
								<i class="icon-save bigger-110"></i>
								Simpan
							</button> 
							<button id="update-tgl-closing" class="btn btn-info btn-small pull-right" type="button" style="display:none">
								<i class="icon-save bigger-110"></i>
								Update
							</button> 
						</div>
					</form>	
				</div>
			</div>
		</div> 
		<div class="span7">	 			
			<table class="table table-striped table-bordered" id="dt-list-tglclosing">
				<thead>
					<tr>
						<th class="center">No</th>  
						<th class="center">Tgl Stok Opname</th>  
						<th class="center">Jenis</th>  
						<th class="center">Status</th>  
						<th class="center">#</th>  
					</tr>
				</thead>
				
				<tbody id="add-list-pengajuan">						
					
					<?php 
					$no = 1;
					foreach($dtStokOpname as $val): ?>
					<tr id="<?= $val->id; ?>">
						<td class="center"><?= $no++; ?></td>
						<td class="center td2"><?= date("d-m-Y", strtotime($val->tgl_stok_opname)); ?></td>
						<td class="center td3"><?= $val->jns_stok_opname; ?></td>
						<td class="center td4"><?= $val->status; ?></td>
						<td class="center">
							<button type="button" class="btn-edit btn btn-info btn-minier btn-detail">
								<i class="icon-pencil"></i>
							</button>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>  
			
		</div>
	</div>
</div>  

<!--- MODAL START -->
<div id="modal-del-peng" class="modal hide fade modal-xs" data-backdrop="static" >
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
					<p><i class="icon-ok green"></i> Apakah yakin akan menghapus pengajuan <b id="namaBrgPengajuan"></b> ? </p>
				</div>
			</div>  
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="delete-pengajuan" class="btn btn-info btn-small pull-right" type="button">
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
		 
		var dataTable = $('#dt-list-tglclosing').dataTable( {
			// bAutoWidth: false,
			"aoColumns": [    
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
		
		$('#simpan-tgl-closing').click(function(){
			var cek = cekTglOpname();
			if(cek<1){  
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Assetmaster/tambah_tgl_closing',
				data: $('#form-tbh-tglclosing').serialize(), 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#modalLoading').modal('hide');
						if(data){ 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di simpan',
								class_name: 'gritter-info gritter-center'
							});  
							setTimeout(function(){
							  reload_page();
							}, 2000);
						} 
						else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				});
			} else { 
				$.gritter.add({
					title: 'Informasi',
					text: 'Tangal input sudah di input atau tanggal masi aktif',
					class_name: 'gritter-error gritter-center'
				});
			}
		});
		
		$('#dt-list-tglclosing').on('click','.btn-edit',function(){
			var tgl 	= $(this).closest('tr').find('.td2').text();
			var jenis	= $(this).closest('tr').find('.td3').text();
			var status	= $(this).closest('tr').find('.td4').text(); 
			var id		= $(this).closest('tr').attr('id'); 
			$('#tglStokOpname').val(tgl);
			$('#tglStokOpname').attr('disabled',true);
			$("input[name=status][value=" + status + "]").attr('checked', 'checked'); 
			$("#jnsStok option").filter(function() { 
				return $(this).text() == jenis; 
			}).prop('selected', true);
			$('#update-tgl-closing').val(id);
			$('#update-tgl-closing').show();
			$('#simpan-tgl-closing').hide();
		});
		
		$('#update-tgl-closing').click(function(){  
			var status = $('input[name=status]:checked').val();
			var id = $(this).val(); 
			var cek = cekTglOpname();
			if(cek<1){  
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Assetmaster/update_status_closing',
				data: {'status':status, 'id':id}, 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#modalLoading').modal('hide');
						if(data){ 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di update',
								class_name: 'gritter-info gritter-center'
							});  
							setTimeout(function(){
							  reload_page();
							}, 2000);
						} 
						else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal diupdate',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				}); 
			} else { 
				$.gritter.add({
					title: 'Informasi',
					text: 'Tangal input sudah di input atau tanggal masi aktif',
					class_name: 'gritter-error gritter-center'
				});
			}
		});
	}); 
	
	function cekTglOpname(){
		var tglClosing = $('#tglStokOpname').val();
		var jnsStok = $('#jnsStok').val();
		var cek =0;
		$.ajax({
		url: '<?php echo base_url(); ?>Assetmaster/cek_tgl_opname',
		data: {'tglClosing':tglClosing,'jnsStok':jnsStok}, 
		type: 'post',
		dataType:'json',
		async:false,
		success: function(data){	 
				//if jika status = aktif dan tanggal sama
				if(data>0){ 
					cek = 1;
				} else {
					cek = 0;
				}
			}		
		});
		
		return cek;
	}
	
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Assetmaster/tanggal_stokopname';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		input.value = '';
		input.name = "tglstokopname";
		input.type = "hidden";
		form.appendChild(input);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	}
</script>
