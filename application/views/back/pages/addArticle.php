
<!--<link rel="stylesheet" href="<?=base_url()?>mats/backAssets/summernote/dist/summernote.css">-->
<!--<script src="<?=base_url()?>mats/backAssets/summernote/dist/summernote.min.js"></script>-->
<script src="<?=base_url()?>mats/backJs/article/addArticle.js"></script>
<article class="content item-editor-page">
                <div class="title-block">
                    <h3 class="title">
    เพิ่มบทความ <span class="sparkline bar" data-type="bar"></span>
</h3> </div>
                <form name="item">
                    <div class="card card-block">
                        <div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">
            ชื่อเรื่อง:
        </label>
                            <div class="col-sm-10"> <input type="text" class="form-control boxed"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">ภาพหน้าปก:</label>
                            <div class="col-sm-10"> <input type="file" id="exampleInputFile"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">
            เนื้อหา:
        </label>
                            <div class="col-sm-10">
                                <div id="summernote">Hello Summernote</div>
                                <script type="text/javascript">
  $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>
                            </div>
                        </div>
                       
                        
        <!--                <div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">-->
        <!--    แท็ก:-->
        <!--</label>-->
        <!--                    <div class="col-sm-10"> -->
        <!--                       -->
        <!--                         <div class="input-group"> <span class="input-group-addon"><em class="fa fa-tags"></em></span> <input type="text" class="form-control" placeholder="เช่น ผลปลอดสารพิษ,ผักอินทรีย์,สัตรว์อินทรีย์"> </div>-->
        <!--                    </div>-->
        <!--                </div>-->
                        <div class="form-group row">
                            <div class="col-sm-10 col-sm-offset-2"> <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> บันทึก
            </button> </div>
                        </div>
                    </div>
                </form>
            </article>

<script src="<?=base_url()?>mats/backJs/article/addArticle.js"></script>