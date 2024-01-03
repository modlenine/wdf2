<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก ใบขอเบิกจ่าย (Normal)</title>

		<!-- Date picker -->
		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/default/zebra_datepicker.min.css" type="text/css" />
</head>
<body>
    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">

				<div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>ใบขอเบิกจ่าย ( Normal )</h4>
					</div>
				</div>
				<hr class="norHr">

				<div class="row">
					<div class="col-md-4">
						<button type="button" id="btn-addnewnor" name="btn-addnewnor" class="btn btn-primary"><i class="dw dw-add-file1  mr-2"></i>เพิ่มรายการใหม่</button>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4">
								<input type="text" name="startDate-nor" id="startDate-nor" class="form-control">
							</div>
							<div class="col-md-4">
								<input type="text" name="endDate-nor" id="endDate-nor" class="form-control">
							</div>
							<div class="col-md-2">
								<button type="button" id="btn-dateSearch-nor" name="btn-dateSearch-nor" class="btn btn-success btn-block"><i class="dw dw-loupe"></i>&nbsp;ค้นหา</button>
							</div>
							<div class="col-md-2">
								<button type="button" id="btn-dateClear-nor" name="btn-dateClear-nor" class="btn btn-warning btn-block"><i class="dw dw-refresh1"></i>&nbsp;ล้าง</button>
							</div>
						</div>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-3">
						<select name="filterCompany-detail-nor" id="filterCompany-detail-nor" class="form-control">
							<option value="">กรองด้วยชื่อบริษัท</option>
							<option value="sc">Salee Colour Public Company Limited.</option>
							<option value="pa">Poly Meritasia Co.,Ltd.</option>
							<option value="ca">Composite Asia Co.,Ltd.</option>
							<option value="st">Subterra Co.,Ltd.</option>
							<option value="tb">The bubbles Co.,Ltd.</option>
						</select>
					</div>
					<div class="col-md-3">
						<div id="filterUser-nor"></div>
					</div>
					<div class="col-md-3">
						<div id="filterDept-nor"></div>
					</div>
					<div class="col-md-3">
						<div id="filterStatus-nor"></div>
					</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-12 mt-2">
						<div id="" class="table-responsive">
							<table id="normal_list" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="advl-th1">เลขที่คำขอ</th>
										<th class="advl-th2">บริษัท</th>
										<th class="advl-th3">ผู้ร้องขอ</th>
										<th class="advl-th4">รหัสพนักงาน</th>
										<th class="advl-th5">แผนก</th>
										<th class="advl-th6">วันที่ร้องขอ</th>
										<th class="advl-th7">จำนวนเงิน</th>
										<th class="advl-th7">สกุลเงิน</th>
										<th class="advl-th9">หมายเหตุ</th>
										<th class="advl-th8">สถานะ</th>
									</tr>
								</thead>
							</table>
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
		$('#btn-addnewnor').click(function(){
			location.href = url+'new-document-normal.html';
		});

		// load_nor_list();
		loadDataForFilter_nor();


		function load_nor_list()
		{
			let thid = 1;
			$('#normal_list thead th').each(function() {
				var title = $(this).text();
				$(this).html(title + ' <input type="text" id="normal_list'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
				thid++;
			});
        	$('#normal_list').DataTable().destroy();
                var table = $('#normal_list').DataTable({
                            "scrollX": true,
                            "processing": true,
                            "serverSide": true,
                            "stateSave": true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#normal_list thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            "ajax": {
                                "url":"<?php echo base_url('main/normal/normal_list') ?>",
                            },
                            order: [
                                [0, 'desc']
                            ],
                            columnDefs: [{
                                    targets: "_all",
                                    orderable: false
                                },
                            ],
                    });

            table.columns().every(function() {
                var table = this;
                $('input', this.header()).on('keyup change', function() {
                    if (table.search() !== this.value) {
                        table.search(this.value).draw();
                    }
                });
            });

            $('#normal_list6').prop('readonly' , true).css({
                'background-color':'#F5F5F5',
                'cursor':'no-drop'
            });
		}


		function load_nor_list_filter()
		{
			let startDate_filter = $('#startDate-nor').val();
			let endDate_filter = $('#endDate-nor').val();
			let company_filter = $('#filterCompany-detail-nor').val();
			let user_filter = $('#filterUser-detail-nor').val();
			let dept_filter = $('#filterDept-detail-nor').val();
			let status_filter = $('#filterStatus-detail-nor').val();


			if(startDate_filter == ""){
				startDate_filter = "0";
			}

			if(endDate_filter == ""){
				endDate_filter = "0";
			}

			if(company_filter == ""){
				company_filter = "0";
			}

			if(user_filter == ""){
				user_filter = "0";
			}

			if(dept_filter == ""){
				dept_filter = "0";
			}

			if(status_filter == ""){
				status_filter = "0";
			}else{
				status_filter = status_filter.replace(/\s+/g,"-");
			}

			console.log(startDate_filter+"/"+endDate_filter+"/"+company_filter+"/"+user_filter+"/"+dept_filter+"/"+status_filter);



			let thid = 1;
			$('#normal_list thead th').each(function() {
				var title = $(this).text();
				$(this).html(title + ' <input type="text" id="normal_list'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
				thid++;
			});
        	$('#normal_list').DataTable().destroy();
                var table = $('#normal_list').DataTable({
                            "scrollX": true,
                            "processing": true,
                            "serverSide": true,
                            "stateSave": true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#normal_list thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            "ajax": {
                                "url":"<?php echo base_url('main/normal/normal_list_filter/') ?>"+startDate_filter+"/"+endDate_filter+"/"+company_filter+"/"+user_filter+"/"+dept_filter+"/"+status_filter,
                            },
                            order: [
                                [0, 'desc']
                            ],
                            columnDefs: [{
                                    targets: "_all",
                                    orderable: false
                                },
                            ],
                    });

            table.columns().every(function() {
                var table = this;
                $('input', this.header()).on('keyup change', function() {
                    if (table.search() !== this.value) {
                        table.search(this.value).draw();
                    }
                });
            });

            $('#normal_list6 , #normal_list2').prop('readonly' , true).css({
                'background-color':'#F5F5F5',
                'cursor':'no-drop'
            });
		}

		$(document).on('click' , '#btn-dateSearch-nor' , function(){

			let startDate_filter = $('#startDate-nor').val();
			let endDate_filter = $('#endDate-nor').val();
			let company_filter = $('#filterCompany-detail-nor').val();
			let user_filter = $('#filterUser-detail-nor').val();
			let dept_filter = $('#filterDept-detail-nor').val();
			let status_filter = $('#filterStatus-detail-nor').val();

			let filterObject_nor = {
				"startDate_filter":startDate_filter,
				"endDate_filter":endDate_filter,
				"company_filter":company_filter,
				"user_filter":user_filter,
				"dept_filter":dept_filter,
				"status_filter":status_filter
			};

			//create session storage
			sessionStorage.setItem('filterObject_nor' , JSON.stringify(filterObject_nor));

			let table = $('#normal_list').DataTable();
			table.state.clear();

			load_nor_list_filter();
		});


		$(document).on('click' , '.select_form_nor' , function(){
			const data_formcode = $(this).attr('data_formcode');
			const data_formno = $(this).attr('data_formno');
			location.href = url+'normal_view.html/'+data_formcode+'/'+data_formno;
		});


		function loadDataForFilter_nor()
		{
			axios.post(url+'main/normal/loadDataForFilter_nor' , {
				action:"loadDataForFilter_nor"
			}).then(res=>{
				console.log(res.data);
				if(res.data.status == "Select Data Success"){
					let userResult = res.data.filterUser;
					let statusResult = res.data.filterStatus;
					let deptResult = res.data.filterDept;

					// create data filterBy user
					let userHtml = `
					<select id="filterUser-detail-nor" name="filterUser-detail-nor" class="form-control">
						<option value="">กรองด้วยชื่อผู้ร้องขอ</option>
					`;
					for(let i = 0; i < userResult.length; i++){
						userHtml +=`
						<option value="`+userResult[i].wdf_ecode+`">`+userResult[i].wdf_user+`</option>
						`;
					}
					userHtml +=`
					</select>
					`;
					$('#filterUser-nor').html(userHtml);
					// create data filterBy user


					// create data filterBy Dept
					let deptHtml = `
					<select id="filterDept-detail-nor" name="filterDept-detail-nor" class="form-control">
						<option value="">กรองด้วยแผนก</option>
					`;
					for(let i = 0; i < deptResult.length; i++){
						deptHtml +=`
						<option value="`+deptResult[i].wdf_deptcode+`">`+deptResult[i].wdf_dept+`</option>
						`;
					}
					deptHtml +=`
					</select>
					`;
					$('#filterDept-nor').html(deptHtml);
					// create data filterBy Dept


					// create data filterBy status
					let statusHtml = `
					<select id="filterStatus-detail-nor" name="filterStatus-detail-nor" class="form-control">
						<option value="">กรองด้วยสถานะ</option>
					`;
					for(let i = 0; i < statusResult.length; i++){
						statusHtml +=`
						<option value="`+statusResult[i].st_autoid+`">`+statusResult[i].st_name+`</option>
						`;
					}
					statusHtml +=`
					</select>
					`;
					$('#filterStatus-nor').html(statusHtml);
					// create data filterBy status

					loadFilterOnSessionStorage_nor();
				}
			});
		}


		function loadFilterOnSessionStorage_nor()
		{
			let getfilterObject = sessionStorage.getItem("filterObject_nor");
			console.log(JSON.parse(getfilterObject));

			if(getfilterObject != null){
				let startDate_filter = JSON.parse(getfilterObject).startDate_filter;
				let endDate_filter = JSON.parse(getfilterObject).endDate_filter;
				let company_filter = JSON.parse(getfilterObject).company_filter;
				let user_filter = JSON.parse(getfilterObject).user_filter;
				let dept_filter = JSON.parse(getfilterObject).dept_filter;
				let status_filter = JSON.parse(getfilterObject).status_filter;

				$('#startDate-nor').val(startDate_filter);
				$('#endDate-nor').val(endDate_filter);
				$('#filterCompany-detail-nor').val(company_filter);
				$('#filterUser-detail-nor').val(user_filter);
				$('#filterDept-detail-nor').val(dept_filter);
				$('#filterStatus-detail-nor').val(status_filter);
			}

			load_nor_list_filter();
		}

		$('#btn-dateClear-nor').click(function(){
			sessionStorage.removeItem("filterObject_nor");
			let table = $('#normal_list').DataTable();
			table.state.clear();
			location.reload();
		});



	});
</script>
