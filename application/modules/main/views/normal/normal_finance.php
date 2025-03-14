<section id="checkbudger_section_nor">
    <form id="frm-nor-savefn" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>FINANCE ดำเนินการ</h4>
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
                                        <input type="radio" id="ip-nor-fnSec-appro-yes" name="ip-nor-fnSec-appro" value="ผ่าน" class="custom-control-input"> 
                                        <label for="ip-nor-fnSec-appro-yes" class="custom-control-label">ผ่าน</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-nor-fnSec-appro-no" name="ip-nor-fnSec-appro" value="ไม่ผ่าน" class="custom-control-input"> 
                                        <label for="ip-nor-fnSec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-nor-fnSec-memo" id="ip-nor-fnSec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-nor-fnSec-user" id="ip-nor-fnSec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-nor-fnSec-dept" id="ip-nor-fnSec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-nor-fnSec-date" id="ip-nor-fnSec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-nor-savefn-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-nor-saveFn" name="btn-nor-saveFn" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-fnsec-formcode-nor" id="check-fnsec-formcode-nor">
        <input hidden type="text" name="check-fnsec-areaid-nor" id="check-fnsec-areaid-nor">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-nor-savefn').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-nor-fnSec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-nor-fnSec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-nor-fnSec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveFn_nor();
                    }
                }else{
                    saveFn_nor();
                }

            }
        });

        function saveFn_nor()
        {
            $('#btn-nor-saveFn').prop('disabled',true);
            const form = $('#frm-nor-savefn')[0];
            const data = new FormData(form);

            axios.post(url+'main/normal/saveFn_nor' , data , {

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