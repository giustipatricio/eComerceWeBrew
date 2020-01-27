const button = document.querySelectorAll('#trash');
const popup = document.querySelector(".popup-wraper")
const close = document.querySelector(".popup-close")
const buttons = Array.from(button)
const popups = Array.from(popup)

console.log(popups)


buttons.forEach( boton => {
  boton.addEventListener('click' , () => (
    popup.style.display = 'block'
  )
  )
});


close.addEventListener('click' , () => (
  popup.style.display = 'none'
)
)

popup.addEventListener('click' , () => (
  popup.style.display = 'none'
)
)
