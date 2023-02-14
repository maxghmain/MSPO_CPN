<div class="container_title">
  <h5>ใบขอซื้อที่รอใช้งาน - State Ask For Buy</h5>
  <div class="button-add-afb">
    <a href="mspo_display.php?menu=afb_add_afb">เพิ่มใบขอซื้อ</a>
  </div>
</div>
<style>
  #set-con {
    margin: 20px;
    border-radius: 20px;
  }

  .margin-box {

    display: flex;
  }

  #container-afb-box {
    height: 60vh;
  }

  .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  .pagination .page-item {
    margin: 0 10px;
  }

  .pagination .page-link {
    color: #333;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    transition: all 0.3s ease-in-out;
  }

  .pagination .page-link:hover,
  .pagination .page-link:focus {
    background-color: #f2f2f2;
    outline: none;
  }

  .pagination .page-link.active {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }
</style>

<div id="set-con">
  <div id="container-afb-box">
    <div class="margin-box">
      <?php include 'function/selectShowOderAFBstate.php'; ?>
    </div>
  </div>

<br><br><br>
<div class="pagination">
    <?php if ($total_pages > 1) : ?>
      <div class="page-item">
        <a class="page-link" href="mspo_display.php?menu=state_afb&page=1">First</a>
      </div>
      <?php
      $start_page = max(1, $page - 2);
      $end_page = min($total_pages, $page + 2);
      for ($i = $start_page; $i <= $end_page; $i++) :
      ?>
        <div class="page-item">
          <a class="page-link <?php echo $page == $i ? 'active' : ''; ?>" href="mspo_display.php?menu=state_afb&page=<?php echo $i; ?>">
            <?php echo $i; ?>
          </a>
        </div>
      <?php endfor; ?>
      <?php if ($page < $total_pages - 2) : ?>
        <div class="page-item">
          <span class="page-link">&hellip;</span>
        </div>
      <?php endif; ?>
      <?php if ($page < $total_pages - 1) : ?>
        <div class="page-item">
          <a class="page-link" href="mspo_display.php?menu=state_afb&page=<?php echo $total_pages; ?>">Last</a>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>

</div>