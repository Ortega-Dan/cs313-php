create table address
(
    keyid            serial      not null
        constraint address_pk
            primary key,
    client_id        serial      not null
        constraint address_client_id_fkey
            references client,
    employee_id      serial      not null
        constraint address_employee_id_fkey
            references employee,
    physical_address varchar(80) not null
);

create unique index address_physical_address_uindex
    on address (physical_address);

INSERT INTO public.address (keyid, client_id, employee_id, physical_address) VALUES (1, 2, 0, '56 Something Dr, 45612');
INSERT INTO public.address (keyid, client_id, employee_id, physical_address) VALUES (2, 0, 1, '18 Main St, 89163');
INSERT INTO public.address (keyid, client_id, employee_id, physical_address) VALUES (3, 4, 0, '44 Tree Ln, 28916');
INSERT INTO public.address (keyid, client_id, employee_id, physical_address) VALUES (4, 3, 0, '123 Fake Rd, 17981');
INSERT INTO public.address (keyid, client_id, employee_id, physical_address) VALUES (5, 0, 2, '5 Round Pkwy, 18915');
INSERT INTO public.address (keyid, client_id, employee_id, physical_address) VALUES (6, 0, 3, '543 Fair Hw, 16815');
INSERT INTO public.address (keyid, client_id, employee_id, physical_address) VALUES (7, 6, 0, '84 Super Dr, 86413');

create table assignment
(
    keyid       serial not null
        constraint assignment_pk
            primary key,
    client_id   serial not null
        constraint assignment_client_keyid_fk
            references client,
    employee_id serial not null
        constraint assignment_employee_keyid_fk
            references employee
);

INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (1, 4, 2);
INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (2, 5, 6);
INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (3, 6, 4);
INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (4, 3, 1);
INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (5, 1, 5);
INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (6, 4, 3);
INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (7, 6, 7);
INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (8, 4, 1);
INSERT INTO public.assignment (keyid, client_id, employee_id) VALUES (9, 2, 4);

create table client
(
    keyid    serial      not null
        constraint client_pk
            primary key,
    name     varchar(50) not null,
    socialid integer     not null
);

create unique index client_name_uindex
    on client (name);

create unique index client_socialid_uindex
    on client (socialid);

INSERT INTO public.client (keyid, name, socialid) VALUES (0, 'null-client', 0);
INSERT INTO public.client (keyid, name, socialid) VALUES (1, 'Brinks', 789465);
INSERT INTO public.client (keyid, name, socialid) VALUES (2, 'CocaCola', 1981561);
INSERT INTO public.client (keyid, name, socialid) VALUES (3, 'Level', 784539);
INSERT INTO public.client (keyid, name, socialid) VALUES (4, 'Alpina', 321458);
INSERT INTO public.client (keyid, name, socialid) VALUES (5, 'Addidas', 91569);
INSERT INTO public.client (keyid, name, socialid) VALUES (6, 'PriceSmart', 54918);

create table email
(
    keyid         serial      not null
        constraint email_pk
            primary key,
    client_id     serial      not null
        constraint email_client_id_fkey
            references client,
    employee_id   serial      not null
        constraint email_employee_id_fkey
            references employee,
    email_address varchar(40) not null
);

create unique index email_email_address_uindex
    on email (email_address);

INSERT INTO public.email (keyid, client_id, employee_id, email_address) VALUES (1, 0, 1, 'robin@williams.com');
INSERT INTO public.email (keyid, client_id, employee_id, email_address) VALUES (2, 4, 0, 'alpina@cheese.com');
INSERT INTO public.email (keyid, client_id, employee_id, email_address) VALUES (3, 3, 0, 'support@level.com');
INSERT INTO public.email (keyid, client_id, employee_id, email_address) VALUES (4, 0, 2, 'abraham.lincoln@usa.gov');
INSERT INTO public.email (keyid, client_id, employee_id, email_address) VALUES (5, 0, 3, 'oprah@music.net');
INSERT INTO public.email (keyid, client_id, employee_id, email_address) VALUES (6, 6, 0, 'sales@pricesmart.co');

create table employee
(
    keyid      serial      not null
        constraint employee_pk
            primary key,
    name       varchar(50) not null,
    personalid integer     not null,
    entrydate  date        not null
);

create unique index employee_personalid_uindex
    on employee (personalid);

INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (0, 'null-employee', 0, '1900-01-01');
INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (1, 'Robin Williams', 4813245, '1989-04-11');
INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (2, 'Abraham Lincoln', 3758643, '1982-01-02');
INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (3, 'Oprah Someone', 84153, '1963-12-29');
INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (4, 'Michael Jackson', 79843749, '1991-01-22');
INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (5, 'Taylor Swift', 328537, '2017-01-22');
INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (6, 'Joseph Smith', 39451, '1820-04-04');
INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (7, 'Steed Parker', 6963654, '2008-12-23');
INSERT INTO public.employee (keyid, name, personalid, entrydate) VALUES (8, 'Ashley Gonzalez', 1915615, '2015-09-12');

create table phone
(
    keyid        serial      not null
        constraint phone_pk
            primary key,
    client_id    serial      not null
        constraint phone_client_id_fkey
            references client,
    employee_id  serial      not null
        constraint phone_employee_id_fkey
            references employee,
    phone_number varchar(40) not null
);

create unique index phone_phone_number_uindex
    on phone (phone_number);

INSERT INTO public.phone (keyid, client_id, employee_id, phone_number) VALUES (1, 0, 1, '1800-callnow');
INSERT INTO public.phone (keyid, client_id, employee_id, phone_number) VALUES (2, 4, 0, '504-305-1546');
INSERT INTO public.phone (keyid, client_id, employee_id, phone_number) VALUES (3, 3, 0, '304-415-1820');
INSERT INTO public.phone (keyid, client_id, employee_id, phone_number) VALUES (4, 0, 2, '+18014891545');
INSERT INTO public.phone (keyid, client_id, employee_id, phone_number) VALUES (5, 0, 3, 'skype:oprahaccount');
INSERT INTO public.phone (keyid, client_id, employee_id, phone_number) VALUES (6, 6, 0, '800-4567889');