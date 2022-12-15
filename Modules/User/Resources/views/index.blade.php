@extends('layouts.main')

@section('header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            @can('user-affiliation')
                                <th>User Point</th>
                                <th>User Code</th>
                                <th>Referal URL</th>
                            @endcan
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <td>{{$i + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @can('user-affiliation')
                                    <td>{{$user->user_point}}</td>
                                    <td>{{$user->user_code}}</td>                                
                                    <td>
                                        <a href="{{$user->referal_url}}" target="_blank" rel="noopener noreferrer">{{$user->referal_url}}</a>
                                    </td>
                                @endcan
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        @can('user-edit')
                                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>  
                                        @endcan                                      
                                    </div>
                                </td>
                            </tr>    
                        @endforeach
                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                {{$users->links()}}
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection
