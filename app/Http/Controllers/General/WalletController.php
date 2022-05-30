<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Goutte;
use Spatie\Permission\Models\Role;
use function view;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        if(count(auth()->user()->roles) > 0){
            return redirect()->intended('manage/transactions');
        }

        //energy values
        $balanceEnergy = auth()->user()->getBalanceEnergy()/100;
        $balanceEnergyInFiat = $balanceEnergy / \App\Models\ExchangeRate::EnergyToFiatRateBridge();

        //crypto values
        $balanceCrypto = auth()->user()->getBalanceCrypto()/100;
        $balanceCryptoInFiat = $balanceCrypto / \App\Models\ExchangeRate::CryptoToFiatRate();

        //fiat values
        $balanceFiat = auth()->user()->getBalanceFiat()/100;
        $totalBalanceInFiat = auth()->user()->getBalanceTotalInFiat()/100;

        //transaction registries
        $transactions = $this->listTransactions(0);

//        $crawler = Goutte::request('GET', 'https://bscscan.com/tx/0x6eea06cc00210681c818970cbd5312a25af5db1f2137e413056a6e3df4509172');
//        $crawler->filter('#ContentPlaceHolder1_maintable span.u-label.rounded')->first()->each(function ($node) {
//            dump($node->text());
//        });
//        $content = $crawler->filter('span.u-label.rounded')->first()->text();

        // get the default inner page

        return view('pages.general.wallet.wallet')
            ->with('balanceEnergy', $balanceEnergy)
            ->with('balanceEnergyInFiat', $balanceEnergyInFiat)
            ->with('balanceCrypto', $balanceCrypto)
            ->with('balanceCryptoInFiat', $balanceCryptoInFiat)
            ->with('balanceFiat', $balanceFiat)
            ->with('totalBalanceInFiat', $totalBalanceInFiat)
            ->with('transactions', $transactions);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listTransactions(int $page)
    {
        //transaction registries
        $transactions = Transaction::where('user_id', auth()->user()->id)
            ->latest()
            ->skip($page * 5)
            ->take(5)
            ->get();

        foreach ($transactions as $transaction){

            $transaction->type = __($transaction->type);

            $transaction->color = match ($transaction->status) {
                'completed'         => 'success',
                'awaiting-approval' => 'warning',
                'processing'        => 'primary',
                'disapproved'       => 'danger',
                'failed'            => 'danger',
                'ready-to-process'  => 'primary'
            };

            $transaction->status = __($transaction->status);

            $events_marker = '';
            foreach($transaction->events as $event){
                $event_color = $event->movement === 'incoming' ? 'text-success' : 'text-danger';
//                $event_arrow = $event->movement === 'incoming' ? '<span class="mx-1 fs-8">▲</span>' : '<span class="mx-1 fs-8">▼</span>';
                $event_arrow = $event->movement === 'incoming' ? '<span class="mx-1 fs-8">+</span>' : '<span class="mx-1 fs-8">-</span>';
                $event_value = $event->asset === 'fiat' ? 'R$ '.number_format($event->value/100, 2, ',', '.') : number_format($event->value/100).' '.__($event->asset);

                $events_marker.= "<div class='d-inline-flex mx-1 align-items-center $event_color'>
                                    $event_arrow $event_value
                                 </div>";
            }
            $transaction->events_marker = $events_marker;
            $transaction->last_update = $transaction->updated_at->format('d/m/Y H:i');
        }

        return $transactions;
    }

}
