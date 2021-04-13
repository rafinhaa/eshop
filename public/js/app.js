var App = function(){

    var calcularFreteCarrinho = function(){
        $('.btn-calcular-frete-carrinho').on('click', function (){
            var inputValue = $('.cep').val();
            var totalValue = parseFloat($('.SubTotalFin').text().substring(3).replace(",", "."));
            $.ajax({
                type: 'POST',
                url: url + 'carrinho/calculaFreteCarrinho',
                data: {cep:inputValue},
                dataType: 'json'
            }).then(function(response){
                if(response['cServico']['erro'] == 0){
                    var newItem = '<li>SEDEX<span>'+response['cServico']['Valor']+ ' - Entrega: '+ response['cServico']['PrazoEntrega'] +' dias úteis</span></li>'; 
                    $('.calculoDeCEP').append(newItem);
                    var newvalue = response['cServico']['Valor'].replace(".", ",");
                    var newItem2 = '<li class="last">Total + Frete<span>'+(newvalue+totalValue)+'</span></li>'; 
                    $('.calculoDeCEP').append(newItem2);                    
                }else{
                    var newItem = '<li>'+response.msg+'</li>';
                    $('.calculoDeCEP').append(newItem);
                }
            }, function(){
                var newItem = '<li>Erro ao consultar o CEP</li>';
                $('.last').append(newItem);
            });
        });
    }

    var calcularFreteCEP = function(){
        $('.btn-calcular-frete-produto').on('click', function (){
            var id_produto = $(this).attr('data-field');
            var inputValue = $('.cep').val();
            $.ajax({
                type: 'POST',
                url: url + 'ajax/calcularFrete',
                data: {id:id_produto,cep:inputValue},
                dataType: 'json'
            }).then(function(response){
                $('.calculoDeCEP').html('');
                if(response['cServico']['erro'] == 0){
                    var newItem = '<li>SEDEX<span>'+response['cServico']['Valor']+ ' - Entrega: '+ response['cServico']['PrazoEntrega'] +' dias úteis</span></li>'; 
                    $('.calculoDeCEP').append(newItem);
                }else{
                    var newItem = '<li>'+response.msg+'</li>';
                    $('.calculoDeCEP').append(newItem);
                }
            }, function(){
                var newItem = '<li>Erro ao consultar o CEP</li>';
                $('.calculoDeCEP').append(newItem);
            });
        });
    }
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
                    $('.sub-total'+id_produto).html(response.totalProduto);                    
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
            calcularFreteCEP();
            calcularFreteCarrinho();
        }
    }

}();

jQuery(document).ready(function(){
    App.init();
});