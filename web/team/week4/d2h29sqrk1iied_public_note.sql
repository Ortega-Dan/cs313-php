create table note
(
    keyid   serial       not null
        constraint note_pk
            primary key,
    user_id serial       not null
        constraint note_user_keyid_fk
            references "user",
    talk_id serial       not null
        constraint note_talk_keyid_fk
            references talk,
    content varchar(400) not null
);

alter table note
    owner to pfxozvbrrfxjcj;

INSERT INTO public.note (keyid, user_id, talk_id, content) VALUES (1, 1, 2, 'Pres Utchdorf gave a good talk from his experience with flights');
INSERT INTO public.note (keyid, user_id, talk_id, content) VALUES (2, 1, 2, 'I am so touched by this talk');
INSERT INTO public.note (keyid, user_id, talk_id, content) VALUES (3, 1, 1, 'I felt the spirit');
INSERT INTO public.note (keyid, user_id, talk_id, content) VALUES (4, 1, 1, 'I will be better');
INSERT INTO public.note (keyid, user_id, talk_id, content) VALUES (5, 1, 3, 'Holland is the best');
INSERT INTO public.note (keyid, user_id, talk_id, content) VALUES (6, 1, 3, 'I will work hard to improve');