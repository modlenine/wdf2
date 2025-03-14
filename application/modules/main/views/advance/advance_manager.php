<section id="checkbudger_section">
    <form id="frm-saveManager" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้จัดการอนุมัติ</h4>
            </div>
        </div>

        <div class="advHr mt-3"></div>

        <div class="row mt-3">
            <div id="mainG-1"></div>
        </div>

        <div class="row mt-3">
            <div id="mainG-1-detail"></div>
        </div>

        <div class="advHr lineMgrApp" style="display:none;"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-mgrsec-appro-yes" name="ip-mgrsec-appro" value="อนุมัติ" class="custom-control-input" required> 
                                        <label for="ip-mgrsec-appro-yes" class="custom-control-label">อนุมัติ</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-mgrsec-appro-no" name="ip-mgrsec-appro" value="ไม่อนุมัติ" class="custom-control-input" required> 
                                        <label for="ip-mgrsec-appro-no" class="custom-control-label">ไม่อนุมัติ</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-mgrsec-memo" id="ip-mgrsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้อนุมัติ</b></label>
                        <input type="text" name="ip-mgrsec-userpost" id="ip-mgrsec-userpost" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-mgrsec-deptpost" id="ip-mgrsec-deptpost" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-mgrsec-datepost" id="ip-mgrsec-datepost" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-saveManager" name="btn-saveManager" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-mg-paygroupid" id="check-mg-paygroupid">
        <input hidden type="text" name="check-mg-group" id="check-mg-group">
        <input hidden type="text" name="check-mg-formcode" id="check-mg-formcode">
        <input hidden type="text" name="check-mg-areaid" id="check-mg-areaid">
        <input hidden type="text" name="check-mg-totalLength" id="check-mg-totalLength">
        <input hidden type="text" name="check-mg-clickLength" id="check-mg-clickLength">
        <input hidden type="text" name="check-mg-groupareaid" id="check-mg-groupareaid">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){
        $('#frm-saveManager').on('submit' , function(e){
            e.preventDefault();

            if($('#check-mg-group').val() != 5){
                // Check pay group length
                let clickLength = parseFloat($('#check-mg-clickLength').val());
                let totalLength = parseFloat($('#check-mg-totalLength').val());

                if($('input:radio[name="ip-mgrsec-appro"]:checked').val() == "อนุมัติ"){
                    if(clickLength != totalLength){
                        swal({
                            title: 'กรุณาเลือกผู้อนุมัติให้ครบตามจำนวน ('+totalLength+')',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else if($('input:radio[name="ip-mgrsec-appro"]:checked').length == 0){
                        swal({
                            title: 'กรุณาเลือกการอนุมัติ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        // Code Save data to db
                        saveManager();
                    }
                }else if($('input:radio[name="ip-mgrsec-appro"]:checked').val() == "ไม่อนุมัติ"){
                    // Code Save data to db
                    if($('#ip-mgrsec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผล',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveManager();
                    }
                }



            }else{
                if($('input:radio[name="ip-mgrsec-appro"]:checked').val() == "อนุมัติ"){
                    saveManager();
                }else if($('input:radio[name="ip-mgrsec-appro"]:checked').val() == "ไม่อนุมัติ"){
                    if($('#ip-mgrsec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผล',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveManager();
                    }
                }
            }
        });

        function saveManager()
        {
            $('#btn-saveManager').prop('disabled',true);
            const form = $('#frm-saveManager')[0];
            const data = new FormData(form);
            axios.post(url+'main/advance/saveManager' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'advance.html';
                    });
                    
                }
            });
        }


    });

</script>