<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Stok Opname
		</small> 
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<?php 
	$disabled = "";
	if($cekTglOpn<1){
		
		$disabled = "disabled='disabled'";
		echo '<div class="alert alert-error"> 
				<strong>
					<i class="icon-remove"></i>
					Tanggal Stok Opname Belum Di Input!
				</strong>

				Silahakn input terlebih dahulu tanggal stok opname.
				<br />
			</div>';
	}
	?>
	<div class="span12">
		<div class="span6"> 
			<div class="control-group">
				<label class="control-label span3" for="scanBarcode" style="padding-top:5px;">Scan Barcode</label>
				<div class="controls span8">
					<input id="scanBarcode" onkeypress="scanBarcode(event)" class="span12 uppercase" type="text" name="scanBarcode" <?= $disabled; ?>>
				</div> 
			</div> 
		</div>
		<div class="span6" style="background-color:#e4e6e9"> 
			<div class="span4" style="padding-top:5px; padding-left:10px; text-align:right;">
				<b>Total : </b>
			</div>
			<div class="span4" style="padding-top:5px; padding-left:10px; text-align:left;">
				<b id="totalPenambahan"></b>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12"> 
		<form id="form-stokopname-brg" class="form-horizontal" /> 
			<table class="table table-striped table-bordered" id="list-tbh-barang">							
				<thead>
					<tr> 
						<th class="center">No</th> 
						<th class="center">Barcode</th> 
						<th class="center">Nama Barang</th>  
						<th class="center">Isi Barang</th> 
						<th class="center">Stok</th> 
						<th class="center">Stok Opname</th>    
						<th class="center">Selisih</th>    
						<th class="center">Keterangan</th>    
						<th class="center">#</th>    
					</tr>
				</thead>
					
				<tbody> 
				</tbody>
			</table>
		</table>
		</form>
		<div class="hr hr-double hr-dotted hr18"></div>
		<div class="control-group">
			<button id="simpan-stokopname" class="btn btn-info btn-small pull-right" type="button" <?= $disabled; ?>>
				<i class="icon-save bigger-110"></i>
				Simpan
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
	width:100 !important; 
	height:15px !important; 
	font-size:12px !important;  
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
					<p><i class="icon-ok green"></i> Apakah anda yakin akan menghapus stok opname barang <b id="namaBarang"></b> ? </p>
				</div>
			</div>  
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="delete-stokopname" class="btn btn-info btn-small pull-right" type="button">
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
		var dataTable = $('#list-tbh-barang').dataTable( {
			bAutoWidth: false,
			"columnDefs": [ 
				{ className:"center", "targets": [ 7 ] },
				{ className:"td8", "targets": [ 7 ] },
				{ className:"center", "targets": [ 6 ] },
				{ className:"center", "targets": [ 5 ] },
				{ className:"center", "targets": [ 4 ] },
				{ className:"center", "targets": [ 3 ] },
				{ className:"td3", "targets": [ 2 ] },
				{ className:"td2", "targets": [ 1 ] },
				{ className:"center no", "targets": [ 0 ], "visible": false, }
			], 
			"aoColumns": [
			  null,  
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },
			  { "bSortable": false },
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			],
			"order": [[0,'desc']],
			"info":false, 
			"sScrollY": "300px",
			"bPaginate": false, 
			"sDom": 'rt'
		});  
		
		$('#simpan-stokopname').click(function(){ 
			var cekKet = cekKeterangan(); 
			if(cekKet<1){
				$('#modalLoading').modal('show'); 
				$.ajax({
					url: '<?php echo base_url(); ?>Bhp/simpan_stok_opname',
					data: $('#form-stokopname-brg').serialize(), 
					type: "post",
					dataType:'json', 
					success: function(data){  
						if(data.msg=='success'){
							$('#modalLoading').modal('hide');  
							$.gritter.add({
								title: 'Informasi',
								text: 'Data Berhasil Disimpan',
								class_name: 'gritter-info gritter-center'
							});	
							reload_page();
						} else {
							$('#modalLoading').modal('hide'); 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data Gagal Disimpan',
								class_name: 'gritter-error gritter-center'
							});	
						}
					}
				});
			} 
			else 
			{
				$.gritter.add({
					title: 'Informasi',
					text: 'Keterangan pada stok opname masi ada yang kosong',
					class_name: 'gritter-error gritter-center'
				});	
			}
		});
		
		$('#list-tbh-barang').on('change','.jumlah',function(){ 
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
			hitungTotal();
		});
		
		$('#list-tbh-barang').on('click','.del-stokopname',function(){  
			var id = $(this).closest('tr').attr('id');
			var namaBarang = $(this).closest('tr').find('.td3').text();
			$('#namaBarang').empty(); 
			$('#namaBarang').append(namaBarang); 
			$('#delete-stokopname').val(id);
			$('#modal-del').modal('show'); 
		});
		
		$('#delete-stokopname').click(function(){
			$('#modal-del').modal('hide'); 
			var id = $(this).val();
			dataTable.fnDeleteRow(document.getElementById(id));
			hitungTotal();
		})
		
	});
	
	function scanBarcode(e){
		var key=e.keyCode || e.which;
		if(key==13){
			// var cekTgl = cekTglOpname();
			// if(cekTgl>0){
				var barcode = $('#scanBarcode').val();  
				var cekOpname = cekStokOpname(barcode);
				// // if(cekRow<=500){			
				if(cekOpname>0){
					$.ajax({
						url: '<?php echo base_url(); ?>Bhp/scan_opname_axist',
						data: {"barcode":barcode}, 
						type: "post",
						dataType:'json',
						success: function(data){ 
							var seq 	= maxNumber(); 
							var action 	= '<button class="btn btn-danger btn-minier del-stokopname" type="button"><i class="icon-remove"></i></button>';
							
							var inpBarcode	= '<input type="text" name="barcode[]" value="'+data.barcode+'" class="barcode" readonly>';  
							
							var stokData 	= '<input type="text" name="stokData[]" value="'+data.stok_data+'" class="stokData jml2">';
							
							var inpJml 	= '<input type="text" onKeyup="numberformat(this)" name="stokAsli[]" value="'+data.stok_nyata+'" class="jumlah">';
							
							var selisih 	= '<input type="text" name="selisih[]" value="'+data.selisih+'" class="selisih jml2">';
							var classKet	= '';
							
							var cekBrg = cekBarang(barcode);
							if(cekBrg>0)
							{ 
								var jml1 = $('.'+barcode).closest('tr').find('.jumlah').val();
								var jml2 = parseInt(jml1)+parseInt(data.isi_barang);
								$('.'+barcode).closest('tr').find('.jumlah').val(jml2);
								
								var stokData = $('.'+barcode).closest('tr').find('.stokData').val();
								var selisih2 = parseInt(jml2)-parseInt(stokData);
								$('.'+barcode).closest('tr').find('.selisih').val(selisih2);
								
								if(selisih2==0){
									$('.'+barcode).closest('tr').removeClass('warning');
									$('.'+barcode).closest('tr').find('.ket').val('OK');
									$('.'+barcode).closest('tr').find('.ket').attr('readonly',true);
								} else {
									$('.'+barcode).closest('tr').removeClass('warning').addClass('warning'); 
									$('.'+barcode).closest('tr').find('.ket').attr('readonly',false);
								}
							} 
							else 
							{
								if(selisih==0){
									var ket = '<input type="text" name="keterangan[]" class="ket" value ="OK" readonly="readonly">';
								} else {
									var ket = '<input type="text" name="keterangan[]" class="ket" value="'+data.keterangan+'">';
									classKet = 'warning';
								}
								$('#list-tbh-barang tr').removeClass('first');
								var rowIndex = $('#list-tbh-barang').dataTable().fnAddData([seq, inpBarcode, data.nama_barang, data.isi_barang, stokData , inpJml, selisih, ket, action]); 
								var row = $('#list-tbh-barang').dataTable().fnGetNodes(rowIndex);
								$(row).attr('class', 'first error '+barcode);  
								$(row).attr('id', seq); 					
							}
							$('#scanBarcode').val(''); 
							$('#scanBarcode').focus();							
							hitungTotal();
							
						}
					}) 
				} 
				else 					
				{
					$.ajax({
						url: '<?php echo base_url(); ?>Bhp/scan_opname_brg',
						data: {"barcode":barcode}, 
						type: "post",
						dataType:'json',
						success: function(data){
							if(data.cek_barcode>0){
								var seq 	= maxNumber(); 
								var action 	= '<button class="btn btn-danger btn-minier del-stokopname" type="button"><i class="icon-remove"></i></button>';
								
								var inpBarcode	= '<input type="text" name="barcode[]" value="'+data.barcode+'" class="barcode" readonly>';  
								
								var stokData 	= '<input type="text" name="stokData[]" value="'+data.stokakhir+'" class="stokData jml2">';
								
								var inpJml 	= '<input type="text" onKeyup="numberformat(this)" name="stokAsli[]" value="'+data.isi_barang+'" class="jumlah">';
								
								var selisihStok = parseInt(data.isi_barang)-parseInt(data.stokakhir);
								var selisih 	= '<input type="text" name="selisih[]" value="'+selisihStok+'" class="selisih jml2">';
								var classKet	= '';
								
								var cekBrg = cekBarang(barcode);
								if(cekBrg>0){ 
									var jml1 = $('.'+barcode).closest('tr').find('.jumlah').val();
									var jml2 = parseInt(jml1)+parseInt(data.isi_barang);
									$('.'+barcode).closest('tr').find('.jumlah').val(jml2);
									
									var stokData = $('.'+barcode).closest('tr').find('.stokData').val();
									var selisih2 = parseInt(jml2)-parseInt(stokData);
									$('.'+barcode).closest('tr').find('.selisih').val(selisih2);
									if(selisih2==0){
										$('.'+barcode).closest('tr').removeClass('warning');
										$('.'+barcode).closest('tr').find('.ket').val('OK');
										$('.'+barcode).closest('tr').find('.ket').attr('readonly',true);
									} else { 
										$('.'+barcode).closest('tr').removeClass('warning').addClass('warning');
										$('.'+barcode).closest('tr').find('.ket').val('');
										$('.'+barcode).closest('tr').find('.ket').attr('readonly',false);
									}
								} else { 
									if(selisihStok==0){
										var ket = '<input type="text" name="keterangan[]" class="ket" value ="OK" readonly="readonly">';
									} else {
										var ket = '<input type="text" name="keterangan[]" class="ket">';
										classKet = 'warning';
									}
									
									$('#list-tbh-barang tr').removeClass('first'); 
									var rowIndex = $('#list-tbh-barang').dataTable().fnAddData([seq, inpBarcode, data.nama_barang, data.isi_barang, stokData , inpJml, selisih, ket, action]); 
									var row = $('#list-tbh-barang').dataTable().fnGetNodes(rowIndex);
									$(row).attr('class', 'first '+barcode+' '+classKet);  
									$(row).attr('id', seq); 					
								}
								$('#scanBarcode').val(''); 
								$('#scanBarcode').focus();
							} else {
								$.gritter.add({
									title: 'Informasi',
									text: 'Data barcode belum ada di database',
									class_name: 'gritter-error gritter-center'
								});
								$('#scanBarcode').select();
								$('#scanBarcode').focus();
							} 
							
							hitungTotal();
							
						}
					}) 
				}
			// } else {
				// $.gritter.add({
					// title: 'Informasi',
					// text: 'Tanggal stok opname belum di atur',
					// class_name: 'gritter-error gritter-center'
				// });
			// }	 
			// }
		}
	}
	
	function cekKeterangan(){
		var cek = 0;
		$('#list-tbh-barang').find('.ket').each(function(){
			if($(this).val()==''){
				cek = 1;
			}
		});
		return cek;
	}
	
	function maxNumber(){
		var no=1;
		var maxno = $('#list-tbh-barang').find('.first').attr('id');
		if(parseInt(maxno)>0){
			no = parseInt(maxno) +1 
		} 
		return no;
	} 
	
	function cekBarang(barcode){ 
		var cek = 0;
		cekJml = $('#list-tbh-barang').find('.'+barcode).find('.jumlah').val();
		if(cekJml>=0){
			cek=1;
		} 
		return cek;
	}
	
	function hitungTotal(){
		var total = 0;
		$('#list-tbh-barang').find('.jumlah').each(function(){
			var tot = $(this).val();
			total = parseInt(total) + parseInt(tot);
		});
		$('#totalPenambahan').empty();
		$('#totalPenambahan').append(total);
	}
	 
	function cekTglOpname(){ 
		var cek =0;
		$.ajax({
		url: '<?php echo base_url(); ?>Bhp/cek_tgl_opname',
		data: {'jns':'q'}, 
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
	
	function cekStokOpname(barcode){
		var cek =0;
		$.ajax({
		url: '<?php echo base_url(); ?>Bhp/cek_stok_opnamebrg',
		data: {'barcode':barcode}, 
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
		action = 'Bhp/stok_opname';
		 
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