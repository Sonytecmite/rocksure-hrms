<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatePersonalInfo;
use App\Employee;
use App\Department;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePersonalInfo $request)
    {
        // Generate employee id
        $emp_id = $this->generateEmployeeID();
        $request->merge(['emp_id' => $emp_id]);

        $emp_photo = $request->emp_id.'.'. explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
        
        // Process Image and save image
        \Image::make($request->photo)->save(public_path('img/employees_photo/').$emp_photo);

        $request->merge(['photo' => $emp_photo]);
        $request->merge(['dob' => date('y-m-d', strtotime($request->dob))]);
        $request->merge(['ppt_exp_date' => date('y-m-d', strtotime($request->ppt_exp_date))]);
        $request->merge(['license_exp_date' => date('y-m-d', strtotime($request->license_exp_date))]);
    
        //Get department id
        $dept_id = Department::where('department_name', $request->department)->value('id');
        $request->merge(['department_id' => $dept_id]);
        
        // Create PDF from base64 encoded string
        $contract_file = $this->base64ToPDF($request->contract_file, $request->emp_id);
        $request->merge(['contract_file' => $contract_file]);

        Employee::create($request->all());

        $request->session()->put('emp_id', $request->emp_id);
    
        return ["message" => "Successful"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateEmployee($request)
    {
        
    }

    private function setFixedLength($value, $length)
    {
        $result = (string)$value;
        $padding = $length - strlen($result);
        $fill = '0';

        if($padding < 0)
        {
            $result = substr($result, -$padding);
        }
        else {
            for($n = 0; $n < $padding; $n++)
            {
                $result = $fill.$result;
            }
        }
        return $result;
    }

    private function generateEmployeeID()
    {
        define('COMPANY_NAME', 'RI');
        $randNum = mt_rand(1, 1000);
        $randNum = $this->setFixedLength($randNum, 3);
        $empID = COMPANY_NAME.$randNum;
        return $empID;
    }

    private function base64ToPDF($file, $empID) 
    {
        list($type, $data) = explode(';', $file);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
    
        $filename = public_path("/contract_files/".$empID.".pdf");

        file_put_contents($filename, $data);

        return basename($filename);
    }
}
