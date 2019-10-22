
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


//ADD JS FOR THE TAB ITEMS STYLE TO FUNCTION PROPERLY!!!!!!
// ^^^ ACTUALLY PUT SCRIPT IN THE STYLE SHEET

var map;
var infowindow;

function initMap() {
	var usc = {lat: 34.0224, lng: -118.2851};

	map = new google.maps.Map(document.getElementById('map'), {
		center: usc,
	  	zoom: 14
	});


infowindow = new google.maps.InfoWindow();
var service = new google.maps.places.PlacesService(map);
var marker = new google.maps.Marker({map: map});


document.querySelector("#search-form").onsubmit = function() {
    var userInput = document.querySelector("#search-input").value.trim();
    
    console.log(userInput);
    // turn address to lat and long
    var geocodeObj = new google.maps.Geocoder();
    // var service = new google.maps.places.PlacesService(map);
    geocodeObj.geocode(
        {address: userInput},
        function(results) {
          // move the map to the search location
          map.setCenter(results[0].geometry.location);
          //marker.setPosition(results[0].geometry.location);
          var coord = results[0].geometry.location;
          var lookup = {
            location: coord,
            radius: '2500',
            keyword: ['basketball court']

          };
        service.nearbySearch(lookup, callback);
        console.log("lookup results");
    	console.log(lookup);

        }
    );

    return false;
    
}
}


function callback(results, status) {
	if (status === google.maps.places.PlacesServiceStatus.OK) {
		emptyResultList();
	  	for (var i = 0; i < results.length; i++) {
	    	createMarker(results[i]);
	    	addResult(results[i]);
	 	}
	  	console.log("callback results");
	  	console.log(results);
	}
}

function createMarker(place) {
var placeLoc = place.geometry.location;
var marker = new google.maps.Marker({
  map: map,
  position: place.geometry.location
});

google.maps.event.addListener(marker, 'click', function() {
  infowindow.setContent(place.name);
  infowindow.open(map, this);
});
}



//\/\/\/\/\/\/\/\/\/\/BREAK THIS UP INTO MINI FUNCTIONS YOU IDIOT
// display all the results
function addResult(place) {
	// CREATING DIV FIOR LIST ITEM
	var resultItemDiv = document.createElement('div');
	resultItemDiv.classList.add("justify-content-center");
	resultItemDiv.classList.add("result-item");

	// CREATING SAVE COURT BUTTON
	var saveButtonElement = document.createElement('button');
	var saveButtonText = document.createTextNode("SAVE COURT");
	saveButtonElement.appendChild(saveButtonText);
	saveButtonElement.classList.add("btn");
	saveButtonElement.classList.add("btn-outline-warning");

	// CREATING COURT NAME ITEM
	var nameElement = document.createElement('h4');
	var courtName = document.createTextNode(place.name);
	nameElement.appendChild(courtName);
	nameElement.style.color = "darkblue";

	// CREATING COURT ADDRESS ITEM
	var addressElement = document.createElement('h5');
	var courtAddress = document.createTextNode(place.vicinity);
	addressElement.appendChild(courtAddress);
	addressElement.style.color = "darkblue";

	//CREATING COURT RATING ITEM
	var ratingElement = document.createElement('h5');
	var ratingText = place.rating + "/5";
	var courtRating = document.createTextNode(ratingText);
	ratingElement.appendChild(courtRating);
	ratingElement.style.color = "darkblue";


	//CREATING PLACE IMAGE ITEM

	// img.style.marginBottom = "5px";

	// APPENDING ELEMENTS TO COURT DIV	
	resultItemDiv.appendChild(nameElement);
	if (place.photos){
		var picElement = document.createElement("img");
		picElement.src = place.photos['0'].getUrl({'maxWidth': 150, 'maxHeight': 150});
		resultItemDiv.appendChild(picElement);
	}
	else {
		var picElement = document.createElement("h6");
		var picText = document.createTextNode("No picture available.");
		picElement.style.color = "gray";
		picElement.appendChild(picText);
		resultItemDiv.appendChild(picElement);
	}
	resultItemDiv.appendChild(addressElement);
	resultItemDiv.appendChild(ratingElement);
	resultItemDiv.appendChild(saveButtonElement);
	


	//APPENDING COURT DIV TO RESULT LIST DIV
	document.querySelector('#list-results').appendChild(resultItemDiv);
	console.log("passing by append command");
	
	
	}

function emptyResultList(){
	var resultList = document.querySelector("#list-results");
	while(resultList.hasChildNodes()) {
		// console.log(tbody.firstChild);
		resultList.removeChild(resultList.firstChild);
	}
}

function centerChild(document){
	this.style.marginLeft("auto");
	this.style.marginRight("auto");
}




























