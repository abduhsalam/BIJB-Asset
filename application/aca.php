
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

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
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li class="">
						<a href="<?php echo base_url()?>">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard</span>
						</a>
					</li>

					<li class="<?php echo active_menu('Surat',$title)?>" style="<?php echo (!array_intersect(array('Surat','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-envelope-alt"></i>
							<span class="menu-text">SURAT </span>

							<b class="arrow icon-angle-down"></b>
						</a>
						
						<ul class="submenu">
							<li class="<?php echo active_menu('Surat Masuk',$title)?>" style="<?php echo (!array_intersect(array('Surat Masuk','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/surat/surat_masuk">
									<i class="icon-double-angle-right"></i>
									Surat Masuk
								</a>
							</li>
							<li class="<?php echo active_menu('Surat Keluar',$title)?>" style="<?php echo (!array_intersect(array('Surat Keluar','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/surat/surat_keluar">
									<i class="icon-double-angle-right"></i>
									Surat Keluar
								</a>
							</li>
							<li class="<?php echo active_menu('Surat Keputusan',$title)?>" style="<?php echo (!array_intersect(array('Surat Keputusan','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/surat/surat_keputusan">
									<i class="icon-double-angle-right"></i>
									Surat Keputusan
								</a>
							</li>
							<li class="<?php echo active_menu('Surat Perjanjian (Mou)',$title)?>" style="<?php echo (!array_intersect(array('Surat Perjanjian','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/surat/surat_perjanjian">
									<i class="icon-double-angle-right"></i>
									Surat Perjanjian
								</a>
							</li>
						</ul>
					</li>
					
					<li class="<?php echo active_menu('Aktivitas',$title)?>" style="<?php echo (!array_intersect(array('Aktifitas','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-bar-chart"></i>
							<span class="menu-text">AKTIFITAS</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						
						<ul class="submenu">
							<li class="<?php echo active_menu('Daily Activity',$title)?>" style="<?php echo (!array_intersect(array('Daily Activity','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/aktivitas/daily_activity">
									<i class="icon-double-angle-right"></i>
									Daily Activity
								</a>
							</li>
							<li class="<?php echo active_menu('Realisasi Daily Activity',$title)?>" style="<?php echo (!array_intersect(array('Realisasi Daily Activity','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/aktivitas/realisasi">
									<i class="icon-double-angle-right"></i>
									Realisasi Daily Activity
								</a>
							</li>
						</ul>
					</li>
					<li class="<?php echo active_menu('Program Kerj',$title)?>" style="<?php echo (!array_intersect(array('Program Kerja','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-folder-close-alt"></i>
							<span class="menu-text">PROGRAM KERJA</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						
						<ul class="submenu">
							<li class="<?php echo active_menu('Program Kerja',$title)?>" style="<?php echo (!array_intersect(array('Program Kerja','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/laporan/program_kerja">
									<i class="icon-double-angle-right"></i>
									Program Kerja
								</a>
							</li>
							<li class="<?php echo active_menu('Realisasi Program Kerja',$title)?>" style="<?php echo (!array_intersect(array('Realisasi Program Kerja','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/laporan/realisasi_program_kerja">
									<i class="icon-double-angle-right"></i>
									Realisasi Program Kerja
								</a>
							</li>
						</ul>
					</li>
					<li class="<?php echo active_menu('Sistem Pengawasan',$title)?>" style="<?php echo (!array_intersect(array('S. Pengawasan','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-eye-open"></i>
							<span class="menu-text">S.PENGAWASAN</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						
						<ul class="submenu">
							<li class="<?php echo active_menu('Laporan Pengawasan',$title)?>" style="<?php echo (!array_intersect(array('Laporan Pengawasan','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sistempengawasan/laporan_pengawasan">
									<i class="icon-double-angle-right"></i>
									Laporan Pengawasan
								</a>
							</li>
							
						</ul>
					</li>
					<li class="<?php echo active_menu('Monitoring',$title)?>" style="<?php echo (!array_intersect(array('Monitoring','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-film"></i>
							<span class="menu-text">MONITORING</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						
						<ul class="submenu">
							<li class="<?php echo active_menu('Laporan Monitoring',$title)?>" style="<?php echo (!array_intersect(array('Laporan Monitoring','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sistemmonitoring/laporan_pengawasan">
									<i class="icon-double-angle-right"></i>
									Laporan Monitoring
								</a>
							</li>
							
						</ul>
					</li>
					<li class="<?php echo active_menu('Naskah',$title)?>" style="<?php echo (!array_intersect(array('Tata Naskah','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-folder-open"></i>
							<span class="menu-text">TATA NASKAH</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						
						<ul class="submenu">
							<li class="<?php echo active_menu('Tata Naskah',$title)?>" style="<?php echo (!array_intersect(array('Tata Naskah','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/takah/">
									<i class="icon-double-angle-right"></i>
									Input No. Takah
								</a>
							</li>
							<li class="<?php echo active_menu('Klasifikasi Masalah',$title)?>" style="<?php echo (!array_intersect(array('Klasifikasi Masalah','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/takah/klasifikasi/">
									<i class="icon-double-angle-right"></i>
									Klasifikasi Masalah
								</a>
							</li>
							<li class="<?php echo active_menu('Takah Peredaran',$title)?>" style="<?php echo (!array_intersect(array('Peredaran Takah','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>">
								<a href="<?php echo base_url()?>index.php/takah/peredaran/">
									<i class="icon-double-angle-right"></i>
									Peredaran Takah
								</a>
							</li>
						</ul>
					</li>
					<li class="<?php echo active_menu('Dokumen',$title)?>" style="<?php echo (!array_intersect(array('Dokumen','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-book"></i>
							<span class="menu-text">DOKUMEN</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li class="<?php echo active_menu('Formulir',$title)?>" style="<?php echo (!array_intersect(array('Formulir','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>">
								<a href="<?php echo base_url()?>index.php/dokumen/">
									<i class="icon-double-angle-right"></i>
									Formulir
								</a>
							</li>
							<li class="<?php echo active_menu('Prosedur',$title)?>" style="<?php echo (!array_intersect(array('Prosedur','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/dokumen/prosedur">
									<i class="icon-double-angle-right"></i>
									Prosedur
								</a>
							</li>
						
						</ul>
					</li>
					<li class="<?php echo active_menu('Inventory',$title)?>" style="<?php echo (!array_intersect(array('Inventory','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-briefcase"></i>
							<span class="menu-text">INVENTORY</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li class="<?php echo active_menu('Ruang Meeting',$title)?>" style="<?php echo (!array_intersect(array('Ruang Meeting','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/inventory/">
									<i class="icon-double-angle-right"></i>
									Ruang Meeting
								</a>
							</li>
							<li class="<?php echo active_menu('Kelola Ruang',$title)?>" style="<?php echo (!array_intersect(array('Kelola Ruang','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/inventory/ruangan">
									<i class="icon-double-angle-right"></i>
									Kelola Ruang
								</a>
							</li>
							<li>
								<a href="<?php echo base_url()?>index.php/inventory/asset" style="<?php echo (!array_intersect(array('Asset','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
									<i class="icon-double-angle-right"></i>
									Asset
								</a>
							</li>
							<li>
								<a href="<?php echo base_url()?>index.php/inventory/netlog">
									<i class="icon-double-angle-right"></i>
									Net Log
								</a>
							</li>
						
						</ul>
					</li>
					<li class="<?php echo active_menu('SPPD',$title)?>" style="<?php echo (!array_intersect(array('SPPD','All'),$this->session->userdata('akses')))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-fighter-jet"></i>
							<span class="menu-text">SPPD</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li class="<?php echo active_menu('Pengajuan SPPD',$title)?>" style="<?php echo (!array_intersect(array('Pengajuan SPPD','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/">
									<i class="icon-double-angle-right"></i>
									Pengajuan SPPD
								</a>
							</li>
							<li class="<?php echo active_menu('Data Pengajuan SPPD',$title)?>" style="<?php echo (!array_intersect(array('Data Pengajuan SPPD','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/data_sppd">
									<i class="icon-double-angle-right"></i>
									Data Pengajuan SPPD
								</a>
							</li>
							<li class="<?php echo active_menu('Persetujuan Atasan',$title)?>" style="<?php echo (!array_intersect(array('Persetujuan Atasan','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/approve_atasan">
									<i class="icon-double-angle-right"></i>
									Persetujuan Atasan
								</a>
							</li>
							<li class="<?php echo active_menu('Persetujuan SDM',$title)?>" style="<?php echo (!array_intersect(array('Persetujuan SDM','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/approve_sdm">
									<i class="icon-double-angle-right"></i>
									Persetujuan SDM
								</a>
							</li>
							<li class="<?php echo active_menu('Persetujuan HCM',$title)?>" style="<?php echo (!array_intersect(array('Persetujuan HCM','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/approve_hcm">
									<i class="icon-double-angle-right"></i>
									Persetujuan HCM
								</a>
							</li>
							<li class="<?php echo active_menu('Persetujuan Keuangan',$title)?>" style="<?php echo (!array_intersect(array('Persetujuan Keuangan','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/approve_keuangan">
									<i class="icon-double-angle-right"></i>
									Persetujuan Keuangan
								</a>
							</li>
							<li class="<?php echo active_menu('Persetujuan Direktur Keuangan',$title)?>" style="<?php echo (!array_intersect(array('Persetujuan Direktur Keuangan','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/approve_dirkeuangan">
									<i class="icon-double-angle-right"></i>
									Persetujuan Direktur Keuangan
								</a>
							</li>
							<li class="<?php echo active_menu('Pencairan',$title)?>" style="<?php echo (!array_intersect(array('Pencairan','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/approve_pencairan">
									<i class="icon-double-angle-right"></i>
									Pencairan
								</a>
							</li>
							<li class="<?php echo active_menu('Cash Advance',$title)?>" style="<?php echo (!array_intersect(array('Cash Advance','Super Admin'),$this->session->userdata('menu')))?'display:none':''?>" >
								<a href="<?php echo base_url()?>index.php/sppd/cash_advance">
									<i class="icon-double-angle-right"></i>
									Cash Advance
								</a>
							</li>
						
						</ul>
					</li>
					<li class="<?php echo active_menu('Sistem',$title);?>" style="<?php echo ((!array_intersect(array('Sistem','All'),$this->session->userdata('akses'))))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-user"></i>
							<span class="menu-text">SISTEM</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li class="<?php echo active_menu('Pengguna',$title)?>">
								<a href="<?php echo base_url()?>index.php/user/">
									<i class="icon-double-angle-right"></i>
									Pengguna
								</a>
							</li>
							<li class="<?php echo active_menu('Ruangan',$title)?>">
								<a href="<?php echo base_url()?>index.php/inventory/ruang">
									<i class="icon-double-angle-right"></i>
									Ruangan
								</a>
							</li>
							<li class="<?php echo active_menu('Email',$title)?>">
								<a href="<?php echo base_url()?>index.php/email">
									<i class="icon-double-angle-right"></i>
									Email Approval
								</a>
							</li>
							<li class="<?php echo active_menu('unitkerja',$title)?>">
								<a href="<?php echo base_url()?>index.php/unitkerja">
									<i class="icon-double-angle-right"></i>
									Unit Kerja
								</a>
							</li>
																			
						</ul>
					</li>
					<li class="<?php echo active_menu('Sistem',$title);?>" style="<?php echo ((!array_intersect(array('Sistem','All'),$this->session->userdata('akses'))))?'display:none':''?>" >
						<a href="#" class="dropdown-toggle">
							<i class="icon-user"></i>
							<span class="menu-text">Configuration</span>

							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							
							<li class="<?php echo active_menu('unitkerja',$title)?>">
								<a href="<?php echo base_url()?>index.php/unitkerja">
									<i class="icon-double-angle-right"></i>
									Menu
								</a>
							</li>
																			
						</ul>
					</li>

			 	</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
								<span class="divider">
									<i class="icon-angle-right arrow-icon"></i>
								</span>
							</li>
						</ul><!--.breadcrumb-->
				</div>
				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<h3 class="header smaller lighter blue"><?php echo (isset($title))?$title:""; ?></h3>
								