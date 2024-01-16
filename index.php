<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="file" id="file" placeholder="upload image" >
  <input type="submit" name="send" id="" value="upload image">
</form> 
<?php
require_once __DIR__ . "/vendor/autoload.php";
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
if(isset($_POST["send"])){
  $tmp = $_FILES["file"]["tmp_name"];
  /*
  echo "<pre>";
  print_r ($tmp) ;
  echo "</pre>";
*/
Configuration::instance([
  "cloud" => [
    "cloud_name" => "dszfsl3tv",
    "api_key" => "651567585754222",
    "api_secret" => "8zMOw4RNcFqcnY75OOx1bBsiZAU",
  ],
  "url" => [
    "secure" => true,
  ],
]);

$cloudinary = (new UploadApi())->upload($tmp);
if($cloudinary){
  echo "good <br>" ;
} else {
  echo "no <br>";
}
echo $cloudinary["url"];
} 