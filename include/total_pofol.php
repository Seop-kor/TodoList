<div class="total-pofol">
  <div class="total-chart">
    <span class="chart" data-percent="89">
      <span class="percent"></span>
      <!-- <h3>Total Process Rate</h3> -->
    </span>
  </div>
  <div class="total-txt">
    <h3>Total Process Rate</h3>
    <p><!--Your process rate is very low...<br> Plz Hurry Up!!!!!--></p>
    <button onclick="modalOpen();">Update Rate</button>
  </div>
</div>

<div class="total-modal-wrapper">
  <div class="total-modal">
    <div class="modal-close" onclick="modalClose();"><span>&times;</span></div>
    <div class="modal-content">
      <form action="/todo/php/sp_total_pofol_action.php" method="post" class="rate-form" name="rateForm">
        <p>
          <label for="db_pro">DB Project</label>
          <input type="text" id="db_pro" value="78" name="db_pro">
        </p>
        <p>
          <label for="api_pro">API Project</label>
          <input type="text" id="api_pro" value="60" name="api_pro">
        </p>
        <p>
          <label for="renewal_pro">Renewal Project</label>
          <input type="text" id="renewal_pro" value="43" name="renewal_pro">
        </p>
        <p>
          <label for="planning_pro">Planning Project</label>
          <input type="text" id="planning_pro" value="89" name="planning_pro">
        </p>
      </form>
    </div>
    <div class="modal-footer">
      <div class="btns">
        <div class="modal-send-btn"><button type="button">변경</button></div>
        <div class="modal-close-btn"><button type="button" onclick="modalClose();">취소</button></div>
      </div>
    </div>
  </div>
</div>