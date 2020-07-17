<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Verifikasi Stok Opname
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
				<label class="control-label span3" for="searchBarang" style="padding-top:5px;">Cari </label>
				<div class="controls span8">
					<input id="searchBarang" class="span12 uppercase" type="text" name="searchBarang" <?= $disabled; ?>>
				</div> 
			</div> 
		</div> 
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<!--<div class="row-fluid">
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
							<th class="center">Kode Asset</th> 
							<th class="center">Nama Jns Asset</th>     
							<th class="center">Nama Barang</th>    
							<th class="center">Kondisi</th>    
							<th class="center">#</th>    
						</tr>
					</thead>
						
					<tbody> 
						<?php 
						if($cekTglOpn>0){
							$no=1;
							foreach($dtVerifikasi as $res){  
							$trclass =""; 
							if($res->cek_opname=='NO'){ $trclass = "error"; }
							?>
							<tr class="<?= $trclass; ?>" id="<?= $no; ?>">
								<td class="center"><?= $no++; ?></td>
								<td class="td2"><?= $res->kode_asset; ?></td>
								<td class="td3"><?= $res->nama_jenisasset; ?></td>  
								<td class="td4"><?= $res->nama_barang; ?></td>  
								<td class="td5"><?= $res->kondisi_asset; ?></td>  
								<td class="center">
									<button type="button" class="btn btn-primary btn-minier btn-action">
										<i class="icon-pencil bigger-120"></i>
									</button>   
								</td>
							</tr>
						
						<?php } 
							} ?>
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
<div id="perlakuan-asset" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Perlakuan Asset <span id="nmBrgPer"></span>
		</div>
	</div>

	<div class="modal-body panding4" style="overflow-y:visible;">
		<div class="row-fluid">
			<form id="form-perlakuan-asset" class="form-horizontal" />  
								 			
				<div class="control-group">
					<label class="control-label span3" for="kondisiAsset">Kondisi Asset</label>
					<div class="controls span4"> 
						<select id="kondisiAsset" name="kondisiAsset">
							<?php foreach($dtKondAsset as $val) :?>
							<option value="<?= $val->nama_kondisiasset; ?>"><?= $val->nama_kondisiasset; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label span3" for="ketPerlakuan">Keterangan</label>
					<div class="controls span9">
						<textarea id="ketPerlakuan" name="ketPerlakuan" class="span10" style="resize:none"></textarea>
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
		
		<button id="save-perlakuan-asset" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
		
		<button id="update-perlakuan-asset" class="btn btn-info btn-small pull-right" type="button" style="display:none">
			<i class="icon-save bigger-110"></i>
			Update
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
		var dataTable = $('#list-ver-opname').dataTable( {
			bAutoWidth: false, 
			"aoColumns": [
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
		 
		$('#list-ver-opname').on('click','.btn-action',function(){
			$('#perlakuan-asset').modal('show');
			var id	= ($(this).closest('tr').attr('id')).trim();  
			var kodeAsset = ($('#'+id).find('.td2').text()).trim();
			var nmBarang	= ($(this).closest('tr').find('.td4').text()).trim(); 
			$('#nmBrgPer').empty();
			$('#nmBrgPer').append(nmBarang);	 
			$('#form-perlakuan-asset')[0].reset();
			$.ajax({
				url: '<?php echo base_url(); ?>Asset/get_veropname_data',
				data: {'kodeAsset':kodeAsset},  
				type: 'post',
				dataType:'json',
				success: function(data){ 
					if(data.jenis_perlakuan!=null){
						$('#jnsPerlakuan').val(data.jenis_perlakuan); 
						$('#pic').val(data.pic);  
						$('#ketPerlakuan').val(data.keterangan); 
						$('#save-perlakuan-asset').hide();
						$('#update-perlakuan-asset').show();
						$('#update-perlakuan-asset').val(id);
					} else {
						$('#save-perlakuan-asset').show();
						$('#update-perlakuan-asset').hide();
						$('#save-perlakuan-asset').val(id);
					}
				}		
			}); 
			
		});
		
		$('#save-perlakuan-asset').click(function(){
			$('#perlakuan-asset').modal('hide');
			$('#modalLoading').modal('show'); 
			var id = $(this).val();
			var kodeAsset = ($('#'+id).find('.td2').text()).trim();
			var kondisi = $('#kondisiAsset option:selected').text();
			
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/simpan_verifikasi_opname',
			data: $('#form-perlakuan-asset').serialize()+"&kodeAsset="+kodeAsset,  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#modalLoading').modal('hide'); 
					if(data.msg){
						$('#'+id).removeClass('error');
						$('#'+id).find('.td5').empty();
						$('#'+id).find('.td5').append(kondisi);
						$.gritter.add({
							title: 'Informasi',
							text: 'Data Berhasil Disimpan',
							class_name: 'gritter-info gritter-center'
						});	
						 
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
		
		$('#update-perlakuan-asset').click(function(){
			$('#perlakuan-asset').modal('hide');
			$('#modalLoading').modal('show'); 
			var id = $(this).val();
			var kodeAsset = ($('#'+id).find('.td2').text()).trim();
			var kondisi = $('#kondisiAsset option:selected').text();
			$.ajax({
				url: '<?php echo base_url(); ?>Asset/update_ver_opname',
				data: $('#form-perlakuan-asset').serialize()+ "&kodeAsset="+kodeAsset,  
				type: 'post',
				dataType:'json',
				success: function(data){ 
					$('#modalLoading').modal('hide'); 
					if(data.msg="success"){
						$('#'+id).removeClass('error');
						$('#'+id).find('.td5').empty();
						$('#'+id).find('.td5').append(kondisi);
						
						$.gritter.add({
							title: 'Informasi',
							text: 'Data berhasil diupdate',
							class_name: 'gritter-info gritter-center'
						}); 
					} else {
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal diupdate',
							class_name: 'gritter-error gritter-center'
						}); 
					}
				}		
			}); 
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
					url: '<?php echo base_url(); ?>Asset/simpan_verall_stokopname',
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
	});
	  
	function cekBlmOpname(){
		var cek=0;
		$('#list-ver-opname').find('.error').each(function(){
			cek = cek+1;
		});
		return cek;
	}
	
	function hitungTotal(){
		var total = 0;
		$('#list-tbh-barang').find('.jml2').each(function(){
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
		action = 'Asset/ver_stok_opname';
		 
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