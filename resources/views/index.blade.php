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
            <h3 class="color-primary">Listagens de tasks</h3>
        </div>
            <form class="row g-3 mt-5" action="{{route('search')}}" method="POST">
              @csrf
                <div class="col-12">
                  <label class="form-label">Número</label>
                  <input type="number" class="form-control" name="id_user" id="id_user">
                </div>
                <div class="col-12">
                    <label class="form-label">Título/Descrição</label>
                    <input type="text" class="form-control" name="title" id="title">
                  </div>
                <div class="col-4">
                    <label class="form-label">Responsável</label>
                    <select name="id" id="id" class="form-select  form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Selecionar responsável</option>
                        @foreach ($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option> 
                        @endforeach
                      </select>
                </div>
                <div class="col-4">
                  <label class="form-label">Status</label>
                  <select name="status" id="status" class="form-select">
                    <option selected>Escolher</option>
                      @foreach ($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option> 
                      @endforeach
                  </select>
                </div>
                <div class=" col-4 search">
                  <button type="submit" class="btn btn-color-primary text-center">buscar</button>
              </div>  
              </form>
              
              <!--área da tabela-->    
                 @csrf
              <table class="table text-center">
                <thead class="col-table">
                  <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Título</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($task as $tasks)
                    @php
                        $user = $tasks->find($tasks->id)->relUsers;
                    @endphp
                    <tr>
                        <th scope="row">{{$tasks->id}}</th>
                        <td>{{$tasks->title}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            <a href="{{url("tasks/$tasks->id/edit")}}">
                                <button class="btn btn-color-primary">Editar</button>
                            </a>
                            <a class="js-del" href="{{url("tasks/$tasks->id")}}">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                            @if ($tasks->done == null)
                                <a href="{{route("task_done", ['id'=>$tasks->id])}}">
                                <button class="btn btn-secondary">Concluir</button>
                            </a>
                            @else
                            <a href="">
                              <button class="btn btn-success">Concluir</button>
                          </a>
                            @endif
                            
                        </td>
                      </tr>
                    @endforeach
                  
                </tbody>
              </table>          
        </div>
        
@endsection
