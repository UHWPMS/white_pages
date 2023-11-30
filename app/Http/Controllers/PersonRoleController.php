<?php

namespace App\Http\Controllers;
use App\Models\PersonRole;
use DB;

use Illuminate\Http\Request;

class PersonRoleController extends Controller
{
    public function destroy($pid)
    {
        DB::delete('delete from Person_Role where person_id = $pid and (role_id = 2 or role_id = 3)');
    }

    public function update($pid, $role_id)
    {
        DB::update('update Person_Role set role_id = $role_id where person_id = $pid');
    }
}
