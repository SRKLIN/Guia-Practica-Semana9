<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\Transaccion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransaccionController extends Controller
{
    /**
     * Muestra el formulario de nueva transacción.
     * {comercio} llega ya convertido en instancia del modelo.
     */
    public function create(Comercio $comercio): View
    {
        return view('transacciones.create', compact('comercio'));
    }

    /**
     * Guarda la transacción y vuelve al comercio con un mensaje.
     *
     * only() toma solo esos 3 campos: si alguien inyecta un "estado"
     * desde el navegador, se ignora. Con all() sí habría pasado.
     *
     * Se redirige en lugar de devolver la vista para que F5 no duplique.
     */
    public function store(Request $request): RedirectResponse
    {
        $transaccion = Transaccion::create($request->only([
            'comercio_id', 'cliente_nombre', 'monto',
        ]));

        return redirect()
            ->route('comercios.show', $transaccion->comercio_id)
            ->with('mensaje', 'Transacción registrada con éxito.');
    }
}
