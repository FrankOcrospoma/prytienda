<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $producto->codigo }}</td>
    <td class="">{{ $producto->nombre }}</td>
    <td class="">{{ $producto->abreviatura }}</td>
    <td class="">{{ $producto->categoria }}</td>
    <td class="">{{ $producto->marca }}</td>
    <td class="">{{ $producto->unidad }}</td>
    <td class="">{{ $producto->p_compra }}</td>
    <td class="">{{ $producto->p_venta }}</td>
    
    @if(getCrudConfig('Producto')->delete or getCrudConfig('Producto')->update)
        <td>

            @if(getCrudConfig('Producto')->update && hasPermission(getRouteName().'.producto.update', 1, 1, $producto))
                <a href="@route(getRouteName().'.producto.update', $producto->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Producto')->delete && hasPermission(getRouteName().'.producto.delete', 1, 1, $producto))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Producto') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Producto') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
