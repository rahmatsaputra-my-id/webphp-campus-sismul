<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col s12">
		<table class="stripted hightlight centered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Image</th>
					<th>Tittle</th>
					<th>Option</th>
				</tr>
			</thead>

			<body>
				<?php $no= 1; foreach ($manages as $manage): ?>
				<tr>
					<td><?php echo $no;?>.</td>
					<td>
						<img class="z-depth-4 shadow-demo" src="<?php echo base_url('asset/upload/'.$manage['file_name']);?>" alt="<?php echo $manage['judul']?>" style="height: 100px !important;">
					</td>
					<td><?php echo $manage['judul']; ?></td>
					<td>
						<a class="btn light-blue darken-4" href="<?php echo site_url('home/edit/'.$manage['id'])?>" >
							<i class="material-icons">edit</i>
						</a>

						<a class="btn red darken-4" href="<?php echo site_url ('home/delete/'.$manage['id']);?>" onclick="return confirm('Yakin ingin hapus data?')">
							<i class="material-icons">delete</i>
						</a>
					</td>
				</tr>
				<?php $no++; endforeach; ?>
			</body>
		</table>
	</div>