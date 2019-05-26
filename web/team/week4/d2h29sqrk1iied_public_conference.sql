create table conference
(
    keyid serial  not null
        constraint conference_pk
            primary key,
    year  integer not null,
    month integer not null
);

alter table conference
    owner to pfxozvbrrfxjcj;

INSERT INTO public.conference (keyid, year, month) VALUES (1, 2019, 4);