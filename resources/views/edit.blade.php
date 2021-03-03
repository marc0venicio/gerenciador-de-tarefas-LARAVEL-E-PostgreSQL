@extends('templates.template')

@section('content')
<header>
    <div class="main text-center">
      <h1 class="">Bem vindo ao seu gerenciador de tarefas</h1>
        <a href="{{url('tasks/create')}}">
          <div class="button">
            <button type="button" class="btn btn-color-primary text-center">Cadastrar</button>
      </div>
      </a> 
    </div> 
</header>
    <div class="container">
        <div class="title-form">
            <h3 class="color-primary">Editar tasks</h3>
        </div>
        <div>
            <form class="row g-3 mt-5" name="formEdit" id="formEdit" method="POST" action="{{url("tasks/$task->id")}}">
                @method('PUT')
              @csrf
                <div class="col-12">
                  <label class="form-label">Título</label>
                  <input type="text" name="title" class="form-control" id="title" value="{{$task->title}}" required>
                </div>
                <div class=" col-12 mt-3 mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" name="description" id="description" rows="3" value="" required></textarea>
                  </div>
                <div class="col-6">
                    <label class="form-label">Responsável</label>
                    <select name="id_user" id="id_user" class="form-select  form-select-lg mb-3" aria-label=".form-select-lg example" required>
                        <option selected value="{{$task->relUsers->id}}" >{{$task->relUsers->name}}</option>
                        @foreach ($users as $user)
                           <option value="{{$user->id}}">{{$user->name}}</option> 
                        @endforeach
                      </select>
                </div>
                <div class="col-6">
                  <label for="inputState" class="form-label">Prioridade</label>
                  <select name="priori" id="priori" class="form-select" required>
                    <option selected>{{$task->priori}}</option>
                    @foreach ($pivo as $tasks)
                      <option value="{{$tasks->id}}">{{$tasks->priori}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <label class="form-label">Data</label>
                  <input type="text" class="form-control" name="date" id="date" value="{{$task->created_at}}" required>
                </div>
                <div class="button">
                  <input type="submit" class="btn btn-color-primary text-center" value="Editar">
                </div>
              </form>
        </div>
          
    </div>  
@endsection
