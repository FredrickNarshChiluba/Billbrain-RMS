<?php
namespace App\Helper;
use App\Models\Student;
use App\Models\Registration;
use App\Models\Course;
use App\Models\Marks;
use App\Models\Payment;
use App\Models\Course_unit;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Database\Seeders\SuperUserSeeder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Helper\Helper;
use Auth;

class Helper{

    

    public static function IDGenerator($model, $trow, $length = 1, $prefix){
        $data = $model::orderBy('id', 'desc')->first();
       
        if(!$data){
            $og_length = $length;
            $last_number = '';
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actual_last_number = ((int)$code/1)*1;
            $increment_last_number = $actual_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
       
      
       $zeros = "";
       for($i=0;$i<$og_length;$i++){
           $zeros.="0";
       }
      

        return $prefix.'/'.$zeros.$last_number;
    }
}





?>