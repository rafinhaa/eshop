var Checkout = function(){

    var calculoFreteCheckout = function(){
        $(".cep").focusout(function (){
            alert("Check");
        });
    }
    
    var formataPagamentoCheckout = function(){
        $('.select-option-checkout').on('click', function (){
            var tipo = $(".select-option-checkout:checked").val();

            switch(tipo){
                case '1': 
                        $('.pagamento-cartao').removeClass('d-none');
                        $('.pagamento-boleto').addClass('d-none');
                        $('.pagamento-transferencia').addClass('d-none');
                        $('.pagamento-cartao input').prop('disabled',false);
                        break;
                case '2': 
                        $('.pagamento-cartao').addClass('d-none');
                        $('.pagamento-boleto').removeClass('d-none');
                        $('.pagamento-transferencia').addClass('d-none');
                        $('.pagamento-cartao input').prop('disabled',true);
                        break;
                case '3': 
                        $('.pagamento-cartao').addClass('d-none');
                        $('.pagamento-boleto').addClass('d-none');
                        $('.pagamento-transferencia').removeClass('d-none');
                        $('.pagamento-cartao input').prop('disabled',true);
                        break;

            }            
        });
    }
    
    return {
        init: function(){
            formataPagamentoCheckout();
            calculoFreteCheckout();
        }
    }

}();

jQuery(document).ready(function(){
    Checkout.init();
});