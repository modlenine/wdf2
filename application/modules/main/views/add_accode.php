<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มรายการค่าใช้จ่ายสำหรับผู้ใช้ทั่วไป</title>
</head>
<body>
    <div id="addaccodepage_vue">

    <!-- Modal Zone -->
        <!-- Add Ac Code -->
        <div class="modal fade bs-example-modal-lg" id="add_accode_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveAccode" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="spointTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveAccode" name="btn-saveAccode"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger" id="btn-closeSetpoint"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-6 form-group">
                                <label for=""><b>ชื่อรายการ ( *เช่น: ค่าทำสวน , ตั๋วเครื่องบิน) <span class="textRequest"> * </span></b></label>
                                <input type="text" name="create_aclistname" id="create_aclistname" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>เลือกรายการทางบัญชี ( *พิมพ์ ชื่อ หรือ Account code)</b></label>
                                <input type="text" name="search_aclist" id="search_aclist" class="form-control">
                                <div id="show_acmasterlist"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>Account code (Name)</b></label>
                                <input type="text" name="setting_accodename" id="setting_accodename" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>Account code</b></label>
                                <input type="text" name="setting_accode" id="setting_accode" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- Edit Zone -->
                        <input hidden type="text" name="accode_id" id="accode_id">
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
                            <h4>รายการค่าใช้จ่าย</h4>
                        </div>

                        <div class="col-md-12 form-group mt-3">
                            <button type="button" id="btn_add_accode" name="btn_add_accode" class="btn btn-primary">เพิ่มรายการ</button>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div id="loadsetting" class="table-responsive">
                                <table id="accode_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="accode_th1">ชื่อรายการ</th>
                                            <th class="accode_th2">Account code (name)</th>
                                            <th class="accode_th3">Account code</th>
                                            <th class="accode_th4">รหัสแผนก</th>
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



    load_accode_list();

    function load_accode_list()
    {
        let thid = 1;
        $('#accode_data thead th').each(function() {
            var title = $(this).text();
            $(this).html(title + ' <input type="text" id="accode_data_'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
            thid++;
        });
        $('#accode_data').DataTable().destroy();
                var table = $('#accode_data').DataTable({
                            "scrollX": true,
                            "processing": true,
                            "serverSide": true,
                            "stateSave": true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#accode_data thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            "ajax": {
                                "url":"<?php echo base_url('main/load_accode_list') ?>",
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

    $('#btn_add_accode').click(function(){
        $('#add_accode_modal').modal('show');
        clear_addAccCodeModal();
    });
    function clear_addAccCodeModal()
    {
        $('#frm_saveAccode').removeClass('was-validated');
        $('#setting_accodename').val('');
        $('#setting_accode').val('');
        $('#search_aclist').val('');
        $('#show_acmasterlist').html('');
        $('#create_aclistname').val('');

        let btnhtml = `<i class="fi-save mr-2"></i>บันทึก`;
        $('#btn-saveAccode').html(btnhtml).removeClass('btn-warning').addClass('btn-success');
    }


    $(document).on('keyup' , '#search_aclist' , function(){
        let accodesearch = $(this).val();
        if(accodesearch != ""){
            load_accode_master(accodesearch);
        }else{
            $('#show_acmasterlist').html('');
        }
    });
    function load_accode_master(accodesearch)
    {
        axios.post(url+'main/load_accode_master' , {
            action:"load_accode_master",
            accodesearch:accodesearch
        }).then(res=>{
            console.log(res.data);
            let accodeData = res.data.accodeData;
            // Output to Client
            let outputHtml = `<ul class="list-group mt-2 accodeDataUl">`;
            for(let i = 0; i < accodeData.length; i++){
                outputHtml += `
                <li class="list-group-item list-group-item list-group-item-action accodeDataLi"
                    data_masname = "`+accodeData[i].acmas_masname+`"
                    data_mascode = "`+accodeData[i].acmas_accode+`"
                >
                    <span>`+accodeData[i].acmas_masname+` | `+accodeData[i].acmas_accode+`</span>
                </li>
                `;
            }
            outputHtml += `</ul>`;
            $('#show_acmasterlist').html(outputHtml);
        });
    }

    $(document).on('click' , '.accodeDataLi' ,function(){
        const data_masname = $(this).attr('data_masname');
        const data_mascode = $(this).attr('data_mascode');

        $('#setting_accodename').val(data_masname);
        $('#setting_accode').val(data_mascode);
        $('#search_aclist').val('');
        $('#show_acmasterlist').html('');
    });


    $('#frm_saveAccode').on('submit' , function(e){
        e.preventDefault();
        
        if($('#btn-saveAccode').text() == "บันทึก"){
            saveAcCodeToDb();
        }else if($('#btn-saveAccode').text() == "บันทึกการแก้ไข"){
            saveEditAcCodeToDb();
        }
    })

    function saveAcCodeToDb()
    {
        $('#btn-saveAccode').prop('disabled' , true);
        if($('#create_aclistname').val() != "" && $('#setting_accodename').val() != "" && $('#setting_accode').val() != ""){
            const form = $('#frm_saveAccode')[0];
            const data = new FormData(form);

            axios.post(url+'main/saveAcCodeTb' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                    title: 'บันทึกข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#add_accode_modal').modal('hide');
                        // load_accode_list();
                        $('#accode_data').DataTable().ajax.reload();
                    });
                }else if(res.data.status == "Found Duplicate Data"){
                    swal({
                    title: 'พบข้อมูลซ้ำในระบบ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#btn-saveAccode').prop('disabled' , false);
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
                    $('#btn-saveAccode').prop('disabled' , false);
                });
        }
    }

    function saveEditAcCodeToDb()
    {
        $('#btn-saveAccode').prop('disabled' , true);
        if($('#create_aclistname').val() != "" && $('#setting_accodename').val() != "" && $('#setting_accode').val() != ""){
            const form = $('#frm_saveAccode')[0];
            const data = new FormData(form);

            axios.post(url+'main/saveEditAcCodeToDb' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Update Data Success"){
                    swal({
                    title: 'บันทึกการแก้ไขข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#add_accode_modal').modal('hide');
                        // load_accode_list();
                        $('#accode_data').DataTable().ajax.reload();
                    });
                }else if(res.data.status == "Found Duplicate Data"){
                    swal({
                    title: 'พบข้อมูลซ้ำในระบบ หรือ ข้อมูลไม่มีการเปลี่ยนแแปลง',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#btn-saveAccode').prop('disabled' , false);
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
                    $('#btn-saveAccode').prop('disabled' , false);
                });
        }
    }





    $(document).on('click' , '.delAccode' , function(){
        const data_accode_id = $(this).attr('data_accode_id');

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
                delAccode(data_accode_id);
            }
        });

    });
    function delAccode(accode_id)
    {
        if(accode_id != ""){
            axios.post(url+'main/delAccode' , {
                action:"delAccode",
                accode_id:accode_id
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
                        $('#accode_data').DataTable().ajax.reload();
                    });
                }
            });
        }
    }


    $(document).on('click' , '.editAccode' , function(){
        const data_accode_id = $(this).attr('data_accode_id');
        $('#btn-saveAccode').prop('disabled' , false);
        $('#add_accode_modal').modal('show');
        let btnhtml = `<i class="fi-save mr-2"></i>บันทึกการแก้ไข`;
        $('#btn-saveAccode').html(btnhtml).removeClass('btn-success').addClass('btn-warning');
        getaccodeFromDb(data_accode_id);
    });
    function getaccodeFromDb(accode_id)
    {
        if(accode_id != ""){
            axios.post(url+'main/getaccodeFromDb' , {
                action:"getaccodeFromDb",
                accode_id:accode_id
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    $('#create_aclistname').val(res.data.get_accode.detailwdf_name);
                    $('#setting_accodename').val(res.data.get_accode.detailwdf_accodename);
                    $('#setting_accode').val(res.data.get_accode.detailwdf_accode);
                    $('#accode_id').val(accode_id);
                }
            });
        }
    }








    });
</script>