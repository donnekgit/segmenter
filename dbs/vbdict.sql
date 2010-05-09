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
-- Name: vbdict; Type: TABLE; Schema: public; Owner: kevin; Tablespace: 
--

CREATE TABLE vbdict (
    id integer NOT NULL,
    swahili character varying(100),
    pos character varying(50),
    plus character varying(50),
    sw_class character varying(10),
    english character varying(250),
    root character varying(100)
);


ALTER TABLE public.vbdict OWNER TO kevin;

--
-- Data for Name: vbdict; Type: TABLE DATA; Schema: public; Owner: kevin
--

COPY vbdict (id, swahili, pos, plus, sw_class, english, root) FROM stdin;
353	fahamu	v		15	understand	f-h-m
369	fasiri	v		15	translate	f-s-r
2778	ona	v		15	feel	on
407	fungasha	v	caus	15	tow	fung
988	la	v		15	eat	l
1688	nena	v		15	speak	nen
1734	nyamaza	v	caus	15	be quiet	nyama
1768	oga	v		15	bathe	og
1785	ongoza	v	caus	15	drive	ongo
1786	onja	v		15	taste	onj
2863	ona	v	\N	15	see	on
3	acha	v		15	leave	ach
2767	acha	v		15	quit, stop doing sth	ach
2	abudu	v		15	worship, revere, adore	c-b-d
350	faa	v		15	be useful	fa
349	fa	v		15	die	f
367	fariki	v		15	die	f-r-q
370	faulu	v		15	be successful, achieve	f-c-l
373	ficha	v		15	hide	fich
376	fika	v		15	arrive	fik
378	fikiri	v		15	consider	f-k-r
399	fumba	v		15	close	fumb
2864	onana	v	assoc	15	meet	on
4	achana	v	assoc	15	leave one another, separate, divorce	ach
2768	achana	v	assoc	15	differ, diverge	ach
358	fanana	v	assoc	15	resemble	fa
2862	onekana	v	stat_assoc	15	seem	on
2865	onekana	v	stat_assoc	15	be apparent	on
361	fanikiwa	v	prep_pass	15	succeed	f-n-q
993	lainisha	v	caus	15	smooth	l-i-n
379	fikisha	v	caus	15	deliver	fik
392	fuatisha	v	caus	15	copy	fuat
333	endesha	v	caus	15	manage, drive	end
1772	ogopesha	v	caus	15	frighten, scare	oga
1784	ongeza	v	caus	15	increase	onge
2866	onya	v	caus	15	warn	on
362	fanya	v	caus	15	make	fa
342	epua	v	conv	15	take off, remove	ep
374	fichua	v	conv	15	uncover, reveal	fich
400	fumbua	v	conv	15	open	fumb
401	fumua	v	conv	15	unravel	fum
1773	okoa	v	conv	15	save	okoa
1779	ondoa	v	conv	15	take away	ondo
1780	ondoka	v	conv_stat	15	go away	ondo
343	epuka	v	conv_stat	15	avoid	ep
1792	ota	v	cont	15	grow	ot
390	fuata	v	cont	15	follow	fuat
1771	ogopa	v	inc	15	fear, be afraid	oga
1728	nukia	v	prep	15	smell good	nuk
377	fikia	v	prep	15	arrive at	fik
331	endea	v	prep	15	go to	end
1791	oshea	v	prep	15	wash	og
1769	ogea	v	prep	15	bathe in	og
1783	ongea	v	prep	15	converse	onge
332	endelea	v	prep_prep	15	continue	end
1770	ogelea	v	prep_prep	15	swim	og
5	achilia	v	prep_prep	15	forgive	ach
391	fuatilia	v	prep_prep	15	investigate	fuat
18	aga	v		15	leave, say goodbye	ag
2769	agana	v	assoc	15	say goodbye, exchange farewells	ag
19	agana	v	assoc	15	agree, make an agreement	ag
2832	agiza	v	caus	15	order, place an order	ag
23	agiza	v	caus	15	order, command, instruct; direct, instruct, give instructions	ag
24	agizia	v	caus_prep	15	order for	ag
27	aibisha	v	caus	15	embarrass, shame; humiliate	c-i-b
42	alika	v		15	invite	alik
50	amka	v		15	wake, get up	amk
51	amkia	v	prep	15	greet	amk
52	amkiana	v	prep_assoc	15	greet each other	amk
54	amriwa	v	prep_pass	15	be ordered	a-m-r
55	amsha	v	caus	15	awaken	amk
56	amshwa	v	caus_pass	15	be awakened	amk
2656	zungumzia	v	prep	15	converse in	zungumz
2655	zungumza	v		15	discuss	zungumz
2654	zunguka	v	stat	15	go round	zungu
2652	zuilia	v	prep	15	withhold from	zui
2651	zuia	v		15	hinder	zui
2617	zaa	v		15	bear, give birth	za
2623	zaliwa	v	prep_pass	15	be born	za
2634	ziba	v		15	stop up	zib
2635	zibua	v	conv	15	unstop	zib
2636	zidi	v		15	increase	z-a-d
2637	zidisha	v	caus	15	multiply	z-a-d
2642	zimia	v	prep	15	faint	zim
2640	zima	v		15	put out	zim
2648	zoeza	v	caus	15	accustom	zoe
2588	winda	v		15	hunt	wind
2582	wezesha	v	caus	15	enable	wez
2581	wezekana	v	stat_assoc	15	be possible	wez
2568	weka	v		15	put	wek
2569	wekea	v	prep	15	put aside for	wek
2570	wekwa	v	pass	15	be put	wek
2562	waza	v		15	think	waz
2481	waka	v		15	burn	wak
2469	wahi	v		15	be in time	w-hh-i
2423	vutia	v	prep	15	fascinate, attract	vut
2422	vuta	v		15	pull	vut
2421	vuruga	v		15	stir up	vurug
2419	vunja	v		15	break	vunj
2420	vunjika	v	stat	15	be broken	vunj
2418	vuna	v		15	reap	vun
2415	vuka	v	stat	15	cross over	vu
2414	vuja	v		15	leak	vuj
2786	vua	v		15	fish, catch fish	vu
2412	vua	v	conv	15	undress	va
2357	vimba	v		15	swell	vimb
2312	vaa	v		15	dress	va
2307	uza	v		15	sell	uz
2270	unganisha	v	assoc_caus	15	merge	ung
2269	unga	v		15	join	ung
2265	umwa	v	pass	15	be sick	um
2785	umwa	v	pass	15	be in pain	um
2257	umia	v	prep	15	be injured	um
2254	umba	v		15	create	umb
2250	uliza	v		15	ask	uliz
2784	ua	v		15	destroy	u
2186	tupa	v		15	throw	tup
2184	tunza	v		15	care for	tunz
2181	tundikia	v	prep	15	hang up on	tundik
2177	tumiwa	v	prep_pass	15	be used	tum
2176	tumilia	v	prep_prep	15	use for	tum
2175	tumika	v	stat	15	be in service	tum
2174	tumia	v	prep	15	use	tum
2170	tumaini	v		15	trust	tw-m-n
2783	tumai	v		15	expect, hope	tw-m-c
2169	tumai	v		15	desire	tw-m-c
2168	tuliza	v	caus	15	pacify	tul
2166	tubu	v		15	repent	t-w-b
2165	tua	v		15	set down	tu
2161	toza	v	caus	15	collect	to
2162	tozwa	v	caus_pass	15	be collected	to
2160	toweka	v	stat	15	disappear	to
2159	tosha	v		15	be enough	tosh
2158	toroka	v		15	run away	torok
2155	tolea	v	prep	15	put out for	to
2153	toka	v	stat	15	go out	to
2154	tokea	v	stat_prep	15	appear	to
2151	toa	v		15	take out	to
2141	tia	v		15	put	ti
2142	tilia	v	prep	15	put in	ti
2143	timia	v	prep	15	be complete	t-m
2150	tiwa	v	pass	15	be put	ti
2136	tetemeka	v	stat	15	shiver	tetem
2134	telemka	v	pos_stat	15	descend, get off	tele
2132	tengenezwa	v	caus_pass	15	be repaired	tengene
2131	tengenezea	v	caus_prep	15	repair for	tengene
2130	tengeneza	v	caus	15	repair	tengene
2129	tengana	v	assoc	15	be separated	teng
2124	tembelea	v	prep	15	visit	tembe
2123	tembea	v		15	walk	tembe
2119	tegemea	v		15	expect, rely on	tegeme
2118	tazama	v		15	look, look at	tazam
2117	tayarishia	v	caus_prep	15	prepare for	t-a-r
2109	taraja	v		15	hope, intend	t-r-j
2106	tangulia	v		15	precede	tanguli
2101	tangaza	v	caus	15	proclaim	tang
2098	tandikwa	v	stat_pass	15	be laid out	tand
2097	tandika	v	stat	15	lay out	tand
2095	tambua	v		15	realize	tambu
2782	tambua	v		15	recognize	tambu
2091	takiwa	v	prep_pass	15	be requested	tak
2089	taka	v		15	want	tak
2087	taja	v		15	mention	taj
2084	tahadhari	v		15	be careful	hh-dh-r
2083	tafuta	v		15	look for	tafut
2082	tafuna	v		15	chew	tafun
2070	sumbua	v	conv	15	trouble	sumb
2069	sukutua	v		15	rinse mouth	sukutu
2068	sukuma	v		15	push	sukum
2064	starehe	v		15	be comfortable	r-a-hh
2060	somesha	v	caus	15	teach	som
2059	soma	v		15	read	som
2049	sita	v		15	hesitate	sit
2041	simulia	v		15	tell a story, narrate	simuli
2038	simama	v		15	stand	simam
2033	sikitika	v		15	be sorry	sikitik
2031	sikiliza	v	caus	15	listen	siki
2030	sikia	v		15	hear	siki
2781	sikia	v		15	feel	siki
2026	sifia	v		15	recommend	sw-f-f
2016	shuka	v	stat	15	descend, get off	shu
2013	shona	v		15	sew	shon
2011	shiriki	v		15	cooperate, participate	sh-r-k
2009	shindwa	v	pass	15	be overcome	shind
2007	shinda	v		15	overcome	shind
2003	shika	v		15	hold on to	shik
2001	shiba	v		15	be full	shib
1992	shangaa	v		15	be amazed, be surprised	shanga
1981	sema	v		15	speak	sem
2193	ua	v		15	kill; murder	u
49	amini	v		15	believe	a-m-n
57	amua	v		15	decide	amu
58	amuru	v		15	command, order	a-m-r
61	andika	v		15	write	andik
65	anga	v		15	fly	ang
2770	angalia	v	prep	15	be careful, watch out	anga
66	angalia	v	prep	15	look at, observe	anga
2840	angalia	v	prep	15	take care of	anga
2841	angalia	v	prep	15	pay attention	anga
2771	angaza	v	caus	15	illuminate, brighten	anga
68	angazia	v	caus_prep	15	shine on	anga
67	angaza	v	caus	15	shine, glow	anga
2842	angaza	v	caus	15	observe. look intently	anga
70	angua	v	conv	15	knock down, throw down	ang
71	anguka	v	conv_stat	15	fall	ang
72	angukia	v	conv_stat_prep	15	fall into, fall on, fall onto	ang
2833	angusha	v	conv_caus	15	topple, tumble, overthrow (esp. government, ruler)	ang
73	angusha	v	conv_caus	15	drop	ang
2839	angusha	v	conv_caus	15	let down, disappoint	ang
75	anza	v		15	begin, initiate, launch	anz
76	anzisha	v	caus	15	start up, begin, initiate, launch	anz
80	arifu	v		15	inform	c-r-f
91	azima	v	pos	15	borrow, lend	c-z-m
103	babaika	v		15	be confused, hesitate	babaik
104	babaisha	v	caus	15	confuse	babaik
2772	badili	v		15	exchange, barter	b-d-l
107	badili	v		15	substitute, change	b-d-l
108	badilisha	v	caus	15	exchange, change	b-d-l
109	badilishwa	v	caus_pass	15	be changed	b-d-l
120	bahatisha	v	caus	15	hazard; take a chance	b-x-t
123	baki	v		15	remain	b-q-i
130	bana	v		15	squeeze	ban
136	bandua	v	conv	15	take off	band
135	bandika	v	stat	15	stick on	band
147	bariki	v		15	bless	b-r-k
152	beba	v		15	carry	beb
165	bidi	v		15	oblige	b-d-a
176	bisha	v		15	knock at the door	bish
178	bishana	v	assoc	15	argue	bish
183	bomoa	v		15	break down	bomo
187	boresha	v	caus	15	improve	b-r-r
205	chagua	v		15	choose	chagu
213	chana	v		15	slit	chan
217	changanya	v	assoc_caus	15	mix	chang
218	changia	v	prep	15	contribute to	chang
221	changua	v	conv	15	separate	chang
222	chanika	v	stat	15	be torn	chan
223	chanjia	v	prep	15	vaccinate	chanj
226	chapa	v		15	beat, hit	chap
227	chapa	v		15	print	chap
229	cheka	v		15	laugh	chek
230	chekelea	v	prep_prep	15	smile	chek
231	chekesha	v	caus	15	amuse	chek
234	chelewa	v	prep_pass	15	delay	ch
235	chemka	v		15	boil, seethe	chemk
236	chemsha	v	caus	15	boil, heat up	chemk
238	chemshwa	v	caus_pass	15	be boiled	chemk
246	cheza	v		15	play	chez
247	chezacheza	v	redup	15	play at	chez
250	chinja	v		15	slaughter	chinj
251	chipua	v		15	sprout	chipu
252	choka	v		15	get tired	chok
2773	choma	v		15	pierce, stab	chom
253	choma	v		15	burn, roast	chom
257	chubuka	v	stat	15	be bruised	chubu
260	chukia	v	prep	15	hate	chuk
261	chukiza	v	caus	15	offend	chuk
262	chukua	v		15	carry; take	chuku
263	chukulia	v	prep	15	carry for	chuku
265	chuma	v		15	gather	chum
268	chunga	v		15	watch over	chung
280	dai	v		15	claim, demand	d-c-w
285	danganya	v		15	lie, deceive, cheat	dangany
298	dhani	v		15	think	dw-n
299	dharau	v		15	despise	dw-r-c
300	dhuru	v		15	harm	dw-r
310	dunda	v		15	bounce	dund
312	duru	v		15	rotate	d-u-r
314	egesha	v	caus	15	park	eg
2774	elea	v		15	float, levitate	ele
316	elea	v		15	be clear	ele
317	elekea	v	stat_prep	15	face	ele
318	elekeza	v	stat_caus	15	direct	ele
319	elewa	v	pass	15	know	ele
320	elewana	v	pass_assoc	15	reach an agreement	ele
321	eleza	v	caus	15	explain	ele
324	elimika	v	stat	15	be educated	c-l-m
363	fanyia	v	caus_prep	15	do for	fa
364	fanyika	v	caus_stat	15	be done	fa
380	fikishwa	v	caus_pass	15	be delivered	fik
389	fua	v		15	wash (by beating)	fu
394	fukuza	v		15	drive out	fukuz
397	fuliwa	v	prep_pass	15	be washed (by beating)	ful
398	fuma	v		15	weave	fum
403	fundisha	v	caus	15	teach	fund
406	funga	v		15	fasten, close	fung
408	fungia	v	prep	15	fasten with	fung
409	fungua	v	conv	15	unfasten, open	fung
410	funguliwa	v	conv_pass	15	be opened	fung
412	fungwa	v	pass	15	be closed	fung
414	funua	v	conv	15	uncover	fun
413	funika	v	stat	15	cover	fun
415	funza	v	caus	15	teach	fund
417	fupisha	v	caus	15	shorten	fup
419	furahi	v		15	rejoice	f-r-hh
421	futa	v		15	wipe	fut
422	futia	v	prep	15	wipe with	fut
662	jibu	v		15	answer	j-u-b
664	jifunza	v	refl_caus	15	learn	fund
424	ganga	v		15	cure	gang
429	gawa	v		15	divide	gaw
430	gawanya	v	assoc_caus	15	share	gaw
435	geuka	v	stat	15	turn around	geu
439	ghasi	v		15	confuse	gh-s
441	ghasiwa	v	prep_pass	15	be disturbed	gh-s
446	gogota	v		15	tap	gogot
447	gomba	v		15	contradict	gomb
448	gombana	v	assoc	15	quarrel	gomb
449	gonga	v		15	beat, hit	gong
450	gongana	v	assoc	15	collide with, bump into one another	gong
458	gusa	v		15	touch	gus
472	hakikisha	v	caus	15	make sure, make certain	hh-q-q
481	hama	v		15	move from	ham
483	hamia	v	prep	15	move to	ham
499	haribu	v		15	destroy	kh-r-b
506	hasiri	v		15	damage	kh-s-r
533	hesabu	v		15	count	hh-s-b
535	heshimu	v		15	show respect, honour	hh-sh-m
537	hiari	v		15	choose, prefer	kh-i-r
545	hisi	v		15	sense, feel	hh-s
547	hitaji	v		15	need	hh-t-j
562	hudhuria	v	prep	15	attend, participate, be present	hh-dw-r
564	hudumia	v	prep	15	assist	kh-d-m
565	hudumu	v		15	serve	kh-d-m
581	husiana	v	assoc	15	be related	kh-sw
582	husika	v	stat	15	be involved	kh-sw
2775	husu	v		15	concern	kh-sw
583	husu	v		15	give a share	kh-sw
588	iba	v		15	steal	ib
591	ibiwa	v	prep_pass	15	be robbed	ib
595	iga	v		15	imitate	ig
596	igiza	v	caus	15	mimic	ig
606	imarisha	v	caus	15	strengthen	c-m-r
607	imba	v		15	sing	imb
610	inama	v	pos	15	bend down	in
616	ingiza	v	caus	15	put in	ingi
613	ingia	v		15	enter	ingi
614	ingilia	v	prep	15	enter into	ingi
621	inua	v	conv	15	lift up	in
622	inuka	v	conv_stat	15	get up	in
626	ishi	v		15	live	c-a-sh
630	ita	v		15	call	it
631	itika	v	stat	15	answer	it
632	itwa	v	pass	15	be called	it
635	jaa	v		15	fill up	ja
648	jaribu	v		15	test	j-r-b
651	jaza	v	caus	15	fill	ja
655	jenga	v		15	build	jeng
658	jeruhi	v		15	injure, wound	j-r-hh
682	jua	v		15	know	ju
685	julikana	v	prep_stat_assoc	15	be known	ju
2834	julisha	v	prep_caus	15	introduce someone	ju
686	julisha	v	prep_caus	15	inform	ju
698	juta	v		15	regret	jut
2776	kaa	v		15	stay, reside, live	ka
702	kaa	v		15	sit	ka
2849	kaa	v	\N	15	fit, suit	ka
705	kaanga	v		15	fry	kaang
722	kama	v		15	squeeze	kam
725	kamata	v	cont	15	catch; hold	kam
727	kamili	v		15	complete	k-m-l
730	kamua	v	conv	15	squeeze out	kam
733	kana	v		15	deny	kan
735	kanda	v		15	knead	kand
737	kandwa	v	pass	15	be kneaded	kand
739	kanusha	v	conv_caus	15	refute	kan
747	karibia	v	prep	15	approach	q-r-b
748	karibisha	v	caus	15	welcome, invite	q-r-b
754	kasirika	v	stat	15	be angry	q-sw-r
760	kata	v		15	cut	kat
761	kataa	v		15	refuse	kata
762	kataza	v	caus	15	forbid	kata
769	katwa	v	pass	15	be cut	kat
770	kauka	v		15	dry up	kauk
771	kaukwa	v	pass	15	be dried up	kauk
772	kaushia	v	caus_prep	15	dry with	kauk
775	kaza	v		15	tighten	kaz
844	kimbia	v		15	run away	kimbi
845	kimbilia	v	prep	15	run to	kimbi
846	kimbiza	v	caus	15	drive away	kimbi
913	kodishwa	v	caus_pass	15	be rented	kodi
912	kodisha	v	caus	15	rent out	kodi
916	kohoa	v		15	cough	koho
918	komesha	v	caus	15	bring to an end, stop	kom
925	kopesha	v	caus	15	lend	kop
923	kopa	v		15	borrow	kop
928	koroga	v		15	stir, mix (e.g. ingredients)	korog
930	kosa	v		15	miss	kos
931	kosana	v	assoc	15	quarrel	kos
932	kosea	v	prep	15	be mistaken	kos
933	kosekana	v	stat_assoc	15	fail	kos
938	kubali	v		15	agree	q-b-l
937	kua	v		15	grow up	ku
948	kumbusha	v	caus	15	remind	kumbuk
947	kumbuka	v		15	remember	kumbuk
952	kunja	v		15	fold	kunj
953	kunjua	v	conv	15	unfold	kunj
962	kuta	v		15	come across	kut
963	kutana	v	assoc	15	meet	kut
974	kwajuka	v		15	fade	kwajuk
977	kwama	v	pos	15	stick	kwa
2777	lala	v		15	lie down, sleep	lal
998	lala	v		15	sleep	lal
999	lalia	v	prep	15	sleep in	lal
1003	laza	v	caus	15	lay down	lal
1005	lazimu	v		15	be required of	l-z-m
1008	lemea	v		15	press upon	leme
1007	lea	v		15	bring up	le
1014	leta	v		15	bring	let
1015	letea	v	prep	15	bring to	let
1017	lewa	v		15	get drunk	lew
1018	lia	v		15	cry out	li
1023	lima	v		15	hoe	lim
1027	linda	v		15	guard	lind
1029	lipa	v		15	pay	lip
1032	lisha	v	caus	15	feed	l
1186	maliza	v		15	finish	maliz
1335	meza	v		15	swallow	mez
1661	nawa	v		15	wash hands	naw
1699	ngoja	v		15	wait	ngoj
1700	ngojea	v	prep	15	wait for	ngoj
1727	nuka	v		15	smell bad	nuk
1729	nunua	v		15	buy	nunu
1730	nusa	v	caus	15	sniff out	nuk
1735	nyang'anya	v		15	rob	nyang'any
1742	nyesha	v	caus	15	rain	ny
1746	nyoa	v		15	shave	nyo
1764	nywa	v		15	drink	nyw
1767	oa	v		15	marry	o
1775	olewa	v	prep_pass	15	be married	o
1776	omba	v		15	beg	omb
1795	oza	v		15	rot	oz
1796	pa	v		15	give	p
1804	paka	v		15	apply	pak
1806	pakia	v	prep	15	load	pak
1811	pambazuka	v	stat	15	dawn	pambazu
1817	panda	v		15	plant	pand
2780	panda	v		15	climb	pand
1819	panga	v		15	arrange, order, put in order	pang
1832	pasua	v		15	split	pasu
1834	patana	v	assoc	15	agree	pat
1833	pata	v		15	get	pat
1835	patia	v	prep	15	get for	pat
1836	patikana	v	stat_assoc	15	be obtainable	pat
1839	peleka	v		15	send	pelek
1840	pelekea	v	prep	15	send for	pelek
1841	pelekewa	v	prep_pass	15	be sent to	pelek
1842	pelekwa	v	pass	15	be sent	pelek
1844	penda	v		15	love	pend
1845	pendelea	v	prep_prep	15	favor	pend
1846	pendeza	v	caus	15	please	pend
1849	penya	v	caus	15	penetrate	peny
1861	pia	v	prep	15	give for	p
1864	piga	v		15	hit, beat	pig
1875	pigana	v	assoc	15	fight	pig
1876	pigia	v	prep	15	hit for	pig
1877	pika	v		15	cook	pik
1878	pikia	v	prep	15	cook in, cook for	pik
1881	pima	v		15	measure	pim
1882	pinda	v		15	bend	pind
1884	pindwa	v	pass	15	be twisted	pind
1885	pinga	v		15	oppose	ping
1888	pitia	v	prep	15	pass by	pit
1887	pita	v		15	pass	pit
1889	poa	v		15	cool down	po
1890	pokea	v		15	accept, receive, take, take in	poke
1897	pona	v		15	get well	po
1898	ponda	v		15	crush	pond
1900	ponya	v	caus	15	cure	po
1904	potea	v	prep	15	get lost	pot
1906	poza	v	caus	15	cool	po
1908	pumzika	v	caus_stat	15	rest	pum
1912	pungua	v	conv	15	diminish	pung
1913	punguza	v	conv_caus	15	reduce	pung
1915	pwaya	v		15	be loose	pway
1932	rudi	v		15	return	r-d-d
1933	rudisha	v	caus	15	send back	r-d-d
1935	ruhusiwa	v	prep_pass	15	be permitted	r-kh-sw
1936	ruhusu	v		15	permit	r-kh-sw
1937	ruka	v		15	jump	ruk
1943	sadiki	v		15	believe	sw-d-q
1946	safiri	v		15	travel	s-f-r
1947	safiria	v	prep	15	travel by	s-f-r
1948	safirisha	v	caus	15	send off	s-f-r
1949	safisha	v	caus	15	cleanse	sw-a-f
1950	saga	v		15	grind	sag
1952	sahau	v		15	forget	s-h-a
1955	sahihisha	v	caus	15	correct	sw-hh-hh
1956	saidia	v		15	help	s-c-d
1957	saidiwa	v	pass	15	be helped	s-c-d
1961	sali	v		15	pray	sw-l-a
1962	salimu	v		15	greet	s-l-m
1967	samehe	v		15	forgive	s-m-hh
2018	shukuru	v		15	thank	sh-k-r
47	ambia	v	prep	15	tell	amb1
48	ambukiza	v	conv_stat_caus	15	infect	amb2
2445	wa	v		15	be	w
63	andikwa	v	pass	15	be written	andik
351	fagia	v		15	sweep	fagi
355	faidi	v		15	profit, benefit	f-a-d
356	faidika	v	stat	15	profit from	f-a-d
359	fananisha	v	assoc_caus	15	liken	fa
625	isha	v		15	finish	ish
740	kanya	v	caus	15	rebuke	kan
966	kuza	v	caus	15	enlarge	ku
1781	ondokea	v	stat_prep	15	rise up	ondo
2867	onyesha	v	caus_caus	15	show	on
1859	pewa	v	pass	15	be given	p
1905	poteza	v	prep_caus	15	lose	pot
2252	uma	v		15	bite	um
2580	weza	v		15	be able	wez
498	haribika	v	stat	15	break down	kh-r-b
1790	osha	v	caus	15	wash	og
0	enda	v	\N	15	go	end
\.


--
-- Name: vbdict_pkey; Type: CONSTRAINT; Schema: public; Owner: kevin; Tablespace: 
--

ALTER TABLE ONLY vbdict
    ADD CONSTRAINT vbdict_pkey PRIMARY KEY (id);


--
-- Name: swahili_index; Type: INDEX; Schema: public; Owner: kevin; Tablespace: 
--

CREATE INDEX swahili_index ON vbdict USING btree (swahili);


--
-- Name: vbdict_english_index; Type: INDEX; Schema: public; Owner: kevin; Tablespace: 
--

CREATE INDEX vbdict_english_index ON vbdict USING btree (english);


--
-- Name: vbdict_pos_index; Type: INDEX; Schema: public; Owner: kevin; Tablespace: 
--

CREATE INDEX vbdict_pos_index ON vbdict USING btree (pos);


--
-- Name: vbdict_root_index; Type: INDEX; Schema: public; Owner: kevin; Tablespace: 
--

CREATE INDEX vbdict_root_index ON vbdict USING btree (root);


--
-- PostgreSQL database dump complete
--

