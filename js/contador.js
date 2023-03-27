    var $hora_alarmas = new Array();
    
    let $horas = document.querySelectorAll('.hora_unica');
    
    for (let i = 0; i < $horas.length; i++) {
        $hora_alarmas[i] = $horas[i].innerHTML;
    }

    function contadores(){

        let contador = 0;

        for (let i = 0; i < $hora_alarmas.length; i++) {
            if($hora_alarmas[contador]<new Date().toLocaleTimeString('es-ES')){
                contador ++;
            }
        }

        console.log(new Date().toLocaleTimeString('es-ES'));
        console.log($hora_alarmas[contador]<new Date().toLocaleTimeString('es-ES'));

        return contador;
    }

    var contador = contadores();

    console.log(contador);
    console.log($hora_alarmas[contador]);
    console.log($hora_alarmas[contador]);

    function comparar() {
        for (let i = 0; i < $hora_alarmas.length; i++) {
            if($hora_alarmas[i] == new Date().toLocaleTimeString('es-ES')){
                alert('Alarma sonando');
            }
        }
    }

setInterval(comparar);
