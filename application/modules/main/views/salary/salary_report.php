<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้ารายงาน ใบขอเบิกจ่ายเงินเดือน (Salary)</title>

		<!-- Date picker -->
		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/default/zebra_datepicker.min.css" type="text/css" />
</head>
<body>
    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">

				<div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>รายงาน ใบขอเบิกจ่ายเงินเดือน ( Salary )</h4>
					</div>
				</div>
				<hr class="salHr">

				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<input type="text" name="startDate-rp-sal" id="startDate-rp-sal" class="form-control">
							</div>
							<div class="col-md-4">
								<input type="text" name="endDate-rp-sal" id="endDate-rp-sal" class="form-control">
							</div>
							<div class="col-md-2">
								<button type="button" id="btn-dateSearch-rp-sal" name="btn-dateSearch-rp-sal" class="btn btn-success btn-block"><i class="dw dw-loupe"></i>&nbsp;ค้นหา</button>
							</div>
							<div class="col-md-2">
								<button type="button" id="btn-dateClear-rp-sal" name="btn-dateClear-rp-sal" class="btn btn-warning btn-block"><i class="dw dw-refresh1"></i>&nbsp;ล้าง</button>
							</div>
						</div>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-3">
						<select name="filterCompany-detail-rp-sal" id="filterCompany-detail-rp-sal" class="form-control">
							<option value="">กรองด้วยชื่อบริษัท</option>
							<option value="sc">Salee Colour Public Company Limited.</option>
							<option value="pa">Poly Meritasia Co.,Ltd.</option>
							<option value="ca">Composite Asia Co.,Ltd.</option>
							<option value="st">Subterra Co.,Ltd.</option>
							<option value="tb">The bubbles Co.,Ltd.</option>
						</select>
					</div>
					<div class="col-md-3">
						<div id="filterUser-rp-sal"></div>
					</div>
					<div class="col-md-3">
						<div id="filterDept-rp-sal"></div>
					</div>
					<div class="col-md-3">
						<div id="filterStatus-rp-sal"></div>
					</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-12 mt-2">
						<div id="" class="table-responsive">
							<table id="salary_list" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="advl-th1">เลขที่คำขอ</th>
										<th class="advl-th2">บริษัท</th>
										<th class="advl-th3">ผู้ร้องขอ</th>
										<th class="advl-th4">รหัสพนักงาน</th>
										<th class="advl-th5">แผนก</th>
										<th class="advl-th6">วันที่ร้องขอ</th>
										<th class="advl-th7">จำนวนเงิน</th>
										<th class="advl-th7">สกุลงิน</th>
										<th class="advl-th7">หมายเหตุ</th>
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

		// load_sal_list();
		loadDataForFilter_rp_sal();


		function load_sal_reportlist_filter()
		{
			let startDate_filter = $('#startDate-rp-sal').val();
			let endDate_filter = $('#endDate-rp-sal').val();
			let company_filter = $('#filterCompany-detail-rp-sal').val();
			let user_filter = $('#filterUser-detail-rp-sal').val();
			let dept_filter = $('#filterDept-detail-rp-sal').val();
			let status_filter = $('#filterStatus-detail-rp-sal').val();


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
			$('#salary_list thead th').each(function() {
				var title = $(this).text();
				$(this).html(title + ' <input type="text" id="salary_list'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
				thid++;
			});
        	$('#salary_list').DataTable().destroy();
                var table = $('#salary_list').DataTable({
                            "scrollX": true,
                            "processing": true,
                            "serverSide": false,
                            "stateSave": true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#salary_list thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            "ajax": {
                                "url":"<?php echo base_url('main/salary/salary_reportlist_filter/') ?>"+startDate_filter+"/"+endDate_filter+"/"+company_filter+"/"+user_filter+"/"+dept_filter+"/"+status_filter,
                            },
							dom: 'Bfrtip',
								"buttons": [{
									extend: 'copyHtml5',
									title: 'ใบขอเบิกจ่ายเงินเดือน Salary'
								},
								{
									extend: 'excelHtml5',
									autoFilter: true,
									title: 'ใบขอเบิกจ่ายเงินเดือน Salary'
								}
								],
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

            $('#salary_list6').prop('readonly' , true).css({
                'background-color':'#F5F5F5',
                'cursor':'no-drop'
            });
		}

		$(document).on('click' , '#btn-dateSearch-rp-sal' , function(){

			let startDate_filter = $('#startDate-rp-sal').val();
			let endDate_filter = $('#endDate-rp-sal').val();
			let company_filter = $('#filterCompany-detail-rp-sal').val();
			let user_filter = $('#filterUser-detail-rp-sal').val();
			let dept_filter = $('#filterDept-detail-rp-sal').val();
			let status_filter = $('#filterStatus-detail-rp-sal').val();

			let filterObject_sal = {
				"startDate_filter":startDate_filter,
				"endDate_filter":endDate_filter,
				"company_filter":company_filter,
				"user_filter":user_filter,
				"dept_filter":dept_filter,
				"status_filter":status_filter
			};

			//create session storage
			sessionStorage.setItem('filterObject_rp_sal' , JSON.stringify(filterObject_sal));

			load_sal_reportlist_filter();
		});


		function loadDataForFilter_rp_sal()
		{
			axios.post(url+'main/salary/loadDataForFilter_sal' , {
				action:"loadDataForFilter_sal"
			}).then(res=>{
				console.log(res.data);
				if(res.data.status == "Select Data Success"){
					let userResult = res.data.filterUser;
					let statusResult = res.data.filterStatus;
					let deptResult = res.data.filterDept;

					// create data filterBy user
					let userHtml = `
					<select id="filterUser-detail-rp-sal" name="filterUser-detail-rp-sal" class="form-control">
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
					$('#filterUser-rp-sal').html(userHtml);
					// create data filterBy user


					// create data filterBy Dept
					let deptHtml = `
					<select id="filterDept-detail-rp-sal" name="filterDept-detail-rp-sal" class="form-control">
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
					$('#filterDept-rp-sal').html(deptHtml);
					// create data filterBy Dept


					// create data filterBy status
					let statusHtml = `
					<select id="filterStatus-detail-rp-sal" name="filterStatus-detail-rp-sal" class="form-control">
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
					$('#filterStatus-rp-sal').html(statusHtml);
					// create data filterBy status

					loadFilterOnSessionStorage_rp_sal();
				}
			});
		}


		function loadFilterOnSessionStorage_rp_sal()
		{
			let getfilterObject = sessionStorage.getItem("filterObject_rp_sal");
			console.log(JSON.parse(getfilterObject));

			if(getfilterObject != null){
				let startDate_filter = JSON.parse(getfilterObject).startDate_filter;
				let endDate_filter = JSON.parse(getfilterObject).endDate_filter;
				let company_filter = JSON.parse(getfilterObject).company_filter;
				let user_filter = JSON.parse(getfilterObject).user_filter;
				let dept_filter = JSON.parse(getfilterObject).dept_filter;
				let status_filter = JSON.parse(getfilterObject).status_filter;

				$('#startDate-rp-sal').val(startDate_filter);
				$('#endDate-rp-sal').val(endDate_filter);
				$('#filterCompany-detail-rp-sal').val(company_filter);
				$('#filterUser-detail-rp-sal').val(user_filter);
				$('#filterDept-detail-rp-sal').val(dept_filter);
				$('#filterStatus-detail-rp-sal').val(status_filter);
			}

			load_sal_reportlist_filter();
		}

		$('#btn-dateClear-rp-sal').click(function(){
			sessionStorage.removeItem("filterObject_rp_sal");
			location.reload();
		});



	});
</script>
