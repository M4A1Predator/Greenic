<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">บทความ</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?=base_url().'main'?>">หน้าแรก</a></li>
                    <li><a href="<?=base_url().'articles'?>">บทความ</a></li>
					<li class="active"><?=$article->article_headline?></li>
				</ul>
			</div>
		</div>
<div class="container content blog-page blog-item">
			<!--Blog Post-->
			<div class="blog margin-bottom-40">
				<div class="blog-img">
                    <?php if($article->article_cover_image){ ?>
					<!--<img class="img-responsive" src="<?=base_url()?>mats/assets/img/sliders/4.jpg" alt="">-->
                    <img class="img-responsive" src="<?=base_url().$article->article_cover_image?>" alt="">
                    <?php } ?>
				</div>
				<h2><a><?=$article->article_headline?></a></h2>
				<div class="blog-post-tags">
					<ul class="list-unstyled list-inline blog-info">
						<li><i class="fa fa-calendar"></i> <?=display_date_th($article->article_time)?></li>
                        <li><i class="fa fa-pencil"></i> By <?=$article->member_firstname?> </li>
						<li><i class="fa fa-eye"></i> <a href="#"><?=$article->article_view?> คนอ่านเรื่องนี้แล้ว</a></li>
						<!--<li><i class="fa fa-tags"></i> คะน้า, ไร้ดิน, ปลอดสารพิษ</li>-->
					</ul>
				</div>
                <!--เนื้อหา-->
				<!--<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, mollitia animi, id est laborum et dolorum fug consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna.</p><br>-->
				<!--<div class="tag-box tag-box-v2">-->
				<!--	<p>Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet consectetur adipiscing elit. Fusce condimentum eleifend enim a feugiatt non libero consectetur adipiscing elit magna. Sed et quam lacus. Condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat.</p>-->
				<!--</div>-->
				<!--<p>Officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, mollitia animi, id est laborum et dolorum fug consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend.</p>-->
				<!--<p>Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum</p><br>-->
				<!--<blockquote>-->
				<!--	<p>Award winning digital agency. We bring a personal and effective approach to every project we work on, which is why.</p>-->
				<!--	<small>CEO Jack Bour</small>-->
				<!--</blockquote>-->
				<!--<p>Deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, mollitia animi, id est laborum et dolorum fug consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus.</p>-->
                <?=$article->article_content?>
                <!--จบเนื้อหา-->
			</div>
			<!--End Blog Post-->

			<hr>

			<div class="row margin-bottom-20">
                <!--<div class="col-md-12"><h2 class="title-v4">บทความที่น่าสนใจ</h2></div>-->
                <?php for($i=0;$i<4;$i++){?>
				<!--<div class="col-md-3 col-sm-6">-->
				<!--	<div class="thumbnails thumbnail-style thumbnail-kenburn">-->
				<!--		<div class="thumbnail-img">-->
				<!--			<div class="overflow-hidden">-->
				<!--				<img class="img-responsive" src="<?=base_url()?>mats/assets/img/main/img1.jpg" alt="">-->
				<!--			</div>-->
				<!--			<a class="btn-more hover-effect" href="showArticle.php">อ่านเรื่องนี้ +</a>-->
				<!--		</div>-->
				<!--		<div class="caption">-->
				<!--			<h3><a class="hover-effect" href="showArticle.php">เทคนิคการรดน้ำผัก</a></h3>-->
				<!--			<p>เปลี่ยนข้อผิดพลาดของมือใหม่ที่เคยทำในการปลูกผักสวนครัว ด้วยเทคนิคที่ต้องรู้ก่อนลงมือปลูกผัก...</p>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
                <?php }?>
			</div>

			


			
		</div>