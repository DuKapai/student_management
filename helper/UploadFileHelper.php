<?php
if(!function_exists('uploadFile')){
    function uploadFile($file, $pathFile, $arrType = [], $size = 0){
        if(empty($file) || empty($pathFile)){
            return null;
        }
        $nameFile = $file['name'];
        $typeFile = $file['type'];
        $sizeFile = $file['size'];
        $tmpFile  = $file['tmp_name'];
        $errorFile = $file['error'];
        if(in_array($typeFile, $arrType) && $sizeFile <= $size && $errorFile == 0){
            // tien hanh upload
            $upload = move_uploaded_file($tmpFile, $pathFile . $nameFile);
            if($upload){
                // tra ve ten file de luu vao database
                return $nameFile;
            }
        }
        return null;
    }
}