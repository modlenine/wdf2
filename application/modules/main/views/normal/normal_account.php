<section id="checkbudger_section_nor">
    <form id="frm-nor-saveacc" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>ผู้ตรวจสอบดำเนินการ</h4>
            </div>
        </div>
        <div class="norHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-accSec-appro-yes" name="ip-nor-accSec-appro" value="ผ่าน" class="custom-control-input" required> 
                                        <label for="ip-nor-accSec-appro-yes" class="custom-control-label">ผ่าน</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-accSec-appro-no" name="ip-nor-accSec-appro" value="ไม่ผ่าน" class="custom-control-input" required> 
                                        <label for="ip-nor-accSec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-nor-accSec-memo" id="ip-nor-accSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-nor-accSec-user" id="ip-nor-accSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-nor-accSec-dept" id="ip-nor-accSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-nor-accSec-date" id="ip-nor-accSec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-nor-saveacc-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-nor-saveAcc" name="btn-nor-saveAcc" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-accsec-formcode-nor" id="check-accsec-formcode-nor">
        <input hidden type="text" name="check-accsec-areaid-nor" id="check-accsec-areaid-nor">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-nor-saveacc').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-nor-accSec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-nor-accSec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-nor-accSec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveAcc_nor();
                    }
                }else{
                    saveAcc_nor();
                }
                
            }
        });

        function saveAcc_nor()
        {
            $('#btn-nor-saveAcc').prop('disabled' , true);
            const form = $('#frm-nor-saveacc')[0];
            const data = new FormData(form);

            axios.post(url+'main/normal/saveAcc_nor' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Update Data Success"){
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