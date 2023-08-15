<div class="modal fade" id="show_model_class4_time_table" role="dialog">
<div class="modal-dialog" style="width:95%">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" style="text-align:center"> Update Time Table Class: 4 </h4>
</div>
<div class="modal-body">
<div class="row" style="margin-left:5px; margin-right:5px;">
    
    <div id="load_time_table_class4_popup_model_id"> </div>
    
</div>
</div>
<div class="modal-footer">
<button class="disabled btn btn-success pull-left" id="class4_TimeTable_ModelBtn_add_columns_disable"><i class='fa fa-plus'></i></button>
<button onclick="addColumn('class4_tblSample')" class="btn btn-success pull-left" id="class4_TimeTable_ModelBtn_add_columns"><i class='fa fa-plus'></i></button>
<button onclick="deleteColumn('class4_tblSample')" class="btn btn-danger pull-left" id="class4_TimeTable_ModelBtn_remove_columns"><i class='fa fa-minus'></i></button>
<button class="btn btn-primary" id="YesUpdate_class4_TimeTable_ModelBtn"><i class='fa fa-pencil-square-o'></i> Yes Update </button>
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>            
</div>      
</div>
</div>

<script>
function addColumn(tblId) {
    
    var tblBodyObj = document.getElementById(tblId);
    var newCell = "";
    for (var i=1; i<29; i++) {
        if(i===4 || i===9 || i===14 || i===19 || i===24) { i = i+2; }
        newCell = tblBodyObj.rows[i].insertCell(-1);
        if(tblBodyObj.rows[i].cells.length-1 > 6){
            $("#class4_TimeTable_ModelBtn_add_columns").hide();
            $("#class4_TimeTable_ModelBtn_add_columns_disable").show();
        }
        var input_data_id = 'class4_row_'+i+'_cell_'+(tblBodyObj.rows[i].cells.length-1);
        // newCell.innerHTML = "<input type='text' style='width:100%; font-size:18px;' class='maxlength' maxlength='15' value='"+input_data_id+"' id='"+input_data_id+"'>";
        newCell.innerHTML = "<input type='text' style='width:100%; font-size:18px;' class='limited' maxlength='15' id='"+input_data_id+"'>";
    }
}
function deleteColumn(tblId) {
    var allRows = document.getElementById(tblId).rows;
    for (var i=0; i<allRows.length; i++) {
        if (allRows[i].cells.length > 1) { 
            allRows[i].deleteCell(-1); 
            $("#class4_TimeTable_ModelBtn_add_columns_disable").hide();
            $("#class4_TimeTable_ModelBtn_add_columns").show();
        }
    }
}    
</script>
