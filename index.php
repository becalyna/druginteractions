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
		<a href="#home" data-role="button" data-icon="home" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Home</a>        
    	<h1> Drug Interactions DB </h1>
    	<a href="#info" data-role="button" data-icon="info" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Info</a>    
    </div>

    <div data-role="content">

        <ul data-role="listview">

            <li><h3> P450 Interactions Table </h3></li>

            <li>
                <div data-role="controlgroup" data-type="horizontal">
                    <a href="index.php" data-role="button" data-mini="true" class="ui-btn-active">All</a>
                    <a href="substrates.php" data-role="button" data-mini="true">Substrates</a>
                    <a href="inhibitors.php" data-role="button" data-mini="true">Inhibitors</a>
                    <a href="inducers.php" data-role="button" data-mini="true">Inducers</a>
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


<!-- Info Page -->
<div data-role="page" id="info">

    <div data-role="header">
		<a href="#home" data-role="button" data-icon="home" data-iconpos="notext" data-theme="b" data-iconshadow="false" data-inline="true">Home</a>        
        <h1> Information </h1>
    </div>
    
    <div data-role="content">
        <div data-role="collapsible-set" data-theme="c" data-content-theme="d">
            <div data-role="collapsible">
                <h3>Overview</h3>
                <p>This table is designed as a hypothesis testing, teaching and reference tool for physicians and researchers interested in drug interactions that are the result of competition for, or effects on the human cytochrome P450 system.<br><br>

Clinicians and health care providers may use this clinically-relevant table, which is designed for practical use during prescribing.<br><br>

The table contains lists of drugs in columns under the designation of specific cytochrome P450 isoforms. A drug appears in a column if there is published evidence that it is metabolized, at least in part, via that isoform. It does not necessarily follow that the isoform is the principal metabolic pathway in vivo, or that alterations in the rate of the metabolic reaction catalyzed by that isoform will have large effects on the pharmacokinetics of the drug.</p>
            </div>
            <div data-role="collapsible">
                <h3>Disclaimer</h3>
                <p>The content of this website is for public use, free of charge and for information only. It is not intended to be used in any other manner. The authors disclaim any liability, loss, injury, or damage incurred as a consequence, directly or indirectly, or the use and application of any of the contents of this website.<br><br> 

The information presented on this site is intended as general health information and as an educational tool. It is not intended as medical advice. Only a physician, pharmacist, or other health care professional should advise a patient on medical issues and should do so using a medical history and other factors identified and documented as part of the health professional/patient relationship.</p>
            </div>
            <div data-role="collapsible">
                <h3>Reference</h3>
                <p>If you use this site in your work, please acknowledge it by citing the following reference:<br><br>

<i>Flockhart DA. Drug Interactions: Cytochrome P450 Drug Interaction Table. Indiana University School of Medicine (2007). "http://medicine.iupui.edu/clinpharm/<br>ddis/clinical-table/" Accessed [date].</i></p>
            </div>
        </div>
	</div>
    
    <?php 
        include("inc/footer.inc");
    ?> 

</div>
<!-- End Info Page -->

</body>

</html>