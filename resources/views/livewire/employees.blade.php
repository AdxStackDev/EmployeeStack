<div>
    <h1>Employees List</h1>
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
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
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
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->age }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $employees->links() }}
</div>
