<div class="col-md-11 form-panel">
    <div class="row ">
        <form action=" <?php echo Router::url('admin/users/addteam/'.$id); ?>" method="POST" class="form-group col-md-12" >
            <?php echo $this->Form->input('id','hidden');?>
              
            <div class="col-md-12 form-panel">
               <div class="row">
               <div class="col-md-6">
                        <?php echo $this->Form->input('firstname','La team est t elle active?',array('class' =>'form-control'));?>
                        <?php echo $this->Form->input('lastname', 'Team name ?', array('class' =>'form-control')) ;?>
                        <?php echo $this->Form->input('nickname', 'Games ?', array('class' =>'form-control '));?>
                        <?php echo $this->Form->input('mail', 'Team level ?', array('class' =>'form-control'));?>
                    </div>
                 
                    <div class="col-md-6">
                        <?php echo $this->Form->input('born', 'Team level ?', array('class' =>'form-control'));?>
                        <?php echo $this->Form->input('age', 'Team level ?', array('class' =>'form-control'));?>
                        <?php echo $this->Form->input('content', 'Team level ?', array('class' =>'form-control'));?>
                    </div>
               </div>
            </div>
            <div class="col-md-12 form-panel">
               <div class="row">
               <div class="col-md-6">
                        <?php echo $this->Form->input('firstname','La team est t elle active?',array('class' =>'form-control'));?>
                        <?php echo $this->Form->input('lastname', 'Team name ?', array('class' =>'form-control')) ;?>
                        <?php echo $this->Form->input('nickname', 'Games ?', array('class' =>'form-control '));?>
                        <?php echo $this->Form->input('mail', 'Team level ?', array('class' =>'form-control'));?>
                    </div>
                 
                    <div class="col-md-6">
                        <?php echo $this->Form->input('born', 'Team level ?', array('class' =>'form-control'));?>
                        <?php echo $this->Form->input('age', 'Team level ?', array('class' =>'form-control'));?>
                        <?php echo $this->Form->input('content', 'Team level ?', array('class' =>'form-control'));?>
                    </div>
               </div>
            </div>
          

            <div class="col-md-12" style="margin-bottom:20px;">
                <div id="toAddPlayer" class="row toAddPlayers">
                    <?php foreach($player as $k=>$v) : ?>
                    <input id="player<?php echo $v->id; ?>" type="hidden" name="player_<?php echo $v->id; ?>" value="<?php echo $v->team; ?>">
                    <div id="" class="col-xl-1  player" data-id="<?php echo $v->id; ?>"
                        style=" margin: 15px; width: auto;  height: auto">
                        <img class="allPlayers rounded float-left border playersHover" style="width: 108px; height: 152px;" src="<?php echo Router::webroot($v->avatarPath)?>" alt="">
                        <h6><?php echo $v->nickname; ?></h6>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button id="sub" value='send' type="submit" class="btn btn-primary sub">Submit</button>
            <button id="add" value='' type="" class="btn btn-primary sub">add players</button>
        </form>

    </div>
</div>

<div id="ContPlayers" class="col-md-11 form-panel players-conatiner">
    <div class="containerRow row">
        <?php foreach($players as $k=>$v) :?>
        <div id="pla" class="col-xl-2 player" data-id="<?php echo $v->id; ?>"
            style=" margin: 15px; width: auto;  height: auto">
            <img class="allPlayers border playersHover" style="width: 108px; height: 152px;"
                src="<?php echo Router::webroot($v->avatarPath)?>" alt="">
            <h6><?php echo $v->nickname; ?></h6>
            <?php if($v->team == 0) : ?>
            <h6>free agent</h6>
            <?php endif ?>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Registration Form</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

  <div class="form-group"> 
  <label class="col-md-4 control-label">Department / Office</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="department" class="form-control selectpicker">
      <option value="">Select your Department/Office</option>
      <option>Department of Engineering</option>
      <option>Department of Agriculture</option>
      <option >Accounting Office</option>
      <option >Tresurer's Office</option>
      <option >MPDC</option>
      <option >MCTC</option>
      <option >MCR</option>
      <option >Mayor's Office</option>
      <option >Tourism Office</option>
    </select>
  </div>
</div>
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="user_name" placeholder="Username" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="user_password" placeholder="Password" class="form-control"  type="password">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact_no" placeholder="(639)" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Select Basic -->

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
    <script>
    $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please enter your First Name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please enter your Last Name'
                    }
                }
            },
			 user_name: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please enter your Username'
                    }
                }
            },
			 user_password: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please enter your Password'
                    }
                }
            },
			confirm_password: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please confirm your Password'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Email Address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid Email Address'
                    }
                }
            },
            contact_no: {
                validators: {
                  stringLength: {
                        min: 12, 
                        max: 12,
                    notEmpty: {
                        message: 'Please enter your Contact No.'
                     }
                }
            },
			 department: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Department/Office'
                    }
                }
            },
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
</script>