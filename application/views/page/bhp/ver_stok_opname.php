<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Verifikasi Stok Opname
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
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<div class="span12 infobox-container">
				<div class="infobox infobox-green  ">
					<div class="infobox-icon">
						<i class="icon-list"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $total['totalBarang']; ?></span>
						<div class="infobox-content">Total Barang</div>
					</div> 
				</div>

				<div class="infobox infobox-blue">
					<div class="infobox-icon">
						<i class="icon-shopping-cart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $total['totalStok']; ?></span>
						<div class="infobox-content">Total Stok</div>
					</div> 
				</div>

				<div class="infobox infobox-pink  ">
					<div class="infobox-icon">
						<i class="icon-shopping-cart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $total['totalStokOpn']; ?></span>
						<div class="infobox-content">Total Stok Opname</div>
					</div>
				</div>

				<div class="infobox infobox-red  ">
					<div class="infobox-icon">
						<i class="icon-ban-circle "></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $total['totalSelisih']; ?></span>
						<div class="infobox-content">Selisih</div>
					</div>
				</div> 

				<div class="space-6"></div>

				 
			</div>  		 
		</div><!--/row-->
		
		<div class="row-fluid"> 
			<div class="span12">
				<table class="table table-striped table-bordered" id="list-ver-opname">							
					<thead>
						<tr> 
							<th class="center">No</th> 
							<th class="center">Barcode</th> 
							<th class="center">Nama Barang</th>  
							<!--<th class="center">Isi Barang</th> -->
							<th class="center">Stok</th>     
							<th class="center">Stok Opnema</th>     
							<th class="center">Selisih</th>     
							<th class="center">Keterangan</th>    
							<th class="center">#</th>    
						</tr>
					</thead>
						
					<tbody> 
						<?php 
						$no=1;
						foreach($dtVerifikasi as $res){ 
						$readonly="readonly='readonly'";
						$trclass ="";
						// if($res->keterangan!=""){ $readonly="readonly='readonly'"; }
						if($res->ketstok=='BLMSTOKOPNAME'){ $trclass = "error"; }
						?>
						<tr class="<?= $trclass; ?>" id="<?= $no; ?>">
							<td class="center"><?= $no++; ?></td>
							<td class="td2"><?= $res->barcode; ?></td>
							<td class="td3"><?= $res->nama_barang; ?></td>
							<!--<td class="center"><?= $res->isi_barang; ?></td>-->
							<td class="center">
								<input type="text" class="stokData jml2" value="<?= $res->stok_data; ?>" name="stokData[]">
							</td>
							<td class="center">
								<input type="text" class="jumlah" value="<?= $res->stok_nyata; ?>" name="stokAsli[]" onkeyup="numberformat(this)" readonly="readonly">
							</td> 
							<td class="center">
								<input type="text" class="selisih jml2" value="<?= $res->selisih; ?>" name="selisih[]">
							</td>
							<td class="center">
								<input type="text" value="<?= str_replace(",","",$res->keterangan); ?>" class="ket" name="keterangan[]" <?= $readonly; ?>>
							</td>
							<td class="center">
								<button type="button" class="btn btn-primary btn-minier btn-edit">
									<i class="icon-pencil bigger-120"></i>
								</button>  
								<button type="button" class="btn btn-success btn-minier btn-update" style="display:none">
									<i class="icon-save bigger-120"></i>
								</button>  
							</td>
						</tr>
						
						<?php } ?>
					</tbody>
				</table> 
			</div>
		</div>
		<div class="hr hr-double hr-dotted hr18"></div>
		<div class="control-group">
			<button id="simpan-ver-opname" class="btn btn-info btn-small pull-right" type="button">
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
.ket { 
	width:350px !important;  
	font-family: "Open Sans"; 
	height:15px !important; 
	font-size:12px !important
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
		var dataTable = $('#list-ver-opname').dataTable( {
			bAutoWidth: false, 
			"aoColumns": [
			  { "bSortable": false }, 
			  { "bSortable": false }, 
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
		
		$('#simpan-ver-opname').click(function(){ 
			var cek = cekBlmOpname();
			if(cek>0){
				$.gritter.add({
					title: 'Informasi',
					text: 'Data belum dilakukan stok opname seluruhnya',
					class_name: 'gritter-error gritter-center'
				}); 
			} else {
				$('#modalLoading').modal('show'); 
				$.ajax({
					url: '<?php echo base_url(); ?>Bhp/simpan_ver_stokopname',
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
			}
			
		});
		 		
		$('#list-ver-opname').on('change','.jumlah',function(){ 
			var jml = $(this).val(); 			
			var stokData = $(this).closest('tr').find('.stokData').val();
			var selisih2 = parseInt(jml)-parseInt(stokData);
			if(selisih2==0){
				$(this).closest('tr').removeClass('warning');
				$(this).closest('tr').find('.ket').val('OK');
				$(this).closest('tr').find('.ket').attr('readonly',true);
			} else {
				$(this).closest('tr').removeClass('warning').addClass('warning');
				$(this).closest('tr').removeClass('error').addClass('warning');
				$(this).closest('tr').find('.ket').val('');
				$(this).closest('tr').find('.ket').attr('readonly',false);
			}
			$(this).closest('tr').find('.selisih').val(selisih2);
			// hitungTotal();
		});
		
		$('#list-ver-opname').on('click','.btn-edit',function(){
			$(this).closest('tr').find('.jumlah').attr('readonly',false);
			$(this).closest('tr').find('.ket').attr('readonly',false);
			$(this).closest('tr').removeClass('error');
			$(this).hide();
			$(this).closest('tr').find('.btn-update').show();
			var stokData = $(this).closest('tr').find('.stokData').val();
			var jml = $(this).closest('tr').find('.jumlah').val(); 
			var selisih = parseInt(jml)-parseInt(stokData);
			$(this).closest('tr').find('.selisih').val(selisih);
			
		});
		
		$('#list-ver-opname').on('click','.btn-update',function(){			
			var barcode = $(this).closest('tr').find('.td2').text();
			var stokData = $(this).closest('tr').find('.stokData').val();
			var jumlah	 = $(this).closest('tr').find('.jumlah').val();
			var selisih  = $(this).closest('tr').find('.selisih').val(); 
			var ket 	 = $(this).closest('tr').find('.ket').val();
			var id 	 	= $(this).closest('tr').attr('id');
			if(ket==""){
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan input keterangan dahulu',
					class_name: 'gritter-error gritter-center'
				});
			} else {
				$('#modalLoading').modal('show');
				$.ajax({
					url: '<?php echo base_url(); ?>Bhp/update_stok_opname',
					type: 'post',
					dataType: 'json', 
					data: {"barcode":barcode, "stokData":stokData, "stokNyata":jumlah, "selisih":selisih, "ket":ket},
					success: function (data) {  
						if(data.msg){
							$('#modalLoading').modal('hide');  
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di update',
								class_name: 'gritter-info gritter-center'
							});	 
							$('#'+id).find('.jumlah').attr('readonly',true);
							$('#'+id).find('.ket').attr('readonly',true);
							$('#'+id).find('.btn-update').hide();
							$('#'+id).find('.btn-edit').show();
							// hitungTotal();
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
			}
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
	  
	function cekBlmOpname(){
		var cek=0;
		$('#list-ver-opname').find('.ket').each(function(){
			if($(this).val()==""){
				cek = cek+1;
			}
		});
		return cek;
	}
	
	function hitungTotal(){
		var total = 0;
		$('#list-ver-opname').find('.jml2').each(function(){
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
		action = 'Bhp/ver_stok_opname';
		 
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