const a = document.querySelector('.paralax')
const b = document.querySelector('.contenido-paralax')

window.addEventListener('scroll',()=>{
    let scroll = document.documentElement.scrollTop + 100
    let hg = a.getBoundingClientRect().height
    if(scroll <= hg){
      let auxHg = hg-scroll;
      let op = (auxHg /hg)
      b.style.opacity = op;
    }



});