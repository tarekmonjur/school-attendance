<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
        $data['teachers'] = Teacher::get();
		return view('teacher.index')->with($data);
	}
 

	public function create()
    {
		return view('teacher.add');
	}


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'staff_id' => 'required|min:3|max:50|unique:'.(new Teacher)->getTable(),
            'rf_id' => 'required|min:3|max:50|unique:'.(new Teacher)->getTable(),
            'name' => 'required|min:3|max:50',
            'designation' => 'required|min:3|max:50',
            'nid' => 'required|min:3|max:50',
            'edu' => 'required|max:10|max:50',
            'mobile_number' => 'required|max:13|min:11',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('errors', $validator->errors()->messages());
            $request->session()->flash('old', $request->all());
            return redirect('/teachers/add');
        }
        try {
            $teacher = new Teacher;
            $teacher->staff_id = $request->input('staff_id');
            $teacher->rf_id = $request->input('rf_id');
            $teacher->bid = 1;
            $teacher->name = $request->input('name');
            $teacher->post = $request->input('designation');
            $teacher->nid = $request->input('nid');
            $teacher->edu = $request->input('edu');
            $teacher->sex = $request->input('gender');
            $teacher->gsm = $request->input('mobile_number');
            $teacher->bgroup = $request->input('bgroup');
            $teacher->address = $request->input('address');
            $teacher->salary = $request->input('salary');
            $teacher->note = 'N/A';
            $teacher->balance = '0';
            $teacher->password = $request->input('staff_id');
            $teacher->date = date('d-m-Y');
            $teacher->location = 'N/A';
            $teacher->serial_sequence = 'N/A';
            $teacher->active = 'N/A';
            $teacher->billdate = 'N/A';
            $teacher->save();
            $request->session()->flash('success', 'Teacher successfully added.');
            return redirect('teachers');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Sorry! Teacher not added.');
            return redirect('teachers/add');
        }
    }


    public function edit($id)
    {
        $data['teacher'] = Teacher::find($id);
        if (!$data['teacher']) {
           return redirect('/teachers');
        }
        return view('teacher.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'staff_id' => 'required|min:3|max:50',
            'rf_id' => 'required|min:3|max:50',
            'name' => 'required|min:3|max:50',
            'designation' => 'required|min:3|max:50',
            'nid' => 'required|min:3|max:50',
            'edu' => 'required|max:10|max:50',
            'mobile_number' => 'required|max:13|min:11',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('errors', $validator->errors()->messages());
            $request->session()->flash('old', $request->all());
            return redirect('/teachers/edit/'.$id);
        }
        try {
            $teacher = Teacher::find($id);
            $teacher->staff_id = $request->input('staff_id');
            $teacher->rf_id = $request->input('rf_id');
            $teacher->bid = 1;
            $teacher->name = $request->input('name');
            $teacher->post = $request->input('designation');
            $teacher->nid = $request->input('nid');
            $teacher->edu = $request->input('edu');
            $teacher->sex = $request->input('gender');
            $teacher->gsm = $request->input('mobile_number');
            $teacher->bgroup = $request->input('bgroup');
            $teacher->address = $request->input('address');
            $teacher->salary = $request->input('salary');
            $teacher->note = 'N/A';
            $teacher->balance = '0';
            $teacher->password = $request->input('staff_id');
            $teacher->date = date('d-m-Y');
            $teacher->location = 'N/A';
            $teacher->serial_sequence = 'N/A';
            $teacher->active = 'N/A';
            $teacher->billdate = 'N/A';
            $teacher->save();
            $request->session()->flash('success', 'Teacher successfully Updated.');
            return redirect('teachers');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Sorry! Teacher not Updated.');
            return redirect('teachers/edit/'.$id);
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