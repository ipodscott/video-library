<html>
	<head>
	<title><?php the_title();?></title>
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	
	<?php wp_head(); ?>
	<style>
		.load-overlay{
			display: flex;
			align-items: center;
			justify-content: center;
			position: fixed;
			width: 100%;
			height: 100vh;
			top:0px;
			left: 0px;
			background-color: #1a1a1a;
			z-index: 999;
			color: #fff;
			font-size: calc(18px + (18 - 14) * ((100vw - 300px) / (1600 - 300)));
			letter-spacing: 0.5em;
		}
		
		.load-overlay div{
			text-align: center;
		}
		
		.load-overlay img{
			width: 280px;
			max-width: calc(100% - 40px);
			padding: 10px;
			margin: 0 0 0 0;
		}
		
	
	</style>
	
	</head>
	<body>