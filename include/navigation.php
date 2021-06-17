<!-- Navigation Section -->
<nav id="gnb">
  <h2>
    <a href="/todo/index.php">
      <i class="logo-font">&#1330;</i>
    </a>
  </h2>
  <ul class="navi">
    <li>
      <a href="/todo/index.php">
        <i class="fa fa-trello"></i>
      </a>
      <span class="mid-top"></span>
      <span class="mid-act"></span>
      <span class="mid-back"></span>
      <span class="mid-bottom"></span>
    </li>
    <li>
      <a href="/todo/pages/sp_insert_form.php">
        <i class="fa fa-pencil"></i>
      </a>
      <span class="mid-top"></span>
      <span class="mid-act"></span>
      <span class="mid-back"></span>
      <span class="mid-bottom"></span>
    </li>
    <li>
      <a href="/todo/pages/sp_detail_form.php">
        <i class="fa fa-search"></i>
      </a>
      <span class="mid-top"></span>
      <span class="mid-act"></span>
      <span class="mid-back"></span>
      <span class="mid-bottom"></span>
    </li>
  </ul>
  <a href="#" class="sign-out"><i class="fa fa-sign-out"></i></a>
  <div class="mobile-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <ul class="mobile-menu-items">
    <li><a href="/todo/index.php"><i class="fa fa-trello"></i></a></li>
    <li><a href="/todo/pages/sp_insert_form.php"><i class="fa fa-pencil"></i></a></li>
    <li><a href="/todo/pages/sp_detail_form.php"><i class="fa fa-search"></i></a></li>
    <li><a href="#"><i class="fa fa-sign-out"></i></a></li>
  </ul>
</nav>
<script>
  const navName = window.location.href;
  const navBtns = document.querySelectorAll('.navi li');
  const navElements = ['index', 'insert', 'detail'];
  //console.log(tabBtns);

  for(let i = 0; i < navBtns.length; i++){
    navBtns[i].classList.remove('active');
    if(navName.includes(navElements[i])){
      navBtns[i].classList.add('active');
    }
  }
</script>