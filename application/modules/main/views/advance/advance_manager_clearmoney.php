<section id="checkbudger_section">
    <form id="frm-saveManagerClear" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้จัดการอนุมัติ</h4>
            </div>
        </div>

        <div class="advHr mt-3"></div>

        <div class="row mt-3">
            <div id="mainClearG-1"></div>
        </div>

        <div class="row mt-3">
            <div id="mainClearG-1-detail"></div>
        </div>

        <div class="advHr lineMgrClearApp" style="display:none;"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-mgrClearSec-appro-yes" name="ip-mgrClearSec-appro" value="อนุมัติ" class="custom-control-input" required> 
                                        <label for="ip-mgrClearSec-appro-yes" class="custom-control-label">อนุมัติ</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-mgrClearSec-appro-no" name="ip-mgrClearSec-appro" value="ไม่อนุมัติ" class="custom-control-input" required> 
                                        <label for="ip-mgrClearSec-appro-no" class="custom-control-label">ไม่อนุมัติ</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-mgrClearSec-memo" id="ip-mgrClearSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้อนุมัติ</b></label>
                        <input type="text" name="ip-mgrClearSec-userpost" id="ip-mgrClearSec-userpost" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-mgrClearSec-deptpost" id="ip-mgrClearSec-deptpost" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-mgrClearSec-datepost" id="ip-mgrClearSec-datepost" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-saveManagerClear" name="btn-saveManagerClear" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-mgrClearSec-paygroupid" id="check-mgrClearSec-paygroupid">
        <input hidden type="text" name="check-mgrClearSec-group" id="check-mgrClearSec-group">
        <input hidden type="text" name="check-mgrClearSec-formcode" id="check-mgrClearSec-formcode">
        <input hidden type="text" name="check-mgrClearSec-areaid" id="check-mgrClearSec-areaid">
        <input hidden type="text" name="check-mgrClearSec-totalLength" id="check-mgrClearSec-totalLength">
        <input hidden type="text" name="check-mgrClearSec-clickLength" id="check-mgrClearSec-clickLength">
        <input hidden type="text" name="check-mgrClearSec-groupareaid" id="check-mgrClearSec-groupareaid">
        <input hidden type="text" name="check-mgrClearSec-appGroup" id="check-mgrClearSec-appGroup">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){
        
        $('#frm-saveManagerClear').on('submit' , function(e){
            e.preventDefault();
            if($('#check-mgrClearSec-group').val() != 5){
                // Check pay group length
                let clickLength = parseFloat($('#check-mgrClearSec-clickLength').val());
                let totalLength = parseFloat($('#check-mgrClearSec-totalLength').val());

                // if($('input:radio[name="ip-mgrClearSec-appro"]:checked').val() == "อนุมัติ"){
                //     if(clickLength != totalLength){
                //         swal({
                //             title: 'กรุณาเลือกผู้อนุมัติให้ครบตามจำนวน ('+totalLength+')',
                //             type: 'error',
                //             showConfirmButton: false,
                //             timer:1000
                //         });
                //     }else if($('input:radio[name="ip-mgrClearSec-appro"]:checked').length == 0){
                //         swal({
                //             title: 'กรุณาเลือกการอนุมัติ',
                //             type: 'error',
                //             showConfirmButton: false,
                //             timer:1000
                //         });
                //     }else{
                //         // Code Save data to db
                //         saveManagerClear();
                //     }
                // }else if($('input:radio[name="ip-mgrsec-appro"]:checked').val() == "ไม่อนุมัติ"){
                //         // Code Save data to db
                //         // Check Memo
                //         if($('#ip-mgrClearSec-memo').val() == ""){
                //             swal({
                //                 title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                //                 type: 'error',
                //                 showConfirmButton: false,
                //                 timer:1000
                //             });
                //         }else{
                //             saveManagerClear();
                //         }
                // }

                // Check approve radio
                if($('input:radio[name="ip-mgrClearSec-appro"]:checked').length == 0){
                    swal({
                        title: 'กรุณาเลือกการอนุมัติ',
                        type: 'error',
                        showConfirmButton: false,
                        timer:1000
                    });
                }else{
                    if($('input:radio[name="ip-mgrClearSec-appro"]:checked').val() == "ไม่อนุมัติ"){
                        // Check memo 
                        if($('#ip-mgrClearSec-memo').val() == ""){
                            swal({
                                title: 'กรุณาระบุเหตุผลกำกับ',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }else{
                            saveManagerClear();
                        }
                    }else if($('input:radio[name="ip-mgrClearSec-appro"]:checked').val() == "อนุมัติ"){
                        if(clickLength != totalLength){
                            swal({
                                title: 'กรุณาเลือกผู้อนุมัติให้ครบตามจำนวน ('+totalLength+')',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }else{
                            saveManagerClear();
                        }
                    }
                }


            }else{
                saveManagerClear();
            }

        });

        function saveManagerClear()
        {
            $('#btn-saveManagerClear').prop('disabled' , true);
            const form = $('#frm-saveManagerClear')[0];
            const data = new FormData(form);
            axios.post(url+'main/advance/saveManagerClear' , data , {

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