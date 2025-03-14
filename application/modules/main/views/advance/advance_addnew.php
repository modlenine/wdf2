<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มรายการ ใบเบิกเงินทดรองจ่าย</title>
</head>
<body>

        <!-- add new detail modal -->
        <div class="modal fade bs-example-modal-lg" id="addnewdetail-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_savenewdetailtoTbl" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>เพิ่มรายการ</h4>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveAdvAddnewDetail" name="btn-saveAdvAddnewDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for=""><b>รายการค่าใช้จ่าย</b></label>
                                <input type="text" name="adv-detaillist-addnew" id="adv-detaillist-addnew" class="form-control" required>
                                <div id="show-accodelist"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Ac Code</b></label>
                                <input type="text" name="adv-accode-addnew" id="adv-accode-addnew" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>รหัสฝ่าย</b></label>
                                <i class="fa fa-edit btnEditDept"></i>
                                <input type="text" name="adv-deptcode-addnew" id="adv-deptcode-addnew" class="form-control" value="<?=getUser()->DeptCode?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Ac Code (Name)</b></label>
                                <input type="text" name="adv-accodename-addnew" id="adv-accodename-addnew" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>จำนวนเงิน (<span class="bgBath2">THB</span>)</b><span class="textRequest"> * </span></label>
                                <input type="text" name="adv-price-addnew" id="adv-price-addnew" class="form-control" required>
                                <div id="alert-adv-price-addnew"></div>
                            </div>

                            <input hidden type="text" name="adv-autoid-addnew" id="adv-autoid-addnew">
                        </div>
                    </div>
                
                </div>
                </form>
            </div>
        </div>
        <!-- add new detail modal -->



    <div class="main-container">
		<div class="pd-ltr-20">

			<div class="card-box pd-20 height-100-p mb-30">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4>หน้าเพิ่มรายการ ใบเบิกเงินทดรองจ่าย</h4>
                        <h6>Advance</h6>
                    </div>
                </div>
                <hr class="advHr">
                
                <div class="card-box pd-20 height-100-p mb-30">
                <form id="frm_saveDataAdvanceNew" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>กรุณาเลือกบริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-adv-areaid-sc" name="ip-adv-areaid" value="sc" class="custom-control-input" required> 
                                        <label for="ip-adv-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-adv-areaid-pa" name="ip-adv-areaid" value="pa" class="custom-control-input" required> 
                                        <label for="ip-adv-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-adv-areaid-ca" name="ip-adv-areaid" value="ca" class="custom-control-input" required> 
                                        <label for="ip-adv-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-adv-areaid-st" name="ip-adv-areaid" value="st" class="custom-control-input" required> <label for="ip-adv-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-adv-areaid-tb" name="ip-adv-areaid" value="tb" class="custom-control-input" required> 
                                        <label for="ip-adv-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ip-adv-memo" id="ip-adv-memo" class="form-control">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ip-adv-username" id="ip-adv-username" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ip-adv-ecode" id="ip-adv-ecode" class="form-control" value="<?=getUser()->ecode?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ip-adv-dept" id="ip-adv-dept" class="form-control" value="<?=getUser()->Dept?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ip-adv-date" id="ip-adv-date" class="form-control" value="<?=date("d/m/Y H:i:s")?>" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ip-adv-userreceive" id="ip-adv-userreceive" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>">
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ip-adv-userreceiveDetail" id="ip-adv-userreceiveDetail" class="form-control">
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ip-adv-currency" id="ip-adv-currency" class="form-control"></select>
                        </div>
                    </div>

                    <div class="card card-box">
                        <div class="card-header">
                            รายการ
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                <i class="fa fa-plus-circle advAddDetail" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i>
                                    <div id="" class="table-responsive">
                                        <table id="tbl_advance_new" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="advN-th1">ลำดับ</th>
                                                    <th class="advN-th2">รายการเบิก</th>
                                                    <th class="advN-th3">รหัสฝ่าย</th>
                                                    <th class="advN-th4">Account Code</th>
                                                    <th class="advN-th5">Account Code (Name)</th>
                                                    <th class="advN-th6">จำนวนเงิน</th>
                                                    <th class="advN-th7">#</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showDataAdvlistAftersave"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-advdetail-priceNonVat" id="ip-advdetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ip-advdetail-vat7" id="ip-advdetail-vat7" class="form-control">
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-advdetail-vat7Price" id="ip-advdetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ip-advdetail-vat3" id="ip-advdetail-vat3" class="form-control">
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-advdetail-vat3Price" id="ip-advdetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-advdetail-priceTotal" id="ip-advdetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                                <input hidden type="text" name="checkMaxmoney_adv" id="checkMaxmoney_adv">
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label><br>
                                    <input id="ip-advdetail-file" name="ip-advdetail-file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*,.pdf" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" id="btn-saveAdvanceData" name="btn-saveAdvanceData" class="btn btn-success" ><i class="dw dw-diskette1 mr-2"></i>บันทึกข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                </div>
			</div>

		</div>

	</div>
</body>
</html>

<script>
    $(document).ready(function(){
        let adv_addDetail_array = [];
        load_advance_list();
        getAdvCurrencyFromDb();



        function load_advance_list()
        {

            $('#tbl_advance_new').DataTable().destroy();
            $('#tbl_advance_new').DataTable();

            if(adv_addDetail_array.length != 0){
                let tbl_detaillistAftersave = ``;
                let runningnumber = 1;
                let priceWithVat7 = 0;
                let vat7 = 0;
                let priceNoneVat = 0;
                
                
                vat7 = parseFloat($('#ip-advdetail-vat7').val());


                for(let i = 0; i < adv_addDetail_array.length; i++){
                    tbl_detaillistAftersave += `
                    <tr>
                        <td>`+runningnumber+`</td>
                        <td>`+adv_addDetail_array[i].detaillist+`<input hidden type="text" id="input-detaillist" name="input-detaillist[]" value="`+adv_addDetail_array[i].detaillist+`"></td>
                        <td>`+adv_addDetail_array[i].deptcode+`<input hidden type="text" id="input-deptcode" name="input-deptcode[]" value="`+adv_addDetail_array[i].deptcode+`"></td>
                        <td>`+adv_addDetail_array[i].accode+`<input hidden type="text" id="input-accode" name="input-accode[]" value="`+adv_addDetail_array[i].accode+`"></td>
                        <td>`+adv_addDetail_array[i].accodename+`<input hidden type="text" id="input-accodename" name="input-accodename[]" value="`+adv_addDetail_array[i].accodename+`"></td>
                        <td>`+adv_addDetail_array[i].price+`<input hidden type="text" id="input-price" name="input-price[]" value="`+adv_addDetail_array[i].price+`"></td>
                        <td>
                            <i class="fa fa-trash del-detailList" aria-hidden="true"
                                data_detailIndex="`+i+`"
                            ></i>
                            <input hidden type="text" id="input-detailautoid" name="input-detailautoid[]" value="`+adv_addDetail_array[i].detailautoid+`">
                        </td>
                       
                    </tr>
                    `;
                    runningnumber++;
                    let conPrice = adv_addDetail_array[i].price.split(",").join("");
                    priceNoneVat = priceNoneVat+parseFloat(conPrice);
                }

                $('#showDataAdvlistAftersave').html(tbl_detaillistAftersave);
                $('#ip-advdetail-priceNonVat').val(priceNoneVat.toFixed(2));
                $('#ip-advdetail-priceNonVat').val(function(index , value){
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


                checkVatInputAll($('#ip-advdetail-vat3').val() , $('#ip-advdetail-vat7').val() , priceNoneVat);

                
            }else{
                $('#ip-advdetail-priceNonVat').val(0.00);
                $('#ip-advdetail-vat7Price').val(0.00);
                $('#ip-advdetail-vat3Price').val(0.00);
                $('#ip-advdetail-priceTotal').val(0.00);
            }

        }

        $(document).on('change' , '#ip-advdetail-vat7' , function(){
            let vat3 = $('#ip-advdetail-vat3').val();
            let vat7 = $('#ip-advdetail-vat7').val();
            let priceNoneVat = $('#ip-advdetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll(vat3 , vat7 , priceNoneVat);
        });

        $(document).on('change' , '#ip-advdetail-vat3' , function(){
            let vat3 = $('#ip-advdetail-vat3').val();
            let vat7 = $('#ip-advdetail-vat7').val();
            let priceNoneVat = $('#ip-advdetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll(vat3 , vat7 , priceNoneVat);
        });


        $(document).on('click' , '.advAddDetail' , function(){
            $('#addnewdetail-modal').modal('show');
            clearAddnewDetailModal();
        });

        $(document).on('click' , '.btnEditDept' , function(){
            $('#adv-deptcode-addnew').prop('readonly' , false);
        });

        function clearAddnewDetailModal()
        {
            $('#adv-deptcode-addnew').prop('readonly' , true);
            $('#adv-detaillist-addnew').val('');
            $('#adv-accode-addnew').val('');
            $('#adv-accodename-addnew').val('');
            $('#adv-price-addnew').val('');
            $('#frm_savenewdetailtoTbl').removeClass('was-validated');
        }

        $(document).on('keyup' , '#adv-detaillist-addnew' , function(){
            if($(this).val() != ""){
                if(notKeySingleQ($(this).val()) == true){
                    getAcCodeList($(this).val());
                }
                console.log(notKeySingleQ($(this).val()));
            }else{
                $('#show-accodelist').html('');
            }
        });
        function getAcCodeList(accodeInput)
        {
            if(accodeInput != ""){
                axios.post(url+'main/advance/getAcCodeList' , {
                    action:"getAcCodeList",
                    accodeInput:accodeInput
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accodelistData = res.data.result;
                        let outputHtml = `<ul class="list-group mt-2 selectAcCodeListUl">`;
                                for(let i = 0; i < accodelistData.length; i++){
                                    outputHtml += `
                                    <li class="list-group-item list-group-item list-group-item-action selectAcCodeListLi"
                                        data_detailwdf_name = "`+accodelistData[i].detailwdf_name+`"
                                        data_detailwdf_accodename = "`+accodelistData[i].detailwdf_accodename+`"
                                        data_detailwdf_accode = "`+accodelistData[i].detailwdf_accode+`"
                                        data_detailwdf_id = "`+accodelistData[i].detailwdf_id+`"
                                    >
                                        <span>`+accodelistData[i].detailwdf_name+` | `+accodelistData[i].detailwdf_accodename+` | `+accodelistData[i].detailwdf_accode+`</span>
                                    </li>
                                    `;
                                }
                                outputHtml += `</ul>`;
                                $('#show-accodelist').html(outputHtml);
                    }
                });
            }
        }

        $(document).on('click' , '.selectAcCodeListLi' , function(){
            const data_detailwdf_name = $(this).attr("data_detailwdf_name");
            const data_detailwdf_accodename = $(this).attr("data_detailwdf_accodename");
            const data_detailwdf_accode = $(this).attr("data_detailwdf_accode");
            const data_detailwdf_id = $(this).attr("data_detailwdf_id");

            $('#adv-detaillist-addnew').val(data_detailwdf_name);
            $('#adv-accode-addnew').val(data_detailwdf_accode);
            $('#adv-accodename-addnew').val(data_detailwdf_accodename);
            $('#adv-autoid-addnew').val(data_detailwdf_id);
            $('#show-accodelist').html('');
        });


        $(document).on('keyup' , '#adv-price-addnew' , function(event){
            // skip for arrow keys 
            if (event.which >= 37 && event.which <= 40) 
                    return; 
                // format number 
                $(this).val(function (index, value) { 
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });

            if(keynumberOnly($(this).val()) == false){
                let alert = `
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>แจ้งเตือน !</strong> กรุณากรอกเฉพาะตัวลขเท่านั้น !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                `;
                $('#btn-saveAdvAddnewDetail').prop('disabled' , true);
                $('#alert-adv-price-addnew').html(alert);
            }else{
                $('#btn-saveAdvAddnewDetail').prop('disabled' , false);
                $('#alert-adv-price-addnew').html('');
            }

        });

        $('#frm_savenewdetailtoTbl').on('submit' , function(e){
            e.preventDefault();
            if($('#adv-detaillist-addnew').val() != "" && $('#adv-accode-addnew').val() != "" && $('#adv-accodename-addnew').val() != "" && $('#adv-deptcode-addnew').val() != "" && $('#adv-price-addnew').val() != ""){

                $('#btn-saveAdvAddnewDetail').prop('disabled' , true);
                saveDetailDataToArray();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });
        function saveDetailDataToArray()
        {
            const detaillist = $('#adv-detaillist-addnew').val();
            const accode = $('#adv-accode-addnew').val();
            const accodename = $('#adv-accodename-addnew').val();
            const deptcode = $('#adv-deptcode-addnew').val();
            const price = $('#adv-price-addnew').val();
            const autoid = $('#adv-autoid-addnew').val();

            let saveDataDetail = {
                "detaillist":detaillist,
                "accode":accode,
                "accodename":accodename,
                "deptcode":deptcode,
                "price":price,
                "detailautoid":autoid
            }

            adv_addDetail_array.push(saveDataDetail);
            console.log(adv_addDetail_array);
            $('#btn-saveAdvAddnewDetail').prop('disabled' , false);
            $('#addnewdetail-modal').modal('hide');
            load_advance_list();
        }

        $(document).on('click' , '.del-detailList' , function(){
            swal({
                title: 'ท่านต้องการลบรายการนี้ ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
            }).then((result)=> {
                if(result.value == true){
                    const data_detailIndex = $(this).attr("data_detailIndex");
                    adv_addDetail_array.splice(data_detailIndex , 1);
                    load_advance_list();
                }
            });

        });


        $('input:radio[name="ip-adv-areaid"]').on('change' , function(){
            console.log($(this).val());
            let groupAreaid = $(this).val();
            if(groupAreaid != "tb"){
                groupAreaid = "sc,pa,ca,st";
            }
            getMaximumMoney_adv(groupAreaid , "adv");
        });



        function getMaximumMoney_adv(groupAreaid , doctype)
        {
            if(groupAreaid != "" && doctype != ""){
                axios.post(url+'main/salary/getMaximumMoney_sal' , {
                    action:"getMaximumMoney_sal",
                    groupAreaid:groupAreaid,
                    doctype:doctype
                }).then(res=>{
                    console.log(res.data);
                    $('#checkMaxmoney_adv').val(res.data.maxmoney.pay_scope_end);
                });
            }
        }



        $('#frm_saveDataAdvanceNew').on('submit' , function(e){
            e.preventDefault();

            if($('input:radio[name="ip-adv-areaid"]:checked').length == 0){
                swal({
                    title: 'กรุณาเลือกบริษัท',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else if($('#ip-advdetail-priceTotal').val() == 0){
                swal({
                    title: 'กรุณากรอกรายละเอียดการทำรายการ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                saveDataAdvanceNew();
            }

            
        });

        function saveDataAdvanceNew()
        {
            $('#btn-saveAdvanceData').prop('disabled' , true);

            let realMoney = $('#ip-advdetail-priceTotal').val();
            let adv_maxmoney = $('#checkMaxmoney_adv').val();

            realMoney = realMoney.replace(/,/g, "");

            if(parseFloat(realMoney) > parseFloat(adv_maxmoney)){
                swal({
                    title: 'จำนวนเงินที่ทำรายการเกินวงเงินสูงสุด',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
                $('#btn-saveAdvanceData').prop('disabled' , false);
            }else{
                const form = $('#frm_saveDataAdvanceNew')[0];
                const data = new FormData(form);

                axios.post(url+'main/advance/saveDataAdvanceNew' , data , {
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Insert Data Success"){
                        swal({
                            title: 'บันทึกข้อมูลเรียบร้อย',
                            type: 'success',
                            showConfirmButton: false,
                            timer:1000
                        }).then(function(){
                            location.href = url+'advance.html';
                        });
                    }
                });
            }


        }

        function getAdvCurrencyFromDb()
        {
            axios.get(url+'main/advance/getAdvCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ip-adv-currency').html(output);

                    $(document).on('change' , '#ip-adv-currency' , function(){
                        if($(this).val() !== ""){
                            $('.bgBath').text($(this).val());
                            $('.bgBath2').text($(this).val());

                        }

                        $('#ip-advdetail-vat3').val("0");
                        $('#ip-advdetail-vat7').val("0")

                        let vat3 = $('#ip-advdetail-vat3').val();
                        let vat7 = $('#ip-advdetail-vat7').val();
                        let priceNoneVat = $('#ip-advdetail-priceNonVat').val().replace(/,/g, "");

                        if($(this).val() !== "THB"){
                            $('#ip-advdetail-vat7').attr("style", "pointer-events: none;");
                            $('#ip-advdetail-vat3').attr("style", "pointer-events: none;");
                            vat3 = 0;
                            vat7 = 0;
                        }else{
                            $('#ip-advdetail-vat7').attr("style", "pointer-events: ;");
                            $('#ip-advdetail-vat3').attr("style", "pointer-events: ;");
                        }

                        checkVatInputAll(vat3 , vat7 , priceNoneVat);
                    });
                }
            });
        }

        






    });
</script>