<?php

$page = 1;

include_once "header.php";

?>
    
	<div class="p-3 pb-md-5">
		<h1>Envie suas Informações</h1>

		<div class="d-flex flex-row-reverse bd-highlight">
	      <div class="p-2 bd-highlight">
	       <strong>(*) Campos Obrigatórios.</strong>
	      </div>
    	</div>

		<form id="registerForm">
			<div class="form-group">
				<label for="exampleFormControlInput1">Nome*</label>
				<input type="text" name="nome" class="form-control" id="nome" placeholder="Seu nome aqui..." maxlength="100" required="">
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">E-mail válido*</label>
				<input type="email" name="email" class="form-control" id="email" placeholder="nome@exemplo.com" maxlength="50" required="">
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">Celular válido*</label>
				<input type="text" name="telefone" class="form-control" id="telefone" placeholder="(55)9999-9999
				" minlength="14" maxlength="15" required="">
			</div>
			<div id="telmsg"></div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Mensagem*</label>
				<textarea name="mensagem" class="form-control" id="Sua mensagem aqui..." rows="3" required=""></textarea>
			</div>
			<div class="form-group">
			    <label for="exampleFormControlFile1">Anexo*</label>
			    <input type="file" data-max-size="512000" id="anexo" name="anexo" class="form-control-file" id="exampleFormControlFile1" required="">
	  		</div>

	  		<div id="anxmsg"></div>
	  		
	  		<div align="center">
	  			<button type="submit" id="incluir" class="btn-lg btn-primary">Incluir Informações</button>
	  		</div>
	  		<p>
	  			<div id="msg"></div>
	  		</p>
		</form>
	</div>

<?php

include_once "footer.php";

?>