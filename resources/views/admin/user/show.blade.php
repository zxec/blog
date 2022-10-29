@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $user->name }}</h1>
                        <div class="mt-2 d-flex align-items-center">
                            <a class="text-success" href="{{ route('admin.user.edit', $user->id) }}">
                                <i class="fas fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('admin.user.destroy', $user->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="border-0 bg-transparent" type="submit">
                                    <i class="text-danger fas fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
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
                    <div class="col-10 col-xl-8">
                        <div class="card">
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $roles[$user->role] }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
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
