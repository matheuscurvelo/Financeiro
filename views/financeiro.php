<?php
require_once "../config/define.php";
require_once DIR_ROOT."/Classes/User.php";
User::verifyLogin();

//CRUD básico

//1º - Título da pagina
$title = "Financeiro";

//2º - Tabela e a coluna que contem o id
$tabela= "Financeiro";
$id_coluna = "id_financeiro";

//3º - ações dos datatables (precisa ser uma string separada por virgulas). Consultar os botões dispiníveis no site do datatables
$acoes_datatables = 'copy,csv,excel,pdf,print';

//3º - ações das tabelas
$cadastrar = true;

//3º - ações dos registros (botões se encontram)
$editar = false;
$deletar = false;

//js da página
$js = '<script src="../assets/js/'.$tabela.'.js"></script>';

/*
4º - acesse os arquivos "componentes/acoes_tabela.php" e 
"componentes/acoes_registros.php" caso queira inserir 
mais ações as suas telas. Após isso, insira mais variáveis no 3º passo
*/

require_once DIR_ROOT."/views/componentes/header_lateral.php";

require_once DIR_ROOT."/views/componentes/acoes_tabela.php";
require_once DIR_ROOT."/views/componentes/acoes_registros.php";


/*
5º - na sessão "Formulário de Filtros" no corpo desde HTML, voce pode
adicionar os filtros a sua necessidade

6º - na sessão "Formulário Principal" no corpo desde HTML, voce pode
adicionar os campos necessarios a sua necessidade

7º - agora vá para o JS relativo a pagina e siga as instruções
*/


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-12">
              <!-- Título -->
              <h1> 
                <?php echo $title ?? null; ?> 
                <small><!-- Example 3.0 --></small>
              </h1>
              <!-- /.Título -->
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">

            <!-- Area da tabela -->
            <div class="col-12" id="area_tabela">

              <!-- Filtros e botões principais -->
              <div class="card card-primary card-outline" id="filtros">
                <div class="card-header">
                  <!-- Botões de filtro -->
                </div>
                <div class="card-footer" style="display: none;">
                  <!-- Formulário de Filtros -->
                  <form method="post">
                    <div class="row">
                      <div class="col-6">
                        <select class="form-control select2" name="id_banco_filtro" id="id_banco_filtro"></select>    
                      </div>
                      <div class="col-6">
                        <button type="submit" class="btn btn-default" id="filtrar"><i class="fas fa-filter"></i> Filtrar</button>
                      </div>
                    </div>
                  </form>
                  <!-- /.Formulário de Filtros -->
                </div>
              </div>
              <!-- /.Filtros e botões principais -->

              <!-- Tabela -->
              <div class="card">
                <div class="card-body">
                
                  <table id="datatable" class="table-dark table rounded table-bordered table-striped table-hover" style="border-radius: 10px;"></table>

                </div>
              </div>
              <!-- /.Tabela -->

            </div>
            <!-- /.Area da tabela -->

            <!-- Tela -->
            <div class="col-12" id="tela" style="display: none;">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title" id="crud_title">Cadastrar</h5>
                </div>
                <div class="card-body">

                  <form method="post">
                    <!-- Hidden -->
                    <div>
                      <input type="hidden" id="acoes_datatables" value="<?php echo $acoes_datatables ?? null; ?>">
                      <input type="hidden" id="tabela" name="tabela" value="<?php echo $tabela ?? null; ?>">
                      <input type="hidden" id="id_coluna" name="<?php echo $id_coluna ?? null; ?>" value="">
                    </div>

                    <!-- Formulário Principal -->
                    <div class="row">
                      <div class="col-6 col-md-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="dt_lancamento">Dt. Lançamento<span class="text-danger"></span></label>
                            <input type="date" class="form-control" name="dt_lancamento" id="dt_lancamento">

                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="dt_vencimento">Dt. Vencimento<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="dt_vencimento" id="dt_vencimento" required>
  
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="descricao">Descrição<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="descricao" id="descricao" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="id_banco">Banco<span class="text-danger">*</span></label>
                            <select class="form-control select2" name="id_banco" id="id_banco" required></select>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-3">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="descricao">Tipo de pagamento<span class="text-danger">*</span></label>
                            <select class="form-control select2" name="tipo_pagamento" id="tipo_pagamento" required></select>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-3">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="valor">Valor<span class="text-danger">*</span></label>
                            <input type="text" class="form-control money" name="valor" id="valor" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-3">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="valor_pago">Valor Pago<span class="text-danger">*</span></label>
                            <input type="text" class="form-control money" name="valor_pago" id="valor_pago" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-3">
                        <label>Tipo de lançamento<span class="text-danger">*</span></label>
                        <div>
                          <div class="form- form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="CD" value="C" required>
                              Crédito
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="CD" value="D" required>
                              Débito
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.Formulário Principal -->
                    <div class="row mt-3 float-right">
                      <div class="col">
                        <button type="button" class="btn btn-default mr-2" onclick="mostrarCrud()"><i class="fa fa-undo"></i> Voltar</button>
                        <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Salvar</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!-- /.Tela -->
            
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php require_once "componentes/footer.php"; ?>