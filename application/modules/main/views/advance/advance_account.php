<section id="checkbudger_section">
    <form id="frm-saveacc" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้ตรวจสอบดำเนินการ</h4>
            </div>
        </div>
        <div class="advHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-accSec-appro-yes" name="ip-accSec-appro" value="ผ่าน" class="custom-control-input" required> 
                                        <label for="ip-accSec-appro-yes" class="custom-control-label">ผ่าน</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-accSec-appro-no" name="ip-accSec-appro" value="ไม่ผ่าน" class="custom-control-input" required> 
                                        <label for="ip-accSec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-accSec-memo" id="ip-accSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-accSec-user" id="ip-accSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-accSec-dept" id="ip-accSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-accSec-date" id="ip-accSec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-saveacc-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-saveAcc" name="btn-saveAcc" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-accsec-formcode" id="check-accsec-formcode">
        <input hidden type="text" name="check-accsec-areaid" id="check-accsec-areaid">
        <input hidden type="text" name="check-accsec-appGroup" id="check-accsec-appGroup">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-saveacc').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-accSec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-accSec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-accSec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveAcc();
                    }
                }else{
                    saveAcc();
                }
                
            }
        });

        function saveAcc()
        {
            $('#btn-saveAcc').prop('disabled' , true);
            const form = $('#frm-saveacc')[0];
            const data = new FormData(form);

            axios.post(url+'main/advance/saveAcc' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Update Data Success"){
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