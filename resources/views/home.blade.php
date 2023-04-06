@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" id='test'>
                <div class="card-header">Когда вы планируете пойти в отпуск:</div>

                <div class="card-body">
                    <form action={{ route('vacation.update', $id['id']) }} method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group input-group-sm sm-3">
                            <input type="hidden" name="id_vacation" value={{$id['id']}}>
                            <input type="hidden" name="query" value="date">
                            @if($id["agreed"] == 1 )
                                <span class="input-group-text" id="start">С</span>
                                <input type="date" name="start" class="form-control" aria-label="Sizing example input" aria-describedby="start" value={{$id['vacation_start']}} readonly>
                                <span class="input-group-text" id="end">По</span>
                                <input type="date" name="end" class="form-control" aria-label="Sizing example input" aria-describedby="end" value={{$id['vacation_end']}} readonly>
                            @else
                                <span class="input-group-text" id="start">С</span>
                                <input type="date" name="start" class="form-control" aria-label="Sizing example input" aria-describedby="start" value={{$id['vacation_start']}}>
                                <span class="input-group-text" id="end">По</span>
                                <input type="date" name="end" class="form-control" aria-label="Sizing example input" aria-describedby="end" value={{$id['vacation_end']}}>
                                <button class="btn btn-primary">Сохранить</button>
                            @endif

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Отпуска сотрудников</div>

                <div class="card-body">
                    @if ( Auth::user()->roles[0]->name === 'user')
                        <p>Вы вошли как пользователь</p>
                    @endif
                    <table class="table">
                        <thead>
                            <th>
                                Имя
                            </th>
                            <th>
                                Отпуск с
                            </th>
                            <th>
                                по
                            </th>
                            <th>
                                Утверждение
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($vacation as $vac)
                                <tr>
                                    <td>{{DB::table('users')->where('id',$vac['user_id'])->value('name')}}</td>
                                    <td>{{$vac['vacation_start']}}</td>
                                    <td>{{$vac['vacation_end']}}</td>
                                    <td>
                                        @if($vac['agreed'] == 1)
                                            <button class="btn btn-success" disabled>Утверждено</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
