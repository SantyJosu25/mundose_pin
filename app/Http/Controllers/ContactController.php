<?php

namespace App\Http\Controllers;

use App\Mail\SendContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function mostrar()
    {
        $contact = Contact::all();
        return response()->json($contact, 201);
    }

    public function insertar(Request $request)
    {
        try {
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            try {
                Mail::to($request->email)->send(new SendContact($contact));
                $contact->send_email = "Se envio el mail";
            } catch (\exception $e) {
                $contact->send_email = "Fallo el envio del mail {$e->getMessage()}";
            }
            $contact->save();
        } catch (\exception $e) {
            return response()->json("Se genero un error: {$e->getMessage()}", 404);
        }

        return response()->json("Registro agregado con exito {$request->email}", 201);
    }
}
