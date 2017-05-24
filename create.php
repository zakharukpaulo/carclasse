<!DOCTYPE html>
<?php 
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
include "functions.php";
$loop = 1;
$stand_array = array();
//recolha de informação do registo
if(isset($_POST['register_car'])){
	if(!empty($_POST['stand'])) {
		foreach($_POST['stand'] as $stand_name) {
				array_push($stand_array, $stand_name);
				
		}
		print_r($stand_array);
}
}
?>
<html>
<head>
<title>Carclasse - Gestão de Viaturas Usadas</title>
<link rel="stylesheet" 
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
 crossorigin="anonymous">
 <link rel="stylesheet" href="styles/style.css"/>
</head>
<body>
<div class="container">
	<div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="index.php">Página Principal</a></li>
            <li role="presentation" class="active"><a href="create.php">Criar</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Criar registo sobre carro</h3>
	</div>
	<div class="jumbotron">
        <h3>Menu de criação</h3>
        <form action="create.php" method="post">
		  <div class="form-group">
		  <legend>Informação Geral</legend>
			<label for="plateInput">Matricula</label>
			<input type="text" class="form-control" id="form_plate" name="form_plate" aria-describedby="plateHelp" placeholder="Matricula do Veículo" required>
			<small id="plateHelp" class="form-text text-muted">AA-00-00</small>
		  </div>
		  <div class="form-group">
			<label for="sectionSelect">Example select</label>
			<select class="form-control" id="form_section_select" name="form_section_select">
			  <option>Ligeiro (VLP)</option>
			  <option>Comercial (VCL)</option>
			</select>
		  </div>
		  <div class="form-group">
			<label for="categorySelect">Example multiple select</label>
			<select class="form-control" id="form_category_select" name="form_category_select">
				<option>Cabrios / Roadster</option>
				<option>Todo-o-terreno</option>
				<option>Carrinha / Combi</option>
				<option>Citadinos</option>
				<option>Utilitarios</option>
				<option>Desportivo / Coupé</option>
				<option>SUV / Monovolume</option>
			</select>
			</div>
		  <div class="form-group">
			<label for="brandInput">Marca</label>
			<input type="text" class="form-control" id="form_brand" placeholder="Marca" required>
			<small id="brandHelp" class="form-text text-muted">Mercedes-Benz, Smart, Range-Rover</small>
		  </div>
		  <div class="form-group">
			<label for="modelInput">Modelo</label>
			<input type="text" class="form-control" id="form_model" placeholder="Modelo" required>
			<small id="modelHelp" class="form-text text-muted">C220, ForTwo, Evoque</small>
		  </div>
		  <div class="form-group">
			<label for="versionInput">Versão</label>
			<input type="text" class="form-control" id="form_version" placeholder="Versão" required>
			<small id="versionHelp" class="form-text text-muted">CDi Avantgarde, 1.0 Gasolina, 2.0 L I4 gasolina</small>
		  </div>
		  <div class="form-group">
			<label for="fuelInput">Combustível</label>
			<input type="text" class="form-control" id="form_fuel" placeholder="Combustível" required>
			<small id="fuelHelp" class="form-text text-muted">Gasolina, Gasóleo, Híbrido</small>
		  </div>
		  <div class="form-group">
			<label for="priceInput">Preço</label>
			<input type="text" class="form-control" id="form_price" placeholder="Preço" required>
			<small id="priceHelp" class="form-text text-muted">15435,23 , 13500, 25000</small>
		  </div>
		  <div class="form-group">
			<label for="b2bInput">PreçoB2B</label>
			<input type="text" class="form-control" id="form_b2b" placeholder="Preço Business-2-Business" required>
			<small id="b2bHelp" class="form-text text-muted">15435,23 , 13500, 25000</small>
		  </div>
		  <div class="form-group">
			<label for="yearInput">Ano</label>
			<input type="text" class="form-control" id="form_year" maxlength="4" placeholder="Ano" required>
			<small id="yearHelp" class="form-text text-muted">1998, 2007, 2015</small>
		  </div>
		  <div class="form-group">
			<label for="monthInput">Mês</label>
			<input type="text" class="form-control" id="form_month" maxlength="2" placeholder="Mês" required>
			<small id="monthHelp" class="form-text text-muted">03, 10, 07</small>
		  </div>
		  <div class="form-group">
			<label for="tollInput">TollClass</label>
			<input type="text" class="form-control" id="form_toll" placeholder="Toll Class" required>
			<small id="tollHelp" class="form-text text-muted">Valores Toll Class</small>
		  </div>
		  <div class="form-group">
			<label for="originInput">Origem</label>
			<input type="text" class="form-control" id="form_origin" placeholder="Pais de Origem" required>
			<small id="originHelp" class="form-text text-muted">Portugal, Alemanha, França</small>
		  </div>
		  <div class="form-group">
			<label for="colorInput">Cor</label>
			<input type="text" class="form-control" id="form_color" placeholder="Cor do Veículo" required>
			<small id="colorHelp" class="form-text text-muted">Cinza, Vermelho, Branco</small>
		  </div>
		  <div class="form-group">
			<label for="seatColourInput">Cor dos bancos</label>
			<input type="text" class="form-control" id="form_seatColor" placeholder="Cor dos bancos" required>
			<small id="seatColorHelp" class="form-text text-muted">Cinza, Preto, Castanho</small>
		  </div>
		  <div class="form-group">
			<label for="qntBancosInput">Quantidade de Bancos</label>
			<input type="text" class="form-control" id="form_qntBancos" placeholder="Quantidade de Bancos" required>
			<small id="qntBancosHelp" class="form-text text-muted">2, 5, 8</small>
		  </div>
		  <div class="form-group">
			<label for="kmsInput">Quilometragem</label>
			<input type="text" class="form-control" id="form_kms" placeholder="Quilometragem" required>
			<small id="kmsHelp" class="form-text text-muted">14000, 25000, 130000</small>
		  </div>
		   <div class="form-group">
			<label for="doorsInput">Portas</label>
			<input type="text" class="form-control" id="form_doors" placeholder="Quantidade de Portas" required>
			<small id="doorsHelp" class="form-text text-muted">3, 5, 7</small>
		  </div>
		  <div class="form-group">
			<label for="powerInput">Potência</label>
			<input type="text" class="form-control" id="form_power" placeholder="Potência" required>
			<small id="powerHelp" class="form-text text-muted">125, 200, 768</small>
		  </div>
		  <div class="form-group">
			<label for="ownersInput">Donos</label>
			<input type="text" class="form-control" id="form_owners" placeholder="Quantidade de donos anteriores" required>
			<small id="ownersHelp" class="form-text text-muted">1, 2, 5</small>
		  </div>
		  <div class="form-group">
			<label for="CCInput">Cilindrada</label>
			<input type="text" class="form-control" id="form_CC" placeholder="Cilindrada do Motor" required>
			<small id="CCHelp" class="form-text text-muted">1200, 2650, 1900</small>
		  </div>
		  <div class="form-group">
			<label for="exampleTextarea">Observações</label>
			<textarea class="form-control" id="form_obs" rows="3" required></textarea>
			<small id="obsHelp" class="form-text text-muted">Bom estado , Lavado, Pequeno risco na porta esquerda</small>
		  </div>
		  <div class="form-group">
			<label for="taxSelect">IVA Dedutível</label>
			<select class="form-control" id="taxSelect">
				<option>Sim</option>
				<option>Não</option>
			</select>
			</div>
		  <div class="form-group">
			<label for="kmsInput">Meses de Garantia</label>
			<input type="text" class="form-control" id="form_kms" placeholder="Meses de Garantia">
			<small id="kmsHelp" class="form-text text-muted">0, 12, 24</small>
		  </div>
		  
		  <div class="form-group">
			<label for="exampleInputFile">File input</label>
			<input type="file" class="form-control-file" id="car_fileInput1" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput2" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput3" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput4" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput5" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput6" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput7" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput8" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput9" aria-describedby="fileHelp">
			<input type="file" class="form-control-file" id="car_fileInput10" aria-describedby="fileHelp">
			<small id="fileHelp" class="form-text text-muted">A primeira foto será a foto de capa do veículo.</small>
		  </div>
		  
			  <fieldset class="form-group">
				<legend>Stands</legend>
				  <div class="col-md-6">
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Standvirtual">
							Standvirtual
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Coisas">
							Coisas
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Autosapo">
							Autosapo
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Custojusto">
							Custojusto
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Olx">
							Olx
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Motornacional">
							Motornacional
						</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Autohoje">
							Autohoje
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Motores24h">
							Motores24h
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Trovit">
							Trovit
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Abmotor">
							Abmotor
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" name="stand[]" value="Portal ACV">
							Portal ACV
						</label>
					</div>
				</div>
			
		  </fieldset>
		  
		  <button type="submit" class="btn btn-primary" name="register_car">Submit</button>
		</form>

      </div>
	  <script
	  src="https://code.jquery.com/jquery-3.2.1.js"
	  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
	  crossorigin="anonymous"></script>
	  <script type="text/javascript">
	  $(document).ready(function () {
			$('#form_section_select').on('change', function(){
			   console.log($('#form_section_select').val());
				$('#form_category_select').html('');
				if($('#form_section_select option:selected').text()== "Ligeiro (VLP)"){
					$('#form_category_select').append('<option>Cabrios / Roadster</option>');
					$('#form_category_select').append('<option>Todo-o-terreno</option>');
					$('#form_category_select').append('<option>Carrinha / Combi</option>');
					$('#form_category_select').append('<option>Citadinos</option>');
					$('#form_category_select').append('<option>Utilitarios / Sedan</option>');
					$('#form_category_select').append('<option>Desportivo / Coupé</option>');
					$('#form_category_select').append('<option>SUV / Monovolume</option>');
				}else{
					$('#form_category_select').append('<option>Comerciais Ligeiros</option>');
					$('#form_category_select').append('<option>Pesados de 3,5t a 7,5t</option>');
					$('#form_category_select').append('<option>Pesados acima de 7,5t</option>');
					$('#form_category_select').append('<option>Tractores</option>');
					$('#form_category_select').append('<option>Semi & Reboques</option>');
					$('#form_category_select').append('<option>Autocarros / Minibus</option>');
					$('#form_category_select').append('<option>Máquinas Agrícolas</option>');
					$('#form_category_select').append('<option>Máquinas de construção</option>');
					$('#form_category_select').append('<option>Máquinas Indústriais</option>');
					$('#form_category_select').append('<option>Furrgões</option>');
					$('#form_category_select').append('<option>Comerciais até 3,5t</option>');
				}
			});
	  });
		</script>
	<footer class="footer">
		<p>&copy; 2017 Carclasse, Braga</p>
	</footer>
</div>
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';
?>
