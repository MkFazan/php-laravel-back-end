<div class="card-body">
    <label>Розділ</label>
        <select name="parent_id"  class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}">
            <option value="0">-- Root --</option>
            @include('backend.categories._categories',[
                        'tr' => false
                    ])
        </select>
        @if($errors->has('parent_id'))
            <span id="title-error" class="error invalid-feedback">{{ $errors->first('parent_id') }}</span>
        @endif
    <br>
    <div class="form-group">
        <label for="title_ua">Категорія UA</label>
        <input type="text" name="title_ua" value="{{ old('title_ua', null) }}" class="form-control {{ $errors->has('title_ua') ? 'is-invalid' : '' }}" id="title" placeholder="Введіть назву" aria-describedby="title-error" aria-invalid="true">
        @if($errors->has('title_ua'))
            <span id="title-error" class="error invalid-feedback">{{ $errors->first('title_ua') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="title_ru">Категорія RU</label>
        <input type="text" name="title_ru" value="{{ old('title_ru', null) }}" class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" id="title" placeholder="Введіть назву" aria-describedby="title-error" aria-invalid="true">
        @if($errors->has('title_ru'))
            <span id="title-error" class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
        @endif
    </div>
    <div class="form-group mb-0">
        <div class="custom-control custom-checkbox">
            <input type="hidden" name="status"  value="0" >
            <input type="checkbox" name="status" class="custom-control-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" value="1" aria-describedby="status-error">
            <label class="custom-control-label" for="status">Статус активний</label>
        </div>
        @if($errors->has('status'))
            <span id="status-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('status') }}</span>
        @endif
    </div>
</div>



<div class="card-footer">
    <button type="submit" class="btn btn-primary">Відправити</button>
</div>
