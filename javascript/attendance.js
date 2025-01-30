

$(function () {
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'days'
    });

    // Set initial date to today
    //$('#datetimepicker').datetimepicker('date', new Date());
    // filterAttendance();
});

// function filterAttendance(){
//     //var selectedDate = $(this).datetimepicker('viewDate').format('YYYY-MM-DD');
//     var selectedDate = $('#datetimepicker').find('input').val();

//     $.ajax({
//         url: 'fetch_attendance.php',
//         method: 'POST',
//         data: { selectedDate: selectedDate },
//         success: function (response) {
//             try {
//                 var attendanceData = JSON.parse(response);
//                 new DataTable('#attendanceTable');
//                 $('#attendanceTable tbody').empty();

//                 if(attendanceData.length === 0){
                    
                

//                     $('#attendanceTable tbody').append(
//                         '<tr class="text-center">' +
//                         '<td colspan="4">' + 'No Attendance data available.' + '</td>' +
//                         '</tr>'
//                     );
            
//                 }
//                 else{
                    

//                     // Update table with new attendance data
//                     attendanceData.forEach(function (row) {
//                         $('#attendanceTable tbody').append(
//                             '<tr class="text-center">' +
//                             '<td>' + row.user_id + '</td>' +
//                             '<td>' + row.FullName + '</td>' +
//                             '<td>' + row.timeIn + '</td>' +
//                             '<td>' + row.timeOut + '</td>' +
//                             '</tr>'
//                         );
//                     });
//                 }
                
//             } catch (error) {
//                 console.error('Error parsing attendance data:', error);
//             }
//         },
//         error: function (xhr, status, error) {
//             console.error('Error fetching attendance data:', error);
//         }
//     });
// }



$(document).ready(function () {
    $.fn.dataTable.ext.errMode = 'throw';

    $('#attendanceTable').DataTable();
});