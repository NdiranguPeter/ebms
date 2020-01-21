<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::orderBy('created_at', 'asc')->paginate(10);

        return view('currencies.index')->with('currencies', $currencies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'symbol' => 'required',
            'rate' => 'required',

        ]);

        $currency = new Currency();

        $currency->symbol = $request->input('symbol');
        $currency->name = $request->input('name');
        $currency->rate = $request->input('rate');

        $currency->save();

        return redirect('/currencies')->with('success', 'Currency saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);

        return view('currencies.edit')->with('currency', $currency);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'symbol' => 'required',
            'rate' => 'required',

        ]);

        $currency = Currency::findOrFail($id);

        $currency->symbol = $request->input('symbol');
        $currency->name = $request->input('name');
        $currency->rate = $request->input('rate');

        $currency->save();

        return redirect('/currencies')->with('success', 'Currency updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();

        return redirect('/currencies')->with('error', 'currency deleted');
    }
}
