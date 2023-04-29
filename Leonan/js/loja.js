let btn = document.querySelector(".nav")
let cat = document.querySelector(".categorias")
let lista = document.querySelectorAll('li')

btn.addEventListener("click", () => {
    cat.classList.toggle('hide');
    
    let direction = cat.classList.contains('hide') ? -1 : 1;
    
    if (direction === 1) {
      for (let i = 1; i < lista.length; i++) {
        setTimeout(() => {
          lista[i].classList.remove('hidden');
        }, i * 15);
      }
    } else {
      for (let i = lista.length - 1; i >= 0; i--) {
        setTimeout(() => {
          lista[i].classList.add('hidden');
        }, (lista.length - i - 1) * 15);
      }
    }


  });


  