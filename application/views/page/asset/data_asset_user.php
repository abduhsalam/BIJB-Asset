<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Data Asset
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped table-bordered" id="dt-data-asset">							
			<thead>
				<tr> 
					<th class="center">Kode Asset</th> 
					<th class="center">Kode Pengajuan</th> 
					<th class="center">Tgl Pembelian</th>  
					<th class="center">Nama Barang</th>   
					<th class="center">Jumlah</th>  
					<th class="center">harga</th> 
					<th class="center">Status</th> 
					<th class="center" width="100px">Action</th>  
				</tr>
			</thead>
				<?php foreach($dtAsset as $val): 
						if ($val->status=="TERIMA") 
						{
							$status = '<span class="label label-success arrowed-in-right arrowed">TERIMA</span>';
						} 
						else if ($val->status=="DISTRIBUSI") 
						{
							$status = '<span class="label label-pink arrowed">DISTRIBUSI</span>';	
						} 
						else {
							$status = '<span class="label label-purple">TERSEDIA</span>';	
						}
					?>
					<tr id="<?= $val->id_asset; ?>">
						<td class="td1"><?= $val->kode_asset; ?></td>
						<td class=""><?= $val->kode_pengajuan; ?></td> 
						<td class="center"><?= date("d-m-Y", strtotime($val->tgl_pembelian)); ?></td>  
						<td><?= $val->nama_barang; ?></td> 
						<td class="center"><?= $val->jumlah; ?></td> 
						<td class="td8"><?= number_format($val->harga); ?></td>
						<td class="center status"><?= $status; ?></td> 
						<td class="center"> 
							<button class="btn btn-info btn-minier btn-detail tooltip-info" data-rel="tooltip" data-placement="bottom" title="Detail">
								<i class="icon-search"></i>
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
			Detail Asset
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
	});
	
	$('.btn-detail').click(function(){
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
				var obj = '<?php echo base_url(); ?>assets/images/imgasset/pembelian/'+data.img_objek;
				$('#objAsset').attr('src',obj);
				var kel = '<?php echo base_url(); ?>assets/images/imgasset/pembelian/'+data.img_kelengkapan;
				$('#kelAsset').attr('src',kel);
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
				  tr+='<tr>';
				  tr+='<td>'+convertDate(val.tgl_distribusi)+'</td>';
				  tr+='<td>'+val.penerima+'</td>';
				  tr+='<td>'+val.lokasi_distribusi+'</td>';
				  tr+='<td>'+val.biaya_mainten+'</td>';
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
	 
</script>