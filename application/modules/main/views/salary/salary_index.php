<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก ใบขอเบิกจ่ายเงินเดือน (Salary)</title>

		<!-- Date picker -->
		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/default/zebra_datepicker.min.css" type="text/css" />
</head>
<body>
    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">

				<div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>ใบขอเบิกจ่ายเงินเดือน ( Salary )</h4>
					</div>
				</div>
				<hr class="salHr">

				<div class="row">
					<div class="col-md-4 form-group">
						<button type="button" id="btn-addnewsal" name="btn-addnewsal" class="btn btn-primary btn-block"><i class="dw dw-add-file1  mr-2"></i>เพิ่มรายการใหม่</button>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4 form-group">
								<input type="text" name="startDate-sal" id="startDate-sal" class="form-control">
							</div>
							<div class="col-md-4 form-group">
								<input type="text" name="endDate-sal" id="endDate-sal" class="form-control">
							</div>
							<div class="col-md-2 form-group">
								<button type="button" id="btn-dateSearch-sal" name="btn-dateSearch-sal" class="btn btn-success btn-block"><i class="dw dw-loupe"></i>&nbsp;ค้นหา</button>
							</div>
							<div class="col-md-2 form-group">
								<button type="button" id="btn-dateClear-sal" name="btn-dateClear-sal" class="btn btn-warning btn-block"><i class="dw dw-refresh1"></i>&nbsp;ล้าง</button>
							</div>
						</div>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-3 form-group">
						<select name="filterCompany-detail-sal" id="filterCompany-detail-sal" class="form-control">
							<option value="">กรองด้วยชื่อบริษัท</option>
							<option value="sc">Salee Colour Public Company Limited.</option>
							<option value="pa">Poly Meritasia Co.,Ltd.</option>
							<option value="ca">Composite Asia Co.,Ltd.</option>
							<option value="st">Subterra Co.,Ltd.</option>
							<option value="tb">The bubbles Co.,Ltd.</option>
						</select>
					</div>
					<div class="col-md-3 form-group">
						<input type="text" name="filterUser-detail-sal" id="filterUser-detail-sal" class="form-control" placeholder="กรองชื่อผู้ร้องขอ">
					</div>
					<div class="col-md-3 form-group">
						<div id="filterDept-sal"></div>
					</div>
					<div class="col-md-3 form-group">
						<div id="filterStatus-sal"></div>
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
		$('#btn-addnewsal').click(function(){
			location.href = url+'new-document-salary.html';
		});

		// load_sal_list();
		loadDataForFilter_sal();


		function load_sal_list()
		{
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
                            "serverSide": true,
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
                                "url":"<?php echo base_url('main/salary/salary_list') ?>",
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

            $('#salary_list6').prop('readonly' , true).css({
                'background-color':'#F5F5F5',
                'cursor':'no-drop'
            });
		}

		function load_sal_list_filter()
		{
			let startDate_filter = $('#startDate-sal').val();
			let endDate_filter = $('#endDate-sal').val();
			let company_filter = $('#filterCompany-detail-sal').val();
			let user_filter = $('#filterUser-detail-sal').val();
			let dept_filter = $('#filterDept-detail-sal').val();
			let status_filter = $('#filterStatus-detail-sal').val();


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
                            scrollX: true,
                            processing: true,
                            serverSide: true,
                            stateSave: true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#salary_list thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            ajax: {
                                url:"<?php echo base_url('main/salary/get_wdfdatalist_json/') ?>",
								type:'POST',
								data:function(d){
									d.startDate_filter = startDate_filter,
									d.endDate_filter = endDate_filter,
									d.company_filter = company_filter,
									d.user_filter = user_filter,
									d.dept_filter = dept_filter,
									d.status_filter = status_filter
								}
                            },
							columns: [
								{ 
									data: 'wdf_formno' ,
									render:function(data , type , row , meta){
										let html = `
										<a href="javascript:void(0)" class="select_form_sal"
											data_formcode="${row.wdf_formcode}"
											data_formno="${row.wdf_formno}"
										><b>${data}</b></a>
										`;
										return html;
									}
								},
								{ data: 'wdf_areaid' },
								{ data: 'wdf_user' },
								{ data: 'wdf_ecode' },
								{ data: 'wdf_dept' },
								{ data: 'wdf_datetime' },
								{ data: 'wdf_pricewithvat' },
								{ data: 'wdf_currency' },
								{ data: 'wdf_ap_memo' },
								{ data: 'wdf_status' }
							],
							order: [
                                [0, 'desc']
                            ],
							columnDefs: [{
                                    targets: "_all",
                                    orderable: false
                                },
								{targets: [0 , 1 , 2 ],width: "100px",},
								{targets: [3 ,4 , 5, 7 ],width: "50px",},
								{targets: [8 , 9],width: "150px",},
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

            $('#salary_list6 , #salary_list2').prop('readonly' , true).css({
                'background-color':'#F5F5F5',
                'cursor':'no-drop'
            });
		}

		$(document).on('click' , '#btn-dateSearch-sal' , function(){

			let startDate_filter = $('#startDate-sal').val();
			let endDate_filter = $('#endDate-sal').val();
			let company_filter = $('#filterCompany-detail-sal').val();
			let user_filter = $('#filterUser-detail-sal').val();
			let dept_filter = $('#filterDept-detail-sal').val();
			let status_filter = $('#filterStatus-detail-sal').val();

			let filterObject_sal = {
				"startDate_filter":startDate_filter,
				"endDate_filter":endDate_filter,
				"company_filter":company_filter,
				"user_filter":user_filter,
				"dept_filter":dept_filter,
				"status_filter":status_filter
			};

			//create session storage
			sessionStorage.setItem('filterObject_sal' , JSON.stringify(filterObject_sal));

			let table = $('#salary_list').DataTable();
			table.state.clear();

			load_sal_list_filter();
		});

		$(document).on('click' , '.select_form_sal' , function(){
			const data_formcode = $(this).attr('data_formcode');
			const data_formno = $(this).attr('data_formno');
			location.href = url+'salary_view.html/'+data_formcode+'/'+data_formno;
		});


		function loadDataForFilter_sal()
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
					<select id="filterUser-detail-sal" name="filterUser-detail-sal" class="form-control">
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
					$('#filterUser-sal').html(userHtml);
					// create data filterBy user


					// create data filterBy Dept
					let deptHtml = `
					<select id="filterDept-detail-sal" name="filterDept-detail-sal" class="form-control">
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
					$('#filterDept-sal').html(deptHtml);
					// create data filterBy Dept


					// create data filterBy status
					let statusHtml = `
					<select id="filterStatus-detail-sal" name="filterStatus-detail-sal" class="form-control">
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
					$('#filterStatus-sal').html(statusHtml);
					// create data filterBy status

					loadFilterOnSessionStorage_sal();
				}
			});
		}


		function loadFilterOnSessionStorage_sal()
		{
			let getfilterObject = sessionStorage.getItem("filterObject_sal");
			console.log(JSON.parse(getfilterObject));

			if(getfilterObject != null){
				let startDate_filter = JSON.parse(getfilterObject).startDate_filter;
				let endDate_filter = JSON.parse(getfilterObject).endDate_filter;
				let company_filter = JSON.parse(getfilterObject).company_filter;
				let user_filter = JSON.parse(getfilterObject).user_filter;
				let dept_filter = JSON.parse(getfilterObject).dept_filter;
				let status_filter = JSON.parse(getfilterObject).status_filter;

				$('#startDate-sal').val(startDate_filter);
				$('#endDate-sal').val(endDate_filter);
				$('#filterCompany-detail-sal').val(company_filter);
				$('#filterUser-detail-sal').val(user_filter);
				$('#filterDept-detail-sal').val(dept_filter);
				$('#filterStatus-detail-sal').val(status_filter);
			}

			load_sal_list_filter();
		}

		$('#btn-dateClear-sal').click(function(){
			sessionStorage.removeItem("filterObject_sal");
			let table = $('#salary_list').DataTable();
			table.state.clear();
			location.reload();
		});



	});
</script>
