@extends('admin.layouts.master')

@section('head-tag')
<title>تنظیمات</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> تنظیمات</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 تنظیمات
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="" class="btn btn-info btn-sm disabled">ایجاد تنظیمات جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان سایت</th>
                            <th>عنوان اصلی سایت</th>
                            <th>توضیحات سایت</th>
                            <th>لوگو</th>
                            <th>آیکون</th>
                            <th>بنر اصلی</th>
                            <th>بنر قوانین</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $setting->title }}</td>
                            <td>{!! Str::limit($setting->subject, 20, '...') !!}</td>
                            <td>{!! Str::limit($setting->description, 20, '...') !!}</td>
                            <td>
                                <img src="{{ asset($setting->whiteLogo) }}" width="100" alt=""><br>
                                <img src="{{ asset($setting->blackLogo) }}" width="100" alt="">
                            </td>
                            <td>
                                <img src="{{ asset($setting->icon) }}" width="100" alt="">
                            </td>
                            <td>
                                <img src="{{ asset($setting->bannerImage) }}" width="100" alt="">
                            </td>
                            <td>
                                <img src="{{ asset($setting->ruleImage) }}" width="100" alt="">
                            </td>
                            <td class="width-22-rem text-left">
                              @can('update-setting')
                              <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                              @endcan
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection
