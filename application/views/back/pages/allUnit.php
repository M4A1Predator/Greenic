<article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title">
					รายการหน่วยทั้งหมด
					<a href="?page=addUnit" class="btn btn-primary btn-sm rounded-s"><em class="fa fa-plus"></em> เพิ่มหน่วยตวงวัดสินค้า</a><!---->
                    <div class="action dropdown">
						<button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							คำสั่งจำนวนมาก
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-close icon"></i>ลบทั้งหมดที่เลือก</a>
						</div>
					</div>
				</h3>
                                    <p class="title-description"> รายการหน่วยตวงวัดสินค้าทั้งหมดในเว็บไซต์ </p>
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <form class="form-inline">
                                <div class="input-group"> <input type="text" class="form-control boxed rounded-s" placeholder="ค้นหาหน่วยตวงวัด"> <span class="input-group-btn">
					<button class="btn btn-secondary rounded-s" type="button">
						<i class="fa fa-search"></i>
					</button>
				</span> </div>
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
	          <?php foreach($projects as $project){ ?>
                            <li class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items"><input type="checkbox" class="checkbox"><span></span></label> </div>
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">ชื่อบทความ</div>
                                        <div>
                                            <a>
                                                <h4 class="item-title"><?=$project->unit_name ?></h4> </a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div class="item-heading">การใช้งาน</div>
                                        <div> <?=$project->unit_count ?> </div>
                                    </div>
                                    <div class="item-col item-col-date">
                                        <div class="item-heading">วันที่เพิ่ม</div>
                                        <div class="no-overflow"><?=$project->unit_create_date ?> </div>
                                    </div>
                                    <div class="item-col fixed item-col-actions-dropdown">
                                        <div class="item-actions-dropdown">
                                            <a class="item-actions-toggle-btn"> <span class="inactive"><i class="fa fa-cog"></i></span> <span class="active"><i class="fa fa-chevron-circle-right"></i></span> </a>
                                            <div class="item-actions-block">
                                                <ul class="item-actions-list">
                                                    <li><a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a></li>
                                                    <li><a class="edit" href="?page=editUnit"> <i class="fa fa-pencil"></i> </a></li>
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
                    if($count_data % $limit === 0){
                        $page_amount = $count_data / $limit;
                    }else{
                        $page_amount = ($count_data / $limit) + 1;
                    }
                ?>
                        <ul class="pagination">
                            <?php for($i=1;$i<=$page_amount;$i++){ ?>
                            <?php
                                $active_class = '';
                                if($i === $page_number){
                                    $active_class = 'active';
                                }
                            ?>
                            <li class="page-item <?=$active_class?>">
                                <a class="page-link" href="<?=base_url().'gnc_admin/projects/allUnit?pageNum='.$i?>"><?=$i?></a
	           
	            
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </article>