<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use ZipArchive;

class FileHelpers
{
    /**
     * Copy an entire folder with files
     * @param $src source path
     * @param $dst destination path
     */
    public static function copy_folder($src, $dst)
    {
        // open the source directory
        $dir = opendir($src);

        // Make the destination directory if not exist
        @mkdir($dst);

        // Loop through the files in source directory
        while ($file = readdir($dir)) {

            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {

                    // Recursively calling custom copy function
                    // for sub directory 
                    FileHelpers::copy_folder($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }

        closedir($dir);
    }

    /**
     * Delete old entries of model if exist
     * @param Collection
     */
    public static function delete_old_model_entries($collection)
    {
        if (count($collection)) {
            foreach ($collection as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Simply delete a file
     * @param string $file_path
     */
    public static function delete_file(string $file_path)
    {
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    /**
     * Simply delete a folder with all files
     * @param string $folder_path
     */
    public static function delete_folder($folder_path)
    {
        File::deleteDirectory($folder_path);
    }

    /**
     * Compress some files into a zip and generate a download, it needs an array of path files
     * @param array $array All individual files paths that you want to compress in one zip 
     */
    public static function compress_files_in_zip_and_download(array $files_path)
    {
        $zip = new ZipArchive;

        //New zip file is created and ready to add files in it
        $zip_name = 'download-your-zip.zip';

        if ($zip->open($zip_name, ZipArchive::CREATE) === FALSE) {
            die('Can`t open Zip files');
        } else {

            // Add files to the zip file
            foreach ($files_path as $path_file) {

                // We explode the $files_path array to catch the file Name, last element of array
                $file_explode = explode("/", $path_file);
                $count_el_array = count($file_explode);

                // Catch the last element
                $file_name = $file_explode[$count_el_array - 1];

                // addFile($path_file,$name_file)
                $zip->addFile(storage_path('app/private/' . $path_file), $file_name);
            }
            $zip->close();

            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename=' . $zip_name);
            header('Content-Length: ' . filesize($zip_name));
            readfile($zip_name);
            unlink($zip_name);
        }
    }

    /**
     * 
     */
    public static function folder_empty($dir)
    {
        if ($files = glob($dir . "/*")) {
            return false;
        } else {
            return true;
        }
    }
}
