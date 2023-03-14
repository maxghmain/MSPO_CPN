<?php
session_start();
include 'php/connect_db.php'
?>
<style>
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
<div class="container_title">
    <h5>จำนวนวัสดุคงเหลือ - Total Items</h5>
</div>
<div class="container_box1">
    <div class="container_box_h1">
        <div class="bg-item">
            <div class="tbl_item">
                <div style="margin:auto;text-align:left;width:100%;">
                    <!--ส่วนสร้างฟอร์ม สำหรับค้นหา -->
                    <table>
                        <form action="" method="POST">
                            <tr>
                                <td style="border:none;">
                                    รายการวัสดุในคลัง (STORE)
                                </td>
                                <td style="border:none;">
                                    ค้นหา <input type="search" id="name-po" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" />
                                </td>

                                <td style="border:none;display:flex;">
                                    ประเภทวัสดุ <select style="width:150px;" name="type_material">
                                        <option value="">ทุกประเภท</option>
                                        <option value="1">ประเภทซ่อมบำรุง</option>
                                        <option value="2">ประเภทไฟฟ้า</option>
                                        <option value="3">ประเภทสารเคมี</option>
                                        <option value="4">ประเภทเครื่องทำความเย็น</option>
                                        <option value="5">ประเภทงานประปา</option>
                                        <option value="6">ประเภทเฉพาะงาน</option>
                                        <option value="7">ประเภทงานทั่วไป</option>
                                        <option value="8">ประเภทอื่นๆ</option>
                                    </select>
                                </td>

                                <td style="border:none;">
                                    <button class="myBtn" id="search-po-butt" name="search">ค้นหา</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                    <table style="border:none;">
                        <tr>
                            <td align="left" style="border:none;">
                                <table width="100%" border="1" cellspacing="0" cellpadding="2" style="border-collapse:collapse;">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อวัสดุ</th>
                                        <th>จำนวน</th>
                                        <th>หน่วยนับ</th>
                                        <th>ประเภท</th>
                                        <th>เก็บไว้ชั้นที่</th>
                                    </tr>
                                    <?php
                                      $limit = 10; // number of items to show per page
                                      $page = isset($_GET['page']) ? $_GET['page'] : 1; // current page
                                      $offset = ($page - 1) * $limit;
                                      $counst = ($offset + 1);
                                     if (isset($_POST['search'])) {
                                        $keyword = $_POST['keyword'];
                                        $type_material = $_POST['type_material'];
                                     
                                        $where = [];
                                        if (!empty($keyword)) {
                                            $where[] = "material_name LIKE '%$keyword%'";
                                        }
                                        if(!empty($type_material)){
                                            $where[] = "material_type_name LIKE '%$type_material%'";
                                        }
                                       
    
                                        $where_clause = '';
                                        if (!empty($where)) {
                                            $where_clause = ' WHERE ' . implode(' AND ', $where);
                                        }
    
                                        $sql = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
                                        INNER JOIN material_type_tbl as b
                                        ON a.material_type_id = b.material_type_id
                                        INNER JOIN unit_tbl as c
                                        ON a.unit_id = c.unit_id 
                                        INNER JOIN material_class_shelf_tbl as d
                                        ON a.material_class_shelf_id = d.material_class_shelf_id" . $where_clause . " LIMIT  $offset, $limit";
    
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        $sql = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
                                        INNER JOIN material_type_tbl as b
                                        ON a.material_type_id = b.material_type_id
                                        INNER JOIN unit_tbl as c
                                        ON a.unit_id = c.unit_id 
                                        INNER JOIN material_class_shelf_tbl as d
                                        ON a.material_class_shelf_id = d.material_class_shelf_id LIMIT  $offset, $limit";
                                        $result = mysqli_query($conn, $sql);
                                        
                                    }
                                    while ($search = mysqli_fetch_array($result)) {

                                    
                                    ?>
                                        <tr>
                                            <td height="20">&nbsp;<?= $counst ?></td>
                                            <td height="20">&nbsp;<?= $search['material_name'] ?></td>
                                            <td height="20">&nbsp;<?= $search['material_value'] ?></td>
                                            <td height="20">&nbsp;<?= $search['unit_name'] ?></td>
                                            <td height="20">&nbsp;<?= $search['material_type_name'] ?></td>
                                            <td height="20">&nbsp;<?= $search['material_class_shelf_name'] ?></td>
                                        </tr>
                                    <?php
                                        $counst++;
                                    }
                                    $total_sql = "SELECT COUNT(*) as total FROM material_tbl as a
                                        INNER JOIN material_type_tbl as b
                                        ON a.material_type_id = b.material_type_id
                                        INNER JOIN unit_tbl as c
                                        ON a.unit_id = c.unit_id 
                                        INNER JOIN material_class_shelf_tbl as d
                                        ON a.material_class_shelf_id = d.material_class_shelf_id";
                                    $total_result = mysqli_query($conn, $total_sql);
                                    $total_row = mysqli_fetch_array($total_result);
                                    $total_items = $total_row['total'];
                                    $total_pages = ceil($total_items / $limit);

                                    // Create the pagination links
                                    $pagination = "";
                                    if ($total_pages > 1) {
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            if ($i == $page) {
                                                $pagination .= "<strong>$i</strong>";
                                            } else {
                                                $pagination .= "<a href=mspo_display.php?menu=total_items&page=$i'>$i</a>";
                                            }
                                        }
                                    }
                                    ?>

                                </table>
                                <div class="pagination">
                                    <?php if ($total_pages > 1) : ?>
                                        <div class="page-item">
                                            <a class="page-link" href="mspo_display.php?menu=total_items&page=1">First</a>
                                        </div>
                                        <?php
                                        $start_page = max(1, $page - 2);
                                        $end_page = min($total_pages, $page + 2);
                                        for ($i = $start_page; $i <= $end_page; $i++) :
                                        ?>
                                            <div class="page-item">
                                                <a class="page-link <?php echo $page == $i ? 'active' : ''; ?>" href="mspo_display.php?menu=total_items&page=<?php echo $i; ?>">
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
                                                <a class="page-link" href="mspo_display.php?menu=total_items&page=<?php echo $total_pages; ?>">Last</a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <br />

                            </td>
                        </tr>
                        <tr>
                            <td align="left" style="border:none;">



                            </td>
                        </tr>
                        </thead>
                        <br>
                        <?php
                        $sql = "SELECT material_id as material_id_a ,material_name ,material_value ,unit_name ,a.material_type_id,material_type_name,material_class_shelf_name FROM material_tbl as a
                        INNER JOIN material_type_tbl as b
                        ON a.material_type_id = b.material_type_id
                        INNER JOIN unit_tbl as c
                        ON a.unit_id = c.unit_id 
                        INNER JOIN material_class_shelf_tbl as d
                        ON a.material_class_shelf_id = d.material_class_shelf_id";
                        $result = mysqli_query($conn,$sql);
                        $row55 = mysqli_num_rows($result); ?>
                        <div ><span>จำนวนรายการทั้งหมด : <strong> <?php echo $row55 ?> </strong>รายการ</span></div>
                        <tfoot>


                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>