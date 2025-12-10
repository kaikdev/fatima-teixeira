<?php

namespace App\Http\Controllers;
use App\Mail\LeadMail;
use Illuminate\Support\Facades\Mail;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use App\Models\Leads;

class LeadSubmitController extends Controller
{

    public function submit(Request $request) {

        $request->validate([
            'nome' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'checkbox' => 'accepted',
        ]);

        $leads = Leads::create([
            'page_url' => $_SERVER['HTTP_REFERER'],
            'name' => $request->nome,
            'phone' =>  $request->whatsapp,
        ]);

        $dados = [
            'url' => $_SERVER['HTTP_REFERER'],
            'nome' => $request->nome,
            'whatsapp' => $request->whatsapp
        ];

        if($leads)
            Mail::to('web@engenhodeimagens.com.br')->send(new LeadMail($dados));
            // Mail::to(getItem('email-client'))->send(new LeadMail($dados));

            ToastMagic::success('Lead enviado com sucesso!');

            return redirect()->back();
    }
}
