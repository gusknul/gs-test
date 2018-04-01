<?php

namespace GsTest\Http\Controllers\admin;

use GsTest\Model\Employee;
use GsTest\Model\TypeUser;
use GsTest\User;
use Illuminate\Http\Request;

use GsTest\Http\Requests;
use GsTest\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10)->load('user');
        $employees_pagination = Employee::paginate(10);
        //dd($employees_pagination);
        return view('admin.employees.index', ['employees' => $employees, 'employees_pagination' => $employees_pagination]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $response = array(
                "status" => false,
                "message" => "No se guardaron correctamente los datos",
                "errors" => $validator->errors()->all()
            );
            return response()->json($response);
        }

        $data = $request->all();

        try {
            DB::beginTransaction();

            $user = new User();
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('email'));
            $user->type_user_id = TypeUser::EMPLOYEE;
            $user->save();
            $employee = new Employee($this->employeeParams($request));
            $user->employee()->save($employee);

            DB::Commit();
            return response()->json(array("status" => true));
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(array("status" => false, "message" => "Error interno del servidor"));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id)->load('user');
        return view('admin.employees._show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id)->load('user');
        return view('admin.employees._edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employee::find($id);
        $user =  $employe->user;
        $user->delete();
        return response()->json(array('status' => true));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'image_profile' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
    }

    private function employeeParams($data)
    {
        return $data->only(['name', 'last_name', 'phone', 'address']);
    }
}
