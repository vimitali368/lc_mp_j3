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
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.photo.update', $photo->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group w-50">
                        <label>Путь к фото</label>
                        @if(isset( $photo->path ) )
                            <div class="w-25">
                                <img src="{{ asset('storage/' . $photo->path) }}" alt="url"
                                     class="w-50">
                            </div>
                        @endif
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="path" placeholder="Путь к фото"
                                       value="{{ $photo->path }}">>
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
                    {{--                        <input type="text" class="form-control" name="url" placeholder="Url фото"--}}
                    {{--                               value="{{ $photo->url }}">--}}
                    {{--                        @error('url')--}}
                    {{--                        <div class="text-danger"> {{ $message }} </div>--}}
                    {{--                        @enderror--}}
                    {{--                    </div>--}}
                    {{--                    <div class="form-group">--}}
                    {{--                        <input type="text" class="form-control" name="size" placeholder="Размер фото"--}}
                    {{--                               value="{{ $photo->size }}">--}}
                    {{--                        @error('size')--}}
                    {{--                        <div class="text-danger"> {{ $message }} </div>--}}
                    {{--                        @enderror--}}
                    {{--                    </div>--}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="Описание фото"
                               value="{{ $photo->description }}">
                    </div>
                    <div class="form-group">
                        <label>Выберите тему</label>
                        <select class="form-control" name="theme_id">
                            @foreach($themes as $theme)
                                <option value="{{ $theme->id }}"
                                    {{ $theme->id == $photo->theme_id ? ' selected' : '' }}
                                >{{ $theme->title }}</option>
                            @endforeach
                        </select>
                        @error('theme_id')
                        <div class=" text-danger">{{ $message }}</div>
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
