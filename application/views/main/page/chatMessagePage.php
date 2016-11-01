<?php
    // Set member image profile
    $member_img = $this->session->userdata('member_img_path');
    if(!$member_img){
        $member_img = get_default_member_image_path();
    }
    
    $member_name = $this->session->userdata('member_firstname');
    if($this->session->userdata('member_lastname')){
        $member_name .= ' '.$this->session->userdata('member_lastname');
    }
?>
<input type="hidden" id="conversationId" value="<?=$conversation['conversation_id']?>" />
<input type="hidden" id="memberId" value="<?=$this->session->userdata('member_id')?>" />
<input type="hidden" id="receiverId" value="<?=$receiver->member_id?>" />
<div class="container content-md">
    <div class="row">
        <div class="col-md-12">
            <a href="<?=base_url().'chat'?>"><strong><i class="fa fa-reply-all"></i> รายชื่อสนทนาทั้งหมด</strong></a>
            <div class="panel panel-u" >
                <div class="panel-heading">
                    <?php
                        $receiver_name = $receiver->member_firstname;
                        if($receiver->member_lastname){
                            $receiver_name .= ' '.$receiver->member_lastname;
                        }
                        
                        // Set receiver image profile
                        $receiver_img = $receiver->member_img_path;
                        if(!$receiver_img){
                            $receiver_img = get_default_member_image_path();
                        }
                    ?>
                    <input type="hidden" id="receiverImg" value="<?=$receiver_img?>"/>
                    <input type="hidden" id="memberImg" value="<?=$member_img?>"/>
                    <input type="hidden" id="receiverName" value="<?=$receiver_name?>" />
                    <input type="hidden" id="memberName" value="<?=$member_name?>" />
                    
                    <span class="glyphicon glyphicon-comment"></span> <?=$receiver_name?>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a></li>
                            <li><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body" id="chatBox">
                    <ul class="chat" id="chatMessageList">
                        <!--<li class="left clearfix"><span class="chat-img pull-left">-->
                        <!--    <img src="<?=base_url()?>mats/assets/img/testimonials/img7.jpg" alt="User Avatar" class="img-circle chatProfile" />-->
                        <!--</span>-->
                        <!--    <div class="chat-body clearfix">-->
                        <!--        <div class="header">-->
                        <!--            <strong class="primary-font">สมหมาย ร่ำรวย</strong> <small class="pull-right text-muted">-->
                        <!--                <span class="glyphicon glyphicon-time"></span>18 นาทีที่แล้ว</small>-->
                        <!--        </div>-->
                        <!--        <p>-->
                        <!--            สวัสดีครับคุณสมปอง-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <!--<li class="right clearfix"><span class="chat-img pull-right">-->
                        <!--    <img src="<?=base_url()?>mats/assets/img/testimonials/img5.jpg" alt="User Avatar" class="img-circle chatProfile" />-->
                        <!--</span>-->
                        <!--    <div class="chat-body clearfix">-->
                        <!--        <div class="header">-->
                        <!--            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 นาทีที่แล้ว</small>-->
                        <!--            <strong class="pull-right primary-font">สมปอง รักทำกิน</strong>-->
                        <!--        </div>-->
                        <!--        <p>-->
                        <!--            สวัสดีครับคุณสมหมาย สนใจโปรเจ็คไหนของผมครับหรือีคำถามอะไรก็ยินดีตอบและช่วยเหลือนะครับ-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <!--<li class="left clearfix"><span class="chat-img pull-left">-->
                        <!--    <img src="<?=base_url()?>mats/assets/img/testimonials/img7.jpg" alt="User Avatar" class="img-circle chatProfile" />-->
                        <!--</span>-->
                        <!--    <div class="chat-body clearfix">-->
                        <!--        <div class="header">-->
                        <!--            <strong class="primary-font">สมหมาย ร่ำรวย</strong> <small class="pull-right text-muted">-->
                        <!--                <span class="glyphicon glyphicon-time"></span>12 นาทีที่แล้ว</small>-->
                        <!--        </div>-->
                        <!--        <p>-->
                        <!--            สมสนใจสั่งจองผักสลัดปลอดสารพิษครับไม่ทราบว่ามีกำลังผลิตเท่าไหร่ มีกำหนดเก็บเกี่ยวช่วงเวลาใดบ้างครับ-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <!--<li class="right clearfix"><span class="chat-img pull-right">-->
                        <!--    <img src="<?=base_url()?>mats/assets/img/testimonials/img5.jpg" alt="User Avatar" class="img-circle chatProfile" />-->
                        <!--</span>-->
                        <!--    <div class="chat-body clearfix">-->
                        <!--        <div class="header">-->
                        <!--            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>8 นาทีที่แล้ว</small>-->
                        <!--            <strong class="pull-right primary-font">สมปอง รักทำกิน</strong>-->
                        <!--        </div>-->
                        <!--        <p>-->
                        <!--            ตอนนี้ผักสลัดมีลูกค้าจองไว้จำนวนมากเลยทีเดียวครับ ถ้าคุณสมหมายสนใจจองต้องรอเก็บอีก 2 เดือนนะครับ-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <!-- <li class="left clearfix"><span class="chat-img pull-left">-->
                        <!--    <img src="<?=base_url()?>mats/assets/img/testimonials/img7.jpg" alt="User Avatar" class="img-circle chatProfile" />-->
                        <!--</span>-->
                        <!--    <div class="chat-body clearfix">-->
                        <!--        <div class="header">-->
                        <!--            <strong class="primary-font">สมหมาย ร่ำรวย</strong> <small class="pull-right text-muted">-->
                        <!--                <span class="glyphicon glyphicon-time"></span>7 นาทีที่แล้ว</small>-->
                        <!--        </div>-->
                        <!--        <p>-->
                        <!--            ได้ครับงั้นผมจะมาแจ้งยอดสั่งจองอีกครั้งนะครับ ไปเช็คคลังสินค้าก่อนว่าใช้จำนวนเท่าไหร่ จะได้มาจองไว้ยาวๆเลยของดีหายากครับ-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <!--<li class="right clearfix"><span class="chat-img pull-right">-->
                        <!--    <img src="<?=base_url()?>mats/assets/img/testimonials/img5.jpg" alt="User Avatar" class="img-circle chatProfile" />-->
                        <!--</span>-->
                        <!--    <div class="chat-body clearfix">-->
                        <!--        <div class="header">-->
                        <!--            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>5 นาทีที่แล้ว</small>-->
                        <!--            <strong class="pull-right primary-font">สมปอง รักทำกิน</strong>-->
                        <!--        </div>-->
                        <!--        <p>-->
                        <!--            ขอบคุณมากครับยังไงสามารถติดต่อผมได้ทุกช่องทางทางนะครับ เบอร์โทร 0830001234-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</li>-->
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="sendingMessage" type="text" class="form-control input-sm" placeholder="พิมพ์ข้อความที่นี่..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="sendMessageBtn">
                                ส่งข้อความ</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
