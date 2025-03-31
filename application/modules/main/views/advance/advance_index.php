<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก ใบเบิกเงินทดรองจ่าย (Advance)</title>

		<!-- Date picker -->
		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/default/zebra_datepicker.min.css" type="text/css" />
</head>
<body>
    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">

				<div class="row align-items-center">
					<div class="col-md-12 text-center">
						<h4>ใบเบิกเงินทดรองจ่าย ( Advance )</h4>
					</div>
				</div>
				<hr class="advHr">

				<div class="row">
					<div class="col-md-4 form-group">
						<button type="button" id="btn-addnewadv" name="btn-addnewadv" class="btn btn-primary btn-block"><i class="dw dw-add-file1  mr-2"></i>เพิ่มรายการใหม่</button>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4 form-group">
								<input type="text" name="startDate-adv" id="startDate-adv" class="form-control">
							</div>
							<div class="col-md-4 form-group">
								<input type="text" name="endDate-adv" id="endDate-adv" class="form-control">
							</div>
							<div class="col-md-2 form-group">
								<button type="button" id="btn-dateSearch-adv" name="btn-dateSearch-adv" class="btn btn-success btn-block"><i class="dw dw-loupe"></i>&nbsp;ค้นหา</button>
							</div>
							<div class="col-md-2 form-group">
								<button type="button" id="btn-dateClear-adv" name="btn-dateClear-adv" class="btn btn-warning btn-block"><i class="dw dw-refresh1"></i>&nbsp;ล้าง</button>
							</div>
						</div>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-3 form-group">
						<select name="filterCompany-detail-adv" id="filterCompany-detail-adv" class="form-control">
							<option value="">กรองด้วยชื่อบริษัท</option>
							<option value="sc">Salee Colour Public Company Limited.</option>
							<option value="pa">Poly Meritasia Co.,Ltd.</option>
							<option value="ca">Composite Asia Co.,Ltd.</option>
							<option value="st">Subterra Co.,Ltd.</option>
							<option value="tb">The bubbles Co.,Ltd.</option>
						</select>
					</div>
					<div class="col-md-3 form-group">
						<input type="text" name="filterUser-detail-adv" id="filterUser-detail-adv" class="form-control" placeholder="กรองชื่อผู้ร้องขอ">
					</div>
					<div class="col-md-3 form-group">
						<div id="filterDept-adv"></div>
					</div>
					<div class="col-md-3 form-group">
						<div id="filterStatus-adv"></div>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12 mt-2">
						<div id="" class="table-responsive">
							<table id="advance_list" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="">เลขที่คำขอ</th>
										<th class="">บริษัท</th>
										<th class="">ผู้ร้องขอ</th>
										<th class="">รหัสพนักงาน</th>
										<th class="">แผนก</th>
										<th class="">วันที่ร้องขอ</th>
										<th class="">จำนวนเงิน</th>
										<th class="">สกุลเงิน</th>
										<th class="">หมายเหตุ</th>
										<th class="">สถานะ</th>
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
		$('#btn-addnewadv').click(function(){
			location.href = url+'new-document-advance.html';
		});

		loadDataForFilter();

		function load_adv_list_filter()
		{
			let startDate_filter = $('#startDate-adv').val();
			let endDate_filter = $('#endDate-adv').val();
			let company_filter = $('#filterCompany-detail-adv').val();
			let user_filter = $('#filterUser-detail-adv').val();
			let dept_filter = $('#filterDept-detail-adv').val();
			let status_filter = $('#filterStatus-detail-adv').val();


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
			$('#advance_list thead th').each(function() {
				var title = $(this).text();
				$(this).html(title + ' <input type="text" id="advance_list'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
				thid++;
			});
        	$('#advance_list').DataTable().destroy();
                var table = $('#advance_list').DataTable({
                            scrollX: true,
                            processing: true,
                            serverSide: true,
                            stateSave: true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#advance_list thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            ajax: {
                                url:"<?php echo base_url('main/advance/get_wdfdatalist_json/') ?>",
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
										<a href="javascript:void(0)" class="select_form"
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
								{ 
									data: 'wdf_status',
									render:function(data , type , row , meta){
										return conColorTextStatus(data);
									}
								}
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

            $('#advance_list6 , #advance_list2').prop('readonly' , true).css({
                'background-color':'#F5F5F5',
                'cursor':'no-drop'
            });
		}

		$(document).on('click' , '#btn-dateSearch-adv' , function(){

			let startDate_filter = $('#startDate-adv').val();
			let endDate_filter = $('#endDate-adv').val();
			let company_filter = $('#filterCompany-detail-adv').val();
			let user_filter = $('#filterUser-detail-adv').val();
			let dept_filter = $('#filterDept-detail-adv').val();
			let status_filter = $('#filterStatus-detail-adv').val();

			let filterObject = {
				"startDate_filter":startDate_filter,
				"endDate_filter":endDate_filter,
				"company_filter":company_filter,
				"user_filter":user_filter,
				"dept_filter":dept_filter,
				"status_filter":status_filter
			};

			//create session storage
			sessionStorage.setItem('filterObject' , JSON.stringify(filterObject));

			let table = $('#advance_list').DataTable();
			table.state.clear();

			load_adv_list_filter();
		});

		$(document).on('click' , '.select_form' , function(){
			const data_formcode = $(this).attr('data_formcode');
			const data_formno = $(this).attr('data_formno');
			location.href = url+'advance_view.html/'+data_formcode+'/'+data_formno;
		});

		function loadDataForFilter()
		{
			axios.post(url+'main/advance/loadDataForFilter' , {
				action:"loadDataForFilter"
			}).then(res=>{
				console.log(res.data);
				if(res.data.status == "Select Data Success"){
					let userResult = res.data.filterUser;
					let statusResult = res.data.filterStatus;
					let deptResult = res.data.filterDept;

					// create data filterBy user
					let userHtml = `
					<select id="filterUser-detail-adv" name="filterUser-detail-adv" class="form-control">
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
					$('#filterUser-adv').html(userHtml);
					// create data filterBy user


					// create data filterBy Dept
					let deptHtml = `
					<select id="filterDept-detail-adv" name="filterDept-detail-adv" class="form-control">
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
					$('#filterDept-adv').html(deptHtml);
					// create data filterBy Dept


					// create data filterBy status
					let statusHtml = `
					<select id="filterStatus-detail-adv" name="filterStatus-detail-adv" class="form-control">
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
					$('#filterStatus-adv').html(statusHtml);
					// create data filterBy status

					loadFilterOnSessionStorage();
				}
			});
		}

		function loadFilterOnSessionStorage()
		{
			let getfilterObject = sessionStorage.getItem("filterObject");
			console.log(JSON.parse(getfilterObject));

			if(getfilterObject != null){
				let startDate_filter = JSON.parse(getfilterObject).startDate_filter;
				let endDate_filter = JSON.parse(getfilterObject).endDate_filter;
				let company_filter = JSON.parse(getfilterObject).company_filter;
				let user_filter = JSON.parse(getfilterObject).user_filter;
				let dept_filter = JSON.parse(getfilterObject).dept_filter;
				let status_filter = JSON.parse(getfilterObject).status_filter;

				$('#startDate-adv').val(startDate_filter);
				$('#endDate-adv').val(endDate_filter);
				$('#filterCompany-detail-adv').val(company_filter);
				$('#filterUser-detail-adv').val(user_filter);
				$('#filterDept-detail-adv').val(dept_filter);
				$('#filterStatus-detail-adv').val(status_filter);
			}

			load_adv_list_filter();
		}

		$('#btn-dateClear-adv').click(function(){
			sessionStorage.removeItem("filterObject");
			let table = $('#advance_list').DataTable();
			table.state.clear();
			location.reload();
		});



	});
</script>
