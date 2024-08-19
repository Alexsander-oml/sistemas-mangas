<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Mangas</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #330066;
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
      margin-bottom: 20px;
      font-size: 2.5em;
      text-align: center;
      color: #FFD700;
      animation: fadeIn 1.5s ease;
    }

    a {
      color: #FFD700;
      text-decoration: none;
      background-color: #660099;
      padding: 10px 20px;
      border-radius: 8px;
      transition: background-color 0.3s ease, color 0.3s ease;
      border: 2px solid #FFD700;
    }

    a:hover {
      background-color: #550088;
      color: #FFD700;
    }

    table {
      width: 100%;
      max-width: 800px;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #4B0082;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      animation: fadeIn 1.5s ease;
    }

    th,
    td {
      padding: 12px 15px;
      text-align: center;
      color: #FFD700;
    }

    th {
      background-color: #5e2b85;
      font-weight: bold;
    }

    td {
      background-color: #660099;
    }

    tr:hover td {
      background-color: #550088;
    }

    button {
      background-color: #e74c3c;
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #c0392b;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <h1>Lista de Mangas</h1>

  @if (session('success'))
  <p style="color: #00FF00;">{{ session('success') }}</p>
  @endif

  <a href="{{ route('mangas.create') }}">Adicionar Novo Manga</a>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Preço</th>
        <th>Disponibilidade</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($mangas as $manga)
      <tr>
        <td>{{ $manga->id }}</td>
        <td>{{ $manga->nome }}</td>
        <td>{{ $manga->categoria }}</td>
        <td>{{ $manga->preco }}</td>
        <td>{{ $manga->disponibilidade }}</td>
        <td>
          <form action="{{ route('mangas.destroy', $manga->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>