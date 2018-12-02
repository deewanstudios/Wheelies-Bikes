<?php
ob_start();
$m_navigation_class = new Navigation();
$m_header           = $m_navigation_class->LandingPageHeader();
$m_slider           = $m_navigation_class->Slider();
$m_page_loader      = $m_navigation_class->PageLoader();
?>


<!DOCTYPE html>
<html lang="en" class="wide wow-animation smoothscroll scrollTo">
	<head>

		<!-- Site Title-->
		<title>
			<?php echo $this->m_page_title; ?>
		</title>


		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">


		<meta name="description" content="<?php echo $this->m_page_description; ?>">
		<meta name="keywords" content="<?php echo $this->m_page_keywords; ?>">
		<meta name="author" content="<?php echo $this->m_page_author; ?>">
		<link rel="canonical" href="<?php echo $this->m_page_url; ?>" />
		<meta property="og:title" content="<?php echo $this->m_open_graph_title; ?>">
		<meta property="og:description" content="<?php echo $this->m_open_graph_description; ?>">
		<meta property="og:keywords" content="<?php echo $this->m_open_graph_keywords; ?>">
		<meta property="og:type" content="<?php echo $this->m_open_graph_type; ?>">
		<meta property="og:url" content="<?php echo $this->m_open_graph_url; ?>">
		<meta property="og:site_name" content="<?php echo $this->m_open_graph_site_name; ?>">

		<meta name="website developed by" content="<?php echo $this->m_page_developed_by; ?>">
		<meta name="developer website" content="<?php echo $this->m_page_developer_website; ?>">


		<link rel="icon" href="<?php echo IMAGES; ?>favicon.ico" type="image/x-icon">
		<!-- Stylesheets-->


		<!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dancing+Script:700%7CLato:300,300italic,400,700,900%7CWork+Sans:300,400,500,600,700"> -->


		<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway:400,400i,500,500i&amp;subset=latin-ext" rel="stylesheet">


		<link rel="stylesheet" href="<?php echo URL; ?>css/style.css">
		<link rel="stylesheet" href="<?php echo URL; ?>css/wheelies-bikes-core-style.css">
		<link rel="stylesheet" href="<?php echo URL; ?>css/wheelies-bikes-fonts-style.css">
		<!--[if lt IE 10]>
		<div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0
		rgba(0,0,0,.3); clear: both; text-align:center; position: relative;
		z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
		src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
		alt="You are using an outdated browser. For a faster, safer browsing experience,
		upgrade for free today."></a></div>
		<script src="js/html5shiv.min.js"></script>
		<![endif]-->
	</head>



	<body>
		<!-- Page-->
		<div class="page text-center">


			<?php

echo $m_header;
echo $m_slider;

?>

