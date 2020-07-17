<?php $this->load->view('page/asset/templates/header'); ?>  
<div class="main-container container-fluid">
	<a class="menu-toggler" id="menu-toggler" href="#">
		<span class="menu-text"></span>
	</a>
	<?php $this->load->view('page/asset/templates/left_menu'); ?>  
	
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
				<li class="active">Tables</li>
			</ul><!--.breadcrumb-->

		</div>

		<div class="page-content">	 
			<?php
				// $this->load->view($data['view']); 				
				// if(isset($hasil))
				// 	{
				// 		$this->load->view($view,$hasil);
				// 		file_put_contents("hasil.txt", $hasil);
				// 	}					
				// else {
				$this->load->view($view);
			?>  
		</div><!--/.page-content--> 
	</div><!--/.main-content-->
</div><!--/.main-container-->
<?php $this->load->view('page/asset/templates/footer'); ?>  