var App = function(){

    var addProdutoCarrinho = function(){
        $('.btn-add-produto-cart').on('click', function (){
            var id_produto = $(this).attr('data-id');
            alert(id_produto);
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