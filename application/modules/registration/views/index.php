<div class="main-section">
        
        <div class="row">
          <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 col-lg-offset-2 ">
            <div class="main-content">
              <h3>ছাত্র / ছাত্রীর বৃত্তি ফরম</h3>
                <?php echo form_open_multipart("registration/add");
                  //echo validation_errors();
                  //echo $message;
                  
                ?>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->flashdata('success');;?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="hidden-lg hidden-md hidden-sm col-xs-12">
                      <?php echo form_error('image'); ?>
                      <div class="form-group">
                        <div class='image <?php echo (form_error('userfile') ? 'textInputError' : '') ?>'><img id="blah2" src="<?=base_url();?>fwedget/images/user.png" alt="ছবি" class="img-responsive"/></div>
                        <input type="file" class="form-control userfile" name="userfile" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" style="padding-left:10px; padding-right:10px">                      
                      </div>
                    </div>

                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                      <div class="form-group">
                        <input type="text"  class="form-control first_name <?php echo (form_error('first_name') ? 'textInputError' : '') ?>" name="first_name" value="<?=set_value('first_name')?>" placeholder="ছাত্র / ছাত্রীর নাম">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control father_name <?php echo (form_error('father_name') ? 'textInputError' : '') ?>" name="father_name" value="<?=set_value('father_name')?>" placeholder="পিতার নাম"/>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control mother_name <?php echo (form_error('mother_name') ? 'textInputError' : '') ?>" name="mother_name" value="<?=set_value('mother_name')?>" placeholder="মাতার নাম"/>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 hidden-xs">
                      <?php echo form_error('image'); ?>
                      <div class="form-group">
                        <div class='image <?php echo (form_error('userfile') ? 'textInputError' : '') ?>'><img id="blah" src="<?=base_url();?>fwedget/images/user.png" alt="ছবি" class="img-responsive"/></div>
                        <input type="file" class="form-control userfile" name="userfile" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" style="padding-left:10px; padding-right:10px">                      
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <input type="text" class="form-control father_nid <?php echo (form_error('father_nid') ? 'textInputError' : '') ?>" name="father_nid" value="<?=set_value('father_nid')?>" placeholder="পিতার ন্যাশনাল আইডি নাম্বার - ১৩ /১৭ ডিজিট ( যদি থাকে )"/>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <input type="text" class="form-control mother_nid <?php echo (form_error('mother_nid') ? 'textInputError' : '') ?>" name="mother_nid" value="<?=set_value('mother_nid')?>" placeholder="মাতার ন্যাশনাল আইডি নাম্বার - ১৩ / ১৭ ডিজিট ( যদি থাকে )"/>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <input type="text" class="form-control mobile <?php echo (form_error('mobile') ? 'textInputError' : '') ?>" name="mobile" value="<?=set_value('mobile')?>" placeholder="মোবাইল নাম্বার ইংরেজীতে ( যদি থাকে )"/>                  
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                      <h4>জন্ম তারিখ</h4>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="form-group">
                        <div class="col-third">
                          <input type="text" class="form-control day <?php echo (form_error('day') ? 'textInputError' : '') ?>" name="day" value="<?=set_value('day')?>" placeholder="দিন"/>
                        </div>
                        <div class="col-third">
                          <input type="text" class="form-control month <?php echo (form_error('month') ? 'textInputError' : '') ?>" name="month" value="<?=set_value('month')?>" placeholder="মাস"/>
                        </div>
                        <div class="col-third">
                          <input type="text" class="form-control year <?php echo (form_error('year') ? 'textInputError' : '') ?>" name="year" value="<?=set_value('year')?>" placeholder="বছর"/>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="hidden-lg hidden-md hidden-sm">
                          </br>
                          <div class="form-group">
                              <input type="text" class="form-control current_edu_institute <?php echo (form_error('current_edu_institute') ? 'textInputError' : '') ?>" name="current_edu_institute" value="<?=set_value('current_edu_institute')?>" placeholder="অধ্যয়নরত শিক্ষা প্রতিষ্ঠানের নাম"/>
                          </div>

                          <div class="form-group">
                              <input type="text" class="form-control current_edu_class <?php echo (form_error('current_edu_class') ? 'textInputError' : '') ?>" name="current_edu_class" value="<?=set_value('current_edu_class')?>" placeholder="শ্রেণী"/>
                          </div>

                          <div class="form-group">
                              <input type="text" class="form-control current_edu_year <?php echo (form_error('current_edu_year') ? 'textInputError' : '') ?>" name="current_edu_year" value="<?=set_value('current_edu_year')?>" placeholder="বর্ষ"/>
                          </div>

                          <div class="form-group">
                              <input type="text" class="form-control current_edu_division <?php echo (form_error('current_edu_division') ? 'textInputError' : '') ?>" name="current_edu_division" value="<?=set_value('current_edu_division')?>" placeholder="বিভাগ"/>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control current_edu_sl <?php echo (form_error('current_edu_sl') ? 'textInputError' : '') ?>" name="current_edu_sl" value="<?=set_value('current_edu_sl')?>" placeholder="ক্রমিক নং"/>
                          </div>
                      </div>
                      <div class="table-responsive hidden-xs">
                        <table class="table table-bordered">
                            <colgroup>
                                <col width="40%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control current_edu_institute <?php echo (form_error('current_edu_institute') ? 'textInputError' : '') ?>" name="current_edu_institute" value="<?=set_value('current_edu_institute')?>" placeholder="অধ্যয়নরত শিক্ষা প্রতিষ্ঠানের নাম"/>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control current_edu_class <?php echo (form_error('current_edu_class') ? 'textInputError' : '') ?>" name="current_edu_class" value="<?=set_value('current_edu_class')?>" placeholder="শ্রেণী"/>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control current_edu_year <?php echo (form_error('current_edu_year') ? 'textInputError' : '') ?>" name="current_edu_year" value="<?=set_value('current_edu_year')?>" placeholder="বর্ষ"/>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control current_edu_division <?php echo (form_error('current_edu_division') ? 'textInputError' : '') ?>" name="current_edu_division" value="<?=set_value('current_edu_division')?>" placeholder="বিভাগ"/>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control current_edu_sl <?php echo (form_error('current_edu_sl') ? 'textInputError' : '') ?>" name="current_edu_sl" value="<?=set_value('current_edu_sl')?>" placeholder="ক্রমিক নং"/>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <h4>আবেদনকারী ছাত্র / ছাত্রীর বিজ্ঞপ্তিতে উল্লেখিত বছরে পরীক্ষাসমূহের গ্রেড</h4>
                      <div class="hidden-lg hidden-md hidden-sm">
                          <div class="form-group">
                              <input type="text" class="form-control application_exam_name <?php echo (form_error('application_exam_name') ? 'textInputError' : '') ?>" name="application_exam_name" value="<?=set_value('application_exam_name')?>" placeholder="পরীক্ষার নাম "/>
                          </div>

                          <div class="form-group">
                              <input type="text" class="form-control application_exam_year <?php echo (form_error('application_exam_year') ? 'textInputError' : '') ?>" name="application_exam_year" value="<?=set_value('application_exam_year')?>" placeholder="পরীক্ষার সন"/>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control application_exam_gpa <?php echo (form_error('application_exam_gpa') ? 'textInputError' : '') ?>" name="application_exam_gpa" value="<?=set_value('application_exam_gpa')?>" placeholder="জিপিএ"/>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control application_comment <?php echo (form_error('application_comment') ? 'textInputError' : '') ?>" name="application_comment" value="<?=set_value('application_comment')?>" placeholder="মন্তব্য"/>
                          </div>
                      </div> 
                      <div class="table-responsive hidden-xs">
                        <table class="table table-bordered">
                            <colgroup>
                                <col width="40%">
                                <col width="20%">
                                <col width="20%">
                                <col width="20%">
                            </colgroup>
                           
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control application_exam_name <?php echo (form_error('application_exam_name') ? 'textInputError' : '') ?>" name="application_exam_name" value="<?=set_value('application_exam_name')?>" placeholder="পরীক্ষার নাম "/>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control application_exam_year <?php echo (form_error('application_exam_year') ? 'textInputError' : '') ?>" name="application_exam_year" value="<?=set_value('application_exam_year')?>" placeholder="পরীক্ষার সন"/>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control application_exam_gpa <?php echo (form_error('application_exam_gpa') ? 'textInputError' : '') ?>" name="application_exam_gpa" value="<?=set_value('application_exam_gpa')?>" placeholder="জিপিএ"/>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control application_comment <?php echo (form_error('application_comment') ? 'textInputError' : '') ?>" name="application_comment" value="<?=set_value('application_comment')?>" placeholder="মন্তব্য"/>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hidden-lg hidden-md hidden-sm">
                          <label>আবেদনকারী ছাত্র / ছাত্রীর স্থায়ী ঠিকানা</label>
                          <div class="form-group">
                            <input type="text" class="form-control permanent_village <?php echo (form_error('permanent_village') ? 'textInputError' : '') ?>" name="permanent_village" value="<?=set_value('permanent_village')?>"  placeholder="গ্রাম/মহল্লা">
                          </div>
                          <div class="form-group">
                            <select class="form-control permanent_post_office <?php echo (form_error('permanent_post_office') ? 'textInputError' : '') ?>" name="permanent_post_office">
                                <option value="<?php if(set_value('permanent_post_office')!=NULL){ echo set_value('permanent_post_office'); } else{ echo ' '; } ?>"><?php if(set_value('permanent_post_office')!=NULL){ echo set_value('permanent_post_office'); } else{ echo 'ডাকঘর '; } ?></option>
                                <?php foreach ($post_office as  $row) {
                                   ?> <option><?=$row->name ?></option> <?php
                                } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-control permanent_union <?php echo (form_error('permanent_union') ? 'textInputError' : '') ?>" name="permanent_union">
                                <option value="<?php if(set_value('permanent_union')!=NULL){ echo set_value('permanent_union'); } else{ echo ' '; } ?>"><?php if(set_value('permanent_union')!=NULL){ echo set_value('permanent_union'); } else{ echo 'উপজেলা'; } ?></option>
                                <?php foreach ($upzilla as  $row) {
                                   ?> <option><?=$row->name ?></option> <?php
                                } ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <select class="form-control permanent_district <?php echo (form_error('permanent_district') ? 'textInputError' : '') ?>" name="permanent_district">
                                <option value="<?php if(set_value('permanent_district')!=NULL){ echo set_value('permanent_district'); } else{ echo ' '; } ?>"><?php if(set_value('permanent_district')!=NULL){ echo set_value('permanent_district'); } else{ echo 'জেলা'; } ?></option>
                                <?php foreach ($district as  $row) {
                                   ?> <option><?=$row->name ?></option> <?php
                                } ?>
                            </select>
                          </div>
                          <label>বৰ্তমান পত্র যোগাযোগের ঠিকানা</label>
                          <div class="form-group">
                            <textarea class="form-control communication_address <?php echo (form_error('communication_address') ? 'textInputError' : '') ?>" name="communication_address" rows="6"><?=set_value('communication_address')?></textarea>
                          </div>
                      </div>
                      <div class="table-responsive hidden-xs">
                        <table class="table table-bordered">
                            <colgroup>
                                <col width="50%">
                                <col width="50%">
                            </colgroup>
                            <thead>
                              <tr>
                                <th class="text-center">আবেদনকারী ছাত্র / ছাত্রীর স্থায়ী ঠিকানা</th>
                                <th class="text-center">বৰ্তমান পত্র যোগাযোগের ঠিকানা</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-group">
                                    <input type="text" class="form-control permanent_village <?php echo (form_error('permanent_village') ? 'textInputError' : '') ?>" name="permanent_village" value="<?=set_value('permanent_village')?>"  placeholder="গ্রাম/মহল্লা">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control permanent_post_office <?php echo (form_error('permanent_post_office') ? 'textInputError' : '') ?>" name="permanent_post_office">
                                        <option value="<?php if(set_value('permanent_post_office')!=NULL){ echo set_value('permanent_post_office'); } else{ echo ' '; } ?>"><?php if(set_value('permanent_post_office')!=NULL){ echo set_value('permanent_post_office'); } else{ echo 'ডাকঘর '; } ?></option>
                                        <?php foreach ($post_office as  $row) {
                                           ?> <option><?=$row->name ?></option> <?php
                                        } ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control permanent_union <?php echo (form_error('permanent_union') ? 'textInputError' : '') ?>" name="permanent_union">
                                        <option value="<?php if(set_value('permanent_union')!=NULL){ echo set_value('permanent_union'); } else{ echo ' '; } ?>"><?php if(set_value('permanent_union')!=NULL){ echo set_value('permanent_union'); } else{ echo 'উপজেলা'; } ?></option>
                                        <?php foreach ($upzilla as  $row) {
                                           ?> <option><?=$row->name ?></option> <?php
                                        } ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <select class="form-control permanent_district <?php echo (form_error('permanent_district') ? 'textInputError' : '') ?>" name="permanent_district">
                                        <option value="<?php if(set_value('permanent_district')!=NULL){ echo set_value('permanent_district'); } else{ echo ' '; } ?>"><?php if(set_value('permanent_district')!=NULL){ echo set_value('permanent_district'); } else{ echo 'জেলা'; } ?></option>
                                        <?php foreach ($district as  $row) {
                                           ?> <option><?=$row->name ?></option> <?php
                                        } ?>
                                    </select>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <textarea class="form-control communication_address <?php echo (form_error('communication_address') ? 'textInputError' : '') ?>" name="communication_address" rows="6"><?=set_value('communication_address')?></textarea>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div><?php echo form_error('capable_your_family'); ?></div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                      <h4>অভিভাবক লেখাপড়ার ব্যয়ভার সঠিকভাবে বহন করতে সক্ষম কি-না </h4>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     <div class="form-group">
                        <input type="radio" name="capable_your_family" value="yes" id="gender-male" <?php if(set_value('capable_your_family')=='yes'){ echo'checked'; }  ?> />
                        <label for="gender-male">হ্যাঁ</label>
                        <input type="radio" name="capable_your_family" value="no" id="gender-female" <?php if(set_value('capable_your_family')=='no'){ echo'checked'; } ?> />
                        <label for="gender-female">না</label>
                      </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hidden-lg hidden-md hidden-sm">
                        <div class="form-group box-border <?php echo (form_error('academic_certificate') ? 'textInputError' : '') ?>">
                            <label>এসএসসি / এইচএসসি এর মার্কশিট :</label>
                            <input type="file" class="form-control academic_certificate" name="academic_certificate" value="<?=set_value('academic_certificate')?>" onchange="readURL1(this);">
                        </div>

                        <div class="form-group box-border <?php echo (form_error('academic_certificate2') ? 'textInputError' : '') ?>">
                            <label>এসএসসি / এইচএসসি এর সনদ :</label>
                            <input type="file" class="form-control academic_certificate2 " name="academic_certificate2" value="<?=set_value('academic_certificate2')?>" onchange="readURL4(this);">
                        </div>
                        <div class="form-group box-border <?php echo (form_error('dob_certificate') ? 'textInputError' : '') ?>">
                            <label>জন্ম সনদ : </label>
                            <input type="file" class="form-control dob_certificate" name="dob_certificate" value="<?=set_value('dob_certificate')?>" onchange="readURL2(this);">
                        </div>
                        <div class="form-group box-border <?php echo (form_error('testimonial') ? 'textInputError' : '') ?>">
                            <label>শিক্ষা প্রতিষ্ঠানের প্রধান/বিভাগীয় প্রধানের মতামত/সুপারিশ : </label>
                            <input type="file" class="form-control testimonial" name="testimonial" value="<?=set_value('testimonial')?>" onchange="readURL3(this);">
                        </div>
                    </div>
                    <div class="table-responsive hidden-xs">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center">এসএসসি / এইচএসসি এর মার্কশিট</th>
                              <th class="text-center">এসএসসি / এইচএসসি এর সনদ</th>
                              <th class="text-center">জন্ম সনদ</th>
                              <th class="text-center">শিক্ষা প্রতিষ্ঠানের প্রধান/বিভাগীয় প্রধানের মতামত/সুপারিশ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">
                                <div class="form-group">
                                  <input type="file" class="form-control academic_certificate" name="academic_certificate" value="<?=set_value('academic_certificate')?>" onchange="readURL1(this);">
                                  <label><?php echo form_error('academic_certificate')?></label>
                                </div>
                              </td class="text-center">
                              <td class="">
                                <div class="form-group">
                                  <input type="file" class="form-control academic_certificate2 " name="academic_certificate2" value="<?=set_value('academic_certificate2')?>" onchange="readURL4(this);">
                                  <label><?php echo form_error('academic_certificate2')?></label>
                                </div>
                              </td>
                              <td class="text-center">
                                <div class="form-group">
                                  <input type="file" class="form-control dob_certificate" name="dob_certificate" value="<?=set_value('dob_certificate')?>" onchange="readURL2(this);">
                                  <label><?php echo form_error('dob_certificate')?></label>
                                </div>
                              </td>
                              <td class="text-center">
                                <div class="form-group">
                                  <input type="file" class="form-control testimonial" name="testimonial" value="<?=set_value('testimonial')?>" onchange="readURL3(this);">
                                  <label><?php echo form_error('testimonial')?></label>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        
                      </div>
                    </div>
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group">
                            
                            <label for="">নির্দেশনা : আপলোডকৃত ফাইল অবশ্যই jpg/jpeg/png/gif ফরমেটে হইতে হবে । </label></br>
                            <label for="">বিজ্ঞপ্তি ফরমে জারীকৃত শর্তাবলী অনুসরণ করে আবেদন করতে হবে । </label>
                          </div>
                    </div>

                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                          <button type="submit" class="btn btn-success sending" name='save'>দাখিল</button>

                          <button type="button" class="btn btn-info sending hidden-xs" data-toggle="modal" data-target="#myModal" id="preview">প্রিভিউ</button>

                          <a href="<?='registration' ?>" class="btn btn-danger sending">বাতিল</a>


                          <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Preview</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">

                                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                        <div class="form-group">
                                          ছাত্র / ছাত্রীর নাম : <span id="first_name"></span>
                                        </div>
                                        <div class="form-group">
                                          পিতার নাম : <span id="father_name"></span>
                                        </div>

                                        <div class="form-group">
                                          মাতার নাম : <span id="mother_name"></span>
                                        </div>
                                      </div>
                                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                        <?php echo form_error('image'); ?>
                                        <div class="form-group">
                                          <div class='image'><img id="blah2" src="<?=base_url();?>fwedget/images/icon-user.png" alt="ছবি" class="img-responsive"/></div>
                                        </div>
                                      </div>

                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                          পিতার ন্যাশনাল আইডি নাম্বার : <span id="father_nid"></span>
                                        </div>
                                      </div>

                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                          মাতার ন্যাশনাল আইডি নাম্বার : <span id="mother_nid"></span>
                                        </div>
                                      </div>

                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                          মোবাইল নাম্বার : <span id="mobile"></span>                 
                                        </div>
                                      </div>

                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                          জন্ম তারিখ : <span id="day"></span> - <span id="month"></span> - <span id="year"></span> 
                                        </div>
                                      </div>

                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                          <table class="table table-bordered">
                                              <colgroup>
                                                  <col width="40%">
                                                  <col width="15%">
                                                  <col width="15%">
                                                  <col width="15%">
                                                  <col width="15%">
                                              </colgroup>
                                              <thead>
                                                  <th class="text-center">অধ্যয়নরত শিক্ষা প্রতিষ্ঠানের নাম</th>
                                                  <th class="text-center">শ্রেণী</th>
                                                  <th class="text-center">বর্ষ</th>
                                                  <th class="text-center">বিভাগ</th>
                                                  <th class="text-center">ক্রমিক নং</th>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                      <span id="current_edu_institute"></span>  
                                                    </div>
                                                  </td>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                      <span id="current_edu_class"></span>  
                                                    </div>
                                                  </td>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                      <span id="current_edu_year"></span>  
                                                    </div>
                                                  </td>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                      <span id="current_edu_division"></span>  
                                                    </div>
                                                  </td>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                      <span id="current_edu_sl"></span>  
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>

                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4>আবেদনকারী ছাত্র / ছাত্রীর বিজ্ঞপ্তিতে উল্লেখিত বছরে পরীক্ষাসমূহের গ্রেড</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered">
                                              <colgroup>
                                                  <col width="40%">
                                                  <col width="20%">
                                                  <col width="20%">
                                                  <col width="20%">
                                              </colgroup>
                                             <thead>
                                                  <th class="text-center">পরীক্ষার নাম</th>
                                                  <th class="text-center">পরীক্ষার সন</th>
                                                  <th class="text-center">জিপিএ</th>
                                                  <th class="text-center">মন্তব্য</th>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                       <span id="application_exam_name"></span>  
                                                    </div>
                                                  </td>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                      <span id="application_exam_year"></span>  
                                                    </div>
                                                  </td>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                      <span id="application_exam_gpa"></span>  
                                                    </div>
                                                  </td>
                                                  <td class="text-center">
                                                    <div class="form-group">
                                                      <span id="application_comment"></span>  
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                      </div>

                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                          <table class="table table-bordered">
                                              <colgroup>
                                                  <col width="50%">
                                                  <col width="50%">
                                              </colgroup>
                                              <thead>
                                                <tr>
                                                  <th class="text-center">আবেদনকারী ছাত্র / ছাত্রীর স্থায়ী ঠিকানা</th>
                                                  <th class="text-center">বৰ্তমান পত্র যোগাযোগের ঠিকানা</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <div class="form-group">
                                                      গ্রাম/মহল্লা : <span id="permanent_village"></span>
                                                    </div>
                                                    <div class="form-group">
                                                      ডাকঘর : <span id="permanent_post_office"></span>  
                                                    </div>
                                                    <div class="form-group">
                                                      উপজেলা : <span id="permanent_union"></span>  
                                                    </div>
                                                    <div class="form-group">
                                                      জেলা : <span id="permanent_district"></span>  
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="form-group">
                                                      <span id="communication_address"></span>  
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                      </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4>অভিভাবক লেখাপড়ার ব্যয়ভার সঠিকভাবে বহন করতে সক্ষম কি-না  : <span id="capable_your_family"></span>  </h4>
                                    </div>

                                    <div class="col-lg-12 col-md-12, col-sm-12, col-xs-12">
                                        <div class="table-responsive">
                                          <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                  <th class="text-center">এসএসসি / এইচএসসি এর মার্কশিট</th>
                                                  <th class="text-center">এসএসসি / এইচএসসি এর সনদ</th>
                                                  <th class="text-center">জন্ম সনদ</th>
                                                  <th class="text-center">শিক্ষা প্রতিষ্ঠানের প্রধান/বিভাগীয় প্রধানের মতামত/সুপারিশ</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <div class="form-group">
                                                      <img id="academic_certificate" src="" alt="সএসসি / এইচএসসি এর মার্কশিট" class="img-responsive"/>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="form-group">
                                                      <img id="academic_certificate2" src="" alt="এসএসসি / এইচএসসি এর সনদ" class="img-responsive"/>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="form-group">
                                                      <img id="dob_certificate" src="" alt="জন্ম সনদ" class="img-responsive"/>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="form-group">
                                                      <img id="testimonial" src="" alt="শিক্ষা প্রতিষ্ঠানের প্রধান/বিভাগীয় প্রধানের মতামত/সুপারিশ" class="img-responsive"/>
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                    
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                              
                                              <label for="">বিজ্ঞপ্তি ফরমে জারীকৃত শর্তাবলী অনুসরণ করে আবেদন করতে হবে । </label>
                                            </div>
                                      </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success sending" name='save'>দাখিল</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                      </div>
                  </div>
              <?php echo form_close();?>
            </div>
          </div>
        </div>
    </div>