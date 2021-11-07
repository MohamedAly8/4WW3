var myLatlng = new google.maps.LatLng(43.6360091,-79.6269842);


function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 16,
      center: { lat: 43.58134101996192, lng: -79.71344805588085 },
    });

    

    const marker = new google.maps.Marker({
      position: { lat: 43.58134101996192, lng: -79.71344805588085 },
      map,
      title: "Burger Factory",
    });
  }
  