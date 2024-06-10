CREATE TABLE event_details (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hotel VARCHAR(255),
    event_date DATE,
    people_count INT(6),
    preference VARCHAR(10),
    setup TEXT,
    theme VARCHAR(255),
    food_times INT(6),
    budget INT(10),
    alcohol_allowed VARCHAR(3),
    alcohol_brands TEXT
);
