@extends('admin.layouts.index')
@section('title','user roles')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">User Roles</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">User roles</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
<div class="content-body">
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                            </thead>
                                            <tbody>
                                              @foreach($roles as $role)
                                                <tr>
                                                    <td>{{$role->name}}</td>
                                                    <td>{{$role->status==1?'Active':'Not Active'}}</td>
                                                    <td><a class="btn btn-outline-warning" href="{{ route('user_role.edit',$role->id) }}">Edit</a></td>
                                                </tr>
                                              @endforeach 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
@endsection