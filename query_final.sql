SELECT Plate, Veiculos.ID, Section, Category, Brand, Model, Version, Fuel, Price, B2BPrice, Year, Month, TollClass, Origin, Color, SeatColour, Seats, Kms, Doors, HP, Owners, CC, Obs, TaxDeductible, WarrantyMonth,
(SELECT DISTINCT Site 
 from tbl_ExportSites 
 where tbl_ExportSites.ID = Veiculos.ID AND Veiculos.ID = 1 
 FOR XML PATH(''),ROOT('ExportSites'), type),
 (SELECT Photo
 FROM Fotos
 WHERE Fotos.id_car = Veiculos.ID AND Veiculos.ID = 1
 FOR XML PATH(''), ROOT ('PhotoList'), type),
 (SELECT Extra
 FROM Extras
 WHERE Extras.id_car = Veiculos.ID AND Veiculos.ID = 1
 FOR XML PATH(''), ROOT ('ExtraList'), type)
FROM Veiculos
WHERE Veiculos.ID = 1
FOR XML PATH ('Vehicle'), TYPE, ROOT('VehicleList')