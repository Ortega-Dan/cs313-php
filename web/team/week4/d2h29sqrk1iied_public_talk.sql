create table talk
(
    keyid         serial not null
        constraint talk_pk
            primary key,
    speaker_id    serial not null
        constraint talk_speaker_keyid_fk
            references speaker,
    conference_id serial not null
        constraint talk_conference_keyid_fk
            references conference,
    session_id    serial not null
        constraint talk_session_keyid_fk
            references session
);

alter table talk
    owner to pfxozvbrrfxjcj;

INSERT INTO public.talk (keyid, speaker_id, conference_id, session_id) VALUES (1, 1, 1, 2);
INSERT INTO public.talk (keyid, speaker_id, conference_id, session_id) VALUES (2, 1, 1, 5);
INSERT INTO public.talk (keyid, speaker_id, conference_id, session_id) VALUES (3, 2, 1, 1);