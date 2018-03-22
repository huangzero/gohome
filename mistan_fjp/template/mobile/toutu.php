<?php
header("content-type:image/jpeg");

$namech = "佛山";
$name = $_GET['name'];
$cname = $_GET['cname'];
$choosetime = $_GET['choosetime'];

switch ($cname) {
    case '北京市':
     $km ="2149KM";
    break;
    case '上海市':
  $km ="1802KM";
    break;
      case '天津市':
    $km ="2422KM";
    break;
      case '重庆市':
   $km ="1398KM";
    break;
      case '河北省':
   $km ="1869KM";
    break;
      case '山西省':
      $km ="1661KM";
    break;
      case '内蒙古省':
    $km ="2276KM";
    break;
      case '辽宁省':
    $km ="2582KM";
    break;
      case '吉林省':
    $km ="3285KM";
    break;
      case '黑龙江省':
   $km ="3307KM";
    break;
      case '江苏省':
    $km ="1594KM";
    break;
      case '浙江省':
    $km ="1298KM";
    break;
      case '安徽省':
    $km ="1223KM";
    break;
      case '福建省':
   $km ="910KM";
    break;
      case '江西省':
    $km ="809KM";
    break;
      case '山东省':
    $km ="1843KM";
    break;
      case '河南省':
       $km ="1481KM";
    /*
switch ($name) {
   case "郑州市":
  $km ="1km";
     break;
   case "开封市":
  $km ="2km";
     break;
   case "三门峡市":
  $km ="3km";
     break;
      case "洛阳市":
  $km ="4km";
     break;
   case "焦作市":
  $km ="5km";
     break;
      case "新乡市":
  $km ="6km";
     break;
   case "鹤壁市":
  $km ="7km";
     break;
      case "安阳市":
  $km ="1km";
     break;
  $km ="1km";
     break;
      case "商丘市":
  $km ="1km";
     break;
   case "许昌市":
  $km ="1km";
     break;
      case "漯河市":
  $km ="1km";
     break;
   case "平顶山市":
  $km ="1km";
     break;
      case "南阳市":
  $km ="1km";
     break;
   case "信阳市":
  $km ="1km";
     break;
      case "周口市":
  $km ="1km";
     break;
   case "驻马店市":
$km ="1km";
     break;
      case "济源市":
     break;
   case "开封市":
$km ="1km";
     break;
      case "郑州市":
$km ="1km";
     break;
   default:
$km ="100km";;
}*/



    break;
      case '湖北省':
    # code...
      $km="1004KM";
    break;
      case '湖南省':
   $km="677KM";
    break;
      case '广东省':

  switch ($name) {
   case "广州市":
  $km ="27km";
     break;
   case "深圳市":
  $km ="145km";
     break;
   case "清远市":
  $km ="94km";
     break;
      case "韶关市":
  $km ="245km";
     break;
   case "河源市":
  $km ="225km";
     break;
      case "梅州市":
  $km ="412km";
     break;
   case "潮州市":
  $km ="436km";
     break;
    case "汕头市":
  $km ="451km";
     break;
    case "揭阳市":
  $km ="401km";
     break;
   case "汕尾市":
  $km ="294km";
     break;
      case "惠州市":
  $km ="162km";
     break;
   case "东莞市":
  $km ="85km";
     break;
      case "珠海市":
  $km ="123km";
     break;
   case "中山市":
  $km ="81km";
     break;
      case "江门市":
  $km ="65km";
     break;
  case "肇庆市":
    $km ="89km";
     break;
   case "云浮市":
$km ="135km";
     break;
      case "阳江市":
$km ="200km";
     break;
     case "茂名市":
$km ="316km";
     break;
     case "湛江市":
$km ="392km";
     break;
   default:
$km ="10km";;
}
    break;
      case '广西省':
  $km="538KM";
    break;
      case '海南省':
    $km="564KM";
    break;
       case '四川省':
   $km="1566KM";
    break;
       case '贵州省':
    $km="916KM";
    break;
       case '云南省':
    $km="1327KM";
    break;
       case '西藏省':
    $km="3741KM";
    break;
       case '陕西省':
    $km="1645KM";
    break;
       case '甘肃省':
    $km="2296KM";
    break;
       case '宁夏省':
    $km="2366KM";
    break;
       case '青海省':
    $km="2512KM";
    break;
      case '新疆省':
   $km="4182KM";
    break;
      case '香港':
    $km="180KM";
    break;
      case '澳门':
    $km="133KM";
    break;
      case '台湾':
    $km="1000KM";
    break;
  default:
    $km="请选择城市";
    break;
}


$im = imagecreatetruecolor(460, 285);
$bg = imagecreatefromjpeg('toutu.jpg');

imagecopy($im,$bg,0,0,0,0,460,285);

imagedestroy($bg);

//$black = imagecolorallocate($im, 60, 60, 60);


$font1 = 'font/fh.ttf';


$blacka = imagecolorallocate($im, 20, 20, 31);


imagettftext($im, 18, 0, 190, 125, $blacka, $font1, $km);
imagettftext($im, 26, 0, 285, 88, $blacka, $font1, $name);
imagettftext($im, 26, 0, 100, 88, $blacka, $font1, $namech);
imagettftext($im, 15, 0, 40, 170, $blacka, $font1, $choosetime);


imagejpeg($im);



imagedestroy($im);



?>