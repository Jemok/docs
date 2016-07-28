<?php

namespace App\Http\Controllers;

use App\Repositories\FileRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Session;

class FilesController extends Controller
{
    public function store(FileRequest $fileRequest, FileRepository $fileRepository){

        $fileRepository->store($fileRequest);

        Session::flash('flash_message', 'The file was shared to your class group successfully');

        return redirect()->back();
    }
}
