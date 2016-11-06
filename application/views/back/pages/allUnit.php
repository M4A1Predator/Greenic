<article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title">
					รายการหน่วยทั้งหมด
					<a href="<?=base_url_admin().'unit/add'?>" class="btn btn-primary btn-sm rounded-s"><em class="fa fa-plus"></em> เพิ่มหน่วยตวงวัดสินค้า</a><!---->
                    <div class="action dropdown">
						<!--<button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
						<!--	คำสั่งจำนวนมาก-->
						<!--</button>-->
						<!--<div class="dropdown-menu" aria-labelledby="dropdownMenu1">-->
						<!--	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-close icon"></i>ลบทั้งหมดที่เลือก</a>-->
						<!--</div>-->
					</div>
				</h3>
                                    <p class="title-description"> รายการหน่วยตวงวัดสินค้าทั้งหมดในเว็บไซต์ </p>
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <!--<form class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control boxed rounded-s" placeholder="ค้นหาหน่วยตวงวัด"> <span class="input-group-btn">
                                    <button class="btn btn-secondary rounded-s" type="button">
                                            <i class="fa fa-search"></i>
                                    </button>
                                    </span>
                                </div>
                            </form>-->
                        </div>
                    </div>
                    <div class="card items">
                        <ul class="item-list striped">
                            <li class="item item-list-header hidden-sm-down">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items">
						<input type="checkbox" class="checkbox">
						<span></span>
					</label> </div>
                                    <div class="item-col item-col-header item-col-title">
                                        <div> <span>ชื่อหน่วย</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-sales">
                                        <div> <span>การใช้งาน</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-date">
                                        <div> <span>วันที่เพิ่ม</span> </div>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                                </div>
                            </li>
                            <?php foreach($units as $unit){ ?>
                            <li class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items"><input type="checkbox" class="checkbox"><span></span></label> </div>
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">ชื่อบทความ</div>
                                        <div>
                                            <a>
                                                <h4 class="item-title"><?=$unit->unit_name ?></h4> </a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div class="item-heading">การใช้งาน</div>
                                        <div><?=$unit->project_count?> รายการ</div>
                                    </div>
                                    <div class="item-col item-col-date">
                                        <div class="item-heading">วันที่เพิ่ม</div>
                                        <div class="no-overflow"> <?=$unit->unit_datetime?> </div>
                                    </div>
                                    <div class="item-col fixed item-col-actions-dropdown">
                                        <div class="item-actions-dropdown">
                                            <a class="item-actions-toggle-btn"> <span class="inactive"><i class="fa fa-cog"></i></span> <span class="active"><i class="fa fa-chevron-circle-right"></i></span> </a>
                                            <div class="item-actions-block">
                                                <ul class="item-actions-list">
                                                    <?php if($unit->project_count == 0){ ?>
                                                    <li><a class="remove" id="removeUnitBtn-<?=$unit->unit_id?>" href="#"> <i class="fa fa-trash-o "></i> </a></li>
                                                    <?php } ?>
                                                    <li><a class="edit" href="<?=base_url_admin().'unit/'.$unit->unit_id?>"> <i class="fa fa-pencil"></i> </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                           <?php } ?>
                            
                        </ul>
                    </div>
                <nav class="text-xs-right">
                </nav>
            </article>

<div class="modal fade" id="removeUnitModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4>
            </div>
            <div class="modal-body">
                <p>ไม่สามารถลบได้</p>
            </div>
            <!--<div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button> <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> </div>-->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    
    $('[id^="removeUnitBtn-"]').click(function (){
        removeUnitId = getElementIdFromId($(this).prop('id'));
        param = {
            unit_id : removeUnitId,
        };
        console.log(param);
        
        $.ajax({
            type : 'post',
            url : webUrl + 'gnc_admin/unit/remove',
            data : param,
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                $('#removeUnitModal').modal('toggle');
                return;
            }
            
            location.reload();
        });
        
    });
    
    
</script>