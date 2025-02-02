<!-- Anexos -->
<div class="col-md-10" style="text-align: center; margin-top:2rem"><h4 style="margin-top: 1rem;">3º Passo</h4></div>
<div class="col-md-10" style="text-align: center;"><h5 style="margin-bottom:1rem;color:#909090">Anexos</h5></div>
<div class="col-md-10">
  <div class="card" style="border-radius: 12px">
    <div class="card-body">
      <div class="container">
        <div class="form-row mt-3">
          <div class="col-md-12"><h5 style="color: #1492E6; margin-bottom:-0.4rem">Anexos</h5></div>
          <div class="col-md-12" style="margin-bottom: -0.8rem;"><hr style="border-top: 1px solid#1492E6"></div>
          {{-- Anexo do Projeto --}}
          <div class="form-group col-md-6" style="margin-top: 10px">
            <div class="row justify-content-start">
              <div class="col-9">
                @component('componentes.input', ['label' => 'Projeto (.pdf)'])
                @endcomponent
              </div>
              @if($projeto->anexoProjeto)
                <div class="col-3 ">
                  <a href="{{ route('baixar.anexo.projeto', ['id' => $projeto->id])}}"><i class="fas fa-file-pdf fa-2x"></i></a>
                </div>
              @else
                <div class="col-3 text-danger">
                  <p><i class="fas fa-times-circle fa-2x"></i></p>
                </div>
              @endif
            </div>
          </div>
          {{-- Anexo do currículo --}}
          <div class="form-group col-md-6" style="margin-top: 10px">
            <div class="row justify-content-start">
              <div class="col-10">
                @component('componentes.input', ['label' => 'Currículo Lattes do Proponente (.pdf)'])
                  
                @endcomponent
              </div>
              @if($projeto->anexoLattesCoordenador)
                <div class="col-2 ">
                  <a href="{{ route('baixar.anexo.lattes', ['id' => $projeto->id]) }}"><i class="fas fa-file-pdf fa-2x"></i></a>
                </div>
              @else
                <div class="col-2 text-danger">
                  <p><i class="fas fa-times-circle fa-2x"></i></p>
                </div>
              @endif
            </div>
          </div>
          {{-- Anexo da Planilha de Pontuação --}}
          <div class="form-group col-md-6" style="margin-top: 10px">
            <div class="row justify-content-start">
              <div class="col-9">
                @component('componentes.input', ['label' => 'Planilha de Pontuação (.xlsx,.xls,.ods)'])
                  
                @endcomponent
              </div>
              @if($projeto->anexoPlanilhaPontuacao)
                <div class="col-2 ">
                  <a href="{{ route('baixar.anexo.planilha', ['id' => $projeto->id]) }}"><i class="fas fa-file-pdf fa-2x"></i></a>
                </div>
              @else
                <div class="col-2 text-danger">
                  <p><i class="fas fa-times-circle fa-2x"></i></p>
                </div>
              @endif
            </div>
          </div>
          
          {{-- Anexo da Decisão do CONSU --}}
          <div class="form-group col-md-6" style="margin-top: 10px">
            <div class="row justify-content-start">
              <div class="col-10">
                
                <div class="form-group">
                  <label class=" control-label" for="firstname">Decisão do CONSU (.pdf)</label>
                  
                  <div class="">
                    
                  </div>
                </div>
              </div>
              @if($projeto->anexoDecisaoCONSU)
                <div class="col-2 ">
                  <a href="{{ route('baixar.anexo.consu', ['id' => $projeto->id]) }}"><i class="fas fa-file-pdf fa-2x"></i></a>
                </div>
              @else
                <div class="col-2 text-danger">
                  <p><i class="fas fa-times-circle fa-2x"></i></p>
                </div>
              @endif
            </div>
          </div>
          
          {{-- Anexo do Grupo de Pesquisa --}}
          <div class="form-group col-md-6" style="margin-top: 10px">
            <div class="row justify-content-start">
              <div class="col-9">
                @component('componentes.input', ['label' => 'Grupo de Pesquisa (.pdf)'])
                  
                @endcomponent
              </div>
              @if($projeto->anexoGrupoPesquisa)
                <div class="col-3 ">
                  <a href="{{ route('baixar.anexoGrupoPesquisa', ['id' => $projeto->id]) }}"><i class="fas fa-file-pdf fa-2x"></i></a>
                </div>
              @else
                <div class="col-3 text-danger">
                  <p><i class="fas fa-times-circle fa-2x"></i></p>
                </div>
              @endif
            </div>
          </div>
          {{-- Anexo da autorizações especiais  --}}
          {{-- <div class="col-md-6"></div> --}}
          <div class="form-group col-md-6">
            <div class="row justify-content-start">
              <div class="col-10 ">
                <div class="row">
                  <div class="col-12">
                    <label for="botao" class="col-form-label @error('botao') is-invalid @enderror" data-toggle="tooltip" data-placement="bottom" title="Se possuir, coloque todas em único arquivo pdf." style="margin-right: 15px;">{{ __('Possui autorizações especiais?') }} <span style="color: red; font-weight:bold">*</span></label>
                  </div>
                  <div class="col-12">
                    <input type="radio" @if($projeto->anexoAutorizacaoComiteEtica) checked @endif  id="radioSim"  onchange="displayAutorizacoesEspeciais('sim')">
                    <label for="radioSim" style="margin-right: 5px">Sim</label>
                    <input type="radio" id="radioNao" @if($projeto->justificativaAutorizacaoEtica) checked @endif onchange="displayAutorizacoesEspeciais('nao')">
                    <label for="radioNao" style="margin-right: 5px">Não</label><br>
                  </div>
                </div>
                <span id="idAvisoAutorizacaoEspecial" class="invalid-feedback" role="alert" style="overflow: visible; display:none">
                  <strong>Selecione a autorização e envie o arquivo!</strong>
                </span>
                
                <div class="form-group" id="displaySim" style="display: block; margin-top:-1rem">
                  @component('componentes.input', ['label' => 'Sim, declaro que necessito de autorizações especiais (.pdf)'])
                    
                    <div class="row justify-content-center">
                      @if($projeto->anexoAutorizacaoComiteEtica ) 
                        <div class="col-3 mt-2">
                          <a href="{{ route('baixar.anexo.comite', ['id' => $projeto->id]) }}"><i class="fas fa-file-pdf fa-2x"></i></a>
                        </div>
                      @else
                          <div class="col-3 text-danger">
                            <p><i class="fas fa-times-circle fa-2x"></i></p>
                          </div>
                      @endif
                      
                    </div>
                    @error('anexoAutorizacaoComiteEtica')
                      <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  @endcomponent
                </div>
    
                <div class="form-group" id="displayNao" style="display: none; margin-top:-1rem">
                  @component('componentes.input', ['label' => 'Declaração de que não necessito de autorização especiais (.pdf)'])
                    
                      @if($projeto->justificativaAutorizacaoEtica  ) 
                      <div class="row justify-content-center">
                        <div class="col-3 mt-2">
                          <a href="{{ route('baixar.anexo.justificativa', ['id' => $projeto->id]) }}"><i class="fas fa-file-pdf fa-2x"></i></a>
                        </div>
                      </div>
                      @else
                      <div class="row justify-content-center">
                        <div class="col-3 text-danger">
                          <p><i class="fas fa-times-circle fa-2x"></i></p>
                        </div>
                      </div>
                      @endif
                    
                      @error('justificativaAutorizacaoEtica')
                        <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    @endcomponent
                </div>
              </div>
              
            </div>
           
          </div>
          
          
        </div>
    </div>
    </div>
  </div>
</div>
<!--X Anexos X-->