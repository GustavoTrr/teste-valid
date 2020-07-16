@extends('layouts.app')

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
						<form id="form_cartorio" method="POST" action="@if(empty($cartorio->id)) {{route('cartorios.store')}} @else {{route('cartorios.update',$cartorio->id)}} @endif">
							@if ($action=='edit')
							@method('PUT')
							@endif

							@csrf

							<div class="row">

								<div class="col-md-6">

									<div class="form-group">
										<label for="form_cartorio_NOME">NOME</label>
										<input class="form-control @error('nome') is-invalid @enderror @error('title') is-invalid @enderror" type="text" name="nome" value="{{old('nome') ?? $cartorio->nome ?? null}}" placeholder="NOME" maxlength="200" required />
										@error('nome')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_RAZAO">RAZÃO SOCIAL</label>
										<input class="form-control @error('razao') is-invalid @enderror" type="text" name="razao" value="{{old('razao') ?? $cartorio->razao ?? null}}" placeholder="RAZAO" maxlength="200" required />
										@error('razao')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_DOCUMENTO">DOCUMENTO</label>
										<input class="form-control @error('documento') is-invalid @enderror" type="text" name="documento" value="{{old('documento') ?? $cartorio->documento ?? null}}" placeholder="DOCUMENTO" maxlength="14" required />
										@error('documento')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_TELEFONE">TELEFONE</label>
										<input class="form-control @error('telefone') is-invalid @enderror" type="text" name="telefone" value="{{old('telefone') ?? $cartorio->telefone ?? null}}" placeholder="TELEFONE" maxlength="20" />
										@error('telefone')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_EMAIL">EMAIL</label>
										<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email') ?? $cartorio->email ?? null}}" placeholder="EMAIL" maxlength="200" />
										@error('email')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_TABELIAO">TABELIÃO</label>
										<input class="form-control @error('tabeliao') is-invalid @enderror" type="text" name="tabeliao" value="{{old('tabeliao') ?? $cartorio->tabeliao ?? null}}" placeholder="TABELIAO" maxlength="100">
										@error('tabeliao')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>

								</div> <!-- /.col -->

								<div class="col-md-6">

									<div class="form-group">
										<label for="form_cartorio_CEP">CEP</label>
										<input class="form-control @error('cep') is-invalid @enderror" type="text" name="cep" value="{{old('cep') ?? $cartorio->cep ?? null}}" placeholder="CEP" maxlength="8" required />
										@error('cep')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_ENDERECO">ENDEREÇO</label>
										<input class="form-control @error('endereco') is-invalid @enderror" type="text" name="endereco" value="{{old('endereco') ?? $cartorio->endereco ?? null}}" placeholder="ENDERECO" maxlength="400" required />
										@error('endereco')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_BAIRRO">BAIRRO</label>
										<input class="form-control @error('bairro') is-invalid @enderror" type="text" name="bairro" value="{{old('bairro') ?? $cartorio->bairro ?? null}}" placeholder="BAIRRO" maxlength="100" required />
										@error('bairro')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_CIDADE">CIDADE</label>
										<input class="form-control @error('cidade') is-invalid @enderror" type="text" name="cidade" value="{{old('cidade') ?? $cartorio->cidade ?? null}}" placeholder="CIDADE" maxlength="100" required />
										@error('cidade')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_UF">UF</label>
										<select class="form-control @error('uf') is-invalid @enderror" id="form_cartorio_UF" name="uf" required>
											<option value="">Selecione uma UF</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='AC') selected @endif value="AC">Acre</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='AL') selected @endif value="AL">Alagoas</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='AP') selected @endif value="AP">Amapá</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='AM') selected @endif value="AM">Amazonas</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='BA') selected @endif value="BA">Bahia</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='CE') selected @endif value="CE">Ceará</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='DF') selected @endif value="DF">Distrito Federal</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='ES') selected @endif value="ES">Espírito Santo</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='GO') selected @endif value="GO">Goiás</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='MA') selected @endif value="MA">Maranhão</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='MT') selected @endif value="MT">Mato Grosso</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='MS') selected @endif value="MS">Mato Grosso do Sul</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='MG') selected @endif value="MG">Minas Gerais</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='PA') selected @endif value="PA">Pará</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='PB') selected @endif value="PB">Paraíba</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='PR') selected @endif value="PR">Paraná</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='PE') selected @endif value="PE">Pernambuco</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='PI') selected @endif value="PI">Piauí</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='RJ') selected @endif value="RJ">Rio de Janeiro</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='RN') selected @endif value="RN">Rio Grande do Norte</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='RS') selected @endif value="RS">Rio Grande do Sul</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='RO') selected @endif value="RO">Rondônia</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='RR') selected @endif value="RR">Roraima</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='SC') selected @endif value="SC">Santa Catarina</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='SP') selected @endif value="SP">São Paulo</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='SE') selected @endif value="SE">Sergipe</option>
											<option @if((old('uf') ?? $cartorio->uf ?? '') =='TO') selected @endif value="TO">Tocantins</option>
										</select>
										@error('uf')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="form_cartorio_ATIVO">ATIVO ?</label>
										<select class="form-control" name="ativo" id="form_cartorio_ATIVO">
											<option @if((old('ativo') ?? $cartorio->ativo ?? null)=='1') selected @endif value="1">SIM</option>
											<option @if((old('ativo') ?? $cartorio->ativo ?? null)=='0') selected @endif value="0">NÃO</option>
										</select>
									</div>

								</div><!-- /.col -->

							</div><!-- /.row -->

							<div class="row">
								<div class="col-md-6">

								</div>
								<div class="col-md-6 d-flex align-items-end flex-column">
									<button class="btn btn-lg btn-primary mt-auto" type="submit"><i class="fasfa-save"></i> Salvar</button>
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
		@if($action == 'show')
		$("#form_cartorio :input").prop("disabled", true);
		$("#form_cartorio :submit").remove();
		@endif
	});
</script>
@endpush