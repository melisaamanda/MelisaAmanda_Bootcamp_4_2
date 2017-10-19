<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Student;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createOrUpdateStudent(Request $request){
        
        DB::beginTransaction();

        try 
        {
            $this->validate($request, 
            [
                'student_name' => 'required',
                'student_address' => 'required',
                'student_phone' => 'required',
                'student_email' => 'required|email',              
            ]);
            
            $studentName = $request->input('student_name');
            $studentAddress = $request->input('student_address');
            $studentPhone = $request->input('student_phone');
            $studentEmail = $request->input('student_email');
            

            $student = Student::updateOrCreate(
                [
                'student_name' => $request->input('student_name'),
                'student_email' => $request->input('student_email')
                ],
                
                [
                'student_name' => $studentName,
                'student_address' => $studentAddress,
                'student_phone' => $studentPhone,
                'student_email' => $studentEmail
                ]);
            
            $newStudentData = Student::get();

            DB::commit();
            return response()->json($newStudentData, 201);
        }

        catch(\Exception $e) 
        {
            DB::rollBack();
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }
}