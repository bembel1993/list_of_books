<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
        <div>
        <hr>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class=search_properties>
                                    <div class="col-md-5">
                                        <div class="input-group col-mb-3">
                                            <form action="" method="">
                                                <input type="text" class="form-control" placeholder="Search author" id="search_auth">
                                            </form>
                                            &emsp;&emsp;&emsp;
                                            <form action="" method="">
                                                <input type="text" class="form-control" placeholder="Search published year" id="search_pubyear">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
            <label for="books_sort">Sort books:</label>
                <div class="col-md-2">
                    <form action="" method="">
                        <select class="form-select" name="books_sort" id="books_sort">
                            <option id="by_title_top" onclick="return title_top()">by title ↑</option>
                            <option id="by_title_bottom">by title ↓</option>
                            <option id="by_year_top">by year ↑</option>
                            <option id="by_year_bottom">by year ↓</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="table_properties">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</td>
                        <th scope="col">Author</td>
                        <th scope="col">Published Year</td>
                        <th scope="col">ISBN</td>
                    </tr>
                </thead>
                <tbody id="books-tbody">
                    @foreach ($books as $row)
                    <tr>
                        <td id="title">
                            {{ $row->title }}
                        </td>
                        <td id="author">
                            {{ $row->author }}
                        </td>
                        <td id="published_year">
                            {{ $row->published_year }}
                        </td>
                        <td id="isbn">
                            {{ $row->isbn }}
                        </td>
                        <td>  
                            <a href="{{ url('books.formedit/'.$row->id) }}">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('books.delete/'.$row->id) }}" onclick="return deleteBook()">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script>
        $('#search_auth').on('keyup', function(){
            searchAuth();
        });
        searchAuth();
        function searchAuth()
        {
            var keyword_auth = $('#search_auth').val();
            $.post('{{ route("authors.search") }}',
            {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword_auth:keyword_auth
            },
            function(data){
                auth_post_row(data);
                console.log(data);
            });
        }

        function auth_post_row(res)
        {
            let htmlView = '';
            let title = '';
            let author = ''; 
            let published_year = ''; 
            let isbn = '';

            if(res.authors.length <= 0){
                htmlView+= `
                <tr>
                    <td colspan="6">No data.</td>
                </tr>`;
            }

            for(let i = 0; i < res.authors.length; i++)
            {
                $("#authorId").val(res.authors[i].title);

                htmlView += `
                        <tr>
                            <td>`+res.authors[i].title+`</td>
                            <td>`+res.authors[i].author+`</td>
                            <td>`+res.authors[i].published_year+`</td>
                            <td>`+res.authors[i].isbn+`</td>
                            <td>  
                                <a href="{{ url('books.formedit/') }}/${res.authors[i].id}">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('books.delete/') }}/${res.authors[i].id}" onclick="return deleteBook()">Delete</a>
                            </td>
                        </tr>`;
                        
            }
            $('tbody').html(htmlView);
        }
        

        $('#search_pubyear').on('keyup', function(){
            searchPubyear();
        });
        searchPubyear();
        function searchPubyear()
        {
            var keyword_pubyear = $('#search_pubyear').val();
            $.post('{{ route("authors.search") }}',
            {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword_pubyear:keyword_pubyear
            },
            function(data){
                pubyear_post_row(data);
                console.log(data);
            });
        }

        function pubyear_post_row(res)
        {
            let htmlView = '';
            let title = '';
            let author = ''; 
            let published_year = ''; 
            let isbn = '';

            if(res.authors.length <= 0){
                htmlView+= `
                <tr>
                    <td colspan="6">No data.</td>
                </tr>`;
            }

            for(let i = 0; i < res.authors.length; i++)
            {
                $("#authorId").val(res.authors[i].title);

                htmlView += `
                        <tr>
                            <td>`+res.authors[i].title+`</td>
                            <td>`+res.authors[i].author+`</td>
                            <td>`+res.authors[i].published_year+`</td>
                            <td>`+res.authors[i].isbn+`</td>
                            <td>  
                                <a href="{{ url('books.formedit/') }}/${res.authors[i].id}">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('books.delete/') }}/${res.authors[i].id}" onclick="return deleteBook()">Delete</a>
                            </td>
                        </tr>`;
                        
            }
            $('tbody').html(htmlView);
        }
    </script>
    <script>
        function deleteBook()
        {
            if (confirm("Are you really want to delete this book?") == false){
                return false;
            } 
        }
    </script>
    <script>
        function title_top()
        {
        $('#by_title_top').on('keyup', function(){
            sortTitleTop();
            });
            sortTitleTop();
            function sortTitleTop()
            {
                var keyword_title_top = $('#by_title_top').val();
                $.post('{{ route("bytitletop.sort") }}',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword_title_top:keyword_title_top
                },
                function(data){
                    sort_by_title_top(data);
                    console.log(data);
                });
            }

            function sort_by_title_top(res)
            {
                let htmlView = '';
                let title = '';
                let author = ''; 
                let published_year = ''; 
                let isbn = '';

                if(res.authors.length <= 0){
                    htmlView+= `
                    <tr>
                        <td colspan="6">No data.</td>
                    </tr>`;
                }

                for(let i = 0; i < res.authors.length; i++)
                {
                    $("#authorId").val(res.authors[i].title);

                    htmlView += `
                            <tr>
                                <td>`+res.authors[i].title+`</td>
                                <td>`+res.authors[i].author+`</td>
                                <td>`+res.authors[i].published_year+`</td>
                                <td>`+res.authors[i].isbn+`</td>
                                <td>  
                                    <a href="{{ url('books.formedit/') }}/${res.authors[i].id}">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ url('books.delete/') }}/${res.authors[i].id}" onclick="return deleteBook()">Delete</a>
                                </td>
                            </tr>`;
                            
                }
                $('tbody').html(htmlView);
            }
        }
    </script>
</body>
</html>