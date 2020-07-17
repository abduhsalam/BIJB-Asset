<div class="page-header position-relative">
	<h1>
		Master
		<small>
			<i class="icon-double-angle-right"></i>
			Jenis Barang Asset
		</small> 
	</h1>
</div><!--/.page-header-->

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

<div class="row-fluid">
	<div class="span12">
		<div class="span5">
			<div class="row-fluid">
				<div class="span12">
					<form id="form-jns-barang" class="form-horizontal" /> 
		
						<div class="control-group">
							<label class="control-label span4" for="jenisAsset">Jenis Asset</label>
							<div class="controls span8"> 
								<select id="jenisAsset" name="jenisAsset" class="chzn-select" data-placeholder="Pilih jenis asset">
									<option value=""></option>
									<?php
									foreach($dtjnsAsset as $val)
									{
										echo "<option value='".$val->kode_jenisasset."'>".$val->nama_jenisasset."</option>";
									}
									?>
								</select>
							</div> 
						</div> 
						
						<div class="control-group">
							<label class="control-label span4" for="kategoriAsset">Kategori Asset</label>
							<div class="controls span8"> 
								<select id="kategoriAsset" name="kategoriAsset" class="chzn-select" disabled="disabled"> 
								</select>
							</div> 
						</div> 
						
						<div class="control-group">
							<label class="control-label span4" for="namaBarang">Nama Barang</label>
							<div class="controls span8">
								<input id="namaBarang" type="text" name="namaBarang" class="uppercase"> 
							</div> 
						</div> 
						<div class="control-group">
							<label class="control-label span4" for="kodebarang">Kode Barang</label>
							<div class="controls span8">
								<input id="kodebarang" type="text" name="kodebarang" class="uppercase"> 
							</div> 
						</div> 
						<div class="hr hr-double hr-dotted hr18"></div>
						<div class="control-group">
							<button id="simpan" class="btn btn-info btn-small pull-right" type="button">
								<i class="icon-save bigger-110"></i>
								Simpan
							</button> 
							<button id="update" class="btn btn-info btn-small pull-right" type="button" style="display:none">
								<i class="icon-save bigger-110"></i>
								Update
							</button> 
						</div>
					</form>	
				</div>
			</div>
		</div> 
		<div class="span7">	 			
			<table class="table table-striped table-bordered" id="dt-list-jnsbarang">
				<thead>
					<tr>
						<th class="center">No</th>  
						<th class="center" style="display:none">kode</th> 
						<th class="center">Jenis Asset</th>   
						<th class="center">Kategori</th>  
						<th class="center">Kode Barang</th> 
						<th class="center">Nama Barang</th>   
						<th class="center">#</th>   
					</tr>
				</thead>
				
				<tbody id="">						
					
					<?php 
					$no = 1;
					foreach($dtBrgAsset as $val): ?>
					<tr id="">
						<td class="center"><?= $no++; ?></td>
						<td class="center td1" style="display:none"><?= $val->kode_barang; ?></td>
						<td class="center td2"><?= $val->nama_jenisasset; ?></td>
						<td class="center td3"><?= $val->nama_kategori; ?></td> 
						<td class="center td4"><?= $val->kode_b; ?></td> 
						<td class="center td5"><?= $val->nama_barang; ?></td> 
						<td class="center">
							<button type="button" class="btn-edit btn btn-info btn-minier">
								<i class="icon-pencil"></i>
							</button>
							<button type="button" class="btn-delete btn btn-danger btn-minier">
								<i class="icon-remove"></i>
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
<div id="modal-delete" class="modal hide fade modal-xs" data-backdrop="static" >
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
					<p><i class="icon-trash red"></i> Apakah benar akan menghapus <b id="namaDel"></b></p>
				</div>
			</div>  
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="delete-action" class="btn btn-info btn-small pull-right" type="button">
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
		 
		var dataTable = $('#dt-list-jnsbarang').dataTable( {
			// bAutoWidth: false,
			"aoColumns": [    
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },   
			  { "bSortable": false },
			  { "bSortable": false }
			],
			"aaSorting": [],
			"bFilter":true, 
			"info":true, 
			"sScrollY": "280px",
			"bPaginate": false,  
		});  
		
		$('#jenisAsset').change(function(){
			var jenisAsset = $(this).val();
			$("#kategoriAsset").empty();
			$("#kategoriAsset").prop("disabled", false); 
			var option="";
			$.ajax({
				url: '<?php echo base_url(); ?>Assetmaster/kategori_byjnsasset',
				data: {"jenisAsset":jenisAsset}, 
				type: "post",
				dataType:'json',
				success: function(data){	 
					$.each(data, function(key,val) {  
						option+="<option value='"+val.kode_kategori+"'>"+val.nama_kategori+"</option>";
					});  
					$("#kategoriAsset").append(option);  
					$("#kategoriAsset").trigger('liszt:updated');	
				}		
			});
		});
		 
		
		$('#simpan').click(function(){  
			var jnsAsset = $('#jenisAsset').val();  
			var kategoriAsset = $('#kategoriAsset').val();  
			var namaBarang = $('#namaBarang').val();  
			var kodebarang = $('#kodebarang').val(); 
			if(jnsAsset!="" && kategoriAsset!="" && namaBarang!="" && kodebarang!=""){
				var cek = cekBarangAsset();
				var cek2 = cekkodebarang();				
				if(cek<1 && cek2<1){
					$('#modalLoading').modal('show');
					$.ajax({
					url: '<?php echo base_url(); ?>Assetmaster/tambah_barangasset',
					data: {"jnsAsset":jnsAsset,"kategoriAsset":kategoriAsset, "namaBarang":namaBarang, "kodebarang":kodebarang}, 
					type: 'post',
					dataType:'json',
					success: function(data){	
							$('#modalLoading').modal('hide');
							if(data.msg){ 
								setTimeout(function(){
								  reload_page();
								}, 2000);
							} else {
								$.gritter.add({
									title: 'Informasi',
									text: 'Data gagal ditambahkan',
									class_name: 'gritter-error gritter-center'
								});  
							}
						}		
					}); 
				} else {
					if (cek>0) {
						$.gritter.add({
						title: 'Informasi',
						text: 'Nama jenis barang sudah ada sebelumnya',
						class_name: 'gritter-error gritter-center'
						});
						$('#namaJnsAsset').focus();	
					} if (cek2>0) {
						$.gritter.add({
						title: 'Informasi',
						text: 'kode jenis barang sudah ada sebelumnya',
						class_name: 'gritter-error gritter-center'
						});
						$('#kodebarang').focus();
					}					
				}
			} else {
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan lengkapi form yang ada',
					class_name: 'gritter-error gritter-center'
				});   
			}
		}); 
		
		$('#dt-list-jnsbarang').on('click','.btn-edit',function(){
			var jnsbarang 	= $(this).closest('tr').find('.td2').text(); 
			var kode 	 	= $(this).closest('tr').find('.td1').text(); 
			var kodebarang 	 	= $(this).closest('tr').find('.td4').text();
			var namaBarang 	= $(this).closest('tr').find('.td5').text();  						
			var kategori 	= $(this).closest('tr').find('.td3').text(); 			
			$('#jenisAsset option').filter(function() {
				return this.text == jnsbarang; 
			}).prop('selected', true);			
			$('#jenisAsset').trigger('liszt:updated');			
			$('#kategoriAsset').trigger('liszt:updated');			
			$('#jenisAsset').change();
			$('#kategoriAsset option').filter(function() {
				return this.text == kategori; 
			}).prop('selected', true);			
			$('#kategoriAsset').trigger('liszt:updated');			
			$('#namaBarang').val(namaBarang);
			$('#kodebarang').val(kodebarang);
			$('#update').val(kode);
			$('#update').show();
			$('#simpan').hide();
		});
		
		$('#update').click(function(){  
			var jnsAsset = $('#namaJnsAsset').val();  
			var namaBarang = $('#namaBarang').val();  
			var kodebarang = $('#kodebarang').val(); 
			var kategori = $('#kategoriAsset').val();
			var kode = $(this).val(); 
			$('#modalLoading').modal('show');
			$.ajax({
			url: '<?php echo base_url(); ?>Assetmaster/update_namabrg',
			data: {'kode':kode, 'namaBarang':namaBarang, 'kodebarang':kodebarang, 'kategori':kategori}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
					$('#modalLoading').modal('hide');
					if(data['msg']>0){ 
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
		});
		
		$('#delete-action').click(function(){ 
			var kode = $(this).val(); 			
			$('#modal-delete').modal('hide');
			$('#modalLoading').modal('show');
			$.ajax({
			url: '<?php echo base_url(); ?>Assetmaster/delete_brgasset',
			data: {'kode':kode}, 
			type: 'post',
			dataType:'json',
			success: function(data){	
					$('#modalLoading').modal('hide');
					if(data.delete=='YES'){ 
						if(data.msg){
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil di update',
								class_name: 'gritter-info gritter-center'
							});  
							setTimeout(function(){
							  reload_page();
							}, 2000);
						} else  {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data tidak bisa di hapus',
								class_name: 'gritter-error gritter-center'
							}); 
						}
					} 
					else {
						$.gritter.add({
							title: 'Informasi',
							text: 'Data masi digunakan sehingga tidak bisa di hapus',
							class_name: 'gritter-error gritter-center'
						});  
					}
				}		
			}); 
		})
		
		$('#dt-list-jnsbarang').on('click','.btn-delete',function(){ 
			var kode 	 	= $(this).closest('tr').find('.td1').text(); 
			var jnsAsset 	= $(this).closest('tr').find('.td2').text(); 
			$('#delete-action').val(kode);
			$('#namaDel').empty();
			$('#namaDel').append(jnsAsset);
			$('#modal-delete').modal('show');
		});
	}); 
	
	function cekBarangAsset(){
		var namaBarang = $('#namaBarang').val();
		var cek =0;
		$.ajax({
		url: '<?php echo base_url(); ?>Assetmaster/cek_barang_asset',
		data: {'namaBarang':namaBarang}, 
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

	function cekkodebarang(){
		var kodebarang = $('#kodebarang').val();
		var kodekategori = $('#kategoriAsset').val();
		var cek =0;
		$.ajax({
		url: '<?php echo base_url(); ?>Assetmaster/cek_kodebarang_asset',
		data: {'kodebarang':kodebarang, 'kodekategori':kodekategori}, 
		type: 'post',
		dataType:'json',		
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
		action = 'Assetmaster/jenis_barang_asset';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		input.value = '';
		input.name = "jnsbrgasset";
		input.type = "hidden";
		form.appendChild(input);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	}
</script>
