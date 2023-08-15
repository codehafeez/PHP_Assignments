<?php
    include_once './TimeTableDatabase.php';
    $obj_class = new TimeTableClass();
    
    if (isset($_POST['total_rows'])
        &&isset($_POST['row_1_cell_1'])&&isset($_POST['row_2_cell_1'])&&isset($_POST['row_3_cell_1'])
        &&isset($_POST['row_6_cell_1'])&&isset($_POST['row_7_cell_1'])&&isset($_POST['row_8_cell_1'])
        &&isset($_POST['row_11_cell_1'])&&isset($_POST['row_12_cell_1'])&&isset($_POST['row_13_cell_1'])
        &&isset($_POST['row_16_cell_1'])&&isset($_POST['row_17_cell_1'])&&isset($_POST['row_18_cell_1'])
        &&isset($_POST['row_21_cell_1'])&&isset($_POST['row_22_cell_1'])&&isset($_POST['row_23_cell_1'])
        &&isset($_POST['row_26_cell_1'])&&isset($_POST['row_27_cell_1'])&&isset($_POST['row_28_cell_1'])
                    
        &&isset($_POST['row_1_cell_2'])&&isset($_POST['row_2_cell_2'])&&isset($_POST['row_3_cell_2'])
        &&isset($_POST['row_6_cell_2'])&&isset($_POST['row_7_cell_2'])&&isset($_POST['row_8_cell_2'])
        &&isset($_POST['row_11_cell_2'])&&isset($_POST['row_12_cell_2'])&&isset($_POST['row_13_cell_2'])
        &&isset($_POST['row_16_cell_2'])&&isset($_POST['row_17_cell_2'])&&isset($_POST['row_18_cell_2'])
        &&isset($_POST['row_21_cell_2'])&&isset($_POST['row_22_cell_2'])&&isset($_POST['row_23_cell_2'])
        &&isset($_POST['row_26_cell_2'])&&isset($_POST['row_27_cell_2'])&&isset($_POST['row_28_cell_2'])
                    
        &&isset($_POST['row_1_cell_3'])&&isset($_POST['row_2_cell_3'])&&isset($_POST['row_3_cell_3'])
        &&isset($_POST['row_6_cell_3'])&&isset($_POST['row_7_cell_3'])&&isset($_POST['row_8_cell_3'])
        &&isset($_POST['row_11_cell_3'])&&isset($_POST['row_12_cell_3'])&&isset($_POST['row_13_cell_3'])
        &&isset($_POST['row_16_cell_3'])&&isset($_POST['row_17_cell_3'])&&isset($_POST['row_18_cell_3'])
        &&isset($_POST['row_21_cell_3'])&&isset($_POST['row_22_cell_3'])&&isset($_POST['row_23_cell_3'])
        &&isset($_POST['row_26_cell_3'])&&isset($_POST['row_27_cell_3'])&&isset($_POST['row_28_cell_3'])
                    
        &&isset($_POST['row_1_cell_4'])&&isset($_POST['row_2_cell_4'])&&isset($_POST['row_3_cell_4'])
        &&isset($_POST['row_6_cell_4'])&&isset($_POST['row_7_cell_4'])&&isset($_POST['row_8_cell_4'])
        &&isset($_POST['row_11_cell_4'])&&isset($_POST['row_12_cell_4'])&&isset($_POST['row_13_cell_4'])
        &&isset($_POST['row_16_cell_4'])&&isset($_POST['row_17_cell_4'])&&isset($_POST['row_18_cell_4'])
        &&isset($_POST['row_21_cell_4'])&&isset($_POST['row_22_cell_4'])&&isset($_POST['row_23_cell_4'])
        &&isset($_POST['row_26_cell_4'])&&isset($_POST['row_27_cell_4'])&&isset($_POST['row_28_cell_4'])
                
        &&isset($_POST['row_1_cell_5'])&&isset($_POST['row_2_cell_5'])&&isset($_POST['row_3_cell_5'])
        &&isset($_POST['row_6_cell_5'])&&isset($_POST['row_7_cell_5'])&&isset($_POST['row_8_cell_5'])
        &&isset($_POST['row_11_cell_5'])&&isset($_POST['row_12_cell_5'])&&isset($_POST['row_13_cell_5'])
        &&isset($_POST['row_16_cell_5'])&&isset($_POST['row_17_cell_5'])&&isset($_POST['row_18_cell_5'])
        &&isset($_POST['row_21_cell_5'])&&isset($_POST['row_22_cell_5'])&&isset($_POST['row_23_cell_5'])
        &&isset($_POST['row_26_cell_5'])&&isset($_POST['row_27_cell_5'])&&isset($_POST['row_28_cell_5'])
        
        &&isset($_POST['row_1_cell_6'])&&isset($_POST['row_2_cell_6'])&&isset($_POST['row_3_cell_6'])
        &&isset($_POST['row_6_cell_6'])&&isset($_POST['row_7_cell_6'])&&isset($_POST['row_8_cell_6'])
        &&isset($_POST['row_11_cell_6'])&&isset($_POST['row_12_cell_6'])&&isset($_POST['row_13_cell_6'])
        &&isset($_POST['row_16_cell_6'])&&isset($_POST['row_17_cell_6'])&&isset($_POST['row_18_cell_6'])
        &&isset($_POST['row_21_cell_6'])&&isset($_POST['row_22_cell_6'])&&isset($_POST['row_23_cell_6'])
        &&isset($_POST['row_26_cell_6'])&&isset($_POST['row_27_cell_6'])&&isset($_POST['row_28_cell_6'])
                    
        &&isset($_POST['row_1_cell_7'])&&isset($_POST['row_2_cell_7'])&&isset($_POST['row_3_cell_7'])
        &&isset($_POST['row_6_cell_7'])&&isset($_POST['row_7_cell_7'])&&isset($_POST['row_8_cell_7'])
        &&isset($_POST['row_11_cell_7'])&&isset($_POST['row_12_cell_7'])&&isset($_POST['row_13_cell_7'])
        &&isset($_POST['row_16_cell_7'])&&isset($_POST['row_17_cell_7'])&&isset($_POST['row_18_cell_7'])
        &&isset($_POST['row_21_cell_7'])&&isset($_POST['row_22_cell_7'])&&isset($_POST['row_23_cell_7'])
        &&isset($_POST['row_26_cell_7'])&&isset($_POST['row_27_cell_7'])&&isset($_POST['row_28_cell_7'])
    ){
    echo $obj_class->Update_Class1_TimeTable_Tunction($_POST['total_rows'],
        $_POST['row_1_cell_1'], $_POST['row_2_cell_1'], $_POST['row_3_cell_1'],
        $_POST['row_6_cell_1'], $_POST['row_7_cell_1'], $_POST['row_8_cell_1'],               
        $_POST['row_11_cell_1'], $_POST['row_12_cell_1'], $_POST['row_13_cell_1'],           
        $_POST['row_16_cell_1'], $_POST['row_17_cell_1'], $_POST['row_18_cell_1'],           
        $_POST['row_21_cell_1'], $_POST['row_22_cell_1'], $_POST['row_23_cell_1'],           
        $_POST['row_26_cell_1'], $_POST['row_27_cell_1'], $_POST['row_28_cell_1'],
                
        $_POST['row_1_cell_2'], $_POST['row_2_cell_2'], $_POST['row_3_cell_2'],
        $_POST['row_6_cell_2'], $_POST['row_7_cell_2'], $_POST['row_8_cell_2'],               
        $_POST['row_11_cell_2'], $_POST['row_12_cell_2'], $_POST['row_13_cell_2'],           
        $_POST['row_16_cell_2'], $_POST['row_17_cell_2'], $_POST['row_18_cell_2'],           
        $_POST['row_21_cell_2'], $_POST['row_22_cell_2'], $_POST['row_23_cell_2'],           
        $_POST['row_26_cell_2'], $_POST['row_27_cell_2'], $_POST['row_28_cell_2'],
               
        $_POST['row_1_cell_3'], $_POST['row_2_cell_3'], $_POST['row_3_cell_3'],
        $_POST['row_6_cell_3'], $_POST['row_7_cell_3'], $_POST['row_8_cell_3'],               
        $_POST['row_11_cell_3'], $_POST['row_12_cell_3'], $_POST['row_13_cell_3'],           
        $_POST['row_16_cell_3'], $_POST['row_17_cell_3'], $_POST['row_18_cell_3'],           
        $_POST['row_21_cell_3'], $_POST['row_22_cell_3'], $_POST['row_23_cell_3'],           
        $_POST['row_26_cell_3'], $_POST['row_27_cell_3'], $_POST['row_28_cell_3'],
            
        $_POST['row_1_cell_4'], $_POST['row_2_cell_4'], $_POST['row_3_cell_4'],
        $_POST['row_6_cell_4'], $_POST['row_7_cell_4'], $_POST['row_8_cell_4'],               
        $_POST['row_11_cell_4'], $_POST['row_12_cell_4'], $_POST['row_13_cell_4'],           
        $_POST['row_16_cell_4'], $_POST['row_17_cell_4'], $_POST['row_18_cell_4'],           
        $_POST['row_21_cell_4'], $_POST['row_22_cell_4'], $_POST['row_23_cell_4'],           
        $_POST['row_26_cell_4'], $_POST['row_27_cell_4'], $_POST['row_28_cell_4'],
                
        $_POST['row_1_cell_5'], $_POST['row_2_cell_5'], $_POST['row_3_cell_5'],
        $_POST['row_6_cell_5'], $_POST['row_7_cell_5'], $_POST['row_8_cell_5'],               
        $_POST['row_11_cell_5'], $_POST['row_12_cell_5'], $_POST['row_13_cell_5'],           
        $_POST['row_16_cell_5'], $_POST['row_17_cell_5'], $_POST['row_18_cell_5'],           
        $_POST['row_21_cell_5'], $_POST['row_22_cell_5'], $_POST['row_23_cell_5'],           
        $_POST['row_26_cell_5'], $_POST['row_27_cell_5'], $_POST['row_28_cell_5'],
                
        $_POST['row_1_cell_6'], $_POST['row_2_cell_6'], $_POST['row_3_cell_6'],
        $_POST['row_6_cell_6'], $_POST['row_7_cell_6'], $_POST['row_8_cell_6'],               
        $_POST['row_11_cell_6'], $_POST['row_12_cell_6'], $_POST['row_13_cell_6'],           
        $_POST['row_16_cell_6'], $_POST['row_17_cell_6'], $_POST['row_18_cell_6'],           
        $_POST['row_21_cell_6'], $_POST['row_22_cell_6'], $_POST['row_23_cell_6'],           
        $_POST['row_26_cell_6'], $_POST['row_27_cell_6'], $_POST['row_28_cell_6'],
                
        $_POST['row_1_cell_7'], $_POST['row_2_cell_7'], $_POST['row_3_cell_7'],
        $_POST['row_6_cell_7'], $_POST['row_7_cell_7'], $_POST['row_8_cell_7'],               
        $_POST['row_11_cell_7'], $_POST['row_12_cell_7'], $_POST['row_13_cell_7'],           
        $_POST['row_16_cell_7'], $_POST['row_17_cell_7'], $_POST['row_18_cell_7'],           
        $_POST['row_21_cell_7'], $_POST['row_22_cell_7'], $_POST['row_23_cell_7'],           
        $_POST['row_26_cell_7'], $_POST['row_27_cell_7'], $_POST['row_28_cell_7']);
    }
    
    else if (isset($_POST['Load_TimeTable_Class1'])){
        echo $obj_class->Load_TimeTable_Class1_Function();
    }
    
    else if (isset($_POST['Load_TimeTable_Class1_PopUpModel'])){
        echo $obj_class->Load_TimeTable_Class1_PopUpModel_Function();
    }
    
    // ===========================================================================
    // ================================= Class2 ==================================
    // ===========================================================================
    
    else if (isset($_POST['Load_TimeTable_Class2'])){
        echo $obj_class->Load_TimeTable_Class2_Function();
    }
    
    else if (isset($_POST['Load_TimeTable_Class2_PopUpModel'])){
        echo $obj_class->Load_TimeTable_Class2_PopUpModel_Function();
    }
    
    else if (isset($_POST['class2_total_rows'])
        &&isset($_POST['class2_row_1_cell_1'])&&isset($_POST['class2_row_2_cell_1'])&&isset($_POST['class2_row_3_cell_1'])
        &&isset($_POST['class2_row_6_cell_1'])&&isset($_POST['class2_row_7_cell_1'])&&isset($_POST['class2_row_8_cell_1'])
        &&isset($_POST['class2_row_11_cell_1'])&&isset($_POST['class2_row_12_cell_1'])&&isset($_POST['class2_row_13_cell_1'])
        &&isset($_POST['class2_row_16_cell_1'])&&isset($_POST['class2_row_17_cell_1'])&&isset($_POST['class2_row_18_cell_1'])
        &&isset($_POST['class2_row_21_cell_1'])&&isset($_POST['class2_row_22_cell_1'])&&isset($_POST['class2_row_23_cell_1'])
        &&isset($_POST['class2_row_26_cell_1'])&&isset($_POST['class2_row_27_cell_1'])&&isset($_POST['class2_row_28_cell_1'])
                    
        &&isset($_POST['class2_row_1_cell_2'])&&isset($_POST['class2_row_2_cell_2'])&&isset($_POST['class2_row_3_cell_2'])
        &&isset($_POST['class2_row_6_cell_2'])&&isset($_POST['class2_row_7_cell_2'])&&isset($_POST['class2_row_8_cell_2'])
        &&isset($_POST['class2_row_11_cell_2'])&&isset($_POST['class2_row_12_cell_2'])&&isset($_POST['class2_row_13_cell_2'])
        &&isset($_POST['class2_row_16_cell_2'])&&isset($_POST['class2_row_17_cell_2'])&&isset($_POST['class2_row_18_cell_2'])
        &&isset($_POST['class2_row_21_cell_2'])&&isset($_POST['class2_row_22_cell_2'])&&isset($_POST['class2_row_23_cell_2'])
        &&isset($_POST['class2_row_26_cell_2'])&&isset($_POST['class2_row_27_cell_2'])&&isset($_POST['class2_row_28_cell_2'])
                    
        &&isset($_POST['class2_row_1_cell_3'])&&isset($_POST['class2_row_2_cell_3'])&&isset($_POST['class2_row_3_cell_3'])
        &&isset($_POST['class2_row_6_cell_3'])&&isset($_POST['class2_row_7_cell_3'])&&isset($_POST['class2_row_8_cell_3'])
        &&isset($_POST['class2_row_11_cell_3'])&&isset($_POST['class2_row_12_cell_3'])&&isset($_POST['class2_row_13_cell_3'])
        &&isset($_POST['class2_row_16_cell_3'])&&isset($_POST['class2_row_17_cell_3'])&&isset($_POST['class2_row_18_cell_3'])
        &&isset($_POST['class2_row_21_cell_3'])&&isset($_POST['class2_row_22_cell_3'])&&isset($_POST['class2_row_23_cell_3'])
        &&isset($_POST['class2_row_26_cell_3'])&&isset($_POST['class2_row_27_cell_3'])&&isset($_POST['class2_row_28_cell_3'])
                    
        &&isset($_POST['class2_row_1_cell_4'])&&isset($_POST['class2_row_2_cell_4'])&&isset($_POST['class2_row_3_cell_4'])
        &&isset($_POST['class2_row_6_cell_4'])&&isset($_POST['class2_row_7_cell_4'])&&isset($_POST['class2_row_8_cell_4'])
        &&isset($_POST['class2_row_11_cell_4'])&&isset($_POST['class2_row_12_cell_4'])&&isset($_POST['class2_row_13_cell_4'])
        &&isset($_POST['class2_row_16_cell_4'])&&isset($_POST['class2_row_17_cell_4'])&&isset($_POST['class2_row_18_cell_4'])
        &&isset($_POST['class2_row_21_cell_4'])&&isset($_POST['class2_row_22_cell_4'])&&isset($_POST['class2_row_23_cell_4'])
        &&isset($_POST['class2_row_26_cell_4'])&&isset($_POST['class2_row_27_cell_4'])&&isset($_POST['class2_row_28_cell_4'])
                
        &&isset($_POST['class2_row_1_cell_5'])&&isset($_POST['class2_row_2_cell_5'])&&isset($_POST['class2_row_3_cell_5'])
        &&isset($_POST['class2_row_6_cell_5'])&&isset($_POST['class2_row_7_cell_5'])&&isset($_POST['class2_row_8_cell_5'])
        &&isset($_POST['class2_row_11_cell_5'])&&isset($_POST['class2_row_12_cell_5'])&&isset($_POST['class2_row_13_cell_5'])
        &&isset($_POST['class2_row_16_cell_5'])&&isset($_POST['class2_row_17_cell_5'])&&isset($_POST['class2_row_18_cell_5'])
        &&isset($_POST['class2_row_21_cell_5'])&&isset($_POST['class2_row_22_cell_5'])&&isset($_POST['class2_row_23_cell_5'])
        &&isset($_POST['class2_row_26_cell_5'])&&isset($_POST['class2_row_27_cell_5'])&&isset($_POST['class2_row_28_cell_5'])
        
        &&isset($_POST['class2_row_1_cell_6'])&&isset($_POST['class2_row_2_cell_6'])&&isset($_POST['class2_row_3_cell_6'])
        &&isset($_POST['class2_row_6_cell_6'])&&isset($_POST['class2_row_7_cell_6'])&&isset($_POST['class2_row_8_cell_6'])
        &&isset($_POST['class2_row_11_cell_6'])&&isset($_POST['class2_row_12_cell_6'])&&isset($_POST['class2_row_13_cell_6'])
        &&isset($_POST['class2_row_16_cell_6'])&&isset($_POST['class2_row_17_cell_6'])&&isset($_POST['class2_row_18_cell_6'])
        &&isset($_POST['class2_row_21_cell_6'])&&isset($_POST['class2_row_22_cell_6'])&&isset($_POST['class2_row_23_cell_6'])
        &&isset($_POST['class2_row_26_cell_6'])&&isset($_POST['class2_row_27_cell_6'])&&isset($_POST['class2_row_28_cell_6'])
                    
        &&isset($_POST['class2_row_1_cell_7'])&&isset($_POST['class2_row_2_cell_7'])&&isset($_POST['class2_row_3_cell_7'])
        &&isset($_POST['class2_row_6_cell_7'])&&isset($_POST['class2_row_7_cell_7'])&&isset($_POST['class2_row_8_cell_7'])
        &&isset($_POST['class2_row_11_cell_7'])&&isset($_POST['class2_row_12_cell_7'])&&isset($_POST['class2_row_13_cell_7'])
        &&isset($_POST['class2_row_16_cell_7'])&&isset($_POST['class2_row_17_cell_7'])&&isset($_POST['class2_row_18_cell_7'])
        &&isset($_POST['class2_row_21_cell_7'])&&isset($_POST['class2_row_22_cell_7'])&&isset($_POST['class2_row_23_cell_7'])
        &&isset($_POST['class2_row_26_cell_7'])&&isset($_POST['class2_row_27_cell_7'])&&isset($_POST['class2_row_28_cell_7'])
    ){
    echo $obj_class->Update_Class2_TimeTable_Tunction($_POST['class2_total_rows'],
        $_POST['class2_row_1_cell_1'], $_POST['class2_row_2_cell_1'], $_POST['class2_row_3_cell_1'],
        $_POST['class2_row_6_cell_1'], $_POST['class2_row_7_cell_1'], $_POST['class2_row_8_cell_1'],               
        $_POST['class2_row_11_cell_1'], $_POST['class2_row_12_cell_1'], $_POST['class2_row_13_cell_1'],           
        $_POST['class2_row_16_cell_1'], $_POST['class2_row_17_cell_1'], $_POST['class2_row_18_cell_1'],           
        $_POST['class2_row_21_cell_1'], $_POST['class2_row_22_cell_1'], $_POST['class2_row_23_cell_1'],           
        $_POST['class2_row_26_cell_1'], $_POST['class2_row_27_cell_1'], $_POST['class2_row_28_cell_1'],
                
        $_POST['class2_row_1_cell_2'], $_POST['class2_row_2_cell_2'], $_POST['class2_row_3_cell_2'],
        $_POST['class2_row_6_cell_2'], $_POST['class2_row_7_cell_2'], $_POST['class2_row_8_cell_2'],               
        $_POST['class2_row_11_cell_2'], $_POST['class2_row_12_cell_2'], $_POST['class2_row_13_cell_2'],           
        $_POST['class2_row_16_cell_2'], $_POST['class2_row_17_cell_2'], $_POST['class2_row_18_cell_2'],           
        $_POST['class2_row_21_cell_2'], $_POST['class2_row_22_cell_2'], $_POST['class2_row_23_cell_2'],           
        $_POST['class2_row_26_cell_2'], $_POST['class2_row_27_cell_2'], $_POST['class2_row_28_cell_2'],
               
        $_POST['class2_row_1_cell_3'], $_POST['class2_row_2_cell_3'], $_POST['class2_row_3_cell_3'],
        $_POST['class2_row_6_cell_3'], $_POST['class2_row_7_cell_3'], $_POST['class2_row_8_cell_3'],               
        $_POST['class2_row_11_cell_3'], $_POST['class2_row_12_cell_3'], $_POST['class2_row_13_cell_3'],           
        $_POST['class2_row_16_cell_3'], $_POST['class2_row_17_cell_3'], $_POST['class2_row_18_cell_3'],           
        $_POST['class2_row_21_cell_3'], $_POST['class2_row_22_cell_3'], $_POST['class2_row_23_cell_3'],           
        $_POST['class2_row_26_cell_3'], $_POST['class2_row_27_cell_3'], $_POST['class2_row_28_cell_3'],
            
        $_POST['class2_row_1_cell_4'], $_POST['class2_row_2_cell_4'], $_POST['class2_row_3_cell_4'],
        $_POST['class2_row_6_cell_4'], $_POST['class2_row_7_cell_4'], $_POST['class2_row_8_cell_4'],               
        $_POST['class2_row_11_cell_4'], $_POST['class2_row_12_cell_4'], $_POST['class2_row_13_cell_4'],           
        $_POST['class2_row_16_cell_4'], $_POST['class2_row_17_cell_4'], $_POST['class2_row_18_cell_4'],           
        $_POST['class2_row_21_cell_4'], $_POST['class2_row_22_cell_4'], $_POST['class2_row_23_cell_4'],           
        $_POST['class2_row_26_cell_4'], $_POST['class2_row_27_cell_4'], $_POST['class2_row_28_cell_4'],
                
        $_POST['class2_row_1_cell_5'], $_POST['class2_row_2_cell_5'], $_POST['class2_row_3_cell_5'],
        $_POST['class2_row_6_cell_5'], $_POST['class2_row_7_cell_5'], $_POST['class2_row_8_cell_5'],               
        $_POST['class2_row_11_cell_5'], $_POST['class2_row_12_cell_5'], $_POST['class2_row_13_cell_5'],           
        $_POST['class2_row_16_cell_5'], $_POST['class2_row_17_cell_5'], $_POST['class2_row_18_cell_5'],           
        $_POST['class2_row_21_cell_5'], $_POST['class2_row_22_cell_5'], $_POST['class2_row_23_cell_5'],           
        $_POST['class2_row_26_cell_5'], $_POST['class2_row_27_cell_5'], $_POST['class2_row_28_cell_5'],
                
        $_POST['class2_row_1_cell_6'], $_POST['class2_row_2_cell_6'], $_POST['class2_row_3_cell_6'],
        $_POST['class2_row_6_cell_6'], $_POST['class2_row_7_cell_6'], $_POST['class2_row_8_cell_6'],               
        $_POST['class2_row_11_cell_6'], $_POST['class2_row_12_cell_6'], $_POST['class2_row_13_cell_6'],           
        $_POST['class2_row_16_cell_6'], $_POST['class2_row_17_cell_6'], $_POST['class2_row_18_cell_6'],           
        $_POST['class2_row_21_cell_6'], $_POST['class2_row_22_cell_6'], $_POST['class2_row_23_cell_6'],           
        $_POST['class2_row_26_cell_6'], $_POST['class2_row_27_cell_6'], $_POST['class2_row_28_cell_6'],
                
        $_POST['class2_row_1_cell_7'], $_POST['class2_row_2_cell_7'], $_POST['class2_row_3_cell_7'],
        $_POST['class2_row_6_cell_7'], $_POST['class2_row_7_cell_7'], $_POST['class2_row_8_cell_7'],               
        $_POST['class2_row_11_cell_7'], $_POST['class2_row_12_cell_7'], $_POST['class2_row_13_cell_7'],           
        $_POST['class2_row_16_cell_7'], $_POST['class2_row_17_cell_7'], $_POST['class2_row_18_cell_7'],           
        $_POST['class2_row_21_cell_7'], $_POST['class2_row_22_cell_7'], $_POST['class2_row_23_cell_7'],           
        $_POST['class2_row_26_cell_7'], $_POST['class2_row_27_cell_7'], $_POST['class2_row_28_cell_7']);
    }
    
    // ===========================================================================
    // ================================= Class3 ==================================
    // ===========================================================================
    
    else if (isset($_POST['Load_TimeTable_Class3'])){
        echo $obj_class->Load_TimeTable_Class3_Function();
    }
    
    else if (isset($_POST['Load_TimeTable_Class3_PopUpModel'])){
        echo $obj_class->Load_TimeTable_Class3_PopUpModel_Function();
    }
    
    else if (isset($_POST['class3_total_rows'])
        &&isset($_POST['class3_row_1_cell_1'])&&isset($_POST['class3_row_2_cell_1'])&&isset($_POST['class3_row_3_cell_1'])
        &&isset($_POST['class3_row_6_cell_1'])&&isset($_POST['class3_row_7_cell_1'])&&isset($_POST['class3_row_8_cell_1'])
        &&isset($_POST['class3_row_11_cell_1'])&&isset($_POST['class3_row_12_cell_1'])&&isset($_POST['class3_row_13_cell_1'])
        &&isset($_POST['class3_row_16_cell_1'])&&isset($_POST['class3_row_17_cell_1'])&&isset($_POST['class3_row_18_cell_1'])
        &&isset($_POST['class3_row_21_cell_1'])&&isset($_POST['class3_row_22_cell_1'])&&isset($_POST['class3_row_23_cell_1'])
        &&isset($_POST['class3_row_26_cell_1'])&&isset($_POST['class3_row_27_cell_1'])&&isset($_POST['class3_row_28_cell_1'])
                    
        &&isset($_POST['class3_row_1_cell_2'])&&isset($_POST['class3_row_2_cell_2'])&&isset($_POST['class3_row_3_cell_2'])
        &&isset($_POST['class3_row_6_cell_2'])&&isset($_POST['class3_row_7_cell_2'])&&isset($_POST['class3_row_8_cell_2'])
        &&isset($_POST['class3_row_11_cell_2'])&&isset($_POST['class3_row_12_cell_2'])&&isset($_POST['class3_row_13_cell_2'])
        &&isset($_POST['class3_row_16_cell_2'])&&isset($_POST['class3_row_17_cell_2'])&&isset($_POST['class3_row_18_cell_2'])
        &&isset($_POST['class3_row_21_cell_2'])&&isset($_POST['class3_row_22_cell_2'])&&isset($_POST['class3_row_23_cell_2'])
        &&isset($_POST['class3_row_26_cell_2'])&&isset($_POST['class3_row_27_cell_2'])&&isset($_POST['class3_row_28_cell_2'])
                    
        &&isset($_POST['class3_row_1_cell_3'])&&isset($_POST['class3_row_2_cell_3'])&&isset($_POST['class3_row_3_cell_3'])
        &&isset($_POST['class3_row_6_cell_3'])&&isset($_POST['class3_row_7_cell_3'])&&isset($_POST['class3_row_8_cell_3'])
        &&isset($_POST['class3_row_11_cell_3'])&&isset($_POST['class3_row_12_cell_3'])&&isset($_POST['class3_row_13_cell_3'])
        &&isset($_POST['class3_row_16_cell_3'])&&isset($_POST['class3_row_17_cell_3'])&&isset($_POST['class3_row_18_cell_3'])
        &&isset($_POST['class3_row_21_cell_3'])&&isset($_POST['class3_row_22_cell_3'])&&isset($_POST['class3_row_23_cell_3'])
        &&isset($_POST['class3_row_26_cell_3'])&&isset($_POST['class3_row_27_cell_3'])&&isset($_POST['class3_row_28_cell_3'])
                    
        &&isset($_POST['class3_row_1_cell_4'])&&isset($_POST['class3_row_2_cell_4'])&&isset($_POST['class3_row_3_cell_4'])
        &&isset($_POST['class3_row_6_cell_4'])&&isset($_POST['class3_row_7_cell_4'])&&isset($_POST['class3_row_8_cell_4'])
        &&isset($_POST['class3_row_11_cell_4'])&&isset($_POST['class3_row_12_cell_4'])&&isset($_POST['class3_row_13_cell_4'])
        &&isset($_POST['class3_row_16_cell_4'])&&isset($_POST['class3_row_17_cell_4'])&&isset($_POST['class3_row_18_cell_4'])
        &&isset($_POST['class3_row_21_cell_4'])&&isset($_POST['class3_row_22_cell_4'])&&isset($_POST['class3_row_23_cell_4'])
        &&isset($_POST['class3_row_26_cell_4'])&&isset($_POST['class3_row_27_cell_4'])&&isset($_POST['class3_row_28_cell_4'])
                
        &&isset($_POST['class3_row_1_cell_5'])&&isset($_POST['class3_row_2_cell_5'])&&isset($_POST['class3_row_3_cell_5'])
        &&isset($_POST['class3_row_6_cell_5'])&&isset($_POST['class3_row_7_cell_5'])&&isset($_POST['class3_row_8_cell_5'])
        &&isset($_POST['class3_row_11_cell_5'])&&isset($_POST['class3_row_12_cell_5'])&&isset($_POST['class3_row_13_cell_5'])
        &&isset($_POST['class3_row_16_cell_5'])&&isset($_POST['class3_row_17_cell_5'])&&isset($_POST['class3_row_18_cell_5'])
        &&isset($_POST['class3_row_21_cell_5'])&&isset($_POST['class3_row_22_cell_5'])&&isset($_POST['class3_row_23_cell_5'])
        &&isset($_POST['class3_row_26_cell_5'])&&isset($_POST['class3_row_27_cell_5'])&&isset($_POST['class3_row_28_cell_5'])
        
        &&isset($_POST['class3_row_1_cell_6'])&&isset($_POST['class3_row_2_cell_6'])&&isset($_POST['class3_row_3_cell_6'])
        &&isset($_POST['class3_row_6_cell_6'])&&isset($_POST['class3_row_7_cell_6'])&&isset($_POST['class3_row_8_cell_6'])
        &&isset($_POST['class3_row_11_cell_6'])&&isset($_POST['class3_row_12_cell_6'])&&isset($_POST['class3_row_13_cell_6'])
        &&isset($_POST['class3_row_16_cell_6'])&&isset($_POST['class3_row_17_cell_6'])&&isset($_POST['class3_row_18_cell_6'])
        &&isset($_POST['class3_row_21_cell_6'])&&isset($_POST['class3_row_22_cell_6'])&&isset($_POST['class3_row_23_cell_6'])
        &&isset($_POST['class3_row_26_cell_6'])&&isset($_POST['class3_row_27_cell_6'])&&isset($_POST['class3_row_28_cell_6'])
                    
        &&isset($_POST['class3_row_1_cell_7'])&&isset($_POST['class3_row_2_cell_7'])&&isset($_POST['class3_row_3_cell_7'])
        &&isset($_POST['class3_row_6_cell_7'])&&isset($_POST['class3_row_7_cell_7'])&&isset($_POST['class3_row_8_cell_7'])
        &&isset($_POST['class3_row_11_cell_7'])&&isset($_POST['class3_row_12_cell_7'])&&isset($_POST['class3_row_13_cell_7'])
        &&isset($_POST['class3_row_16_cell_7'])&&isset($_POST['class3_row_17_cell_7'])&&isset($_POST['class3_row_18_cell_7'])
        &&isset($_POST['class3_row_21_cell_7'])&&isset($_POST['class3_row_22_cell_7'])&&isset($_POST['class3_row_23_cell_7'])
        &&isset($_POST['class3_row_26_cell_7'])&&isset($_POST['class3_row_27_cell_7'])&&isset($_POST['class3_row_28_cell_7'])
    ){
    echo $obj_class->Update_Class3_TimeTable_Tunction($_POST['class3_total_rows'],
        $_POST['class3_row_1_cell_1'], $_POST['class3_row_2_cell_1'], $_POST['class3_row_3_cell_1'],
        $_POST['class3_row_6_cell_1'], $_POST['class3_row_7_cell_1'], $_POST['class3_row_8_cell_1'],               
        $_POST['class3_row_11_cell_1'], $_POST['class3_row_12_cell_1'], $_POST['class3_row_13_cell_1'],           
        $_POST['class3_row_16_cell_1'], $_POST['class3_row_17_cell_1'], $_POST['class3_row_18_cell_1'],           
        $_POST['class3_row_21_cell_1'], $_POST['class3_row_22_cell_1'], $_POST['class3_row_23_cell_1'],           
        $_POST['class3_row_26_cell_1'], $_POST['class3_row_27_cell_1'], $_POST['class3_row_28_cell_1'],
                
        $_POST['class3_row_1_cell_2'], $_POST['class3_row_2_cell_2'], $_POST['class3_row_3_cell_2'],
        $_POST['class3_row_6_cell_2'], $_POST['class3_row_7_cell_2'], $_POST['class3_row_8_cell_2'],               
        $_POST['class3_row_11_cell_2'], $_POST['class3_row_12_cell_2'], $_POST['class3_row_13_cell_2'],           
        $_POST['class3_row_16_cell_2'], $_POST['class3_row_17_cell_2'], $_POST['class3_row_18_cell_2'],           
        $_POST['class3_row_21_cell_2'], $_POST['class3_row_22_cell_2'], $_POST['class3_row_23_cell_2'],           
        $_POST['class3_row_26_cell_2'], $_POST['class3_row_27_cell_2'], $_POST['class3_row_28_cell_2'],
               
        $_POST['class3_row_1_cell_3'], $_POST['class3_row_2_cell_3'], $_POST['class3_row_3_cell_3'],
        $_POST['class3_row_6_cell_3'], $_POST['class3_row_7_cell_3'], $_POST['class3_row_8_cell_3'],               
        $_POST['class3_row_11_cell_3'], $_POST['class3_row_12_cell_3'], $_POST['class3_row_13_cell_3'],           
        $_POST['class3_row_16_cell_3'], $_POST['class3_row_17_cell_3'], $_POST['class3_row_18_cell_3'],           
        $_POST['class3_row_21_cell_3'], $_POST['class3_row_22_cell_3'], $_POST['class3_row_23_cell_3'],           
        $_POST['class3_row_26_cell_3'], $_POST['class3_row_27_cell_3'], $_POST['class3_row_28_cell_3'],
            
        $_POST['class3_row_1_cell_4'], $_POST['class3_row_2_cell_4'], $_POST['class3_row_3_cell_4'],
        $_POST['class3_row_6_cell_4'], $_POST['class3_row_7_cell_4'], $_POST['class3_row_8_cell_4'],               
        $_POST['class3_row_11_cell_4'], $_POST['class3_row_12_cell_4'], $_POST['class3_row_13_cell_4'],           
        $_POST['class3_row_16_cell_4'], $_POST['class3_row_17_cell_4'], $_POST['class3_row_18_cell_4'],           
        $_POST['class3_row_21_cell_4'], $_POST['class3_row_22_cell_4'], $_POST['class3_row_23_cell_4'],           
        $_POST['class3_row_26_cell_4'], $_POST['class3_row_27_cell_4'], $_POST['class3_row_28_cell_4'],
                
        $_POST['class3_row_1_cell_5'], $_POST['class3_row_2_cell_5'], $_POST['class3_row_3_cell_5'],
        $_POST['class3_row_6_cell_5'], $_POST['class3_row_7_cell_5'], $_POST['class3_row_8_cell_5'],               
        $_POST['class3_row_11_cell_5'], $_POST['class3_row_12_cell_5'], $_POST['class3_row_13_cell_5'],           
        $_POST['class3_row_16_cell_5'], $_POST['class3_row_17_cell_5'], $_POST['class3_row_18_cell_5'],           
        $_POST['class3_row_21_cell_5'], $_POST['class3_row_22_cell_5'], $_POST['class3_row_23_cell_5'],           
        $_POST['class3_row_26_cell_5'], $_POST['class3_row_27_cell_5'], $_POST['class3_row_28_cell_5'],
                
        $_POST['class3_row_1_cell_6'], $_POST['class3_row_2_cell_6'], $_POST['class3_row_3_cell_6'],
        $_POST['class3_row_6_cell_6'], $_POST['class3_row_7_cell_6'], $_POST['class3_row_8_cell_6'],               
        $_POST['class3_row_11_cell_6'], $_POST['class3_row_12_cell_6'], $_POST['class3_row_13_cell_6'],           
        $_POST['class3_row_16_cell_6'], $_POST['class3_row_17_cell_6'], $_POST['class3_row_18_cell_6'],           
        $_POST['class3_row_21_cell_6'], $_POST['class3_row_22_cell_6'], $_POST['class3_row_23_cell_6'],           
        $_POST['class3_row_26_cell_6'], $_POST['class3_row_27_cell_6'], $_POST['class3_row_28_cell_6'],
                
        $_POST['class3_row_1_cell_7'], $_POST['class3_row_2_cell_7'], $_POST['class3_row_3_cell_7'],
        $_POST['class3_row_6_cell_7'], $_POST['class3_row_7_cell_7'], $_POST['class3_row_8_cell_7'],               
        $_POST['class3_row_11_cell_7'], $_POST['class3_row_12_cell_7'], $_POST['class3_row_13_cell_7'],           
        $_POST['class3_row_16_cell_7'], $_POST['class3_row_17_cell_7'], $_POST['class3_row_18_cell_7'],           
        $_POST['class3_row_21_cell_7'], $_POST['class3_row_22_cell_7'], $_POST['class3_row_23_cell_7'],           
        $_POST['class3_row_26_cell_7'], $_POST['class3_row_27_cell_7'], $_POST['class3_row_28_cell_7']);
    }
    
    // ===========================================================================
    // ================================= Class4 ==================================
    // ===========================================================================
    
    else if (isset($_POST['Load_TimeTable_Class4'])){
        echo $obj_class->Load_TimeTable_Class4_Function();
    }
    
    else if (isset($_POST['Load_TimeTable_Class4_PopUpModel'])){
        echo $obj_class->Load_TimeTable_Class4_PopUpModel_Function();
    }
    
    else if (isset($_POST['class4_total_rows'])
        &&isset($_POST['class4_row_1_cell_1'])&&isset($_POST['class4_row_2_cell_1'])&&isset($_POST['class4_row_3_cell_1'])
        &&isset($_POST['class4_row_6_cell_1'])&&isset($_POST['class4_row_7_cell_1'])&&isset($_POST['class4_row_8_cell_1'])
        &&isset($_POST['class4_row_11_cell_1'])&&isset($_POST['class4_row_12_cell_1'])&&isset($_POST['class4_row_13_cell_1'])
        &&isset($_POST['class4_row_16_cell_1'])&&isset($_POST['class4_row_17_cell_1'])&&isset($_POST['class4_row_18_cell_1'])
        &&isset($_POST['class4_row_21_cell_1'])&&isset($_POST['class4_row_22_cell_1'])&&isset($_POST['class4_row_23_cell_1'])
        &&isset($_POST['class4_row_26_cell_1'])&&isset($_POST['class4_row_27_cell_1'])&&isset($_POST['class4_row_28_cell_1'])
                    
        &&isset($_POST['class4_row_1_cell_2'])&&isset($_POST['class4_row_2_cell_2'])&&isset($_POST['class4_row_3_cell_2'])
        &&isset($_POST['class4_row_6_cell_2'])&&isset($_POST['class4_row_7_cell_2'])&&isset($_POST['class4_row_8_cell_2'])
        &&isset($_POST['class4_row_11_cell_2'])&&isset($_POST['class4_row_12_cell_2'])&&isset($_POST['class4_row_13_cell_2'])
        &&isset($_POST['class4_row_16_cell_2'])&&isset($_POST['class4_row_17_cell_2'])&&isset($_POST['class4_row_18_cell_2'])
        &&isset($_POST['class4_row_21_cell_2'])&&isset($_POST['class4_row_22_cell_2'])&&isset($_POST['class4_row_23_cell_2'])
        &&isset($_POST['class4_row_26_cell_2'])&&isset($_POST['class4_row_27_cell_2'])&&isset($_POST['class4_row_28_cell_2'])
                    
        &&isset($_POST['class4_row_1_cell_3'])&&isset($_POST['class4_row_2_cell_3'])&&isset($_POST['class4_row_3_cell_3'])
        &&isset($_POST['class4_row_6_cell_3'])&&isset($_POST['class4_row_7_cell_3'])&&isset($_POST['class4_row_8_cell_3'])
        &&isset($_POST['class4_row_11_cell_3'])&&isset($_POST['class4_row_12_cell_3'])&&isset($_POST['class4_row_13_cell_3'])
        &&isset($_POST['class4_row_16_cell_3'])&&isset($_POST['class4_row_17_cell_3'])&&isset($_POST['class4_row_18_cell_3'])
        &&isset($_POST['class4_row_21_cell_3'])&&isset($_POST['class4_row_22_cell_3'])&&isset($_POST['class4_row_23_cell_3'])
        &&isset($_POST['class4_row_26_cell_3'])&&isset($_POST['class4_row_27_cell_3'])&&isset($_POST['class4_row_28_cell_3'])
                    
        &&isset($_POST['class4_row_1_cell_4'])&&isset($_POST['class4_row_2_cell_4'])&&isset($_POST['class4_row_3_cell_4'])
        &&isset($_POST['class4_row_6_cell_4'])&&isset($_POST['class4_row_7_cell_4'])&&isset($_POST['class4_row_8_cell_4'])
        &&isset($_POST['class4_row_11_cell_4'])&&isset($_POST['class4_row_12_cell_4'])&&isset($_POST['class4_row_13_cell_4'])
        &&isset($_POST['class4_row_16_cell_4'])&&isset($_POST['class4_row_17_cell_4'])&&isset($_POST['class4_row_18_cell_4'])
        &&isset($_POST['class4_row_21_cell_4'])&&isset($_POST['class4_row_22_cell_4'])&&isset($_POST['class4_row_23_cell_4'])
        &&isset($_POST['class4_row_26_cell_4'])&&isset($_POST['class4_row_27_cell_4'])&&isset($_POST['class4_row_28_cell_4'])
                
        &&isset($_POST['class4_row_1_cell_5'])&&isset($_POST['class4_row_2_cell_5'])&&isset($_POST['class4_row_3_cell_5'])
        &&isset($_POST['class4_row_6_cell_5'])&&isset($_POST['class4_row_7_cell_5'])&&isset($_POST['class4_row_8_cell_5'])
        &&isset($_POST['class4_row_11_cell_5'])&&isset($_POST['class4_row_12_cell_5'])&&isset($_POST['class4_row_13_cell_5'])
        &&isset($_POST['class4_row_16_cell_5'])&&isset($_POST['class4_row_17_cell_5'])&&isset($_POST['class4_row_18_cell_5'])
        &&isset($_POST['class4_row_21_cell_5'])&&isset($_POST['class4_row_22_cell_5'])&&isset($_POST['class4_row_23_cell_5'])
        &&isset($_POST['class4_row_26_cell_5'])&&isset($_POST['class4_row_27_cell_5'])&&isset($_POST['class4_row_28_cell_5'])
        
        &&isset($_POST['class4_row_1_cell_6'])&&isset($_POST['class4_row_2_cell_6'])&&isset($_POST['class4_row_3_cell_6'])
        &&isset($_POST['class4_row_6_cell_6'])&&isset($_POST['class4_row_7_cell_6'])&&isset($_POST['class4_row_8_cell_6'])
        &&isset($_POST['class4_row_11_cell_6'])&&isset($_POST['class4_row_12_cell_6'])&&isset($_POST['class4_row_13_cell_6'])
        &&isset($_POST['class4_row_16_cell_6'])&&isset($_POST['class4_row_17_cell_6'])&&isset($_POST['class4_row_18_cell_6'])
        &&isset($_POST['class4_row_21_cell_6'])&&isset($_POST['class4_row_22_cell_6'])&&isset($_POST['class4_row_23_cell_6'])
        &&isset($_POST['class4_row_26_cell_6'])&&isset($_POST['class4_row_27_cell_6'])&&isset($_POST['class4_row_28_cell_6'])
                    
        &&isset($_POST['class4_row_1_cell_7'])&&isset($_POST['class4_row_2_cell_7'])&&isset($_POST['class4_row_3_cell_7'])
        &&isset($_POST['class4_row_6_cell_7'])&&isset($_POST['class4_row_7_cell_7'])&&isset($_POST['class4_row_8_cell_7'])
        &&isset($_POST['class4_row_11_cell_7'])&&isset($_POST['class4_row_12_cell_7'])&&isset($_POST['class4_row_13_cell_7'])
        &&isset($_POST['class4_row_16_cell_7'])&&isset($_POST['class4_row_17_cell_7'])&&isset($_POST['class4_row_18_cell_7'])
        &&isset($_POST['class4_row_21_cell_7'])&&isset($_POST['class4_row_22_cell_7'])&&isset($_POST['class4_row_23_cell_7'])
        &&isset($_POST['class4_row_26_cell_7'])&&isset($_POST['class4_row_27_cell_7'])&&isset($_POST['class4_row_28_cell_7'])
    ){
    echo $obj_class->Update_Class4_TimeTable_Tunction($_POST['class4_total_rows'],
        $_POST['class4_row_1_cell_1'], $_POST['class4_row_2_cell_1'], $_POST['class4_row_3_cell_1'],
        $_POST['class4_row_6_cell_1'], $_POST['class4_row_7_cell_1'], $_POST['class4_row_8_cell_1'],               
        $_POST['class4_row_11_cell_1'], $_POST['class4_row_12_cell_1'], $_POST['class4_row_13_cell_1'],           
        $_POST['class4_row_16_cell_1'], $_POST['class4_row_17_cell_1'], $_POST['class4_row_18_cell_1'],           
        $_POST['class4_row_21_cell_1'], $_POST['class4_row_22_cell_1'], $_POST['class4_row_23_cell_1'],           
        $_POST['class4_row_26_cell_1'], $_POST['class4_row_27_cell_1'], $_POST['class4_row_28_cell_1'],
                
        $_POST['class4_row_1_cell_2'], $_POST['class4_row_2_cell_2'], $_POST['class4_row_3_cell_2'],
        $_POST['class4_row_6_cell_2'], $_POST['class4_row_7_cell_2'], $_POST['class4_row_8_cell_2'],               
        $_POST['class4_row_11_cell_2'], $_POST['class4_row_12_cell_2'], $_POST['class4_row_13_cell_2'],           
        $_POST['class4_row_16_cell_2'], $_POST['class4_row_17_cell_2'], $_POST['class4_row_18_cell_2'],           
        $_POST['class4_row_21_cell_2'], $_POST['class4_row_22_cell_2'], $_POST['class4_row_23_cell_2'],           
        $_POST['class4_row_26_cell_2'], $_POST['class4_row_27_cell_2'], $_POST['class4_row_28_cell_2'],
               
        $_POST['class4_row_1_cell_3'], $_POST['class4_row_2_cell_3'], $_POST['class4_row_3_cell_3'],
        $_POST['class4_row_6_cell_3'], $_POST['class4_row_7_cell_3'], $_POST['class4_row_8_cell_3'],               
        $_POST['class4_row_11_cell_3'], $_POST['class4_row_12_cell_3'], $_POST['class4_row_13_cell_3'],           
        $_POST['class4_row_16_cell_3'], $_POST['class4_row_17_cell_3'], $_POST['class4_row_18_cell_3'],           
        $_POST['class4_row_21_cell_3'], $_POST['class4_row_22_cell_3'], $_POST['class4_row_23_cell_3'],           
        $_POST['class4_row_26_cell_3'], $_POST['class4_row_27_cell_3'], $_POST['class4_row_28_cell_3'],
            
        $_POST['class4_row_1_cell_4'], $_POST['class4_row_2_cell_4'], $_POST['class4_row_3_cell_4'],
        $_POST['class4_row_6_cell_4'], $_POST['class4_row_7_cell_4'], $_POST['class4_row_8_cell_4'],               
        $_POST['class4_row_11_cell_4'], $_POST['class4_row_12_cell_4'], $_POST['class4_row_13_cell_4'],           
        $_POST['class4_row_16_cell_4'], $_POST['class4_row_17_cell_4'], $_POST['class4_row_18_cell_4'],           
        $_POST['class4_row_21_cell_4'], $_POST['class4_row_22_cell_4'], $_POST['class4_row_23_cell_4'],           
        $_POST['class4_row_26_cell_4'], $_POST['class4_row_27_cell_4'], $_POST['class4_row_28_cell_4'],
                
        $_POST['class4_row_1_cell_5'], $_POST['class4_row_2_cell_5'], $_POST['class4_row_3_cell_5'],
        $_POST['class4_row_6_cell_5'], $_POST['class4_row_7_cell_5'], $_POST['class4_row_8_cell_5'],               
        $_POST['class4_row_11_cell_5'], $_POST['class4_row_12_cell_5'], $_POST['class4_row_13_cell_5'],           
        $_POST['class4_row_16_cell_5'], $_POST['class4_row_17_cell_5'], $_POST['class4_row_18_cell_5'],           
        $_POST['class4_row_21_cell_5'], $_POST['class4_row_22_cell_5'], $_POST['class4_row_23_cell_5'],           
        $_POST['class4_row_26_cell_5'], $_POST['class4_row_27_cell_5'], $_POST['class4_row_28_cell_5'],
                
        $_POST['class4_row_1_cell_6'], $_POST['class4_row_2_cell_6'], $_POST['class4_row_3_cell_6'],
        $_POST['class4_row_6_cell_6'], $_POST['class4_row_7_cell_6'], $_POST['class4_row_8_cell_6'],               
        $_POST['class4_row_11_cell_6'], $_POST['class4_row_12_cell_6'], $_POST['class4_row_13_cell_6'],           
        $_POST['class4_row_16_cell_6'], $_POST['class4_row_17_cell_6'], $_POST['class4_row_18_cell_6'],           
        $_POST['class4_row_21_cell_6'], $_POST['class4_row_22_cell_6'], $_POST['class4_row_23_cell_6'],           
        $_POST['class4_row_26_cell_6'], $_POST['class4_row_27_cell_6'], $_POST['class4_row_28_cell_6'],
                
        $_POST['class4_row_1_cell_7'], $_POST['class4_row_2_cell_7'], $_POST['class4_row_3_cell_7'],
        $_POST['class4_row_6_cell_7'], $_POST['class4_row_7_cell_7'], $_POST['class4_row_8_cell_7'],               
        $_POST['class4_row_11_cell_7'], $_POST['class4_row_12_cell_7'], $_POST['class4_row_13_cell_7'],           
        $_POST['class4_row_16_cell_7'], $_POST['class4_row_17_cell_7'], $_POST['class4_row_18_cell_7'],           
        $_POST['class4_row_21_cell_7'], $_POST['class4_row_22_cell_7'], $_POST['class4_row_23_cell_7'],           
        $_POST['class4_row_26_cell_7'], $_POST['class4_row_27_cell_7'], $_POST['class4_row_28_cell_7']);
    }
    
    
    // ===========================================================================
    // ================================= Class5 ==================================
    // ===========================================================================
    
    else if (isset($_POST['Load_TimeTable_Class5'])){
        echo $obj_class->Load_TimeTable_Class5_Function();
    }
    
    else if (isset($_POST['Load_TimeTable_Class5_PopUpModel'])){
        echo $obj_class->Load_TimeTable_Class5_PopUpModel_Function();
    }
    
    else if (isset($_POST['class5_total_rows'])
        &&isset($_POST['class5_row_1_cell_1'])&&isset($_POST['class5_row_2_cell_1'])&&isset($_POST['class5_row_3_cell_1'])
        &&isset($_POST['class5_row_6_cell_1'])&&isset($_POST['class5_row_7_cell_1'])&&isset($_POST['class5_row_8_cell_1'])
        &&isset($_POST['class5_row_11_cell_1'])&&isset($_POST['class5_row_12_cell_1'])&&isset($_POST['class5_row_13_cell_1'])
        &&isset($_POST['class5_row_16_cell_1'])&&isset($_POST['class5_row_17_cell_1'])&&isset($_POST['class5_row_18_cell_1'])
        &&isset($_POST['class5_row_21_cell_1'])&&isset($_POST['class5_row_22_cell_1'])&&isset($_POST['class5_row_23_cell_1'])
        &&isset($_POST['class5_row_26_cell_1'])&&isset($_POST['class5_row_27_cell_1'])&&isset($_POST['class5_row_28_cell_1'])
                    
        &&isset($_POST['class5_row_1_cell_2'])&&isset($_POST['class5_row_2_cell_2'])&&isset($_POST['class5_row_3_cell_2'])
        &&isset($_POST['class5_row_6_cell_2'])&&isset($_POST['class5_row_7_cell_2'])&&isset($_POST['class5_row_8_cell_2'])
        &&isset($_POST['class5_row_11_cell_2'])&&isset($_POST['class5_row_12_cell_2'])&&isset($_POST['class5_row_13_cell_2'])
        &&isset($_POST['class5_row_16_cell_2'])&&isset($_POST['class5_row_17_cell_2'])&&isset($_POST['class5_row_18_cell_2'])
        &&isset($_POST['class5_row_21_cell_2'])&&isset($_POST['class5_row_22_cell_2'])&&isset($_POST['class5_row_23_cell_2'])
        &&isset($_POST['class5_row_26_cell_2'])&&isset($_POST['class5_row_27_cell_2'])&&isset($_POST['class5_row_28_cell_2'])
                    
        &&isset($_POST['class5_row_1_cell_3'])&&isset($_POST['class5_row_2_cell_3'])&&isset($_POST['class5_row_3_cell_3'])
        &&isset($_POST['class5_row_6_cell_3'])&&isset($_POST['class5_row_7_cell_3'])&&isset($_POST['class5_row_8_cell_3'])
        &&isset($_POST['class5_row_11_cell_3'])&&isset($_POST['class5_row_12_cell_3'])&&isset($_POST['class5_row_13_cell_3'])
        &&isset($_POST['class5_row_16_cell_3'])&&isset($_POST['class5_row_17_cell_3'])&&isset($_POST['class5_row_18_cell_3'])
        &&isset($_POST['class5_row_21_cell_3'])&&isset($_POST['class5_row_22_cell_3'])&&isset($_POST['class5_row_23_cell_3'])
        &&isset($_POST['class5_row_26_cell_3'])&&isset($_POST['class5_row_27_cell_3'])&&isset($_POST['class5_row_28_cell_3'])
                    
        &&isset($_POST['class5_row_1_cell_4'])&&isset($_POST['class5_row_2_cell_4'])&&isset($_POST['class5_row_3_cell_4'])
        &&isset($_POST['class5_row_6_cell_4'])&&isset($_POST['class5_row_7_cell_4'])&&isset($_POST['class5_row_8_cell_4'])
        &&isset($_POST['class5_row_11_cell_4'])&&isset($_POST['class5_row_12_cell_4'])&&isset($_POST['class5_row_13_cell_4'])
        &&isset($_POST['class5_row_16_cell_4'])&&isset($_POST['class5_row_17_cell_4'])&&isset($_POST['class5_row_18_cell_4'])
        &&isset($_POST['class5_row_21_cell_4'])&&isset($_POST['class5_row_22_cell_4'])&&isset($_POST['class5_row_23_cell_4'])
        &&isset($_POST['class5_row_26_cell_4'])&&isset($_POST['class5_row_27_cell_4'])&&isset($_POST['class5_row_28_cell_4'])
                
        &&isset($_POST['class5_row_1_cell_5'])&&isset($_POST['class5_row_2_cell_5'])&&isset($_POST['class5_row_3_cell_5'])
        &&isset($_POST['class5_row_6_cell_5'])&&isset($_POST['class5_row_7_cell_5'])&&isset($_POST['class5_row_8_cell_5'])
        &&isset($_POST['class5_row_11_cell_5'])&&isset($_POST['class5_row_12_cell_5'])&&isset($_POST['class5_row_13_cell_5'])
        &&isset($_POST['class5_row_16_cell_5'])&&isset($_POST['class5_row_17_cell_5'])&&isset($_POST['class5_row_18_cell_5'])
        &&isset($_POST['class5_row_21_cell_5'])&&isset($_POST['class5_row_22_cell_5'])&&isset($_POST['class5_row_23_cell_5'])
        &&isset($_POST['class5_row_26_cell_5'])&&isset($_POST['class5_row_27_cell_5'])&&isset($_POST['class5_row_28_cell_5'])
        
        &&isset($_POST['class5_row_1_cell_6'])&&isset($_POST['class5_row_2_cell_6'])&&isset($_POST['class5_row_3_cell_6'])
        &&isset($_POST['class5_row_6_cell_6'])&&isset($_POST['class5_row_7_cell_6'])&&isset($_POST['class5_row_8_cell_6'])
        &&isset($_POST['class5_row_11_cell_6'])&&isset($_POST['class5_row_12_cell_6'])&&isset($_POST['class5_row_13_cell_6'])
        &&isset($_POST['class5_row_16_cell_6'])&&isset($_POST['class5_row_17_cell_6'])&&isset($_POST['class5_row_18_cell_6'])
        &&isset($_POST['class5_row_21_cell_6'])&&isset($_POST['class5_row_22_cell_6'])&&isset($_POST['class5_row_23_cell_6'])
        &&isset($_POST['class5_row_26_cell_6'])&&isset($_POST['class5_row_27_cell_6'])&&isset($_POST['class5_row_28_cell_6'])
                    
        &&isset($_POST['class5_row_1_cell_7'])&&isset($_POST['class5_row_2_cell_7'])&&isset($_POST['class5_row_3_cell_7'])
        &&isset($_POST['class5_row_6_cell_7'])&&isset($_POST['class5_row_7_cell_7'])&&isset($_POST['class5_row_8_cell_7'])
        &&isset($_POST['class5_row_11_cell_7'])&&isset($_POST['class5_row_12_cell_7'])&&isset($_POST['class5_row_13_cell_7'])
        &&isset($_POST['class5_row_16_cell_7'])&&isset($_POST['class5_row_17_cell_7'])&&isset($_POST['class5_row_18_cell_7'])
        &&isset($_POST['class5_row_21_cell_7'])&&isset($_POST['class5_row_22_cell_7'])&&isset($_POST['class5_row_23_cell_7'])
        &&isset($_POST['class5_row_26_cell_7'])&&isset($_POST['class5_row_27_cell_7'])&&isset($_POST['class5_row_28_cell_7'])
    ){
    echo $obj_class->Update_Class5_TimeTable_Tunction($_POST['class5_total_rows'],
        $_POST['class5_row_1_cell_1'], $_POST['class5_row_2_cell_1'], $_POST['class5_row_3_cell_1'],
        $_POST['class5_row_6_cell_1'], $_POST['class5_row_7_cell_1'], $_POST['class5_row_8_cell_1'],               
        $_POST['class5_row_11_cell_1'], $_POST['class5_row_12_cell_1'], $_POST['class5_row_13_cell_1'],           
        $_POST['class5_row_16_cell_1'], $_POST['class5_row_17_cell_1'], $_POST['class5_row_18_cell_1'],           
        $_POST['class5_row_21_cell_1'], $_POST['class5_row_22_cell_1'], $_POST['class5_row_23_cell_1'],           
        $_POST['class5_row_26_cell_1'], $_POST['class5_row_27_cell_1'], $_POST['class5_row_28_cell_1'],
                
        $_POST['class5_row_1_cell_2'], $_POST['class5_row_2_cell_2'], $_POST['class5_row_3_cell_2'],
        $_POST['class5_row_6_cell_2'], $_POST['class5_row_7_cell_2'], $_POST['class5_row_8_cell_2'],               
        $_POST['class5_row_11_cell_2'], $_POST['class5_row_12_cell_2'], $_POST['class5_row_13_cell_2'],           
        $_POST['class5_row_16_cell_2'], $_POST['class5_row_17_cell_2'], $_POST['class5_row_18_cell_2'],           
        $_POST['class5_row_21_cell_2'], $_POST['class5_row_22_cell_2'], $_POST['class5_row_23_cell_2'],           
        $_POST['class5_row_26_cell_2'], $_POST['class5_row_27_cell_2'], $_POST['class5_row_28_cell_2'],
               
        $_POST['class5_row_1_cell_3'], $_POST['class5_row_2_cell_3'], $_POST['class5_row_3_cell_3'],
        $_POST['class5_row_6_cell_3'], $_POST['class5_row_7_cell_3'], $_POST['class5_row_8_cell_3'],               
        $_POST['class5_row_11_cell_3'], $_POST['class5_row_12_cell_3'], $_POST['class5_row_13_cell_3'],           
        $_POST['class5_row_16_cell_3'], $_POST['class5_row_17_cell_3'], $_POST['class5_row_18_cell_3'],           
        $_POST['class5_row_21_cell_3'], $_POST['class5_row_22_cell_3'], $_POST['class5_row_23_cell_3'],           
        $_POST['class5_row_26_cell_3'], $_POST['class5_row_27_cell_3'], $_POST['class5_row_28_cell_3'],
            
        $_POST['class5_row_1_cell_4'], $_POST['class5_row_2_cell_4'], $_POST['class5_row_3_cell_4'],
        $_POST['class5_row_6_cell_4'], $_POST['class5_row_7_cell_4'], $_POST['class5_row_8_cell_4'],               
        $_POST['class5_row_11_cell_4'], $_POST['class5_row_12_cell_4'], $_POST['class5_row_13_cell_4'],           
        $_POST['class5_row_16_cell_4'], $_POST['class5_row_17_cell_4'], $_POST['class5_row_18_cell_4'],           
        $_POST['class5_row_21_cell_4'], $_POST['class5_row_22_cell_4'], $_POST['class5_row_23_cell_4'],           
        $_POST['class5_row_26_cell_4'], $_POST['class5_row_27_cell_4'], $_POST['class5_row_28_cell_4'],
                
        $_POST['class5_row_1_cell_5'], $_POST['class5_row_2_cell_5'], $_POST['class5_row_3_cell_5'],
        $_POST['class5_row_6_cell_5'], $_POST['class5_row_7_cell_5'], $_POST['class5_row_8_cell_5'],               
        $_POST['class5_row_11_cell_5'], $_POST['class5_row_12_cell_5'], $_POST['class5_row_13_cell_5'],           
        $_POST['class5_row_16_cell_5'], $_POST['class5_row_17_cell_5'], $_POST['class5_row_18_cell_5'],           
        $_POST['class5_row_21_cell_5'], $_POST['class5_row_22_cell_5'], $_POST['class5_row_23_cell_5'],           
        $_POST['class5_row_26_cell_5'], $_POST['class5_row_27_cell_5'], $_POST['class5_row_28_cell_5'],
                
        $_POST['class5_row_1_cell_6'], $_POST['class5_row_2_cell_6'], $_POST['class5_row_3_cell_6'],
        $_POST['class5_row_6_cell_6'], $_POST['class5_row_7_cell_6'], $_POST['class5_row_8_cell_6'],               
        $_POST['class5_row_11_cell_6'], $_POST['class5_row_12_cell_6'], $_POST['class5_row_13_cell_6'],           
        $_POST['class5_row_16_cell_6'], $_POST['class5_row_17_cell_6'], $_POST['class5_row_18_cell_6'],           
        $_POST['class5_row_21_cell_6'], $_POST['class5_row_22_cell_6'], $_POST['class5_row_23_cell_6'],           
        $_POST['class5_row_26_cell_6'], $_POST['class5_row_27_cell_6'], $_POST['class5_row_28_cell_6'],
                
        $_POST['class5_row_1_cell_7'], $_POST['class5_row_2_cell_7'], $_POST['class5_row_3_cell_7'],
        $_POST['class5_row_6_cell_7'], $_POST['class5_row_7_cell_7'], $_POST['class5_row_8_cell_7'],               
        $_POST['class5_row_11_cell_7'], $_POST['class5_row_12_cell_7'], $_POST['class5_row_13_cell_7'],           
        $_POST['class5_row_16_cell_7'], $_POST['class5_row_17_cell_7'], $_POST['class5_row_18_cell_7'],           
        $_POST['class5_row_21_cell_7'], $_POST['class5_row_22_cell_7'], $_POST['class5_row_23_cell_7'],           
        $_POST['class5_row_26_cell_7'], $_POST['class5_row_27_cell_7'], $_POST['class5_row_28_cell_7']);
    }
?>
