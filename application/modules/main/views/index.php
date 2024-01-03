<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักโปรแกรมใบเบิกเงิน</title>

		<!-- Date picker -->
		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/default/zebra_datepicker.min.css" type="text/css" />
		
</head>

	<?php
		$resultData_adv = getMaindataForDashBoard("adv");
		if($resultData_adv != false){
			$countData_adv = $resultData_adv->num_rows();
		}else{
			$countData_adv = 0;
		}


		$resultData_wdf = getMaindataForDashBoard("wdf");
		if($resultData_wdf != false){
			$countData_wdf = $resultData_wdf->num_rows();
		}else{
			$countData_wdf = 0;
		}


		$resultData_sal = getMaindataForDashBoard("sal");
		if($resultData_sal != false){
			$countData_sal = $resultData_sal->num_rows();
		}else{
			$countData_sal = 0;
		}


		$resultData_po = getMaindataForDashBoard("po");
		if($resultData_po != false){
			$countData_po = $resultData_po->num_rows();
		}else{
			$countData_po = 0;
		}


		$resultData_groupByDept_adv = getMaindataForDashBoardGroupByDept("adv");
		$resultData_groupByDept_wdf = getMaindataForDashBoardGroupByDept("wdf");
		$resultData_groupByDept_sal = getMaindataForDashBoardGroupByDept("sal");
		$resultData_groupByDept_po = getMaindataForDashBoardGroupByDept("po");


		$resultData_groupByStatus_adv = getDataForDashBoardBydeptByStatus("adv" , getUser()->DeptCode);
		$resultData_groupByStatus_wdf = getDataForDashBoardBydeptByStatus("wdf" , getUser()->DeptCode);
		$resultData_groupByStatus_sal = getDataForDashBoardBydeptByStatus("sal" , getUser()->DeptCode);
		$resultData_groupByStatus_po = getDataForDashBoardBydeptByStatus("po" , getUser()->DeptCode);

		
	?>



<body>
    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">
				<h3 style="text-align:center;">รายการทั้งหมด</h3><br>
				<div class="row">
					<div class="col-md-6">
						<div class="card-box pd-20 mb-30" style="min-height:400px;">
							<h4 style="text-align:center;color:#3399FF;">ใบเบิกเงินทดรองจ่าย (Advance)</h4><br>
							<h5 style="text-align:center;color:#3399FF;">รวมทั้งหมด <?=$countData_adv?> รายการ</h5><br>

							<div class="list-group home-ul-adv">
								<?php
									$output = '';
									if($resultData_groupByDept_adv != false){
										foreach($resultData_groupByDept_adv->result() as $rs){

											$countBydept = getMaindataForDashBoardWithDept("adv" , $rs->wdf_deptcode);
	
											$output .= '
											<a href="#" class="list-group-item d-flex justify-content-between list-group-item-action">
												'.$rs->wdf_dept.'
												<span class="badge badge-adv badge-pill">'.$countBydept->num_rows().'</span>
											</a>
											';
										}
									}else{
										$output .='ไม่พบข้อมูล';
									}

									echo $output;
								?>
							</div>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-box pd-20 mb-30" style="min-height:400px;">
							<h4 style="text-align:center;color:#fb1eb5;">ใบขอเบิกจ่าย (Normal)</h4><br>
							<h5 style="text-align:center;color:#fb1eb5;">รวมทั้งหมด <?=$countData_wdf?> รายการ</h5><br>

							<div class="list-group home-ul-nor">
								<?php
									$output = '';

									if($resultData_groupByDept_wdf != false){
										foreach($resultData_groupByDept_wdf->result() as $rs){

											$countBydept = getMaindataForDashBoardWithDept("wdf" , $rs->wdf_deptcode);
	
											$output .= '
											<a href="#" class="list-group-item d-flex justify-content-between list-group-item-action">
												'.$rs->wdf_dept.'
												<span class="badge badge-wdf badge-pill">'.$countBydept->num_rows().'</span>
											</a>
											';
										}
									}else{
										$output .='ไม่พบข้อมูล';
									}

									echo $output;
								?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-box pd-20 mb-30" style="min-height:400px;">
							<h4 style="text-align:center;color:#f4ae2b;">ใบขอเบิกจ่าย เงินเดือน (Salary)</h4><br>
							<h5 style="text-align:center;color:#f4ae2b;">รวมทั้งหมด <?=$countData_sal?> รายการ</h5><br>
							
							<div class="list-group home-ul-sal">
								<?php
									$output = '';

									if($resultData_groupByDept_sal != false){
										foreach($resultData_groupByDept_sal->result() as $rs){

											$countBydept = getMaindataForDashBoardWithDept("sal" , $rs->wdf_deptcode);
	
											$output .= '
											<a href="#" class="list-group-item d-flex justify-content-between list-group-item-action sal-li-selected"
												data_deptcode = "'.$rs->wdf_deptcode.'"
											>
												'.$rs->wdf_dept.'
												<span class="badge badge-sal badge-pill">'.$countBydept->num_rows().'</span>
											</a>
											';
										}
									}else{
										$output .='ไม่พบข้อมูล';
									}

									echo $output;
								?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-box pd-20 mb-30" style="min-height:400px;">
							<h4 style="text-align:center;color:#03ad03 ;">ใบขอเบิกจ่าย (PO)</h4><br>
							<h5 style="text-align:center;color:#03ad03 ;">รวมทั้งหมด <?=$countData_po?> รายการ</h5><br>
							
							<div class="list-group home-ul-po">
								<?php
									$output = '';

									if($resultData_groupByDept_po != false){
										foreach($resultData_groupByDept_po->result() as $rs){

											$countBydept = getMaindataForDashBoardWithDept("po" , $rs->wdf_deptcode);
	
											$output .= '
											<a href="#" class="list-group-item d-flex justify-content-between list-group-item-action sal-li-selected"
												data_deptcode = "'.$rs->wdf_deptcode.'"
											>
												'.$rs->wdf_dept.'
												<span class="badge badge-po badge-pill">'.$countBydept->num_rows().'</span>
											</a>
											';
										}
									}else{
										$output .='ไม่พบข้อมูล';
									}

									echo $output;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="showDataByStatus" class="card-box pd-20 height-100-p mb-30">
				<h3 style="text-align:center;">รายการแบ่งตามสถานะ</h3><br>
				<div class="row">
					<div class="col-md-6">
						<div class="card-box pd-20 mb-30" style="min-height:400px;">
							<h4 style="text-align:center;color:#3399FF;">ใบเบิกเงินทดรองจ่าย (Advance)</h4><br>
							<div class="list-group home-ul-adv">
								<?php
									$output = '';
									if($resultData_groupByStatus_adv != false){
										foreach($resultData_groupByStatus_adv->result() as $rs){
											$countByStatusDept_adv = getDataForDashBoardBydeptWithStatus("adv" , getUser()->DeptCode , $rs->wdf_status);
											$output .= '
											<a href="javascript:void(0)" class="list-group-item d-flex justify-content-between list-group-item-action select-adv"
												data_status="'.conStatusTextToNum($rs->wdf_status , "adv").'"
											>
												'.$rs->wdf_status.'
												<span class="badge badge-adv badge-pill">'.$countByStatusDept_adv->num_rows().'</span>
											</a>
											';
										}
									}else{
										$output .='ไม่พบข้อมูล';
									}

									echo $output;
								?>
							</div>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-box pd-20 mb-30" style="min-height:400px;">
							<h4 style="text-align:center;color:#fb1eb5;">ใบขอเบิกจ่าย (Normal)</h4><br>

							<div class="list-group home-ul-nor">
								<?php
									$output = '';
									if($resultData_groupByStatus_wdf != false){
										foreach($resultData_groupByStatus_wdf->result() as $rs){

											$countByStatusDept_wdf = getDataForDashBoardBydeptWithStatus("wdf" , getUser()->DeptCode , $rs->wdf_status);
	
											$output .= '
											<a href="javascript:void(0)" class="list-group-item d-flex justify-content-between list-group-item-action select-wdf"
												data_status="'.conStatusTextToNum($rs->wdf_status , "wdf").'"
											>
												'.$rs->wdf_status.'
												<span class="badge badge-wdf badge-pill">'.$countByStatusDept_wdf->num_rows().'</span>
											</a>
											';
										}
									}else{
										$output .='ไม่พบข้อมูล';
									}

									echo $output;
								?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-box pd-20 mb-30" style="min-height:400px;">
							<h4 style="text-align:center;color:#f4ae2b;">ใบขอเบิกจ่าย เงินเดือน (Salary)</h4><br>
							
							<div class="list-group home-ul-sal">
								<?php
									$output = '';

									if($resultData_groupByStatus_sal != false){
										foreach($resultData_groupByStatus_sal->result() as $rs){

											$countByStatusDept_sal = getDataForDashBoardBydeptWithStatus("sal" , getUser()->DeptCode , $rs->wdf_status);
	
											$output .= '
											<a href="javascript:void(0)" class="list-group-item d-flex justify-content-between list-group-item-action select-sal"
												data_status="'.conStatusTextToNum($rs->wdf_status , "sal").'"
											>
												'.$rs->wdf_status.'
												<span class="badge badge-sal badge-pill">'.$countByStatusDept_sal->num_rows().'</span>
											</a>
											';
										}
									}else{
										$output .='ไม่พบข้อมูล';
									}

									echo $output;
								?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-box pd-20 mb-30" style="min-height:400px;">
							<h4 style="text-align:center;color:#03ad03;">ใบขอเบิกจ่าย (PO)</h4><br>
							
							<div class="list-group home-ul-po">
								<?php
									$output = '';

									if($resultData_groupByStatus_po != false){
										foreach($resultData_groupByStatus_po->result() as $rs){

											$countByStatusDept_po = getDataForDashBoardBydeptWithStatus("po" , getUser()->DeptCode , $rs->wdf_status);
	
											$output .= '
											<a href="javascript:void(0)" class="list-group-item d-flex justify-content-between list-group-item-action select-po"
												data_status="'.conStatusTextToNum($rs->wdf_status , "po").'"
											>
												'.$rs->wdf_status.'
												<span class="badge badge-po badge-pill">'.$countByStatusDept_po->num_rows().'</span>
											</a>
											';
										}
									}else{
										$output .='ไม่พบข้อมูล';
									}

									echo $output;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</body>
</html>

<script>
	$(document).ready(function(){

		$(document).on('click ' , '.select-adv' , function(){
			localStorage.removeItem("DataTables_normal_list_/intsys/wdf2/normal.html");
			const data_status = $(this).attr('data_status');
			let url = "<?php echo base_url('advance.html'); ?>";

			let filterObject = {
				"startDate_filter":'',
				"endDate_filter":'',
				"company_filter":'',
				"user_filter":'',
				"dept_filter":'',
				"status_filter":data_status
			};

			sessionStorage.setItem('filterObject' , JSON.stringify(filterObject));
			location.href = url;
		});

		$(document).on('click ' , '.select-wdf' , function(){
			localStorage.removeItem("DataTables_normal_list_/intsys/wdf2/normal.html");
			const data_status = $(this).attr('data_status');
			let url = "<?php echo base_url('normal.html'); ?>";

			let filterObject = {
				"startDate_filter":'',
				"endDate_filter":'',
				"company_filter":'',
				"user_filter":'',
				"dept_filter":'',
				"status_filter":data_status
			};

			sessionStorage.setItem('filterObject_nor' , JSON.stringify(filterObject));
			location.href = url;
		});

		$(document).on('click ' , '.select-sal' , function(){
			localStorage.removeItem("DataTables_normal_list_/intsys/wdf2/normal.html");
			const data_status = $(this).attr('data_status');
			let url = "<?php echo base_url('salary.html'); ?>";

			let filterObject = {
				"startDate_filter":'',
				"endDate_filter":'',
				"company_filter":'',
				"user_filter":'',
				"dept_filter":'',
				"status_filter":data_status
			};

			sessionStorage.setItem('filterObject_sal' , JSON.stringify(filterObject));
			location.href = url;
		});


		$(document).on('click ' , '.select-po' , function(){
			
			localStorage.removeItem("DataTables_normal_list_/intsys/wdf2/normal.html");
			const data_status = $(this).attr('data_status');
			let url = "<?php echo base_url('po.html'); ?>";

			let filterObject = {
				"startDate_filter":'',
				"endDate_filter":'',
				"company_filter":'',
				"user_filter":'',
				"dept_filter":'',
				"status_filter":data_status
			};

			sessionStorage.setItem('filterObject_po' , JSON.stringify(filterObject));
			location.href = url;
		});



	});
</script>
