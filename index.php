<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Drug Interactions</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div data-role="page" id="home">

    <div data-role="header">
        <h1> Drug Interactions DB </h1>
    </div>

    <div data-role="content">

        <ul data-role="listview">

            <li><h3> P450 Interactions Table </h3></li>

            <li>
                <div data-role="controlgroup" data-type="horizontal">
                    <a href="substrates.php" data-role="button">Substrate</a>
                    <a href="inhibitors.php" data-role="button">Inhibitor</a>
                    <a href="inducers.php" data-role="button">Inducer</a>
                </div>
            </li>

            <li>
                <form>
                    <input id="searchterm" type="search" name="searchterm">
                </form>
            </li>

        </ul>

        <ul id="druglist" data-role="listview">
            <?php
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