<style>
	#filter{
		position : absolute;
		left : -300px;
		top : 172px;
	}
</style>
<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Data Asset Perusahaan
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
	<div class="row-fluid input-append align-right" id="filter" style="padding-left:3%">			
		<input type="text" id="min" value="" data-date-format="yyyy-mm-dd" class="date-picker"><span class="add-on" style="margin-right : 3%;"><i class="icon-calendar"></i></span>	
	</div>
		<table class="table table-striped table-bordered" id="dt-data-asset">							
			<thead>
				<tr> 
					<th class="center">Tgl Pembelian</th>  
					<th class="center">Kode Asset</th>  					
					<th class="center">Nama Barang</th>   
					<th class="center">Jumlah</th>  
					<th class="center">Harga</th> 
					<th class="center">divisi</th> 
					<th class="center hide">nama karyawan</th> 
					<th class="center">Status</th> 
					<th class="center">Kondisi</th> 
					<th class="center" width="120px">Action</th>  
				</tr>
			</thead>
				<?php foreach($dtAsset as $val): 
						$display='';
						if ($val->status=="TERIMA") 
						{
							$display = 'style="display:none"';
							$status = '<span class="label label-success arrowed-in-right arrowed">TERIMA</span>';
						} 
						else if ($val->status=="DISTRIBUSI") 
						{
							$display = 'style="display:none"';
							$status = '<span class="label label-pink arrowed">DISTRIBUSI</span>';	
						} 
						else {
							$status = '<span class="label label-purple">TERSEDIA</span>';	
						}
					?>
					<tr id="<?= $val->id_asset; ?>">
						<td class="center"><?= date("Y-m-d", strtotime($val->tgl_pembelian)); ?></td>  
						<td class="td1"><?= $val->kode_asset; ?></td> 						
						<td class="td4"><?= $val->merk_asset; ?></td> 
						<td class="center"><?= $val->jumlah; ?></td> 
						<td class="td8"><?= number_format($val->harga); ?></td>
						<td class="td6"><?= $val->divisi; ?></td> 
						<td class="hide td7"><?= $val->nama_karyawan; ?></td>
						<td class="center status"><?= $status; ?></td> 
						<td class="center"><?= $val->kondisi_asset; ?></td> 
						<td class="center">							
							<form action="<?php echo base_url(); ?>Asset/updateasset" method="post">
								<input type="hidden" value="<?= $val->id_asset; ?>" id="idasset" name="idasset">
								<button class="btn btn-warning btn-minier btn-edit tooltip-info" data-rel="tooltip" data-placement="bottom" title="Edit">
									<i class="icon-edit"></i>
								</button> 
							</form>							
							<button class="btn btn-info btn-minier btn-detail tooltip-info" data-rel="tooltip" data-placement="bottom" title="Detail">
								<i class="icon-search"></i>
							</button> 
							<button class="btn btn-success btn-minier btn-distribusi tooltip-success" <?= $display; ?> data-rel="tooltip" data-placement="bottom" title="Distribusi">
								<i class="icon-signin bigger-120"></i>
							</button> 
							<button class="btn btn-warning btn-minier btn-perlakuan tooltip-warning" data-rel="tooltip" data-placement="bottom" title="Perlakuan">
								<i class="icon-calendar bigger-120"></i>
							</button> 
							<?php if($val->status_barcode != null) { ?>
							<button class="btn btn-invers btn-minier print-barcode" data-rel="tooltip" data-placement="bottom" title="Print Barcode">
								<i class="icon-print bigger-120"></i>
							</button>  
							<?php } else { ?>
							<button class="btn btn-invers btn-minier print-barcode2" data-rel="tooltip" data-placement="bottom" title="Print Barcode" style="display:none">
								<i class="icon-print bigger-120"></i>
							</button> 
							<button class="btn btn-danger btn-minier create-barcode tooltip-error" data-rel="tooltip" data-placement="bottom" title="Generate Barcode">
								<i class="icon-cog bigger-120"></i>
							</button> 
							<?php } ?>
							
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
					
					<li class="tab-parent">
						<a data-toggle="tab" id="tab-qrcode" href="#qrcode">
							<i class="orange icon-barcode bigger-110"></i>  
							Qrcode 
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
								<div class="profile-info-name">Kategori Asset </div>
								<div class="profile-info-value">
									<span id="kategoriAsset">Kategori asset</span>
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
								<div class="profile-info-name"> divisi </div>
								<div class="profile-info-value">
									<span id="divisi">divisi</span>
								</div>
							</div>  
							<div class="profile-info-row">
								<div class="profile-info-name"> Nama Karyawan </div>
								<div class="profile-info-value">
									<span id="nama_karyawan">Nama Karyawan</span>
								</div>
							</div>  							
							<div class="profile-info-row">
								<div class="profile-info-name"> Status Asset </div>
								<div class="profile-info-value">
									<span id="statusAsset">statusAsset</span>
								</div>
							</div> 
							<div class="profile-info-row">
								<div class="profile-info-name"> Spesifikasi </div>
								<div class="profile-info-value">
									<span id="spesifikasi">Spesifikasi</span>
								</div>
							</div> 
							<div class="profile-info-row">
								<div class="profile-info-name"> Kelengkapan </div>
								<div class="profile-info-value">
									<span id="kelengkapan">Kelengkapan</span>
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
								<div class="profile-info-name"> Harga Perolehan </div>
								<div class="profile-info-value">
									<span id="hargaPerolehan">Harga Perolehan</span>
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
								<div class="profile-info-name"> Kelengkapan </div>
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
										<th class="center">Action</th>
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
					
					<div id="qrcode" class="tab-pane"> 
						<div class="row-fluid">
							<div class="span12">
								<center><img src="" id="img-qrcode"></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	
	<div id="btn-other-detail" class="modal-footer" style="display:none;"> 		
		<button id="other-detail-asset" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-eye-open bigger-110"></i>
			Lebih Detail Asset
		</button> 
	</div>
</div>

<div id="distribusi-asset" class="modal hide fade" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Distribusi Asset <span id="nmBrgDis"></span>
		</div>
	</div>
	
	<div class="modal-body padding-8" style="overflow-y:visible;">
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
							<label class="control-label span4" for="penerima">Penerima</label>
							<div class="controls span4">  
								<select id="penerima" name="penerima" class="chzn-select-modal">
									<?php foreach($dtUser as $val): ?>								
									<option value="<?= $val->user_id; ?>"><?= $val->user_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>				
						<div class="control-group">
							<label class="control-label span4" for="divisi2">divisi</label>
							<div class="controls span6"> 
								<select id="divisi2" name="divisi2" class="chzn-select-modal">
									<?php foreach($divisi as $val): ?>								
									<option value="<?= $val->kode_struktur; ?>"><?= $val->unit_kerja; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div> 
						<div class="control-group">
							<label class="control-label span4" for="penanggungjwb">Penanggung jawab</label>
							<div class="controls span4">  
								<select id="penanggungjwb" name="penanggungjwb" class="chzn-select-modal">															
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span4" for="kelDis">Kelengkapan</label>
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
									<input type="file" id="buktiDistribusi" class="input-file file-image" name="buktiDistribusi" accept="image/*" capture="camera" />
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

	<div class="modal-body panding4" style="overflow-y:visible;">
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
							<?php foreach($dtJnsPrlkn as $val) :?>
							<option value="<?= $val->kode_jnsperlakuan; ?>"><?= $val->nama_jnsperlakuan; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="pic">PIC</label>
					<div class="controls span6">
						<select name="pic" class="chzn-select-modal">
							<?php foreach($dtUser as $val): ?>								
							<option value="<?= $val->user_id; ?>"><?= $val->user_name; ?></option>
							<?php endforeach; ?>
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

<div id="modal-del-dis" class="modal hide fade modal-xs" data-backdrop="static" >
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
					<p><i class="icon-ok green"></i> Apakah yakin akan menghapus distribusi asset kepada <b id="namaPernerimaDis"></b> ? </p>
				</div>
			</div> 
			<input type="hidden" id="idDelDis" readonly="readonly">
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="delete-distribusi" class="btn btn-info btn-small pull-right" type="button">
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

<div id="print-barcode" class="modal hide fade modal-lg" style="height:390px;" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Print Barcode
		</div>
	</div>

	<div class="modal-body" style="height : 1000px;"> 
			<div id="pdfRenderer"></div>
			<center><iframe id="file-pdf" name="file-pdf" width='96%' style='height:300px;'></iframe></center>				
	</div>
 
</div>

<script src="<?php echo base_url(); ?>assets/js/pdfobject.js"></script> 
<script type="text/javascript">	
	function printPdf()
	{
	  var pdfFrame = window.frames["printPdf"];
	  pdfFrame.focus();
	  pdfFrame.print();
	}		
	
	$(document).ready(function () { 				
		$('.chzn-select-modal').chosen({width:"250px"});

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

		$('#min').change( function() {
			$("#dt-data-asset_filter input[type=search]").val($(this).val());
			$("#dt-data-asset_filter input[type=search]").keyup();
					
		} );      	

		$('.input-file').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false 
		});		
		
		// $("#print").onclick({

		// });

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
					$('#nama_karyawan').empty();
					$('#nama_karyawan').append(data.nama_karyawan);
					$('#divisi').empty();
					$('#divisi').append(data.divisi);										
					$('#jnsAsset').empty();
					$('#jnsAsset').append(data.nama_jenisasset);
					$('#kategoriAsset').empty();
					$('#kategoriAsset').append(data.nama_kategori);
					$('#statusAsset').empty();
					$('#statusAsset').append(data.status);
					$('#spesifikasi').empty();
					$('#spesifikasi').append(data.spesifikasi);
					$('#kelengkapan').empty();
					$('#kelengkapan').append(data.kelengkapan);
					$('#tglPerolehan').empty();
					$('#tglPerolehan').append(convertDate(data.tgl_pembelian));
					$('#djumlah').empty();
					$('#djumlah').append(data.jumlah);
					$('#sbrPerolehan').empty();
					$('#sbrPerolehan').append(data.nama_sumberanggaran);
					$('#vendor').empty();
					$('#vendor').append(data.nama_vendor);
					$('#alamatVendor').empty();
					$('#alamatVendor').append(data.alamat_vendor); 
					$('#hargaPerolehan').empty();
					$('#hargaPerolehan').append(currency(data.harga)); 	 
					var obj = '<?php echo base_url(); ?>assets/images/imgasset/pembelian/'+data.img_objek;
					$('#objAsset').attr('src',obj);
					var kel = '<?php echo base_url(); ?>assets/images/imgasset/pembelian/'+data.img_kelengkapan;
					$('#kelAsset').attr('src',kel);
					var qrcode = '<?php echo base_url(); ?>assets/images/imgasset/qrcode/'+data.kode_asset+'.png';
					$('#img-qrcode').attr('src',qrcode);
					if(data.kode_jenisasset=='JA-001' || data.kode_jenisasset=='JA-002'){
						$('#btn-other-detail').show();
						$('#other-detail-asset').val(data.kode_jenisasset);
					} else {
						$('#btn-other-detail').hide();
					}
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
					  tr+='<td class="td2">'+val.user_name+'</td>';
					  tr+='<td>'+val.lokasi_distribusi+'</td>';
					  tr+='<td>'+val.keterangan+'</td>';
					  tr+='<td class="center"><button class="btn btn-info btn-mini btn-bukti-dis"><i class="icon-search"></i></button>&nbsp;';
					  if(val.status=='DIGUNAKAN'){
					  tr+='<button class="btn btn-danger btn-mini del-dis"><i class="icon-remove"></i></button>';
					  }
					  tr+='</td>';
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
					  tr+='<td>'+val.nama_jnsperlakuan+'</td>'; 
					  tr+='<td>'+val.detail+'</td>';
					  tr+='<td>'+val.keterangan+'</td>';
					  tr+='</tr>';
					});   
					$('#list-perlakuan').empty();
					$('#list-perlakuan').append(tr); 
				}		
			}); 
		}); 
				
		$('#dt-data-asset').on('click','.btn-distribusi',function(){  
			var divisi	= ($(this).closest('tr').find('.td6').text()).trim();
			var nama	= ($(this).closest('tr').find('.td7').text()).trim();
			$('#penanggungjwb').val(nama);			
			$('#divisi2 option').filter(function() {
				return $(this).val() == divisi; 				
			}).prop('selected', true);						
			$('#divisi2').trigger('liszt:updated');
																
			var option = ''; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_namakaryawan_byid',
			data: {'divisi':divisi}, 
			type: 'post',
			dataType:'json',
			
			success: function(data){	
				$.each(data, function(key,value) {  
					if (value.user_name != nama){
						option+='<option value="'+value.user_name+'">'+value.user_name+'</option>';
					} else {
						option+='<option value="'+value.user_name+'" selected>'+value.user_name+'</option>';
					}	
				});   
				$('#penanggungjwb').prop('disabled',false); 
				$('#penanggungjwb').empty();
				$('#penanggungjwb').append(option); 
				$('#penanggungjwb').trigger('liszt:updated');
				}		
			});

			var idAssetDis	= ($(this).closest('tr').attr('id')).trim(); 
			var nmBarang	= ($(this).closest('tr').find('.td4').text()).trim(); 
			var kdPengajuan	= ($(this).closest('tr').find('.td2').text()).trim(); 
			$('#nmBrgDis').empty();
			$('#nmBrgDis').append(nmBarang);
			$('#idAssetDis').val(idAssetDis);
			$('#buktiDistribusi').val(''); 
			setPenerimaAsset(kdPengajuan);
			$('#form-distribusi-asset')[0].reset(); 
			$('#distribusi-asset').modal('show');
		});

		$('#divisi2').change(function(){
			
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
		
		$('#dt-data-asset').on('click','.print-barcode',function(){ 
			var kodeAsset = ($(this).closest('tr').find('.td1').text()).trim();	 
			$("#pdfRenderer").empty();
			var options = {
				width: "400rem",
				height: "30rem"
			};
			// PDFObject.embed("<?php echo base_url(); ?>assets/images/imgasset/pdfbarcode/"+kodeAsset+".pdf", "#pdfRenderer", options);
			$('#print-barcode').modal('show');
			$('#file-pdf').attr('src','<?php echo base_url(); ?>assets/images/imgasset/pdfbarcode/'+kodeAsset+'.pdf');
		}); 
		
		$('#dt-data-asset').on('click','.print-barcode2',function(){ 
			var kodeAsset = ($(this).closest('tr').find('.td1').text()).trim();	 
			$("#pdfRenderer").empty();
			var options = {
				width: "400rem",
				height: "30rem"
			};
			// PDFObject.embed("<?php echo base_url(); ?>assets/images/imgasset/pdfbarcode/"+kodeAsset+".pdf", "#pdfRenderer", options);
			$('#print-barcode').modal('show'); 
			$('#file-pdf').attr('src','<?php echo base_url(); ?>assets/images/imgasset/pdfbarcode/'+kodeAsset+'.pdf');
		}); 
		
		$('#dt-data-asset').on('click','.create-barcode',function(){ 
			var kodeAsset = ($(this).closest('tr').find('.td1').text()).trim();
			var namaAsset = ($(this).closest('tr').find('.td4').text()).trim();
			var id	= ($(this).closest('tr').attr('id')).trim(); 
			$('#modalLoading').modal('show'); 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/generate_barcode_pdf',
			data: {'kodeAsset':kodeAsset, 'namaAsset':namaAsset},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					if(data){
						$('#'+id).find('.create-barcode').hide();
						$('#'+id).find('.print-barcode2').show();
						$('#modalLoading').modal('hide');  
					}
				}		
			}); 			
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
				var cekFormat = (cekImage[count]).toLowerCase();
				if(cekFormat=='jpg' || cekFormat=='jpeg' || cekFormat=='png'){
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
							$('#'+idtr).find('.btn-distribusi').hide();
							$.gritter.add({
								title: 'Informasi',
								text: 'Data berhasil disimpan',
								class_name: 'gritter-info gritter-center'
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
			$('#modalLoading').modal('show'); 
			id = $(this).closest('tr').attr('id');
			var kdAsset = ($('#kdAsset').text()).trim();
			// img-distribusi
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_imgdis',
			data: {'kdAsset':kdAsset},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#modalLoading').modal('hide'); 
					var obj = '<?php echo base_url(); ?>assets/images/imgasset/distribusi/'+data.upload_bukti;
					$('#img-distribusi').attr('src',obj) 
					$('#bukti-distribusi').modal('show');
				}		
			}); 
			
		});
		
		$('#table-distribusi').on('click','.del-dis',function(){
			var idDelDis = $(this).closest('tr').attr('id');
			var namaPenerima = $(this).closest('tr').find('.td2').text();
			$('#namaPernerimaDis').empty();
			$('#namaPernerimaDis').append(namaPenerima);
			$('#idDelDis').val(idDelDis);
			$('#modal-del-dis').modal('show');
			
			
		});
		
		$('#delete-distribusi').click(function(){
			$('#modal-del-dis').modal('hide'); 
			$('#modalLoading').modal('show'); 
			var id = $('#idDelDis').val();  
			
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/delete_distribusi_asset',
			data: {'idDistribusi':id},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#modalLoading').modal('hide');   
					if(data.msg){
						$('#list-distribusi #'+id).find('.del-dis').remove();
						$('#'+data.idasset).find('.btn-distribusi').show();
						$('#'+data.idasset).find('.status').empty();
						$('#'+data.idasset).find('.status').append('<span class="label label-purple">TERSEDIA</span>');
						$.gritter.add({
							title: 'Informasi',
							text: 'Data berhasil dihapus',
							class_name: 'gritter-info gritter-center'
						});  
					} else { 
						$.gritter.add({
							title: 'Informasi',
							text: 'Data gagal dihapus',
							class_name: 'gritter-error gritter-center'
						}); 
					}
				}		
			}); 
		});
		
		$('#other-detail-asset').click(function(){
			var kdAsset = ($('#kdAsset').text()).trim(); 
			var jnsAsset = $('#other-detail-asset').val(); 
			var form = document.createElement("form"); 
			var inputKdAsset = document.createElement("input");   
			var action=''; 
			form.method = "POST"; 
			if(jnsAsset=="JA-001"){
				action = 'Asset/asset_tanah_bangunan';		 
			}
			if(jnsAsset=="JA-002"){
				action = 'Asset/asset_kendaraan';	
			}
			form.action = "<?php echo base_url(); ?>" + action,
			 
			
			inputKdAsset.value = kdAsset;
			inputKdAsset.name = "kdAsset";
			inputKdAsset.type = "hidden";
			form.appendChild(inputKdAsset);
			// form.target = "_blank";
			
			document.body.appendChild(form);

			form.submit();	
		});

		$('div.dataTables_filter input').focus()
	});   
	function setPenerimaAsset(kodePengajuan){
		$.ajax({
		url: '<?php echo base_url(); ?>Asset/set_penerima_asset',
		data: {"kodePengajuan":kodePengajuan},  
		type: 'post',
		dataType:'json',
		success: function(data){  
				$('#penerima').val(data); 
				$('#penerima').trigger('liszt:updated'); 
			}		
		}); 
	}
	// function lala() {
	// 	var v = $('#date-pickersearch').val();
	// 	alert(v);
	// 	document.getElementById('dt-data-asset_fil').value=v ; 
	// }
</script>