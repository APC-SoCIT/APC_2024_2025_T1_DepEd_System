<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Ensure you're using the Auth facade
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Section;
use App\Models\Record;

class dashboardController extends Controller
{
    function assignStudent($id){
        $section = Section::find($id);
        $students = DB::table('users')
            ->select('users.id', 'users.lrn', 'users.fname', 'users.mname', 'users.lname', 'users.section', 'users.tid', 'section.secname') // Ensure proper selection
            ->where('users.role', 'student')
            ->leftJoin('section', 'users.section', '=', 'section.id') // Adjusted table name
            ->get();
    
        return view('assign-student', ['students' => $students], compact('section'));
    }
    function dashboardTeacher(){
        return view('dashboard-teacher');
    }
    function dashboardStudent(){
        return view('dashboard-student');
    }
    function viewStudent(){
        $students = User::where('role', 'student')->get();
        return view('view-student', ['students'=>$students]);
    }
    function updateStudent($id){
        $student = User::find($id);
        return view('update-student', compact('student'));
    }
    function updateSection($id){
        $section = Section::find($id);
        return view('update-section', compact('section'));
    }
    function registerStudent(){
        return view('register-student');
    }
    function createSection(){
        return view('create-section');
    }
    function viewSection() {
        $loggedInUser = Auth::user();
        $tid = $loggedInUser->tid;
        $sections = Section::where('teacher_id', $tid)->get();
        return view('view-section', ['sections' => $sections]);
    }
    function registerStudentPost(Request $request)
    {
        // Validate the input data
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'bday' => 'required',
            'lrn' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);
        // Retrieve logged-in user's tid and sid
        $loggedInUser = Auth::user();
        // Prepare the data for creating a new student
        $data = [
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'sid' => $loggedInUser->sid,  // Get the sid from the logged-in user
            'tid' => $loggedInUser->tid,  // Get the tid from the logged-in user
            'sex' => $request->sex,
            'lrn' => $request->lrn,
            'bday' => $request->bday,
            'email' => $request->email,
            'role' => 'student',
            'password' => Hash::make($request->lrn),  // Default password set to '0000', hash it for security
        ];

        // Try to create the new student user
        try {
            $user = User::create($data);
            return redirect()->route('register-student', ['registered' => true]);
        } catch (\Exception $e) {
            return redirect()->route('register-student', ['error' => $e]);
        }
    }
    function createSectionPost(Request $request)
    {
        // Validate the input data
        $request->validate([
            'secname' => 'required',
            'grade' => 'required',
            'school_year' => 'required',
        ]);
        // Retrieve logged-in user's tid and sid
        $loggedInUser = Auth::user();

        // Try to create the new section
        try {
            $section = new Section();
            $section->secname = $request->secname;
            $section->grade = $request->grade;
            $section->school_year = $request->school_year;
            $section->teacher_id = $loggedInUser->tid;
            $section->save();
            return redirect()->route('view-section', ['created' => true]);
        } catch (\Exception $e) {
            return redirect()->route('create-section', ['error' => $e]);
        }
    }
    function studentDelete(User $student){
        $student->delete();
        return redirect()->route('view-student', ['deleted' => true]);
    }
    function updateStudentPost(Request $request, $id){
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'bday' => 'required',
            'lrn' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        // Retrieve logged-in user's tid and sid
        $loggedInUser = Auth::user();
        // Prepare the data for creating a new student
        $data = [
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'sex' => $request->sex,
            'lrn' => $request->lrn,
            'bday' => $request->bday,
            'email' => $request->email,
        ];

        // Try to update
        try {
            $user = User::findOrFail($id);
            $user->update($data);
            return redirect()->route('view-student', ['updated' => true]); // Redirect to view student page
        } catch (\Exception $e) {
            return redirect()->route('view-student', ['update-error' => $e]);
        }
    }
    function updateSectionPost(Request $request, $id){
        // Validate the input data
        $request->validate([
            'secname' => 'required',
            'grade' => 'required',
            'school_year' => 'required',
        ]);

        // Try to create the new section
        try {
            $section = Section::findOrFail($id);
            $section->secname = $request->secname;
            $section->grade = $request->grade;
            $section->school_year = $request->school_year;
            $section->save();
            return redirect()->route('view-section', ['updated' => true]);
        } catch (\Exception $e) {
            return redirect()->route('view-section', ['error' => $e]);
        }
    }
    function sectionDelete(Section $section){
        $section->delete();
        return redirect()->route('view-section', ['deleted' => true]);
    }
    function assignStudentPost(Request $request, $sectionId){
        // Loop through each student in the request
        foreach ($request->input('students') as $studentId => $studentData) {
            // Check if the student was selected for assigning
            if ($studentData['assign'] == 1) {
                // Update the student's section or other details
                User::where('id', $studentId)->update([
                    'section' => $sectionId,
                ]);
                //Create record for student
                for ($i = 1; $i < 5; $i++) {
                    $record = new Record();
                    $record->user_id = $studentId;
                    $record->quarter = $i;
                    $record->section = $sectionId;
                    $record->save();
                }
            }
        }

        return redirect()->to(route('assign-student', $sectionId) . '?added');
    }
    function removeStudentPost(Request $request, $sectionId){
        // Loop through each student in the request
        foreach ($request->input('students') as $studentId => $studentData) {
            // Check if the student was selected for assigning
            if ($studentData['assign'] == 1) {
                // Update the student's section or other details
                User::where('id', $studentId)->update([
                    'section' => null,
                    // You can update more fields here if needed
                ]);

                Record::where('user_id', $studentId)
                ->where('section', $sectionId)
                ->delete();
            }
        }

        return redirect()->to(route('assign-student', $sectionId) . '?removed');
    }
    function manageGrades(){
        $loggedInUser = Auth::user();
        $tid = $loggedInUser->tid;
        $sections = Section::where('teacher_id', $tid)->get();
        return view('manage-grades', ['sections' => $sections]);
    }
    function viewGrades($id){
        $section = User::find($id);
        $records = DB::table('records')
            ->leftJoin('section', 'records.section', '=', 'section.id') // Adjusted table name
            ->select('records.id', 'records.user_id','records.quarter','records.section','records.mother_tongue','records.filipino','records.english','records.math','records.ap','records.esp','records.mapeh','records.music','records.arts','records.pe','section.secname','section.grade','section.school_year') // Ensure proper selection
            ->where('records.user_id', $id)
            ->get();
        return view('view-grades', compact('section'), ['records' => $records]);
    }
    function viewSectionGrade($id){
        $section = Section::find($id);
        $students = DB::table('users')
            ->select('users.id', 'users.lrn', 'users.fname', 'users.mname', 'users.lname', 'users.section', 'users.tid', 'section.secname') // Ensure proper selection
            ->where('users.role', 'student')
            ->leftJoin('section', 'users.section', '=', 'section.id') // Adjusted table name
            ->get();
    
        return view('view-section-grade', ['students' => $students], compact('section'));
    }
}