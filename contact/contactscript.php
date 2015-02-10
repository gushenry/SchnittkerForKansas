<?php
    // VALUES FROM THE FORM
    $name		= $_POST['name'];
    $email		= $_POST['email'];
    $message	= $_POST['msg'];

    // ERROR & SECURITY CHECKS
    if ( ( !$email ) ||
         ( strlen($_POST['email']) > 200 ) ||
         ( !preg_match("#^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$#", $email) )
       ) 
    { 
        $result = "The Email address you entered is invalid."; 
    } 
    elseif ( ( !$name ) ||
         ( strlen($name) > 100 ) ||
         ( preg_match("/[:=@\<\>]/", $name) ) 
       )
    { 
        $result =  "The name you entered is invalid.";
    } 
    elseif ( preg_match("#cc:#i", $message, $matches) )
    { 
        $result =  "Found Invalid Header Field";
    } 
    elseif ( !$message )
    {
        $result =  "You did not enter a message.";
    } 
    elseif (eregi("\r",$email) || eregi("\n",$email)){ 
        $result =  "The Email address you entered is invalid.";
    } 
    elseif (FALSE) { 
        $result =  "You cannot send to an email address on the same domain.";
    } 
    else {
    	// CREATE THE EMAIL
	    $headers	= "Content-Type: text/plain; charset=iso-8859-1\n";
	    $headers	.= "From: $name <$email>\n";
	    $recipient	= "mark@schnittkerforkansas.com";
	    $subject	= "My Message to Mark";
	    $message	= wordwrap($message, 1024);

	    // SEND THE EMAIL TO YOU
	    mail($recipient, $subject, $message, $headers);

	    // REDIRECT TO THE THANKS PAGE
	    header("location: thanks.php");
	    exit;
    }
?>

<!--
	Arcana 2.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<!DOCTYPE HTML>
<html>
	<head>
		<title>Mark Schnittker for Kansas - Problem Sending Message</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Schnittker for Kansas campaign. Mark Schnittker is running for Kansas state congressman for the 114th house district. Problem sending message." />
		<meta name="keywords" content="Kansas,114,district,Mark,Schnittker,House,Kingman,Topeka,for,about,campaign,error,problem,sending,message" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>

		<!-- Header -->

			<div id="header-wrapper">
				<header class="container" id="site-header">
					<div class="row">
						<div class="12u">
							<div id="logo">
								<h1>Mark Schnittker for Kansas</h1>
							</div>
							<nav id="nav">
								<ul>
									<li><a href="../..">Home</a></li>
									<li><a href="../about-mark">About Mark</a></li>
									<li><a href="../the-issues">The Issues</a></li>
									<li><a href="../the-114th">The 114th</a></li>
                                    <li><a href="../media">Media</a></li>
                                    <li><a href="../donate">Donate</a></li>
                                    <li><a href="../contact">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</header>
			</div>

		<!-- Main -->

        
        <div id="main-wrapper" class="subpage">
				<div class="container">
					<div class="row">
						<div class="12u skel-cell-important">
					
							<!-- Content -->

								<article class="first last">
								
									<h2>Problem sending message</h2>
								
									<p>
                                    
                                        <?php
                                        	print $result;
                                    	?>
                                       
                                    </p>

                                    <h2><a href="../contact" class="button">Try again</a></h2>
                                        
								</article>							

						</div>
					</div>
				</div>
			</div>

		<!-- Footer -->

			<div id="footer-wrapper">
				<footer class="container" id="site-footer">
					<div class="row">
						<div class="12u">
							<div id="copyright">
								Design by <a href="http://html5up.net">HTML5 UP</a> | Image: <a href="http://wallpaperstock.net">WallpaperStock</a> | <a href="../license">License and use information</a>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="12u">
							<div id="copyright">
                                Paid for by Mark Schnittker for Legislature, Jeffrey W. Rockett, Treasurer.
							</div>
                            <div>
                                <span id="cdSiteSeal1"><script type="text/javascript" src="//tracedseals.starfieldtech.com/siteseal/get?scriptId=cdSiteSeal1&amp;cdSealType=Seal1&amp;sealId=55e4ye7y7mb731e41b1c19e57365fd38qy7mb7355e4ye7ad508acd92f7f3a7d2"></script></span>
						</div>
					</div>
				</footer>
			</div>

	</body>
</html>

