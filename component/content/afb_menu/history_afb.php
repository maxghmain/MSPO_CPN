<div class="container_title">
  <h5>ประวัติใบขอซื้อ - History Ask For By</h5>
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
  }

  .page-item {
    display: inline-block;
    margin: 0 10px;
  }

  .page-link {
    padding: 8px 16px;
    background-color: #ddd;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .page-link.active {
    background-color: #555;
    color: #fff;
  }
</style>

<div id="set-con">
  <div id="container-afb-box">
    <div class="margin-box">
      <?php include 'function/select_afb_show_log.php'; ?>
    </div>
  </div>


  <div class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
      <div class="page-item">
        <a class="page-link <?php echo $page == $i ? 'active' : ''; ?>" href="mspo_display.php?menu=history_afb&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </div>
    <?php endfor; ?>
  </div>
</div>