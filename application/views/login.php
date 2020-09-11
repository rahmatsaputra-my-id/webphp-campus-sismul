<?php defined('BASEPATH') or exit ('No direct script access allowed'); ?>
<!-- <?php if ($this->session->has_userdata('error')): ?>
  <div class="row">
    <div class="row center col s12 m12">
      <?= $this->session->flashdata('error')?>
    </div>
  </div>
<?php endif; ?>
<?php if (validation_errors() == TRUE): ?>
  <div class="row">
    <div class="row center col s12 m12" >
      <?php echo validation_errors('<p class="z-depth-4 card-panel red darken-1"><strong>Username dan Password tidak valid!</strong> ', '</p>');?>
    </div>
<?php endif; ?> -->
  <form enctype="multipart/form-data" action="<?php echo site_url('beranda/flogin')?>" method="post" class="col s12">
    <div class="row">
      <div class="input-field col s12">
        <input type="text" onkeyup="this.value = this.value.toLowerCase();" name="username" id="username" required class="validate" placeholder="Username">
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input type="text" onkeyup="this.value = this.value.toLowerCase();" name="password" id="password" required class="validate" placeholder="Password">
      </div>
    </div>
    <div class="row center">
      <div class="input-field col s12">
        <button type="submit" class="btn light-blue darken-4">Login</button>
      </div>
    </div>
  </form>
</div>
