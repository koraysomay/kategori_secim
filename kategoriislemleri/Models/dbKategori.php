<?php

function insertCategory($kategori_ad){
 try{
 $db = new PDO('mysql:host=localhost;dbname=filmdata;charset=utf8','root','');
 }catch(PDOException $e){
 echo 'Hata: '.$e->getMessage();
 }   

 $query = $db->prepare("INSERT INTO kategori SET kategori_ad=?");
 $result=$query->execute(array($kategori_ad));
}

function selectSearchCategory($query){
 try{
 $db = new PDO('mysql:host=localhost;dbname=filmdata;charset=utf8','root','');
 }catch(PDOException $e){
 echo 'Hata: '.$e->getMessage();
 }   

$sth = $db->prepare("SELECT kategori_ad FROM kategori WHERE (kategori_ad LIKE :keyword)");
$query='%'.$query.'%';
$sth->bindParam('keyword',$query, PDO::PARAM_STR);
$sth->execute();

$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
 return $result;
}