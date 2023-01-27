/*
CREATE TABLE IF NOT EXISTS name_ms_tbl(
    name_ms_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_ms_normal_name VARCHAR(100) NULL COLLATE utf8mb4_unicode_ci,
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
    state_id INT NULL,
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS order_afb_tbl(
    order_afb_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_ms_id INT NULL COLLATE utf8mb4_unicode_ci,
    order_afb_value DOUBLE NULL ,
    unit_id INT NOT NULL ,
    order_afb_note TEXT NULL COLLATE utf8mb4_unicode_ci,
    state_id INT NOT NULL,
    FOREIGN KEY(unit_id) REFERENCES unit_tbl(unit_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS po_tbl(
    po_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    po_num VARCHAR(12) NULL COLLATE utf8mb4_unicode_ci,
    comp_contect_id INT NULL,
    type_po_id INT NOT NULL,
    po_price_not_vat DOUBLE NULL,
    po_price_vat DOUBLE NULL,
    po_price_sum_vat DOUBLE NULL,
    state_id INT NOT NULL,
    FOREIGN KEY(comp_contect_id) REFERENCES comp_contect_tbl(comp_contect_id),
    FOREIGN KEY(type_po_id) REFERENCES type_po_tbl(type_po_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_id)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;

CREATE TABLE IF NOT EXISTS po_tbl(
    po_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    po_num VARCHAR(12) NULL COLLATE utf8mb4_unicode_ci,
    po_price_not_vat DOUBLE NULL COLLATE utf8mb4_unicode_ci,
    po_price_vat DOUBLE NUll COLLATE utf8mb4_unicode_ci,
    po_price_some_vat DOUBLE NUll COLLATE utf8mb4_unicode_ci,
    comp_contect_id INT NOT NULL,
    type_po_id INT NOT NULL,
    state_id INT NOT NULL,
    FOREIGN KEY(comp_contect_id) REFERENCES comp_contect_tbl(comp_contect_id),
    FOREIGN KEY(type_po_id) REFERENCES type_po_tbl(type_po_id),
    FOREIGN KEY(state_id) REFERENCES state_tbl(state_tbl)
)ENGINE = INNODB DEFAULT CHARSET UTF8MB4;



