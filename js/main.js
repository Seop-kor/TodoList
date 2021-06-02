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

/* each-graph Function */
// let chart = window.chart = new EasyPieChart(document.querySelector('.chart'), {
//   easing: 'easeOutElastic',
//   delay: 3000,
//   barColor: '#69c',
//   trackColor: '#ace',
//   scaleColor: false,
//   lineWidth: 13,
//   trackWidth: 10,
//   lineCap: 'butt',
//   onStep: function(from, to, percent) {
//     this.el.children[0].innerHTML = Math.round(percent);
//   }
// });
function makeChart(sel, barColor, trackColor){
  return new EasyPieChart(document.querySelector(sel + " .chart"), {
    easing: 'easeOutElastic',
    delay: 3000,
    barColor: barColor,
    trackColor: trackColor,
    scaleColor: false,
    lineWidth: 10,
    trackWidth: 8,
    lineCap: 'round',
    size: 180,
    onStep: function(from, to, percent) {
      this.el.children[0].innerHTML = Math.round(percent);
    }
  }); 
}

makeChart(".db", "#7c41f5", "#d4c4f5");
makeChart(".api", "#ff9062", "#ffdbcc");
makeChart(".renewal", "#3acbe8", "#bae0e8");
makeChart(".planning", "#f541da", "#f0c4f5");