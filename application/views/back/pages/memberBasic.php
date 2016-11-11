<article class="content items-list-page">
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title">
        รายชื่อสมาชิกทั่วไป
            <div class="action dropdown">
                <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    คำสั่งจำนวนมาก
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-trash-o icon"></i>ลบสมาชิกอย่างถาวร</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-pause icon"></i>ระงับการใช้งานชั่วคราว</a>
                </div>
            </div>
            </h3>
                    <p class="title-description"> รายชื่อสมาชิกทั่วไปที่ยังไม่ได้เริ่มต้นเป็นเกษตรกร </p>
                    </div>
                </div>
            </div>
            <div class="items-search">
                <form class="form-inline">
                    <div class="input-group"> <input type="text" class="form-control boxed rounded-s" placeholder="ค้นหาโดยชื่อ-สกุล"> <span class="input-group-btn">
            <button class="btn btn-secondary rounded-s" type="button">
                <i class="fa fa-search"></i>
            </button>
    </span> </div>
                </form>
            </div>
        </div>
                    <div class="card items">
                        <ul class="item-list striped" id="memberList">
                            <li class="item item-list-header hidden-sm-down">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items">
                                        <input type="checkbox" class="checkbox">
                                        <span></span>
                                        </label>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-img md">
                                        <div> <span>ภาพ</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-title">
                                        <div> <span>ชื่อ - นามสกุล</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-sales">
                                        <div> <span>รายการที่กดติดตาม</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-author">
                                        <div class="no-overflow"> <span>ที่อยู่</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-date">
                                        <div> <span>วันที่สมัคร</span> </div>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                                </div>
                            </li>
                            
                            <?php foreach($members as $member){ ?>
                            <?php if($member->member_status_id == $this->Status->status_banned_id){
                                    $member_state = ' (banned)';
                                }else{
                                    $member_state = '';
                                }
                            ?>
                            <li class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check">
                                        <label class="item-check" id="select-all-items">
                                            <input type="checkbox" class="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="item-col fixed item-col-img md">
                                        <a href="?page=basicDetail">
                                            <div class="item-img rounded" style="background-image: url(<?=base_url().$member->member_img_path?>)"></div>
                                        </a>
                                    </div>
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">ชื่อ-สกุล</div>
                                        <div>
                                            <a href="<?=base_url()?>gnc_admin/basicDetail/<?=$member->member_id?>" title="คลิกเพื่อดูข้อมูลสมาชิก"><h4 class="item-title"><?=$member->member_firstname?> <?=$member->member_lastname?></h4> <?=$member_state?></a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div class="item-heading">รายการที่ติดตาม</div>
                                        <div><a href="?page=memberFollowShow" title="ดูการติดตามทั้งหมด"><?=$member->follow_count?> รายการ</a></div>
                                    </div>
                                    <div class="item-col item-col-author">
                                        <div class="item-heading">ที่อยู่</div>
                                        <div class="no-overflow"> <a href="?page=basicDetail" title="คลิกเพื่อดูข้อมูลสมาชิก"><?=$member->member_district.' '.$member->member_sub_district?></a> </div>
                                    </div>
                                    <div class="item-col item-col-date">
                                        <div class="item-heading">วันที่สมัคร</div>
                                        <div class="no-overflow"><?=display_date_th($member->member_regis_time)?></div>
                                    </div>
                                    <div class="item-col fixed item-col-actions-dropdown">
                                        <div class="item-actions-dropdown">
                                            <a class="item-actions-toggle-btn"> <span class="inactive">
                                                <i class="fa fa-cog"></i>
                                            </span>
                                    <span class="active">
                                    <i class="fa fa-chevron-circle-right"></i>
                                    </span> </a>
                                             <div class="item-actions-block">
                                                <ul class="item-actions-list">
                                                    <li>
                                                        <a class="remove" id="removeMember-<?=$member->member_id?>" href="#"  title="ลบสมาชิกคนนี้"> <i class="fa fa-trash-o "></i> </a>
                                                    </li>
                                                    <li>
                                                        <?php if($member->member_status_id == $this->Status->status_normal_id){ ?>
                                                        <a class="remove" id="banMember-<?=$member->member_id?>" href="#" title="ระงับการใช้งานชั่วคราว"> <i class="fa fa-ban"></i> </a>
                                                        <?php } ?>
                                                        <?php if($member->member_status_id == $this->Status->status_banned_id){ ?>
                                                        <a class="" id="unbanMember-<?=$member->member_id?>" href="#" title=""> <i class="fa fa-child"></i> </a>
                                                        <?php } ?>
                                                        
                                                    </li>
                                                    <li>
                                                        <a class="edit" href="?page=memberEdit" title="แก้ไขข้อมูล"> <i class="fa fa-pencil"></i> </a>
                                                    </li>
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
                <?php
                    $page_amount = 1;
                    if($member_count % $limit === 0){
                        $page_amount = $member_count / $limit;
                    }else{
                        $page_amount = ($member_count / $limit) + 1;
                    }
                ?>
                <ul class="pagination">


                    <?php for($i=1;$i<=$page_amount;$i++){ ?>
                    <li class="page-item active">
                        <a class="page-link" href=""><?=$i?></a>
                    </li>
                    <?php } ?>

                    <!--<li class="page-item"> <a class="page-link" href="">
        ก่อนหน้า
    </a> </li>

                    <li class="page-item"> <a class="page-link" href="">
        ถัดไป
    </a> </li>-->
                </ul>
            </nav>
        </article>


<script>
    
    $('[id^="removeMember-"]').click(function (){
        removeItemId = getElementIdFromId($(this).prop('id'));
        param = {
            remove_member_id : removeItemId,
        };
        console.log(param);
        
        $.ajax({
            type : 'post',
            url : webUrl + 'gnc_admin/member/remove',
            data : param,
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                $('#cannotRemoveModal').modal('toggle');
                return;
            }
            
            location.reload();
        });
        
    });
    
    $('[id^="banMember-"]').click(function (){
        removeItemId = getElementIdFromId($(this).prop('id'));
        param = {
            remove_member_id : removeItemId,
        };
        console.log(param);
        
        $.ajax({
            type : 'post',
            url : webUrl + 'gnc_admin/member/ban',
            data : param,
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                $('#cannotRemoveModal').modal('toggle');
                return;
            }
            
            location.reload();
        });
        
    });
    
    $('[id^="unbanMember-"]').click(function (){
        removeItemId = getElementIdFromId($(this).prop('id'));
        param = {
            remove_member_id : removeItemId,
        };
        console.log(param);
        
        $.ajax({
            type : 'post',
            url : webUrl + 'gnc_admin/member/unban',
            data : param,
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                $('#cannotRemoveModal').modal('toggle');
                return;
            }
            
            location.reload();
        });
        
    });
    
    
</script>
