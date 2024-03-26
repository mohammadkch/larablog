@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title d-sm-flex d-block">
                        <h5>لیست محصولات</h5>
                        <div class="right-options">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)">درون ریزی</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">برون بری</a>
                                </li>
                                <li>
                                    <a class="btn btn-solid" href="{{ route('post.create') }}">افزودن محصول جدید</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table all-package theme-table table-product" id="table_id">
                                <thead>
                                <tr>
                                    <th>تصویر محصول</th>
                                    <th>نام محصول</th>
                                    <th>دسته</th>
                                    <th>تعداد فعلی</th>
                                    <th>قیمت</th>
                                    <th>وضعیت</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($posts as $post)

                                    <tr>
                                    <td>
                                        <div class="table-image">
                                            <img src="{{ Storage::url($post->main_image) }}" alt="{{ $post->title }}" class="img-fluid">
                                        </div>
                                    </td>

                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>

                                    <td>{{ $post->post }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ \Morilog\Jalali\Jalalian::forge($post->created_at) }}</td>

{{--                                    <td>12</td>--}}

{{--                                    <td class="td-price">95000 تومان</td>--}}

{{--                                    <td class="status-danger">--}}
{{--                                        <span>در انتظار</span>--}}
{{--                                    </td>--}}

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="order-detail.html">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#exampleModalToggle">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
