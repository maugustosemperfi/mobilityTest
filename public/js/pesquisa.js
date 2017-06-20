/**
 * Created by AGST on 16/06/2017.
 */
pesquisa = $('.input-field').find('span');


document.querySelector('#search').addEventListener('input' ,function () {
    setTimeout(function () {
        paradas = $('.pesquisa-parada');

        if(pesquisa.text().length > 0){
            paradas.each(function () {
                parada = $(this).find('a').text().substr(5, $(this).find('a').text().length-1);
                if(!parada.includes(pesquisa.text())){
                    this.classList.add('invisivel');
                }
                else{
                    this.classList.remove('invisivel');
                }
            });
            /**/
        }
        else{
            paradas.each(function () {
                this.classList.remove('invisivel');
            });
        }
    }, 10);

});