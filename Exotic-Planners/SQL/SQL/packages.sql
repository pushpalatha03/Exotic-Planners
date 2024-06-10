CREATE TABLE event_registration (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    span_of_event INT(6),
    budget_food_drinks INT(10),
    budget_entertainment INT(10),
    budget_decorations INT(10),
    invitors INT(6),
    fun_activities VARCHAR(3)
);
