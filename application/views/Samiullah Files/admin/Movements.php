<!-- saved from url=(0014)about:internet -->
<html>
	<head>
		<title>C5Title</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<style type="text/css">
			html, body {
			  height: 100%;
			  margin: 0;
			  padding: 0;
			}

			#map_canvas {
			  height: 100%;
			}
			
			#legend {
				background: gold;
				padding: 5px;
				width: 110px;
				height:auto;
				min-height:0px;
				max-height: 250px;
				overflow:auto;
			}
			#legend img {
				vertical-align: middle;
			}
			
			table {
			  border-collapse: collapse;
			  border-spacing: 0;
			  width: 100%;
			  border: 1px solid #ddd;
			}

			th, td {
			  border: 1px solid black;
			  text-align: left;
			  padding: 8px;
			}
			
			th {
			  background-color: gray;
			  color: white;
			}
			
			tr {
				cursor: pointer;
			}
			tr:hover { background-color: #0072BC; }

			/* tr:nth-child(even){background-color: #CCD1D1 } */
			
			
			.sidebar {
				height: 100%;
				width: 85px;
				position: fixed;
				z-index: 1;
				top: 0;
				left: 0;
				background-color: #111;
				overflow-x: hidden;
				transition: 0.5s;
				padding-top: 60px;
				white-space: nowrap;
			}
			
			.sidebar a {
				padding: 8px 8px 8px 32px;
				text-decoration: none;
				font-size: 25px;
				color: #818181;
				display: block;
				transition: 0.3s;
			}
			
			.sidebar a:hover {
				color: #f1f1f1;
			}
			
			.sidebar .closebtn {
				position: absolute;
				top: 0;
				right: 25px;
				font-size: 36px;
				margin-left: 50px;
			}
			
			.material-icons,
			.icon-text {
				vertical-align: middle;
			}
			
			.material-icons {
				padding-bottom: 3px;
			}
			
			#main {
				transition: margin-left .5s;
				padding: 16px;
				margin-left: 100px;
			}
			/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
			
			@media screen and (max-height: 450px) {
				.sidebar {
					padding-top: 15px;
				}
				.sidebar a {
					font-size: 18px;
				}
			}
			
			
			
			
			.loader {			  
			  border: 16px solid #f3f3f3;
			  border-radius: 50%;
			  border-top: 16px solid #3498db;
			  width: 120px;
			  height: 120px;
			  -webkit-animation: spin 2s linear infinite; /* Safari */
			  animation: spin 2s linear infinite;
			}

			/* Safari */
			@-webkit-keyframes spin {
			  0% { -webkit-transform: rotate(0deg); }
			  100% { -webkit-transform: rotate(360deg); }
			}

			@keyframes spin {
			  0% { transform: rotate(0deg); }
			  100% { transform: rotate(360deg); }
			}
			
		</style>

		<!--<script type="text/javascript" src="http://maps.google.com.mx/maps/api/js?v=3"></script>--> <!-- ?&key=AIzaSyDTcUAabUdy75i8OpRkMhnBH5v0pn_swMs -->    
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=drawing"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTcUAabUdy75i8OpRkMhnBH5v0pn_swMs&libraries=places" async defer></script> 
		<!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
		<script src="<?php echo base_url(); ?>js/oms.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>

		<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/dsxDockFloatPro.js"></script>

	</head>
	<body onload="initialize()">
		<script type="text/javascript">
			var map;
			var markers = [];
			var locationSearchMarkers = [];
			var marker = new google.maps.Marker;
			var infowindows = [];
			var polys = [];
			var movementLines = [];
			var legend;

			var mapLatLng; 
			var mapZoom = 11;

			var oms;
			var geocoder;

			var circleUnits;

			var directionsDisplay;
			var directionsService = new google.maps.DirectionsService();
			var arrDirectionsDisplayWithoutWaypoints = [];
			
			var dfp;
		    var dfwa = null;
		    var dfwb;
		    var dfwc;
		    var dfwd;
			
			////////////////////////////////////
			// SIDE BAR
			/*
			var mini = true;
			function toggleSidebar() {
				if (mini) {
					console.log("opening sidebar");
					document.getElementById("mySidebar").style.width = "250px";
					document.getElementById("main").style.marginLeft = "250px";
					this.mini = false;
				} else {
					console.log("closing sidebar");
					document.getElementById("mySidebar").style.width = "85px";
					document.getElementById("main").style.marginLeft = "85px";
					this.mini = true;
				}
			}
			*/
			// END SIDE BAR
			////////////////////////////////////
			
			////////////////////////////////////
			// START DB OPERATIONS
			
			$(function(){ 
				$.ajax({ 
				   method: "POST", 			   
				  url: "<?php echo base_url(); ?>admin/movements/userDetails",
				 }).done(function( data ) {
					 //alert(data);
					processDBData(data);
					
					document.getElementById("person_details_loader").style.display = "none";
					document.getElementById("person_details").style.display = "block";
					document.getElementById("person_details").style.cursor = "pointer";
				 });
					 
				/*
				 $("#display_locations").on('click', function(){								  
					dfwd = dfp.createDFPanel("Locations","mydfa");
					dfwd.addContentDiv(document.getElementById("dockfloatdivd"));      
					dfwd.initLayout(150,300,400,200,DSXDFPanel.dockRight);
			  
					 $.ajax({ 
					   method: "POST", 			   
					   url: "get_data.php",
					 }).done(function( data ) {
						processDBData(data);
					 });
				/*
			   }); 
			   /*
			   $("#display_movements").on('click', function(){
					alert("");
					 $.ajax({ 
					   method: "POST", 			   
					   url: "get_data.php",
					 }).done(function( data ) {
						processDBData(data, true);
					 });
			   });
				*/
		   }); 
		   
		   function processDBData(data){
			  // var result=data; // $.parseJSON(data); 
			   var result=$.parseJSON(data); 
			   var pushpins="";
			   var lines = "";

			  /* from result create a string of data and append to the div */
			  
			  var personDetailsTable='<table width="100%" height="50px"> \
							  <tr> \
								<th>Action</th> \
								<th>Date Of Arrival</th> \
								<th>Date Until Quarantined</th> \
								<th>Country Of Origin Of Journey</th> \
								<th>Port Of Origin Of Journey</th> \
								<th>Port Of Final Destination</th> \
								<th>Country Of Final Destination</th> \
								<th>Address</th> \
								<th>District City</th> \
								<th>State/UT/Province</th> \
								<th>Pin</th> \
								<th>Country</th> \
								<th>Final District City</th> \
								<th>Latitude</th> \
								<th>Longitude</th> \
								<th>Traveller Patient Name</th> \
								<th>Mobile No</th> \
								<th>IMEI</th> \
								<th>Device ID</th> \
								<th>Last Latitude</th> \
								<th>Last Longitude</th> \
								<th>Gender</th> \
							  <tr>';
			  
			  if (result.length > 0){
				for(var row = 0; row < result.length; row++){
					var date_of_arrival = result[row]['date_of_arrival']; 
					var date_until_quarantined = result[row]['date_until_quarantined']; 
					var country_of_origin_of_journey = result[row]['country_of_origin_of_journey']; 
					var port_of_origin_of_journey = result[row]['port_of_origin_of_journey']; 
					var port_of_final_destination = result[row]['port_of_final_destination']; 
					var country_of_final_destination = result[row]['country_of_final_destination']; 
					var address = result[row]['address']; 
					var district_city = result[row]['district_city']; 
					var state_ut_province = result[row]['state_ut_province']; 
					var pin = result[row]['pin']; 
					var country = result[row]['country']; 
					var final_district_city = result[row]['final_district_city']; 
					var latitude = result[row]['latitude']; 
					var longitude = result[row]['longitude'];  
					var traveller_patient_name = result[row]['traveller_patient_name']; 
					var mobile_no = result[row]['mobile_no']; 
					var imei = result[row]['imei']; 
					var device_id = result[row]['device_id']; 
					var last_latitude = result[row]['last_latitude']; 
					var last_longitude = result[row]['last_longitude']; 
					var gender = result[row]['gender'];
					
					var notification = "<B>Date Of Arrival = </B>" + date_of_arrival +										
										"<br><B>Date Until Quarantined = </B>" + date_until_quarantined +
										"<br><B>Country Of Origin Of Journey = </B>" + country_of_origin_of_journey +
										"<br><B>Port Of Origin Of Journey = </B>" + port_of_origin_of_journey +
										"<br><B>Port Of Final Destination = </B>" + port_of_final_destination +
										"<br><B>Country Of Final Destination = </B>" + country_of_final_destination +
										"<br><B>Address = </B>" + address +
										"<br><B>District City = </B>" + district_city +
										"<br><B>State/UT/Province = </B>" + state_ut_province +
										"<br><B>Pin = </B>" + pin +
										"<br><B>Country = </B>" + country +
										"<br><B>Final District City = </B>" + final_district_city +
										"<br><B>Latitude = </B>" + latitude +
										"<br><B>Longitude = </B>" + longitude +
										"<br><B>Traveller Patient Name = </B>" + traveller_patient_name +
										"<br><B>Mobile No = </B>" + mobile_no +
										"<br><B>IMEI = </B>" + imei +
										"<br><B>Device ID = </B>" + device_id +
										"<br><B>Last Latitude = </B>" + last_latitude +
										"<br><B>Last Longitude = </B>" + last_longitude +
										"<br><B>Gender = </B>" + gender +
										"<br><button type='button' onclick='getMovements("+ mobile_no +")'>Show History</button>";
					
					if (pushpins != "")
					{
						pushpins += "$$$$";
					}
					
					pushpins += latitude + "$$$" + longitude + "$$$" + notification + "$$$" + "0" + "$$$" + "red" + "$$$" + "Quarantined";
					 
					 personDetailsTable += "<tr onclick='getMovements(this)'>" +
									/*"<td><button type='button' id='display_movements' onclick='getMovements(this)'>Show Movements</button></td>" +*/
									"<td>"+ date_of_arrival + "</td>" +
									"<td>"+ date_until_quarantined +"</td>" +
									"<td>"+ country_of_origin_of_journey +"</td>" +
									"<td>"+ port_of_origin_of_journey +"</td>" +
									"<td>"+ port_of_final_destination +"</td>" +
									"<td>"+ country_of_final_destination +"</td>" +
									"<td>"+ address +"</td>" +
									"<td>"+ district_city +"</td>" +
									"<td>"+ state_ut_province +"</td>" +
									"<td>"+ pin +"</td>" +
									"<td>"+ country +"</td>" +
									"<td>"+ final_district_city +"</td>" +
									"<td>"+ latitude +"</td>" +
									"<td>"+ longitude +"</td>" +
									"<td>"+ traveller_patient_name +"</td>" +
									"<td>"+ mobile_no +"</td>" +
									"<td>"+ imei +"</td>" +
									"<td>"+ device_id +"</td>" +
									"<td>"+ last_latitude +"</td>" +
									"<td>"+ last_longitude +"</td>" +
									"<td>"+ gender +"</td>" +
								"</tr>";			
				}
			  }
			  
			  personDetailsTable += '</table>'; 
			  $("#person_details").html(personDetailsTable);
				 
			 if (pushpins != "")
				addMarker(pushpins, lines);
			 else
				alert("No records found.");
		   }
		   
		   function showMovements(data){
			  // var result= data; // $.parseJSON(data); 
			   var result=   $.parseJSON(data); 
			   var pushpins="";
			   var lines = "";

			  /* from result create a string of data and append to the div */
			  
			  var movementDetailsTable='<table width="100%" height="50px"> \
							  <tr> \
								<th>Sl No</th> \
								<th>Time Stamp</th> \
								<th>Latitude</th> \
								<th>Longitude</th> \
								<th>Mobile No</th> \
								<th>Movement Source</th> \
							  <tr>';
			  
			  if (result.length > 0){
				for(var row = 0; row < result.length; row++){
					
						var p_time_stamp = result[row]['p_time_stamp']; 
						var latitude = result[row]['latitude']; 
						var longitude = result[row]['longitude']; 						
						var mobile_no = result[row]['mobile_no']; 
						var movementSource = result[row]['movement_source1']; 
										
						var notification = "<B>Time Stamp = </B>" + p_time_stamp +									
											"<br><B>Latitude = </B>" + latitude +
											"<br><B>Longitude = </B>" + longitude +
											"<br><B>Mobile No = </B>" + mobile_no +
											"<br><B>Movement Source = </B>" + movementSource;
						
						if (pushpins != "")
						{
							pushpins += "$$$$";
						}
												
						var color = "red";
						if (movementSource === "CDR"){
							color = "blue";
						} else {
							color = "red";
						}
						
						pushpins += latitude + "$$$" + longitude + "$$$" + notification + "$$$" + "0" + "$$$" + color + "$$$" + movementSource;
						
						if ((row + 1) < result.length){
							var latitudePlusOne = result[row + 1]['latitude']; 
							var longitudePlusOne = result[row + 1]['longitude']; 
						
							if (lines != "")
							{
								lines += "$$$$";
							}
							
							lines += latitude + "$$$" + longitude + "$$$" + latitudePlusOne + "$$$" + longitudePlusOne + "$$$" + color;
						}
						
						movementDetailsTable += "<tr onclick='onMovementsRowClick(this)'>" +
												"<td>"+ (row + 1) + "</td>" +	
												"<td>"+ p_time_stamp + "</td>" +								
												"<td>"+ latitude +"</td>" +
												"<td>"+ longitude +"</td>" +
												"<td>"+ mobile_no +"</td>" +
												"<td>"+ movementSource +"</td>" +
											"</tr>";
				}
			  }
			  
			  movementDetailsTable += '</table>'; 
			  $("#movement_details").html(movementDetailsTable);			  
				
			 if (pushpins != ""){				
				addMarker(pushpins, lines);
			}else{
				alert("No records found.");
			}
		   }
		   
		   function getMovements(ctl) {	
			  //alert(ctl.rowIndex);
			  //_row = $(ctl).parents("tr");	
			  //var cell = ctl.cells[15].innerHTML;
			  //var cols = ctl.children("td");
			  
			  clearMap();
			  
			  var mobile_no;
			  var type = typeof ctl;
			  
			  if (type === "number")
				mobile_no = ctl;
			  else
				mobile_no = ctl.cells[15].innerHTML; // $(cols[16]).text();
			  
			  if (dfwa == null){
				dfwa = dfp.createDFPanel("History","mydfa");
				dfwa.addContentDiv(document.getElementById("dockfloatdiva"));      
				dfwa.initLayout(150,300,400,200,DSXDFPanel.dockRight);
			  }
			  
			  document.getElementById("movement_details_loader").style.display = "block";
			  document.getElementById("movement_details").style.display = "none";
			  
			  $.ajax({ 
			   method: "POST", 			   
			  // url: "get_movements.php",
			  url: "<?php echo base_url(); ?>admin/movements/usermovements",
			   data: { "mobile_no": mobile_no }
			   
			 }).done(function( data ) {
				if (data == 101) {
					alert("Invalid mobile number.");
				}else{
					showMovements(data);
					document.getElementById("movement_details_loader").style.display = "none";
					document.getElementById("movement_details").style.display = "block";
				}
			 });
			}
			
			function onMovementsRowClick(ctl) {	
			  //alert(ctl.rowIndex);
			  var index = ctl.rowIndex;
			  if (index > 0){
				index = index - 2;
				showTooltipFromBackend(index);
			  }
			  //_row = $(ctl).parents("tr");	
			  //var cell = ctl.cells[15].innerHTML;
			  //var cols = ctl.children("td");
			  //var mobile_no = ctl.cells[3].innerHTML; // $(cols[16]).text();
			}
			
			// END DB OPERATIONS
			////////////////////////////////////	

			function deletecook(name) {
				var d = new Date();
				document.cookie = name + ";expires=" + d.toGMTString() + ";" + ";";
			}

			function createCookie(name, value, days) {
				if (days) {
					var date = new Date();
					date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
					var expires = "; expires=" + date.toGMTString();
				}
				else {
					var expires = "";
					document.cookie = name + "=" + value + expires + "; path=/";
				}
			}

			function getCookie(c_name) {
				var i, x, y, ARRcookies = document.cookie.split(";");
				for (i = 0; i < ARRcookies.length; i++) {
					x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
					y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
					x = x.replace(/^\s+|\s+$/g, "");
					if (x == c_name) {
						return unescape(y);
					}
				}
			}

			function MapZoomCookie(mapZoom) {
				var fntcookie = getCookie("FromOtherPage_MapZoom");
				if (fntcookie != null && fntcookie != "") {
					deletecook("FromOtherPage_MapZoom");
				}
				fntcookie = mapZoom;
				if (fntcookie != null && fntcookie != "") {
					createCookie("FromOtherPage_MapZoom", fntcookie);
				}
			}

			function FNT_FromOtherPage_latlngCookie(FNTLat, FNTLng) {
				var fntcookie = getCookie("FNT_FromOtherPage_latlng");
				if (fntcookie != null && fntcookie != "") {
					deletecook("FNT_FromOtherPage_latlng");
				}
				fntcookie = FNTLat + "," + FNTLng;
				if (fntcookie != null && fntcookie != "") {
					createCookie("FNT_FromOtherPage_latlng", fntcookie);
				}
			}

			function printMap() {
				window.print();
			}

			function initialize() {
				//map= new google.maps.Map(document.getElementById('map_canvas'), 
				//{
				//    zoom: 18,
				//    center: new google.maps.LatLng(15,76),
				//    mapTypeId: google.maps.MapTypeId.SATELLITE,
				//    disableDefaultUI: true,
				//    zoomControl: true,
				//    maxZoom: 19
				//});
				
				dfp = DSXDFUtil.createDSXDFUtil();
				dfp.addFixedPanel(document.getElementById("centerdiv"), DSXDFUtil.fixedCenter);
				
				dfwd = dfp.createDFPanel("Quarantine","mydfa");
				dfwd.addContentDiv(document.getElementById("dockfloatdivd"));      
				dfwd.initLayout(150,300,400,200,DSXDFPanel.dockRight);
				
				document.getElementById("person_details_loader").style.display = "block";
				document.getElementById("person_details").style.display = "none";

				mapLatLng = new google.maps.LatLng(12.9667, 77.5667);
				directionsDisplay = new google.maps.DirectionsRenderer();
				
				var linkedMapZoom;
				try {
					linkedMapZoom = getCookie("FromOtherPage_MapZoom");
					if (linkedMapZoom == undefined) {
						MapZoomCookie(11);
					} else {
						if (linkedMapZoom != null && linkedMapZoom != "") {
							mapZoom = parseInt(linkedMapZoom);
						}
					}
				}
				catch (e) {
					//catch and just suppress error
				}

				geocoder = new google.maps.Geocoder;

				var linkedlatlng;
				try {
					linkedlatlng = getCookie("FNT_FromOtherPage_latlng");
					if (linkedlatlng == undefined) {
						FNT_FromOtherPage_latlngCookie(12.9667, 77.5667);
					} else {
						if (linkedlatlng != null && linkedlatlng != "") {
							var linkedlatlngArr = linkedlatlng.split(",");
							var linkedlat = linkedlatlngArr[0];
							var linkedlng = linkedlatlngArr[1];
							mapLatLng = new google.maps.LatLng(linkedlat, linkedlng);
						}
					}
				}
				catch (e) {
					//catch and just suppress error
				} 

				//alert(mapLatLng);

				legend = document.getElementById('legend');
				bounds = new google.maps.LatLngBounds();

				map = new google.maps.Map(document.getElementById('map_canvas'),
				{
					zoom: mapZoom,
					center: mapLatLng,
					mapTypeControlOptions: {
						mapTypeIds: new Array(google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.TERRAIN)
					},
					fullscreenControl: false,
					mapTypeControl: true,
					streetViewControl: false,
					panControl: false,
					disableDoubleClickZoom: true,
					zoomControlOptions: {
						position: google.maps.ControlPosition.LEFT_BOTTOM
					}
				});

				map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);

				google.maps.event.addListener(map, 'click', function (event) {
					//            FNT_FromOtherPage_latlngCookie(event.latLng.lat(), event.latLng.lng());
					//            //marker.setMap(null);
					//            for (var i = 0, marker; marker = markers[i]; i++) {
					//                marker.setMap(null);
					//            }
					//            marker = new google.maps.Marker({ position: event.latLng, map: map });
					//            //document.getElementById("case_lat").value = event.latLng.lat();
					//            //document.getElementById("case_long").value = event.latLng.lng();
					//            //document.getElementById("latitude").value = event.latLng.lat();
					//            //document.getElementById("longitude").value = event.latLng.lng();
					//            markers.push(marker);

					//            endDragMarkerCS(event.latLng.lat(), event.latLng.lng());

					onMapClick(event.latLng.lat(), event.latLng.lng());
				});

				google.maps.event.addListener(map, 'zoom_changed', function () {
					var zoom = map.getZoom();
					MapZoomCookie(zoom);
				});

				google.maps.event.addListener(map, 'center_changed', function () {
					var mce = map.getCenter();
					FNT_FromOtherPage_latlngCookie(mce.lat(), mce.lng());
				});

				// ################ Search Box ###########################
				//Create the search box and link it to the UI element.
				var input = document.getElementById('pac-input');
				var searchBox = new google.maps.places.SearchBox(input);
				map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
				/*
				input.addEventListener("keyup", function (event) {
					event.preventDefault();
					if (event.keyCode === 13) {
						var inputValue = input.value;
						var latlngStr = inputValue.split(',', 2);
						var latlng = { lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1]) };
						geocoder.geocode({ 'location': latlng }, function (results, status) {
							if (status === 'OK') {
								if (results[0]) {
									var points = [];
									locationSearchMarkers.forEach(function (marker) {
										marker.setMap(null);
									});
									locationSearchMarkers = [];

									var icon = {
										url: 'https://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png',
										size: new google.maps.Size(71, 71),
										origin: new google.maps.Point(0, 0),
										anchor: new google.maps.Point(17, 34),
										scaledSize: new google.maps.Size(25, 25)
									};

									points.push(new google.maps.LatLng(latlng.lat, latlng.lng));
									locationSearchMarkers.push(new google.maps.Marker({
										map: map,
										icon: icon,
										position: latlng
									}));
									//infowindow.setContent(results[0].formatted_address);
									//infowindow.open(map, marker);

									AutoCenter(points);
								} else {
									window.alert('No results found');
								}
							} else {
								//window.alert('Geocoder failed due to: ' + status);
							}
						});
					}
				});
				*/
				// Bias the SearchBox results towards current map's viewport.
				map.addListener('bounds_changed', function () {
					searchBox.setBounds(map.getBounds());
					//var sw = map.getBounds().getCenter();
					//FNT_FromOtherPage_latlngCookie(sw.lat(), sw.lng());
				});

				// Listen for the event fired when the user selects a prediction and retrieve
				// more details for that place.
				searchBox.addListener('places_changed', function () {
					// Clear out the old markers.
					locationSearchMarkers.forEach(function (marker) {
						marker.setMap(null);
					});
					locationSearchMarkers = [];

					searchBox.set('map', null);

					var places = searchBox.getPlaces();

					//if (places.length == 0) {

					var inputValue = input.value;
					var latlngStr = inputValue.split(',', 2);
					var latlng = { lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1]) };
					geocoder.geocode({ 'location': latlng }, function (results, status) {
						if (status === 'OK') {
							if (results[0]) {
								var points = [];
								locationSearchMarkers.forEach(function (marker) {
									marker.setMap(null);
								});
								locationSearchMarkers = [];

								var icon = {
									url: 'https://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png',
									size: new google.maps.Size(71, 71),
									origin: new google.maps.Point(0, 0),
									anchor: new google.maps.Point(17, 34),
									scaledSize: new google.maps.Size(25, 25)
								};

								points.push(new google.maps.LatLng(latlng.lat, latlng.lng));
								locationSearchMarkers.push(new google.maps.Marker({
									map: map,
									icon: icon,
									position: latlng
								}));
								//infowindow.setContent(results[0].formatted_address);
								//infowindow.open(map, marker);

								AutoCenter(points);
							} else {
								window.alert('No results found');
							}
						} else {
							//window.alert('Geocoder failed due to: ' + status);
						}
					});

					//return;
					//}

					// For each place, get the icon, name and location.
					var bounds = new google.maps.LatLngBounds();
					places.forEach(function (place) {
						if (!place.geometry) {
							console.log("Returned place contains no geometry");
							return;
						}
						var icon = {
							url: place.icon,
							size: new google.maps.Size(71, 71),
							origin: new google.maps.Point(0, 0),
							anchor: new google.maps.Point(17, 34),
							scaledSize: new google.maps.Size(25, 25)
						};

						// Create a marker for each place.
						locationSearchMarkers.push(new google.maps.Marker({
							map: map,
							icon: icon,
							title: place.name,
							position: place.geometry.location
						}));

						if (place.geometry.viewport) {
							// Only geocodes have viewport.
							bounds.union(place.geometry.viewport);
						} else {
							bounds.extend(place.geometry.location);
						}
					});
					map.fitBounds(bounds);
				});

				//window.external.LoadMarkersOnMap();
			}

			function clearMap() {
				for (var i = 0; i < markers.length; i++) {
					markers[i].setMap(null);
				}
				markers = [];

				for (var i = 0; i < polys.length; i++) {
					polys[i].setMap(null);
				}
				polys = [];

				for (var i = 0; i < movementLines.length; i++) {
					movementLines[i].setMap(null);
				}
				movementLines = [];

				removeChilds(legend);

				directionsDisplay.setMap(null);

				for (var i = 0; i < arrDirectionsDisplayWithoutWaypoints.length; i++) {
					arrDirectionsDisplayWithoutWaypoints[i].setMap(null);
				}
				arrDirectionsDisplayWithoutWaypoints = [];
					 
			}

			function calcRoute(startLat, startLng, endLat, endLng, arrWayPoints) {
				var waypts = [];
				var del = "$$";

				var start = new google.maps.LatLng(startLat, startLng);
				var end = new google.maps.LatLng(endLat, endLng);

				if (arrWayPoints != null && arrWayPoints != "") {
					var tempArrWayPoints = arrWayPoints.split(del);
					for (i = 0; i < tempArrWayPoints.length; i++) {
						if (tempArrWayPoints[i] != null) {
							var arr = tempArrWayPoints[i].split(",");
							waypts.push({
								location: new google.maps.LatLng(arr[0], arr[1]),
								stopover: true
							});
						}
					}
				}    
				
				var request = {
					origin: start,
					destination: end,
					provideRouteAlternatives: true,            
					optimizeWaypoints: true,
					region: "IN",
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				};

				if (arrWayPoints != null && arrWayPoints != "") {
					request.waypoints = waypts;
				}

				directionsService.route(request, function (response, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(response);
						directionsDisplay.setMap(map);
					}
					else if (status == google.maps.DirectionsStatus.NOT_FOUND) {
						alert("At least one of the locations specified in the requests's origin, destination could not be located.");
					}
					else if (status == google.maps.DirectionsStatus.ZERO_RESULTS) {
						alert("No route could be found between the origin and destination.");
					}
					else if (status == google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED) {
						alert("Too many Directions waypoints were provided in the Directions Request. The maximum allowed waypoints is 8, plus the origin, and destination.");
					}
					else if (status == google.maps.DirectionsStatus.INVALID_REQUEST) {
						alert("Provided Directions request was invalid.");
					}
					else if (status == google.maps.DirectionsStatus.OVER_QUERY_LIMIT) {
						alert("Webpage has sent too many requests within the allowed time period.");
					}
					else if (status == google.maps.DirectionsStatus.REQUEST_DENIED) {
						alert("Webpage is not allowed to use the directions service.");
					}
					else if (status == google.maps.DirectionsStatus.UNKNOWN_ERROR) {
						alert("An unknown error occurred.");
					}
				});
			}

			function addMarkerInRouteMap(serialNo, latLng, notification) {
				marker = new google.maps.Marker
				({
					position: latLng,
					map: map,
					labelAnchor: new google.maps.Point(22, 0),
					labelStyle: { opacity: 0.5, color: '#FF0000', whiteSpace: 'nowrap' },
					//draggable: true,
					//animation: google.maps.Animation.DROP,
					title: "Click to show more information"
				});

				var cnt = parseInt(serialNo);
				marker.setIcon('https://prosoftesolutions.com/balloons/' + cnt + '.png');

				markers.push(marker);

				var iw = new google.maps.InfoWindow();
				var toolTipText = '<div width="300px">' + notification + '</div>';
				
				infowindows.push(iw);

				google.maps.event.addListener(marker, 'click', (function (marker, i) {
					return function () {
						for (var i = 0; i < infowindows.length; i++) {
							infowindows[i].close();
						}

						iw.setContent(toolTipText);
						iw.open(map, marker);
					}
				})(marker, i));
			}

			var routeCount = 0;
			function plotRoutesWithoutWayPoints(routes) {
				var delimiter = "$$$$";
				routeCount = 0;

				clearMap();

				var arrayRoutes = routes.split(delimiter);
				calcRouteWithoutWaypoints(arrayRoutes);
			}

			function calcRouteWithoutWaypoints(arrayRoutes) {
				var del = "$$$";
				var frmSerialNo;
				var frmLat;
				var frmLng;
				var frmNotification;
				var toSerialNo;
				var toLat;
				var toLng;
				var toNotification;

				try {

					if (arrayRoutes[routeCount] != null) {
						var arr = arrayRoutes[routeCount].split(del);
						frmSerialNo = arr[0];
						frmLat = arr[1];
						frmLng = arr[2];
						frmNotification = arr[3];
						toSerialNo = arr[4];
						toLat = arr[5];
						toLng = arr[6];
						toNotification = arr[7];

						var start = new google.maps.LatLng(frmLat, frmLng);
						var end = new google.maps.LatLng(toLat, toLng);

						var directionsDisplayWithoutWaypoints = new window.google.maps.DirectionsRenderer({
							suppressMarkers: true
						});
						arrDirectionsDisplayWithoutWaypoints.push(directionsDisplayWithoutWaypoints);

						addMarkerInRouteMap(frmSerialNo, start, frmNotification);
						addMarkerInRouteMap(toSerialNo, end, toNotification);

						var request = {
							origin: start,
							destination: end,
							provideRouteAlternatives: true,
							region: "IN",
							travelMode: google.maps.DirectionsTravelMode.DRIVING
						};

						directionsService.route(request, function (response, status) {
							var dis = "0";
							if (status == google.maps.DirectionsStatus.OK) {
								directionsDisplayWithoutWaypoints.setDirections(response);
								directionsDisplayWithoutWaypoints.setMap(map);

								sleep(1000);

								routeCount += 1;
								if (routeCount < arrayRoutes.length) {
									calcRouteWithoutWaypoints(arrayRoutes);
								}
								else {
									//window.external.StopLoader();
								}
							}
							else if (status == google.maps.DirectionsStatus.NOT_FOUND) {
								alert("At least one of the locations specified in the requests's origin, destination could not be located.");
							}
							else if (status == google.maps.DirectionsStatus.ZERO_RESULTS) {
								alert("No route could be found between the origin and destination.");
							}
							else if (status == google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED) {
								alert("Too many Directions waypoints were provided in the Directions Request. The maximum allowed waypoints is 8, plus the origin, and destination.");
							}
							else if (status == google.maps.DirectionsStatus.INVALID_REQUEST) {
								alert("Provided Directions request was invalid.");
							}
							else if (status == google.maps.DirectionsStatus.OVER_QUERY_LIMIT) {
								alert("Webpage has sent too many requests within the allowed time period.");
							}
							else if (status == google.maps.DirectionsStatus.REQUEST_DENIED) {
								alert("Webpage is not allowed to use the directions service.");
							}
							else if (status == google.maps.DirectionsStatus.UNKNOWN_ERROR) {
								alert("An unknown error occurred.");
							}

							if (status != google.maps.DirectionsStatus.OK) {
								//window.external.StopLoader();
							}
						});
					}            
				}
				catch (err) {
					//window.external.StopLoader();
					alert(err.message);
				}
			}

			function sleep(milliseconds) {
				var start = new Date().getTime();
				for (var i = 0; i < 1e7; i++) {
					if ((new Date().getTime() - start) > milliseconds) {
						break;
					}
				}
			}

		//    function calcRouteWithoutWaypoints(frmSerialNo, frmLat, frmLng, frmNotification, toSerialNo, toLat, toLng, toNotification) {
		//        var start = new google.maps.LatLng(frmLat, frmLng);
		//        var end = new google.maps.LatLng(toLat, toLng);
		//        var directionsDisplayWithoutWaypoints = new window.google.maps.DirectionsRenderer({
		//            suppressMarkers: true
		//        });

		//        arrDirectionsDisplayWithoutWaypoints.push(directionsDisplayWithoutWaypoints);

		//        addMarkerInRouteMap(frmSerialNo, start, frmNotification);
		//        addMarkerInRouteMap(toSerialNo, end, toNotification);

		//        var request = {
		//            origin: start,
		//            destination: end,
		//            provideRouteAlternatives: true,
		//            region: "IN",
		//            travelMode: google.maps.DirectionsTravelMode.DRIVING
		//        };

		//        directionsService.route(request, function (response, status) {
		//            var dis = "0";
		//            if (status == google.maps.DirectionsStatus.OK) {
		//                directionsDisplayWithoutWaypoints.setDirections(response);
		//                directionsDisplayWithoutWaypoints.setMap(map);
		//            }
		//            else if (status == google.maps.DirectionsStatus.NOT_FOUND) {
		//                alert("At least one of the locations specified in the requests's origin, destination could not be located.");
		//            }
		//            else if (status == google.maps.DirectionsStatus.ZERO_RESULTS) {
		//                alert("No route could be found between the origin and destination.");
		//            }
		//            else if (status == google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED) {
		//                alert("Too many Directions waypoints were provided in the Directions Request. The maximum allowed waypoints is 8, plus the origin, and destination.");
		//            }
		//            else if (status == google.maps.DirectionsStatus.INVALID_REQUEST) {
		//                alert("Provided Directions request was invalid.");
		//            }
		//            else if (status == google.maps.DirectionsStatus.OVER_QUERY_LIMIT) {
		//                alert("Webpage has sent too many requests within the allowed time period.");
		//            }
		//            else if (status == google.maps.DirectionsStatus.REQUEST_DENIED) {
		//                alert("Webpage is not allowed to use the directions service.");
		//            }
		//            else if (status == google.maps.DirectionsStatus.UNKNOWN_ERROR) {
		//                alert("An unknown error occurred.");
		//            }
		//        });
		//    }

				var removeChilds = function (node) {
				var last;
				while (last = node.lastChild) node.removeChild(last);
			};

			function addMarker(pushpins, lines) {
				var delimiter = "$$$$";
				var del = "$$$";
				var lat;
				var lng;
				var txt;
				var azimuth;
				var color;
				var cdrPhoneNo;

				try {

					clearMap();

					//alert("Map Cleared");

					var legends = [];
					var legendCaption = "";

					if (pushpins == "") {
						return;
					}

					var tempPushpins = pushpins.split(delimiter);
					var points = [];

					oms = new OverlappingMarkerSpiderfier(map, {
						markersWontMove: true,   // we promise not to move any markers, allowing optimizations
						markersWontHide: true,   // we promise not to change visibility of any markers, allowing optimizations
						basicFormatEvents: true  // allow the library to skip calculating advanced formatting information
					});

					for (i = 0; i < tempPushpins.length; i++) {
						if (tempPushpins[i] != null) {
							var arr = tempPushpins[i].split(del);
							lat = arr[0];
							lng = arr[1];
							txt = arr[2];
							azimuth = arr[3];
							color = arr[4];
							cdrPhoneNo = arr[5];

							var latLng = new google.maps.LatLng(lat, lng);
							var toolTipText = '<div width="300px">' + txt + '</div>';

							marker = new google.maps.Marker
							({
								position: latLng,
								map: map,
								//draggable: true,
								//animation: google.maps.Animation.DROP,
								title: "Click to show more information."
							});

							color += "-dot";

							var googleIcon = 'http://maps.google.com/mapfiles/ms/icons/' + color + '.png';

							legendCaption = cdrPhoneNo;
							if (legends.indexOf(legendCaption) == -1) {
								legends.push(legendCaption);
								var div = document.createElement('div');
								//div.innerHTML = '<div style="width:15px;height:15px;border:1px solid #000; background-color: ' + arr[4] + '"/><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + legendCaption + '</label>';
								div.innerHTML = '<img src="' + googleIcon + '"> ' + legendCaption;
								legend.appendChild(div);
							}

							marker.setIcon(googleIcon);

							points.push(new google.maps.LatLng(lat, lng));
							markers.push(marker);
							oms.addMarker(marker);

							google.maps.event.addListener(marker, 'spider_click', (function (marker, i) {
								return function () {
									showTooltip(tempPushpins[i], i);
								}
							})(marker, i));

							if (azimuth != 0) {
								// Inamullah - 29_Nov_2019 - As per discussion with Irshad Sir commenting showAzimuth code
								// Because as per Support team we are plotting wrong azimuth on maps

								////setTimeout(showAzimuth(latLng, azimuth), 1000);                 
								//showAzimuth(latLng, azimuth);
							}
						}
					}

					if (lines != "") {                
						var tempMovementLines = lines.split(delimiter);
						var point1, point2, point3, point4;

						color = '#7FFF00';

						for (i = 0; i < tempMovementLines.length; i++) {
							if (tempMovementLines[i] != null) {
								var arr = tempMovementLines[i].split(del);
								point1 = parseFloat(arr[0]);
								point2 = parseFloat(arr[1]);
								point3 = parseFloat(arr[2]);
								point4 = parseFloat(arr[3]);
								color = arr[4];

								var arrLatLong = [
							  { lat: point1, lng: point2 },
							  { lat: point3, lng: point4 }
							];
								var movementLine = new google.maps.Polyline({
									path: arrLatLong,
									geodesic: true,
									strokeColor: color,
									strokeOpacity: 1.0,
									strokeWeight: 2
								});

								movementLine.setMap(map);
								movementLines.push(movementLine);
							}
						}
					}
					
					AutoCenter(points);
					//endDragMarkerCS(lat, lng);

				}
				catch (err) {
					alert(err.message);
				}
			}

			function showTooltip(tempPushpins, index) {

				var iw = new google.maps.InfoWindow();

				for (var i = 0; i < infowindows.length; i++) {
					infowindows[i].close();
				}

		//        var infowindow = new google.maps.InfoWindow({
		//            maxWidth: 350
		//        });

				var arr = tempPushpins.split("$$$");
				var lat = arr[0];
				var lng = arr[1];
				var txt = arr[2];
				var o_azimuth = arr[3];
				
				var toolTipText = '<div width="300px">' + txt + '</div>';

				iw.setContent(toolTipText);
				iw.open(map, markers[index]);

				infowindows.push(iw);
				
				/*
				if (o_azimuth == "0") {
					return;
				}

				var arr_azimuth = o_azimuth.split(",");

				if (arr_azimuth != null && arr_azimuth.length > 0) {
					var starts = parseInt(arr_azimuth[0]);
					var azimuth = parseInt(arr_azimuth[1]);
					var ends = parseInt(arr_azimuth[2]);

					var toolTipText = '<div width="300px">' + txt + '</div><div><button type="button" onclick="showIndividualAzimuthOnDemand(\'' + lat + '\', \'' + lng + '\', \'' + starts + '\', \'' + azimuth + '\', \'' + ends + '\')">Show azimuth</button></div>';

					iw.setContent(toolTipText);
					iw.open(map, markers[index]);

					infowindows.push(iw);
					//        infowindow.setContent(toolTipText);
					//        infowindow.open(map, markers[index]);
				}
				else
				{
					alert("Invalid azimuth data.");
				}
				*/
			}

			function showIndividualAzimuthOnDemand(lat, lng, starts, azimuth, ends){
				ClearAzimuthsFromMap();
				var points = [];
				points.push(new google.maps.LatLng(lat, lng));
				showAzimuthOnDemand(lat, lng, starts, azimuth, ends);

				AutoCenter(points);
			}

			function showTooltipFromBackend(index) {
				//index = index - 1;
				//alert(index);
				google.maps.event.trigger(markers[index], 'click');
				google.maps.event.trigger(markers[index], 'click');
			}

			function closeAllInfoWindows() {
				for (var i = 0; i < infowindows.length; i++) {
					infowindows[i].close();
				}
			}

			function AutoCenter(points) {
				//  Create a new viewpoint bound
				try {
					var bounds = new google.maps.LatLngBounds();
					//  Go through each...
					if (points.length > 0) {
						for (var i = 0; i < points.length; i++) {
							bounds.extend(points[i]);
						}
						map.fitBounds(bounds);
						if (points.length == 1) {
							map.setZoom(16);
						}
					}
					else {
						bounds.extend(new google.maps.LatLng(12.9667, 77.5667));
						map.fitBounds(bounds);
						google.maps.event.addListenerOnce(map, 'bounds_changed', function (event) {
							if (map.getZoom() > 12) {
								map.setZoom(12);
							}
						});
					}
				}
				catch (e) {
					alert(e.Description);
				}
			}

			function showAzimuth(latLng, azimuth) {
				//for (var point = 0; point < points.length; point++) {
				//var latLng = points[point];
				var slices = [
						[0, azimuth, 'red']
					],
					i = 0,
					radiusMeters = 200;

				for (; i < slices.length; i++) {
					var path = getArcPath(latLng, radiusMeters, slices[i][0], slices[i][1]);
					//Insert the center point of our circle as first item in path
					path.unshift(latLng);
					//Add the center point of our circle as last item in path to create closed path.
					//Note google does not actually require us to close the path,
					//but doesn't hurt to do so
					path.push(latLng);
					var poly = new google.maps.Polygon({
						path: path,
						map: map,
						strokeWeight: 0,
						fillColor: slices[i][2],
						fillOpacity: 0.6
					});
					polys.push(poly);
				}
				//}
			}

			function showAzimuthOnDemandOLD(lat, lng, azimuth) {
				// Inamullah - 29_Nov_2019 - As per discussion with Irshad Sir commenting showAzimuth code
				// Because as per Support team we are plotting wrong azimuth on maps

				// Dont do anything just return
				return;

				var latLng = new google.maps.LatLng(lat, lng);

				for (var i = 0; i < polys.length; i++) {
					polys[i].setMap(null);
				}
				polys = [];

				var slices = [
						[0, azimuth, 'red']
					],
					i = 0,
					radiusMeters = 200;

				for (; i < slices.length; i++) {
					var path = getArcPath(latLng, radiusMeters, slices[i][0], slices[i][1]);
					//Insert the center point of our circle as first item in path
					path.unshift(latLng);
					//Add the center point of our circle as last item in path to create closed path.
					//Note google does not actually require us to close the path,
					//but doesn't hurt to do so
					path.push(latLng);
					var poly = new google.maps.Polygon({
						path: path,
						map: map,
						strokeWeight: 0,
						fillColor: slices[i][2],
						fillOpacity: 0.6
					});
					polys.push(poly);
				}        
			}

			function showAzimuthOnDemand(lat, lng, starts, azimuth, ends) {
				// 03-Jan-2020 - Inamullah
				// Plotting azimuth using starts and ends

				var latLng = new google.maps.LatLng(lat, lng);

				//for (var i = 0; i < polys.length; i++) {
				//    polys[i].setMap(null);
				//}
				//polys = [];

				var slices = [[starts, ends, 'red']], i = 0, radiusMeters = 200;

				for (; i < slices.length; i++) {
					var path = getArcPath(latLng, radiusMeters, slices[i][0], slices[i][1]);
					//Insert the center point of our circle as first item in path
					path.unshift(latLng);
					//Add the center point of our circle as last item in path to create closed path.
					//Note google does not actually require us to close the path,
					//but doesn't hurt to do so
					path.push(latLng);
					var poly = new google.maps.Polygon({
						path: path,
						map: map,
						strokeWeight: 0,
						fillColor: slices[i][2],
						fillOpacity: 0.6
					});
					polys.push(poly);
				}
			}

			function getArcPath(center, radiusMeters, startAngle, endAngle, direction) {
				var point, previous,
				atEnd = false,
				points = Array(),
				a = startAngle;
				while (true) {
					point = google.maps.geometry.spherical.computeOffset(center, radiusMeters, a);
					points.push(point);
					if (a == endAngle) {
						break;
					}
					a++;
					if (a > 360) {
						a = 1;
					}
				}
				if (direction == 'counterclockwise') {
					points = points.reverse();
				}
				return points;
			}

			function ClearAzimuthsFromMap(){
				for (var i = 0; i < polys.length; i++) {
					polys[i].setMap(null);
				}
				polys = [];
			}

			function eventEndDragMarker(shape) {
				var pos = new google.maps.LatLng;
				pos = shape.getPosition();
				endDragMarkerCS(pos.lat(), pos.lng());
			}

			function onMapClick(lat, long) {
				//window.external.onMapClick(lat, long);
			}
			 
		</script>
		
		<DIV ID="dockfloatdivd" STYLE="overflow:auto;background-color:#F4F6F6">
			<div class="loader" id="person_details_loader" style="top:50%;"></div>
			<div id="person_details" style="overflow-x:auto; height:100%;"></div>
		</DIV>
		
		<DIV ID="dockfloatdiva" STYLE="overflow:auto;background-color:#F4F6F6">
			<div class="loader" id="movement_details_loader" style="top:50%;"></div>
			<div id="movement_details" style="overflow-x:auto; height:100%;"></div>
		</DIV>
		<!--
		<div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
			<a href="#"><span><i class="material-icons">info</i><span class="icon-text">&nbsp;&nbsp;&nbsp;&nbsp;about</span></a><br>
			<a href="#"><i class="material-icons">spa</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;services</a></span>
			</a><br>
			<a href="#"><i class="material-icons">monetization_on</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;clients</span></a><br>
			<a href="#"><i class="material-icons">email</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;contact<span></a>
		</div>
		-->
		<div ID="centerdiv">		
		  <!--<button type="button" id="display_locations">Show Locations</button>-->

		  
		  <input id="pac-input" class="controls" type="text" placeholder="Search Google Maps">
		  <div id="map_canvas"></div>

		  <div id="legend">
		  </div>
		</div>
		
	</body>
</html> 