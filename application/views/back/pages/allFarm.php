<article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title">ฟาร์มทั้งหมด</h3>
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <form class="form-inline" action="<?=base_url().'gnc_admin/searchFarm'?>" method="get">
                                <div class="input-group"> <input type="text" class="form-control boxed rounded-s" placeholder="ค้นหาโดยชื่อ-สกุล" name='keyword' > <span class="input-group-btn">
					<button class="btn btn-secondary rounded-s" type="submit">
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
                                        <div> <span>ชื่อฟาร์ม</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-sales">
                                        <div> <span>จำนวนโปรเจ็ค</span> </div>
                                    </div>
<!--                                    <div class="item-col item-col-header item-col-category">
                                        <div class="no-overflow"> <span>การติดตาม</span> </div>
                                    </div>-->
                                    <div class="item-col item-col-header item-col-author">
                                        <div class="no-overflow"> <span>ชื่อเกษตรกร</span> </div>
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
                           
	         <?php foreach($projects as $project){ ?>
                            <li class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items">
							<input type="checkbox" class="checkbox">
							<span></span>
						</label> </div>
                                   
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">ชื่อฟาร์ม</div>
                                        <div>
                                            <a href="<?=base_url()?>gnc_admin/farmDetail/<?=$project->farm_id?>" title="คลิกเพื่อดูข้อมูลสมาชิก"><h4 class="item-title"><?=$project->farm_name?></h4> </a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div class="item-heading">จำนวนโปรเจ็ค</div>
                                        <!--ไปหน้าโชว์โปรเจ็ค fillter by ชื่อฟาร์ม--> 
                                        <div><a href="<?php if($project->count_project){?> <?=base_url()?>gnc_admin/projects/getFarmId/<?=$project->farm_id?> <?php }else{} ?>" title="ดูการติดตามทั้งหมดของสมาชิกคนนี้"><?=$project->count_project?> โปรเจ็ค</a></div>
                                    </div>
                                    
                                    <!--<div class="item-col item-col-category no-overflow">
                                        <div class="item-heading">การติดตาม</div>
                                        <div class="no-overflow"><?=$project->count_followfarm?> คน</div>
                                    </div>-->
                                    <div class="item-col item-col-author">
                                        <div class="item-heading">ชื่อเกษตรกร</div>
                                        <!--ไปหน้าโชว์โปรเจ็ค fillter by ชื่อเกษตรกร-->
                                        <div class="no-overflow"> <a href="<?php if($project->count_project){ ?> <?=base_url()?>gnc_admin/projects/getFarmId/<?=$project->farm_id?> <?php }else{}?>" title="ดูโปรเจ็คทั้งหมดของสมาชิกคนนี้"><?=$project->member_firstname?>  <?=$project->member_lastname?></a> </div>
                                    </div>
                                    <div class="item-col item-col-author">
                                        <div class="item-heading">ที่อยู่</div>
                                        <div class="no-overflow"> <a href="<?=base_url()?>gnc_admin/farmDetail/<?=$project->farm_id?>" title="คลิกเพื่อดูข้อมูลสมาชิก"><?=$project->farm_address?>  <?=$project->farm_district?> <?=$project->farm_sub_district?>  <?=$project->farm_province?></a> </div>
                                    </div>
                                    <div class="item-col item-col-date">
                                        <div class="item-heading">วันที่สมัคร</div>
                                        <div class="no-overflow">  <?=$project->member_regis_time?> </div>
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
                                                    <li>
                                                        <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" title="ลบสมาชิกคนนี้"> <i class="fa fa-trash-o "></i> </a>
                                                    </li>
                                                    <li>
                                                        <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" title="ระงับการใช้งานชั่วคราว"> <i class="fa fa-ban"></i> </a>
                                                    </li>
                                                    <li>
                                                        <a class="edit" href="<?=base_url()?>gnc_admin/editFarm/<?=$project->farm_id?>" title="แก้ไขข้อมูล"> <i class="fa fa-pencil"></i> </a>
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
	
	<?php
                    $page_amount = 1;
                    if($count_data % $limit === 0){
                        $page_amount = $count_data / $limit;
                    }else{
                        $page_amount = ($count_data / $limit) + 1;
                    }
                ?>
	
                    <nav class="text-xs-right">
                        <ul class="pagination">
                           <?php for($i=1;$i<=$page_amount;$i++){ ?>
                            <?php
                                $active_class = '';
                                if($i === $page_number){
                                    $active_class = 'active';
                                }
                            ?>
                            <li class="page-item <?=$active_class?>">
                                <a class="page-link" href="<?=base_url().'gnc_admin/projects/allFarm?pageNum='.$i?>"><?=$i?></a
	           
	            
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </article>
                