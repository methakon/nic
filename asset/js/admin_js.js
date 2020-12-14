if(typeof this.NodeList.prototype.forEach != undefined )
{
    this.NodeList.prototype.forEach = Array.prototype.forEach;
}

class charts{
    constructor() { 
         this.auther="SWARNA SEKHAR DHAR";
         this.b_lables=[];
         this.b_values=[];
         document.char=this;
         this.initialise();
     }
     initialise()
     {
        
     }
     bar_chart()
     {
        
        var ctx = document.getElementById("myBarChart");
            var myLineChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: document.char.b_lables,
                datasets: [{
                  label: "Registration",
                  backgroundColor: "rgba(2,117,216,1)",
                  borderColor: "rgba(2,117,216,1)",
                  data: document.char.b_values,
                }],
              },
             
            });

     }
    
}

class dtables{
    constructor() { 
         this.auther="SWARNA SEKHAR DHAR";
         this.base_url=base_url;
         this.table=document.getElementById("RrgistrationsTable");;
         document.dtbl=this;
         this.initialise();
     }
     initialise()
     {
          var arr = [ "", "Photo" ];
          $('#RrgistrationsTable thead tr').clone(true).appendTo( '#RrgistrationsTable thead' );
            $('#RrgistrationsTable thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                if(!(jQuery.inArray( title.trim(),arr ) >= 0) )
                {  
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

                    $( 'input', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                }
            } );
         var table =  $(document.dtbl.table).DataTable( {
           "ajax": document.dtbl.base_url+'/admin/get_list',
           orderCellsTop: true,
           fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                 'csv', 'excel'
            ]
          });
     }
     
}

 

 