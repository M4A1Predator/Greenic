
<header class="header">
    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
         <i class="fa fa-bars"></i>
      </button> </div>
    <div class="header-block header-block-search hidden-sm-down">
        <form role="search">
            <div class="input-container"> <i class="fa fa-search"></i> <input type="search" placeholder="ค้นหา">
                <div class="underline"></div>
            </div>
        </form>
    </div>
   
    <div class="header-block header-block-nav">
        <ul class="nav-profile">
            
            <li class="profile dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <!--<div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div> <span class="name">-->
      <?=$this->session->userdata('admin_username')?>
    </span> </a>
                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="#"> <i class="fa fa-user icon"></i> ข้อมูลส่วนตัว </a>
                    <a class="dropdown-item" href="#"> <i class="fa fa-bell icon"></i> แจ้งเตือน(ใส่เผื่อไว้) </a>
                    <a class="dropdown-item" href="#"> <i class="fa fa-gear icon"></i> ตั้งค่าส่วนตัว </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url()?>gnc_admin/sign_out"> <i class="fa fa-power-off icon"></i> ออกจากระบบ </a>
                </div>
            </li>
        </ul>
    </div>
</header>
