
    
    <!-- js -->
	<script src="<?=base_url('assets/')?>vendors/scripts/core.js"></script>
	<script src="<?=base_url('assets/')?>vendors/scripts/script.min.js"></script>
	<script src="<?=base_url('assets/')?>vendors/scripts/process.js"></script>
	<script src="<?=base_url('assets/')?>vendors/scripts/layout-settings.js"></script>

	<script src="<?=base_url('assets/')?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('assets/')?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?=base_url('assets/')?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?=base_url('assets/')?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>


    <!-- add sweet alert js & css in footer -->
	<script src="<?=base_url('assets/')?>src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="<?=base_url('assets/')?>src/plugins/sweetalert2/sweet-alert.init.js"></script>


	<!-- Bootstrap File Upload Plugin -->
	<script src="<?=base_url('assets/')?>fileupload/bs-filestyle.js"></script>



	<!-- Date & Time Picker JS -->
	<script src="<?=base_url('assets/')?>timepicker/js/components/moment.js"></script>
	<script src="<?=base_url('assets/')?>timepicker/js/components/timepicker.js"></script>
	<script src="<?=base_url('assets/')?>timepicker/js/components/datepicker.js"></script>
	<!-- Include Date Range Picker -->
	<script src="<?=base_url('assets/')?>timepicker/js/components/daterangepicker.js"></script>
	<!-- Date & Time Picker JS -->
	<script src="<?=base_url()?>assets/dist/zebra_datepicker.min.js"></script>
	<script src="<?=base_url()?>assets/ekko_lightbox/ekko-lightbox.min.js"></script>

	<!-- Moment -->
	<script src="<?=base_url('assets/moment/moment.min.js')?>"></script>

	<script src="<?=base_url('assets/js/main_function.js?v='.filemtime('./assets/js/main_function.js'))?>"></script>

	<script src="<?= base_url() ?>signature-pad/assets/jquery.signaturepad.js"></script>
	<script src="<?= base_url() ?>signature-pad/assets/bezier.js"></script>
	<script src="<?= base_url() ?>signature-pad/assets/numeric-1.2.6.min.js"></script>
	<script src="<?= base_url() ?>signature-pad/assets/signature_pad.min.js"></script>
	<script src="<?= base_url() ?>signature-pad/assets/flashcanvas.js"></script>
	<script src="<?= base_url() ?>signature-pad/assets/json2.min.js"></script>


	<!-- Data Table Button -->
	<script src="<?= base_url('assets/js/datatables/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/buttons.flash.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/jszip.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/vfs_fonts.js') ?>"></script>


    <!-- <script src="<?=base_url('assets/')?>fileinput/js/plugins/buffer.min.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/plugins/filetype.min.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/locales/fr.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/js/locales/es.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/themes/fa5/theme.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/')?>fileinput/themes/explorer-fa5/theme.js" type="text/javascript"></script> -->



</body>

<script>

	$(document).ready(function(){
		// $('.datetimepicker1 , .datetimepicker2 , .datetimepicker3 , .datetimepicker4 , .datetimepicker5 , .datetimepicker6').datetimepicker({
		// 	format: "DD-MM-yyyy HH:mm",
		// 	showClose: true
    	// });
		

		$('#mdrd_chooseTime').Zebra_DatePicker({
        	format: 'Y-m-d H:i'
    	});
		$('#mdrd_chooseTime_edit').Zebra_DatePicker({
        	format: 'Y-m-d H:i'
    	});

		$('#startDate-adv').Zebra_DatePicker({
            pair: $('#endDate-adv')
        });
        $('#endDate-adv').Zebra_DatePicker({
            direction: true
        });

		$('#startDate-rp-adv').Zebra_DatePicker({
            pair: $('#endDate-rp-adv')
        });
        $('#endDate-rp-adv').Zebra_DatePicker({
            direction: true
        });

		$('#startDate-nor').Zebra_DatePicker({
            pair: $('#endDate-nor')
        });
        $('#endDate-nor').Zebra_DatePicker({
            direction: true
        });

		$('#startDate-rp-nor').Zebra_DatePicker({
            pair: $('#endDate-rp-nor')
        });
        $('#endDate-rp-nor').Zebra_DatePicker({
            direction: true
        });

		$('#startDate-sal').Zebra_DatePicker({
            pair: $('#endDate-sal')
        });
        $('#endDate-sal').Zebra_DatePicker({
            direction: true
        });

		$('#startDate-rp-sal').Zebra_DatePicker({
            pair: $('#endDate-rp-sal')
        });
        $('#endDate-rp-sal').Zebra_DatePicker({
            direction: true
        });


		$('#startDate-po').Zebra_DatePicker({
            pair: $('#endDate-sal')
        });
        $('#endDate-po').Zebra_DatePicker({
            direction: true
        });

		$('#startDate-rp-po').Zebra_DatePicker({
            pair: $('#endDate-rp-sal')
        });
        $('#endDate-rp-po').Zebra_DatePicker({
            direction: true
        });

		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox({
				alwaysShowClose: true,
			});
		});





			// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();


	});

</script>
</html>