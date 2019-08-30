@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
            <h1>Data Barang</h1>
            @if(Session::has('alert_message'))
                <div class="alert alert-success">
                    <strong>{{ Session::get('alert_message')}}</strong>
                </div>
            @endif
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{ route('barang.create') }}" class=" btn btn-sm btn-primary"> CREATE DATA </a>
            <!-- menambahkan btn -->
            </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Stok</th>
              <th>Edit</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Stok</th>
              <th>Edit</th>
                    </tr>
                </tfoot>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->kd_barang }}</td>
                        <td>{{ $datas->nama_barang }}</td>
                        <td>{{ $datas->stok }}</td>
                        <td>
                            <form action="{{ route('barang.destroy', $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('barang.edit', $datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection