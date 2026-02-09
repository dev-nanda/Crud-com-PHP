<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            color: #667eea;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .btn-create {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .product-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: #667eea;
            margin-bottom: 15px;
        }

        .product-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
            min-height: 50px;
        }

        .product-actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit {
            flex: 1;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background: #45a049;
            transform: scale(1.02);
        }

        .btn-delete {
            flex: 1;
            background: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-delete:hover {
            background: #da190b;
            transform: scale(1.02);
        }

        .empty-state {
            background: white;
            padding: 60px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .empty-state h2 {
            color: #999;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 20px;
            }

            h1 {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📦 Lista de Produtos</h1>
            <a href="/products/create" class="btn-create">+ Criar Novo Produto</a>
        </div>

        @if($products->isEmpty())
            <div class="empty-state">
                <h2>Nenhum produto cadastrado ainda</h2>
                <p>Clique no botão acima para criar seu primeiro produto!</p>
            </div>
        @else
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-price">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                        <div class="product-description">{{ $product->description }}</div>
                        
                        <div class="product-actions">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                ✏️ Editar
                            </a>
                            
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="flex: 1;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Tem certeza que deseja deletar este produto?')">
                                    🗑️ Deletar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
