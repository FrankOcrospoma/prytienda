<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Producto')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Producto')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Producto')->create && hasPermission(getRouteName().'.producto.create', 1, 1))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.producto.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Producto') ]) }}</a>
                            <a href="{{route('productos.pdf')}}" class="btn btn-info ml-2"target="_blank">{{ __('Export PDF') }}</a>
                        </div>

                        @endif
                        @if(getCrudConfig('Producto')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('codigo')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'codigo') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'codigo') fa-sort-amount-up ml-2 @endif'></i> {{ __('Codigo') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('nombre')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'nombre') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'nombre') fa-sort-amount-up ml-2 @endif'></i> {{ __('Nombre') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('abreviatura')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'abreviatura') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'abreviatura') fa-sort-amount-up ml-2 @endif'></i> {{ __('Abreviatura') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('categoria')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'categoria') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'categoria') fa-sort-amount-up ml-2 @endif'></i> {{ __('Categoria') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('marca')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'marca') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'marca') fa-sort-amount-up ml-2 @endif'></i> {{ __('Marca') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('unidad')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'unidad') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'unidad') fa-sort-amount-up ml-2 @endif'></i> {{ __('Unidad') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('p_compra')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'p_compra') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'p_compra') fa-sort-amount-up ml-2 @endif'></i> {{ __('P. Compra') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('p_venta')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'p_venta') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'p_venta') fa-sort-amount-up ml-2 @endif'></i> {{ __('P. Venta') }} </th>
                            
                            @if(getCrudConfig('Producto')->delete or getCrudConfig('Producto')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            @livewire('admin.producto.single', [$producto], key($producto->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $productos->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
