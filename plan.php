<?php
require_once(__DIR__ . '/initialize.inc.php');

/* Basic site definitions */


/* Data magic */
$query = $sqli->query('SELECT Modul.Modul_Name, Vorlesung.Vorlesung_Beschreibung, Vorlesung.Vorlesung_Beginn, Vorlesung.Vorlesung_Ende FROM Student JOIN Modul_Student ON Student.Student_MatrNr = Modul_Student.Student_MatrNr JOIN Modul ON Modul_Student.Modul_ID = Modul.Modul_ID JOIN Modul_Vorlesung ON Modul.Modul_ID = Modul_Vorlesung.Modul_ID JOIN Vorlesung ON Modul_Vorlesung.Vorlesung_ID = Vorlesung.Vorlesung_ID WHERE Student.Student_MatrNr = 915638 ORDER BY Vorlesung.Vorlesung_Beginn ASC;');

$data = Array();
if($query->num_rows){
	while($row = $query->fetch_assoc()){
/*		$row['_VIEW_Raum'] = Array('B1.08');
		$row['_VIEW_Lehrkraft'] = Array('Christian Hüller');*/
		$data[] = $row;
	}
}

$smarty->assign('data', $data);

/* Display Page */
$smarty->display('plan.tpl');
