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
					<form id="form-tbh" class="form-horizontal"  autocomplete="off" /> 
						<div class="control-group">
							<label class="control-label span3" for="noPengajuan">No Pengajuan</label>
							<div class="controls span6">
								<input id="noPengajuan" class="span12" type="text" name="noPengajuan" value="<?= $kodePengajuan; ?>" readonly="readonly" style="background-color: #f5f5f5 !important;">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label span3" for="tglPengajuan">Tgl Pengajuan</label>
							<div class="controls span9">
								<input id="tglPengajuan" class="span6" type="text" name="tglPengajuan" value="<?= date('d-m-Y'); ?>" readonly="readonly" style="background-color: #f5f5f5 !important;">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label span3" for="keterangan">Keterangan</label>

							<div class="controls span9">						
								<textarea id="keterangan" name="keterangan" class="span10" style="resize:none;" rows="3"></textarea> 
							</div>
						</div> 
						
						<div class="control-group">
							<label class="control-label span3" for="namaBarang">Nama Barang</label>
							<div class="controls span9">
								<input id="namaBarang" class="span11 uppercase" type="text" name="namaBarang">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label span3" for="jumlah">Jumlah</label>
							<div class="controls span2">
								<input id="jumlah" class="span12 number" type="text" name="jumlah">
							</div>
							<label class="control-label span2" for="satuan">Satuan</label>
							<div class="controls span4">
								<input id="satuan" class="span12" type="text" name="satuan" readonly="readonly" style="background-color: #f5f5f5 !important;">
							</div>
						</div>
						<div class="hr hr-double hr-dotted hr18"></div>
						<div class="control-group">
							<button id="tbh-pengajuan" class="btn btn-info btn-small pull-right" type="button">
								<i class="icon-plus bigger-110"></i>
								Tambahkan
							</button> 
						</div>
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
							<b id="totalPermintaan"></b>
						</div>
					</div>
				</div>
			</div>
			<form id="form-tbh-pengajuan" class="form-horizontal" /> 
				<table class="table table-striped table-bordered" id="dt-list-pengajuan">
					<thead>
						<tr>
							<th class="center">No</th>  
							<th class="center">No Pengajuan</th>  
							<th class="center">Nama Barang</th>  
							<th class="center">Jumlah</th>  
							<th class="center">#</th>  
						</tr>
					</thead>
					
					<tbody id="add-list-pengajuan">												
						
					</tbody>
				</table> 
			</form>
			<div class="hr hr-double hr-dotted hr18"></div>
			<div class="control-group">
				<button id="simpan-pengajuan" class="btn btn-info btn-small pull-right" type="button">
					<i class="icon-save bigger-110"></i>
					Simpan
				</button> 
			</div>
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
		var input = $("input[name=namaBarang]");

		$.get('<?php echo base_url(); ?>Bhp/autocomplate_barang', function(data){
					input.typeahead({
						source: data,
						minLength: 4,
						items:5
						// showHintOnFocus:true,
					});
		}, 'json');

		input.change(function(){
			var obj = input.typeahead("getActive");
			$('#tbh-pengajuan').val(obj.id);
			$('#satuan').val(obj.nama_satuan);
		});
		//end easyAutocomplete ====================================================
		
		var listPengajuan =  $('#dt-list-pengajuan').dataTable( {
			bAutoWidth: false,
			"columnDefs": [ 
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
			],
			"order": [[0,'desc']],
			"info":false, 
			"sScrollY": "250px",
			"bPaginate": false, 
			"sDom": 'rt'
		} ); 
		
		$("#searchPengajuan").on('keyup', function (){
			listPengajuan.fnFilter(this.value);
		});
		
		$('.chzn-select-modal').chosen({width:"150px",height:"50px"});
		 		
		$('#tbh-pengajuan').click(function(){ 
			var barcode = $(this).val();
			var namaBrg = $('#namaBarang').val();
			var jumlah 	= $('#jumlah').val();
			var keterangan 	= $('#keterangan').val();
			
			if(namaBarang=="" || jumlah=="" || keterangan==""){
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu form yang ada',
					class_name: 'gritter-error gritter-center'
				});  
			} else {
				var cek = cekBarang(barcode);
				if(cek>0){
					$.gritter.add({
						title: 'Informasi',
						text: 'Permintaan barang sudah di input sebelumnya',
						class_name: 'gritter-error gritter-center'
					});  					
				} else {
					var seq 	= maxNumber(); 
					var action 	= '<button class="btn btn-danger btn-minier del-permintaan" type="button"><i class="icon-remove"></i></button>';
					
					var inpBarcode	= '<input type="text" name="rbarcode[]" value="'+barcode+'" class="barcode" readonly>'; 
					
					var inpJml 	= '<input type="text" onKeyup="numberformat(this)" name="rjumlah[]" value="'+jumlah+'" class="jumlah">';
					
					$('#dt-list-pengajuan tr').removeClass('first');
					var rowIndex = $('#dt-list-pengajuan').dataTable().fnAddData([seq,inpBarcode,namaBrg,inpJml,action]); 
					var row = $('#dt-list-pengajuan').dataTable().fnGetNodes(rowIndex);
					$(row).attr('class', 'first '+barcode);  
					$(row).attr('id', seq); 					
					$('#namaBarang').val('');
					$('#jumlah').val(''); 
					$('#namaBarang').focus();
					hitungTotal();
				}
			}
			
		}); 
		
		$('#simpan-pengajuan').click(function(){
			var keterangan 		= $('#keterangan').val();
			var noPengajuan 	= $('#noPengajuan').val();
			var tglPengajuan 	= $('#tglPengajuan').val();
			$('#modalLoading').modal('show'); 
			$.ajax({
				url: '<?php echo base_url(); ?>Bhp/simpan_pengajuan',
				data: $('#form-tbh-pengajuan').serialize()+ "&keterangan="+keterangan+ "&noPengajuan="+noPengajuan+ "&tglPengajuan="+tglPengajuan , 
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
		
		$('#add-list-pengajuan').on('click','.del-permintaan',function(){
			var id = $(this).closest('tr').attr('id');
			var namaBrg = $(this).closest('tr').find('.td3').text();
			$('#namaBrgPengajuan').empty();
			$('#namaBrgPengajuan').append(namaBrg);
			$('#delete-pengajuan').val(id);
			$('#modal-del-peng').modal('show');		
		});
		
		$('#delete-pengajuan').click(function(){
			$('#modal-del-peng').modal('hide');
			var id = $('#delete-pengajuan').val();
			listPengajuan.fnDeleteRow(document.getElementById(id));		 
			hitungTotal();
		});
	});
	
	function cekBarang(barcode){
		var cek = 0;
		$('#add-list-pengajuan .'+barcode).each(function(){
			cek=1;
		}) 
		return cek;
	}
	
	function maxNumber(){
		var no=1;
		var maxno = $('#add-list-pengajuan').find('.first').attr('id');
		if(parseInt(maxno)>0){
			no = parseInt(maxno) +1 
		} 
		return no;
	} 
	
	function hitungTotal(){
		var total = 0;
		$('#add-list-pengajuan').find('.jumlah').each(function(){
			var tot = $(this).val();
			total = parseInt(total) + parseInt(tot);
		});
		$('#totalPermintaan').empty();
		$('#totalPermintaan').append(total);
	}
	
	function reload_page(){
		 
		var form = document.createElement("form"); 
		var input = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Bhp/pengajuan_bhp';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		input.value = '';
		input.name = "pengajuan";
		input.type = "hidden";
		form.appendChild(input);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	}
</script>
