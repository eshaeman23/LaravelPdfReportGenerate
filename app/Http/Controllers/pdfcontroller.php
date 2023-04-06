<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\usermodel;
class pdfcontroller extends Controller
{

    public function add()
    {
        return View("adduser");
    }
    public function addrecord(Request $req)
    {
        $user = new usermodel();
        $user->name = $req->name;
        $user->email = $req->email;
        $image = $req->file("file");
        $ext = rand().".".$image->getClientOriginalName();
        $image->move("images/",$ext);
        $user->profileimage = $ext;
        $user->save();
        return redirect()->back();
    }

public function fetch()
{
    $all = usermodel::all();
    return View("fetch",compact("all"));
}


    public function generatePDF($id)
    {
        $user = usermodel::find($id);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $user->profileimage,
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('user.pdf');
    }
}
