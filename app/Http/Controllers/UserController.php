<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DataTables;
class UserController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = User::latest()->get();
            return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        //    $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">View</a>';
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a> &nbsp';
                           $btn .= '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('users');
    }
}
