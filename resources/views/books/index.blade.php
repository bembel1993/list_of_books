<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Books</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel = "stylesheet">
</head>
<body>
        <div class="add_title_properties">
            <div class="text-success"><h3>{{ session('success') }}</h3></div>
        </div>
    <div class="wrapper_table_books">
        <div class="add_title_properties">
            <a href="{{ route('books.formcreate') }}">Add new book</a>
            <hr>
        <div>
        <div class="table_properties">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</td>
                        <th scope="col">Author</td>
                        <th scope="col">Published Year</td>
                        <th scope="col">ISBN</td>
                    </tr>
                <thead>
                @foreach ($books as $row)
                <tr>
                    <td>
                        {{ $row->title }}
                    </td>
                    <td>
                        {{ $row->author }}
                    </td>
                    <td>
                        {{ $row->published_year }}
                    </td>
                    <td>
                        {{ $row->isbn }}
                    </td>
                    <td>  
                        <a href="{{ url('books.formedit/'.$row->id) }}">Edit</a>
                    </td>
                    <td>
                        <a href="{{ url('books.delete/'.$row->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>