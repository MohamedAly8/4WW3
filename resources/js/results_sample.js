function init() {
    //var lattitude = 59.325;
    //var longtitude = 18.069;
    const initialPosition = { lat: 26.846694, lng: 80.946166 };
    const map = new google.maps.Map(document.getElementById('map'), {
      center: initialPosition,
      zoom: 15
    });
    //const marker = new google.maps.Marker({ map, position: initialPosition });
  
    // Get user's location
  
    if ('geolocation' in navigator) {
      navigator.geolocation.getCurrentPosition(
        position => {
          console.log(`Lat: ${position.coords.latitude} Lng: ${position.coords.longitude}`);

          //Get the restaurants
          var markerlocations = [
            [position.coords.latitude, position.coords.longitude],
            [position.coords.latitude + 0.005, position.coords.longitude + 0.005],
            [position.coords.latitude + 0.0025, position.coords.longitude + 0.0025],
            [position.coords.latitude + 0.0035, position.coords.longitude + 0.0035]
        ];

        //Set Markers
        for(i  = 0;  i < markerlocations.length; i++) {
            var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(markerlocations[i][0], markerlocations[i][1]),
                    map: map,
            });
        }
  
          // Set marker's position.
          //marker.setPosition({
          //  lat: position.coords.latitude,
          //  lng: position.coords.longitude
         // });


  
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

