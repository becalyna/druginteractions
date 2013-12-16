<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Drug Interactions</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="apple-touch-icon" href="images/drugint.png" />

    <link href='http://fonts.googleapis.com/css?family=Stoke' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
    <link rel="stylesheet" href="css/mobile.css">

    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script src="js/myscripts.js"></script>
</head>

<?php
    $drug_id = $_REQUEST['drug_id'];

   if ($_SERVER['HTTP_REFERER']) {
        $referrer = htmlentities($_SERVER['HTTP_REFERER']);
    } else {
        $referrer = "index.php";
    }
?>

<body>

<!-- Using PHP includes to separate pages  -->

<!-- Include First Page -->
<div data-role="page" id="drug">

    <div data-role="header">
        <?php 
        echo '<a href="' . $referrer . '" data-role="button" data-icon="back" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Home</a>';
        ?>
        <h1> Drug Information</h1>
    	<a href="index.php/#info" data-role="button" data-icon="info" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Info</a>    
    </div>

    <div data-role="content">

        <ul id="druglist" data-role="listview">

        <?php

            include('php/getDrugInfo.php');
        ?>

        </ul>

    </div>

    <?php 
        include("inc/footer.inc");
    ?>  

</div>
<!-- End Home Page -->

</body>

</html>