<section id="checkbudger_section_nor">
    <form id="frm-nor-saveManager" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้จัดการอนุมัติ</h4>
            </div>
        </div>

        <div class="norHr mt-3"></div>

        <div class="row mt-3">
            <div id="mainG-1-nor"></div>
        </div>

        <div class="row mt-3">
            <div id="mainG-1-detail-nor"></div>
        </div>

        <div class="norHr lineMgrApp_nor" style="display:none;"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-mgrsec-appro-yes" name="ip-nor-mgrsec-appro" value="อนุมัติ" class="custom-control-input" required> 
                                        <label for="ip-nor-mgrsec-appro-yes" class="custom-control-label">อนุมัติ</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-mgrsec-appro-no" name="ip-nor-mgrsec-appro" value="ไม่อนุมัติ" class="custom-control-input" required> 
                                        <label for="ip-nor-mgrsec-appro-no" class="custom-control-label">ไม่อนุมัติ</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-nor-mgrsec-memo" id="ip-nor-mgrsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้อนุมัติ</b></label>
                        <input type="text" name="ip-nor-mgrsec-userpost" id="ip-nor-mgrsec-userpost" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-nor-mgrsec-deptpost" id="ip-nor-mgrsec-deptpost" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-nor-mgrsec-datepost" id="ip-nor-mgrsec-datepost" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-nor-saveManager" name="btn-nor-saveManager" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-mg-paygroupid-nor" id="check-mg-paygroupid-nor">
        <input hidden type="text" name="check-mg-group-nor" id="check-mg-group-nor">
        <input hidden type="text" name="check-mg-formcode-nor" id="check-mg-formcode-nor">
        <input hidden type="text" name="check-mg-areaid-nor" id="check-mg-areaid-nor">
        <input hidden type="text" name="check-mg-totalLength-nor" id="check-mg-totalLength-nor">
        <input hidden type="text" name="check-mg-clickLength-nor" id="check-mg-clickLength-nor">
        <input hidden type="text" name="check-mg-groupareaid-nor" id="check-mg-groupareaid-nor">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){
        $('#frm-nor-saveManager').on('submit' , function(e){
            e.preventDefault();

            if($('#check-mg-group-nor').val() != 5){
                // Check pay group length
                let clickLength = parseFloat($('#check-mg-clickLength-nor').val());
                let totalLength = parseFloat($('#check-mg-totalLength-nor').val());

                if($('input:radio[name="ip-nor-mgrsec-appro"]:checked').val() == "อนุมัติ"){
                    if(clickLength != totalLength){
                        swal({
                            title: 'กรุณาเลือกผู้อนุมัติให้ครบตามจำนวน ('+totalLength+')',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else if($('input:radio[name="ip-nor-mgrsec-appro"]:checked').length == 0){
                        swal({
                            title: 'กรุณาเลือกการอนุมัติ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        // Code Save data to db
                        saveManager_nor();
                    }
                }else if($('input:radio[name="ip-nor-mgrsec-appro"]:checked').val() == "ไม่อนุมัติ"){
                        // Code Save data to db
                        if($('#ip-nor-mgrsec-memo').val() == ""){
                            swal({
                                title: 'กรุณาระบุเหตุผล',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }else{
                            saveManager_nor();
                        }
                }



            }else{
                if($('input:radio[name="ip-nor-mgrsec-appro"]:checked').val() == "อนุมัติ"){
                    saveManager_nor();
                }else if($('input:radio[name="ip-nor-mgrsec-appro"]:checked').val() == "ไม่อนุมัติ"){
                    if($('#ip-nor-mgrsec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผล',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveManager_nor();
                    }
                }
            }
        });

        function saveManager_nor()
        {
            $('#btn-nor-saveManager').prop('disabled' , true);
            const form = $('#frm-nor-saveManager')[0];
            const data = new FormData(form);
            axios.post(url+'main/normal/saveManager_nor' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Insert Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'normal.html';
                    });
                    
                }
            });
        }


    });

</script>