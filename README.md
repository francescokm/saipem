<h1>Lembar Jawaban Untuk Siapem Indonesia</h1>

=================================================
Buat Query untuk membuat 2 table berikut :
mysql> CREATE TABLE company_1 (
    -> company_code_1 char(5) NOT NULL,
    -> company_name varchar(100) NOT NULL,
    -> PRIMARY KEY(company_code_1));
Query OK, 0 rows affected (0.03 sec)

mysql> CREATE TABLE company_2 (
    -> company_code_2 char(5) NOT NULL, 
    -> company_code_1 char(5) NOT NULL,
    -> company_name varchar(50) NOT NULL,
    -> PRIMARY KEY(company_code_2),
    -> CONSTRAINT FK_company_1 FOREIGN KEY(company_code_1) REFERENCES company_1(company_code_1)
    -> );
Query OK, 0 rows affected (0.04 sec)
=================================================

Buat Query untuk insert ke masing-masing table :
 - company_1
mysql> INSERT INTO company_1 VALUES('SP','SAIPEM'),('JV','CCS JV');
Query OK, 2 rows affected (0.03 sec)
Records: 2  Duplicates: 0  Warnings: 0

 - company_2
mysql> INSERT INTO company_2 VALUES('SPA','SP','SAIPEM MILAN'),('PTSI','SP','SAIPEM INDONESIA'),('JVA','JV','CC JV ASIA'),('JVM','JV','CSS JV MILAN');
Query OK, 4 rows affected (0.01 sec)
Records: 4  Duplicates: 0  Warnings: 0

=================================================

Buat View untuk menampilkan data company_1 & company_2 :
mysql> CREATE VIEW view_company_1 AS
    -> SELECT * FROM company_1;
Query OK, 0 rows affected (0.02 sec)

mysql> CREATE VIEW view_company_2 AS
    -> SELECT * FROM company_2;
Query OK, 0 rows affected (0.00 sec)

=================================================

Buat Query Select dari view menampilkan data seperti disamping

CREATE VIEW view_all_company AS SELECT x.company_code_1 code_1, x.company_name name_1, 
xx.company_code_2 code_2, xx.company_name name_2 FROM company_1 x, 
company_2 xx WHERE xx.company_code_1 = x.company_code_1 AND x.company_code_1 = 'SP';
Query OK, 0 rows affected (0.02 sec)

mysql> select * from view_all_company;
+--------+--------+--------+------------------+
| code_1 | name_1 | code_2 | name_2           |
+--------+--------+--------+------------------+
| SP     | SAIPEM | PTSI   | SAIPEM INDONESIA |
| SP     | SAIPEM | SPA    | SAIPEM MILAN     |
+--------+--------+--------+------------------+
2 rows in set (0.00 sec)

=================================================

Perbedaan Functions dan Procedures di DB :
Function tidak menghasilkan return nilai apapun
sedangkan procedure bisa menghasilkan return

=================================================