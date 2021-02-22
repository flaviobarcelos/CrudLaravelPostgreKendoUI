CREATE DATABASE teste
    WITH 
    OWNER = homestead
    ENCODING = 'UTF8'
    CONNECTION LIMIT = -1;
	
CREATE TABLE public.pais
(
    id integer NOT NULL,
    nome character varying(30) NOT NULL,
    PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
);

CREATE TABLE public.pessoa
(
    id integer NOT NULL,
    nome character varying(50) NOT NULL,
    nascimento date,
    genero character(1),
    pais_id integer NOT NULL,
    PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
);

CREATE SEQUENCE public.seq_pais;

CREATE SEQUENCE public.seq_pessoa;

INSERT INTO public.pais(
	id, nome)
	VALUES (nextval('public.seq_pais'), 'Brasil');
	
INSERT INTO public.pais(
	id, nome)
	VALUES (nextval('public.seq_pais'), 'United States of America');