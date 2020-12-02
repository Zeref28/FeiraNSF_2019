drop database Feira2019;
Create database Feira2019;
Use Feira2019;

Create table tb_schedules(
id_hour int primary key auto_increment not null,
hr_arrival time
);

Create table tb_schooling(
id_schooling int primary key auto_increment not null,
ds_schooling varchar(80)
);

Create table tb_visitors(
id_visitor int primary key auto_increment not null,
nm_name varchar(100) not null,
ds_email varchar(255) not null,
ds_telephone varchar(16) not null,
ds_district varchar(45) not null,
id_hour int not null,
id_schooling int not null,
foreign key (id_hour) references tb_schedules (id_hour),
foreign key (id_schooling) references tb_schooling (id_schooling)
);

Create table tb_institution(
id_institution int primary key auto_increment not null,
nm_institution varchar(80)
);

Create table tb_course(
id_course int primary key auto_increment not null,
nm_course varchar(100) not null,
id_institution int not null,
foreign key (id_institution) references tb_institution (id_institution)
);

Create table tb_course_interest(
id_ci  int primary key auto_increment not null,
id_visitor int not null,
id_course int not null,
foreign key(id_visitor) references tb_visitors (id_visitor),
foreign key(id_course) references tb_course (id_course)
);