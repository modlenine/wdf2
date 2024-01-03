<section id="checkbudger_section">
    <form id="frm-saveaccClear" autocomplete="off" class="needs-validation" novalidate>
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
                                        <input type="radio" id="ip-accClearSec-appro-yes" name="ip-accClearSec-appro" value="ผ่าน" class="custom-control-input" required> 
                                        <label for="ip-accClearSec-appro-yes" class="custom-control-label">ผ่าน</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-accClearSec-appro-no" name="ip-accClearSec-appro" value="ไม่ผ่าน" class="custom-control-input" required> 
                                        <label for="ip-accClearSec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-accClearSec-memo" id="ip-accClearSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-accClearSec-user" id="ip-accClearSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-accClearSec-dept" id="ip-accClearSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-accClearSec-date" id="ip-accClearSec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-saveaccClear-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-saveAccClear" name="btn-saveAccClear" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-accClearSec-formcode" id="check-accClearSec-formcode">
        <input hidden type="text" name="check-accClearSec-areaid" id="check-accClearSec-areaid">
        <input hidden type="text" name="check-accClearSec-fncmethod" id="check-accClearSec-fncmethod">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-saveaccClear').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-accClearSec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-accClearSec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-accClearSec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveAccClear();
                    }
                }else if($('input:radio[name=ip-accClearSec-appro]:checked').val() == "ผ่าน"){
                    saveAccClear();
                }
                
            }
        });

        function saveAccClear()
        {
            $('#btn-saveAccClear').prop('disabled',true);
            const form = $('#frm-saveaccClear')[0];
            const data = new FormData(form);

            axios.post(url+'main/advance/saveAccClear' , data , {

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