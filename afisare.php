<?php

$search_id = $_POST['nr_pagini'];
$search_id1 = $_POST['cmunca'];
$search_id2 = $_POST['clienti'];
$search_id3 = $_POST['cjuri'];
$search_id5 = $_POST['salariu'];
$search_id6 = $_POST['fel'];

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "avocatura";

$connect = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect");

if(!empty($search_id) and $search_id >= '10' and $search_id <= '20')
{
$query = "CALL display_contract($search_id)";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border = '1'>";
echo ("<tr><td>ID_cj</td><td>Data</td><td>Obiect</td><td>Onorariu</td><td>Numar pagini</td><td>ID_client</td><td>ID_avocat</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	$name2 = $row[4];
	$name3 = $row[5];
	$name4 = $row[6];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>";
            echo "<td>".$name2."</td>";
            echo "<td>".$name3."</td>";
            echo "<td>".$name4."</td>";
	echo "</tr>";
  }
}

elseif(!empty($search_id1))
{
$query = "CALL display_comision($search_id1)";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>ID_cm</td><td>Data</td><td>Functie</td><td>Salariu_baza</td><td>Comision</td><td>ID_angajat</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	$name2 = $row[4];
	$name3 = $row[5];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>";
            echo "<td>".$name2."</td>";
            echo "<td>".$name3."</td>";
	echo "</tr>";
  }
}

elseif(!empty($search_id2))
{
$query = "CALL display_avocat('$search_id2')";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>Nume</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
	echo "<tr>";
            echo "<td>".$id."</td>";
	echo "</tr>";
  }
}

elseif(!empty($search_id6))
{
$query = "CALL display_rata($search_id6)";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>ID_cj</td><td>ID_r</td><td>Data</td><td>Suma</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
	$name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	echo "<tr>";
            echo "<td>".$id."</td>";
			echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>";
	echo "</tr>";
  }
}

elseif(!empty($search_id3))
{
$query = "CALL display_contract1($search_id3)";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='0'>";
echo ("<tr><td>ID_cj</td><td>Data</td><td>Obiect</td><td>Onorariu</td><td>Numar pagini</td><td>ID_client</td><td>ID_avocat</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	$name2 = $row[4];
	$name3 = $row[5];
	$name4 = $row[6];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>";
            echo "<td>".$name2."</td>";
            echo "<td>".$name3."</td>";
            echo "<td>".$name4."</td>";
	echo "</tr>";
  }
}

elseif(!empty($search_id5))
{
$query = "CALL display_salariu('$search_id5')";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>Nume</td><td>Salariu mediu 2019</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
	echo "</tr>";
  }
}

function testfun1()
{
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "avocatura";

$connect = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect");
$query = "select *
from Persoana where id_p in (select id_avocat from Contract_j a where not exists (select 1 from Contract_j b where a.id_avocat = b.id_avocat having count(*) > 1))";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>ID_p</td><td>Nume</td><td>Email</td><td>Adresa</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>"; 
	echo "</tr>";
  }
}

if(array_key_exists('testt', $_POST))
{
   testfun1();
}

function tabel1()
{
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "avocatura";

$connect = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect");
$query = "select * from Persoana";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>ID_p</td><td>Nume</td><td>Email</td><td>Adresa</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>"; 
	echo "</tr>";
  }
}

if(array_key_exists('baieti', $_POST))
{
   tabel1();
}

function tabel2()
{
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "avocatura";

$connect = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect");
$query = "select * from Contract_j";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>ID_cj</td><td>Data</td><td>Obiect</td><td>Onorariu</td><td>Numar pagini</td><td>ID_client</td><td>ID_avocat</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	$name2 = $row[4];
	$name3 = $row[5];
	$name4 = $row[6];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>";
            echo "<td>".$name2."</td>";
            echo "<td>".$name3."</td>";
            echo "<td>".$name4."</td>";
	echo "</tr>";
  }
}

if(array_key_exists('de', $_POST))
{
   tabel2();
}

function tabel3()
{
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "avocatura";

$connect = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect");
$query = "select * from Contract_m";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>ID_cm</td><td>Data</td><td>Functie</td><td>Salariu_baza</td><td>Comision</td><td>ID_angajat</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	$name2 = $row[4];
	$name3 = $row[5];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>";
            echo "<td>".$name2."</td>";
            echo "<td>".$name3."</td>";
	echo "</tr>";
  }
}

if(array_key_exists('oras', $_POST))
{
   tabel3();
}

function tabel4()
{
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "avocatura";

$connect = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect");
$query = "select * from Rata";
$result = mysqli_query($connect, $query);
echo "<table width = '1000' align = 'center' border ='1'>";
echo ("<tr><td>ID_cj</td><td>ID_r</td><td>Data</td><td>Suma</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
    $name = $row[1];
    $age = $row[2];
	$name1 = $row[3];
	echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$age."</td>";
            echo "<td>".$name1."</td>"; 
	echo "</tr>";
  }
}

if(array_key_exists('blana', $_POST))
{
   tabel4();
}

function testfun()
{
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "avocatura";

$connect = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect");
$query = "select distinct(Contract_j.id_cj)
from Contract_j join Rata on Contract_j.id_cj = Rata.id_cj
where Contract_j.onorariu <> (select sum(suma) from Rata where id_cj = Contract_j.id_cj)";
$result = mysqli_query($connect, $query);
echo "<table width = '200' align = 'center' border ='1'>";
echo ("<tr><td>Contracte neachitate in intregime</td></tr>");
echo "</b></tr>";
while($row = mysqli_fetch_array($result))
  {
	$id = $row[0];
	echo "<tr>";
            echo "<td>".$id."</td>";
	echo "</tr>";
  }
}

if(array_key_exists('test', $_POST))
{
   testfun();
}

echo "<p><center>&copy; Cabinet de avocatura 2013-2020 All Rights Reserved<center></p>";

echo "<p><center><input type='button' name='Back' value='Inapoi' onClick='history.back();return true;'><center><p>";

?>
<body style="background-color:powderblue;">