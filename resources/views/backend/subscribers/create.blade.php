@extends('adminlte::page')

@section('title', 'Create subscriber')

@section('content_header')
    <h1>Додати нового підписника</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додати слайд</h3>
                    </div>
                    <form role="form" id="createUserForm" novalidate="novalidate" method="post"  action="{{route('subscribers.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email', null) }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Enter email" aria-describedby="email-error" aria-invalid="true">
                            @if($errors->has('email'))
                                <span id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" aria-describedby="status-error">
                                    <label class="custom-control-label" for="status">Статус</label>
                                </div>
                                @if($errors->has('status'))
                                    <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Створити</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
@section('js')
    <script>

        function generateSlug(el) {
            let slug = el.value;
            el.value = slug.replace(/[^A-Za-z-]/, '');
        }

    </script>

@stop
