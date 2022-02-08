<?php 
namespace App;
include "Config.php";
include "Utils.php";
?>
<html>
    <head>

    <title>Customers</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css"> 
 
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script> 

         <style>
            body {
                margin: 20px;
            }
            thead input {
                width: 100%;
                }
        </style>
        <script>
          $(document).ready(function() {
            //initialize customer table
            $('#customers thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#customers thead');

            //adding column filters
        var table = $('#customers').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    /*
                    use indexes of the needed columns only
                     */
                    if(colIdx == 3 || colIdx == 5){ 
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('keyup change', function (e) {
                            e.stopPropagation();
 
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            /*
                             Search the column for that value
                            */
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
 
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                    }else {
                        $(cell).html('');
                    }
                });
        },
    });
           

        });
        </script>
    </head>
    <body>

    <?php
    /*  
    FETCHING DATA FROM THE BACKEND ENDPOINT
    */
    $api_url =  Config::getConfigs("data_url");
    $json_data = file_get_contents($api_url);
    $data = json_decode($json_data,true);

?>
 <div align="center"> 
            <h1>Customers Table</h1>
            <h4>Categorize Internation Phone Numbers</h4>
        </div>
<table id="customers" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Country Code</th>
				<th>Country</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
		<?php 
        /*
        LOOP THROUGH THE TABLE ROWS
        */
		foreach($data as $row){	
            /*
            THIS METHOD USES THE PHONE NUMBER TO EXTRACT COUNTRY CODE, COUNTRY AND VALIDATION STATUS
            */
             $payload =  Utils::validatePhoneNumber($row['phone']);		
		?>
            <tr>
                <td><?= $row['id']?></td>
                <td><?= $row['name']?></td>
                <td><?= $row['phone']?></td>
                <td><?= $payload['country_code']?></td>
				<td><?= $payload['country']?></td>
                <td><?= $payload['status']?></td>               
            </tr>
		<?php 
        }
        ?>
            
        </tbody>
      
    </table>

   </body>
</html>