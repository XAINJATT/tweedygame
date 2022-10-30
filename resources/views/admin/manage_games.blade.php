@extends('layouts.admin')
@section('content')
    <div id="main">
        <div class="container">
            <table class="table table-responsive">
                <tr>
                    <th>Sr.</th>
                    <th>Game Title</th>
                    <th>Game Type</th>
                    <th>Manage</th>
                </tr>
                @foreach ($data as $key => $item)
                <?php $data =  json_decode($item->game_info);?>
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$data->game_title}}</td>
                    <td>{{$item->game_type}}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-warning btn-sm" href="{{route('game.edit',$item->id)}}">
                                <i class="fas fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{route('game.delete',$item->id)}}">
                                <i class="fas fa-trash"></i> Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
       
    </div>
@endsection
