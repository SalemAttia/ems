<html>

  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
         font-family: 'dejavu sans', sans-serif;
         direction:rtl;
        text-alignment:center;
      }
      td, th {
        border: solid 2px;
        padding: 10px 5px;
         font-family: 'dejavu sans', sans-serif;
         direction:rtl;
        text-alignment:center;
      }
      tr {
        text-align: center;
         font-family: 'dejavu sans', sans-serif;
         direction:rtl !important;
        text-alignment:center;
      }
       
    *{ 
        font-family: 'dejavu sans', sans-serif;
         direction:rtl !important;
        text-alignment:right ;
    }
      .container {
        width: 100%;
        text-align: center;
      }
      @media print {
        #forprint{
          display: none;
        }
        #back{
          display: none;
        }
}
    </style>
  </head>
<body  dir="rtl" onload="window.Print()">
    <div class="container">
        <div><h2>List of employee </h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="20%" style="direction:rtl !important;">الاسم</th>
                <th width="">العنوان</th>
                <th width="">الجنسية</th>
                <th width="">تاريخ الميلاد</th>
                <th width="">رقم التليفون</th>
                <th width="">الحالة الاجتماعية</th>
                <!-- <th width="">المؤهل</th> -->
                         
              </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                
                <tr role="row" class="odd">
                  
                  <td>{{ $employee['الاسم'] }} {{$employee['الاوسط']}} {{$employee['العائلة']}} </td>
                  <td>{{ $employee['العنوان'] }}</td>
                  <td>{{ $employee['الجنسية'] }}</td>
                  <td>{{ $employee['تاريخ'] }}</td>
                  <td>{{ $employee['الهاتف'] }}</td>
                  <td>{{ $employee['الحالة'] }}</td>
               
                 
              </tr>
            @endforeach
            </tbody>
          </table>
          <br>
          <br>
          <center> <button  id="forprint" onClick="window.print();" class="btn btn-info"> طباعة <i class="fa fa-print"></i></button>
          <a href="{{url('/admin/system-management/report')}}" id="back"> رجوع </a>
          </center>

    </div>
  </body>
</html>