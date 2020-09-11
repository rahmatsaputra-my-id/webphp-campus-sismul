<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
  <?php foreach ($contents as $content): ?>
    <div class="col s12 m4 12">
      <a href="<?php echo site_url('Beranda/detailContent/'.$content['id']);?>">
        <img class="z-depth-4 shadow-demo" src="<?php echo base_url('asset/upload/'.$content['file_name']);?>" 
        alt="<?php $content['judul']?>" style="height: 150px !important; ">
      </a>
    </div>
  <?php endforeach; ?>
</div>
