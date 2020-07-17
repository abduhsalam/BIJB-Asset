//=================validasi tambah dokumen
$('#add-document').validate({
	errorElement: 'span',
	errorClass: 'help-inline',
	focusInvalid: false,
	rules: {
		noDokumen: 'required',
		pemilikDokumen: 'required',
		jenisDokumen: 'required',
		namaDokumen: 'required',
		statusDokumen: 'required',
		posisiDokumen: 'required',
		keterangan: 'required',
		
	},

	messages: {
		pemilikDokumen: "Please choose this field",
		jenisDokumen: "Please choose this field",
		statusDokumen: "Please choose this field",
	},


	highlight: function (e) {
		$(e).closest('.control-group').removeClass('info').addClass('error');
	},

	success: function (e) {
		$(e).closest('.control-group').removeClass('error').addClass('info');
		$(e).remove();
	},

	errorPlacement: function (error, element) {
		if(element.is(':checkbox') || element.is(':radio')) {
			var controls = element.closest('.controls');
			if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
			else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
		}
		else if(element.is('.select2')) {
			error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
		}
		else if(element.is('.chzn-select')) {
			error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
		}
		else error.insertAfter(element);
	},

});
//=================akhir validasi tambah dokumen