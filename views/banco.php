<?php
require_once "../config/define.php";
require_once DIR_ROOT."/Classes/User.php";
User::verifyLogin();

//CRUD básico

//1º - Título da pagina
$title = "Banco";

//2º - Tabela e a coluna que contem o id
$tabela= "banco";
$id_coluna = "id_banco";

//3º - ações dos datatables (precisa ser uma string separada por virgulas)
$acoes_datatables = 'copy,csv,excel,pdf,print,colvis';

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
<div class="content-wrapper text-sm">
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
                    
                  </form>
                  <!-- /.Formulário de Filtros -->
                </div>
              </div>
              <!-- /.Filtros e botões principais -->

              <!-- Tabela -->
              <div class="card">
                <div class="card-body">
                
                  <table id="datatable" class="table rounded table-bordered table-striped table-hover" style="border-radius: 10px;"></table>

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
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="descricao">Descrição<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="descricao" id="descricao" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="id_lista_bancos">Banco<span class="text-danger">*</span></label>
                          <select class="form-control select2" name="id_lista_bancos" id="id_lista_bancos" required></select>
                        </div>
                      </div>
                      <div class="col-6 col-md-3">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="agencia">Agência<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="agencia" id="agencia" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-3">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="conta">Conta<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="conta" id="conta" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-3">
                        <label>Tipo de Conta</label>
                        <div>
                          <div class="form- form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="tipo" value="CORRENTE" required>
                              Corrente
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="tipo" value="POUPANÇA" required>
                              Poupança
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cartao_credito" id="cartao_credito" value="S" onclick="checkbox(this)">
                            Cartão de Crédito
                          </label>
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