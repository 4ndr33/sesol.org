<meta charset="utf-8" />
<?php
include("ayar.php");
$map1=$_POST["map1"];
$map2=$_POST["map2"];
$kampanya=$_POST["kampanya"];
$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];


$register_date=$_POST["register_date"];
$record_date=$_POST["record_date"];
$teller_name=$_POST["teller_name"];
$record_location=$_POST["record_location"];
$passing_location=$_POST["passing_location"];
$time_of_day=$_POST["time_of_day"];
$day=$_POST["day"];
$category=$_POST["category"];
$free_tags=$_POST["free_tags"];
$anonym_name=0;
if(isset($_POST["$anonym_name"]))
{
    $anonym_name=1;
}
$anonym_teller_name=0;
if(isset($_POST["$anonym_teller_name"]))
{
    $anonym_teller_name=1;
}
$license_terms=0;
if(isset($_POST["license_terms"]))
{
    $license_terms=1;
}



for($i=2;$i<=20;$i++)
{
    $post_name="category".$i;
    if(isset($_POST["$post_name"]))
    {
        $category .="||".$_POST["$post_name"];
    }
}




$subject = str_replace(array("'", '"'), '`', $subject);
$message = str_replace(array("'", '"'), '`', $message);


$name = str_replace(array("'", '"'), '`', $name);
$anonym_name = str_replace(array("'", '"'), '`', $anonym_name);
$teller_name = str_replace(array("'", '"'), '`', $teller_name);
$category = str_replace(array("'", '"'), '`', $category);
$free_tags = str_replace(array("'", '"'), '`', $free_tags);


$kaynak =$_FILES['ses']['tmp_name'];
$isim =$_FILES['ses']['name']; 
$tip =$_FILES['ses']['type']; 
$buyukluk =$_FILES['ses']['size']; 

$uzanti = explode('.', $isim);
$uzanti = $uzanti[count($uzanti)-1];

$rand =substr(md5(uniqid(rand())),0,5);
$ses = $rand.".$uzanti";

echo "

$map1<br>
$map2<br>
$kampanya<br>
$name<br>
$email<br>
$subject<br>
$message<br>
$ses
";

$desteklenenformatlar = array ("audio/mp3","audio/wma"); 
$kaydedilecekyer = "upload"; 

if (in_array ($_FILES['ses']['type'], $desteklenenformatlar)) { 

$dosya = $kaydedilecekyer . "/".$ses; 
 
if (move_uploaded_file ($_FILES['ses']['tmp_name'], $dosya)) 
{ 
echo "<b>Dosyaniz başarılı bir şekilde yüklendi!</b></font>"."<br/><br/>"; 

 }
 }  

$sorgu=mysql_query("insert into sesol (map1,map2,kampanya,name,email,subject,ses,message,anonym_name,register_date,record_date,teller_name,anonym_teller_name,record_location,passing_location,time_of_day,day,category,free_tags,license_terms) 
values ('$map1','$map2','$kampanya','$name','$email','$subject','$ses','$message','$anonym_name','$register_date','$record_date','$teller_name','$anonym_teller_name','$record_location','$passing_location','$time_of_day','$day','$category','$free_tags','$license_terms')");
 
if($sorgu){
    echo 'Kayıt Eklendi.';
}else{
    echo 'Kayıt Eklenemedi!';
}
 ?>