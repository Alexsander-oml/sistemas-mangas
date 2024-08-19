<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Mangas</title>
</head>

<body>
  <h1>Lista de Mangas</h1>

  @if (session('success'))
  <p style="color: green;">{{ session('success') }}</p>
  @endif

  <a href="{{ route('mangas.create') }}">Adicionar Novo Manga</a>

  <table border="1">
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