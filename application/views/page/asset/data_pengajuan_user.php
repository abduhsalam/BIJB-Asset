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
					<th class="center">Action</th>  
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
						<td class="td6"><?= $val->nama_barang; ?></td>
						<td class="center"><?= $val->jumlah; ?></td> 
						<td class="center td8"><?= $status; ?></td>
						<td class="center">
							<button class="btn btn-info btn-minier btn-detail tooltip-info" data-rel="tooltip" data-placement="bottom" title="Detail">
								<i class="icon-search"></i>
							</button> 
							<?php if($val->status=="DISTRIBUSI") : ?>
							<button class="btn btn-success btn-minier btn-action tooltip-success" data-rel="tooltip" data-placement="bottom" title="Terima">
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
		width: 370px; margin-left: -185px;
	} 
}
     
/* Portrait tablet to landscape and desktop */
@media (min-width: 768px) and (max-width: 979px) {
	.modal-xs{ 	 
		width: 370px; margin-left: -185px;
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
								<input id="kategoriAsset" class="span8" type="text" readonly="readonly">
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
							<label class="control-label span3" for="spesifikasi">Kebutuhan</label>
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
							<div id="dstatus" class="controls span9" style="padding-top:5px;">
								<!--<input id="dstatus" class="span12" type="text" readonly="readonly">-->
								
							</div>
						</div>
						<div class="control-group">
							<label class="control-label span3" for="info">Info</label>
							<div class="controls span9">
								<textarea id="dInfo" class="span12" style="resize:none;" rows="3" readonly="readonly"></textarea> 
							</div>
						</div>
						<!--<div class="control-group">
							<label class="control-label span3" for="dpengaju">Pengaju</label>
							<div class="controls span9">
								<input id="dpengaju" class="span12" type="text" readonly="readonly">
							</div>
						</div>-->
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
			Pemberitahuan
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid padding-4"> 
			<div class="widget-main">  
				<div class="row-fluid">
					<p><i class="icon-ok green"></i> Apakah benar asset <b id="namaBrg"></b> sudah anda terima ? </p>
				</div>
			</div> 
			<input type="hidden" id="kodePeng" readonly="readonly">
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-action" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-check bigger-110"></i>
			Ya
		</button> 
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
			// "aaSorting": [],
			// "bFilter":true, 
			// "info":true, 
			// "sScrollY": "300px",
			// "bPaginate": false,  
		});   
	});
	
	$('#dt-data-pengajuan').on('click','.btn-detail',function(){  
		var noPeng	= ($(this).closest('tr').find('.td1').text()).trim();   
		var status	= $(this).closest('tr').find('.td8').html();   
		$.ajax({
		url: '<?php echo base_url(); ?>Asset/get_pengajuan_byno',
		data: {'noPeng':noPeng}, 
		type: 'post',
		dataType:'json',
		success: function(data){	   
				$('#dtglPengajuan').val(convertDate(data.tgl_pengajuan)); 
				$('#dtglPemakaian').val(convertDate(data.tgl_pemakaian)); 
				$('#djenisAsset').val(data.nama_jenisasset); 
				$('#kategoriAsset').val(data.nama_kategori); 
				$('#dnamaBarang').val(data.nama_barang); 
				$('#dspesifikasi').val(data.spesifikasi_barang); 
				$('#dkebutuhan').val(data.kebutuhan); 
				$('#djumlah').val(data.jumlah); 
				$('#dharga').val(currency(data.perkiraan_harga)); 
				$('#dsbrAnggaran').val(data.nama_sumberanggaran); 
				$('#dketerangan').val(data.keterangan);
				$('#dstatus').empty();
				$('#dstatus').append(status);
				$('#dInfo').val(data.ket_status);
				// $('#dpengaju').val('-,-');  
			}		
		}); 
		$('#detail-pengajuan').modal('show');
	});
	
	$('#dt-data-pengajuan').on('click','.btn-action',function(){   
		$('#modal-action').modal('show');
		var kodePeng	= ($(this).closest('tr').attr('id')).trim();   
		var namaBrg	= ($(this).closest('tr').find('.td6').text()).trim();   
		$('#namaBrg').empty();
		$('#namaBrg').append(namaBrg);
		$('#kodePeng').val(kodePeng);
	});
	
	$('#save-action').click(function(){
		var kodePeng 	= $('#kodePeng').val();   
		$.ajax({
		url: '<?php echo base_url(); ?>Asset/simpan_status_terima',
		data: {'kodePeng':kodePeng}, 
		type: 'post',
		dataType:'json',
		success: function(data){
				$('#modal-action').modal('hide'); 
				if(data.msg){
					$('#'+kodePeng).find('.btn-action').remove(); 
					$('#'+kodePeng).find('.td8').empty(); 
					$('#'+kodePeng).find('.td8').append('<span class="label label-success arrowed-in-right arrowed">TERIMA</span>'); 
				} else {
					$.gritter.add({
						title: 'Informasi',
						text: 'Data gagal disimpan',
						class_name: 'gritter-error gritter-center'
					}); 
				} 
			},
		// error: function (error) { 
			// // console.log(error); 	
			// $('#modalLoading').modal('hide'); 
			// $.gritter.add({
				// title: 'Informasi',
				// text: 'Data gagal disimpan',
				// class_name: 'gritter-error gritter-center'
			// }); 
		// }
		});  
	}); 
	
</script>