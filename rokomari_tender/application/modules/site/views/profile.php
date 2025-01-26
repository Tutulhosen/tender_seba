<div class="main-section">
        
        <div class="row">
          <div class="col-lg-8 col-md-10, col-sm-12, col-xs-12 col-lg-offset-2 ">
            <div class="main-content">
              <h3><?=$meta_title; ?>

              		<span class="pull-right"> Status :
			              <?php 
			                  if($users->status==1){
			                    echo 'New Applicants';
			                  }
			                  if($users->status==2){
			                    echo 'Short Listed';
			                  }
			                  if($users->status==3){
			                    echo 'Final Listed';
			                  }
			                  if($users->status==4){
			                    echo 'Submit Payment';
			                  }
			                  if($users->status==5){
			                    echo 'Reject Applicants';
			                  }
			              ?>
			          </span> 
              </h3>

              	<div class="row">
              		<br>
	              <div class="col-md-9">
	                <dl class="dl-horizontal">
	                  <dt>Student`s Name : </dt> <dd><?=$users->first_name?></dd>

	                  <dt>Father`s Name : </dt> <dd><?=$users->father_name?></dd>

	                  <dt>Mother`s Name : </dt> <dd><?=$users->mother_name?></dd>

	                  <dt>Father`s NID Number : </dt> <dd><?=$users->father_nid?></dd>

	                  <dt>Mother`s NID Number : </dt> <dd><?=$users->mother_nid?></dd>

	                  <dt>Mobile Number : </dt> <dd><?=$users->mobile?></dd>

	                  <dt>Date of Birth : </dt> <dd><?=$users->dob?></dd>
	                </dl>
	              </div>
	               <div class="col-md-3">
	                <img src="<?= base_url(); ?>student_img/<?=$users->image?>" style="width:100%">          
	              </div>
	              <div class="col-md-12">
	                <div class="table-responsive">
	                    <table class="table table-bordered table-striped">
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
	                              <?=$users->current_edu_institute?>
	                            </td>
	                            <td class="text-center">
	                              <?=$users->current_edu_class?>
	                            </td>
	                            <td class="text-center">
	                              <?=$users->current_edu_year?>
	                            </td>
	                            <td class="text-center">
	                              <?=$users->current_edu_division?>
	                            </td>
	                            <td class="text-center">
	                              <?=$users->current_edu_sl?>
	                            </td>
	                          </tr>
	                        </tbody>
	                      </table>
	                    </div>
	                    <h5>আবেদনকারী ছাত্র / ছাত্রীর বিজ্ঞপ্তিতে উল্লেখিত বছরে পরীক্ষাসমূহের গ্রেড</h5>
	                    <div class="table-responsive">
	                      <table class="table table-bordered table-striped">
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
	                                <?=$users->application_exam_name?>
	                              </td>
	                              <td class="text-center">
	                                <?=$users->application_exam_year?>
	                              </td>
	                              <td class="text-center">
	                               <?=$users->application_exam_gpa?>
	                              </td>
	                              <td class="text-center">
	                                <?=$users->application_comment?>
	                              </td>
	                            </tr>
	                        </tbody>
	                      </table>
	                  </div>
	              </div>
	              <div class="col-md-12">
	                  <div class="table-responsive">
	                      <table class="table table-bordered table-striped">
	                          <colgroup>
	                              <col width="34%">
	                              <col width="33%">
	                              <col width="33%">
	                          </colgroup>
	                         <thead>
	                              <th class="text-center">আবেদনকারী ছাত্র / ছাত্রীর স্থায়ী ঠিকানা</th>
	                              <th class="text-center">বৰ্তমান পত্র যোগাযোগের ঠিকানা</th>
	                              <th class="text-center">অভিভাবক লেখাপড়ার ব্যয়ভার সঠিকভাবে বহন করতে সক্ষম কি-না </th>
	                          </thead>
	                          <tbody>
	                            <tr>
	                              <td>
	                               
	                                  গ্রাম/মহল্লা : <?=$users->permanent_village?> , 
	                                
	                                  ডাকঘর : <?=$users->permanent_post_office?> , 
	                                
	                                  উপজেলা : <?=$users->permanent_union?> , 
	                                
	                                  জেলা : <?=$users->permanent_district?>  
	                               
	                              </td>
	                              <td>
	                                <?=$users->communication_address?>
	                              </td>
	                              <td class="text-center">
	                               <?=$users->capable_your_family?>
	                              </td>
	                            </tr>
	                        </tbody>
	                      </table>
	                  </div>
	              </div>
	              <div class="col-md-12">
	                  <div class="table-responsive">
	                  <table class="table table-bordered">
	                      <colgroup>
	                          <col width="50%">
	                          <col width="50%">
	                      </colgroup>
	                      <thead>
	                        <tr>
	                          <th class="text-center">এসএসসি / এইচএসসি এর মার্কশিট</th>
	                          <th class="text-center">এসএসসি / এইচএসসি এর সনদ</th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        <tr>
	                          <td>
	                            <div class="form-group">
	                              <img id="academic_certificate" src="<?= base_url(); ?>student_img/<?=$users->academic_certificate?>"  class="img-responsive" style="width:100%"/>
	                            </div>
	                          </td>
	                          <td>
	                            <div class="form-group">
	                              <img id="academic_certificate2" src="<?= base_url(); ?>student_img/<?=$users->academic_certificate2?>"  class="img-responsive" style="width:100%"/>
	                            </div>
	                          </td>
	                          
	                        </tr>
	                      </tbody>
	                    </table>
	                  </div>
	              </div>

	              <div class="col-md-12">
	                  <div class="table-responsive">
	                  <table class="table table-bordered">
	                      <colgroup>
	                          <col width="50%">
	                          <col width="50%">
	                      </colgroup>
	                      <thead>
	                        <tr>
	                          <th class="text-center">জন্ম সনদ</th>
	                          <th class="text-center">শিক্ষা প্রতিষ্ঠানের প্রধান/বিভাগীয় প্রধানের মতামত/সুপারিশ</th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        <tr>
	                          <td>
	                            <div class="form-group">
	                              <img id="dob_certificate" src="<?= base_url(); ?>student_img/<?=$users->dob_certificate?>"  class="img-responsive" style="width:100%"/>
	                            </div>
	                          </td>
	                          <td>
	                            <div class="form-group">
	                              <img id="testimonial" src="<?= base_url(); ?>student_img/<?=$users->testimonial?>"  class="img-responsive" style="width:100%"/>
	                            </div>
	                          </td>
	                        </tr>
	                      </tbody>
	                    </table>
	                  </div>
	              </div>
              
              </div>
            </div>
            </div>
          </div>
        </div>
    </div>