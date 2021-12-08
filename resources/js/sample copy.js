// A variable that holds a new object from the google maps API being a set of Lat and Long from a specific restuarant location
var myLatlng = new google.maps.LatLng(43.6360091,-79.6269842);

// This function initializes a map instance, where it is placed in the div wit the id "map" in the results_sample.html page
// The zoom parameter specifes how zoomed in the initialized map is
// The center parameter is where the map will be centered when it is first rendered on the page
function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 16, 
      center: { lat: 43.58134101996192, lng: -79.71344805588085 },
    });

    

    
// This marker variable is a visible red marker that will be shown on the map instantiated above 
// The position parameter is the location of the market, map parameter indicates which map this marker will be placed
// The title is shown when the user hovers on the market on the initialized map
    const marker = new google.maps.Marker({
      position: { lat: 43.58134101996192, lng: -79.71344805588085 },
      map,
      title: "Burger Factory",
    });
  }
