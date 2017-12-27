<!-- Modal -->
<div id="in_cliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Inserir Cliente</h3>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="exe_inserir.php" method="post">
          <h4>informações do Cliente</h4>
          <div class="form-group">
            <label class="control-label col-sm-2" for="nome">nome:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nome" placeholder="Entre com nome..." name="nome">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="cpf">Cpf:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="cpf" placeholder="Entre com Cpf..." name="cpf">
            </div>
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-2" for="data">Data Nascimento:</label>
            <div class="col-sm-10"> 
              <input type="date" class="form-control" id="data" placeholder="Entre com data de Nascimento..." name="data">
            </div>
          </div>
          <h4>informações do Veículo</h4>
          <div class="form-group"> 
            <label class="control-label col-sm-2" for="pl">placa:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="pl" placeholder="Entre com a Placa do Veículo..." name="pl">
            </div>
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-2" for="cor">Cor:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="cor" placeholder="Entre com a cor do Veículo..." name="cor">
            </div>
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-2" for="ano">Ano:</label>
            <div class="col-sm-10"> 
              <input type="date" class="form-control" id="ano" placeholder="Entre com o ano de fabricação do Veículo..." name="ano">
            </div>
          </div>
          <div class="form-group"> 
            <label class="control-label col-sm-2" for="des">Descrição:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="des" placeholder="Entre com a descrição do Veículo..." name="des">
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default pull-right">cadastrar</button>
            </div>
          </div>
        

      </div>
      <div class="modal-footer">
        <!--button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button-->
        
      </div>
    </div>
          </form>
  </div>
</div>
<!-- SAIDA -->
<div id="saida" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Saida de Veículo</h3>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="exe_saida.php" method="post">          
          <div class="form-group">
            <label class="control-label col-sm-2" for="cpf">Cpf:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="cpf" placeholder="Entre com Cpf do Cliente..." name="cpf">
            </div>
          </div> 
          <div class="form-group"> 
            <label class="control-label col-sm-2" for="pl">placa:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="pl" placeholder="Entre com a Placa do Veículo..." name="pl">
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-danger pull-right">Executar Saida...</button>
            </div>
          </div>
        

      </div>
      <div class="modal-footer">
        <!--button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button-->
        
      </div>
    </div>
          </form>
  </div>
</div>
<!-- ENTRADA -->
<div id="entrada" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Entrada de Veículo</h3>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="exe_entrada.php" method="post">          
          <div class="form-group">
            <label class="control-label col-sm-2" for="cpf">Cpf:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="cpf" placeholder="Entre com Cpf do Cliente..." name="cpf">
            </div>
          </div> 
          <div class="form-group"> 
            <label class="control-label col-sm-2" for="pl">placa:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="pl" placeholder="Entre com a Placa do Veículo..." name="pl">
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success pull-right">Executar Entrada...</button>
            </div>
          </div>
        

      </div>
      <div class="modal-footer">
        <!--button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button-->
        
      </div>
    </div>
          </form>
  </div>
</div>