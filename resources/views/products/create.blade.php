<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
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

        .error-list {
            background: #ffebee;
            border-left: 4px solid #f44336;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 25px;
        }

        .error-list ul {
            list-style: none;
        }

        .error-list li {
            color: #c62828;
            padding: 5px 0;
            font-size: 0.9rem;
        }

        .error-list li:before {
            content: "⚠️ ";
            margin-right: 8px;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
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
        }

        .btn-cancel:hover {
            background: #e0e0e0;
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
                <h1>➕ Criar Produto</h1>
                <p class="subtitle">Preencha os campos abaixo para cadastrar um novo produto</p>
            </div>

            @if ($errors->any())
                <div class="error-list">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/products" method="POST"> 
                @csrf 

                <div class="form-group">
                    <label for="name">Nome do Produto</label>
                    <input type="text" id="name" name="name" placeholder="Digite o nome do produto" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="price">Preço (R$)</label>
                    <input type="text" id="price" name="price" placeholder="0,00" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" placeholder="Descreva o produto...">{{ old('description') }}</textarea>
                </div>

                <div class="button-group">
                    <a href="/products" class="btn-cancel">❌ Cancelar</a>
                    <button type="submit" class="btn-submit">✔️ Salvar Produto</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
