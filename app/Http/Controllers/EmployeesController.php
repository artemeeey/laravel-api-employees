<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Builder\Param;

class EmployeesController extends Controller
{
    public function create(Request $req) {
        return response()->json(Employee::insert($req->all()));
    }

    public function edit($id, Request $req) {
        return response()->json(Employee::findOrFail($id)->update($req->all()));
    }

    public function get($id) {
        return response()->json(Employee::findOrFail($id));
    }

    public function upload($id, Request $request) {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'image' => 'required|image',
        ]);

        $avatarName = uniqid().time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('avatars'), $avatarName);

        $employee->avatar_url = "/avatars/$avatarName";
        $employee->save();
    }

    public function all(Request $req) {
        $query = new Employee();
        if(isset($req->where)) foreach($req->where as $key => $value) $query = $query->where($key, 'LIKE', "%$value%");
        if(isset($req->orderBy)) foreach($req->orderBy as $key => $value) $query = $query->orderBy($key, $value);
        $paginator = $query->paginate((isset($req->perPage)) ? $req->perPage : 15);

        return response()->json([
            'data' => $paginator->items(),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'last_page' => $paginator->lastPage(),
                'total' => $paginator->total(),
                'from' => $paginator->firstItem(),
                'to' => $paginator->lastItem(),
            ]
        ]);
    }

}
