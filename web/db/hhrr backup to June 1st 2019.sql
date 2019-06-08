drop table address;
drop table phone;
drop table email;
drop table assignment;
drop table employee;
drop table client;


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

INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (0, 'null-employee', 0, '1900-01-01');
INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (1, 'Robin Williams', 4813245, '1989-04-11');
INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (2, 'Abraham Lincoln', 3758643, '1982-01-02');
INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (3, 'Oprah Someone', 84153, '1963-12-29');
INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (4, 'Michael Jackson', 79843749, '1991-01-22');
INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (5, 'Taylor Swift', 328537, '2017-01-22');
INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (6, 'Joseph Smith', 39451, '1820-04-04');
INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (7, 'Steed Parker', 6963654, '2008-12-23');
INSERT INTO employee (keyid, name, personalid, entrydate) VALUES (8, 'Ashley Gonzalez', 1915615, '2015-09-12');


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

INSERT INTO client (keyid, name, socialid) VALUES (0, 'null-client', 0);
INSERT INTO client (keyid, name, socialid) VALUES (1, 'Brinks', 789465);
INSERT INTO client (keyid, name, socialid) VALUES (2, 'CocaCola', 1981561);
INSERT INTO client (keyid, name, socialid) VALUES (3, 'Level', 784539);
INSERT INTO client (keyid, name, socialid) VALUES (4, 'Alpina', 321458);
INSERT INTO client (keyid, name, socialid) VALUES (5, 'Addidas', 91569);
INSERT INTO client (keyid, name, socialid) VALUES (6, 'PriceSmart', 54918);


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

INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (1, 2, 0, '56 Something Dr, 45612');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (2, 0, 1, '18 Main St, 89163');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (3, 4, 0, '44 Tree Ln, 28916');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (4, 3, 0, '123 Fake Rd, 17981');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (5, 0, 2, '5 Round Pkwy, 18915');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (6, 0, 3, '543 Fair Hw, 16815');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (7, 6, 0, '84 Super Dr, 86413');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (8, 5, 0, 'Addidas Address Somewhere');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (9, 0, 4, 'Nicest House at 1st Drive');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (10, 0, 8, 'Nice Apartment at 1st Drive SLC Utah');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (11, 1, 0, 'Calle 26 #34, Bog, Colombia');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (12, 0, 6, 'Log House in Palmyra');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (13, 0, 7, 'Near the palm, California');
INSERT INTO address (keyid, client_id, employee_id, physical_address) VALUES (15, 0, 5, 'The House of the Music, WA');


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

INSERT INTO assignment (keyid, client_id, employee_id) VALUES (1, 4, 2);
INSERT INTO assignment (keyid, client_id, employee_id) VALUES (2, 5, 6);
INSERT INTO assignment (keyid, client_id, employee_id) VALUES (3, 6, 4);
INSERT INTO assignment (keyid, client_id, employee_id) VALUES (4, 3, 1);
INSERT INTO assignment (keyid, client_id, employee_id) VALUES (5, 1, 5);
INSERT INTO assignment (keyid, client_id, employee_id) VALUES (6, 4, 3);
INSERT INTO assignment (keyid, client_id, employee_id) VALUES (7, 6, 7);
INSERT INTO assignment (keyid, client_id, employee_id) VALUES (8, 4, 1);
INSERT INTO assignment (keyid, client_id, employee_id) VALUES (9, 2, 4);


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

INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (1, 0, 1, 'robin@williams.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (2, 4, 0, 'alpina@cheese.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (3, 3, 0, 'support@level.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (4, 0, 2, 'abraham.lincoln@usa.gov');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (5, 0, 3, 'oprah@music.net');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (6, 6, 0, 'sales@pricesmart.co');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (7, 5, 0, 'sales@Addidas.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (8, 0, 4, 'michael@jackson.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (9, 0, 8, 'ashleyandpacho@mamail.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (10, 1, 0, 'someone@epago.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (11, 2, 0, 'deliciousdrink@coke.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (12, 0, 6, 'prophet@restoredchurch.org');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (13, 0, 7, 'greatfriend@buddies.com');
INSERT INTO email (keyid, client_id, employee_id, email_address) VALUES (15, 0, 5, 'fancyhousie@taylorswift.com');



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

INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (1, 0, 1, '1800-callnow');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (2, 4, 0, '504-305-1546');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (3, 3, 0, '304-415-1820');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (4, 0, 2, '+18014891545');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (5, 0, 3, 'skype:oprahaccount');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (6, 6, 0, '800-4567889');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (7, 5, 0, '196145123541');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (8, 0, 4, '198156123');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (10, 0, 8, '275363636');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (11, 1, 0, '4271854');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (12, 2, 0, '18000000000');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (13, 0, 6, '789456132');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (14, 0, 7, '123456789');
INSERT INTO phone (keyid, client_id, employee_id, phone_number) VALUES (17, 0, 5, 'facetime:taylorswift');