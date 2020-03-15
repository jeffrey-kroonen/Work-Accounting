## Database

### users
| column | type | options |
|--------|----|-----------|
| id | INT(11) AI, PK |
| name | VARCHAR(255) NOT NULL |
| email | VARCHAR(255) NOT NULL |
| phonenumber | VARCHAR(255) NOT NULL |
| password | VARCHAR(60) NOT NULL |
| remember_token | VARCHAR(255) DEFAULT NULL |
| status | VARCHAR(255) NOT NULL, DEFAULT VALUE 'active' | 'acttive' \| 'inactive' |
| role | VARCHAR(255) NOT NULL, DEFAULT VALUE 'user' | 'user' \| 'administrator' |
| created_at | DATETIME, CURRENT_TIMESTAMP |
| updated_at | TIMESTAMP, CURRENT_TIMESTAMP, ON UPDATE CURRENT_TIMESTAMP |

### clients
| column | type | options |
|--------|----|-----------|
| id | INT(11) AI, PK |
| name | VARCHAR(255) NOT NULL |
| email | VARCHAR(255) NOT NULL |
| phonenumber | VARCHAR(255) NOT NULL |
| address | VARCHAR(255) NOT NULL |
| city | VARCHAR(255) NOT NULL |
| zipcode | VARCHAR(255) NOT NULL |
| status | VARCHAR(255) NOT NULL, DEFAULT VALUE 'active' | 'acttive' \| 'inactive' |
| created_at | DATETIME, CURRENT_TIMESTAMP |
| updated_at | TIMESTAMP, CURRENT_TIMESTAMP, ON UPDATE CURRENT_TIMESTAMP |

### time_registrations
| column | type | options |
|--------|----|-----------|
| id | INT(11) AI, PK |
| user_id | INT(11), FK REFERENCES users(id) |
| client_id | INT(11), FK REFERENCES clients(id) |
| type | VARCHAR(255) NOT NULL | 'development' \| 'marketing' |
| title | VARCHAR(255) NOT NULL |
| description | VARCHAR(255) NOT NULL |
| is_deleted | INT(1) DEFAULT 1 | '1' \| '0' |
| start_datetime | DATETIME NOT NULL |
| end_datetime | DATETIME NOT NULL |
| created_at | DATETIME, CURRENT_TIMESTAMP |
| updated_at | TIMESTAMP, CURRENT_TIMESTAMP, ON UPDATE CURRENT_TIMESTAMP |