@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление фото</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.photo.index') }}">Фото</a></li>
                            <li class="breadcrumb-item active">Добавление</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group w-50">
                        <label>Путь к фото</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="path">
                                <label class="custom-file-label">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('path')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <input type="text" class="form-control" name="url" placeholder="Url фото">--}}
                    {{--                        @error('url')--}}
                    {{--                        <div class="text-danger"> {{ $message }} </div>--}}
                    {{--                        @enderror--}}
                    {{--                    </div>--}}
                    {{--                    <div class="form-group">--}}
                    {{--                        <input type="text" class="form-control" name="size" placeholder="Размер фото">--}}
                    {{--                        @error('size')--}}
                    {{--                        <div class="text-danger"> {{ $message }} </div>--}}
                    {{--                        @enderror--}}
                    {{--                    </div>--}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="Описание фото">
                        @error('description')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Выбирите тему</label>
                        <select name="theme_id" class="form-control">
                            @foreach($themes as $theme)
                                <option value="{{ $theme->id }}"
                                    {{ $theme->id == old('theme_id') ? ' selected' : '' }}
                                >{{ $theme->title }}</option>
                            @endforeach
                        </select>
                        @error('theme_id')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
