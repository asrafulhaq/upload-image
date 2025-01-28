<?php

namespace Devzone\Haq\Pioneer;

trait ImageUpload
{
    /**
     * Image Upload
     */
    protected function upload(array $file, $path = 'media/', $ext = ['jpg', 'jpeg', 'png', 'gif'])
    {

        // get file info
        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];


        // get file extension  
        $file_arr = explode('.', $file_name);
        $file_ext =  strtolower(end($file_arr));

        // file name unique 
        $unique_filename =  time() . '_' . rand(100000, 10000000) . '_' . str_shuffle('1234567890') . '.' . $file_ext;

        // dir check 
        if (!is_dir($path)) {
            mkdir($path);
        }

        // ext check 
        if (!in_array($file_ext, $ext)) {
            echo "Invalid file Format";
            return;
        }

        // upload file 
        move_uploaded_file($file_tmp_name, $path . $unique_filename);

        // return file name 
        return $unique_filename;
    }
}
