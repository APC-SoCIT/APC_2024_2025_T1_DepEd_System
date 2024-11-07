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
use App\Models\Summary;
use App\Models\School;


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
    function viewStudent()
    {
        $students = User::where('role', 'student')
                        ->leftjoin('section', 'users.section', '=', 'section.id')
                        ->select('users.*', 'section.secname') // Include columns from Section, e.g., 'secname'
                        ->get();

        return view('view-student', ['students' => $students]);
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
        $sections = Section::where('teacher_id', $tid)
                            ->where('status', 'active')
                            ->get();
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
        DB::transaction(function () use ($section) {
            DB::table('users')
                ->where('section', $section->id)
                ->update(['section' => null]);
    
            DB::table('records')->where('section', $section->id)->delete();
            DB::table('summary')->where('section', $section->id)->delete();
            
            $section->delete();
        });

        return redirect()->route('view-section', ['deleted' => true]);
    }
    function sectionArchive(Section $section){
        // Update the status column to 'archived'
        $section->update(['status' => 'archived']);

        DB::table('users')
                ->where('section', $section->id)
                ->update(['section' => null]);

        return redirect()->route('view-section', ['archived' => true]);
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
                //Create summary record for student
                $summary = new Summary();
                $summary->user_id = $studentId;
                $summary->section = $sectionId;
                $summary->save();
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

                Summary::where('user_id', $studentId)
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
        $student = User::find($id);
        $records = DB::table('records')
            ->select('records.id', 'records.user_id','records.quarter','records.section','records.mt','records.filipino','records.english','records.math','records.ap','records.esp','records.mapeh','records.music','records.arts','records.pe','records.health') // Ensure proper selection
            ->where('records.user_id', $id)
            ->where('records.section', $student->section)
            ->get();
        
        return view('view-grades', compact('student'), ['records' => $records]);
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
    function viewSectionArchivedGrade($id){
        // Retrieve the section and ensure it is archived
        $section = Section::find($id);
        
        // Fetch students assigned to this archived section
        $students = DB::table('records')
            ->where('records.section', $section->id)
            ->where('records.quarter', "1")
            ->join('users', 'users.id', '=', 'records.user_id') // Joining based on user_id
            ->select('users.id', 'users.lrn', 'users.fname', 'users.mname', 'users.lname', 'users.section', 'users.tid')
            ->get();

        // Return view with students and section data
        return view('view-section-archived-grade', ['students' => $students, 'section' => $section]);
    }
    function viewArchivedGrades($id, $section){
        $student = User::find($id);
        $records = DB::table('records')
            ->select('records.id', 'records.user_id','records.quarter','records.section','records.mt','records.filipino','records.english','records.math','records.ap','records.esp','records.mapeh','records.music','records.arts','records.pe','records.health') // Ensure proper selection
            ->where('records.user_id', $id)
            ->where('records.section', $section)
            ->get();
        return view('view-archived-grades', compact('student'), ['records' => $records]);
    }
    function saveGradesPost(Request $request, $id)
    {
        $studentId = $id;
        $sectionId = User::find($id)->section;

        $subjects = ['mt', 'filipino', 'english', 'math', 'ap', 'esp', 'mapeh', 'music', 'arts', 'pe', 'health'];
        $quarters = ['q1', 'q2', 'q3', 'q4'];

        foreach ($quarters as $quarterIndex => $quarter) {
            foreach ($subjects as $subject) {
                $field = "{$subject}_{$quarter}";
                $grade = $request->input($field);
        
                if ($grade === null || $grade === '') {
                    continue;
                }
        
                // Check if records exist for these conditions
                $record = \App\Models\Record::where('user_id', $studentId)
                    ->where('section', $sectionId)
                    ->where('quarter', $quarterIndex + 1)
                    ->first();
        
                if (!$record) {
                    dd("No record found for user_id: $studentId, quarter: " . ($quarterIndex + 1) . ", section: $sectionId");
                }
        
                // Perform the update if the record exists
                $record->update([
                    "{$subject}" => $grade
                ]);
        
            }
        }

        // Additional update for subject averages and general average
        $subjects_ga = ['mt', 'filipino', 'english', 'math', 'ap', 'esp', 'mapeh'];

        foreach ($subjects_ga as $subject) {
            $averageField = "{$subject}_average";
            $averageGrade = $request->input($averageField);

            // Find the existing summary record
            $summary = \App\Models\Summary::where('user_id', $studentId)
                ->where('section', $sectionId)
                ->first();

            if ($summary) {
                // Update only if the average grade is present
                if (!is_null($averageGrade)) {
                    $summary->update([$subject => $averageGrade]);
                }
            }
        }

        // Update general average if provided
        $generalAverage = $request->input('general_average');
        
        if ($generalAverage !== null && $generalAverage !== '') {
            $summary = \App\Models\Summary::where('user_id', $studentId)
                ->where('section', $sectionId)
                ->first();

            if ($summary) {
                $summary->update(['ga' => $generalAverage]);
            }
        }
        return redirect()->to(route('view-grades', $id) . '?updated');
    }
    function viewStudentSections(){
        $loggedInUser = Auth::user();
        $id = $loggedInUser->id;
    
        // Query to retrieve past sections for the logged-in user
        $sections = DB::table('records')
            ->where('records.user_id', $id)
            ->where('records.quarter', "1") 
            ->join('section', 'section.id', '=', 'records.section')
            ->join('users', 'users.id', '=', 'records.user_id') 
            ->select('section.id','section.secname', 'section.grade', 'section.school_year')
            ->get();
    
        return view('view-student-sections', compact('sections'));
    }
    function viewStudentGrade($id){
        $loggedInUser = Auth::user();
        $student_id = $loggedInUser->id;
        $student = User::find($student_id);
        $records = DB::table('records')
            ->select('records.id', 'records.user_id','records.quarter','records.section','records.mt','records.filipino','records.english','records.math','records.ap','records.esp','records.mapeh','records.music','records.arts','records.pe','records.health') // Ensure proper selection
            ->where('records.user_id', $student_id)
            ->where('records.section', $id)
            ->get();
        return view('view-student-grade', compact('student'), ['records' => $records]);
    }
    function editTeacher(){
        $loggedInUser = Auth::user();
        $id = $loggedInUser->id;
        $teacher = DB::table('users')
            ->where('users.id', $id)
            ->select('users.id', 'users.fname','users.mname','users.lname','users.sid','users.tid','users.email','users.sex','users.bday') // Ensure proper selection
            ->first();
        return view('edit-teacher', compact('teacher'));
    }

    public function editTeacherPost(Request $request)
    {
        $loggedInUser = Auth::user();
        $id = $loggedInUser->id;
        // Validation rules
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'sid' => 'required|integer',
            'sex' => 'required|in:male,female',
            'bday' => 'required|date',
            'email' => 'required|email|unique:users,email,'.$id,
            'old_password' => 'nullable',
            'new_password' => 'nullable',
            'new_password_confirmation' => 'nullable',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->to(route('edit-teacher') . '?failed');
        }

        // Retrieve the user and update fields
        $teacher = User::findOrFail($id);
        $teacher->fname = $request->input('fname');
        $teacher->mname = $request->input('mname');
        $teacher->lname = $request->input('lname');
        $teacher->sid = $request->input('sid');
        $teacher->sex = $request->input('sex');
        $teacher->bday = $request->input('bday');
        $teacher->email = $request->input('email');

        // Update password if old password, new password, and confirmation are provided
        if ($request->filled('old_password') && $request->filled('new_password') && $request->filled('new_password_confirmation')) {
            // Check if the provided old password matches the stored password
            if (Hash::check($request->input('old_password'), $teacher->password)) {
                // Hash the new password
                $new_password = $request->input('new_password');
                $new_password_confirmation = $request->input('new_password_confirmation');

                // Check if the new password and confirmation match
                if ($new_password === $new_password_confirmation) {
                    // Update the teacher's password
                    $teacher->password = Hash::make($new_password);
                } else {
                    // Handle the case where the new passwords do not match
                    return redirect()->to(route('edit-teacher') . '?accountUpdateFailed');
                }
            } else {
                // Handle the case where the old password is incorrect
                return redirect()->to(route('edit-teacher') . '?accountUpdateFailed');
            }
        }


        $teacher->save();

        // Redirect back with success message
        return redirect()->to(route('dashboard-teacher') . '?accountUpdated');
    }
    function editStudent(){
        return view('edit-student');
    }
    function editStudentPost(Request $request){
        $loggedInUser = Auth::user();
        $id = $loggedInUser->id;
        // Validation rules
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required',

        ]);
        $student = User::findOrFail($id);
        // Update password if old password, new password, and confirmation are provided
        if ($request->filled('old_password') && $request->filled('new_password') && $request->filled('new_password_confirmation')) {
            // Check if the provided old password matches the stored password
            if (Hash::check($request->input('old_password'), $student->password)) {
                // Hash the new password
                $new_password = $request->input('new_password');
                $new_password_confirmation = $request->input('new_password_confirmation');

                // Check if the new password and confirmation match
                if ($new_password === $new_password_confirmation) {
                    // Update the student's password
                    $student->password = Hash::make($new_password);
                    $student->save();
                    return redirect()->to(route('dashboard-student') . '?accountUpdated');
                } else {
                    // Handle the case where the new passwords do not match
                    return redirect()->to(route('edit-student') . '?accountUpdateFailed');
                }
            } else {
                // Handle the case where the old password is incorrect
                return redirect()->to(route('edit-student') . '?accountUpdateFailed');
            }
        }
    }
    function dashboardAdmin(){
        return view('dashboard-admin');
    }
    function manageSchools(){
        $schools = School::all();
        return view('manage-schools', compact('schools'));    
    }
    function addSchool(){
        return view('add-school');    
    }
    function addSchoolPost(Request $request){
        // Validate the input data
        $request->validate([
            'name' => 'required',
            'region' => 'required',
            'division' => 'required',
            'district' => 'required',
            'address' => 'required',
        ]);
        // Save the school data to the database
        $school = new School(); // Assumes you have a School model
        $school->name = $request->input('name');
        $school->region = $request->input('region');
        $school->division = $request->input('division');
        $school->district = $request->input('district');
        $school->address = $request->input('address');
        $school->save();

        return redirect()->to(route('manage-schools') . '?schoolAdded');
    }
    function updateSchool($id){
        $school = School::find($id);
        return view('update-school', compact('school')); 
    }
    function updateSchoolPost(Request $request, $id){
        // Validate the input data
        $request->validate([
            'name' => 'required',
            'region' => 'required',
            'division' => 'required',
            'district' => 'required',
            'address' => 'required',
        ]);

        // Try to create the new section
        try {
            $school = School::findOrFail($id);
            $school->name = $request->input('name');
            $school->region = $request->input('region');
            $school->division = $request->input('division');
            $school->district = $request->input('district');
            $school->address = $request->input('address');
            $school->save();
            return redirect()->route('manage-schools', ['updated' => true]);
        } catch (\Exception $e) {
            return redirect()->route('view-section', ['error' => $e]);
        }
    }
    function schoolDelete($id){
        $school = School::findOrFail($id);
        $school->delete();
        return redirect()->route('manage-schools', ['deleted' => true]);
    }
    public function dashboardPassAndFailed(Request $request)
    {
        $passed = Summary::where("ga", ">=", 75)
            ->count();
        $failed = Summary::where("ga", "<", 75)
            ->count();

        return response()->json([
            "passed" => $passed,
            "failed" => $failed,
        ]);
    }

    public function dashboardGradesDifference(Request $request)
    {
        $class_a = Summary::whereBetween('ga', [90, 100])
            ->count();
        $class_b = Summary::whereBetween('ga', [85, 89])
            ->count();
        $class_c = Summary::whereBetween('ga', [80, 84])
            ->count();
        $class_d = Summary::whereBetween('ga', [75, 79])
            ->count();


        return response()->json([
            "class_a" => $class_a,
            "class_b" => $class_b,
            "class_c" => $class_c,
            "class_d" => $class_d,

        ]);
    }

    public function dashboardSectionCount(Request $request)
    {

        $sections = Summary::select('section')
            ->distinct()
            ->pluck('section'); // Only get the 'section' values as a list
    

        $labels = [];
        $data = [];
    

        foreach ($sections as $section) {

            $count = Summary::where("section", $section)->count();
    

            $labels[] = "Section {$section}";
            $data[] = $count;
        }
    

        return response()->json([
            
            'labels' => $labels,
            'data' => $data,
        ]);
    }
    
    public function dashboardGradesAverage()
    {
        $sectionAverages = Summary::selectRaw('section.secname as section_name, AVG(summary.ga) as average_ga')
            ->join('section', 'summary.section', '=', 'section.id')
            ->groupBy('section.secname')
            ->pluck('average_ga', 'section_name')
            ->toArray();

        $chartData = [
            'labels' => array_keys($sectionAverages),
            'datasets' => [
                [
                    'data' => array_values($sectionAverages),
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                ]
            ]
        ];

        return response()->json($chartData);
    }

    public function dashboardSectionPassing()
    {
        $passingData = Summary::selectRaw('section.secname as section_name, 
                COUNT(*) as total_students, 
                SUM(CASE WHEN ga >= 70 THEN 1 ELSE 0 END) as passing_students')
            ->join('section', 'summary.section', '=', 'section.id')
            ->groupBy('section.secname')
            ->get()
            ->map(function ($item) {
                $passingRate = $item->total_students > 0 
                    ? ($item->passing_students / $item->total_students) * 100 
                    : 0;
                return [
                    'section' => $item->section_name, // Use section name here
                    'passing_rate' => round($passingRate, 2)
                ];
            });

        $chartData = [
            'labels' => $passingData->pluck('section')->toArray(),
            'datasets' => [
                [
                    'data' => $passingData->pluck('passing_rate')->toArray(),
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                ]
            ]
        ];

        return response()->json($chartData);
    }
}