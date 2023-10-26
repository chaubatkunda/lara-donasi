<?php

namespace App\Http\Controllers;

use App\Models\{
    Campaign,
    Transaction
};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction as MidtransTrans;

class HomeController extends Controller
{
    public function __construct()
    {
        Config::$serverKey    = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized  = config('services.midtrans.isSanitized');
        Config::$is3ds        = config('services.midtrans.is3ds');
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
        $orderId = mt_rand(111111, 999999);
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $request->nominal, // no decimal allowed for creditcard
            ),
            'customer_details' => array(
                'name'    => Auth::user()->name,
                'email'         => Auth::user()->email,
            ),
            // 'enabled_payments' =>  array('bca_va', 'bni_va', 'bank_transfer', 'bri_va'),
            // 'enabled_payments' => array('gopay', 'bank_transfer'),
            'vtweb' => array()
        );
        try {
            $paymentUrl = Snap::getSnapToken($params);
            Transaction::create([
                'user_id'     => Auth::id(),
                'campaign_id' => $request->campaign_id,
                'invoice'     => $orderId,
                'nominal'     => $request->nominal,
                'description' => $request->description,
                'image'       => $request->image ? $request->file('image')->store('transaction') : null,
                'url_pay'     => $paymentUrl,
            ]);
            return to_route('pay', $orderId);
        } catch (Exception $e) {
            return $e;
        }


        // return to_route('donasi');
    }

    public function pay($id)
    {
        $transaksi = Transaction::whereInvoice($id)->first();
        return inertia('Midtrans', compact('transaksi'));
    }
}
