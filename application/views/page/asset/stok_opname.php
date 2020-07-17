<div class="page-header position-relative">
	<h1>
		Asset
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
				<label class="control-label span3" for="scanBarcode" style="padding-top:5px;">Scan Kode Asset</label>
				<div class="controls span8">
					<input id="scanBarcode" onkeypress="scanBarcode(event)" class="span12 uppercase" type="text" name="scanBarcode" <?= $disabled; ?>>
				</div> 
			</div> 
		</div>
		<!--<div class="span6" style="background-color:#e4e6e9"> 
			<div class="span4" style="padding-top:5px; padding-left:10px; text-align:right;">
				<b>Total : </b>
			</div>
			<div class="span4" style="padding-top:5px; padding-left:10px; text-align:left;">
				<b id="totalPenambahan"></b>
			</div>
		</div>-->
	</div>
</div> 
<div class="row-fluid">
	<div class="span12">
		<div id="boxCek" class="widget-box transparent collapsed">
			<div class="widget-header widget-header-flat">
				<h4 class="lighter">
					<i class="icon-check orange"></i>
					Cek Kondisi Asset
				</h4> 
			</div>

			<div class="widget-body">
				<div class="widget-main padding-4">
					<form id="form-perlakuan-asset" class="form-horizontal">
						<div class="row-fluid">
							<div class="span6">		
								<div class="control-group">
									<div class="controls span6"> 
										<center><img src="" id="objAsset" width="200px" height="200px"> </center>
									</div>
									<div class="controls span6"> 
										<center><img src="" id="kelAsset" width="200px" height="200px"> </center>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label span3" for="kodeAsset">Kode Aset</label>

									<div class="controls span5"> 
										<input id="kodeAsset" class="form-control span12" type="text" name="kodeAsset" readonly />  
									</div>				
								</div>
								<div class="control-group">								
									<label class="control-label span3" for="tglPembelian">Tgl Pembelian</label>
									<div class="controls span3"> 
										<div class="row-fluid input-append">
											<input class="span12" id="tglPembelian" type="text" data-date-format="dd-mm-yyyy" name="tglPembelian" readonly="readonly" />
											<span class="add-on">
												<i class="icon-calendar"></i>
											</span>
										</div> 
									</div>
								</div> 
								<div class="control-group">
									<label class="control-label span3" for="jnsAset">Jenis Aset</label>

									<div class="controls span5"> 
										<input id="jnsAsset" class="form-control span12" type="text" name="jnsAsset" readonly />  
									</div>				
								</div>
								
								<div class="control-group">
									<label class="control-label span3" for="namaBrg">Nama Barang</label>

									<div class="controls span8"> 
										<input id="namaBrg" class="form-control span12" type="text" name="namaBrg" readonly />  
									</div>				
								</div>
								
								
							</div>
							<div class="span6"> 
								<div class="control-group">
									<label class="control-label span3" for="spesifikasi">Spesifikasi</label>

									<div class="controls span8"> 
										<textarea id="spesifikasi" name="spesifikasi" class="span12" style="resize:none;" rows="2"readonly="readonly"></textarea> 	 
									</div>
								</div> 
								<div class="control-group">
									<label class="control-label span3" for="keterangan">Kelengkapan</label>

									<div class="controls span8">
										<textarea id="kelengkapan" name="kelengkapan" class="span12" style="resize:none;" rows="2" readonly="readonly"></textarea> 
									</div>
								</div> 
								<div class="control-group">
									<label class="control-label span3" for="kondisiAsset">Kondisi Asset</label>
									<div class="controls span4"> 
										<select id="kondisiAsset" name="kondisiAsset">
											<?php foreach($dtKondAsset as $val) : ?>
											<option value="<?= $val->nama_kondisiasset; ?>"><?= $val->nama_kondisiasset; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div> 
								
								<div class="control-group">
									<label class="control-label span3" for="ketPerlakuan">Keterangan</label>
									<div class="controls span8">
										<textarea id="ketPerlakuan" name="ketPerlakuan" class="span12" style="resize:none"></textarea>
									</div>
								</div>  
								<div class="control-group">
									<div class="controls span11">
										<button id="save-perlakuan-asset" class="btn btn-info btn-small pull-right" type="button">
											<i class="icon-save bigger-110"></i>
											Simpan
										</button> 
									</div>
								</div>
							</div>
						</div>
					</form> 
				</div><!--/widget-main-->
			</div><!--/widget-body-->
		</div><!--/widget-box-->
		
	</div>
</div>
<div class="hr"></div> 
<div class="row-fluid">
	<div class="span12"> 
		<form id="form-stokopname-brg" class="form-horizontal" /> 
			<table class="table table-striped table-bordered" id="list-tbh-opname">							
				<thead>
					<tr> 
						<th class="center">No</th> 
						<th class="center">Kode Asset</th> 
						<th class="center">Nama Jns Asset</th>     
						<th class="center">Nama Barang</th>    
						<th class="center">Status</th>    
						<th class="center">#</th>    
					</tr>
				</thead>
					
				<tbody>  
				</tbody>
			</table> 
		</form>
		<div class="hr hr-double hr-dotted hr18"></div>
		<div class="control-group">
			<button id="btn-selesai" class="btn btn-info btn-small pull-right" type="button" <?= $disabled; ?>>
				<i class="icon-refresh bigger-110"></i>
				Selesai
			</button> 
		</div>
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
					<p><i class="icon-ok green"></i> Apakah anda yakin akan menghapus stok opname asset <b id="namaBarang"></b> ? </p>
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
		var dataTable = $('#list-tbh-opname').dataTable( {
			bAutoWidth: false,
			"columnDefs": [ 				 
				{ className:"center", "targets": [ 5 ] },
				{ className:"center", "targets": [ 4 ] },
				{ className:"center", "targets": [ 3 ] },
				{ className:"td3", "targets": [ 2 ] },
				{ className:"td2", "targets": [ 1 ] },
				{ className:"center", "targets": [ 0 ], "visible": false, }
			], 
			"aoColumns": [
			  null,  
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
		
		$('#save-perlakuan-asset').click(function(){ 
			$('#modalLoading').modal('show'); 
			 
			var kodeAsset 	= $('#kodeAsset').val(); 
			var jnsAsset 	= $('#jnsAsset').val(); 
			var namaBrg 	= $('#namaBrg').val(); 
			var jnsPerlakuan = $('#jnsPerlakuan option:selected').text();
			var btnDel 		= '<button class="btn btn-danger btn-minier del-stokopname" type="button"><i class="icon-remove"></i></button>';
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/simpan_opname_asset',
			data: $('#form-perlakuan-asset').serialize(),  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#modalLoading').modal('hide'); 
					if(data.msg){
						$('#boxCek').addClass('collapsed');
						$.gritter.add({
							title: 'Informasi',
							text: 'Data Berhasil Disimpan',
							class_name: 'gritter-info gritter-center'
						});	
						
						var seq 	= maxNumber(); 
						$('#list-tbh-opname tr').removeClass('first'); 
						var rowIndex = $('#list-tbh-opname').dataTable().fnAddData([seq, kodeAsset, jnsAsset, namaBrg, jnsPerlakuan, btnDel]); 
						var row = $('#list-tbh-opname').dataTable().fnGetNodes(rowIndex);
						$(row).attr('class', 'first ');  
						$(row).attr('kondisi', data.kondisiSblm);  
						$(row).attr('id', seq); 	
					} else {
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal disimpan',
							class_name: 'gritter-error gritter-center'
						}); 
					} 
				}		
			});  
		});
		
		$('#list-tbh-opname').on('click','.del-stokopname',function(){
			var id = $(this).closest('tr').attr('id'); 
			var kodeAsset = $(this).closest('tr').find('.td2').text();  
			
			$('#namaBarang').empty();
			$('#namaBarang').append(kodeAsset);
			$('#delete-stokopname').val(id);
			$('#modal-del').modal('show');
		});
		
		$('#delete-stokopname').click(function(){
			var id = $(this).val();
			var kdAsset = $('#list-tbh-opname #'+id).find('.td2').text();
			var kondisi = $('#list-tbh-opname #'+id).attr('kondisi');
			$('#modal-del').modal('hide');
			$('#modalLoading').modal('show');
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/delete_stokopname',
			data: {'kdAsset':kdAsset, 'kondisi':kondisi}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
					$('#modalLoading').modal('hide'); 
					if(data.msg=="success"){
						$.gritter.add({
							title: 'Informasi',
							text: 'Data berhasil di hapus',
							class_name: 'gritter-info gritter-center'
						});  
						$('#list-tbh-opname').find('#'+id).remove(); 
					} else  {
						$.gritter.add({
							title: 'Informasi',
							text: 'Data tidak bisa di hapus',
							class_name: 'gritter-error gritter-center'
						}); 
						}
					 
				}		
			}); 
		});
		$('#btn-selesai').click(function(){
			reload_page();
		});
	});
	
	function scanBarcode(e){
		var key=e.keyCode || e.which;
		if(key==13){ 
			var barcode = $('#scanBarcode').val();  
			var cek = cekBarcode(barcode); 	
			if(cek==1){
			$('#boxCek').removeClass('collapsed'); 
				$.ajax({
					url: '<?php echo base_url(); ?>Asset/scan_opname_asset',
					data: {"barcode":barcode}, 
					type: "post",
					dataType:'json',
					success: function(data){
						$('#kodeAsset').val(barcode);
						$('#jnsAsset').val(data.nama_jenisasset);
						$('#namaBrg').val(data.nama_barang);
						$('#spesifikasi').val(data.spesifikasi);
						$('#kelengkapan').val(data.kelengkapan);
						$('#tglPembelian').val(convertDate(data.tgl_pembelian));
						var obj = '<?php echo base_url(); ?>assets/images/imgasset/pembelian/'+data.img_objek;
						$('#objAsset').attr('src',obj);
						var kel = '<?php echo base_url(); ?>assets/images/imgasset/pembelian/'+data.img_kelengkapan;
						$('#kelAsset').attr('src',kel);
						$('#scanBarcode').val(''); 
						$('#scanBarcode').focus();
						 					
					}
				})  
			}
			
			if(cek>1){
				$.gritter.add({
					title: 'Informasi',
					text: 'Data asset sudah di stok opname sebelumnya',
					class_name: 'gritter-error gritter-center'
				});
				$('#scanBarcode').select();
				$('#scanBarcode').focus();
			}
			if(cek<1) {
				$.gritter.add({
					title: 'Informasi',
					text: 'Data asset tidak ditemukan atau sudah tidak digunakan',
					class_name: 'gritter-error gritter-center'
				});
				$('#scanBarcode').select();
				$('#scanBarcode').focus();
			}  		
		}
	}   
	
	function cekBarcode(barcode){
		var cek =0;
		$.ajax({
		url: '<?php echo base_url(); ?>Asset/cek_barcode',
		data: {'barcode':barcode}, 
		type: 'post',
		dataType:'json',
		async:false,
		success: function(data){	  
				cek = data;
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