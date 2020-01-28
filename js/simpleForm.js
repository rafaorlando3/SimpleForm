/**
 *SimpleForm
 *@autor - Rafael Orlando Mendes
 *@email - rafaorlando3@gmail.com 
 */

// Definindo projeto SimpleForm
var simpleform = simpleform || {};

// Definindo o módulo no objeto global.
simpleform.moduloT = (function() {
  'use strict';

  function iniciar() {
    novoRegistro();
    registros();
    buscaRegistros();
    validaCampos();
  }

  function novoRegistro() {
    
    $('#registerForm').submit(function () {        

        $("#incluir").attr("disabled", true);
        $("#incluir").html("Carregando...");
        
        $.ajax({
            type: "POST",
            url: "include/newRegister.php",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data)
            {   
                $('#msg').html(data);
                $("#incluir").attr("disabled", false);
                $("#incluir").html("Incluir Informações");
            }
        });

        return false;
    });

  }

  function registros() {
    $.get('include/registerList.php', function (resultado) {
        $('#registros').html(resultado);

    });
  }

  function buscaRegistros() {
    $("#buscaRegistros").keypress(function () {
        var pesquisa = $('#buscaRegistros').val();

        $.get('include/registerList.php?pesquisa=' + pesquisa, function (resultado) {
            $('#registros').html(resultado);

        });

    });
  }

  function validaCampos() {
    
    $('#telefone').mask('(00) 00000-0000');
    $("#telefone").blur(function () {
        var telefone = $('#telefone').val();
        var isValid = /^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/.test(telefone);
        
        if (!isValid) { 
          $("#telefone").val("");
          $("#telmsg").html("<p><strong><mark>Telefone invalido.</mark></strong></p>");
        } else {
          $("#telmsg").html("");
        } 
    });

    $("#anexo").change(function () {
        var fileInput = $(this);
        var maxSize = $(this).data('max-size');
        var extPermitidas = ['odt', 'pdf', 'txt', 'doc', 'docx'];

        if (fileInput.get(0).files.length) {
            var fileSize = fileInput.get(0).files[0].size;
            if (fileSize > maxSize) {
                $('#anxmsg').html('<p><strong><mark>Arquivo excedeu o limite permitido, por favor escolha arquivos com no maximo 500KB*</mark></strong></p>');
                $("#incluir").attr("disabled", true);
            } else if(typeof extPermitidas.find(function(ext){ return fileInput.val().split('.').pop() == ext; }) == 'undefined') {
                $('#anxmsg').html('<p><strong><mark>Extensão inválida</mark></strong></p>');
                $("#incluir").attr("disabled", true);
            } else {
                $('#anxmsg').hide();
                $("#incluir").attr("disabled", false);
            }
        }
    });
  }


  return {
    iniciar:iniciar,
    novoRegistro:novoRegistro,
    registros:registros,
    buscaRegistros:buscaRegistros,
    validaCampos:validaCampos
  };

}());

simpleform.moduloT.iniciar();
