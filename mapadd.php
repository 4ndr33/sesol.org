<!DOCTYPE HTML>
<!--
	Miniport by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sesol.org</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--<link rel="stylesheet" href="assets/css/bootstrap.css" />-->
		<link rel="stylesheet" href="assets/css/bootstrap-tokenfield.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.css" />
		
		<link rel="stylesheet" type="text/css" href="assets/css/selectize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/selectize.default.css" />
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
		<style>
        #myMap {
		   height: 300px;
		   width: 50%;
		}
        </style>
		
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript"> 
            var map;
            var marker;
            var myLatlng = new google.maps.LatLng(40.881,29.0834);
            var geocoder = new google.maps.Geocoder();
            var infowindow = new google.maps.InfoWindow();
            function initialize(){
                var mapOptions = {
                    zoom: 12,
maxZoom: 18,
				minZoom: 12,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
		       
                map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
                
                marker = new google.maps.Marker({
                    map: map,
                    position: myLatlng,
                    draggable: true 
                });     
                
                geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                       }
                    }
                });

                               
                google.maps.event.addListener(marker, 'dragend', function() {

                geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                        }
                    }
                });
            });
            
            }
            
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>  
	</head>
	<body>

		
			
			

			
		<nav id="nav">
				<ul class="container">
				<li><a href="http://sesol.org">Blog</a></li>
<li><a href="map.php?s=adalara">Harita</a></li>
					<li><a href="mapadd.php">Ses Ekle</a></li>
					
					
				
				</ul>
			</nav>

			<div class="wrapper style4">
				<article id="contact" class="container 75%">
				<header><h4>	<p>Ses y&uuml;kleme alanına hoş geldiniz! Ses eklemek i&ccedil;in işaret imini ses dosyasını y&uuml;kleyeceğiniz noktaya taşıyarak tutturun. Daha sonra haritanın altında beliren formu doldurarak mp3 formatındaki ses dosyanızı sisteme y&uuml;kleyebilirsiniz.</p>
<p>Y&uuml;klediğiniz sesler i&ccedil;in Alıntı-LisansDevam CC BY-SA lisansını kullanıyoruz. Bilgi i&ccedil;in: <br><a href="https://creativecommons.org/licenses/?lang=tr" target="_blank" style="color: blue"> https://creativecommons.org/licenses/?lang=tr</a></p></h4></header>
<div class="">
			
			
			    <div id="myMap"></div><br/>		
					
				
			</div>

					<div>
						<div class="row">
						<div class="12u">
								<form method="post" enctype="multipart/form-data" action="insert.php">
								<input type="hidden" name="map1" id="latitude" />
								<input type="hidden" name="map2" id="longitude" />
								<input type="hidden" name="kampanya" id="kampanya" value="adalara" placeholder="Kampanya" />
									<div>
										<div class="row">
											<div class="6u 12u(mobile)">
												<input type="text" name="name" id="name" placeholder="Adınız, Soyadınız" />
												<input type="checkbox" name="anonym_name" value="anonym_name"> sitede adım anonim kalsın
											</div>
											<div class="6u 12u(mobile)">
												<input type="text" name="email" id="email" placeholder="Email adresiniz (zorunlu alan)" />
											</div>
										</div>
										<div class="row">
											<div class="6u 12u(mobile)">
												<input type="date" name="register_date" name="register_date" placeholder=""><br>
												Kaydın yapıldığı Tarih
											</div>
											<div class="6u 12u(mobile)">
												<input type="date" name="record_date" id="record_date" placeholder="" /><br>
												Kayıtta bahsi geçen tarih (kaydın yapıldığı zamandan farklı ise, mesela anı veya olay ise)
											</div>
										</div>
										<div class="row">
											<div class="6u 12u(mobile)">
												<input type="text" name="teller_name" id="teller_name" placeholder="Anlatıcı (Kayıttaki sesin sahibi )" />
												<input type="checkbox" name="anonym_teller_name" value="anonym_teller_name"> sitede adım anonim kalsın
											</div>
											<div class="6u 12u(mobile)">
												<select name="record_location" id="record_location" >
												  <option value="Kınalıada">Kınalıada</option>
												  <option value="Burgazadası">Burgazadası</option>
												  <option value="Heybeliada">Heybeliada</option>
												  <option value="Büyükada">Büyükada</option>
												  <option value="Yassıada">Yassıada</option>
												  <option value="Sivriada">Sivriada</option>
												  <option value="Tavşanadası">Tavşanadası</option>
												  <option value="Kaşıkadası">Kaşıkadası</option>
												  <option value="Marmara Denizi">Marmara Denizi</option>
												  <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>
												</select>
												Kayıt Mekanı (Haritada işaretlediğiniz nokta)

											</div>
										</div>
										
										<div class="row">
											<div class="6u 12u(mobile)">
												<select name="passing_location" id="passing_location" >
												  <option value="Kınalıada">Kınalıada</option>
												  <option value="Burgazadası">Burgazadası</option>
												  <option value="Heybeliada">Heybeliada</option>
												  <option value="Büyükada">Büyükada</option>
												  <option value="Yassıada">Yassıada</option>
												  <option value="Sivriada">Sivriada</option>
												  <option value="Tavşanadası">Tavşanadası</option>
												  <option value="Kaşıkadası">Kaşıkadası</option>
												  <option value="Marmara Denizi">Marmara Denizi</option>
												  <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>
												</select>
												Kayıtta Bahsi Geçen Mekan(Kayıt mekanından farklı ise haritada bu noktayı işaretleyebilirsiniz)

											</div>
											<div class="6u 12u(mobile)">
												<select name="time_of_day" id="time_of_day" >
												  <option value="sabah [5-12]">sabah [5-12]</option>
												  <option value="öğle [13-17]">öğle [13-17]</option>
												  <option value="aksam [18-20]">aksam [18-20]</option>
												  <option value="gece [21-24]">gece [21-24]</option>
												  <option value="sabaha karşı [1-4]">sabaha karşı [1-4]</option>
												</select>
												Günün Saati
 
											</div>
										</div>
										<div class="row">
											<div class="6u 12u(mobile)">
												<select name="day" id="day" >
												  <option value="Haftaiçi">Haftaiçi</option>
												  <option value="Haftasonu">Haftasonu</option>
												</select>
												Gün
											</div>
											<div class="6u 12u(mobile)">
												<input type="text" class="form-control" id="tokenfield" value="red,green,blue" />
 
											</div>
										</div>
										     
											 
										<div class="row">
											<div class="12u">
												<input type="text" name="subject" id="subject" placeholder="Başlık" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="text" name="select-to" id="select-to" placeholder="Başlık" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="file" name="ses" id="file" placeholder="Ses Dosyanız" accept="audio/*" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<textarea name="message" id="message" placeholder="Etiket; Lütfen etiketlerin araya virgül koyarak ayırın."></textarea>
											</div>
										</div>
										<div class="row 200%">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="Gönder" /></li>
													<li><input type="reset" value="Formu Temizle" class="alt" /></li>
												</ul>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
				
				</article>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script> 
			<script src="assets/js/jquery.scrolly.min.js"></script> 
			<script src="assets/js/jquery-ui.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/bootstrap-tokenfield.js"></script>
			<script src="assets/js/selectize.js"></script>
			<script>
			$('#subject').selectize({
			delimiter: ',',
			persist: false,
			create: function(input) {
				return {
					value: input,
					text: input
				}
				}
			});
			
			var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
                  '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';

			$('#select-to').selectize({
				persist: false,
				maxItems: null,
				valueField: 'email',
				labelField: 'name',
				searchField: ['name', 'email'],
				options: [
					{email: 'brian@thirdroute.com', name: 'Brian Reavis'},
					{email: 'nikola@tesla.com', name: 'Nikola Tesla'},
					{email: 'someone@gmail.com'}
				],
				render: {
					item: function(item, escape) {
						return '<div>' +
							(item.name ? '<span class="name">' + escape(item.name) + '</span>' : '') +
							(item.email ? '<span class="email">' + escape(item.email) + '</span>' : '') +
						'</div>';
					},
					option: function(item, escape) {
						var label = item.name || item.email;
						var caption = item.name ? item.email : null;
						return '<div>' +
							'<span class="label">' + escape(label) + '</span>' +
							(caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
						'</div>';
					}
				},
				createFilter: function(input) {
					var match, regex;

					// email@address.com
					regex = new RegExp('^' + REGEX_EMAIL + '$', 'i');
					match = input.match(regex);
					if (match) return !this.options.hasOwnProperty(match[0]);

					// name <email@address.com>
					regex = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
					match = input.match(regex);
					if (match) return !this.options.hasOwnProperty(match[2]);

					return false;
				},
				create: function(input) {
					if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
						return {email: input};
					}
					var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
					if (match) {
						return {
							email : match[2],
							name  : $.trim(match[1])
						};
					}
					alert('Invalid email address.');
					return false;
				}
			});

			$( document ).ready(function() {
				console.log( "ready!" );
			});
			$('#tokenfield').tokenfield({
			  autocomplete: {
				source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
				delay: 100
			  },
			  showAutocompleteOnFocus: true
			});
			
			</script>
	</body>
</html>
