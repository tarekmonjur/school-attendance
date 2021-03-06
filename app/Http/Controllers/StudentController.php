<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }


	public function index(Request $request)
    {
        $data = [];
        if($request->has('from_date')){
            $data['from_date'] = $request->input('from_date');
        }else{
            $data['from_date'] = Carbon::now()->subMonth(1)->format('Y-m-d');
        }
        if($request->has('to_date')){
            $data['to_date'] = $request->input('to_date');
        }else{
            $data['to_date'] = Carbon::now()->format('Y-m-d');
        }
        $data['students'] = Student::get();
		return view('student.index')->with($data);
	}
 

	public function create()
    {
		return view('student.add');
	}


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sid' => 'required|min:3|max:50|unique:'.(new Student)->getTable(),
            'rf_id' => 'required|min:3|max:50|unique:'.(new Student)->getTable(),
            'name' => 'required|min:3|max:50',
            'fname' => 'required|min:3|max:50',
            'mname' => 'required|min:3|max:50',
            'roll' => 'required|max:10|unique:'.(new Student)->getTable(),
            'classname' => 'required',
            'mobile_number' => 'required|max:13|min:11',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('errors', $validator->errors()->messages());
            $request->session()->flash('old', $request->all());
            return redirect('/students/add');
        }
        try {
            $student = new Student;
            $student->sid = $request->input('sid');
            $student->rf_id = $request->input('rf_id');
            $student->name = $request->input('name');
            $student->fname = $request->input('fname');
            $student->mname = $request->input('mname');
            $student->sex = $request->input('sex');
            $student->roll = $request->input('roll');
            $student->classname = $request->input('classname');
            $student->gsm = $request->input('mobile_number');
            $student->bdate = $request->input('bdate');
            $student->sex = $request->input('gender');
            $student->address = $request->input('address');
            $student->save();
            $request->session()->flash('success', 'Student successfully added.');
            return redirect('students');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Sorry! Student not added.');
            return redirect('students/add');
        }
    }


    public function edit($id)
    {
        $data['student'] = Student::find($id);
        if (!$data['student']) {
           return redirect('/students');
        }
        return view('student.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sid' => 'required|min:3|max:50|unique:'.(new Student)->getTable().',sid,'.$id,
            'rf_id' => 'required|min:3|max:50|unique:'.(new Student)->getTable().',rf_id,'.$id,
            'name' => 'required|min:3|max:50',
            'fname' => 'required|min:3|max:50',
            'mname' => 'required|min:3|max:50',
            'roll' => 'required|max:10|unique:'.(new Student)->getTable().',id',
            'classname' => 'required',
            'mobile_number' => 'required|max:13|min:11',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('errors', $validator->errors()->messages());
            $request->session()->flash('old', $request->all());
            return redirect('/students/edit/'.$id);
        }
        try {
            $student = Student::find($id);
            $student->sid = $request->input('sid');
            $student->rf_id = $request->input('rf_id');
            $student->name = $request->input('name');
            $student->fname = $request->input('fname');
            $student->mname = $request->input('mname');
            $student->sex = $request->input('sex');
            $student->roll = $request->input('roll');
            $student->classname = $request->input('classname');
            $student->gsm = $request->input('mobile_number');
            $student->bdate = $request->input('bdate');
            $student->sex = $request->input('gender');
            $student->address = $request->input('address');
            $student->save();
            $request->session()->flash('success', 'Student successfully Updated.');
            return redirect('students');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Sorry! Student not Updated.');
            return redirect('students/edit/'.$id);
        }
    }


}