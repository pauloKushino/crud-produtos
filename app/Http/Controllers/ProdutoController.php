<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $query = Produto::query();

        // Verifica se há parâmetros de pesquisa
        if ($request->has('filter_type') && $request->has('search')) {
            $filterType = $request->input('filter_type');
            $search = $request->input('search');

            // Aplica o filtro com base no tipo selecionado
            if ($filterType === 'id' && is_numeric($search)) {
                $query->where('id', $search);
            } elseif ($filterType === 'nome') {
                $query->where('nome', 'like', "%{$search}%");
            }
        }

        if ($request->has('order_by')) {
            $query->orderBy($request->input('order_by'), 'asc');
        }

        $produtos = $query->paginate(10); // Paginação com 10 itens por página

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string|max:1000',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string|max:1000',
        ]);

        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
