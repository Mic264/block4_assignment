CREATE TABLE pupil_parent_guardian (
    pupil_id INT,
    parent_guardian_id INT,
    PRIMARY KEY (pupil_id, parent_guardian_id),
    created DATETIME DEFAULT CURRENT_TIMESTAMP,  
    last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (pupil_id) REFERENCES pupils(id),
    FOREIGN KEY (parent_guardian_id) REFERENCES parent_guardians(id)
);
