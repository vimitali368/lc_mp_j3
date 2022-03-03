@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование фото</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.photo.index') }}">Фото</a></li>
                            <li class="breadcrumb-item active">Редактирование</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
{{--        @dd($photo->id);--}}
        <!-- Main content -->
        <section class="content">
            <div class="row ml-3">
                <form action="{{ route('admin.photo.update', $photo->id ) }}" method="POST" class="w-25">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" name="path" placeholder="Путь к фото"
                               value="{{ $photo->path }}">
                        @error('path')
                        <div class="text-danger">
                            Это поле необходимо для заполнения
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" placeholder="Url фото"
                               value="{{ $photo->url }}">
                        @error('url')
                        <div class="text-danger">
                            Это поле необходимо для заполнения
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="size" placeholder="Размер фото"
                               value="{{ $photo->size }}">
                        @error('size')
                        <div class="text-danger">
                            Это поле необходимо для заполнения
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="Описание фото"
                               value="{{ $photo->description }}">
                    </div>
                    <div class="form-group">
                        <label>Выбирите тему</label>
                        <select name="theme_id" class="form-control" value="{{ $photo->theme_id }}">
                            @foreach($themes as $theme)
                                <option value="{{ $theme->id }}"
                                    {{ $theme->id == old('theme_id') ? ' selected' : '' }}
                                >{{ $theme->title }}</option>
                            @endforeach
                        </select>
                        @error('theme_id')
                        <div class="text-danger">
                            Это поле необходимо для заполнения
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection