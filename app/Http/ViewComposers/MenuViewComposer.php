<?php

namespace App\Http\ViewComposers;

use App\Models\User;
use App\Models\Department;
use App\Models\Position;
use App\Models\EmployeeAttendance;
use Illuminate\Contracts\View\View;

class MenuViewComposer {

    public function compose(View $view) {

        $totalRegisteredSchool = 0;
        $totalRegisteredHospital = 0;
        $newRegisteredSchool = 0;        
        $newRegisteredHospital = 0;

        $view->with('counts', [
                    'totalRegisteredSchool' => User::where('account_type','1')->where('registration_status','1')->count(),
                    'totalRegisteredHospital' => User::where('account_type','2')->where('registration_status','1')->count(),
                    'newRegisteredSchool' => User::where('account_type','1')->where('registration_status','0')->count(),
                    'newRegisteredHospital' => User::where('account_type','2')->where('registration_status','0')->count(),
        ]);
          
    }
}

?>