<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title">ประเภทของผลผลิต</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="card sameheight-item">
        <?php foreach($project_types as $pt){ ?>
            <a href="<?=base_url().'gnc_admin/project_type/'.$pt->project_type_id?>" class="btn btn-secondary  btn-lg btn-block"><?=get_project_type_thai_text($pt->project_type_id)?> (<?=$pt->project_count?>)</a>
        <?php } ?>
        <a href="<?=base_url().'gnc_admin/project_type/0'?>" class="btn btn-primary  btn-lg btn-block">ทั้งหมด (<?=$all_project_count?>)</a>
    </div>
</article>