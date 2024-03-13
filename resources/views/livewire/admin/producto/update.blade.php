<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Producto') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.producto.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Producto')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Codigo Input -->
            <div class='form-group'>
                <label for='input-codigo' class='col-sm-2 control-label '> {{ __('Codigo') }}</label>
                <input type='number' id='input-codigo' wire:model.lazy='codigo' class="form-control  @error('codigo') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('codigo') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Nombre Input -->
            <div class='form-group'>
                <label for='input-nombre' class='col-sm-2 control-label '> {{ __('Nombre') }}</label>
                <input type='text' id='input-nombre' wire:model.lazy='nombre' class="form-control  @error('nombre') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Abreviatura Input -->
            <div class='form-group'>
                <label for='input-abreviatura' class='col-sm-2 control-label '> {{ __('Abreviatura') }}</label>
                <input type='text' id='input-abreviatura' wire:model.lazy='abreviatura' class="form-control  @error('abreviatura') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('abreviatura') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Categoria_id Input -->
            <div class='form-group'>
                <label for='input-categoria_id' class='col-sm-2 control-label '> {{ __('Categoria_id') }}</label>
                <select id='input-categoria_id' wire:model.lazy='categoria_id' class="form-control  @error('categoria_id') is-invalid @enderror">
                    @foreach(getCrudConfig('Producto')->inputs()['categoria_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('categoria_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Marca_id Input -->
            <div class='form-group'>
                <label for='input-marca_id' class='col-sm-2 control-label '> {{ __('Marca_id') }}</label>
                <select id='input-marca_id' wire:model.lazy='marca_id' class="form-control  @error('marca_id') is-invalid @enderror">
                    @foreach(getCrudConfig('Producto')->inputs()['marca_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('marca_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Unidad_id Input -->
            <div class='form-group'>
                <label for='input-unidad_id' class='col-sm-2 control-label '> {{ __('Unidad_id') }}</label>
                <select id='input-unidad_id' wire:model.lazy='unidad_id' class="form-control  @error('unidad_id') is-invalid @enderror">
                    @foreach(getCrudConfig('Producto')->inputs()['unidad_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('unidad_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- P_compra Input -->
            <div class='form-group'>
                <label for='input-p_compra' class='col-sm-2 control-label '> {{ __('P_compra') }}</label>
                <input type='text' id='input-p_compra' wire:model.lazy='p_compra' class="form-control  @error('p_compra') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('p_compra') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- P_venta Input -->
            <div class='form-group'>
                <label for='input-p_venta' class='col-sm-2 control-label '> {{ __('P_venta') }}</label>
                <input type='text' id='input-p_venta' wire:model.lazy='p_venta' class="form-control  @error('p_venta') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('p_venta') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.producto.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
