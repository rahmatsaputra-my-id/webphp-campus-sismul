<?php defined('BASEPATH') or exit ('No direct script access allowed'); ?>
<?php if ($this->session->has_userdata('error')): ?>
  <div class="row">
    <div class="row center col s12 m12">
      <?= $this->session->flashdata('error')?>
    </div>
  </div>
<?php endif; ?>
<?php if (validation_errors() == TRUE): ?>
  <div class="row">
    <div class="row center col s12 m12" >
      <?php echo validation_errors('<p class="z-depth-4 card-panel red darken-1"><strong>Oh snap!</strong> ', '</p>');?>
    </div>
<?php endif; ?>
  <form enctype="multipart/form-data" action="<?php echo site_url('home/create')?>" method="post" class="col s12">
    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="judul" id="judul" class="validate" placeholder="Judul">
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="asal" id="asal" class="validate" placeholder="Asal Makanan">
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="desc_foto" id="desc_foto" class="validate" placeholder="Deskripsi Foto">
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea name="desc" class="materialize-textarea" placeholder="Description"></textarea>
      </div>
    </div>
    <div class="file-field input-field">
      <div class="btn light-blue darken-4">
        <span>Select File</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate">
      </div>
    </div>
    <div class="row center">
      <div class="input-field col s12">
        <button type="submit" class="btn light-blue darken-4">Create</button>
      </div>
    </div>
  </form>
</div>
