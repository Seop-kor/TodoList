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
let pieSize = 200;
let eachPieSize = 100;
let clearSet;
let eachClearSet;

// 밑에 total 원이 여기임
if(winWidth <= 400){
  pieSize = 130;
}else if(winWidth <= 950 && winWidth > 768){
  pieSize = 150;
}else if(winWidth <= 1280) {
  pieSize = 170;
}else {
  pieSize = 200;
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
  size: pieSize,
  onStep: function(from, to, percent) {
    this.el.children[0].innerHTML = Math.round(percent);
  }
});

// let que = [];

window.addEventListener('resize', () => {
  const reWinWidth = window.innerWidth;
  // if(reWinWidth <= 1280){
  //   // que.unshift(150);
  //   pieSize = 180;
  // }else {
  //   // que.unshift(200);
  //   pieSize = 200;
  // }
  if(reWinWidth <= 400){
    pieSize = 130;
  }else if(reWinWidth <= 950 && reWinWidth > 768){
    pieSize = 150;
  }else if(reWinWidth <= 1280) {
    pieSize = 170;
  }else {
    pieSize = 200;
  }

  clearTimeout(clearSet); //멈추면 실행 멈춰!! 멈멈춰춰!!!
  clearSet = setTimeout(function() {
    document.querySelector(".total-chart .chart").style.height = pieSize;
    document.querySelector(".total-chart .chart canvas").remove();
    new EasyPieChart(document.querySelector('.total-chart .chart'), {
      easing: 'easeOutElastic',
      delay: 3000,
      barColor: '#7c41f5',
      trackColor: '#d4c4f5',
      scaleColor: false,
      lineWidth: 18,
      trackWidth: 18,
      lineCap: 'butt',
      size: pieSize,
      onStep: function(from, to, percent) {
        this.el.children[0].innerHTML = Math.round(percent);
      }
    });
  }, 150);
  // if(que[0] === que[1]){
  //   return;
  // }
  // document.querySelector(".total-chart .chart canvas").remove();
  // let chart = window.chart = new EasyPieChart(document.querySelector('.total-chart .chart'), {
  //   easing: 'easeOutElastic',
  //   delay: 3000,
  //   barColor: '#7c41f5',
  //   trackColor: '#d4c4f5',
  //   scaleColor: false,
  //   lineWidth: 18,
  //   trackWidth: 18,
  //   lineCap: 'butt',
  //   size: que[0],
  //   onStep: function(from, to, percent) {
  //     this.el.children[0].innerHTML = Math.round(percent);
  //   }
  // });
});

// each 그래프부분이 여기임.
if(winWidth <= 950){
  lWidth = 5;
  tWidth = 4;
}else {
  lWidth = 10;
  tWidth = 8;
}

if(winWidth <= 950){
  eachPieSize = 80;
}
else if(winWidth <= 1280){
  eachPieSize = 90;
}else {
  eachPieSize = 110;
}

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
      size: eachPieSize,
      onStep: function(from, to, percent) {
        this.el.children[0].innerHTML = Math.round(percent);
      }
    });
  });
}
makeChart();

window.addEventListener('resize', () => {
  const reWinWidth = window.innerWidth;
  if(reWinWidth <= 950){
    lWidth = 5;
    tWidth = 4;
  }else {
    lWidth = 10;
    tWidth = 8;
  }

  if(reWinWidth <= 950){
    eachPieSize = 80;
  }
  else if(reWinWidth <= 1280){
    eachPieSize = 90;
  }else {
    eachPieSize = 110;
  }

  clearTimeout(eachClearSet); //멈추면 실행 멈춰!! 멈멈춰춰!!!
  eachClearSet = setTimeout(function() {
    document.querySelectorAll(".each-graph > div .chart canvas").forEach(item => item.remove());
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
        size: eachPieSize,
        onStep: function(from, to, percent) {
          this.el.children[0].innerHTML = Math.round(percent);
        }
      });
    });
  }, 150);
});