<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/materialize.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/fonts/material-icons/material-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/gap.css')?>">
    <title>Sismul</title>
  </head>
  <body>
    <script type="text/javascript" src="<?php echo base_url('asset/js/materialize.min.js')?>"></script>
    <header>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper light-blue darken-4">
            <a href="<?php echo site_url("home");?>">
              <i class="material-icons left" style="padding-left: 10px;">home</i> 
            HOME</a>
            <ul class="right hide-on-med-and-down">
              <li>
                <a href="<?php echo site_url('home/create')?>">Create</a>
              </li>
              <li>
                <a href="<?php echo site_url('home/manage')?>">Manage</a>
              </li>
              <li>
                <a href="<?php echo site_url('home/register')?>">Registrasi</a>
              </li>
              <li class="drop-down"><a href="<?php echo site_url('home/logout');?>"><!-- <?php echo $this->session->userdata("nama"); ?> -->Logout<!-- Logout --></a>
                <!-- <ul>
                  <li><a href="<?php echo base_url('logout');?>">Keluar</a></li>
                </ul> -->
              </li>
            </ul>

          </div>
        </nav>
      </div>
    </header>
    <main class="container" style="margin-top:10px !important;">
