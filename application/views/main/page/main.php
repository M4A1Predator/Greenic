		<div class="container content-md">
            <div class="row margin-bottom-40">
				<div class="col-md-4 col-sm-12">
					<div class="service-block service-block-green service-or">
						<div class="service-bg"></div>
						<img src="<?=base_url()?>mats/assets/img/veg.png">
						<h2 class="heading-md">
                            <a class="cate-link" href="<?=base_url().$this->lang->line('project_vegetable')?>" id="vegetableTypeText"><?=get_project_type_thai_text(1)?></a>
                        </h2>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-block service-block-orange service-or">
						<div class="service-bg"></div>
						<img src="<?=base_url()?>mats/assets/img/fruit.png">
						<h2 class="heading-md"><a class="cate-link" href="<?=base_url().$this->lang->line('project_fruit')?>" id="fruitTypeText"><?=get_project_type_thai_text(2)?></a></h2>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-block service-block-brown service-or">
						<div class="service-bg"></div>
						<img src="<?=base_url()?>mats/assets/img/fish.png">
						<h2 class="heading-md"><a class="cate-link" href="<?=base_url().$this->lang->line('project_animal')?>" id="animalTypeText"><?=get_project_type_thai_text(3)?></a></h2>
					</div>
				</div>
			</div>
            <!--สินค้ามาใหม่-->
            <div class="headline-center margin-bottom-20">
                <h2>สินค้า <span class="color-green">เกษตรอินทรีย์</span> มาใหม่</h2>
            </div>
            <?php // $this->load->view( 'main/inc/filter.php' )?>
            <div>
                <div class="row" id="lastProjects">
                    <!-- Begin Easy Block -->
                    <!-- Project Block -->
                    <!-- End Begin Easy Block -->
                </div>
            </div><!--สินค้ามาใหม่-->
		</div>
        <!--สินค้ายอดนิยม-->
        <div class="parallax-team parallaxBg" style="background-position: 50% 33px;">
            <div class="container content">
                <div class="title-box-v2">
                    <h2>สินค้า <span class="color-green">เกษตรอินทรีย์</span> ยอดนิยม</h2>
                </div>
                <div class="row" id="popProjects">
                <!-- Begin Easy Block -->
                    
                    <!-- End Begin Easy Block -->
                </div>
            </div>
		</div>
        <!--สินค้ายอดนิยม-->
		
        <?php $this->load->view( 'main/inc/article.php');?>