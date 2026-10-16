
CREATE DATABASE IF NOT EXISTS db_inventory
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE db_inventory;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    role ENUM('admin','staff','manager')
        NOT NULL DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL UNIQUE,
    name VARCHAR(150) NOT NULL,
    category_id INT NULL,
    quantity INT NOT NULL DEFAULT 0,
    unit VARCHAR(20) NOT NULL DEFAULT 'unit',
    price DECIMAL(15,2) NOT NULL DEFAULT 0,
    entry_date DATE NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_items_category
        FOREIGN KEY (category_id)
        REFERENCES categories(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT NOT NULL,
    user_id INT NOT NULL,
    type ENUM('IN','OUT') NOT NULL,
    quantity INT NOT NULL,
    notes VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_transactions_item
        FOREIGN KEY (item_id)
        REFERENCES items(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_transactions_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data contoh pengguna
INSERT INTO users (username, password, full_name, role) VALUES
('admin', '$2y$10$3CTivM9B4EO01IOfgNr5qOxuv2pO4RlQhzkWY0cd2WgUM9.Q9Cche', 'Administrator', 'admin'),
('staff1', '$2y$10$3CTivM9B4EO01IOfgNr5qOxuv2pO4RlQhzkWY0cd2WgUM9.Q9Cche', 'Staff Gudang', 'staff'),
('manager1', '$2y$10$3CTivM9B4EO01IOfgNr5qOxuv2pO4RlQhzkWY0cd2WgUM9.Q9Cche', 'Manager', 'manager');

-- Data contoh kategori
INSERT INTO categories (name, description) VALUES
('Elektronik', 'Peralatan elektronik kantor'),
('ATK', 'Alat tulis kantor'),
('Furniture', 'Perabot kantor'),
('Peralatan', 'Peralatan perbaikan');

-- Data contoh barang
INSERT INTO items
(code, name, category_id, quantity, unit, price, entry_date, description)
VALUES
('BRG001', 'Laptop', 1, 10, 'unit', 7500000, '2026-10-01', 'Laptop kantor'),
('BRG002', 'Printer', 1, 5, 'unit', 2500000, '2026-10-01', 'Printer kantor'),
('BRG003', 'Mouse', 1, 20, 'unit', 150000, '2026-10-02', 'Mouse komputer'),
('BRG004', 'Keyboard', 1, 15, 'unit', 200000, '2026-10-02', 'Keyboard komputer'),
('BRG005', 'Pulpen', 2, 100, 'pcs', 3000, '2026-10-03', 'Pulpen kantor'),
('BRG006', 'Buku Catatan', 2, 50, 'pcs', 10000, '2026-10-03', 'Buku catatan'),
('BRG007', 'Kertas A4', 2, 30, 'rim', 55000, '2026-10-04', 'Kertas printer'),
('BRG008', 'Pensil', 2, 80, 'pcs', 2500, '2026-10-04', 'Pensil kantor'),
('BRG009', 'Meja Kantor', 3, 8, 'unit', 1200000, '2026-10-05', 'Meja kerja'),
('BRG010', 'Kursi Kantor', 3, 12, 'unit', 750000, '2026-10-05', 'Kursi kerja'),
('BRG011', 'Obeng', 4, 10, 'unit', 25000, '2026-10-06', 'Peralatan perbaikan'),
('BRG012', 'Tang', 4, 7, 'unit', 35000, '2026-10-06', 'Peralatan perbaikan');

-- Data contoh transaksi
INSERT INTO transactions (item_id, user_id, type, quantity, notes) VALUES
(1, 1, 'IN', 10, 'Stok awal laptop'),
(2, 2, 'IN', 5, 'Stok awal printer'),
(3, 1, 'OUT', 2, 'Pemakaian mouse'),
(5, 3, 'IN', 20, 'Penambahan stok pulpen');