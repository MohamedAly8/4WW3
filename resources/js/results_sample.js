function init() {
    //var lattitude = 59.325;
    //var longtitude = 18.069;
    const initialPosition = { lat: 26.846694, lng: 80.946166 };
    const map = new google.maps.Map(document.getElementById('map'), {
        center: initialPosition,
        zoom: 15
    });
    //const marker = new google.maps.Marker({ map, position: initialPosition });
     const infoWindow = new google.maps.InfoWindow();

    // Get user's location

    if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(
            position => {
                console.log(`Lat: ${position.coords.latitude} Lng: ${position.coords.longitude}`);
      

                const image =
                    "https://developers.google.com/maps/documentation/javascript/examples/full/images/library_maps.png"
                const image2 = 
                "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"

                


                const stops = [
                    [{lat: position.coords.latitude, lng: position.coords.longitude}, "<h1>You Are Here:</h1> <br></br> Latitude: " + position.coords.latitude + "<br></br>Longitude: "+ position.coords.longitude + "<br></br>", "", image],
                    [{lat: position.coords.latitude - 0.005, lng: position.coords.longitude + 0.005}, "Ozzy's", "A", image2],
                    [{lat: position.coords.latitude + 0.0025, lng: position.coords.longitude + 0.0025}, "Burger Factory", "B", image2],
                    [{lat: position.coords.latitude - 0.0035, lng: position.coords.longitude - 0.0045}, "Five Guys", "C", image2]
                  ];
                  // Create an info window to share between markers.
                  const infoWindow = new google.maps.InfoWindow();

                  
                
                  // Create the markers.
                  stops.forEach(([position, title, label, icon], i) => {
                    const marker = new google.maps.Marker({
                      position,
                      map,
                      title: `${i + 1}. ${title} <a href = "individual_sample.html">View Reviews</a>`,
                      label,
                      optimized: false,
                      icon,
                    });
                
                    // Add a click listener for each marker, and set up the info window.
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
            err => alert(`Error (${err.code}): ${getPositionErrorMessage(err.code)}`)
        );

       

    } else {
        alert('Geolocation is not supported by your browser.');
    }

}


