@extends('templates.template')

@section('content')
    <header>
        <div class="main">
            <h1 class="text-center">Bem vindo ao seu gerenciador de tarefas</h1>
        </div>
    </header>
    <div class="container">
        <div class="title-form">
            <h3 class="color-primary">Cadastrar tasks</h3>
        </div>
        @if(isset($erros) && count($erros)>0)
            <div class="text-center mt-4 mb-4 p-2">
              @foreach($erros->all() as $erro)
                  {{$erro}}
              @endforeach
            </div>
        @endif
        <div>
            <form class="row g-3 mt-5" name="formCard" id="formCard" method="POST" action="{{url('tasks')}}">
              @csrf
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Título</label>
                  <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class=" col-12 mt-3 mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                  </div>
                <div class="col-6">
                    <label for="inputState" class="form-label">Responsável</label>
                    <select name="id_user" id="id_user" class="form-select  form-select-lg mb-3" aria-label=".form-select-lg example" required>
                        <option selected>Selecionar responsável</option>
                        @foreach ($users as $user)
                           <option value="{{$user->id}}">{{$user->name}}</option> 
                        @endforeach
                      </select>
                </div>
                <div class="col-6">
                  <label class="form-label">Prioridade</label>
                  <select name="priori" id="priori" class="form-select" required>
                    <option selected>Escolher</option>
                    @foreach ($users as $user)
                      <option value="{{$user->priori}}">{{$user->priori}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <label class="form-label">Data</label>
                  <input type="date" class="form-control" name="date" id="date" required>
                </div>
                <div class="button">
                  <input type="submit" class="btn btn-color-primary text-center" value="Cadastrar">
                </div>
              </form>
        </div>
          
    </div>  
@endsection
