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
				<header><h4>	
				
				<p>Ses yükleme alanına hoş geldiniz! <br>

				Ses eklemek için işaret imini ses dosyasını yükleyeceğiniz noktaya taşıyarak tutturun. Daha sonra mp3 formatındaki ses dosyanızı sisteme yükleyin. Alttaki ses tanımlama formunu doldurarak ses dosyası ekleme işlemini tamamlayabilirsiniz. </a>

				Formdaki kategoriler ve sizin yaratacağınız etiketler harita üzerindeki farklı sesler arasında ilişki kurmamıza yardımcı olacak. Kategori ekle düğmesine basarak pek çok kategori ekleyebilirsiniz. Kendi eklemek istediğiniz tanımlamaları da etiketler kısmına istediğiniz sayıda tek tek girebilirsiniz. Teşekkürler!</a> 

				Kayıt ekleme sırasında sorun yaşarsanız bize info@sesol.org adresinden ulaşabilirsiniz.</a>

				Haritamıza ses kayıtlarınızı yüklediğinizde Alıntı-LisansDevam CC BY-SA lisansını kabul etmiş oluyorsunuz.<br>
				 Bilgi için:  <a href="https://creativecommons.org/licenses/?lang=tr" target="_blank" style="color: blue">https://creativecommons.org/licenses/?lang=tr</a><br>
				<a href="https://creativecommons.org/licenses/by-sa/4.0/deed.tr" target="_blank" style="color: blue">https://creativecommons.org/licenses/by-sa/4.0/deed.tr</a><br>
				<a href="https://creativecommons.org/licenses/by-sa/4.0/legalcode#languages" target="_blank" style="color: blue">https://creativecommons.org/licenses/by-sa/4.0/legalcode#languages</a><br>
							</p>
				</h4></header>
<div class="">
			
				<h4>Ses konumunu belirleyin</h4>
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
										<br>
										<div class="row">
										<table class="12u">
										<tr>
										<th class="3u 12u(mobile)"></th>
										<th></th>
										<th></th>
										</tr>
										<tr>
										<td style="padding-bottom:25px;">Ses Dosyasını Yükleyin</td>
										<td>&nbsp<input type="file" name="ses" id="file" placeholder="Ses Dosyanız" accept="audio/*" /></td>
										<td></td>
										</tr>
										<tr>
										<td></td>
										<td style="padding-bottom:25px;">Alıntı-LisansDevam CC BY-SA lisansını kabul ediyorum</td>
										<td align="center">&nbsp<input type="checkbox" name="license_terms" value="license_terms" required> </td>
										</tr>
										<tr>
										<td style="padding-bottom:25px;">Adınız, Soyadınız</td>
										<td><input type="text" name="name" id="name" required /></td>
										<td align="center">sitede adım anonim kalsın<br><input type="checkbox" name="anonym_name" value="anonym_name"></td>
										</tr>
										 
										<tr>
										<td style="padding-bottom:25px;">Email adresiniz (zorunlu alan)</td>
										<td><input type="text" name="email" id="email" placeholder="" required /></td>
										<td align="center">sitede adım anonim kalsın<br><input type="checkbox" name="anonym_name" value="anonym_name"></td>
										</tr>
										
										<tr>
										<td style="padding-bottom:35px;">Başlık (zorunlu alan)</td>
										<td><input type="text" name="title" id="title" placeholder="" required /></td>
										<td align="center"></td>
										</tr>
										 
										<tr>
										<td style="padding-bottom:25px;">Kaydın yapıldığı Tarih</td>
										<td><input type="date" name="register_date" name="register_date" placeholder="" style="background: #282828;color: #bbb;"></td>
										<td align="center"></td>
										</tr>

										<tr>
										<td style="padding-bottom:25px;">Kayıtta bahsi geçen tarih (kaydın yapıldığı zamandan farklı ise, mesela anı veya olay ise)</td>
										<td><input type="date" name="record_date" id="record_date"  style="background: #282828;color: #bbb;" placeholder="" /></td>
										<td align="center"td>
										</tr>
										
										
										<tr>
										<td style="padding-bottom:25px;">Anlatıcı (Kayıttaki sesin sahibi )</td>
										<td><input type="text" name="teller_name" id="teller_name" placeholder="" /></td>
										<td align="center">&nbsp harita üzerinde anonim kalsın<br><input type="checkbox" name="anonym_teller_name" value="anonym_teller_name"></td>
										</tr>
										
										
										<tr>
										<td style="padding-bottom:25px;">Kayıt Mekanı (Haritada işaretlediğiniz nokta)</td>
										<td>Kınalıada<br>
											Burgazadası<br>
											Heybeliada<br>
											Büyükada<br>
											Yassıada<br>
											Sivriada<br>
											Tavşanadası<br>
											Kaşıkadası<br>
											Marmara Denizi<br>
											Diğer, belirtiniz <input type="text" name="other_record_location" id="other_record_location" placeholder="" /><br>
											<br>
											
										</td>
										<td align="center">
											&nbsp<input type="checkbox" name="record_location" value="Kınalıada"><br>
											&nbsp<input type="checkbox" name="record_location" value="Burgazadası"><br>
											&nbsp<input type="checkbox" name="record_location" value="Heybeliada"><br>
											&nbsp<input type="checkbox" name="record_location" value="Büyükada"><br>
											
											&nbsp<input type="checkbox" name="record_location" value="Yassıada"><br>
											&nbsp<input type="checkbox" name="record_location" value="Sivriada"><br>
											&nbsp<input type="checkbox" name="record_location" value="Tavşanadası"><br>
											&nbsp<input type="checkbox" name="record_location" value="Kaşıkadası"><br>
											
											&nbsp<input type="checkbox" name="record_location" value="Marmara Denizi"><br>
											
											&nbsp<input type="checkbox" name="record_location" value="Diğer, belirtiniz"><br>
										</td>
										</tr>
										
										
										<tr>
										
										<td style="padding-bottom:25px;">Kayıtta Bahsi Geçen Mekan (Kayıt mekanından farklı ise haritada bu noktayı işaretleyebilirsiniz)</td>
										<td>Kınalıada<br>
											Burgazadası<br>
											Heybeliada<br>
											Büyükada<br>
											Yassıada<br>
											Sivriada<br>
											Tavşanadası<br>
											Kaşıkadası<br>
											Marmara Denizi<br>
											Diğer, belirtiniz <input type="text" name="other_passing_location" id="other_record_location" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											&nbsp<input type="checkbox" name="passing_location" value="Kınalıada"><br>
											&nbsp<input type="checkbox" name="passing_location" value="Burgazadası"><br>
											&nbsp<input type="checkbox" name="passing_location" value="Heybeliada"><br>
											&nbsp<input type="checkbox" name="passing_location" value="Büyükada"><br>
											
											&nbsp<input type="checkbox" name="passing_location" value="Yassıada"><br>
											&nbsp<input type="checkbox" name="passing_location" value="Sivriada"><br>
											&nbsp<input type="checkbox" name="passing_location" value="Tavşanadası"><br>
											&nbsp<input type="checkbox" name="passing_location" value="Kaşıkadası"><br>
											
											&nbsp<input type="checkbox" name="passing_location" value="Marmara Denizi"><br>
											
											&nbsp<input type="checkbox" name="passing_location" value="Diğer, belirtiniz"><br>
										</td>
										</tr>
										
										
										<tr>
										
										<td style="padding-bottom:25px;">Günün Saati</td>
										<td>sabah [5-12]<br>
											öğle [13-17]<br>
											aksam [18-20]<br>
											gece [21-24]<br>
											sabaha karşı [1-4]<br>
											
											<br>
										</td>
										<td align="center">
											&nbsp<input type="checkbox" name="time_of_day" value="sabah [5-12]"><br>
											&nbsp<input type="checkbox" name="time_of_day" value="öğle [13-17]"><br>
											&nbsp<input type="checkbox" name="time_of_day" value="aksam [18-20]"><br>
											&nbsp<input type="checkbox" name="time_of_day" value="gece [21-24]"><br>
											&nbsp<input type="checkbox" name="time_of_day" value="sabaha karşı [1-4]"><br>
										</td>
										</tr>
										
										<tr>
										
										<td style="padding-bottom:25px;">Gün</td>
										<td>Haftaiçi<br>
											Haftasonu<br>
											<br>
											
										</td>
										<td align="center">
											&nbsp<input type="checkbox" name="day" value="Haftaiçi"><br>
											&nbsp<input type="checkbox" name="day" value="Haftasonu"><br>
										</td>
										</tr>
										
										
										
										<tr>
										
										<td style="padding-bottom:25px;">Kayıt Kategorileri</td>
										<td>
											<b style="color:white;">Canlı</b><br>
											&nbsp bitki<br>
											&nbsp hayvan<br>
											&nbsp insan<br>
											&nbsp Diğer-belirtiniz<input type="text" name="other_passing_location" id="other_category" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											<br>
											&nbsp<input type="checkbox" name="category" value="bitki"><br>
											&nbsp<input type="checkbox" name="category" value="hayvan"><br>
											&nbsp<input type="checkbox" name="category" value="insan"><br>
											&nbsp<input type="checkbox" name="category" value="Diğer-belirtiniz"><br>
										</td>
										</tr>
										
										<tr>
										
										<td style="padding-bottom:25px;"></td>
										<td>
											<b style="color:white;">Cansız</b><br>
											
											
										</td>
										<td align="center">
											&nbsp<input type="checkbox" name="category" value="Cansız">
										</td>
										</tr>
										
										
										
										<tr>
										
										<td style="padding-bottom:25px;"></td>
										<td>
											<b style="color:white;">Durum</b><br>
											&nbsp azalıyor<br>
											&nbsp artık yok<br>
											&nbsp sabit<br>
											&nbsp çoğalıyor<br>
											&nbsp Diğer-belirtiniz<input type="text" name="other_passing_location" id="other_category" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											<br>
											&nbsp<input type="checkbox" name="category" value="azalıyor"><br>
											&nbsp<input type="checkbox" name="category" value="artık yok"><br>
											&nbsp<input type="checkbox" name="category" value="sabit"><br>
											&nbsp<input type="checkbox" name="category" value="çoğalıyor"><br>
											&nbsp<input type="checkbox" name="category" value="Diğer-belirtiniz"><br>
										</td>
										</tr>
										
										
										<tr>
										
										<td style="padding-bottom:25px;"></td>
										<td>
											<b style="color:white;">Atmosfer/Jeofiziksel</b><br>
											&nbsp dalga<br>
											&nbsp rüzgar<br>
											&nbsp yağmur<br>
											&nbsp kar<br>
											&nbsp Diğer-belirtiniz<input type="text" name="other_passing_location" id="other_category" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											<br>
											&nbsp<input type="checkbox" name="category" value="dalga"><br>
											&nbsp<input type="checkbox" name="category" value="rüzgar"><br>
											&nbsp<input type="checkbox" name="category" value="yağmur"><br>
											&nbsp<input type="checkbox" name="category" value="kar"><br>
											&nbsp<input type="checkbox" name="category" value="Diğer-belirtiniz"><br>
										</td>
										</tr>
										
										
										<tr>
										
										<td style="padding-bottom:25px;"></td>
										<td>
											<b style="color:white;">Doğal Çevre</b><br>
											&nbsp orman<br>
											&nbsp sahil<br>
											&nbsp deniz<br>
											&nbsp kayalık<br>
											&nbsp tepe<br>
											&nbsp Diğer-belirtiniz<input type="text" name="other_passing_location" id="other_category" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											<br>
											&nbsp<input type="checkbox" name="category" value="orman"><br>
											&nbsp<input type="checkbox" name="category" value="sahil"><br>
											&nbsp<input type="checkbox" name="category" value="deniz"><br>
											&nbsp<input type="checkbox" name="category" value="kayalık"><br>
											&nbsp<input type="checkbox" name="category" value="tepe"><br>
											&nbsp<input type="checkbox" name="category" value="Diğer-belirtiniz"><br>
										</td>
										</tr>
										
										
										<tr>
										
										<td style="padding-bottom:25px;"></td>
										<td>
											<b style="color:white;">İnşa edilmiş Çevre/Mekan/Yapı</b><br>
											&nbsp sokak<br>
											&nbsp cadde<br>
											&nbsp meydan<br>
											&nbsp iskele<br>
											&nbsp plaj<br>
											&nbsp yapı iç sesleri<br>
											&nbsp Diğer-belirtiniz<input type="text" name="other_passing_location" id="other_category" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											<br>
											&nbsp<input type="checkbox" name="category" value="sokak"><br>
											&nbsp<input type="checkbox" name="category" value="cadde"><br>
											&nbsp<input type="checkbox" name="category" value="meydan"><br>
											&nbsp<input type="checkbox" name="category" value="iskele"><br>
											&nbsp<input type="checkbox" name="category" value="plaj"><br>
											&nbsp<input type="checkbox" name="category" value="yapı iç sesleri"><br>
											&nbsp<input type="checkbox" name="category" value="Diğer-belirtiniz"><br>
										</td>
										</tr>
										
										
										<tr>
										
										<td style="padding-bottom:25px;"></td>
										<td>
											<b style="color:white;">Araç</b><br>
											&nbsp vapur<br>
											&nbsp fayton<br>
											&nbsp bisiklet<br>
											&nbsp minibüs<br>
											&nbsp kamyon<br>
											&nbsp elektrikli bisiklet<br>
											&nbsp ambulans<br>
											&nbsp Diğer-belirtiniz<input type="text" name="other_passing_location" id="other_category" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											<br>
											&nbsp<input type="checkbox" name="category" value="vapur"><br>
											&nbsp<input type="checkbox" name="category" value="fayton"><br>
											&nbsp<input type="checkbox" name="category" value="bisiklet"><br>
											&nbsp<input type="checkbox" name="category" value="minibüs"><br>
											&nbsp<input type="checkbox" name="category" value="kamyon"><br>
											&nbsp<input type="checkbox" name="category" value="elektrikli bisiklet"><br>
											&nbsp<input type="checkbox" name="category" value="ambulans"><br>
											&nbsp<input type="checkbox" name="category" value="Diğer-belirtiniz"><br>
										</td>
										</tr>
										
										<tr>
										
										<td style="padding-bottom:25px;"></td>
										<td>
											<b style="color:white;">Diğer Mekanik</b><br>
											
											&nbsp Diğer-belirtiniz<input type="text" name="other_passing_location" id="other_category" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											<br>
											&nbsp<input type="checkbox" name="category" value="Diğer-belirtiniz"><br>
										</td>
										</tr>
										
										<tr>
										
										<td style="padding-bottom:25px;"></td>
										<td>
											<b style="color:white;">Sosyal</b><br>
											&nbsp sorun<br>
											&nbsp çözüm<br>
											&nbsp talep<br>
											&nbsp anı<br>
											&nbsp görüşme<br>
											&nbsp olay<br>
											&nbsp hayal<br>
											
											&nbsp duygu<br>
											&nbsp diller<br>
											&nbsp dinler<br>
											&nbsp kültürler<br>
											
											
											&nbsp Diğer-belirtiniz<input type="text" name="other_passing_location" id="other_category" placeholder="" /><br>
											
											
										</td>
										<td align="center">
											<br>
											&nbsp<input type="checkbox" name="category" value="sorun"><br>
											&nbsp<input type="checkbox" name="category" value="çözüm"><br>
											&nbsp<input type="checkbox" name="category" value="talep"><br>
											&nbsp<input type="checkbox" name="category" value="anı"><br>
											&nbsp<input type="checkbox" name="category" value="görüşme"><br>
											&nbsp<input type="checkbox" name="category" value="olay"><br>
											&nbsp<input type="checkbox" name="category" value="hayal"><br>
											
											&nbsp<input type="checkbox" name="category" value="duygu"><br>
											&nbsp<input type="checkbox" name="category" value="diller"><br>
											&nbsp<input type="checkbox" name="category" value="dinler"><br>
											&nbsp<input type="checkbox" name="category" value="kültürler"><br>
											
											&nbsp<input type="checkbox" name="category" value="Diğer-belirtiniz"><br>
										</td>
										</tr>
										
										
										<tr>
										<td style="padding-bottom:35px;">Eklemek istediğiniz İçerik Etiketleri</td>
										<td><input type="text" name="free_tags" id="free_tags" placeholder="" style="background: #282828;color: #bbb;" required /></td>
										<td align="center"></td>
										</tr>
										
										
										<tr>
										<td style="padding-bottom:35px;">Temsili sesler</td>
										<td><input type="text" name="subject" id="subject" placeholder="" required />
											vaktiyle o noktada olan bir şeyi temsil etmek için eklenen sesler (nesli tükenmiş bir tür, taş ocakları patlama sesleri); başka kaynaklardan aktarılan ilgili sesler, sanatsal yöntemlerle oluşturulan sesler, yayımlanmış haber sesleri gibi)
										</td>
										<td align="center">&nbsp<input type="checkbox" name="subject_check" value="subject_check"></td>
										</tr>
										
										<tr>
										<td style="padding-bottom:35px;">Bize Not Bırakın</td>
										<td><textarea rows="3" name="message" id="message" placeholder=""></textarea></td>
										<td align="center"></td>
										</tr>
										
										</table>
											
										</div>
										
										<div class="row 100%">
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
