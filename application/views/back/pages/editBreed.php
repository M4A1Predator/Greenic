<article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title">แก้ไขสายพันธุ์</h3>
                    </div>          
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                
                                <div class="card card-block sameheight-item" style="height: 727px;">
                                    <form>
                                        <div class="form-group"> <label class="control-label">ชื่อสายพันธุ์</label> 
                                        <input type="text" id="breedName" class="form-control boxed" value="ผักบุ้งไทย"> </div>
                                        <div class="form-group">
                                            <label class="control-label">ประเภท</label>
                                            <select class="form-control district" disabled>
                                                <option value="vegetable" selected><?=get_project_type_thai_text($breed->category_project_type_id)?></option>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">ชนิด</label>
                                            <select class="form-control district" >
                                                <option value="br01" selected><?=$breed->category_name?></option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                                                <a href="?page=allBreed" class="btn btn-danger"><i class="fa fa-times"></i> ยกเลิก</a> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
            </div>
            </section>
            
            </article>