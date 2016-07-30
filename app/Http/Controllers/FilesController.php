<?php

namespace App\Http\Controllers;

use App\Repositories\FileRepository;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;

class FilesController extends Controller
{
    public function store(FileRequest $fileRequest, FileRepository $fileRepository){

        $fileRepository->store($fileRequest, Auth::user()->class_membership()->first()->group_id, 1);

        Session::flash('flash_message', 'The file was shared to your class group successfully');

        return redirect()->back();
    }

    /**
     * Share a file to a single person
     * @param Request $request
     * @param $receiver
     * @param FileRepository $fileRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function shareToUser(Request $request, $receiver, FileRepository $fileRepository){
        $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
                'file'        => 'required|mimes:pdf,odt,pptx,docx,xlsx'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(compact('receiver'));
        }

        $fileRepository->store($request, $receiver, 0);

        $user = User::findOrFail($receiver);

        Session::flash('flash_message', 'Your file was shared to ' . $user->name . ' successfully');

        return redirect()->back();
    }
}
