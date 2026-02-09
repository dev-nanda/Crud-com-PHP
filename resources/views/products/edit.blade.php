<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 600px;
            width: 100%;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }

        h1 {
            color: #667eea;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #999;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-submit {
            flex: 1;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.6);
        }

        .btn-cancel {
            flex: 1;
            background: #f5f5f5;
            color: #666;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background: #e0e0e0;
        }

        .product-info {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .product-info p {
            color: #666;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .form-card {
                padding: 30px 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-card">
            <div class="form-header">
                <h1>✏️ Editar Produto</h1>
                <p class="subtitle">Atualize as informações do produto abaixo</p>
            </div>

            <div class="product-info">
                <p>📦 Editando: <strong>{{ $product->name }}</strong></p>
            </div>

            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nome do Produto</label>
                    <input 
                        type="text"
                        id="name"
                        name="name" 
                        value="{{ $product->name }}" 
                        placeholder="Nome do produto">
                </div>

                <div class="form-group">
                    <label for="price">Preço (R$)</label>
                    <input 
                        type="text"
                        id="price"
                        name="price" 
                        value="{{ $product->price }}" 
                        placeholder="Preço">
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea 
                        id="description"
                        name="description" 
                        placeholder="Descrição">{{ $product->description }}</textarea>
                </div>

                <div class="button-group">
                    <a href="/products" class="btn-cancel">❌ Cancelar</a>
                    <button type="submit" class="btn-submit">✔️ Atualizar Produto</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
