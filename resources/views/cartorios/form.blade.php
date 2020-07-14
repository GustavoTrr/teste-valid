@extends('layouts.app')

{{-- @push('styles')

@endpush --}}

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Dados</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <form id="form_cartorio" method="POST" action="">

                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_NOME">NOME</label>
                    <input class="form-control" type="text" value="{{$cartorio->nome ?? null}}" placeholder="NOME" maxlength="200" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_CEP">CEP</label>
                      <input class="form-control" type="text" value="{{$cartorio->cep ?? null}}" placeholder="CEP" maxlength="8" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_NOME">NOME</label>
                      <input class="form-control" type="text" value="{{$cartorio->nome ?? null}}" placeholder="NOME" maxlength="200" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_ENDERECO">ENDEREÇO</label>
                      <input class="form-control" type="text" value="{{$cartorio->endereco ?? null}}" placeholder="ENDERECO" maxlength="400" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_RAZAO">RAZÃO SOCIAL</label>
                      <input class="form-control" type="text" value="{{$cartorio->razao ?? null}}" placeholder="RAZAO" maxlength="200" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_BAIRRO">BAIRRO</label>
                      <input class="form-control" type="text" value="{{$cartorio->bairro ?? null}}" placeholder="BAIRRO" maxlength="100" required />
                    </div>
                  </div>
                </div>                

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_DOCUMENTO">DOCUMENTO</label>
                      <input class="form-control" type="text"  value="{{$cartorio->documento ?? null}}" placeholder="DOCUMENTO" maxlength="14" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_CIDADE">CIDADE</label>
                      <input class="form-control" type="text" value="{{$cartorio->cidade ?? null}}"  placeholder="CIDADE" maxlength="100" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_TELEFONE">TELEFONE</label>
                      <input class="form-control" type="text" value="{{$cartorio->telefone ?? null}}"  placeholder="TELEFONE" maxlength="20" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_UF">UF</label>
                      <select class="form-control" id="form_cartorio_ATIVO" value="{{$cartorio->uf ?? null}}"  required>
                        <option value="">Selecione uma UF</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_EMAIL">EMAIL</label>
                      <input class="form-control" type="email" value="{{$cartorio->email ?? null}}"  placeholder="EMAIL" maxlength="200" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_ATIVO">ATIVO ?</label>
                      <select class="form-control" value="{{$cartorio->ativo ?? null}}"  id="form_cartorio_ATIVO">
                        <option value="0">NÃO</option>
                        <option value="1">SIM</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_cartorio_TABELIAO">TABELIÃO</label>
                      <input class="form-control" type="text" value="{{$cartorio->tabeliao ?? null}}" placeholder="TABELIAO" maxlength="100">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button class="btn btn-lg btn-primary" type="submit"><i class="fasfa-save"></i> Salvar</button>
                  </div>
                </div>

                  
              </form>
            </div>
            <!-- /.col -->
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

    
@endsection

@push('scripts')
 <script type="text/javascript">
    $(document).ready(function() {
    @if ($action=='show')
      $("#form_cartorio :input").prop("disabled", true);
      $("#form_cartorio :submit").remove();
    @endif
    } );
 </script>
@endpush