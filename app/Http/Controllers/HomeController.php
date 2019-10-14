<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function indexAction(Request $req)
    {
        return view('home', [
            'username' => $req->session()->get('username')
        ]);
    }
}
