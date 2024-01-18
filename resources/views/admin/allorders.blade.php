@include('admin.dashboard');
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        /* Styling for table headers and cells */
        #ticket-table th,
        #yourDataTable td {
            text-align: center;
            padding: 8px; /* Adjust padding as needed */
        }

        /* Styling for table head (header) */
        #ticket-table thead {
            background-color: #192a56;
            color: #fbc531;
            border: 2px solid #353b48;
        }

        /* Styling for table body */
        #ticket-tabletbody {
            background-color: red; /* Change to your desired background color */
        }

        /* Styling for odd and even rows */
        #ticket-table tbody tr:nth-child(odd) {
            background-color: #f2f2f2; /* Change to your desired odd row color */
        }

        #ticket-table tbody tr:nth-child(even) {
            background-color: #ffffff; /* Change to your desired even row color */
        }
    </style>
</head>
<body>
    <div class="container w-75" style="margin-left: 20%;">
        <table id="ticket-table" style="border: 2px solid grey;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Userid</th>
                    <th>Category</th>
                    <th>ProductID</th>
                    <th>ProductName</th>
                    <th>Price</th>
                    <th>Product Quantity</th>
                    <th>Delivery address</th>
                    <th>Ordered On</th>
                    <th>Status</th>
                    <th>Action</th>
                
                    <!-- Add other columns as needed -->
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#ticket-table').DataTable({
        paging: true,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: '/orderdetails',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'userID', name: 'userID' },
            { data: 'name', name: 'name' },
            { data: 'productID', name: 'productID' },
            { data: 'productName', name: 'productName' },
            { data: 'price', name: 'price' },
            { data: 'total_no_of_product', name: 'total_no_of_product' },
            { data: 'delivery_address', name: 'delivery_address' },
            { data: 'created_at', name: 'created_at' },
            { data: 'status', name: 'Status' },
            { data: 'action', name: 'Action', orderable: false, searchable: false }
           
           
        ],
    });
    $(document).on('mouseenter', '#tick', function () {
        $(this).prop('title', 'Accept Order');
    });
    $(document).on('mouseenter', '#cut', function () {
        $(this).prop('title', 'Decline Order');
    });
    $(document).on('mouseenter', '#delivered', function () {
        $(this).prop('title', 'Click If Delivered');
    });
   
});

</script>
</body>
</html>
