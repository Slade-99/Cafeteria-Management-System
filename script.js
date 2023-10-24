const wrapper = document.querySelector('.wrapper');
const loginlink = document.querySelector('.login-link');
const btnPopup = document.querySelector('.btnlogin-popup');

loginlink.addEventListener('click', () => {
       wrapper.classList.add('active');
});
btnPopup.addEventListener('click',()=> {
      wrapper.classList.add('active.popup');
})