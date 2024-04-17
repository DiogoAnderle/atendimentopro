 @if (isset($subgrupo->id))
     <h4 class="card-title">Editar Subgrupo</h4>
 @else
     <h4 class="card-title">Cadastrar Subgrupo</h4>
 @endif


 @if (isset($subgrupo->id))
     <form action="{{ route('subgrupo.update', $subgrupo->id) }}" method="POST" class="forms-sample">
         @csrf
         @method('PUT')
     @else
         <form action="{{ route('subgrupo.store') }}" method="POST" class="forms-sample">
             @csrf
 @endif

 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

 <div class="form-group">
     <label for="nome" class="form-label">Subgrupo</label>
     <input type="text" class="form-control resp-col-md resp-col-sm text-white" id="nome" placeholder="Nome"
         name="nome" autofocus value="{{ $subgrupo->nome ?? old('nome') }}"
         @if ($errors->has('nome')) style='border: 1px solid red' @endif>
     @if ($errors->has('nome'))
         <span class="text-danger">
             {{ $errors->first('nome') }}
         </span>
     @endif
 </div>
 <div class="form-group">
     <label for="grupo" class="form-label">Grupo</label>
     <select class="form-control resp-col-md resp-col-sm text-white" id="grupo" name="grupo_id">
         <option>-- Selecione um grupo --</option>
         @foreach ($grupos as $grupo)
             <option value="{{ $grupo->id }}"
                 {{ ($subgrupo->grupo_id ?? old('grupo_id')) == $grupo->id ? 'selected' : '' }}>{{ $grupo->nome }}
             </option>
         @endforeach
     </select>
     @if ($errors->has('grupo_id'))
         <span class="text-danger">
             {{ $errors->first('grupo_id') }}
         </span>
     @endif
 </div>
 @if (isset($subgrupo->id))
     <button type="submit" class="btn btn-primary me-2">Atualizar</button>
 @else
     <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
 @endif
 <a href="{{ route('grupo.index') }}" class="btn btn-warning">Cancelar</a>
 </form>
