<section id="checkbudger_section_sal">
    <form id="frm-sal-saveManager" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้จัดการอนุมัติ</h4>
            </div>
        </div>

        <div class="salHr mt-3"></div>

        <div class="row mt-3">
            <div id="mainG-1-sal"></div>
        </div>

        <div class="row mt-3">
            <div id="mainG-1-detail-sal"></div>
        </div>

        <div class="salHr lineMgrApp_sal" style="display:none;"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-mgrsec-appro-yes" name="ip-sal-mgrsec-appro" value="อนุมัติ" class="custom-control-input" required> 
                                        <label for="ip-sal-mgrsec-appro-yes" class="custom-control-label">อนุมัติ</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-mgrsec-appro-no" name="ip-sal-mgrsec-appro" value="ไม่อนุมัติ" class="custom-control-input" required> 
                                        <label for="ip-sal-mgrsec-appro-no" class="custom-control-label">ไม่อนุมัติ</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-sal-mgrsec-memo" id="ip-sal-mgrsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้อนุมัติ</b></label>
                        <input type="text" name="ip-sal-mgrsec-userpost" id="ip-sal-mgrsec-userpost" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-sal-mgrsec-deptpost" id="ip-sal-mgrsec-deptpost" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-sal-mgrsec-datepost" id="ip-sal-mgrsec-datepost" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-sal-saveManager" name="btn-sal-saveManager" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-mg-paygroupid-sal" id="check-mg-paygroupid-sal">
        <input hidden type="text" name="check-mg-group-sal" id="check-mg-group-sal">
        <input hidden type="text" name="check-mg-formcode-sal" id="check-mg-formcode-sal">
        <input hidden type="text" name="check-mg-areaid-sal" id="check-mg-areaid-sal">
        <input hidden type="text" name="check-mg-totalLength-sal" id="check-mg-totalLength-sal">
        <input hidden type="text" name="check-mg-clickLength-sal" id="check-mg-clickLength-sal">
        <input hidden type="text" name="check-mg-groupareaid-sal" id="check-mg-groupareaid-sal">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){
        $('#frm-sal-saveManager').on('submit' , function(e){
            e.preventDefault();

            if($('#check-mg-group-sal').val() != 5){
                // Check pay group length
                let clickLength = parseFloat($('#check-mg-clickLength-sal').val());
                let totalLength = parseFloat($('#check-mg-totalLength-sal').val());

                if($('input:radio[name="ip-sal-mgrsec-appro"]:checked').val() == "อนุมัติ"){
                    if(clickLength != totalLength){
                        swal({
                            title: 'กรุณาเลือกผู้อนุมัติให้ครบตามจำนวน ('+totalLength+')',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else if($('input:radio[name="ip-sal-mgrsec-appro"]:checked').length == 0){
                        swal({
                            title: 'กรุณาเลือกการอนุมัติ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        // Code Save data to db
                        saveManager_sal();
                    }
                }else if($('input:radio[name="ip-sal-mgrsec-appro"]:checked').val() == "ไม่อนุมัติ"){
                        // Code Save data to db
                        if($('#ip-sal-mgrsec-memo').val() == ""){
                            swal({
                                title: 'กรุณาระบุเหตุผล',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }else{
                            saveManager_sal();
                        }
                }



            }else{
                if($('input:radio[name="ip-sal-mgrsec-appro"]:checked').val() == "อนุมัติ"){
                    saveManager_sal();
                }else if($('input:radio[name="ip-sal-mgrsec-appro"]:checked').val() == "ไม่อนุมัติ"){
                    if($('#ip-sal-mgrsec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผล',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveManager_sal();
                    }
                }
            }
        });

        function saveManager_sal()
        {
            $('#btn-sal-saveManager').prop('disabled' , true);
            const form = $('#frm-sal-saveManager')[0];
            const data = new FormData(form);
            axios.post(url+'main/salary/saveManager_sal' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'salary.html';
                    });
                    
                }
            });
        }


    });

</script>