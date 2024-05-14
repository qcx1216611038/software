<?php
   if(isset($_FILES['uploadedFile'])){
      $errors= array();
      $file_name = $_FILES['uploadedFile']['name'];
      $file_size = $_FILES['uploadedFile']['size'];
      $file_tmp = $_FILES['uploadedFile']['tmp_name'];
      $file_type = $_FILES['uploadedFile']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadedFile']['name'])));

      $extensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"upload/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>软件平台</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="http://fonts.googleapis.com/css?family=Oswald:300,400,700&amp;subset=latin-ext" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

	
<body>
<!-- header -->
<div class="header">
	
	<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-12">
						<ul class="nav navbar-nav w3_agile_nav" >
							<li><a href="index.html"><span>导入数据</span></a></li>
							<li><a href="organization.html"><span>方法选择</span></a></li>
							<li><a href="chairmen.html"><span>运行结果</span></a></li>
							
						</ul>
					</nav>
				</div>
	<h4>———————————————————————————————————————————————————————————————————————————</h4>
</div>
	<div id="container" style="width:1500px"> 
		<div id="header" style="background-color:#FFA500;">
			<h1 style="margin-bottom:0;">上传数据集</h1>
		</div> 
		<div id="menu" style="background-color:#989898;height:600px;width:200px;float:left;">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<input type="file" name="uploadedFile">
				<input type="submit" value="Upload">
			</form><br>
			<b>HTML</b><br>
			<b>CSS</b><br>
		</div>
		<div id="content" style="background-color:#EEEEEE;height:600px;width:1300px;float:left;">
			<h2>数据集内容在这里</h2>
		</div>
		<div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
			版权 © QCX
		</div> 
	</div>
<div>

<!-- start-smooth-scrolling -->
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function() {
		/*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

		$().UItoTop({ easingType: 'easeOutQuart' });

	});
</script>
<!-- //here ends scrolling icon -->
</body>
</html>
