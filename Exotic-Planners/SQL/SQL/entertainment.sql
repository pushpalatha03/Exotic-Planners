CREATE TABLE IF NOT EXISTS entertainment_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_span DATE,
    adults INT,
    kids INT,
    setup_preference TEXT,
    theme VARCHAR(255),
    budget DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
