function initMap() {
    const serbia = {
        lat: 44.292401,
        lng: 21.162583,
    };
    // The map, centered on Serbia
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: serbia,
    });
}
