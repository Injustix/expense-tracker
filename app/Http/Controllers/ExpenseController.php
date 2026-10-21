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
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
    ]);

    $updated = DB::table('expenses')
        ->where('id', $id)
        ->update([
            'title' => $validated['title'],
            'amount' => $validated['amount'],
        ]);

    if ($updated === 0) {
        $exists = DB::table('expenses')
            ->where('id', $id)
            ->exists();

        if (!$exists) {
            abort(404);
        }
    }

    return redirect('/expenses')
        ->with('success', 'Расход успешно изменён!');
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
    DB::table('expenses')
        ->where('id', $id)
        ->delete();
        
    return redirect('/expenses')
        ->with('success', 'Расход успешно удален!');
}
public function show($id)
{
    $expense = Expense::findOrFail($id);
    return $expense;
}
}