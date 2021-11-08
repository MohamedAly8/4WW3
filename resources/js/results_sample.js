// Init function initializes the map and needed parameters for the map 
function init() {
    // Initialized the center of the map to Downtown toronto
    const initialPosition = { lat: 43.5592074, lng: -79.3326367 };
    // Sets the map instance to the div with ID map from the html to place map in that location in the html
    const map = new google.maps.Map(document.getElementById('map'), {
        // Centers the map in the beginning the the coords specified in initialPosition
        center: initialPosition,
        // The initial zoom of the map
        zoom: 15
    });
    // Initialized a variable for the pop ups for each marker to display info about restaurants
     const infoWindow = new google.maps.InfoWindow();

    // Get user's location
    // Gets the user's current position using the geolocation API
    if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(
            position => {
                console.log(`Lat: ${position.coords.latitude} Lng: ${position.coords.longitude}`);
      
                // Initialize variables for images to be used as icons for the User position on the map (image1) and the restaurants (imgage2)
                const image =
                    "https://developers.google.com/maps/documentation/javascript/examples/full/images/library_maps.png"
                const image2 = 
                "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"

                

                // A list of attributes for each marker on the map. Each marker has a Latitude and Longtitude, A message, A label and an icon image
                const stops = [
                    [{lat: position.coords.latitude, lng: position.coords.longitude}, "<h1>You Are Here:</h1> <br></br> Latitude: " + position.coords.latitude + "<br></br>Longitude: "+ position.coords.longitude + "<br></br>", "", image],
                    [{lat: position.coords.latitude - 0.005, lng: position.coords.longitude + 0.005}, "Ozzy's", "A", image2],
                    [{lat: position.coords.latitude + 0.0025, lng: position.coords.longitude + 0.0025}, "Burger Factory", "B", image2],
                    [{lat: position.coords.latitude - 0.0035, lng: position.coords.longitude - 0.0045}, "Five Guys", "C", image2]
                  ];
                  // Create an info window to share between markers.
                  const infoWindow = new google.maps.InfoWindow();

                  
                
                  // Create the markers using a for loop for each index of "stops" list above.
                  stops.forEach(([position, title, label, icon], i) => {
                      // Each marker has a position, title, label. Optimized is set to be false to make the labels static. 
                      // Also an additional href is added to each title to link each restaurant with its individual restaurant review page
                    const marker = new google.maps.Marker({
                      position,
                      map,
                      title: `${i + 1}. ${title} <a href = "individual_sample.html">View Reviews</a>`,
                      label,
                      optimized: false,
                      icon,
                    });
                
                    // Add a click listener for each marker, and set up the info window.
                    // The Listener opens the infoWindow onclick and retrieves the market Title and sets the content in the info Window to
                    // Title. The marker and its Title info is shown on the map till the user clicks else where
                    marker.addListener("click", () => {
                      infoWindow.close();
                      infoWindow.setContent(marker.getTitle());
                      infoWindow.open(marker.getMap(), marker);
                    });
                });

                // Center map to user's position.
                map.panTo({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                });
            },
            // Alerts the user for when there is an error with finding the position of the user 
            err => alert(`Error (${err.code}): ${getPositionErrorMessage(err.code)}`)
        );

       
            // If the Geolocation is not  supported by browser, an error is alerted to the user.
    } else {
        alert('Geolocation is not supported by your browser.');
    }

}


