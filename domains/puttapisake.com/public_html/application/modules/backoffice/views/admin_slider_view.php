<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">

    $(document).ready( function () {
        $('#slider').DataTable( {
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 1,2,5,6] }
            ]
        } );
    } );

    function changeStatus(slider_ID, slider_Status) {
        var send = {
            "slider_ID": slider_ID,
            "slider_Status": slider_Status

        }
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/update_status_slider",
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

    function edit_slider(slider_ID)
    {
        var send = {"slider_ID": slider_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/get_slider_byID",
            method: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#edit_slider_ID").val(slider_ID);
                        $("#edit_slider_Title").val(value.slider_Title);
                        $("#edit_slider_Number").val(value.slider_Number);
                        $("#edit_slider_Detail").val(value.slider_Detail);
                    });
                }
            }
        });
    }
    function delete_slider(slider_ID)
    {
        var send = {"slider_ID": slider_ID};
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/Admin/get_slider_byID",
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
                        $("#del_slider_ID").val(slider_ID);
                        $("#del_slider_Picture").val(value.slider_Picture);
                    });
                }
            }
        })
    }
    function edit_pic(slider_ID)
    {
        var send = {"slider_ID": slider_ID}
        $.ajax
        ({
            url: "<?php echo base_url()?>backoffice/admin/data_edit_pic_slider",
            type: "POST",
            data: send,
            dataType: "json",
            success: function(data)
            {
//                console.log(data);
                if(data)
                {
                    $("#modal-sizes-3").modal('show');
                    $.each(data, function(key, value)
                    {
                        $("#edit_slider_ID").val(value.slider_ID);
                        $("#edit_slider_Picture").val(value.slider_Picture);

                        $("#edit_slider_Picture11").attr('src','<?php echo base_url('assets/pic_slider')?>/'+value.slider_Picture);
                    });
                }
            }
        });
    }
</script>
<div class="x_title">
    <h2>จัดการสไลด์ภาพหน้าหลัก</h2>
</div>

<div class="x_content">
    <?php echo $this->session->flashdata('msg'); ?>
    <!-- เพิ่มสไลด์ภาพหน้าหลัก -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มสไลด์ภาพหน้าหลัก</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มสไลด์ภาพหน้าหลัก</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="add_slider/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อ</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="1" name="slider_Title" id="slider_Title" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ลำดับสไลด์<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" required="required" id="" name="" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของภาพ</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="slider_Detail" id="slider_Detail" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพหลักของสไลด์ภาพหน้าหลัก</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="btn btn-primary" type="file" name="slider_Picture" id="slider_Picture" accept="pic_slider/*">
                                </div>
                            </div>

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
    <!-- /เพิ่มสไลด์ภาพหน้าหลัก -->

    <!-- แก้ไขสไลด์ภาพหน้าหลัก -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลสไลด์ภาพหน้าหลัก</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="update_slider/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <input type="hidden" id="edit_slider_ID" name="edit_slider_ID">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หัวข้อ</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="1" name="edit_slider_Title" id="edit_slider_Title" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ลำดับสไลด์</label>
                                <div class="col-md-4 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="edit_slider_Number" name="edit_slider_Number" type="text" placeholder="กรุณากรอกเฉพาะตัวเลขเท่านั้น">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของภาพ</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="edit_slider_Detail" id="edit_slider_Detail" placeholder="กรุณากรอกข้อมูล"></textarea>
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
    <!-- /แก้ไขสไลด์ภาพหน้าหลัก -->

    <!-- แก้ไขรูปภาพ -->
    <div class="modal fade edit-pic1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขรูปภาพ</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="edit_pic_slider/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <center>
                                            <label class="col-md-12">รูปภาพของสไลด์ภาพหน้าหลัก</label></br>
                                            <input type="hidden" id="edit_slider_ID" name="edit_slider_ID">
                                            <input type="hidden" id="edit_slider_Picture" name="edit_slider_Picture"></br>
                                            <img id="edit_slider_Picture11" style="width: 200px;" src="<?php echo base_url()?>assets/pic_slider/slider_Picture" alt=""></br>&nbsp;</br>
                                            <input class="btn btn-primary" type="file" name="edit_slider_Picture11" id="edit_slider_Picture11" accept="pic_slider/*"></br>
                                        </center>
                                    </div>
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

    <!-- /แก้ไขรูปภาพ -->

    <!-- ลบสไลด์ภาพหน้าหลัก -->
    <div class="modal fade CheckDel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">ยืนยันการลบสไลด์หน้าหลัก</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" action="delete_slider/" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group" align="center" style="color: red">
                                <input type="hidden" name="del_slider_ID" id="del_slider_ID">
                                <input type="hidden" name="del_slider_Picture" id="del_slider_Picture">

                                <label>คุณแน่ใจหรือว่าต้องการลบสไลด์หน้าหลัก</label>
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
    <!-- /ลบสไลด์ภาพหน้าหลัก -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="slider" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>รูปภาพ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="35%"><span>หัวข้อ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="15%"><span>ลำดับสไลด์</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>สถาณะ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>แก้ไข</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example" width="10%"><span>ลบ</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach($data_slider as $key => $sl){?>
                <tr class="pointer odd">
                    <td><span style="text-align:center"><?=$key+1;?></span></td>
                    <td>
                    <span style="text-align:center"><a href="#" onclick="edit_pic('<?php echo $sl['slider_ID'] ?>');"><i data-toggle="modal" data-target=".edit-pic1"><img src="<?php echo base_url('assets/pic_slider/'. $sl['slider_Picture']);?>" width="133" height="133"/></i></a></span>
                    </td>
                    <td><span style="text-align:center"><?=$sl['slider_Title'];?></span></td>
                    <td><span style="text-align:center"><?=$sl['slider_Number'];?></span></td>
                    <td class=" last ">
                        <?php if($sl['slider_Status'] == 1){
                            $btn_color = "success";
                            $btn_tag = "Active";
                        }
                        else
                        {
                            $btn_color = "danger";
                            $btn_tag = "UnActive";
                        }
                        ?>
                        <button style="width: 60px;" class="btn btn-<?php echo $btn_color;?> btn-xs" id="stt_emp" onclick="changeStatus('<?php echo $sl['slider_ID'] ?>', '<?php echo $sl['slider_Status']; ?>')"><?php echo $btn_tag;?></button>
                    </td>
                    <td><span style="text-align:center"><a href="#" onclick="edit_slider('<?php echo $sl['slider_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span></td>
                    <td><span style="text-align:center"><a href="#" onclick="delete_slider('<?php echo $sl['slider_ID'] ?>');"><i class="fa fa-times" data-toggle="modal" data-target=".CheckDel"></i></a></span></td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>
</div>