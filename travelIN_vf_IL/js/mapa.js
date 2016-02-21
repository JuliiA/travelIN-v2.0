  var map;
  var infoWindow = null;
  var marker = null;
   /*
  function openInfoWindow(marker) {
      var markerLatLng = marker.getPosition();
      infoWindow.setContent([
          '<b>;La posicion del marcador es:</b><br/>',
          markerLatLng.lat(),
          ', ',
          markerLatLng.lng(),
          //'<br/><br/>Arrastrame y haz click para actualizar la posicion.'
          '<br/><br/>Arrastrame para actualizar la posicion.'
      ].join(''));
      infoWindow.open(map, marker);
      $('#lati').value() = markerLatLng.lat();
      $('#longi').value() = markerLatLng.lng();
  }
   */
   
   function getCoords(marker)
  {
    /*
    document.getElementById("loglat").innerHTML='Latitud: '+marker.getPosition().lat();
    document.getElementById("loglong").innerHTML='Longitud: '+marker.getPosition().lng();*/
    document.getElementById("loglat").value=marker.getPosition().lat();
    document.getElementById("loglong").value=marker.getPosition().lng();
  }

  function initialize() {
      var myLatlng = new google.maps.LatLng(-34.60837960408743 , -58.37210270265507);
      var myOptions = {
          zoom: 13,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($("#map_canvas").get(0), myOptions);

      infoWindow = new google.maps.InfoWindow();
   
      marker = new google.maps.Marker({
          position: myLatlng,
          draggable: true,
          map: map,
          title:"Ejemplo marcador arrastrable"
      });

      google.maps.event.addListener(marker, "mouseup", function() {
        getCoords(marker);
      });

      //google.maps.event.addListener(marker, "mouseup", function() {
        //              getCoords(marker);
   
      //google.maps.event.addListener(marker, 'click', function(){
       // google.maps.event.addListener(marker, 'mouseup', function(){
          //openInfoWindow(marker);
         // alert("me moviste");

      //});
  }

  function initialize2(latBD, longBD) {

      //var lat = document.getElementById("loglat").value;
      //var long = document.getElementById("loglong").value;

      var myLatlng = new google.maps.LatLng(latBD , longBD);
      var myOptions = {
          zoom: 13,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($("#map_canvas").get(0), myOptions);

      infoWindow = new google.maps.InfoWindow();
   
      marker = new google.maps.Marker({
          position: myLatlng,
          draggable: true,
          map: map,
          title:"Ejemplo marcador arrastrable"
      });

      google.maps.event.addListener(marker, "mouseup", function() {
        getCoords(marker);
      });

      //google.maps.event.addListener(marker, "mouseup", function() {
        //              getCoords(marker);
   
      //google.maps.event.addListener(marker, 'click', function(){
       // google.maps.event.addListener(marker, 'mouseup', function(){
          //openInfoWindow(marker);
         // alert("me moviste");

      //});
  }

  function initialize_sin_Marc() {
      var myLatlng = new google.maps.LatLng(-34.60837960408743 , -58.37210270265507);
      var myOptions = {
          zoom: 13,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($("#map_canvas").get(0), myOptions);

      infoWindow = new google.maps.InfoWindow();

      //google.maps.event.addListener(marker, "mouseup", function() {
        //              getCoords(marker);
   
      //google.maps.event.addListener(marker, 'click', function(){
       // google.maps.event.addListener(marker, 'mouseup', function(){
          //openInfoWindow(marker);
         // alert("me moviste");

      //});
  }

  function initialize_Marc_Quieto(latBD, longBD) {

      //var lat = document.getElementById("loglat").value;
      //var long = document.getElementById("loglong").value;

      var myLatlng = new google.maps.LatLng(latBD , longBD);
      var myOptions = {
          zoom: 13,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($("#map_canvas").get(0), myOptions);

      infoWindow = new google.maps.InfoWindow();
   
      marker = new google.maps.Marker({
          position: myLatlng,
          draggable: false,
          map: map,
          title:""
      });

      google.maps.event.addListener(marker, "mouseup", function() {
        getCoords(marker);
      });

      //google.maps.event.addListener(marker, "mouseup", function() {
        //              getCoords(marker);
   
      //google.maps.event.addListener(marker, 'click', function(){
       // google.maps.event.addListener(marker, 'mouseup', function(){
          //openInfoWindow(marker);
         // alert("me moviste");

      //});
  }
   /*
  $('#search').live('click', function() {
      // Obtenemos la dirección y la asignamos a una variable
      var address = $('#address').val();
      // Creamos el Objeto Geocoder
      var geocoder = new google.maps.Geocoder();
      // Hacemos la petición indicando la dirección e invocamos la función
      // geocodeResult enviando todo el resultado obtenido
      geocoder.geocode({ 'address': address}, geocodeResult);
  });
   */
  function buscarPos() {
      // Obtenemos la dirección y la asignamos a una variable
      var address = $('#address').val();
      // Creamos el Objeto Geocoder
      var geocoder = new google.maps.Geocoder();
      // Hacemos la petición indicando la dirección e invocamos la función
      // geocodeResult enviando todo el resultado obtenido
      geocoder.geocode({ 'address': address}, geocodeResult);
     // alert(address);

  }

  function geocodeResult(results, status) {
      // Verificamos el estatus
      if (status == 'OK') {
          // Si hay resultados encontrados, centramos y repintamos el mapa
          // esto para eliminar cualquier pin antes puesto
          var mapOptions = {
              center: results[0].geometry.location,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
          // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
          map.fitBounds(results[0].geometry.viewport);
          // Dibujamos un marcador con la ubicación del primer resultado obtenido
          var markerOptions = { 
                                draggable:true, 
                                position: results[0].geometry.location 
                              }
          marker = new google.maps.Marker(markerOptions);
          marker.setMap(map);

          //google.maps.event.addListener(map, "onload", function() {
                      getCoords(marker);
          //});
         
          google.maps.event.addListener(marker, "mouseup", function() {
                      getCoords(marker);
          });


      } else {
          // En caso de no haber resultados o que haya ocurrido un error
          // lanzamos un mensaje con el error
          alert("Geocoding no tuvo éxito debido a: " + status);
      }
  }
