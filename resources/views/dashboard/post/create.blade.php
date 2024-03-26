@extends('layouts.dashboard')
{{--@push('scripts')--}}


{{--@endpush--}}
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>ایجاد محصول جدید</h5>
                                </div>

                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                    @csrf

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">تایتل</label>
                                        <div class="col-sm-9">
                                            <input name="title"
                                                   class="form-control @error('title') is-invalid @enderror" type="text"
                                                   value="{{old('title')}}" placeholder="عنوان ">
                                            @error('title') <span style="color: red"> {{ $message }} </span> @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">اسلاگ</label>
                                        <div class="col-sm-9">
                                            <input name="slug" class="form-control @error('slug') is-invalid @enderror"
                                                   type="text" value="{{old('slug')}}" placeholder="slug ">
                                            @error('slug') <span style="color: red">{{ $message }}</span> @enderror

                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">تگ ها</label>
                                        <div class="col-sm-9">
                                            <select multiple class="js-example-basic-multiple w-100" name="tags[]" id="tags">
                                                @if(count($tags))
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option disabled>تگی وجود ندارد</option>
                                                @endif
                                            </select>
                                            @error('tags') <span style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            {{--                                        <div class="card-header-2">--}}
                                            {{--                                            <h5>توضیحات</h5>--}}
                                            {{--                                        </div>--}}

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="form-label-title col-sm-3 mb-0">توضیحات
                                                                کوتاه</label>
                                                            <div class="col-sm-9">
                                                                <textarea name="post" id="post" class="form-control" rows="3">{{ old('post') }}</textarea>
                                                                @error('post') <span style="color: red">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            {{--                                        <div class="card-header-2">--}}
                                            {{--                                            <h5>توضیحات</h5>--}}
                                            {{--                                        </div>--}}

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="form-label-title col-sm-3 mb-0">توضیحات
                                                                بلند</label>
                                                            <div class="col-sm-9">
                                                                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                                                @error('description') <span style="color: red">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">تصویر شاخص</label>
                                        <div class="col-sm-9">
                                            <input
                                                class="form-control form-choose @error('main_image') is-invalid @enderror"
                                                type="file" name="main_image" id="main_image" multiple>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <button class="btn btn-success w-100" type="submit">ثبت نام</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


