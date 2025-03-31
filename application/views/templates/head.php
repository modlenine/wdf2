<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/')?>vendors/images/slc.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/')?>vendors/images/slc.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/')?>vendors/images/slc.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>src/plugins/dropzone/src/dropzone.css">
	

    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>src/plugins/sweetalert2/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/custom.css">

	<!-- Bootstrap File Upload CSS -->
    <!-- <link href="<?=base_url('assets/')?>fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link href="<?=base_url('assets/')?>fileinput/themes/explorer-fa5/theme.css" media="all" rel="stylesheet" type="text/css"/> -->
	<link rel="stylesheet" href="<?=base_url('assets/')?>fileupload/bs-filestyle.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/')?>fileupload/bootstrap-icons.css" type="text/css" />


	<link rel="stylesheet" href="<?=base_url()?>assets/ekko_lightbox/ekko-lightbox.css" type="text/css"/>

	<!-- Date picker -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/default/zebra_datepicker.min.css" type="text/css" />

	<link rel="stylesheet" href="<?= base_url() ?>signature-pad/assets/jquery.signaturepad.css">
    <link href="<?= base_url() ?>signature-pad/assets/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <script src="<?=base_url('assets/js/jquery.min.js?v='.filemtime('./assets/js/jquery.min.js'))?>"></script>
	<script src="<?=base_url('assets/js/vue.js')?>"></script>
	<script src="<?=base_url('assets/js/axios.min.js')?>"></script>


	<!-- Process step -->
	<link rel="stylesheet" href="<?=base_url()?>assets/process_step/style.css" type="text/css" />



	<style>
		/* thai */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aAFJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
		}

		/* vietnamese */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBpJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
		}

		/* latin-ext */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBtJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
		}

		/* latin */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBVJnw.woff2') ?>) format('woff2');
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}

		* {
			font-family: 'Sarabun', sans-serif;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		label {
			font-family: 'Sarabun', sans-serif !important;
		}

		body {
			font-size: .9rem !important;
		}

		.form-control {
			font-size: .9rem !important;
		}

		.process-steps li h5 {
			font-size: .85rem !important;
		}

		.col-search-input {
			width: 100% !important;
		}


		
	</style>

</head>
<?php
	// Get Modal Zone
?>

<div class="loader">
	<div></div>
</div>

<script> 
	 // Code page Load 
	$(window).on('load',function(){ 
    $('.loader').fadeOut(100); 
  }) 
</script>

<body>


	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<!-- <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				
			</div> -->
		</div>
		<div class="header-right">
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<div id="notify-section" style="display:none;">
							<span class="badge notification-active"></span>
							<div class="d-flex align-items-center justify-content-center countNotify">
								<span class="countNotifyText">0</span>
							</div>
						</div>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<div id="show_notifyData"></div>
						</div>
					</div>

				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?=getUserImage()?>" alt="">
						</span>
						<span class="user-name"><?=getUser()->Fname." ".getUser()->Lname?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> -->
						<a class="dropdown-item" id="logoutBtn" href="#"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>


	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?=base_url()?>">
				<img src="<?=base_url('assets/')?>vendors/images/wdflogo.svg" alt="" class="dark-logo">
				<img src="<?=base_url('assets/')?>vendors/images/wdflogo.svg" alt="" class="light-logo">
				<!-- <span style="font-size:28px;color:#ef476f;"><b>WDF Online</b></span> -->
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="<?=base_url()?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-city-hall hicon"></span><span class="mtext">หน้าหลัก</span>
						</a>
					</li>
			
			
					<li>
						<a href="<?=base_url('advance.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-wallet1 wdfI1"></span><span class="mtext">ใบเบิกเงินทดรองจ่าย</span>
						</a>
					</li>

					<li>
						<a href="<?=base_url('normal.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-wallet1 wdfI2"></span><span class="mtext">ใบขอเบิกจ่าย</span>
						</a>
					</li>

					<li>
						<a href="<?=base_url('salary.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-wind-rose wdfI3"></span><span class="mtext">เงินเดือน</span>
						</a>
					</li>

					<li>
						<a href="<?=base_url('po.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-wind-rose wdfI4"></span><span class="mtext">ใบขอเบิกจ่าย (PO)</span>
						</a>
					</li>

					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<div class="sidebar-small-cap mtext">รายงาน</div>
					</li>
					<li>
						<a href="<?=base_url('advance_report.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-profits-1 wdfI1"></span><span class="mtext">รายงานใบเบิกเงินทดรองจ่าย</span>
						</a>
					</li>
					<li>
						<a href="<?=base_url('normal_report.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-profits-1 wdfI2"></span><span class="mtext">รายงานใบขอเบิกจ่าย</span>
						</a>
					</li>
					<li>
						<a href="<?=base_url('salary_report.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-profits-1 wdfI3"></span><span class="mtext">รายงานเงินเดือน</span>
						</a>
					</li>
					<li>
						<a href="<?=base_url('po_report.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-profits-1 wdfI4"></span><span class="mtext">รายงานใบขอเบิกจ่าย (PO)</span>
						</a>
					</li>

					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<div class="sidebar-small-cap mtext">ตั้งค่า</div>
					</li>
					<li>
						<a href="<?=base_url('accode.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-add-file1 hicon"></span><span class="mtext">เพิ่มรายการค่าใช้จ่าย</span>
						</a>
					</li>
					<li id="add-currency-menu" style="display:none;">
						<a href="<?=base_url('currency.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-add-file1 hicon"></span><span class="mtext">จัดการสกุลเงิน</span>
						</a>
					</li>
					<li id="add-accCode-menu" style="display:none;">
						<a href="<?=base_url('accodemaster.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-add-file1 hicon"></span><span class="mtext">เพิ่มรายการทางบัญชี</span>
						</a>
					</li>
					<li id="add-userPermission-menu" style="display:none;">
						<a href="<?=base_url('userpermission.html')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1 hicon"></span><span class="mtext">จัดการผู้ใช้งาน</span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>


<script>
	const url = "<?php echo base_url()?>";
	$(document).ready(function(){

		let userecode = "<?php echo getUser()->ecode; ?>";
		let userdeptcode = "<?php echo getUser()->DeptCode; ?>";
		let userposi = "<?php echo getUser()->posi; ?>";
		let userpermission = "";
		let userAppData = [];

		controlSettingMenu();
		getUserApp_head(userecode);


		$('#logoutBtn').click(function(){
			logoutConfirm();
		});


		function logoutConfirm()
		{
			swal({
				title: 'ต้องการลงชื่ออกจากระบบ ใช่หรือไม่',
				type: 'warning',
				showCancelButton: true,
				confirmButtonClass: 'btn btn-success',
				cancelButtonClass: 'btn btn-danger',
				confirmButtonText: 'ยืนยัน',
				cancelButtonText:'ยกเลิก'
			}).then((result)=> {
				if(result.value == true){
					location.href = url+'login/logout';
				}
			});
		}

		// controlButton_foradmin(ecode);

		getUserPermission_head(userecode);

		function getDataWaitApprove(ecode)
		{
			if(ecode != ""){
				axios.post(url+'main/getDataWaitApprove' , {
					action:"getDataWaitApprove",
					ecode:ecode
				}).then(res=>{
					console.log(res.data);
					if(res.data.status == "Select Data Success"){
						
						let resultData = res.data.resultData;
						let resultDataUser = res.data.resultData_user;
						let userLoginPosi = "<?php echo getUser()->posi; ?>";
						let userDeptCode = "<?php echo getUser()->DeptCode; ?>";
						let userEcode = "<?php echo getUser()->ecode; ?>";


						console.log(userpermission.u_ap_section+' '+userDeptCode);
						console.log(userAppData);
						// console.log(userEcode);

						if(resultDataUser.length != 0){
							let countForm = 0;
							let countFormByCondition = 0;
							let html = `
								<ul>
							`;

							for(let i = 0; i < resultDataUser.length; i++){
								let page = '';

								if(resultDataUser[i].wdf_doctype == "adv"){
									page = `advance_view.html/`;
								}else if(resultDataUser[i].wdf_doctype == "wdf"){
									page = `normal_view.html/`;
								}else if(resultDataUser[i].wdf_doctype == "sal"){
									page = `salary_view.html/`;
								}else if(resultDataUser[i].wdf_doctype == "po"){
									page = `po_view.html/`;
								}


								if(userDeptCode == 1003 || userEcode == "M1809"){

									//สำหรับ Section ต่างๆของบัญชี
									if(userpermission.u_budget_section == "yes" && resultDataUser[i].wdf_status == "Open"){

										//Section check budget
										html += `
										<li>
											<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
												<h3>`+resultDataUser[i].wdf_formno+`</h3>
												<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
												<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
												<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
											</a>
										</li>
										<hr>
										`;
										countFormByCondition++;

									}else if(userpermission.u_ap_section == "yes" && resultDataUser[i].wdf_status == "Manager approved" && resultDataUser[i].wdf_appgroup == "5"){
										//Section ap inspection
										html += `
										<li>
											<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
												<h3>`+resultDataUser[i].wdf_formno+`</h3>
												<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
												<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
												<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
											</a>
										</li>
										<hr>
										`;
										countFormByCondition++;

									}else if(userpermission.u_ap_section == "yes" && resultDataUser[i].wdf_status == "Executive Group "+resultDataUser[i].wdf_appgroup+" Approved" && resultDataUser[i].wdf_appgroup != "5"){
										//Section ap inspection
										html += `
										<li>
											<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
												<h3>`+resultDataUser[i].wdf_formno+`</h3>
												<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
												<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
												<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
											</a>
										</li>
										<hr>
										`;

										countFormByCondition++;
									}else if(userpermission.u_acc_section == "yes" && resultDataUser[i].wdf_status == "AP passed inspection"){
										//Section acc inspection
										html += `
										<li>
											<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
												<h3>`+resultDataUser[i].wdf_formno+`</h3>
												<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
												<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
												<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
											</a>
										</li>
										<hr>
										`;

										countFormByCondition++;
									}else if(userpermission.u_finance_section == "yes" && resultDataUser[i].wdf_status == "Account passed inspection"){
										//Section finance inspection
										html += `
										<li>
											<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
												<h3>`+resultDataUser[i].wdf_formno+`</h3>
												<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
												<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
												<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
											</a>
										</li>
										<hr>
										`;

										countFormByCondition++;
									}else if(userpermission.u_userreceive_section == "yes" && resultDataUser[i].wdf_status == "Wait user receive money"){
										//Section finance inspection
										html += `
										<li>
											<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
												<h3>`+resultDataUser[i].wdf_formno+`</h3>
												<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
												<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
												<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
											</a>
										</li>
										<hr>
										`;

										countFormByCondition++;
									}else{
										continue;
									}


								}else if(userLoginPosi == 75 || userLoginPosi == 65 || userLoginPosi == 55){
									//กรณีที่มีตำแหน่ง Assist Manager , Manager จะเห็นข้อมูลการรออนุมัติเงื่อนไขสถานะ Check budget already
									if(resultDataUser[i].wdf_status == "Check budget already"){
										// เช็คเงื่อนไขว่าใช่บริษัท The bubbles หรือไม่
										if(resultDataUser[i].wdf_areaid == "tb"){
											if(userEcode == "M0051" || userEcode == "M0963"){
												//Section check Manager the bubbles
												html += `
												<li>
													<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
														<h3>`+resultDataUser[i].wdf_formno+`</h3>
														<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
														<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
														<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
													</a>
												</li>
												<hr>
												`;

												countFormByCondition++;
											}else{
												continue;
											}
										}else{
											if(userDeptCode == resultDataUser[i].wdf_deptcode){
												//Section check Manager
												html += `
												<li>
													<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
														<h3>`+resultDataUser[i].wdf_formno+`</h3>
														<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
														<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
														<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
													</a>
												</li>
												<hr>
												`;

												countFormByCondition++;
											}else if(userEcode == "M0040"){
												//Section check Manager
												html += `
												<li>
													<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
														<h3>`+resultDataUser[i].wdf_formno+`</h3>
														<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
														<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
														<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
													</a>
												</li>
												<hr>
												`;

												countFormByCondition++;
											}else{
												continue;
											}
										}

									}else if(resultDataUser[i].wdf_status == "Manager approved" || resultDataUser[i].wdf_status == "Wait Executive Group "+resultDataUser[i].wdf_appgroup+" Approve"){
										if(resultDataUser[i].wdf_areaid == "tb"){
											if(userEcode == "M2076" || userEcode == "M2077"){

												//For wait excutive approve
												for(let ii = 0; ii < userAppData.length; ii++){
													//Section check app group 4 3 2 1 0
													if(resultDataUser[i].wdf_formcode == userAppData[ii].apv_formcode){
														html += `
															<li>
																<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
																	<h3>`+resultDataUser[i].wdf_formno+`</h3>
																	<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
																	<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
																	<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
																</a>
															</li>
															<hr>
															`;

															countFormByCondition++;
													}else{
														continue;
													}

												}
												
											}else{
												//For wait excutive approve
												for(let ii = 0; ii < userAppData.length; ii++){
													//Section check app group 4 3 2 1 0
													if(resultDataUser[i].wdf_formcode == userAppData[ii].apv_formcode){
														html += `
															<li>
																<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
																	<h3>`+resultDataUser[i].wdf_formno+`</h3>
																	<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
																	<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
																	<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
																</a>
															</li>
															<hr>
															`;

															countFormByCondition++;
													}else{
														continue;
													}

												}
											}
										}else{
											//For wait excutive approve
											for(let ii = 0; ii < userAppData.length; ii++){
												//Section check app group 4 3 2 1 0
												if(resultDataUser[i].wdf_formcode == userAppData[ii].apv_formcode){
													html += `
														<li>
															<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
																<h3>`+resultDataUser[i].wdf_formno+`</h3>
																<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
																<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
																<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
															</a>
														</li>
														<hr>
														`;

														countFormByCondition++;
												}else{
													continue;
												}

											}
										}
									}


								}else if(resultDataUser[i].wdf_appgroup != "5"){
									// Query user approve
									//For wait excutive approve
									for(let ii = 0; ii < userAppData.length; ii++){
										//Section check app group 4 3 2 1 0
										if(resultDataUser[i].wdf_formcode == userAppData[ii].apv_formcode){
											html += `
												<li>
													<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
														<h3>`+resultDataUser[i].wdf_formno+`</h3>
														<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
														<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
														<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
													</a>
												</li>
												<hr>
												`;

												countFormByCondition++;
										}else{
											continue;
										}

									}
								}

								if(resultDataUser[i].wdf_ecode == userEcode){
									if(resultDataUser[i].wdf_status == "Wait user receive money" || resultDataUser[i].wdf_status == "Complete & Wait User Clear Money"){
										html += `
										<li>
											<a href="`+url+page+resultDataUser[i].wdf_formcode+`/`+resultDataUser[i].wdf_formno+`">
												<h3>`+resultDataUser[i].wdf_formno+`</h3>
												<p><b>ผู้ร้องขอ : </b>`+resultDataUser[i].wdf_user+`</p>
												<p><b>วันที่ร้องขอ : </b>`+moment(resultDataUser[i].wdf_datetime).format('DD/MM/Y HH:mm:ss')+`</p>
												<p><b>สถานะ : </b>`+resultDataUser[i].wdf_status+`</p>
											</a>
										</li>
										<hr>
										`;

										countFormByCondition++;
									}
									
								}

								countForm++;

							}

							html +=`
								</ul>
							
							`;

							$('#show_notifyData').html(html);

							if(countFormByCondition != 0){
								$('#notify-section').css('display' , '');
								$('.countNotifyText').text(countFormByCondition);
							}
						}else{
							$('#show_notifyData').html('ไม่มีข้อมูล');
						}


					}
				});
			}
		}

		function controlSettingMenu()
		{
			if(userdeptcode == 1003 && userposi > 15 || userdeptcode == 1002){
				$('#add-userPermission-menu').css('display' , '');
			}else{
				$('#add-userPermission-menu').css('display' , 'none');
			}

			if(userdeptcode == 1003 || userdeptcode == 1002){
				$('#add-accCode-menu').css('display' , '');
				$('#add-currency-menu').css('display' , '');
			}else{
				$('#add-accCode-menu').css('display' , 'none');
				$('#add-currency-menu').css('display' , 'none');
			}

		}


		function getUserPermission_head(ecode)
		{
			if(ecode != ""){
				axios.post(url+'main/normal/getUserPermission_nor' , {
					action:"getUserPermission_nor",
					ecode:ecode
				}).then(res=>{
					// console.log(res.data);
					if(res.data.status == "Select Data Success"){
						if(res.data.result != null){
							userpermission = res.data.result;
							console.log(userpermission);
						}
						getDataWaitApprove(userecode);
					}
				});
			}
		}

		function getUserApp_head(ecode)
		{
			if(ecode != ""){
				axios.post(url+'main/getUserApp',{
					action:"getUserApp",
					ecode:ecode,
				}).then(res=>{
					// console.log(res.data);
					if(res.data.status == "Select Data Success"){
						userAppData = res.data.userApproveResult;
					}
				});
			}
		}


		
	});

	function conColorTextStatus(status) {
		let color = '';

		// Approve zone
		const approvedStatuses = [
			"Open", "Check budget already", "Manager approved",
			"Wait Executive Group 0 Approve", "Wait Executive Group 1 Approve",
			"Wait Executive Group 2 Approve", "Wait Executive Group 3 Approve", "Wait Executive Group 4 Approve",
			"Executive Group 0 Approved", "Executive Group 1 Approved", "Executive Group 2 Approved",
			"Executive Group 3 Approved", "Executive Group 4 Approved",
			"Executive Group 0 Approved (Clear Money)", "Executive Group 1 Approved (Clear Money)",
			"Executive Group 2 Approved (Clear Money)", "Executive Group 3 Approved (Clear Money)",
			"Executive Group 4 Approved (Clear Money)", "AP passed inspection",
			"AP passed inspection (Clear Money)", "Account passed inspection", "Wait user receive money",
			"Finance passed inspection (Clear Money)"
		];

		// Not approve zone
		const rejectedStatuses = [
			"Executive Group 0 Not Approve", "Executive Group 1 Not Approve",
			"Executive Group 2 Not Approve", "Executive Group 3 Not Approve", "Executive Group 4 Not Approve",
			"Manager not approve", "AP not pass inspection", "Account not pass inspection",
			"Finance not pass inspection", "Manager not approve (Clear Money)",
			"Executive Group 0 Not Approve (Clear Money)", "Executive Group 1 Not Approve (Clear Money)",
			"Executive Group 2 Not Approve (Clear Money)", "Executive Group 3 Not Approve (Clear Money)",
			"Executive Group 4 Not Approve (Clear Money)", "AP not pass inspection (Clear Money)",
			"Account not pass inspection (Clear Money)", "User cancel",
			"Finance 2 not pass inspection (Clear Money)"
		];

		// Orange (next step)
		const nextStepStatuses = [
			"Edit", "Complete & Wait User Clear Money"
		];

		// Complete
		const completeStatuses = [
			"Clear money complete", "Complete"
		];

		if (approvedStatuses.includes(status)) {
			color = "#3399FF";
		} else if (rejectedStatuses.includes(status)) {
			color = "#CC0000";
		} else if (nextStepStatuses.includes(status)) {
			color = "#FF9900";
		} else if (completeStatuses.includes(status)) {
			color = "#009900";
		}

		return `<span style="color:${color};"><b>${status}</b></span>`;
	}
</script>


