// Contents Text Slice
const detailText = document.querySelectorAll(".detail-text p a");
detailText.forEach((item) => {
  if (item.textContent.length > 20) {
    item.textContent = item.textContent.slice(0, 20) + "...";
  }
});

// Mobile Menu Rotate
const mobileMenu = document.querySelector(".mobile-menu");
mobileMenu.addEventListener("click", () => {
  mobileMenu.classList.toggle("active");
});

/* each-graph Function */
let lWidth = 10;
let tWidth = 8;
let pieSize = 200;
let eachPieSize = 100;
let clearSet;
let eachClearSet;
const winWidth = window.innerWidth;
const poData = [
  { sel: ".db", barColor: "#7c41f5", trackColor: "#d4c4f5" },
  { sel: ".api", barColor: "#ff9062", trackColor: "#ffdbcc" },
  { sel: ".renewal", barColor: "#3acbe8", trackColor: "#bae0e8" },
  { sel: ".planning", barColor: "#f541da", trackColor: "#f0c4f5" }
];

// 밑에 total 원이 여기임
if (winWidth <= 400) {
  pieSize = 130;
} else if (winWidth <= 950) {
  pieSize = 150;
} else if (winWidth <= 1280) {
  pieSize = 170;
} else {
  pieSize = 200;
}

// each 그래프부분이 여기임.
if (winWidth <= 950) {
  lWidth = 5;
  tWidth = 4;
} else {
  lWidth = 10;
  tWidth = 8;
}

if (winWidth <= 950) {
  eachPieSize = 80;
} else if (winWidth <= 1280) {
  eachPieSize = 90;
} else {
  eachPieSize = 110;
}

const makechart = function(obj, lWidth, tWidth, pieSize, lineCap="butt"){
  return new EasyPieChart(document.querySelector(obj.sel + " .chart"), {
    easing: "easeOutElastic",
    delay: 3000,
    barColor: obj.barColor,
    trackColor: obj.trackColor,
    scaleColor: false,
    lineWidth: lWidth,
    trackWidth: tWidth,
    lineCap: lineCap,
    size: pieSize,
    onStep: function (from, to, percent) {
      this.el.children[0].innerHTML = Math.round(percent);
    },
  });
}

function startPie(){
  document.querySelector(".total-chart .chart canvas") && document.querySelector(".total-chart .chart canvas").remove();
  makechart({sel: ".total-chart", barColor: "#7c41f5", trackColor: "#d4c4f5"}, 18, 18, pieSize);
  document.querySelectorAll(".each-graph > div .chart canvas").forEach((item) => item.remove());
  poData.map((item) => {
    makechart(item, lWidth, tWidth, eachPieSize, "round");
  });
}

function inner(a, b){
  a.innerHTML = b;
}

function fetchHTML(json){
  // const charts = document.querySelectorAll(".each-graph .chart");
  // const modalValue = document.querySelectorAll(".rate-form input");
  const charts = document.querySelector(".each-graph");
  const modalValue = document.querySelector(".rate-form");
  const dbRate = Number(json.db_rate);
  const apiRate = Number(json.api_rate);
  const renewalRate = Number(json.renew_rate);
  const planningRate = Number(json.plan_rate);
  const rateAvg = (dbRate * 0.4) + (apiRate * 0.2) + (renewalRate * 0.1) + (planningRate * 0.3);
  if(rateAvg >= 80){
    document.querySelector(".total-txt p").innerHTML = `Your process rate is very nice!!<br>Good!! Go Home!`;
  }else if(rateAvg >= 50){
    document.querySelector(".total-txt p").innerHTML = `Your process rate is not bad..<br>More! More!!`;
  }else if(rateAvg >= 20){
    document.querySelector(".total-txt p").innerHTML = `Your process rate is very low...<br>Plz Hurry Up!!!!!`;
  }else {
    document.querySelector(".total-txt p").innerHTML = `Oh My god..<br>Your process rate is very very low...`;
  }
  inner(charts, `<div class="db">
  <span class="chart" data-percent="${dbRate}">
    <span class="percent"></span>
  </span>
  <b>DB Project</b>
  <i class="fa fa-database"></i>
</div>
<div class="api">
  <span class="chart" data-percent="${apiRate}">
    <span class="percent"></span>
  </span>
  <b>API Project</b>
  <i class="fa fa-thermometer-half"></i>
</div>
<div class="renewal">
  <span class="chart" data-percent="${renewalRate}">
    <span class="percent"></span>
  </span>
  <b>Renewal Project</b>
  <i class="fa fa-clone"></i>
</div>
<div class="planning">
  <span class="chart" data-percent="${planningRate}">
    <span class="percent"></span>
  </span>
  <b>Planning Project</b>
  <i class="fa fa-bar-chart-o"></i>
</div>`);
  inner(modalValue, `<p>
  <label for="db_pro">DB Project</label>
  <input type="text" id="db_pro" value="${dbRate}" name="db_pro">
</p>
<p>
  <label for="api_pro">API Project</label>
  <input type="text" id="api_pro" value="${apiRate}" name="api_pro">
</p>
<p>
  <label for="renewal_pro">Renewal Project</label>
  <input type="text" id="renewal_pro" value="${renewalRate}" name="renewal_pro">
</p>
<p>
  <label for="planning_pro">Planning Project</label>
  <input type="text" id="planning_pro" value="${planningRate}" name="planning_pro">
</p>`);
  document.querySelector(".total-chart .chart").dataset.percent = rateAvg;
}

async function pieChartXmlResponse() {
  const filexml = new XMLHttpRequest();
  // filexml.open("GET", "/todo/data/tp_rate.json",false);
  filexml.open("GET", "/todo/php/read_json.php",false);
  filexml.send();
  const json = JSON.parse(filexml.responseText);
  // charts[0].dataset.percent = json[0].db_rate;
  // charts[1].dataset.percent = json[0].api_rate;
  // charts[2].dataset.percent = json[0].renew_rate;
  // charts[3].dataset.percent = json[0].plan_rate;
  // modalValue[0].value = json[0].db_rate;
  // modalValue[1].value = json[0].api_rate;
  // modalValue[2].value = json[0].renew_rate;
  // modalValue[3].value = json[0].plan_rate;
  await fetchHTML(json[0]);
  startPie();
}

const pieChartXml = new XMLHttpRequest();
pieChartXml.addEventListener("load", pieChartXmlResponse);
pieChartXml.open("GET", "http://localhost/todo/php/sp_easypiechart_action.php");
pieChartXml.send();

window.addEventListener("resize", () => {
  const reWinWidth = window.innerWidth;
  if (reWinWidth <= 400) {
    pieSize = 130;
  } else if (reWinWidth <= 950) {
    pieSize = 150;
  } else if (reWinWidth <= 1280) {
    pieSize = 170;
  } else {
    pieSize = 200;
  }

  clearTimeout(clearSet); //멈추면 실행 멈춰!! 멈멈춰춰!!!
  clearSet = setTimeout(function () {
    // document.querySelector(".total-chart .chart").style.height = pieSize;
    document.querySelector(".total-chart .chart canvas").remove();
    makechart({sel: ".total-chart", barColor: "#7c41f5", trackColor: "#d4c4f5"}, 18, 18, pieSize);
  }, 150);
});

window.addEventListener("resize", () => {
  const reWinWidth = window.innerWidth;
  if (reWinWidth <= 950) {
    lWidth = 5;
    tWidth = 4;
  } else {
    lWidth = 10;
    tWidth = 8;
  }

  if (reWinWidth <= 950) {
    eachPieSize = 80;
  } else if (reWinWidth <= 1280) {
    eachPieSize = 90;
  } else {
    eachPieSize = 110;
  }

  clearTimeout(eachClearSet); //멈추면 실행 멈춰!! 멈멈춰춰!!!
  eachClearSet = setTimeout(function () {
    document
      .querySelectorAll(".each-graph > div .chart canvas")
      .forEach((item) => item.remove());
    poData.map((item) => {
      makechart(item, lWidth, tWidth, eachPieSize, "round");
    });
  }, 150);
});


// Each-btns button JS
const btns = document.querySelectorAll(".each-btns button");
function xmlreq() {
  const json = JSON.parse(this.responseText);
  let text = "";
  json.forEach((item) => {
    text += `
    <li>
      <i class='fa fa-${item.tp_categori}'></i>
      <div class='detail-text'>
        <p><a href='#'>${item.tp_title}</a></p>
        <em>${item.tp_reg}</em>
      </div>
    </li>
    `;
  });
  document.querySelector(".each-contents .update-details").innerHTML = text;
}
const xmlr = new XMLHttpRequest();
xmlr.addEventListener("load", xmlreq);
xmlr.open(
  "GET",
  "http://localhost/todo/php/sp_database_categori_action.php?categori=database"
);
xmlr.send();
btns.forEach(function (item) {
  item.addEventListener("click", function (e) {
    const categori = e.target.dataset.categori;
    const xmlr = new XMLHttpRequest();
    xmlr.addEventListener("load", xmlreq);
    xmlr.open(
      "GET",
      "http://localhost/todo/php/sp_database_categori_action.php?categori=" +
        categori
    );
    xmlr.send();
  });
});

// Modal Js
const modalSendBtn = document.querySelector(".modal-send-btn");

function modalOpen() {
  document.querySelector(".total-modal-wrapper").style.display = "flex";
}
function modalClose() {
  document.querySelector(".total-modal-wrapper").style.display = "none";
}

window.onclick = (e) => {
  const total = document.querySelector(".total-modal-wrapper");
  if (e.target === total) {
    total.style.display = "none";
  }
};

modalSendBtn.addEventListener("click", () => {
  const doc = document.rateForm;
  if (!doc.db_pro.value) {
    alert("값을 입력해주세요.");
    doc.db_pro.focus();
    return;
  }
  if (doc.db_pro.value > 100 || doc.db_pro.value < 0) {
    alert("값이 정상적이지 않습니다.");
    doc.db_pro.focus();
    return;
  }
  if (!doc.api_pro.value) {
    alert("값을 입력해주세요.");
    doc.api_pro.focus();
    return;
  }
  if (doc.api_pro.value > 100 || doc.api_pro.value < 0) {
    alert("값이 정상적이지 않습니다.");
    doc.api_pro.focus();
    return;
  }
  if (!doc.renewal_pro.value) {
    alert("값을 입력해주세요.");
    doc.renewal_pro.focus();
    return;
  }
  if (doc.renewal_pro.value > 100 || doc.renewal_pro.value < 0) {
    alert("값이 정상적이지 않습니다.");
    doc.renewal_pro.focus();
    return;
  }
  if (!doc.planning_pro.value) {
    alert("값을 입력해주세요.");
    doc.planning_pro.focus();
    return;
  }
  if (doc.planning_pro.value > 100 || doc.planning_pro.value < 0) {
    alert("값이 정상적이지 않습니다.");
    doc.planning_pro.focus();
    return;
  }
  doc.submit();
});

// Detail php
function filter(){
  const a = this.dataset.categori;
  const boardContents = document.querySelectorAll(".board-contents span:nth-child(2)");
  boardContents.forEach((item) => {
    item.parentElement.style.display = "flex";
    if(item.textContent != a && a != "All"){
      item.parentElement.style.display = "none";
    }
  });
}
document.querySelectorAll(".board-btns button").forEach((item) => {
  item.addEventListener('click', filter);
});

function detailDelete(){
  
}