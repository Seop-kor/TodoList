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

window.addEventListener('resize', () => {
  const reWinWidth = window.innerWidth;
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
});

// Each-btns button JS
const btns = document.querySelectorAll(".each-btns button");
function xmlreq() {
  console.log(this.responseText);
  document.querySelector(".each-contents .update-details").innerHTML = this.responseText;
}
const xmlr = new XMLHttpRequest();
xmlr.addEventListener('load', xmlreq);
xmlr.open("GET", "http://localhost/todo/php/sp_database_categori_action.php?categori=database");
xmlr.send();
btns.forEach(function(item) {
  item.addEventListener('click', function(e) {
    const categori = e.target.dataset.categori;
    console.log(categori);
    const xmlr = new XMLHttpRequest();
    xmlr.addEventListener('load', xmlreq);
    xmlr.open("GET", "http://localhost/todo/php/sp_database_categori_action.php?categori="+categori);
    xmlr.send();
  });
});


// Modal Js
function modalOpen() {
  document.querySelector(".total-modal-wrapper").style.display = "flex";
}
function modalClose() {
  document.querySelector(".total-modal-wrapper").style.display = "none";
}

window.onclick = (e) => {
  const total = document.querySelector(".total-modal-wrapper");
  if(e.target === total){
    total.style.display = "none";
  }
}