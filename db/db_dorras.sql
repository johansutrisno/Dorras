//coba3, coba3, coba


ALTER SESSION SET NLS_DATE_FORMAT="DD-MM-YYYY";
            
CREATE TABLE dorras_role(
	id_role NUMBER(2),
	role VARCHAR2(10),
	CONSTRAINT pk_id_role PRIMARY KEY (id_role)
);

CREATE TABLE dorras_user(
	id_user NUMBER(10) NOT NULL,
	email VARCHAR2(30) NOT NULL,
	password VARCHAR2(20) NOT NULL,
	id_role  NUMBER(10) NOT NULL,
	CONSTRAINT pk_dorras_user PRIMARY KEY (id_user),
	CONSTRAINT fk_dorras_user FOREIGN KEY (id_role) REFERENCES dorras_role ON DELETE CASCADE
);

CREATE SEQUENCE id_user_seq START WITH 1;

CREATE OR REPLACE TRIGGER id_user_bir
BEFORE INSERT ON dorras_user
FOR EACH ROW

BEGIN
  SELECT id_user_seq.NEXTVAL
  INTO   :new.id_user
  FROM   dual;
END;
/


CREATE TABLE dorras_event(
  id_event NUMBER(10) NOT NULL,
  location VARCHAR2(50) NOT NULL,
  nama_event VARCHAR2(30) NOT NULL,
  img_event VARCHAR2(20) NOT NULL,
  desc_event VARCHAR2(100) NOT NULL,
  start_event DATE NOT NULL,
  end_event DATE NOT NULL,
  lat_location FLOAT NOT NULL,
  lon_location FLOAT NOT NULL,
  state NUMBER(2) NOT NULL,
  score_event NUMBER(5) NOT NULL,
  id_user NUMBER(10),
  CONSTRAINT pk_dorars_event PRIMARY KEY (id_event),
	CONSTRAINT fk_dorras_event FOREIGN KEY (id_user) REFERENCES dorras_user ON DELETE CASCADE
);

CREATE SEQUENCE id_event_seq START WITH 1;

CREATE OR REPLACE TRIGGER id_event_bir
BEFORE INSERT ON dorras_event
FOR EACH ROW

BEGIN
  SELECT id_event_seq.NEXTVAL
  INTO   :new.id_event
  FROM   dual;
END;
/

CREATE TABLE participant(
	id_participant NUMBER(10) NOT NULL,
	id_user NUMBER(10),
	id_event NUMBER(10),
	status CHAR(3) NOT NULL,
	CONSTRAINT pk_participant PRIMARY KEY (id_participant),
	CONSTRAINT fk_participant FOREIGN KEY (id_user) REFERENCES dorras_user ON DELETE CASCADE,
	CONSTRAINT fk_participant2 FOREIGN KEY (id_event) REFERENCES dorras_event ON DELETE CASCADE
);

CREATE SEQUENCE id_participant_seq START WITH 1;

CREATE OR REPLACE TRIGGER id_participant_bir
BEFORE INSERT ON participant
FOR EACH ROW

BEGIN
  SELECT id_participant_seq.NEXTVAL
  INTO   :new.id_participant
  FROM   dual;
END;
/

CREATE TABLE dorras_article(
  id_article NUMBER(10) NOT NULL,
  img_article VARCHAR2(20),
  judul_article VARCHAR2(100) NOT NULL,
  isi_article VARCHAR2(1000) NOT NULL,
  id_user NUMBER(10),
  CONSTRAINT pk_dorras_article PRIMARY KEY (id_article),
  CONSTRAINT fk_dorras_article FOREIGN KEY (id_user) REFERENCES dorras_user ON DELETE CASCADE
);

CREATE SEQUENCE id_article_seq START WITH 1;

CREATE OR REPLACE TRIGGER id_article_bir
BEFORE INSERT ON dorras_article
FOR EACH ROW

BEGIN
  SELECT id_article_seq.NEXTVAL
  INTO   :new.id_article
  FROM   dual;
END;
/

CREATE TABLE dorras_faq
(
  id_faq NUMBER(10),
  nama VARCHAR2(30),
  email VARCHAR2(30),
  pertanyaan VARCHAR2(255) NOT NULL,
  jawaban VARCHAR2(255),
  id_user NUMBER(10),
  CONSTRAINT pk_dorras_faq PRIMARY KEY (id_faq),
  CONSTRAINT fk_dorras_faq FOREIGN KEY (id_user) REFERENCES dorras_user ON DELETE CASCADE
);

CREATE SEQUENCE id_faq_seq START WITH 1;

CREATE OR REPLACE TRIGGER id_faq_bir
BEFORE INSERT ON dorras_faq
FOR EACH ROW

BEGIN
  SELECT id_faq_seq.NEXTVAL
  INTO   :new.id_faq
  FROM   dual;
END;
/

CREATE TABLE proposal(
  id_proposal NUMBER(10),
  nama_event VARCHAR2(30),
  proposal VARCHAR2(30),
  status_proposal CHAR(3),
  id_user NUMBER(10),
  CONSTRAINT pk_proposal PRIMARY KEY (id_proposal),
  CONSTRAINT fk_proposal FOREIGN KEY (id_user) REFERENCES dorras_user ON DELETE CASCADE
);

CREATE SEQUENCE id_proposal_seq START WITH 1;

CREATE OR REPLACE TRIGGER id_proposal_bir
BEFORE INSERT ON proposal
FOR EACH ROW

BEGIN
  SELECT id_proposal_seq.NEXTVAL
  INTO   :new.id_proposal
  FROM   dual;
END;
/