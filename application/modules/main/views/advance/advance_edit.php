<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแก้ไข ใบเบิกเงินทดรองจ่าย</title>
</head>
<body>

        <!-- add new detail modal -->
        <div class="modal fade bs-example-modal-lg" id="addnewdetaile-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frme_savenewdetailtoTbl" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>เพิ่มรายการ</h4>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btne-saveAdvAddnewDetail" name="btne-saveAdvAddnewDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for=""><b>รายการค่าใช้จ่าย</b></label>
                                <input type="text" name="adve-detaillist-addnew" id="adve-detaillist-addnew" class="form-control" required>
                                <div id="showe-accodelist"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Ac Code</b></label>
                                <input type="text" name="adve-accode-addnew" id="adve-accode-addnew" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>รหัสฝ่าย</b></label>
                                <i class="fa fa-edit btneEditDept"></i>
                                <input type="text" name="adve-deptcode-addnew" id="adve-deptcode-addnew" class="form-control" value="<?=getUser()->DeptCode?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Ac Code (Name)</b></label>
                                <input type="text" name="adve-accodename-addnew" id="adve-accodename-addnew" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>จำนวนเงิน (<span class="bgBath2">THB</span>)</b><span class="textRequest"> * </span></label>
                                <input type="text" name="adve-price-addnew" id="adve-price-addnew" class="form-control" required>
                                <div id="alert-adve-price-addnew"></div>
                            </div>

                            <input hidden type="text" name="adve-autoid-addnew" id="adve-autoid-addnew">
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
                        <h4>หน้าแก้ไขรายการ ใบเบิกเงินทดรองจ่าย</h4>
                        <h6>Advance</h6>
                    </div>
                </div>
                <hr class="advHr">
                
                <div class="card-box pd-20 height-100-p mb-30">
                <form id="frm_saveDataAdvanceNew_edit" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>กรุณาเลือกบริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-adv-areaid-sc" name="ipe-adv-areaid" value="sc" class="custom-control-input" required> 
                                        <label for="ipe-adv-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-adv-areaid-pa" name="ipe-adv-areaid" value="pa" class="custom-control-input" required> 
                                        <label for="ipe-adv-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-adv-areaid-ca" name="ipe-adv-areaid" value="ca" class="custom-control-input" required> 
                                        <label for="ipe-adv-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-adv-areaid-st" name="ipe-adv-areaid" value="st" class="custom-control-input" required> <label for="ipe-adv-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-adv-areaid-tb" name="ipe-adv-areaid" value="tb" class="custom-control-input" required> 
                                        <label for="ipe-adv-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ipe-adv-memo" id="ipe-adv-memo" class="form-control">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ipe-adv-username" id="ipe-adv-username" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ipe-adv-ecode" id="ipe-adv-ecode" class="form-control" value="<?=getUser()->ecode?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ipe-adv-dept" id="ipe-adv-dept" class="form-control" value="<?=getUser()->Dept?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ipe-adv-date" id="ipe-adv-date" class="form-control" value="<?=date("d/m/Y H:i:s")?>" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ipe-adv-userreceive" id="ipe-adv-userreceive" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>">
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ipe-adv-userreceiveDetail" id="ipe-adv-userreceiveDetail" class="form-control">
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ipe-adv-currency" id="ipe-adv-currency" class="form-control"></select>
                        </div>
                    </div>

                    <div class="card card-box">
                        <div class="card-header">
                            รายการ
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                <i class="fa fa-plus-circle advAddDetaile" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i>
                                    <div id="" class="table-responsive">
                                        <table id="tbl_advance_edit" class="table table-bordered table-striped">
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
                                            <tbody id="showDataAdvlistAftersave_e"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipe-advdetail-priceNonVat" id="ipe-advdetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipe-advdetail-vat7" id="ipe-advdetail-vat7" class="form-control">
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipe-advdetail-vat7Price" id="ipe-advdetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipe-advdetail-vat3" id="ipe-advdetail-vat3" class="form-control">
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipe-advdetail-vat3Price" id="ipe-advdetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
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
                                        <input type="text" name="ipe-advdetail-priceTotal" id="ipe-advdetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">THB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label><b>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</b></label>
                                    <div id="advance_showImage_e" class="row form-group"></div>
                                    <br>
                                    <input id="ipe-advdetail-file" name="ipe-advdetail-file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*,.pdf" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" id="btn-saveAdvanceDatae" name="btn-saveAdvanceDatae" class="btn btn-warning" ><i class="dw dw-diskette1 mr-2"></i>บันทึกการแก้ไขข้อมูล</button>
                                </div>
                            </div>

                            <!-- Check Zone -->
                            <input hidden type="text" name="edit_formcode" id="edit_formcode">
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
        let formcode = "<?php echo $formcode?>";
        let formno = "<?php echo $formno?>";
        advance_getDataviewfull_edit();
        load_advance_liste();



        // Get Old data
        function advance_getDataviewfull_edit()
        {
            if(formcode != ""){
                axios.post(url+'main/advance/advance_getDataviewfull' , {
                    action:'advance_getDataviewfull',
                    formcode:formcode,
                    formno:formno
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let currency = res.data.viewfulldata.wdf_currency;
                        getAdvCurrencyFromDb_edit(currency);
                        // $('input:radio[name="ipe-adv-areaid"]').on('click' , function(e){
                        //     e.preventDefault();
                        // });

                        // $('#showFormno_adv').html(res.data.viewfulldata.wdf_formno);
                        // $('#btn-editadvance').attr('data_formcode' , formcode);
                        $('#edit_formcode').val(formcode);

                        if(res.data.viewfulldata.wdf_areaid == "sc"){
                            $('#ipe-adv-areaid-sc').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "pa"){
                            $('#ipe-adv-areaid-pa').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "ca"){
                            $('#ipe-adv-areaid-ca').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "st"){
                            $('#ipe-adv-areaid-st').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "tb"){
                            $('#ipe-adv-areaid-tb').prop('checked' , true);
                        }

                        let condate = moment(res.data.viewfulldata.wdf_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ipe-adv-memo').val(res.data.viewfulldata.wdf_memo);


                        $('#ipe-adv-userreceive').val(res.data.viewfulldata.wdf_userreceive);
                        $('#ipe-adv-userreceiveDetail').val(res.data.viewfulldata.wdf_userreceived_detail);
                        
                        let convat1ToInt = parseInt(res.data.viewfulldata.wdf_vat1);
                        $('#ipe-advdetail-vat7 option[value="'+convat1ToInt+'"]').prop("selected" , true);

                        let convat2ToInt = parseInt(res.data.viewfulldata.wdf_vat2);
                        $('#ipe-advdetail-vat3 option[value="'+convat2ToInt+'"]').prop("selected" , true);


                        // WDF Trans Detail
                        let wdf_trans = res.data.viewfulldata_trans;
                        // let wdf_trans_html = ``;
                        // let runningnumber = 1;



                        // $('#tbl_advance_edit').DataTable().destroy();
                        // $('#tbl_advance_edit').DataTable();
                        for(let i = 0; i < wdf_trans.length; i++){

                           let saveDataDetail = {
                            "detaillist":wdf_trans[i].tr_detailname,
                            "accode":wdf_trans[i].tr_detailaccode,
                            "accodename":wdf_trans[i].tr_detailaccodename,
                            "deptcode":wdf_trans[i].tr_deptcode,
                            "price":wdf_trans[i].tr_money,
                            "detailautoid":wdf_trans[i].tr_autoid
                            }

                            adv_addDetail_array.push(saveDataDetail);
                            load_advance_liste();
                        }

                        // Show Image View
                        let wdf_file = res.data.viewfulldata_image;
                        loadfile_edit(wdf_file);
                    }
                })
            }
        }


        function loadfile_edit(wdf_file)
        {
            let imageHtml = ``;
            let ext;
            for(let i = 0; i < wdf_file.length; i++){
                ext = wdf_file[i].fi_name.split('.').pop().toLowerCase();

                if(ext != "pdf"){
                    imageHtml +=`
                    <div class="col-md-4 col-lg-3 col-6 mt-2 divImage">
                        <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" data-toggle="lightbox">
                            <img class="runImageView" src="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`">
                        </a>
                        <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" data-toggle="lightbox"><b>`+wdf_file[i].fi_name+`</b></a>
                        <i class="fa fa-trash del-file-edit" aria-hidden="true" 
                            data_formcode="`+wdf_file[i].fi_formcode+`"
                            data_path="`+wdf_file[i].fi_path+`"
                            data_name="`+wdf_file[i].fi_name+`"
                        ></i>
                    </div>
                    `;
                }else{
                    imageHtml +=`
                    <div class="col-md-4 col-lg-3 col-6 mt-2 divImage">
                        <embed src="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" width="100%" frameborder="0" allowfullscreen>
                        <a href="`+url+wdf_file[i].fi_path+wdf_file[i].fi_name+`" target="_blank"><b>`+wdf_file[i].fi_name+`</b></a>
                        <i class="fa fa-trash del-file-edit" aria-hidden="true" 
                            data_formcode="`+wdf_file[i].fi_formcode+`"
                            data_path="`+wdf_file[i].fi_path+`"
                            data_name="`+wdf_file[i].fi_name+`"
                        ></i>
                    </div>
                    `;
                }

                
                console.log(ext);
            }
            $('#advance_showImage_e').html(imageHtml);
        }


        function conpriceWithComma(inputid)
        {
            $(inputid).val(function(index , value){
                value = value.replace(/,/g, '');
                return numberWithCommas(value);
            });
        }



        function load_advance_liste()
        {

            $('#tbl_advance_edit').DataTable().destroy();
            $('#tbl_advance_edit').DataTable();

            if(adv_addDetail_array.length != 0){
                let tbl_detaillistAftersave = ``;
                let runningnumber = 1;
                let priceWithVat7 = 0;
                let vat7 = 0;
                let priceNoneVat = 0;
                
                
                vat7 = parseFloat($('#ipe-advdetail-vat7').val());


                for(let i = 0; i < adv_addDetail_array.length; i++){
                    tbl_detaillistAftersave += `
                    <tr>
                        <td>`+runningnumber+`</td>
                        <td>`+adv_addDetail_array[i].detaillist+`<input hidden type="text" id="inpute-detaillist" name="inpute-detaillist[]" value="`+adv_addDetail_array[i].detaillist+`"></td>
                        <td>`+adv_addDetail_array[i].deptcode+`<input hidden type="text" id="inpute-deptcode" name="inpute-deptcode[]" value="`+adv_addDetail_array[i].deptcode+`"></td>
                        <td>`+adv_addDetail_array[i].accode+`<input hidden type="text" id="inpute-accode" name="inpute-accode[]" value="`+adv_addDetail_array[i].accode+`"></td>
                        <td>`+adv_addDetail_array[i].accodename+`<input hidden type="text" id="inpute-accodename" name="inpute-accodename[]" value="`+adv_addDetail_array[i].accodename+`"></td>
                        <td>`+numberWithCommas(adv_addDetail_array[i].price)+`<input hidden type="text" id="inpute-price" name="inpute-price[]" value="`+adv_addDetail_array[i].price+`"></td>
                        <td>
                            <i class="fa fa-trash del-detailListe" aria-hidden="true"
                                data_detailIndex="`+i+`"
                            ></i>
                            <input hidden type="text" id="inpute-detailautoid" name="inpute-detailautoid[]" value="`+adv_addDetail_array[i].detailautoid+`">
                        </td>
                       
                    </tr>
                    `;
                    runningnumber++;
                    let conPrice = adv_addDetail_array[i].price.split(",").join("");
                    priceNoneVat = priceNoneVat+parseFloat(conPrice);
                }

                $('#showDataAdvlistAftersave_e').html(tbl_detaillistAftersave);
                $('#ipe-advdetail-priceNonVat').val(priceNoneVat.toFixed(2));
                $('#ipe-advdetail-priceNonVat').val(function(index , value){
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


                checkVatInputAll_edit($('#ipe-advdetail-vat3').val() , $('#ipe-advdetail-vat7').val() , priceNoneVat);

                
            }else{
                $('#ipe-advdetail-priceNonVat').val(0.00);
                $('#ipe-advdetail-vat7Price').val(0.00);
                $('#ipe-advdetail-vat3Price').val(0.00);
                $('#ipe-advdetail-priceTotal').val(0.00);
            }

        }

        $(document).on('change' , '#ipe-advdetail-vat7' , function(){
            let vat3 = $('#ipe-advdetail-vat3').val();
            let vat7 = $('#ipe-advdetail-vat7').val();
            let priceNoneVat = $('#ipe-advdetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_edit(vat3 , vat7 , priceNoneVat);
        });

        $(document).on('change' , '#ipe-advdetail-vat3' , function(){
            let vat3 = $('#ipe-advdetail-vat3').val();
            let vat7 = $('#ipe-advdetail-vat7').val();
            let priceNoneVat = $('#ipe-advdetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_edit(vat3 , vat7 , priceNoneVat);
        });


        $(document).on('click' , '.advAddDetaile' , function(){
            $('#addnewdetaile-modal').modal('show');
            clearAddnewDetailModal();
        });

        $(document).on('click' , '.btneEditDept' , function(){
            $('#adve-deptcode-addnew').prop('readonly' , false);
        });

        function clearAddnewDetailModal()
        {
            $('#adve-deptcode-addnew').prop('readonly' , true);
            $('#adve-detaillist-addnew').val('');
            $('#adve-accode-addnew').val('');
            $('#adve-accodename-addnew').val('');
            $('#adve-price-addnew').val('');
            $('#frme_savenewdetailtoTbl').removeClass('was-validated');
        }

        $(document).on('keyup' , '#adve-detaillist-addnew' , function(){
            if($(this).val() != ""){
                getAcCodeListe($(this).val());
            }else{
                $('#showe-accodelist').html('');
            }
        });
        function getAcCodeListe(accodeInput)
        {
            if(accodeInput != ""){
                axios.post(url+'main/advance/getAcCodeList' , {
                    action:"getAcCodeList",
                    accodeInput:accodeInput
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let accodelistData = res.data.result;
                        let outputHtml = `<ul class="list-group mt-2 selectAcCodeListeUl">`;
                                for(let i = 0; i < accodelistData.length; i++){
                                    outputHtml += `
                                    <li class="list-group-item list-group-item list-group-item-action selectAcCodeListeLi"
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
                                $('#showe-accodelist').html(outputHtml);
                    }
                });
            }
        }

        $(document).on('click' , '.selectAcCodeListeLi' , function(){
            const data_detailwdf_name = $(this).attr("data_detailwdf_name");
            const data_detailwdf_accodename = $(this).attr("data_detailwdf_accodename");
            const data_detailwdf_accode = $(this).attr("data_detailwdf_accode");
            const data_detailwdf_id = $(this).attr("data_detailwdf_id");

            $('#adve-detaillist-addnew').val(data_detailwdf_name);
            $('#adve-accode-addnew').val(data_detailwdf_accode);
            $('#adve-accodename-addnew').val(data_detailwdf_accodename);
            $('#adve-autoid-addnew').val(data_detailwdf_id);
            $('#showe-accodelist').html('');
        });


        $(document).on('keyup' , '#adve-price-addnew' , function(event){
            // skip for arrow keys 
            if (event.which >= 37 && event.which <= 40) 
                    return; 
                // format number 
                $(this).val(function (index, value) { 
                    // return value 
                    //     .replace(/\D/g, "") 
                    //     .replace(/\B(?=(\d{3})+(?!\d))/g, ",") 
                    //     ; 
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
                $('#btne-saveAdvAddnewDetail').prop('disabled' , true);
                $('#alert-adve-price-addnew').html(alert);
            }else{
                $('#btne-saveAdvAddnewDetail').prop('disabled' , false);
                $('#alert-adve-price-addnew').html('');
            }

        });

        $('#frme_savenewdetailtoTbl').on('submit' , function(e){
            e.preventDefault();
            if($('#adve-detaillist-addnew').val() != "" && $('#adve-accode-addnew').val() != "" && $('#adve-accodename-addnew').val() != "" && $('#adve-deptcode-addnew').val() != "" && $('#adve-price-addnew').val() != ""){

                $('#btne-saveAdvAddnewDetail').prop('disabled' , true);
                saveDetailDataToArraye();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });
        function saveDetailDataToArraye()
        {
            const detaillist = $('#adve-detaillist-addnew').val();
            const accode = $('#adve-accode-addnew').val();
            const accodename = $('#adve-accodename-addnew').val();
            const deptcode = $('#adve-deptcode-addnew').val();
            const price = $('#adve-price-addnew').val();
            const autoid = $('#adve-autoid-addnew').val();

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
            $('#btne-saveAdvAddnewDetail').prop('disabled' , false);
            $('#addnewdetaile-modal').modal('hide');
            load_advance_liste();
        }

        $(document).on('click' , '.del-detailListe' , function(){
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
                    load_advance_liste();
                }
            });

        });

        $('#frm_saveDataAdvanceNew_edit').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name="ipe-adv-areaid"]').val() != "" && $('#ipe-advdetail-priceTotal').val() != ""){
                saveDataAdvanceNew_edit();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });

        function saveDataAdvanceNew_edit()
        {
            const form = $('#frm_saveDataAdvanceNew_edit')[0];
            const data = new FormData(form);

            axios.post(url+'main/advance/saveDataAdvanceNew_edit' , data , {
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


        $(document).on('click' , '.del-file-edit' , function(){
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
                    const data_formcode = $(this).attr('data_formcode');
                    const data_path = $(this).attr('data_path');
                    const data_name = $(this).attr('data_name');
                    delFile_edit(data_formcode , data_path , data_name);
                }
            });
        });
        function delFile_edit(data_formcode , data_path , data_name)
        {
            if(data_formcode != "" && data_path != "" && data_name != ""){
                axios.post(url+'main/advance/delFile_edit',{
                    action:"delFile_edit",
                    data_formcode:data_formcode,
                    data_path:data_path,
                    data_name:data_name
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status =="Delete Data Success"){
                        let wdf_file = res.data.viewfulldata_image;
                        swal({
                            title: 'ลบรูปภาพที่ต้องการสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:1000
                        }).then(function(){
                            loadfile_edit(wdf_file);
                        });
                    }
                });
            }
        }






        function getAdvCurrencyFromDb_edit(currency)
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
                    $('#ipe-adv-currency').html(output);

                    $('#ipe-adv-currency option[value="'+currency+'"]').prop("selected" , true);
                    if(currency !== "THB"){
                        $('#ipe-advdetail-vat7').attr("style", "pointer-events: none;");
                        $('#ipe-advdetail-vat3').attr("style", "pointer-events: none;");
                    }else{
                        $('#ipe-advdetail-vat7').attr("style", "pointer-events: ;");
                        $('#ipe-advdetail-vat3').attr("style", "pointer-events: ;");
                    }
                    if(currency !== ""){
                        $('.bgBath').text(currency);
                        $('.bgBath2').text(currency);
                    }

                    $(document).on('change' , '#ipe-adv-currency' , function(){
                        if($(this).val() !== ""){
                            $('.bgBath').text($(this).val());
                            $('.bgBath2').text($(this).val());
                        }

                        $('#ipe-advdetail-vat3').val("0");
                        $('#ipe-advdetail-vat7').val("0")

                        let vat3 = $('#ipe-advdetail-vat3').val();
                        let vat7 = $('#ipe-advdetail-vat7').val();
                        let priceNoneVat = $('#ipe-advdetail-priceNonVat').val().replace(/,/g, "");

                        if($(this).val() !== "THB"){
                            $('#ipe-advdetail-vat7').attr("style", "pointer-events: none;");
                            $('#ipe-advdetail-vat3').attr("style", "pointer-events: none;");
                            vat3 = 0;
                            vat7 = 0;
                        }else{
                            $('#ipe-advdetail-vat7').attr("style", "pointer-events: ;");
                            $('#ipe-advdetail-vat3').attr("style", "pointer-events: ;");
                        }

                        checkVatInputAll_edit(vat3 , vat7 , priceNoneVat);
                    });
                }
            });
        }

        






    });
</script>