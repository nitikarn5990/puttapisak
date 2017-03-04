<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

<script style="text/javascript">
    $(document).ready( function () {
        $('#product').DataTable();
    } );

</script>
<div class="x_title">
    <h2>จัดการสินค้า..</h2>
</div>

<div class="x_content">
    <!-- เพิ่มสินค้า -->
    <button type="button" class="btn btn-round btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">เพิ่มสินค้า</button>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">เพิ่มสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="" name="" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="" name="" >
                                        <option value="">-- เลือกประเภทสินค้า --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">กลุ่มสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="" name="" >
                                        <option value="">-- เลือกกลุ่มสินค้า --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ขนาดสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="" name="" type="text" placeholder="กรุณากรอกเฉพาะตัวเลขเท่านั้น">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หน่วยวัดของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="" name="" type="text" placeholder="กรุณากรอกเฉพาะตัวเลขเท่านั้น">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ราคาของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="" name="" type="text" placeholder="กรุณากรอกเฉพาะตัวเลขเท่านั้น">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="" id="" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="btn btn-primary" type="file" name="" id="">
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
    <!-- /เพิ่มสินค้า -->

    <!-- แก้ไขสินค้า -->
    <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">แก้ไขข้อมูลสินค้า</h4>
                </div>
                <form class="form-horizontal form-label-left" novalidate="" method="post" id="" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ชื่อสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="" name="" type="text" placeholder="กรุณากรอก">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">ประเภทสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="" name="" >
                                        <option value="">-- เลือกประเภทสินค้า --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">กลุ่มสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <select class="form-control col-md-7 col-xs-12 required " id="" name="" >
                                        <option value="">-- เลือกกลุ่มสินค้า --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">หน่วยวัดของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="form-control col-md-7 col-xs-12 required" id="" name="" type="text" placeholder="กรุณากรอกเฉพาะตัวเลขเท่านั้น">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รายละเอียดของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <textarea class="form-control" rows="3" name="" id="" placeholder="กรุณากรอกข้อมูล"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">รูปภาพของสินค้า</label>
                                <div class="col-md-7 col-sm-7 col-xs-9">
                                    <input class="btn btn-primary" type="file" name="" id="">
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
    <!-- /แก้ไขสินค้า -->

    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
        <div class="clear"></div>
        <div class="dataTables_filter" id="example_filter">
        </div>
        <table id="product" class="table table-striped responsive-utilities jambo_table dataTable display" aria-describedby="example_info">
            <thead>
            <tr class="headings" role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">ลำดับ</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">รูปภาพสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">ชื่อสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">ประเภทสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">กลุ่มสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">หน่วยวัด</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 102px;"><span style="text-align:center">ขนาด/ราคาของสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">สถาณะสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">แก้ไขสินค้า</span></th>
                <th class="" role="columnheader" tabindex="0" aria-controls="example"  style="width: 239px;"><span style="text-align:center">ลบสินค้า</span></th>
            </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <tr class="pointer odd">
                <td class=" "><span style="text-align:center">1</span></td>
                <td class=" "><span style="text-align:center">ชื่อสินค้า</span></td>
                <td class=" "><span style="text-align:center">ชื่อสินค้า</span></td>
                <td class=" "><span style="text-align:center">ประเภทสินค้า</span></td>
                <td class=" "><span style="text-align:center">กลุ่มสินค้า</span></td>
                <td class=" "><span style="text-align:center">กลุ่มสินค้า</span></td>
                <td><span style="text-align:center"><a href="product_sap.html"><i class="fa fa-cogs"></i></a></span></td>
                <td class=" "><span style="text-align:center"><button class="btn btn-success btn-xs">Active</button></span></td>
                <td><span style="text-align:center"><a href="#" onclick="edit_leavetype('<?php //echo $db['leaveType_ID'] ?>');"><i class="fa fa-clipboard" data-toggle="modal" data-target=".bs-example-modal-sm2"></i></a></span></td>
                <td><span style="text-align:center"><a href="#" onclick="delete_leavetype('<?php //echo $db['leaveType_ID'] ?>');"><i class="fa fa-times"></i></a></span></td>
            </tr>
            </tbody>

        </table>
    </div>
</div>