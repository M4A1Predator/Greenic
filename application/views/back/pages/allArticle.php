<article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title">
					รายการบทความทั้งหมด
					<a href="<?=base_url().'gnc_admin/article/addArticle'?>" class="btn btn-primary btn-sm rounded-s"><em class="fa fa-plus"></em> เพิ่มบทความ</a><!---->
                    <div class="action dropdown">
						<button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							คำสั่งจำนวนมาก
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="#"> <i class="fa fa-eye-slash"></i>ไม่เผยแพร่ทั้งหมดที่เลือก</a>
                            <a class="dropdown-item" href="#"> <i class="fa fa-eye"></i>เผยแพร่ทั้งหมดที่เลือก</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-close icon"></i>ลบทั้งหมดที่เลือก</a>
						</div>
					</div>
				</h3>
                                    <p class="title-description"> รายการบทความทั้งหมดในเว็บไซต์ </p>
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <form class="form-inline">
                                <div class="input-group"> <input type="text" class="form-control boxed rounded-s" placeholder="ค้นหาบทความด้วยชื่อ"> <span class="input-group-btn">
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
                                    <div class="item-col item-col-header fixed item-col-img md">
                                        <div> <span>ภาพปก</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-title">
                                        <div> <span>ชื่อบทความ</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-sales">
                                        <div> <span>จำนวนวิว</span> </div>
                                    </div>
                                    
                                    <div class="item-col item-col-header item-col-author">
                                        <div class="no-overflow"> <span>สถานะ</span> </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-date">
                                        <div> <span>วันที่ลง</span> </div>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                                </div>
                            </li>
                            <?php foreach($articles as $article){ ?>
                            <li class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items">
                                        <input type="checkbox" class="checkbox">
                                        <span></span>
                                        </label>
                                    </div>
                                    <div class="item-col fixed item-col-img md">
                                        <a href="item-editor.html">
                                            <div class="item-img rounded" style="background-image: url(<?=base_url().$article->article_cover_image?>)"></div>
                                        </a>
                                    </div>
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">ชื่อบทความ</div>
                                        <div>
                                            <a href="#viewArticle" target="_blank" class="">
                                                <h4 class="item-title"><?=$article->article_headline?></h4> </a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div class="item-heading">จำนวนวิว</div>
                                        <div> <?=$article->article_view?> ครั้ง </div>
                                    </div>
                                    
                                    
                                    <div class="item-col item-col-author">
                                        <div class="item-heading">สถานะ</div>
                                        <div class="no-overflow"> <?=$article->status_name?></div>
                                    </div>
                                    <div class="item-col item-col-date">
                                        <div class="item-heading">วันที่ลง</div>
                                        <div class="no-overflow"> <?=display_datetime_th($article->article_time)?> </div>
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
                                                        <a class="edit" href="#unshow"> <i class="fa fa-eye-slash"></i> </a>
                                                    </li>
                                                    <li>
                                                        <a class="edit" href="?page=editArticle"> <i class="fa fa-pencil"></i> </a>
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
                                $active_class = '';
                                if($i === $page_number){
                                    $active_class = 'active';
                                }
                            ?>
                            <li class="page-item <?=$active_class?>">
                                <a class="page-link" href="<?=base_url().'gnc_admin/article/allArticle?pageNum='.$i?>"><?=$i?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </article>