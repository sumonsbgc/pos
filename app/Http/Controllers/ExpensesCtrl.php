<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Database\QueryException as Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $all = Expenses::all();

            return view('expenses', compact('all'));

        } catch (Exception $e) {
            report($e);

            return false;
        }

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
        try {
            $request->validate([
                'purpose' => 'required',
                'amount' => 'required'
            ]);

            $request['user_id'] = Auth::id();

            $all = $request->all();

            Expenses::create($all);

            $message = 1;

            return back()->with('message', $message);

        } catch (Exception $e) {
            report($e);

            return false;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $request->validate([
                'purpose' => 'required',
                'amount' => 'required'
            ]);

            $id = Expenses::findorfail($id);

            $request->user_id = Auth::id();

            $id->update($request->toArray());

            $me = 2;

            return back()->with('update', $me);

        } catch (Exception $e) {
            report($e);

            return false;
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
        try {
            $id = Expenses::findorfail($id);

            $id->delete();

            $me = 2;

            return back()->with('delete', $me);

        } catch (Exception $e) {
            report($e);

            return false;
        }
    }
}
