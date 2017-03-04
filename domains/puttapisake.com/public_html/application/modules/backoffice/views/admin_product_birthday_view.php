<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#product_birthday').DataTable( {
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 4,5 ] }
            ]
        } );

        $('#product_type_ID').change(function(){
            $('#product_group_ID').html('');
             $('#product_product_ID').html('');
            $.post('<?=base_url('backoffice/admin/ajax_product_type/')?>/'+$(this).val(),function(data){
                var data = $.parseJSON(data);
                var select = '<option value="">เลือก</option>';
                $.each(data.result,function(i,d){
                    select += '<option value="'+ d.product_group_ID +'">'+ d.product_group_Name+'</option>';
                });
                $('#product_group_ID').html(select);
            });
        });
        
         $('#product_group_ID').change(function(){
             if($(this).val() != ''){
                    $.post('<?=base_url('backoffice/admin/ajax_get_product/')?>/'+$(this).val(),function(data){
                        var data = $.parseJSON(data);
                        var select = '<option value="">เลือก</option>';
                        $.each(data.result,function(i,d){
                            select += '<option value="'+ d.product_ID +'">'+ d.product_Name+'</option>';
                        });
                        $('#product_product_ID').html(select);
                    });
           }
        });
        
        
    } );

    function changeStatus(product_birthday_ID, product_birthday_Status) {
        var send = {
            "product_birthday_ID": product_birthday_ID,
            "product_birthday_Status": product_birthday_Status

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_product_birthday",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    location.reload();
//
                }
            }
        })
    }

    function edit(product_birthday_ID)
    {
        var send = {"product_birthday_ID": product_birthday_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_product_birthday_ID",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#product_birthday_ID").val(product_birthday_ID);

                        $("#product_birthday_Day option[value='" + value.product_birthday_Day + "']").attr("selected", true);

                    });
                }
            }
        })
    }

    function delete_product_birthday(product_birthday_ID)
    {
        var send = {"product_birthday_ID": product_birthday_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_product_birthday_ID",
            type: "POST",
            data: send,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#product_birthday_ID1").val(product_birthday_ID);

                    });
                }
            }
        })
    }

</script>

<div class="x_title">
    <h2>จัดการสินค้าตามวันเกิด</h2>
</div>

<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>

    <!-- เพิ่ม -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มสินค้าตามวันเกิด</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มสินค้าตามวันเกิด</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="add_product_birthday/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="product_type_ID" name="product_type_ID" >
                                        <option value="">-- เลือกประเภทสินค้า --</option>
                                        <?php
                                        foreach($data_product_type as $type)
                                        {
                                            echo "<option value=\"" . $type['product_type_ID'] . "\">" .$type['product_type_Name']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">กลุ่มสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="product_group_ID" name="product_group_ID" >
                                        <option value="">-- เลือกกลุ่มสินค้า --</option>
                                        <?php
                                        foreach($data_product_group as $group)
                                        {
                                            echo "<option value=\"" . $group['product_group_ID'] . "\">" .$group['product_group_Name']. "</option>";

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">สินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required" id="product_product_ID" name="product_product_ID" >
                                        <option value="">-- เลือกสินค้า --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วัน</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <label class="radio inline">
                                        <input  class="" id="select_all_day" type="checkbox" value="0" name="aa[]"> ทุกวัน
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-sm-12 col-xs-9">
                                    <div id="select_day">
                                        <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                            <input id="CanclStatuse" class="" type="checkbox" value="Sunday" name="ConfirmStatus[]"> วันอาทิตย์
                                        </label>
                                        <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                            <input id="CanclStatuse" class="" type="checkbox" value="Monday" name="ConfirmStatus[]"> วันจันทร์
                                        </label>
                                        <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                            <input id="CanclStatuse" class="" type="checkbox" value="Tuesday" name="ConfirmStatus[]"> วันอังคาร
                                        </label>
                                        <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                            <input id="CanclStatuse" class="" type="checkbox" value="Wednesday" name="ConfirmStatus[]"> วันพุธ
                                        </label>
                                        <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                            <input id="CanclStatuse" class="" type="checkbox" value="Thursday" name="ConfirmStatus[]"> วันพฤหัสบดี
                                        </label>
                                        <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                            <input id="CanclStatuse" class="" type="checkbox" value="Friday" name="ConfirmStatus[]"> วันศุกร์
                                        </label>
                                        <label class="radio inline col-md-3 col-sm-3 col-xs-9">
                                            <input id="CanclStatuse" class="" type="checkbox" value="Saturday" name="ConfirmStatus[]"> วันเสาร์
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $('#select_all_day').change(function() {
                                    $('#select_day input[type="checkbox"]').prop('checked', this.checked);
                                });
                            </script>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /เพิ่ม -->

    <!-- แก้ไข -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="edit_product_birthday_Day/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">วัน</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input type="hidden" id="product_birthday_ID" name="product_birthday_ID">

                                    <select class="form-control col-md-7 col-xs-12 required " id="product_birthday_Day" name="product_birthday_Day" >
                                        <option value="Sunday">วันอาทิตย์</option>
                                        <option value="Monday">วันจันทร์</option>
                                        <option value="Tuesday">วันอังคาร</option>
                                        <option value="Wednesday">วันพุธ</option>
                                        <option value="Thursday">วันพฤหัสบดี</option>
                                        <option value="Friday">วันศุกร์</option>
                                        <option value="Saturday">วันเสาร์</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /แก้ไข -->

    <!-- ลบ -->
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบสินค้าสินค้าตามวันเกิด</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_product_birthday/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <input type="hidden" name="product_birthday_ID1" id="product_birthday_ID1">

                                <label>คุณแน่ใจหรือว่าต้องการลบสินค้าตามวนเกิดนี้</label>
                                <label>(การลบข้อมูลนี้อาจทำให้เกิดการ ERROR ของข้อมูลอื่นๆ)</label>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ลบ</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /ลบ -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product_birthday" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="5%"><center><span>ลำดับ</span></center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="55%"><span>ชื่อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><center><span>วัน</span></center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><center><span>สถาณะ</span></center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="5%"><center><span>แก้ไข</span></center></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="5%"><center><span>ลบ</span></center></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($data_product_birthday as $key => $product_birthday) {

                ?>
                <tr class="pointer odd">
                    <td>
                        <center><span><?=$key+1?></span></center>
                    </td>
                    <td><span><?=$product_birthday['product_Name']?></span></td>
                    <td>
                        <center>
                            <span>
                                <?php
                                if($product_birthday['product_birthday_Day']=='Sunday'){
                                    echo 'วันอาทิตย์';
                                }
                                elseif($product_birthday['product_birthday_Day']=='Monday'){
                                    echo 'วันจันทร์';
                                }
                                elseif($product_birthday['product_birthday_Day']=='Tuesday'){
                                    echo 'วันอังคาร';
                                }
                                elseif($product_birthday['product_birthday_Day']=='Wednesday'){
                                    echo 'วันพุธ';
                                }
                                elseif($product_birthday['product_birthday_Day']=='Thursday'){
                                    echo 'วันพฤหัสบดี';
                                }
                                elseif($product_birthday['product_birthday_Day']=='Friday'){
                                    echo 'วันศุกร์';
                                }
                                elseif($product_birthday['product_birthday_Day']=='Saturday'){
                                    echo 'วันเสาร์';
                                }



                                ?>
                            </span>
                        </center>
                    </td>
                    <td class=" last ">
                        <?php if($product_birthday['product_birthday_Status'] == 1){
                            $btn_color = "success";
                            $btn_tag = "Active";
                        }
                        else
                        {
                            $btn_color = "danger";
                            $btn_tag = "UnActive";
                        }
                        ?>
                        <button style="width: 60px;" class="btn btn-<?php echo $btn_color;?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $product_birthday['product_birthday_ID'] ?>', '<?php echo $product_birthday['product_birthday_Status']; ?>')"><?php echo $btn_tag;?></button>
                    </td>
                    <td>
                        <center><span><a href="#" onclick="edit('<?php echo $product_birthday['product_birthday_ID'] ?>')"><i class="fa fa-clipboard" data-toggle="modal"
                                                                data-target=".bs-example-modal-sm2"></i></a></span>
                        </center>
                    </td>
                    <td>
                        <center><span><a href="#"onclick="delete_product_birthday('<?php echo $product_birthday['product_birthday_ID'] ?>');"><i class="fa fa-times" data-toggle="modal"
                                                                data-target=".CheckDel"></i></a></span></center>
                    </td>
                </tr>
                <?
            }
            ?>
            </tbody>

        </table>
    </div>
</div>