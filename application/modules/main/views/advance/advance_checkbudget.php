<section id="checkbudger_section_zone">
    <form id="frm-checkbudget" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>บัญชีตรวจสอบวงเงิน</h4>
            </div>
        </div>
        <div class="advHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>วงเงินคงเหลือ</b></label>
                        <input type="text" name="ip-bgsec-creditlimit" id="ip-bgsec-creditlimit" class="form-control" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-bgsec-memo" id="ip-bgsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-bgsec-user" id="ip-bgsec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-bgsec-dept" id="ip-bgsec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-bgsec-datetime" id="ip-bgsec-datetime" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <button type="submit" id="btn-savecheckbudget" name="btn-savecheckbudget" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check_formcode_bg" id="check_formcode_bg">
        <input hidden type="text" name="check_areaid_bg" id="check_areaid_bg">

    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-checkbudget').on('submit' , function(e){
            e.preventDefault();
            if($('#ip-bgsec-creditlimit').val() == ""){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                save_checkbudget();
            }
        });
        function save_checkbudget()
        {
            $('#btn-savecheckbudget').prop('disabled' , true);
            const form = $('#frm-checkbudget')[0];
            const data = new FormData(form);
            axios.post(url+'main/advance/save_checkbudget' , data , {

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