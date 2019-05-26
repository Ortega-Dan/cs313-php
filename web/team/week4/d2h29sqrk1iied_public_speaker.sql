create table speaker
(
    keyid serial      not null
        constraint speaker_pk
            primary key,
    name  varchar(25) not null
);

alter table speaker
    owner to pfxozvbrrfxjcj;

INSERT INTO public.speaker (keyid, name) VALUES (1, 'Uchtdorf');
INSERT INTO public.speaker (keyid, name) VALUES (2, 'Holland');