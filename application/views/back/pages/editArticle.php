<script type="text/javascript" src="<?=base_url()?>mats/backAssets/ckeditor/ckeditor.js"></script>

<input type="hidden" id="articleId" value="<?=$article->article_id?>"/>
<article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title">
		แก้ไขบทความ <span class="sparkline bar" data-type="bar"></span>
	</h3> </div>
    <!--<form name="item">-->
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">ชื่อเรื่อง:</label>
                <div class="col-sm-10">
                    <input type="text" id="articleHeadline" class="form-control boxed" value="<?=$article->article_headline?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">ภาพหน้าปก:</label>
                <div class="col-sm-10"><img width="360" height="228" src="<?=base_url().$article->article_cover_image?>" class="img-responsive"><br/>* ไม่ต้องอัพโหลดภาพ ถ้าหากไม่ต้องการเปลี่ยนภาพหน้าปก<br/>
                    <input type="file" id="articleCoverImage">
                </div>
            </div>
            <div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">เนื้อหา:</label>
                <div class="col-sm-10">
                    <textarea id="mytextarea"><?=$article->article_content?></textarea>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.config.height = 600;
                    CKEDITOR.replace( 'mytextarea' );
                </script>
            </div>
                
                <!--<div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">แท็ก:</label>
                    <div class="col-sm-10"> 
                         <div class="input-group"> <span class="input-group-addon"><em class="fa fa-tags"></em></span> <input type="text" class="form-control" value="ผักปลอดสารพิษ,ผักอินทรีย์,สัตรว์อินทรีย์"> </div>
                    </div>
                </div>-->
                <div class="form-group row">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button id="saveArticleBtn" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                        <!--<button type="button" class="btn btn-danger"><em class="fa fa-times"></em> ยกเลิก</button>-->
                    </div>
                </div>
            </div>
        <!--</form>-->
    </article>

<script src="<?=base_url()?>mats/backJs/article/editArticle.js"></script>
