DROP TABLE clienti CASCADE CONSTRAINTS;

DROP TABLE servicii CASCADE CONSTRAINTS;

DROP TABLE furnizori CASCADE CONSTRAINTS;


DROP TABLE programari CASCADE CONSTRAINTS;


DROP TABLE recenzii CASCADE CONSTRAINTS;



CREATE TABLE clienti (
  id INT NOT NULL PRIMARY KEY,
  nume VARCHAR2(15) NOT NULL,
  prenume VARCHAR2(30) NOT NULL,
  telefon VARCHAR2(10),
  trust NUMBER,
  created_at DATE,
  updated_at DATE
)
/


CREATE TABLE furnizori (
  id INT NOT NULL PRIMARY KEY,
  nume VARCHAR2(52) NOT NULL,
  ora_desc DATE,
  ora_inc DATE,
  tip_serv VARCHAR2(42),
  trust_lvl NUMBER(3),
  created_at DATE,
  updated_at DATE
)
/


CREATE TABLE servicii (
  id INT NOT NULL PRIMARY KEY,
  nume VARCHAR2(52),
  tip VARCHAR2(52),
  avg_time DATE,
  created_at DATE,
  updated_at DATE
  )
/

CREATE TABLE programari (
  id INT NOT NULL PRIMARY KEY,
  id_client INT NOT NULL,
  id_furnizor INT NOT NULL,
  id_serviciu INT NOT NULL,
  data_programare DATE NOT NULL,
  ora_programare  DATE NOT NULL,
  atendance VARCHAR2(52),
  created_at DATE,
  updated_at DATE,
  CONSTRAINT fk_programari_id_client FOREIGN KEY (id_client) REFERENCES clienti(id),
  CONSTRAINT fk_programari_id_furnizor FOREIGN KEY (id_furnizor) REFERENCES furnizori(id),
  CONSTRAINT fk_programari_id_serviciu FOREIGN KEY (id_serviciu) REFERENCES servicii(id)
)
/

CREATE TABLE recenzii (
  id INT NOT NULL PRIMARY KEY,
  id_client INT NOT NULL,
  id_furnizor INT NOT NULL,
  id_serviciu INT NOT NULL,
  rating NUMBER(3),
  rating_text VARCHAR2(300),
  created_at DATE,
  updated_at DATE,
  CONSTRAINT fk_recenzii_id_client FOREIGN KEY (id_client) REFERENCES clienti(id),
  CONSTRAINT fk_recenzii_id_furnizor FOREIGN KEY (id_furnizor) REFERENCES furnizori(id),
  CONSTRAINT fk_recenzii_id_serviciu FOREIGN KEY (id_serviciu) REFERENCES servicii(id)
)
/


SET SERVEROUTPUT ON;
DECLARE
 TYPE varr IS VARRAY(1000) OF varchar2(255);
  lista_nume varr := varr('Ababei','Acasandrei','Adascalitei','Afanasie','Agafitei','Agape','Aioanei','Alexandrescu','Alexandru','Alexe','Alexii','Amarghioalei','Ambroci','Andonesei','Andrei','Andrian','Andrici','Andronic','Andros','Anghelina','Anita','Antochi','Antonie','Apetrei','Apostol','Arhip','Arhire','Arteni','Arvinte','Asaftei','Asofiei','Aungurenci','Avadanei','Avram','Babei','Baciu','Baetu','Balan','Balica','Banu','Barbieru','Barzu','Bazgan','Bejan','Bejenaru','Belcescu','Belciuganu','Benchea','Bilan','Birsanu','Bivol','Bizu','Boca','Bodnar','Boistean','Borcan','Bordeianu','Botezatu','Bradea','Braescu','Budaca','Bulai','Bulbuc-aioanei','Burlacu','Burloiu','Bursuc','Butacu','Bute','Buza','Calancea','Calinescu','Capusneanu','Caraiman','Carbune','Carp','Catana','Catiru','Catonoiu','Cazacu','Cazamir','Cebere','Cehan','Cernescu','Chelaru','Chelmu','Chelmus','Chibici','Chicos','Chilaboc','Chile','Chiriac','Chirila','Chistol','Chitic','Chmilevski','Cimpoesu','Ciobanu','Ciobotaru','Ciocoiu','Ciofu','Ciornei','Citea','Ciucanu','Clatinici','Clim','Cobuz','Coca','Cojocariu','Cojocaru','Condurache','Corciu','Corduneanu','Corfu','Corneanu','Corodescu','Coseru','Cosnita','Costan','Covatariu','Cozma','Cozmiuc','Craciunas','Crainiceanu','Creanga','Cretu','Cristea','Crucerescu','Cumpata','Curca','Cusmuliuc','Damian','Damoc','Daneliuc','Daniel','Danila','Darie','Dascalescu','Dascalu','Diaconu','Dima','Dimache','Dinu','Dobos','Dochitei','Dochitoiu','Dodan','Dogaru','Domnaru','Dorneanu','Dragan','Dragoman','Dragomir','Dragomirescu','Duceac','Dudau','Durnea','Edu','Eduard','Eusebiu','Fedeles','Ferestraoaru','Filibiu','Filimon','Filip','Florescu','Folvaiter','Frumosu','Frunza','Galatanu','Gavrilita','Gavriliuc','Gavrilovici','Gherase','Gherca','Ghergu','Gherman','Ghibirdic','Giosanu','Gitlan','Giurgila','Glodeanu','Goldan','Gorgan','Grama','Grigore','Grigoriu','Grosu','Grozavu','Gurau','Haba','Harabula','Hardon','Harpa','Herdes','Herscovici','Hociung','Hodoreanu','Hostiuc','Huma','Hutanu','Huzum','Iacob','Iacobuta','Iancu','Ichim','Iftimesei','Ilie','Insuratelu','Ionesei','Ionesi','Ionita','Iordache','Iordache-tiroiu','Iordan','Iosub','Iovu','Irimia','Ivascu','Jecu','Jitariuc','Jitca','Joldescu','Juravle','Larion','Lates','Latu','Lazar','Leleu','Leon','Leonte','Leuciuc','Leustean','Luca','Lucaci','Lucasi','Luncasu','Lungeanu','Lungu','Lupascu','Lupu','Macariu','Macoveschi','Maftei','Maganu','Mangalagiu','Manolache','Manole','Marcu','Marinov','Martinas','Marton','Mataca','Matcovici','Matei','Maties','Matrana','Maxim','Mazareanu','Mazilu','Mazur','Melniciuc-puica','Micu','Mihaela','Mihai','Mihaila','Mihailescu','Mihalachi','Mihalcea','Mihociu','Milut','Minea','Minghel','Minuti','Miron','Mitan','Moisa','Moniry-abyaneh','Morarescu','Morosanu','Moscu','Motrescu','Motroi','Munteanu','Murarasu','Musca','Mutescu','Nastaca','Nechita','Neghina','Negrus','Negruser','Negrutu','Nemtoc','Netedu','Nica','Nicu','Oana','Olanuta','Olarasu','Olariu','Olaru','Onu','Opariuc','Oprea','Ostafe','Otrocol','Palihovici','Pantiru','Pantiruc','Paparuz','Pascaru','Patachi','Patras','Patriche','Perciun','Perju','Petcu','Pila','Pintilie','Piriu','Platon','Plugariu','Podaru','Poenariu','Pojar','Popa','Popescu','Popovici','Poputoaia','Postolache','Predoaia','Prisecaru','Procop','Prodan','Puiu','Purice','Rachieru','Razvan','Reut','Riscanu','Riza','Robu','Roman','Romanescu','Romaniuc','Rosca','Rusu','Samson','Sandu','Sandulache','Sava','Savescu','Schifirnet','Scortanu','Scurtu','Sfarghiu','Silitra','Simiganoschi','Simion','Simionescu','Simionesei','Simon','Sitaru','Sleghel','Sofian','Soficu','Sparhat','Spiridon','Stan','Stavarache','Stefan','Stefanita','Stingaciu','Stiufliuc','Stoian','Stoica','Stoleru','Stolniceanu','Stolnicu','Strainu','Strimtu','Suhani','Tabusca','Talif','Tanasa','Teclici','Teodorescu','Tesu','Tifrea','Timofte','Tincu','Tirpescu','Toader','Tofan','Toma','Toncu','Trifan','Tudosa','Tudose','Tuduri','Tuiu','Turcu','Ulinici','Unghianu','Ungureanu','Ursache','Ursachi','Urse','Ursu','Varlan','Varteniuc','Varvaroi','Vasilache','Vasiliu','Ventaniuc','Vicol','Vidru','Vinatoru','Vlad','Voaides','Vrabie','Vulpescu','Zamosteanu','Zazuleac');
  lista_prenume_fete varr := varr('Adina','Alexandra','Alina','Ana','Anca','Anda','Andra','Andreea','Andreia','Antonia','Bianca','Camelia','Claudia','Codrina','Cristina','Daniela','Daria','Delia','Denisa','Diana','Ecaterina','Elena','Eleonora','Elisa','Ema','Emanuela','Emma','Gabriela','Georgiana','Ileana','Ilona','Ioana','Iolanda','Irina','Iulia','Iuliana','Larisa','Laura','Loredana','Madalina','Malina','Manuela','Maria','Mihaela','Mirela','Monica','Oana','Paula','Petruta','Raluca','Sabina','Sanziana','Simina','Simona','Stefana','Stefania','Tamara','Teodora','Theodora','Vasilica','Xena');
  lista_prenume_baieti varr := varr('Adrian','Alex','Alexandru','Alin','Andreas','Andrei','Aurelian','Beniamin','Bogdan','Camil','Catalin','Cezar','Ciprian','Claudiu','Codrin','Constantin','Corneliu','Cosmin','Costel','Cristian','Damian','Dan','Daniel','Danut','Darius','Denise','Dimitrie','Dorian','Dorin','Dragos','Dumitru','Eduard','Elvis','Emil','Ervin','Eugen','Eusebiu','Fabian','Filip','Florian','Florin','Gabriel','George','Gheorghe','Giani','Giulio','Iaroslav','Ilie','Ioan','Ion','Ionel','Ionut','Iosif','Irinel','Iulian','Iustin','Laurentiu','Liviu','Lucian','Marian','Marius','Matei','Mihai','Mihail','Nicolae','Nicu','Nicusor','Octavian','Ovidiu','Paul','Petru','Petrut','Radu','Rares','Razvan','Richard','Robert','Roland','Rolland','Romanescu','Sabin','Samuel','Sebastian','Sergiu','Silviu','Stefan','Teodor','Teofil','Theodor','Tudor','Vadim','Valentin','Valeriu','Vasile','Victor','Vlad','Vladimir','Vladut');
  lista_nume_furnizori varr := varr('A','B','C','D','E');
  lista_servicii varr := varr('A','B','C');
  lista_tip varr := varr('A','B','C','D');
  lista_tip_servi varr := varr('A','B','C','D');
  
  v_nume VARCHAR2(255);
  v_prenume VARCHAR2(255);
  v_prenume1 VARCHAR2(255);
  v_prenume2 VARCHAR2(255);
  v_matr VARCHAR2(10);
  v_matr_aux VARCHAR2(6);
  v_temp int;
  v_temp1 int;
  v_temp2 int;
  v_inc DATE;
  v_des DATE;
  v_date DATE;
  v_hour DATE;
  v_avg DATE;
  v_temp3 int;
  v_trust NUMBER(3);
  v_client int;
  v_furniz int;
  v_serv int;
  v_index int;
  v_rating NUMBER(3);
  v_temp_date date;
BEGIN

  --populare clienti
  FOR v_i IN 1..1000 LOOP
     v_nume := lista_nume(TRUNC(DBMS_RANDOM.VALUE(0,lista_nume.count))+1);
      IF (DBMS_RANDOM.VALUE(0,100)<50) THEN      
         v_prenume1 := lista_prenume_fete(TRUNC(DBMS_RANDOM.VALUE(0,lista_prenume_fete.count))+1);
         LOOP
            v_prenume2 := lista_prenume_fete(TRUNC(DBMS_RANDOM.VALUE(0,lista_prenume_fete.count))+1);
            exit when v_prenume1<>v_prenume2;
         END LOOP;
       ELSE
         v_prenume1 := lista_prenume_baieti(TRUNC(DBMS_RANDOM.VALUE(0,lista_prenume_baieti.count))+1);
         LOOP
            v_prenume2 := lista_prenume_baieti(TRUNC(DBMS_RANDOM.VALUE(0,lista_prenume_baieti.count))+1);
            exit when v_prenume1<>v_prenume2;
         END LOOP;       
       END IF;
     
     IF (DBMS_RANDOM.VALUE(0,100)<60) THEN  
        IF LENGTH(v_prenume1 || ' ' || v_prenume2) <= 20 THEN
          v_prenume := v_prenume1 || ' ' || v_prenume2;
        END IF;
        else 
           v_prenume:=v_prenume1;
      END IF;
      
      
      
     LOOP
         v_matr := '0' || '7' || FLOOR(DBMS_RANDOM.VALUE(0,9)) || FLOOR(DBMS_RANDOM.VALUE(0,9)) || FLOOR(DBMS_RANDOM.VALUE(0,9))|| FLOOR(DBMS_RANDOM.VALUE(0,9))|| FLOOR(DBMS_RANDOM.VALUE(0,9))|| FLOOR(DBMS_RANDOM.VALUE(0,9))|| FLOOR(DBMS_RANDOM.VALUE(0,9))|| FLOOR(DBMS_RANDOM.VALUE(0,9));
          v_trust := TRUNC(DBMS_RANDOM.VALUE(0,10));
         select count(*) into v_temp from clienti where telefon = v_matr and trust=v_trust;
         exit when v_temp=0;
      END LOOP;

  insert into clienti values(v_i, v_nume, v_prenume,v_matr ,v_trust , sysdate, sysdate);
   END LOOP; 
   -- sfarsit populare clienti
   
   --inceput populare firnizori
   FOR v_i IN 1..200 LOOP
     v_nume := lista_nume_furnizori(TRUNC(DBMS_RANDOM.VALUE(0,lista_nume_furnizori.count))+1);
     v_prenume := lista_tip_servi(TRUNC(DBMS_RANDOM.VALUE(0,lista_tip_servi.count))+1);
     v_trust := TRUNC(DBMS_RANDOM.VALUE(0,10));
     v_des := TO_DATE('00:00','HH24:MI')+TRUNC(DBMS_RANDOM.VALUE(7,14))/24; 
     v_inc := v_des+(8/24)+1/24;
     
     insert into furnizori values(v_i,v_nume,v_des,v_inc,v_prenume,v_trust,sysdate,sysdate);
   end loop;
   --sfarsit populare furnizori
   
   --inceput populare servicii
   FOR v_i IN 1..200 LOOP
    v_nume := lista_servicii(TRUNC(DBMS_RANDOM.VALUE(0,lista_servicii.count))+1);
    v_prenume := lista_tip(TRUNC(DBMS_RANDOM.VALUE(0,lista_tip.count))+1);
    v_avg := TO_DATE('00:00','hh24:mi')+trunc(DBMS_RANDOM.VALUE(1,3))/24;

    insert into servicii values(v_i,v_nume,v_prenume,v_avg,sysdate,sysdate);
   END LOOP;
   --sfarsit populare servicii

  --inceput populare programari
  v_index:=1;
  for v_i in 1..200 loop

LOOP
    v_client := TRUNC(DBMS_RANDOM.VALUE(1,1000));
         v_furniz := TRUNC(DBMS_RANDOM.VALUE(1,200));
         v_serv := TRUNC(DBMS_RANDOM.VALUE(1,100));
         select count(*) into v_temp from programari where id_furnizor=v_furniz and id_serviciu=v_serv and id_client=v_client;
         exit when v_temp=0;
      END LOOP;
v_date := sysdate+TRUNC(DBMS_RANDOM.VALUE(-60,60));
select Avg_time into v_avg from servicii where id=v_serv;
select ORA_DESC,ORA_INC into v_des,v_inc from furnizori where id = v_furniz;
v_hour := v_des;
 loop
 v_hour:=to_date(to_char(to_number(to_char(v_hour,'hh24'))+to_number(to_char(v_avg,'hh24'))) || ':' || to_char(v_hour,'MI'),'HH24:MI');
--DBMS_OUTPUT.PUT_LINE('v_hout' || to_char(v_hour,'HH24:MI')); 
 if(to_number(to_char(v_hour,'HH24'))>to_number(to_char(v_des,'HH24')) and (to_number(to_char(v_hour,'HH24'))<to_number(to_char(v_inc,'HH24')))) then
  if(sysdate < v_date ) then
    insert into programari values(v_index,v_client,v_furniz,v_serv,v_date,v_hour,null,sysdate,sysdate);
  else
    if(trunc(dbms_random.value(1,4))<3)then
      insert into programari values(v_index,v_client,v_furniz,v_serv,v_date,v_hour,'TRUE',sysdate,sysdate);
    ELSE
      insert into programari values(v_index,v_client,v_furniz,v_serv,v_date,v_hour,'FALSE',sysdate,sysdate);
    end if;
  end if;
 ELSE
  EXIT;
 END IF;
 v_index:=v_index+1;
 end loop;
end loop;
   --sfarsit popilare programari;
   
   --inceput populare recenzii;
 FOR v_i IN 1..1000 LOOP
    
    LOOP
    v_client := TRUNC(DBMS_RANDOM.VALUE(1,1000));
         v_furniz := TRUNC(DBMS_RANDOM.VALUE(1,200));
        v_serv := TRUNC(DBMS_RANDOM.VALUE(1,100));
         v_rating := TRUNC(DBMS_RANDOM.VALUE(-1,11));
         select count(*) into v_temp from recenzii where id_furnizor=v_furniz and id_serviciu=v_serv and rating=v_rating and id_client=v_client;
         exit when v_temp=0;
      END LOOP;
   
   
    insert into recenzii values(v_i ,v_client , v_furniz ,v_serv ,v_rating, NULL , sysdate, sysdate);
  END LOOP;
  
  
END;

CREATE OR REPLACE PROCEDURE calculeaza_trust_factor_single (id_val IN number) AS
cursor lista_programari is select atendance from programari where id_client=id_val;
v_trust NUMBER(3);
v_atendance VARCHAR2(10);
begin
select trust into v_trust from clienti where id=id_val;
OPEN lista_programari;
LOOP
    FETCH lista_programari into v_atendance;
    EXIT WHEN lista_programari%NOTFOUND;
    if(v_atendance = 'FALCE') THEN
      v_trust:=v_trust-1;
    else
      if(v_atendance = 'TRUE') then 
        v_trust := v_trust+1;
      end if;
    end if;
END LOOP;
if(v_trust<0)then
  v_trust := 0;
else
  if (v_trust > 10) then
    v_trust := 10;
  end if;
end if;
close lista_programari;
update clienti 
set trust = v_trust where id = id_val;
end;

CREATE OR REPLACE PROCEDURE calculeaza_trust_factor_all AS
CURSOR lista_clienti is select ID, TRUST from CLIENTI;
CURSOR lista_atendance (p_id NUMBER) is SELECT atendance FROM programari where id_client=p_id;
v_id NUMBER;
v_trust NUMBER(3);
v_atendance VARCHAR2(10);
begin
OPEN lista_clienti;
LOOP
    FETCH lista_clienti into v_id,v_trust;
    EXIT WHEN lista_clienti%NOTFOUND;
    open lista_atendance (v_id);
    LOOP
      fetch lista_atendance into v_atendance;
      exit when lista_atendance%NOTFOUND;
    if(v_atendance = 'FALCE') THEN
      v_trust:=v_trust-1;
    else
      if(v_atendance = 'TRUE') then 
        v_trust := v_trust+1;
      end if;
    end if;
    END LOOP;
close lista_atendance;
if(v_trust<0)then
  v_trust := 0;
else
  if (v_trust > 10) then
    v_trust := 10;
  end if;
end if;
update clienti set trust = v_trust where id = v_id;
END LOOP;
close lista_clienti;
end;

CREATE OR REPLACE PROCEDURE statistici_rating_pe_note (p_id IN NUMBER) as
v_stat NUMBER;
BEGIN
 for v_i in 0..10 loop
  select count(rating) into v_stat from recenzii where id_serviciu=p_id and rating=v_i;
  if(v_stat != 0) then
    DBMS_OUTPUT.PUT_LINE('rating-uri de '|| v_i || ': ' || v_stat);
  end if;
 end loop;
END;

CREATE OR REPLACE PROCEDURE statistici_rating_mediu (p_id IN NUMBER) as
v_stat NUMBER;
BEGIN
 
  select avg(rating) into v_stat from recenzii where id_serviciu=p_id;
    DBMS_OUTPUT.PUT_LINE('Rating mediu: '|| v_stat);

END;

create or replace procedure procent_clienti_veniti_la_timp (p_id NUMBER) as
v_atendance_t NUMBER;
V_atendance_f NUmber;
begin
 select count(atendance) into v_atendance_t from programari where id_furnizor = p_id and atendance='TRUE';
 select count(atendance) into v_atendance_f from programari where id_furnizor = p_id and atendance='FALSE';
 if (v_atendance_t + v_atendance_f != 0 ) then
 DBMS_OUTPUT.PUT_LINE( round((v_atendance_t * 100) / (v_atendance_t + v_atendance_f)) || '% din clienti au avenit la programari');
 end if;
end;

DECLARE
cursor lista is select unique(id_furnizor) from PROGRAMARI;
v_variabila number;
BEGIN
STATISTICI_RATING_PE_NOTE(11);
DBMS_OUTPUT.PUT_LINE('');
STATISTICI_RATING_MEDIU(11);
open lista;
loop
fetch lista into v_variabila;
exit when lista%NOTFOUND;
procent_clienti_veniti_la_timp(v_variabila);
end loop;
END;


--select unique(id_furnizor ) from PROGRAMARI;
--select id,ID_CLIENT,ID_FURNIZOR,ID_SERVICIU,to_char(DATA_PROGRAMARE,'dd-mm-yyyy'),to_char(ORA_PROGRAMARE,'hh24:mi'),ATENDANCE from programari order by ID_FURNIZOR;
--select rating from recenzii where id_serviciu=11;
--select count(id_serviciu) from recenzii where id_client= 670 group by id_client;
--select max(count(*)) from recenzii group by id_client having count(*) !=2;