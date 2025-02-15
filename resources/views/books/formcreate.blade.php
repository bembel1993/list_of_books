<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel = "stylesheet">
</head>
<body>
    <div class="wrapper_table_books">
        <div class="add_title_properties">
            <h3>Add new book</h3>
            <hr>
        <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table_properties">
            <div class="form_properties">
                <form action="{{ route('books.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label><br>
                        <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Title">
                    </div><br>
                    <div class="form-group">
                        <label for="author">Author</label><br>
                        <input type="text" class="form-control form-control-lg" id="author" name="author" placeholder="Author">
                    </div><br>
                    <div class="form-group">
                        <label for="published_year">Published Year</label><br>
                        <input type="number" class="form-control form-control-lg" id="published_year" name="published_year" placeholder="Published Year">
                    </div><br>
                    <div class="form-group">
                        <label for="isbn">ISBN</label><br>
                        <input type="text" class="form-control form-control-lg" id="isbn" name="isbn" placeholder="ISBN">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary" id="add-btn" name="add-btn">
                        Add
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>