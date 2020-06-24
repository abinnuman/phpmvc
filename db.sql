DROP TABLE IF EXISTS foo;
CREATE TABLE foo(
    id BIGINT(20) primary key AUTO_INCREMENT,
    amount INT(10),
    buyer VARCHAR(255),
    receipt_id VARCHAR(20),
    items VARCHAR(255),
    buyer_email VARCHAR(50),
    buyer_ip VARCHAR(20),
    note TEXT,
    city VARCHAR(20),
    phone VARCHAR(20),
    hash_key VARCHAR(255),
    entry_at DATE,
    entry_by INT(10)
);