<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DeptContactController extends Controller
{
    public function index()
    {
        $contacts = DB::select('select * from dept_contact_view');
        return view('DeptContacts.dept_contacts',['data' => $contacts]);
    }
}