<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use DB;
use Response;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     public function adminHome()

    {
        $data = Employee::get();

        return view('adminHome',['data'=>$data]);

    }

     
  public function addUser(Request $request){

    $name = $request->name;
    $mobile = $request->mobile;
    $email = $request->email;
    $salary = $request->salary;
    $desg = $request->desg;

    if($salary !='' && $name !='' && $email != ''){
     

      // Call insert data using model() method 
      $data = new Employee;
      
       $data->name = $name;
       $data->email = $email;
       $data->mobile = $mobile;
       $data->salary = $salary;
       $data->designation = $desg;
      


      if($data->save()){
        return response()->json('1');
      }else{
        return response()->json('0');
      }

    }else{
      return response()->json('0');
    }

     
  }

    public function downloadcsv(){


        //download csv using php inbuilt functions Becuse when i used laravel package performence came down.

         $sql = "select * from employees";
     
        $data =  DB::select($sql);

          
            $headers = array(
                    'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
                    'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                    'Content-Disposition' => 'attachment; filename=abc.csv',
                    'Expires' => '0',
                    'Pragma' => 'public/',
                );

            $filename = "empdata.csv";
            $filename = $filename;

            $handle = fopen($filename, 'w');
            fputcsv($handle, [
                "name",
                "email",
                "mobile",
                "designation",
                "salaray"
              
              ]);

            foreach($data as $row){

              fputcsv($handle, [
                $row->name,
                $row->email,
                $row->mobile,
                $row->designation,
                $row->salary
               
              ]);
             
              
            }
          fclose($handle);

            
       return Response::download($filename, 'employee.csv', $headers);

    }
}
