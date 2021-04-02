var App = function(){

    var alterProdutoCarrinho = function(){
        $('.btn-plus').on('click', function (){
            var id_produto = $(this).attr('data-field');
            var inputName = 'input[name='+id_produto+']';
            var valor = $(inputName).val();
            $.ajax({
                type: 'POST',
                url: url + 'carrinho/alterar',
                data: {id:id_produto,value:valor},
                dataType: 'json'
            }).then(function(response){
                if(response.erro == 0){
                    $('.sub-total').html(response.totalProduto);                    
                    $('.PesoFin').html(response.peso);
                    $('.TotalFin').html(response.total);
                    $('.SubTotalFin').html(response.total);
                }else{
                    alert(response.msg);
                }
            }, function(){
                alert('Erro ao remover');
            });
        });

        $('.btn-minus').on('click', function (){
            var id_produto = $(this).attr('data-field');
            var inputName = 'input[name='+id_produto+']';
            var valor = $(inputName).val();
            $.ajax({
                type: 'POST',
                url: url + 'carrinho/alterar',
                data: {id:id_produto,value:valor},
                dataType: 'json'
            }).then(function(response){
                if(response.erro == 0){
                    $('.sub-total').html(response.totalProduto);                    
                    $('.PesoFin').html(response.peso);
                    $('.TotalFin').html(response.total);
                    $('.SubTotalFin').html(response.total);
                }else{
                    alert(response.msg);
                }
            }, function(){
                alert('Erro ao remover');
            });
        });
    }

    var delProdutoCarrinho = function(){
        $('.remove').on('click', function (){
            var id_produto = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: url + 'carrinho/apagar',
                data: {id:id_produto},
                dataType: 'json'
            }).then(function(response){
                if(response.erro == 0){
                    $('.itemCart'+id_produto).remove();
                    $('.total-count').html(response.count);
                    $('.countItens').html(response.count + ' ITENS');
                    $('.total-amount').html(response.total);
                }else{
                    alert(response.msg);
                }
            }, function(){
                alert('Erro ao remover');
            });
        });
    }

    var delProdutoCarrinhoFin = function(){
        $('.removeCarrinhoFin').on('click', function (){
            var id_produto = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: url + 'carrinho/apagar',
                data: {id:id_produto},
                dataType: 'json'
            }).then(function(response){
                if(response.erro == 0){
                    $('.itemCartFin'+id_produto).remove();
                    $('.PesoFin').html(response.peso);
                    $('.TotalFin').html(response.total);
                    $('.SubTotalFin').html(response.total);
                }else{
                    alert(response.msg);
                }
            }, function(){
                alert('Erro ao remover');
            });
        });
    }

    var addProdutoCarrinho = function(){
        $('.btn-add-produto-cart').on('click', function (){
            var id_produto = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: url + 'carrinho/adicionar',
                data: {id:id_produto},
                dataType: 'json'
            }).then(function(response){
                if(response.erro == 0){
                    $('.total-count').html(response.count);
                    $('.countItens').html(response.count + ' ITENS');
                    $('.total-amount').html(response.total);
                    var newItem = 
                    '<li class="itemCart' + response.item['id'] +'">'+
                        '<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>'+
                        '<a class="cart-img" href="'+ url + '/produto/' + response.item['meta_link'] +'"><img src="'+ url + 'upload/produtos/' + response.item['foto'] +'" alt="#"></a>'+
                        '<h4><a href="">'+ response.item['nome'] +'</a></h4>'+
                        '<p class="quantity">1x - <span class="amount">'+ response.item['valor'] +'</span></p>'+
                    '</li>';     
                    $('.shopping-list').append(newItem);
                }else{
                    alert(response.msg);
                }
            }, function(){
                alert('Erro ao cadastrar');
            });
        });
    }
    return {
        init: function(){
            addProdutoCarrinho();
            delProdutoCarrinho();
            delProdutoCarrinhoFin();
            alterProdutoCarrinho();
        }
    }

}();

jQuery(document).ready(function(){
    App.init();
});