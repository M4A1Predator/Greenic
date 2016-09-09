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
                        <td><?= $farm->farm_name ?></td>
                        <td><button class="btn btn-xs rounded btn-warning" data-toggle="modal" data-target="#editFarm" type="button">แก้ไขฟาร์ม <i class="fa fa-plus" aria-hidden="true"></i></button></td>
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