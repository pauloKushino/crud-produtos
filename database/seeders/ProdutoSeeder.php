<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            ['nome' => 'Plutonita', 'preco' => 0.25, 'descricao' => 'Chiclete ácido'],
            ['nome' => 'Coca-Cola', 'preco' => 5.00, 'descricao' => 'Refrigerante'],
            ['nome' => 'Fanta', 'preco' => 4.50, 'descricao' => 'Refrigerante de laranja'],
            ['nome' => 'Doritos', 'preco' => 7.00, 'descricao' => 'Salgadinho de milho'],
            ['nome' => 'Ruffles', 'preco' => 6.50, 'descricao' => 'Batata frita'],
            ['nome' => 'KitKat', 'preco' => 3.50, 'descricao' => 'Chocolate com wafer'],
            ['nome' => 'Snickers', 'preco' => 4.00, 'descricao' => 'Chocolate com amendoim'],
            ['nome' => 'Oreo', 'preco' => 2.50, 'descricao' => 'Biscoito recheado'],
            ['nome' => 'Leite Ninho', 'preco' => 12.00, 'descricao' => 'Leite em pó'],
            ['nome' => 'Nutella', 'preco' => 15.00, 'descricao' => 'Creme de avelã'],
            ['nome' => 'Toddy', 'preco' => 8.00, 'descricao' => 'Achocolatado em pó'],
            ['nome' => 'Nescau', 'preco' => 7.50, 'descricao' => 'Achocolatado em pó'],
            ['nome' => 'Cheetos', 'preco' => 5.50, 'descricao' => 'Salgadinho de queijo'],
            ['nome' => 'Bala de Goma', 'preco' => 1.50, 'descricao' => 'Bala macia'],
            ['nome' => 'Trident', 'preco' => 2.00, 'descricao' => 'Chiclete sem açúcar'],
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
