<?php

namespace App\Http\Controllers;

use App\Models\LugarTuristico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LugarTuristicoController extends Controller
{
    public function index(): View
    {
        return view('lugares.index', [
            'lugares' => LugarTuristico::all(),
            'categorias' => LugarTuristico::categories(),
        ]);
    }

    public function show(string $slug): View
    {
        $lugar = LugarTuristico::find($slug);

        abort_if($lugar === null, 404);

        return view('lugares.show', [
            'lugar' => $lugar,
        ]);
    }

    public function contact(Request $request, string $slug): RedirectResponse
    {
        $lugar = LugarTuristico::find($slug);

        abort_if($lugar === null, 404);

        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:120'],
            'mensaje' => ['required', 'string', 'min:10', 'max:500'],
        ]);

        LugarTuristico::storeContact($slug, $data);

        return redirect()
            ->route('lugares.show', $slug)
            ->with('status', "Solicitud enviada para {$lugar['titulo']}. Te contactaremos pronto.");
    }
}
