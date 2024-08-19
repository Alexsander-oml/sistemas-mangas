<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Manga</title>
</head>

<body>
  <h1>Adicionar Novo Manga</h1>

  @if ($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
      <li style="color: red;">{{ $error }}</li>
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