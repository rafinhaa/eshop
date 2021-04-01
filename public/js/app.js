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
                    alert(response.msg); 
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