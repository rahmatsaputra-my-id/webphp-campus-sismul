<?php defined('BASEPATH') or exit ('No direct script access allowed'); ?>
<?php if ($this->session->has_userdata('error')): ?>
  <div class="row">
    <div class="row center col s12 m12">
      <?php echo $this->session->flashdata('error')?>
    </div>
  </div>
<?php endif; ?>
<?php if (validation_errors() == TRUE): ?>
  <div class="row">
    <div class="row center col s12 m12" >
      <?php echo validation_errors('<p class="z-depth-4 card-panel red darken-1"><strong>Oh snap!</strong> ', '</p>');?>
    </div>
<?php endif; ?>

  <form enctype="multipart/form-data" action="<?php echo site_url('home/edit/'.$edit['id']);?>" method="post" class="col s12">
    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="name" id="name" value="<?php echo $edit['judul'];?>">
        <label for="name">Tittle</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="asal" id="asal" value="<?php echo $edit['asal'];?>"> 
        <label for="desc">Asal Makanan</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="desc_foto" id="desc_foto" value="<?php echo $edit['desc_foto'];?>"> 
        <label for="desc">Deskripsi Foto</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <textarea name="desc" id="desc" class="materialize-textarea"><?php echo $edit['description'];?></textarea>
        <label for="desc">Description</label>
      </div>
    </div>
   
    <div class="row">
      <div class="center col s12">
        <img src="<?php echo base_url('asset/upload/'.$edit['file_name']); ?>" id="image" style="max-height: 30vh;" class="responsive-img">
      </div>
      <div class="file-field input-field col s12">
        <div class="btn light-blue darken-4">
          <span>Image</span>
          <input type="file" name="image" id="file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" onchange="thumbnail();" name="file">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 center">
        <button type="submit" class="btn light-blue darken-4">Update</button>
      </div>
    </div>
  </form>

  <script type="text/javascript">
    var elem = document.querySelector('#desc');
    M.textareaAutoResize(elem);

    function thumbnail (){
      var preview = document.querySelector("#image");
      var file   = document.querySelector('input[type=file]'.file[0];
      var reader = new FileReader();
      
      reader.onloadend = function(){
        preview.src = reader.result;
      }

      if (file){
        reader.readAsDataURL(file);
      }else{
        preview.src = "";
      }

    }
  </script>

</div>