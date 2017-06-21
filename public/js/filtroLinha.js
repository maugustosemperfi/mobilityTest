/**
 * Created by AGST on 21/06/2017.
 */
$('#btn-filtrolinha').click(function () {
    $('.filtro-paradas').empty();
    $.get('/paradasPorLinha/'+$('.filtro-linha').val(), function (data) {
        data.forEach(function (parada) {
            $('.parada').each(function () {
                regex = /cod.[^]+/;
                if(regex.exec($(this).attr('href')) == "codParada="+parada.cp){
                    link = this.outerHTML;
                    $('.filtro-paradas').append($('<li>').append(link));
                }
            }, parada)
        })
    })
})