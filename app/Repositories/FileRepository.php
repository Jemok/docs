<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/28/16
 * Time: 11:12 PM
 */

namespace App\Repositories;
use App\File;

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

    public function store($request){

        // getting all of the post data
        //$file = $request->file('file');

        //dd($file);
    }

}