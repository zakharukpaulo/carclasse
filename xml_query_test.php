<?php 
include "connect.php";
include "htmlconfig.php";

//preencher o xml com os detalhes do carro
$sql = "SELECT * FROM Veiculos WHERE ID = 1";
$stmt = sqlsrv_query($conn, $sql);
$openXML = new SimpleXMLElement('	<VehicleList></VehicleList>');
$vehicles = $openXML->addChild('Vehicles');
while($row = sqlsrv_fetch_array($stmt))
{
	$vehicles->addChild('Plate', $row[2]);
	$vehicles->addChild('ID', $row[0]);
	$vehicles->addChild('Section', $row[3]);
	$vehicles->addChild('Category', $row[4]);
	$vehicles->addChild('Brand', $row[5]);
	$vehicles->addChild('Model', $row[6]);
	$vehicles->addChild('Version', $row[7]);
	$vehicles->addChild('Fuel', $row[8]);
	$vehicles->addChild('Price', $row[9]);
	$vehicles->addChild('B2BPrice', $row[10]);
	$vehicles->addChild('Year', $row[11]);
	$vehicles->addChild('Month', $row[12]);
	$vehicles->addChild('TollClass', $row[13]);
	$vehicles->addChild('Origin', $row[14]);
	$vehicles->addChild('Color', $row[15]);
	$vehicles->addChild('SeatColor', $row[16]);
	$vehicles->addChild('Seats', $row[17]);
	$vehicles->addChild('Kms', $row[18]);
	$vehicles->addChild('Doors', $row[19]);
	$vehicles->addChild('HP', $row[20]);
	$vehicles->addChild('Owners', $row[21]);
	$vehicles->addChild('CC', $row[22]);
	$vehicles->addChild('Obs', $row[23]);
	$vehicles->addChild('TaxDeductible', $row[24]);
	$vehicles->addChild('WarrantyMonth', $row[25]);
}
//preencher com os nomes do stand
$query_for_stands = "SELECT DISTINCT Site, Veiculos.ID from tbl_ExportSites, Veiculos where tbl_ExportSites.ID = Veiculos.ID AND Veiculos.ID = 1";
$stmt = sqlsrv_query($conn, $query_for_stands);
$StandList = $vehicles->addChild('ExportSites');
while($row = sqlsrv_fetch_array($stmt)){
	$StandList->addChild('Site', $row[0]);
}

//preencher com os links para as fotos
$query_for_photos = "SELECT Photo, Veiculos.ID FROM Fotos, Veiculos WHERE Fotos.id_car = Veiculos.ID AND Veiculos.ID = 1";
$stmt = sqlsrv_query($conn, $query_for_photos);
$PhotoList = $vehicles->addChild('PhotoList');
while($row = sqlsrv_fetch_array($stmt)){
	$PhotoList->addChild('Photo', $row[0]);
}

//preencher com os extras selecionados
$query_for_extras = "SELECT Extra, Veiculos.ID FROM Extras, Veiculos WHERE Extras.id_car = Veiculos.ID AND Veiculos.ID = 1";
$stmt = sqlsrv_query($conn, $query_for_extras);
$ExtrasList = $vehicles->addChild('ExtrasList');
while($row = sqlsrv_fetch_array($stmt)){
	$ExtrasList->addChild('Extra', $row[0]);
}
header('Content-Type: text/xml; charset=utf-8');
echo $openXML->asXML();