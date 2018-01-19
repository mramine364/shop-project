
let loc = document.getElementById('get-location')

loc.addEventListener('click', function(e){
    e.preventDefault();

    getLocation()
})

let lat = document.getElementById("latitude"), lon = document.getElementById("longitude");

function getLocation() {
    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(showPosition)
    else      
        console.log("Geolocation is not supported by this browser.")
    
}

function showPosition(position) {
    lat.value = position.coords.latitude
    lon.value = position.coords.longitude
}