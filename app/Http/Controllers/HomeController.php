<?php

namespace App\Http\Controllers;

use App\Models\{Campaign, Transaction};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction as MidtransTrans;

class HomeController extends Controller
{
    public function __construct()
    {
        // Config::$serverKey    = config('services.midtrans.serverKey');
        // Config::$isProduction = config('services.midtrans.isProduction');
        // Config::$isSanitized  = config('services.midtrans.isSanitized');
        // Config::$is3ds        = config('services.midtrans.is3ds');
    }
    public function index(Request $request)
    {
        return inertia('Home', [
            'campaigns' => Campaign::get()
        ]);
    }

    public function kumpuldonasi($slug)
    {
        return inertia('Donasi', [
            'campaign' => Campaign::whereSlug($slug)->firstOrFail()
        ]);
    }

    public function nominaldonasi($slug)
    {
        $campaign = Campaign::whereSlug($slug)->firstOrFail();

        return inertia('NominalDonasi', [
            'campaign' => $campaign
        ]);
    }

    public function donasisaya()
    {
        // return Transaction::with('campaign')->whereUserId(Auth::id())->first();
        return inertia('DonasiSaya', [
            'donasi' => Transaction::with('campaign')->whereUserId(Auth::id())->get()
        ]);
    }



    public function galangdana()
    {
        return inertia('GalangDana');
    }


    // CheckOutDonasi
    public function checkOut(Request $request)
    {

        Transaction::create([
            'user_id'     => Auth::id(),
            'campaign_id' => $request->campaign_id,
            'nominal'     => $request->nominal,
            'description' => $request->description,
            'image'       => $request->file('image')->store('transaction')
        ]);

        return to_route('donasi');
    }
}
