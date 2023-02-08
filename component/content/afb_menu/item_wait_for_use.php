<div class="container_title">
    <h5>รายการขอซื้อที่รอใช้งาน - List Ask For Buy</h5>
    <div class="button-add-afb" >
        <a href="mspo_display.php?menu=afb_select_menu">ย้อนกลับ</a>
    </div>
</div>
<style>
    #set-con {
        margin: 20px;
    }
    #list-item-container{
        margin: 10px;
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
<div id="list-item-container">
<?php include 'function/item_afb.php' ?>
<br>
<div class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
      <div class="page-item">
        <a class="page-link <?php echo $page == $i ? 'active' : ''; ?>" href="mspo_display.php?menu=item_wait_for_use&page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </div>
    <?php endfor; ?>
  </div>
</div>
</div>