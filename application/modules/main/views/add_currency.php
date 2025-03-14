<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มรายการสกุลเงิน</title>
</head>
<body>
    <div id="addCurrencypage_vue">

    <!-- Modal Zone -->
        <!-- Add Ac Code -->
        <div class="modal fade bs-example-modal-lg" id="add_currency_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveCurrency" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="currencyTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveCurrency" name="btn-saveCurrency"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger" id="btn-closeSetpoint"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-6 form-group">
                                <label for=""><b>ชื่อสกุลเงิน <span class="textRequest"> * </span></b></label>
                                <input type="text" name="cu_name" id="cu_name" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>สัญลักษณ์ สกุลเงิน</b></label>
                                <input type="text" name="cu_symbol" id="cu_symbol" class="form-control">
                            </div>
                        </div>

                        <input hidden type="text" name="cu_autoid" id="cu_autoid">

                    </div>
                
                </div>
                </form>
            </div>
        </div>
        <!-- Add Ac Code -->
    <!-- Modal Zone -->








    <div class="main-container">
		<div class="pd-ltr-20">

            <section id="add_accode_zone">
                <div class="card-box pd-20 height-100-p mb-30">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h4>รายการสกุลเงิน</h4>
                        </div>

                        <div class="col-md-12 form-group mt-3">
                            <button type="button" id="btn_add_currency" name="btn_add_currency" class="btn btn-primary">เพิ่มรายการ</button>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div id="loadsetting" class="table-responsive">
                                <table id="currency_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="accode_th1">ชื่อสกุลเงิน</th>
                                            <th class="accode_th1">สัญลักษณ์</th>
                                            <th class="accode_th2">ผู้เพิ่ม</th>
                                            <th class="accode_th3">รหัสพนักงาน</th>
                                            <th class="accode_th4">วันที่</th>
                                            <th class="accode_th5">#</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

		</div>
	</div>

    </div>
</body>
</html>

<script>
    $(document).ready(function(){



    load_currency_list();

    function load_currency_list()
    {
        let thid = 1;
        $('#currency_data thead th').each(function() {
            var title = $(this).text();
            $(this).html(title + ' <input type="text" id="currency_data_'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
            thid++;
        });
        $('#currency_data').DataTable().destroy();
                var table = $('#currency_data').DataTable({
                            "scrollX": true,
                            "processing": true,
                            "serverSide": true,
                            "stateSave": true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#currency_data thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            "ajax": {
                                "url":"<?php echo base_url('main/load_currency_list') ?>",
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

            // $('#accode_data_8').prop('readonly' , true).css({
            //     'background-color':'#F5F5F5',
            //     'cursor':'no-drop'
            // });
    }

    $('#btn_add_currency').click(function(){
        $('#add_currency_modal').modal('show');
        clear_addCurrencyModal();
    });
    function clear_addCurrencyModal()
    {
        $('#frm_saveCurrency').removeClass('was-validated');
        $('#cu_name').val('');
        $('#cu_symbol').val('');
        $('#cu_autoid').val('');
        // $('#search_aclist').val('');
        // $('#show_acmasterlist').html('');
        // $('#create_aclistname').val('');

        let btnhtml = `<i class="fi-save mr-2"></i>บันทึก`;
        $('#btn-saveCurrency').html(btnhtml).removeClass('btn-warning').addClass('btn-success');
    }


    // $(document).on('keyup' , '#search_aclist' , function(){
    //     let accodesearch = $(this).val();
    //     if(accodesearch != ""){
    //         load_accode_master(accodesearch);
    //     }else{
    //         $('#show_acmasterlist').html('');
    //     }
    // });
    // function load_accode_master(accodesearch)
    // {
    //     axios.post(url+'main/load_accode_master' , {
    //         action:"load_accode_master",
    //         accodesearch:accodesearch
    //     }).then(res=>{
    //         console.log(res.data);
    //         let accodeData = res.data.accodeData;
    //         // Output to Client
    //         let outputHtml = `<ul class="list-group mt-2 accodeDataUl">`;
    //         for(let i = 0; i < accodeData.length; i++){
    //             outputHtml += `
    //             <li class="list-group-item list-group-item list-group-item-action accodeDataLi"
    //                 data_masname = "`+accodeData[i].acmas_masname+`"
    //                 data_mascode = "`+accodeData[i].acmas_accode+`"
    //             >
    //                 <span>`+accodeData[i].acmas_masname+` | `+accodeData[i].acmas_accode+`</span>
    //             </li>
    //             `;
    //         }
    //         outputHtml += `</ul>`;
    //         $('#show_acmasterlist').html(outputHtml);
    //     });
    // }

    // $(document).on('click' , '.accodeDataLi' ,function(){
    //     const data_masname = $(this).attr('data_masname');
    //     const data_mascode = $(this).attr('data_mascode');

    //     $('#setting_accodename').val(data_masname);
    //     $('#setting_accode').val(data_mascode);
    //     $('#search_aclist').val('');
    //     $('#show_acmasterlist').html('');
    // });


    $('#frm_saveCurrency').on('submit' , function(e){
        e.preventDefault();
        
        if($('#btn-saveCurrency').text() == "บันทึก"){
            saveCurrencyToDb();
        }else if($('#btn-saveCurrency').text() == "บันทึกการแก้ไข"){
            saveEditCurrencyToDb();
        }
    })

    function saveCurrencyToDb()
    {
        $('#btn-saveCurrency').prop('disabled' , true);
        if($('#cu_name').val() != ""){
            const form = $('#frm_saveCurrency')[0];
            const data = new FormData(form);

            axios.post(url+'main/saveCurrencyTb' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                    title: 'บันทึกข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#add_currency_modal').modal('hide');
                        $('#btn-saveCurrency').prop('disabled' , false);
                        // load_accode_list();
                        $('#currency_data').DataTable().ajax.reload();
                    });
                }else if(res.data.status == "Found Duplicate Data"){
                    swal({
                    title: 'พบข้อมูลซ้ำในระบบ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#btn-saveCurrency').prop('disabled' , false);
                    });
                }
            });


        }else{
            swal({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                type: 'error',
                showConfirmButton: false,
                timer:1000
                }).then(function(){
                    $('#btn-saveCurrency').prop('disabled' , false);
                });
        }
    }

    function saveEditCurrencyToDb()
    {
        $('#btn-saveCurrency').prop('disabled' , true);
        if($('#cu_name').val() != ""){
            const form = $('#frm_saveCurrency')[0];
            const data = new FormData(form);

            axios.post(url+'main/saveEditCurrencyToDb' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Update Data Success"){
                    swal({
                    title: 'บันทึกการแก้ไขข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#add_currency_modal').modal('hide');
                        $('#btn-saveCurrency').prop('disabled' , false);
                        // load_accode_list();
                        $('#currency_data').DataTable().ajax.reload();
                    });
                }else if(res.data.status == "Found Duplicate Data"){
                    swal({
                    title: 'พบข้อมูลซ้ำในระบบ หรือ ข้อมูลไม่มีการเปลี่ยนแแปลง',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#btn-saveCurrency').prop('disabled' , false);
                    });
                }
            });
        }else{
            swal({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                type: 'error',
                showConfirmButton: false,
                timer:1000
                }).then(function(){
                    $('#btn-saveCurrency').prop('disabled' , false);
                });
        }
    }





    $(document).on('click' , '.delCurrency' , function(){
        const data_currency_id = $(this).attr('data_currency_id');

        swal({
            title: 'ต้องการลบรายการนี้ ใช่หรือไม่',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText:'ยกเลิก'
        }).then((result)=> {
            if(result.value == true){
                delCurrency(data_currency_id);
            }
        });

    });
    function delCurrency(data_currency_id)
    {
        if(data_currency_id != ""){
            axios.post(url+'main/delCurrency' , {
                action:"delCurrency",
                data_currency_id:data_currency_id
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Delete Data Success"){
                    swal({
                    title: 'ลบข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        // load_accode_list();
                        $('#currency_data').DataTable().ajax.reload();
                    });
                }
            });
        }
    }


    $(document).on('click' , '.editCurrency' , function(){
        const data_currency_id = $(this).attr('data_currency_id');
        $('#btn-saveCurrency').prop('disabled' , false);
        $('#add_currency_modal').modal('show');
        let btnhtml = `<i class="fi-save mr-2"></i>บันทึกการแก้ไข`;
        $('#btn-saveCurrency').html(btnhtml).removeClass('btn-success').addClass('btn-warning');
        getCurrencyFromDb(data_currency_id);
    });
    function getCurrencyFromDb(data_currency_id)
    {
        if(data_currency_id != ""){
            axios.post(url+'main/getCurrencyFromDb' , {
                action:"getCurrencyFromDb",
                data_currency_id:data_currency_id
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.get_currency;
                    $('#cu_name').val(result.cu_name);
                    $('#cu_symbol').val(result.cu_symbol);
                    $('#cu_autoid').val(data_currency_id);
                }
            });
        }
    }








    });
</script>