<?php
class Image{
    public  static function uploadImage($file , $directory){
        $Directory =  $directory."/";
        $File =  $Directory.basename($_FILES[$file]['name'][0]);
        if(self::isImage($file)){
            if(self::checkMaxSize($file)){
                throw new Exception("Image is too big to upload! Please upload a image that less than 4 MB");
            }else if(self::imageExist($File)){
                throw new Exception("Image does Exist! Please upload another image");
            }else{
                move_uploaded_file($_FILES[$file]["tmp_name"][0], $File);
                return basename($_FILES[$file]['name'][0]);
            }
        }else{
            throw new Exception("This isn't image ! Please upload a image!");

        }

    }



    private static function isImage($fileName){
        if (strpos(mime_content_type($_FILES[$fileName]['tmp_name'][0]), 'image/') !== false) {
            return true;
        }
        return false;
    }


    private static function checkMaxSize($file){
        if($_FILES[$file]['size'][0] > 4000000){
            return true;
        }
        return false;
    }


    private static function imageExist($file){
        if(file_exists($file)){
            return true;
        }
        return false;
    }
}
?>