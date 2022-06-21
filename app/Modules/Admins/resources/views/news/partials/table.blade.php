<div class="card-body px-0 pb-0">
    <div class="table-responsive">
        <table class="table table-flush" id="products-list">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Created_by</th>
                    @if (request()->query('view') == 'trash')
                        <th>Deleted_by</th>
                    @endif
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (request()->query('view') == 'trash')
                    @foreach ($trashedNews as $key => $item)
                        <tr>
                            <td class="text-sm">{{ ++$key }}</td>
                            <td>
                                <div class="d-flex">
                                    <h6 class="ms-3 my-auto">{{ $item->name }}</h6>
                                </div>
                            </td>
                            <td>
                                <h6 class="ms-3 my-auto">{{ $item->details }}</h6>
                            </td>
                            <td class="text-sm">{{ $item->createdBy->name }}</td>

                            <td class="text-sm">{{ $item->deletedBy->name }}</td>

                            <td class="text-sm ">
                                <div class="flex">

                                    <form style="display:inline" method="POST"
                                        action="{{ route('admin.news.restore', $item->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" >
                                        <a class="btn btn-outline-danger show-alert-restore-box" type="button">
                                            <span class="btn-inner--icon">Restore</span> </a>
                                    </form>
                                    <form style="display:inline" method="POST"
                                        action="{{ route('admin.news.destroy', $item->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a class="btn btn-outline-danger show-alert-delete-box" type="button"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delete News">
                                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span> </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @foreach ($news as $key => $item)
                        <tr>
                            <td class="text-sm">{{ ++$key }}</td>
                            <td>
                                <div class="d-flex">
                                    <h6 class="ms-3 my-auto">{{ $item->name }}</h6>
                                </div>
                            </td>
                            <td>
                                <h6 class="ms-3 my-auto">{{ $item->details }}</h6>
                            </td>
                            <td class="text-sm">{{ $item->createdBy->name }}</td>
                            <td class="text-sm ">
                                <div class="flex">
                                    <a href="{{ route('admin.news.edit', $item->id) . '?view=update' }}"
                                        class="btn btn-outline-info" type="button" data-bs-toggle="tooltip"
                                        data-bs-original-title="Edit News">
                                        <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                                    </a>

                                    <form style="display:inline" method="POST"
                                        action="{{ route('admin.news.trash', $item->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a class="btn btn-outline-danger show-alert-trash-box" type="button"
                                            data-bs-toggle="tooltip" data-bs-original-title="Trash News">
                                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span> </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
