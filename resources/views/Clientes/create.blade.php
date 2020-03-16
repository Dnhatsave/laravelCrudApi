<h3>Criar Novo Cliente</h3>
<form action="{{ route('cliente.store') }}" method="POST"> 
    @csrf
    <input type="text" name="nome"/> <br>
    <button type="submit">Salvar</button>
</form>