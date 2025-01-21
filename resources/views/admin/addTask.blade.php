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
                                        <label for="task" class="form-label">Task Name</label>
                                        <input type="text" name="name" id="task" class="form-control"
                                            placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="price" class="form-label">Total Price</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="profit" class="form-label">Task Profit</label>
                                        <input type="number" name="profit" id="profit" class="form-control"
                                            placeholder="Enter profit" required step="0.0001">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="level" class="form-label">User Level</label>
                                        <select name="level" class="form-control" id="level">
                                            <option value="vip1">VIP1</option>
                                            <option value="vip2">VIP2</option>
                                            <option value="vip3">VIP3</option>
                                            <option value="vip4">VIP4</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="image" class="form-label">Task Image</label>
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
