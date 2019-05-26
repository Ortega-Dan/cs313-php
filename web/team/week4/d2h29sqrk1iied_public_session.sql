create table session
(
    keyid         serial  not null
        constraint session_pk
            primary key,
    sessionnumber integer not null
);

alter table session
    owner to pfxozvbrrfxjcj;

INSERT INTO public.session (keyid, sessionnumber) VALUES (1, 1);
INSERT INTO public.session (keyid, sessionnumber) VALUES (2, 2);
INSERT INTO public.session (keyid, sessionnumber) VALUES (3, 3);
INSERT INTO public.session (keyid, sessionnumber) VALUES (4, 4);
INSERT INTO public.session (keyid, sessionnumber) VALUES (5, 5);
INSERT INTO public.session (keyid, sessionnumber) VALUES (6, 6);