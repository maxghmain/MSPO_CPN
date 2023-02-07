DROP DATABASE mspo_db;
CREATE DATABASE IF NOT EXISTS mspo_db COLLATE utf8mb4_unicode_ci DEFAULT CHARSET UTF8MB4;
USE mspo_db;

CREATE TABLE IF NOT EXISTS userlv_tbl(
    userlv_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userlv_name VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci,
    userlv_comment VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS prefix_tbl(
    prefix_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prefix_name VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS group_tbl(
    group_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    group_name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci,
    group_detail VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS depart_tbl(
    depart_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    depart_name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci,
    depart_comment VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci,
    group_id INT NOT NULL,
    FOREIGN KEY(group_id) REFERENCES group_tbl(group_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS  rank_tbl(
    rank_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rank_name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci,
    rank_detail VARCHAR(150) NULL COLLATE utf8mb4_unicode_ci,
    depart_id INT NOT NULL,
    FOREIGN KEY(depart_id) REFERENCES depart_tbl(depart_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS userdata_tbl(
    userdata_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userdata_fname VARCHAR(50) NULL COLLATE utf8mb4_unicode_ci,
    userdata_lname VARCHAR(50) NULL COLLATE utf8mb4_unicode_ci,
    userdata_birtday DATE NULL COLLATE utf8mb4_unicode_ci,
    userdata_age INT NULL,
    rank_id INT NOT NULL,
    prefix_id INT NOT NULL,
    FOREIGN KEY(rank_id) REFERENCES rank_tbl(rank_id),
    FOREIGN KEY(prefix_id) REFERENCES prefix_tbl(prefix_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS user_tbl(
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(40) NOT NULL COLLATE utf8mb4_unicode_ci,
    user_password VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    userdata_id INT NOT NULL,
    userlv_id INT NOT NULL,
    FOREIGN KEY(userdata_id) REFERENCES userdata_tbl(userdata_id),
    FOREIGN KEY(userlv_id) REFERENCES userlv_tbl(userlv_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS province_tbl(
    province_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    province_name_th VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    province_name_eng VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS district_tbl(
    district_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    district_name_th VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    district_name_eng VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci,
    province_id INT NOT NULL,
    FOREIGN KEY(province_id) REFERENCES province_tbl(province_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS sub_district_tbl(
    sub_district_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sub_district_name_th VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    sub_district_name_eng VARCHAR(100) NULL,
    sub_district_post_code INT(10) NOT NULL COLLATE utf8mb4_unicode_ci,
    district_id INT NOT NULL,
    FOREIGN KEY(district_id) REFERENCES district_tbl(district_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS comp_contect_tbl( 
    comp_contect_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    comp_contect_name VARCHAR(150) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_loca_num VARCHAR(10) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_loca_moo VARCHAR(3) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_loca_road VARCHAR(30) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_loca_s_district VARCHAR(30) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_loca_district VARCHAR(30) NULL COLLATE  utf8mb4_unicode_ci,
    comp_contect_loca_prov VARCHAR(30) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_loca_codepost INT NULL,
    comp_contect_tel VARCHAR(15) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_fex VARCHAR(15) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_people_name VARCHAR(150) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS type_po_tbl(
    type_po_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type_po_name VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci,
    type_po_comment VARCHAR(150) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS state_tbl(
    state_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    state_name VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci,
    state_comment VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS unit_tbl(
    unit_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    unit_name VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci,
    unit_comment VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS name_ms_tbl(
    name_ms_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_ms_normal_name VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    name_ms_real_name VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS form_afb_tbl(
    form_afb_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    form_afb_number INT NULL COLLATE utf8mb4_unicode_ci,
    form_afb_book_number INT NULL COLLATE utf8mb4_unicode_ci,
    form_afb_write_date DATE NULL COLLATE utf8mb4_unicode_ci,
    form_afb_savesys_date DATE NULL COLLATE utf8mb4_unicode_ci,
    form_afb_people_name VARCHAR(20) NULL COLLATE utf8mb4_unicode_ci,
    form_afb_people_name_ok VARCHAR(20) NULL COLLATE utf8mb4_unicode_ci,
    form_afb_detail_work_for TEXT NULL COLLATE utf8mb4_unicode_ci,
    state_id INT NOT NULL,
    group_id INT NOT NULL,
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id),
    FOREIGN KEY(group_id) REFERENCES group_tbl(group_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS order_afb_tbl(
    order_afb_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_ms_id INT NULL COLLATE utf8mb4_unicode_ci,
    order_afb_value DOUBLE NULL,
    unit_id INT NULL ,
    order_afb_note TEXT NULL COLLATE utf8mb4_unicode_ci,
    state_id INT NOT NULL,
    form_afb_id INT NOT NUll,
    group_id INT NOT NULL,
    FOREIGN KEY(unit_id) REFERENCES unit_tbl(unit_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id),
    FOREIGN KEY(name_ms_id) REFERENCES name_ms_tbl(name_ms_id),
    FOREIGN KEY(form_afb_id) REFERENCES form_afb_tbl(form_afb_id),
    FOREIGN KEY(group_id) REFERENCES group_tbl(group_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;


CREATE TABLE IF NOT EXISTS po_tbl(
    po_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    po_num VARCHAR(12) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_id INT NULL,
    po_price_not_vat DOUBLE NULL,
    po_price_vat DOUBLE NULL,
    po_price_sum_vat DOUBLE NULL,
    state_id INT NOT NULL,
    type_po_id INT NOT NULL,
    FOREIGN KEY(comp_contect_id) REFERENCES comp_contect_tbl(comp_contect_id),
    FOREIGN KEY(type_po_id) REFERENCES type_po_tbl(type_po_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS po_people_afb_tbl(
    po_people_afb_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    po_people_afb_name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci,
    po_id INT NOT NULL,
    group_id INT NOT NULL,
    FOREIGN KEY(po_id) REFERENCES po_tbl(po_id),
    FOREIGN KEY(group_id) REFERENCES group_tbl(group_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS po_afb_tbl(
    po_afb_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    po_afb_num INT NOT NULL COLLATE utf8mb4_unicode_ci,
    po_afb_book_num INT NOT NULL COLLATE utf8mb4_unicode_ci,
    po_id INT NOT NULL,
    FOREIGN KEY(po_id) REFERENCES po_tbl(po_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS po_file_path_tbl(
    po_file_path_id INT NOT NULL COLLATE utf8mb4_unicode_ci,
    po_file_path_url TEXT NOT NULL COLLATE utf8mb4_unicode_ci,
    po_id INT NOT NULL,
    FOREIGN KEY(po_id) REFERENCES po_tbl(po_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS material_class_shelf_tbl(
    material_class_shelf_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    material_class_shelf_name VARCHAR(15) NOT NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS material_type_tbl(
    material_type_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    material_type_name VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    material_type_comment VARCHAR(150) NULL COLLATE utf8mb4_unicode_ci
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS material_tbl(
    material_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    material_name VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    material_value DOUBLE NULL DEFAULT 0.00,
    unit_id INT NOT NULL,
    material_type_id INT NOT NULL,
    material_class_shelf_id INT NOT NULL DEFAULT 1,
    FOREIGN KEY(unit_id) REFERENCES unit_tbl(unit_id),
    FOREIGN KEY(material_type_id) REFERENCES material_type_tbl(material_type_id),
    FOREIGN KEY(material_class_shelf_id) REFERENCES material_class_shelf_tbl(material_class_shelf_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS order_tbl(
    order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    order_detail TEXT NOT NULL COLLATE utf8mb4_unicode_ci,
    order_queantity DOUBLE  NOT NULL COLLATE utf8mb4_unicode_ci,
    unit_id INT NULL,
    order_price DOUBLE  NOT NULL COLLATE utf8mb4_unicode_ci,
    order_price_sum_all DOUBLE  NOT NULL COLLATE utf8mb4_unicode_ci,
    order_note VARCHAR(150) NOT NULL COLLATE utf8mb4_unicode_ci,
    order_vol_receivel DOUBLE NOT NULL COLLATE utf8mb4_unicode_ci,
    material_type_id INT NULL,
    material_class_shelf_id INT NULL,
    po_id INT NOT NULL,
    state_id INT NOT NULL,
    FOREIGN KEY(unit_id) REFERENCES unit_tbl(unit_id),
    FOREIGN KEY(material_type_id) REFERENCES material_type_tbl(material_type_id),
    FOREIGN KEY(material_class_shelf_id) REFERENCES material_class_shelf_tbl(material_class_shelf_id), 
    FOREIGN KEY(po_id) REFERENCES po_tbl(po_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS order_more_tbl(
    order_more_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    order_more_detail VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    order_id INT NOT NULL,
    FOREIGN KEY(order_id) REFERENCES order_tbl(order_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS po_logs_tbl(
    po_logs_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    po_logs_note VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    po_logs_date_record DATETIME NOT NULL COLLATE utf8mb4_unicode_ci,
    po_id INT NOT NULL,
    user_id INT NOT NULL,
    state_id INT NOT NULL,
    FOREIGN KEY(po_id) REFERENCES po_tbl(po_id),
    FOREIGN KEY(user_id) REFERENCES user_tbl(user_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id)
 )ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS pick_in_out_logs_tbl (
    pick_in_out_logs_id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    pick_in_out_val DOUBLE NOT NULL COLLATE utf8mb4_unicode_ci,
    pick_in_out_price DOUBLE NULL COLLATE utf8mb4_unicode_ci,
    pick_in_out_sumval DOUBLE NOT NULL COLLATE utf8mb4_unicode_ci,
    pick_in_out_comment VARCHAR(150) NOT NULL COLLATE utf8mb4_unicode_ci,
    pick_in_out_date DATETIME NOT NULL COLLATE utf8mb4_unicode_ci,
    pick_in_out_note VARCHAR(150) NOT NULL COLLATE utf8mb4_unicode_ci,
    material_id INT NOT NULL,
    state_id INT NOT NULL,
    group_id INT NOT NULL,
    FOREIGN KEY(material_id) REFERENCES material_tbl(material_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id),
    FOREIGN KEY(group_id) REFERENCES group_tbl(group_id)
 )ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

 CREATE TABLE IF NOT EXISTS user_logs_tbl(
    user_logs_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_logs_in_out_time DOUBLE NOT NULL COLLATE utf8mb4_unicode_ci,
    user_logs_ip VARCHAR(15) NOT NULL COLLATE utf8mb4_unicode_ci,
    user_id INT NOT NULL,
    state_id INT NOT NULL,
    group_id INT NOT NULL,
    FOREIGN KEY(user_id) REFERENCES user_tbl(user_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id),
    FOREIGN KEY(group_id) REFERENCES group_tbl(group_id)
 )ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

INSERT INTO userlv_tbl(userlv_name) VALUES
('Super Admin'),('Admin'),('Store'),('Purchase'),('Normal User');

INSERT INTO prefix_tbl(prefix_name) VALUES
('นาย'),('นาง'),('นางสาว'),('ว่าที่ร้อยตรีหญิง');


INSERT INTO group_tbl(group_name) VALUES
('ว่าง (Null)'),('บัญชีและการเงิน (AC)'),('ทรัพยากรณ์มนุษย์ (HRM)'),('ข้อมูล (MIS)'),('การตลาด (MK)'),
('จัดซื้อทัั่วไป (PC)'),('วิศวกรรม (EN)'),('ส่งเสริมการบริการ (QM)'),('คลังสินค้า (WH)'),('คลังวัสดุ (Store)'),
('โรงงาน');

INSERT INTO depart_tbl(depart_name,group_id) VALUES
('ว่าง (Null)',1),('บัญชีและการเงิน (AC)',2),('ทรัพยากรณ์มนุษย์ (HRM)',3),('ข้อมูล (MIS)',4),('การตลาด (MK)',5),
('จัดซื้อทัั่วไป (PC)',6),('วิศวกรรม (EN)',7),('ส่งเสริมการบริการ (QM)',8),('คลังสินค้า (WH)',9),('คลังวัสดุ (Store)',10),
('โรงงาน',11);

INSERT INTO rank_tbl(rank_name,depart_id) VALUES
('ว่าง (์Null)',1),('เจ้าหน้าที่ฝ่ายบัญชีการเงิน',2),('เจ้าหน้าที่ฝ่ายทรัพยากรณ์มนุษย์',3),('เจ้าหน้าที่ฝ่ายข้อมูล',4),('เจ้าหน้าที่ฝ่ายการตลาด',5),('เจ้าหน้าที่ฝ่ายจัดซื้อทั่วไป',6),
('เจ้าหน้าที่ฝ่ายวิศวกรรม',7),('เจ้าหน้าที่ฝ่ายส่งเสริมการบริการ',8),('เจ้าหน้าที่ฝ่ายคลังสินค้า',9),('เจ้าหน้าที่ฝ่ายคลังวัสดุ',10),('เจ้าหน้าที่ฝ่ายโรงงาน',11),('เจ้าหน้าที่ฝ่าย IT',8),
('้เจ้าหน้าที่ จป. วิชาชีพ',3),

('หัวหน้าฝ่ายบัญชีการเงิน',2),('หัวหน้าฝ่ายทรัพยากรณ์มนุษย์',3),('หัวหน้าฝ่ายที่ข้อมูล',4),('หัวหน้าฝ่ายการตลาด',5),('หัวหน้าฝ่ายจัดซื้อทั่วไป',6),
('หัวหน้าฝ่ายวิศวกรรม',7),('หัวหน้าฝ่ายส่งเสริมการบริการ',8),('หัวหน้าฝ่ายคลังสินค้า',9),('หัวหน้าฝ่ายโรงงาน',11),

('ผู้จัดการฝ่ายโรงงาน',11),('ผู้จัดการฝ่ายบัญชีการเงิน',2),('ผู้จัดการฝ่ายทรัพยากรณ์มนุษย์',3),('ผู้จัดการฝ่ายที่ข้อมูล',4),('ผู้จัดการฝ่ายการตลาด',5),('ผู้จัดการฝ่ายจัดซื้อทั่วไป',6),
('ผู้จัดการฝ่ายวิศวกรรมเครื่องทำความเย็น',7),('ผู้จัดการฝ่ายส่งเสริมการบริการ',8),('ผู้จัดการฝ่ายคลังสินค้า',9),('ผู้จัดการฝ่ายโรงงาน',11);

INSERT INTO userdata_tbl(prefix_id,userdata_fname,userdata_lname,rank_id) VALUES
(2,'ดาวใจ','มณีสว่างวงศ์',11),         /* ผจ.โรงงาน */
(1,'บูคอรี','สะแลแม',8),              /* ผจฝ. ส่งเสริมและบริการ */
(1,'ธนพล','เพ็ชร์สุวรรณ์',8),           /* เจ้าหน้าที่ส่งเสริมและบริการและฝ่าย IT */
(1,'วงศธร','นามผล',8),              /* เจ้าหน้าฝ่าย IT */
(1,'ภูธเนศ','อินทะโณ',8),             /* เจ้าหน้าที่ฝ่าย IT */
(3,'สารินี','สว่างจิต',2),              /* ผู้ช่วย ผจก บัญชีและการเงิน */
(3,'กมลพรรณ','เจริญดี',9),           /* เจ้าหน้าที่สโตร์ */
(4,'วรนิษฐ์','มู่เก็ม',3),               /* เจ้าหน้าที่สรรหาว่าจ้าง */
(3,'นิตยา','อำภาสุวรรณ์',5),            /* ผจก.ฝ่ายการตลาด/บริหารทรัพย์ฯ */
(3,'กรนันท์','เหมือนรุ่งเรือง',8),              /* เจ้าหน้า DC */
(3,'อรพรรณ','มณีรัตน์',5),                   /* เจ้าหน้าที่ฝ่ายตลาด*/
(3,'นราธิป','หอมอุทัย',3),           /* เจ้าหน้าที่บัญชีและการเงิน */          
(3,'ภัสรพร','คงนิเวช',6),                   /* เจ้าหน้าที่ฝ่ายจัดซื้อ*/
(3,'จิรภัทร','คงจินดามุณี',2);           /* เจ้าหน้าที่บัญชีและการเงิน */            


INSERT INTO user_tbl(user_name,user_password,userdata_id,userlv_id) VALUES
('Daow',MD5('1412@55'),1,2),
('pc',MD5('123'),3,4),
('st',MD5('123'),3,3),
('admin',MD5('1922@55'),2,1),
('Superadmin',MD5('p@ssw0ld'),3,1),
('antgamer',MD5('123456'),4,1),
('teddy',MD5('p@ssw0ld'),4,1);



INSERT INTO unit_tbl(unit_name) VALUES
('แผ่น'),('หลอด'),('ผืน'),('ม้วน'),('ก้อน'),('คู่'),('เส้น'),('ม้วน'),('แพ็ค'),('ถัง'),('แกลลอน'),('ใบ'),
('ถุง'),('กระป๋อง'),('ตัว'),('ล้อ'),('ดอก'),('ลูก'),('กล่อง'),('ดวง'),('ก้าน'),('โคม'),('อัน'),('ขวด'),
('เมตร'),('โคม'),('มัด');

INSERT INTO material_class_shelf_tbl(material_class_shelf_name) VALUES
('ชั้นที่ 1'),('ชั้นที่ 2'),('ชั้นที่ 3');

INSERT INTO material_type_tbl(material_type_name) VALUES
('ประเภทซ่อมบำรุง'),('ประเภทไฟฟ้า'),('ประเภทสารเคมี'),('ประเภทเครื่องทำความเย็น'),
('ประเภทงานประปา'),('ประเภทเฉพาะงาน'),('ประเภทงานทั่วไป'),('ประเภทอื่นๆ');

INSERT INTO material_tbl(material_name,material_value,unit_id,material_type_id,material_class_shelf_id) VALUES 
('จานทราย #320',6,1,1,1),('จานทราย #120',7,1,1,1),('ใบหินเจียร์ 4"บาง',4,1,1,1),('ใบหินเจียร์ 4"หนา',35,1,1,1),('ใบตัด 4"บาง',7,1,1,1),
('ใบตัด 4" 3 M',40,1,1,1),('ไฟเบอร์ตัด 16"',3,1,1,1),('ไฟเบอร์ตัด 14"',35,1,1,1),('เทปกันสี',13,8,1,1),('สตัดเกลียว 3/8',5,10,1,1),
('แก๊ส 15 kg',11,10,1,1),('ก๊าซ Co2',11,10,1,1),('แก๊ส ปตท. 48 kg',0,10,1,1),

('ดอกเดวิท',27,13,1,2),('ปุ๊กพลาสติ๊ก',4,13,1,2),('สตัดบอล 3/8',61,15,1,2),('ปุ๊กตะกั่ว 1/4',18,15,1,2),('ปุ๊กตะกั่ว 3/8',25,15,1,2),
('ดอกสว่าน 5/32',10,17,1,2),('ดอกสว่าน 1/8',12,17,1,2),('ดอกสว่าน 1/4',5,17,1,2),('ดอกสว่าน 3/8',1,17,1,2),('ดอกสว่าน 5/16',1,17,1,2),
('ดอกสว่าน 3/16',10,17,1,2),
('ดอกสว่าน 1/2',0,17,1,2),('ลวดเชื่อม 2.6',11,19,1,2),('ลวดเชื่อม 3.2',2,19,1,2),('ลวดเชื่อม STL 2.6',289,21,1,2),('ลวดเชื่อม STL 3.2',9,21,1,2),
('ลวดเชื่อมอาร์กอน',28,21,1,2),('ใบเรื่อยแซนวิค 18 T',13,23,1,2),('เกลียวปล่อย # 7*1 1/2"',15,13,1,2),('เกลียวปล่อย # 7*1',19,13,1,2),
('กิ๊บจับสลิง Stl 3/16"',5,15,1,2),('สกรู STL # 10*1"',65,15,1,2),('สกรู STL # 10*2 1/2""',29,15,1,2),('หัวน๊อต STL # 10',60,15,1,2),
('หัวน๊อตล็อคเกลียว STL # 10',20,15,1,2),('แหวนตาย STL # 10',59,15,1,2),('สกรู STL # 14*1"',86,15,1,2),('หัวน๊อต STL # 14',55,15,1,2),
('แหวนตาย STL # 14',22,15,1,2),('สกรู STL # 17*1"',35,15,1,2),('สกรู STL # 17*1 1/2"',28,15,1,2),('สกรู STL # 17*2"',23,15,1,2),
('สกรู STL # 17*2 1/2"',34,15,1,2),('หัวน๊อต STL # 17',67,15,1,2),('แหวนตาย STL # 17',16,15,1,2),('น๊อต STL # 19*1"',11,15,1,2),
('หัวน๊อต STL # 19',21,15,1,2),('แหวนตาย  STL # 19',15,15,1,2),('ชอล์คหิน',12,23,1,2),('กระจกอ๊อกดำ',5,11,1,2),('กระจกอ๊อกใส',9,11,1,2),
('ลูกปืน SKF',3,18,1,2),('ใบเลื่อยจิ๊กซอร์',11,23,1,2),('ข้อต่อตรงเสียบสาย 1/2"',3,23,1,2),('นมหนูตัดแก๊ส',2,23,1,2),
('หน้ากากเชื่อม',2,23,1,2),

('แปรงทาสี 3"',29,23,1,3),('แปรงทาสี 1"',34,23,1,3),('แปรงลวดเหล็กขัดสนิม',3,23,1,3),('แปรงลวดทองเหลือง',2,23,1,3),('แปรงลูกถ้วย',12,23,1,3),
('แปรงลูกถ้วย',12,23,1,3),('ลูกลอย SOMIC',0,23,1,3),('สายพาน #1550',1,7,1,3),('สายพาน #8470',1,7,1,3),('สายพาน #8610',2,7,1,3),
('สายพาน #8390',4,7,1,3),('สายพาน #8390',11,7,1,3),('กระดาษทราย # 1000',10,1,1,3),('กระดาษทราย # 120',10,1,1,3),('คีมจับอ๊อก DAICHI',2,23,1,3),
('ไส้กรองน้ำดื่ม',2,23,1,3),('ตลับเมตร',0,23,1,3),


('เคเบิ้ลไทร์ 6"',4,13,2,1),('เคเบิ้ลไทร์ 12"',4,13,2,1),('ข้อต่อตรง 20 มิล ARR',70,23,2,1),('ข้อต่อตรง 25 มิล ARR',17,23,2,1),
('ข้อต่อตรง 32 มิล ARR',86,23,2,1),('แคล้มยึดท่อ 20 มิล ARR',52,23,2,1),('แคล้มยึดท่อ 25 มิล ARR',72,23,2,1),('แคล้มยึดท่อ 32 มิล ARR',37,23,2,1),
('บัลลาสต์ 40 W',2,23,2,1),('คอนเน็คเตอร์ 20 มิล ',31,23,2,1),('คอนเน็คเตอร์ 25 มิล ',36,23,2,1),('คอนเน็คเตอร์ 32 มิล ',20,23,2,1),
('ข้องอ 20 มิล ARR',20,23,2,1),('ข้องอ 25 มิล ARR',1,23,2,1),('บ๊อกซ์พักสาย 2 ทางตรง 20 มิล',10,23,2,1),('บ๊อกซ์พักสาย 3 ทาง 90 องศา 20 มิล',10,23,2,1),
('บ๊อกซ์พักสาย 1 ทางตรง 20 มิล',10,23,2,1),('บ๊อกซ์พักสาย 2 ทางตรง 25 มิล',84,23,2,1),('บ๊อกซ์พักสาย 3 ทางตรง 20 มิล',4,23,2,1),
('ปลั๊กพาวเวอร์สีแดง ตัวผู้',31,15,2,1),('ปลั๊กพาวเวอร์สีแดง ตัวเมีย',6,15,2,1),('ปลั๊กพาวเวอร์สีน้ำเงิน ตัวเมีย',3,15,2,1),
('ปลั๊กพาวเวอร์สีน้ำเงิน ตัวผู้',2,15,2,1),

('บ๊อกซ์พลาสติก 2*4',12,23,2,2),('หน้ากาก 1 ช่อง',2,23,2,2),('หน้ากาก 1 ช่อง ผืนผ้า',1,23,2,2),('หน้ากาก 2 ช่อง',6,23,2,2),('หน้ากาก 3 ช่อง',9,23,2,2),
('สวิตซ์ M9025 G',7,15,2,2),('สวิตซ์ M9025 ',0,15,2,2),('สวิตซ์ M9001 ',11,15,2,2),('สวิตซ์ AM5001 T ',10,15,2,2),('สวิตซ์ M9021',4,15,2,2),
('สวิตซ์ N4001',7,15,2,2),('ขั้วหลอดฟลูออเรสเซนต์',14,23,2,2),('หลอดไซเรน',1,2,2,2),('หลอดไฟรถ 10 ล้อ (ใหญ่ 1 จุด)',5,2,2,2),
('หลอดไฟรถ 10 ล้อ (ใหญ่ 2 จุด)',11,2,2,2),('หลอดไฟรถ 10 ล้อ (เล็ก 1 จุด)',15,2,2,2),('หลอด Philips LED 13 W',0,2,2,2),('ฟิวส์กระบอก',0,23,2,2),
('สวิตซ์กระตุก',5,23,2,2),('สวิตซ์ลูกศร',12,23,2,2),('สวิตซ์ลูกศร',12,23,2,2),('ปลั๊กยางดำ',11,23,2,2),('เบรคเกอร์ ABB 3 Pole 32 A',1,23,2,2),
('เเบรคเกอร์ ABB 3 Pole 63 A',1,15,2,2),('เบรคเกอร์ ABB 1 Pole 16 A',0,15,2,2),('เบรคเกอร์ ABB 3 Pole 16 A',0,15,2,2),
('เบรคเกอร์ ABB 1 Pole 32 A',0,15,2,2),('เบรคเกอร์ ABB 1 Pole 63 A',2,15,2,2),('เบรคเกอร์ Square D 3 P 32 A',2,15,2,2),
('เบรคเกอร์ Square D 3 P 63 A',2,15,2,2),('เบรคเกอร์ 125/160',1,15,2,2),
('แบตฯ UPS',1,5,2,2),('แมกเนติกส์ ABB A30-30-10',0,15,2,2),('กล่องกันน้ำ 1 ช่อง',0,23,2,2),('กล่องกันน้ำ 2 ช่อง',2,23,2,2),
('กล่องกันน้ำ 3 ช่อง',3,23,2,2),('ท่อ 20 มิล ARR',15,7,2,2),('ท่อ 25 มิล ARR',11,7,2,2),
('ท่อ 32 มิล ARR',0,7,2,2),

('ท่ออ่อนลายลูกฟูก 20 มิล',0,25,2,3),('ท่ออ่อนลายลูกฟูก 25 มิล',0,25,2,3),('เทปพันละลาย',1,8,2,3),('เทปพันสายไฟ',11,8,2,3),
('จุ๊บแป้น E 27',13,23,2,3),('หลอดฟลูออเรสเซนต์ LED 8W',8,2,2,3),('หลอดฟลูออเรสเซนต์  LED T8 16 W',8,2,2,3),('คาปาซิเตอร์',0,23,2,3),
('รีเลย์ 220 V ',2,23,2,3),('ขาต่อ Adapter ',5,23,2,3),('บัลลาสต์ 2* TLD 18 W ',3,23,2,3),('ไพล๊อตแลมป์ 25 มิล ',7,23,2,3),


('สีโจตัน เพนการ์ดวานิช',1,14,3,1),('สีเหลืองโจตัน ทาถนน',6,11,3,1),('ทินเนอร์โจตัน # 7',3,14,3,1),('ทินเนอร์ 100 %',16,14,3,1),
('สีอิพิคอน ชิลเลอร์',4,11,3,1),('สีขาว เป็ดหงส์',3,11,3,1),('สีดำ เป็ดหงส์',2,11,3,1),('สีเทา เป็ดหงส์',1,11,3,1),('สีแดง เป็ดหงส์',1,11,3,1),
('สีดำด้าน เป็ดหงส์',3,11,3,1),('สีเหลือง เป็ดหงส์',4,11,3,1),('สีอิพิคอน HBCL ORANGE',9,11,3,1),('สีโจตัน เพนการ์ด เคลียร์ชิลเลอร์',3,11,3,1),

('สีบิสคอน 1000 สีเทา',2,11,3,2),('สียูมิการ์ด SX # 743 BLUE',6,11,3,2),

('สียูนิมารีน 100 cs-726 สีส้ม',3,11,3,3),('สียูนิมารีน 100 cs-516 สีเทา',0,11,3,3),('สียูนิมารีน 100 cs-743 สีฟ้า',3,11,3,3),
('สียูนิมารีน 100 cs-622 สีเหลือง',2,11,3,3),('สียูนิมารีน 100 cs-611 สีเทา',2,11,3,3),


('ทินเนอร์ # 31',11,14,3,1),('จารบี',1,14,3,1),

('ทินเนอร์ # 41',3,14,3,2),('สีZINCOLITE ',6,11,3,2),('ทินเนอร์ #11',12,14,3,2),

('น้ำยาล้าง VENTEX',0,14,3,3),('สเปรย์เคลือบขั้วแบตฯ',1,14,3,3),('สเปรย์ทำความสะอาดขั้วแบตฯ',3,14,3,3),('น้ำยาล้าง CONTACT',2,14,3,3),
('สเปรย์ KEMEX',18,14,3,3),('สีสเปรย์',12,14,3,3),('สเปรย์ฉีดสายพาน',0,14,3,3),('สเปรย์ฉีดหัวเชื่อม',3,14,3,3),('สเปรย์ SONAX',7,14,3,3),
('ซิลิโคน Dawconning',29,2,3,3),('ซิลิโคนใส',4,2,3,3),('กาวทาท่อ',3,14,3,3),


('สาย Probe วัดอุณหภูมิ',10,7,4,2),('ชุดหน้า CONTACT',2,23,4,2),('โซลินอยด์วาล์ว 10 W',11,15,4,2),('Contact Block',2,23,4,2),('ลูกลอยไฟฟ้า',0,23,4,2),
('ลิมิตสวิตซ์ 240 V 3 A',2,23,4,2),

('ไส้กรองคัมมิ้น # 670 ',2,23,4,3),('ไส้กรองคัมมิ้น # 777',4,23,4,3),('ไส้กรองคัมมิ้น # 1216',2,23,4,3),('CORK TAPE',2,8,4,3),('ลิลิพอร์ด',3,23,4,3),
('ลูกลอยพลาสติกสีแดง',0,23,4,3),


('PVC ข้อต่อสามทาง 18 มิล (1/2")',5,23,5,1),('PVC ข้อต่อสามทาง 25 มิล (1")',1,23,5,1),('PVC ข้อต่อสามทาง 40 มิล (1 1/2")',0,23,5,1),
('PVC ข้อต่อสามทาง 55 มิล (2")',0,23,5,1),('PVC ข้อต่อสามทาง 80 มิล (3")',4,23,5,1),('PVC ข้อต่อสามทางลด 40*20 (1 1/2"*3/4")',4,23,5,1),
('PVC ข้อต่อสามทางลด 40*25 (1 1/2"*1")',0,23,5,1),('PVC ข้อต่อสามทางลด 55*40 (2"*1 1/2")',1,23,5,1),
('PVC ข้อต่อสามทางลด 65*25 (2 1/2"*1")',6,23,5,1),('PVC ข้อต่อสามทางลด 80*25 (3"*1")',1,23,5,1),
('PVC ข้อต่อสามทางลด 80*55 (3"*2")',2,23,5,1),('PVC ข้อต่อสามทาง TY 45 องศา 55 มิล (2")',1,23,5,1),
('PVC ข้อต่อสามทาง TY 90 องศา 80 มิล (3")',7,23,5,1),('PVC ข้อต่อสามทาง TY 45 องศา 100 มิล (4")',1,23,5,1),
('PVC ข้อต่อสามทาง TY 45 องศา 80*55 (3"*2")',3,23,5,1),('PVC ข้องอ 45 องศา 40 มิล (1 1/2")',2,23,5,1),
('PVC ข้องอ 45 องศา 150 มิล (6")',1,23,5,1),

('PVC ข้องอ 90 องศา 18 มิล (1/2")',6,23,5,2),('PVC ข้องอ 90 องศา 20 มิล (3/4")',1,23,5,2),('PVC ข้องอ 90 องศา 25 มิล (1")',4,23,5,2),
('PVC ข้องอ 90 องศา 40 มิล (1 1/2")',4,23,5,2),('PVC ข้องอ 90 องศา 55 มิล (2")',2,23,5,2),('PVC ข้องอ 90 องศา 125 มิล (5")',3,23,5,2),
('PVC ข้อลด 20*18 มิล (1"*1/2")',2,23,5,2),('PVC ข้อลด 25*18 มิล (1"*1/2")',2,23,5,2),('PVC ข้อลด 40*25 มิล (1 1/2"*1")',1,23,5,2),
('PVC ข้อลด 55*18 มิล (2"*1/2")',7,23,5,2),('PVC กิ๊บจับท่อ 1/2"',6,23,5,2),('PVC กิ๊บจับท่อ 1"',12,23,5,2),('PVC กิ๊บจับท่อ 1 1/2"',8,23,5,2),
('PVC กิ๊บจับท่อ 2"',4,23,5,2),('PVC กิ๊บจับท่อ 3"',0,23,5,2),('PVC บอลวาล์ว 1/2"',1,23,5,2),('PVC บอลวาล์ว 1"',1,23,5,2),
('PVC บอลวาล์ว 1 1/2"',1,23,5,2),('PVC บอลวาล์ว 2"',1,23,5,2),('เทปพันเกลียว',6,8,5,2),('มิเตอร์น้ำ',2,15,5,2),('สายน้ำดี',4,7,5,2),
('สายชำระ ',1,7,5,2),

('PVC ข้อต่อเกลียวนอก 18 มิล (1/2") ',7,23,5,3),('PVC ข้อต่อเกลียวนอก 20 มิล (3/4") ',1,23,5,3),('PVC ข้อต่อเกลียวนอก 25 มิล (1") ',3,23,5,3),
('PVC ข้อต่อเกลียวนอก 40 มิล (1 1/2")',5,23,5,3),('PVC ข้อต่อเกลียวนอก 55 มิล (2")',3,23,5,3),('PVC ข้อต่อเกลียวใน 18 มิล (1/2")',3,23,5,3),
('PVC ข้อต่อเกลียวใน 20 มิล (3/4")',0,23,5,3),('PVC ข้อต่อเกลียวใน 25 มิล (1")',3,23,5,3),('PVC ข้อต่อเกลียวใน 40 มิล (1 1/2")',4,23,5,3),
('PVC ข้อต่อเกลียวใน 55 มิล (2")',1,23,5,3),('PVC ข้อต่อตรง 18 มิล (1/2")',5,23,5,3),('PVC ข้อต่อตรง 20 มิล (3/4")',2,23,5,3),
('PVC ข้อต่อตรง 25 มิล (1")',2,23,5,3),('PVC ข้อต่อตรง 40 มิล (1 1/2")',3,23,5,3),('PVC ข้อต่อตรง 55 มิล (2")',1,23,5,3),
('PVC ข้อต่อตรง 65 มิล (2 1/2")',3,23,5,3),


('ลูกยางกันกระแทก',22,23,6,1),('ล้อไนล่อน STL',2,16,6,1),('ล้อไนล่อน 6" แป้นเป็น',3,16,6,1),('ล้อไนล่อน 6" แป้นเปล่า',6,16,6,1),

('Roller 174424',7,18,6,2),('Roller 105322',8,18,6,2),('รอกพลาสติก (เล็ก)',0,23,6,2),('รอกพลาสติก (กลาง)',4,23,6,2),
('รอกพลาสติก (ใหญ่)',1,23,6,2),('Electric motor 237388',2,23,6,2),('Manipulator 152982',1,23,6,2),('Socket 147978',2,23,6,2),
('Coil 155052',1,23,6,2),('ลูกปืน 6210 (ล้อโหลดBT)',4,16,6,2),('Electric horn 251206',1,23,6,2),('Horn 750217',1,23,6,2),
('ฟิวส์ 125 A',0,15,6,2),('ฟิวส์ 200 A',1,15,6,2),('ฟิวส์ 325 A',1,15,6,2),('Switch 152975',3,15,6,2),('Kol 253927',2,23,6,2),
('ขั้วแบตฯ',4,23,6,2),('Joy stick 226637',2,23,6,2),('Potentiometer 156276',0,23,6,2),('Wheel 176012',3,23,6,2),
('Wheel 176013',0,23,6,2),('Bearing 226355 (ล้อโหลด BT)',2,18,6,2),('Bearing 29562 (ล้อโหลด BT12-19)',0,18,6,2),
('Pedal 7546341',1,23,6,2),('Encoder 256981',2,23,6,2),('สปอร์ตไลท์',4,20,6,2),('ไฟหน้ารถ F/L 48 V',2,22,6,2),
('ไฟหน้ารถ F/L 12 V',1,22,6,2),('Fan 7516126,174494',1,23,6,2),('น้ำยาหล่อเย็น',2,24,6,2),('น้ำยาล้างหม้อน้ำ',6,24,6,2),
('ไฟสต๊อปแลมป์',2,23,6,2),('ชุดซ่อมคลัทบน 3/4',3,23,6,2),('ชุดซ่อมคลัทล่าง 7/8',5,23,6,2),('หัวเทียน',0,23,6,2),
('Sensor bearing 262597 (รอกไฟฟ้า)',2,23,6,2),('Clamp 29811',3,23,6,2),('Bearing 29198 (ลูกปืนตาเหลือก)',2,18,6,2),
('Gaiter 217540',3,23,6,2),('Bumper 105388',4,23,6,2),('Sensor 227581 (NO)',4,23,6,2),('Sensor 241868 (NC)',4,23,6,2),
('Lever 162498',1,23,6,2),('Spring 185706',1,23,6,2),('Spring 29659',3,23,6,2),('Sleeve 260493',2,23,6,2),('Bolt 10133',6,23,6,2),
('Magnet 172622',8,23,6,2),('Washer 119374',3,23,6,2),('Cable clamp 164218',1,23,6,2),('Clamp 24647',6,23,6,2),('Sleeve 148496',2,23,6,2),
('หลอดสปอร์ตไลท์ F/L 12 V',2,2,6,2),('หลอดสปอร์ตไลท์ F/L 48 V',5,2,6,2),('โคมไฟตู้ รถ 10 ล้อ',2,26,6,2),('โคมไฟบัส (โคมไฟหลังเต่า)',0,26,6,2),
('สาย Sensing Device',4,7,6,2),('Accelerator - Brake 7559494',0,23,6,2),('สายไฮดรอลิค Parker 1/4*8',6,7,6,2),
('Dubble hose 200912-750 (BT1-8)(BT12-19)',0,7,6,2),('Dubble hose 227217 (BT9-11)',2,7,6,2),('Wiring harness 254986',1,7,6,2),
('Wiring harness 7552685-004',2,7,6,2),('Harness 7536791',1,7,6,2),('Magnet switch 157387-050',1,23,6,2),

('ไส้กรองแอร์รถ 10 ล้อ',2,23,6,3),('กรองไฮโดรลิกส์',1,23,6,3),('กรองกระดาษ (ID)',3,23,6,3),('กรองเชื้อเพลิงพลาสติก (กรองเบนซิล)',2,23,6,3),
('กรองโซล่า',2,23,6,3),('ไฟท้ายรถ F/L',1,23,6,3),('จุ๊บไฟรถ 10 ล้อ',9,23,6,3),('ชุดตัดแก๊ส',1,23,6,3),('แผ่นกรอง 3 M 2071',2,23,6,3),
('แผ่นกรอง 3 M 2078',2,23,6,3),('ตลับกรอง 3 M 6002 ',1,23,6,3),('ตลับกรอง 3 M 3001 K-100 ,3303 K-100 ',1,23,6,3),
('Contact tip 0.9 mm',15,23,6,3),('Tip Body Pana 200A',7,23,6,3),('Torch Body 200 A',5,23,6,3),('Torch Body 350 A',4,23,6,3),
('Insulation',13,23,6,3),('ปลอกทองแดง',9,23,6,3),('กระเบื้องหัวเชื่อม',22,23,6,3),('ล้อเลื่อนประตู',10,23,6,3),


('ถุงมือหนัง',4,6,7,1),('เอียปลั๊ก',4,23,7,1),('ฟองน้ำ',12,5,7,1),('อะไหล่ยางดำ+เหล็กขอบ',4,23,7,1),('อะไหล่ยางดำ',2,7,7,1),('ผ้าเช็ดเครื่อง',399,3,7,1),
('ผงซักฟอก',146,13,7,1),('แปรงเตารีด',6,23,7,1),('เมอรี่ไบร์ท',46,1,7,1),('โซดาไฟ',0,13,7,1),('น้ำยาล้างท่อตัน',3,24,7,1),('คลอรีนน้ำ',4,11,7,1),
('น้ำยา Micro Nice',4,11,7,1),('น้ำกลั่น',2,11,7,1),('สบู่เหลวล้างมือ',4,11,7,1),('น้ำยาล้างจาน 3 M',25,24,7,1),('น้ำยาล้างพื้น Bio',22,24,7,1),
('ฟิล์มยืด',268,8,7,1),('เทปกาวใส',165,8,7,1),('ลวดเกลียว',1,8,7,1),('เน็ตฟ้าคลุมผม',144,23,7,1),('เน็ตขาวคลุมผม',16,23,7,1),('ซีลเขียว',1,19,7,1),
('ถุงมือผ้า',84,6,7,1),('ตาชั่ง 60 kg',1,15,7,1),('ตาชั่ง 20 kg',5,15,7,1),('เชือกฟาง',17,4,7,1),('เอี๊ยมสีฟ้า',7,3,7,1),('ถุงมือยางส้ม (อย่างดี)',23,6,7,1),
('ถุงมือยางดำ',13,6,7,1),('ถุงมือยางสีส้ม L ',8,6,7,1),('ซีลส้ม',3,19,7,1),('ถุงขยะ',17,9,7,1),('หมวกไหมพรหม',11,12,7,1),('รองเท้าบู๊ท # 10.5',2,6,7,1),
('รองเท้าบู๊ท # 11',4,6,7,1),('รองเท้าบู๊ท # 11.5',0,6,7,1),('ถ่านเทอร์โม LR44',8,5,7,1),('ถ่านเทอร์โม 3V',2,5,7,1),('กระดาษสีน้ำตาล',50,27,7,1),
('เชือกรัดกล่อง',5,8,7,1),('ม่านพลาสติกใส',6,8,7,1),('ม่านพลาสติกสีเหลือง',5,8,7,1),('ลม',2,10,7,1),('ลวดเชื่อมมิค',2,8,7,1),
('น้ำมันเครื่อง SAE 20',5,11,5,1),('น้ำมันเครื่อง SAE 40 ดีเซล',7,11,7,1),('น้ำมันเกียร์ SAE 90',3,11,7,1),('น้ำมันเกียร์ออโต้ ',2,11,7,1),
('น้ำมันเบรค DOT 3',2,14,7,1),('น้ำมันเครื่อง รถ 10 ล้อ',5,11,7,1),('แผ่นคลัทซ์ 21T*11 ',1,1,7,1),('แผ่นคลัทซ์ 10T*11 ',0,1,7,1),
('ล้อโหลด BT 1-8',7,16,7,1),('ล้อโหลด BT 9-11',4,16,7,1),('ล้อโหลด BT 12-19',2,16,7,1),('ล้อขับ BT 1-8',6,16,7,1),
('ล้อขับ BT 9-11',9,16,7,1),('ล้อขับ BT 12-19',3,16,7,1),('โซ่ # 646',3,7,7,1),('โซ่ # 634',4,7,7,1),('โซ่ # 534',6,7,7,1),
('โซ่ # 40',6,7,7,1),('ข้อต่อโซ่ เบอร์ 40',1,23,7,1),('ข้อต่อโซ่ เบอร์ 634',5,23,7,1),('ไม้กวาดน้ำพลาสติก',1,23,7,1),('แปรงถูพื้นด้ามยาว',6,23,7,1),
('ไม้กวาดก้านมะพร้าว',3,23,7,1),('ไม้กวาดดอกหญ้า',3,23,7,1);

INSERT INTO state_tbl(state_name) VALUES
('มีรายการคงเหลือ'),('ใช้รายการทั้งหมดแล้ว'),('รอเรียกใช้รายการ');

INSERT INTO type_po_tbl(type_po_name) VALUES
('ประเภทสำหรับวัสดุ'),('ประเภทสำหรับบริการ');

INSERT INTO comp_contect_tbl(comp_contect_name,comp_contect_loca_num,comp_contect_loca_moo,comp_contect_loca_road,comp_contect_loca_s_district,
comp_contect_loca_district,comp_contect_loca_prov,comp_contect_loca_codepost,comp_contect_tel,comp_contect_fex,comp_contect_people_name) VALUES
('บริษัทวนาวัฒน์วัสดุ จำกัด','125/1','ม.6','ถ.ลพบุรีราเมศวร์','ต.น้ำน้อย','อ.หาดใหญ่','จ.สงขลา','90110','074-4438074-6',
'074-316154','ผู้ติดต่อ. คุณมด/คุณน้ำเย็น/คุณอร');

INSERT INTO group_tbl(group_name) VALUES
('ฝ่ายบริหารทรัพยากรณ์มนุษย์'),('ฝ่ายจัดซื้อ'),('ฝ่ายคลังสินค้า'),('ฝ่ายวิศวกรรม'),('ฝ่ายการตลาด'),('ฝ่ายบัญชีและการเงิน'),('ฝ่ายข้อมูล'),('ฝ่ายส่งเสริมการบริการ');
