<section id="checkbudger_section_po">
    <form id="frm-po-saveap" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>AP ดำเนินการ</h4>
            </div>
        </div>
        <div class="poHr mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-lg-12 form-inline">
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-po-apsec-appro-yes" name="ip-po-apsec-appro" value="ผ่าน" class="custom-control-input" required> 
                                    <label for="ip-po-apsec-appro-yes" class="custom-control-label">ผ่าน</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-po-apsec-appro-no" name="ip-po-apsec-appro" value="ไม่ผ่าน" class="custom-control-input" required> 
                                    <label for="ip-po-apsec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-lg-12 form-inline">
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-po-apsec-money-1" name="ip-po-apsec-money" value="เงินสด/โอน" class="custom-control-input" checked required> 
                                    <label for="ip-po-apsec-money-1" class="custom-control-label">เงินสด/โอน</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-po-apsec-money-2" name="ip-po-apsec-money" value="เช็ค" class="custom-control-input" required> 
                                    <label for="ip-po-apsec-money-2" class="custom-control-label">เช็ค</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-po-apsec-memo" id="ip-po-apsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-po-apsec-user" id="ip-po-apsec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-po-apsec-dept" id="ip-po-apsec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-po-apsec-date" id="ip-po-apsec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-po-saveap-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-po-saveAP" name="btn-po-saveAP" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-apsec-formcode-po" id="check-apsec-formcode-po">
        <input hidden type="text" name="check-apsec-areaid-po" id="check-apsec-areaid-po">
    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-po-saveap').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-po-apsec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-po-apsec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-po-apsec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveAp_po();
                    }
                    
                }else{
                    saveAp_po();
                }
            }
        });

        function saveAp_po()
        {
            $('#btn-po-saveAP').prop('disabled' , true);
            const form = $('#frm-po-saveap')[0];
            const data = new FormData(form);

            axios.post(url+'main/po/saveAp_po' , data , {

            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Update Data Success"){
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:1000
                    }).then(function(){
                        location.href = url+'po.html';
                    });
                }
            });
        }


    });
</script>