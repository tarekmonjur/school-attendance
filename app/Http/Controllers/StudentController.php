<?php

namespace App\Http\Controllers;

use App\Models\Classname;
use App\Models\Section;
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
        $this->middleware('permission');
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
        $data['class_name'] = $request->input('class_name');
        $data['class_section'] = $request->input('class_section');

        $data['classes']  = Classname::get();
        $data['sections'] = Section::get();

        $data['students'] = Student::where('classname', $data['class_name'])->get();
		return view('student.index')->with($data);
	}
 

	public function create()
    {
        $data['classes']  = Classname::get();
        $data['sections'] = Section::get();
		return view('student.add')->with($data);
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
            $student->bid = 1;
            $student->name = $request->input('name');
            $student->fname = $request->input('fname');
            $student->mname = $request->input('mname');
            $student->sex = $request->input('gender');
            $student->roll = $request->input('roll');
            $student->year = date('Y');
            $student->classname = $request->input('classname');
            $student->section = $request->input('section');
            $student->bdate = $request->input('bdate');
            $student->gsm = $request->input('mobile_number');
            $student->email = $request->input('email');
            $student->mfee = $request->input('mfee');
            $student->address = $request->input('address');
            $student->paddress = $request->input('paddress');
            $student->fnid = $request->input('fnid');
            $student->mnid = $request->input('mnid');
            $student->bgroup = $request->input('bgroup');
            $student->p_ins = $request->input('p_ins');
            $student->adate = $request->input('adate');
            $student->active = $request->input('active');
            $student->password = $request->input('sid');
            $student->lname = $request->input('lname');
            $student->location = $request->input('location');
            $student->f_location = $request->input('f_location');
            $student->m_location = $request->input('m_location');
            $student->o_location = $request->input('o_location');
            $student->m_balance = $request->input('m_balance');
            $student->billdate = $request->input('billdate');
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


    public function save(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return $this->setJsonMessage('', 'error', 500, 'Error!', 'Student not found.');
        }
        try {
            $student->sid = $request->input('sid');
            $student->rf_id = $request->input('rf_id');
            $student->save();
            return $this->setJsonMessage('', 'success', 200, 'Success!', 'Student successfully saved.');
        }catch(\Exception $e) {
            return $this->setJsonMessage('', 'error', 500, 'Error!', 'Something was wrong.');
        }
    }

}