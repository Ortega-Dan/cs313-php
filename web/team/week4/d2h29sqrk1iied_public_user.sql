create table "user"
(
    keyid    bigserial   not null
        constraint user_pk
            primary key,
    name     varchar(50) not null,
    password varchar(10) not null
);

alter table "user"
    owner to pfxozvbrrfxjcj;

create unique index user_keyid_uindex
    on "user" (keyid);

INSERT INTO public."user" (keyid, name, password) VALUES (1, 'Dancho', 'Password');