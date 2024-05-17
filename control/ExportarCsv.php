<?php
	require '../control/conexionTabla.php';
	require '../vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\IOFACTORY;

	$campo = isset($_POST['campo'])? $conexion->real_escape_string( $_POST['campo'] ):NULL;

	$alumno = isset($_POST['alumno'])? $conexion->real_escape_string( $_POST['alumno'] ):NULL;
	
	$where="";
	
	if($campo != null && $alumno == null){
	
		$where = "where ac.nombre like '%".$campo."%';";
	
	}else if($campo == null && $alumno != null){
		$where = "where al.nombre like '%".$alumno."%';";
	}else if($campo != null && $alumno != null){
		$where = "where ac.nombre like '%".$campo."%' and al.nombre like '%".$alumno."%';";
	}
	
	
	$sql = "SELECT 
	aa.noCtrl,
	ac.NOMBRE AS nombre_actividad,
	al.NOMBRE,
	ac.FECHA
	FROM ALUMNOS_ACTIVIDAD aa
	JOIN ALUMNOS al ON aa.noCtrl = al.noCtrl
	JOIN ACTIVIDAD ac ON aa.id_EVENTO = ac.id_ACTIVIDAD 
	$where" ;
	

$resultado = $conexion->query($sql);

$spreadsheet = new Spreadsheet();
$HOJA = $spreadsheet->getActiveSheet();
	$HOJA->setTitle('ASISTENCIAS');
	$HOJA->getColumnDimension('A')->setWidth(50);
	$HOJA->setCellValue('A1','Nombre de actividad');
	$HOJA->getColumnDimension('B')->setWidth(20);
	$HOJA->setCellValue('B1','Número de control');
	$HOJA->getColumnDimension('C')->setWidth(20);
	$HOJA->setCellValue('C1','Nombre');
	$HOJA->getColumnDimension('D')->setWidth(20);
	$HOJA->setCellValue('D1','Fecha');
	
	$fila = 2;

	while($rows = $resultado->fetch_assoc()){
		$HOJA->setCellValue('A'.$fila,$rows['nombre_actividad']);
		$HOJA->setCellValue('b'.$fila,$rows['noCtrl']);
		$HOJA->setCellValue('c'.$fila,$rows['NOMBRE']);
		$HOJA->setCellValue('d'.$fila,$rows['FECHA']);
		$fila++;

	}

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Asistencias.xlsx"');
	header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

echo json_encode($spreadsheet, JSON_UNESCAPED_UNICODE);


	
?>