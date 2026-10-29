<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
    $expenses = Expense::all();
    return view('expenses.index', [
        'expenses' => $expenses,
    ]);
    }
    
    public function edit($id)
{
    $expense = DB::table('expenses')
        ->where('id', $id)
        ->first();

    if (!$expense) {
        abort(404);
    }

    return view('expenses.edit', [
        'expense' => $expense,
    ]);
}
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title'  => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
    ]);

    Expense::findOrFail($id)->update($validated);

    return redirect('/expenses')->with('success', 'Расход успешно изменён!');
}
public function create()
{
    return view('expenses.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
    ]);
    Expense::create($validated);
    return redirect('/expenses')->with('success', 'Расход успешно добавлен!');
}
public function destroy($id)
{
    Expense::findOrFail($id)->delete();
    return redirect('/expenses')->with('success', 'Расход успешно удален!');
}
public function show($id)
{
    return view('expenses.show', [
        'expense' => Expense::findOrFail($id),
    ]);
}
}