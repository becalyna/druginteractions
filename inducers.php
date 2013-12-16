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


<body>

<!-- Using PHP includes to separate pages  -->

<!-- Include First Page -->
<div data-role="page" id="inducers">

    <div data-role="header">
    
        <a href="#home" data-role="button" data-icon="home" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Home</a>        
        <h1> Drug Interactions DB </h1>
        <a href="#info" data-role="button" data-icon="info" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Info</a>    

    </div>

    <div data-role="content">

        <ul data-role="listview">

            <li><h3> P450 Interactions Table </h3></li>

            <li>
                <div data-role="controlgroup" data-type="horizontal">
                    <a href="index.php" data-role="button" data-mini="true" id="all">All</a>
                    <a href="substrates.php" data-role="button" data-mini="true" id="sub">Substrates</a>
                    <a href="inhibitors.php" data-role="button" data-mini="true" class="ui-btn-active" id="inh">Inhibitors</a>
                    <a href="inducers.php" data-role="button" data-mini="true" id="ind">Inducers</a>
                </div>
            </li>

        </ul>

        <ul id="druglist" data-filter="true" data-role="listview">
            <?php

				$action[] = 3;
                include("php/getEnzyme.php");
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