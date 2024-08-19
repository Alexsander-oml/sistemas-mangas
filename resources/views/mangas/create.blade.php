<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Manga</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #32024c, #6a0dad);
      color: #fff;
      margin: 0;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    h1 {
      font-size: 3em;
      margin-bottom: 20px;
      color: #ffdf00;
      text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
      animation: glow 1.5s infinite;
    }

    @keyframes glow {
      0% {
        text-shadow: 0 0 5px #ffdf00, 0 0 10px #ffdf00, 0 0 20px #ffdf00, 0 0 40px #ff00ff, 0 0 70px #ff00ff, 0 0 80px #ff00ff, 0 0 100px #ff00ff, 0 0 150px #ff00ff;
      }

      100% {
        text-shadow: 0 0 10px #ffdf00, 0 0 20px #ffdf00, 0 0 30px #ff00ff, 0 0 50px #ff00ff, 0 0 80px #ff00ff, 0 0 90px #ff00ff, 0 0 120px #ff00ff, 0 0 200px #ff00ff;
      }
    }

    form {
      background-color: rgba(50, 2, 76, 0.9);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 600px;
      transition: transform 0.3s ease;
    }

    form:hover {
      transform: translateY(-5px);
    }

    div {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #ffdf00;
    }

    input,
    select {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: none;
      background-color: #3e1a63;
      color: #fff;
      font-size: 1em;
      transition: background-color 0.3s ease;
    }

    input:focus,
    select:focus {
      background-color: #290c40;
      outline: none;
    }

    button {
      background: linear-gradient(135deg, #ff00ff, #8e44ad);
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 1.1em;
      cursor: pointer;
      transition: background 0.3s ease;
      width: 100%;
    }

    button:hover {
      background: linear-gradient(135deg, #9b59b6, #ff00ff);
    }

    a {
      display: inline-block;
      margin-top: 20px;
      color: #ffdf00;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #ffffff;
    }

    ul {
      padding-left: 20px;
      color: #e74c3c;
    }

    ul li {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>
  <h1>Adicionar Novo Manga</h1>

  @if ($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('mangas.store') }}" method="POST">
    @csrf
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" required>
    </div>
    <div>
      <label for="categoria">Categoria:</label>
      <input type="text" name="categoria" id="categoria" required>
    </div>
    <div>
      <label for="preco">Preço:</label>
      <input type="number" step="0.01" name="preco" id="preco" required>
    </div>
    <div>
      <label for="disponibilidade">Disponibilidade:</label>
      <select name="disponibilidade" id="disponibilidade" required>
        <option value="em_estoque">Em Estoque</option>
        <option value="esgotado">Esgotado</option>
        <option value="sob_encomenda">Sob Encomenda</option>
      </select>
    </div>
    <button type="submit">Adicionar</button>
  </form>

  <a href="{{ route('mangas.index') }}">Voltar para Lista</a>
</body>

</html>