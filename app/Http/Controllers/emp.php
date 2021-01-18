<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;

class emp extends Controller
{
    public $editId;

    function index()
    {
        $data = employee::all();
        return view('employee', ['employees' => $data]);

    }


    public function create()
    {

    }

    function search(Request $request){
        return $request->input('search_data');
    }


    function goEditForm($id)
    {

        $this->editId = $id;
        $emp = employee::find($this->editId);
        return view('editEmployee', ['data' => $emp]);
    }


    function addData(Request $request)
    {


        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        $emp = new employee();

        $emp->fname = $request->input('fname');
        $emp->lname = $request->input('lname');
        $emp->email = $request->input('email');
        $emp->address = $request->input('address');
        $emp->mobile = $request->input('mobile');

        $query = $emp->save();

        if ($query) {
            return redirect('/employee')->with('success', 'Data Saved');
        } else
            return "Fail";
    }

    function delete($id)
    {

        $emp = employee::find($id);

        $query = $emp->delete();

        if ($query) {
            return redirect('/employee')->with('success', 'Data Deleted');

        } else
            return "Fail";
    }

}
