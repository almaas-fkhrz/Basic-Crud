<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Book</title>
</head>

<body>
    <div class="container">
        <h3>Book list</h3>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
            Add new
        </button>
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th>Id Book</th>
                    <th>Book Title</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php foreach ($book as $row) : ?>
                    <tr>
                        <td><?= $row->id_book; ?></td>
                        <td><?= $row->book_title; ?></td>
                        <td><?= $row->year; ?></td>
                        <td style="width: 120px;">
                            <a href="#" class="btn btn-secondary btn-sm btn-edit" data-id="<?= $row->id_book; ?>" data-title="<?= $row->book_title; ?>" data-year="<?= $row->year; ?>">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id_book; ?>">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/book/save" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Book title</label>
                            <input type="text" class="form-control" name="book_title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Book year</label>
                            <input type="text" class="form-control" name="book_year">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/book/update" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Book title</label>
                            <input type="text" class="form-control book_title" name="book_title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Book year</label>
                            <input type="text" class="form-control book_year" name="book_year">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_book" class="id_book">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/book/delete" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Are you sure want to delete this book?</h5>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_book" class="id_book">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <script>
        $(document).ready(function() {

            // get Edit Product
            $('.btn-edit').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const title = $(this).data('title');
                const year = $(this).data('year');
                // Set data to Form Edit
                $('.id_book').val(id);
                $('.book_title').val(title);
                $('.book_year').val(year);
                // Call Modal Edit
                $('#editModal').modal('show');
            });

            // get Delete Product
            $('.btn-delete').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                // Set data to Form Edit
                $('.id_book').val(id);
                // Call Modal Edit
                $('#deleteModal').modal('show');
            });

        });
    </script>
</body>

</html>