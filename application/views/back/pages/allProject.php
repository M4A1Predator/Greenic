<article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title">
					รายชื่อโปรเจ็คเกษตร
					<div class="action dropdown">
						<button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							คำสั่งจำนวนมาก						
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-trash-o icon"></i>ลบโปรเจ็คอย่างถาวร</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-pause icon"></i>ระงับโปรเจ็คชั่วคราว</a>
						</div>
					</div>
				</h3>
                                    <p class="title-description">รายชื่อโปรเจ็คการผลิตสินค้า</p>
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control boxed rounded-s" placeholder="ค้นหาโปรเจ็ค">
                                    <span class="input-group-btn"><button class="btn btn-secondary rounded-s" type="button"><i class="fa fa-search"></i></button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-3">
                             <select class="form-control district">
                                                       <option>เลือกประเภท</option>
                                                        <option value="vegetable">ผัก</option>
                                                        <option value="fruit">ผลไม้</option>
                                                        <option value="animal">สัตว์</option>
                                                    </select>
                        </div>
                        <div class="col-sm-3">
                             <select class="form-control district">
                                                       <option>เลือกชนิด</option>
                                                        <option value="vegetable">ผัก</option>
                                                        <option value="fruit">ผลไม้</option>
                                                        <option value="animal">สัตว์</option>
                                                    </select>
                        </div>
                        <div class="col-sm-3">
                             <select class="form-control district">
                                                       <option>เลือกสายพันธุ์</option>
                                                        <option value="vegetable">ผัก</option>
                                                        <option value="fruit">ผลไม้</option>
                                                        <option value="animal">สัตว์</option>
                                                    </select>
                        </div>
                        <div class="col-sm-3">
                             <select class="form-control district">
                                                       <option>เลือกฟาร์ม</option>
                                                        <option value="vegetable">ผัก</option>
                                                        <option value="fruit">ผลไม้</option>
                                                        <option value="animal">สัตว์</option>
                                                    </select>
                        </div>
                    </div>
                                           
                                                                          
                    <div class="card items">
                         
                        <ul class="item-list striped">
                            
                            <li class="item item-list-header hidden-sm-down">
                                
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check">
                                            <label class="item-check" id="select-all-items">
						                      <input type="checkbox" class="checkbox"><span></span>
                                            </label>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-img md">
                                        <div> <span>ภาพปก</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-title">
                                        <div> <span>ชื่อสินค้า</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-sales">
                                        <div> <span>ประเภท</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-stats">
                                        <div class="no-overflow"> <span>ชนิด</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-category">
                                        <div class="no-overflow"> <span>สายพันธุ์</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-author">
                                        <div class="no-overflow"> <span>ชื่อฟาร์ม</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-date">
                                        <div> <span>วันที่สร้าง</span> </div>
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
                                    <div class="item-col fixed item-col-img md">
                                        <a href="?page=projectDetail">
                                            <div class="item-img rounded" style="background-image: url(assets/bung.jpg)"></div>
                                        </a>
                                    </div>
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">ชื่อสินค้า</div>
                                        <div>
                                            <a href="<?=base_url()?>gnc_admin/projectDetail/<?=$project->project_id?>"  title="คลิกเพื่อดูรายละเอียดสินค้า">
                                                <h4 class="item-title"><?=$project->project_name?></h4> </a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div class="item-heading">ประเภท</div>
                                        <div> <?=$project->project_type_name?> </div>
                                    </div>
                                    <div class="item-col item-col-stats no-overflow">
                                        <div class="item-heading">ชนิด</div>
                                        <div> <?=$project->category_name?> </div>
                                    </div>
                                    <div class="item-col item-col-category no-overflow">
                                        <div class="item-heading">สายพันธุ์</div>
                                        <div> <?=$project->breed_name?> </div>
                                    </div>
                                    <div class="item-col item-col-author">
                                        <div class="item-heading">ชื่อฟาร์ม</div>
                                        <!--คลิกที่ชื่อฟาร์มก็จะให้แสดงโปรเจ็คทั้งหมดของฟาร์มนั้นๆ-->
                                        <div class="no-overflow"> <a href="<?=base_url()?>gnc_admin/projects/getFarmId/<?=$project->farm_id?>" title="คลิกเพื่อดูสินค้าทั้งหมดของฟาร์มนี้"><?=$project->farm_name?> </a> </div>
                                    </div>
                                    <div class="item-col item-col-date">
                                        <div class="item-heading">วันที่สร้าง</div>
                                        <div class="no-overflow"> <?=$project->project_time?> </div>
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
                                                        <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
                                                    </li>
                                                    <li>
                                                        <a class="edit" href="<?=base_url()?>gnc_admin/projectEdit/<?=$project->project_id?>"> <i class="fa fa-pencil"></i> </a>
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
                            <li class="page-item"> <a class="page-link" href="">
				ก่อนหน้า
			</a> </li>
                            <li class="page-item active"> <a class="page-link" href="">
				1
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				2
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				3
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				4
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				5
			</a> </li>
                            <li class="page-item"> <a class="page-link" href="">
				ถัดไป
			</a> </li>
                        </ul>
                    </nav>
     
                </article>
