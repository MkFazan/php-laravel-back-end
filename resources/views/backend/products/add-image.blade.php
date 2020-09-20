@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Додати зображення до продукта</h1>

    @include('backend.components.notifications')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додати зображення</h3>
                    </div>
                    <form role="form" id="createUserForm" enctype="multipart/form-data" novalidate="novalidate" method="post" action="{{route('products.form.add.images', $product)}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Image">Вкласти файл</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="images[]" type="file" multiple class="custom-file-input"  enctype="multipart/form-data"  id="Image">
                                        <label class="custom-file-label" for="Image" id="ImageUpload" >Вибрати зображення</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Загрузити</span>
                                    </div>
                                    @if($errors->has('image'))
                                        <span id="image-error" class="error invalid-feedback">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
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
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Підтвердити</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.getElementById('Image') . addEventListener( 'change', function (event) {
            let countFiles = event.srcElement.files.length;
            document.getElementById('ImageUpload') . textContent = "Вибрано " + countFiles + " файли";
        } );

    </script>
@stop
