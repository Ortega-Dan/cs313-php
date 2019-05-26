create table client
(
	keyid serial
		constraint client_pk
			primary key,
	name varchar(50) not null,
	socialid int not null
);

create unique index client_name_uindex
	on client (name);

create unique index client_socialid_uindex
	on client (socialid);

-----------------------------------------------------
create table employee
(
	keyid serial
		constraint employee_pk
			primary key,
	name varchar(50) not null,
	personalid int not null,
	entrydate date not null
);

create unique index employee_personalid_uindex
	on employee (personalid);

--------------------------------------------------------------
create table assignment
(
	keyid serial
		constraint assignment_pk
			primary key,
	client_id serial
		constraint assignment_client_keyid_fk
			references client (keyid),
	employee_id serial
		constraint assignment_employee_keyid_fk
			references employee (keyid)
);

----------------------------------------------------
create table email
(
	keyid serial
		constraint email_pk
			primary key,
	client_id serial
			references client (keyid),
	employee_id serial
			references employee (keyid),
	email_address varchar(40) not null
);

create unique index email_email_address_uindex
on email(email_address);

----------------------------------------------------
create table phone
(
	keyid serial
		constraint phone_pk
			primary key,
	client_id serial
			references client (keyid),
	employee_id serial
			references employee (keyid),
	phone_number varchar(40) not null
);

create unique index phone_phone_number_uindex
on phone(phone_number);
----------------------------------------------------
create table address
(
	keyid serial
		constraint address_pk
			primary key,
	client_id serial
			references client (keyid),
	employee_id serial
			references employee (keyid),
	physical_address varchar(80) not null
);

create unique index address_physical_address_uindex
on address(physical_address);

-------------------------------------------------------

insert into client values (0,'null-client',0);
insert into employee values (0,'null-employee',0,'1900-01-01');

