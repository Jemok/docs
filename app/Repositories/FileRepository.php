<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/28/16
 * Time: 11:12 PM
 */

namespace App\Repositories;
use App\File;
use Illuminate\Support\Facades\Auth;

class FileRepository
{
    /**
     * The model used by this repository
     * @var
     */
    protected $model;

    /**
     * FileRepository constructor.
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->model = $file;
    }

    public function store($request, $receiver, $share_type){

        $file = $request->file('file');

        $fileOriginalName = $file->getClientOriginalName();

        $destinationPath = 'uploads';

        $extension = $request->file('file')->getClientOriginalExtension();

        $fileName = basename($fileOriginalName, '.'.$extension);

        $workingName = $fileName.'-'.rand(11111,99999).'.'.$extension;

        $request->file('file')->move($destinationPath, $workingName);

        $uploaded_file = $this->model->create([

            'file_name' => $workingName,
            'title'     => $request->title,
            'description' => $request->description,
            'extension'   => $extension,
        ]);

        Auth::user()->shared_files()->create([

            'share_type' => $share_type,
            'receiver'  => $receiver,
            'file_id'   => $uploaded_file->id
        ]);

    }

}