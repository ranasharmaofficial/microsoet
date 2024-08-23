 <?php 
	    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	  ?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=$base_url?>images/web__1_-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>On-demand last-mile delivery</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="<?=$base_url?>family=Russo+One&display=swap" rel="stylesheet">
    <link href="<?=$base_url?>family=Pacifico&display=swap" rel="stylesheet">
    <link href="<?=$base_url?>family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="<?=$base_url?>family=Exo+2:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=$base_url?>family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="<?=$base_url?>assets/css/vendors/bootstrap.css">
    <link id="color-link" rel="stylesheet" type="text/css" href="<?=$base_url?>assets/css/animate.min.css" media="all">
    <link id="color-link" rel="stylesheet" type="text/css" href="<?=$base_url?>assets/css/bulk-style.css" media="all">
    <link id="rtl-link" rel="stylesheet" type="text/css" href="<?=$base_url?>assets/css/vendors/animate.css">
    <link id="color-link" rel="stylesheet" type="text/css" href="<?=$base_url?>assets/css/style.css" media="all">
    <!-- <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/vendors/ion.rangeSlider.min.css">
    <!-- Template css -->
    
    
    <!-- <link id="color-link" rel="stylesheet" type="text/css" href="<?=$base_url?>css/font-style.css" media="all"> -->
	
	 