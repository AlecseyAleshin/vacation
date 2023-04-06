@extends('layouts.app')

@section('content')
<div class="container">

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
                                Согласование
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($vacation as $vac)
                                <tr>
                                    <td>{{DB::table('users')->where('id',$vac['user_id'])->value('name')}}</td>
                                    <td>{{$vac['vacation_start']}}</td>
                                    <td>{{$vac['vacation_end']}}</td>
                                    <td>
                                    @if ( $vac['agreed'] == 0 )
                                        <form action={{ route('vacation.update', $vac['id'])}} method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="query" value="agreed">
                                            <button type="submit" class="btn btn-primary">Согласовать</button>
                                        </form>
                                    @else
                                    <form action={{ route('vacation.update', $vac['id'])}} method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="query" value="agreed">
                                        <button type="submit" class="btn btn-success">Согласовано</button>
                                    </form>
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
