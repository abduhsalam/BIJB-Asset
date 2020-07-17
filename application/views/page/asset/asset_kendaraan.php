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
			Data Asset Kendaraan
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
	<div class="row-fluid input-append align-right "  id="filter"  style="padding-left:3%">	
		<input type="text" id="min" value="" data-date-format="yyyy-mm-dd" class="date-picker"><span class="add-on" style="margin-right : 3%;"><i class="icon-calendar"></i></span>	
	</div>
		<table class="table table-striped table-bordered" id="dt-data-asset">							
			<thead>
				<tr> 
					<th class="center">Kode Asset</th> 
					<th class="center">Tgl Beli/ Sewa</th>  
					<th class="center">Nama Barang</th> 
					<th class="center">Nomor Kendaraan</th> 
					<th class="center">Warna</th>  
					<th class="center">Kepemilikan</th> 
					<th class="center">Action</th>  
				</tr>
			</thead>
				<?php foreach($dtAsset as $val): ?>
					<tr id="<?= $val->id_assetkendaraan; ?>">
						<td class="td1"><?= $val->kode_asset; ?></td>
						<td class="center"><?= date("d-m-Y", strtotime($val->tgl_pembelian)); ?></td>  
						<td><?= $val->nama_barang; ?></td>
						<td class="center"><?= $val->no_kendaraan; ?></td> 
						<td class="center"><?= $val->warna_kendaraan; ?></td> 
						<td class="center td8"><?= $val->kepemilikan_asset; ?></td> 
						<td class="center">
							<button class="btn btn-info btn-minier btn-detail tooltip-info" data-rel="tooltip" data-placement="bottom" title="Detail">
								<i class="icon-search"></i>
							</button>
							<button class="btn btn-success btn-minier btn-mainten tooltip-success" data-rel="tooltip" data-placement="bottom" title="Maintenance">
								<i class="icon-wrench bigger-120"></i>
							</button>
							<button class="btn btn-pink btn-minier btn-ujikir tooltip-pink" data-rel="tooltip" data-placement="bottom" title="Uji Kir">
								<i class="icon-dashboard bigger-120"></i>
							</button> 
							<button class="btn btn-danger btn-minier btn-pajak tooltip-error" data-rel="tooltip" data-placement="bottom" title="Pajak">
								<i class="icon-legal bigger-120"></i>
							</button>
							<button class="btn btn-warning btn-minier btn-pemakaian tooltip-warning" data-rel="tooltip" data-placement="bottom" title="Pemakaian">
								<i class="icon-user bigger-120"></i>
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
.tooltip-pink + .tooltip > .tooltip-inner {background-color: #d6487e;}
 
.tooltip-pink + .tooltip > .tooltip-arrow {
  border-bottom: 5px solid #d6487e;
}
</style> 

<div id="detail-asset" class="modal hide fade" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Detail Asset Kendaraan
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<div class="tabbable">
				<ul class="nav nav-tabs" id="myTab">
					<li class="tab-parent" id="tab1">
						<a data-toggle="tab" id="tab-maintenance" href="#maintenance">
							<i class="green icon-wrench bigger-110"></i>
							Maintenance
						</a>
					</li>

					<li class="tab-parent">
						<a data-toggle="tab" id="tab-ujikir" href="#ujikir">
							<i class="pink icon-dashboard bigger-110"></i>  
							Uji KIR 
						</a>
					</li>
					
					<li class="tab-parent">
						<a data-toggle="tab" id="tab-pajak" href="#pajak">
							<i class="red icon-legal bigger-110"></i>  
							Pajak 
						</a>
					</li>	
					
					<li class="tab-parent">
						<a data-toggle="tab" id="tab-pemakaian" href="#pemakaian">
							<i class="orange icon-user bigger-110"></i>  
							Pemakaian 
						</a>
					</li> 
				</ul>

				<div class="tab-content">
					<div id="maintenance" class="tab-pane"> 
						<div id="table-maintenance" class="row-fluid">
							<div class="span12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">Tanggal</th>
										<th class="center">Jenis Maintenance</th>
										<th class="center">Vendor</th>
										<th class="center">Biaya</th>
										<th class="center">Keterangan</th>
										<th class="center">#</th>
									</tr>
								</thead>
								<tbody id="list-maintenance">
								</tbody>
							</table> 
							</div>
						</div> 
					</div>

					<div id="ujikir" class="tab-pane">
						<div id="loading-ujikir" class="row-fluid">
							<div class="span12">
								<div class="progress progress-info progress-striped active">
									<div class="bar" style="width: 100%">Loading</div>
								</div>
							</div>
						</div>
						<div id="table-ujikir" class="row-fluid" style="display:none">
							<div class="span12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">Tanggal</th>
										<th class="center">Tempat</th>
										<th class="center">Biaya</th>
										<th class="center">Keterangan</th>
										<th class="center">#</th>
									</tr>
								</thead>
								<tbody id="list-ujikir">
								</tbody>
							</table> 
							</div>
						</div> 
					</div> 
					
					<div id="pajak" class="tab-pane">
						<div id="loading-pajak" class="row-fluid">
							<div class="span12">
								<div class="progress progress-info progress-striped active">
									<div class="bar" style="width: 100%">Loading</div>
								</div>
							</div>
						</div>
						<div id="table-pajak" class="row-fluid" style="display:none">
							<div class="span12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">Tanggal</th>
										<th class="center">Jenis Pjk</th>
										<th class="center">Biaya</th>
										<th class="center">Keterangan</th>
										<th class="center">#</th>
									</tr>
								</thead>
								<tbody id="list-pajak">
								</tbody>
							</table> 
							</div>
						</div>
					</div>
					
					<div id="pemakaian" class="tab-pane">
						<div id="loading-pemakaian" class="row-fluid">
							<div class="span12">
								<div class="progress progress-info progress-striped active">
									<div class="bar" style="width: 100%">Loading</div>
								</div>
							</div>
						</div>
						<div id="table-pemakaian" class="row-fluid" style="display:none">
							<div class="span12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">Tgl Pemakaian</th>
										<th class="center">Pemakai</th>
										<th class="center">Tujuan</th>
										<th class="center">Keperluan</th>
										<th class="center">Sopir</th> 
									</tr>
								</thead>
								<tbody id="list-pemakaian">
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

<div id="mainten-kendaraan" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Maintenance Kendaraan
		</div>
	</div>
	
	<form id="form-mainten-kendaraan" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_mainten_kendaraan" method="post" enctype="multipart/form-data"> 
	<div class="modal-body padding4">
		<div class="row-fluid">  			
				<div class="control-group">
					<label class="control-label span3" for="tglMainten">Tgl Maintenance</label>
					<div class="controls span9">  
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglMainten" type="text" data-date-format="dd-mm-yyyy" name="tglMainten" value="<?= date('d-m-Y'); ?>" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>
				 
				<div class="control-group">
					<label class="control-label span3" for="jnsMainten">Jns Maintenance</label>
					<div class="controls span8">
						<textarea id="jnsMainten" name="jnsMainten" class="span10" style="resize:none"></textarea>
					</div>
				</div>  
				<div class="control-group">
					<label class="control-label span3" for="vendor">Vendor</label>

					<div class="controls">
						<label>
							<input type="radio" name="jnsVendor" class="jnsVendor" value="perusahaan" checked	>
							<span class="lbl"> Perusahaan</span> 
							<input type="radio" name="jnsVendor" class="jnsVendor" value="perorangan">
							<span class="lbl"> Perorangan</span>
						</label> 
						 
					</div>
				</div> 
				<div class="control-group">
					<label class="control-label span3" for="vendor"></label>
					<div class="controls span6"> 
						<select id="vendorMaintenance" name="vendorMaintenance" class="chzn-select-modal"> 
						<?php foreach($vendorMainten as $val):?>
							<option value="<?= $val->kode_vendor; ?>"><?= $val->nama_vendor; ?></option>
						<?php endforeach; ?>
						</select> 
						<button id="btn-tbh-vendor" class="btn btn-info btn-mini"  type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="biayaMainten">Biaya</label>
					<div class="controls span6">
						<input type="text" name="biayaMainten" class="form-control price span6" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="buktiMainten">Upload Bukti</label>
					<div class="controls span6"> 
						<div class="span12"> 
							<input type="file" id="buktiMainten" class="input-file file-image" name="buktiMainten" accept="image/*" capture="camera" />
						</div> 
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="ketMainten">Keterangan</label>
					<div class="controls span9">
						<textarea id="ketMainten" name="ketMainten" class="span10" style="resize:none"></textarea>
					</div>
				</div>
				<input type="hidden" id="idKendMain" name="idKendMain" readonly="readonly"> 
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-mainten" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
</div>

<div id="ujikir-kendaraan" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Uji KIR Kendaraan
		</div>
	</div>
	
	<form id="form-kir-kendaraan" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_ujikir_kendaraan" method="post" enctype="multipart/form-data"> 
	<div class="modal-body panding4">
		<div class="row-fluid">  
				<div class="control-group">
					<label class="control-label span3" for="tglUjikir">Tgl Uji KIR</label>
					<div class="controls span9">  
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglUjikir" type="text" data-date-format="dd-mm-yyyy" name="tglUjikir" value="<?= date('d-m-Y'); ?>" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>
				  
				<div class="control-group">
					<label class="control-label span3" for="tempatUjikir">Tempat</label>
					<div class="controls span8">
						<input type="text" id="tempatUjikir" name="tempatUjikir" class="form-control span10 " >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="biayaUjikir">Biaya</label>
					<div class="controls span6">
						<input type="text" id="biayaUjikir" name="biayaUjikir" class="form-control span6 price" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="buktiUjikir">Bukti Uji KIR</label>
					<div class="controls span6"> 
						<div class="span12"> 
							<input type="file" id="buktiUjikir" class="input-file file-image" name="buktiUjikir" accept="image/*" capture="camera" />
						</div> 
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="ketUjikir">Keterangan</label>
					<div class="controls span9">
						<textarea id="ketUjikir" name="ketUjikir" class="span10" style="resize:none"></textarea>
					</div>
				</div>
				<input type="hidden" id="idKendKir" name="idKendKir" readonly="readonly"> 
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-ujikir" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
</div>
 
<div id="pajak-kendaraan" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Pajak Kendaraan
		</div>
	</div>
	<form id="form-pajak-kendaraan" class="form-horizontal" action="<?php echo base_url(); ?>Asset/simpan_pajak_kendaraan" method="post" enctype="multipart/form-data"> 
	<div class="modal-body padding4">
		<div class="row-fluid"> 
			
				<div class="control-group">
					<label class="control-label span3" for="tglPajak">Tgl Pajak</label>
					<div class="controls span9">  
						<div class="row-fluid input-append">
							<input class="span4 date-picker" id="tglPajak" type="text" data-date-format="dd-mm-yyyy" name="tglPajak" value="<?= date('d-m-Y'); ?>" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="thnPajak">Tahun Pajak</label>
					<div class="controls span2">
						<input type="text" name="thnPajak" class="form-control span12" maxlength="4" value="<?php echo date('Y'); ?>" >
					</div>
					<label class="control-label span1" for="biayaPajak">Biaya</label>
					<div class="controls span4">
						<input type="text" name="biayaPajak" class="form-control span12 price" >
					</div>
				</div>
				 
				<div class="control-group">
					<label class="control-label span3" for="jnsPajak">Jenis Pajak</label>
					<div class="controls span6">
						<select id="jnsPajak" name="jnsPajak">
							<?php foreach($jnsPajak as $val) : ?>
							<option value="<?= $val->kode_jnspajak; ?>"><?= $val->nama_jnspajak; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>   
				
				<div class="control-group">
					<label class="control-label span3" for="buktiPajak">Bukti Pajak</label>
					<div class="controls span6"> 
						<div class="span12"> 
							<input type="file" id="buktiPajak" class="input-file file-image" name="buktiPajak" accept="image/*" capture="camera" />
						</div> 
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="ketPajak">Keterangan</label>
					<div class="controls span9">
						<textarea id="ketPajak" name="ketPajak" class="span10" style="resize:none" rows="3"></textarea>
					</div>
				</div>
				<input type="hidden" id="idKendPajak" name="idKendPajak" readonly="readonly">
			
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-pajak" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
	
</div>

<div id="tbh-pemakaian" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Tambah Pemakaian
		</div>
	</div>
	
	<form id="form-pemakai-kendaraan" class="form-horizontal" /> 
	<div class="modal-body padding4">
		<div class="row-fluid">   
				<div class="control-group">								
					<label class="control-label span3" for="tglGaransi">Tgl Pemakaian</label> 
					<div class="controls span9"> 
						<div class="row-fluid input-append span4" style="margin-right:20px">
							<input class="span12 date-picker" id="awalPakai" type="text" data-date-format="dd-mm-yyyy" name="awalPakai" value="<?= date('d-m-Y'); ?>" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> &nbsp;
						<label class="span1" style="padding-left:5px; padding-top:5px;">S.d</label>
						<div class="row-fluid input-append span4">
							<input class="span12 date-picker" id="akhirPakai" type="text" data-date-format="dd-mm-yyyy" name="akhirPakai" value="<?= date('d-m-Y'); ?>" />
							<span class="add-on">
								<i class="icon-calendar"></i>
							</span>
						</div> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="pemakai">Pemakai</label>
					<div class="controls span9">
						<input id="pemakai" class="span11 uppercase" type="text" name="pemakai">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label span3" for="tujuan">Tujuan</label>
					<div class="controls span9">
						<input id="tujuan" class="span11 uppercase" type="text" name="tujuan">
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label span3" for="keperluan">Keperluan</label>
					<div class="controls span9">
						<input id="keperluan" class="span11 uppercase" type="text" name="keperluan">
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label span3" for="sopir">Sopir</label>
					<div class="controls span9">
						<select id="sopir" name="sopir" class="chzn-select-modal"> 
						<?php foreach($dtSopir as $val):?>
							<option value="<?= $val->user_id; ?>"><?= $val->user_name; ?></option>
						<?php endforeach; ?>
						</select> 
						<button id="btn-tbh-sopir" class="btn btn-info btn-mini"  type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>
					</div>
				</div> 
				
				<div class="control-group">
					<label class="control-label span3" for="ketPemakaian">Keterangan</label>
					<div class="controls span9">
						<textarea id="ketPemakaian" name="ketPemakaian" class="span11" style="resize:none" rows="3"></textarea>
					</div>
				</div> 
				<input type="hidden" id="idKendPemakai" name="idKendPemakai" readonly="readonly">
			
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-pemakai-kendaraan" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
</div>

<div id="tbh-vendor" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close show-modal-maintenance" data-dismiss="modal">&times;</button>
			Tambah Vendor
		</div>
	</div>
	
	<form id="form-tbh-vendor" class="form-horizontal" /> 
	<div class="modal-body padding4">
		<div class="row-fluid">   
				<div class="control-group">
					<label class="control-label span3" for="tbhNamaVendor">Nama Vendor</label>
					<div class="controls span9">
						<input id="tbhNamaVendor" class="span11 uppercase" type="text" name="tbhNamaVendor">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="jnsPenyedia">Jenis Penyedia</label>
					
					<div class="controls span8">
						<select id="jnsPenyedia" name="jnsPenyedia" class="chzn-select chzn-select-modal"> 
						<option value=""></option>
							<?php foreach($jnsPenyedia as $val): ?>
								<option value="<?= $val->kode_jnspenyedia; ?>"><?= $val->nama_jnspenyedia; ?></option>
							<?php endforeach; ?>
						</select> 
						<button id="btn-jns-penyedia" class="btn btn-info btn-mini"  type="button">
							<i class="icon-plus bigger-110 icon-only"></i>
						</button>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="alamat">Alamat</label>
					<div class="controls span9">
						<input id="alamat" class="span11 uppercase" type="text" name="alamat">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="PKP">PKP</label>
					<div class="controls"> 
						<label>
							<input type="radio" value="PKP" name="pajak" checked>
							<span class="lbl"> PKP</span> 
							<input type="radio" value="NONPKP" name="pajak">
							<span class="lbl"> NON PKP</span>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="pemilik">Pemilik</label>
					<div class="controls span6">
						<input id="pemilik" class="span12 uppercase" type="text" name="pemilik">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label span3" for="noTlp">No. Tlp/ HP</label>
					<div class="controls span8">
						<input id="noTlp" class="span6 uppercase" type="text" name="noTlp" placeholder="No Tlp">
						<input id="noHp" class="span6 uppercase" type="text" name="noHp" placeholder="No HP">
					</div>
				</div>  
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right show-modal-maintenance" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-tbh-vendor" class="btn btn-info btn-small pull-right" type="submit">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
	</form>
</div>

<div id="tbh-jns-penyedia" class="modal hide modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal close-penyedia">&times;</button>
			Tambah Jenis Penyedia
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" />
				<div class="control-group">
				</div>
				<div class="control-group">
					<label class="control-label span4" for="tbhJnsPenyedia">Jenis Penyedia</label>
					<div class="controls span8">
						<input id="tbhJnsPenyedia" class="span11 uppercase" type="text" name="tbhJnsPenyedia">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right close-penyedia" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-jns-penyedia" class="btn btn-info btn-small pull-right" type="button">
			<i class="icon-save bigger-110"></i>
			Simpan
		</button> 
	</div>
</div>

<div id="tbh-sopir" class="modal hide modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close close-sopir" data-dismiss="modal">&times;</button>
			Tambah Sopir
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" />
				<div class="control-group">
				</div>
				<div class="control-group">
					<label class="control-label span4" for="tbhNamaSopir">Tambah Sopir</label>
					<div class="controls span8">
						<input id="tbhNamaSopir" class="span11 uppercase" type="text" name="tbhNamaSopir">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right close-sopir" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Batal
		</button> 
		
		<button id="save-sopir" class="btn btn-info btn-small pull-right" type="button">
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

<div id="modal-detail-image" class="modal hide fade modal-xs" data-backdrop="static" >
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Detail Image
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<center><img src="" id="detail-image" width="300px" height="200px"></center>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-danger btn-small pull-right" data-dismiss="modal" type="reset" style="margin-left:10px;">
			<i class="icon-remove bigger-110"></i>
			Close
		</button>  
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () { 
		$('.chzn-select-modal').chosen({width:"200px"});
		var dataTable = $('#dt-data-asset').dataTable( {
			 
		});

		$('#min').change( function() {
			$("#dt-data-asset_filter input[type=search]").val($(this).val());
			$("#dt-data-asset_filter input[type=search]").keyup();
					
		} );   
		
		$('#dt-data-asset').on('click','.btn-detail',function(){
			$('#modalLoading').modal('show');
			$('.tab-parent').each(function(){
				$(this).removeClass('active');
			});
			$('.tab-pane').each(function(){
				$(this).removeClass('active');
			})
			$('#tab1').addClass('active');
			$('#maintenance').addClass('active');
			 
			$('#loading-ujikir').show();
			$('#table-ujikir').hide(); 
			$('#loading-pajak').show();
			$('#table-pajak').hide();
			$('#loading-pemakaian').show();
			$('#table-pemakaian').hide(); 
			var idAssetKend	= ($(this).closest('tr').attr('id')).trim();   
			$('#myTab').attr('idAssetKend',idAssetKend);
			var tr="";
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_mainten_byassetkend',
			data: {'idAssetKend':idAssetKend},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-maintenance').hide(); 
					$('#table-maintenance').show();
					$.each(data, function(key,val) {  
					  tr+='<tr id="'+val.id_maintenkendaraan+'">';
					  tr+='<td>'+convertDate(val.tgl_mainten)+'</td>';
					  tr+='<td>'+val.jenis_mainten+'</td>';
					  tr+='<td>'+val.nama_vendor+'</td>';
					  tr+='<td>'+currency(val.biaya_mainten)+'</td>';
					  tr+='<td>'+val.keterangan+'</td>';
					  tr+='<td class="center"><button class="btn btn-info btn-mini btn-show-img"><i class="icon-search"></i></button></td>';
					  tr+='</tr>';
					});   
					$('#list-maintenance').empty();
					$('#list-maintenance').append(tr); 
					$('#modalLoading').modal('hide');
					$('#detail-asset').modal('show'); 
				}		
			});   
			
			
		});
		
		$('#tab-maintenance').click(function(){ 
			var idAssetKend = ($('#myTab').attr('idAssetKend')).trim(); 
			var tr="";
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_mainten_byassetkend',
			data: {'idAssetKend':idAssetKend},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-maintenance').hide(); 
					$('#table-maintenance').show();
					$.each(data, function(key,val) {  
					  tr+='<tr id="'+val.id_maintenkendaraan+'">';
					  tr+='<td>'+convertDate(val.tgl_mainten)+'</td>';
					  tr+='<td>'+val.jenis_mainten+'</td>';
					  tr+='<td>'+val.nama_vendor+'</td>';
					  tr+='<td>'+currency(val.biaya_mainten)+'</td>';
					  tr+='<td>'+val.biaya_mainten+'</td>';
					  tr+='<td class="center"><button class="btn btn-info btn-mini btn-show-img"><i class="icon-search"></i></button></td>';
					  tr+='</tr>';
					});   
					$('#list-maintenance').empty();
					$('#list-maintenance').append(tr); 
				}		
			}); 
		});
		 
		$('#list-maintenance').on('click','.btn-show-img',function(){
			var idMainten = $(this).closest('tr').attr('id'); 
			$('#modalLoading').modal('show'); 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_img_maintenance',
			data: {'idMainten':idMainten},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#modalLoading').modal('hide'); 
					$('#modal-detail-image').modal('show'); 
					var img = '<?php echo base_url(); ?>assets/images/imgasset/assetkendaraan/maintenance/'+data.img_mainten;
					$('#detail-image').attr('src',img);
				}		
			}); 
		});
		
		$('#tab-ujikir').click(function(){ 
			var idAssetKend = ($('#myTab').attr('idAssetKend')).trim(); 
			var tr="";
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_ujikir_byassetkend',
			data: {'idAssetKend':idAssetKend},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-ujikir').hide(); 
					$('#table-ujikir').show();
					$.each(data, function(key,val) {  
					  tr+='<tr id="'+val.id_kirkendaraan+'">';
					  tr+='<td>'+convertDate(val.tgl_kir)+'</td>'; 
					  tr+='<td>'+val.tempat_kir+'</td>'; 
					  tr+='<td>'+currency(val.biaya_kir)+'</td>';
					  tr+='<td>'+val.keterangan+'</td>';
					  tr+='<td class="center"><button class="btn btn-info btn-mini btn-show-img"><i class="icon-search"></i></button></td>';
					  tr+='</tr>';
					});   
					$('#list-ujikir').empty();
					$('#list-ujikir').append(tr); 
				}		
			}); 
		});
		
		$('#list-ujikir').on('click','.btn-show-img',function(){
			var idKir = $(this).closest('tr').attr('id'); 
			$('#modalLoading').modal('show'); 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_img_ujikir',
			data: {'idKir':idKir},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#modalLoading').modal('hide'); 
					$('#modal-detail-image').modal('show'); 
					var img = '<?php echo base_url(); ?>assets/images/imgasset/assetkendaraan/ujikir/'+data.img_kir;
					$('#detail-image').attr('src',img);
				}		
			}); 
		});
		
		$('#tab-pajak').click(function(){ 
			var idAssetKend = ($('#myTab').attr('idAssetKend')).trim(); 
			var tr="";
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_pajak_byassetkend',
			data: {'idAssetKend':idAssetKend},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-pajak').hide(); 
					$('#table-pajak').show();
					$.each(data, function(key,val) {  
					  tr+='<tr id="'+val.id_pjkkendaraan+'">';
					  tr+='<td>'+convertDate(val.tgl_pajak)+'</td>'; 
					  tr+='<td>'+val.kode_jnspajak+'</td>'; 
					  tr+='<td>'+currency(val.biaya_pajak)+'</td>';
					  tr+='<td>'+val.keterangan+'</td>';
					  tr+='<td class="center"><button class="btn btn-info btn-mini btn-show-img"><i class="icon-search"></i></button></td>';
					  tr+='</tr>';
					});   
					$('#list-pajak').empty();
					$('#list-pajak').append(tr); 
				}		
			}); 
		});
		
		$('#list-pajak').on('click','.btn-show-img',function(){
			var idPajak = $(this).closest('tr').attr('id'); 
			$('#modalLoading').modal('show'); 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_img_pajak',
			data: {'idPajak':idPajak},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#modalLoading').modal('hide'); 
					$('#modal-detail-image').modal('show'); 
					var img = '<?php echo base_url(); ?>assets/images/imgasset/assetkendaraan/buktiPajak/'+data.img_pajak;
					$('#detail-image').attr('src',img);
				}		
			}); 
		});
		
		$('#tab-pemakaian').click(function(){ 
			var idAssetKend = ($('#myTab').attr('idAssetKend')).trim(); 
			var tr="";
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/get_pemakaian_byassetkend',
			data: {'idAssetKend':idAssetKend},  
			type: 'post',
			dataType:'json',
			success: function(data){ 
					$('#loading-pemakaian').hide(); 
					$('#table-pemakaian').show();
					$.each(data, function(key,val) {  
					  tr+='<tr id="'+val.id_pemakaian+'">';
					  tr+='<td>'+convertDate(val.tgl_awalpemakaian)+' s.d. '+convertDate(val.tgl_selesaipemakaian)+'</td>'; 
					  tr+='<td>'+val.pemakai+'</td>';  
					  tr+='<td>'+val.tujuan+'</td>';  
					  tr+='<td>'+val.keperluan+'</td>';
					  tr+='<td>'+val.user_name+'</td>'; 
					  tr+='</tr>';
					});   
					$('#list-pemakaian').empty();
					$('#list-pemakaian').append(tr); 
				}		
			}); 
		});
		
		$('.input-file').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false 
		});  
		
		$('#dt-data-asset').on('click','.btn-pajak',function(){
			$('#pajak-kendaraan').modal('show');			
			var idAsset	= ($(this).closest('tr').attr('id')).trim();  
			$('#form-pajak-kendaraan')[0].reset();
			$('#form-pajak-kendaraan .control-group').each(function(){
				$(this).removeClass('info');
				$(this).removeClass('error');
				$(this).find('.help-inline').remove();
			}); 
			$('.ace-file-input .selected span').attr('data-title','');
			$('.ace-file-input .selected').removeClass('selected');
			$('#idKendPajak').val(idAsset);
		}); 
		
		$('#form-pajak-kendaraan').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {
				buktiPajak: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif", 
					fileSize:true
				}, 		
				thnPajak: { required: true, },   
				biayaPajak: { required: true, },   
				ketPajak: { required: true, }
				
			},
			messages: {
				buktiPajak:  { required:"Bukti pajak harus diisi.", extension: "File mesti image"},   			
				thnPajak:  "Tahun harus diisi.",  				
				biayaPajak:  "Biaya harus diisi.",  				
				ketPajak:  "Keterangan harus diisi.",  			
			},
	
			
			highlight: function (e) {
				$(e).closest('.control-group').removeClass('info').addClass('error');
			},
	
			success: function (e) {
				$(e).closest('.control-group').removeClass('error').addClass('info');
				$(e).remove();
			}, 
			errorPlacement: function (error, element) {
				
				if (element.is('.file-image') || element.is('.noPengajuan')) {
					var controls = element.closest('.controls');
					controls.append(error);
				}
				else if (element.is('.chzn-select') ) {
					var controls = element.closest('.controls');
					controls.append(error); 
					
				} else
				error.insertAfter(element);
			},
			
			submitHandler: function(form) { 	
				$('#pajak-kendaraan').modal('hide'); 
				$('#modalLoading').modal('show');
				var url = $('#form-pajak-kendaraan').attr('action');
				var formData = new FormData($('#form-pajak-kendaraan')[0]); 
				$.ajax({
					url: url,
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false, 
					success: function (res) { 	 
						$('#modalLoading').modal('hide');  
						
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
				// form.submit();   
			} 
		});  
		
		$('#dt-data-asset').on('click','.btn-ujikir',function(){ 
			$('#ujikir-kendaraan').modal('show');			
			var idAsset	= ($(this).closest('tr').attr('id')).trim();  
			$('#form-kir-kendaraan')[0].reset();
			$('#form-kir-kendaraan .control-group').each(function(){
				$(this).removeClass('info');
				$(this).removeClass('error');
				$(this).find('.help-inline').remove();
			}); 
			$('.ace-file-input .selected span').attr('data-title','');
			$('.ace-file-input .selected').removeClass('selected');
			$('#idKendKir').val(idAsset); 
		}); 
		
		$('#form-kir-kendaraan').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {
				buktiUjikir: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif", 
					fileSize:true
				}, 		
				tempatUjikir: { required: true, },   
				biayaUjikir: { required: true, },
				ketUjikir: { required: true, }
				
			},
			messages: {
				buktiUjikir:  { required:"Bukti KIR harus diisi.", extension: "File mesti image"},   			
				tempatUjikir:  "Tempat uji KIR harus diisi.",  				
				biayaUjikir:  "Biaya uji KIR harus diisi.",  			
				ketUjikir:  "Keterangan uji KIR harus diisi.",  			
			},
	
			
			highlight: function (e) {
				$(e).closest('.control-group').removeClass('info').addClass('error');
			},
	
			success: function (e) {
				$(e).closest('.control-group').removeClass('error').addClass('info');
				$(e).remove();
			}, 
			errorPlacement: function (error, element) {
				
				if (element.is('.file-image') || element.is('.noPengajuan')) {
					var controls = element.closest('.controls');
					controls.append(error);
				}
				else if (element.is('.chzn-select') ) {
					var controls = element.closest('.controls');
					controls.append(error); 
					
				} else
				error.insertAfter(element);
			},
			
			submitHandler: function(form) { 	
				$('#ujikir-kendaraan').modal('hide'); 
				$('#modalLoading').modal('show');
				var url = $('#form-kir-kendaraan').attr('action');
				var formData = new FormData($('#form-kir-kendaraan')[0]); 
				$.ajax({
					url: url,
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false, 
					success: function (res) { 	 
						$('#modalLoading').modal('hide');  
						
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
				// form.submit();   
			} 
		});   
		
		$('#btn-tbh-vendor').click(function(){			
			$('#mainten-kendaraan').modal('hide');   
			$('#tbh-vendor').modal('show');   
			$('#form-tbh-vendor')[0].reset();
		});	
		
		$('.show-modal-maintenance').click(function(){
			$('#tbh-vendor').modal('hide'); 
			$('#mainten-kendaraan').modal('show');   
		}); 
		
		$('.jnsVendor').change(function(){
			var jnsVendor = $(this).val();
			var option=''; 
			$.ajax({
			url: '<?php echo base_url(); ?>Asset/vendor_byjnsvendor_mainten',
			data: {'jnsVendor':jnsVendor}, 
			type: 'post',
			dataType:'json',
			success: function(data){	  
					$.each(data, function(key,value) {  
					  option+='<option value="'+value.kode_vendor+'">'+value.nama_vendor+'</option>';
					});
					$('#vendorMaintenance').empty();
					$('#vendorMaintenance').append(option);
					$('#vendorMaintenance').trigger('liszt:updated'); 
				}		
			}); 
		});
		
		$('#form-tbh-vendor').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: { 	
				tbhNamaVendor: { required: true, },   
				jnsPenyedia: { required: true, },
				alamat: { required: true, },
				pemilik: { required: true, },
				noTlp: { required: true, },
				noHp: { required: true, },
				
			},
			messages: {
				tbhNamaVendor:  "Nama vendor harus diisi.",  				
				jnsPenyedia:  "Jenis penyedia harus diisi.",  			
				alamat:  "Alamat harus diisi.",  			
				pemilik:  "Pemilik harus diisi.",  			
				noTlp:  "No Telepon harus diisi.",  			
				noHp:  "No Hp harus diisi.",  			
			},
	
			
			highlight: function (e) {
				$(e).closest('.control-group').removeClass('info').addClass('error');
			},
	
			success: function (e) {
				$(e).closest('.control-group').removeClass('error').addClass('info');
				$(e).remove();
			}, 
			errorPlacement: function (error, element) {
				
				if (element.is('.file-image') || element.is('.noPengajuan')) {
					var controls = element.closest('.controls');
					controls.append(error);
				}
				else if (element.is('.chzn-select') ) {
					var controls = element.closest('.controls');
					controls.append(error); 
					
				} else
				error.insertAfter(element);
			},
			
			submitHandler: function(form) { 	
				$('#tbh-vendor').modal('hide');
				$('#modalLoading').modal('show');
				var jnsVendor	= $('input[name=jnsVendor]:checked').val(); 
				var namaVendor	= $('#tbhNamaVendor').val(); 
				$.ajax({
				url: '<?php echo base_url(); ?>Asset/tambah_vendor_mainten',
				data: $('#form-tbh-vendor').serialize()+'&jnsVendor='+jnsVendor, 
				type: 'post',
				dataType:'json',
				success: function(data){	 
						$('#modalLoading').modal('hide');  
						$('#mainten-kendaraan').modal('show');
						if(data.msg){ 
							var option = '<option value="'+data.kode+'" selected>'+namaVendor+'</option>';
							$('#vendorMaintenance').append(option);
							$('#vendorMaintenance').trigger('liszt:updated'); 
						} else {
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal ditambahkan',
								class_name: 'gritter-error gritter-center'
							});  
						}
					}		
				}); 
			} 
		}); 
		
		$('#btn-jns-penyedia').click(function(){	
			$('#tbh-vendor').modal('hide'); 
			$('#tbh-jns-penyedia').modal('show');   
			$('#tbhJnsPenyedia').val('');
		});	
		
		$('#save-jns-penyedia').click(function(){
			$('#tbh-jns-penyedia').modal('hide'); 
			$('#modalLoading').modal('show');
			var jnsPenyedia = $('#tbhJnsPenyedia').val(); 
			var option = ''; 
			if(jnsPenyedia!=""){ 
				$.ajax({
				url: '<?php echo base_url(); ?>Asset/tambah_jenis_penyedia',
				data: {'jnsPenyedia':jnsPenyedia}, 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#modalLoading').modal('hide'); 
						$('#tbh-vendor').modal('show');
						if(data.msg){ 
							var option = '<option value="'+data.kode+'" selected>'+jnsPenyedia+'</option>';
							$('#jnsPenyedia').append(option);
							$('#jnsPenyedia').trigger('liszt:updated'); 
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
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu jenis penyedia',
					class_name: 'gritter-error gritter-center'
				});  
			}
		});
		
		$('.close-penyedia').click(function(){
			$('#tbh-jns-penyedia').modal('hide');
			$('#tbh-vendor').modal('show'); 
		});
		
		$('#dt-data-asset').on('click','.btn-mainten',function(){ 
			$('#mainten-kendaraan').modal('show');			
			var idAsset	= ($(this).closest('tr').attr('id')).trim();  
			$('#form-mainten-kendaraan').trigger('reset');
			$('#form-mainten-kendaraan .control-group').each(function(){
				$(this).removeClass('info');
				$(this).removeClass('error');
				$(this).find('.help-inline').remove();
			}); 
			// $('#buktiMainten').val("");
			$('.ace-file-input .selected span').attr('data-title','');
			$('.ace-file-input .selected').removeClass('selected');
			$('#idKendMain').val(idAsset);
		}); 
		
		$('#form-mainten-kendaraan').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {
				buktiMainten: 
				{ 
					required: true,
					extension:"jpg|png|jpeg|gif", 
					fileSize:true
				}, 		
				jnsMainten: { required: true, },   
				vendorMaintenance: { required: true, },
				biayaMainten: { required: true, },
				ketMainten: { required: true, },
				
			},
			messages: {
				buktiMainten:  { required:"Bukti mainten harus diisi.", extension: "File mesti image"},   			
				jnsMainten:  "Jenis maintenance harus diisi.",  				
				vendorMaintenance:  "Vendor harus diisi.",  			
				biayaMainten:  "Biaya maintenance harus diisi.",  			
				ketMainten:  "Keterangan maintenance harus diisi.",  			
			},
	
			
			highlight: function (e) {
				$(e).closest('.control-group').removeClass('info').addClass('error');
			},
	
			success: function (e) {
				$(e).closest('.control-group').removeClass('error').addClass('info');
				$(e).remove();
			}, 
			errorPlacement: function (error, element) {
				
				if (element.is('.file-image') || element.is('.noPengajuan')) {
					var controls = element.closest('.controls');
					controls.append(error);
				}
				else if (element.is('.chzn-select') ) {
					var controls = element.closest('.controls');
					controls.append(error); 
					
				} else
				error.insertAfter(element);
			},
			
			submitHandler: function(form) { 	
				$('#mainten-kendaraan').modal('hide'); 
				$('#modalLoading').modal('show');
				var url = $('#form-mainten-kendaraan').attr('action');
				var formData = new FormData($('#form-mainten-kendaraan')[0]); 
				$.ajax({
					url: url,
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false, 
					success: function (res) { 	 
						$('#modalLoading').modal('hide');  
						
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
				// form.submit();   
			} 
		});
		 
		$('#dt-data-asset').on('click','.btn-pemakaian',function(){
			$('#tbh-pemakaian').modal('show');			
			var idAsset	= ($(this).closest('tr').attr('id')).trim();  
			$('#form-pemakai-kendaraan')[0].reset();
			$('#form-pemakai-kendaraan .control-group').each(function(){
				$(this).removeClass('info');
				$(this).removeClass('error');
				$(this).find('.help-inline').remove();
			});  
			$('#idKendPemakai').val(idAsset);
		}); 
		
		$('#btn-tbh-sopir').click(function(){			
			$('#tbh-sopir').modal('show');   
			$('#tbh-pemakaian').modal('hide');  
			$('#tbhNamaSopir').val('');
		});	
		
		$('#close-sopir').click(function(){
			$('#tbh-sopir').modal('hide');   
			$('#tbh-pemakaian').modal('show');   
		});
		
		$('#save-sopir').click(function(){
			
			var namaSopir = $('#tbhNamaSopir').val(); 
			var option = ''; 
			if(namaSopir!=""){ 
				$('#tbh-sopir').modal('hide'); 
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Asset/tambah_sopir',
				data: {'namaSopir':namaSopir}, 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#modalLoading').modal('hide'); 
						$('#tbh-pemakaian').modal('show');
						if(data.msg){ 
							var option = '<option value="'+data.kode+'" selected>'+namaSopir+'</option>';
							$('#sopir').append(option);
							$('#sopir').trigger('liszt:updated'); 
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
				$.gritter.add({
					title: 'Informasi',
					text: 'Silahkan isi dulu nama sopir',
					class_name: 'gritter-error gritter-center'
				});  
			}
		});
		
		$('#form-pemakai-kendaraan').validate({
			errorElement: 'span',
			errorClass: 'help-inline',
			focusInvalid: false,
			ignore: "",
			rules: {  		
				pemakai: { required: true, },   
				tujuan: { required: true, },
				keperluan: { required: true, },
				ketPemakaian: { required: true, }
				
			},
			messages: { 			
				pemakai:  "Pemakai harus diisi.",  				
				tujuan:  "Tujuan harus diisi.",  			
				keperluan:  "Keperluan harus diisi.",  			
				ketPemakaian:  "Keterangan harus diisi.",  			
			},
	
			
			highlight: function (e) {
				$(e).closest('.control-group').removeClass('info').addClass('error');
			},
	
			success: function (e) {
				$(e).closest('.control-group').removeClass('error').addClass('info');
				$(e).remove();
			}, 
			errorPlacement: function (error, element) {
				
				if (element.is('.file-image') || element.is('.noPengajuan')) {
					var controls = element.closest('.controls');
					controls.append(error);
				}
				else if (element.is('.chzn-select') ) {
					var controls = element.closest('.controls');
					controls.append(error); 
					
				} else
				error.insertAfter(element);
			},
			
			submitHandler: function(form) { 	 
				$('#tbh-pemakaian').modal('hide');
				$('#modalLoading').modal('show');
				$.ajax({
				url: '<?php echo base_url(); ?>Asset/simpan_pemakai_kendaraan',
				data: $('#form-pemakai-kendaraan').serialize(), 
				type: 'post',
				dataType:'json',
				success: function(data){	
						$('#modalLoading').modal('hide');
						if(data.msg){ 
							$.gritter.add({
								title: 'Informasi',
								text: 'Data gagal disimpan',
								class_name: 'gritter-success gritter-center'
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
			} 
		});  
	});
</script>