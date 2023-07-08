@extends('layouts.admin')

@section('admin')



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">User List</h2>
        </div>
        <a href="{{route('addUser')}}" class="btn btn-sm btn-info text-white d-inline-flex align-items-center me-2"
          >
            <i class="fas fa-plus"></i>
            <span class="ms-2">
                Add User
            </span>
        </a>
   
    </div>

    {{--//Table Start--}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">

       
        <table id="myTable" class="table table-sm table-hover">
            <thead>
            <tr>
                <th class="border-gray-200">ID</th>
                <th class="border-gray-200">Name</th>
                <th class="border-gray-200">Email</th>
                <th class="border-gray-200">Role</th>
                <th class="border-gray-200 text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <!-- Item -->
          @foreach($users as $user)
                <tr>

                    <td>
                        
                           
                            <span class="text-center ">{{$user->id}}</span>
                       
                    </td>
                    <td>
                        <span class="text-center">{{$user->name}}</span>
                    </td>
                    <td>
                        <span class="text-center">{{$user->email}}</span>
                    </td>
                    <td>
                        <span class="text-center">{{ucfirst($user->role->role)}}</span>
                    </td>
                    <td class="text-center">
                        <a  class="btn btn-xs edit-user" id="edit-user"
                           data-user-id='{{$user->id}}' title="Edit" data-toggle="tooltip" data-placement="bottom"
                           href="{{route('editUser')}}">
                            <i class="fas fa-edit text-warning fs-5"></i>
                        </a>
                        <form method="post" action="{{route('delete')}}">
                            @csrf
                            <input name="id" type="hidden" value="{{$user->id}}">
                            <button type="submit" class="btn btn-xs" title="Delete" data-toggle="tooltip"
                                    data-placement="bottom">
                                <i class="fas fa-trash text-secondary fs-5"></i>
                            </button>
                        </form>
                    </td>

                </tr>
        @endforeach
            <!-- Item -->
            </tbody>
        </table>
   

    <script>
      

        document.addEventListener('DOMContentLoaded', function () {
            var table = $('#myTable').DataTable({
                "drawCallback": function (settings) {
                    $(function () {
                        $('[data-toggle="tooltip"]').tooltip()
                    });
                },
                'columnDefs': [
                    {
                        orderable: false,
                        className: 'select-checkbox',
                        targets: [0],
                    },
                ],
                "searching": true,
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                "bAutoWidth": false,
                dom: 'Bfrtip',
                buttons: [
                    {extend: 'csv', className: 'd-none'},
                ]
            });
        });

       
    </script>
    @push('js')
    <script>
        $('#edit-user').click(function () {
           
             var id = $(this).data('user-id');
           
             Livewire.emit('init', id);
         });
    </script>
@endpush


@endsection