<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ManageRolesController extends Controller
{
    public function index()
    {
        $unique_persons = DB::select('select distinct(pid),code,name_of_record,' .
           'per_email, per_phone, dept_name from person_role_view order by pid');
        $combined_roles = DB::select('select pid, group_concat(role_name) as roles' . 
           ' from person_role_view group by pid order by pid');
        
        return view('DeptContacts.dept_contacts',[
         'unique_persons' => $unique_persons, 
         'combined_roles' => $combined_roles
      ]);
   }
}