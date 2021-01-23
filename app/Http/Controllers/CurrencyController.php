<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{

    public function update(){
        $currency = new Currency();
        $rates = $currency->setUrl()['rates'];
        if (DB::table('currencies')->count()==0) {
            foreach ($rates as $key => $value) {
                DB::table('currencies')->insert([
                    'currency' => $key,
                    'rate' => $value,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        } else {
            foreach ($rates as $key => $value) {
                DB::table('currencies')->where('currency', $key)
                    ->update(['rate' => $value, 'updated_at' => Carbon::now()]);
            }
        }
        sleep(1);
        return redirect()->back()->with('msg','You have updated your data');

    }
    // can be implemented to a button where we can click.
    public function index()
    {
        $currencies = json_decode(DB::table('currencies')->get(),true);
        
        return view('welcome',['currencies'=>$currencies]);
    }
}
