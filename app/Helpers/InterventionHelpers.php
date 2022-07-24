<?php

namespace App\Helpers;

use App\Models\MultipleImageProductVariant;
use App\Models\Photo;
use Intervention\Image\Facades\Image as InterventionImage;

class InterventionHelpers
{

    private static $encode_percent = 90;

    /**
     * Working for Product Variants 
     * Save one file with the Intervention Library and return the path to save in Database
     * @param file $file file uploaded
     * @param string $name_folder_model_plural "products"
     * @param string $name_folder_model_singular "product"
     * @param string $id_model id
     * @param string $name_folder_image "main-image-/multi-image"
     * @param string $name_file "main-image" or "multi-images
     */
    public static function save_image_intervention(
        $file,
        $name_folder_model_plural,
        $name_folder_model_singular,
        $id_model,
        $name_file,
        $name_folder_image
    ) {
        /* dd($file, $name_folder_model_plural, $name_folder_model_singular, $id_model, $name_file, $name_folder_image); */

        $image_file = InterventionHelpers::resize_image_product($file);

        $extension_file = $file->extension();
        $file_name = $name_file . time() . '-' . mt_rand() . '.' . $extension_file;

        $folder_path_database = 'img/img-template/' . $name_folder_model_plural . '/' . $name_folder_model_singular . '-' . $id_model . '/' . $name_folder_image;
        $folder_path_server = public_path($folder_path_database);

        /* dd($folder_path_server); */

        if (!file_exists($folder_path_server)) {
            mkdir($folder_path_server, 0777, true);
        }

        $image_file->save($folder_path_server . '/' . $file_name);

        /* Folder Path Database */
        return $folder_path_database . '/' . $file_name;
    }


    /**
     * Update multiple images simple product 
     * @param Request $request
     * @param $update Product Update
     */
    public static function save_multi_images_intervention($files, $id_product, $id_product_variant)
    {
        foreach ($files as $file) {

            $image_file = InterventionHelpers::resize_image_product($file);

            $extension_file = $file->extension();
            $file_name = 'multi-image-' . time() . '-' . mt_rand() . '.' . $extension_file;

            $folder_path_database = 'img/img-template/products/product-' . $id_product . '/product-variant-' . $id_product_variant . '/multi-images/';
            $folder_path_server = public_path($folder_path_database);


            if (!file_exists($folder_path_server)) {
                mkdir($folder_path_server, 0777, true);
            }

            $image_file->save($folder_path_server . $file_name);

            MultipleImageProductVariant::create(
                [
                    'product_id' => $id_product,
                    'product_variant_id' => $id_product_variant,
                    'file_path' => $folder_path_database . $file_name,
                ]
            );
        }
    }

    /**
     * Working
     * Return an resized image to 800x800 and encoded Jpg 90%
     * @param $file file 
     */
    public static function resize_image_product($file)
    {

        $data = getimagesize($file);
        $width = $data[0];
        $height = $data[1];

        /* 
        width_origin = 400px
        height_origin = 700px

        width_final = 800px
        ratio = width_final/width_origin => 2 
        new_height = height_origin * ratio => 1400

        height_final = 800px
        ratio = height_final/height_origin => 2 
        new_width = width_origin * ratio => 1400
        */

        /*  dd($width, $height); */

        if ($width > $height) {
            $width_final = 800;
            $ratio = $width_final / $width;

            $new_width = $width_final;
            $new_height = $height * $ratio;
        } else {
            $height_final = 800;
            $ratio = $height_final / $height;

            $new_height = $height_final;
            $new_width = $width * $ratio;
        }

        $img = InterventionImage::make(file_get_contents($file))->resize($new_width, $new_height)->encode('jpg', self::$encode_percent);
        $img->resizeCanvas(800, 800, 'center', false, '#ffffff');

        return $img;
    }

    /**
     * Working
     * Return an resized image to 800x800 and encoded Jpg 90%
     * @param $file file 
     */
    public static function resize_image_mega_menu($file)
    {

        $data = getimagesize($file);
        $width = $data[0];
        $height = $data[1];

        if ($width > $height) {
            $width_final = 800;
            $ratio = $width_final / $width;

            $new_width = $width_final;
            $new_height = $height * $ratio;
        } else {
            $height_final = 800;
            $ratio = $height_final / $height;

            $new_height = $height_final;
            $new_width = $width * $ratio;
        }

        $img = InterventionImage::make(file_get_contents($file))->resize($new_width, $new_height)->encode('jpg', self::$encode_percent);
        $img->resizeCanvas(800, 800, 'center', false, '#ffffff');

        return $img;
    }

    /**
     * Verify width and height and encode quality jpg 
     * @param $file file 
     */
    public static function resize_image_album($file)
    {
        $data = getimagesize($file);
        $width = $data[0];
        $height = $data[1];

        if ($width > 1000) {
            $width_final = 1700;
            $ratio = $width_final / $width;
            $new_height = $height * $ratio;

            return  InterventionImage::make(file_get_contents($file))->resize($width_final, $new_height)->encode('jpg', self::$encode_percent);
        } else {
            return  InterventionImage::make(file_get_contents($file))->encode('jpg', self::$encode_percent);
        }
    }


    /**
     * Working for Product Variants 
     * Save one file with the Intervention Library and return the path to save in Database
     * @param file $file file uploaded
     * @param string $name_folder_model_plural "products"
     * @param string $name_folder_model_singular "product"
     */
    public static function save_image_profile_photo(
        $file,
        $name_folder,
        $name_file
    ) {
        /* dd($file, $name_folder_model_plural, $name_folder_model_singular, $id_model, $name_file, $name_folder_image); */

        $image_file = InterventionHelpers::resize_image_product($file);

        $extension_file = $file->extension();
        $file_name = $name_file . time() . '-' . mt_rand() . '.' . $extension_file;

        $folder_path_database = 'app/private/' . $name_folder;
        $folder_path_server = storage_path($folder_path_database);

        if (!file_exists($folder_path_server)) {
            mkdir($folder_path_server, 0777, true);
        }

        $image_file->save($folder_path_server . '/' . $file_name);

        /* Folder Path Database */
        return $folder_path_database . '/' . $file_name;
    }


    /**
     * Store multiple photos album 
     * @param file $file file uploaded
     * @param string $name_folder_model_plural "photos"
     * @param string $name_folder_model_singular "photo"
     */
    public static function save_multi_photos_album($files)
    {
        foreach ($files as $file) {

            $id =  Photo::count() + 1;

            $image_file = InterventionHelpers::resize_image_album($file);

            $extension_file = $file->extension();
            $file_name = 'multi-photos-' . time() . '-' . mt_rand() . '.' . $extension_file;

            $folder_path_database = 'img/img-template/photos/photo-' . $id . '/multi-photos/';
            $folder_path_server = public_path($folder_path_database);


            if (!file_exists($folder_path_server)) {
                mkdir($folder_path_server, 0777, true);
            }

            $image_file->save($folder_path_server . $file_name);

            Photo::create(
                [
                    'file_path' => $folder_path_database . $file_name,
                    'url' => asset($folder_path_database . $file_name),
                ]
            );
        }
    }


    /**
     * Working for Music Album 
     * Save one file with the Intervention Library and return the path to save in Database
     * @param file $file file uploaded
     * @param string $name_folder_model_plural "products"
     * @param string $name_folder_model_singular "product"
     */
    public static function save_image_music_album(
        $file,
        $name_folder,
        $name_file
    ) {
        /* dd($file, $name_folder_model_plural, $name_folder_model_singular, $id_model, $name_file, $name_folder_image); */

        $image_file = InterventionHelpers::resize_image_product($file);
        $extension_file = $file->extension();
        $file_name = $name_file . time() . '-' . mt_rand() . '.' . $extension_file;

        $folder_path_database = $name_folder;
        $folder_path_server = public_path($folder_path_database);

        if (!file_exists($folder_path_server)) {
            mkdir($folder_path_server, 0777, true);
        }


        $image_file->save($folder_path_server . '/' . $file_name);


        /* Folder Path Database */
        return $folder_path_database . '/' . $file_name;
    }
}
