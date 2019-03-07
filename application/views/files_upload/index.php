<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
.col-sm-3{padding-left:0px;}
.col-sm-6{padding-top:22px;}
.gallery{ width:100%; float:left; }
.gallery ul{ margin:0; padding:0; list-style-type:none;}
.gallery ul li{ padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}
</style>
</head>
<body>
<div role="navigation" class="navbar navbar-default navbar-static-top">
  <div class="container">
	<div class="navbar-header">
	  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a href="#" class="navbar-brand">IMAGE</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="#">Home</a></li>	   
	  </ul>	 
	</div>
  </div>
</div>
<div class="container" style="min-height:500px;">
<div class=''>
</div>
<div class="container">
	<div class="row ">			
		<form enctype="multipart/form-data" action="" method="post">
		<div class="form-group  col-sm-3">
			<label>Choose Files</label>
			<input type="file" class="form-control" name="upload_Files[]" multiple/>				
		</div>   
		<div class="form-group  col-sm-6">		
			<input  type="submit" class="btn btn-default" name="submitForm" id="submitForm" value="Upload" />	
		</div>		
	</div> 	
	<div class="row ">
		<p><?php echo $this->session->flashdata('statusMsg'); ?></p>
	</div>
    <div class="row">
		<div class="gallery">
			<ul>
				<?php if(!empty($gallery)): foreach($gallery as $file): ?>
				<li>
					<img width="200" height="200" src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" alt="" >
					<p>Uploaded On <?php echo date("j M Y",strtotime($file['created'])); ?></p>
				</li>
				<?php endforeach; else: ?>
				<p>No File uploaded.....</p>
				<?php endif; ?>
			</ul>
		</div>
    </div>
</div>
</body>
</html>