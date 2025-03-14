<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มรายการทางบัญชี</title>
</head>
<body>


    <!-- Modal Zone -->
        <!-- Add Ac Code -->
        <div class="modal fade bs-example-modal-lg" id="add_accodeM_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveAccodeMaster" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="spointTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveAccodeMaster" name="btn-saveAccodeMaster"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger" id="btn-closeSetpoint"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-6 form-group">
                                <label for=""><b>ชื่อรายการ<span class="textRequest"> * </span></b></label>
                                <input type="text" name="accountcodename" id="accountcodename" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>Account Code</b></label>
                                <input type="text" name="accountcode" id="accountcode" class="form-control" required>
                            </div>
                        </div>

                        <!-- Edit Zone -->
                        <input hidden type="text" name="acmas_autoid" id="acmas_autoid">
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
                            <h4>รายการทางบัญชี</h4>
                        </div>

                        <div class="col-md-12 form-group mt-3">
                            <button type="button" id="btn_add_accodeM" name="btn_add_accodeM" class="btn btn-primary">เพิ่มรายการ</button>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div id="loadsettingM" class="table-responsive">
                                <table id="accodeM_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="accodeM_th1">ชื่อรายการ</th>
                                            <th class="accodeM_th2">Account code</th>
                                            <th class="accodeM_th3">ผู้ดำเนินการ</th>
                                            <th class="accodeM_th4">วันที่</th>
                                            <th class="accodeM_th5">#</th>
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


</body>
</html>

<script>
    $(document).ready(function(){



    load_accodeM_list();

    function load_accodeM_list()
    {
        let thid = 1;
        $('#accodeM_data thead th').each(function() {
            var title = $(this).text();
            $(this).html(title + ' <input type="text" id="accodeM_data_'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
            thid++;
        });
        $('#accodeM_data').DataTable().destroy();
                var table = $('#accodeM_data').DataTable({
                            "scrollX": true,
                            "processing": true,
                            "serverSide": true,
                            "stateSave": true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#accodeM_data thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            "ajax": {
                                "url":"<?php echo base_url('main/load_accodeM_list') ?>",
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

    $('#btn_add_accodeM').click(function(){
        $('#add_accodeM_modal').modal('show');
        clear_addAccCodeMasterModal();
    });
    function clear_addAccCodeMasterModal()
    {
        $('#frm_saveAccodeMaster').removeClass('was-validated');
        $('#accountcodename').val('');
        $('#accountcode').val('');
        $('#acmas_autoid').val('');

        let btnhtml = `<i class="fi-save mr-2"></i>บันทึก`;
        $('#btn-saveAccodeMaster').html(btnhtml).removeClass('btn-warning').addClass('btn-success');
    }



    $('#frm_saveAccodeMaster').on('submit' , function(e){
        e.preventDefault();
        
        if($('#btn-saveAccodeMaster').text() == "บันทึก"){
            saveAcCodeMasterToDb();
        }else if($('#btn-saveAccodeMaster').text() == "บันทึกการแก้ไข"){
            saveEditAcCodeMToDb();
        }
    })

    function saveAcCodeMasterToDb()
    {
        $('#btn-saveAccodeMaster').prop('disabled' , true);
        if($('#accountcodename').val() != "" && $('#accountcode').val() != ""){
            const form = $('#frm_saveAccodeMaster')[0];
            const data = new FormData(form);

            axios.post(url+'main/saveAcCodeMasterToDb' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                    title: 'บันทึกข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#add_accodeM_modal').modal('hide');
                        // load_accode_list();
                        $('#accodeM_data').DataTable().ajax.reload();
                    });
                }else if(res.data.status == "Found Duplicate Data"){
                    swal({
                    title: 'พบข้อมูลซ้ำในระบบ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#btn-saveAccodeMaster').prop('disabled' , false);
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
                    $('#btn-saveAccodeMaster').prop('disabled' , false);
                });
        }
    }

    function saveEditAcCodeMToDb()
    {
        $('#btn-saveAccode').prop('disabled' , true);
        if($('#accountcodename').val() != "" && $('#accountcode').val() != ""){
            const form = $('#frm_saveAccodeMaster')[0];
            const data = new FormData(form);

            axios.post(url+'main/saveEditAcCodeMToDb' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Update Data Success"){
                    swal({
                    title: 'บันทึกการแก้ไขข้อมูลสำเร็จ',
                    type: 'success',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#add_accodeM_modal').modal('hide');
                        // load_accode_list();
                        $('#accodeM_data').DataTable().ajax.reload();
                    });
                }else if(res.data.status == "Found Duplicate Data"){
                    swal({
                    title: 'พบข้อมูลซ้ำในระบบ หรือ ข้อมูลไม่มีการเปลี่ยนแแปลง',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                    }).then(function(){
                        $('#btn-saveAccodeMaster').prop('disabled' , false);
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
                    $('#btn-saveAccodeMaster').prop('disabled' , false);
                });
        }
    }





    $(document).on('click' , '.delAccodeM' , function(){
        const data_acmas_autoid = $(this).attr('data_acmas_autoid');

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
                delAccodeM(data_acmas_autoid);
            }
        });

    });
    function delAccodeM(accode_id)
    {
        if(accode_id != ""){
            axios.post(url+'main/delAccodeM' , {
                action:"delAccodeM",
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
                        $('#accodeM_data').DataTable().ajax.reload();
                    });
                }
            });
        }
    }


    $(document).on('click' , '.editAccodeM' , function(){
        const data_acmas_autoid = $(this).attr('data_acmas_autoid');
        $('#btn-saveAccodeMaster').prop('disabled' , false);
        $('#add_accodeM_modal').modal('show');
        let btnhtml = `<i class="fi-save mr-2"></i>บันทึกการแก้ไข`;
        $('#btn-saveAccodeMaster').html(btnhtml).removeClass('btn-success').addClass('btn-warning');
        getaccodeMFromDb(data_acmas_autoid);
    });
    function getaccodeMFromDb(accode_id)
    {
        if(accode_id != ""){
            axios.post(url+'main/getaccodeMFromDb' , {
                action:"getaccodeMFromDb",
                accode_id:accode_id
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    $('#accountcodename').val(res.data.get_accode.acmas_masname);
                    $('#accountcode').val(res.data.get_accode.acmas_accode);

                    $('#acmas_autoid').val(accode_id);
                }
            });
        }
    }








    });
</script>