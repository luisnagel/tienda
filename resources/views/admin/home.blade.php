@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1>Panel de administración</h1>
        </div>  
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-warning btn-block btn-home-admin">CATEGORÍAS</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                </div>
            </div>
                    
        </div>
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-pencil-square-o icon-home"></i>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                </div>
            </div>
                    
        </div>
        
    </div>
    <hr>

@stop