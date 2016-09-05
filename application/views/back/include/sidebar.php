<?php
    if(isset($_GET['page'])){
       $page=$_GET['page'];
    } else{
       $page='main';
    }
?>
<aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Greenic Admin </div>
                        </div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                <li <?php if($page=='main'){ echo ' class="active"'; } ?>>
                                    <a href="index.php"> <i class="fa fa-home"></i> ภาพรวมระบบ </a>
                                </li>
                                <li <?php if($page=='memberBasic'||$page=='memberFarmer'||$page=='memberBasicEdit'||$page=='basicDetail'||$page=='farmerDetail'||$page=='memberFarmerEdit'||$page=='memberEdit'||$page=='memberFollowShow'){ echo ' class="active open"'; } ?>>
                                    <a href=""> <i class="fa fa-users"></i> จัดการสมาชิก <i class="fa arrow"></i> </a>
                                    <ul>
                                        <li <?php if($page=='memberBasic'||$page=='basicDetail'){ echo ' class="active"'; } ?>> <a href="<?=base_url()?>gnc_admin/members/normal"><i class="fa fa-user"></i> สมาชิกทั่วไป</a> </li>
                                        <li <?php if($page=='memberFarmer'||$page=='farmerDetail'){ echo ' class="active"'; } ?>> <a href="index.php?page=memberFarmer"><i class="fa fa-leaf"></i> สมาชิกเกษตรกร</a> </li>
                                    </ul>
                                </li>
                                 <li <?php if($page=='allProject'||$page=='allFarm'||$page=='allCategory'||$page=='allUnit'||$page=='addUnit'||$page=='editUnit'||$page=='allSpecies'||$page=='allBreed'||$page=='addSpecies'||$page=='editSpecies'||$page=='editBreed'||$page=='addBreed'||$page=='projectDetail'||$page=='projectEdit'||$page=='farmDetail'||$page=='editFarm'){ echo ' class="active open"'; } ?>>
                                    <a href=""> <i class="fa fa-list-ul"></i> จัดการเนื้อหา <i class="fa arrow"></i> </a>
                                    <ul>
                                        <li <?php if($page=='allProject'||$page=='projectEdit'||$page=='projectDetail'){ echo ' class="active"'; } ?>> <a href="index.php?page=allProject"><i class="fa fa-th"></i> โปรเจ็คทั้งหมด</a> </li>
                                        <li <?php if($page=='allFarm'||$page=='farmDetail'||$page=='editFarm'){ echo ' class="active"'; } ?>> <a href="index.php?page=allFarm"><i class="fa fa-thumb-tack"></i> ฟาร์มทั้งหมด</a> </li>
                                        <li <?php if($page=='allCategory'||$page=='allSpecies'||$page=='allBreed'||$page=='addBreed'||$page=='editBreed'||$page=='addSpecies'||$page=='editSpecies'){ echo ' class="active"'; } ?>> <a href="index.php?page=allCategory"><i class="fa fa-apple"></i> ประเภทของผลผลิต</a> </li>
                                        <li <?php if($page=='allUnit'||$page=='addUnit'||$page=='editUnit'){ echo ' class="active"'; } ?>> <a href="index.php?page=allUnit"><i class="fa fa-tachometer"></i> หน่วยตวงวัดสินค้า</a> </li>
                                    </ul>
                                </li>
                                 <li <?php if($page=='allArticle'||$page=='addArticle'||$page=='editArticle'){ echo ' class="active open"'; } ?>>
                                    <a href=""> <i class="fa fa-pencil-square-o"></i> จัดการบทความ <i class="fa arrow"></i> </a>
                                    <ul>
                                        <li <?php if($page=='allArticle'){ echo ' class="active"'; } ?>> <a href="index.php?page=allArticle"><i class="fa fa-list-ol"></i> บทความทั้งหมด</a> </li>
                                        <li <?php if($page=='addArticle'){ echo ' class="active"'; } ?>> <a href="index.php?page=addArticle"><i class="fa fa-plus-square"></i> เพิ่มบทความ</a> </li>
                                    </ul>
                                </li>
                                
                                
                                
                                <li <?php if($page=='about'||$page=='terms'||$page=='agreement'){ echo ' class="active open"'; } ?>>
                                    <a href=""> <i class="fa fa-file-text"></i> จัดการหน้า <i class="fa arrow"></i> </a>
                                    <ul>
                                        <li <?php if($page=='about'){ echo ' class="active"'; } ?> > <a href="index.php?page=about"><i class="fa fa-info-circle"></i> เกี่ยวกับเรา</a> </li>
                                        <li <?php if($page=='terms'){ echo ' class="active"'; } ?>> <a href="index.php?page=terms"><i class="fa fa-book"></i> นโยบายการใช้งาน</a> </li>
                                        <li <?php if($page=='agreement'){ echo ' class="active"'; } ?>> <a href="index.php?page=agreement"><i class="fa fa-legal"></i> ข้อตกลง</a> </li>
                                    </ul>
                                </li>
                                <li <?php if($page=='setting'){ echo ' class="active"'; } ?>>
                                    <a href="index.php?page=setting"> <i class="fa fa-pencil-square-o"></i> ตั้งค่าเว็บไซต์</a>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                    
                </aside>
            <div class="sidebar-overlay" id="sidebar-overlay"></div>