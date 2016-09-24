<?php
/**
 * Created by PhpStorm.
 * User: phuongle
 * Date: 26/08/2016
 * Time: 10:21
 */
function clearUnicode($name) {
    $accents_arr=array(
        "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
        "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề",
        "ế","ệ","ể","ễ",
        "ì","í","ị","ỉ","ĩ",
        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ",
        "ờ","ớ","ợ","ở","ỡ",
        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
        "ỳ","ý","ỵ","ỷ","ỹ",
        "đ",
        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
        "Ằ","Ắ","Ặ","Ẳ","Ẵ",
        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
        "Ì","Í","Ị","Ỉ","Ĩ",
        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ",
        "Ờ","Ớ","Ợ","Ở","Ỡ",
        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
        "Đ"," ","-","/","’","`","'","(",")",".",'"',',',':','.','“','”','+','_','*','?','!','$','%','&','^','#','@','”','“','–','™'
    );

    $no_accents_arr=array(
        "a","a","a","a","a","a","a","a","a","a","a",
        "a","a","a","a","a","a",
        "e","e","e","e","e","e","e","e","e","e","e",
        "i","i","i","i","i",
        "o","o","o","o","o","o","o","o","o","o","o","o",
        "o","o","o","o","o",
        "u","u","u","u","u","u","u","u","u","u","u",
        "y","y","y","y","y",
        "d",
        "A","A","A","A","A","A","A","A","A","A","A","A",
        "A","A","A","A","A",
        "E","E","E","E","E","E","E","E","E","E","E",
        "I","I","I","I","I",
        "O","O","O","O","O","O","O","O","O","O","O","O",
        "O","O","O","O","O",
        "U","U","U","U","U","U","U","U","U","U","U",
        "Y","Y","Y","Y","Y",
        "D","-","-","-","-","-","-","-","-","-","-",'-','-','-','','','','','','','','','','','','','','','','',''
    );

    $str = str_replace($accents_arr,$no_accents_arr,$name);
    $str = cleanUrl($str);
    return $str;
}

function cleanUrl($str) {
    $clean = str_replace("/[^a-zA-Z0-9\/_|+ -().]/", '', $str);
    $clean = strtolower(trim($clean, '-'));
    $clean = str_replace("/[\/_|+ -]+/().", '-', $clean);
    $clean = strtolower(trim($clean, '-'));
    return $clean;
}

function getNameImage($NameImage) {
    $NameImage = strstr($NameImage,".", true);
    $NameImage = clearUnicode($NameImage);
    return $NameImage;
}

function convertImageBase64($img)
{
    $check_img = strpos($img, ";base64");
    $image_type = "image/jpeg";
    if($check_img !== false) {
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = $image_parts[1];

        $image 		= base64_decode($image_base64);
    } else {
        $image = @file_get_contents($img);
    }
    $image_type = explode('/', $image_type);
    $png_url = time().'.'.$image_type[1];
    $path = public_path('media/' . $png_url);
    if(!is_dir(public_path('media')))
        mkdir(public_path('media'));
    file_put_contents($path, $image);
    /*$files = asset($path);
    if(isset($files)){
        File::delete($path);
    }*/
    return $png_url;
}

if (!function_exists('putUploadImage')){
    function putUploadImage($image, $filename) {
        $path = \Storage::putFileAs(
            'public/media', $image, $filename
        );
        return $path;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($path) {
        return \Storage::delete($path);
    }
}

if (!function_exists('getImage')) {
    function getImage($path){
        return \Storage::url($path);
    }
}

if (!function_exists('convertDateTime'))
{
    function convertDateTime($timestamp)
    {
        //Config::get('app.timezone')
        $date = new \DateTime($timestamp, new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone('Asia/Ho_Chi_Minh'));
        $time= $date->format('d/m/Y');
        return $time;
    }
}

if (!function_exists('formatPrice')){
  function formatPrice($price) {
      $arr = array(' ', ',', '.', '-');
      return str_replace($arr, "", $price);
  }
}

if (!function_exists('HtmlTfoot'))
{
    function HtmlTfoot(){
        $html = "<div class=\"btn-group btn-group-sm\">
                            <a href=\"javascript:void(0)\" class=\"btn btn-danger delete-all hidden-delete\" data-toggle=\"tooltip\" title=\"Delete Selected\"><i class=\"fa fa-times\"></i> Delete All</a>
                        </div>";
        return $html;
    }
}

if (!function_exists('HtmlDeleteRecord'))
{
    function HtmlDeleteRecord($url){
        return "<a href=\"".$url."\" onclick=\"return confirm('Are you sure???')\" data-toggle=\"tooltip\" title=\"Delete\" class=\"btn btn-danger hidden-delete\"><i class=\"fa fa-times\"></i></a>";
    }
}