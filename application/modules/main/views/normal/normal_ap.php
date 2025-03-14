<section id="checkbudger_section_nor">
    <form id="frm-nor-saveap" autocomplete="off" class="needs-validation" novalidate>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h4>AP ดำเนินการ</h4>
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
                                    <input type="radio" id="ip-nor-apsec-appro-yes" name="ip-nor-apsec-appro" value="ผ่าน" class="custom-control-input" required> 
                                    <label for="ip-nor-apsec-appro-yes" class="custom-control-label">ผ่าน</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-nor-apsec-appro-no" name="ip-nor-apsec-appro" value="ไม่ผ่าน" class="custom-control-input" required> 
                                    <label for="ip-nor-apsec-appro-no" class="custom-control-label">ไม่ผ่าน</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-lg-12 form-inline">
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-nor-apsec-money-1" name="ip-nor-apsec-money" value="เงินสด/โอน" class="custom-control-input" checked required> 
                                    <label for="ip-nor-apsec-money-1" class="custom-control-label">เงินสด/โอน</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5 ml-3">
                                    <input type="radio" id="ip-nor-apsec-money-2" name="ip-nor-apsec-money" value="เช็ค" class="custom-control-input" required> 
                                    <label for="ip-nor-apsec-money-2" class="custom-control-label">เช็ค</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>หมายเหตุ</b></label>
                        <textarea name="ip-nor-apsec-memo" id="ip-nor-apsec-memo" cols="30" rows="10" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for=""><b>ผู้ดำเนินการ</b></label>
                        <input type="text" name="ip-nor-apsec-user" id="ip-nor-apsec-user" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ฝ่าย</b></label>
                        <input type="text" name="ip-nor-apsec-dept" id="ip-nor-apsec-dept" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for=""><b>ลงวันที่</b></label>
                        <input type="text" name="ip-nor-apsec-date" id="ip-nor-apsec-date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="btn-nor-saveap-section" class="row align-items-center">
            <div class="col-md-12 text-center">
            <button type="submit" id="btn-nor-saveAP" name="btn-nor-saveAP" class="btn btn-success btnSaveBg"><i class="dw dw-diskette1 mr-2"></i>บันทึก</button>
            </div>
        </div>

        <input hidden type="text" name="check-apsec-formcode-nor" id="check-apsec-formcode-nor">
        <input hidden type="text" name="check-apsec-areaid-nor" id="check-apsec-areaid-nor">
    </div>
    </form>
</section>

<script>
    $(document).ready(function(){

        $('#frm-nor-saveap').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name=ip-nor-apsec-appro]:checked').length == 0){
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                if($('input:radio[name=ip-nor-apsec-appro]:checked').val() == "ไม่ผ่าน"){
                    if($('#ip-nor-apsec-memo').val() == ""){
                        swal({
                            title: 'กรุณาระบุเหตุผลกำกับด้วยค่ะ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        saveAp_nor();
                    }
                    
                }else{
                    saveAp_nor();
                }
            }
        });

        function saveAp_nor()
        {
            $('#btn-nor-saveAP').prop('disabled' , true);
            const form = $('#frm-nor-saveap')[0];
            const data = new FormData(form);

            axios.post(url+'main/normal/saveAp_nor' , data , {

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