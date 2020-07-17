<div class="page-header position-relative">
	<h1>
		Asset
		<small>
			<i class="icon-double-angle-right"></i>
			Dashboard
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<div class="span7 infobox-container">  
				
				<div class="infobox infobox-green">
					<div class="infobox-icon">
						<i class="icon-file"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $dtSumAsset->pengajuan_asset; ?></span>
						<div class="infobox-content">Pengajuan Asset</div>
					</div>
				</div>

				 

				<div class="infobox infobox-orange2  ">
					<div class="infobox-icon">
						<i class="icon-calendar"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $dtSumAsset->asset_dipinjam; ?></span>
						<div class="infobox-content">Peminjaman Asset</div>
					</div> 
				</div>  
				
				<div class="infobox infobox-blue">
					<div class="infobox-icon">
						<i class="icon-check"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $dtSumAsset->asset_layak; ?></span>
						<div class="infobox-content">Asset Layak</div>
					</div>
				</div>

				<div class="infobox infobox-orange  ">
					<div class="infobox-icon">
						<i class="icon-pause"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $dtSumAsset->asset_rusak; ?></span>
						<div class="infobox-content">Asset Rusak</div>
					</div> 
				</div>

				<div class="infobox infobox-red  ">
					<div class="infobox-icon">
						<i class="icon-remove"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?= $dtSumAsset->asset_hilang; ?></span>
						<div class="infobox-content">Asset Hilang</div>
					</div> 
				</div> 
				
				<div class="space-6"></div> 
				
				<div class="infobox infobox-green infobox-small infobox-dark">
					<div class="infobox-icon">
						<i class="icon-list"></i>
					</div>

					<div class="infobox-data">
						<div class="infobox-content">Total Aset</div>
						<div class="infobox-content"><?= ($dtSumAsset->asset_perusahaan+$dtSumAsset->asset_penyewaan); ?></div>
					</div>
				</div>
				
				<div class="infobox infobox-blue infobox-small infobox-dark">
					<div class="infobox-icon">
						<i class="icon-home"></i>
					</div>

					<div class="infobox-data">
						<div class="infobox-content">Aset Milik</div>
						<div class="infobox-content"><?= $dtSumAsset->asset_perusahaan; ?></div>
					</div>
				</div>
				
				<div class="infobox infobox-orange2 infobox-small infobox-dark">
					<div class="infobox-icon">
						<i class="icon-calendar"></i>
					</div>

					<div class="infobox-data">
						<div class="infobox-content">Aset Sewa</div>
						<div class="infobox-content"><?= $dtSumAsset->asset_penyewaan; ?></div>
					</div>
				</div>  
				
			</div>

			<div class="vspace"></div>

			<div class="span5">
				<div class="widget-box">
					<div class="widget-header widget-header-flat widget-header-small">
						<h5>
							<i class="icon-info"></i>
							Informasi
						</h5>

						<!--<div class="widget-toolbar no-border">
							<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
								This Week
								<i class="icon-angle-down icon-on-right"></i>
							</button>

							<ul class="dropdown-menu dropdown-info pull-right dropdown-caret">
								<li class="active">
									<a href="#">This Week</a>
								</li>

								<li>
									<a href="#">Last Week</a>
								</li>

								<li>
									<a href="#">This Month</a>
								</li>

								<li>
									<a href="#">Last Month</a>
								</li>
							</ul>
						</div>-->
					</div>

					<div class="widget-body">
						<div class="widget-main"> 
							<ul id="tasks" class="item-list">
								<li class="item-orange clearfix">
									<label class="inline"> 
										<span class="lbl"> Total Kendaraan Akan Segera Habis Pajak</span>
									</label>

									<div class="pull-right"> 
										<span class="badge badge-warning"><?= $dtInfoAsset->pajak_kendaraan; ?></span> 
									</div>
								</li>
								
								<li class="item-red clearfix">
									<label class="inline"> 
										<span class="lbl"> Total Tanah/ Bangunan Akan Segera Habis Pajak</span>
									</label>

									<div class="pull-right"> 
										<span class="badge badge-important"><?= $dtInfoAsset->pajak_tanah; ?></span>
									</div>
								</li>
							</ul> 
						</div><!--/widget-main-->
					</div><!--/widget-body-->
				</div><!--/widget-box-->
			</div><!--/span-->
			
		</div><!--/row--> 
		<div class="hr hr32 hr-dotted"></div>
		<div class="row-fluid">
			<div class="span6">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="lighter">
							<i class="icon-star orange"></i>
							Jenis Barang Asset Milik
						</h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>
											<i class="icon-caret-right blue"></i>
											Jenis Barang Asset
										</th>

										<th>
											<i class="icon-caret-right blue"></i>
											Total
										</th>
 
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>Tanah / Bangunan</td>

										<td> 
											<b class="green"><?= $detSumAsset->assettnh_milik; ?></b>
										</td> 
									</tr>
									
									<tr>
										<td>Kendaraan</td>

										<td> 
											<b class="green"><?= $detSumAsset->assetkendaraan_milik; ?></b>
										</td> 
									</tr>

									<tr>
										<td>Elektronik</td>

										<td> 
											<b class="green"><?= $detSumAsset->assetelektronik_milik; ?></b>
										</td> 
									</tr>
									 
								</tbody>
							</table>
						</div><!--/widget-main-->
					</div><!--/widget-body-->
				</div><!--/widget-box-->
			</div>

			<div class="span6">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="lighter">
							<i class="icon-star orange"></i>
							Jenis Barang Asset Sewa
						</h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>
											<i class="icon-caret-right blue"></i>
											Jenis Barang Asset
										</th>

										<th>
											<i class="icon-caret-right blue"></i>
											Total
										</th>
 
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>Tanah / Bangunan</td>

										<td> 
											<b class="green"><?= $detSumAsset->assettnh_sewa; ?></b>
										</td> 
									</tr>
									
									<tr>
										<td>Kendaraan</td>

										<td> 
											<b class="green"><?= $detSumAsset->assetkendaraan_sewa; ?></b>
										</td> 
									</tr>

									<tr>
										<td>Elektronik</td>

										<td> 
											<b class="green"><?= $detSumAsset->assetelektronik_sewa; ?></b>
										</td> 
									</tr>
								</tbody>
							</table>
						</div><!--/widget-main-->
					</div><!--/widget-body-->
				</div><!--/widget-box-->
			</div>

		</div>
								
	</div>
</div>
  

<script type="text/javascript">
	$(document).ready(function () { 
		 
	});   
	 
</script>