@extends('admin.layout.app')

@section('content')
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="table-container">
            <h2 class="text-center"><u>Add Daily Task</u></h2>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('Admin.Store.Task') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <label for="task">Task Name</label>
                                        <input type="text" name="name" id="task" class="form-control"
                                            placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="price">Plan Price</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="profit">Task Profit</label>
                                        <input type="number" name="profit" id="profit" class="form-control"
                                            placeholder="Enter profit" required step="0.0001">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="image">Task Image</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            placeholder="Enter image" required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Add Task</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
