<div class="container content-md">
    <form action="#" method="post" id="sky-form3" class="sky-form" novalidate="novalidate">
        <header>จัดการฟาร์ม</header>

        <fieldset>
            
          <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อฟาร์ม</th>
                        <th>แก้ไขฟาร์ม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $farmCount = 1; ?>
                    <?php foreach($farms as $farm){ ?>
                    <tr>
                        <td><?= $farmCount ?></td>
                        <td><span id="farmName-<?=$farm->farm_id?>"><?= $farm->farm_name ?></span></td>
                        <td>
                            <!--<button class="btn btn-xs rounded btn-warning" data-toggle="modal" data-target="#editFarm" type="button">แก้ไขฟาร์ม <i class="fa fa-plus" aria-hidden="true"></i></button>-->
                            <button id="removeFarmBtn-<?=$farm->farm_id?>" class="btn btn-xs rounded btn-danger" data-toggle="modal" data-target="#removeFarm" type="button">ลบ <i class="fa fa-minus" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    <?php $farmCount += 1; ?>
                    <?php } ?>
                </tbody>
            </table>

            
        </fieldset>

        <footer>
            <a href="<?=base_url().'my_projects'?>" class="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i> โปรเจ็คทั้งหมด</a>
        </footer>
    </form>
</div>
<?php $this->load->view('main/inc/addProjectModal.php'); ?>
<div class="modal fade bs-example-modal-sm" id="removeFarm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-sm">
       <div class="modal-content">
           <form action="#" class="sky-form">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="myModalLabel4">ลบฟาร์ม</h4>
           </div>
           <div class="modal-body">
               <div class="row">
                   <div class="col-md-12">
                       <section>
                           <label class="text">
                               <p>ต้องการลบฟาร์ม <span id="removeFarmName"></span> ใช่หรือไม่?</p>
                           </label>
                       </section>
                   </div>
               </div>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn-u btn-u-primary" data-dismiss="modal"> ยกเลิก</button>
               <button type="button" class="btn-u btn-u-default" id="confirmRemoveFarmBtn"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
           </div>
           </form>
       </div>
   </div>
</div>