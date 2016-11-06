create DATABASE college;

create table student(
	student_id integer	NOT NULL primary key,
	name	varchar(10)	NOT	NULL,
	year	integer	NOT	NULL default 1,
	dept_no	integer	NOT	NULL,
	major	varchar(20)
);

create table department(
	dept_no	integer	NOT	NULL primary key auto_increment,
	dept_name	varchar(20)	NOT	NULL unique,
	office	varchar(20)	NOT	NULL,
	office_tel	varchar(13)
);

alter table student modify major varchar(40) NOT NULL;

describe student;

alter table student add gender char(1);

alter table student drop gender;

insert into student values(20070002, '송은이', 3, 4, '경영학');
insert into student values(20060001, '박미선', 4, 4, '경영학');
insert into student values(20030001, '이경규', 4, 2, '전자공학');
insert into student values(20040003, '김용만', 3, 2, '전자공학');
insert into student values(20060002, '김국진', 3, 1, '컴퓨터공학');
insert into student values(20100002, '한선화', 3, 4, '경영학');
insert into student values(20110001, '송지은', 2, 1, '컴퓨터공학');
insert into student values(20080003, '전효성', 4, 3, '법학');
insert into student values(20040002, '김구라', 4, 5, '영문학');
insert into student values(20070001, '김숙', 4, 4, '경영학');
insert into student values(20100001, '황광희', 3, 4, '경영학');
insert into student values(20110002, '권지용', 2, 1, '전자공학'); 
insert into student values(20030002, '김재진', 5, 1, '컴퓨터공학');
insert into student values(20070003, '신봉선', 4, 3, '법학');
insert into student values(20070005, '김신영', 2, 5, '영문학');
insert into student values(20100003, '임시환', 3, 1, '컴퓨터공학'); 
insert into student values(20070007, '정준하', 2, 4, '경영학');
	
insert	into department (dept_name, office, office_tel) values('컴퓨터공학','이학관 101호','02-3290-0123');
insert	into department (dept_name, office, office_tel) values('전자공학','공학관 401호', '02-3290-2345');
insert	into department (dept_name, office, office_tel) values('법학','법학관 201호', '02-3290-7896');
insert	into department (dept_name, office, office_tel) values('경영학','경영관 104호', '02-3290-1112');
insert	into department (dept_name, office, office_tel) values('영문학', '문화관 303호', '02-3290-4412');
	
update department set dept_name='전자전기공학' where dept_name='전자공학'; 	
update student set major='전자전기공학' where major = '전자공학';

insert into department (dept_name, office, office_tel) values('특수교육학과','공학관 403호','02-3290-2347');
	
update student set major='특수교육학과' where name = '송지은';
update student set dept_no='6' where name='송지은';

delete from student where name='권지용';

delete from student where name='김재진';

select * from student where major='컴퓨터공학';

select student_id,year,major from student;

select * from student where year=3;

select * from student where year=2 or year=1;

select * from student join department using(dept_no) where major = '경영학'; 

select * from student where student_id like '2007%';

select * from student order by student_id;

select * from student group by major having avg(year) > 3;

select * from student where major='경영학' and student_id like '2007%' limit 2;


