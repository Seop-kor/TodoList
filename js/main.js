const detailText = document.querySelectorAll(".detail-text p a");
detailText.forEach((item) => {
  if(item.textContent.length > 20){
    item.textContent = item.textContent.slice(0, 20) + "...";
  }
});