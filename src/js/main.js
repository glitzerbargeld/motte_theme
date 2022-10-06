/*Navbar Show/Hide*/
const menu = document.querySelector('.menu');
const menupoints = document.querySelectorAll('.nav-point');

menu.addEventListener('click', () => {
    menu.classList.toggle("change");
    document.querySelector(".navbar").classList.toggle("change");
});

menupoints.forEach(function(elem) {
    elem.addEventListener("click", () => {
        menu.classList.toggle("change");
        document.querySelector(".navbar").classList.toggle("change");
    });
});

/*Scroll Function*/


const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    openModal(modal)
  })
})

overlay.addEventListener('click', () => {
  const modals = document.querySelectorAll('.modal.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal')
    closeModal(modal)
  })
})

function openModal(modal) {
  if (modal == null) return
  modal.classList.add('active')
  overlay.classList.add('active')
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  overlay.classList.remove('active')
}

/*Sticky Navbar*/

window.addEventListener("scroll", function() {
  let navbar = document.getElementById("nav");
  navbar.classList.toggle("sticky", window.scrollY > 0);
})