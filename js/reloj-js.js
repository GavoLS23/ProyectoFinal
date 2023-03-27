



function refDigit(arg){
    return arg < 10 ? '0' + arg : '' + arg;
}


let hours = document.getElementById('hours'),
minutes = document.getElementById('minutes'),
seconds = document.getElementById('seconds'),
ampm = document.getElementById('ampm'),
cirf = document.querySelector('circle').getAttribute('cx') * 2 * 22 / 7;

const cHours = hours.parentNode.querySelector('circle:nth-child(2)'),
cMinnutes = minutes.parentNode.querySelector('circle:nth-child(2)'),
cSeconds = seconds.parentNode.querySelector('circle:nth-child(2)');

const dotHours = hours.parentNode.querySelector('.dot'),
dotMinutes = minutes.parentNode.querySelector('.dot'),
dotSeconds = seconds.parentNode.querySelector('.dot');

function getTimeAndShow(){
    let h = new Date().getHours(),
    m = new Date().getMinutes(),
    s = new Date().getSeconds(),
    am = h <= 12 ? 'AM':'PM';
    h = h<=12 ? h : h-12;
    
    hours.innerHTML = refDigit(h) + "<br><span>Horas</span>";
    cHours.style.strokeDashoffset = cirf - (cirf / 12 * refDigit(h));
    dotHours.style.transform = `rotate(${360 * refDigit(h) / 12}deg)`;

    minutes.innerHTML = refDigit(m) + "<br><span>Minutos</span>";
    cMinnutes.style.strokeDashoffset = cirf - (cirf / 60 * refDigit(m));
    dotMinutes.style.transform = `rotate(${360 * refDigit(m) / 60}deg)`;

    seconds.innerHTML = refDigit(s) + "<br><span>Segundos</span>";
    cSeconds.style.strokeDashoffset = cirf - (cirf / 60 * refDigit(s));
    dotSeconds.style.transform = `rotate(${360 * refDigit(s) / 60}deg)`;
    
    ampm.innerHTML = am;
}

function tamas() {
  let $pantalla = screen.width;

  console.log($pantalla);

  if ($pantalla < 502) {
    let radios = document.querySelectorAll('circle');

    radios.forEach((rad) => {
      rad.setAttribute("r", "45");
      rad.setAttribute("cy", "45");
      rad.setAttribute("cx", "45");
    });
  }
  cirf = document.querySelector('circle').getAttribute('cx') * 2 * 22 / 7;
}


setInterval(getTimeAndShow);

function emergencia(){
  alert('Alarma sonando!');
}

window.onresize = tamas();
window.onload = tamas();