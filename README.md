
Drug Interactions
=================

A mobile app for interacting with the p450 drug interactions database.


├── README.md
│
├── css
│   └── mobile.css		(css page)
│
├── images				(misc Images)
│
├── inc
│   └── footer.inc 		(included in all pages)
│
├── index.php			(main index, defaults to "all" search)
├── inducers.php		(inducers page)
├── inhibitors.php		(inhibitors page)
├── substrates.php		(substrates page)
│
├── druginfo.php		(Page for drug info)
│
├── js
│   └── myscripts.js	(Callback scripts for search before jQuery filter)
│
└── php
    ├── directoryConnect.php	(DB Connection information)
    ├── getDrugInfo.php			(Gets complete information on a certain drug)
    ├── search.php				(Used in javascript search before jQuery filter)
    └── getEnzyme.php			(main search for All, Inducers, Inhibitors, Substrates)
