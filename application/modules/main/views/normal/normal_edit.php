<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแก้ไข ใบขอเบิกจ่าย</title>
</head>
<body>

        <!-- add new detail modal -->
        <div class="modal fade bs-example-modal-lg" id="addnewdetaile-nor-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frme_savenewdetailtoTbl_nor" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>เพิ่มรายการ</h4>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btne-saveNorAddnewDetail" name="btne-saveNorAddnewDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for=""><b>รายการค่าใช้จ่าย</b></label>
                                <input type="text" name="nore-detaillist-addnew" id="nore-detaillist-addnew" class="form-control" required>
                                <div id="showe-nor-accodelist"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Ac Code</b></label>
                                <input type="text" name="nore-accode-addnew" id="nore-accode-addnew" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>รหัสฝ่าย</b></label>
                                <i class="fa fa-edit btneEditDept_nor"></i>
                                <input type="text" name="nore-deptcode-addnew" id="nore-deptcode-addnew" class="form-control" value="<?=getUser()->DeptCode?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Ac Code (Name)</b></label>
                                <input type="text" name="nore-accodename-addnew" id="nore-accodename-addnew" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>จำนวนเงิน (<span class="bgBath2">THB</span>)</b><span class="textRequest"> * </span></label>
                                <input type="text" name="nore-price-addnew" id="nore-price-addnew" class="form-control" required>
                                <div id="alert-nore-price-addnew"></div>
                            </div>

                            <input hidden type="text" name="nore-autoid-addnew" id="nore-autoid-addnew">
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
                        <h4>หน้าแก้ไขรายการ ใบขอเบิกจ่าย</h4>
                        <h6>Normal</h6>
                    </div>
                </div>
                <hr class="norHr">
                
                <div class="card-box pd-20 height-100-p mb-30">
                <form id="frm_saveDataNormalNew_edit" autocomplete="off" style="width:100%;" class="needs-validation" novalidate>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>กรุณาเลือกบริษัท</b></label>
                            <div class="row">
                                <div class="col-lg-12 form-inline">
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-nor-areaid-sc" name="ipe-nor-areaid" value="sc" class="custom-control-input" required> 
                                        <label for="ipe-nor-areaid-sc" class="custom-control-label">Salee Colour Public Company Limited.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-nor-areaid-pa" name="ipe-nor-areaid" value="pa" class="custom-control-input" required> 
                                        <label for="ipe-nor-areaid-pa" class="custom-control-label">Poly Meritasia Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-nor-areaid-ca" name="ipe-nor-areaid" value="ca" class="custom-control-input" required> 
                                        <label for="ipe-nor-areaid-ca"class="custom-control-label">Composite Asia Co.,Ltd.</label>
                                    </div> 
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-nor-areaid-st" name="ipe-nor-areaid" value="st" class="custom-control-input" required> <label for="ipe-nor-areaid-st" class="custom-control-label">Subterra Co.,Ltd.</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5 ml-3">
                                        <input type="radio" id="ipe-nor-areaid-tb" name="ipe-nor-areaid" value="tb" class="custom-control-input" required> 
                                        <label for="ipe-nor-areaid-tb"class="custom-control-label">The bubbles Co.,Ltd.</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <input type="text" name="ipe-nor-memo" id="ipe-nor-memo" class="form-control">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for=""><b>ชื่อผู้ร้องขอ</b></label>
                            <input type="text" name="ipe-nor-username" id="ipe-nor-username" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>รหัสพนักงาน</b></label>
                            <input type="text" name="ipe-nor-ecode" id="ipe-nor-ecode" class="form-control" value="<?=getUser()->ecode?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>แผนก</b></label>
                            <input type="text" name="ipe-nor-dept" id="ipe-nor-dept" class="form-control" value="<?=getUser()->Dept?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>วันที่ออกเอกสาร</b></label>
                            <input type="text" name="ipe-nor-date" id="ipe-nor-date" class="form-control" value="<?=date("d/m/Y H:i:s")?>" readonly>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for=""><b>ชื่อผู้รับเงิน</b></label>
                            <input type="text" name="ipe-nor-userreceive" id="ipe-nor-userreceive" class="form-control" value="<?=getUser()->Fname." ".getUser()->Lname?>">
                        </div>
                        <div class="col-md-8">
                            <label for=""><b>รายละเอียดผู้รับเงิน</b></label>
                            <input type="text" name="ipe-nor-userreceiveDetail" id="ipe-nor-userreceiveDetail" class="form-control">
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for=""><b>สกุลเงิน</b></label>
                            <select name="ipe-nor-currency" id="ipe-nor-currency" class="form-control"></select>
                        </div>
                    </div>

                    <div class="card card-box">
                        <div class="card-header">
                            รายการ
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                <i class="fa fa-plus-circle norAddDetaile" data-toggle="tooltip" data-placement="left" title="" data-original-title="เลือกรายการเบิกตรงนี้"></i>
                                    <div id="" class="table-responsive">
                                        <table id="tbl_normal_edit" class="table table-bordered table-striped">
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
                                            <tbody id="showDataNorlistAftersave_e"></tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipe-nordetail-priceNonVat" id="ipe-nordetail-priceNonVat" class="form-control" placeholder="ยอดรวม" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipe-nordetail-vat7" id="ipe-nordetail-vat7" class="form-control">
                                        <option value="0">ไม่มี Vat</option>
                                        <option value="7">Vat 7%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipe-nordetail-vat7Price" id="ipe-nordetail-vat7Price" class="form-control" placeholder="จำนวนเงิน Vat" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <select name="ipe-nordetail-vat3" id="ipe-nordetail-vat3" class="form-control">
                                        <option value="0">ไม่มี หัก ณ ที่จ่าย</option>
                                        <option value="1">หัก ณ ที่จ่าย 1%</option>
                                        <option value="2">หัก ณ ที่จ่าย 2%</option>
                                        <option value="3">หัก ณ ที่จ่าย 3%</option>
                                        <option value="5">หัก ณ ที่จ่าย 5%</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipe-nordetail-vat3Price" id="ipe-nordetail-vat3Price" class="form-control" placeholder="จำนวนเงินหัก ณ ที่จ่าย" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="ipe-nordetail-priceTotal" id="ipe-nordetail-priceTotal" class="form-control" placeholder="ยอดรวมสุทธิ" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bgBath" id="basic-addon1">บาท</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12 bottommargin">
                                    <label><b>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</b></label>
                                    <div id="normal_showImage_e" class="row form-group"></div>
                                    <br>
                                    <input id="ipe-nordetail-file" name="ipe-nordetail-file[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*,.pdf" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" id="btn-saveNormalDatae" name="btn-saveNormalDatae" class="btn btn-warning" ><i class="dw dw-diskette1 mr-2"></i>บันทึกการแก้ไขข้อมูล</button>
                                </div>
                            </div>

                            <!-- Check Zone -->
                            <input hidden type="text" name="edit_formcode_nor" id="edit_formcode_nor">
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
        let nor_addDetail_array = [];
        let formcode = "<?php echo $formcode?>";
        let formno = "<?php echo $formno?>";
        normal_getDataviewfull_edit();
        load_normal_liste();



        // Get Old data
        function normal_getDataviewfull_edit()
        {
            if(formcode != ""){
                axios.post(url+'main/normal/normal_getDataviewfull' , {
                    action:'normal_getDataviewfull',
                    formcode:formcode,
                    formno:formno
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        let currency = res.data.viewfulldata.wdf_currency;
                        getNorCurrencyFromDb_edit(currency);
                        // $('input:radio[name="ipe-adv-areaid"]').on('click' , function(e){
                        //     e.preventDefault();
                        // });

                        // $('#showFormno_adv').html(res.data.viewfulldata.wdf_formno);
                        // $('#btn-editadvance').attr('data_formcode' , formcode);
                        $('#edit_formcode_nor').val(formcode);

                        if(res.data.viewfulldata.wdf_areaid == "sc"){
                            $('#ipe-nor-areaid-sc').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "pa"){
                            $('#ipe-nor-areaid-pa').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "ca"){
                            $('#ipe-nor-areaid-ca').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "st"){
                            $('#ipe-nor-areaid-st').prop('checked' , true);
                        }else if(res.data.viewfulldata.wdf_areaid == "tb"){
                            $('#ipe-nor-areaid-tb').prop('checked' , true);
                        }

                        let condate = moment(res.data.viewfulldata.wdf_datetime).format('DD/MM/Y HH:mm:ss');
                        $('#ipe-nor-memo').val(res.data.viewfulldata.wdf_memo);


                        $('#ipe-nor-userreceive').val(res.data.viewfulldata.wdf_userreceive);
                        $('#ipe-nor-userreceiveDetail').val(res.data.viewfulldata.wdf_userreceived_detail);
                        
                        let convat1ToInt = parseInt(res.data.viewfulldata.wdf_vat1);
                        $('#ipe-nordetail-vat7 option[value="'+convat1ToInt+'"]').prop("selected" , true);

                        let convat2ToInt = parseInt(res.data.viewfulldata.wdf_vat2);
                        $('#ipe-nordetail-vat3 option[value="'+convat2ToInt+'"]').prop("selected" , true);

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

                            nor_addDetail_array.push(saveDataDetail);
                            load_normal_liste();
                        }

                        // Show Image View
                        let wdf_file = res.data.viewfulldata_image;
                        loadfile_edit_nor(wdf_file);
                    }
                })
            }
        }


        function loadfile_edit_nor(wdf_file)
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
                        <i class="fa fa-trash del-file-edit-nor" aria-hidden="true" 
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
                        <i class="fa fa-trash del-file-edit-nor" aria-hidden="true" 
                            data_formcode="`+wdf_file[i].fi_formcode+`"
                            data_path="`+wdf_file[i].fi_path+`"
                            data_name="`+wdf_file[i].fi_name+`"
                        ></i>
                    </div>
                    `;
                }

                
                console.log(ext);
            }
            $('#normal_showImage_e').html(imageHtml);
        }


        function conpriceWithComma(inputid)
        {
            $(inputid).val(function(index , value){
                value = value.replace(/,/g, '');
                return numberWithCommas(value);
            });
        }



        function load_normal_liste()
        {

            $('#tbl_normal_edit').DataTable().destroy();
            $('#tbl_normal_edit').DataTable();

            if(nor_addDetail_array.length != 0){
                let tbl_detaillistAftersave = ``;
                let runningnumber = 1;
                let priceWithVat7 = 0;
                let vat7 = 0;
                let priceNoneVat = 0;
                
                
                vat7 = parseFloat($('#ipe-nordetail-vat7').val());


                for(let i = 0; i < nor_addDetail_array.length; i++){
                    tbl_detaillistAftersave += `
                    <tr>
                        <td>`+runningnumber+`</td>
                        <td>`+nor_addDetail_array[i].detaillist+`<input hidden type="text" id="inpute-nor-detaillist" name="inpute-nor-detaillist[]" value="`+nor_addDetail_array[i].detaillist+`"></td>
                        <td>`+nor_addDetail_array[i].deptcode+`<input hidden type="text" id="inpute-nor-deptcode" name="inpute-nor-deptcode[]" value="`+nor_addDetail_array[i].deptcode+`"></td>
                        <td>`+nor_addDetail_array[i].accode+`<input hidden type="text" id="inpute-nor-accode" name="inpute-nor-accode[]" value="`+nor_addDetail_array[i].accode+`"></td>
                        <td>`+nor_addDetail_array[i].accodename+`<input hidden type="text" id="inpute-nor-accodename" name="inpute-nor-accodename[]" value="`+nor_addDetail_array[i].accodename+`"></td>
                        <td>`+numberWithCommas(nor_addDetail_array[i].price)+`<input hidden type="text" id="inpute-nor-price" name="inpute-nor-price[]" value="`+nor_addDetail_array[i].price+`"></td>
                        <td>
                            <i class="fa fa-trash del-nor-detailListe" aria-hidden="true"
                                data_detailIndex="`+i+`"
                            ></i>
                            <input hidden type="text" id="inpute-nor-detailautoid" name="inpute-nor-detailautoid[]" value="`+nor_addDetail_array[i].detailautoid+`">
                        </td>
                       
                    </tr>
                    `;
                    runningnumber++;
                    let conPrice = nor_addDetail_array[i].price.split(",").join("");
                    priceNoneVat = priceNoneVat+parseFloat(conPrice);
                }

                $('#showDataNorlistAftersave_e').html(tbl_detaillistAftersave);
                $('#ipe-nordetail-priceNonVat').val(priceNoneVat.toFixed(2));
                $('#ipe-nordetail-priceNonVat').val(function(index , value){
                    value = value.replace(/,/g, '');
                    return numberWithCommas(value);
                });


                checkVatInputAll_edit_nor($('#ipe-nordetail-vat3').val() , $('#ipe-nordetail-vat7').val() , priceNoneVat);

                
            }else{
                $('#ipe-nordetail-priceNonVat').val(0.00);
                $('#ipe-nordetail-vat7Price').val(0.00);
                $('#ipe-nordetail-vat3Price').val(0.00);
                $('#ipe-nordetail-priceTotal').val(0.00);
            }

        }

        $(document).on('change' , '#ipe-nordetail-vat7' , function(){
            let vat3 = $('#ipe-nordetail-vat3').val();
            let vat7 = $('#ipe-nordetail-vat7').val();
            let priceNoneVat = $('#ipe-nordetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_edit_nor(vat3 , vat7 , priceNoneVat);
        });

        $(document).on('change' , '#ipe-nordetail-vat3' , function(){
            let vat3 = $('#ipe-nordetail-vat3').val();
            let vat7 = $('#ipe-nordetail-vat7').val();
            let priceNoneVat = $('#ipe-nordetail-priceNonVat').val().replace(/,/g, "");
            checkVatInputAll_edit_nor(vat3 , vat7 , priceNoneVat);
        });


        $(document).on('click' , '.norAddDetaile' , function(){
            $('#addnewdetaile-nor-modal').modal('show');
            clearAddnewDetailModal_nor();
        });

        $(document).on('click' , '.btneEditDept_nor' , function(){
            $('#nore-deptcode-addnew').prop('readonly' , false);
        });

        function clearAddnewDetailModal_nor()
        {
            $('#nore-deptcode-addnew').prop('readonly' , true);
            $('#nore-detaillist-addnew').val('');
            $('#nore-accode-addnew').val('');
            $('#nore-accodename-addnew').val('');
            $('#nore-price-addnew').val('');
            $('#frme_savenewdetailtoTbl_nor').removeClass('was-validated');
        }

        $(document).on('keyup' , '#nore-detaillist-addnew' , function(){
            if($(this).val() != ""){
                getAcCodeListe_nor($(this).val());
            }else{
                $('#showe-nor-accodelist').html('');
            }
        });
        function getAcCodeListe_nor(accodeInput)
        {
            if(accodeInput != ""){
                axios.post(url+'main/normal/getAcCodeList' , {
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
                                $('#showe-nor-accodelist').html(outputHtml);
                    }
                });
            }
        }

        $(document).on('click' , '.selectAcCodeListeLi' , function(){
            const data_detailwdf_name = $(this).attr("data_detailwdf_name");
            const data_detailwdf_accodename = $(this).attr("data_detailwdf_accodename");
            const data_detailwdf_accode = $(this).attr("data_detailwdf_accode");
            const data_detailwdf_id = $(this).attr("data_detailwdf_id");

            $('#nore-detaillist-addnew').val(data_detailwdf_name);
            $('#nore-accode-addnew').val(data_detailwdf_accode);
            $('#nore-accodename-addnew').val(data_detailwdf_accodename);
            $('#nore-autoid-addnew').val(data_detailwdf_id);
            $('#showe-nor-accodelist').html('');
        });


        $(document).on('keyup' , '#nore-price-addnew' , function(event){
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
                $('#btne-saveNorAddnewDetail').prop('disabled' , true);
                $('#alert-nore-price-addnew').html(alert);
            }else{
                $('#btne-saveNorAddnewDetail').prop('disabled' , false);
                $('#alert-nore-price-addnew').html('');
            }

        });



        $('#frme_savenewdetailtoTbl_nor').on('submit' , function(e){
            e.preventDefault();
            if($('#nore-detaillist-addnew').val() != "" && $('#nore-accode-addnew').val() != "" && $('#nore-accodename-addnew').val() != "" && $('#nore-deptcode-addnew').val() != "" && $('#nore-price-addnew').val() != ""){

                $('#btne-nor-saveAdvAddnewDetail').prop('disabled' , true);
                saveDetailDataToArraye_nor();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });
        function saveDetailDataToArraye_nor()
        {
            const detaillist = $('#nore-detaillist-addnew').val();
            const accode = $('#nore-accode-addnew').val();
            const accodename = $('#nore-accodename-addnew').val();
            const deptcode = $('#nore-deptcode-addnew').val();
            const price = $('#nore-price-addnew').val();
            const autoid = $('#nore-autoid-addnew').val();

            let saveDataDetail = {
                "detaillist":detaillist,
                "accode":accode,
                "accodename":accodename,
                "deptcode":deptcode,
                "price":price,
                "detailautoid":autoid
            }

            nor_addDetail_array.push(saveDataDetail);
            console.log(nor_addDetail_array);
            $('#btne-saveNorAddnewDetail').prop('disabled' , false);
            $('#addnewdetaile-nor-modal').modal('hide');
            load_normal_liste();
        }

        $(document).on('click' , '.del-nor-detailListe' , function(){
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
                    nor_addDetail_array.splice(data_detailIndex , 1);
                    load_normal_liste();
                }
            });

        });

        $('#frm_saveDataNormalNew_edit').on('submit' , function(e){
            e.preventDefault();
            if($('input:radio[name="ipe-nor-areaid"]').val() != "" && $('#ipe-nordetail-priceTotal').val() != ""){
                saveDataNormalNew_edit();
            }else{
                swal({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วยค่ะ',
                    type: 'error',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        });

        function saveDataNormalNew_edit()
        {
            const form = $('#frm_saveDataNormalNew_edit')[0];
            const data = new FormData(form);

            axios.post(url+'main/normal/saveDataNormalNew_edit' , data , {
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
                        location.href = url+'normal.html';
                    });
                }
            });
        }


        $(document).on('click' , '.del-file-edit-nor' , function(){
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
                    delFile_edit_nor(data_formcode , data_path , data_name);
                }
            });
        });
        function delFile_edit_nor(data_formcode , data_path , data_name)
        {
            if(data_formcode != "" && data_path != "" && data_name != ""){
                axios.post(url+'main/normal/delFile_edit_nor',{
                    action:"delFile_edit_nor",
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
                            loadfile_edit_nor(wdf_file);
                        });
                    }
                });
            }
        }


        
        function getNorCurrencyFromDb_edit(currency)
        {
            axios.get(url+'main/normal/getNorCurrencyFromDb').then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let output = ``;
                    for(let i = 0; i < result.length ; i++){
                        output +=`
                        <option value="`+result[i].cu_name+`">`+result[i].cu_name+`</option>
                        `;
                    }
                    $('#ipe-nor-currency').html(output);

                    $('#ipe-nor-currency option[value="'+currency+'"]').prop("selected" , true);
                    if(currency !== "THB"){
                        $('#ipe-nordetail-vat7').attr("style", "pointer-events: none;");
                        $('#ipe-nordetail-vat3').attr("style", "pointer-events: none;");
                    }else{
                        $('#ipe-nordetail-vat7').attr("style", "pointer-events: ;");
                        $('#ipe-nordetail-vat3').attr("style", "pointer-events: ;");
                    }
                    if(currency !== ""){
                        $('.bgBath').text(currency);
                        $('.bgBath2').text(currency);
                    }

                    $(document).on('change' , '#ipe-nor-currency' , function(){
                        if($(this).val() !== ""){
                            $('.bgBath').text($(this).val());
                            $('.bgBath2').text($(this).val());
                        }

                        $('#ipe-nordetail-vat3').val("0");
                        $('#ipe-nordetail-vat7').val("0")

                        let vat3 = $('#ipe-nordetail-vat3').val();
                        let vat7 = $('#ipe-nordetail-vat7').val();
                        let priceNoneVat = $('#ipe-nordetail-priceNonVat').val().replace(/,/g, "");

                        if($(this).val() !== "THB"){
                            $('#ipe-nordetail-vat7').attr("style", "pointer-events: none;");
                            $('#ipe-nordetail-vat3').attr("style", "pointer-events: none;");
                            vat3 = 0;
                            vat7 = 0;
                        }else{
                            $('#ipe-nordetail-vat7').attr("style", "pointer-events: ;");
                            $('#ipe-nordetail-vat3').attr("style", "pointer-events: ;");
                        }

                        checkVatInputAll_edit_nor(vat3 , vat7 , priceNoneVat);
                    });
                }
            });
        }

        






    });
</script>