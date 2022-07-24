<?php

namespace App\Helpers;

use App\Models\MusicTrack;

class AudioFilesHelpers
{
    /**
     * @param $name
     * @param $files
     */
    public static function save_audio_files($name, $files)
    {

        foreach ($files as $file) {

            $file_name = $file->getClientOriginalName();

            $folder_path = 'music/' . $name;
            $file_path = 'music/' . $name . '/' . $file->getClientOriginalName();

            $folder_path_server = public_path($folder_path);

            if (!file_exists($folder_path_server)) {
                mkdir($folder_path_server, 0777, true);
            }

            $file->move($folder_path_server, $file_name);

            $file_real_name = explode('.', $file->getClientOriginalName())[0];
            /* dd($file_real_name); */

            // Save file_path Database
            MusicTrack::create(
                [
                    'album_name' => $name,
                    'file_path' => $file_path,
                    'file_real_name' => $file_real_name,
                ]
            );
        }
    }
}
