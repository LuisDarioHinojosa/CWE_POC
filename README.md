# CWE_POC
SQL Injection probe of concept for cibersecurity class 
Create Database:
```
docker-compose up
docker exec -it mysql_backend bash
mysql -u root -p # enter password (docker-compose.yaml)
create database stuff;
use stuff;
create table users(user_id int unsigned not null auto_increment,name varchar(50),username varchar(50),password varchar(50),primary key(user_id));
insert into users(name,username,password) values ("name1","mail1","password1");
insert into users(name,username,password) values ("name2","mail2","password2");
```

For exporting database:
```
docker exec mysql_backend /usr/bin/mysqldump -u root --password=cisco stuff > backup.sql
```


