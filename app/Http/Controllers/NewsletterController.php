<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    //
    public function __invoke(Newsletter $newsletter)
    {
        ddd($newsletter);
        request()->validate([
            'email' => ['required', 'email'],
        ]);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Este email no puede ser agregado a nuestro newsletter.',
            ]);
        }

        return redirect('/')->with('success', 'Ahora, estás inscrito en nuestro newsletter!');
    }
}
