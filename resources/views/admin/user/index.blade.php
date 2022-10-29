@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary mb-3">Add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th class="text-center" colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $roles[$user->role] }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.user.show', $user->id) }}">
                                                    <i class="fas fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="text-success"
                                                   href="{{ route('admin.user.edit', $user->id) }}">
                                                    <i class="fas fa-solid fa-pen"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0 bg-transparent" type="submit">
                                                        <i class="text-danger fas fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
