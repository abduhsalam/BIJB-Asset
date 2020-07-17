<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Data Asset Tanah Bangunan
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-asset">							
			<thead>
				<tr> 
					<th class="center">Kode Asset</th>  
					<th class="center">Tgl Pembelian</th>  
					<th class="center">Nama Asset</th>  
					<th class="center">Luas Tanah</th>   
					<th class="center">Lokasi Tanah</th>  
					<th class="center">Jensi Surat</th>  
					<th class="center" width="100px">Action</th>  
				</tr>
			</thead> 
				<?php foreach($dtAsset as $val): ?>
					<tr id="<?= $val->id_assettnhbgn; ?>">
						<td class="td1"><?= $val->kode_asset; ?></td> 
						<td class="center"><?= date("d-m-Y", strtotime($val->tgl_pembelian)); ?></td>  
						<td class="td4"><?= $val->nama_barang; ?></td> 
						<td class="center"><?= $val->luas_tnhbgn; ?></td>   
						<td class="center"><?= $val->lokasi_tnhbgn; ?></td>   
						<td class="center"><?= $val->jenissurat_tnhbgn; ?></td>   
						<td class="center">
							<button class="btn btn-info btn-mini btn-detail">
								<i class="icon-search"></i>
							</button>
							<button class="btn btn-success btn-mini btn-distribusi">
								<i class="icon-signin bigger-120"></i>
							</button>
							<button class="btn btn-warning btn-mini btn-perlakuan">
								<i class="icon-calendar bigger-120"></i>
							</button> 
						</td>
					</tr>
				<?php endforeach; ?>
			<tbody> 
			</tbody>
		</table>
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

<div id="detail-asset" class="modal hide fade" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Detail Asset <span id="nmBrgDet"></span>
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<div class="tabbable">
				<ul class="nav nav-tabs" id="myTab">
					<li class="tab-parent" id="tab1">
						<a data-toggle="tab" href="#profileAsset">
							<i class="green icon-home bigger-110"></i>
							Profile Asset
						</a>
					</li>

					<li class="tab-parent">
						<a data-toggle="tab" href="#perolehan">
							<i class="blue icon-check  bigger-110"></i>  
							Perolehan 
						</a>
					</li>
					
					<li class="tab-parent">
						<a data-toggle="tab" href="#gambar">
							<i class="pink icon-camera-retro bigger-110"></i>  
							Gambar 
						</a>
					</li>	
					
					<li class="tab-parent">
						<a data-toggle="tab" id="tab-distribusi" href="#distribusi">
							<i class="red icon-share-alt bigger-110"></i>  
							Distribusi 
						</a>
					</li>

					<li class="tab-parent">
						<a data-toggle="tab" id="tab-perlakuan" href="#perlakuan">
							<i class="purple icon-reply bigger-110"></i>  
							Perlakuan 
						</a>
					</li>
				</ul>

				<div class="tab-content">
					<div id="profileAsset" class="tab-pane">
						<div class="profile-user-info profile-user-info-striped">
							<div class="profile-info-row">
								<div class="profile-info-name"> Kode Asset </div>
								<div class="profile-info-value">
									<span id="kdAsset">Kode Asset</span>
								</div>
							</div> 
							<div class="profile-info-row">
								<div class="profile-info-name"> Jenis Asset </div>
								<div class="profile-info-value">
									<span id="jnsAsset">Jenis asset</span>
								</div>
							</div> 
							<div class="profile-info-row">
								<div class="profile-info-name"> Nama Barang </div>
								<div class="profile-info-value">
									<span id="namaBarang">Nama Barang</span>
								</div>
							</div> 
							<div class="profile-info-row">
								<div class="profile-info-name"> Merk </div>
								<div class="profile-info-value">
									<span id="merk">Merk</span>
								</div>
							</div>  
							<div class="profile-info-row">
								<div class="profile-info-name"> Spesifikasi </div>
								<div class="profile-info-value">
									<span id="spesifikasi">Spesifikasi</span>
								</div>
							</div> 
							<div class="profile-info-row">
								<div class="profile-info-name"> kelengkapan </div>
								<div class="profile-info-value">
									<span id="kelengkapan">kelengkapan</span>
								</div>
							</div> 
						</div>
					</div>

					<div id="perolehan" class="tab-pane">
						<div class="profile-user-info profile-user-info-striped">
							<div class="profile-info-row">
								<div class="profile-info-name"> Tgl Perolehan </div>
								<div class="profile-info-value">
									<span id="tglPerolehan">Tgl Perolehan</span>
								</div>
							</div> 
							<div class="profile-info-row">
								<div class="profile-info-name"> Sumber Perolehan </div>
								<div class="profile-info-value">
									<span id="sbrPerolehan">Sumber Perolehan</span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Vendor </div>
								<div class="profile-info-value">
									<span id="vendor">Vendor</span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Alamat Vendor </div>
								<div class="profile-info-value">
									<span id="alamatVendor">Alamat Vendor</span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> harga Perolehan </div>
								<div class="profile-info-value">
									<span id="hargaPerolehan">harga Perolehan</span>
								</div>
							</div>
						</div>
					</div>

					<div id="gambar" class="tab-pane">
						<div class="profile-user-info profile-user-info-striped">
							<div class="profile-info-row">
								<div class="profile-info-name"> Objek Asset </div>
								<div class="profile-info-value"> 
									<img src="" id="objAsset" width="200px" height="200px"> 
								</div>
							</div> 
							<div class="profile-info-row">
								<div class="profile-info-name"> kelengkapan </div>
								<div class="profile-info-value"> 
									<img src="" id="kelAsset" width="200px" height="200px"> 
								</div>
							</div> 
						</div>
					</div>

					<div id="distribusi" class="tab-pane">
						<div id="loading-distribusi" class="row-fluid">
							<div class="span12">
								<div class="progress progress-info progress-striped active">
									<div class="bar" style="width: 100%">Loading</div>
								</div>
							</div>
						</div>
						<div id="table-distribusi" class="row-fluid" style="display:none">
							<div class="span12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">Tanggal</th>
										<th class="center">Kepada</th>
										<th class="center">Lokasi Penyimpanan</th>
										<th class="center">Keterangan</th>
										<th class="center">Bukti</th>
									</tr>
								</thead>
								<tbody id="list-distribusi">
								</tbody>
							</table> 
							</div>
						</div>
					</div>
					
					<div id="perlakuan" class="tab-pane">
						<div id="loading-perlakuan" class="row-fluid">
							<div class="span12">
								<div class="progress progress-info progress-striped active">
									<div class="bar" style="width: 100%">Loading</div>
								</div>
							</div>
						</div>
						<div id="table-perlakuan" class="row-fluid" style="display:none">
							<div class="span12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">Tanggal</th>
										<th class="center">Jenis Perlakuan</th>
										<th class="center">Detail Perlakuan</th>
										<th class="center">Keterangan</th>
									</tr>
								</thead>
								<tbody id="list-perlakuan">
								</tbody>
							</table> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
</div>

<div id="distribusi-asset" class="modal hide fade" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Distribusi Asset <span id="nmBrgDis"></span>
		</div>
	</div>
	
	<div class="modal-body padding-8">
		<div class="row-fluid"> 
			<div class="span12">
				<form id="form-distribusi-asset" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_distribusi_asset" method="post" enctype="multipart/form-data"> 
					<div class="span6">  
						<div class="control-group">
							<label class="control-label span4" for="tglDistribusi">Tgl Distribusi</label>
							<div class="controls span3">  
								<div class="row-fluid input-append">
									<input class="span12 date-picker" id="tglDistribusi" type="text" data-date-format="dd-mm-yyyy" name="tglDistribusi" value="<?= date('d-m-Y'); ?>" />
									<span class="add-on">
										<i class="icon-calendar"></i>
									</span>
								</div> 
							</div>
						</div> 
						<div class="control-group">
							<label class="control-label span4" for="peneriman">Penerima</label>
							<div class="controls span4"> 
								<select name="peneriman">
									<option value="penerima1">Penerima1</option>
									<option value="penerima2">Penerima2</option>
									<option value="penerima3">Penerima3</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span4" for="penanggungjwb">Penanggung Jawab</label>
							<div class="controls span6">
								<select name="penanggungjwb">
									<option value="penanggungjwb1">Penanggung Jawab 1</option>
									<option value="penanggungjwb2">Penanggung Jawab 2</option>
									<option value="penanggungjwb3">Penanggung Jawab 3</option>
								</select>
							</div>
						</div> 
						<div class="control-group">
							<label class="control-label span4" for="kelDis">kelengkapan</label>
							<div class="controls span8">
								<textarea id="kelDis" name="kelDis" class="span12" style="resize:none"></textarea>
							</div>
						</div> 
					</div>
					<div class="span6">  
						<div class="control-group">
							<label class="control-label span4" for="buktiDistribusi">Bukti Distribusi</label>
							<div class="controls span8"> 
								<div class="span12"> 
									<input type="file" id="buktiDistribusi" class="input-file file-image" name="buktiDistribusi" />
								</div> 
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span4" for="lokasi">Lokasi Penyimpanan</label>
							<div class="controls span8"> 
								<div class="span12">
									<textarea id="lokasi" name="lokasi" class="span12" style="resize:none"></textarea>
								</div> 
							</div>
						</div> 
						<div class="control-group">
							<label class="control-label span4" for="ketdis">Keterangan</label>
							<div class="controls span8">
								<textarea id="ketdis" name="ketdis" class="span12" style="resize:none"></textarea>
							</div>
						</div>
						<input type="hidden" id="idAssetDis" name="idAssetDis" readonly> 
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-distribusi-asset" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	
</div>

<div id="perlakuan-asset" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Perlakuan Asset <span id="nmBrgPer"></span>
		</div>
	</div>

	<div class="modal-body panding4">
		<div class="row-fluid">
			<form id="form-perlakuan-asset" class="form-horizontal" />  
				
				<div class="control-group">
					<label class="control-label span3" for="tglPerlakuan">Tgl Perlakuan</label>
					<div class="controls span9"> 
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglPerlakuan" type="text" data-date-format="dd-mm-yyyy" name="tglPerlakuan" value="<?= date('d-m-Y'); ?>" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label span3" for="jnsPerlakuan">Jenis Perlakuan</label>
					<div class="controls span4"> 
						<select name="jnsPerlakuan">
							<option value="perlakuan1">Perlakuan1</option>
							<option value="perlakuan2">Perlakuan2</option>
							<option value="perlakuan3">Perlakuan3</option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="pic">PIC</label>
					<div class="controls span6">
						<select name="pic">
							<option value="pic1">PIC1</option>
							<option value="pic2">PIC2</option>
							<option value="pic3">PIC3</option>
						</select>
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label span3" for="detPerlakuan">Detail</label>
					<div class="controls span9">
						<textarea id="detPerlakuan" name="detPerlakuan" class="span10" style="resize:none"></textarea>
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label span3" for="ketPerlakuan">Keterangan</label>
					<div class="controls span9">
						<textarea id="ketPerlakuan" name="ketPerlakuan" class="span10" style="resize:none"></textarea>
					</div>
				</div> 
				
				<input type="hidden" id="noAssetPer" readonly>
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
	</div>
</div>

<div id="bukti-distribusi" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Bukti Distribusi
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<center><img src="" id="img-distribusi" width="300px" height="300px"></center>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Close
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
		var dataTable = $('#dt-data-asset').dataTable( {
			// bAutoWidth: false,
			// "aoColumns": [    
			  // { "bSortable": false }, 
			  // { "bSortable": false }, 
			  // { "bSortable": false }, 
			  // { "bSortable": false },   
			  // { "bSortable": false }, 
			  // { "bSortable": false },   
			  // { "bSortable": false },   
			  // { "bSortable": false },    
			// ],
			// "aaSorting": [],
			// "bFilter":true, 
			// "info":true, 
			// "sScrollY": "300px",
			// "bPaginate": false,  
		});
			
		$('.input-file').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false 
		});
		
		$('#dt-data-asset').on('click','.btn-detail',function(){
			$('#modalLoading').modal('show');
			$('.tab-parent').each(function(){
				$(this).removeClass('active');
			});
			$('.tab-pane').each(function(){
				$(this).removeClass('active');
			})
			$('#tab1').addClass('active');
			$('#profileAsset').addClass('active');
			$('#loading-distribusi').show();
			$('#table-distribusi').hide(); 
			$('#loading-perlakuan').show();
			$('#table-perlakuan').hide(); 
			var nmBarang	= ($(this).closest('tr').find('.td4').text()).trim(); 
			$('#nmBrgDet').empty();
			$('#nmBrgDet').append(nmBarang);
			var idAsset	= ($(this).closest('tr').attr('id')).trim();   
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_asset_byid',
			data: {'idAsset':idAsset}, 
			type: 'post',
			dataType:'json',
			success: function(data){	    
					$('#kdAsset').empty();
					$('#kdAsset').append(data.kode_asset);
					$('#namaBarang').empty();
					$('#namaBarang').append(data.nama_barang);
					$('#merk').empty();
					$('#merk').append(data.merk_asset);
					$('#jnsAsset').empty();
					$('#jnsAsset').append(data.nama_jenisasset);
					$('#spesifikasi').empty();
					$('#spesifikasi').append(data.spesifikasi);
					$('#kelengkapan').empty();
					$('#kelengkapan').append(data.kelengkapan);
					$('#tglPerolehan').empty();
					$('#tglPerolehan').append(data.tgl_pembelian);
					$('#djumlah').empty();
					$('#djumlah').append(data.jumlah);
					$('#sbrPerolehan').empty();
					$('#sbrPerolehan').append(data.nama_sumberanggaran);
					$('#vendor').empty();
					$('#vendor').append(data.nama_vendor);
					$('#alamatVendor').empty();
					$('#alamatVendor').append(data.alamat_vendor); 
					$('#hargaPerolehan').empty();
					$('#hargaPerolehan').append(data.harga); 	 
					var obj = '<?php echo base_url(); ?>assets/images/imgasset/pembelian/'+data.omg_objek;
					$('#objAsset').attr('src',obj);
					var kel = '<?php echo base_url(); ?>assets/images/imgasset/pembelian/'+data.img_kelengkapan;
					$('#kelAsset').attr('src',kel);
					
					$('#modalLoading').modal('hide');
					$('#detail-asset').modal('show');
				}		
			}); 
			
		});
		
		$('#tab-distribusi').click(function(){ 
			var kdAsset = ($('#kdAsset').text()).trim();
			var tr="";
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_distribusi_bykdasset',
			data: {'kdAsset':kdAsset},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-distribusi').hide(); 
					$('#table-distribusi').show();
					$.each(data, function(key,val) {  
					  tr+='<tr id="'+val.id_distribusi+'">';
					  tr+='<td>'+convertDate(val.tgl_distribusi)+'</td>';
					  tr+='<td>'+val.penerima+'</td>';
					  tr+='<td>'+val.lokasi_distribusi+'</td>';
					  tr+='<td>'+val.biaya_mainten+'</td>';
					  tr+='<td class="center"><button class="btn btn-info btn-mini btn-bukti-dis"><i class="icon-search"></i></button</td>';
					  tr+='</tr>';
					});   
					$('#list-distribusi').empty();
					$('#list-distribusi').append(tr); 
				}		
			}); 
		});
		
		$('#tab-perlakuan').click(function(){
			var kdAsset = ($('#kdAsset').text()).trim();
			var tr="";
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_perlakuan_bykdasset',
			data: {'kdAsset':kdAsset},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-perlakuan').hide(); 
					$('#table-perlakuan').show();
					$.each(data, function(key,val) {  
					  tr+='<tr>';
					  tr+='<td>'+convertDate(val.tgl_perlakuan)+'</td>';
					  tr+='<td>'+val.jenis_perlakuan+'</td>'; 
					  tr+='<td>'+val.detail+'</td>';
					  tr+='<td>'+val.biaya_mainten+'</td>';
					  tr+='</tr>';
					});   
					$('#list-perlakuan').empty();
					$('#list-perlakuan').append(tr); 
				}		
			}); 
		}); 
		
		$('#dt-data-asset').on('click','.btn-distribusi',function(){  			
			var idAssetDis	= ($(this).closest('tr').attr('id')).trim(); 
			var nmBarang	= ($(this).closest('tr').find('.td4').text()).trim(); 
			$('#nmBrgDis').empty();
			$('#nmBrgDis').append(nmBarang);
			$('#idAssetDis').val(idAssetDis);
			$('#buktiDistribusi').val('');
			$('#form-distribusi-asset')[0].reset(); 
			$('#distribusi-asset').modal('show');
		});
		
		$('#dt-data-asset').on('click','.btn-perlakuan',function(){ 
			$('#perlakuan-asset').modal('show');
			var noAsset	= ($(this).closest('tr').find('.td1').text()).trim();  
			var nmBarang	= ($(this).closest('tr').find('.td4').text()).trim(); 
			$('#nmBrgPer').empty();
			$('#nmBrgPer').append(nmBarang);		
			$('#noAssetPer').val(noAsset);
			$('#form-perlakuan-asset')[0].reset();
		}); 
		
		$('#save-distribusi-asset').click(function(){ 
			var kelengkapan = $('#kelDis').val();
			var keterangan	= $('#keterangan').val();
			var lokasi		= $('#lokasi').val();
			var image		= $('#buktiDistribusi').val();
			var idtr		= $('#idAssetDis').val();
			
			if(kelengkapan!="" && keterangan!="" && image!="" && lokasi!=""){
				var cekImage = image.split(".");
				var count = (cekImage.length)-1;
				if(cekImage[count]=='jpg' || cekImage[count]=='jpeg' || cekImage[count]=='png'){
				if(($('#buktiDistribusi')[0].files[0].fileSize)>2097152){
					$.gritter.add({
						title: 'Informasi',
						text: 'Upload file maksimal 2MB',
						class_name: 'gritter-error gritter-center'
					}); 
				} else {
					$('#distribusi-asset').modal('hide');
					$('#modalLoading').modal('show'); 
					var url = $('#form-distribusi-asset').attr('action');
					var formData = new FormData($('#form-distribusi-asset')[0]); 
					$.ajax({
						url: url,
						type: 'POST',
						data: formData,
						processData: false,
						contentType: false, 
						success: function (res) { 	
							$('#modalLoading').modal('hide'); 
							$('#'+idtr).find('.status').empty();
							$('#'+idtr).find('.status').append('<span class="label label-pink arrowed">DISTRIBUSI</span>');
							
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil disimpan',
								class_name: 'gritter-success gritter-center'
							}); 
						},
						error: function (error) {  
							$('#modalLoading').modal('hide'); 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal disimpan',
								class_name: 'gritter-error gritter-center'
							}); 
						}
					}); // End: $.ajax()
				}
				} else {
					$.gritter.add({
						title: 'Informasi',
						text: 'Upload file mesti format gambar',
						class_name: 'gritter-error gritter-center'
					}); 
				}
			} else {
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu form yang ada',
					class_name: 'gritter-error gritter-center'
				}); 
			}
		}); 
	
		$('#save-perlakuan-asset').click(function(){
			$('#perlakuan-asset').modal('hide'); 
			$('#modalLoading').modal('show'); 
			var detPerlakuan = $('#detPerlakuan').val();
			var ketPerlakuan = $('#ketPerlakuan').val();
			var noAsset = $('#noAssetPer').val();
			if(detPerlakuan!="" && ketPerlakuan!=""){
				$.ajax({
				url: '<?php echo base_url(); ?>Asset/simpan_perlakuan_asset',
				data: $('#form-perlakuan-asset').serialize() + "&noAsset="+noAsset,  
				type: 'post',
				dataType:'json',
				success: function(data){ 
						$('#modalLoading').modal('hide'); 
						if(data.msg){
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
				
			} else {
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu form yang belum terisi',
					class_name: 'gritter-error gritter-center'
				});  
			}
		});
		
		$('#table-distribusi').on('click','.btn-bukti-dis',function(){
			id = $(this).closest('tr').attr('id');
			var kdAsset = ($('#kdAsset').text()).trim();
			// img-distribusi
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_imgdis',
			data: {'kdAsset':kdAsset},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-perlakuan').hide(); 
					var obj = '<?php echo base_url(); ?>assets/images/imgasset/distribusi/'+data.upload_bukti;
					$('#img-distribusi').attr('src',obj) 
				}		
			}); 
			$('#bukti-distribusi').modal('show');
		});
	});   
</script>