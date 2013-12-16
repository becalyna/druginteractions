
function fillSearch() {

	$.post( "php/getEnzyme.php", { 'debugSet': 0 }, function( data ) {
		$( "#druglist" ).html( data );
	});

}



// A function to look at the DOM for any enzyme checked and do a jQuery Post to our getEnzyme.php function.
function enzymeChecked() {

	//var enzymes = $(':checkbox:checked');
	var enzymes = $( "INPUT[name='enzyme[]']:checked" );
	var actions = $( "INPUT[name='action[]']:checked" );
	var isDebug = $( "INPUT[name='debugSet']:checked" );
	console.log(enzymes);
	console.log(actions);

	var enzyme = [];
	var action = [];

	var debugSet = isDebug.length;
	console.log(debugSet);

	// This is the jQuery function that searches the DOM for checked checkboxes. <-- NOT TRUE ANYMORE
	//$(':checkbox:checked').each(function(i){
	console.log("enzymeschecked");
	enzymes.each(function(i){
		enzyme[i] = $(this).val();
		console.log(enzyme[i]);

    });
	
	
	console.log("actionschecked");
	actions.each(function(i){
		action[i] = $(this).val();
		console.log(action[i]);

    });
	

	$.post( "php/getEnzyme.php", { 'enzyme': enzyme, 'action': action, 'debugSet': debugSet }, function( data ) {
		$( "#liveSearchEnzymes" ).html( data );
	});
}


function doSearch() {

	//var enzymes = $(':checkbox:checked');
	var searchreq = $( "INPUT[name='searchterm" );
	var isDebug = $( "INPUT[name='debugSet']:checked" );

	var searchterm = searchreq.val();
	console.log(searchreq);
	console.log(searchterm);


	var debugSet = isDebug.length;
	console.log(debugSet);



	$.post( "php/search.php", { 'searchterm': searchterm, 'debugSet': debugSet }, function( data ) {
		$( "#liveSearch" ).html( data );
	});
}


function clearSearch() {
	document.getElementById('searchterm').value = '';
	document.getElementById('liveSearch').innerHTML = '';
}


function strengthChecked() {

	var strength = $( "INPUT[name='strength']:checked" );
	var isDebug = $( "INPUT[name='debugSet']:checked" );
	console.log(strength.val());

	var debugSet = isDebug.length;
	console.log(debugSet);

	$.post( "php/getStrength.php", { 'strength': 'weak', 'debugSet': debugSet }, function( data ) {
		$( "#weak" ).html( data );
	});

	$.post( "php/getStrength.php", { 'strength': 'moderate', 'debugSet': debugSet }, function( data ) {
		$( "#moderate" ).html( data );
	});

	$.post( "php/getStrength.php", { 'strength': 'strong', 'debugSet': debugSet }, function( data ) {
		$( "#strong" ).html( data );
	});

}


function fdaChecked() {

	var fda1 = $( "INPUT[name='fda1']:checked" ).val();
	var fda2 = $( "INPUT[name='fda2']:checked" ).val();
	var isDebug = $( "INPUT[name='debugSet']:checked" );
	console.log(fda1);
	console.log(fda2);

	var debugSet = isDebug.length;
	console.log(debugSet);

	$( "#liveSearchFDA" ).html('');

	if (fda1 == 1) {
		$.post( "php/getFDA.php", { 'fda_status': '1', 'debugSet': debugSet }, function( data ) {
			$( "#liveSearchFDA" ).append( data );
		});
	}

	if (fda2 == 2) {
		$.post( "php/getFDA.php", { 'fda_status': '2', 'debugSet': debugSet }, function( data ) {
			$( "#liveSearchFDA" ).append( data );
		});
	}

}
