<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salaries;

class SalaryController extends Controller
{
    public function storeOrUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'salary_local' => 'required|numeric'
        ]);
        $salary = salaries::updateOrCreate(
            ['email' => $request->email],
            ['name' => $request->name, 'salary_local' => $request->salary_local]
        );
        return response()->json(['message' => 'Salary details saved successfully.', 'data' => $salary]);
    }

    public function index() {
        return response()->json(salaries::all());
    }

    public function update(Request $request, $id) {
        $salary = salaries::findOrFail($id);
        $validated = $request->validate([
            'salary_local' => 'numeric',
            'salary_euros' => 'numeric',
            'commission' => 'numeric'
        ]);
        $salary->update($request->only(['salary_local','salary_euros', 'commission']));
        return response()->json(['message' => 'Salary details updated successfully.', 'data' => $salary]);
    }

    public function destroy($id) {
        salaries::findOrFail($id)->delete();
        return response()->json(['message' => 'Salary record deleted successfully.']);
    }
}