	   <div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">โปรเจ็คเกษตรอินทรีย์ทั้งหมดา</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.php">หน้าแรก</a></li>
					<li class="active">โปรเจ็คเกษตรอินทรีย์ทั้งหมด</li>
				</ul>
			</div>
		</div>
        <div class="container content-md">
            <div class="row margin-bottom-40">
				<div class="col-md-4 col-sm-12">
					<div class="service-block service-block-green service-or">
						<div class="service-bg"></div>
						<img src="<?=base_url()?>mats/assets/img/veg.png">
						<h2 class="heading-md"><a class="cate-link" href="category.php?name=vegetable">ผักอินทรีย์</a></h2>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-block service-block-orange service-or">
						<div class="service-bg"></div>
						<img src="<?=base_url()?>mats/assets/img/fruit.png">
						<h2 class="heading-md"><a class="cate-link" href="category.php?name=fruit">ผลไม้อินทรีย์</a></h2>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-block service-block-brown service-or">
						<div class="service-bg"></div>
						<img src="<?=base_url()?>mats/assets/img/fish.png">
						<h2 class="heading-md"><a class="cate-link" href="category.php?name=animal">สัตว์อินทรีย์</a></h2>
					</div>
				</div>
			</div>
            <!--สินค้ามาใหม่-->
            <div class="headline-center margin-bottom-60">
					<h2>โปรเจ็คเกษตรอินทรีย์ทั้งหมด</h2>
				</div>
			<div class="row">
                <?php for($i=0;$i<16;$i++){?>
				<div class="col-md-3 col-sm-6 md-margin-bottom-40">
					<div class="easy-block-v2">
						<div class="easy-bg-v2 rgba-default">มาใหม่</div>
                        <a href="singleProduct.php"><img alt="" src="<?=base_url()?>mats/assets/img/main/img9.jpg"></a>
						<a href="singleProduct.php" class="sgProduct"><h3>ถั่วฝักยาวอินทรีย์</h3></a>
						<ul class="list-unstyled">
							<li><span class="color-green">ประเภท:</span> ผัก / ถั่วฝักยาว</li>
							<li><span class="color-green">ราคา:</span> 30 บาท/กิโลกรัม</li>
							<li><span class="color-green">พื้นที่:</span> บ้านนา, นครนายก</li>
						</ul>
						<a href="singleProduct.php" class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
					</div>
				</div>
                <?php }?>
			</div>
           <div class="text-center">
							<ul class="pagination">
								<li><a href="#">«</a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li class="active"><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">»</a></li>
							</ul>
						</div>
             <!--สินค้ามาใหม่-->
		</div>
       