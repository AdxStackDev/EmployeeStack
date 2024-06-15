<div>
    <h1>Employees List</h1>
    <!-- @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Join Date</th>
                <th>Job Type</th>
                <th>City</th>
                <th>Salary</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = ($employees->currentPage() - 1) * $employees->perPage() + 1;
            @endphp
            @foreach($employees as $employee)
                
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->dob }}</td>
                    <td>{{ $employee->join_date }}</td>
                    <td>{{ $employee->job_type }}</td>
                    <td>{{ $employee->city }}</td>
                    <td>${{ $employee->salary }}</td>
                    <td>{{ $employee->age }}</td>
                    <td style="display: flex;">
                        <button wire:click="edit({{ $employee->id }})" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#updateModal" style="margin: 3px;">Edit</button>
                        <button wire:click="delete({{ $employee->id }})" class="btn btn-sm btn-danger" style="margin: 3px;">Delete</button>
                    </td>
                </tr>
                @php $i++; @endphp
            @endforeach
        </tbody>
    </table>

    {{ $employees->links() }}

    <!-- Update Modal -->
    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" wire:model="firstName" class="form-control" id="firstName">
                            @error('firstName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" wire:model="lastName" class="form-control" id="lastName">
                            @error('lastName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" wire:model="email" class="form-control" id="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!-- Add other fields as needed -->
                        <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        @this.on('employeeUpdated', function () {
            toastr.success('Employee updated successfully.');
        });

        @this.on('employeeDeleted', function () {
            toastr.success('Employee deleted successfully.');
        });

        @this.on('employeeError', function (message) {
            toastr.error(message);
        });
    });
</script>