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
let lWidth = 10;
let tWidth = 8;
const winWidth = window.innerWidth;


if(winWidth <= 950){
  lWidth = 5;
  tWidth = 4;
}else {
  lWidth = 10;
  tWidth = 8;
}


let chart = window.chart = new EasyPieChart(document.querySelector('.total-chart .chart'), {
  easing: 'easeOutElastic',
  delay: 3000,
  barColor: '#7c41f5',
  trackColor: '#d4c4f5',
  scaleColor: false,
  lineWidth: 18,
  trackWidth: 18,
  lineCap: 'butt',
  size: 200,
  onStep: function(from, to, percent) {
    this.el.children[0].innerHTML = Math.round(percent);
  }
});

const poData = [
  {sel: '.db' , barColor: "#7c41f5", trackColor: "#d4c4f5"},
  {sel: '.api' , barColor: "#ff9062", trackColor: "#ffdbcc"},
  {sel: '.renewal' , barColor: "#3acbe8", trackColor: "#bae0e8"},
  {sel: '.planning' , barColor: "#f541da", trackColor: "#f0c4f5"}
  // {sel: '.total-chart', barColor: "#f541da", trackColor: "#f0c4f5"}
];

function makeChart(){
  poData.map((item) => {
    return new EasyPieChart(document.querySelector(item.sel + " .chart"), {
      easing: 'easeOutElastic',
      delay: 3000,
      barColor: item.barColor,
      trackColor: item.trackColor,
      scaleColor: false,
      lineWidth: lWidth,
      trackWidth: tWidth,
      lineCap: 'round',
      onStep: function(from, to, percent) {
        this.el.children[0].innerHTML = Math.round(percent);
      }
    }); 
  });
}
makeChart();