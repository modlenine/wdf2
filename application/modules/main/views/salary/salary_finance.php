<section id="checkbudger_section_sal">
    <form id="frm-sal-savefn" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>FINANCE ดำเนินการ</h4>
            </div>
        </div>
        <div class="salHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-fnSec-appro-yes" name="ip-sal-fnSec-appro" value="ผ่าน" class="custom-control-input"> 
                                        <label for="ip-sal-fnSec-appro-yes" class="custom-control-label">ผ่าน</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-fnSec-appro-no" name="ip-sal-fnSec-appro" value="ไม่ผ่าน" class="custom-control-input"> 
                                        <label for="ip-sal-fnSec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-sal-fnSec-memo" id="ip-sal-fnSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-sal-fnSec-user" id="ip-sal-fnSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-sal-fnSec-dept" id="ip-sal-fnSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-sal-fnSec-date" id="ip-sal-fnSec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-sal-savefn-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-sal-saveFn" name="btn-sal-saveFn" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-fnsec-formcode-sal" id="check-fnsec-formcode-sal">
        <input hidden type="text" name="check-fnsec-areaid-sal" id="check-fnsec-areaid-sal">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-sal-savefn').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-sal-fnSec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-sal-fnSec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-sal-fnSec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveFn_sal();
                    }
                }else{
                    saveFn_sal();
                }

            }
        });

        function saveFn_sal()
        {
            $('#btn-sal-saveFn').prop('disabled',true);
            const form = $('#frm-sal-savefn')[0];
            const data = new FormData(form);

            axios.post(url+'main/salary/saveFn_sal' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Update Data Success"){
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