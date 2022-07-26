<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{

    private $limit_size_by_file = '2000'; // Kilobytes
    private $limit_nb_files_by_upload = '5'; // MB

    public function send_email(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'email' => 'required|email|string',
                'subject' => 'required|string',
                'message' => 'required|string|max:1300',
                /* 'addition' => ['required', 'string', new StrAddition()], */
                'files.*'  => 'sometimes|file|mimes:pdf,docx,txt,png,jpg,jpeg|max:' . $this->limit_size_by_file,
                'files'  => 'max:' . $this->limit_nb_files_by_upload,
            ],
            [
                'name.required' => 'The name is required.',
                'email.required' => 'The email is required.',
                'subject.required' => 'The subject is required.',
                'message.required' => 'The message is required.',
                /* 'addition.required' => 'Le champ Addition est requis.', */
                'files.*.mimes' => 'Only pdf, docx, txt, png, jpg, jpeg formats are allowed.',
                'files.*.max' => 'Maximum size by file is ' . ($this->limit_size_by_file / 1000) . 'MB.',
                'files.max' => 'The number of uploaded files is limited to ' . $this->limit_nb_files_by_upload . '.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {

            $mailDatas = [
                'name' =>  $request->name,
                'email' =>  $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            if ($request->hasFile('files')) {
                $files = $request->file('files');
                $mailDatas['files'] = $files;
            }

            Mail::to(env('MAIL_USERNAME'))->send(new SendEmail($mailDatas));

            return response()->json(['success' => 'Your Email has been successfully sent !']);
        }
    }
}
