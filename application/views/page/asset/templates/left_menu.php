<div class="sidebar" id="sidebar">
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-small btn-success">
				<i class="icon-signal"></i>
			</button>

			<button class="btn btn-small btn-info">
				<i class="icon-pencil"></i>
			</button>

			<button class="btn btn-small btn-warning">
				<i class="icon-group"></i>
			</button>

			<button class="btn btn-small btn-danger">
				<i class="icon-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div>
	<!--#sidebar-shortcuts-->
	<?php // $menu = explode("-",$data['activeMenu']); $mainMenu = $menu[0]; $subMenu=$menu[1]; ?>
	<ul class="nav nav-list">
		<ul class="nav nav-list">
		<li class="<?= (($selectMenu[0]=='mn-asset-user')? 'active open':''); ?>">
			<a class="dropdown-toggle" href="#">
				<i class="icon-desktop"></i>
				<span class="menu-text"> ASSET USER</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu" >
				<li class="<?= (($selectMenu[1]=='sm-pengajuan')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/pengajuan">
						<i class="icon-double-angle-right"></i>
						Pengajaun Asset
					</a>
				</li>
				<li class="<?= (($selectMenu[1]=='sm-pengajuan-user')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/data_pengajuan_user">
						<i class="icon-double-angle-right"></i>
						Data Pengajuan User
					</a>
				</li>   
				<li class="<?= (($selectMenu[1]=='sm-asset-user')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/data_asset_user">
						<i class="icon-double-angle-right"></i>
						Data Asset User 
					</a>
				</li> 
			</ul>
		</li>
		<li class="<?= (($selectMenu[0]=='mn-asset-admin')? 'active open':''); ?>">
			<a class="dropdown-toggle" href="#">
				<i class="icon-desktop"></i>
				<span class="menu-text"> ASSET ADMIN</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu"> 
				<li class="<?= (($selectMenu[1]=='sm-dt-pengajuan')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/data_pengajuan">
						<i class="icon-double-angle-right"></i>
						Data Pengajuan Asset
					</a>
				</li> 
				<!--<li class="<?= (($selectMenu[1]=='sm-pembelian')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/pembelian">
						<i class="icon-double-angle-right"></i>
						Pembelian Asset
					</a>
				</li> -->
				<li class="<?= (($selectMenu[1]=='sm-tbh-dtasset')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/tambah_data_asset">
						<i class="icon-double-angle-right"></i>
						Tambah Asset
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-dt-asset')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/data_asset">
						<i class="icon-double-angle-right"></i>
						Data Asset Perusahaan
					</a>
				</li>
				<li class="<?= (($selectMenu[1]=='sm-dt-penyewaan')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/data_asset_sewa">
						<i class="icon-double-angle-right"></i>
						Data Asset Sewa
					</a>
				</li>
				<li class="<?= (($selectMenu[1]=='sm-asset-kendaraan')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/asset_kendaraan">
						<i class="icon-double-angle-right"></i>
						Data Asset Kendaraan
					</a>
				</li>
				<li class="<?= (($selectMenu[1]=='sm-asset-tnhbgn')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/asset_tanah_bangunan">
						<i class="icon-double-angle-right"></i>
						Data Asset Tanah Bangunan
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-kondisi-asset')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/data_kondisi_asset">
						<i class="icon-double-angle-right"></i>
						Data Kondisi Asset
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-asset-peminjaman')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/peminjaman_asset">
						<i class="icon-double-angle-right"></i>
						Peminjaman Asset
					</a>
				</li>
				<li class="<?= (($selectMenu[1]=='sm-asset-dtpeminjaman')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/data_peminjaman">
						<i class="icon-double-angle-right"></i>
						Data Peminjaman Asset
					</a>
				</li>
				<li class="<?= (($selectMenu[1]=='sm-asset-opname')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/stok_opname">
						<i class="icon-double-angle-right"></i>
						Stok Opname
					</a>
				</li>
				<li class="<?= (($selectMenu[1]=='sm-ver-stokopname')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/ver_stok_opname">
						<i class="icon-double-angle-right"></i>
						Verifikasi Stok Opname
					</a>
				</li>
				<li class="<?= (($selectMenu[1]=='sm-dtstok-opname')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Asset/data_stok_opname">
						<i class="icon-double-angle-right"></i>
						Data Stok Opname
					</a>
				</li>
			</ul>
		</li> 
		
		<li class="<?= (($selectMenu[0]=='mn-bhp-user')? 'active open':''); ?>">
			<a class="dropdown-toggle" href="#">
				<i class="icon-desktop"></i>
				<span class="menu-text"> BHP USER</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu" >
				<li class="<?= (($selectMenu[1]=='sm-pengajuan')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/pengajuan_bhp">
						<i class="icon-double-angle-right"></i>
						Pengajuan BHP
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-bhp-user')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/data_pengajuan_user">
						<i class="icon-double-angle-right"></i>
						Pengajuan BHP User
					</a>
				</li> 
			</ul>
		</li>
		
		<li class="<?= (($selectMenu[0]=='mn-bhp-admin')? 'active open':''); ?>">
			<a class="dropdown-toggle" href="#">
				<i class="icon-desktop"></i>
				<span class="menu-text"> BHP ADMIN</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu" >
				<li class="<?= (($selectMenu[1]=='sm-master')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/master">
						<i class="icon-double-angle-right"></i>
						Master BHP
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-stok')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/stok_bhp">
						<i class="icon-double-angle-right"></i>
						Data Stok
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-penambahan')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/tambah_barang">
						<i class="icon-double-angle-right"></i>
						Penambahan Barang
					</a>
				</li>  
				<li class="<?= (($selectMenu[1]=='sm-distribusi-brg')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/data_distribusi_barang">
						<i class="icon-double-angle-right"></i>
						Distribusi Barang
					</a>
				</li>  
				<li class="<?= (($selectMenu[1]=='sm-pengajuan-bhp')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/data_pengajuan_bhp">
						<i class="icon-double-angle-right"></i>
						Data Pengajuan BHP
					</a>
				</li>  
				<li class="<?= (($selectMenu[1]=='sm-input-stokawal')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/input_stok_awal">
						<i class="icon-double-angle-right"></i>
						Input Stok Awal
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-ver-stokawal')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/ver_stok_awal">
						<i class="icon-double-angle-right"></i>
						Verifikasi Stok Awal
					</a>
				</li>  
				<li class="<?= (($selectMenu[1]=='sm-stokopname')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/stok_opname">
						<i class="icon-double-angle-right"></i>
						Stok Opname
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-ver-stokopname')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/ver_stok_opname">
						<i class="icon-double-angle-right"></i>
						Verifikasi Stok Opname
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-dtstok-opname')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Bhp/data_stok_opname">
						<i class="icon-double-angle-right"></i>
						Data Stok Opname
					</a>
				</li> 
			</ul>
		</li>
		
		<li class="<?= (($selectMenu[0]=='mn-master')? 'active open':''); ?>">
			<a class="dropdown-toggle" href="#">
				<i class="icon-desktop"></i>
				<span class="menu-text"> Master</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu" >  
				<li class="<?= (($selectMenu[1]=='sm-jenis-asset')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/jenis_asset">
						<i class="icon-double-angle-right"></i>
						Jenis Asset
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-kategori-asset')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/kategori_asset">
						<i class="icon-double-angle-right"></i>
						Kategori Asset
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-jenis-barang')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/jenis_barang_asset">
						<i class="icon-double-angle-right"></i>
						Jenis Barang Asset
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-dt-vendor')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/data_vendor">
						<i class="icon-double-angle-right"></i>
						Data Vendor
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-jns-penyedia')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/jenis_penyedia">
						<i class="icon-double-angle-right"></i>
						Jenis Penyedia
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-sbr-anggaran')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/sumber_anggaran">
						<i class="icon-double-angle-right"></i>
						Sumber Anggaran
					</a>
				</li>  
				<li class="<?= (($selectMenu[1]=='sm-jns-perlakuan')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/jenis_perlakuan">
						<i class="icon-double-angle-right"></i>
						Jenis Perlakuan
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-jns-pajak')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/jenis_pajak">
						<i class="icon-double-angle-right"></i>
						Jenis Pajak
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-kondisi-asset')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/kondisi_asset">
						<i class="icon-double-angle-right"></i>
						Kondisi Asset
					</a>
				</li> 
				<li class="<?= (($selectMenu[1]=='sm-tglstok-opname')? 'active':''); ?>">
					<a href="<?= base_url(); ?>Assetmaster/tanggal_stokopname">
						<i class="icon-double-angle-right"></i>
						Tgl Stok Opname
					</a>
				</li>
			</ul>
		</li>
	</ul><!--/.nav-list-->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>
