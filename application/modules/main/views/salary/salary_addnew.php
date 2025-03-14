<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเพิ่มรายการ ใบขอเบิกจ่ายเงินเดือน (Salary)</title>
</head>
<body>

    <!-- add new detail modal -->
    <div class="modal fade bs-example-modal-lg" id="addnewdetail-sal-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <form id="frm_savenewdetailtoTbl_sal" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <h4>เพิ่มรายการ</h4>
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>

                <div class="modal-header">
                    
                    <div>
                        <button type="submit" class="btn btn-success" id="btn-saveSalAddnewDetail" name="btn-saveSalAddnewDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                    </div>
                    <div>

                    </div>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>รายการค่าใช้จ่าย</b></label>
                            <input type="text" name="sal-detaillist-addnew" id="sal-detaillist-addnew" class="form-control" required>
                            <div id="sal-show-accodelist"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for=""><b>Ac Code</b></label>
                            <input type="text" name="sal-accode-addnew" id="sal-accode-addnew" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>รหัสฝ่าย</b></label>
                            <i class="fa fa-edit sal-btnEditDept"></i>
                            <input type="text" name="sal-deptcode-addnew" id="sal-deptcode-addnew" class="form-control" value="<?=getUser()->DeptCode?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for=""><b>Ac Code (Name)</b></label>
                            <input type="text" name="sal-accodename-addnew" id="sal-accodename-addnew" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for=""><b>จำนวนเงิน (<span class="bgBath2">THB</span>)</b><span class="textRequest"> * </span></label>
                            <input type="text" name="sal-price-addnew" id="sal-price-addnew" class="form-control" required>
                            <div id="alert-sal-price-addnew"></div>
                        </div>

                        <input hidden type="text" name="sal-autoid-addnew" id="sal-autoid-addnew">
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
                        <h4>หน้าเพิ่มรายการ ใบขอเบิกจ่ายเงินเดือน</h4>
                        <h6>Salary</h6>
                    </div>
                </div>
                <hr class="salHr">
                
                <div class="card-box pd-20 height-100-p mb-30">
                <form id="frm_saveDataSalaryNew" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>กรุณาเลือกบริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-areaid-sc" name="ip-sal-areaid" value="sc" class="custom-control-input" required> 
                                        <label for="ip-sal-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-areaid-pa" name="ip-sal-areaid" value="pa" class="custom-control-input" required> 
                                        <label for="ip-sal-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-areaid-ca" name="ip-sal-areaid" value="ca" class="custom-control-input" required> 
                                        <label for="ip-sal-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-areaid-st" name="ip-sal-areaid" value="st" class="custom-control-input" required> <label for="ip-sal-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ip-sal-areaid-tb" name="ip-sal-areaid" value="tb" class="custom-control-input" required> 
                                        <label for="ip-sal-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ip-sal-memo" id="ip-sal-memo" class="form-control">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ip-sal-username" id="ip-sal-username" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ip-sal-ecode" id="ip-sal-ecode" class="form-control" value="<?=getUser()->ecode?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ip-sal-dept" id="ip-sal-dept" class="form-control" value="<?=getUser()->Dept?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ip-sal-date" id="ip-sal-date" class="form-control" value="<?=date("d/m/Y H:i:s")?>" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ip-sal-userreceive" id="ip-sal-userreceive" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>">
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ip-sal-userreceiveDetail" id="ip-sal-userreceiveDetail" class="form-control">
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ip-sal-currency" id="ip-sal-currency" class="form-control"></select>
                        </div>
                    </div>

                    <div class="card card-box">
                        <div class="card-header">
                            รายการ
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                <i class="fa fa-plus-circle salAddDetail" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i>
                                    <div id="" class="table-responsive">
                                        <table id="tbl_salary_new" class="table table-bordered table-striped">
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
                                            <tbody id="showDataSallistAftersave"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-saldetail-priceNonVat" id="ip-saldetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ip-saldetail-vat7" id="ip-saldetail-vat7" class="form-control">
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-saldetail-vat7Price" id="ip-saldetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ip-saldetail-vat3" id="ip-saldetail-vat3" class="form-control">
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ip-saldetail-vat3Price" id="ip-saldetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
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
                                        <input type="text" name="ip-saldetail-priceTotal" id="ip-saldetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <input hidden type="text" name="checkMaxmoney" id="checkMaxmoney">

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label><br>
                                    <input id="ip-saldetail-file" name="ip-saldetail-file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*,.pdf" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" id="btn-saveSalaryData" name="btn-saveSalaryData" class="btn btn-success" ><i class="dw dw-diskette1 mr-2"></i>บันทึกข้อมูล</button>
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
        let sal_addDetail_array = [];
        load_salary_list();
        getNorCurrencyFromDb();



        function load_salary_list()
        {

            $('#tbl_salary_new').DataTable().destroy();
            $('#tbl_salary_new').DataTable();

            if(sal_addDetail_array.length != 0){
                let tbl_detaillistAftersave = ``;
                let runningnumber = 1;
                let priceWithVat7 = 0;
                let vat7 = 0;
                let priceNoneVat = 0;
                
                
                vat7 = parseFloat($('#ip-saldetail-vat7').val());


                for(let i = 0; i < sal_addDetail_array.length; i++){
                    tbl_detaillistAftersave += `
                    <tr>
                        <td>`+runningnumber+`</td>
                        <td>`+sal_addDetail_array[i].detaillist+`<input hidden type="text" id="input-detaillist" name="input-detaillist[]" value="`+sal_addDetail_array[i].detaillist+`"></td>
                        <td>`+sal_addDetail_array[i].deptcode+`<input hidden type="text" id="input-deptcode" name="input-deptcode[]" value="`+sal_addDetail_array[i].deptcode+`"></td>
                        <td>`+sal_addDetail_array[i].accode+`<input hidden type="text" id="input-accode" name="input-accode[]" value="`+sal_addDetail_array[i].accode+`"></td>
                        <td>`+sal_addDetail_array[i].accodename+`<input hidden type="text" id="input-accodename" name="input-accodename[]" value="`+sal_addDetail_array[i].accodename+`"></td>
                        <td>`+sal_addDetail_array[i].price+`<input hidden type="text" id="input-price" name="input-price[]" value="`+sal_addDetail_array[i].price+`"></td>
                        <td>
                            <i class="fa fa-trash del-detailList-sal" aria-hidden="true"
                                data_detailIndex="`+i+`"
                            ></i>
                            <input hidden type="text" id="input-detailautoid" name="input-detailautoid[]" value="`+sal_addDetail_array[i].detailautoid+`">
                        </td>
                       
                    </tr>
                    `;
                    runningnumber++;
                    let conPrice = sal_addDetail_array[i].price.split(",").join("");
                    priceNoneVat = priceNoneVat+parseFloat(conPrice);
                }

                $('#showDataSallistAftersave').html(tbl_detaillistAftersave);
                $('#ip-saldetail-priceNonVat').val(priceNoneVat.toFixed(2));
                $('#ip-saldetail-priceNonVat').val(function(index , value){
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


                checkVatInputAll_sal($('#ip-saldetail-vat3').val() , $('#ip-saldetail-vat7').val() , priceNoneVat);

                
            }else{
                $('#ip-saldetail-priceNonVat').val(0.00);
                $('#ip-saldetail-vat7Price').val(0.00);
                $('#ip-saldetail-vat3Price').val(0.00);
                $('#ip-saldetail-priceTotal').val(0.00);
            }

        }

        $(document).on('change' , '#ip-saldetail-vat7' , function(){
            let vat3 = $('#ip-saldetail-vat3').val();
            let vat7 = $('#ip-saldetail-vat7').val();
            let priceNoneVat = $('#ip-saldetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_sal(vat3 , vat7 , priceNoneVat);
        });

        $(document).on('change' , '#ip-saldetail-vat3' , function(){
            let vat3 = $('#ip-saldetail-vat3').val();
            let vat7 = $('#ip-saldetail-vat7').val();
            let priceNoneVat = $('#ip-saldetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_sal(vat3 , vat7 , priceNoneVat);
        });


        $(document).on('click' , '.salAddDetail' , function(){
            $('#addnewdetail-sal-modal').modal('show');
            clearAddnewDetailModal_sal();
        });

        $(document).on('click' , '.sal-btnEditDept' , function(){
            $('#sal-deptcode-addnew').prop('readonly' , false);
        });

        function clearAddnewDetailModal_sal()
        {
            $('#sal-deptcode-addnew').prop('readonly' , true);
            $('#sal-detaillist-addnew').val('');
            $('#sal-accode-addnew').val('');
            $('#sal-accodename-addnew').val('');
            $('#sal-price-addnew').val('');
            $('#frm_savenewdetailtoTbl_sal').removeClass('was-validated');
        }

        $(document).on('keyup' , '#sal-detaillist-addnew' , function(){
            if($(this).val() != ""){
                if(notKeySingleQ($(this).val()) == true){
                    getAcCodeList($(this).val());
                }
                console.log(notKeySingleQ($(this).val()));
            }else{
                $('#sal-show-accodelist').html('');
            }
        });
        function getAcCodeList(accodeInput)
        {
            if(accodeInput != ""){
                axios.post(url+'main/salary/getAcCodeList' , {
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
                                $('#sal-show-accodelist').html(outputHtml);
                    }
                });
            }
        }

        $(document).on('click' , '.selectAcCodeListLi' , function(){
            const data_detailwdf_name = $(this).attr("data_detailwdf_name");
            const data_detailwdf_accodename = $(this).attr("data_detailwdf_accodename");
            const data_detailwdf_accode = $(this).attr("data_detailwdf_accode");
            const data_detailwdf_id = $(this).attr("data_detailwdf_id");

            $('#sal-detaillist-addnew').val(data_detailwdf_name);
            $('#sal-accode-addnew').val(data_detailwdf_accode);
            $('#sal-accodename-addnew').val(data_detailwdf_accodename);
            $('#sal-autoid-addnew').val(data_detailwdf_id);
            $('#sal-show-accodelist').html('');
        });


        $(document).on('keyup' , '#sal-price-addnew' , function(event){
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
                $('#btn-saveSalAddnewDetail').prop('disabled' , true);
                $('#alert-sal-price-addnew').html(alert);
            }else{
                $('#btn-saveSalAddnewDetail').prop('disabled' , false);
                $('#alert-sal-price-addnew').html('');
            }

        });

        $('#frm_savenewdetailtoTbl_sal').on('submit' , function(e){
            e.preventDefault();
            if($('#sal-detaillist-addnew').val() != "" && $('#sal-accode-addnew').val() != "" && $('#sal-accodename-addnew').val() != "" && $('#sal-deptcode-addnew').val() != "" && $('#sal-price-addnew').val() != ""){

                $('#btn-saveSalAddnewDetail').prop('disabled' , true);
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
            const detaillist = $('#sal-detaillist-addnew').val();
            const accode = $('#sal-accode-addnew').val();
            const accodename = $('#sal-accodename-addnew').val();
            const deptcode = $('#sal-deptcode-addnew').val();
            const price = $('#sal-price-addnew').val();
            const autoid = $('#sal-autoid-addnew').val();

            let saveDataDetail = {
                "detaillist":detaillist,
                "accode":accode,
                "accodename":accodename,
                "deptcode":deptcode,
                "price":price,
                "detailautoid":autoid
            }

            sal_addDetail_array.push(saveDataDetail);
            console.log(sal_addDetail_array);
            $('#btn-saveSalAddnewDetail').prop('disabled' , false);
            $('#addnewdetail-sal-modal').modal('hide');
            load_salary_list();
        }

        
        $(document).on('click' , '.del-detailList-sal' , function(){
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
                    sal_addDetail_array.splice(data_detailIndex , 1);
                    load_salary_list();
                }
            });

        });

        $('input:radio[name="ip-sal-areaid"]').on('change' , function(){
            console.log($(this).val());
            let groupAreaid = $(this).val();
            if(groupAreaid != "tb"){
                groupAreaid = "sc,pa,ca,st";
            }
            getMaximumMoney_sal(groupAreaid , "sal");
        });


        function getMaximumMoney_sal(groupAreaid , doctype)
        {
            if(groupAreaid != "" && doctype != ""){
                axios.post(url+'main/salary/getMaximumMoney_sal' , {
                    action:"getMaximumMoney_sal",
                    groupAreaid:groupAreaid,
                    doctype:doctype
                }).then(res=>{
                    console.log(res.data);
                    $('#checkMaxmoney').val(res.data.maxmoney.pay_scope_end);
                });
            }
        }



        $('#frm_saveDataSalaryNew').on('submit' , function(e){

            e.preventDefault();

            if($('input:radio[name="ip-sal-areaid"]:checked').length == 0){
                swal({
                    title: 'กรุณาเลือกบริษัท',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else if($('#ip-saldetail-priceTotal').val() == 0){
                swal({
                    title: 'กรุณากรอกรายละเอียดการทำรายการ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }else{
                saveDataSalaryNew();
            }

        });



        function saveDataSalaryNew()
        {
            $('#btn-saveSalaryData').prop('disabled' , true);

            let realMoney = $('#ip-saldetail-priceTotal').val();
            let sal_maxmoney = $('#checkMaxmoney').val();

            realMoney = realMoney.replace(/,/g, "");

            if(parseFloat(realMoney) > parseFloat(sal_maxmoney)){
                swal({
                    title: 'จำนวนเงินที่ทำรายการเกินวงเงินสูงสุด',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
                $('#btn-saveSalaryData').prop('disabled' , false);
            }else{

                const form = $('#frm_saveDataSalaryNew')[0];
                const data = new FormData(form);

                axios.post(url+'main/salary/saveDataSalaryNew' , data , {
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
                            location.href = url+'salary.html';
                        });
                    }
                });
            }

            
        }


        function getNorCurrencyFromDb()
        {
            axios.get(url+'main/salary/getSalCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ip-sal-currency').html(output);

                    $(document).on('change' , '#ip-sal-currency' , function(){
                        if($(this).val() !== ""){
                            $('.bgBath').text($(this).val());
                            $('.bgBath2').text($(this).val());

                        }

                        $('#ip-saldetail-vat3').val("0");
                        $('#ip-saldetail-vat7').val("0")

                        let vat3 = $('#ip-saldetail-vat3').val();
                        let vat7 = $('#ip-saldetail-vat7').val();
                        let priceNoneVat = $('#ip-saldetail-priceNonVat').val().replace(/,/g, "");

                        if($(this).val() !== "THB"){
                            $('#ip-saldetail-vat7').attr("style", "pointer-events: none;");
                            $('#ip-saldetail-vat3').attr("style", "pointer-events: none;");
                            vat3 = 0;
                            vat7 = 0;
                        }else{
                            $('#ip-saldetail-vat7').attr("style", "pointer-events: ;");
                            $('#ip-saldetail-vat3').attr("style", "pointer-events: ;");
                        }

                        checkVatInputAll_sal(vat3 , vat7 , priceNoneVat);
                    });
                }
            });
        }

        






    });
</script>