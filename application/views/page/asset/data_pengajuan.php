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
			Data Pengajuan Barang
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
	<div class="row-fluid input-append align-right" id="filter" style="padding-left:3%">			
		<input type="text" id="min" value="" data-date-format="yyyy-mm-dd" class="date-picker"><span class="add-on" style="margin-right : 3%;"><i class="icon-calendar"></i></span>	
	</div>
		<?php 
		$status = $this->session->flashdata('status');
		if($status=="success"){ ?>
			<div class="alert alert-success alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> Data berhasil di simpan.
			</div>
		<?php } if($status=="error"){ ?>
			<div class="alert alert-danger alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error!</strong> Data gagal di simpan.
			</div>
		<?php } ?>
		
		<table class="table table-striped table-bordered" id="dt-data-pengajuan">							
			<thead>
				<tr> 
					<th class="center">Kode Pengajuan</th> 
					<th class="center">Tgl Pengajuan</th> 
					<th class="center">Pengaju</th>
					<th class="center">Unit Kerja</th> 
					<th class="center">Jenis Asset</th> 
					<th class="center">Nama Barang</th> 
					<th class="center">Jumlah</th> 
					<!--<th class="center">kebutuhan</th> -->
					<th class="center">Status</th> 
					<th class="center" style="width:120px;">Action</th>  
				</tr>
			</thead>
				<?php foreach($pengajuanAsset as $val): 
						if ($val->status=="PENGAJUAN")
						{
							$status = '<span class="label label-info arrowed-right arrowed-in">PENGAJUAN</span>'; 
						} 
						else if ($val->status=="DITUNDA") 
						{ 
							$status = '<span class="label label-warning arrowed-in arrowed-in-right">DITUNDA</span>';	
						} 
						else if ($val->status=="DITOLAK") 
						{ 
							$status = '<span class="label label-important arrowed arrowed-right">DITOLAK</span>';	
						} 
						else if ($val->status=="PROSES") 
						{
							$status = '<span class="label label-primary arrowed-right">PROSES</span>';	
						} 
						else if ($val->status=="TERSEDIA") 
						{
							$status = '<span class="label label-purple">TERSEDIA</span>';	
						} 
						else if ($val->status=="DISTRIBUSI") 
						{
							$status = '<span class="label label-pink arrowed">DISTRIBUSI</span>';	
						} 
						else {
							$status = '<span class="label label-success arrowed-in-right arrowed">TERIMA</span>';	
						}
				?> 
					<tr id="<?= $val->kode_pengajuan; ?>">
						<td class="td1"><?= $val->kode_pengajuan; ?></td>
						<td class="center"><?= date("d-m-Y", strtotime($val->tgl_pengajuan)); ?></td>
						<td><?= $val->user_name; ?></td>
						<td><?= $val->unit_kerja; ?></td>
						<td><?= $val->nama_jenisasset; ?></td>
						<td><?= $val->nama_barang; ?></td>
						<td class="center"><?= $val->jumlah; ?></td> 
						<td class="center td8"><?= $status; ?></td>
						<td class="center td9">
							<button class="btn btn-info btn-minier btn-detail tooltip-info" data-rel="tooltip" data-placement="bottom" title="Detail Asset">
								<i class="icon-search"></i>
							</button>
							<!-- digunakan untuk otomatis saat proses modal -->
							<button class="btn btn-success btn-minier btn-pembelian tooltip-success" data-rel="tooltip" data-placement="bottom" title="Pembelian Asset" style="display:none">
								<i class="icon-signin bigger-120"></i>
							</button> 
							<button class="btn btn-warning btn-minier btn-sewa tooltip-warning" data-rel="tooltip" data-placement="bottom" title="Sewa Asset" style="display:none">
								<i class="icon-calendar bigger-120"></i>
							</button>
							<!-- end -->
							<?php if ($val->status == "PROSES") : ?>
							<button class="btn btn-success btn-minier btn-pembelian tooltip-success" data-rel="tooltip" data-placement="bottom" title="Pembelian Asset">
								<i class="icon-signin bigger-120"></i>
							</button>
							<button class="btn btn-warning btn-minier btn-sewa tooltip-warning" data-rel="tooltip" data-placement="bottom" title="Sewa Asset">
								<i class="icon-calendar bigger-120"></i>
							</button>
							<?php endif; if ($val->status == "PENGAJUAN" || $val->status == "DITUNDA") : ?>
							<button class="btn btn-primary btn-minier btn-action tooltip-primary" data-rel="tooltip" data-placement="bottom" title="Proses Asset">
								<i class="icon-check bigger-120"></i>
							</button> 
							<?php endif; ?>
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
<div id="detail-pengajuan" class="modal hide fade" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<i class="icon-search"></i> &nbsp; Detail Pengajuan Asset
		</div>
	</div>

	<div class="modal-body padding-8">
		<div class="row-fluid">
			<div class="span12">
				<div class="span6">
					<form class="form-horizontal">
						<div class="control-group">
							<label class="control-label span3" for="tglPengajuan">Tgl Pengajuan</label>
							<div class="controls span9">
								<input id="dtglPengajuan" class="span6" type="text" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="tglPemakaian">Tgl Pemakaian</label>
							<div class="controls span9">
								<input id="dtglPemakaian" class="span6" type="text" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="jnsAsset">Jenis Asset</label>
							<div class="controls span9">
								<input id="djenisAsset" class="span8" type="text" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="kategoriAsset">Kategori Asset</label>
							<div class="controls span9">
								<input id="dkategoriAsset" class="span8" type="text" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="namaBarang">Nama Barang</label>
							<div class="controls span9">
								<input id="dnamaBarang" class="span12" type="text" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="spesifikasi">Spesifikasi</label>
							<div class="controls span9">
								<textarea id="dspesifikasi" class="span12" style="resize:none;" rows="2" readonly="readonly"></textarea> 
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="jumlah">Jumlah</label>
							<div class="controls span2">
								<input id="djumlah" class="span12" type="text" readonly="readonly">
							</div>
							<label class="control-label span2" for="harga">harga</label>
							<div class="controls span5">
								<input id="dharga" class="span12" type="text" readonly="readonly">
							</div>
						</div>
						
					</form>				 
				</div>
				<div class="span6">
					<form class="form-horizontal"> 
						<div class="control-group">
							<label class="control-label span3" for="spesifikasi">kebutuhan</label>
							<div class="controls span9">
								<textarea id="dkebutuhan" class="span12" style="resize:none;" rows="2" readonly="readonly"></textarea> 
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="sbrAnggaran">Sbr Anggaran</label>
							<div class="controls span9">
								<input id="dsbrAnggaran" class="span12" type="text" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="keterangan">Keterangan</label>
							<div class="controls span9">
								<textarea id="dketerangan" class="span12" style="resize:none;" rows="3" readonly="readonly"></textarea> 
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="statAsset">Status Asset</label>
							<div class="controls span9">
								<input id="dstatus" class="span12" type="text" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="dpengaju">Pengaju</label>
							<div class="controls span9">
								<input id="dpengaju" class="span12" type="text" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="dunitkerja">Unit Kerja</label>
							<div class="controls span9">
								<input id="dunitkerja" class="span12" type="text" readonly="readonly">
							</div>
						</div>
						
					</form> 
				</div>
			</div>
		</div>
	</div> 
</div> 

<div id="modal-action" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Silahkan isi form yang ada
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid padding-4">
			<form id="form-action" class="" />
				<div class="widget-main"> 
					<div class="row-fluid">
						<label for="status">Status</label>
						<select id="status" name="status">
							<option value="PROSES">PROSES</option>
							<option value="DITUNDA">DITUNDA</option>
							<option value="DITOLAK">DITOLAK</option>
						</select>
					</div>
					<div class="row-fluid">
						<label for="form-field-8">Keterangan</label>
						<textarea id="keterangan" class="span12" placeholder="Silahkan input keterangan" rows="4"  style="resize:none"></textarea>
						<input type="hidden" id="kodePeng" readonly>
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
		
		<button id="save-action" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
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
		var dataTable = $('#dt-data-pengajuan').dataTable( {
			bAutoWidth: false,
			"aoColumns": [    
			  null, 
			  null, 
			  { "bSortable": false }, 
			  { "bSortable": false }, 
			  { "bSortable": false },   
			  { "bSortable": false }, 
			  { "bSortable": false },   
			  { "bSortable": false },   
			  { "bSortable": false },    
			],
			"aaSorting": [],
			// "bFilter":true, 
			// "info":true, 
			// "sScrollY": "300px",
			// "bPaginate": false,  
		});    
	});

	$('#minx').change( function() {
		$("#dt-data-pengajuan_filter input[type=search]").val($(this).val());
		$("#dt-data-pengajuan_filter input[type=search]").keyup();					
	} );   
	
	$('.btn-detail').click(function(){ 
		$('#modalLoading').modal('show');
		var noPeng	= ($(this).closest('tr').find('.td1').text()).trim();   
		$.ajax({
		url: '<?php echo base_url(); ?>Asset/get_pengajuan_byno',
		data: {'noPeng':noPeng}, 
		type: 'post',
		dataType:'json',
		success: function(data){	
				$('#modalLoading').modal('hide');
				$('#dtglPengajuan').val(convertDate(data.tgl_pengajuan)); 
				$('#dtglPemakaian').val(convertDate(data.tgl_pemakaian)); 
				$('#djenisAsset').val(data.nama_jenisasset); 
				$('#dkategoriAsset').val(data.nama_kategori); 
				$('#dnamaBarang').val(data.nama_barang); 
				$('#dspesifikasi').val(data.spesifikasi_barang); 
				$('#dkebutuhan').val(data.kebutuhan); 
				$('#djumlah').val(data.jumlah); 
				$('#dharga').val(currency(data.perkiraan_harga)); 
				$('#dsbrAnggaran').val(data.nama_sumberanggaran); 
				$('#dketerangan').val(data.keterangan);
				$('#dstatus').val(data.status);
				$('#dpengaju').val(data.user_name);  
				$('#dunitkerja').val(data.unit_kerja);  
				$('#detail-pengajuan').modal('show');
			}		
		}); 
		
	});
	
	$('.btn-action').click(function(){ 
		$('#modal-action').modal('show');
		$('#form-action')[0].reset();
		var kodePeng	= ($(this).closest('tr').attr('id')).trim();   
		$('#kodePeng').val(kodePeng);
	});
	
	$('#save-action').click(function(){ 
		var kodePeng 	= $('#kodePeng').val();
		var status 		= $('#status').val();
		var keterangan 	= $('#keterangan').val();
		if(keterangan!=""){
			$('#modal-action').modal('hide');
			$('#modalLoading').modal('show');
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/simpan_status',
			data: {'kodePeng':kodePeng,'status':status,'keterangan':keterangan}, 
			type: 'post',
			dataType:'json',
			success: function(data){
					$('#modalLoading').modal('hide');
					if(data.msg){
						$('#'+kodePeng).find('.td8').empty();
						$('#'+kodePeng).find('.td8').append('<span class="'+data.span+'">'+data.status+'</span>');
						$('#'+kodePeng).find('.td9 .btn-pembelian').show();
						$('#'+kodePeng).find('.td9 .btn-sewa').show();
						$('#'+kodePeng).find('.td9 .btn-action').hide();
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
				text: 'Silahkan isi dulu keterangan',
				class_name: 'gritter-error gritter-center'
			});  
		}
	});
	 
	$('#dt-data-pengajuan').on('click','.btn-pembelian',function(){
		var noPeng	= ($(this).closest('tr').attr('id')).trim(); 
		var form = document.createElement("form"); 
		var inputNoPeng = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Asset/pembelian_pengajuan';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		inputNoPeng.value = noPeng;
		inputNoPeng.name = "noPeng";
		inputNoPeng.type = "hidden";
		form.appendChild(inputNoPeng);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	});
	
	$('#dt-data-pengajuan').on('click','.btn-sewa',function(){
		var noPeng	= ($(this).closest('tr').attr('id')).trim(); 
		var form = document.createElement("form"); 
		var inputNoPeng = document.createElement("input"); 
		 
		var action=''; 
		form.method = "POST"; 
		action = 'Asset/penyewaan_pengajuan';
		 
		form.action = "<?php echo base_url(); ?>" + action,
		 
		
		inputNoPeng.value = noPeng;
		inputNoPeng.name = "noPeng";
		inputNoPeng.type = "hidden";
		form.appendChild(inputNoPeng);
		// form.target = "_blank";
		
		document.body.appendChild(form);

		form.submit();		
	});
</script>