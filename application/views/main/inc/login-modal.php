<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
    <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
        <ul class="cd-switcher">
            <li><a href="javascript:void(0);">เข้าสู่ระบบ</a></li>
            <li><a href="javascript:void(0);">สมัครสมาชิก</a></li>
        </ul>

        <div id="cd-login"> <!-- log in form -->
            <form class="cd-form">
                <p class="social-login">
                    <span class="social-login-facebook text-center"><a href="#"><i class="fa fa-facebook"></i>เข้าสู่ระบบด้วย Facebook</a></span>
                </p>

                <div class="lined-text"><span>หรือ เข้าสู่ระบบด้วยอีเมล์</span><hr></div>

                <p class="fieldset">
                    <label class="image-replace cd-email" for="signin-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="อีเมล์">
                    <span class="cd-error-message">กรุณากรอกชื่อผู้ใช้งานให้ถูกต้อง!</span>
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-password" for="signin-password">Password</label>
                    <input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="รหัสผ่าน">
                    <a href="javascript:void(0);" class="hide-password">Hide</a>
                    <span class="cd-error-message">กรุณากรอกรหัสผ่านให้ถูกต้อง!</span>
                </p>

                <p class="fieldset">
                    <input type="checkbox" id="remember-me" checked>
                    <label for="remember-me">จำฉันไว้ในระบบ</label>
                </p>

                <p class="fieldset">
                    <input class="full-width" type="submit" value="เข้าสู่ระบบ">
                </p>
            </form>

            <p class="cd-form-bottom-message"><a href="javascript:void(0);">ลืมรหัสผ่าน</a></p>
            <!-- <a href="javascript:void(0);" class="cd-close-form">Close</a> -->
        </div> <!-- cd-login -->

        <div id="cd-signup"> <!-- sign up form -->
            <form class="cd-form">
                <p class="social-login">
                    <span class="social-login-facebook text-center"><a href="#"><i class="fa fa-facebook"></i>สมัครสมาชิกด้วย Facebook</a></span>
                    
                </p>

                <div class="lined-text"><span>หรือ สมัครสมาชิกด้วยอีเมล์</span><hr></div>

                <p class="fieldset">
                    <label class="image-replace cd-username" for="signup-username">Username</label>
                    <input class="full-width has-padding has-border" id="signup-fullname" type="text" placeholder="ชื่อ-นามสกุล">
                    <span class="cd-error-message" id="signup-fullname-error-msg">กรุณากรอกชื่อผู้ใช้งานให้ถูกต้อง!</span>
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-email" for="signup-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="อีเมล์">
                    <span class="cd-error-message" id="signup-email-error-msg">กรุณากรอกอีเมล์ให้ถูกต้อง!</span>
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">Password</label>
                    <input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="รหัสผ่าน">
                    <a href="javascript:void(0);" class="hide-password">Hide</a>
                    <span class="cd-error-message">กรุณากรอกรหัสผ่านให้ถูกต้อง!</span>
                </p>

                <p class="fieldset">
                    <input type="checkbox" id="accept-terms">
                    <label for="accept-terms">ฉันยอมรับข้อตกลง <a href="javascript:void(0);"> อ่านข้อตกลง</a></label>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="button" id="signup-btn" value="สมัครสมาชิก">
                </p>
            </form>

            <!-- <a href="javascript:void(0);" class="cd-close-form">Close</a> -->
        </div> <!-- cd-signup -->

        <div id="cd-reset-password"> <!-- reset password form -->
            <p class="cd-form-message">กรอกอีเมล์เมื่อรับลิงค์ในการตั้งรหัสผ่านใหม่</p>

            <form class="cd-form">
                <p class="fieldset">
                    <label class="image-replace cd-email" for="reset-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="อีเมล์">
                    <span class="cd-error-message">คุณกรอกอีเมล์ไม่ถูกต้องหรืออีเมล์นี้ไม่มีอยู่ในระบบ!</span>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="ตั้งรหัสผ่านใหม่">
                </p>
            </form>

            <p class="cd-form-bottom-message"><a href="javascript:void(0);">กลับไปหน้าเข้าสู่ระบบ</a></p>
        </div> <!-- cd-reset-password -->
        <a href="javascript:void(0);" class="cd-close-form">Close</a>
    </div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->
