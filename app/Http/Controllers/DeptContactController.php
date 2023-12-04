<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DeptContactController extends Controller
{
    public function index()
    {
        $unique_persons = DB::select('select distinct(pid),code,name_of_record,' .
           'per_email, per_phone, dept_name from dept_contact_view order by pid');
        $combined_roles = DB::select('select pid, group_concat(role_name) as roles' . 
           ' from dept_contact_view group by pid order by pid');
        
        return view('DeptContacts.dept_contacts',[
         'unique_persons' => $unique_persons, 
         'combined_roles' => $combined_roles
      ]);
   }
}