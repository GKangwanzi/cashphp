/**
 * DataTables Basic
 */


 $(document).ready(function() {
  var userID = "1"
  $('#example').DataTable({
      "ajax": "controller/ajax_res.php?getdevices="+userID,
      "columns": [
          { "data": "IDs" },
          { "data": "Checkbox" },
          { "data": "ID" },
          { "data": "Device_name" },
          { "data": "Sim" },
          { "data": "Create" },
          { "data": "Device_type" },
          { "data": "Active" },
          { "data": "Expiry" },
          { "data": "Remain" },
          { "data": "Operate" }
      ],
      searching: false,
      bLengthChange: false,
      scrollY: 300,
      scrollX: true,
      order: [[0, 'desc']],
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      columnDefs: [
        {
            "targets": [ 0 ],
            "visible": false
        }
    ]
    
  } );
  $('#userstable').DataTable({
      "ajax": "controller/ajax_res.php?getusers="+userID,
      "columns": [
          { "data": "IDs" },
          { "data": "Checkbox" },
          { "data": "User" },
          { "data": "Name" },
          { "data": "Telephone" },
          { "data": "Company" },
          { "data": "Create" },
          { "data": "Expiry" },
          { "data": "Operate" }
      ],
      searching: false,
      bLengthChange: false,
      scrollY: 300,
      scrollX: true,
      order: [[0, 'desc']],
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      columnDefs: [
        {
            "targets": [ 0 ],
            "visible": false
        }
    ]
    
  } );
});
