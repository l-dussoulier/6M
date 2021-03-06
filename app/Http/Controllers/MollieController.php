<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;
use phpDocumentor\Reflection\DocBlock\Tags\See;


class MollieController extends Controller
{

    public function  __construct() {
        Mollie::api()->setApiKey('test_PDtfcbTE2vEPFAV3zRqCNfJTu2NA28'); // your mollie test api key
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment()
    {
        //dd(Session::get('customer_data')->fdp);
        if($data = Session::get('customer_data')) {
        $article = Article::find($data->article_id);

        $total = floatval($data->fdp) + floatval($article->prix);
           $test = number_format($total, 2, '.', '');
       // dd(strval());

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' =>strval($test), // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Paiement bien accepté !',
            'redirectUrl' => route('BonCommande'), // after the payment completion where you to redirect
        ]);

            $payment = Mollie::api()->payments()->get($payment->id);
        }



        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess() {
        //echo 'payment has been received';

        //dd("Ok y'a moyen");
        if($data = Session::get('customer_data')) {
            $data->save();
            Session::remove('customer_data');
            return redirect('/AccepteCommande');
        }
        return redirect('/erreurCommande');


    }
}
