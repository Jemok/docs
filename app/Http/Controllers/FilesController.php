<?php

namespace App\Http\Controllers;

use App\Repositories\FileRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FileRequest;

class FilesController extends Controller
{
    public function store(FileRequest $fileRequest, FileRepository $fileRepository){

        $fileRepository->store($fileRequest);

        return redirect()->back();
    }
}
