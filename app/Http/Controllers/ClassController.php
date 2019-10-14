<?php
namespace App\Http\Controllers;

use App\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ClassController extends BaseController
{
    public function listClasses(Request $req)
    {
        $limit           = 2;
        $page            = $req->route()->parameter('page', 1);
        $numberOfRecords = StudentClass::query()->count();
        $numberOfPage    = $numberOfRecords > 0 ? round($numberOfRecords / $limit) : 1;
        $classes         = StudentClass::query()
                                       ->skip(($page - 1) * $limit)
                                       ->take($limit)
                                       ->get();
        return view('classes/list', [
            'classes'      => $classes,
            'page'         => $page,
            'numberOfPage' => $numberOfPage
        ]);
    }

    public function addNew(Request $req, Response $res)
    {
        $errors = new MessageBag();
        if (!empty($req->post())) {
            // User's submitting data
            $validator = Validator::make($req->post(), [
                'name'        => 'required|min:5',
                'year'        => 'required|integer',
                'holder_name' => 'required|min:5'
            ]);

            if (!$validator->fails()) {
                $newClass = new StudentClass();
                $newClass->name = $req->post('name');
                $newClass->year = $req->post('year');
                $newClass->holder_name = $req->post('holder_name');
                $newClass->save();
                return redirect('/class');
            }

            $errors = $validator->errors();
        }

        return view('classes/add', [
            'errors' => $errors
        ]);
    }
}
