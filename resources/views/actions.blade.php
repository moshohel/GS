<div class=" row text-center">

    {{--<a class="btn btn-success" href="{{  route(  $model.'.show', $id)  }}">
        <i class="fa fa-eye fa-lg"></i>
        View
    </a>--}}

    <div class="col-md-6">
    <a class="btn btn-info btn-sm" href="{{ route(  $model.'.edit', $id) }}">
        {{--<i class="fa fa-edit"></i>
        Edit--}}
       {{-- <i class="fa fa-eye fa-lg"></i>--}}
        View
    </a>
    </div>

    @if(auth()->user()->role === 'superadmin')

    <div class="col-md-6">
    <a class="btn btn-danger btn-sm" href="#"
       onclick="if(confirm('Are you sure?')) document.getElementById('delete-{{ $id }}').submit()">
      {{--  <i class="fa fa-trash"></i>--}}
        Delete
    </a>
    </div>

    @endif

    <form id="delete-{{ $id }}" action="{{ route(  $model.'.destroy', $id) }}" method="POST">
        @method('DELETE')
        @csrf
    </form>

</div>
