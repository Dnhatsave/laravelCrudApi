@extends('Cadastro.App',["current" => "produtos"]) {{-- Criando um paramentro para a view--}} 

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title"> Cadastro de Produtos</h5>
            
        <table class="table table-ordered table-hover" id="tabelaProdutos" >
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>stock</th>
                    <th>preco</th>
                    <th>Categoria</th>
                    <th>Accoes</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
        

    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" onclick="novoProduto()"> Novo Produto</button>
        {{-- <a href="/categorias/novo" class="btn btn-sm btn-success" role="button"> Extrair CSV</a> --}}

    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-produtos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Novo produto</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nome" class="control-lable">Nome do Produto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nome" placeholder="Nome do produto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stock" class="control-lable">Quantidade em stock</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="stock" placeholder="Quantidade em Stock">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="preco" class="control-lable">Preco do Produto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="preco" placeholder="preco do produto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoria_id" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" id="categoria_id">  
                            </select>
                        </div>
                       
                      </div>  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('javascript')
<script type="text/javascript">
    //Inserir o csrf token no cabecalho da requesicao
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
        }

    });
    //Limpar os campos selecionar o botao criar novo produto
    function novoProduto(){
        $('#id').val('');
        $('#nome').val('');
        $('#stock').val('');
        $('#preco').val('');
        $('#categoria_id').val('');
        $('#dlg-produtos').modal('show')
    }
    //Carregar um objecto de categorias e listar a combobox
    function carregarCategorias(){
        $.getJSON('/api/categorias', function(data){
            for (i=0; data.length; i++) {
               opcao = '<option value="' + data[i].id + '">' + 
                        data[i].nome + 
                       '</option>';          
                $('#categoria_id').append(opcao);      
            }
        });
    } 
    //Retornar a lista de produtos em uma tablea
    function montarLinha(p){
        var linha = "<tr>" + 
                    "<td>" + p.id + "</td>" +
                    "<td>" + p.nome + "</td>" +
                    "<td>" + p.stock + "</td>" +
                    "<td>" + p.preco + "</td>" +
                    "<td>" + p.categoria_id + "</td>" +
                    "<td>" +
                       '<button class="btn btn-sm btn-primary" onclick="editarProduto('+ p.id +')"> Editar </button>' +  
                       ' <button class="btn btn-sm btn-danger" onclick="apagarProduto('+ p.id +')"> Apagar </button>' +       
                    "</td>" +
                    "</tr>";

                    return linha;
    }
    //Carregar produtos em json
    function carregarProdutos(){
        $.getJSON('/api/produtos', function(produtos){
            for (i=0;i<produtos.length;i++){
                linha = montarLinha(produtos[i]);
                $("#tabelaProdutos>tbody").append(linha);
            }
        });
    }

    function criarProduto() {
        //Pegar os campos do formulario
        prod = {
                nome: $("#nome").val(),
                stock: $("#stock").val(),
                preco: $("#preco").val(),
                categoria_id: $("#categoria_id").val()
                };
        //Registar os produtos na BD
        $.post("/api/produtos", prod, function(data){
           //Converter para json e listar produtos
          produto = JSON.parse(data); 
          linha = montarLinha(produto);
          $("#tabelaProdutos>tbody").append(linha);        
          
          });        
    }

//Actualizar produtos
function editarProduto(id){
        $.getJSON('/api/produtos/'+id, function(data){
            
             $('#id').val(data.id);
             $('#nome').val(data.nome);
             $('#stock').val(data.stock);
             $('#preco').val(data.preco);
             $('#categoria_id').val(data.categoria_id);
             $('#dlg-produtos').modal('show');
        });
    }

    function actualizarProduto(){
        //Pegar os campos do formulario
        prod = {
                id: $("#id").val(),
                nome: $("#nome").val(),
                stock: $("#stock").val(),
                preco: $("#preco").val(),
                categoria_id: $("#categoria_id").val()
                };

            $.ajax({
            type: "PUT",
            url: "/api/produtos/" + prod.id,
            context: this,
            data: prod,
            success: function(data){
                prod = JSON.parse(data); //Converter para JSON
                linhas = $("#tabelaProdutos>tbody>tr"); //pegar as alineas da tabela
                //pegar o id do produto removido na celula da tabela
                e = linhas.filter(function(i, elemento){ 
                    return elemento.cells[0].textContent == prod.id;
                    });

                    if(e){
                        e[0].cells[0].textContent = prod.id;
                        e[0].cells[1].textContent = prod.nome;
                        e[0].cells[2].textContent = prod.stock;
                        e[0].cells[3].textContent = prod.preco;
                        e[0].cells[4].textContent = prod.categoria_id;

                    }

                console.log("Actualizado com sucesso");       
            },
            error:function(error){
                console.log(error);
            }
        });

    }

   

    //Apagar produtos
    function apagarProduto(id){
        $.ajax({
            type: "DELETE",
            url: "api/produtos/" + id,
            context: this,
            success: function(){
                console.log("Produto removido com sucesso");
                linhas = $("#tabelaProdutos>tbody>tr"); //pegar as alineas da tabela
                //pegar o id do produto removido na celula da tabela
                e = linhas.filter(function(i, elemento){ 
                    return elemento.cells[0].textContent == id;
                    });
                    if(e) //Caso o id nao seja nulo remova
                    e.remove();
            },
            error:function(error){
                console.log(error);

            }
        });
    }

    
   //Bloquear o refresh da pagina durante o clique do butao no formulario
    $("#formProduto").submit( function(event){ 
        event.preventDefault();
        if($("#id").val() != ''){
            actualizarProduto();
        }
        else{
            criarProduto();
        }
        //Esconder o modal
        $("#dlg-produtos").modal('hide');
    });
    //Chamada das funcoes 

    $(function(){
        carregarCategorias();
        carregarProdutos();
    });
</script>    
@endsection
