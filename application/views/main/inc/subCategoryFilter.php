<div class="row fillterBar margin-bottom-20">
    <div class="col-xs-4 col-md-6">
    <button class="btn-u rounded btn-u-dark" data-toggle="modal" data-target="#fillterBox" type="button"><i class="fa fa-filter" aria-hidden="true"></i> กรองสินค้า</button>        
    <div class="modal fade bs-example-modal-sm" id="fillterBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="#" class="sky-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel4">เลือกข้อมูลที่ต้องการกรอง</h4>
                    </div>
                    <div class="modal-body">
                        <div class="margin-bottom-10">
                            <select class="form-control province" id="projectProvince">
                               <option value="0">ทุกจังหวัด</option>
                            </select>
                        </div>
                        <div class="margin-bottom-10">
                            <select class="form-control district" id="projectDistrict">
                               <option>ทุกอำเภอ</option>
                            </select>
                        </div>
                        <form action="#" class="sky-form">
                                <label class="radio"><input type="radio" name="radio" checked=""><i class="rounded-x"></i>สินค้าทั้งหมด</label>
                                <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>สินค้าพร้อมขาย</label>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ปิดหน้าต่าง</button>
                        <button type="button" class="btn-u btn-u-primary"><i class="fa fa-filter"></i> ดำเนินการ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <div class="col-xs-8 col-md-3 text-right">
        <form action="#" class="sky-form">
            <label class="select sort">
                <select>
                    <option value="0">เรียงตามวันที่</option>
                    <option value="1">ราคา น้อย > มาก</option>
                    <option value="2">ราคา มาก > น้อย</option>
                    <option value="3">ความนิยม</option>
                    <option value="4">คะแนนโหวต</option>
                </select>
                <i></i>
            </label>
        </form>
    </div>
    <!--แสดงส่วนนี้เมื่อมีสายพันธุ์เท่านั้น-->
    <div class="col-xs-12 col-md-3 text-right">
        <form action="#" class="sky-form">
                <label class="select sort">
                    <select id="subCategorySelect">
                        <option value="0">เลือกสายพัน</option>
                    </select>
                    <i></i>
                </label>
        </form>
    </div>
    <!--จบฟิลเตอร์สายพันธุ์-->
</div>
<div style="clear:both;"></div>