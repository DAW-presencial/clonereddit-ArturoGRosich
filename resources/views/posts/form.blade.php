<form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="post">
    @csrf
    @if(isset($post))
        @method('PUT')
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for="title">@lang('Título')</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', isset($post) ? $post->title : '') }}" required>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="extract">@lang('Extracto')</label>
        <input type="text" name="extract" id="extract" class="form-control @error('extract') is-invalid @enderror" value="{{ old('extract', isset($post) ? $post->extract : '') }}" required>
        @error('extract')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">@lang('Contenido')</label>
        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5" required>{{ old('content', isset($post) ? $post->content : '') }}</textarea>
        @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="caducable" id="caducable" class="form-check-input @error('caducable') is-invalid @enderror" {{ old('caducable', isset($post) ? $post->caducable : '') == 1 ? 'checked' : '' }} value="1">
        <label for="caducable">@lang('Caducable')</label>
        @error('caducable')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group form-check">
     <input type="checkbox" name="expirable" id="expirable" class="form-check-input @error('expirable') is-invalid @enderror" {{ old('expirable', isset($post) ? $post->expirable : '') == 1 ? 'checked' : '' }} value="1">
        <label for="expirable">@lang('Expirable')</label>
        @error('expirable')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="comentable" id="comentable" class="form-check-input @error('comentable') is-invalid @enderror" {{ old('comentable', isset($post) ? $post->comentable : '') == 1 ? 'checked' : '' }} value="1">
        <label for="comentable">@lang('Comentable')</label>
        @error('comentable')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="public" id="public" class="form-check-input @error('public') is-invalid @enderror" {{ old('public', isset($post) ? $post->public : '') == 1 ? 'checked' : '' }} value="1">
        <label for="public">@lang('Público')</label>
        @error('public')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">@lang('Enviar')</button>

</form>