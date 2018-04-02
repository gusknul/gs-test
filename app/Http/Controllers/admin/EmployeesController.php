<?php

namespace GsTest\Http\Controllers\admin;

use GsTest\Model\Employee;
use GsTest\Model\TypeUser;
use GsTest\User;
use GsTest\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::paginate(10)->load('user');
        $employees_pagination = Employee::paginate(10);
        if ($employees_pagination->lastPage() < (int)$request->input('page')) {
            return redirect()->route('admin.employees.index');
        }

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
            $user->password = bcrypt($request->input('password'));
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
        $employee = Employee::find($id);
        $change_password = $request->input('change_password');
        $validate = false;
        if ($change_password != null)
            $validate = true;

        $validator = $this->validator($request->all(), $validate, $employee->user->id);
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

            $user = $employee->user;
            $user->email = $request->input('email');
            if ($change_password != null) {
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();
            $employee->update($this->employeeParams($request));

            DB::Commit();
            return response()->json(array("status" => true));
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(array("status" => false, "message" => "Error interno del servidor"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->image_profile->destroy();
        $user = $employee->user;
        $user->delete();
        return response()->json(array('status' => true));
    }

    protected function validator(array $data, $isPasswordRequired = true, $id = null)
    {

        $rules = [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'image_profile' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ];

        if ($isPasswordRequired) {
            $rules['password'] = 'required|confirmed|min:6';
            $rules['password_confirmation'] = 'required|min:6';
        }
        return Validator::make($data, $rules);
    }

    private function employeeParams($data)
    {
        return $data->only(['name', 'last_name', 'phone', 'address', 'image_profile']);
    }
}
