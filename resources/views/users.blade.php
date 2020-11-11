<!DOCTYPE html>
<html>
<head>
    <title>Custom filter/Search with Laravel Datatables Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <style>
        div#DataTables_Table_0_length {
            display: none;
        }

        div#DataTables_Table_0_filter {
            display: none;
        }
    </style>
</head>
<body>
  
<div class="container">
    <h1>Custom filter/Search with Laravel Datatables Example</h1>
    <br>
   
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th width="103px">SR.No</th>
                <th width="100px">Name</th>
                <th width="20px">Email</th>
                <th width="100px">Status</th>
                <th width="160px">Action</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <td>
                    <input type="text" name="id" class="form-control ID" placeholder="Search By ID">
                </td>
                <td>
                    <input type="text" name="name" class="form-control sendName" placeholder="Search By Name">
                </td>
                <td>
                    <input type="text" name="email" class="form-control searchEmail" placeholder="Search By Email">
                </td>
                <td>
                    <select name="status" id="statusData" class="form-control" >
                        <option value="">Status</option>
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>
                    </select>
                </td>
                <td></td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
  
</body>
  
<script type="text/javascript">
  $(function () {
   
    var table = $('.data-table').DataTable({
        
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('users.index') }}",
          data: function (d) {
                d.name = $('.sendName').val(),
                d.id = $('.ID').val(),
                d.email = $('.searchEmail').val(),
                d.status = $('#statusData').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
   
    $(".searchEmail").keyup(function(){
        table.draw();
    });

    $(".sendName").keyup(function(){
        table.draw();
    });

    $(".ID").keyup(function(){
        table.draw();
    });

    $("#statusData").change(function(){
        table.draw();
    });
  
  });
</script>
</html>