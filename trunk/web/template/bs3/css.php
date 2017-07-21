<?php 

	$dir=basename(getcwd());
	if($dir=="discuss3") $path_fix="../";
	else $path_fix="";
?>

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="<?php echo $path_fix."template/$OJ_TEMPLATE/"?>bootstrap.min.css">

<?php if(!isset($OJ_FLAT)||!$OJ_FLAT){?>
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="<?php echo $path_fix."template/$OJ_TEMPLATE/"?>bootstrap-theme.min.css">
<?php }?>
<link rel="stylesheet" href="<?php echo $path_fix."template/$OJ_TEMPLATE/$OJ_CSS"?>">
<link href="template/bs3/nav.css" type="text/css" rel="stylesheet">
<link href="template/bs3/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Roboto+Slab:300,400,700" rel="stylesheet">
