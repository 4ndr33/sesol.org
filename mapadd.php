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
		<!--<link rel="stylesheet" href="assets/css/bootstrap-tokenfield.css" /> -->
		<!-- <link rel="stylesheet" href="assets/css/jquery-ui.css" /> -->
		
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
												<input type="text" name="name" id="name" placeholder="Adınız, Soyadınız" required />
												<input type="checkbox" name="anonym_name" value="anonym_name"> sitede adım anonim kalsın
											</div>
											<div class="6u 12u(mobile)">
												<input type="text" name="email" id="email" placeholder="Email adresiniz (zorunlu alan)" required />
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
												<input type="checkbox" name="anonym_teller_name" value="anonym_teller_name"> harita üzerinde anonim kalsın 
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
										</div>
										     
										
                                        <div class="row">
											<div class="12u">
                                                <div id="divcategory">
                                                <select name="category" id="category" >
                                                    
                                                    <optgroup label="Canlı">
                                                        <option value="bitki">bitki</option>
                                                        <option value="hayvan">hayvan</option>
                                                        <option value="insan">insan</option>
                                                        <option value="Diğer-belirtiniz">Diğer-belirtiniz</option>
                                                      </optgroup>
                                                      <optgroup label="Cansız">
                                                        
                                                      </optgroup>
                                                    <optgroup label="Durum">
                                                        <option value="azalıyor">azalıyor</option>
                                                        <option value="artık yok">artık yok</option>
                                                        <option value="sabit">sabit</option>
                                                        <option value="çoğalıyor">çoğalıyor</option>
                                                        <option value="Diğer- belirtiniz">Diğer- belirtiniz</option>
                                                      </optgroup>
                                                    
                                                    <optgroup label="Atmosfer/Jeofiziksel">
                                                        <option value="dalga">dalga</option>
                                                        <option value="rüzgar">rüzgar</option>
                                                        <option value="yağmur">yağmur</option>
                                                        <option value="kar">kar</option>
                                                        <option value="Diğer- belirtiniz">Diğer- belirtiniz</option>
                                                      </optgroup>
                                                    
                                                    <optgroup label="Doğal Çevre">
                                                        <option value="orman">orman</option>
                                                        <option value="sahil">sahil</option>
                                                        <option value="deniz">deniz</option>
                                                        <option value="kayalık">kayalık</option>
                                                        <option value="tepe">tepe</option>
                                                        <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>
                                                        
                                                      </optgroup>
                                                    
                                                    <optgroup label="İnşa edilmiş Çevre/Mekan/Yapı">
                                                        <option value="sokak">sokak</option>
                                                        <option value="cadde">cadde</option>
                                                        <option value="meydan">meydan</option>
                                                        <option value="iskele">iskele</option>
                                                        <option value="plaj">plaj</option>
                                                        
                                                        <option value="yapı iç sesleri">yapı iç sesleri</option>
                                                        <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>
                                                        
                                                      </optgroup>
                                                    
                                                    <optgroup label="Araç">
                                                        <option value="vapur">vapur</option>
                                                        <option value="fayton">fayton</option>
                                                        <option value="bisiklet">bisiklet</option>
                                                        <option value="minibüs">minibüs</option>
                                                        <option value="kamyon">kamyon</option>
                                                        <option value="elektrikli bisiklet">elektrikli bisiklet</option>
                                                        <option value="ambulans">ambulans</option>
                                                        <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>
                                                        
                                                      </optgroup>
                                                    
                                                    <optgroup label="Diğer Mekanik">
                                                        <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>
                                                      </optgroup>
                                                    
                                                    <optgroup label="Sosyal">
                                                        <option value="sorun">sorun</option>
                                                        <option value="çözüm">çözüm</option>
                                                        <option value="talep">talep</option>
                                                        <option value="anı">anı</option>
                                                        <option value="görüşme">görüşme</option>
                                                        <option value="olay">olay</option>
                                                        <option value="hayal">hayal</option>
                                                        <option value="duygu">duygu</option>
                                                        <option value="diller">diller</option>
                                                        <option value="dinler">dinler</option>
                                                        
                                                        <option value="kültürler">kültürler</option>
                                                        <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>
                                                        
                                                      </optgroup>
                                                    
												</select>
                                                </div>
												Kayıt Kategorileri 
                                                
                                                <br><button id="addnewcategory" type="button">add new category</button>
											</div>
										</div>
                                        
                                        
                                        
										<div class="row">
											<div class="12u">
												<input type="text" name="free_tags" id="free_tags" />
                                                Eklemek istediğiniz İçerik Etiketleri
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="text" name="subject" id="subject" placeholder="Temsili sesler [vaktiyle o noktada olan bir şeyi temsil etmek için eklenen sesler (nesli tükenmiş bir tür, taş ocakları patlama sesleri); başka kaynaklardan aktarılan ilgili sesler, sanatsal yöntemlerle oluşturulan sesler, yayımlanmış haber sesleri gibi]" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="file" name="ses" id="file" placeholder="Ses Dosyanız" accept="audio/*" /><br>
                                                <br>
                                                <input type="checkbox" name="license_terms" value="license_terms" required> Alıntı-LisansDevam CC BY-SA lisansını kabul ediyorum
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<textarea name="message" id="message" placeholder="Bize Not Bırakın"></textarea>
											</div>
										</div>
										<div class="row 200%">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="GÖNDER" /></li>
													<li><input id="mailto" type="button" class="alt" onclick="location.href='mailto:info@sesol.org';" value="SORUN BİLDİR"></li>
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
			<!-- <script src="assets/js/jquery-ui.js"></script>-->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/selectize.js"></script>
			<script>
            var Category_Number = 1;
			$('#free_tags').selectize({
			delimiter: ',',
			persist: false,
			create: function(input) {
				return {
					value: input,
					text: input
				}
				}
			});
			

			$( document ).ready(function() {
				//console.log( "ready!" );
			});
                
            $("#addnewcategory").click(function () {
                Category_Number += 1;
                //alert('category'+Category_Number);
                $("#divcategory").append('<select name="category'+Category_Number+'" id="category'+Category_Number+'" ><optgroup label="Canlı">    <option value="bitki">bitki</option>    <option value="hayvan">hayvan</option>    <option value="insan">insan</option>    <option value="Diğer-belirtiniz">Diğer-belirtiniz</option>  </optgroup>  <optgroup label="Cansız">      </optgroup><optgroup label="Durum">    <option value="azalıyor">azalıyor</option>    <option value="artık yok">artık yok</option>    <option value="sabit">sabit</option>    <option value="çoğalıyor">çoğalıyor</option>    <option value="Diğer- belirtiniz">Diğer- belirtiniz</option>  </optgroup><optgroup label="Atmosfer/Jeofiziksel">    <option value="dalga">dalga</option>    <option value="rüzgar">rüzgar</option>    <option value="yağmur">yağmur</option>    <option value="kar">kar</option>    <option value="Diğer- belirtiniz">Diğer- belirtiniz</option>  </optgroup><optgroup label="Doğal Çevre">    <option value="orman">orman</option>    <option value="sahil">sahil</option>    <option value="deniz">deniz</option>    <option value="kayalık">kayalık</option>    <option value="tepe">tepe</option>    <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>      </optgroup><optgroup label="İnşa edilmiş Çevre/Mekan/Yapı">    <option value="sokak">sokak</option>    <option value="cadde">cadde</option>    <option value="meydan">meydan</option>    <option value="iskele">iskele</option>    <option value="plaj">plaj</option>        <option value="yapı iç sesleri">yapı iç sesleri</option>    <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>      </optgroup><optgroup label="Araç">    <option value="vapur">vapur</option>    <option value="fayton">fayton</option>    <option value="bisiklet">bisiklet</option>    <option value="minibüs">minibüs</option>    <option value="kamyon">kamyon</option>    <option value="elektrikli bisiklet">elektrikli bisiklet</option>    <option value="ambulans">ambulans</option>    <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>      </optgroup><optgroup label="Diğer Mekanik">    <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>  </optgroup><optgroup label="Sosyal">    <option value="sorun">sorun</option>    <option value="çözüm">çözüm</option>    <option value="talep">talep</option>    <option value="anı">anı</option>    <option value="görüşme">görüşme</option>    <option value="olay">olay</option>    <option value="hayal">hayal</option>    <option value="duygu">duygu</option>    <option value="diller">diller</option>    <option value="dinler">dinler</option>        <option value="kültürler">kültürler</option>    <option value="Diğer, belirtiniz">Diğer, belirtiniz</option>      </optgroup></select>');
            });
			
			</script>
	</body>
</html>
