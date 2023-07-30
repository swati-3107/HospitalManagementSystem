<?php

function filter_global_array()

{

	// Safe GET ARRAY FROM SQL INJECTION

	$get = $_GET;

	$safe_get = array_map_r('addslashes',$get);

	$_GET = $safe_get;

	$post = $_POST;

	$safe_post = array_map_r('addslashes',$post);

	$_POST = $safe_post;

}

/* prevent XSS. */

function chk_uploaded_files()

{

$allowed_extensions = array('.jpg','.png','.jpeg','.pdf','.csv');

$files = $_FILES;

//print_r($files);

$keys = array_keys($files);

for($i=0;$i<count($keys);$i++)

{

   if(is_array($files[$keys[$i]]['name']) && count($files[$keys[$i]]['name'])>0)

  {

   //Multiple files in Array

   for($f=0;$f<count($files[$keys[$i]]['name']);$f++)

   {

     $ext = pathinfo($file, PATHINFO_EXTENSION);

     if(!in_array($ext,$allowed_extensions) && $ext!='')

     {

       die('Only files with extensions '.implode(',',$allowed_extensions).' are allowed');

     }

   }

  }else{

   //Single file in array

    $ext = substr($files[$keys[$i]]['name'],strlen($files[$keys[$i]]['name'])-4,4);

   if(!in_array($ext,$allowed_extensions) && $ext!='')

   {

    $button = "<button onclick='window.history.back();' style='border:none;background-color:darkred;padding:10px;color:white;cursor:pointer;'>Go Back</button>";

    $content = 'Only files with extensions '.implode(',',$allowed_extensions).' are allowed.Please contact your website developer.';

    ?>

    <div style="width: 600px;font-family: sans-serif;margin: auto;margin-top: 10px;padding: 20px;border: 1px solid darkred;">

        <h4 style="color: darkred;margin-bottom: -5px;">Warning : Security check error</h4>

        <p style="color: darkred;line-height: 25px;font-size:13px;">

            <?=$content?>

        </p>

        <?=$button?>

    </div>

    <?php

     die();

   }

  }

}

}

function array_map_r( $func, $arr )

{

    $newArr = array();

    foreach( $arr as $key => $value )

    {

        $newArr[ $key ] = ( is_array( $value ) ? array_map_r( $func, $value ) : ( is_array($func) ? call_user_func_array($func, $value) : $func( $value ) ) );

    }

    return $newArr;

}

//Fuctions created by ganesh

function mysqli_escape_array($db=null,$array=array())

{

	$safe_array =array();

	foreach($array as $key=>$value)

	{

		$safe_array[$key] = mysqli_real_escape_string($db,$array[$key]);

	}

	return $safe_array;

}



function createPath($path) {

    if (is_dir($path)) return true;

    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );

    $return = createPath($prev_path);

    return ($return && is_writable($prev_path)) ? mkdir($path) : false;

}

function resize_image($file, $w, $h, $crop=FALSE) {

    list($width, $height) = getimagesize($file);

    $r = $width / $height;

    if ($crop) {

        if ($width > $height) {

            $width = ceil($width-($width*abs($r-$w/$h)));

        } else {

            $height = ceil($height-($height*abs($r-$w/$h)));

        }

        $newwidth = $w;

        $newheight = $h;

    } else {

        if ($w/$h > $r) {

            $newwidth = $h*$r;

            $newheight = $h;

        } else {

            $newheight = $w/$r;

            $newwidth = $w;

        }

    }

    

    

    $size = getimagesize($file);

    switch($size['mime'])

    {

        case "image/png":

        $src=imagecreatefrompng($file);

        break;

        case "image/jpeg":

        $src = imagecreatefromjpeg ($file);

        break;

        case "image/gif":

        $src = imagecreatefromgif ($file);

        break;

        default:

        $im=null;

    }

    

$dst = imagecreatetruecolor($newwidth, $newheight);

$colorRgb = array('red' => 255, 'green' => 255, 'blue' => 255);  //background color

//create new image and fill with background color

$color = imagecolorallocate($dst, $colorRgb['red'], $colorRgb['green'], $colorRgb['blue']);

imagefill($dst, 0, 0, $color);

imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);



    return $dst;

}



/***************** Create comprssed image ***********************/



function create_compressed_image($image_path="",$save_image_path="",$db=null,$table_name="",$column_name="",$id_column_name="",$id_column_value="",$resize=false,$section="")

{

    

    createPath($save_image_path);

    

     //Create Image object

     $size = getimagesize($image_path);

    /*

     * Array

    (

        [0] => 165

        [1] => 165

        [2] => 3

        [3] => width="165" height="165"

        [bits] => 8

        [mime] => image/png

    )

    

    */

        

        switch($size['mime'])

        {

            case "image/png":

            $im=imagecreatefrompng($image_path);

            break;

            case "image/jpeg":

            $im = imagecreatefromjpeg ($image_path);

            break;

            case "image/gif":

            $im = imagecreatefromgif ($image_path);

            break;

            default:

            $im=null;

        }

        

    

    if($im!=null)

    {

         // Save the image

        $time = time();

        

         if($resize)

         {

          $sql  = "SELECT * FROM `image_config` WHERE section=\"$section\"";

          $data = mysqli_query($db,$sql);

          $num = mysqli_num_rows($data);

            if($num>0)

            {

             extract(mysqli_fetch_assoc($data));

             $im = resize_image($image_path, $width, $height);

            }

         }

        

        //Save Image

       $com_img ="$time.jpg";

       $res = imagejpeg($im,"$save_image_path/$com_img",100);

        

        if($res)

        {

          $sql = "update $table_name set $column_name =\"$com_img\" where $id_column_name=$id_column_value";

          $inserted = mysqli_query($db,$sql) ;

        }

        

        // Free up memory

        imagedestroy($im);  

        return $inserted;

    }

}
//remove spical character function add by Akash K.
function RemoveSpecialChar($str){ 
 $res = str_ireplace( array( '\'', '"', 
    ',' , ';', '<', '>','!','@','#','$','%','^','&','*','(',')','_' ,'+',':','?','-'), ' ', $str); 
      
    // returning the result  
    return $res; 
    }





