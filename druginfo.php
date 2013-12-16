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
<div data-role="page" id="drug">

    <div data-role="header">
		<a href="index.php" data-role="button" data-icon="home" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Home</a>        
        <h1> Drug Information</h1>
    	<a href="index.php/#info" data-role="button" data-icon="info" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Info</a>    
    </div>

    <div data-role="content">

        <ul id="druglist" data-role="listview">
            <li>Drug: clozapine</li>
            <li>Action: Substrate</li>
            <li>Enzyme: 1A2</li>
            <li>PubMed References:</li>
            <li class="pubmed"><h3><a href="">Metabolism and bioactivation of clozapine by human liver in vitro.</a></h3></li>
			<li class="pubmed"><h4><a href="">Clozapine disposition covaries with CYP1A2 activity determined by a caffeine test.</a></h4></li>
        </ul>

    </div>

    <?php 
        include("inc/footer.inc");
    ?>  

</div>
<!-- End Home Page -->

</body>

</html>