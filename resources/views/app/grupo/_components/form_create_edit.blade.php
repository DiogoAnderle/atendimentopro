 @if (isset($grupo->id))
     <h4 class="card-title">Editar Grupo</h4>
 @else
     <h4 class="card-title">Cadastrar Grupo</h4>
 @endif


 @if (isset($grupo->id))
     <form action="{{ route('grupo.update', $grupo->id) }}" method="POST" class="forms-sample needs-validation"
         novalidate>
         @csrf
         @method('PUT')
     @else
         <form action="{{ route('grupo.store') }}" method="POST" class="forms-sample needs-validation" novalidate>
             @csrf
 @endif

 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

 <div class="form-group">
     <label for="nome" class="form-label">Grupo</label>
     <input type="text" class="form-control resp-col-md resp-col-sm text-white" id="nome" placeholder="Nome"
         name="nome" autofocus value="{{ $grupo->nome ?? old('nome') }}"
         @if ($errors->has('nome')) style='border: 1px solid red' @endif>
     @if ($errors->has)
         <span class="text-danger">
             {{ $errors->first('nome') }}
         </span>
     @endif
 </div>
 @if (isset($grupo->id))
     <button type="submit" class="btn btn-primary me-2">Atualizar</button>
 @else
     <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
 @endif
 <a href="{{ route('grupo.index') }}" class="btn btn-warning">Cancelar</a>
 </form>
