<article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title">แก้ไขชนิดผลผลิต</h3>
                    </div>          
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                
                                <div class="card card-block sameheight-item" style="height: 727px;">
                                    <form>
                                        <div class="form-group"> <label class="control-label">ชื่อชนิด</label> 
                                        <input type="text" class="form-control boxed" value="ผักบุ้ง"> </div>
                                        <div class="form-group">
                                            <label class="control-label">ประเภท</label>
                                                <select class="form-control district">
                                                       <option>เลือกประเภท</option>
                                                        <option value="vegetable" selected>ผัก</option>
                                                        <option value="fruit">ผลไม้</option>
                                                        <option value="animal">สัตว์</option>
                                                    </select>
                                            
                                        </div>
                                        <div class="form-group">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                                                <a href="<?=base_url()?>mats/backAssets/?page=allSpecies" class="btn btn-danger"><i class="fa fa-times"></i> ยกเลิก</a> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
            </div>
            </section>
            
            </article>