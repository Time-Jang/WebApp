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

insert into student values(20070002,'James Bond', 3, 4, 'Business Administration');
insert into student values(20060001, 'Queenie', 4, 4, 'Business Administration');
insert into student values(20030001, 'Reonardo', 4, 2, 'Electronic Engineering');
insert into student values(20040003, 'Julia', 3, 2, 'Electronic Engineering');
insert into student values(20060002, 'Roosevelt', 3, 1, 'Computer Science');
insert into student values(20100002, 'Fearne', 3, 4, 'Business Administration');
insert into student values(20110001, 'Chloe', 2, 1, 'Computer Science');
insert into student values(20080003, 'Amy', 4, 3, 'Law');
insert into student values(20040002, 'Selina', 4, 5, 'English Literature');
insert into student values(20070001, 'Ellen', 4, 4, 'Business Administration');
insert into student values(20100001, 'Kathy', 3, 4, 'Business Administration');
insert into student values(20110002, 'Lucy', 2, 2, 'Electronic Engineering');
insert into student values(20030002, 'Michelle', 5, 1, 'Computer Science');
insert into student values(20070003, 'April', 4, 3, 'Law');
insert into student values(20070005, 'Alicia', 2, 5, 'English Literature');
insert into student values(20100003, 'Yullia', 3, 1, 'Computer Science');
insert into student values(20070007, 'Ashlee', 2, 4, 'Business Administration');

insert	into department (dept_name, office, office_tel) values('Computer Science','Engineering building','02-3290-0123');
insert	into department (dept_name, office, office_tel) values('Electronic Engineering','Engineering building','02-3290-2345');
insert	into department (dept_name, office, office_tel) values('Law','Law building','02-3290-7896');
insert	into department (dept_name, office, office_tel) values('Business Administration','Administration building','02-3290-1112');
insert	into department (dept_name, office, office_tel) values('English Literature','Literature building','02-3290-4412');
	
update department set dept_name='Electronic and Electrical Engineering' where dept_name='Electronic engineering'; 	
update student set major='Electronic and Electrical Engineering' where major = 'Electronic engineering';

insert into department (dept_name, office, office_tel) values('Education','Education Building','02-3290-2347');
	
update student set major='Education' where name = 'Chloe';
update student set dept_no='6' where name='Chloe';

delete from student where name='Michelle';

delete from student where name='Fearne';

select * from student where major='Computer Science';

select student_id,year,major from student;

select * from student where year=3;

select * from student where year=2 or year=1;

select * from student join department using(dept_no) where major = 'Business Administration'; 

select * from student where student_id like '2007%';

select * from student order by student_id;

select * from student group by major having avg(year) > 3;

select * from student where major='Business Administration' and student_id like '2007%' limit 2;


