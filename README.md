# php-message-board
This a learning repository for me to learn object oriented PHP.

You have to specify the following env variables:

- DB_HOST
- DB_USER
- DB_PASSWORD
- DB_NAME

The schema is not auto created yet. This app will need the following table:

| |	Name        |	Type         | Collation	        | Attributes | Null |	Default           |	Comments | Extra             |
|-|-------------|--------------|--------------------|------------|------|-------------------|----------|-------------------|
|1|	id          |	int(11)      |         	          |            | No   | None              |		       | AUTO_INCREMENT    |
|2|	title       |	varchar(255) | utf8mb4_general_ci |            | No	  | None              |		       |                   |
|3|	body        |	text         | utf8mb4_general_ci |            | No		|	                  |          |                   |
|4|	create_date | timestamp		 | 	                  |            | No   | CURRENT_TIMESTAMP	|	         | DEFAULT_GENERATED |

## My disclaimer
Be warned this is only a learning project. All code residing in this project and or repo is my attempt to learn 
how to build websites with OOP and PHP and database persistence.  
So it is possible that some code maybe not best practice or standard. 

