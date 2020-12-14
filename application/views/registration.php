
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="<?= base_url('asset/images/logo_m.png') ?>" alt="WBTETSD"/>
                        <h3>SWATNA SEKHAR DHAR</h3>
                        <p>2nd Round Interview Assignment</p>
                        <a href="<?=base_url('index.php/login')?>" class="btn btn-info m-1"  target="_new" >Admin Login</a><br/>
                        <span>Admin user Id : admin </span><br/><span>Password : password </span>
                        
                    </div>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Registration</h3>
                                <?php echo form_open_multipart('',array('id'=>'registration_form',
                                    'name'=>'u_registration'
                                    ));?>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'name',
                                                    'id'    => 'r_name',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Name *',
                                                    'value' => $this->input->post('name'),
                                                    'class' => 'form-control'
                                            )), form_error('name', '<span class="error">', '</span>');
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'guardians_name',
                                                    'id'    => 'r_guardians_name',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Guardian’s name *',
                                                    'value' => $this->input->post('guardians_name'),
                                                    'class' => 'form-control'
                                            )), form_error('guardians_name', '<span class="error">', '</span>');
                                            ?>
                                            
                                        </div>
                                        <div class="form-group">
                                             <?php
                                             echo form_dropdown('gender', array(
                                                 ''=>'Select Gender *',
                                                 'm'=>'Female',
                                                 'f'=>'Male',
                                                 'o'=>'Other',
                                             ), $this->input->post('gender') ,array(
                                                        'id'       => 'r_gender',
                                                        'required'    => 'required',
                                                        'class' => 'form-control'
                                                )), form_error('gender', '<span class="error">', '</span>');
                                           
                                            ?>
                                             
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="inlineFormInputGroup">D.O.B.</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">D.O.B. *</div>
                                              </div>
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'dob',
                                                    'id'    => 'r_dob',
                                                    'required'    => 'required',
                                                    'readonly'    => 'readonly',
                                                    'placeholder'    => 'D.O.B. *',
                                                    'value' => $this->input->post('dob'),
                                                    'class' => 'form-control'
                                            ));
                                            ?>
                                        </div>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="inlineFormInputGroup">AGE</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">AGE *</div>
                                              </div>
                                            <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'age',
                                                    'id'    => 'r_age',
                                                    'required'    => 'required',
                                                    'readonly'    => 'readonly',
                                                    'placeholder'    => 'Age *',
                                                    'value' => $this->input->post('age'),
                                                    'class' => 'form-control'
                                            )) ;
                                            ?>
                                           <div class="input-group-prepend">
                                                <div class="input-group-text">Year</div>
                                              </div>     
                                          </div>
                                             <?=form_error('age', '<span class="error">', '</span>')?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <?php
                                             echo form_dropdown('district_id', $districts,
                                                     $this->input->post('district_id','') ,
                                                     array(
                                                        'id'       => 'r_district_id',
                                                        'required'    => 'required',
                                                        'class' => 'form-control'
                                                )), form_error('district_id', '<span class="error">', '</span>');
                                           
                                            ?>
                                           
                                        </div>
                                        <div class="form-group">
                                             <?php
                                            echo form_input(array(
                                                    'type'  => 'tel',
                                                    'name'  => 'mobile_no',
                                                    'id'    => 'r_mobile_no',
                                                    'maxlength'=>13,
                                                    'minlength'=>10,
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Mobile No *',
                                                    'value' => $this->input->post('mobile_no'),
                                                    'class' => 'form-control'
                                            )), form_error('mobile_no', '<span class="error">', '</span>');
                                            ?>
                                        </div>
                                        <div class="form-group">
                                             <?php
                                            echo form_input(array(
                                                    'type'  => 'email',
                                                    'name'  => 'email',
                                                    'id'    => 'r_email',
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Email Id *',
                                                    'value' => $this->input->post('email'),
                                                    'class' => 'form-control'
                                            )), form_error('email', '<span class="error">', '</span>');
                                            ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="sr-only" for="inlineFormInputGroup">Photo</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">Photo *</div>
                                              </div>
                                             <?php
                                            echo form_upload(array(
                                                    'name'  => 'photo',
                                                    'id'    => 'r_photo',
                                                    'required'    => 'required',
                                                    'accept'=>".jpg,.jpeg",
                                                    'placeholder'    => 'Photo (only jpg/jpeg within 100KB size) *',
                                                    'class' => 'form-control'
                                            ), $this->input->post('photo')), form_error('photo', '<span class="error">', '</span>');
                                            ?> 
                                            
                                            </div>
                                             <?=form_error('photo', '<span class="error">', '</span>')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="inlineFormInputGroup">Security Text</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                  <div id="captcha_div" class="input-group-text"><?php  echo  $capcha['image'];  ?> </div>
                                              </div>
                                             <?php
                                            echo form_input(array(
                                                    'type'  => 'text',
                                                    'name'  => 'anti_spamm',
                                                    'id'    => 'r_anti_spamm',
                                                    'maxlength'=>5,
                                                    'minlength'=>5,
                                                    'required'    => 'required',
                                                    'placeholder'    => 'Security Text *',
                                                    'title' => 'Enter Security Text',
                                                    'class' => 'form-control'
                                            ));
                                            ?>
                                            <div class="input-group-prepend">
                                                <div id="reload_captcha" class="input-group-text"> <span class="glyphicon glyphicon-refresh">Reload</span></div>
                                            </div>
                                            </div>
                                             <?=form_error('anti_spamm', '<span class="error">', '</span>')?>
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                        
                                    </div>
                                    <br> ** All fields are Reuired .
                                    <br> * Photo (only jpg/jpeg within 100KB size).
                                </div>
                                <?php echo form_close();?>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
 