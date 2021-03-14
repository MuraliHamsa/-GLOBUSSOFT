<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use DB;
use File;
class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getmonthlysalary(request $request){



      
              $data =  File::get($request->file_data);

              $dataex = explode("\n", $data);

              $onlydata = explode(",", $dataex[1]);

           
         
          $token = $request->token;
          $noworkingdays = $onlydata[0];
          $no_of_absent_days = $onlydata[1];
          $nof_of_late_days = $onlydata[2];
          $nof_of_before_came_days = $onlydata[3];
          $empid = $onlydata[4];
                  

           

          if($token == "abcd"){

              if($no_of_absent_days == 1 && $nof_of_late_days > 2){
                //If he absent a single day his one day salary will be deducted && If he came late more than 2 days his one day salary will be deducted

                 $noworkingdays = $noworkingdays - 1;
                 
                  $sql = "SELECT name,email,(round((round(salary/12,2))/30) * $noworkingdays)  monthlysalary  FROM `employees`  WHERE id=$empid ";
                  $data = DB::select($sql);

              }else if($nof_of_before_came_days > 10){

                  //* If he came before on time more than 10 days, he got one day salary as bonus

                  $noworkingdays = $noworkingdays + 1;
                 
                  $sql = "SELECT name,email,(round((round(salary/12,2))/30) * $noworkingdays)  monthlysalary  FROM `employees`  WHERE id=$empid ";
                  $data = DB::select($sql);

              }else if($no_of_absent_days > 1){

                  //no_of_absent_days more than one

                 $noworkingdays = $noworkingdays - $no_of_absent_days;
                 
                  $sql = "SELECT name,email,(round((round(salary/12,2))/30) * $noworkingdays)  monthlysalary  FROM `employees`  WHERE id=$empid ";
                  $data = DB::select($sql);

              }


              else{

                //Salary is calculated based on working days

                $sql = "SELECT name,email,(round((round(salary/12,2))/30) * $noworkingdays)  monthlysalary  FROM `employees`  WHERE id=$empid ";
               $data = DB::select($sql);

              }


               

               return response()->json(["data"=>$data,"msg"=>"valid token"]);
          }else{

               return response()->json(["data"=>[],"msg"=>"invalid token"]);

          }

    }
  


   
}
