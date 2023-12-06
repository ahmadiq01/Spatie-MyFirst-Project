<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<x-admin-layout>
      <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end p-2">
                    <a href="{{route('admin.roles.index')}}" class="btn btn-danger">Roles Index</a>
                </div>
                <div style="text-align: center; margin-top: 50px;">
                    <form action="{{route('admin.roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <!-- Replace 'process_form.php' with the actual URL or script to handle form submission -->

                      <label for="inputField">Role Name</label>
                      <input type="text"
                             id="name"
                             name="name"
                             required
                             value="{{$roles->name}}">
                      <!-- 'required' attribute ensures that the field cannot be submitted empty -->
                      <br>
                      <button type="submit">Update</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</x-admin-layout>
