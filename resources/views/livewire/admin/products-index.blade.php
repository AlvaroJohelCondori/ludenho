<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                Nuevo
            </a>
            <input class="form-control" placeholder="Buscar producto..." wire:model.live="search">
        </div>
        @if ($products->count())
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre Producto</th>
                            <th scope="col">Nombre Amigable</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <div class="d-flex justify-content-between">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_slug }}</td>
                                    <td>
                                        @if ($product->image)
                                            <a href="{{ Storage::url($product->image->url) }}"
                                                data-lightbox="{{ $product->id }}">
                                                <img class="rounded" src="{{ Storage::url($product->image->url) }}"
                                                    width="75px" height="75px" alt="">
                                            </a>
                                        @else
                                            <span>No hay imagen</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-default text-teal mx-1 shadow"
                                            title="Ver">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                            class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-default text-danger mx-1 shadow"
                                                title="Eliminar" type="submit">
                                                <i class="fa fa-lg fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $products->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>
                    No hay ningún registro...
                </strong>
            </div>
        @endif
    </div>
</div>
