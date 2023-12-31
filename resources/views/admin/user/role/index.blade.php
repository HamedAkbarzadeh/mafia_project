@extends('admin.layouts.master')

@section('head-tag')
<title>نقش ها</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> نقش ها</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    نقش ها
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                @can('create-role')
                <a href="{{ route('admin.user.role.create') }}" class="btn btn-info btn-sm">ایجاد نقش جدید</a>
                @endcan
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام نقش	</th>
                            <th>دسترسی ها</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                @if(empty($role->permissions()->get()->toArray()))
                                    <span class="text-danger">این نقش هیچ دسترسی ای ندارد</span>
                                @else
                                @if ($role->permissions->count() > 3)
                                @foreach ($role->permissions->take(3) as $permission)
                                {{ $permission->name }}<br>
                                @endforeach
                                ...
                                @else

                                @foreach ($role->permissions as $permission)
                                {{ $permission->name }}<br>
                                @endforeach
                                @endif

                                @endif
                            </td>
                            <td>
                                <label>
                                    @can('update-role')
                                    <input id="{{ $role->id }}" onchange="changeStatus({{$role->id}})" data-url="{{ route('admin.user.role.status' , $role->id) }}" type="checkbox" @if ($role->status === 1)
                                    checked
                                    @endif>
                                    @endcan
                                @if ($role->status === 0)
                                <sup class="badge badge-warning status_warning{{ $role->id }}">غیر فعال</sup>
                                @else
                                <sup class="badge badge-warning d-none status_warning{{ $role->id }}">غیر فعال</sup>
                                @endif
                                </label>
                            </td>
                            <td class="width-22-rem text-left">
                                @can('read-set-permission')
                                <a href="{{ route('admin.user.role.permission-edit', $role->id) }}" class="btn btn-success btn-sm"><i class="fa fa-user-graduate"></i> دسترسی ها</a> 
                                @endcan
                                @can('update-role')
                                <a href="{{ route('admin.user.role.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                @endcan
                                @can('delete-role')
                                <form action="{{ route('admin.user.role.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection
@section('script')
    @component('admin.components.change-status')
        @slot('slot')
            نقش
        @endslot
    @endcomponent
    @include('admin.alerts.sweetalert.delete-confirm' , ['className' => 'delete'])
@endsection
