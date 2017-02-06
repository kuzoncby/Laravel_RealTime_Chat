@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-lg btn-info" href="/home">Back</a>
                </div>
            </div>
        </div>
    </section>
    <br/>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <th>
                            User in this room
                        </th>
                        </thead>
                        <tbody>
                        @foreach($friends as $friend)
                            <tr>
                                <td>
                                    {{$friend->name}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            [Room Name]
                            <span class="badge pull-right">@{{ usersInRoom.length }}</span>
                        </div>

                        <chat-log :messages="messages"></chat-log>
                        <chat-send v-on:messagesent="addMessage"></chat-send>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop