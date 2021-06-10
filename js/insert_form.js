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
  makechart({sel: ".total-chart", barColor: "#7c41f5", trackColor: "#d4c4f5"}, lWidth, tWidth, pieSize);
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
  filexml.open("GET", "/todo/php/read_json.php",false);
  filexml.send();
  const json = JSON.parse(filexml.responseText);
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
  } else if (reWinWidth <= 950 && reWinWidth > 768) {
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

// Each-btns button JS
const btns = document.querySelectorAll(".each-btns button");
function xmlreq() {
  document.querySelector(".each-contents .update-details").innerHTML =
    this.responseText;
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
  if (doc.planning_pro.value < 100 || doc.planning_pro.value < 0) {
    alert("값이 정상적이지 않습니다.");
    doc.planning_pro.focus();
    return;
  }
  doc.submit();
});