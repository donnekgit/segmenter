--
-- PostgreSQL database dump
--

SET client_encoding = 'UTF8';
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: parsed; Type: TABLE; Schema: public; Owner: kevin; Tablespace: 
--

CREATE TABLE parsed (
    parse_id serial NOT NULL,
    ineg character varying(50),
    prefix character varying(100),
    tense character varying(100),
    rel character varying(50),
    "object" character varying(50),
    root character varying(50),
    plus character varying(50),
    english character varying(50),
    "mode" character varying(50),
    suffix character varying(50)
);


ALTER TABLE public.parsed OWNER TO kevin;

--
-- Name: parsed_parse_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kevin
--

SELECT pg_catalog.setval(pg_catalog.pg_get_serial_sequence('parsed', 'parse_id'), 1, true);


--
-- Data for Name: parsed; Type: TABLE DATA; Schema: public; Owner: kevin
--

COPY parsed (parse_id, ineg, prefix, tense, rel, "object", root, plus, english, "mode", suffix) FROM stdin;
1		wa[sp2-3p]	singe[neg-cond]	\N	\N	ju		know	a[unmarked]	\N
\.


--
-- Name: parse_pkey; Type: CONSTRAINT; Schema: public; Owner: kevin; Tablespace: 
--

ALTER TABLE ONLY parsed
    ADD CONSTRAINT parse_pkey PRIMARY KEY (parse_id);


--
-- PostgreSQL database dump complete
--

