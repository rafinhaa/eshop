var Checkout = function(){

    var calculoFreteCheckout = function(){
        $(".checkout-cep").focusout(function (){
            var inputValue = $('.checkout-cep').val();
            $.ajax({
                type: 'POST',
                url: url + 'checkout/calculaFreteCheckout',
                data: {cep:inputValue},
                dataType: 'json'
            }).then(function(response){
                if(response['cServico']['erro'] == 0){
                    var newItem = '<li>SEDEX<span>'+response['cServico']['Valor']+'</span></li>'; 
                    $(newItem).insertBefore('.last');  
                    var newItem2 = '<li>ENTREGA<span>'+ response['cServico']['PrazoEntrega'] +' dias úteis</span></li>'; 
                    $(newItem2).insertBefore('.last');   
                    var newvalue =  parseFloat(response['cServico']['Valor'].substring(3).replace(",", "."));
                    var total = newvalue+totalValue;
                    $('.TotalFin').html('R$ ' + total.toFixed(2).toString().replace(".", ","));                                        
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

    var setSessionIdPagseguro = function(){
        $.ajax({            
            url: url + 'pagar/pg_session_id',            
            dataType: 'json',
            success: function(res){
                PagSeguroDirectPayment.setSessionId(res.id_sessao);
            }, 
            error: function(res){
                alert('error');
            }
        })
    }
    
    return {
        init: function(){
            formataPagamentoCheckout();
            calculoFreteCheckout();
            setSessionIdPagseguro();
        }
    }

}();

jQuery(document).ready(function(){
    Checkout.init();
});