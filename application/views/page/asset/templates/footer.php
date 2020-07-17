
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>   
		
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>  
		<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> 
		 

		<!--page specific plugin scripts-->

		<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>		 
		<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.price_format.2.0.min.js"></script> 
		<script src="<?php echo base_url(); ?>assets/js/typeahead/bootstrap3-typeahead.js"></script> 
		 		
		<script type="text/javascript">
			$(document).ready(function () {  
				$('.date-picker').datepicker(
					'update', new Date()).on('changeDate', function(ev){
						$(this).datepicker('hide');
					}
				).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('.chzn-select').chosen(); 
				$('.uppercase').keyup(function(){
					this.value = this.value.toUpperCase();
				});
				$('.number').priceFormat({prefix: '',centsLimit: '',thousandsSeparator: ''});
				$('.price').priceFormat({prefix: '',centsLimit: '',thousandsSeparator: ','});  
				$('[data-rel=tooltip]').tooltip();
				//==================== ADD VALIDASI UNTUK UKURAN IMAGE TIDAK BOLEH LEBIH DARI 2 MB
				$.validator.addMethod("fileSize", function (val, element) {

				  var size = element.files[0].size;
					// console.log(size);

				   if (size > 2097152)// checks the file more than 1 MB
				   { 
						return false;
				   } else { 
					   return true;
				   }

				}, "Ukuran file lebih dari 2MB");
				//==================================== END VALIDASI UKURAN IMAGE
			});
			
			function validateNumber(event) {
			var key = window.event ? event.keyCode : event.which;

				if (event.keyCode == 8 || event.keyCode == 46
				 || event.keyCode == 37 || event.keyCode == 39 || key == 46) {
					return true;
				}
				else if ( key < 48 || key > 57 ) {
					return false;
				}
				else return true;
			};
			
			function numberformat(e){
				$(e).priceFormat({prefix: '',centsLimit: '',thousandsSeparator: ''});
			}
			
			function convertDate(date){ 
				var newdate = date.split("-").reverse().join("-");
				return newdate;
			}
			
			function currency(curr){
				var formatCurr = parseFloat(curr).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				return formatCurr;
			}
		</script>
	 
	</body>
</html>