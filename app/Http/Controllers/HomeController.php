<?php

namespace App\Http\Controllers;

use App\Models\{Campaign, Transaction};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;
use Inertia\ResponseFactory;
use Midtrans\Config;
use Midtrans\Snap;

class HomeController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function index(Request $request): Response|ResponseFactory
    {
        return inertia('Home', [
            'campaigns' => Campaign::get()
        ]);
    }

    public function kumpuldonasi($slug)
    {
//        return Campaign::withCount('transactions')->with('transactions')->whereSlug($slug)->firstOrFail();
        return inertia('Donasi', [
            'campaign' => Campaign::withCount('transactions')
                ->with('transactions')
                ->whereSlug($slug)
                ->firstOrFail()
        ]);
    }

    public function nominaldonasi($slug): Response|ResponseFactory
    {
        $campaign = Campaign::whereSlug($slug)->firstOrFail();

        return inertia('NominalDonasi', [
            'campaign' => $campaign
        ]);
    }

    public function donasisaya(): Response|ResponseFactory
    {
        // return Transaction::with('campaign')->whereUserId(Auth::id())->first();
        return inertia('DonasiSaya', [
            'donasi' => Transaction::with('campaign')->whereUserId(Auth::id())->get()
        ]);
    }


    public function galangdana(): Response|ResponseFactory
    {
        return inertia('GalangDana');
    }


    // CheckOutDonasi
    public function checkOut(Request $request)
    {
        $request->validate([
            "nominal" => 'required|numeric',
        ]);


        try {
            $orderId = mt_rand(111111, 999999);
            $params = array(
                'transaction_details' => array(
                    'order_id' => $orderId,
                    'gross_amount' => $request->nominal, // no decimal allowed for creditcard
                ),
                'customer_details' => array(
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ),
                'vtweb' => array()
            );
            $paymentUrl = Snap::getSnapToken($params);
            Transaction::create([
                'user_id' => Auth::id(),
                'campaign_id' => $request->campaign_id,
                'invoice' => $orderId,
                'nominal' => $request->nominal,
                'description' => $request->description,
                'url_pay' => $paymentUrl,
            ]);
            return to_route('pay', $orderId);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function pay($id): Response|ResponseFactory
    {
        $transaksi = Transaction::whereInvoice($id)->first();
        return inertia('Midtrans', compact('transaksi'));
    }
}
