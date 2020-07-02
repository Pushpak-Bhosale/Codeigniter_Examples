<?php include ('header.php');?>
<?php include ('footer.php');?>
<div class="container" style="margin-top: 20px;">
  <h1>Admin Form</h1>
  <?php if ($error=$this->session->flashdata('Login_failed')){ ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="alert alert-danger">
          <?php echo "$error"; ?>
        </div>
      </div>
    </div>
  <?php }?>
  <form action="<?= base_url(); ?>Login/login" method="post" >
    
    <div class="form-group">
      <div class="row">
        <div class="col-lg-6">
          <label for="user">Username:</label>
          <input type="text" class="form-control" placeholder="Enter Username" id="uname" name="uname" autocomplete="off" required >
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-lg-6">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd" autocomplete="off" data-error-text="Please select an option" required>
        </div>
      </div>        
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Reset</button>
    <a class="link-class" href="<?= base_url(); ?>Login/register"> Sign Up?</a>
  </form> 
</div>






