<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Greenic Admin - Login </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="<?=base_url()?>mats/backAssets/apple-touch-icon.png">
        <link rel="shortcut icon" href="<?=base_url()?>mats/backAssets/assets/favicon.ico">

        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?=base_url()?>mats/backAssets/css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" id="theme-style" href="<?=base_url()?>mats/backAssets/css/app-green.css">
        <script src="<?=base_url()?>mats/backAssets/js/jquery-3.1.0.min.js"></script>
    </head>

    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
        <header class="auth-header">
            <h1 class="auth-title">
            <div class="logo">
                <span class="l l1"></span>
                <span class="l l2"></span>
                <span class="l l3"></span>
                <span class="l l4"></span>
                <span class="l l5"></span>
            </div>        Greenic Admin
            </h1>
        </header>
                    <div class="auth-content">
                        <p class="text-xs-center">เข้าสู่ระบบจัดการเว็บไซต์</p>
                        <!--<form novalidate="">-->
                            <div class="form-group"> <label for="username">ชื่อผู้ใช้งาน</label> <input type="text" class="form-control underlined" name="username" id="username" required> </div>
                            <div class="form-group"> <label for="password">รหัสผ่าน</label> <input type="password" class="form-control underlined" name="password" id="password" required> </div>
                            
                            <div class="form-group"> <button id="signInBtn" class="btn btn-block btn-primary">เข้าสู่ระบบ</button> </div>
                            
                        <!--</form>-->
                    </div>
                </div>
                <div class="text-xs-center">
                    <a href="<?=base_url()?>mats/backAssets/http://www.greenic.co" class="btn btn-secondary rounded btn-sm"> <i class="fa fa-arrow-left"></i> กลับหน้าเว็บหลัก </a>
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        
        <!--<script src="<?=base_url()?>mats/backAssets/js/vendor.js"></script>-->
        <!--<script src="<?=base_url()?>mats/backAssets/js/app.js"></script>-->
        <!-- Greenic JS -->
        <script type="text/javascript" src="<?=base_url()?>mats/backJs/adminBase.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/helper.js"></script>
        <!-- Greenic JS -->
        <script type="text/javascript" src="<?=base_url()?>mats/backJs/authen/authen.js"></script>
    </body>

</html>