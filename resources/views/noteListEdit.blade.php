@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">標題</th>
                        <th scope="col">功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noteList as $note)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $note['title'] }}</td>
                            <td>
                                <button type="button" class="mx-1 btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-note-id={{ $note['id'] }}>編輯</button>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('delNote') }}">
                                    @csrf

                                    <input type="hidden" id="delNoteId" name="delNoteId" value={{ $note['id'] }}/>
                                    <button class="mx-1 btn btn-danger btn-sm">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('noteListEdit') }}">
                        @csrf

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">修改資料</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="noteId" name="noteId" value=""/>
                                <div class="mb-3">
                                    <label for="title" class="col-form-label">標題:</label>
                                    <input type="text" class="form-control" id="title" name="title" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="col-form-label">url:</label>
                                    <input type="text" class="form-control" id="url" name="url" value="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
