$(document).ready(function()
{
    $("#class1_TimeTable_ModelBtn_add_columns_disable").hide();
    $("#class2_TimeTable_ModelBtn_add_columns_disable").hide();
    $("#class3_TimeTable_ModelBtn_add_columns_disable").hide();
    $("#class4_TimeTable_ModelBtn_add_columns_disable").hide();
    $("#class5_TimeTable_ModelBtn_add_columns_disable").hide();

    $(document).on("click", "#time_table_class1_update_button", function(){ Load_TimeTable_Class1_PopUpModel_Function(); });    
    $(document).on("click", "#time_table_class2_update_button", function(){ Load_TimeTable_Class2_PopUpModel_Function(); });    
    $(document).on("click", "#time_table_class3_update_button", function(){ Load_TimeTable_Class3_PopUpModel_Function(); });    
    $(document).on("click", "#time_table_class4_update_button", function(){ Load_TimeTable_Class4_PopUpModel_Function(); });    
    $(document).on("click", "#time_table_class5_update_button", function(){ Load_TimeTable_Class5_PopUpModel_Function(); });    
    
    
    
    $(document).on("click", "#YesUpdate_class1_TimeTable_ModelBtn", function(){
        var rowCount = $('#tblSample td').length;
        var total_rows = (rowCount-24);
        if(total_rows > 1) { total_rows = total_rows-17; }
        if(total_rows > 2) { total_rows = total_rows-17; }
        if(total_rows > 3) { total_rows = total_rows-17; }
        if(total_rows > 4) { total_rows = total_rows-17; }
        if(total_rows > 5) { total_rows = total_rows-17; }
        if(total_rows > 6) { total_rows = total_rows-17; }
        if(total_rows > 7) { total_rows = total_rows-17; }
        
        var row_1_cell_1 = '', row_2_cell_1 = '', row_3_cell_1 = '';
        var row_1_cell_2 = '', row_2_cell_2 = '', row_3_cell_2 = '';
        var row_1_cell_3 = '', row_2_cell_3 = '', row_3_cell_3 = '';
        var row_1_cell_4 = '', row_2_cell_4 = '', row_3_cell_4 = '';
        var row_1_cell_5 = '', row_2_cell_5 = '', row_3_cell_5 = '';
        var row_1_cell_6 = '', row_2_cell_6 = '', row_3_cell_6 = '';
        var row_1_cell_7 = '', row_2_cell_7 = '', row_3_cell_7 = '';
        
        var row_6_cell_1 = '', row_7_cell_1 = '', row_8_cell_1 = '';
        var row_6_cell_2 = '', row_7_cell_2 = '', row_8_cell_2 = '';
        var row_6_cell_3 = '', row_7_cell_3 = '', row_8_cell_3 = '';
        var row_6_cell_4 = '', row_7_cell_4 = '', row_8_cell_4 = '';
        var row_6_cell_5 = '', row_7_cell_5 = '', row_8_cell_5 = '';
        var row_6_cell_6 = '', row_7_cell_6 = '', row_8_cell_6 = '';
        var row_6_cell_7 = '', row_7_cell_7 = '', row_8_cell_7 = '';
        
        var row_11_cell_1 = '', row_12_cell_1 = '', row_13_cell_1 = '';
        var row_11_cell_2 = '', row_12_cell_2 = '', row_13_cell_2 = '';
        var row_11_cell_3 = '', row_12_cell_3 = '', row_13_cell_3 = '';
        var row_11_cell_4 = '', row_12_cell_4 = '', row_13_cell_4 = '';
        var row_11_cell_5 = '', row_12_cell_5 = '', row_13_cell_5 = '';
        var row_11_cell_6 = '', row_12_cell_6 = '', row_13_cell_6 = '';
        var row_11_cell_7 = '', row_12_cell_7 = '', row_13_cell_7 = '';
        
        var row_16_cell_1 = '', row_17_cell_1 = '', row_18_cell_1 = '';
        var row_16_cell_2 = '', row_17_cell_2 = '', row_18_cell_2 = '';
        var row_16_cell_3 = '', row_17_cell_3 = '', row_18_cell_3 = '';
        var row_16_cell_4 = '', row_17_cell_4 = '', row_18_cell_4 = '';
        var row_16_cell_5 = '', row_17_cell_5 = '', row_18_cell_5 = '';
        var row_16_cell_6 = '', row_17_cell_6 = '', row_18_cell_6 = '';
        var row_16_cell_7 = '', row_17_cell_7 = '', row_18_cell_7 = '';
        
        var row_21_cell_1 = '', row_22_cell_1 = '', row_23_cell_1 = '';
        var row_21_cell_2 = '', row_22_cell_2 = '', row_23_cell_2 = '';
        var row_21_cell_3 = '', row_22_cell_3 = '', row_23_cell_3 = '';
        var row_21_cell_4 = '', row_22_cell_4 = '', row_23_cell_4 = '';
        var row_21_cell_5 = '', row_22_cell_5 = '', row_23_cell_5 = '';
        var row_21_cell_6 = '', row_22_cell_6 = '', row_23_cell_6 = '';
        var row_21_cell_7 = '', row_22_cell_7 = '', row_23_cell_7 = '';
        
        var row_26_cell_1 = '', row_27_cell_1 = '', row_28_cell_1 = '';
        var row_26_cell_2 = '', row_27_cell_2 = '', row_28_cell_2 = '';
        var row_26_cell_3 = '', row_27_cell_3 = '', row_28_cell_3 = '';
        var row_26_cell_4 = '', row_27_cell_4 = '', row_28_cell_4 = '';
        var row_26_cell_5 = '', row_27_cell_5 = '', row_28_cell_5 = '';
        var row_26_cell_6 = '', row_27_cell_6 = '', row_28_cell_6 = '';
        var row_26_cell_7 = '', row_27_cell_7 = '', row_28_cell_7 = '';
        
        if(total_rows > 0){
            row_1_cell_1 = $("#row_1_cell_1").val();  
            row_2_cell_1 = $("#row_2_cell_1").val();
            row_3_cell_1 = $("#row_3_cell_1").val();
            row_6_cell_1 = $("#row_6_cell_1").val();
            row_7_cell_1 = $("#row_7_cell_1").val();
            row_8_cell_1 = $("#row_8_cell_1").val();
            row_11_cell_1 = $("#row_11_cell_1").val();
            row_12_cell_1 = $("#row_12_cell_1").val();
            row_13_cell_1 = $("#row_13_cell_1").val();
            row_16_cell_1 = $("#row_16_cell_1").val();
            row_17_cell_1 = $("#row_17_cell_1").val();
            row_18_cell_1 = $("#row_18_cell_1").val();
            row_21_cell_1 = $("#row_21_cell_1").val();
            row_22_cell_1 = $("#row_22_cell_1").val();
            row_23_cell_1 = $("#row_23_cell_1").val();
            row_26_cell_1 = $("#row_26_cell_1").val();
            row_27_cell_1 = $("#row_27_cell_1").val();
            row_28_cell_1 = $("#row_28_cell_1").val();
        }
        if(total_rows > 1){
            row_1_cell_2 = $("#row_1_cell_2").val();
            row_2_cell_2 = $("#row_2_cell_2").val();
            row_3_cell_2 = $("#row_3_cell_2").val();
            row_6_cell_2 = $("#row_6_cell_2").val();
            row_7_cell_2 = $("#row_7_cell_2").val();
            row_8_cell_2 = $("#row_8_cell_2").val();
            row_11_cell_2 = $("#row_11_cell_2").val();
            row_12_cell_2 = $("#row_12_cell_2").val();
            row_13_cell_2 = $("#row_13_cell_2").val();
            row_16_cell_2 = $("#row_16_cell_2").val();
            row_17_cell_2 = $("#row_17_cell_2").val();
            row_18_cell_2 = $("#row_18_cell_2").val();
            row_21_cell_2 = $("#row_21_cell_2").val();
            row_22_cell_2 = $("#row_22_cell_2").val();
            row_23_cell_2 = $("#row_23_cell_2").val();
            row_26_cell_2 = $("#row_26_cell_2").val();
            row_27_cell_2 = $("#row_27_cell_2").val();
            row_28_cell_2 = $("#row_28_cell_2").val();
        }
        if(total_rows > 2){
            row_1_cell_3 = $("#row_1_cell_3").val();
            row_2_cell_3 = $("#row_2_cell_3").val();
            row_3_cell_3 = $("#row_3_cell_3").val();
            row_6_cell_3 = $("#row_6_cell_3").val();
            row_7_cell_3 = $("#row_7_cell_3").val();
            row_8_cell_3 = $("#row_8_cell_3").val();
            row_11_cell_3 = $("#row_11_cell_3").val();
            row_12_cell_3 = $("#row_12_cell_3").val();
            row_13_cell_3 = $("#row_13_cell_3").val();
            row_16_cell_3 = $("#row_16_cell_3").val();
            row_17_cell_3 = $("#row_17_cell_3").val();
            row_18_cell_3 = $("#row_18_cell_3").val();
            row_21_cell_3 = $("#row_21_cell_3").val();
            row_22_cell_3 = $("#row_22_cell_3").val();
            row_23_cell_3 = $("#row_23_cell_3").val();
            row_26_cell_3 = $("#row_26_cell_3").val();
            row_27_cell_3 = $("#row_27_cell_3").val();
            row_28_cell_3 = $("#row_28_cell_3").val();
        }
        if(total_rows > 3){
            row_1_cell_4 = $("#row_1_cell_4").val();
            row_2_cell_4 = $("#row_2_cell_4").val();
            row_3_cell_4 = $("#row_3_cell_4").val();
            row_6_cell_4 = $("#row_6_cell_4").val();
            row_7_cell_4 = $("#row_7_cell_4").val();
            row_8_cell_4 = $("#row_8_cell_4").val();
            row_11_cell_4 = $("#row_11_cell_4").val();
            row_12_cell_4 = $("#row_12_cell_4").val();
            row_13_cell_4 = $("#row_13_cell_4").val();
            row_16_cell_4 = $("#row_16_cell_4").val();
            row_17_cell_4 = $("#row_17_cell_4").val();
            row_18_cell_4 = $("#row_18_cell_4").val();
            row_21_cell_4 = $("#row_21_cell_4").val();
            row_22_cell_4 = $("#row_22_cell_4").val();
            row_23_cell_4 = $("#row_23_cell_4").val();
            row_26_cell_4 = $("#row_26_cell_4").val();
            row_27_cell_4 = $("#row_27_cell_4").val();
            row_28_cell_4 = $("#row_28_cell_4").val();
        }
        if(total_rows > 4){
            row_1_cell_5 = $("#row_1_cell_5").val();
            row_2_cell_5 = $("#row_2_cell_5").val();
            row_3_cell_5 = $("#row_3_cell_5").val();
            row_6_cell_5 = $("#row_6_cell_5").val();
            row_7_cell_5 = $("#row_7_cell_5").val();
            row_8_cell_5 = $("#row_8_cell_5").val();
            row_11_cell_5 = $("#row_11_cell_5").val();
            row_12_cell_5 = $("#row_12_cell_5").val();
            row_13_cell_5 = $("#row_13_cell_5").val();
            row_16_cell_5 = $("#row_16_cell_5").val();
            row_17_cell_5 = $("#row_17_cell_5").val();
            row_18_cell_5 = $("#row_18_cell_5").val();
            row_21_cell_5 = $("#row_21_cell_5").val();
            row_22_cell_5 = $("#row_22_cell_5").val();
            row_23_cell_5 = $("#row_23_cell_5").val();
            row_26_cell_5 = $("#row_26_cell_5").val();
            row_27_cell_5 = $("#row_27_cell_5").val();
            row_28_cell_5 = $("#row_28_cell_5").val();
        }
        if(total_rows > 5){
            row_1_cell_6 = $("#row_1_cell_6").val();
            row_2_cell_6 = $("#row_2_cell_6").val();
            row_3_cell_6 = $("#row_3_cell_6").val();
            row_6_cell_6 = $("#row_6_cell_6").val();
            row_7_cell_6 = $("#row_7_cell_6").val();
            row_8_cell_6 = $("#row_8_cell_6").val();
            row_11_cell_6 = $("#row_11_cell_6").val();
            row_12_cell_6 = $("#row_12_cell_6").val();
            row_13_cell_6 = $("#row_13_cell_6").val();
            row_16_cell_6 = $("#row_16_cell_6").val();
            row_17_cell_6 = $("#row_17_cell_6").val();
            row_18_cell_6 = $("#row_18_cell_6").val();
            row_21_cell_6 = $("#row_21_cell_6").val();
            row_22_cell_6 = $("#row_22_cell_6").val();
            row_23_cell_6 = $("#row_23_cell_6").val();
            row_26_cell_6 = $("#row_26_cell_6").val();
            row_27_cell_6 = $("#row_27_cell_6").val();
            row_28_cell_6 = $("#row_28_cell_6").val();
        }
        if(total_rows > 6){
            row_1_cell_7 = $("#row_1_cell_7").val();  
            row_2_cell_7 = $("#row_2_cell_7").val();
            row_3_cell_7 = $("#row_3_cell_7").val();
            row_6_cell_7 = $("#row_6_cell_7").val();
            row_7_cell_7 = $("#row_7_cell_7").val();
            row_8_cell_7 = $("#row_8_cell_7").val();
            row_11_cell_7 = $("#row_11_cell_7").val();
            row_12_cell_7 = $("#row_12_cell_7").val();
            row_13_cell_7 = $("#row_13_cell_7").val();
            row_16_cell_7 = $("#row_16_cell_7").val();
            row_17_cell_7 = $("#row_17_cell_7").val();
            row_18_cell_7 = $("#row_18_cell_7").val();
            row_21_cell_7 = $("#row_21_cell_7").val();
            row_22_cell_7 = $("#row_22_cell_7").val();
            row_23_cell_7 = $("#row_23_cell_7").val();
            row_26_cell_7 = $("#row_26_cell_7").val();
            row_27_cell_7 = $("#row_27_cell_7").val();
            row_28_cell_7 = $("#row_28_cell_7").val();
        }

            var update_time_table_class1 = "total_rows="+total_rows
            +"&row_1_cell_1="+row_1_cell_1+"&row_2_cell_1="+row_2_cell_1+"&row_3_cell_1="+row_3_cell_1
            +"&row_6_cell_1="+row_6_cell_1+"&row_7_cell_1="+row_7_cell_1+"&row_8_cell_1="+row_8_cell_1
            +"&row_11_cell_1="+row_11_cell_1+"&row_12_cell_1="+row_12_cell_1+"&row_13_cell_1="+row_13_cell_1
            +"&row_16_cell_1="+row_16_cell_1+"&row_17_cell_1="+row_17_cell_1+"&row_18_cell_1="+row_18_cell_1
            +"&row_21_cell_1="+row_21_cell_1+"&row_22_cell_1="+row_22_cell_1+"&row_23_cell_1="+row_23_cell_1
            +"&row_26_cell_1="+row_26_cell_1+"&row_27_cell_1="+row_27_cell_1+"&row_28_cell_1="+row_28_cell_1

            +"&row_1_cell_2="+row_1_cell_2+"&row_2_cell_2="+row_2_cell_2+"&row_3_cell_2="+row_3_cell_2
            +"&row_6_cell_2="+row_6_cell_2+"&row_7_cell_2="+row_7_cell_2+"&row_8_cell_2="+row_8_cell_2
            +"&row_11_cell_2="+row_11_cell_2+"&row_12_cell_2="+row_12_cell_2+"&row_13_cell_2="+row_13_cell_2
            +"&row_16_cell_2="+row_16_cell_2+"&row_17_cell_2="+row_17_cell_2+"&row_18_cell_2="+row_18_cell_2
            +"&row_21_cell_2="+row_21_cell_2+"&row_22_cell_2="+row_22_cell_2+"&row_23_cell_2="+row_23_cell_2
            +"&row_26_cell_2="+row_26_cell_2+"&row_27_cell_2="+row_27_cell_2+"&row_28_cell_2="+row_28_cell_2

            +"&row_1_cell_3="+row_1_cell_3+"&row_2_cell_3="+row_2_cell_3+"&row_3_cell_3="+row_3_cell_3
            +"&row_6_cell_3="+row_6_cell_3+"&row_7_cell_3="+row_7_cell_3+"&row_8_cell_3="+row_8_cell_3
            +"&row_11_cell_3="+row_11_cell_3+"&row_12_cell_3="+row_12_cell_3+"&row_13_cell_3="+row_13_cell_3
            +"&row_16_cell_3="+row_16_cell_3+"&row_17_cell_3="+row_17_cell_3+"&row_18_cell_3="+row_18_cell_3
            +"&row_21_cell_3="+row_21_cell_3+"&row_22_cell_3="+row_22_cell_3+"&row_23_cell_3="+row_23_cell_3
            +"&row_26_cell_3="+row_26_cell_3+"&row_27_cell_3="+row_27_cell_3+"&row_28_cell_3="+row_28_cell_3

            +"&row_1_cell_4="+row_1_cell_4+"&row_2_cell_4="+row_2_cell_4+"&row_3_cell_4="+row_3_cell_4
            +"&row_6_cell_4="+row_6_cell_4+"&row_7_cell_4="+row_7_cell_4+"&row_8_cell_4="+row_8_cell_4
            +"&row_11_cell_4="+row_11_cell_4+"&row_12_cell_4="+row_12_cell_4+"&row_13_cell_4="+row_13_cell_4
            +"&row_16_cell_4="+row_16_cell_4+"&row_17_cell_4="+row_17_cell_4+"&row_18_cell_4="+row_18_cell_4
            +"&row_21_cell_4="+row_21_cell_4+"&row_22_cell_4="+row_22_cell_4+"&row_23_cell_4="+row_23_cell_4
            +"&row_26_cell_4="+row_26_cell_4+"&row_27_cell_4="+row_27_cell_4+"&row_28_cell_4="+row_28_cell_4

            +"&row_1_cell_5="+row_1_cell_5+"&row_2_cell_5="+row_2_cell_5+"&row_3_cell_5="+row_3_cell_5
            +"&row_6_cell_5="+row_6_cell_5+"&row_7_cell_5="+row_7_cell_5+"&row_8_cell_5="+row_8_cell_5
            +"&row_11_cell_5="+row_11_cell_5+"&row_12_cell_5="+row_12_cell_5+"&row_13_cell_5="+row_13_cell_5
            +"&row_16_cell_5="+row_16_cell_5+"&row_17_cell_5="+row_17_cell_5+"&row_18_cell_5="+row_18_cell_5
            +"&row_21_cell_5="+row_21_cell_5+"&row_22_cell_5="+row_22_cell_5+"&row_23_cell_5="+row_23_cell_5
            +"&row_26_cell_5="+row_26_cell_5+"&row_27_cell_5="+row_27_cell_5+"&row_28_cell_5="+row_28_cell_5

            +"&row_1_cell_6="+row_1_cell_6+"&row_2_cell_6="+row_2_cell_6+"&row_3_cell_6="+row_3_cell_6
            +"&row_6_cell_6="+row_6_cell_6+"&row_7_cell_6="+row_7_cell_6+"&row_8_cell_6="+row_8_cell_6
            +"&row_11_cell_6="+row_11_cell_6+"&row_12_cell_6="+row_12_cell_6+"&row_13_cell_6="+row_13_cell_6
            +"&row_16_cell_6="+row_16_cell_6+"&row_17_cell_6="+row_17_cell_6+"&row_18_cell_6="+row_18_cell_6
            +"&row_21_cell_6="+row_21_cell_6+"&row_22_cell_6="+row_22_cell_6+"&row_23_cell_6="+row_23_cell_6
            +"&row_26_cell_6="+row_26_cell_6+"&row_27_cell_6="+row_27_cell_6+"&row_28_cell_6="+row_28_cell_6

            +"&row_1_cell_7="+row_1_cell_7+"&row_2_cell_7="+row_2_cell_7+"&row_3_cell_7="+row_3_cell_7
            +"&row_6_cell_7="+row_6_cell_7+"&row_7_cell_7="+row_7_cell_7+"&row_8_cell_7="+row_8_cell_7
            +"&row_11_cell_7="+row_11_cell_7+"&row_12_cell_7="+row_12_cell_7+"&row_13_cell_7="+row_13_cell_7
            +"&row_16_cell_7="+row_16_cell_7+"&row_17_cell_7="+row_17_cell_7+"&row_18_cell_7="+row_18_cell_7
            +"&row_21_cell_7="+row_21_cell_7+"&row_22_cell_7="+row_22_cell_7+"&row_23_cell_7="+row_23_cell_7
            +"&row_26_cell_7="+row_26_cell_7+"&row_27_cell_7="+row_27_cell_7+"&row_28_cell_7="+row_28_cell_7;

            $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data: update_time_table_class1,
            success:function(data){ alert(data); Load_TimeTable_Class1_Function(); }
            });
    });    
    
    Load_TimeTable_Class1_Function();
    function Load_TimeTable_Class1_Function()
    {
        var dataString = "Load_TimeTable_Class1";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ $("#load_time_table_class1_table_id").html(data); }
        });
    }
    
    function Load_TimeTable_Class1_PopUpModel_Function()
    {
        var dataString = "Load_TimeTable_Class1_PopUpModel";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ 
                $("#load_time_table_class1_popup_model_id").html(data); 
                $("#show_model_class1_time_table").modal('show');
            }
        });
    }
    
    // ================================================================================
    // ==================================== Class2 ====================================
    // ================================================================================
    
    Load_TimeTable_Class2_Function();
    function Load_TimeTable_Class2_Function()
    {
        var dataString = "Load_TimeTable_Class2";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ $("#load_time_table_class2_table_id").html(data); }
        });
    }
    
    function Load_TimeTable_Class2_PopUpModel_Function()
    {
        var dataString = "Load_TimeTable_Class2_PopUpModel";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ 
                $("#load_time_table_class2_popup_model_id").html(data); 
                $("#show_model_class2_time_table").modal('show');
            }
        });
    }
    
    $(document).on("click", "#YesUpdate_class2_TimeTable_ModelBtn", function(){
        var rowCount = $('#class2_tblSample td').length;
        var total_rows = (rowCount-24);
        if(total_rows > 1) { total_rows = total_rows-17; }
        if(total_rows > 2) { total_rows = total_rows-17; }
        if(total_rows > 3) { total_rows = total_rows-17; }
        if(total_rows > 4) { total_rows = total_rows-17; }
        if(total_rows > 5) { total_rows = total_rows-17; }
        if(total_rows > 6) { total_rows = total_rows-17; }
        if(total_rows > 7) { total_rows = total_rows-17; }
        
        var row_1_cell_1 = '', row_2_cell_1 = '', row_3_cell_1 = '';
        var row_1_cell_2 = '', row_2_cell_2 = '', row_3_cell_2 = '';
        var row_1_cell_3 = '', row_2_cell_3 = '', row_3_cell_3 = '';
        var row_1_cell_4 = '', row_2_cell_4 = '', row_3_cell_4 = '';
        var row_1_cell_5 = '', row_2_cell_5 = '', row_3_cell_5 = '';
        var row_1_cell_6 = '', row_2_cell_6 = '', row_3_cell_6 = '';
        var row_1_cell_7 = '', row_2_cell_7 = '', row_3_cell_7 = '';
        
        var row_6_cell_1 = '', row_7_cell_1 = '', row_8_cell_1 = '';
        var row_6_cell_2 = '', row_7_cell_2 = '', row_8_cell_2 = '';
        var row_6_cell_3 = '', row_7_cell_3 = '', row_8_cell_3 = '';
        var row_6_cell_4 = '', row_7_cell_4 = '', row_8_cell_4 = '';
        var row_6_cell_5 = '', row_7_cell_5 = '', row_8_cell_5 = '';
        var row_6_cell_6 = '', row_7_cell_6 = '', row_8_cell_6 = '';
        var row_6_cell_7 = '', row_7_cell_7 = '', row_8_cell_7 = '';
        
        var row_11_cell_1 = '', row_12_cell_1 = '', row_13_cell_1 = '';
        var row_11_cell_2 = '', row_12_cell_2 = '', row_13_cell_2 = '';
        var row_11_cell_3 = '', row_12_cell_3 = '', row_13_cell_3 = '';
        var row_11_cell_4 = '', row_12_cell_4 = '', row_13_cell_4 = '';
        var row_11_cell_5 = '', row_12_cell_5 = '', row_13_cell_5 = '';
        var row_11_cell_6 = '', row_12_cell_6 = '', row_13_cell_6 = '';
        var row_11_cell_7 = '', row_12_cell_7 = '', row_13_cell_7 = '';
        
        var row_16_cell_1 = '', row_17_cell_1 = '', row_18_cell_1 = '';
        var row_16_cell_2 = '', row_17_cell_2 = '', row_18_cell_2 = '';
        var row_16_cell_3 = '', row_17_cell_3 = '', row_18_cell_3 = '';
        var row_16_cell_4 = '', row_17_cell_4 = '', row_18_cell_4 = '';
        var row_16_cell_5 = '', row_17_cell_5 = '', row_18_cell_5 = '';
        var row_16_cell_6 = '', row_17_cell_6 = '', row_18_cell_6 = '';
        var row_16_cell_7 = '', row_17_cell_7 = '', row_18_cell_7 = '';
        
        var row_21_cell_1 = '', row_22_cell_1 = '', row_23_cell_1 = '';
        var row_21_cell_2 = '', row_22_cell_2 = '', row_23_cell_2 = '';
        var row_21_cell_3 = '', row_22_cell_3 = '', row_23_cell_3 = '';
        var row_21_cell_4 = '', row_22_cell_4 = '', row_23_cell_4 = '';
        var row_21_cell_5 = '', row_22_cell_5 = '', row_23_cell_5 = '';
        var row_21_cell_6 = '', row_22_cell_6 = '', row_23_cell_6 = '';
        var row_21_cell_7 = '', row_22_cell_7 = '', row_23_cell_7 = '';
        
        var row_26_cell_1 = '', row_27_cell_1 = '', row_28_cell_1 = '';
        var row_26_cell_2 = '', row_27_cell_2 = '', row_28_cell_2 = '';
        var row_26_cell_3 = '', row_27_cell_3 = '', row_28_cell_3 = '';
        var row_26_cell_4 = '', row_27_cell_4 = '', row_28_cell_4 = '';
        var row_26_cell_5 = '', row_27_cell_5 = '', row_28_cell_5 = '';
        var row_26_cell_6 = '', row_27_cell_6 = '', row_28_cell_6 = '';
        var row_26_cell_7 = '', row_27_cell_7 = '', row_28_cell_7 = '';
        
        if(total_rows > 0){
            row_1_cell_1 = $("#class2_row_1_cell_1").val();  
            row_2_cell_1 = $("#class2_row_2_cell_1").val();
            row_3_cell_1 = $("#class2_row_3_cell_1").val();
            row_6_cell_1 = $("#class2_row_6_cell_1").val();
            row_7_cell_1 = $("#class2_row_7_cell_1").val();
            row_8_cell_1 = $("#class2_row_8_cell_1").val();
            row_11_cell_1 = $("#class2_row_11_cell_1").val();
            row_12_cell_1 = $("#class2_row_12_cell_1").val();
            row_13_cell_1 = $("#class2_row_13_cell_1").val();
            row_16_cell_1 = $("#class2_row_16_cell_1").val();
            row_17_cell_1 = $("#class2_row_17_cell_1").val();
            row_18_cell_1 = $("#class2_row_18_cell_1").val();
            row_21_cell_1 = $("#class2_row_21_cell_1").val();
            row_22_cell_1 = $("#class2_row_22_cell_1").val();
            row_23_cell_1 = $("#class2_row_23_cell_1").val();
            row_26_cell_1 = $("#class2_row_26_cell_1").val();
            row_27_cell_1 = $("#class2_row_27_cell_1").val();
            row_28_cell_1 = $("#class2_row_28_cell_1").val();
        }
        if(total_rows > 1){
            row_1_cell_2 = $("#class2_row_1_cell_2").val();
            row_2_cell_2 = $("#class2_row_2_cell_2").val();
            row_3_cell_2 = $("#class2_row_3_cell_2").val();
            row_6_cell_2 = $("#class2_row_6_cell_2").val();
            row_7_cell_2 = $("#class2_row_7_cell_2").val();
            row_8_cell_2 = $("#class2_row_8_cell_2").val();
            row_11_cell_2 = $("#class2_row_11_cell_2").val();
            row_12_cell_2 = $("#class2_row_12_cell_2").val();
            row_13_cell_2 = $("#class2_row_13_cell_2").val();
            row_16_cell_2 = $("#class2_row_16_cell_2").val();
            row_17_cell_2 = $("#class2_row_17_cell_2").val();
            row_18_cell_2 = $("#class2_row_18_cell_2").val();
            row_21_cell_2 = $("#class2_row_21_cell_2").val();
            row_22_cell_2 = $("#class2_row_22_cell_2").val();
            row_23_cell_2 = $("#class2_row_23_cell_2").val();
            row_26_cell_2 = $("#class2_row_26_cell_2").val();
            row_27_cell_2 = $("#class2_row_27_cell_2").val();
            row_28_cell_2 = $("#class2_row_28_cell_2").val();
        }
        if(total_rows > 2){
            row_1_cell_3 = $("#class2_row_1_cell_3").val();
            row_2_cell_3 = $("#class2_row_2_cell_3").val();
            row_3_cell_3 = $("#class2_row_3_cell_3").val();
            row_6_cell_3 = $("#class2_row_6_cell_3").val();
            row_7_cell_3 = $("#class2_row_7_cell_3").val();
            row_8_cell_3 = $("#class2_row_8_cell_3").val();
            row_11_cell_3 = $("#class2_row_11_cell_3").val();
            row_12_cell_3 = $("#class2_row_12_cell_3").val();
            row_13_cell_3 = $("#class2_row_13_cell_3").val();
            row_16_cell_3 = $("#class2_row_16_cell_3").val();
            row_17_cell_3 = $("#class2_row_17_cell_3").val();
            row_18_cell_3 = $("#class2_row_18_cell_3").val();
            row_21_cell_3 = $("#class2_row_21_cell_3").val();
            row_22_cell_3 = $("#class2_row_22_cell_3").val();
            row_23_cell_3 = $("#class2_row_23_cell_3").val();
            row_26_cell_3 = $("#class2_row_26_cell_3").val();
            row_27_cell_3 = $("#class2_row_27_cell_3").val();
            row_28_cell_3 = $("#class2_row_28_cell_3").val();
        }
        if(total_rows > 3){
            row_1_cell_4 = $("#class2_row_1_cell_4").val();
            row_2_cell_4 = $("#class2_row_2_cell_4").val();
            row_3_cell_4 = $("#class2_row_3_cell_4").val();
            row_6_cell_4 = $("#class2_row_6_cell_4").val();
            row_7_cell_4 = $("#class2_row_7_cell_4").val();
            row_8_cell_4 = $("#class2_row_8_cell_4").val();
            row_11_cell_4 = $("#class2_row_11_cell_4").val();
            row_12_cell_4 = $("#class2_row_12_cell_4").val();
            row_13_cell_4 = $("#class2_row_13_cell_4").val();
            row_16_cell_4 = $("#class2_row_16_cell_4").val();
            row_17_cell_4 = $("#class2_row_17_cell_4").val();
            row_18_cell_4 = $("#class2_row_18_cell_4").val();
            row_21_cell_4 = $("#class2_row_21_cell_4").val();
            row_22_cell_4 = $("#class2_row_22_cell_4").val();
            row_23_cell_4 = $("#class2_row_23_cell_4").val();
            row_26_cell_4 = $("#class2_row_26_cell_4").val();
            row_27_cell_4 = $("#class2_row_27_cell_4").val();
            row_28_cell_4 = $("#class2_row_28_cell_4").val();
        }
        if(total_rows > 4){
            row_1_cell_5 = $("#class2_row_1_cell_5").val();
            row_2_cell_5 = $("#class2_row_2_cell_5").val();
            row_3_cell_5 = $("#class2_row_3_cell_5").val();
            row_6_cell_5 = $("#class2_row_6_cell_5").val();
            row_7_cell_5 = $("#class2_row_7_cell_5").val();
            row_8_cell_5 = $("#class2_row_8_cell_5").val();
            row_11_cell_5 = $("#class2_row_11_cell_5").val();
            row_12_cell_5 = $("#class2_row_12_cell_5").val();
            row_13_cell_5 = $("#class2_row_13_cell_5").val();
            row_16_cell_5 = $("#class2_row_16_cell_5").val();
            row_17_cell_5 = $("#class2_row_17_cell_5").val();
            row_18_cell_5 = $("#class2_row_18_cell_5").val();
            row_21_cell_5 = $("#class2_row_21_cell_5").val();
            row_22_cell_5 = $("#class2_row_22_cell_5").val();
            row_23_cell_5 = $("#class2_row_23_cell_5").val();
            row_26_cell_5 = $("#class2_row_26_cell_5").val();
            row_27_cell_5 = $("#class2_row_27_cell_5").val();
            row_28_cell_5 = $("#class2_row_28_cell_5").val();
        }
        if(total_rows > 5){
            row_1_cell_6 = $("#class2_row_1_cell_6").val();
            row_2_cell_6 = $("#class2_row_2_cell_6").val();
            row_3_cell_6 = $("#class2_row_3_cell_6").val();
            row_6_cell_6 = $("#class2_row_6_cell_6").val();
            row_7_cell_6 = $("#class2_row_7_cell_6").val();
            row_8_cell_6 = $("#class2_row_8_cell_6").val();
            row_11_cell_6 = $("#class2_row_11_cell_6").val();
            row_12_cell_6 = $("#class2_row_12_cell_6").val();
            row_13_cell_6 = $("#class2_row_13_cell_6").val();
            row_16_cell_6 = $("#class2_row_16_cell_6").val();
            row_17_cell_6 = $("#class2_row_17_cell_6").val();
            row_18_cell_6 = $("#class2_row_18_cell_6").val();
            row_21_cell_6 = $("#class2_row_21_cell_6").val();
            row_22_cell_6 = $("#class2_row_22_cell_6").val();
            row_23_cell_6 = $("#class2_row_23_cell_6").val();
            row_26_cell_6 = $("#class2_row_26_cell_6").val();
            row_27_cell_6 = $("#class2_row_27_cell_6").val();
            row_28_cell_6 = $("#class2_row_28_cell_6").val();
        }
        if(total_rows > 6){
            row_1_cell_7 = $("#class2_row_1_cell_7").val();  
            row_2_cell_7 = $("#class2_row_2_cell_7").val();
            row_3_cell_7 = $("#class2_row_3_cell_7").val();
            row_6_cell_7 = $("#class2_row_6_cell_7").val();
            row_7_cell_7 = $("#class2_row_7_cell_7").val();
            row_8_cell_7 = $("#class2_row_8_cell_7").val();
            row_11_cell_7 = $("#class2_row_11_cell_7").val();
            row_12_cell_7 = $("#class2_row_12_cell_7").val();
            row_13_cell_7 = $("#class2_row_13_cell_7").val();
            row_16_cell_7 = $("#class2_row_16_cell_7").val();
            row_17_cell_7 = $("#class2_row_17_cell_7").val();
            row_18_cell_7 = $("#class2_row_18_cell_7").val();
            row_21_cell_7 = $("#class2_row_21_cell_7").val();
            row_22_cell_7 = $("#class2_row_22_cell_7").val();
            row_23_cell_7 = $("#class2_row_23_cell_7").val();
            row_26_cell_7 = $("#class2_row_26_cell_7").val();
            row_27_cell_7 = $("#class2_row_27_cell_7").val();
            row_28_cell_7 = $("#class2_row_28_cell_7").val();
        }

            var update_time_table_class2 = "class2_total_rows="+total_rows
            +"&class2_row_1_cell_1="+row_1_cell_1+"&class2_row_2_cell_1="+row_2_cell_1+"&class2_row_3_cell_1="+row_3_cell_1
            +"&class2_row_6_cell_1="+row_6_cell_1+"&class2_row_7_cell_1="+row_7_cell_1+"&class2_row_8_cell_1="+row_8_cell_1
            +"&class2_row_11_cell_1="+row_11_cell_1+"&class2_row_12_cell_1="+row_12_cell_1+"&class2_row_13_cell_1="+row_13_cell_1
            +"&class2_row_16_cell_1="+row_16_cell_1+"&class2_row_17_cell_1="+row_17_cell_1+"&class2_row_18_cell_1="+row_18_cell_1
            +"&class2_row_21_cell_1="+row_21_cell_1+"&class2_row_22_cell_1="+row_22_cell_1+"&class2_row_23_cell_1="+row_23_cell_1
            +"&class2_row_26_cell_1="+row_26_cell_1+"&class2_row_27_cell_1="+row_27_cell_1+"&class2_row_28_cell_1="+row_28_cell_1

            +"&class2_row_1_cell_2="+row_1_cell_2+"&class2_row_2_cell_2="+row_2_cell_2+"&class2_row_3_cell_2="+row_3_cell_2
            +"&class2_row_6_cell_2="+row_6_cell_2+"&class2_row_7_cell_2="+row_7_cell_2+"&class2_row_8_cell_2="+row_8_cell_2
            +"&class2_row_11_cell_2="+row_11_cell_2+"&class2_row_12_cell_2="+row_12_cell_2+"&class2_row_13_cell_2="+row_13_cell_2
            +"&class2_row_16_cell_2="+row_16_cell_2+"&class2_row_17_cell_2="+row_17_cell_2+"&class2_row_18_cell_2="+row_18_cell_2
            +"&class2_row_21_cell_2="+row_21_cell_2+"&class2_row_22_cell_2="+row_22_cell_2+"&class2_row_23_cell_2="+row_23_cell_2
            +"&class2_row_26_cell_2="+row_26_cell_2+"&class2_row_27_cell_2="+row_27_cell_2+"&class2_row_28_cell_2="+row_28_cell_2

            +"&class2_row_1_cell_3="+row_1_cell_3+"&class2_row_2_cell_3="+row_2_cell_3+"&class2_row_3_cell_3="+row_3_cell_3
            +"&class2_row_6_cell_3="+row_6_cell_3+"&class2_row_7_cell_3="+row_7_cell_3+"&class2_row_8_cell_3="+row_8_cell_3
            +"&class2_row_11_cell_3="+row_11_cell_3+"&class2_row_12_cell_3="+row_12_cell_3+"&class2_row_13_cell_3="+row_13_cell_3
            +"&class2_row_16_cell_3="+row_16_cell_3+"&class2_row_17_cell_3="+row_17_cell_3+"&class2_row_18_cell_3="+row_18_cell_3
            +"&class2_row_21_cell_3="+row_21_cell_3+"&class2_row_22_cell_3="+row_22_cell_3+"&class2_row_23_cell_3="+row_23_cell_3
            +"&class2_row_26_cell_3="+row_26_cell_3+"&class2_row_27_cell_3="+row_27_cell_3+"&class2_row_28_cell_3="+row_28_cell_3

            +"&class2_row_1_cell_4="+row_1_cell_4+"&class2_row_2_cell_4="+row_2_cell_4+"&class2_row_3_cell_4="+row_3_cell_4
            +"&class2_row_6_cell_4="+row_6_cell_4+"&class2_row_7_cell_4="+row_7_cell_4+"&class2_row_8_cell_4="+row_8_cell_4
            +"&class2_row_11_cell_4="+row_11_cell_4+"&class2_row_12_cell_4="+row_12_cell_4+"&class2_row_13_cell_4="+row_13_cell_4
            +"&class2_row_16_cell_4="+row_16_cell_4+"&class2_row_17_cell_4="+row_17_cell_4+"&class2_row_18_cell_4="+row_18_cell_4
            +"&class2_row_21_cell_4="+row_21_cell_4+"&class2_row_22_cell_4="+row_22_cell_4+"&class2_row_23_cell_4="+row_23_cell_4
            +"&class2_row_26_cell_4="+row_26_cell_4+"&class2_row_27_cell_4="+row_27_cell_4+"&class2_row_28_cell_4="+row_28_cell_4

            +"&class2_row_1_cell_5="+row_1_cell_5+"&class2_row_2_cell_5="+row_2_cell_5+"&class2_row_3_cell_5="+row_3_cell_5
            +"&class2_row_6_cell_5="+row_6_cell_5+"&class2_row_7_cell_5="+row_7_cell_5+"&class2_row_8_cell_5="+row_8_cell_5
            +"&class2_row_11_cell_5="+row_11_cell_5+"&class2_row_12_cell_5="+row_12_cell_5+"&class2_row_13_cell_5="+row_13_cell_5
            +"&class2_row_16_cell_5="+row_16_cell_5+"&class2_row_17_cell_5="+row_17_cell_5+"&class2_row_18_cell_5="+row_18_cell_5
            +"&class2_row_21_cell_5="+row_21_cell_5+"&class2_row_22_cell_5="+row_22_cell_5+"&class2_row_23_cell_5="+row_23_cell_5
            +"&class2_row_26_cell_5="+row_26_cell_5+"&class2_row_27_cell_5="+row_27_cell_5+"&class2_row_28_cell_5="+row_28_cell_5

            +"&class2_row_1_cell_6="+row_1_cell_6+"&class2_row_2_cell_6="+row_2_cell_6+"&class2_row_3_cell_6="+row_3_cell_6
            +"&class2_row_6_cell_6="+row_6_cell_6+"&class2_row_7_cell_6="+row_7_cell_6+"&class2_row_8_cell_6="+row_8_cell_6
            +"&class2_row_11_cell_6="+row_11_cell_6+"&class2_row_12_cell_6="+row_12_cell_6+"&class2_row_13_cell_6="+row_13_cell_6
            +"&class2_row_16_cell_6="+row_16_cell_6+"&class2_row_17_cell_6="+row_17_cell_6+"&class2_row_18_cell_6="+row_18_cell_6
            +"&class2_row_21_cell_6="+row_21_cell_6+"&class2_row_22_cell_6="+row_22_cell_6+"&class2_row_23_cell_6="+row_23_cell_6
            +"&class2_row_26_cell_6="+row_26_cell_6+"&class2_row_27_cell_6="+row_27_cell_6+"&class2_row_28_cell_6="+row_28_cell_6

            +"&class2_row_1_cell_7="+row_1_cell_7+"&class2_row_2_cell_7="+row_2_cell_7+"&class2_row_3_cell_7="+row_3_cell_7
            +"&class2_row_6_cell_7="+row_6_cell_7+"&class2_row_7_cell_7="+row_7_cell_7+"&class2_row_8_cell_7="+row_8_cell_7
            +"&class2_row_11_cell_7="+row_11_cell_7+"&class2_row_12_cell_7="+row_12_cell_7+"&class2_row_13_cell_7="+row_13_cell_7
            +"&class2_row_16_cell_7="+row_16_cell_7+"&class2_row_17_cell_7="+row_17_cell_7+"&class2_row_18_cell_7="+row_18_cell_7
            +"&class2_row_21_cell_7="+row_21_cell_7+"&class2_row_22_cell_7="+row_22_cell_7+"&class2_row_23_cell_7="+row_23_cell_7
            +"&class2_row_26_cell_7="+row_26_cell_7+"&class2_row_27_cell_7="+row_27_cell_7+"&class2_row_28_cell_7="+row_28_cell_7;

            $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data: update_time_table_class2,
            success:function(data){ alert(data); Load_TimeTable_Class2_Function(); }
            });
    });    
    
    // ================================================================================
    // ==================================== Class3 ====================================
    // ================================================================================
    
    Load_TimeTable_Class3_Function();
    function Load_TimeTable_Class3_Function()
    {
        var dataString = "Load_TimeTable_Class3";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ $("#load_time_table_class3_table_id").html(data); }
        });
    }
    
    function Load_TimeTable_Class3_PopUpModel_Function()
    {
        var dataString = "Load_TimeTable_Class3_PopUpModel";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ 
                $("#load_time_table_class3_popup_model_id").html(data); 
                $("#show_model_class3_time_table").modal('show');
            }
        });
    }
    
    $(document).on("click", "#YesUpdate_class3_TimeTable_ModelBtn", function(){
        var rowCount = $('#class3_tblSample td').length;
        var total_rows = (rowCount-24);
        if(total_rows > 1) { total_rows = total_rows-17; }
        if(total_rows > 2) { total_rows = total_rows-17; }
        if(total_rows > 3) { total_rows = total_rows-17; }
        if(total_rows > 4) { total_rows = total_rows-17; }
        if(total_rows > 5) { total_rows = total_rows-17; }
        if(total_rows > 6) { total_rows = total_rows-17; }
        if(total_rows > 7) { total_rows = total_rows-17; }
        
        var row_1_cell_1 = '', row_2_cell_1 = '', row_3_cell_1 = '';
        var row_1_cell_2 = '', row_2_cell_2 = '', row_3_cell_2 = '';
        var row_1_cell_3 = '', row_2_cell_3 = '', row_3_cell_3 = '';
        var row_1_cell_4 = '', row_2_cell_4 = '', row_3_cell_4 = '';
        var row_1_cell_5 = '', row_2_cell_5 = '', row_3_cell_5 = '';
        var row_1_cell_6 = '', row_2_cell_6 = '', row_3_cell_6 = '';
        var row_1_cell_7 = '', row_2_cell_7 = '', row_3_cell_7 = '';
        
        var row_6_cell_1 = '', row_7_cell_1 = '', row_8_cell_1 = '';
        var row_6_cell_2 = '', row_7_cell_2 = '', row_8_cell_2 = '';
        var row_6_cell_3 = '', row_7_cell_3 = '', row_8_cell_3 = '';
        var row_6_cell_4 = '', row_7_cell_4 = '', row_8_cell_4 = '';
        var row_6_cell_5 = '', row_7_cell_5 = '', row_8_cell_5 = '';
        var row_6_cell_6 = '', row_7_cell_6 = '', row_8_cell_6 = '';
        var row_6_cell_7 = '', row_7_cell_7 = '', row_8_cell_7 = '';
        
        var row_11_cell_1 = '', row_12_cell_1 = '', row_13_cell_1 = '';
        var row_11_cell_2 = '', row_12_cell_2 = '', row_13_cell_2 = '';
        var row_11_cell_3 = '', row_12_cell_3 = '', row_13_cell_3 = '';
        var row_11_cell_4 = '', row_12_cell_4 = '', row_13_cell_4 = '';
        var row_11_cell_5 = '', row_12_cell_5 = '', row_13_cell_5 = '';
        var row_11_cell_6 = '', row_12_cell_6 = '', row_13_cell_6 = '';
        var row_11_cell_7 = '', row_12_cell_7 = '', row_13_cell_7 = '';
        
        var row_16_cell_1 = '', row_17_cell_1 = '', row_18_cell_1 = '';
        var row_16_cell_2 = '', row_17_cell_2 = '', row_18_cell_2 = '';
        var row_16_cell_3 = '', row_17_cell_3 = '', row_18_cell_3 = '';
        var row_16_cell_4 = '', row_17_cell_4 = '', row_18_cell_4 = '';
        var row_16_cell_5 = '', row_17_cell_5 = '', row_18_cell_5 = '';
        var row_16_cell_6 = '', row_17_cell_6 = '', row_18_cell_6 = '';
        var row_16_cell_7 = '', row_17_cell_7 = '', row_18_cell_7 = '';
        
        var row_21_cell_1 = '', row_22_cell_1 = '', row_23_cell_1 = '';
        var row_21_cell_2 = '', row_22_cell_2 = '', row_23_cell_2 = '';
        var row_21_cell_3 = '', row_22_cell_3 = '', row_23_cell_3 = '';
        var row_21_cell_4 = '', row_22_cell_4 = '', row_23_cell_4 = '';
        var row_21_cell_5 = '', row_22_cell_5 = '', row_23_cell_5 = '';
        var row_21_cell_6 = '', row_22_cell_6 = '', row_23_cell_6 = '';
        var row_21_cell_7 = '', row_22_cell_7 = '', row_23_cell_7 = '';
        
        var row_26_cell_1 = '', row_27_cell_1 = '', row_28_cell_1 = '';
        var row_26_cell_2 = '', row_27_cell_2 = '', row_28_cell_2 = '';
        var row_26_cell_3 = '', row_27_cell_3 = '', row_28_cell_3 = '';
        var row_26_cell_4 = '', row_27_cell_4 = '', row_28_cell_4 = '';
        var row_26_cell_5 = '', row_27_cell_5 = '', row_28_cell_5 = '';
        var row_26_cell_6 = '', row_27_cell_6 = '', row_28_cell_6 = '';
        var row_26_cell_7 = '', row_27_cell_7 = '', row_28_cell_7 = '';
        
        if(total_rows > 0){
            row_1_cell_1 = $("#class3_row_1_cell_1").val();  
            row_2_cell_1 = $("#class3_row_2_cell_1").val();
            row_3_cell_1 = $("#class3_row_3_cell_1").val();
            row_6_cell_1 = $("#class3_row_6_cell_1").val();
            row_7_cell_1 = $("#class3_row_7_cell_1").val();
            row_8_cell_1 = $("#class3_row_8_cell_1").val();
            row_11_cell_1 = $("#class3_row_11_cell_1").val();
            row_12_cell_1 = $("#class3_row_12_cell_1").val();
            row_13_cell_1 = $("#class3_row_13_cell_1").val();
            row_16_cell_1 = $("#class3_row_16_cell_1").val();
            row_17_cell_1 = $("#class3_row_17_cell_1").val();
            row_18_cell_1 = $("#class3_row_18_cell_1").val();
            row_21_cell_1 = $("#class3_row_21_cell_1").val();
            row_22_cell_1 = $("#class3_row_22_cell_1").val();
            row_23_cell_1 = $("#class3_row_23_cell_1").val();
            row_26_cell_1 = $("#class3_row_26_cell_1").val();
            row_27_cell_1 = $("#class3_row_27_cell_1").val();
            row_28_cell_1 = $("#class3_row_28_cell_1").val();
        }
        if(total_rows > 1){
            row_1_cell_2 = $("#class3_row_1_cell_2").val();
            row_2_cell_2 = $("#class3_row_2_cell_2").val();
            row_3_cell_2 = $("#class3_row_3_cell_2").val();
            row_6_cell_2 = $("#class3_row_6_cell_2").val();
            row_7_cell_2 = $("#class3_row_7_cell_2").val();
            row_8_cell_2 = $("#class3_row_8_cell_2").val();
            row_11_cell_2 = $("#class3_row_11_cell_2").val();
            row_12_cell_2 = $("#class3_row_12_cell_2").val();
            row_13_cell_2 = $("#class3_row_13_cell_2").val();
            row_16_cell_2 = $("#class3_row_16_cell_2").val();
            row_17_cell_2 = $("#class3_row_17_cell_2").val();
            row_18_cell_2 = $("#class3_row_18_cell_2").val();
            row_21_cell_2 = $("#class3_row_21_cell_2").val();
            row_22_cell_2 = $("#class3_row_22_cell_2").val();
            row_23_cell_2 = $("#class3_row_23_cell_2").val();
            row_26_cell_2 = $("#class3_row_26_cell_2").val();
            row_27_cell_2 = $("#class3_row_27_cell_2").val();
            row_28_cell_2 = $("#class3_row_28_cell_2").val();
        }
        if(total_rows > 2){
            row_1_cell_3 = $("#class3_row_1_cell_3").val();
            row_2_cell_3 = $("#class3_row_2_cell_3").val();
            row_3_cell_3 = $("#class3_row_3_cell_3").val();
            row_6_cell_3 = $("#class3_row_6_cell_3").val();
            row_7_cell_3 = $("#class3_row_7_cell_3").val();
            row_8_cell_3 = $("#class3_row_8_cell_3").val();
            row_11_cell_3 = $("#class3_row_11_cell_3").val();
            row_12_cell_3 = $("#class3_row_12_cell_3").val();
            row_13_cell_3 = $("#class3_row_13_cell_3").val();
            row_16_cell_3 = $("#class3_row_16_cell_3").val();
            row_17_cell_3 = $("#class3_row_17_cell_3").val();
            row_18_cell_3 = $("#class3_row_18_cell_3").val();
            row_21_cell_3 = $("#class3_row_21_cell_3").val();
            row_22_cell_3 = $("#class3_row_22_cell_3").val();
            row_23_cell_3 = $("#class3_row_23_cell_3").val();
            row_26_cell_3 = $("#class3_row_26_cell_3").val();
            row_27_cell_3 = $("#class3_row_27_cell_3").val();
            row_28_cell_3 = $("#class3_row_28_cell_3").val();
        }
        if(total_rows > 3){
            row_1_cell_4 = $("#class3_row_1_cell_4").val();
            row_2_cell_4 = $("#class3_row_2_cell_4").val();
            row_3_cell_4 = $("#class3_row_3_cell_4").val();
            row_6_cell_4 = $("#class3_row_6_cell_4").val();
            row_7_cell_4 = $("#class3_row_7_cell_4").val();
            row_8_cell_4 = $("#class3_row_8_cell_4").val();
            row_11_cell_4 = $("#class3_row_11_cell_4").val();
            row_12_cell_4 = $("#class3_row_12_cell_4").val();
            row_13_cell_4 = $("#class3_row_13_cell_4").val();
            row_16_cell_4 = $("#class3_row_16_cell_4").val();
            row_17_cell_4 = $("#class3_row_17_cell_4").val();
            row_18_cell_4 = $("#class3_row_18_cell_4").val();
            row_21_cell_4 = $("#class3_row_21_cell_4").val();
            row_22_cell_4 = $("#class3_row_22_cell_4").val();
            row_23_cell_4 = $("#class3_row_23_cell_4").val();
            row_26_cell_4 = $("#class3_row_26_cell_4").val();
            row_27_cell_4 = $("#class3_row_27_cell_4").val();
            row_28_cell_4 = $("#class3_row_28_cell_4").val();
        }
        if(total_rows > 4){
            row_1_cell_5 = $("#class3_row_1_cell_5").val();
            row_2_cell_5 = $("#class3_row_2_cell_5").val();
            row_3_cell_5 = $("#class3_row_3_cell_5").val();
            row_6_cell_5 = $("#class3_row_6_cell_5").val();
            row_7_cell_5 = $("#class3_row_7_cell_5").val();
            row_8_cell_5 = $("#class3_row_8_cell_5").val();
            row_11_cell_5 = $("#class3_row_11_cell_5").val();
            row_12_cell_5 = $("#class3_row_12_cell_5").val();
            row_13_cell_5 = $("#class3_row_13_cell_5").val();
            row_16_cell_5 = $("#class3_row_16_cell_5").val();
            row_17_cell_5 = $("#class3_row_17_cell_5").val();
            row_18_cell_5 = $("#class3_row_18_cell_5").val();
            row_21_cell_5 = $("#class3_row_21_cell_5").val();
            row_22_cell_5 = $("#class3_row_22_cell_5").val();
            row_23_cell_5 = $("#class3_row_23_cell_5").val();
            row_26_cell_5 = $("#class3_row_26_cell_5").val();
            row_27_cell_5 = $("#class3_row_27_cell_5").val();
            row_28_cell_5 = $("#class3_row_28_cell_5").val();
        }
        if(total_rows > 5){
            row_1_cell_6 = $("#class3_row_1_cell_6").val();
            row_2_cell_6 = $("#class3_row_2_cell_6").val();
            row_3_cell_6 = $("#class3_row_3_cell_6").val();
            row_6_cell_6 = $("#class3_row_6_cell_6").val();
            row_7_cell_6 = $("#class3_row_7_cell_6").val();
            row_8_cell_6 = $("#class3_row_8_cell_6").val();
            row_11_cell_6 = $("#class3_row_11_cell_6").val();
            row_12_cell_6 = $("#class3_row_12_cell_6").val();
            row_13_cell_6 = $("#class3_row_13_cell_6").val();
            row_16_cell_6 = $("#class3_row_16_cell_6").val();
            row_17_cell_6 = $("#class3_row_17_cell_6").val();
            row_18_cell_6 = $("#class3_row_18_cell_6").val();
            row_21_cell_6 = $("#class3_row_21_cell_6").val();
            row_22_cell_6 = $("#class3_row_22_cell_6").val();
            row_23_cell_6 = $("#class3_row_23_cell_6").val();
            row_26_cell_6 = $("#class3_row_26_cell_6").val();
            row_27_cell_6 = $("#class3_row_27_cell_6").val();
            row_28_cell_6 = $("#class3_row_28_cell_6").val();
        }
        if(total_rows > 6){
            row_1_cell_7 = $("#class3_row_1_cell_7").val();  
            row_2_cell_7 = $("#class3_row_2_cell_7").val();
            row_3_cell_7 = $("#class3_row_3_cell_7").val();
            row_6_cell_7 = $("#class3_row_6_cell_7").val();
            row_7_cell_7 = $("#class3_row_7_cell_7").val();
            row_8_cell_7 = $("#class3_row_8_cell_7").val();
            row_11_cell_7 = $("#class3_row_11_cell_7").val();
            row_12_cell_7 = $("#class3_row_12_cell_7").val();
            row_13_cell_7 = $("#class3_row_13_cell_7").val();
            row_16_cell_7 = $("#class3_row_16_cell_7").val();
            row_17_cell_7 = $("#class3_row_17_cell_7").val();
            row_18_cell_7 = $("#class3_row_18_cell_7").val();
            row_21_cell_7 = $("#class3_row_21_cell_7").val();
            row_22_cell_7 = $("#class3_row_22_cell_7").val();
            row_23_cell_7 = $("#class3_row_23_cell_7").val();
            row_26_cell_7 = $("#class3_row_26_cell_7").val();
            row_27_cell_7 = $("#class3_row_27_cell_7").val();
            row_28_cell_7 = $("#class3_row_28_cell_7").val();
        }

            var update_time_table_class3 = "class3_total_rows="+total_rows
            +"&class3_row_1_cell_1="+row_1_cell_1+"&class3_row_2_cell_1="+row_2_cell_1+"&class3_row_3_cell_1="+row_3_cell_1
            +"&class3_row_6_cell_1="+row_6_cell_1+"&class3_row_7_cell_1="+row_7_cell_1+"&class3_row_8_cell_1="+row_8_cell_1
            +"&class3_row_11_cell_1="+row_11_cell_1+"&class3_row_12_cell_1="+row_12_cell_1+"&class3_row_13_cell_1="+row_13_cell_1
            +"&class3_row_16_cell_1="+row_16_cell_1+"&class3_row_17_cell_1="+row_17_cell_1+"&class3_row_18_cell_1="+row_18_cell_1
            +"&class3_row_21_cell_1="+row_21_cell_1+"&class3_row_22_cell_1="+row_22_cell_1+"&class3_row_23_cell_1="+row_23_cell_1
            +"&class3_row_26_cell_1="+row_26_cell_1+"&class3_row_27_cell_1="+row_27_cell_1+"&class3_row_28_cell_1="+row_28_cell_1

            +"&class3_row_1_cell_2="+row_1_cell_2+"&class3_row_2_cell_2="+row_2_cell_2+"&class3_row_3_cell_2="+row_3_cell_2
            +"&class3_row_6_cell_2="+row_6_cell_2+"&class3_row_7_cell_2="+row_7_cell_2+"&class3_row_8_cell_2="+row_8_cell_2
            +"&class3_row_11_cell_2="+row_11_cell_2+"&class3_row_12_cell_2="+row_12_cell_2+"&class3_row_13_cell_2="+row_13_cell_2
            +"&class3_row_16_cell_2="+row_16_cell_2+"&class3_row_17_cell_2="+row_17_cell_2+"&class3_row_18_cell_2="+row_18_cell_2
            +"&class3_row_21_cell_2="+row_21_cell_2+"&class3_row_22_cell_2="+row_22_cell_2+"&class3_row_23_cell_2="+row_23_cell_2
            +"&class3_row_26_cell_2="+row_26_cell_2+"&class3_row_27_cell_2="+row_27_cell_2+"&class3_row_28_cell_2="+row_28_cell_2

            +"&class3_row_1_cell_3="+row_1_cell_3+"&class3_row_2_cell_3="+row_2_cell_3+"&class3_row_3_cell_3="+row_3_cell_3
            +"&class3_row_6_cell_3="+row_6_cell_3+"&class3_row_7_cell_3="+row_7_cell_3+"&class3_row_8_cell_3="+row_8_cell_3
            +"&class3_row_11_cell_3="+row_11_cell_3+"&class3_row_12_cell_3="+row_12_cell_3+"&class3_row_13_cell_3="+row_13_cell_3
            +"&class3_row_16_cell_3="+row_16_cell_3+"&class3_row_17_cell_3="+row_17_cell_3+"&class3_row_18_cell_3="+row_18_cell_3
            +"&class3_row_21_cell_3="+row_21_cell_3+"&class3_row_22_cell_3="+row_22_cell_3+"&class3_row_23_cell_3="+row_23_cell_3
            +"&class3_row_26_cell_3="+row_26_cell_3+"&class3_row_27_cell_3="+row_27_cell_3+"&class3_row_28_cell_3="+row_28_cell_3

            +"&class3_row_1_cell_4="+row_1_cell_4+"&class3_row_2_cell_4="+row_2_cell_4+"&class3_row_3_cell_4="+row_3_cell_4
            +"&class3_row_6_cell_4="+row_6_cell_4+"&class3_row_7_cell_4="+row_7_cell_4+"&class3_row_8_cell_4="+row_8_cell_4
            +"&class3_row_11_cell_4="+row_11_cell_4+"&class3_row_12_cell_4="+row_12_cell_4+"&class3_row_13_cell_4="+row_13_cell_4
            +"&class3_row_16_cell_4="+row_16_cell_4+"&class3_row_17_cell_4="+row_17_cell_4+"&class3_row_18_cell_4="+row_18_cell_4
            +"&class3_row_21_cell_4="+row_21_cell_4+"&class3_row_22_cell_4="+row_22_cell_4+"&class3_row_23_cell_4="+row_23_cell_4
            +"&class3_row_26_cell_4="+row_26_cell_4+"&class3_row_27_cell_4="+row_27_cell_4+"&class3_row_28_cell_4="+row_28_cell_4

            +"&class3_row_1_cell_5="+row_1_cell_5+"&class3_row_2_cell_5="+row_2_cell_5+"&class3_row_3_cell_5="+row_3_cell_5
            +"&class3_row_6_cell_5="+row_6_cell_5+"&class3_row_7_cell_5="+row_7_cell_5+"&class3_row_8_cell_5="+row_8_cell_5
            +"&class3_row_11_cell_5="+row_11_cell_5+"&class3_row_12_cell_5="+row_12_cell_5+"&class3_row_13_cell_5="+row_13_cell_5
            +"&class3_row_16_cell_5="+row_16_cell_5+"&class3_row_17_cell_5="+row_17_cell_5+"&class3_row_18_cell_5="+row_18_cell_5
            +"&class3_row_21_cell_5="+row_21_cell_5+"&class3_row_22_cell_5="+row_22_cell_5+"&class3_row_23_cell_5="+row_23_cell_5
            +"&class3_row_26_cell_5="+row_26_cell_5+"&class3_row_27_cell_5="+row_27_cell_5+"&class3_row_28_cell_5="+row_28_cell_5

            +"&class3_row_1_cell_6="+row_1_cell_6+"&class3_row_2_cell_6="+row_2_cell_6+"&class3_row_3_cell_6="+row_3_cell_6
            +"&class3_row_6_cell_6="+row_6_cell_6+"&class3_row_7_cell_6="+row_7_cell_6+"&class3_row_8_cell_6="+row_8_cell_6
            +"&class3_row_11_cell_6="+row_11_cell_6+"&class3_row_12_cell_6="+row_12_cell_6+"&class3_row_13_cell_6="+row_13_cell_6
            +"&class3_row_16_cell_6="+row_16_cell_6+"&class3_row_17_cell_6="+row_17_cell_6+"&class3_row_18_cell_6="+row_18_cell_6
            +"&class3_row_21_cell_6="+row_21_cell_6+"&class3_row_22_cell_6="+row_22_cell_6+"&class3_row_23_cell_6="+row_23_cell_6
            +"&class3_row_26_cell_6="+row_26_cell_6+"&class3_row_27_cell_6="+row_27_cell_6+"&class3_row_28_cell_6="+row_28_cell_6

            +"&class3_row_1_cell_7="+row_1_cell_7+"&class3_row_2_cell_7="+row_2_cell_7+"&class3_row_3_cell_7="+row_3_cell_7
            +"&class3_row_6_cell_7="+row_6_cell_7+"&class3_row_7_cell_7="+row_7_cell_7+"&class3_row_8_cell_7="+row_8_cell_7
            +"&class3_row_11_cell_7="+row_11_cell_7+"&class3_row_12_cell_7="+row_12_cell_7+"&class3_row_13_cell_7="+row_13_cell_7
            +"&class3_row_16_cell_7="+row_16_cell_7+"&class3_row_17_cell_7="+row_17_cell_7+"&class3_row_18_cell_7="+row_18_cell_7
            +"&class3_row_21_cell_7="+row_21_cell_7+"&class3_row_22_cell_7="+row_22_cell_7+"&class3_row_23_cell_7="+row_23_cell_7
            +"&class3_row_26_cell_7="+row_26_cell_7+"&class3_row_27_cell_7="+row_27_cell_7+"&class3_row_28_cell_7="+row_28_cell_7;

            $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data: update_time_table_class3,
            success:function(data){ alert(data); Load_TimeTable_Class3_Function(); }
            });
    });    
    
    // ================================================================================
    // ==================================== Class4 ====================================
    // ================================================================================
    
    Load_TimeTable_Class4_Function();
    function Load_TimeTable_Class4_Function()
    {
        var dataString = "Load_TimeTable_Class4";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ $("#load_time_table_class4_table_id").html(data); }
        });
    }
    
    function Load_TimeTable_Class4_PopUpModel_Function()
    {
        var dataString = "Load_TimeTable_Class4_PopUpModel";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ 
                $("#load_time_table_class4_popup_model_id").html(data); 
                $("#show_model_class4_time_table").modal('show');
            }
        });
    }
    
    $(document).on("click", "#YesUpdate_class4_TimeTable_ModelBtn", function(){
        var rowCount = $('#class4_tblSample td').length;
        var total_rows = (rowCount-24);
        if(total_rows > 1) { total_rows = total_rows-17; }
        if(total_rows > 2) { total_rows = total_rows-17; }
        if(total_rows > 3) { total_rows = total_rows-17; }
        if(total_rows > 4) { total_rows = total_rows-17; }
        if(total_rows > 5) { total_rows = total_rows-17; }
        if(total_rows > 6) { total_rows = total_rows-17; }
        if(total_rows > 7) { total_rows = total_rows-17; }
        
        var row_1_cell_1 = '', row_2_cell_1 = '', row_3_cell_1 = '';
        var row_1_cell_2 = '', row_2_cell_2 = '', row_3_cell_2 = '';
        var row_1_cell_3 = '', row_2_cell_3 = '', row_3_cell_3 = '';
        var row_1_cell_4 = '', row_2_cell_4 = '', row_3_cell_4 = '';
        var row_1_cell_5 = '', row_2_cell_5 = '', row_3_cell_5 = '';
        var row_1_cell_6 = '', row_2_cell_6 = '', row_3_cell_6 = '';
        var row_1_cell_7 = '', row_2_cell_7 = '', row_3_cell_7 = '';
        
        var row_6_cell_1 = '', row_7_cell_1 = '', row_8_cell_1 = '';
        var row_6_cell_2 = '', row_7_cell_2 = '', row_8_cell_2 = '';
        var row_6_cell_3 = '', row_7_cell_3 = '', row_8_cell_3 = '';
        var row_6_cell_4 = '', row_7_cell_4 = '', row_8_cell_4 = '';
        var row_6_cell_5 = '', row_7_cell_5 = '', row_8_cell_5 = '';
        var row_6_cell_6 = '', row_7_cell_6 = '', row_8_cell_6 = '';
        var row_6_cell_7 = '', row_7_cell_7 = '', row_8_cell_7 = '';
        
        var row_11_cell_1 = '', row_12_cell_1 = '', row_13_cell_1 = '';
        var row_11_cell_2 = '', row_12_cell_2 = '', row_13_cell_2 = '';
        var row_11_cell_3 = '', row_12_cell_3 = '', row_13_cell_3 = '';
        var row_11_cell_4 = '', row_12_cell_4 = '', row_13_cell_4 = '';
        var row_11_cell_5 = '', row_12_cell_5 = '', row_13_cell_5 = '';
        var row_11_cell_6 = '', row_12_cell_6 = '', row_13_cell_6 = '';
        var row_11_cell_7 = '', row_12_cell_7 = '', row_13_cell_7 = '';
        
        var row_16_cell_1 = '', row_17_cell_1 = '', row_18_cell_1 = '';
        var row_16_cell_2 = '', row_17_cell_2 = '', row_18_cell_2 = '';
        var row_16_cell_3 = '', row_17_cell_3 = '', row_18_cell_3 = '';
        var row_16_cell_4 = '', row_17_cell_4 = '', row_18_cell_4 = '';
        var row_16_cell_5 = '', row_17_cell_5 = '', row_18_cell_5 = '';
        var row_16_cell_6 = '', row_17_cell_6 = '', row_18_cell_6 = '';
        var row_16_cell_7 = '', row_17_cell_7 = '', row_18_cell_7 = '';
        
        var row_21_cell_1 = '', row_22_cell_1 = '', row_23_cell_1 = '';
        var row_21_cell_2 = '', row_22_cell_2 = '', row_23_cell_2 = '';
        var row_21_cell_3 = '', row_22_cell_3 = '', row_23_cell_3 = '';
        var row_21_cell_4 = '', row_22_cell_4 = '', row_23_cell_4 = '';
        var row_21_cell_5 = '', row_22_cell_5 = '', row_23_cell_5 = '';
        var row_21_cell_6 = '', row_22_cell_6 = '', row_23_cell_6 = '';
        var row_21_cell_7 = '', row_22_cell_7 = '', row_23_cell_7 = '';
        
        var row_26_cell_1 = '', row_27_cell_1 = '', row_28_cell_1 = '';
        var row_26_cell_2 = '', row_27_cell_2 = '', row_28_cell_2 = '';
        var row_26_cell_3 = '', row_27_cell_3 = '', row_28_cell_3 = '';
        var row_26_cell_4 = '', row_27_cell_4 = '', row_28_cell_4 = '';
        var row_26_cell_5 = '', row_27_cell_5 = '', row_28_cell_5 = '';
        var row_26_cell_6 = '', row_27_cell_6 = '', row_28_cell_6 = '';
        var row_26_cell_7 = '', row_27_cell_7 = '', row_28_cell_7 = '';
        
        if(total_rows > 0){
            row_1_cell_1 = $("#class4_row_1_cell_1").val();  
            row_2_cell_1 = $("#class4_row_2_cell_1").val();
            row_3_cell_1 = $("#class4_row_3_cell_1").val();
            row_6_cell_1 = $("#class4_row_6_cell_1").val();
            row_7_cell_1 = $("#class4_row_7_cell_1").val();
            row_8_cell_1 = $("#class4_row_8_cell_1").val();
            row_11_cell_1 = $("#class4_row_11_cell_1").val();
            row_12_cell_1 = $("#class4_row_12_cell_1").val();
            row_13_cell_1 = $("#class4_row_13_cell_1").val();
            row_16_cell_1 = $("#class4_row_16_cell_1").val();
            row_17_cell_1 = $("#class4_row_17_cell_1").val();
            row_18_cell_1 = $("#class4_row_18_cell_1").val();
            row_21_cell_1 = $("#class4_row_21_cell_1").val();
            row_22_cell_1 = $("#class4_row_22_cell_1").val();
            row_23_cell_1 = $("#class4_row_23_cell_1").val();
            row_26_cell_1 = $("#class4_row_26_cell_1").val();
            row_27_cell_1 = $("#class4_row_27_cell_1").val();
            row_28_cell_1 = $("#class4_row_28_cell_1").val();
        }
        if(total_rows > 1){
            row_1_cell_2 = $("#class4_row_1_cell_2").val();
            row_2_cell_2 = $("#class4_row_2_cell_2").val();
            row_3_cell_2 = $("#class4_row_3_cell_2").val();
            row_6_cell_2 = $("#class4_row_6_cell_2").val();
            row_7_cell_2 = $("#class4_row_7_cell_2").val();
            row_8_cell_2 = $("#class4_row_8_cell_2").val();
            row_11_cell_2 = $("#class4_row_11_cell_2").val();
            row_12_cell_2 = $("#class4_row_12_cell_2").val();
            row_13_cell_2 = $("#class4_row_13_cell_2").val();
            row_16_cell_2 = $("#class4_row_16_cell_2").val();
            row_17_cell_2 = $("#class4_row_17_cell_2").val();
            row_18_cell_2 = $("#class4_row_18_cell_2").val();
            row_21_cell_2 = $("#class4_row_21_cell_2").val();
            row_22_cell_2 = $("#class4_row_22_cell_2").val();
            row_23_cell_2 = $("#class4_row_23_cell_2").val();
            row_26_cell_2 = $("#class4_row_26_cell_2").val();
            row_27_cell_2 = $("#class4_row_27_cell_2").val();
            row_28_cell_2 = $("#class4_row_28_cell_2").val();
        }
        if(total_rows > 2){
            row_1_cell_3 = $("#class4_row_1_cell_3").val();
            row_2_cell_3 = $("#class4_row_2_cell_3").val();
            row_3_cell_3 = $("#class4_row_3_cell_3").val();
            row_6_cell_3 = $("#class4_row_6_cell_3").val();
            row_7_cell_3 = $("#class4_row_7_cell_3").val();
            row_8_cell_3 = $("#class4_row_8_cell_3").val();
            row_11_cell_3 = $("#class4_row_11_cell_3").val();
            row_12_cell_3 = $("#class4_row_12_cell_3").val();
            row_13_cell_3 = $("#class4_row_13_cell_3").val();
            row_16_cell_3 = $("#class4_row_16_cell_3").val();
            row_17_cell_3 = $("#class4_row_17_cell_3").val();
            row_18_cell_3 = $("#class4_row_18_cell_3").val();
            row_21_cell_3 = $("#class4_row_21_cell_3").val();
            row_22_cell_3 = $("#class4_row_22_cell_3").val();
            row_23_cell_3 = $("#class4_row_23_cell_3").val();
            row_26_cell_3 = $("#class4_row_26_cell_3").val();
            row_27_cell_3 = $("#class4_row_27_cell_3").val();
            row_28_cell_3 = $("#class4_row_28_cell_3").val();
        }
        if(total_rows > 3){
            row_1_cell_4 = $("#class4_row_1_cell_4").val();
            row_2_cell_4 = $("#class4_row_2_cell_4").val();
            row_3_cell_4 = $("#class4_row_3_cell_4").val();
            row_6_cell_4 = $("#class4_row_6_cell_4").val();
            row_7_cell_4 = $("#class4_row_7_cell_4").val();
            row_8_cell_4 = $("#class4_row_8_cell_4").val();
            row_11_cell_4 = $("#class4_row_11_cell_4").val();
            row_12_cell_4 = $("#class4_row_12_cell_4").val();
            row_13_cell_4 = $("#class4_row_13_cell_4").val();
            row_16_cell_4 = $("#class4_row_16_cell_4").val();
            row_17_cell_4 = $("#class4_row_17_cell_4").val();
            row_18_cell_4 = $("#class4_row_18_cell_4").val();
            row_21_cell_4 = $("#class4_row_21_cell_4").val();
            row_22_cell_4 = $("#class4_row_22_cell_4").val();
            row_23_cell_4 = $("#class4_row_23_cell_4").val();
            row_26_cell_4 = $("#class4_row_26_cell_4").val();
            row_27_cell_4 = $("#class4_row_27_cell_4").val();
            row_28_cell_4 = $("#class4_row_28_cell_4").val();
        }
        if(total_rows > 4){
            row_1_cell_5 = $("#class4_row_1_cell_5").val();
            row_2_cell_5 = $("#class4_row_2_cell_5").val();
            row_3_cell_5 = $("#class4_row_3_cell_5").val();
            row_6_cell_5 = $("#class4_row_6_cell_5").val();
            row_7_cell_5 = $("#class4_row_7_cell_5").val();
            row_8_cell_5 = $("#class4_row_8_cell_5").val();
            row_11_cell_5 = $("#class4_row_11_cell_5").val();
            row_12_cell_5 = $("#class4_row_12_cell_5").val();
            row_13_cell_5 = $("#class4_row_13_cell_5").val();
            row_16_cell_5 = $("#class4_row_16_cell_5").val();
            row_17_cell_5 = $("#class4_row_17_cell_5").val();
            row_18_cell_5 = $("#class4_row_18_cell_5").val();
            row_21_cell_5 = $("#class4_row_21_cell_5").val();
            row_22_cell_5 = $("#class4_row_22_cell_5").val();
            row_23_cell_5 = $("#class4_row_23_cell_5").val();
            row_26_cell_5 = $("#class4_row_26_cell_5").val();
            row_27_cell_5 = $("#class4_row_27_cell_5").val();
            row_28_cell_5 = $("#class4_row_28_cell_5").val();
        }
        if(total_rows > 5){
            row_1_cell_6 = $("#class4_row_1_cell_6").val();
            row_2_cell_6 = $("#class4_row_2_cell_6").val();
            row_3_cell_6 = $("#class4_row_3_cell_6").val();
            row_6_cell_6 = $("#class4_row_6_cell_6").val();
            row_7_cell_6 = $("#class4_row_7_cell_6").val();
            row_8_cell_6 = $("#class4_row_8_cell_6").val();
            row_11_cell_6 = $("#class4_row_11_cell_6").val();
            row_12_cell_6 = $("#class4_row_12_cell_6").val();
            row_13_cell_6 = $("#class4_row_13_cell_6").val();
            row_16_cell_6 = $("#class4_row_16_cell_6").val();
            row_17_cell_6 = $("#class4_row_17_cell_6").val();
            row_18_cell_6 = $("#class4_row_18_cell_6").val();
            row_21_cell_6 = $("#class4_row_21_cell_6").val();
            row_22_cell_6 = $("#class4_row_22_cell_6").val();
            row_23_cell_6 = $("#class4_row_23_cell_6").val();
            row_26_cell_6 = $("#class4_row_26_cell_6").val();
            row_27_cell_6 = $("#class4_row_27_cell_6").val();
            row_28_cell_6 = $("#class4_row_28_cell_6").val();
        }
        if(total_rows > 6){
            row_1_cell_7 = $("#class4_row_1_cell_7").val();  
            row_2_cell_7 = $("#class4_row_2_cell_7").val();
            row_3_cell_7 = $("#class4_row_3_cell_7").val();
            row_6_cell_7 = $("#class4_row_6_cell_7").val();
            row_7_cell_7 = $("#class4_row_7_cell_7").val();
            row_8_cell_7 = $("#class4_row_8_cell_7").val();
            row_11_cell_7 = $("#class4_row_11_cell_7").val();
            row_12_cell_7 = $("#class4_row_12_cell_7").val();
            row_13_cell_7 = $("#class4_row_13_cell_7").val();
            row_16_cell_7 = $("#class4_row_16_cell_7").val();
            row_17_cell_7 = $("#class4_row_17_cell_7").val();
            row_18_cell_7 = $("#class4_row_18_cell_7").val();
            row_21_cell_7 = $("#class4_row_21_cell_7").val();
            row_22_cell_7 = $("#class4_row_22_cell_7").val();
            row_23_cell_7 = $("#class4_row_23_cell_7").val();
            row_26_cell_7 = $("#class4_row_26_cell_7").val();
            row_27_cell_7 = $("#class4_row_27_cell_7").val();
            row_28_cell_7 = $("#class4_row_28_cell_7").val();
        }

            var update_time_table_class4 = "class4_total_rows="+total_rows
            +"&class4_row_1_cell_1="+row_1_cell_1+"&class4_row_2_cell_1="+row_2_cell_1+"&class4_row_3_cell_1="+row_3_cell_1
            +"&class4_row_6_cell_1="+row_6_cell_1+"&class4_row_7_cell_1="+row_7_cell_1+"&class4_row_8_cell_1="+row_8_cell_1
            +"&class4_row_11_cell_1="+row_11_cell_1+"&class4_row_12_cell_1="+row_12_cell_1+"&class4_row_13_cell_1="+row_13_cell_1
            +"&class4_row_16_cell_1="+row_16_cell_1+"&class4_row_17_cell_1="+row_17_cell_1+"&class4_row_18_cell_1="+row_18_cell_1
            +"&class4_row_21_cell_1="+row_21_cell_1+"&class4_row_22_cell_1="+row_22_cell_1+"&class4_row_23_cell_1="+row_23_cell_1
            +"&class4_row_26_cell_1="+row_26_cell_1+"&class4_row_27_cell_1="+row_27_cell_1+"&class4_row_28_cell_1="+row_28_cell_1

            +"&class4_row_1_cell_2="+row_1_cell_2+"&class4_row_2_cell_2="+row_2_cell_2+"&class4_row_3_cell_2="+row_3_cell_2
            +"&class4_row_6_cell_2="+row_6_cell_2+"&class4_row_7_cell_2="+row_7_cell_2+"&class4_row_8_cell_2="+row_8_cell_2
            +"&class4_row_11_cell_2="+row_11_cell_2+"&class4_row_12_cell_2="+row_12_cell_2+"&class4_row_13_cell_2="+row_13_cell_2
            +"&class4_row_16_cell_2="+row_16_cell_2+"&class4_row_17_cell_2="+row_17_cell_2+"&class4_row_18_cell_2="+row_18_cell_2
            +"&class4_row_21_cell_2="+row_21_cell_2+"&class4_row_22_cell_2="+row_22_cell_2+"&class4_row_23_cell_2="+row_23_cell_2
            +"&class4_row_26_cell_2="+row_26_cell_2+"&class4_row_27_cell_2="+row_27_cell_2+"&class4_row_28_cell_2="+row_28_cell_2

            +"&class4_row_1_cell_3="+row_1_cell_3+"&class4_row_2_cell_3="+row_2_cell_3+"&class4_row_3_cell_3="+row_3_cell_3
            +"&class4_row_6_cell_3="+row_6_cell_3+"&class4_row_7_cell_3="+row_7_cell_3+"&class4_row_8_cell_3="+row_8_cell_3
            +"&class4_row_11_cell_3="+row_11_cell_3+"&class4_row_12_cell_3="+row_12_cell_3+"&class4_row_13_cell_3="+row_13_cell_3
            +"&class4_row_16_cell_3="+row_16_cell_3+"&class4_row_17_cell_3="+row_17_cell_3+"&class4_row_18_cell_3="+row_18_cell_3
            +"&class4_row_21_cell_3="+row_21_cell_3+"&class4_row_22_cell_3="+row_22_cell_3+"&class4_row_23_cell_3="+row_23_cell_3
            +"&class4_row_26_cell_3="+row_26_cell_3+"&class4_row_27_cell_3="+row_27_cell_3+"&class4_row_28_cell_3="+row_28_cell_3

            +"&class4_row_1_cell_4="+row_1_cell_4+"&class4_row_2_cell_4="+row_2_cell_4+"&class4_row_3_cell_4="+row_3_cell_4
            +"&class4_row_6_cell_4="+row_6_cell_4+"&class4_row_7_cell_4="+row_7_cell_4+"&class4_row_8_cell_4="+row_8_cell_4
            +"&class4_row_11_cell_4="+row_11_cell_4+"&class4_row_12_cell_4="+row_12_cell_4+"&class4_row_13_cell_4="+row_13_cell_4
            +"&class4_row_16_cell_4="+row_16_cell_4+"&class4_row_17_cell_4="+row_17_cell_4+"&class4_row_18_cell_4="+row_18_cell_4
            +"&class4_row_21_cell_4="+row_21_cell_4+"&class4_row_22_cell_4="+row_22_cell_4+"&class4_row_23_cell_4="+row_23_cell_4
            +"&class4_row_26_cell_4="+row_26_cell_4+"&class4_row_27_cell_4="+row_27_cell_4+"&class4_row_28_cell_4="+row_28_cell_4

            +"&class4_row_1_cell_5="+row_1_cell_5+"&class4_row_2_cell_5="+row_2_cell_5+"&class4_row_3_cell_5="+row_3_cell_5
            +"&class4_row_6_cell_5="+row_6_cell_5+"&class4_row_7_cell_5="+row_7_cell_5+"&class4_row_8_cell_5="+row_8_cell_5
            +"&class4_row_11_cell_5="+row_11_cell_5+"&class4_row_12_cell_5="+row_12_cell_5+"&class4_row_13_cell_5="+row_13_cell_5
            +"&class4_row_16_cell_5="+row_16_cell_5+"&class4_row_17_cell_5="+row_17_cell_5+"&class4_row_18_cell_5="+row_18_cell_5
            +"&class4_row_21_cell_5="+row_21_cell_5+"&class4_row_22_cell_5="+row_22_cell_5+"&class4_row_23_cell_5="+row_23_cell_5
            +"&class4_row_26_cell_5="+row_26_cell_5+"&class4_row_27_cell_5="+row_27_cell_5+"&class4_row_28_cell_5="+row_28_cell_5

            +"&class4_row_1_cell_6="+row_1_cell_6+"&class4_row_2_cell_6="+row_2_cell_6+"&class4_row_3_cell_6="+row_3_cell_6
            +"&class4_row_6_cell_6="+row_6_cell_6+"&class4_row_7_cell_6="+row_7_cell_6+"&class4_row_8_cell_6="+row_8_cell_6
            +"&class4_row_11_cell_6="+row_11_cell_6+"&class4_row_12_cell_6="+row_12_cell_6+"&class4_row_13_cell_6="+row_13_cell_6
            +"&class4_row_16_cell_6="+row_16_cell_6+"&class4_row_17_cell_6="+row_17_cell_6+"&class4_row_18_cell_6="+row_18_cell_6
            +"&class4_row_21_cell_6="+row_21_cell_6+"&class4_row_22_cell_6="+row_22_cell_6+"&class4_row_23_cell_6="+row_23_cell_6
            +"&class4_row_26_cell_6="+row_26_cell_6+"&class4_row_27_cell_6="+row_27_cell_6+"&class4_row_28_cell_6="+row_28_cell_6

            +"&class4_row_1_cell_7="+row_1_cell_7+"&class4_row_2_cell_7="+row_2_cell_7+"&class4_row_3_cell_7="+row_3_cell_7
            +"&class4_row_6_cell_7="+row_6_cell_7+"&class4_row_7_cell_7="+row_7_cell_7+"&class4_row_8_cell_7="+row_8_cell_7
            +"&class4_row_11_cell_7="+row_11_cell_7+"&class4_row_12_cell_7="+row_12_cell_7+"&class4_row_13_cell_7="+row_13_cell_7
            +"&class4_row_16_cell_7="+row_16_cell_7+"&class4_row_17_cell_7="+row_17_cell_7+"&class4_row_18_cell_7="+row_18_cell_7
            +"&class4_row_21_cell_7="+row_21_cell_7+"&class4_row_22_cell_7="+row_22_cell_7+"&class4_row_23_cell_7="+row_23_cell_7
            +"&class4_row_26_cell_7="+row_26_cell_7+"&class4_row_27_cell_7="+row_27_cell_7+"&class4_row_28_cell_7="+row_28_cell_7;

            $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data: update_time_table_class4,
            success:function(data){ alert(data); Load_TimeTable_Class4_Function(); }
            });
    });    
    
    // ================================================================================
    // ==================================== Class5 ====================================
    // ================================================================================
    
    Load_TimeTable_Class5_Function();
    function Load_TimeTable_Class5_Function()
    {
        var dataString = "Load_TimeTable_Class5";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ $("#load_time_table_class5_table_id").html(data); }
        });
    }
    
    function Load_TimeTable_Class5_PopUpModel_Function()
    {
        var dataString = "Load_TimeTable_Class5_PopUpModel";
        $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data:dataString,
            success:function(data){ 
                $("#load_time_table_class5_popup_model_id").html(data); 
                $("#show_model_class5_time_table").modal('show');
            }
        });
    }
    
    $(document).on("click", "#YesUpdate_class5_TimeTable_ModelBtn", function(){
        var rowCount = $('#class5_tblSample td').length;
        var total_rows = (rowCount-24);
        if(total_rows > 1) { total_rows = total_rows-17; }
        if(total_rows > 2) { total_rows = total_rows-17; }
        if(total_rows > 3) { total_rows = total_rows-17; }
        if(total_rows > 4) { total_rows = total_rows-17; }
        if(total_rows > 5) { total_rows = total_rows-17; }
        if(total_rows > 6) { total_rows = total_rows-17; }
        if(total_rows > 7) { total_rows = total_rows-17; }
        
        var row_1_cell_1 = '', row_2_cell_1 = '', row_3_cell_1 = '';
        var row_1_cell_2 = '', row_2_cell_2 = '', row_3_cell_2 = '';
        var row_1_cell_3 = '', row_2_cell_3 = '', row_3_cell_3 = '';
        var row_1_cell_4 = '', row_2_cell_4 = '', row_3_cell_4 = '';
        var row_1_cell_5 = '', row_2_cell_5 = '', row_3_cell_5 = '';
        var row_1_cell_6 = '', row_2_cell_6 = '', row_3_cell_6 = '';
        var row_1_cell_7 = '', row_2_cell_7 = '', row_3_cell_7 = '';
        
        var row_6_cell_1 = '', row_7_cell_1 = '', row_8_cell_1 = '';
        var row_6_cell_2 = '', row_7_cell_2 = '', row_8_cell_2 = '';
        var row_6_cell_3 = '', row_7_cell_3 = '', row_8_cell_3 = '';
        var row_6_cell_4 = '', row_7_cell_4 = '', row_8_cell_4 = '';
        var row_6_cell_5 = '', row_7_cell_5 = '', row_8_cell_5 = '';
        var row_6_cell_6 = '', row_7_cell_6 = '', row_8_cell_6 = '';
        var row_6_cell_7 = '', row_7_cell_7 = '', row_8_cell_7 = '';
        
        var row_11_cell_1 = '', row_12_cell_1 = '', row_13_cell_1 = '';
        var row_11_cell_2 = '', row_12_cell_2 = '', row_13_cell_2 = '';
        var row_11_cell_3 = '', row_12_cell_3 = '', row_13_cell_3 = '';
        var row_11_cell_4 = '', row_12_cell_4 = '', row_13_cell_4 = '';
        var row_11_cell_5 = '', row_12_cell_5 = '', row_13_cell_5 = '';
        var row_11_cell_6 = '', row_12_cell_6 = '', row_13_cell_6 = '';
        var row_11_cell_7 = '', row_12_cell_7 = '', row_13_cell_7 = '';
        
        var row_16_cell_1 = '', row_17_cell_1 = '', row_18_cell_1 = '';
        var row_16_cell_2 = '', row_17_cell_2 = '', row_18_cell_2 = '';
        var row_16_cell_3 = '', row_17_cell_3 = '', row_18_cell_3 = '';
        var row_16_cell_4 = '', row_17_cell_4 = '', row_18_cell_4 = '';
        var row_16_cell_5 = '', row_17_cell_5 = '', row_18_cell_5 = '';
        var row_16_cell_6 = '', row_17_cell_6 = '', row_18_cell_6 = '';
        var row_16_cell_7 = '', row_17_cell_7 = '', row_18_cell_7 = '';
        
        var row_21_cell_1 = '', row_22_cell_1 = '', row_23_cell_1 = '';
        var row_21_cell_2 = '', row_22_cell_2 = '', row_23_cell_2 = '';
        var row_21_cell_3 = '', row_22_cell_3 = '', row_23_cell_3 = '';
        var row_21_cell_4 = '', row_22_cell_4 = '', row_23_cell_4 = '';
        var row_21_cell_5 = '', row_22_cell_5 = '', row_23_cell_5 = '';
        var row_21_cell_6 = '', row_22_cell_6 = '', row_23_cell_6 = '';
        var row_21_cell_7 = '', row_22_cell_7 = '', row_23_cell_7 = '';
        
        var row_26_cell_1 = '', row_27_cell_1 = '', row_28_cell_1 = '';
        var row_26_cell_2 = '', row_27_cell_2 = '', row_28_cell_2 = '';
        var row_26_cell_3 = '', row_27_cell_3 = '', row_28_cell_3 = '';
        var row_26_cell_4 = '', row_27_cell_4 = '', row_28_cell_4 = '';
        var row_26_cell_5 = '', row_27_cell_5 = '', row_28_cell_5 = '';
        var row_26_cell_6 = '', row_27_cell_6 = '', row_28_cell_6 = '';
        var row_26_cell_7 = '', row_27_cell_7 = '', row_28_cell_7 = '';
        
        if(total_rows > 0){
            row_1_cell_1 = $("#class5_row_1_cell_1").val();  
            row_2_cell_1 = $("#class5_row_2_cell_1").val();
            row_3_cell_1 = $("#class5_row_3_cell_1").val();
            row_6_cell_1 = $("#class5_row_6_cell_1").val();
            row_7_cell_1 = $("#class5_row_7_cell_1").val();
            row_8_cell_1 = $("#class5_row_8_cell_1").val();
            row_11_cell_1 = $("#class5_row_11_cell_1").val();
            row_12_cell_1 = $("#class5_row_12_cell_1").val();
            row_13_cell_1 = $("#class5_row_13_cell_1").val();
            row_16_cell_1 = $("#class5_row_16_cell_1").val();
            row_17_cell_1 = $("#class5_row_17_cell_1").val();
            row_18_cell_1 = $("#class5_row_18_cell_1").val();
            row_21_cell_1 = $("#class5_row_21_cell_1").val();
            row_22_cell_1 = $("#class5_row_22_cell_1").val();
            row_23_cell_1 = $("#class5_row_23_cell_1").val();
            row_26_cell_1 = $("#class5_row_26_cell_1").val();
            row_27_cell_1 = $("#class5_row_27_cell_1").val();
            row_28_cell_1 = $("#class5_row_28_cell_1").val();
        }
        if(total_rows > 1){
            row_1_cell_2 = $("#class5_row_1_cell_2").val();
            row_2_cell_2 = $("#class5_row_2_cell_2").val();
            row_3_cell_2 = $("#class5_row_3_cell_2").val();
            row_6_cell_2 = $("#class5_row_6_cell_2").val();
            row_7_cell_2 = $("#class5_row_7_cell_2").val();
            row_8_cell_2 = $("#class5_row_8_cell_2").val();
            row_11_cell_2 = $("#class5_row_11_cell_2").val();
            row_12_cell_2 = $("#class5_row_12_cell_2").val();
            row_13_cell_2 = $("#class5_row_13_cell_2").val();
            row_16_cell_2 = $("#class5_row_16_cell_2").val();
            row_17_cell_2 = $("#class5_row_17_cell_2").val();
            row_18_cell_2 = $("#class5_row_18_cell_2").val();
            row_21_cell_2 = $("#class5_row_21_cell_2").val();
            row_22_cell_2 = $("#class5_row_22_cell_2").val();
            row_23_cell_2 = $("#class5_row_23_cell_2").val();
            row_26_cell_2 = $("#class5_row_26_cell_2").val();
            row_27_cell_2 = $("#class5_row_27_cell_2").val();
            row_28_cell_2 = $("#class5_row_28_cell_2").val();
        }
        if(total_rows > 2){
            row_1_cell_3 = $("#class5_row_1_cell_3").val();
            row_2_cell_3 = $("#class5_row_2_cell_3").val();
            row_3_cell_3 = $("#class5_row_3_cell_3").val();
            row_6_cell_3 = $("#class5_row_6_cell_3").val();
            row_7_cell_3 = $("#class5_row_7_cell_3").val();
            row_8_cell_3 = $("#class5_row_8_cell_3").val();
            row_11_cell_3 = $("#class5_row_11_cell_3").val();
            row_12_cell_3 = $("#class5_row_12_cell_3").val();
            row_13_cell_3 = $("#class5_row_13_cell_3").val();
            row_16_cell_3 = $("#class5_row_16_cell_3").val();
            row_17_cell_3 = $("#class5_row_17_cell_3").val();
            row_18_cell_3 = $("#class5_row_18_cell_3").val();
            row_21_cell_3 = $("#class5_row_21_cell_3").val();
            row_22_cell_3 = $("#class5_row_22_cell_3").val();
            row_23_cell_3 = $("#class5_row_23_cell_3").val();
            row_26_cell_3 = $("#class5_row_26_cell_3").val();
            row_27_cell_3 = $("#class5_row_27_cell_3").val();
            row_28_cell_3 = $("#class5_row_28_cell_3").val();
        }
        if(total_rows > 3){
            row_1_cell_4 = $("#class5_row_1_cell_4").val();
            row_2_cell_4 = $("#class5_row_2_cell_4").val();
            row_3_cell_4 = $("#class5_row_3_cell_4").val();
            row_6_cell_4 = $("#class5_row_6_cell_4").val();
            row_7_cell_4 = $("#class5_row_7_cell_4").val();
            row_8_cell_4 = $("#class5_row_8_cell_4").val();
            row_11_cell_4 = $("#class5_row_11_cell_4").val();
            row_12_cell_4 = $("#class5_row_12_cell_4").val();
            row_13_cell_4 = $("#class5_row_13_cell_4").val();
            row_16_cell_4 = $("#class5_row_16_cell_4").val();
            row_17_cell_4 = $("#class5_row_17_cell_4").val();
            row_18_cell_4 = $("#class5_row_18_cell_4").val();
            row_21_cell_4 = $("#class5_row_21_cell_4").val();
            row_22_cell_4 = $("#class5_row_22_cell_4").val();
            row_23_cell_4 = $("#class5_row_23_cell_4").val();
            row_26_cell_4 = $("#class5_row_26_cell_4").val();
            row_27_cell_4 = $("#class5_row_27_cell_4").val();
            row_28_cell_4 = $("#class5_row_28_cell_4").val();
        }
        if(total_rows > 4){
            row_1_cell_5 = $("#class5_row_1_cell_5").val();
            row_2_cell_5 = $("#class5_row_2_cell_5").val();
            row_3_cell_5 = $("#class5_row_3_cell_5").val();
            row_6_cell_5 = $("#class5_row_6_cell_5").val();
            row_7_cell_5 = $("#class5_row_7_cell_5").val();
            row_8_cell_5 = $("#class5_row_8_cell_5").val();
            row_11_cell_5 = $("#class5_row_11_cell_5").val();
            row_12_cell_5 = $("#class5_row_12_cell_5").val();
            row_13_cell_5 = $("#class5_row_13_cell_5").val();
            row_16_cell_5 = $("#class5_row_16_cell_5").val();
            row_17_cell_5 = $("#class5_row_17_cell_5").val();
            row_18_cell_5 = $("#class5_row_18_cell_5").val();
            row_21_cell_5 = $("#class5_row_21_cell_5").val();
            row_22_cell_5 = $("#class5_row_22_cell_5").val();
            row_23_cell_5 = $("#class5_row_23_cell_5").val();
            row_26_cell_5 = $("#class5_row_26_cell_5").val();
            row_27_cell_5 = $("#class5_row_27_cell_5").val();
            row_28_cell_5 = $("#class5_row_28_cell_5").val();
        }
        if(total_rows > 5){
            row_1_cell_6 = $("#class5_row_1_cell_6").val();
            row_2_cell_6 = $("#class5_row_2_cell_6").val();
            row_3_cell_6 = $("#class5_row_3_cell_6").val();
            row_6_cell_6 = $("#class5_row_6_cell_6").val();
            row_7_cell_6 = $("#class5_row_7_cell_6").val();
            row_8_cell_6 = $("#class5_row_8_cell_6").val();
            row_11_cell_6 = $("#class5_row_11_cell_6").val();
            row_12_cell_6 = $("#class5_row_12_cell_6").val();
            row_13_cell_6 = $("#class5_row_13_cell_6").val();
            row_16_cell_6 = $("#class5_row_16_cell_6").val();
            row_17_cell_6 = $("#class5_row_17_cell_6").val();
            row_18_cell_6 = $("#class5_row_18_cell_6").val();
            row_21_cell_6 = $("#class5_row_21_cell_6").val();
            row_22_cell_6 = $("#class5_row_22_cell_6").val();
            row_23_cell_6 = $("#class5_row_23_cell_6").val();
            row_26_cell_6 = $("#class5_row_26_cell_6").val();
            row_27_cell_6 = $("#class5_row_27_cell_6").val();
            row_28_cell_6 = $("#class5_row_28_cell_6").val();
        }
        if(total_rows > 6){
            row_1_cell_7 = $("#class5_row_1_cell_7").val();  
            row_2_cell_7 = $("#class5_row_2_cell_7").val();
            row_3_cell_7 = $("#class5_row_3_cell_7").val();
            row_6_cell_7 = $("#class5_row_6_cell_7").val();
            row_7_cell_7 = $("#class5_row_7_cell_7").val();
            row_8_cell_7 = $("#class5_row_8_cell_7").val();
            row_11_cell_7 = $("#class5_row_11_cell_7").val();
            row_12_cell_7 = $("#class5_row_12_cell_7").val();
            row_13_cell_7 = $("#class5_row_13_cell_7").val();
            row_16_cell_7 = $("#class5_row_16_cell_7").val();
            row_17_cell_7 = $("#class5_row_17_cell_7").val();
            row_18_cell_7 = $("#class5_row_18_cell_7").val();
            row_21_cell_7 = $("#class5_row_21_cell_7").val();
            row_22_cell_7 = $("#class5_row_22_cell_7").val();
            row_23_cell_7 = $("#class5_row_23_cell_7").val();
            row_26_cell_7 = $("#class5_row_26_cell_7").val();
            row_27_cell_7 = $("#class5_row_27_cell_7").val();
            row_28_cell_7 = $("#class5_row_28_cell_7").val();
        }

            var update_time_table_class5 = "class5_total_rows="+total_rows
            +"&class5_row_1_cell_1="+row_1_cell_1+"&class5_row_2_cell_1="+row_2_cell_1+"&class5_row_3_cell_1="+row_3_cell_1
            +"&class5_row_6_cell_1="+row_6_cell_1+"&class5_row_7_cell_1="+row_7_cell_1+"&class5_row_8_cell_1="+row_8_cell_1
            +"&class5_row_11_cell_1="+row_11_cell_1+"&class5_row_12_cell_1="+row_12_cell_1+"&class5_row_13_cell_1="+row_13_cell_1
            +"&class5_row_16_cell_1="+row_16_cell_1+"&class5_row_17_cell_1="+row_17_cell_1+"&class5_row_18_cell_1="+row_18_cell_1
            +"&class5_row_21_cell_1="+row_21_cell_1+"&class5_row_22_cell_1="+row_22_cell_1+"&class5_row_23_cell_1="+row_23_cell_1
            +"&class5_row_26_cell_1="+row_26_cell_1+"&class5_row_27_cell_1="+row_27_cell_1+"&class5_row_28_cell_1="+row_28_cell_1

            +"&class5_row_1_cell_2="+row_1_cell_2+"&class5_row_2_cell_2="+row_2_cell_2+"&class5_row_3_cell_2="+row_3_cell_2
            +"&class5_row_6_cell_2="+row_6_cell_2+"&class5_row_7_cell_2="+row_7_cell_2+"&class5_row_8_cell_2="+row_8_cell_2
            +"&class5_row_11_cell_2="+row_11_cell_2+"&class5_row_12_cell_2="+row_12_cell_2+"&class5_row_13_cell_2="+row_13_cell_2
            +"&class5_row_16_cell_2="+row_16_cell_2+"&class5_row_17_cell_2="+row_17_cell_2+"&class5_row_18_cell_2="+row_18_cell_2
            +"&class5_row_21_cell_2="+row_21_cell_2+"&class5_row_22_cell_2="+row_22_cell_2+"&class5_row_23_cell_2="+row_23_cell_2
            +"&class5_row_26_cell_2="+row_26_cell_2+"&class5_row_27_cell_2="+row_27_cell_2+"&class5_row_28_cell_2="+row_28_cell_2

            +"&class5_row_1_cell_3="+row_1_cell_3+"&class5_row_2_cell_3="+row_2_cell_3+"&class5_row_3_cell_3="+row_3_cell_3
            +"&class5_row_6_cell_3="+row_6_cell_3+"&class5_row_7_cell_3="+row_7_cell_3+"&class5_row_8_cell_3="+row_8_cell_3
            +"&class5_row_11_cell_3="+row_11_cell_3+"&class5_row_12_cell_3="+row_12_cell_3+"&class5_row_13_cell_3="+row_13_cell_3
            +"&class5_row_16_cell_3="+row_16_cell_3+"&class5_row_17_cell_3="+row_17_cell_3+"&class5_row_18_cell_3="+row_18_cell_3
            +"&class5_row_21_cell_3="+row_21_cell_3+"&class5_row_22_cell_3="+row_22_cell_3+"&class5_row_23_cell_3="+row_23_cell_3
            +"&class5_row_26_cell_3="+row_26_cell_3+"&class5_row_27_cell_3="+row_27_cell_3+"&class5_row_28_cell_3="+row_28_cell_3

            +"&class5_row_1_cell_4="+row_1_cell_4+"&class5_row_2_cell_4="+row_2_cell_4+"&class5_row_3_cell_4="+row_3_cell_4
            +"&class5_row_6_cell_4="+row_6_cell_4+"&class5_row_7_cell_4="+row_7_cell_4+"&class5_row_8_cell_4="+row_8_cell_4
            +"&class5_row_11_cell_4="+row_11_cell_4+"&class5_row_12_cell_4="+row_12_cell_4+"&class5_row_13_cell_4="+row_13_cell_4
            +"&class5_row_16_cell_4="+row_16_cell_4+"&class5_row_17_cell_4="+row_17_cell_4+"&class5_row_18_cell_4="+row_18_cell_4
            +"&class5_row_21_cell_4="+row_21_cell_4+"&class5_row_22_cell_4="+row_22_cell_4+"&class5_row_23_cell_4="+row_23_cell_4
            +"&class5_row_26_cell_4="+row_26_cell_4+"&class5_row_27_cell_4="+row_27_cell_4+"&class5_row_28_cell_4="+row_28_cell_4

            +"&class5_row_1_cell_5="+row_1_cell_5+"&class5_row_2_cell_5="+row_2_cell_5+"&class5_row_3_cell_5="+row_3_cell_5
            +"&class5_row_6_cell_5="+row_6_cell_5+"&class5_row_7_cell_5="+row_7_cell_5+"&class5_row_8_cell_5="+row_8_cell_5
            +"&class5_row_11_cell_5="+row_11_cell_5+"&class5_row_12_cell_5="+row_12_cell_5+"&class5_row_13_cell_5="+row_13_cell_5
            +"&class5_row_16_cell_5="+row_16_cell_5+"&class5_row_17_cell_5="+row_17_cell_5+"&class5_row_18_cell_5="+row_18_cell_5
            +"&class5_row_21_cell_5="+row_21_cell_5+"&class5_row_22_cell_5="+row_22_cell_5+"&class5_row_23_cell_5="+row_23_cell_5
            +"&class5_row_26_cell_5="+row_26_cell_5+"&class5_row_27_cell_5="+row_27_cell_5+"&class5_row_28_cell_5="+row_28_cell_5

            +"&class5_row_1_cell_6="+row_1_cell_6+"&class5_row_2_cell_6="+row_2_cell_6+"&class5_row_3_cell_6="+row_3_cell_6
            +"&class5_row_6_cell_6="+row_6_cell_6+"&class5_row_7_cell_6="+row_7_cell_6+"&class5_row_8_cell_6="+row_8_cell_6
            +"&class5_row_11_cell_6="+row_11_cell_6+"&class5_row_12_cell_6="+row_12_cell_6+"&class5_row_13_cell_6="+row_13_cell_6
            +"&class5_row_16_cell_6="+row_16_cell_6+"&class5_row_17_cell_6="+row_17_cell_6+"&class5_row_18_cell_6="+row_18_cell_6
            +"&class5_row_21_cell_6="+row_21_cell_6+"&class5_row_22_cell_6="+row_22_cell_6+"&class5_row_23_cell_6="+row_23_cell_6
            +"&class5_row_26_cell_6="+row_26_cell_6+"&class5_row_27_cell_6="+row_27_cell_6+"&class5_row_28_cell_6="+row_28_cell_6

            +"&class5_row_1_cell_7="+row_1_cell_7+"&class5_row_2_cell_7="+row_2_cell_7+"&class5_row_3_cell_7="+row_3_cell_7
            +"&class5_row_6_cell_7="+row_6_cell_7+"&class5_row_7_cell_7="+row_7_cell_7+"&class5_row_8_cell_7="+row_8_cell_7
            +"&class5_row_11_cell_7="+row_11_cell_7+"&class5_row_12_cell_7="+row_12_cell_7+"&class5_row_13_cell_7="+row_13_cell_7
            +"&class5_row_16_cell_7="+row_16_cell_7+"&class5_row_17_cell_7="+row_17_cell_7+"&class5_row_18_cell_7="+row_18_cell_7
            +"&class5_row_21_cell_7="+row_21_cell_7+"&class5_row_22_cell_7="+row_22_cell_7+"&class5_row_23_cell_7="+row_23_cell_7
            +"&class5_row_26_cell_7="+row_26_cell_7+"&class5_row_27_cell_7="+row_27_cell_7+"&class5_row_28_cell_7="+row_28_cell_7;

            $.ajax({
            type:"post",
            url:"../Database/TimeTableController.php",
            data: update_time_table_class5,
            success:function(data){ alert(data); Load_TimeTable_Class5_Function(); }
            });
    });    
});
