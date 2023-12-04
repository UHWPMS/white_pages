<?php

namespace App\Http\Controllers;
use App\Models\PersonRole;
use DB;

use Illuminate\Http\Request;

class PersonRoleController extends Controller
{
    public function index()
    {
        $unique_persons = DB::select('select distinct(pid),code,name_of_record,' .
           'per_email, per_phone, dept_name from person_role_view order by pid');
        $combined_roles = DB::select('select pid, group_concat(role_name) as roles' . 
           ' from person_role_view group by pid order by pid');
        
        return view('ManageRoles.manage_roles',[
         'unique_persons' => $unique_persons, 
         'combined_roles' => $combined_roles
      ]);
   }
    public function update(Request $req, $id)
    {
        $request = $req->all();
        $roles = ['role-Member','role-Primary','role-Secondary','role-Admin','role-HelpDesk'];
        $updated_roles = [];
        for ($i = 0; $i < count($roles); $i++) {
            if (isset($request[$roles[$i]])) {
                $updated_roles[] = ($i+1);
            }
        }
        $persons = DB::delete('delete from Person_Role where person_id=' . $id);
        for ($i = 0; $i < count($updated_roles); $i++) {
            DB::insert("insert into Person_Role values (" . $id . "," . 
                $updated_roles[$i] . ")");   
        }
        return redirect()->route('manage_roles');
    }
}
