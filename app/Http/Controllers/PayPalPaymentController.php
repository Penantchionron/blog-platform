<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Content;

class PayPalPaymentController extends Controller
{
    public function showCheckout($id)
    {
        $content = Content::findOrFail($id);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success', $content->id),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => $content->price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['status'] == 'CREATED') {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('accueil')->with('error', 'Erreur lors de la création du paiement PayPal.');
    }

    public function success(Request $request, $id)
    {
        $content = Content::findOrFail($id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            session()->put("paid_content_{$id}", true);
            return redirect()->route('content.download', $id)->with('success', 'Paiement réussi.');
        }

        return redirect()->route('accueil')->with('error', 'Paiement échoué.');
    }

    public function cancel()
    {
        return redirect()->route('accueil')->with('error', 'Paiement annulé.');
    }
}
