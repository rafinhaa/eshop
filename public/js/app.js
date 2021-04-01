var App = function(){

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
                    '<li>'+
                        '<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>'+
                        '<a class="cart-img" href="#"><img src="'+ url + 'upload/produtos/' + response.item['foto'] +'" alt="#"></a>'+
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
        }
    }

}();

jQuery(document).ready(function(){
    App.init();
});