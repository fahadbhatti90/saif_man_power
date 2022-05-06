<?php

use Illuminate\Support\Facades\DB;

function getSettingValue($val){
    $settings = \App\Models\Setting::getSetting($val);
    return $settings->$val;
}

function settingImagePath($image)
{
     if ($image != null)
        return asset('storage/settings/' . $image);
}

 function showImage($image)
 {
 	$ext = pathinfo($image, PATHINFO_EXTENSION);
 
	if($ext == 'pdf'){
		return asset('back_end/images/pdf-icon.png');
 	}elseif($ext == 'doc' || $ext == 'docx' ){
 		return asset('back_end/images/word-icon.png');
 	}else{
		return asset('storage/images/' . $image);
	}	  
}