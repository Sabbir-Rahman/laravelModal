<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
class updateEmployee extends Controller
{
    function updateData(Request $request){



        $emp = employee::find($request->input('id'));
        $emp->fname = $request->input('fname');
        $emp->lname = $request->input('lname');
        $emp->email = $request->input('email');
        $emp->address = $request->input('address');
        $emp->mobile = $request->input('mobile');

        $query = $emp->save();

        if($query)
        {
            return redirect('/employee')->with('success','Data Updated');

        }
        else
            return "Fail";
    }
}
