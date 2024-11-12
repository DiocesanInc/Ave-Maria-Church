// jQuery(document).ready(($)=>{
function initMap(){

  for (i = 0; i < locations.length; i++) {
    var mapID = locations[i]['count'];
    console.log(mapID);
    var map = new google.maps.Map(document.getElementById('map' + mapID), {
      center: new google.maps.LatLng(locations[i]['lat'], locations[i]['lang']),
      zoom: 13
    });
    for (j = 0; j < locations.length; j++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[j]['lat'], locations[j]['lang']),
        map: map,
        data: {
          name: locations[j]['name']
        }
      });
      marker.addListener('click', function() {
        if(!this.infoWindow) {
          this.infoWindow = new google.maps.InfoWindow({
            content: this.data.name
          });
        }
        this.infoWindow.open(map,this);
      })
      if(i === j){
        new google.maps.event.trigger( marker, 'click' );
      }
    }
    directionsDisplay = new google.maps.DirectionsRenderer({
      suppressMarkers: true
    });
    directionsDisplay.setMap(map);
  }
}
// });