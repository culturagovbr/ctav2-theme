<?php
/*
  Template Name: Empréstimo dos Kits Alexa e SI-2K
*/
?>
<?php get_header(); ?>

<style>.forms td, .forms th { padding:5px; } .forms input, .forms textarea { padding:3px; }</style>
 
<!-- Body -->
<div id="body">

  <!-- Page -->
  <div id="post">
    <?php if(have_posts()) : the_post(); ?>
      <div class="options">
        <?php edit_post_link('Editar'); ?>
        <a href="javascript:print()" title="Imprimir" class="imprimir">Imprimir</a>
      </div>

      <h2 class="post-title"><?php the_title(); ?></h2>
	  
	  
      <div class="entry">
        <?php

        global $Validator;

        // Proponente
        $proponente_nome                   = $Validator->Validate($_POST['proponente_nome'], "Nome", "required=1&max_length=100");
        $proponente_cnpj                   = $Validator->Validate($_POST['proponente_cnpj'], "CNPJ", "cnpj=1");
        $proponente_cpf                    = $Validator->Validate($_POST['proponente_cpf'], "CPF", "cpf=1");
        $proponente_rg                     = $Validator->Validate($_POST['proponente_rg'], "RG", "numeric=1&max_length=10");
        $proponente_ra                     = $Validator->Validate($_POST['proponente_ra'], "Registro Ancine", "numeric=1&max_length=50");
        $proponente_ddd_telefone           = $Validator->Validate($_POST['proponente_ddd_telefone'], "DDD Telefone", "required=1&numeric=1&length=2");
        $proponente_telefone               = $Validator->Validate($_POST['proponente_telefone'], "Telefone", "required=1&numeric=1&max_length=15");
        $proponente_ddd_celular            = $Validator->Validate($_POST['proponente_ddd_celular'], "DDD Celular", "required=1&numeric=1&length=2");
        $proponente_celular                = $Validator->Validate($_POST['proponente_celular'], "Celular", "required=1&numeric=1&max_length=15");
        $proponente_email                  = $Validator->Validate($_POST['proponente_email'], "E-mail", "required=1&email=1");
        $proponente_endereco               = $Validator->Validate($_POST['proponente_endereco'], "Endereço", "required=1&max_length=100");
        $proponente_complemento            = $Validator->Validate($_POST['proponente_complemento'], "Complemento", "required=1&max_length=100");
        $proponente_cidade                 = $Validator->Validate($_POST['proponente_cidade'], "Cidade", "required=1&max_length=100");
        $proponente_estado                 = $Validator->Validate($_POST['proponente_estado'], "Estado", "required=1&length=2");
        $proponente_cep                    = $Validator->Validate($_POST['proponente_cep'], "CEP", "required=1&numeric=1&length=8");

        // Diretor
        $proponente_diretor                = $Validator->Validate($_POST['proponente_diretor'], "Proponente Diretor", "numeric=1&length=1");

        if($proponente_diretor == 1)
        {
          $diretor_nome                    = $proponente_nome;
          $diretor_cpf                     = $proponente_cpf;
          $diretor_rg                      = $proponente_rg;
          $diretor_ddd_telefone            = $proponente_ddd_telefone;
          $diretor_telefone                = $proponente_telefone;
          $diretor_ddd_celular             = $proponente_ddd_celular;
          $diretor_celular                 = $proponente_celular;
          $diretor_email                   = $proponente_email;
          $diretor_endereco                = $proponente_endereco;
          $diretor_complemento             = $proponente_complemento;
          $diretor_cidade                  = $proponente_cidade;
          $diretor_estado                  = $proponente_estado;
          $diretor_cep                     = $proponente_cep;
        }
        else
        {
          $diretor_nome                    = $Validator->Validate($_POST['diretor_nome'], "Nome do Diretor", "required=1&max_length=100");
          $diretor_cpf                     = $Validator->Validate($_POST['diretor_cpf'], "CPF do Diretor", "required=1&cpf=1");
          $diretor_rg                      = $Validator->Validate($_POST['diretor_rg'], "RG do Diretor", "required=1&numeric=1&max_length=10");
          $diretor_ddd_telefone            = $Validator->Validate($_POST['diretor_ddd_telefone'], "DDD Telefone do Diretor", "required=1&numeric=1&length=2");
          $diretor_telefone                = $Validator->Validate($_POST['diretor_telefone'], "Telefone do Diretor", "required=1&numeric=1&max_length=15");
          $diretor_ddd_celular             = $Validator->Validate($_POST['diretor_ddd_celular'], "DDD Celular do Diretor", "required=1&numeric=1&length=2");
          $diretor_celular                 = $Validator->Validate($_POST['diretor_celular'], "Celular do Diretor", "required=1&numeric=1&max_length=15");
          $diretor_email                   = $Validator->Validate($_POST['diretor_email'], "E-mail do Diretor", "required=1&email=1");
          $diretor_endereco                = $Validator->Validate($_POST['diretor_endereco'], "Endereço do Diretor", "required=1&max_length=100");
          $diretor_complemento             = $Validator->Validate($_POST['diretor_complemento'], "Complemento do Diretor", "required=1&max_length=100");
          $diretor_cidade                  = $Validator->Validate($_POST['diretor_cidade'], "Cidade do Diretor", "required=1&max_length=100");
          $diretor_estado                  = $Validator->Validate($_POST['diretor_estado'], "Estado do Diretor", "required=1&length=2");
          $diretor_cep                     = $Validator->Validate($_POST['diretor_cep'], "CEP do Diretor", "required=1&numeric=1&length=8");
        }

        // Projeto
        // se for premio, torna obrigatorio o campo abaixo
        $tipo_solicitacao                  = $Validator->Validate($_POST['tipo_solicitacao'], "Tipo de Solicitação", "required=1");
        if ($tipo_solicitacao == 'premio') {
            $projeto_pergunta                  = $Validator->Validate($_POST['projeto_pergunta'], "Especificar Festival, edição e categoria em que recebeu o Prêmio CTAv", "required=1&length=5");
        } else {
            $projeto_pergunta                  = $Validator->Validate($_POST['projeto_pergunta'], "Especificar Festival, edição e categoria em que recebeu o Prêmio CTAv", "length=5");
        }
        $projeto_metragem                  = $Validator->Validate($_POST['projeto_metragem'], "Metragem", "required=1&length=5");
        $projeto_duracao                   = $Validator->Validate($_POST['projeto_duracao'], "Duração", "required=1&max_length=50");
        $projeto_formato_original          = $Validator->Validate($_POST['projeto_formato_original'], "Formato Original", "required=1&max_length=50");
        $projeto_suporte_original          = $Validator->Validate($_POST['projeto_suporte_original'], "Suporte Original", "required=1&max_length=50");
        $projeto_genero                    = $Validator->Validate($_POST['projeto_genero'], "Gênero", "required=1&max_length=50");
        $projeto_cromia                    = $Validator->Validate($_POST['projeto_cromia'], "Cromia", "required=1&length=3");
        $projeto_sinopse                   = $Validator->Validate($_POST['projeto_sinopse'], "Sinopse", "required=1&max_length=2000");
        $projeto_justificativa             = $Validator->Validate($_POST['projeto_justificativa'], "Justificativa", "required=1&max_length=2000");
        $projeto_objetivos                 = $Validator->Validate($_POST['projeto_objetivos'], "Objetivos", "required=1&max_length=2000");
        $projeto_ficha_tecnica             = $Validator->Validate($_POST['projeto_ficha_tecnica'], "Ficha Técnica", "required=1&max_length=2000");
        $projeto_elenco                    = $Validator->Validate($_POST['projeto_elenco'], "Elenco", "max_length=2000");

        // Equipamentos
        $equipamentos_materiais            = $Validator->Validate($_POST['equipamentos_materiais'], "Equipamentos", "required=1&max_length=2000");
        $equipamentos_inicio               = $Validator->Validate($_POST['equipamentos_inicio'], "Início", "required=1&length=10");
        $equipamentos_termino              = $Validator->Validate($_POST['equipamentos_termino'], "Término", "required=1&length=10");
        $equipamentos_operador             = $Validator->Validate($_POST['equipamentos_operador'], "Nome do Operador", "required=1&max_length=100");
        $equipamentos_operador_cursos      = $Validator->Validate($_POST['equipamentos_operador_cursos'], "Cursos do Operador", "required=1&max_length=2000");
        $equipamentos_operador_experiencia = $Validator->Validate($_POST['equipamentos_operador_experiencia'], "Experiencia do Operador", "required=1&max_length=2000");
        $equipamentos_operador_curriculo   = $Validator->Validate($_POST['equipamentos_operador_curriculo'], "Curriculo do Operador", "required=1&max_length=6000");
        $equipamentos_seguro               = $Validator->Validate($_POST['equipamentos_seguro'], "Arcar com seguro", "required=1&length=1");
        $equipamentos_retirar              = $Validator->Validate($_POST['equipamentos_retirar'], "Retirar item do kit", "required=1&max_length=500");
        $equipamentos_cidade               = $Validator->Validate($_POST['equipamentos_cidade'], "Cidade do Equipamento", "required=1&max_length=100");
        $equipamentos_estado               = $Validator->Validate($_POST['equipamentos_estado'], "Estado do Equipamento", "required=1&length=2");
        $equipamentos_locacao              = $Validator->Validate($_POST['equipamentos_locacao'], "Descrição da Locação", "max_lengt=1000");

        // Filme
        $filme_titulo                      = $Validator->Validate($_POST['filme_titulo'], "Título do Filme", "required=1&max_length=100");
        $filme_universitario               = $Validator->Validate($_POST['filme_universitario'], "Universitário", "required=1&length=1");
        $filme_universitario_instituicao   = $Validator->Validate($_POST['filme_universitario_instituicao'], "Instituição Universitária", "max_length=100");
        $filme_independente                = $Validator->Validate($_POST['filme_independente'], "Independente", "required=1&length=1");
        $filme_roteiro_premio              = $Validator->Validate($_POST['filme_roteiro_premio'], "Prêmio pelo Roteiro", "required=1&length=1");
        $filme_roteiro_premio_nome         = $Validator->Validate($_POST['filme_roteiro_premio_nome'], "Especificação do Prêmio", "max_length=100");
        $filme_finalizacao_premio          = $Validator->Validate($_POST['filme_finalizacao_premio'], "Prêmio pela Finalização", "required=1&legth=1");
        $filme_finalizacao_premio_nome     = $Validator->Validate($_POST['filme_finalizacao_premio_nome'], "Especificação do Prêmio", "max_length=100");
        $filme_lei                         = $Validator->Validate($_POST['filme_lei'], "Utiliza Leis", "required=1&length=1");
        $filme_lei_tipo                    = $Validator->Validate($_POST['filme_lei_tipo'], "Tipo de Lei", "max_length=100");
        $filme_lei_valor                   = $Validator->Validate($_POST['filme_lei_valor'], "Valor", "max_length=100");
        $filme_pronac                      = $Validator->Validate($_POST['filme_pronac'], "Pronac", "max_length=10");
        $filme_valor                       = $Validator->Validate($_POST['filme_valor'], "Valor Orçado", "required=1&max_length=100");
        $filme_valor_captado               = $Validator->Validate($_POST['filme_valor_captado'], "Valor Captado", "required=1&max_length=100");
        $filme_patrocinadores              = $Validator->Validate($_POST['filme_patrocinadores'], "Patrocinadores", "max_length=2000");
        $filme_distribuidora               = $Validator->Validate($_POST['filme_distribuidora'], "Distribuidora", "max_length=100");
        $filme_filmografia                 = $Validator->Validate($_POST['filme_filmografia'], "Filmografia", "required=1&max_length=2000");
        $filme_diretor_curriculo           = $Validator->Validate($_POST['filme_diretor_curriculo'], "Currículo do Diretor", "required=1&max_length=2000");
        $filme_produtor_curriculo          = $Validator->Validate($_POST['filme_produtor_curriculo'], "Currículo do Produtor", "required=1&max_length=2000");
        $filme_apoio_ctav                  = $Validator->Validate($_POST['filme_apoio_ctav'], "Apoio do CTAv", "required=1&length=1");
        $filme_servico                     = $Validator->Validate($_POST['filme_servico'], "Servico", "max_length=2000");
        $filme_apoio_ctav_titulo           = $Validator->Validate($_POST['filme_apoio_ctav_titulo'], "Para qual filme?", "max_length=100");
        $filme_outros                      = $Validator->Validate($_POST['filme_outros'], "Outras Informações", "max_length=2000");

        if(empty($proponente_cpf) and empty($proponente_cnpj))
          $Validator->Set_Error("Informe pelo menos o CPF ou o CNPJ do Proponente", "");

        if(!empty($proponente_cpf) and empty($proponente_rg))
          $Validator->Set_Error("O campo RG é de preenchimento obrigatório", "");

        if(!empty($proponente_cnpj) and empty($proponente_ra))
          $Validator->Set_Error("O campo Registro Ancine é de preenchimento obrigatório", "");

        // Get Errors
        $erros = $Validator->Error();



        // Enviar o Formulário
        if(!empty($_POST['accept']) && !empty($_POST['submit']) && !is_array($erros)) :
          $form_count = get_option('form_equipamentos_count');
          $form_count = $form_count + 1;

          $message =
          "
            <h2>Registro {$form_count}</h2>
            <table width='100%' border='0' cellspacing='0' class='forms'>

              <!-- Proponente -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>1. DADOS DO PROPONENTE</th>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Nome: *</th>
                <td colspan='3'>{$proponente_nome}</td>
              </tr>
              <tr>
                <th align='right'>CPF: **</th>
                <td>{$proponente_cpf}</td>
                <th align='right'>CNPJ: ***</th>
                <td>{$proponente_cnpj}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>RG (Pessoa Física): **</th>
                <td>{$proponente_rg}</td>
                <th align='right'>Registro Ancine: ***</th>
                <td>{$proponente_ra}</td>
              </tr>
              <tr>
                <th align='right'>Telefone: *</th>
                <td>( {$proponente_ddd_telefone} ) {$proponente_telefone}</td>
                <th align='right'>Celular:</th>
                <td>( {$proponente_ddd_celular} ) {$proponente_celular}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>E-mail: *</th>
                <td colspan='3'>{$proponente_email}</td>
              </tr>
              <tr>
                <th align='right'>Endereço: *</th>
                <td>{$proponente_endereco}</td>
                <th align='right'>Nº Complemento: *</th>
                <td>{$proponente_complemento}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Cidade: *</th>
                <td>{$proponente_cidade}</td>
                <th align='right'>Estado: *</th>
                <td>{$proponente_estado}</td>
              </tr>
              <tr>
                <th align='right'>CEP: *</th>
                <td>{$proponente_cep}</td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

              <!-- Diretor -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>2. DADOS DO DIRETOR</th>
              <tr bgcolor='#f6f9fa'>
                <th colspan='4'>{$proponente_diretor} Caso o proponente seja o diretor marque esse campo</th>
              </tr>
              <tr>
                <th align='right'>Nome: *</th>
                <td colspan='3'>{$diretor_nome}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>CPF: *</th>
                <td>{$diretor_cpf}</td>
                <th align='right'>RG (Pessoa Física): *</th>
                <td>{$diretor_rg}</td>
              </tr>
              <tr>
                <th align='right'>Telefone: *</th>
                <td>( {$diretor_ddd_telefone} ) {$diretor_telefone}</td>
                <th align='right'>Celular:</th>
                <td>( {$diretor_ddd_celular} ) {$diretor_celular}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>E-mail: *</th>
                <td colspan='3'>{$diretor_email}</td>
              </tr>
              <tr>
                <th align='right'>Endereço: *</th>
                <td>{$diretor_endereco}</td>
                <th align='right'>Nº Complemento: *</th>
                <td>{$diretor_complemento}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Cidade: *</th>
                <td>{$diretor_cidade}</td>
                <th align='right'>Estado: *</th>
                <td>{$diretor_estado}</td>
              </tr>
              <tr>
                <th align='right'>CEP: *</th>
                <td>{$diretor_cep}</td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

              <!-- Projeto -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>3. INFORMAÇÕES SOBRE O PROJETO</th>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Metragem: *</th>
                <td colspan='3'>{$projeto_metragem}</td>
              </tr>
			  <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Tipo de Solicitação</th>
                <td colspan='3'>{$tipo_solicitacao}</td>
              </tr>
			  <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Especificar Festival, edição e categoria em que recebeu o Prêmio CTAv</th>
                <td colspan='3'>{$projeto_pergunta}</td>
              </tr>
              <tr>
                <th align='right'>Duração: *</th>
                <td>{$projeto_duracao}</td>
                <th align='right'>Gênero: *</th>
                <td>{$projeto_genero}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Formato Original de Produção: *</th>
                <td colspan='3'>{$projeto_formato_original}</td>
              </tr>
              <tr>
                <th align='right' valign='top'>Suporte Original da 1ª Cópia: *</th>
                <td colspan='3'>{$projeto_suporte_original}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Cromia: *</th>
                <td colspan='3'>{$projeto_cromia}</td>
              </tr>
              <tr>
                <th align='right' valign='top'>Sinopse: *</th>
                <td colspan='3'>{$projeto_sinopse}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Ficha Técnica: *</th>
                <td colspan='3'>{$projeto_ficha_tecnica}</td>
              </tr>
              <tr>
                <th align='right' valign='top'>Justificativa: *</th>
                <td colspan='3'>{$projeto_justificativa}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Objetivos: *</th>
                <td colspan='3'>{$projeto_objetivos}</td>
              </tr>
              <tr>
                <th align='right' valign='top'>Elenco:</th>
                <td colspan='3'>{$projeto_elenco}</td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

              <!-- Equipamentos -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>4. SOBRE OS EQUIPAMENTOS</th>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>
                  Equipamentos Solicitados: *<br />
                </th>
                <td colspan='3'>{$equipamentos_materiais}; ?></td>
              </tr>
              <tr>
                <th align='right' valign='top'>Período sugerido para filmagem:</th>
                <td>Início em: {$equipamentos_inicio}</td>
                <td colspan='2'>Término em: {$equipamentos_termino}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Descrição da locação de filmagem/gravação:</th>
                <td colspan='3'>{$equipamentos_locacao}</td>
              </tr>
              <tr>
                <th align='right'>Cidade: *</th>
                <td>{$equipamentos_cidade}</td>
                <th align='right'>Estado:</th>
                <td>Estado: {$equipamentos_estado}</td>
              </tr>
              <tr>
                <th align='right'>Arcar com seguro: *</th>
                <td colspan='3'>{$equipamentos_seguro}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Retirar item do kit: *</th>
                <td colspan='3'>{$equipamentos_retirar}</td>
              </tr>
              <tr>
                <th align='right'>Nome do profissional responsável por operar a câmera:</th>
                <td colspan='3'>{$equipamentos_operador}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Cursos do operador da câmera:</th>
                <td colspan='3'>{$equipamentos_operador_cursos}</td>
              </tr>
              <tr>
                <th align='right'>Experiencia do operador da câmera:</th>
                <td colspan='3'>{$equipamentos_operador_experiencia}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Curriculo do operador da câmera:</th>
                <td colspan='3'>{$equipamentos_operador_curriculo}</td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

              <!-- Filme -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>4. SOBRE O FILME</th>
              <tr>
                <th align='right'>Título do Filme: *</th>
                <td colspan='3'>{$filme_titulo}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Universitário: *</th>
                <td>{$filme_universitario}</td>
                <th align='right'>Instituição:</th>
                <td>{$filme_universitario_instituicao}</td>
              </tr>
              <tr>
                <th align='right'>Independente: *</th>
                <td colspan='3'>{$filme_independente}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>O roteiro do filme recebeu algum prêmio?</th>
                <td>{$filme_roteiro_premio}</td>
                <th align='right'>Especifique:</th>
                <td>{$filme_roteiro_premio_nome}</td>
              </tr>
              <tr>
                <th align='right'>O filme recebeu algum prêmio de finalização?</th>
                <td>{$filme_finalizacao_premio}</td>
                <th align='right'>Especifique:</th>
                <td>{$filme_finalizacao_premio_nome}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Utiliza leis e/ou prêmios municipais ou estaduais?</th>
                <td colspan='3'>{$filme_lei}</td>
              </tr>
              <tr>
                <th align='right'>Tipo de lei/prêmio:</th>
                <td>{$filme_lei_tipo}</td>
                <th align='right'>Valor:</th>
                <td>{$filme_lei_valor}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Caso esteja inscrito em leis federais de incentivo, informar número de Pronac ou Salic:</th>
                <td colspan='3'>{$filme_pronac}</td>
              </tr>
              <tr>
                <th align='right'>Valor orçado: *</th>
                <td>{$filme_valor}</td>
                <th align='right'>Valor captado, ou contratado, até esta data: *</th>
                <td>{$filme_valor_captado}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Empresa(s) patrocinadora(s):</th>
                <td colspan='3'>{$filme_patrocinadores}</td>
              </tr>
              <tr>
                <th align='right'>Distribuidora:</th>
                <td colspan='3'>{$filme_distribuidora}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Filmografia do Diretor:</th>
                <td colspan='3'>{$filme_filmografia}</td>
              </tr>
              <tr>
                <th align='right' valign='top'>Currículo Resumido do Diretor: *</th>
                <td colspan='3'>{$filme_diretor_curriculo}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Currículo Resumido do Produtor: *</th>
                <td colspan='3'>{$filme_produtor_curriculo}</td>
              </tr>
              <tr>
                <th align='right'>O Diretor e ou Produtor já receberam apoio do CTAv? *</th>
                <td>{$filme_apoio_ctav}</td>
                <th align='right'>Especificar Serviço:</th>
                <td>{$filme_servico}</td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Para qual filme?</th>
                <td colspan='3'>{$filme_apoio_ctav_titulo}</td>
              </tr>
              <tr>
                <th align='right' valign='top'>Outras informações relevantes/observações:</th>
                <td colspan='3'>{$filme_outros}</td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

            </table>
          ";

          $to = "emprestimo.alexasi2k@cultura.gov.br";
          $subject = "CTAv: Equipamentos {$form_count}";

          $headers  = "MIME-Version: 1.0;\n";
          $headers .= "Content-type: text/html; charset=UTF-8;\n";
          $headers .= "X-Mailer: PHP;\n";
          $headers .= "From: MinC <automatico@cultura.gov.br>;\n";

          // Fernão 27/01/2016: ALTEREI DE wp_mail() para mail() pois a primeira não funcionava =/
          // if(wp_mail($to, $subject, $message, $headers)) :
          if(mail($to, $subject, $message, $headers)) :
            update_option('form_equipamentos_count', $form_count);

            $regulamento = new WP_Query('page_id=12124');

            if($regulamento->have_posts())
            {
              $regulamento->the_post();
              the_content();
            }

            print $message;

            print "<script>alert('ATENÇÃO: INSCRIÇÃO (Nº {$form_count}). \\n NÃO SE ESQUEÇA DE IMPRIMIR SEU FORMULÁRIO!')</script>";
          else :
            print "<script>alert('Falha ao enviar requisição! Por favor, tente novamente mais tarde.')</script>";
          endif;

        elseif(!empty($_POST['accept'])) :
        ?>
          <?php if(!empty($_POST['submit']) && is_array($erros)) : ?><script>alert('<?php foreach($erros as $erro) print "{$erro} \\n"; ?>')</script><?php endif; ?>
          <p>* campos de preenchimento obrigatório</p>
          <p>** campos de preenchimento obrigatório para pessoa física</p>
          <p>*** campos de preenchimento obrigatório para pessoa jurídica</p>
          <form action="" method="post">
            <input type="hidden" name="accept" value="accept" />
            <table width='100%' border='0' cellspacing='0' class='forms'>

              <!-- Proponente -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>1. DADOS DO PROPONENTE</th>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Nome: *</th>
                <td colspan='3'><input type="text" name="proponente_nome" maxlength="100" value="<?php print $proponente_nome; ?>" /></td>
              </tr>
              <tr>
                <th align='right'>CPF: **</th>
                <td><input type="text" name="proponente_cpf" size="11" maxlength="11" value="<?php print $proponente_cpf; ?>" /></td>
                <th align='right'>CNPJ: ***</th>
                <td><input type="text" name="proponente_cnpj" size="14" maxlength="14" value="<?php print $proponente_cnpj; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>RG (Pessoa Física): **</th>
                <td><input type="text" name="proponente_rg" size="10" maxlength="10" value="<?php print $proponente_rg; ?>" /></td>
                <th align='right'>Registro Ancine: ***</th>
                <td><input type="text" name="proponente_ra" maxlength="50" value="<?php print $proponente_ra; ?>" /></td>
              </tr>
              <tr>
                <th align='right'>Telefone: *</th>
                <td>
                  ( <input type="text" name="proponente_ddd_telefone" size="2" maxlength="2" value="<?php print $proponente_ddd_telefone; ?>" /> )
                  <input type="text" name="proponente_telefone" size="10" maxlength="15" value="<?php print $proponente_telefone; ?>" />
                </td>
                <th align='right'>Celular: *</th>
                <td>
                  ( <input type="text" name="proponente_ddd_celular" size="2" maxlength="2" value="<?php print $proponente_ddd_celular; ?>" /> )
                  <input type="text" name="proponente_celular" size="10" maxlength="15" value="<?php print $proponente_celular; ?>" />
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>E-mail: *</th>
                <td colspan='3'><input type="text" name="proponente_email" maxlength="100" value="<?php print $proponente_email; ?>" /></td>
              </tr>
              <tr>
                <th align='right'>Endereço: *</th>
                <td><input type="text" name="proponente_endereco" maxlength="100" value="<?php print $proponente_endereco; ?>" /></td>
                <th align='right'>Nº Complemento: *</th>
                <td><input type="text" name="proponente_complemento" maxlength="100" value="<?php print $proponente_complemento; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Cidade: *</th>
                <td><input type="text" name="proponente_cidade" maxlength="100" value="<?php print $proponente_cidade; ?>" /></td>
                <th align='right'>Estado: *</th>
                <td>
                  <select name="proponente_estado">
                    <option value="AC" <?php if($proponente_estado == 'AC') print "selected='selected'"; ?>>AC</option>
                    <option value="AL" <?php if($proponente_estado == 'AL') print "selected='selected'"; ?>>AL</option>
                    <option value="AP" <?php if($proponente_estado == 'AP') print "selected='selected'"; ?>>AP</option>
                    <option value="AM" <?php if($proponente_estado == 'AM') print "selected='selected'"; ?>>AM</option>
                    <option value="BA" <?php if($proponente_estado == 'BA') print "selected='selected'"; ?>>BA</option>
                    <option value="CE" <?php if($proponente_estado == 'CE') print "selected='selected'"; ?>>CE</option>
                    <option value="DF" <?php if($proponente_estado == 'DF') print "selected='selected'"; ?>>DF</option>
                    <option value="ES" <?php if($proponente_estado == 'ES') print "selected='selected'"; ?>>ES</option>
                    <option value="GO" <?php if($proponente_estado == 'GO') print "selected='selected'"; ?>>GO</option>
                    <option value="MA" <?php if($proponente_estado == 'MA') print "selected='selected'"; ?>>MA</option>
                    <option value="MG" <?php if($proponente_estado == 'MG') print "selected='selected'"; ?>>MG</option>
                    <option value="MT" <?php if($proponente_estado == 'MT') print "selected='selected'"; ?>>MT</option>
                    <option value="MS" <?php if($proponente_estado == 'MS') print "selected='selected'"; ?>>MS</option>
                    <option value="PA" <?php if($proponente_estado == 'PA') print "selected='selected'"; ?>>PA</option>
                    <option value="PB" <?php if($proponente_estado == 'PB') print "selected='selected'"; ?>>PB</option>
                    <option value="PE" <?php if($proponente_estado == 'PE') print "selected='selected'"; ?>>PE</option>
                    <option value="PI" <?php if($proponente_estado == 'PI') print "selected='selected'"; ?>>PI</option>
                    <option value="PR" <?php if($proponente_estado == 'PR') print "selected='selected'"; ?>>PR</option>
                    <option value="RJ" <?php if($proponente_estado == 'RJ') print "selected='selected'"; ?>>RJ</option>
                    <option value="RN" <?php if($proponente_estado == 'RN') print "selected='selected'"; ?>>RN</option>
                    <option value="RO" <?php if($proponente_estado == 'RO') print "selected='selected'"; ?>>RO</option>
                    <option value="RR" <?php if($proponente_estado == 'RR') print "selected='selected'"; ?>>RR</option>
                    <option value="RS" <?php if($proponente_estado == 'RS') print "selected='selected'"; ?>>RS</option>
                    <option value="SC" <?php if($proponente_estado == 'SC') print "selected='selected'"; ?>>SC</option>
                    <option value="SE" <?php if($proponente_estado == 'SE') print "selected='selected'"; ?>>SE</option>
                    <option value="SP" <?php if($proponente_estado == 'SP') print "selected='selected'"; ?>>SP</option>
                    <option value="TO" <?php if($proponente_estado == 'TO') print "selected='selected'"; ?>>TO</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th align='right'>CEP: *</th>
                <td><input type="text" name="proponente_cep" size="8" maxlength="8" value="<?php print $proponente_cep; ?>" /></td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

              <!-- Diretor -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>2. DADOS DO DIRETOR</th>
              <tr bgcolor='#f6f9fa'>
                <th colspan='4'><input type='checkbox' name='proponente_diretor' value='1' <?php if($proponente_diretor == '1') print "checked='checked'"; ?> /> Caso o proponente seja o diretor marque esse campo</th>
              </tr>
              <tr>
                <th align='right'>Nome: *</th>
                <td colspan='3'><input type="text" name="diretor_nome" maxlength="100" value="<?php print $diretor_nome; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>CPF: *</th>
                <td><input type="text" name="diretor_cpf" size="11" maxlength="11" value="<?php print $diretor_cpf; ?>" /></td>
                <th align='right'>RG (Pessoa Física): *</th>
                <td><input type="text" name="diretor_rg" size="10" maxlength="10" value="<?php print $diretor_rg; ?>" /></td>
              </tr>
              <tr>
                <th align='right'>Telefone: *</th>
                <td>
                  ( <input type="text" name="diretor_ddd_telefone" size="2" maxlength="2" value="<?php print $diretor_ddd_telefone; ?>" /> )
                  <input type="text" name="diretor_telefone" size="10" maxlength="15" value="<?php print $diretor_telefone; ?>" />
                </td>
                <th align='right'>Celular: *</th>
                <td>
                  ( <input type="text" name="diretor_ddd_celular" size="2" maxlength="2" value="<?php print $diretor_ddd_celular; ?>" /> )
                  <input type="text" name="diretor_celular" size="10" maxlength="15" value="<?php print $diretor_celular; ?>" />
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>E-mail: *</th>
                <td colspan='3'><input type="text" name="diretor_email" maxlength="100" value="<?php print $diretor_email; ?>" /></td>
              </tr>
              <tr>
                <th align='right'>Endereço: *</th>
                <td><input type="text" name="diretor_endereco" maxlength="100" value="<?php print $diretor_endereco; ?>" /></td>
                <th align='right'>Nº Complemento: *</th>
                <td><input type="text" name="diretor_complemento" maxlength="100" value="<?php print $diretor_complemento; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Cidade: *</th>
                <td><input type="text" name="diretor_cidade" maxlength="100" value="<?php print $diretor_cidade; ?>" /></td>
                <th align='right'>Estado: *</th>
                <td>
                  <select name="diretor_estado">
                    <option value="AC" <?php if($diretor_estado == 'AC') print "selected='selected'"; ?>>AC</option>
                    <option value="AL" <?php if($diretor_estado == 'AL') print "selected='selected'"; ?>>AL</option>
                    <option value="AP" <?php if($diretor_estado == 'AP') print "selected='selected'"; ?>>AP</option>
                    <option value="AM" <?php if($diretor_estado == 'AM') print "selected='selected'"; ?>>AM</option>
                    <option value="BA" <?php if($diretor_estado == 'BA') print "selected='selected'"; ?>>BA</option>
                    <option value="CE" <?php if($diretor_estado == 'CE') print "selected='selected'"; ?>>CE</option>
                    <option value="DF" <?php if($diretor_estado == 'DF') print "selected='selected'"; ?>>DF</option>
                    <option value="ES" <?php if($diretor_estado == 'ES') print "selected='selected'"; ?>>ES</option>
                    <option value="GO" <?php if($diretor_estado == 'GO') print "selected='selected'"; ?>>GO</option>
                    <option value="MA" <?php if($diretor_estado == 'MA') print "selected='selected'"; ?>>MA</option>
                    <option value="MG" <?php if($diretor_estado == 'MG') print "selected='selected'"; ?>>MG</option>
                    <option value="MT" <?php if($diretor_estado == 'MT') print "selected='selected'"; ?>>MT</option>
                    <option value="MS" <?php if($diretor_estado == 'MS') print "selected='selected'"; ?>>MS</option>
                    <option value="PA" <?php if($diretor_estado == 'PA') print "selected='selected'"; ?>>PA</option>
                    <option value="PB" <?php if($diretor_estado == 'PB') print "selected='selected'"; ?>>PB</option>
                    <option value="PE" <?php if($diretor_estado == 'PE') print "selected='selected'"; ?>>PE</option>
                    <option value="PI" <?php if($diretor_estado == 'PI') print "selected='selected'"; ?>>PI</option>
                    <option value="PR" <?php if($diretor_estado == 'PR') print "selected='selected'"; ?>>PR</option>
                    <option value="RJ" <?php if($diretor_estado == 'RJ') print "selected='selected'"; ?>>RJ</option>
                    <option value="RN" <?php if($diretor_estado == 'RN') print "selected='selected'"; ?>>RN</option>
                    <option value="RO" <?php if($diretor_estado == 'RO') print "selected='selected'"; ?>>RO</option>
                    <option value="RR" <?php if($diretor_estado == 'RR') print "selected='selected'"; ?>>RR</option>
                    <option value="RS" <?php if($diretor_estado == 'RS') print "selected='selected'"; ?>>RS</option>
                    <option value="SC" <?php if($diretor_estado == 'SC') print "selected='selected'"; ?>>SC</option>
                    <option value="SE" <?php if($diretor_estado == 'SE') print "selected='selected'"; ?>>SE</option>
                    <option value="SP" <?php if($diretor_estado == 'SP') print "selected='selected'"; ?>>SP</option>
                    <option value="TO" <?php if($diretor_estado == 'TO') print "selected='selected'"; ?>>TO</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th align='right'>CEP: *</th>
                <td><input type="text" name="diretor_cep" size="8" maxlength="8" value="<?php print $diretor_cep; ?>" /></td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

              <!-- Projeto -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>3. INFORMAÇÕES SOBRE O PROJETO</th>
              <tr>
              <th align='right' valign='top'>Tipo de Solicitação: *</th>
                <td colspan='3'>
                  <input id="tipo_solicitacao" class="radio" type='radio' name='tipo_solicitacao' value='padrao' <?php if($tipo_solicitacao == 'padrao') print "checked='checked'"; ?> /> Solicitação padrão <br />
                  <input id="tipo_solicitacao" class="radio" type='radio' name='tipo_solicitacao' value='premio' <?php if($tipo_solicitacao == 'premio') print "checked='checked'"; ?> /> Retirada de Prêmio CTAv recebido <br /><br />
                  
                  <div id="premio" class="oculto">
    			<hr /> <h3>Especificar Festival, edição e categoria em que recebeu o Prêmio CTAv*:</h3>
                    <textarea id='projeto_pergunta' name='projeto_pergunta' cols='50' rows='5'><?php print $projeto_pergunta; ?></textarea><br />
                    <label>*<strong>Observação:</strong> Será requisitado o envio de certificado do Prêmio CTAv para comprovação da regularidade do pedido de retirada. </label>
			  </div>
              </td>
              </tr>           
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Metragem: *</th>
                <td colspan='3'>
                  <input type='radio' name='projeto_metragem' value='curta' <?php if($projeto_metragem == 'curta') print "checked='checked'"; ?> /> Curta-metragem<br />
                  <input type='radio' name='projeto_metragem' value='media' <?php if($projeto_metragem == 'media') print "checked='checked'"; ?> /> Média-metragem<br />
                  <input type='radio' name='projeto_metragem' value='longa' <?php if($projeto_metragem == 'longa') print "checked='checked'"; ?> /> Longa-metragem<br />
                </td>
              </tr>
              <tr>
                <th align='right'>Duração: *</th>
                <td><input type="text" name="projeto_duracao" maxlength="100" value="<?php print $projeto_duracao; ?>" /></td>
                <th align='right'>Gênero: *</th>
                <td><input type="text" name="projeto_genero" maxlength="100" value="<?php print $projeto_genero; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Formato Original de Produção: *</th>
                <td colspan='3'><input type="text" name="projeto_formato_original" maxlength="100" value="<?php print $projeto_formato_original; ?>" /></td>
              </tr>
              <tr>
                <th align='right' valign='top'>Suporte Original da 1ª Cópia: *</th>
                <td colspan='3'><input type="text" name="projeto_suporte_original" maxlength="100" value="<?php print $projeto_suporte_original; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Cromia: *</th>
                <td colspan='3'>
                  <input type='radio' name='projeto_cromia' value='cor' <?php if($projeto_cromia == 'cor') print "checked='checked'"; ?> /> Cor<br />
                  <input type='radio' name='projeto_cromia' value='peb' <?php if($projeto_cromia == 'peb') print "checked='checked'"; ?> /> P&amp;B<br />
                </td>
              </tr>
              <tr>
                <th align='right' valign='top'>Sinopse: *</th>
                <td colspan='3'>
                  <textarea id='projeto_sinopse' name='projeto_sinopse' cols='50' rows='5'><?php print $projeto_sinopse; ?></textarea><br />
                  <small id="projeto_sinopse_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Ficha Técnica: *</th>
                <td colspan='3'>
                  <textarea id='projeto_ficha_tecnica' name='projeto_ficha_tecnica' cols='50' rows='5'><?php print $projeto_ficha_tecnica; ?></textarea><br />
                  <small id="projeto_ficha_tecnica_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr>
                <th align='right' valign='top'>Justificativa: *</th>
                <td colspan='3'>
                  <textarea id='projeto_justificativa' name='projeto_justificativa' cols='50' rows='5'><?php print $projeto_justificativa; ?></textarea><br />
                  <small id="projeto_justificativa_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Objetivos: *</th>
                <td colspan='3'>
                  <textarea id='projeto_objetivos' name='projeto_objetivos' cols='50' rows='5'><?php print $projeto_objetivos; ?></textarea><br />
                  <small id="projeto_objetivos_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr>
                <th align='right' valign='top'>Elenco:</th>
                <td colspan='3'>
                  <textarea id='projeto_elenco' name='projeto_elenco' cols='50' rows='5'><?php print $projeto_elenco; ?></textarea><br />
                  <small id="projeto_elenco_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

              <!-- Equipamentos -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>4. SOBRE OS EQUIPAMENTOS</th>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>
                  Equipamentos Solicitados: *<br />
                  <small>(Especificar qual kit está sendo solicitado dos dispostos neste regulamento)</small>
                </th>
                <td colspan='3'>
                  <textarea id='equipamentos_materiais' name='equipamentos_materiais' cols='50' rows='5'><?php print $equipamentos_materiais; ?></textarea><br />
                  <small id="equipamentos_materiais_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr>
                <th align='right' valign='top'>Período sugerido para filmagem:</th>
                <td>Início em: *<input type='text' name='equipamentos_inicio' size='10' maxlength='10' value='<?php print $equipamentos_inicio; ?>' /></td>
                <td colspan='2'>Término em: *<input type='text' name='equipamentos_termino' size='10' maxlength='10' value='<?php print $equipamentos_termino; ?>' /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Descrição da locação de filmagem/gravação:</th>
                <td colspan='3'><input type='text' name='equipamentos_locacao' id='equipamentos_locacao' value='<?php print $equipamentos_locacao; ?>' /></td>
              </tr>

              <tr>
                <th align='right'>Cidade: *</th>
                <td><input type='text' name='equipamentos_cidade' maxlength='100' value='<?php print $equipamentos_cidade; ?>' /></td>
                <th align='right'>Estado:</th>
                <td colspan='2'>
                  <select name="equipamentos_estado">
                    <option value="AC" <?php if($equipamentos_estado == 'AC') print "selected='selected'"; ?>>AC</option>
                    <option value="AL" <?php if($equipamentos_estado == 'AL') print "selected='selected'"; ?>>AL</option>
                    <option value="AP" <?php if($equipamentos_estado == 'AP') print "selected='selected'"; ?>>AP</option>
                    <option value="AM" <?php if($equipamentos_estado == 'AM') print "selected='selected'"; ?>>AM</option>
                    <option value="BA" <?php if($equipamentos_estado == 'BA') print "selected='selected'"; ?>>BA</option>
                    <option value="CE" <?php if($equipamentos_estado == 'CE') print "selected='selected'"; ?>>CE</option>
                    <option value="DF" <?php if($equipamentos_estado == 'DF') print "selected='selected'"; ?>>DF</option>
                    <option value="ES" <?php if($equipamentos_estado == 'ES') print "selected='selected'"; ?>>ES</option>
                    <option value="GO" <?php if($equipamentos_estado == 'GO') print "selected='selected'"; ?>>GO</option>
                    <option value="MA" <?php if($equipamentos_estado == 'MA') print "selected='selected'"; ?>>MA</option>
                    <option value="MG" <?php if($equipamentos_estado == 'MG') print "selected='selected'"; ?>>MG</option>
                    <option value="MT" <?php if($equipamentos_estado == 'MT') print "selected='selected'"; ?>>MT</option>
                    <option value="MS" <?php if($equipamentos_estado == 'MS') print "selected='selected'"; ?>>MS</option>
                    <option value="PA" <?php if($equipamentos_estado == 'PA') print "selected='selected'"; ?>>PA</option>
                    <option value="PB" <?php if($equipamentos_estado == 'PB') print "selected='selected'"; ?>>PB</option>
                    <option value="PE" <?php if($equipamentos_estado == 'PE') print "selected='selected'"; ?>>PE</option>
                    <option value="PI" <?php if($equipamentos_estado == 'PI') print "selected='selected'"; ?>>PI</option>
                    <option value="PR" <?php if($equipamentos_estado == 'PR') print "selected='selected'"; ?>>PR</option>
                    <option value="RJ" <?php if($equipamentos_estado == 'RJ') print "selected='selected'"; ?>>RJ</option>
                    <option value="RN" <?php if($equipamentos_estado == 'RN') print "selected='selected'"; ?>>RN</option>
                    <option value="RO" <?php if($equipamentos_estado == 'RO') print "selected='selected'"; ?>>RO</option>
                    <option value="RR" <?php if($equipamentos_estado == 'RR') print "selected='selected'"; ?>>RR</option>
                    <option value="RS" <?php if($equipamentos_estado == 'RS') print "selected='selected'"; ?>>RS</option>
                    <option value="SC" <?php if($equipamentos_estado == 'SC') print "selected='selected'"; ?>>SC</option>
                    <option value="SE" <?php if($equipamentos_estado == 'SE') print "selected='selected'"; ?>>SE</option>
                    <option value="SP" <?php if($equipamentos_estado == 'SP') print "selected='selected'"; ?>>SP</option>
                    <option value="TO" <?php if($equipamentos_estado == 'TO') print "selected='selected'"; ?>>TO</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th align='right'>Está disposto a arcar com os custos do seguro do equipamento pelo período em que o mesmo estiver sob sua responsabilidade? *</th>
                <td colspan='3'>
                  <input type="radio" name="equipamentos_seguro" value="s" <?php if($equipamentos_seguro == 's') print "checked='checked'"; ?> /> Sim
                  <input type="radio" name="equipamentos_seguro" value="n" <?php if($equipamentos_seguro == 'n') print "checked='checked'"; ?> /> Não
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Deseja retirar algum item do kit? (Não poderá ser feita troca ou  adição de material entre kits de outras câmeras) *</th>
                <td colspan='3'><input type='text' name='equipamentos_retirar' id='equipamentos_retirar' value='<?php print $equipamentos_retirar; ?>' /></td>
              </tr>

              <tr>
                <th align='right' valign='top'>Nome do profissional responsável por operar a câmera: *</th>
                <td colspan='3'><input type='text' name='equipamentos_operador' id='equipamentos_operador' value='<?php print $equipamentos_operador; ?>' /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Em relação ao profissional que irá operar a câmera, o mesmo participou de cursos, oficinas ou workshops para aprender a usar o equipamento solicitado? Se sim, especifique: *</th>
                <td colspan='3'>  
                  <textarea id='equipamentos_operador_cursos' name='equipamentos_operador_cursos' cols='50' rows='5'><?php print $equipamentos_operador_cursos; ?></textarea><br />
                  <small id="equipamentos_materiais_limit">max. 2000 caracteres</small>
                </td>  
              </tr>
              <tr>
                <th align='right' valign='top'>Em relação ao profissional que irá operar a câmera, o mesmo possui experiência profissional com o equipamento solicitado? *</th>
                <td colspan='3'><input type='text' name='equipamentos_operador_experiencia' id='equipamentos_operador_experiencia' value='<?php print $equipamentos_operador_experiencia; ?>' /></td> 
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Currículo do profissional que irá operar a câmera: *<br />
                 (Explicitar dados dos filmes em que já trabalhou e a função exercida em cada um)</th>
                <td colspan='3'>  
                  <textarea id='equipamentos_operador_curriculo' name='equipamentos_operador_curriculo' cols='80' rows='20'><?php print $equipamentos_operador_curriculo; ?></textarea><br />
                  <small id="equipamentos_operador_curriculo_limit">max. 6000 caracteres</small>
                </td>  
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

              <!-- Filme -->
              <th colspan='4' bgcolor='#eaf4eb' align='center'>5. SOBRE O FILME</th>
              <tr>
                <th align='right'>Título do Filme: *</th>
                <td colspan='3'><input type="text" name="filme_titulo" maxlength="100" value="<?php print $filme_titulo; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Universitário: *</th>
                <td>
                  <input type="radio" name="filme_universitario" value="s" <?php if($filme_universitario == 's') print "checked='checked'"; ?> /> Sim
                  <input type="radio" name="filme_universitario" value="n" <?php if($filme_universitario == 'n') print "checked='checked'"; ?> /> Não
                </td>
                <th align='right'>Instituição:</th>
                <td><input type="text" name="filme_universitario_instituicao" maxlength="100" value="<?php print $filme_universitario_instituicao; ?>" />
                </td>
              </tr>
              <tr>
                <th align='right'>Independente: *</th>
                <td colspan='3'>
                  <input type="radio" name="filme_independente" value="s" <?php if($filme_independente == 's') print "checked='checked'"; ?> /> Sim
                  <input type="radio" name="filme_independente" value="n" <?php if($filme_independente == 'n') print "checked='checked'"; ?> /> Não
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>O roteiro do filme recebeu algum prêmio?</th>
                <td>
                  <input type="radio" name="filme_roteiro_premio" value="s" <?php if($filme_roteiro_premio == 's') print "checked='checked'"; ?> /> Sim
                  <input type="radio" name="filme_roteiro_premio" value="n" <?php if($filme_roteiro_premio == 'n') print "checked='checked'"; ?> /> Não
                </td>
                <th align='right'>Especifique:</th>
                <td><input type="text" name="filme_roteiro_premio_nome" maxlength="100" value="<?php print $filme_roteiro_premio_nome; ?>" /></td>
              </tr>
              <tr>
                <th align='right'>O filme recebeu algum prêmio de finalização?</th>
                <td>
                  <input type="radio" name="filme_finalizacao_premio" value="s" <?php if($filme_finalizacao_premio == 's') print "checked='checked'"; ?> /> Sim
                  <input type="radio" name="filme_finalizacao_premio" value="n" <?php if($filme_finalizacao_premio == 'n') print "checked='checked'"; ?> /> Não
                </td>
                <th align='right'>Especifique:</th>
                <td><input type="text" name="filme_finalizacao_premio_nome" maxlength="100" value="<?php print $filme_finalizacao_premio_nome; ?>" />
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Utiliza leis e/ou prêmios municipais ou estaduais?</th>
                <td colspan='3'>
                  <input type="radio" name="filme_lei" value="s" <?php if($filme_lei == 's') print "checked='checked'"; ?> /> Sim
                  <input type="radio" name="filme_lei" value="n" <?php if($filme_lei == 'n') print "checked='checked'"; ?> /> Não
                </td>
              </tr>
              <tr>
                <th align='right'>Tipo de lei/prêmio:</th>
                <td><input type="text" name="filme_lei_tipo" maxlength='100' value="<?php print $filme_lei_tipo; ?>" /></td>
                <th align='right'>Valor:</th>
                <td><input type="text" name="filme_lei_valor" maxlength="100" value="<?php print $filme_lei_valor; ?>" />
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Caso esteja inscrito em leis federais de incentivo, informar número de Pronac ou Salic:</th>
                <td colspan='3'><input type="text" name="filme_pronac" maxlength="10" value="<?php print $filme_pronac; ?>" /></td>
              </tr>
              <tr>
                <th align='right'>Valor orçado: *</th>
                <td><input type="text" name="filme_valor" maxlength='100' value="<?php print $filme_valor; ?>" /></td>
                <th align='right'>Valor captado, ou contratado, até esta data: *</th>
                <td><input type="text" name="filme_valor_captado" maxlength="100" value="<?php print $filme_valor_captado; ?>" />
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Empresa(s) patrocinadora(s):</th>
                <td colspan='3'>
                  <textarea id='filme_patrocinadores' name="filme_patrocinadores" cols='50' rows='5'><?php print $filme_patrocinadores; ?></textarea><br />
                  <small id="filme_patrocinadores_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr>
                <th align='right'>Distribuidora:</th>
                <td colspan='3'><input type="text" name="filme_distribuidora" maxlength="100" value="<?php print $filme_distribuidora; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right'>Filmografia do Diretor: *</th>
                <td colspan='3'><input type="text" name="filme_filmografia" maxlength="100" value="<?php print $filme_filmografia; ?>" /></td>
              </tr>
              <tr>
                <th align='right' valign='top'>Currículo Resumido do Diretor: *</th>
                <td colspan='3'>
                  <textarea id='filme_diretor_curriculo' name="filme_diretor_curriculo" cols='50' rows='5'><?php print $filme_diretor_curriculo; ?></textarea><br />
                  <small id="filme_diretor_curriculo_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Currículo Resumido do Produtor: *</th>
                <td colspan='3'>
                  <textarea id='filme_produtor_curriculo' name="filme_produtor_curriculo" cols='50' rows='5'><?php print $filme_produtor_curriculo; ?></textarea><br />
                  <small id="filme_produtor_curriculo_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr>
                <th align='right'>O Diretor e ou Produtor já receberam apoio do CTAv? *</th>
                <td>
                  <input type="radio" name="filme_apoio_ctav" value="s" <?php if($filme_apoio_ctav == 's') print "checked='checked'"; ?> /> Sim
                  <input type="radio" name="filme_apoio_ctav" value="n" <?php if($filme_apoio_ctav == 'n') print "checked='checked'"; ?> /> Não
                </td>
                <th align='right'>Especificar Serviço:</th>
                <td><input type="text" name="filme_servico" maxlength="100" value="<?php print $filme_servico; ?>" /></td>
              </tr>
              <tr bgcolor='#f6f9fa'>
                <th align='right' valign='top'>Para qual filme?</th>
                <td colspan='3'><input type='text' id='filme_apoio_ctav_titulo' name="filme_apoio_ctav_titulo" value="<?php print $filme_apoio_ctav_titulo; ?>" /></td>
              </tr>
              <tr>
                <th align='right' valign='top'>Outras informações relevantes/observações:</th>
                <td colspan='3'>
                  <textarea id='filme_outros' name="filme_outros" cols='50' rows='5'><?php print $filme_outros; ?></textarea><br />
                  <small id="filme_outros_limit">max. 2000 caracteres</small>
                </td>
              </tr>
              <tr>
                <td colspan='4'>&nbsp;</td>
              </tr>

            </table>
            <input type="submit" name="submit" value="enviar" />
          </form>

        <?php else : ?>
          <form action="" method="post">
            <?php $regulamento = new WP_Query('page_id=12124'); ?>
            <?php if($regulamento->have_posts()) : $regulamento->the_post(); ?>
            <?php the_content(); ?>
            <?php endif; ?>
            <button type="submit" name="accept" value="accept">Li e Concordo com o Regulamento</button>
          </form>

        <?php endif; ?>

      </div>

    <?php else : ?>
      <h2 class="post-title">404</h2>
      <h5 class="post-description">Desculpe! A página que procura não foi encontrada.</h5>

    <?php endif; ?>
  </div>
</div>

<script src="js/jquery-1.10.2.min.js"></script>

<!-- SCRIPT OCULTA PERGUNTA -->
<script>
$(document).ready(function () {
	/*$('#premio').hide();
    $(".radio").change(function () { //use change event
        if (this.value == "premio") { //check value if it is domicilio
            $('#premio').stop(true,true).show(1000); //than show
        } else {
            $('#premio').stop(true,true).hide(1000); //else hide
        }
    });*/
});
</script>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
