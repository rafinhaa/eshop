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
                    //$('.TotalFin').html('R$ ' + total.toFixed(2).toString().replace(".", ","));                                        
                    $('.total-checkout').html('Alo galeraaaaa');                                        
                }else{
                    var newItem = '<li>'+response.msg+'</li>';
                    $('.checkout-list').append(newItem);
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
                        $('.btn-checkout').addClass( "btn-cartao");                        
                        break;
                case '2': 
                        $('.pagamento-cartao').addClass('d-none');
                        $('.pagamento-boleto').removeClass('d-none');
                        $('.pagamento-transferencia').addClass('d-none');
                        $('.pagamento-cartao input').prop('disabled',true);
                        $('.btn-checkout').addClass( "btn-boleto");
                        break;
                case '3': 
                        $('.pagamento-cartao').addClass('d-none');
                        $('.pagamento-boleto').addClass('d-none');
                        $('.pagamento-transferencia').removeClass('d-none');
                        $('.pagamento-cartao input').prop('disabled',true);
                        $('.btn-checkout').addClass( "btn-transferencia");
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
                //alert('error');
            }
        })
    }
    
    var pagarBoleto = function(){
        $('.btn-boleto').on('click', function (){            
            //var hash__pagamento = PagSeguroDirectPayment.getSenderHash();
            var hash__pagamento = 'ASDASDASDASDASD';
            $('.erros_validacao').html('');
            $('[name="hash"]').val(hash__pagamento);
            var form = $('.form-checkout');
            var erro_validacao = false;
            var retorno_erro_validacao = '';

            $(form).find('select, input').each(function(){
                if($(this).prop('required') && $(this).prop('disabled') == false){
                    if(!$(this).val()){
                        erro_validacao = true;
                        var nome_campo = $(this).attr('placeholder');
                        retorno_erro_validacao += '<p>' + nome_campo + ' é um campo obrigatório</p>';

                    }
                }
            });

            if(!erro_validacao){
                $.ajax({
                    type: 'POST',
                    url: url + 'pagar/pg_boleto',
                    data: form.serialize(),
                    dataType: 'json',
                    beforeSend: function(){
                        $('.status-checkout').html('Aguarde...');
                    },
                    success: function(res){
                        if(res.erro=0){
                            $('.status-checkout').html('Pagamento Aprovado!');
                        }else{
                            $('.erros_validacao').html('<div class="alert alert-danger"><p>'+ res.msg +'</p></div>');
                        }                        
                    }, 
                    error: function (){
                        $('.status-checkout').html('Falha ao processar o pagamento, consulte a operadora do cartão');
                    }
                });
            } else {
                $('.erros_validacao').html('<div class="alert alert-danger"><p>'+ retorno_erro_validacao +'</p></div>');
            }           
            
        });
    }

    var pagarCartao = function(){
        $('.btn-cartao').on('click', function (){
            alert('cartao');
        });
    } 
    var pagarTransferencia = function(){
        $('.btn-transferencia').on('click', function (){
            alert('transferencia');
        });
    }

    return {
        init: function(){
            formataPagamentoCheckout();
            calculoFreteCheckout();
            setSessionIdPagseguro();
            pagarBoleto();
            pagarCartao();
            pagarTransferencia();
        }
    }

}();

jQuery(document).ready(function(){
    Checkout.init();
});