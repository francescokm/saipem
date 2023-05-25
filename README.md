<h1>Lembar Jawaban Untuk Siapem Indonesia</h1>
<br />
<pre>Buat Query untuk membuat 2 table berikut :</pre>
- mysql> CREATE TABLE company_1 (
    -> company_code_1 char(5) NOT NULL,
    -> company_name varchar(100) NOT NULL,
    -> PRIMARY KEY(company_code_1));


- mysql> CREATE TABLE company_2 (
    -> company_code_2 char(5) NOT NULL, 
    -> company_code_1 char(5) NOT NULL,
    -> company_name varchar(50) NOT NULL,
    -> PRIMARY KEY(company_code_2),
    -> CONSTRAINT FK_company_1 FOREIGN KEY(company_code_1) REFERENCES company_1(company_code_1)
    -> );

<pre>Buat Query untuk insert ke masing-masing table </pre>
 - company_1
mysql> INSERT INTO company_1 VALUES('SP','SAIPEM'),('JV','CCS JV');

 - company_2
mysql> INSERT INTO company_2 VALUES('SPA','SP','SAIPEM MILAN'),('PTSI','SP','SAIPEM INDONESIA'),('JVA','JV','CC JV ASIA'),('JVM','JV','CSS JV MILAN');

<pre>Buat View untuk menampilkan data company_1 & company_2 :</pre>
- mysql> CREATE VIEW view_company_1 AS
    -> SELECT * FROM company_1;

- mysql> CREATE VIEW view_company_2 AS
    -> SELECT * FROM company_2;

<pre>Buat Query Select dari view menampilkan data seperti disamping</pre>
<p>CREATE OR REPLACE VIEW view_all_company AS SELECT x.company_code_1 code_1, x.company_name name_1, 
xx.company_code_2 code_2, xx.company_name name_2 FROM company_1 x, 
company_2 xx WHERE xx.company_code_1 = x.company_code_1 AND x.company_code_1 = 'SP';</p>

<pre>Perbedaan antara Function dan Procedure</pre>
Perbedaan Functions dan Procedures di DB :
Function tidak menghasilkan return nilai apapun
sedangkan procedure bisa menghasilkan return