<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $categories = [
        1 => '商品について',
        2 => '返品・交換について',
        3 => 'その他',
    ];

        $contact = [
        'last_name'   => $request->input('last_name'),
        'first_name'  => $request->input('first_name'),
        'gender'      => $request->input('gender'),
        'email'       => $request->input('email'),
        'tel'         => $tel,
        'address'     => $request->input('address'),
        'building'    => $request->input('building'),
        'category_id' => $request->input('category_id'),
        'detail'      => $request->input('detail'),
        ];
        if ($request->has('action') && $request->input('action') === 'back') {
        return redirect('/')
            ->withInput();
        }
        
        return view('confirm', [
            'contact' => $contact,
            'categories' => $categories,
        ]);
    }

    public function store(ContactRequest $request)
    {
        if ($request->has('back')) {
            return redirect('/')->withInput();
        }
        
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        Contact::create([
        'last_name'   => $request->input('last_name'),
        'first_name'  => $request->input('first_name'),
        'gender'      => $request->input('gender'),
        'email'       => $request->input('email'),
        'tel'         => $tel,
        'address'     => $request->input('address'),
        'building'    => $request->input('building'),
        'category_id' => $request->input('category_id'),
        'detail'      => $request->input('detail'),
    ]);

        return redirect('/thanks');
    }
}