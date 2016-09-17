<script type="text/javascript" src="<?=base_url()?>mats/backAssets/ckeditor/ckeditor.js"></script>

<input id="oldData" value="<?=$terms->webdata_value?>" />

<article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title">
		แก้ไขหน้า <span class="sparkline bar" data-type="bar"></span>
	</h3> </div>
                    <!--<form name="item">-->
                        <div class="card card-block">
                            <div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">
				ชื่อหน้า:
			</label>
                                <div class="col-sm-10"> <input type="text" class="form-control boxed" value="นโยบายการใช้งาน" disabled> </div>
                            </div>
                            <div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">
				เนื้อหา:
			</label>
                                <div class="col-sm-10">
                                    <textarea id="mytextarea"></textarea>
                                </div>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'mytextarea' );
                                </script>
                            </div>
                            
                            
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2"> <button id="updateBtn" class="btn btn-primary">
					<i class="fa fa-save"></i> บันทึก
				</button> </div>
                            </div>
                        </div>
                    <!--</form>-->
                </article>

<script src="<?=base_url()?>mats/backJs/webdata/terms.js"></script>