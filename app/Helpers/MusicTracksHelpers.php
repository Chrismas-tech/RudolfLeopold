<?php

namespace App\Helpers;

use App\Models\MusicTrack;

class MusicTracksHelpers
{
    /**
     * @param $name
     * @param $files
     */
    public static function save_audio_files_and_img_album($name, $files, $img_album)
    {
        foreach ($files as $file) {

            $file_name =  $file->getClientOriginalName();
            $folder_path = 'music/' . $name . '/tracks/';
            $file_path = 'music/' . $name . '/tracks/' . $file->getClientOriginalName();

            $folder_path_server = public_path($folder_path);

            if (!file_exists($folder_path_server)) {
                mkdir($folder_path_server, 0777, true);
            }

            $file->move($folder_path_server, $file_name);

            $file_real_name = explode('.', $file->getClientOriginalName())[0];
            /* dd($file_real_name); */

            // Save file_path Database
            $new_music_album = MusicTrack::create(
                [
                    'album_name' => $name,
                    'audio_file' => $file_path,
                    'audio_file_name' => $file_real_name,
                ]
            );

            // If Main Image Uploaded
            if ($img_album) {
                // Save new files images
                $file_path = InterventionHelpers::save_image_music_album(
                    $img_album,
                    'music/' . $name . '/music-album-image',
                    'main-image-',
                );

                $new_music_album->update(
                    [
                        'img_file' => $file_path,
                        'position' => $new_music_album->id,
                    ]
                );
            }
        }
    }

    /**
     * Return all tracks from album
     * @param string $album_name
     */
    public static function all_tracks_album($album_name)
    {
        return  MusicTrack::where('album_name', $album_name)
            ->orderby('position', 'asc')
            ->get();
    }
}
