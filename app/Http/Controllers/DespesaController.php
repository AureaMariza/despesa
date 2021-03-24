<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespesaAlteracaoRequest;
use App\Http\Requests\DespesaRequest;
use App\Models\Despesa;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Storage;

class DespesaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despesa = Despesa::all();
        return view('despesa', ['despesas' => $despesa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        return view('despesa-form', ['users' => $usuarios, 'despesa' => new Despesa()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DespesaRequest $request)
    {
        $nomeArquivo = $this->upload($request);
        $despesa = new Despesa($request->all());
        $despesa->anexo = $nomeArquivo;
        $despesa->save();
        return redirect()->route('despesa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function show(Despesa $despesa)
    {
        $usuarios = User::all();
        return view('despesa-form', ['users' => $usuarios , 'despesa' => $despesa, 'pode_alterar' => false]);
    }

    /**s
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesa $despesa)
    {
        $usuarios = User::all();
        return view('despesa-form', [
            'users' => $usuarios ,
            'despesa' => $despesa,
            'pode_alterar' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DespesaAlteracaoRequest  $request
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function update(DespesaAlteracaoRequest $request, Despesa $despesa)
    {
        $nomeAnexoAntigo = $despesa->anexo;
        if ($request->has('anexo') && $request->file('anexo')->isValid()) {
            $nomeAnexo = $this->upload($request);
        }

        $despesa->fill($request->all());
        $despesa->anexo = $nomeAnexo ?? $nomeAnexoAntigo;
        $despesa->save();

        if (empty($nomeAnexo)) {
            Storage::delete($nomeAnexoAntigo);
        }

        return redirect()->route('despesa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despesa $despesa)
    {
        $despesa->delete();
        return redirect()->route('despesa.index');
    }

    private function upload(Request $request)
    {
        $nomeAnexo = microtime(true) . $request->file('anexo')->getExtension();
        $request->file('anexo')->move(public_path('anexos'), $nomeAnexo);
        return 'anexos/' . $nomeAnexo;
    }
}
