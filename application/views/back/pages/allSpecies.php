<article class="content items-list-page">
            <div class="title-search-block">
                <div class="title-block">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="title">
            ชนิดของผลผลิต
            <a href="<?=base_url().'gnc_admin/category/add'?>" class="btn btn-primary btn-sm rounded-s"><i class="fa fa-plus"></i> เพิ่มชนิดใหม่</a><!---->
            <!--<div class="action dropdown">-->
            <!--    <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
            <!--        คำสั่งจำนวนมาก-->
            <!--    </button>-->
            <!--    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">-->
            <!--        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-close icon"></i>ลบทั้งหมดที่เลือก</a>-->
            <!--    </div>-->
            <!--</div>-->
        </h3>
                            <p class="title-description"> <!--Species--><?=get_project_type_thai_text($project_type_id)?> </p>
                        </div>
                    </div>
                </div>
                <div class="items-search">
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" id="categorySearch" value="<?=$keyword?>" class="form-control boxed rounded-s" placeholder="ค้นหาชนิด">
                            <span class="input-group-btn">
                                <button id="categorySearchBtn" class="btn btn-secondary rounded-s" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
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
                                <div> <span>ชื่อชนิด</span> </div>
                            </div>
                            <div class="item-col item-col-header item-col-sales">
                                <div> <span>จำนวนโปรเจ็ค</span> </div>
                            </div>
                            <div class="item-col item-col-header item-col-category">
                                <div class="no-overflow"> <span>ประเภท</span> </div>
                            </div>
                            
                            <div class="item-col item-col-header item-col-author">
                                <div class="no-overflow"> <span>สายพันธุ์</span> </div>
                            </div>
                            <div class="item-col item-col-header item-col-date">
                                <div> <span>วันที่ลง</span> </div>
                            </div>
                            <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                        </div>
                    </li>
                    <?php foreach($categories as $category){ ?>
                    <li class="item">
                        <div class="item-row">
                            <div class="item-col fixed item-col-check">
                                    <label class="item-check" id="select-all-items">
                                    <input type="checkbox" class="checkbox"><span></span></label> 
                            </div>
                            <div class="item-col fixed pull-left item-col-title">
                                <div class="item-heading">ชื่อชนิด</div>
                                <div>
                                    <a href="<?=base_url_admin().'category/'.$category->category_id.'/breeds'?>" class="">
                                        <h4 class="item-title"><?=$category->category_name?></h4> </a>
                                </div>
                            </div>
                            <div class="item-col item-col-sales">
                                <div class="item-heading">จำนวนโปรเจ็ค</div>
                                <div> <?=$category->project_count?> รายการ </div>
                            </div>
                            <div class="item-col item-col-category no-overflow">
                                <div class="item-heading">ประเภท</div>
                                <!--<div class="no-overflow"> <?=get_project_type_thai_text((int)$project_type_id)?></div>-->
                                <div class="no-overflow"> <?=get_project_type_thai_text((int)$category->category_project_type_id)?></div>
                            </div>
                            <div class="item-col item-col-author">
                                <div class="item-heading">สายพันธุ์</div>
                                <div class="no-overflow"> <a href="<?=base_url().'gnc_admin/category/'.$category->category_id.'/breeds'?>">คลิกเพื่อดูสายพันธุ์ทั้งหมด(<?=$category->breed_count?>)</a> </div>
                            </div>
                            <div class="item-col item-col-date">
                                <div class="item-heading">วันที่ลง</div>
                                <div class="no-overflow"> <?=$category->category_datetime?> </div>
                            </div>
                            <div class="item-col fixed item-col-actions-dropdown">
                                <div class="item-actions-dropdown">
                                    <a class="item-actions-toggle-btn"> <span class="inactive">
                            <i class="fa fa-cog"></i>
                        </span> <span class="active">
                        <i class="fa fa-chevron-circle-right"></i>
                        </span> </a>
                                    <div class="item-actions-block">
                                        <ul class="item-actions-list">
                                            <?php if((int)$category->project_count == 0){?>
                                            <li>
                                                <a class="remove" id="removeCategory-<?=$category->category_id?>" href="#"> <i class="fa fa-trash-o "></i> </a>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a class="edit" href="<?=base_url().'gnc_admin/category/'.$category->category_id.'/edit'?>"> <i class="fa fa-pencil"></i> </a>
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
                <ul class="pagination">
                    <?php for($i=1;$i<=$page_amount;$i++){ ?>
                    <?php
                        $class = '';
                        if($i == $page_num){
                            $class = 'active';
                        }
                    ?>
                    <li class="page-item <?=$class?>"> <a class="page-link" href="?p=<?=$i?>"><?=$i?></a></li>
                    <?php } ?>
               </ul>
            </nav>
        </article>

<div class="modal fade" id="removeCategoryModal">
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
    var categorySearch = $('#categorySearch');
    
    $('#categorySearchBtn').click(function (){
        searchCategory();
    });
    
    categorySearch.bind('keypress', function (e){
        
        if (e.keyCode == 13) {
            e.preventDefault();
            searchCategory();
        }
    });
    
    function searchCategory() {
        
        keyword = categorySearch.val().trim();
        
        resUrl = adminWebUrl + 'project_type/0?q=' + keyword;
        console.log(resUrl);
        location.replace(resUrl);
    }
    
    $('[id^="removeCategory-"]').click(function (){
        removeCategoryId = getElementIdFromId($(this).prop('id'));
        console.log(removeCategoryId);
        
        param = {
            category_id : removeCategoryId,
        };
        
        $.ajax({
            type : 'post',
            url : webUrl + 'gnc_admin/category/remove',
            data : param,
        }).done(function (data){
            if (data !== '1') {
                $('#removeCategoryModal').modal('toggle');
                return;
            }
            
            location.reload();
        });
        
    });
    
    
</script>