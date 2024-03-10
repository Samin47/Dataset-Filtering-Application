<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dataset Table</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <h3>Dataset</h3>
    <br><br>


    <form action="{{ route('dataset.index') }}" method="GET" onsubmit="return validateFilter()">
        <div class="filter-form">
            <div class="form-group">
                <label for="birth_year">Birth Year:</label>
                <input type="text" name="birth_year" id="birth_year" class="form-control" placeholder="Enter birth year">
            </div>
            <div class="form-group">
                <label for="birth_month">Birth Month:</label>
                <input type="text" name="birth_month" id="birth_month" class="form-control" placeholder="Enter birth month">
            </div>
            <button type="submit" class="btn btn-orange">Filter</button>
        </div>
    </form>

    
    

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Birthday (YYYY-MM-DD)</th>
                <th>Phone</th>
                <th>Location</th>
                <th>IP</th>            
            </tr>
        </thead>
        <tbody>
            @foreach ($dataset as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ date('Y-m-d', strtotime($data->date_of_birth)) }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->country }}</td>
                    <td>{{ $data->ip }}</td>                  
                </tr>
            @endforeach
        </tbody>
    </table>
    

    <div class="pagination">
        {{ $dataset->appends(request()->query())->links() }}
    </div>
    

    <div class="result-count">
        <span>{{ $dataset->total() }} people in the list</span>
    </div>

    <div style="margin-bottom: 40px;"></div>
    
</body>

<script>
    function validateFilter() {
        var birthYear = document.getElementById('birth_year').value.trim();
        var birthMonth = document.getElementById('birth_month').value.trim();

        if (birthYear === '' && birthMonth === '') {
            alert('Please enter at least one of Birth Year or Birth Month.');
            return false;
        }

        return true;
    }
</script>
</html>
