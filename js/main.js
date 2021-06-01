// Contents Text Slice
const detailText = document.querySelectorAll(".detail-text p a");
detailText.forEach((item) => {
  if(item.textContent.length > 20){
    item.textContent = item.textContent.slice(0, 20) + "...";
  }
});

// Mobile Menu Rotate
const mobileMenu = document.querySelector(".mobile-menu");
mobileMenu.addEventListener('click', () => {
  mobileMenu.classList.toggle("active");
});