<?php 
include 'users.php'; 
?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Tox - User Directory</title>
    <!-- Mobile Specific Metas -->
	<link rel="shortcut icon" type="image/icon" href="../assets/imgs/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../assets/css/tuktuk.min.css">
    <link rel="stylesheet" href="../assets/css/tuktuk.theme.min.css">
    <link rel="stylesheet" href="../assets/css/tuktuk.icons.min.css">
    <style>
        body > header .logo {
            max-height: 45px; }

        body > footer img {
            height: 18px;
            position: relative;
            top: 5px;
            left: 2px; }

        section.landing input {
            border-radius: 5px 0px 0px 5px !important;

        }

        section.landing button {
            border-radius: 0px 5px 5px 0px !important;}
    </style>
</head>
<body>
    <!-- ========================== HEADER ========================== -->
    <header class="bck light padding">
        <div class="row">
            <div class="column_6">
                <a href="./"><img src="../assets/imgs/logo_head.png" alt="Logo Tox" class="logo on-left"/></a>
            </div>
            <nav class="column_6 text right">
				<a href="https://github.com/irungentoo/ProjectTox-Core" class="button secondary"><span class="icon info-sign"></span>Learn more</a>
                <a href="https://github.com/irungentoo/ProjectTox-Core" class="button"><span class="icon download"></span>Download</a>
            </nav>
        </div>
    </header>
	<section class="bck darkest landing text center color white">
        <div class="row">
            <div class="column_10 offset_1">
                <h1 class="landing"><?php echo $name;?></h1>
                <h3 class="margin-bottom"><?php echo $pubkey;?></h3>
            </div>
        </div>
        <div class="row">
            <div class="column_6 offset_3">
                <h4>
                   <a href="<?php echo $url;?>" class="button large margin-top">Friend Me</a>
                </h4>
            </div>
        </div>

    </section>


    <section class="bck theme landing">
        <div class="row text center">
            <div class="column_10 offset_1">
				<h5 class"text book italic">Use your phone to scan this QR code to add your friend</h5><br />
                <h4 class="text book italic"><?php echo '<img src="'.$qr.'">'; ?></h4>
            </div>
        </div>
    </section>


	<footer class="bck dark padding">
		<div class="row margin-top margin-bottom">
			<div class="column_3">
				<p class="text bold big">Free Software</p>
					We're cool guys from <span class="text normal">all around the world</span>.
			</div>
			<div class="column_4 offset_1">
				<p class="text bold big">Join the team</p>
					Help build Tox on <a href="https://github.com/irungentoo/ProjectTox-Core" class="text bold underline color theme">GitHub</a>.
			</div>
			<div class="column_3 offset_1">
				<p class="text bold big">Need some help?</p>
					Start your own project and ask us on <span class="text normal">GitHub</span>, or in <a href="ircs://irc.freenode.net/InsertProjectNameHere" class="text bold underline color theme">IRC</a>!
			</div>
		</div>
	</footer>

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="../assets/js/tuktuk.min.js"></script>
</body>
</html>
