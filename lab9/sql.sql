select role from roles join movies on id = movie_id where name='pi';

select  a.first_name, a.last_name from actors a join (select r.actor_id from roles r join movies m on m.id = r.movie_id where name='Pi') rr on a.id = rr.actor_id;

select  a.first_name, a.last_name from actors a join (select r.actor_id from roles r join movies m on m.id = r.movie_id where name='Kill Bill: Vol. 1') rr on a.id = rr.actor_id join (select r.actor_id from roles r join movies m on m.id = r.movie_id where name='Kill Bill: Vol. 2') rrr on a.id = rrr.actor_id;



select b.count, a.first_name, a.last_name
from actors a
join (select actor_id,count(movie_id) count
from roles
group by actor_id
order by count(movie_id) desc) b
on a.id = b.actor_id
limit 7;


select count(movie_id) count_movie,genre
from movies_genres
group by genre
order by count(movie_id) desc
limit 3;

select dd.first_name,dd.last_name,e.count_movie
from directors dd
join (select director_id,count(d.movie_id) count_movie
from movies_directors d
join movies_genres g
on d.movie_id = g.movie_id
where g.genre = 'Thriller'
group by d.director_id
order by count(d.movie_id) desc) e
on e.director_id = dd.id
limit 1;






select grade
from courses c
join grades g on g.course_id = c.id
where c.name = 'Computer Science 143';

select s.name,g.grade
from courses c
join grades g on g.course_id = c.id
join students s on g.student_id = s.id
where c.name = 'Computer Science 143' and g.grade <= 'B-';

select s.name,g.grade
from courses c
join grades g on g.course_id = c.id
join students s on g.student_id = s.id
where g.grade <= 'B-';

select c.name
from courses c
join (select course_id,count(course_id) 
from grades 
group by course_id
having count(course_id) >= 2) n
on n.course_id = c.id;

