<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
	
	<div>
		<label>
			<?php
				$tanggal= mktime(date("m"),date("d"),date("Y"));
				echo " <b>".date("l d M Y", $tanggal)."</b>";
				date_default_timezone_set('Asia/Jakarta');
				$jam=date("H:i");
				echo ", <b>". $jam." "."</b>";
				$a = date ("H");
			?>
		</label><br>

		<font size="5">
			<b><?php echo $detail['judul'];?></b>
		</font><br>

		<label>Posted by: <?php echo $detail['user_id']?></label><br>
	</div><br>

	<div >
		 <img align="center" src="<?php echo base_url('asset/upload/'.$detail['file_name']);?>" alt="<?php echo $detail['judul']?>" style="height: 250px !important;"><br>
		 <label>Foto: <?php echo $detail['desc_foto']?> <b>(<?php echo $detail['user_id']?>/www.AndrewMatteo.id<!-- <?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?> -->)</b></label><br>
	</div>

	<div >
		<p> <b>Asal Makanan:</b> <?php echo $detail['asal'];?></p>

		<p> <b>Deskripsi:</b> </p>

		<p align='justify'><?php echo $detail['description'];?></p>
	</div>


		<!-- <div class="right">
			<a href="<?php echo site_url();?>" class="btn light-blue darken-4">
				<i class="material-icons left">arrow_back</i> Back
			</a>
		</div> -->
		</div>
	</div>