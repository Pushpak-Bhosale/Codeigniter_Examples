<div class="container" style="margin-top: 20px;">
  <h1>Encryption In Codeigniter</h1>
  <form action="<?= base_url(); ?>Examples/key_encoder" method="post" >
    <div class="form-group">
      <div class="row">
        <div class="col-lg-6">
          <label for="user">Enter Your Message:</label>
          <input type="text" class="form-control" placeholder="Please Enter A Message..." id="" name="key" autocomplete="off" required >
        </div>
        <div class="col-lg-6">
          <label for="">Encrypted Message Output</label>
          <input type="text" class="form-control" readonly="" value="<?php if (isset($encrypt_value) && $encrypt_value != NULL) { print_r($encrypt_value); }  ?>">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </form> 
</div>
<div class="container" style="margin-top: 20px;">
  <h1>Decryption In Codeigniter</h1>
  <form action="<?= base_url(); ?>Examples/key_decoder" method="post" >
    <div class="form-group">
      <div class="row">
        <div class="col-lg-6">
          <label for="">Decode Message</label>
          <input type="text" class="form-control" readonly="" value="<?php if (isset($encrypt_value) && $encrypt_value != NULL) { print_r($encrypt_value); }  ?>" name="encrypt_key">
        </div>
        <div class="col-lg-6">
          <label for="">Decode Message Output</label>
          <input type="text" class="form-control" readonly="" value="<?php if (isset($decrypt_value) && $decrypt_value != NULL) { print_r($decrypt_value); }  ?>">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </form> 
</div>






