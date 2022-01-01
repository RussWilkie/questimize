<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\QuestsExport;
use App\Imports\QuestsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ImportExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new QuestsExport, 'quests - '. Carbon::now()->toDateString() . '.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new QuestsImport,request()->file('file'));
           
        return back();
    }

    public function createDefaultSettings(){
        $user = User::where('email', '=', 'manidoo.wilkie@gmail.com')->first();
        dump($user->email);

        if ($user->email == "manidoo.wilkie@gmail.com") {
            dump('hit here');
            $role = Role::create(['name' => 'super_admin']);
            $permission1 = Permission::create(['name' => 'edit quests']);
            $permission2 = Permission::create(['name' => 'delete quests']);
            $role->givePermissionTo($permission1);
            $role->givePermissionTo($permission2);
            $user->assignRole($role);
        }
        return 'finish';
    }
}
