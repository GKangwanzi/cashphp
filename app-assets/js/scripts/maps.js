function initMap() {
    // The location of Uluru
    const uluru = { lat: -0.6080427784461968, lng: 30.660179217931635 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 6,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }