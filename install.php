<?php

  //create or open the database
  $database = new PDO('sqlite:squadxml.sqlite3');



$query = 'CREATE TABLE auth (id INTEGER PRIMARY KEY, u_name VARCHAR, u_password VARCHAR)';
$query2 = 'CREATE TABLE squad (id INTEGER PRIMARY KEY, s_nick VARCHAR, s_name VARCHAR, s_email VARCHAR, s_web VARCHAR, s_picture VARCHAR, s_title VARCHAR, s_filenameprefix VARCHAR)';
$query3 = 'CREATE TABLE member (id INTEGER PRIMARY KEY, m_member_id VARCHAR, m_member_nick VARCHAR, m_member_name VARCHAR, m_member_email VARCHAR, m_member_icq VARCHAR, m_member_remark VARCHAR, m_member_whichsquad VARCHAR)';
         
$database->exec($query);
$database->exec($query2);
$database->exec($query3);


?> 