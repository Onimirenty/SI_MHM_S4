function loginSign()
{

  const wrapper = document.querySelector(".wrapper"),
  signupHeader = document.querySelector(".signup header"),
  loginHeader = document.querySelector(".login header");
  
  loginHeader.addEventListener("click", () => {
    wrapper.classList.add("active");
  });
  signupHeader.addEventListener("click", () => {
    wrapper.classList.remove("active");
  });
}

function toggleMenu() {
  var menu = document.querySelector('.path');
  menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
}

function display_component(className) {
  var component = document.querySelector('.' + className);
  component.style.display = component.style.display === 'none' ? 'block' : 'none';
}
