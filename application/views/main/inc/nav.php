<div class="navbar mega-menu" role="navigation">
    <div class="container">
        <!--<h1><?=$this->session->userdata('member_id')?></h1>-->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="res-container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="navbar-brand">
                <a href="<?=base_url().$this->lang->line('main')?>">
                    <img src="<?=base_url()?>mats/assets/img/logo1-default.png" alt="Logo">
                </a>
            </div>
        </div><!--/end responsive container-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <div class="res-container">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="<?=base_url().$this->lang->line('main')?>" class="" data-toggle="">หน้าแรก</a>
                    </li>

                    <li class="">
                        <a href="<?=base_url()?>aboutus" class="" data-toggle="">เกี่ยวกับเรา</a>
                    </li>

                    <!-- Archives -->
                    <li class="dropdown mega-menu-fullwidth">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            ประเภทสินค้า
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 md-margin-bottom-30">
                                                <h2><a href="<?=base_url()?>category/vegetable" id="navTypeVegetableText">ผักอินทรีย์ ()</a></h2>
                                                <ul class="dropdown-link-list" id="navCategoryVegetableList">
                                                    <!-- ประเภทยอดนิยม 7 อันดับ-->
                                                    <!--<li><a href="#">ผักบุ้ง (30)</a></li>-->
                                                  
                                                </ul>
                                            </div>
                                            <div class="col-md-4 md-margin-bottom-30">
                                                <h2><a href="<?=base_url()?>category/fruit" id="navTypeFruitText">ผลไม้อินทรีย์ ()</a></h2>
                                                <ul class="dropdown-link-list" id="navCategoryFruitList">
                                                    
                                                </ul>
                                            </div>
                                            <div class="col-md-4 md-margin-bottom-30">
                                                <h2><a href="<?=base_url()?>category/animal" id="navTypeAnimalText">สัตว์อินทรีย์ ()</a></h2>
                                                <ul class="dropdown-link-list" id="navCategoryAnimalList">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- End Archives -->

                    <!-- Lifestyle -->
                    <li class="mega-menu-fullwidth">
                        <!--<a href="<?=base_url()?>articles" class="dropdown-toggle" data-toggle="dropdown"> บทความ</a>-->
                        <a href="<?=base_url()?>articles"> บทความ</a>
                        <!--<ul class="dropdown-menu">-->
                        <!--    <li>-->
                        <!--        <div class="mega-menu-content">-->
                        <!--            <div class="container">-->
                        <!--                <div class="row" id="showArticleList">-->
                        <!--                    <div class="col-md-4 md-margin-bottom-30">-->
                        <!--                        <div class="blog-grid">-->
                        <!--                            <img class="img-responsive" src="<?=base_url()?>mats/assets/img/main/img6.jpg" alt="">-->
                        <!--                            <h3 class="blog-grid-title-sm"><a href="<?=base_url()?>mats/blog_single.html">Malaika Firth tells all: 'I met my boyfriend through Twitter'</a></h3>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-md-4 md-margin-bottom-30">-->
                        <!--                        <!-- Blog Thumb -->
                        <!--                        <div class="blog-thumb margin-bottom-20">-->
                        <!--                            <div class="blog-thumb-hover">-->
                        <!--                                <img src="<?=base_url()?>mats/assets/img/main/img3.jpg" alt="">-->
                        <!--                            </div>-->
                        <!--                            <div class="blog-thumb-desc">-->
                        <!--                                <h3><a href="<?=base_url()?>mats/blog_single.html">You CAN be sensitive to gluten without having coeliac disease, study finds</a></h3>-->
                        <!--                                <ul class="blog-thumb-info">-->
                        <!--                                    <li>Mar 6, 2015</li>-->
                        <!--                                    <li><a href="#"><i class="fa fa-eye"></i> 0</a></li>-->
                        <!--                                </ul>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                        <!-- End Blog Thumb -->
                        <!---->
                        <!--                        <!-- Blog Thumb -->
                        <!--                        <div class="blog-thumb margin-bottom-20">-->
                        <!--                            <div class="blog-thumb-hover">-->
                        <!--                                <img src="<?=base_url()?>mats/assets/img/main/img17.jpg" alt="">-->
                        <!--                            </div>-->
                        <!--                            <div class="blog-thumb-desc">-->
                        <!--                                <h3><a href="<?=base_url()?>mats/blog_single.html">Starbucks is introducing new coffee</a></h3>-->
                        <!--                                <ul class="blog-thumb-info">-->
                        <!--                                    <li>Mar 6, 2015</li>-->
                        <!--                                    <li><a href="#"><i class="fa fa-eye"></i> 0</a></li>-->
                        <!--                                </ul>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                        <!-- End Blog Thumb -->
                        <!---->
                        <!--                        <!-- Blog Thumb -->
                        <!--                        <div class="blog-thumb md-margin-bottom-20">-->
                        <!--                            <div class="blog-thumb-hover">-->
                        <!--                                <img src="<?=base_url()?>mats/assets/img/main/img25.jpg" alt="">-->
                        <!--                            </div>-->
                        <!--                            <div class="blog-thumb-desc">-->
                        <!--                                <h3><a href="<?=base_url()?>mats/blog_single.html">The benefits of tea</a></h3>-->
                        <!--                                <ul class="blog-thumb-info">-->
                        <!--                                    <li>Mar 6, 2015</li>-->
                        <!--                                    <li><a href="#"><i class="fa fa-eye"></i> 0</a></li>-->
                        <!--                                </ul>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                        <!-- End Blog Thumb -->
                        <!--                        <div class="text-right"><a href="<?=base_url()?>articles">บทความทั้งหมด <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>-->
                        <!--                    </div>-->
                        <!---->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </li>
                    <?php if($this->is_sign_in){ ?>
                    <li id="chatMenu" class="">
                        <a href="<?=base_url()?>chat" class=""><i class="fa fa-comment" aria-hidden="true"></i> แชท <span id="unreadConversationAmount"></span></a>
                        <input type="hidden" id="unreadConversationArray" value="" />
                    </li>
                    <li id="noticeMenu" class="notic">
                        <a href="#" class=""  data-toggle="modal" data-target="#notic" >แจ้งเตือน <span id="unreadNotificationAmount"></span></a>
                    </li>
                    <?php } ?>
                </ul>
            </div><!--/responsive container-->
        </div><!--/navbar-collapse-->
    </div><!--/end contaoner-->
</div>
                        