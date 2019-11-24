var map;
      function initMap() {
		  
      		var concerts = new google.maps.LatLng(48.187837, 16.412832);

      		var zoo = new google.maps.LatLng(48.182065, 16.302634);

      		var church = new google.maps.LatLng(48.198267, 16.371839);

			var myLatlng = new google.maps.LatLng(48.216655, 16.397953);

			var myLatlngRoma = new google.maps.LatLng(41.892058, 12.470175);

			var myLatlngNapoleon = new google.maps.LatLng(45.625851, 5.050456);

			var it_rest = new google.maps.LatLng(48.294376, 12.105355);

			var mapOptions = {
			  zoom: 4,
			  center: myLatlng
			}
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);

			var marker = new google.maps.Marker({
			    position: myLatlng,
			    title:"Prater!"
			});

			var churchVienna = new google.maps.Marker({
			    position: church,
			    title:"Super Church!"
			});

			var zooVienna = new google.maps.Marker({
			    position: zoo,
			    title:"Zoo!"
			});

			var markerRoma = new google.maps.Marker({
			    position: myLatlngRoma,
			    title:"Trastevere!"
			});

			var markerNap = new google.maps.Marker({
			    position: myLatlngNapoleon,
			    title:"Napoleon!"
			});

			var conc_t = new google.maps.Marker({
			    position: concerts,
			    title:"Metallica, Steve Vay, Dream Theater and Iron Maiden!"
			});

			var italianR = new google.maps.Marker({
			    position: it_rest,
			    title:"Italian Restaurant!"
			});

			// To add the marker to the map, call setMap();
			marker.setMap(map);
			markerRoma.setMap(map);
			markerNap.setMap(map);
			italianR.setMap(map);
			conc_t.setMap(map);
			churchVienna.setMap(map);
			zooVienna.setMap(map);

		}