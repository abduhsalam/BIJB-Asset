<div class="page-header position-relative">
	<h1>
		Barang Habis Pakai
		<small>
			<i class="icon-double-angle-right"></i>
			Tambah Barang
		</small> 
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<div class="span6"> 
			<div class="control-group">
				<label class="control-label span3" for="scanBarcode" style="padding-top:5px;">Scan Barcode</label>
				<div class="controls span8">
					<input id="scanBarcode" onkeypress="scanBarcode(event)" class="span12 uppercase" type="text" name="scanBarcode">
				</div> 
			</div> 
		</div>
		<div class="span6" style="background-color:#e4e6e9">
			<div class="span8" style="padding-top:5px; padding-left:10px; text-align:right;">
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
		
		<form id="form-tbh-brg" class="form-horizontal" /> 
			<table class="table table-striped table-bordered" id="list-tbh-barang">							
				<thead>
					<tr> 
						<th class="center">No</th> 
						<th class="center">Barcode</th> 
						<th class="center">Nama Barang</th>  
						<th class="center">Isi Barang</th> 
						<th class="center">Satuan Barang</th> 
						<th class="center">Jumlah</th>    
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
			<button id="simpan-tbh-barang" class="btn btn-info btn-small pull-right" type="button">
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
		$('#scanBarcode').focus();
		var dataTable = $('#list-tbh-barang').dataTable( {
			bAutoWidth: false,
			"columnDefs": [ 
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
			],
			"order": [[0,'desc']],
			"info":false, 
			"sScrollY": "300px",
			"bPaginate": false, 
			"sDom": 'rt'
		}); 
		
		$('.chzn-select-modal').chosen({width:"150px",height:"50px"});
		 
		$('#simpan-tbh-barang').click(function(){ 
			$('#modalLoading').modal('show'); 
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/simpan_tbhbrg',
				data: $('#form-tbh-brg').serialize(), 
				type: "post",
				dataType:'json', 
				success: function(data){  
					if(data.msg=='success'){
						$('#modalLoading').modal('hide');  
						$.gritter.add({
							title: 'Informasi',
							text: 'Penambahan Barang Berhasil Disimpan',
							class_name: 'gritter-info gritter-center'
						});	
						reload_page();
					} else {
						$('#modalLoading').modal('hide'); 
						$.gritter.add({
							title: 'Informasi',
							text: 'Penambahan Barang Gagal Disimpan',
							class_name: 'gritter-error gritter-center'
						});	
					}
				}
			});
		});
	});
	
	function scanBarcode(e){
		var key=e.keyCode || e.which;
		if(key==13){
			var barcode = $('#scanBarcode').val();  
			// if(cekRow<=500){				
				$.ajax({
					url: '<?php echo base_url(); ?>Bhp/scan_tambah_brg',
					data: {"barcode":barcode}, 
					type: "post",
					dataType:'json',
					success: function(data){
						if(data.cek_barcode>0){
							var seq 	= maxNumber(); 
							var action 	= '<button class="btn btn-danger btn-minier del-permintaan" type="button"><i class="icon-remove"></i></button>';
							
							var inpBarcode	= '<input type="text" name="tbarcode[]" value="'+data.barcode+'" class="barcode" readonly>';  
							
							var inpJml 	= '<input type="text" onKeyup="numberformat(this)" name="tjumlah[]" value="'+data.isi_barang+'" class="jumlah">';
							var cekBrg = cekBarang(barcode);
							if(cekBrg>0){ 
								var jml1 = $('.'+barcode).closest('tr').find('.jumlah').val();
								var jml2 = parseInt(jml1)+parseInt(data.isi_barang);
								$('.'+barcode).closest('tr').find('.jumlah').val(jml2);
							} else {
								$('#list-tbh-barang tr').removeClass('first');
								var rowIndex = $('#list-tbh-barang').dataTable().fnAddData([seq,inpBarcode,data.nama_barang,data.isi_barang,data.nama_satuan, inpJml, action]); 
								var row = $('#list-tbh-barang').dataTable().fnGetNodes(rowIndex);
								$(row).attr('class', 'first '+barcode);  
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
				 
			// }
		}
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
	
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Bhp/tambah_barang';
		 
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